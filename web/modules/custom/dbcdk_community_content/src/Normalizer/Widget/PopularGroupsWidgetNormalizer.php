<?php

namespace Drupal\dbcdk_community_content\Normalizer\Widget;

use Drupal\Core\Entity\FieldableEntityInterface;
use Drupal\dbcdk_community_content\FieldNormalizer\IntegerFieldNormalizer;

/**
 * Normalizer for the latests posts widget.
 */
class PopularGroupsWidgetNormalizer extends DefaultWidgetNormalizer {

  /**
   * {@inheritdoc}
   */
  protected function getSupportedBundle() {
    return 'popular_groups';
  }

  /**
   * {@inheritdoc}
   */
  protected function getWidgetName() {
    return 'PopularGroupsWidget';
  }

  /**
   * {@inheritdoc}
   */
  protected function getWidgetConfig(FieldableEntityInterface $object) {
    //print_r($object->get('field_num_items')->first());
    $data = [
      'groupsToLoad' => (new IntegerFieldNormalizer())->normalize($object->get('field_num_items')->first()),
    ];

    return $data + parent::getWidgetConfig($object);
  }

}
