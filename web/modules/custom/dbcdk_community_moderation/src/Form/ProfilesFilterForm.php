<?php

namespace Drupal\dbcdk_community_moderation\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Exposed filter form for the Community Profiles listing page.
 */
class ProfilesFilterForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'dbcdk_community_moderation_profiles_filter_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['filter'] = [
      '#type' => 'details',
      '#title' => $this->t('Filter list'),
      '#description' => $this->t('Show profiles matching the following criteria.<br/><br/>For each criteria enter a value which the profile field must contain. Filters are not case sensitive.'),
      // If the URL contains a query string we assume that it is caused by this
      // form and that filters are in use so show them.
      '#open' => (!empty($this->getRequest()->getQueryString())),
    ];

    $form['filter']['username'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Username'),
      '#default_value' => $this->getRequest()->get('username'),
    ];

    $form['filter']['fullName'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Full Name'),
      '#default_value' => $this->getRequest()->get('fullName'),
    ];

    $form['filter']['displayName'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Display Name'),
      '#default_value' => $this->getRequest()->get('displayName'),
    ];

    $form['filter']['email'] = [
      '#type' => 'textfield',
      '#title' => $this->t('E-mail'),
      '#default_value' => $this->getRequest()->get('email'),
    ];

    $form['filter']['quarantined'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Only show profiles with an active quarantine.'),
      '#default_value' => $this->getRequest()->get('quarantined'),
    ];

    $form['filter']['actions']['#type'] = 'actions';
    $form['filter']['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Filter'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $route_parameters = [];
    $fields = [
      'username',
      'fullName',
      'displayName',
      'email',
      'quarantined',
    ];
    foreach ($fields as $field) {
      if ($value = $form_state->getValue($field)) {
        $route_parameters[$field] = $value;
      }
    }
    $form_state->setRedirect('page_manager.page_view_dbcdk_community_profiles', $route_parameters);
  }

}
