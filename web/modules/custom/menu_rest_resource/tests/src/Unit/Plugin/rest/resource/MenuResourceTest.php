<?php

namespace Drupal\menu_rest_resource\tests\Unit\Plugin\rest\resource;

use Drupal\Core\Menu\DefaultMenuLinkTreeManipulators;
use Drupal\Core\Menu\InaccessibleMenuLink;
use Drupal\Core\Menu\MenuLinkInterface;
use Drupal\Core\Menu\MenuLinkTree;
use Drupal\Core\Menu\MenuLinkTreeElement;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\StringTranslation\TranslationInterface;
use Drupal\menu_rest_resource\Plugin\rest\resource\MenuResource;
use Drupal\Tests\UnitTestCase;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Unit test for MenuResource.
 *
 * @group menu_rest_resource
 */
class MenuResourceTest extends UnitTestCase {

  /* @var \PHPUnit_Framework_MockObject_MockObject */
  protected $logger;

  /* @var \PHPUnit_Framework_MockObject_MockObject */
  protected $menuLinkTree;

  /* @var \PHPUnit_Framework_MockObject_MockObject */
  protected $manipulators;

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();

    $this->logger = $this->getMock(LoggerInterface::class);
    $this->menuLinkTree = $this->getMockBuilder(MenuLinkTree::class)
      ->disableOriginalConstructor()
      ->getMock();
    $this->manipulators = $this->getMockBuilder(DefaultMenuLinkTreeManipulators::class)
      ->disableOriginalConstructor()
      ->getMock();
    $this->manipulators->method('checkAccess')->willReturnArgument(0);
    $this->manipulators->method('generateIndexAndSort')->willReturnArgument(0);
  }

  /**
   * {@inheritdoc}
   */
  public function testSimpleMenu() {
    $link = $this->newMockMenuLink();
    $element = new MenuLinkTreeElement(
      $link,
      FALSE,
      0,
      FALSE,
      []
    );
    $this->menuLinkTree->method('load')->willReturn([$element]);

    $menu_resource = $this->newMenuResource();
    $response = $menu_resource->get(1);
    $data = $response->getResponseData();

    $this->assertEquals([$element], $data);
  }

  /**
   * Test handling of menu elements which are not accessible.
   */
  public function testInaccessibleMenu() {
    $link = $this->newMockMenuLink();
    $inaccessible_link = $this->newMockInaccessibleMenuLink();

    $accessible_element = new MenuLinkTreeElement($link, FALSE, 0, FALSE, []);
    $inaccessible_element = new MenuLinkTreeElement($inaccessible_link, FALSE, 0, FALSE, []);

    $accessible_child = clone $accessible_element;
    $accessible_child->depth = 1;
    $inaccessible_child = clone $inaccessible_element;
    $inaccessible_child->depth = 1;

    $accessible_parent = clone $accessible_element;
    $accessible_parent->hasChildren = TRUE;
    $accessible_parent->subtree = [clone $accessible_child, clone $inaccessible_child];

    $inaccessible_parent = clone $inaccessible_element;
    $inaccessible_parent->hasChildren = TRUE;
    $inaccessible_parent->subtree = [clone $accessible_child];

    $this->menuLinkTree->method('load')->willReturn([$accessible_parent, $inaccessible_parent]);

    $menu_resource = $this->newMenuResource();
    $response = $menu_resource->get(1);
    $data = $response->getResponseData();

    $expected_parent = clone $accessible_element;
    $expected_parent->hasChildren = TRUE;
    $expected_parent->subtree = [clone $accessible_child];
    // The expected parent should not have the inaccessible child as a child
    // no be returned with an inaccessible parent.
    $this->assertEquals([$expected_parent], $data);
  }

  /**
   * Test reset of menu indexes.
   */
  public function testMenuIndex() {
    $link = $this->newMockMenuLink();
    $element = new MenuLinkTreeElement($link, FALSE, 0, FALSE, []);

    $child = clone $element;
    $child->depth = 1;
    $parent = clone $element;
    $parent->hasChildren = TRUE;
    $parent->subtree = [clone $child, clone $child];

    $this->menuLinkTree->method('load')->willReturn([$parent]);
    $this->manipulators->method('generateIndexAndSort')->willReturnCallback(function($tree) {
      return array_reduce($tree, function($tree, $element) {
        $tree[mt_rand()] = $element;
        return $tree;
      }, []);
    });

    $menu_resource = $this->newMenuResource();
    $response = $menu_resource->get(1);
    $data = $response->getResponseData();

    $this->assertEquals(range(0, count($data) - 1), array_keys($data));

    $children = $data[0]->subtree;
    $this->assertEquals(range(0, count($children) - 1), array_keys($children));
  }

  /**
   * Test handling of invalid menu ids.
   */
  public function testInvalidId() {
    $this->menuLinkTree->method('load')->willReturn([]);
    $this->setExpectedException(NotFoundHttpException::class);

    $menu_resource = $this->newMenuResource();
    $menu_resource->get(1);
  }

  /**
   * Return a new menu resource wired up with mocks ready for testing.
   *
   * @return MenuResource
   *   A new menu resource.
   */
  protected function newMenuResource() {
    $resource = new MenuResource(
      [],
      NULL,
      [],
      [],
      $this->logger,
      $this->menuLinkTree,
      $this->manipulators);

    $translation = $this->getMock(TranslationInterface::class);
    // Make the translation stubs return the source string.
    $translation->method('translate')->willReturnArgument(0);
    $translation->method('translateString')->willReturnCallback(
      function (TranslatableMarkup $markup) {
        return $markup->getUntranslatedString();
      }
    );

    $resource->setStringTranslation($translation);

    return $resource;
  }

  /**
   * Generate a new menu link.
   *
   * @return MenuLinkInterface
   *   A new menu link.
   */
  protected function newMockMenuLink() {
    return $this->getMock(MenuLinkInterface::class);
  }

  /**
   * Generate a new menu link which is not accessible.
   *
   * @return InaccessibleMenuLink
   *   A new inaccessible menu link.
   */
  protected function newMockInaccessibleMenuLink() {
    return $this->getMockBuilder(InaccessibleMenuLink::class)
      ->disableOriginalConstructor()
      ->getMock();
  }

}
