<?php

namespace Drupal\dbcdk_community_reference_field\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\dbcdk_community_reference_field\Plugin\Field\Mapper\IdValueMapperInterface;

/**
 * Base class formatter for remote entity from the community service.
 */
abstract class RemoteReferenceFormatter extends FormatterBase implements ContainerFactoryPluginInterface {

  /**
   * The mapper to transform ids to values.
   *
   * @var IdValueMapperInterface
   */
  protected $idValueMapper;

  /**
   * Constructs a RemoteReferenceFormatter object.
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
   * @param IdValueMapperInterface $id_value_mapper
   *   The mapper to transform ids to values.
   */
  public function __construct(
    $plugin_id,
    $plugin_definition,
    FieldDefinitionInterface $field_definition,
    array $settings,
    $label,
    $view_mode,
    array $third_party_settings,
    IdValueMapperInterface $id_value_mapper
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
    $this->idValueMapper = $id_value_mapper;
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
    // At least we have the remote id which can be displayed.
    $id = $item->value;

    try {
      $value = $this->idValueMapper->toValue($id);
    }
    catch (\Exception $e) {
      // If an exception occurs the log it. We can still return the id.
      $value = $this->t('Id #%id', ['%id' => $id]);

      watchdog_exception('dbcdk_community_reference_field', $e);
    }

    return $value;
  }

}
