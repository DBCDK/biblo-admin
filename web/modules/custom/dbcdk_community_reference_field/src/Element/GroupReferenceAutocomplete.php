<?php

namespace Drupal\dbcdk_community_reference_field\Element;

use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Form element for referencing groups in the community service.
 *
 * @FormElement("dbcdk_community_group_reference_autocomplete")
 */
class GroupReferenceAutocomplete extends RemoteReferenceAutocomplete implements ContainerFactoryPluginInterface {

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
      $configuration,
      $plugin_id,
      $plugin_definition,
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
