<?php
/**
 * @file
 * Comment class definition.
 */

namespace Drupal\dbcdk_community_moderation\Content;

use DBCDK\CommunityServices\Model\Comment as ModelComment;

/**
 * Comment model.
 *
 * This class extends the generated Comment class to ensure that it implements
 * the FlaggableContentInterface.
 */
class Comment extends ModelComment implements FlaggableContentInterface {
  use FlaggableTrait;

  /**
   * Comment constructor.
   *
   * @param \DBCDK\CommunityServices\Model\Comment|NULL $comment
   *   The generated comment class to base the object on.
   */
  public function __construct(ModelComment $comment = NULL) {
    $data = (!empty($comment)) ? get_object_vars($comment) : [];
    parent::__construct($data);
  }

  /**
   * {@inheritdoc}
   */
  public function getCreatorId() {
    return $this->getCommentownerid();
  }

  /**
   * {@inheritdoc}
   */
  public function equals($other) {
    /* @var $other Comment */
    return get_class($other) === self::class && $this->getId() == $other->getId();
  }

}
