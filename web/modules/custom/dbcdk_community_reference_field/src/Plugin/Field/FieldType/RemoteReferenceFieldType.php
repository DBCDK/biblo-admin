<?php

namespace Drupal\dbcdk_community_reference_field\Plugin\Field\FieldType;

use Drupal\Core\Field\Plugin\Field\FieldType\IntegerItem;
use Drupal\Core\Form\FormStateInterface;

/**
 * Base class for field types which reference remote community service entities.
 *
 * In practice the fields stores the id of the remote entity. This is an integer
 * and thus we inherit from the IntegerItem class.
 */
abstract class RemoteReferenceFieldType extends IntegerItem {

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

}
