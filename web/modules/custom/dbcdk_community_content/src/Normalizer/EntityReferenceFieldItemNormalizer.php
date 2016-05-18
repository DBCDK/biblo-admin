<?php

/**
 * @file
 * Contains EntityReferenceFieldItemNormalizer.
 */

namespace Drupal\dbcdk_community_content\Normalizer;

use Drupal\dbcdk_community_content\FieldNormalizer\FieldNormalizer;
use Drupal\field\Entity\FieldConfig;
use Drupal\serialization\Normalizer\EntityReferenceFieldItemNormalizer as SerializationEntityReferenceFieldItemNormalizer;

/**
 * Converts Drupal entity reference item object to an array structure.
 *
 * The reason why we override the original EntityReferenceFieldItemNormalizer is
 * because we wish to expose the value from a referenced entity instead of the
 * target id.
 */
class EntityReferenceFieldItemNormalizer extends SerializationEntityReferenceFieldItemNormalizer {

  /**
   * The field normalizer to use on fields.
   *
   * @var FieldNormalizer
   */
  protected $fieldNormalizer;

  /**
   * EntityReferenceFieldItemNormalizer constructor.
   *
   * @param \Drupal\dbcdk_community_content\FieldNormalizer\FieldNormalizer $field_normalizer
   *   The field normalizer to use.
   */
  public function __construct(FieldNormalizer $field_normalizer) {
    $this->fieldNormalizer = $field_normalizer;
  }

  /**
   * {@inheritdoc}
   */
  public function normalize($field_item, $format = NULL, array $context = array()) {
    /* @var \Drupal\Core\Entity\ContentEntityBase $referenced_entity */
    $referenced_entity = $field_item->get('entity')->getValue();
    // We only want to alter the normalization of a select few entities, so we
    // create a blacklist for the parent normalizer to handle everything else.
    $blacklist = [
      'paragraph',
      'taxonomy_term',
      'node_type',
    ];
    if (!in_array($referenced_entity->getEntityTypeId(), $blacklist)) {
      return parent::normalize($field_item, $format, $context);
    }

    $output = [];
    switch ((new \ReflectionClass($referenced_entity))->getShortName()) {
      // Paragraphs.
      case 'Paragraph':
        // Find all custom fields on a paragraph so we can loop through the
        // fields and call a FieldNormalizer on them.
        // We find custom fields by looking for "FieldConfig" classes since base
        // fields on entities are BaseFieldDefinition etc.
        /* @var \Drupal\field\Entity\FieldConfig $paragraph_fields[] */
        $paragraph_fields = array_filter($referenced_entity->getFieldDefinitions(), function ($field) {
          return $field instanceof FieldConfig;
        });

        // Loop through each "custom field" to get the field normalized.
        foreach ($paragraph_fields as $nested_fields) {
          // This field could in theory have multiple values, so this should
          // possibly be expanded in the future if we wish to support that. But
          // we, currently, have a Paragraphs architecture that only allows
          // single values, so we just get the first item.
          // @TODO Expand this to a loop instead of using "::first()" if we
          // should support multi-value fields on paragraph entities.
          /* @var \Drupal\Core\Field\FieldItemBase $nested_field */
          $nested_field = $referenced_entity->get($nested_fields->getName())->first();
          $output[$nested_field->getFieldDefinition()->getTargetBundle()] = $this->fieldNormalizer->normalize($nested_field);
        }
        break;

      // Taxonomy term.
      case 'Term':
        /* @var \Drupal\Taxonomy\Entity\Term $referenced_entity */
        switch ($field_item->getFieldDefinition()->getName()) {
          case 'field_article_type':
            // We wish to return the value of the article_type field instead of
            // a target_id.
            $output = $referenced_entity->getName();
            break;

          // Default back to use the parent normalizer for terms we don't wish
          // to handle in a special way.
          default:
            $output = parent::normalize($field_item, $format, $context);
            break;
        }
        break;

      // Node type.
      case 'NodeType':
        /* @var \Drupal\node\Entity\NodeType $referenced_entity */
        $output = $referenced_entity->get('type');
        break;
    }

    return $output;
  }

}
