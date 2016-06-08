<?php

namespace Drupal\menu_rest_resource\tests\Unit\Normalizer;

use Drupal\Core\Menu\MenuLinkInterface;
use Drupal\menu_rest_resource\Normalizer\MenuLinkNormalizer;
use Drupal\Tests\menu_rest_resource\Mock\SerializerNormalizerStub;
use Drupal\Tests\UnitTestCase;

/**
 * Unit test for menu link normalizer.
 */
class MenuLinkNormalizerTest extends UnitTestCase {

  /**
   * Test that a MenuLink can be normalized.
   */
  public function testNormalization() {
    $url = 'http://drupal.org';
    $title = $this->getRandomGenerator()->string();
    $description = $this->getRandomGenerator()->string();
    $enabled = TRUE;
    $weight = mt_rand();
    $options = ['options'];
    $meta_data = ['meta'];
    $provider = $this->getRandomGenerator()->string();

    // Stub methods defined by the interface.
    $menu_link = $this->getMock(MenuLinkInterface::class);
    $menu_link->method('getTitle')->willReturn($title);
    $menu_link->method('getDescription')->willReturn($description);
    $menu_link->method('isEnabled')->willReturn($enabled);
    $menu_link->method('getWeight')->willReturn($weight);
    $menu_link->method('getOptions')->willReturn($options);
    $menu_link->method('getMetaData')->willReturn($meta_data);
    $menu_link->method('getProvider')->willReturn($provider);

    $normalizer = new MenuLinkNormalizer();
    $normalizer->setSerializer(new SerializerNormalizerStub($url));

    $data = $normalizer->normalize($menu_link);

    $this->assertEquals([
      'url' => $url,
      'title' => $title,
      'description' => $description,
      'enabled' => $enabled,
      'weight' => $weight,
      'options' => $options,
      'meta_data' => $meta_data,
      'provider' => $provider,
    ], $data);
  }

}
