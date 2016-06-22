<?php

namespace Drupal\dbcdk_community_content\Normalizer;

use Drupal\serialization\Normalizer\EntityReferenceFieldItemNormalizer as SerializationEntityReferenceFieldItemNormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * Converts Drupal entity reference item object to an array structure.
 *
 * The reason why we override the original EntityReferenceFieldItemNormalizer is
 * because we wish to expose the value from a referenced entity instead of the
 * target id.
 */
class EntityReferenceFieldItemNormalizer extends SerializationEntityReferenceFieldItemNormalizer {

  /**
   * The normalizers which can be used to normalize the referenced entity.
   *
   * @var NormalizerInterface[] $normalizers
   */
  protected $normalizers;

  /**
   * EntityReferenceFieldItemNormalizer constructor.
   *
   * @param NormalizerInterface[] $normalizers
   *   Supported normalizers.
   */
  public function __construct($normalizers) {
    $this->normalizers = $normalizers;
  }

  /**
   * {@inheritdoc}
   */
  public function normalize($field_item, $format = NULL, array $context = array()) {
    $normalizers = array_filter(
      $this->normalizers,
      function (NormalizerInterface $normalizer) use ($field_item, $format) {
        return $normalizer->supportsNormalization($field_item, $format);
      }
    );
    $callbacks = array_map(
      function (NormalizerInterface $normalizer) {
        return [$normalizer, 'normalize'];
      },
      $normalizers
    );
    $callbacks[] = function ($field_item, $format, $context) {
      return parent::normalize($field_item, $format, $context);
    };
    $normalizer = array_shift($callbacks);
    return call_user_func($normalizer, $field_item, $format, $context);
  }

}
