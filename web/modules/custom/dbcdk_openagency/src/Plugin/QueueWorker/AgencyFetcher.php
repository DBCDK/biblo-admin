<?php

namespace Drupal\dbcdk_openagency\Plugin\QueueWorker;

use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Queue\QueueInterface;
use Drupal\Core\Queue\QueueWorkerBase;
use Drupal\dbcdk_openagency\Client\Service;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * The AgencyFetcher is a queue worker for fetching data from OpenAgency.
 *
 * The worker fetches and parses the data and queues each branch for further
 * processing.
 *
 * @QueueWorker(
 *   id = "dbcdk_openagency_agency_fetch",
 *   title = @Translation("DBCDK OpenAgency Fetcher"),
 *   cron = {"time" = 30}
 * )
 */
class AgencyFetcher extends QueueWorkerBase implements ContainerFactoryPluginInterface {

  /**
   * The service to use when fetching data.
   *
   * @var Service
   */
  protected $service;

  /**
   * The queue to place data on for further processing.
   *
   * @var QueueInterface
   */
  protected $agencyDataQueue;

  /**
   * AgencyFetcher constructor.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param Service $service
   *   The service to use for accessing OpenAgency.
   * @param QueueInterface $agency_data_queue
   *   The queue to place agencies on for processing.
   */
  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    Service $service,
    QueueInterface $agency_data_queue
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->service = $service;
    $this->agencyDataQueue = $agency_data_queue;
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
    $config = $container->get('config.factory')->get('dbcdk_openagency.settings');

    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      new Service(
        $container->get('http_client'),
        $config->get('service_url')
      ),
      $container->get('queue')->get('dbcdk_openagency_agency_process')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function processItem($data) {
    // We do not care about the data. The queue item is merely a signal for us
    // to fetch libraries.
    foreach ($this->service->pickupAgencyList() as $agency) {
      $this->agencyDataQueue->createItem($agency);
    }
  }

}
