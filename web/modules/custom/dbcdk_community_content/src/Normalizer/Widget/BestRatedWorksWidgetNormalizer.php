<?php

namespace Drupal\dbcdk_community_content\Normalizer\Widget;

use Drupal\Core\Entity\FieldableEntityInterface;
use Drupal\dbcdk_community_content\FieldNormalizer\IntegerFieldNormalizer;
use Drupal\dbcdk_community_content\FieldNormalizer\StringItemFieldNormalizer;

/**
 * Normalizer for the latests posts widget.
 */
class BestRatedWorksWidgetNormalizer extends DefaultWidgetNormalizer {

  /**
   * {@inheritdoc}
   */
  protected function getSupportedBundle() {
    return 'best_rated_works';
  }

  /**
   * {@inheritdoc}
   */
  protected function getWidgetName() {
    return 'BestRatedWorksWidget';
  }

  /**
   * {@inheritdoc}
   */
  protected function getWidgetConfig(FieldableEntityInterface $object) {
    $data = [
      'size' => (new IntegerFieldNormalizer())->normalize($object->get('field_num_items')->first()),
      'age' => (new IntegerFieldNormalizer())->normalize($object->get('field_age')->first()),
      'ratingParameter' => (new IntegerFieldNormalizer())->normalize($object->get('field_rating')->first()),
      'countsParameter' => (new IntegerFieldNormalizer())->normalize($object->get('field_count')->first()),
      'worktypes' => [],
    ];
    foreach ($object->get('field_work_types') as $worktype) {
      $data['worktypes'][] = (new StringItemFieldNormalizer())->normalize($worktype);
    }

    return $data + parent::getWidgetConfig($object);
  }

}
