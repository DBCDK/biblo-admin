<?php

namespace Drupal\dbcdk_openagency\Plugin\QueueWorker;

use Drupal\Core\KeyValueStore\KeyValueStoreInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Queue\QueueWorkerBase;
use Drupal\dbcdk_openagency\Client\Agency;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * The AgencyProcessor is a queue worker responsible for processing agencies.
 *
 * Each item is expected to contain an agency with related branches.
 *
 * @QueueWorker(
 *   id = "dbcdk_openagency_agency_process",
 *   title = @Translation("DBCDK OpenAgency Processor"),
 * )
 */
class AgencyProcessor extends QueueWorkerBase implements ContainerFactoryPluginInterface {

  /**
   * The agency store to use.
   *
   * @var KeyValueStoreInterface
   */
  protected $agencyStorage;

  /**
   * The branch store to use.
   *
   * @var KeyValueStoreInterface
   */
  protected $branchStorage;

  /**
   * AgencyProcessor constructor.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param KeyValueStoreInterface $agency_storage
   *   The agency store to use.
   * @param KeyValueStoreInterface $branch_storage
   *   The branch store to use.
   */
  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    KeyValueStoreInterface $agency_storage,
    KeyValueStoreInterface $branch_storage
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->agencyStorage = $agency_storage;
    $this->branchStorage = $branch_storage;
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
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('dbcdk_openagency.storage.agency'),
      $container->get('dbcdk_openagency.storage.branch')
    );
  }

  /**
   * {@inheritdoc}
   *
   * @param Agency $agency
   *   The queued agency to process.
   *
   * @throws \UnexpectedValueException
   *   Thrown if the queue item does not contain the expected data.
   */
  public function processItem($agency) {
    if (!is_a($agency, Agency::class)) {
      throw new \UnexpectedValueException($agency);
    }

    // Store the agency in one store and each related branch in another.
    // This allows us to get the agency/branch tree when needed and also lookup
    // branches directly.
    $this->agencyStorage->set($agency->agencyId, $agency);
    foreach ($agency->pickupAgency as $pickup_agency) {
      $this->branchStorage->set($pickup_agency->branchId, $pickup_agency);
    }
  }

}
