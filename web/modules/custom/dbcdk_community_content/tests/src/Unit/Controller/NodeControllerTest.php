<?php

namespace Drupal\dbcdk_community_content\Test\Unit\Controller;

use Drupal\dbcdk_community_content\Controller\NodeController;
use Drupal\Tests\dbcdk_community\Unit\UnitTestBase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Test case for NodeController.
 *
 * @group dbcdk_community_content
 */
class NodeControllerTest extends UnitTestBase {

  /* @var \PHPUnit_Framework_MockObject_MockObject */
  protected $communityConfiguration;

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();

    $this->communityConfiguration = $this->getMockBuilder(
      '\Drupal\Core\Config\Config'
    )->disableOriginalConstructor()->getMock();
  }

  /**
   * Test Community Redirect method.
   */
  public function testCommunityRedirect() {
    // Data.
    $community_site_url = 'http://biblo.dk';
    $drupal_relative_path = '/example/relative/path';

    // Node Controller.
    $this->communityConfiguration->method('get')->willReturnMap([['community_site_url', $community_site_url]]);
    $request_stack = new RequestStack();
    $request_stack->push(Request::create($drupal_relative_path));
    $controller = new NodeController($this->communityConfiguration, $request_stack);
    $redirect = $controller->communityRedirect();

    // Assertion.
    $this->assertEquals($community_site_url . $drupal_relative_path, $redirect->getTargetUrl());
  }

}
