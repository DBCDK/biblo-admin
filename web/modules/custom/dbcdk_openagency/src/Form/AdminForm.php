<?php

namespace Drupal\dbcdk_openagency\Form;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\KeyValueStore\KeyValueStoreInterface;
use Drupal\Core\Url;
use Drupal\dbcdk_openagency\Client\Service;
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
    KeyValueStoreInterface $agency_store,
    KeyValueStoreInterface $branch_store,
    Service $service
  ) {
    parent::__construct($config_factory);
    $this->logger = $logger;
    $this->agencyStore = $agency_store;
    $this->branchStore = $branch_store;
    $this->service = $service;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    $config = $container->get('config.factory')->get('dbcdk_openagency.settings');
    $service = new Service(
      $container->get('http_client'),
      $config->get('service_url')
    );

    return new static(
      $container->get('config.factory'),
      $container->get('dbcdk_openagency.logger'),
      $container->get('dbcdk_openagency.storage.agency'),
      $container->get('dbcdk_openagency.storage.branch'),
      $service
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['dbcdk_openagency.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'dbcdk_openagency_admin_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['service_url'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Service url'),
      '#description' => $this->t(
        'The url to the OpenAgency service to use. See @openagency_link', [
          '@openagency_link' => $this->l(
            'http://openagency.addi.dk/',
            Url::fromUri('http://openagency.addi.dk/')
          ),
        ]
      ),
      '#default_value' => $this->config('dbcdk_openagency.settings')->get('service_url'),
    ];

    $form['sync'] = [
      '#type' => 'details',
      '#title' => $this->t('Syncronization'),
      '#open' => TRUE,
    ];

    $form['sync']['info'] = [
      '#markup' => $this->t('<p>Syncronized %num_agencies% agencies and %num_branches% branches</p>', [
        '%num_agencies%' => count($this->agencyStore->getAll()),
        '%num_branches%' => count($this->branchStore->getAll()),
      ]),
    ];
    $form['sync']['resync'] = [
      '#type' => 'submit',
      '#value' => $this->t('Resynchronize'),
      '#submit' => [[$this, 'synchronizeData']],
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('dbcdk_openagency.settings')
      ->set('service_url', $form_state->getValue('service_url'))
      ->save();
    parent::submitForm($form, $form_state);
  }

  /**
   * Submit handler for the synchronization button.
   */
  public function synchronizeData() {
    try {
      $agencies = $this->service->pickupAgencyList(['libraryType' => 'Folkebibliotek']);

      // Only delete previous data when we have a response from the service.
      $this->agencyStore->deleteAll();
      $this->branchStore->deleteAll();

      foreach ($agencies as $agency) {
        $this->agencyStore->set($agency->agencyId, $agency);
        foreach ($agency->pickupAgency as $branch) {
          $this->branchStore->set($branch->branchId, $branch);
        }
      }

      drupal_set_message('Synchronization completed');
    }
    catch (\Exception $e) {
      drupal_set_message($this->t('Unable to synchronize data. Please try again later'), 'error');
      $this->logger->warning($e);
    }
  }

}
