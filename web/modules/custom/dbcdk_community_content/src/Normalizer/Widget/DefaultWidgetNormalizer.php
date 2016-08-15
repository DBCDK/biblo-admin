<?php

namespace Drupal\dbcdk_community_content\Normalizer\Widget;

use Drupal\Core\Entity\FieldableEntityInterface;
use Drupal\dbcdk_community_content\FieldNormalizer\ColorFieldNormalizer;
use Drupal\dbcdk_community_content\FieldNormalizer\FileFieldNormalizer;
use Drupal\dbcdk_community_content\FieldNormalizer\StringItemFieldNormalizer;
use Drupal\file\FileStorageInterface;

/**
 * Base class for widget normalizers containing a set of shared configuration.
 *
 * These normalizers will take an entity of a specific bundle, expect a set of
 * fields to be available and and convert these to a normalized array.
 *
 * Subclasses which want to expact on the normalized array should override
 * getWidgetConfig() and merge their configuration with the result of the parent
 * method.
 *
 * The following fields are expected:
 * - field_title
 * - field_background_color
 * - field_background_image
 *
 * The normalized array will be:
 *
 * {
 *    "widgetName": 'Some name',
 *    "widgetConfig": {
 *      "showTitle": true,
 *      "title": "A title for the widget",
 *      "backgroundColor": #123456,
 *      "backgroundImageUrl": "http://lorempixel.com/400/200/"
 *    }
 * {
 *
 * @see https://github.com/DBCDK/biblo/wiki/Widgets
 */
abstract class DefaultWidgetNormalizer extends WidgetNormalizer {

  /**
   * The file storage to use.
   *
   * @var \Drupal\file\FileStorageInterface
   */
  protected $fileStorage;

  /**
   * DefaultWidgetNormalizer constructor.
   *
   * @param FileStorageInterface $file_storage
   *   The file storage to use e.g. when loading background images.
   */
  public function __construct(FileStorageInterface $file_storage) {
    $this->fileStorage = $file_storage;
  }

  /**
   * Returns the configuration of widget based on the entity to be normalized.
   *
   * This normalization will by default contain reusable properties shared by
   * multiple (potentially all) widgets.
   *
   * @param \Drupal\Core\Entity\FieldableEntityInterface $object
   *   The entity to be normalized.
   *
   * @return mixed
   *   The normalized data.
   */
  protected function getWidgetConfig(FieldableEntityInterface $object) {
    $data = [];

    $title_field = $object->get('field_title');
    if (!$title_field->isEmpty()) {
      $data['title'] = (new StringItemFieldNormalizer())->normalize($title_field->first());
      // If we do not explicitly set showTitle to true then it will be hidden.
      $data['showTitle'] = TRUE;
    }

    $background_color_field = $object->get('field_color');
    if (!$background_color_field->isEmpty()) {
      $data['backgroundColor'] = (new ColorFieldNormalizer())->normalize($background_color_field->first());
    }
    $background_image_field = $object->get('field_background_image');
    if (!$background_image_field->isEmpty()) {
      $data['backgroundImageUrl'] = (new FileFieldNormalizer($this->fileStorage))->normalize($background_image_field->first());
    }

    return $data;
  }

}
