<?php

namespace Drupal\dbcdk_community_content\Normalizer\Widget;

use Drupal\Core\Entity\FieldableEntityInterface;
use Drupal\dbcdk_community_content\FieldNormalizer\ColorFieldNormalizer;
use Drupal\dbcdk_community_content\FieldNormalizer\FileFieldNormalizer;
use Drupal\dbcdk_community_content\FieldNormalizer\IntegerFieldNormalizer;
use Drupal\dbcdk_community_content\FieldNormalizer\StringItemFieldNormalizer;
use Drupal\file\FileStorageInterface;

/**
 * Normalizer for the latest reviews widget.
 */
class LatestReviewsWidgetNormalizer extends WidgetNormalizer {

  /**
   * LatestReviewsWidgetNormalizer constructor.
   *
   * @param \Drupal\file\FileStorageInterface $file_storage
   *   The storage to retrieve files from.
   */
  public function __construct(FileStorageInterface $file_storage) {
    $this->fileStorage = $file_storage;
  }

  /**
   * {@inheritdoc}
   */
  protected function getSupportedBundle() {
    return 'latest_reviews';
  }

  /**
   * {@inheritdoc}
   */
  protected function getWidgetName() {
    return 'LatestReviewsWidget';
  }

  /**
   * {@inheritdoc}
   */
  protected function getWidgetConfig(FieldableEntityInterface $object) {
    $data = [
      'displayTitle' => (new StringItemFieldNormalizer())->normalize($object->get('field_title')->first()),
      'reviewsToLoad' => (new IntegerFieldNormalizer())->normalize($object->get('field_num_items')->first()),
    ];

    $background_data = [];
    if (!$object->get('field_color')->isEmpty()) {
      $background_data['backgroundColor'] = (new ColorFieldNormalizer())->normalize($object->get('field_color')->first());
    }
    if (!$object->get('field_background_image')->isEmpty()) {
      $background_data['backgroundImageUrl'] = (new FileFieldNormalizer($this->fileStorage))->normalize($object->get('field_background_image')->first());
    }

    return $data + $background_data;
  }

}
