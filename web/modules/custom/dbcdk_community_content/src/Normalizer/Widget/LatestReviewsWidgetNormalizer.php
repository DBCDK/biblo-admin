<?php

namespace Drupal\dbcdk_community_content\Normalizer\Widget;

use Drupal\Core\Entity\FieldableEntityInterface;
use Drupal\dbcdk_community_content\FieldNormalizer\IntegerFieldNormalizer;

/**
 * Normalizer for the latest reviews widget.
 */
class LatestReviewsWidgetNormalizer extends DefaultWidgetNormalizer {

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
      'reviewsToLoad' => (new IntegerFieldNormalizer())->normalize($object->get('field_num_items')->first()),
    ];
    $campaign_field = $object->get('field_community_service_campaign');
    if (!$campaign_field->isEmpty()) {
      $data['campaignId'] = (new IntegerFieldNormalizer())->normalize($campaign_field->first());
    }

    return $data + parent::getWidgetConfig($object);
  }

}
