<?php

namespace Drupal\dbcdk_community_content\Normalizer\ReferencedEntity;

use Drupal\taxonomy\Entity\Term;

/**
 * Base class for taxonomy term normalizers.
 */
abstract class TermNormalizer extends ReferencedEntityNormalizer {

  /**
   * {@inheritdoc}
   */
  public function supportsNormalization($field_item, $format = NULL) {
    $supported = parent::supportsNormalization($field_item, $format);
    if ($supported) {
      $term = $field_item->get('entity')->getValue();
      $supported &= $this->supportsTerm($term);
    }
    return $supported;
  }

  /**
   * {@inheritdoc}
   */
  public function getSupportedEntityType() {
    return 'taxonomy_term';
  }

  /**
   * Whether a normalizer supports normalization of a specific term.
   *
   * @param \Drupal\taxonomy\Entity\Term $term
   *   The term to normalize.
   *
   * @return bool
   *   Whether normalization is supported.
   */
  abstract public function supportsTerm(Term $term);

}
