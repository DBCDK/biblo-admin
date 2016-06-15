<?php

namespace Drupal\dbcdk_community_content\Normalizer\ReferencedEntity;

/**
 * Normalizer for node types.
 */
class NodeTypeNormalizer extends ReferencedEntityNormalizer {

  /**
   * {@inheritdoc}
   */
  public function getSupportedEntityType() {
    return 'node_type';
  }

  /**
   * {@inheritdoc}
   */
  public function normalizeReferencedEntity($entity, $format = NULL, array $context = []) {
    return $entity->get('type');
  }

}
