<?php

namespace Drupal\dbcdk_community_reference_field\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Field\Plugin\Field\FieldType\IntegerItem;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Field type for referencing groups in the community service.
 *
 * In practice the fields stores the id of the group. This is an integer and
 * thus we inherit from the IntegerItem class.
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
class GroupReferenceFieldType extends IntegerItem {

  /**
   * {@inheritdoc}
   */
  public static function defaultStorageSettings() {
    return array(
      // Ids cannot be negative.
      'unsigned' => TRUE,
    ) + parent::defaultStorageSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function fieldSettingsForm(array $form, FormStateInterface $form_state) {
    // Override the parent method as we do not want to support any field
    // settings for now.
    return [];
  }

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
