<?php

namespace Drupal\menu_rest_resource\tests\Unit\Normalizer;

use Drupal\Core\Menu\MenuLinkInterface;
use Drupal\Core\Menu\MenuLinkTreeElement;
use Drupal\menu_rest_resource\Normalizer\MenuLinkTreeElementNormalizer;
use Drupal\Tests\menu_rest_resource\Mock\SerializerNormalizerStub;
use Drupal\Tests\UnitTestCase;

/**
 * Unit test for MenuLinkTreeNormalizer.
 */
class MenuLinkTreeElementNormalizerTest extends UnitTestCase {

  /**
   * Test normalization.
   */
  public function testNormalization() {
    $depth = 1;
    $options = ['option' => 'a'];
    $normalized_data = ['data'];
    $element = new MenuLinkTreeElement(
      $this->getMock(MenuLinkInterface::class),
      FALSE,
      $depth,
      FALSE,
      []
    );
    $element->options = $options;

    $normalizer = new MenuLinkTreeElementNormalizer();
    $normalizer->setSerializer(new SerializerNormalizerStub($normalized_data));

    $data = $normalizer->normalize($element);

    $this->assertEquals([
      'link' => $normalized_data,
      'subtree' => $normalized_data,
      'depth' => $depth,
      'options' => $options,
    ], $data);
  }

}
