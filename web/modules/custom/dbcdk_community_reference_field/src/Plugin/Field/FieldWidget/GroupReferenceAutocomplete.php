<?php

namespace Drupal\dbcdk_community_reference_field\Plugin\Field\FieldWidget;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Widget for managing references to community service groups.
 *
 * Users can look up groups using autocomplete based on name.
 *
 * @FieldWidget(
 *   id = "dbckd_community_reference_field_group_autocomplete",
 *   label = @Translation("Group reference autocomplete"),
 *   field_types = {
 *     "group_reference_field_type"
 *   }
 * )
 */
class GroupReferenceAutocomplete extends RemoteReferenceAutocomplete {

  /**
   * {@inheritdoc}
   */
  public static function create(
    ContainerInterface $container,
    array $configuration,
    $plugin_id,
    $plugin_definition
  ) {
    return new static(
      $plugin_id,
      $plugin_definition,
      $configuration['field_definition'],
      $configuration['settings'],
      $configuration['third_party_settings'],
      $container->get('dbcdk_community_reference_field.id_value_mapper.group')
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function getAutocompleteRoute() {
    return 'dbcdk_community_reference_field.group_autocomplete_controller_autocomplete';
  }

}
