<?php

namespace Drupal\dbcdk_community_content\Campaign;

use \DBCDK\CommunityServices\Model\Campaign as ModelCampaign;
use DBCDK\CommunityServices\Model\Group;

/**
 * Campaign model.
 *
 * This class extends the generated Campaign class to encapsulate information
 * about associated groups and work types.
 */
class Campaign extends ModelCampaign {

  /**
   * The group related to the campaign.
   *
   * @var Group
   */
  protected $group;

  /**
   * Thw work types related to the campaign.
   *
   * @var \DBCDK\CommunityServices\Model\CampaignWorktype[]
   */
  protected $workTypes;

  /**
   * Campaign constructor.
   *
   * @param \DBCDK\CommunityServices\Model\Campaign|null $campaign
   *   The generated campaign class to base the object on.
   */
  public function __construct(ModelCampaign $campaign = NULL, Group $group = NULL, array $work_types = []) {
    $data = (!empty($campaign)) ? $campaign->container : [];
    parent::__construct($data);

    $this->group = $group;
    $this->workTypes = $work_types;
  }

  /**
   * Get the group related to this campaign.
   *
   * @return \DBCDK\CommunityServices\Model\Group
   *   The group related to this campaign.
   */
  public function getGroup() {
    return $this->group;
  }

  /**
   * Set the group related to this campaign.
   *
   * @param \DBCDK\CommunityServices\Model\Group $group
   *   The group related to this campaign.
   */
  public function setGroup(Group $group) {
    $this->group = $group;
  }

  /**
   * Get the work types used by this campaign.
   *
   * @return \DBCDK\CommunityServices\Model\CampaignWorktype[]
   *   Work types used by this campaign.
   */
  public function getWorkTypes() {
    return $this->workTypes;
  }

  /**
   * Set the work types used by this campaign.
   *
   * @param \DBCDK\CommunityServices\Model\CampaignWorktype[] $workTypes
   *   Work types used by this campaign.
   */
  public function setWorkTypes(array $workTypes) {
    $this->workTypes = $workTypes;
  }

}
