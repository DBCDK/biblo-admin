<?php

namespace Drupal\dbcdk_community_content\Normalizer\Widget;

use Drupal\Core\Entity\FieldableEntityInterface;
use Drupal\dbcdk_community_content\FieldNormalizer\IntegerFieldNormalizer;

/**
 * Normalizer for the latests posts widget.
 */
class LatestPostsWidgetNormalizer extends DefaultWidgetNormalizer {

  /**
   * {@inheritdoc}
   */
  protected function getSupportedBundle() {
    return 'latest_posts_all_groups';
  }

  /**
   * {@inheritdoc}
   */
  protected function getWidgetName() {
    return 'LatestPostsWidget';
  }

  /**
   * {@inheritdoc}
   */
  protected function getWidgetConfig(FieldableEntityInterface $object) {
    $data = [
      'postsToLoad' => (new IntegerFieldNormalizer())->normalize($object->get('field_num_items')->first()),
    ];
    return $data + parent::getWidgetConfig($object);
  }

}
