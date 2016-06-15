<?php


namespace Drupal\dbcdk_community_content\Normalizer\ReferencedEntity;


use Drupal\Core\Entity\ContentEntityBase;
use Drupal\dbcdk_community_content\FieldNormalizer\FieldNormalizer;
use Drupal\field\Entity\FieldConfig;

class ParagraphNormalizer extends ReferencedEntityNormalizer {

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

  public function getSupportedEntityType() {
    return 'paragraph';
  }

  public function normalizeReferencedEntity($entity, $format = null, array $context = array()) {
    // Find all custom fields on a paragraph so we can loop through the
    // fields and call a FieldNormalizer on them.
    // We find custom fields by looking for "FieldConfig" classes since base
    // fields on entities are BaseFieldDefinition etc.
    /* @var \Drupal\field\Entity\FieldConfig $paragraph_fields[] */
    $paragraph_fields = array_filter($entity->getFieldDefinitions(), function ($field) {
      return $field instanceof FieldConfig;
    });
    return $this->convertFieldsToWidget($paragraph_fields, $entity);
  }


  /**
   * Convert an array of fields to a Community Widget.
   *
   * @param FieldConfig[] $paragraph_fields
   *   An array of fields.
   * @param \Drupal\Core\Entity\ContentEntityBase $entity
   *   The entity the field is part of.
   *
   * @return array
   *   An array with widgetName and widgetConfig keys.
   */
  protected function convertFieldsToWidget(array $paragraph_fields, ContentEntityBase $entity) {
    $widget = [];
    foreach ($paragraph_fields as $nested_fields) {
      // The field could in theory have multiple values, so this should possibly
      // be expanded in the future if we wish to support that. But we,
      // currently, have a Paragraphs architecture that only allows
      // single values, so we just get the first item.
      // @TODO Expand this to a loop instead of using "::first()" if we
      // should support multi-value fields on paragraph entities.
      /* @var \Drupal\Core\Field\FieldItemBase $nested_field */
      $nested_field = $entity->get($nested_fields->getName())->first();
      // Get widget map based on the field type.
      $widget_map = $this->getWidgetDefinitionByFieldType($nested_field->getFieldDefinition()->getType());
      // Set the widget name.
      $widget['widgetName'] = $widget_map['name'];
      // Check if the widget has a map for the current field. If it does not,
      // then we simply return the normalized field.
      // We do this to match expected property names of the community widgets.
      if ((isset($widget_map['field_map'])) && (!empty($property = $widget_map['field_map'][$nested_field->getFieldDefinition()->getName()]))) {
        $widget['widgetConfig'][$property] = $this->fieldNormalizer->normalize($nested_field);
      }
      else {
        $widget['widgetConfig'] = $this->fieldNormalizer->normalize($nested_field);
      }
    }

    return $widget;
  }

  /**
   * Get Widget definition by field type.
   *
   * Get the widget name and field to property mappings based on the field type.
   *
   * @param string $field_type
   *   The field type.
   *
   * @return array
   *   A widget definition as an array.
   */
  protected function getWidgetDefinitionByFieldType($field_type) {
    switch ($field_type) {
      // Embedded video widget.
      case 'video_embed_field':
        $widget_definition = ['name' => 'ContentPageEmbeddedVideoWidget'];
        break;

      // Image widget.
      case 'image':
        $widget_definition = ['name' => 'ContentPageImageWidget'];
        break;

      // Text widget.
      case 'string':
      case 'text_long':
      default:
        $widget_definition = [
          'name' => 'ContentPageTextWidget',
          'field_map' => [
            'field_title' => 'title',
            'field_textarea' => 'content',
          ],
        ];
        break;
    }

    return $widget_definition;
  }

}
