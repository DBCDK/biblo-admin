<?php

namespace Drupal\dbcdk_community_reference_field\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Field type for referencing campaigns in the community service.
 *
 * @FieldType(
 *   id = "campaign_reference_field_type",
 *   label = @Translation("Campaign reference"),
 *   description = @Translation("Reference campaigns in the Community Service"),
 *   category = @Translation("DBCDK Community Service"),
 *   default_widget = "dbckd_community_reference_field_campaign_autocomplete",
 *   default_formatter = "dbcdk_community_reference_field_campaign_formatter"
 * )
 */
class CampaignReferenceFieldType extends RemoteReferenceFieldType {

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties = [];
    $properties['value'] = DataDefinition::create('integer')
      ->setLabel(t('Campaign id'))
      ->setRequired(TRUE);

    return $properties;
  }

}
