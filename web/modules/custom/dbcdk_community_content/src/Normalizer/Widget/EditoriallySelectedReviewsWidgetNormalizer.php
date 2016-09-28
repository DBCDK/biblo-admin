<?php

namespace Drupal\dbcdk_community_content\Normalizer\Widget;

use Drupal\Core\Entity\FieldableEntityInterface;
use Drupal\dbcdk_community_content\FieldNormalizer\ReviewUrlFieldNormalizer;

/**
 * Normalizer for the latest reviews widget.
 */
class EditoriallySelectedReviewsWidgetNormalizer extends DefaultWidgetNormalizer {

  /**
   * {@inheritdoc}
   */
  protected function getSupportedBundle() {
    return 'editorially_selected_reviews';
  }

  /**
   * {@inheritdoc}
   */
  protected function getWidgetName() {
    return 'EditoriallySelectedReviewsWidget';
  }

  /**
   * {@inheritdoc}
   */
  protected function getWidgetConfig(FieldableEntityInterface $object) {
    $data = [
      'reviewIds' => [],
    ];

    foreach ($object->get('field_posts') as $review_item_url) {
      $data['reviewIds'][] = (new ReviewUrlFieldNormalizer())->normalize($review_item_url);
    }

    return $data + parent::getWidgetConfig($object);
  }
}
