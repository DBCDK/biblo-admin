<?php

namespace Drupal\dbcdk_community_content\FieldNormalizer;

use Drupal\Core\Field\FieldItemBase;

/**
 * Normalize the output for field containing urls with material ids.
 */
class ReviewUrlFieldNormalizer implements FieldNormalizerInterface {

  /**
   * {@inheritdoc}
   */
  public function normalize(FieldItemBase $field) {
    $url = $field->get('value')->getString();
    // Matches https://somehost.dk/something/12345 and returns 12345
    if (preg_match('@/([^/0-9]*)@i', $url, $matches)) {
      return $matches[1];
    }

    return NULL;
  }
}
