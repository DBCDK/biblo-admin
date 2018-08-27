<?php

namespace Drupal\dbcdk_openplatform\Form;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\KeyValueStore\KeyValueStoreInterface;
use Drupal\Core\Url;
use Drupal\dbcdk_openplatform\Client\OpenplatformClient;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Administration form for the DBCDK OpenAgency module.
 */
class AdminForm extends ConfigFormBase {
  use LoggerAwareTrait;

  /**
   * The store for agencies.
   *
   * @var KeyValueStoreInterface
   */
  protected $agencyStore;

  /**
   * The store for branches.
   *
   * @var KeyValueStoreInterface
   */
  protected $branchStore;

  /**
   * The service to use when interacting with OpenAgency.
   *
   * @var Service
   */
  protected $service;

  /**
   * AdminForm constructor.
   *
   * @param ConfigFactoryInterface $config_factory
   *   Used for managing configuration.
   * @param LoggerInterface $logger
   *   The logger to use.
   * @param KeyValueStoreInterface $agency_store
   *   Store for agencies.
   * @param KeyValueStoreInterface $branch_store
   *   Store for branches.
   * @param Service $service
   *   The service to use when interacting with OpenAgency.
   */
  public function __construct(
    ConfigFactoryInterface $config_factory,
    LoggerInterface $logger,
    OpenplatformClient $service
  ) {
    parent::__construct($config_factory);
    $this->logger = $logger;
    $this->service = $service;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    $config = $container->get('config.factory')->get('dbcdk_openplatform.settings');
    $service = new OpenplatformClient(
      $container->get('http_client'),
      $config->get('smaug_url'),
      $config->get('client_id'),
      $config->get('client_secret')
    );

    return new static(
      $container->get('config.factory'),
      $container->get('dbcdk_openplatform.logger'),
      $service
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['dbcdk_openplatform.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'dbcdk_openplatform_admin_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['smaug_url'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Service url'),
      '#description' => $this->t(
        'The url to the authentication service service to use. See @smaug_link', [
          '@smaug_link' => $this->l(
            'https://auth.dbc.dk/',
            Url::fromUri('https://auth.dbc.dk/')
          ),
        ]
      ),
      '#default_value' => $this->config('dbcdk_openplatform.settings')->get('smaug_url'),
    ];

    $form['client_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Client ID'),
      '#description' => $this->t('An openplatform client ID'),
      '#default_value' => $this->config('dbcdk_openplatform.settings')->get('client_id'),
    ];

    $form['client_secret'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Client secret'),
      '#description' => $this->t('An openplatform client secret'),
      '#default_value' => $this->config('dbcdk_openplatform.settings')->get('client_secret'),
    ];

    if($token =  $this->config('dbcdk_openplatform.settings')->get('smaug_token')) {      
      $form['token'] = [
        '#type' => 'details',
        '#title' => $this->t('Current token'),
        '#open' => TRUE,
      ];
      $form['token']['value'] = [
        '#markup' => $token,
      ];  
    } else {
      drupal_set_message('Configuration is not valid. Could not fetch a token', 'error');
    }
  
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('dbcdk_openplatform.settings')
      ->set('smaug_url', $form_state->getValue('smaug_url'))
      ->set('client_id', $form_state->getValue('client_id'))
      ->set('client_secret', $form_state->getValue('client_secret'))
      ->save();

    $tokenResponse = $this->service->setConfig($form_state->getValue('smaug_url'), $form_state->getValue('client_id'), $form_state->getValue('client_secret'))->getToken();     
    $this->config('dbcdk_openplatform.settings')->set('smaug_token', $tokenResponse)->save();
    parent::submitForm($form, $form_state);
  }
}
