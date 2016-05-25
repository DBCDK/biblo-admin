<?php

namespace Drupal\dbcdk_community_content\Normalizer;

use Drupal\serialization\Normalizer\ComplexDataNormalizer as SerializationComplexDataNormalizer;

/**
 * Normalize Drupal entity object structures.
 *
 * This is the default Normalizer for entities. All formats that have Encoders
 * registered with the Serializer in the DIC will be normalized with this
 * class unless another Normalizer is registered which supersedes it.
 *
 * We override the original ComplexDataNormalizer to remove the "value" property
 * name and just return the value.
 */
class ComplexDataNormalizer extends SerializationComplexDataNormalizer {

  /**
   * {@inheritdoc}
   */
  public function normalize($object, $format = NULL, array $context = array()) {
    return $this->serializer->normalize($object->getString(), $format, $context);
  }

}
