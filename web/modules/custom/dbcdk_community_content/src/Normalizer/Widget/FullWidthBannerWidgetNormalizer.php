<?php

namespace Drupal\dbcdk_community_content\Normalizer\Widget;

use Drupal\Core\Entity\FieldableEntityInterface;
use Drupal\dbcdk_community_content\FieldNormalizer\StringItemFieldNormalizer;
use Drupal\dbcdk_community_content\FieldNormalizer\FileFieldNormalizer;
use Drupal\dbcdk_community_content\FieldNormalizer\UrlFieldNormalizer;
use Drupal\file\FileStorageInterface;

/**
 * Normalizer for full banner widgets.
 *
 * @see https://github.com/DBCDK/biblo/tree/master/src/client/components/WidgetContainer/widgets/FullWidthBannerWidget
 */
class FullWidthBannerWidgetNormalizer extends WidgetNormalizer {

  /**
   * Normalizer for banner images.
   *
   * We only care about the public URL for these so we use a simple
   * FileFieldNormalizer.
   *
   * @var FileFieldNormalizer
   */
  protected $imageNormalizer;

  /**
   * Normalizer for banner texts.
   *
   * @var StringItemFieldNormalizer
   */
  protected $stringNormalizer;

  /**
   * Normalizer for link fields.
   *
   * We only care about the URL here.
   *
   * @var UrlFieldNormalizer
   */
  protected $urlNormalizer;

  /**
   * FullWidthBannerWidgetNormalizer constructor.
   *
   * @param \Drupal\file\FileStorageInterface $file_storage
   *   The file storage to use.
   */
  public function __construct(FileStorageInterface $file_storage) {
    $this->urlNormalizer = new UrlFieldNormalizer();
    $this->stringNormalizer = new StringItemFieldNormalizer();
    $this->imageNormalizer = new FileFieldNormalizer($file_storage);
  }

  /**
   * {@inheritdoc}
   */
  protected function getSupportedBundle() {
    return 'full_width_banner';
  }

  /**
   * {@inheritdoc}
   */
  protected function getWidgetName() {
    return 'FullWidthBannerWidget';
  }

  /**
   * {@inheritdoc}
   */
  protected function getWidgetConfig(FieldableEntityInterface $object) {
    // Build basic data for the banner.
    $data = [];
    if (!$object->get('field_title')->isEmpty()) {
      $data['title'] = $this->stringNormalizer->normalize($object->get('field_title')->first());
    }
    if (!$object->get('field_text')->isEmpty()) {
      $data['description'] = $this->stringNormalizer->normalize($object->get('field_text')->first());
    }
    if (!$object->get('field_link')->isEmpty()) {
      $data['linkUrl'] = $this->urlNormalizer->normalize($object->get('field_link')->first());
    }

    // We support these different versions of images for the banner.
    // These should be ordered in size from largest to smallest.
    $versions = ['desktopImageUrl', 'tabletImageUrl', 'mobileImageUrl'];
    // The image field supports multiple values. Normalize each of them.
    $images = [];
    foreach ($object->get('field_versioned_image') as $field) {
      $images[] = $this->imageNormalizer->normalize($field);
    }
    // Ensure that we have an image for each version by taking the smallest and
    // repeating it until we have enough. If we have three versions and two
    // images then the last image will be reused for the two smallest versions.
    $smallest_image = array_pop($images);
    $images = array_pad($images, count($versions), $smallest_image);
    // If there are more images than version then disregard the smallest.
    $images = array_slice($images, 0, count($versions));
    // Build final map from versions to image urls.
    $versioned_images = array_combine($versions, $images);

    return $data + $versioned_images;
  }

}
