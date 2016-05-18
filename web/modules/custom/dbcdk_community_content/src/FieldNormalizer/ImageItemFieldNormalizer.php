<?php

namespace Drupal\dbcdk_community_content\FieldNormalizer;

use Drupal\Core\Field\FieldItemBase;
use Drupal\file\Entity\File;
use Drupal\image\Entity\ImageStyle;

/**
 * Normalize the output for an Image field.
 */
class ImageItemFieldNormalizer implements FieldNormalizerInterface {

  /**
   * {@inheritdoc}
   */
  public function normalize(FieldItemBase $field) {
    // Load the file by target_id.
    /* @var \Drupal\file\Entity\File $image */
    $image = File::load($field->get('target_id')->getString());

    // Set field values to the output array.
    $output = [];
    $output['alt'] = $field->get('alt')->getString();
    $output['title'] = $field->get('title')->getString();
    $output['original'] = $image->toUrl()->getUri();

    // Add urls to a processed version of the image.
    $image_styles = [
      'thumbnail',
      'small',
      'medium',
      'large',
    ];
    foreach ($image_styles as $image_style_name) {
      /* @var \Drupal\image\Entity\ImageStyle $image_style */
      $image_style = ImageStyle::load($image_style_name);
      // ImageStyle::load() will return NULL if the $image_style doesn't exist.
      if (!empty($image_style)) {
        // Add the processed image url to the output array.
        $output[$image_style_name] = $image_style->buildUrl($image->get('uri')->getString());
      }
    }

    return $output;
  }

}
