<?php

/**
 * @file
 * FlaggableContentRepository class definition.
 */

namespace Drupal\dbcdk_community\Content;

use DBCDK\CommunityServices\Api\FlagApi;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * A repository for retrieving content with attached flags.
 *
 * Multiple types of content can be flagged. The purpose of this class is
 * to provide a simple way to retrieve all such types instead of using
 * one class per type.
 */
class FlaggableContentRepository {

  /**
   * The API to use when retrieving flagged content.
   *
   * @var FlagApi $flagApi
   */
  protected $flagApi;

  /**
   * The logger to use.
   *
   * @var LoggerInterface
   */
  protected $logger;

  /**
   * FlaggableContentRepository constructor.
   *
   * @param FlagApi $flag_api
   *   The FlagApi class to use when retrieving content.
   */
  public function __construct(FlagApi $flag_api) {
    $this->flagApi = $flag_api;
    $this->logger = new NullLogger();
  }

  /**
   * Set the logger to use.
   *
   * @param LoggerInterface $logger
   *   The logger.
   */
  public function setLogger(LoggerInterface $logger) {
    $this->logger = $logger;
  }

  /**
   * Get all content which has unread flags.
   *
   * The content will be sorted by reverse chronological order based on
   * time of the latest flag ie. the content which has most recently been
   * flagged will be returned first.
   *
   * @return FlaggableContent[]
   *   All content with unread flags.
   *
   * @throws \DBCDK\CommunityServices\ApiException
   *   Thrown if we are not able to retrieve any content from the API.
   */
  public function getContentWithUnreadFlags() {
    return $this->getContent(['where' => ['markedAsRead' => FALSE]]);
  }

  /**
   * Retrieve flaggable content from the repository matching a filter.
   *
   * @param array $filter
   *   An array of filters to use when retrieving the content. If an empty
   *   filter is used then all flaggable content available will be returned.
   *
   * @return \Drupal\dbcdk_community\Content\FlaggableContent[]
   *   All flaggable content matching the filter.
   */
  protected function getContent(array $filter = []) {
    /* @var FlaggableContent[] $content */
    $content = [];

    // The API cannot handle an empty array being passed so we convert it to
    // an empty string.
    $filter_string = (!empty($filter)) ? json_encode($filter) : NULL;
    /* @var \DBCDK\CommunityServices\Model\Flag[] $flags */
    $flags = (array) $this->flagApi->flagFind($filter_string);

    // Loop over *all* flags to find which content it is attached to.
    // This is not very efficient but our generated APIs do not offer a
    // better way to do this. In general the number of unread flags should
    // not accumulate over time so it should be manageable.
    foreach ($flags as $flag) {
      // We do not know which type of content our flag is attached to and
      // in theory it could be attached to multiple. We get all of them and
      // convert them to FlaggableContent instances.
      $post = $flag->getPosts();
      $comment = $flag->getComments();

      $flagged_content = array_map(function($content) use ($flag) {
        return (new FlaggableContent($content))->addFlag($flag);
      }, array_filter([$post, $comment]));

      $content = array_merge($content, $flagged_content);
    }

    // Group flags belonging to the same content.
    /* @var FlaggableContent[] $grouped_content */
    $grouped_content = [];
    while ($content_element = array_pop($content)) {
      foreach ($content as $i => $other_content) {
        if ($content_element->equals($other_content)) {
          // Add flags attached to the same content element to the same
          // FlaggedContent instance and remove the duplicate to prevent
          // further processing.
          $content_element->addFlags($other_content->getFlags());
          unset($content[$i]);
        }
      }
      $grouped_content[] = $content_element;
    }

    // Sort the content in reverse chronological order based on the latest
    // flag.
    uasort($grouped_content, function(FlaggableContent $a, FlaggableContent $b) {
      return $a->getLatestFlag()->getTimeFlagged()->getTimestamp() - $b->getLatestFlag()->getTimeFlagged()->getTimestamp();
    });
    $grouped_content = array_reverse($grouped_content);

    return $grouped_content;
  }

  /**
   * Get a piece of flaggable content attached to a specific flag.
   *
   * Note that this function will not return a flaggable object with all flags
   * attached to the content - only the flag with the provided id.
   *
   * @param int $flag_id
   *   The id of the flag for which to retrieve content.
   *
   * @return FlaggableContent|NULL
   *   The content attached to the flag.
   *
   * @throws \DBCDK\CommunityServices\ApiException
   *   Thrown if we are not able to retrieve any content from the API.
   */
  public function getContentById($flag_id) {
    $content = $this->getContent(['where' => ['id' => $flag_id], 'limit' => 1]);
    return array_shift($content);
  }

  /**
   * Get a piece of flaggable content and ALL flags attached to a specific flag.
   *
   * @param int $flag_id
   *   The id of the flag for which to retrieve content.
   *
   * @return FlaggableContent|NULL
   *   The content attached to the flag with all other attached flags included
   *   as well.
   *
   * @throws \DBCDK\CommunityServices\ApiException
   *   Thrown if we are not able to retrieve any content from the API.
   */
  public function getContentByIdAllFlags($flag_id) {
    $flagged_content = $this->getContentById($flag_id);
    if (!empty($flagged_content)) {
      $content_all_flags = $this->getContent();
      foreach ($content_all_flags as $content) {
        if ($flagged_content->equals($content)) {
          $flagged_content->addFlags($content->getFlags());
        }
      }
    }
    return $flagged_content;
  }

}
