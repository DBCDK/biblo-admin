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
    // Color fields support both color and opacity. We only care about the color
    // value for now.
    return $field->getValue()['color'];
  }

}
