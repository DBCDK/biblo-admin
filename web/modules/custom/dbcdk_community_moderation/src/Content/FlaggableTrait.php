<?php
/**
 * @file
 * FlaggableTrait definition.
 */

namespace Drupal\dbcdk_community_moderation\Content;


use DBCDK\CommunityServices\Model\Flag;

trait FlaggableTrait {
  /**
   * The flags attached to the content.
   *
   * @var Flag[] $flags
   */
  protected $flags = [];

  /**
   * Attach a flag to this piece of content.
   *
   * @param Flag $flag
   *   The flag to attach.
   *
   * @return FlaggableContentInterface
   *   Return the current object.
   */
  public function addFlag(Flag $flag) {
    $this->flags = array_unique(array_merge($this->flags, [$flag]));
    usort(
      $this->flags,
      function (Flag $a, Flag $b) {
        $a_timestamp = NULL;
        $b_timestamp = NULL;
        if (!empty($a->getTimeFlagged())) {
          $a_timestamp = $a->getTimeFlagged()->getTimestamp();
        }
        if (!empty($b->getTimeFlagged())) {
          $b_timestamp = $b->getTimeFlagged()->getTimestamp();
        }
        return $a_timestamp - $b_timestamp;
      }
    );
    return $this;
  }

  /**
   * Attach multiple flags to this piece of content.
   *
   * @param Flag[] $flags
   *   The flags to attach.
   *
   * @return FlaggableContentInterface
   *   Return the current object.
   */
  public function addFlags(array $flags) {
    array_walk(
      $flags,
      function (Flag $flag) {
        $this->addFlag($flag);
      }
    );
    return $this;
  }

  /**
   * Get all flags attached to this piece of content.
   *
   * @return Flag[]
   *   All attached flags.
   */
  public function getFlags() {
    return $this->flags;
  }

  /**
   * Get the most recent flag attached to this piece of content.
   *
   * Most recent is the time where the flag was created.
   *
   * @return Flag
   *   The most recent flag.
   */
  public function getLatestFlag() {
    $flags = array_reverse($this->flags);
    return array_shift($flags);
  }

  /**
   * Get all unread flags attached to this piece of content.
   *
   * @return Flag[]
   *   All unread flags.
   */
  public function getUnreadFlags() {
    return array_filter(
      $this->flags,
      function (Flag $flag) {
        return !$flag->getMarkedAsRead();
      }
    );
  }

}
