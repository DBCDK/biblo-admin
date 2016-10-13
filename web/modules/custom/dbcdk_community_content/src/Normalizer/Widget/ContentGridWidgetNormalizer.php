<?php

namespace Drupal\dbcdk_community_content\Normalizer\Widget;

use Drupal\Core\Entity\FieldableEntityInterface;
use Drupal\dbcdk_community_content\FieldNormalizer\FileFieldNormalizer;
use Drupal\dbcdk_community_content\FieldNormalizer\StringItemFieldNormalizer;
use Drupal\dbcdk_community_content\FieldNormalizer\UrlFieldNormalizer;

/**
 * Normalizer for content grid widget.
 *
 * @see https://github.com/DBCDK/biblo/tree/master/src/client/components/WidgetContainer/widgets/ContentGridWidget
 */
class ContentGridWidgetNormalizer extends DefaultWidgetNormalizer {

  /**
   * {@inheritdoc}
   */
  protected function getSupportedBundle() {
    return 'content_grid';
  }

  /**
   * {@inheritdoc}
   */
  protected function getWidgetName() {
    return 'ContentGridWidget';
  }

  /**
   * {@inheritdoc}
   */
  protected function getWidgetConfig(FieldableEntityInterface $object) {
    $config = [
      'items' => [],
    ];

    // A content grid consists of multiple items each with their own
    // configuration. This maps to a field where each value corresponds to an
    // item.
    $id = 1;
    foreach ($object->get('field_content_grid_items') as $grid_item_reference) {
      /* @var \Drupal\Core\Field\FieldItemInterface $grid_item_reference */
      $grid_item = $grid_item_reference->get('entity')->getValue();

      $item_config = [];

      // Set a numeric id for each item.
      $item_config['id'] = $id++;

      // Add optional widget specific configuration based on field values.
      $title_field = $grid_item->get('field_title');
      if (!$title_field->isEmpty()) {
        $item_config['title'] = (new StringItemFieldNormalizer())->normalize($title_field->first());
      }

      $text_field = $grid_item->get('field_text');
      if (!$text_field->isEmpty()) {
        $item_config['text'] = (new StringItemFieldNormalizer())->normalize($text_field->first());
      }

      $image_field = $grid_item->get('field_image');
      if (!$image_field->isEmpty()) {
        $item_config['imageUrl'] = (new FileFieldNormalizer($this->fileStorage))->normalize($image_field->first());
      }

      $link_field = $grid_item->get('field_link');
      if (!$link_field->isEmpty()) {
        $item_config['url'] = (new UrlFieldNormalizer())->normalize($link_field->first());
      }

      $config['items'][] = $item_config;
    }

    return $config;
  }

}
