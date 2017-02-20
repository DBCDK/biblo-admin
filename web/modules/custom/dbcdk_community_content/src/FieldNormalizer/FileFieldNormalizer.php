<?php

namespace Drupal\dbcdk_community_content\FieldNormalizer;

use Drupal\Core\Field\FieldItemBase;
use Drupal\file\FileStorageInterface;

/**
 * Field normalizer for file fields.
 *
 * This will normalize them to their public URL.
 */
class FileFieldNormalizer implements FieldNormalizerInterface {

  /**
   * The storage to use when retrieving files.
   *
   * @var FileStorageInterface
   */
  protected $fileStorage;

  /**
   * Returns a protocol relative url
   *
   * Removes the protocol from a given url.
   *
   * @param $url string
   *
   * @return string
   */
  private function protocolRelativeUrl($url){
    $data = preg_split("/:/", $url);
    return $data[1];
  }

  /**
   * FileFieldNormalizer constructor.
   *
   * @param FileStorageInterface $file_storage
   *   The storage to use when retrieving files.
   */
  public function __construct(FileStorageInterface $file_storage) {
    $this->fileStorage = $file_storage;
  }

  /**
   * {@inheritdoc}
   */
  public function normalize(FieldItemBase $field) {
    /* @var \Drupal\file\Plugin\Field\FieldType\FileItem $field */
    $file = $this->fileStorage->load($field->get('target_id')->getString());
    return $this->protocolRelativeUrl($file->toUrl()->getUri());
  }

}
