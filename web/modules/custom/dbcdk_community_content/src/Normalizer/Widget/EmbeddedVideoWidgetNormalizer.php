<?php

namespace Drupal\dbcdk_community_content\Normalizer\Widget;

use Drupal\Core\Entity\FieldableEntityInterface;
use Drupal\dbcdk_community_content\FieldNormalizer\VideoEmbedFieldFieldNormalizer;

/**
 * Normalizer for embedded videos.
 */
class EmbeddedVideoWidgetNormalizer extends WidgetNormalizer {

  /**
   * {@inheritdoc}
   */
  protected function getSupportedBundle() {
    return 'embedded_video';
  }

  /**
   * {@inheritdoc}
   */
  protected function getWidgetName() {
    return 'ContentPageEmbeddedVideoWidget';
  }

  /**
   * {@inheritdoc}
   */
  protected function getWidgetConfig(FieldableEntityInterface $object) {
    $field_normalizer = new VideoEmbedFieldFieldNormalizer();
    return $field_normalizer->normalize($object->get('field_embedded_video')->first());
  }

}
