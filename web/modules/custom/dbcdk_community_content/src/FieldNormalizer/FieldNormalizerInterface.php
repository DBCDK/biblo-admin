<?php

/**
 * @file
 * Contains FieldNormalizerInterface.
 */

namespace Drupal\dbcdk_community_content\FieldNormalizer;

use Drupal\Core\Field\FieldItemBase;

/**
 * Normalize the output for a field object.
 */
interface FieldNormalizerInterface {

  /**
   * Normalize the output for a field object.
   *
   * @param \Drupal\Core\Field\FieldItemBase $field
   *   The field to normalize.
   *
   * @return mixed
   *   The normalized output.
   */
  public function normalize(FieldItemBase $field);

}
