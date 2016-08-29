<?php

namespace Drupal\dbcdk_community_content\Campaign;

use DBCDK\CommunityServices\Api\CampaignApi;
use DBCDK\CommunityServices\Api\CampaignWorktypeApi;
use DBCDK\CommunityServices\Api\GroupApi;
use DBCDK\CommunityServices\ApiException;
use DBCDK\CommunityServices\Model\CampaignWorktype;
use Psr\Log\LoggerAwareTrait;

/**
 * Repository for managning campaigns.
 *
 * Campaigns storage are spread across multiple APIs. This repository provides
 * a single entry point.
 */
class CampaignRepository {
  use LoggerAwareTrait;

  /**
   * The campaign API to use when retrieving core information about campaigns.
   *
   * @var CampaignApi
   */
  protected $campaignApi;

  /**
   * The work type API to use for relating review campaigns to work types.
   *
   * @var CampaignWorktypeApi
   */
  protected $worktypeApi;

  /**
   * The group API to use for relating group campaigns to groups.
   *
   * @var GroupApi
   */
  protected $groupApi;

  /**
   * CampaignRepository constructor.
   *
   * @param CampaignApi $campaign_api
   *   The campaign API to use.
   * @param CampaignWorktypeApi $work_type_api
   *   The work type API to use.
   * @param GroupApi $group_api
   *   The group API to use.
   */
  public function __construct(CampaignApi $campaign_api, CampaignWorktypeApi $work_type_api, GroupApi $group_api) {
    $this->campaignApi = $campaign_api;
    $this->worktypeApi = $work_type_api;
    $this->groupApi = $group_api;
  }

  /**
   * Retrieve a campaign matching an ID along with used work types or group.
   *
   * @param int $id
   *   The campaign id.
   *
   * @return \Drupal\dbcdk_community_content\Campaign\Campaign
   *   The campaign matching the id.
   */
  public function getCampaignById($id) {
    $campaign = $this->campaignApi->campaignFindById($id);
    try {
      $group = $this->campaignApi->campaignPrototypeGetGroup($campaign->getId());
    }
    catch (ApiException $e) {
      $group = NULL;
    }
    try {
      $work_types = (array) $this->campaignApi->campaignPrototypeGetWorkTypes($campaign->getId());
    }
    catch (ApiException $e) {
      $work_types = [];
    }
    return new Campaign($campaign, $group, $work_types);
  }

  /**
   * Get work types which can be used for review campaigns.
   *
   * @param array $filter
   *   The JSON filter to use when retrieving work types.
   *
   * @return CampaignWorktype[]
   *   The work types corresponding the filter. If no filter is provided all
   *   work types is returned.
   */
  public function getCampaignWorkTypes(array $filter = []) {
    $filter = (!empty($filter)) ? json_encode($filter) : NULL;
    return (array) $this->worktypeApi->campaignWorktypeFind($filter);
  }

  /**
   * Persist a campaign with related work types or group.
   *
   * @param \Drupal\dbcdk_community_content\Campaign\Campaign $campaign
   *   The campaign to save.
   */
  public function saveCampaign(Campaign $campaign) {
    // Before we save the campaign we clean up any existing associations.
    // This only applies for existing campaigns.
    // First up: Work types. Remove all links.
    if ($campaign->getId()) {
      array_map(function (CampaignWorktype $work_type) use ($campaign) {
        $this->campaignApi->campaignPrototypeUnlinkWorkTypes($work_type->getId(), $campaign->getId());
      }, $this->getCampaignWorkTypes());

      // Next we remove any link from a group to the campaign.
      /* @var \DBCDK\CommunityServices\Model\Group $existing_group */
      try {
        $existing_group = $this->campaignApi->campaignPrototypeGetGroup($campaign->getId());
        // We have to set the value to FALSE to unset. NULL will not touch the
        // existing value.
        $existing_group->setCampaignGroupFK(FALSE);
        $this->groupApi->groupUpsert($existing_group);
      }
      catch (ApiException $e) {
        // Do nothing. This will occur if there is no group associated with the
        // campaign.
      }
    }

    // Now we can update the campaign information.
    if (!$campaign->getId()) {
      $saved_campaign = $this->campaignApi->campaignCreate($campaign);
    }
    else {
      $saved_campaign = $this->campaignApi->campaignUpsert($campaign);
    }
    $campaign = new Campaign($saved_campaign, $campaign->getGroup(), $campaign->getWorkTypes());

    // Set work types for review campaigns.
    if ($campaign->getType() == 'review') {
      // Extract the work type ids and create links.
      $work_type_ids = array_map(function (CampaignWorktype $work_type) {
        return $work_type->getId();
      }, $campaign->getWorkTypes());
      array_map(function ($work_type_id) use ($campaign) {
        $this->campaignApi->campaignPrototypeLinkWorkTypes($work_type_id, $campaign->getId());
      }, $work_type_ids);
    }
    elseif ($campaign->getType() == 'group') {
      // For group campaigns link the group to the campaign.
      $group = $campaign->getGroup();
      $group->setCampaignGroupFK($campaign->getId());
      $this->groupApi->groupUpsert($group);
    }
  }

}
