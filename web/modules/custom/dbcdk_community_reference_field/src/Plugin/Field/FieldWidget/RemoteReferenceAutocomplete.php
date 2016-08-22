<?php

namespace Drupal\dbcdk_community_reference_field\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\dbcdk_community_reference_field\Plugin\Field\Mapper\IdValueMapperInterface;

/**
 * Widget for managing references to community service entities.
 *
 * Users can look up entities using autocomplete based on name.
 */
abstract class RemoteReferenceAutocomplete extends WidgetBase implements ContainerFactoryPluginInterface {

  /**
   * The mapper to transform ids to values.
   *
   * @var IdValueMapperInterface
   */
  protected $idValueMapper;

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
   * @param IdValueMapperInterface $id_value_mapper
   *   The mapper to transform ids to values.
   */
  public function __construct(
    $plugin_id,
    $plugin_definition,
    FieldDefinitionInterface $field_definition,
    array $settings,
    array $third_party_settings,
    IdValueMapperInterface $id_value_mapper
  ) {
    parent::__construct(
      $plugin_id,
      $plugin_definition,
      $field_definition,
      $settings,
      $third_party_settings
    );
    $this->idValueMapper = $id_value_mapper;
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

    $id = $items[$delta]->value;
    if (!empty($id)) {
      try {
        $value = $this->idValueMapper->toValue($id);
      }
      catch (\Exception $e) {
        watchdog_exception('dbcdk_community_reference_field', $e);
      }
    }

    $element['value'] = $element + [
      '#type' => 'textfield',
      '#autocomplete_route_name' => $this->getAutocompleteRoute(),
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

    try {
      // Widgets may wrap values in ". Remove these before mapping.
      $value = trim($element['#value'], '"');
      $id = $this->idValueMapper->toId($value);
      $form_state->setValueForElement($element, $id);
    }
    catch (\UnexpectedValueException $e) {
      $form_state->setError($element, $this->t('Unknown element. Please select one of the suggested values from the dropdown in the format "name [id]"'));
    }
  }

  /**
   * Get the name of the route which will return autocomplete results.
   *
   * @return string
   *   Autocomplete route name.
   */
  abstract protected function getAutocompleteRoute();

}
