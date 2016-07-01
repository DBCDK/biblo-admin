<?php

namespace Drupal\dbcdk_community_content\Normalizer\Widget;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Entity\FieldableEntityInterface;
use Drupal\dbcdk_community_content\FieldNormalizer\ImageItemFieldNormalizer;
use Drupal\file\FileStorageInterface;

/**
 * Normalizer for images.
 */
class ImageWidgetNormalizer extends WidgetNormalizer {

  protected $normalizer;

  /**
   * ImageWidgetNormalizer constructor.
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
    $this->normalizer = new ImageItemFieldNormalizer($file_storage, $image_style_storage);
  }

  /**
   * {@inheritdoc}
   */
  protected function getSupportedBundle() {
    return 'image';
  }

  /**
   * {@inheritdoc}
   */
  protected function getWidgetName() {
    return 'ContentPageImageWidget';
  }

  /**
   * {@inheritdoc}
   */
  protected function getWidgetConfig(FieldableEntityInterface $object) {
    return $this->normalizer->normalize($object->get('field_image')->first());
  }

}
