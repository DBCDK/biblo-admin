<?php

namespace Drupal\dbcdk_community_reference_field\Controller;

use DBCDK\CommunityServices\Model\Group;
use Drupal\Core\Controller\ControllerBase;
use Drupal\dbcdk_community_reference_field\Plugin\Field\Mapper\IdValueMapperInterface;
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
   * The mapper to use when representing groups as values.
   *
   * @var IdValueMapperInterface
   */
  protected $idValueMapper;

  /**
   * {@inheritdoc}
   */
  public function __construct(
    GroupApi $group_api,
    IdValueMapperInterface $id_value_mapper) {
    $this->groupApi = $group_api;
    $this->idValueMapper = $id_value_mapper;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('dbcdk_community.api.group'),
      $container->get('dbcdk_community_reference_field.id_value_mapper.group')
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
            'regexp' => sprintf('/^%s/i', $query),
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
      try {
        $groups[] = $this->idValueMapper->toValue($group->getId());
      }
      catch (\Exception $e) {
        // Do nothing. If we cannot format a group then skip it.
        watchdog_exception('dbcdk_community_reference_field', $e);
      }
      return $groups;
    }, []);

    return new JsonResponse($groups);
  }

}
