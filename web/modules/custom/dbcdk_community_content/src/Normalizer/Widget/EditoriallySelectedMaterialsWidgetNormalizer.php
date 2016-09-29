<?php

namespace Drupal\dbcdk_community_content\Normalizer\Widget;

use Drupal\Core\Entity\FieldableEntityInterface;
use Drupal\dbcdk_community_content\FieldNormalizer\MaterialUrlFieldNormalizer;

/**
 * Normalizer for the latest reviews widget.
 */
class EditoriallySelectedMaterialsWidgetNormalizer extends DefaultWidgetNormalizer {

  /**
   * {@inheritdoc}
   */
  protected function getSupportedBundle() {
    return 'editorial_selected_materials';
  }

  /**
   * {@inheritdoc}
   */
  protected function getWidgetName() {
    return 'EditoriallySelectedMaterialsWidget';
  }

  /**
   * {@inheritdoc}
   */
  protected function getWidgetConfig(FieldableEntityInterface $object) {
    $data = [
      'pids' => [],
    ];
    foreach ($object->get('field_posts') as $post_item_url) {
      $data['pids'][] = (new MaterialUrlFieldNormalizer())->normalize($post_item_url);
    }

    return $data + parent::getWidgetConfig($object);
  }

}
