<?php

namespace Drupal\dbcdk_community_reference_field\Plugin\Field\FieldFormatter;

use DBCDK\CommunityServices\Api\GroupApi;
use DBCDK\CommunityServices\ApiException;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Field formatter for displaying a referenced group from the community service.
 *
 * @FieldFormatter(
 *   id = "dbckd_community_reference_field_group_formatter",
 *   label = @Translation("Group reference"),
 *   field_types = {
 *     "group_reference_field_type"
 *   }
 * )
 */
class GroupReferenceFormatter extends FormatterBase implements ContainerFactoryPluginInterface {

  /**
   * The API to retrieve group information from.
   *
   * @var \DBCDK\CommunityServices\Api\GroupApi
   */
  protected $groupApi;

  /**
   * Constructs a FormatterBase object.
   *
   * @param string $plugin_id
   *   The plugin_id for the formatter.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Field\FieldDefinitionInterface $field_definition
   *   The definition of the field to which the formatter is associated.
   * @param array $settings
   *   The formatter settings.
   * @param string $label
   *   The formatter label display setting.
   * @param string $view_mode
   *   The view mode.
   * @param array $third_party_settings
   *   Any third party settings.
   * @param GroupApi $group_api
   *   The API to use to retrieve group information.
   */
  public function __construct(
    $plugin_id,
    $plugin_definition,
    FieldDefinitionInterface $field_definition,
    array $settings,
    $label,
    $view_mode,
    array $third_party_settings,
    GroupApi $group_api
  ) {
    parent::__construct(
      $plugin_id,
      $plugin_definition,
      $field_definition,
      $settings,
      $label,
      $view_mode,
      $third_party_settings
    );
    $this->groupApi = $group_api;
  }

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
      $container->get('dbcdk_community.api.group')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];

    foreach ($items as $delta => $item) {
      $elements[$delta] = ['#markup' => $this->viewValue($item)];
    }

    return $elements;
  }

  /**
   * Generate the output appropriate for one field item.
   *
   * @param \Drupal\Core\Field\FieldItemInterface $item
   *   One field item.
   *
   * @return string
   *   The textual output generated.
   */
  protected function viewValue(FieldItemInterface $item) {
    // At least we have the group id which can be displayed.
    $value = $item->value;

    try {
      $group = $this->groupApi->groupFindById($item->value);
      if (!empty($group)) {
        // If we can lookup the group in the community service then we can
        // display more information.
        $value = sprintf('%s [%d]', $group->getName(), $group->getId());
      }
    }
    catch (ApiException $e) {
      // If an exception occurs the log it. We can still return the id.
      watchdog_exception('dbcdk_community_reference_field', $e);
    }

    return $value;
  }

}
