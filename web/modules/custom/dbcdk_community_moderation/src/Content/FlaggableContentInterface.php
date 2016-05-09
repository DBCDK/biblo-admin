<?php
/**
 * @file
 * FlaggableContentInterface definition.
 */

namespace Drupal\dbcdk_community_moderation\Content;

use DBCDK\CommunityServices\Model\Flag;

/**
 * A piece of community content with 0 or more flags attached.
 *
 * Users can flag content to bring it to attention of the moderators
 * of the site. Objects of this class represent pieces of such content
 * with attached flags.
 */
interface FlaggableContentInterface {

  /**
   * Get the id for the piece of content.
   *
   * @return float
   *   The content id.
   */
  public function getId();

  /**
   * Get the content for the piece of content.
   *
   * @return string
   *   The actual flagged content.
   */
  public function getContent();

  /**
   * Get when the content was originally created.
   *
   * @return \DateTime
   *   The creation time.
   */
  public function getTimeCreated();

  /**
   * Get the id of the profile that created this piece of content.
   *
   * @see DBCDK\CommunityServices\Api\ProfileApi
   *
   * @return int
   *   The creator profile id.
   */
  public function getCreatorId();

  /**
   * Attach a flag to this piece of content.
   *
   * @param Flag $flag
   *   The flag to attach.
   *
   * @return FlaggableContentInterface
   *   Return the current object.
   */
  public function addFlag(Flag $flag);

  /**
   * Attach multiple flags to this piece of content.
   *
   * @param Flag[] $flags
   *   The flags to attach.
   *
   * @return FlaggableContentInterface
   *   Return the current object.
   */
  public function addFlags(array $flags);

  /**
   * Get all flags attached to this piece of content.
   *
   * @return Flag[]
   *   All attached flags.
   */
  public function getFlags();

  /**
   * Get the most recent flag attached to this piece of content.
   *
   * Most recent is the time where the flag was created.
   *
   * @return Flag
   *   The most recent flag.
   */
  public function getLatestFlag();

  /**
   * Get all unread flags attached to this piece of content.
   *
   * @return Flag[]
   *   All unread flags.
   */
  public function getUnreadFlags();

  /**
   * Function to check equality of two FlaggableContent objects.
   *
   * @param mixed $other
   *   The object to compare against.
   *
   * @return bool
   *   Whether the two objects are considered equal.
   */
  public function equals($other);

}
