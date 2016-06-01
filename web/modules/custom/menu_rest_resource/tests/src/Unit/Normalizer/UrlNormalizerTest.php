<?php

namespace Drupal\menu_rest_resource\tests\Unit\Normalizer;

use Drupal\Core\Routing\UrlGeneratorInterface;
use Drupal\Core\Url;
use Drupal\menu_rest_resource\Normalizer\UrlNormalizer;
use Drupal\Tests\UnitTestCase;

/**
 * Unit test for UrlNormalizer.
 *
 * @group menu_rest_resource
 */
class UrlNormalizerTest extends UnitTestCase {

  /**
   * Test external url normalization.
   */
  public function testNormalizeExternalUrl() {
    $normalizer = new UrlNormalizer($this->getMock(UrlGeneratorInterface::class));

    $url = 'http://drupal.org';
    $data = $normalizer->normalize(Url::fromUri($url));

    $this->assertEquals(['external' => TRUE, 'uri' => $url], $data);
  }

  /**
   * Test internal url normalization.
   */
  public function testNormalizeInternalUrl() {
    $url = 'http://drupal.org/route/1';
    $generator = $this->getMock(UrlGeneratorInterface::class);
    $generator->method('generateFromRoute')->with('route', ['arg' => 1], ['absolute' => TRUE], FALSE)->willReturn($url);

    $normalizer = new UrlNormalizer($generator);
    $data = $normalizer->normalize(Url::fromRoute('route', ['arg' => 1]));

    $this->assertEquals(['external' => FALSE, 'uri' => $url], $data);
  }

}
