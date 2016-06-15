<?php

namespace Drupal\dbcdk_community_content\Normalizer\ReferencedEntity;

use Drupal\taxonomy\Entity\Term;

/**
 * Normalizer for Article Types taxonomy terms.
 */
class ArticleTypeNormalizer extends TermNormalizer {

  /**
   * {@inheritdoc}
   */
  public function normalizeReferencedEntity($entity, $format = NULL, array $context = []) {
    /* @var Term $entity */
    return $entity->getName();
  }

  /**
   * {@inheritdoc}
   */
  public function supportsTerm(Term $term) {
    return $term->bundle() == 'article_types';
  }

}
