<?php

namespace Drupal\menu_rest_resource\tests\Unit\Normalizer;

use Drupal\Core\Routing\UrlGeneratorInterface;
use Drupal\Core\Url;
use Drupal\Core\Utility\UnroutedUrlAssemblerInterface;
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
    $url = 'http://drupal.org';

    $url_assembler = $this->getMock(UnroutedUrlAssemblerInterface::class);
    $url_assembler->method('assemble')->with($url, ['external' => TRUE], FALSE)->willReturn($url);
    $normalizer = new UrlNormalizer(
      $this->getMock(UrlGeneratorInterface::class),
      $url_assembler
    );

    $data = $normalizer->normalize(Url::fromUri($url));

    $this->assertEquals(['external' => TRUE, 'uri' => $url], $data);
  }

  /**
   * Test internal url normalization.
   */
  public function testNormalizeInternalUrl() {
    $url = 'route/1';
    $generator = $this->getMock(UrlGeneratorInterface::class);
    $generator->method('generateFromRoute')->with('route', ['arg' => 1], [], FALSE)->willReturn($url);

    $normalizer = new UrlNormalizer(
      $generator,
      $this->getMock(UnroutedUrlAssemblerInterface::class)
    );
    $data = $normalizer->normalize(Url::fromRoute('route', ['arg' => 1]));

    $this->assertEquals(['external' => FALSE, 'uri' => $url], $data);
  }

}
