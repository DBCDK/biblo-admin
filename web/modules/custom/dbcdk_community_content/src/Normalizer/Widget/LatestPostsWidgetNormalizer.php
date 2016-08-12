<?php

namespace Drupal\dbcdk_community_content\Normalizer\Widget;

use Drupal\Core\Entity\FieldableEntityInterface;
use Drupal\dbcdk_community_content\FieldNormalizer\IntegerFieldNormalizer;
use Drupal\dbcdk_community_content\FieldNormalizer\StringItemFieldNormalizer;

/**
 * Normalizer for the latests posts widget.
 */
class LatestPostsWidgetNormalizer extends WidgetNormalizer {

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
      'displayTitle' => (new StringItemFieldNormalizer())->normalize($object->get('field_title')->first()),
      'postsToLoad' => (new IntegerFieldNormalizer())->normalize($object->get('field_num_items')->first()),
    ];
    $group_field = $object->get('field_community_service_group');
    if (!$group_field->isEmpty()) {
      $data['group'] = (new IntegerFieldNormalizer())->normalize($group_field->first());
    }

    return $data;
  }

}
