<?php

namespace Drupal\dbcdk_community_reference_field\Plugin\Field\FieldFormatter;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Field formatter for displaying a referenced campaign from community service.
 *
 * @FieldFormatter(
 *   id = "dbcdk_community_reference_field_campaign_formatter",
 *   label = @Translation("Campaign reference"),
 *   field_types = {
 *     "campaign_reference_field_type"
 *   }
 * )
 */
class CampaignReferenceFormatter extends RemoteReferenceFormatter {

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $plugin_id,
      $plugin_definition,
      $configuration['field_definition'],
      $configuration['settings'],
      $configuration['label'],
      $configuration['view_mode'],
      $configuration['third_party_settings'],
      $container->get('dbcdk_community_reference_field.id_value_mapper.campaign')
    );
  }

}
