<?php

namespace Drupal\dbcdk_openagency\tests\Unit\Service;

use Drupal\Core\KeyValueStore\KeyValueStoreInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\StringTranslation\TranslationInterface;
use Drupal\dbcdk_openagency\Client\Agency;
use Drupal\dbcdk_openagency\Client\Branch;
use Drupal\dbcdk_openagency\Service\AgencyBranchService;

/**
 * Unit test for the AgencyBranchService.
 */
class AgencyBranchServiceTest extends \PHPUnit_Framework_TestCase {

  /* @var \PHPUnit_Framework_MockObject_MockObject */
  protected $translation;

  /* @var \PHPUnit_Framework_MockObject_MockObject */
  protected $agencyStore;

  /* @var \PHPUnit_Framework_MockObject_MockObject */
  protected $branchStore;

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    $this->translation = $this->getMock(TranslationInterface::class);
    // Make the translation stubs return the source string.
    $this->translation->method('translate')->willReturnArgument(0);
    $this->translation->method('translateString')->willReturnCallback(
      function (TranslatableMarkup $markup) {
        return $markup->getUntranslatedString();
      }
    );

    $this->agencyStore = $this->getMock(KeyValueStoreInterface::class);

    $this->branchStore = $this->getMock(KeyValueStoreInterface::class);
  }

  /**
   * Test option generation.
   */
  public function testOptions() {
    // Agency 1 has a single branch.
    $agency1 = new Agency();
    $agency1->agencyId = 1;
    $agency1->agencyName = 'Agency 1';
    $branch1 = new Branch();
    $branch1->branchId = 1;
    $branch1->branchName = 'Branch 1';
    $agency1->pickupAgency = [$branch1];

    // Agency 2 has two branches.
    $agency2 = new Agency();
    $agency2->agencyId = 2;
    $agency2->agencyName = 'Agency 2';
    $branch2 = new Branch();
    $branch2->branchId = 2;
    $branch2->branchName = 'Branch 2';
    $branch3 = new Branch();
    $branch3->branchId = 3;
    $branch3->branchName = 'Branch 3';
    $agency2->pickupAgency = [$branch2, $branch3];

    // Agency 3 has no branches.
    $agency3 = new Agency();
    $agency3->agencyId = 2;
    $agency3->agencyName = 'Agency 3';

    $this->agencyStore->method('getAll')->willReturn([
      $agency1,
      $agency2,
      $agency3,
    ]);

    $service = new AgencyBranchService(
      $this->translation,
      $this->agencyStore,
      $this->branchStore
    );

    $options = $service->getOptions();

    // Option groups should only be generated for agencies with branches.
    // Here that is 1 and 2. Agency 3 is left out.
    $this->assertEquals([$agency1->agencyName, $agency2->agencyName], array_keys($options));

    // Group for agency 1 should contain option for branch 1.
    $this->assertEquals([$branch1->branchId => $branch1->branchName], $options[$agency1->agencyName]);

    // Group for agency 2 should contain options for branch 2 and 3.
    $this->assertEquals([
      $branch2->branchId => $branch2->branchName,
      $branch3->branchId => $branch3->branchName,
    ], $options[$agency2->agencyName]);
  }

  /**
   * Test option generation with group options.
   */
  public function testGroupOptions() {
    // Agency 1 has a single branch.
    $agency1 = new Agency();
    $agency1->agencyId = 1;
    $agency1->agencyName = 'Agency 1';
    $branch1 = new Branch();
    $branch1->branchId = 1;
    $branch1->branchName = 'Branch 1';
    $agency1->pickupAgency = [$branch1];

    // Agency 2 has two branches.
    $agency2 = new Agency();
    $agency2->agencyId = 2;
    $agency2->agencyName = 'Agency 2';
    $branch2 = new Branch();
    $branch2->branchId = 2;
    $branch2->branchName = 'Branch 2';
    $branch3 = new Branch();
    $branch3->branchId = 3;
    $branch3->branchName = 'Branch 3';
    $agency2->pickupAgency = [$branch2, $branch3];

    // Agency 3 has no branches.
    $agency3 = new Agency();
    $agency3->agencyId = 2;
    $agency3->agencyName = 'Agency 3';

    $this->agencyStore->method('getAll')->willReturn([
      $agency1,
      $agency2,
      $agency3,
    ]);

    $service = new AgencyBranchService(
      $this->translation,
      $this->agencyStore,
      $this->branchStore
    );

    $options = $service->getOptionsWithGroupOption();

    // Agency 1 has a single branch. Consequently it does not make sense to
    // create a group option so there should only be an option for the branch.
    $this->assertCount(1, $options[$agency1->agencyName]);

    // Agency 2 has 2 branches. There should be an additional group option and
    // that option should contain the combined branch ids.
    $this->assertCount(3, $options[$agency2->agencyName]);
    $this->assertArrayHasKey(
      implode(AgencyBranchService::GROUP_BRANCH_ID_SEPARATOR, [$branch2->branchId, $branch3->branchId]),
      $options[$agency2->agencyName]
    );
  }

}
