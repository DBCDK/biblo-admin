<?php

namespace Drupal\dbcdk_community_content\FieldNormalizer;

use Drupal\Core\Field\FieldItemBase;

/**
 * Normalizer for Link fields.
 *
 * This will reduce them to the url of the field.
 */
class UrlFieldNormalizer implements FieldNormalizerInterface {

  /**
   * {@inheritdoc}
   */
  public function normalize(FieldItemBase $field) {
    /* @var \Drupal\link\Plugin\Field\FieldType\LinkItem $field */
    return $field->getUrl()->getUri();
  }

}
