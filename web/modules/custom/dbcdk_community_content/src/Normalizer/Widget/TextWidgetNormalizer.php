<?php

namespace Drupal\dbcdk_community_content\Normalizer\Widget;

use Drupal\Core\Entity\FieldableEntityInterface;
use Drupal\dbcdk_community_content\FieldNormalizer\TextLongItemFieldNormalizer;

/**
 * Normalizer for texts.
 */
class TextWidgetNormalizer extends WidgetNormalizer {

  /**
   * {@inheritdoc}
   */
  protected function getSupportedBundle() {
    return 'text';
  }

  /**
   * {@inheritdoc}
   */
  protected function getWidgetName() {
    return 'ContentPageTextWidget';
  }

  /**
   * {@inheritdoc}
   */
  protected function getWidgetConfig(FieldableEntityInterface $object) {
    $normalizer = new TextLongItemFieldNormalizer();
    return [
      'content' => $normalizer->normalize($object->get('field_textarea')->first()),
    ];
  }

}
