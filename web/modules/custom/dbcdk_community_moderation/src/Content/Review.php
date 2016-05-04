<?php
/**
 * @file
 * Review class definition.
 */

namespace Drupal\dbcdk_community_moderation\Content;

use \DBCDK\CommunityServices\Model\Review as ModelReview;

/**
 * Review model.
 *
 * This class extends the generated Review class to ensure that it implements
 * the FlaggableContentInterface.
 */
class Review extends ModelReview implements FlaggableContentInterface {
  use FlaggableTrait;

  /**
   * Review constructor.
   *
   * @param \DBCDK\CommunityServices\Model\Review|NULL $review
   *   The generated Review class to base the object on.
   */
  public function __construct(ModelReview $review = NULL) {
    $data = (!empty($review)) ? get_object_vars($review) : [];
    parent::__construct($data);
  }

  /**
   * {@inheritdoc}
   */
  public function getContent() {
    return sprintf('%s (Rating: %s, PID: %s)', parent::getContent(), $this->getRating(), $this->getPid());
  }

  /**
   * {@inheritdoc}
   */
  public function getCreatorId() {
    return $this->getReviewownerid();
  }

  /**
   * {@inheritdoc}
   */
  public function getTimeCreated() {
    return $this->getCreated();
  }

  /**
   * {@inheritdoc}
   */
  public function equals($other) {
    /* @var $other Post */
    return get_class($other) === self::class && $this->getId() == $other->getId();
  }

}
