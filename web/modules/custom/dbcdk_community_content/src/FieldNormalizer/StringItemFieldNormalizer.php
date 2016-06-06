<?php

namespace Drupal\dbcdk_community_content\FieldNormalizer;

use Drupal\Core\Field\FieldItemBase;

/**
 * Normalize the output for a StringItem field.
 */
class StringItemFieldNormalizer implements FieldNormalizerInterface {

  /**
   * {@inheritdoc}
   */
  public function normalize(FieldItemBase $field) {
    return $field->get('value')->getString();
  }

}
