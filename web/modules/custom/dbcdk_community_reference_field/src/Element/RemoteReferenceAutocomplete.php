<?php

namespace Drupal\dbcdk_community_reference_field\Element;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\Element\Textfield;
use Drupal\dbcdk_community_reference_field\Plugin\Field\Mapper\IdValueMapperInterface;

/**
 * Base class community service reference form elements supporting autocomplete.
 *
 * Such an element will show a textfield which will provide autocomplete
 * suggestions in string format. The element will then map the string values to
 * corresponding ids for the referenced object.
 */
abstract class RemoteReferenceAutocomplete extends Textfield {

  /**
   * The mapper to transform ids to values.
   *
   * @var IdValueMapperInterface
   */
  protected $idValueMapper;

  /**
   * RemoteReferenceAutocomplete constructor.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param IdValueMapperInterface $id_value_mapper
   *   The mapper to use.
   */
  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    IdValueMapperInterface $id_value_mapper
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->idValueMapper = $id_value_mapper;
  }

  /**
   * {@inheritdoc}
   */
  public function getInfo() {
    $info = parent::getInfo();

    // To add autocomplete functionality we add our own processor which runs
    // first.
    array_unshift($info['#process'], [$this, 'processRemoteReference']);

    return $info;
  }

  /**
   * Element processor for adding autocomplete configuration.
   *
   * @param array $element
   *   The form element to process.
   * @param FormStateInterface $form_state
   *   The current state of the form.
   * @param array $complete_form
   *   The complete form structure.
   *
   * @return array
   *   The form element.
   */
  public function processRemoteReference(array &$element, FormStateInterface $form_state, array &$complete_form) {
    // Map the default value which will be an id to a string representation.
    if (!empty($element['#value'])) {
      try {
        if (!$form_state->isProcessingInput()) {
          $value = $this->idValueMapper->toValue($element['#value']);
        }
        else {
          // Drupal wraps elements containing , in ". Remove this.
          $value = trim($element['#value'], '"');
          $value = $this->idValueMapper->toId($value);
        }
        // We need to set the value twice to ensure the mapping takes effect:
        // 1. $element when rendering the form.
        // 2. $form_state when submitting the form.
        $element['#value'] = $value;
        $form_state->setValueForElement($element, $value);
      }
      catch (\Exception $e) {
        watchdog_exception('dbcdk_community_reference_field', $e);
      }
    }

    // Add autocomplete configuration.
    $element = array_merge($element, [
      '#autocomplete_route_name' => $this->getAutocompleteRoute(),
      '#autocomplete_route_parameters' => $this->getAutcompleteRouteParameters(),
    ]);

    return $element;
  }

  /**
   * Validation handler.
   *
   * @param array $element
   *   The element to validate.
   * @param FormStateInterface $form_state
   *   The form state.
   * @param array $complete_form
   *   The complete form being validated.
   */
  public function validateRemoteReference(array &$element, FormStateInterface $form_state, array &$complete_form) {
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
   * Get the name of the route which will provide autocomplete results.
   *
   * @return string
   *   Autocomplete route name.
   */
  abstract protected function getAutocompleteRoute();

  /**
   * The the parameters for the autocomplete route.
   *
   * Subclasses may implement this to override the defaults.
   *
   * @return array
   *   Autocomplete route parameters.
   */
  protected function getAutcompleteRouteParameters() {
    return [];
  }

}
