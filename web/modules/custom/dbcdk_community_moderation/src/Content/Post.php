<?php
/**
 * @file
 * Post class definition.
 */

namespace Drupal\dbcdk_community_moderation\Content;

use DBCDK\CommunityServices\Model\Post as ModelPost;

/**
 * Post model.
 *
 * This class extends the generated Post class to ensure that it implements
 * the FlaggableContentInterface.
 */
class Post extends ModelPost implements FlaggableContentInterface {
  use FlaggableTrait;

  /**
   * Post constructor.
   *
   * @param \DBCDK\CommunityServices\Model\Post|NULL $post
   *   The generated Post class to base the object on.
   */
  public function __construct(ModelPost $post = NULL) {
    $data = (!empty($post)) ? get_object_vars($post) : [];
    parent::__construct($data);
  }

  /**
   * {@inheritdoc}
   */
  public function getContent() {
    $content = [
      $this->getTitle(),
      parent::getContent(),
    ];
    $content = array_filter($content, function ($c) {
      return $c !== NULL && $c !== '';
    });
    return implode(':', $content);
  }

  /**
   * {@inheritdoc}
   */
  public function getCreatorId() {
    return $this->getPostownerid();
  }

  /**
   * {@inheritdoc}
   */
  public function equals($other) {
    /* @var $other Post */
    return get_class($other) === self::class && $this->getId() == $other->getId();
  }

}
