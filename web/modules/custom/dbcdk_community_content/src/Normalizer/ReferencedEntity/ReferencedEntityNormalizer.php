<?php

namespace Drupal\dbcdk_community_content\Normalizer\ReferencedEntity;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * Base class for normalizers for referenced entities.
 */
abstract class ReferencedEntityNormalizer implements NormalizerInterface {

  /**
   * {@inheritdoc}
   */
  public function supportsNormalization($field_item, $format = NULL) {
    /* @var \Drupal\Core\Entity\ContentEntityBase $referenced_entity */
    $referenced_entity = $field_item->get('entity')->getValue();
    return $referenced_entity->getEntityTypeId() == $this->getSupportedEntityType();
  }

  /**
   * {@inheritdoc}
   */
  public function normalize($object, $format = NULL, array $context = array()) {
    /* @var \Drupal\Core\Entity\ContentEntityBase $referenced_entity */
    $referenced_entity = $object->get('entity')->getValue();
    return $this->normalizeReferencedEntity($referenced_entity, $format, $context);
  }

  /**
   * Returns name of the referenced entity type supported by this normalizer.
   *
   * @return string
   *   Supported entity type name.
   */
  abstract public function getSupportedEntityType();

  /**
   * Normalize the referenced entity.
   *
   * @param mixed $object
   *   The referenced entity to be normalized.
   * @param string $format
   *   Normalization format.
   * @param array $context
   *   Normalization context.
   *
   * @return mixed
   *   Normalized data.
   */
  abstract public function normalizeReferencedEntity($object, $format = NULL, array $context = []);

}
