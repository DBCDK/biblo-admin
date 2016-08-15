<?php

namespace Drupal\dbcdk_community_reference_field\Plugin\Field\Mapper;

use DBCDK\CommunityServices\Api\GroupApi;

/**
 * Maps between group ids and string reprensentations.
 *
 * The string representation for a group is "group-name [group-id]".
 */
class GroupMapper implements IdValueMapperInterface {

  /**
   * The API to use when looking up groups.
   *
   * @var GroupApi
   */
  protected $api;

  /**
   * GroupMapper constructor.
   *
   * @param GroupApi $api
   *   The API to use when looking up groups.
   */
  public function __construct(GroupApi $api) {
    $this->api = $api;
  }

  /**
   * {@inheritdoc}
   */
  public function toId($value) {
    $matches = [];
    preg_match('/[(\d+)]/', $value, $matches);
    $id = array_shift($matches);

    $group = $this->api->groupFindById($id);
    if (empty($group)) {
      throw new \UnexpectedValueException(sprintf('Group %d not found', $id));
    }

    return $group->getId();
  }

  /**
   * {@inheritdoc}
   */
  public function toValue($id) {
    $group = $this->api->groupFindById($id);
    if (empty($group)) {
      throw new \UnexpectedValueException(sprintf('Group %d not found', $id));
    }

    // If we can lookup the group in the community service then we can
    // display more information.
    return sprintf('%s [%d]', $group->getName(), $group->getId());
  }

}
