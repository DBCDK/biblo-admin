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
    return 'latest_posts';
  }

  /**
   * {@inheritdoc}
   */
  protected function getWidgetName() {
    return 'LatestGroupPostsWidget';
  }

  /**
   * {@inheritdoc}
   */
  protected function getWidgetConfig(FieldableEntityInterface $object) {
    $data = [
      'postsToLoad' => (new IntegerFieldNormalizer())->normalize($object->get('field_num_items')->first()),
    ];
    $group_field = $object->get('field_community_service_group');
    if (!$group_field->isEmpty()) {
      $data['group'] = (new IntegerFieldNormalizer())->normalize($group_field->first());
    }

    return $data + parent::getWidgetConfig($object);
  }

}
