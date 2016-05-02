<?php

/**
 * @file
 * Contains \Drupal\dbcdk_community\Plugin\Block\FlaggedContentFlagList.
 */

namespace Drupal\dbcdk_community_moderation\Plugin\Block;

use DBCDK\CommunityServices\ApiException;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Datetime\DateFormatterInterface;
use Drupal\Core\Form\FormBuilder;
use Drupal\Core\Link;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\dbcdk_community_moderation\Content\FlaggableContentRepository;
use DBCDK\CommunityServices\Api\ProfileApi;

/**
 * Provides a 'FlaggedContentFlagList' block.
 *
 * @Block(
 *  id = "flagged_content_flag_list_block",
 *  admin_label = @Translation("Flagged content flag list"),
 *  context = {
 *    "flag_id" = @ContextDefinition("integer")
 *  }
 * )
 */
class FlaggedContentFlagListBlock extends BlockBase implements ContainerFactoryPluginInterface {
  use LoggerAwareTrait;

  /**
   * The repository to use for retrieving flaggable content to show in the list.
   *
   * @var FlaggableContentRepository
   */
  protected $flaggableContentRepository;

  /**
   * The profile api to use for retrieving information about content owners.
   *
   * @var ProfileApi
   */
  protected $profileApi;

  /**
   * The form builder to use to allow users to interact with flags.
   *
   * @var FormBuilder
   */
  protected $formBuilder;

  /**
   * The date formatter to use.
   *
   * @var DateFormatterInterface
   */
  protected $dateFormatter;

  /**
   * Construct.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param string $plugin_definition
   *   The plugin implementation definition.
   * @param LoggerInterface $logger
   *   The logger to use.
   * @param FlaggableContentRepository $repository
   *   The repository to use.
   * @param ProfileApi $profile_api
   *   The profile api to use.
   * @param FormBuilder $form_builder
   *   The form builder to use.
   * @param DateFormatterInterface $date_formatter
   *   The date formatter to use.
   */
  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    LoggerInterface $logger,
    FlaggableContentRepository $repository,
    ProfileApi $profile_api,
    FormBuilder $form_builder,
    DateFormatterInterface $date_formatter
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->logger = $logger;
    $this->flaggableContentRepository = $repository;
    $this->profileApi = $profile_api;
    $this->formBuilder = $form_builder;
    $this->dateFormatter = $date_formatter;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('dbcdk_community.logger'),
      $container->get('dbcdk_community_moderation.content.flaggable_content_repository'),
      $container->get('dbcdk_community.api.profile'),
      $container->get('form_builder'),
      $container->get('date.formatter')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $flag_id = $this->getContextValue('flag_id');

    try {
      /* @var \Drupal\dbcdk_community_moderation\Content\FlaggableContentInterface $content */
      $content = $this->flaggableContentRepository->getContentByIdAllFlags($flag_id);
      $flags = $content->getFlags();
      $unread_flags = $content->getUnreadFlags();
    }
    catch (ApiException $e) {
      // If the API fails then provide a dummy piece of content with no flags.
      // The display should handle the rest.
      $this->logger->error($e);
      $flags = [];
      $unread_flags = [];
    }

    $table = [
      '#theme' => 'table',
      '#header' => [
        $this->t('Time flagged'),
        $this->t('Description'),
        $this->t('Flagged by'),
        $this->t('Read'),
      ],
      '#rows' => [],
      '#empty' => $this->t('No flags found for this piece of content.'),
    ];

    foreach (array_reverse($flags) as $flag) {
      /* @var \DBCDK\CommunityServices\Model\Flag $flag */

      try {
        $profile = $this->profileApi->profileFindById($flag->getOwnerId());
        $profile_string = Link::createFromRoute(
          $profile->getUsername(),
          'page_manager.page_view_dbcdk_community_profile',
          ['username' => $profile->getUsername()]
        );
      }
      catch (ApiException $e) {
        // If we are unable to get the profile then display the profile id.
        $profile_string = $this->t(
          'Profile %id',
          ['%id' => $flag->getOwnerId()]
        );
        $this->logger->error($e);
      }

      $table['#rows'][] = [
        $this->dateFormatter->format($flag->getTimeFlagged()->getTimestamp(), 'dbcdk_community_service_date_time'),
        $flag->getDescription(),
        $profile_string,
        $flag->getMarkedAsRead() ? $this->t('Yes') : $this->t('No'),
      ];
    }

    // If there are  any unread flags then support marking them all as read.
    $form = NULL;
    if (!empty($unread_flags)) {
      $form = $this->formBuilder->getForm('Drupal\dbcdk_community_moderation\Form\FlagsMarkReadForm', $unread_flags);
    }

    return [
      'table' => $table,
      'form' => $form,
      '#cache' => [
        'max-age' => 0,
      ],
    ];
  }

}
