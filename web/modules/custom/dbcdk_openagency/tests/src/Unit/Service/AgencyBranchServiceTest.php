<?php

namespace Drupal\menu_rest_resource\tests\Unit\Plugin\rest\resource;

use Drupal\Core\KeyValueStore\KeyValueStoreInterface;
use Drupal\Core\StringTranslation\TranslationInterface;
use Drupal\dbcdk_openagency\Client\Agency;
use Drupal\dbcdk_openagency\Client\Branch;
use Drupal\dbcdk_openagency\Service\AgencyBranchService;
use Drupal\Tests\UnitTestCase;

/**
 * Unit test for AgencyBranchService.
 */
class AgencyBranchServiceTest extends UnitTestCase {

  /**
   * Test option array generation.
   */
  public function testOptions() {
    // Generate a set of mock branches.
    $branches = array_map(function ($i) {
      $branch = new Branch();
      $branch->branchId = $i;
      $branch->branchName = sprintf('Branch %s', $i);
      return $branch;
    }, range(0, 3));
    // Split the branches into chunks where the number of chunks matches the
    // number of agencies which will be generated.
    $branch_chunks = array_chunk($branches, 2);

    // Generate a set of mock agencies which contain the branches.
    $agencies = array_map(function ($i) use ($branch_chunks) {
      $agency = new Agency();
      $agency->agencyId = $i;
      $agency->agencyName = sprintf('Agency %s', $i);
      $agency->pickupAgency = $branch_chunks[$i];
      return $agency;
    }, range(0, 1));

    $agency_store = $this->getMock(KeyValueStoreInterface::class);
    // Reverse the agencies to put them in non numerical/alphabetical order.
    $agency_store->method('getAll')->willReturn(array_reverse($agencies));
    $branch_store = $this->getMock(KeyValueStoreInterface::class);

    $service = new AgencyBranchService(
      $this->getMock(TranslationInterface::class),
      $agency_store,
      $branch_store
    );

    $options = $service->getOptions(FALSE);
    $this->assertCount(count($agencies), $options);

    // The first option group should be the one with the first name sorted
    // alphabetically.
    $this->assertEquals($agencies[0]->agencyName, array_keys($options)[0]);
    $this->assertArrayEquals(
      [0 => 'Branch 0', 1 => 'Branch 1'],
      array_shift($options)
    );
  }

}
