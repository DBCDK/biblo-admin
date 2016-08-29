<?php

namespace Drupal\dbcdk_community_reference_field\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Widget for managing references to community service campaigns.
 *
 * Users can look up groups using autocomplete based on name.
 *
 * @FieldWidget(
 *   id = "dbckd_community_reference_field_campaign_autocomplete",
 *   label = @Translation("Campaign reference autocomplete"),
 *   field_types = {
 *     "campaign_reference_field_type"
 *   }
 * )
 */
class CampaignReferenceAutocomplete extends WidgetBase {

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
    $element['value'] = $element + [
      '#type' => 'dbcdk_community_campaign_reference_autocomplete',
      '#default_value' => $items[$delta]->value,
    ];

    return $element;
  }

}
