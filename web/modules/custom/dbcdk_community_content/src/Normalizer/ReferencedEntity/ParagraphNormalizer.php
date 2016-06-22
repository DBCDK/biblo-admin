<?php

namespace Drupal\dbcdk_community_content\Normalizer\ReferencedEntity;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * Normalizer for Paragraphs.
 */
class ParagraphNormalizer extends ReferencedEntityNormalizer {

  /**
   * Supported normalizers.
   *
   * Since Paragraphs supports referencing multiple types of entities we support
   * a list of different normalizers which can be used.
   *
   * @var NormalizerInterface[]
   */
  protected $normalizers;

  /**
   * EntityReferenceFieldItemNormalizer constructor.
   *
   * @param NormalizerInterface[] $normalizers
   *   The normalizers supported.
   */
  public function __construct(array $normalizers) {
    $this->normalizers = $normalizers;
  }

  /**
   * {@inheritdoc}
   */
  public function getSupportedEntityType() {
    return 'paragraph';
  }

  /**
   * {@inheritdoc}
   */
  public function normalizeReferencedEntity($entity, $format = NULL, array $context = []) {
    // Check which of our normalizers support the referenced Paragraph entity.
    $normalizers = array_filter($this->normalizers, function(NormalizerInterface $normalizer) use ($entity, $format) {
      return $normalizer->supportsNormalization($entity, $format);
    });
    // If we support normalization then do it.
    if (!empty($normalizers)) {
      $normalizer = array_shift($normalizers);
      return $normalizer->normalize($entity, $format, $context);
    }
  }

}
