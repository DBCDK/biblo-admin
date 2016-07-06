<?php

namespace Drupal\dbcdk_community_reference_field\Plugin\Field\FieldWidget;

use DBCDK\CommunityServices\Api\GroupApi;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
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
class GroupReferenceAutocomplete extends WidgetBase implements ContainerFactoryPluginInterface {

  /**
   * The API to use when looking up groups.
   *
   * @var GroupApi
   */
  protected $groupApi;

  /**
   * GroupReferenceAutocomplete constructor.
   *
   * @param array $plugin_id
   *   The plugin_id for the widget.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param FieldDefinitionInterface $field_definition
   *   The definition of the field to which the widget is associated.
   * @param array $settings
   *   The widget settings.
   * @param array $third_party_settings
   *   Any third party settings.
   * @param GroupApi $group_api
   *   The group API to use.
   */
  public function __construct(
    $plugin_id,
    $plugin_definition,
    FieldDefinitionInterface $field_definition,
    array $settings,
    array $third_party_settings,
    GroupApi $group_api
  ) {
    parent::__construct(
      $plugin_id,
      $plugin_definition,
      $field_definition,
      $settings,
      $third_party_settings
    );
    $this->groupApi = $group_api;
  }

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
      $container->get('dbcdk_community.api.group')
    );
  }

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $value = NULL;
    if (!empty($items[$delta]->value)) {
      $group = $this->groupApi->groupFindById($items[$delta]->value);
      if (!empty($group)) {
        $value = sprintf('%s [%d]', $group->getName(), $group->getId());
      }
    }

    $element['value'] = $element + [
      '#type' => 'textfield',
      '#autocomplete_route_name' => 'dbcdk_community_reference_field.group_autocomplete_controller_autocomplete',
      '#autocomplete_route_parameters' => [],
      '#default_value' => $value,
      // This is a textfield form element but the field stores an ID in the form
      // of an integer. The validation handler must transform the value to
      // ensure we have something to store.
      '#element_validate' => [[$this, 'validate']],
    ];

    return $element;
  }

  /**
   * Validation handler.
   *
   * @param array $element
   *   The element to validate.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The form state.
   */
  public function validate($element, FormStateInterface $form_state) {
    // If there is no value there is nothing to validate.
    if (empty($element['#value'])) {
      return;
    }

    // Try to extract the group id from the element value.
    $matches = [];
    preg_match('/[(\d+)]/', $element['#value'], $matches);
    $group_id = array_shift($matches);

    if (empty($group_id)) {
      $form_state->setError($element, $this->t('Unknown group. Please select one of the suggested values from the dropdown in the format "group name [group id]"'));
    }
    else {
      $form_state->setValueForElement($element, $group_id);
    }
  }

}
