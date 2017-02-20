<?php

namespace Drupal\dbcdk_community_content\FieldNormalizer;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\FieldItemBase;
use Drupal\file\FileStorageInterface;

/**
 * Normalize the output for an Image field.
 */
class ImageItemFieldNormalizer {

  /**
   * The storage to load files from.
   *
   * @var FileStorageInterface
   */
  protected $fileStorage;

  /**
   * The storage to load image styles from.
   *
   * @var EntityStorageInterface
   */
  protected $imageStyleStorage;

  /**
   * ImageItemFieldNormalizer constructor.
   *
   * @param \Drupal\file\FileStorageInterface $file_storage
   *   The file storage to use.
   * @param \Drupal\Core\Entity\EntityStorageInterface $image_style_storage
   *   The image style storage to use.
   */
  public function __construct(
    FileStorageInterface $file_storage,
    EntityStorageInterface $image_style_storage
  ) {
    $this->fileStorage = $file_storage;
    $this->imageStyleStorage = $image_style_storage;
  }

  /**
   * Returns a protocol relative url
   *
   * @param $url
   * @return String
   */
  private function protocolRelativeUrl($url){
    return preg_split("/:/", $url)[1];
  }

  /**
   * {@inheritdoc}
   */
  public function normalize(FieldItemBase $field) {
    // Load the file by target_id.
    /* @var \Drupal\file\Entity\File $image */
    $image = $this->fileStorage->load($field->get('target_id')->getString());

    // Set field values to the output array.
    $output = [];
    $output['alt'] = $field->get('alt')->getString();
    $output['title'] = $field->get('title')->getString();
    $output['original'] = $this->protocolRelativeUrl($image->toUrl()->getUri());

    // Add urls to a processed version of the image.
    $image_styles = [
      'thumbnail',
      'small',
      'medium',
      'large',
    ];
    foreach ($image_styles as $image_style_name) {
      /* @var \Drupal\image\Entity\ImageStyle $image_style */
      $image_style = $this->imageStyleStorage->load($image_style_name);
      // load() will return NULL if the $image_style doesn't exist.
      if (!empty($image_style)) {
        // Add the processed image url to the output array.
        $output[$image_style_name] = $this->protocolRelativeUrl($image_style->buildUrl($image->get('uri')->getString()));
      }
    }

    return $output;
  }

}
