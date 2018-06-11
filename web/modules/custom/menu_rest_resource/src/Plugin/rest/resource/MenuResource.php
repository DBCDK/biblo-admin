<?php

namespace Drupal\menu_rest_resource\Plugin\rest\resource;

use Drupal\Core\Menu\DefaultMenuLinkTreeManipulators;
use Drupal\Core\Menu\InaccessibleMenuLink;
use Drupal\Core\Menu\MenuLinkTree;
use Drupal\Core\Menu\MenuLinkTreeElement;
use Drupal\Core\Menu\MenuTreeParameters;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Provides a resource to handle menu data and structure.
 *
 * @RestResource(
 *   id = "menu",
 *   label = @Translation("Menu structure"),
 *   uri_paths = {
 *     "canonical" = "/menu/{id}"
 *   }
 * )
 */
class MenuResource extends ResourceBase {

  /**
   * The menu link tree from which to load actual menus.
   *
   * @var \Drupal\Core\Menu\MenuLinkTree
   */
  protected $menuLinkTree;

  /**
   * The menu tree manipulators to use for helping out with manipulations.
   *
   * @var \Drupal\Core\Menu\DefaultMenuLinkTreeManipulators
   */
  protected $menuLinkTreeManipulators;

  /**
   * Constructs a Drupal\rest\Plugin\ResourceBase object.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param array $serializer_formats
   *   The available serialization formats.
   * @param \Psr\Log\LoggerInterface $logger
   *   A logger instance.
   * @param \Drupal\Core\Menu\MenuLinkTree $menu_link_tree
   *   The Drupal menu link tree.
   * @param \Drupal\Core\Menu\DefaultMenuLinkTreeManipulators $menu_link_tree_manipulators
   *   The menu link manipulators to use for formatting menus.
   */
  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    array $serializer_formats,
    LoggerInterface $logger,
    MenuLinkTree $menu_link_tree,
    DefaultMenuLinkTreeManipulators $menu_link_tree_manipulators
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition, $serializer_formats, $logger);

    $this->menuLinkTree = $menu_link_tree;
    $this->menuLinkTreeManipulators = $menu_link_tree_manipulators;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {

    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->getParameter('serializer.formats'),
      $container->get('logger.factory')->get('menu_rest_resource'),
      $container->get('menu.link_tree'),
      $container->get('menu.default_tree_manipulators')
    );
  }

  /**
   * Responds to GET requests.
   *
   * Returns the menu structure for a specific menu.
   *
   * @param string $id
   *   The id for the menu to retrieve.
   *
   * @return ResourceResponse
   *   The response.
   *
   * @throws BadRequestHttpException
   *   Thrown for requests with missing parameters.
   * @throws NotFoundHttpException
   *   Thrown if a menu with the provided id does not exist.
   */
  public function get($id = NULL) {
    print_r(func_get_args());
    if (empty($id)) {
      throw new BadRequestHttpException($this->t('No menu id provided'));
    }

    // Load the menu tree.
    // @TODO: Consider exposing MenuTreeParameters as REST parameters.
    $params = new MenuTreeParameters();
    $tree = $this->menuLinkTree->load($id, $params);
    if (empty($tree)) {
      throw new NotFoundHttpException($this->t('Menu @id does not exist', ['@id' => $id]));
    }

    // Cleanup the returned data.
    $tree = $this->menuLinkTreeManipulators->checkAccess($tree);
    $tree = $this->removeInaccessibleLinks($tree);
    $tree = $this->menuLinkTreeManipulators->generateIndexAndSort($tree);
    $tree = $this->resetIndex($tree);

    return new ResourceResponse($tree);
  }

  /**
   * Remove entries from a menu structure where the user cannot access the link.
   *
   * There is no reason to expose these.
   *
   * @param MenuLinkTreeElement[] $tree
   *   The menu structure.
   *
   * @return MenuLinkTreeElement[]
   *   The updated menu structure without inaccessible links.
   *
   * @see DefaultMenuLinkTreeManipulators::checkAccess
   */
  protected function removeInaccessibleLinks(array $tree) {
    // Reduce tree to only contain accessible menu links.
    $tree = array_reduce($tree, function ($tree, MenuLinkTreeElement $element) {
      // If the link of a tree element is set to inaccessible then the tree
      // element is inaccessible as well. Only return and recurse through
      // accessible tree elements.
      if (!is_a($element->link, InaccessibleMenuLink::class)) {
        $element->subtree = $this->removeInaccessibleLinks($element->subtree);
        $tree[] = $element;
      }
      return $tree;
    }, []);

    return $tree;
  }

  /**
   * Reset array indexes.
   *
   * Drupal menu link tree sorting will generate keys based on weight, name and
   * plugin to support sorting and ensure uniqueness.
   * After sorting this is no longer relevant so we reset the keys to return
   * a more sane data structure.
   *
   * @param MenuLinkTreeElement[] $tree
   *   The menu structure with complex keys.
   *
   * @return MenuLinkTreeElement[]
   *   The updated menu structure with numeric keys.
   *
   * @see DefaultMenuLinkTreeManipulators::generateIndexAndSort
   */
  protected function resetIndex(array $tree) {
    // Reset keys at this level of the tree.
    $tree = array_values($tree);

    $tree = array_map(function (MenuLinkTreeElement $element) {
      // Recurse through subtree to reset keys there as well.
      $element->subtree = $this->resetIndex($element->subtree);
      return $element;
    }, $tree);

    return $tree;
  }

}
