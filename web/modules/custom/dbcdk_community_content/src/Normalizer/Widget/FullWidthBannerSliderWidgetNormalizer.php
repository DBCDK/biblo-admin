<?php
namespace Drupal\dbcdk_community_content\Normalizer\Widget;

use Drupal\Core\Entity\FieldableEntityInterface;
use Drupal\dbcdk_community_content\FieldNormalizer\IntegerFieldNormalizer;
use Drupal\dbcdk_community_content\Normalizer\Widget\FullWidthBannerWidgetNormalizer;

/**
 * Normalizer for Full width Banner Slider widget.
 *
 * @see https://github.com/DBCDK/biblo/tree/master/src/client/components/WidgetContainer/widgets/FullWidthBannerSliderWidget
 */
class FullWidthBannerSliderWidgetNormalizer extends DefaultWidgetNormalizer {

  /**
   * {@inheritdoc}
   */
  protected function getSupportedBundle() {
    return 'full_width_banner_slider';
  }

  /**
   * {@inheritdoc}
   */
  protected function getWidgetName() {
    return 'FullWidthBannerSliderWidget';
  }


  /**
   * {@inheritdoc}
   */
  protected function getWidgetConfig(FieldableEntityInterface $object) {
    $config = [
      'items' => [],
    ];
    $TTN = (new IntegerFieldNormalizer())->normalize($object->get('field_ttn')->first()) * 1000;
    $id = 1;

    // Map over Slider content items
    foreach ($object->get('field_slider_item') as $grid_item_reference) {
      $grid_item = $grid_item_reference->get('entity')->getValue();

      // each item in a slider is a Full Width Banner
      $item = (new FullWidthBannerWidgetNormalizer($this->fileStorage))->normalize($grid_item)['widgetConfig'];

      // Set a numeric id for each item.
      $item['id'] = $id++;

      // Set slider time for each item.
      $item['TTN'] = $TTN;

      $config['items'][] = $item;
    }

    return parent::getWidgetConfig($object) + $config;
  }

}
