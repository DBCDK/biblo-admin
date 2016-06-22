<?php

namespace Drupal\dbcdk_community_content\Normalizer\Widget;

use Drupal\Core\Entity\FieldableEntityInterface;
use Drupal\dbcdk_community_content\FieldNormalizer\StringItemFieldNormalizer;

/**
 * Normalizer for fact boxes.
 */
class FactBoxWidgetNormalizer extends TextWidgetNormalizer {

  /**
   * {@inheritdoc}
   */
  public function getSupportedBundle() {
    return 'fact_box';
  }

  /**
   * {@inheritdoc}
   */
  public function getWidgetName() {
    return 'FactBoxWidget';
  }

  /**
   * {@inheritdoc}
   */
  public function getWidgetConfig(FieldableEntityInterface $object) {
    $config = parent::getWidgetConfig($object);

    $normalizer = new StringItemFieldNormalizer();
    $config['title'] = $normalizer->normalize($object->get('field_title')->first());

    return $config;
  }

}
