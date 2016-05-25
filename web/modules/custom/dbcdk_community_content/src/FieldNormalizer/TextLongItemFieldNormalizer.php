<?php

namespace Drupal\dbcdk_community_content\FieldNormalizer;

use Drupal\Core\Field\FieldItemBase;

/**
 * Normalize the output for a LongText field.
 */
class TextLongItemFieldNormalizer implements FieldNormalizerInterface {

  /**
   * {@inheritdoc}
   */
  public function normalize(FieldItemBase $field) {
    // The TextLongItem value array contains two indexes (text_format & value).
    // But we only want to return the value.
    // We also trim to remove any extra "\n" that might exist at the end of the
    // value since we only should return HTML markup.
    return trim($field->get('value')->getString());
  }

}
