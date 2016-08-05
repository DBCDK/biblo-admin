<?php

namespace Drupal\dbcdk_community_reference_field\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Field type for referencing groups in the community service.
 *
 * @FieldType(
 *   id = "group_reference_field_type",
 *   label = @Translation("Group reference"),
 *   description = @Translation("Reference groups in the Community Service"),
 *   category = @Translation("DBCDK Community Service"),
 *   default_widget = "dbckd_community_reference_field_group_autocomplete",
 *   default_formatter = "dbckd_community_reference_field_group_formatter"
 * )
 */
class GroupReferenceFieldType extends RemoteReferenceFieldType {

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties = [];
    $properties['value'] = DataDefinition::create('integer')
      ->setLabel(t('Group id'))
      ->setRequired(TRUE);

    return $properties;
  }

}
