<?php

/**
 * @file
 * Contains \Drupal\dbcdk_community\Form\SettingsForm.
 */

namespace Drupal\dbcdk_community\Form;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure file system settings for this site.
 */
class SettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function __construct(ConfigFactoryInterface $config_factory) {
    parent::__construct($config_factory);
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'dbcdk_community_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['dbcdk_community.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('dbcdk_community.settings');

    // Community service host url.
    $form['community_service_url'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Community Service Url'),
      '#default_value' => $config->get('community_service_url'),
      '#description' => $this->t('The Community Service Url until the endpoints start. Example: %example', array('%example' => 'https://dbcdk-community.dk/api/')),
    ];

    // Vertical tab for community site settings.
    $form['community_site'] = [
      '#type' => 'details',
      '#title' => $this->t('Community site settings'),
      '#open' => TRUE,
    ];
    $form['community_site']['community_site_url'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Community site url'),
      '#default_value' => $config->get('community_site_url'),
      '#description' => $this->t('Url for community site e.g. http://biblo.dk. This is used as a base when creating links to the site.'),
    ];
    $form['community_site']['community_site_profile_url_pattern'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Profile url pattern'),
      '#default_value' => $config->get('community_site_profile_url_pattern'),
      '#description' => $this->t('Pattern for urls to profiles on the community site.'),
    ];
    $form['community_site']['community_site_post_url_pattern'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Post url pattern'),
      '#default_value' => $config->get('community_site_post_url_pattern'),
      '#description' => $this->t('Pattern for urls to posts on the community site.'),
    ];
    $form['community_site']['community_site_review_url_pattern'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Review url pattern'),
      '#default_value' => $config->get('community_site_review_url_pattern'),
      '#description' => $this->t('Pattern for urls to reviews on the community site.'),
    ];
    $form['community_site']['community_site_comment_url_pattern'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Comment url pattern'),
      '#default_value' => $config->get('community_site_comment_url_pattern'),
      '#description' => $this->t('Pattern for urls to comments on the community site.'),
    ];

    // Vertical tab for advanced options.
    $form['advanced_options'] = [
      '#type' => 'details',
      '#title' => $this->t('Advanced options'),
    ];

    // Enable debug information.
    $form['advanced_options']['community_service_debug'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Community Service Debug-Mode'),
      '#default_value' => $config->get('community_service_debug'),
      '#description' => $this->t('Return debug information with each Community Service call.'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $fields = [
      'community_service_url',
      'community_site_url',
      'community_site_profile_url_pattern',
      'community_site_post_url_pattern',
      'community_site_review_url_pattern',
      'community_site_comment_url_pattern',
      'community_service_debug',
    ];

    foreach ($fields as $field) {
      $this
        ->config('dbcdk_community.settings')
        ->set($field, $form_state->getValue($field))
        ->save();
    }

    parent::submitForm($form, $form_state);
  }

}
