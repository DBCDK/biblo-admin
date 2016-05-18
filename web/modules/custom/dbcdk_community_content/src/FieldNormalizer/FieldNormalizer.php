<?php

/**
 * @file
 * Contains FieldNormalizer.
 */

namespace Drupal\dbcdk_community_content\FieldNormalizer;

use Drupal\Core\Field\FieldItemBase;

/**
 * Convert a field into a json-acceptable structure.
 */
class FieldNormalizer implements FieldNormalizerInterface {

  /**
   * The suffix for the field normalizer class names.
   *
   * @var string
   */
  const SUFFIX = 'FieldNormalizer';

  /**
   * {@inheritdoc}
   */
  public function normalize(FieldItemBase $field) {
    // Match $field with its corresponding field normalizer.
    $reflection = new \ReflectionClass($field);
    $normalizer = __NAMESPACE__ . '\\' . $reflection->getShortName() . self::SUFFIX;
    if (class_exists($normalizer)) {
      return (new $normalizer)->normalize($field);
    }
    else {
      throw new \InvalidArgumentException('No field-normalizer available for the field-type' . $reflection->getShortName());
    }
  }

}
