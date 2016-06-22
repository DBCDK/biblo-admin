<?php

namespace Drupal\dbcdk_community_content\Normalizer\Widget;

use Drupal\Core\Entity\FieldableEntityInterface;
use Drupal\dbcdk_community_content\FieldNormalizer\ImageItemFieldNormalizer;

/**
 * Normalizer for images.
 */
class ImageWidgetNormalizer extends WidgetNormalizer {

  /**
   * {@inheritdoc}
   */
  protected function getSupportedBundle() {
    return 'image';
  }

  /**
   * {@inheritdoc}
   */
  protected function getWidgetName() {
    return 'ContentPageImageWidget';
  }

  /**
   * {@inheritdoc}
   */
  protected function getWidgetConfig(FieldableEntityInterface $object) {
    $normalizer = new ImageItemFieldNormalizer();
    return $normalizer->normalize($object->get('field_image')->first());
  }

}
