<?php

namespace Drupal\dbcdk_openagency\tests\Unit\Client;

use Drupal\dbcdk_openagency\Client\Agency;
use Drupal\dbcdk_openagency\Client\Branch;
use Drupal\dbcdk_openagency\Client\Service;
use GuzzleHttp\Client;
use VCR\VCR;

/**
 * Unit test of OpenAgency Service.
 *
 * We use php-vcr to record and replay responses from the actual service. This
 * allows us to test the actual parsing of the response as well.
 *
 * @group dbcdk_openagency
 */
class ServiceTest extends \PHPUnit_Framework_TestCase {

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();
    // We have the requests we want already. Fail if PHP-VCR does not detect
    // them and try to create new ones. If we want to record new responses then
    // disable this.
    // Add enable all available request matchers except headers. Guzzle adds the
    // PHP version which may differ between CI environments.
    VCR::configure()
      ->setMode(VCR::MODE_NONE)
      ->enableRequestMatchers([
        'method',
        'url',
        'host',
        'body',
        'post_fields',
        'query_string',
      ]);
  }

  /**
   * Test handling of a normal response.
   *
   * @vcr dbcdk_openagency_response
   */
  public function testResponse() {
    $service = new Service(new Client(), 'http://openagency.addi.dk/2.26/');
    // We use DK-710100 (Copenhagen libraries) as this agency will contain
    // a good amount of data.
    $agencies = $service->pickupAgencyList(['agencyId' => 'DK-710100']);
    $this->assertNotEmpty($agencies);
    $this->assertContainsOnlyInstancesOf(Agency::class, $agencies);

    /* @var Agency $agency */
    $agency = array_shift($agencies);
    $this->assertNotEmpty($agency->agencyName);
    $this->assertNotEmpty($agency->agencyId);
    $this->assertNotEmpty($agency->pickupAgency);
    $this->assertContainsOnlyInstancesOf(Branch::class, $agency->pickupAgency);

    /* @var Branch $branch */
    $branch = array_shift($agency->pickupAgency);
    $this->assertNotEmpty($branch->branchName);
    $this->assertNotEmpty($branch->branchId);
  }

  /**
   * Test handling of error responses.
   *
   * We have recorded a authentication error response when not on an approved
   * IP. This should trigger an exception.
   *
   * @vcr dbcdk_openagency_error
   */
  public function testError() {
    $this->setExpectedException(\RuntimeException::class);

    $service = new Service(new Client(), 'http://openagency.addi.dk/2.26/');
    $service->pickupAgencyList();
  }

}
