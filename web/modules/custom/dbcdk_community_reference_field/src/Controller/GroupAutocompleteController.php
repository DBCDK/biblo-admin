<?php

namespace Drupal\dbcdk_community_reference_field\Controller;

use DBCDK\CommunityServices\Model\Group;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use DBCDK\CommunityServices\Api\GroupApi;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Controller for handling Community Service autocomplete lookups.
 *
 * @package Drupal\dbcdk_community_reference_field\Controller
 */
class GroupAutocompleteController extends ControllerBase {

  /**
   * The Group API to retrieve data from.
   *
   * @var GroupApi
   */
  protected $groupApi;

  /**
   * {@inheritdoc}
   */
  public function __construct(GroupApi $group_api) {
    $this->groupApi = $group_api;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('dbcdk_community.api.group')
    );
  }

  /**
   * Autocomplete.
   *
   * @return JsonResponse
   *   The autocomplete response
   */
  public function autocomplete(Request $request) {
    $groups = [];

    // Get groups matching query.
    $query = $request->get('q');
    if (!empty($query)) {
      $filter = [
        'where' => [
          'name' => [
            // Use case-insensitive lookahead using regular expressions.
            // Strongloop does not support case-insensitive LIKE filtering.
            'regexp' => sprintf('/%s.*/i', $query),
          ],
        ],
        'limit' => 100,
      ];
      $groups = (array) $this->groupApi->groupFind(json_encode($filter));
    }

    // Create autocomplete suggestions from groups. Each suggestion will include
    // both name and id of the group. In the end it is the ids that we store
    // but name is probably more useful to users.
    $groups = array_reduce($groups, function ($groups, Group $group) {
      $groups[] = sprintf('%s [%d]', $group->getName(), $group->getId());
      return $groups;
    }, []);

    return new JsonResponse($groups);
  }

}
