<?php

namespace Drupal\dbcdk_community_content\FieldNormalizer;

use Drupal\Core\Field\FieldItemBase;

/**
 * Normalizer for color fields.
 *
 * @see https://www.drupal.org/project/color_field
 */
class ColorFieldNormalizer implements FieldNormalizerInterface {

  /**
   * {@inheritdoc}
   */
  public function normalize(FieldItemBase $field) {
    // We only care about the color value for now.
    $value = array_intersect_key($field->getValue(), ['color' => 1]);
    // The color is in HEX format. Prepend # to make it immediately usable.
    $value = array_map(function($value) {
      return '#' . $value;
    }, $value);
    // Return the color (if available).
    return array_shift($value);
  }

}
