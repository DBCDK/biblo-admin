<?php

namespace Drupal\dbcdk_community_reference_field\Plugin\Field\Mapper;

use DBCDK\CommunityServices\Api\CampaignApi;

/**
 * Maps between campaign ids and string reprensentations.
 *
 * The string representation for a group is "campaign-name [group-id]".
 */
class CampaignMapper implements IdValueMapperInterface {

  /**
   * The API to use when looking up groups.
   *
   * @var CampaignApi
   */
  protected $api;

  /**
   * CampaignMapper constructor.
   *
   * @param CampaignApi $api
   *   The API to use when looking up groups.
   */
  public function __construct(CampaignApi $api) {
    $this->api = $api;
  }

  /**
   * {@inheritdoc}
   */
  public function toId($value) {
    $matches = [];
    preg_match('/\[(\d+)\]$/', $value, $matches);
    $id = array_pop($matches);

    $campaign = $this->api->campaignFindById($id);
    if (empty($campaign)) {
      throw new \UnexpectedValueException(sprintf('Campaign %d not found', $id));
    }

    return $campaign->getId();
  }

  /**
   * {@inheritdoc}
   */
  public function toValue($id) {
    $campaign = $this->api->campaignFindById($id);
    if (empty($campaign)) {
      throw new \UnexpectedValueException(sprintf('Campaign %d not found', $id));
    }

    return sprintf('%s [%d]', $campaign->getCampaignName(), $campaign->getId());
  }

}
