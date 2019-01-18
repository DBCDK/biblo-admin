<?php

namespace Drupal\dbcdk_community_content\Campaign;

use \DBCDK\CommunityServices\Model\Campaign as ModelCampaign;
use DBCDK\CommunityServices\Model\Group;
use Drupal\file\FileInterface;

/**
 * Campaign model.
 *
 * This class extends the generated Campaign class to encapsulate information
 * about associated groups and work types.
 */
class Campaign extends ModelCampaign {

  /**
   * The required user info related to the campaign.
   *
   * @var RequiredContactInfo
   */
  protected $requiredContactInfo;

  /**
   * The group related to the campaign.
   *
   * @var Group
   */
  protected $group;

  /**
   * The work types related to the campaign.
   *
   * @var \DBCDK\CommunityServices\Model\CampaignWorktype[]
   */
  protected $workTypes;

  /**
   * The logo for the campaign in pxiel format.
   *
   * This will be a JPEG, PNG or the like.
   *
   * @var FileInterface
   */
  protected $imgLogo;

  /**
   * The logo for the campaign in SVG format.
   *
   * @var FileInterface
   */
  protected $svgLogo;

  /**
   * Campaign constructor.
   *
   * @param \DBCDK\CommunityServices\Model\Campaign|null $campaign
   *   The generated campaign class to base the object on.
   */
  public function __construct(ModelCampaign $campaign = NULL) {
    $data = (!empty($campaign)) ? $campaign->container : [];
    parent::__construct($data);
  }

   /**
   * Set the required user info related to the campaign.
   *
   * @param requiredContactInfo
   * 
   */
  public function setRequiredContactInfo($requiredContactInfo) {
    $this->requiredContactInfo = $requiredContactInfo;
  }

   /**
   * Get the required user info related to the campaign.
   */
  public function getRequiredContactInfo() {
    return $this->requiredContactInfo;
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
    return (array) $this->workTypes;
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

  /**
   * Get the logo image file.
   *
   * @return FileInterface
   *   Logo image file.
   */
  public function getImgLogo() {
    return $this->imgLogo;
  }

  /**
   * Set the logo image file.
   *
   * @param FileInterface $imgLogo
   *   The logo image file to set.
   */
  public function setImgLogo(FileInterface $imgLogo) {
    $this->imgLogo = $imgLogo;
  }

  /**
   * Set the logo vector file.
   *
   * @return FileInterface
   *   The vector logo file.
   */
  public function getSvgLogo() {
    return $this->svgLogo;
  }

  /**
   * Set the logo vector file.
   *
   * @param FileInterface $svgLogo
   *   The vector logo file to set.
   */
  public function setSvgLogo(FileInterface $svgLogo) {
    $this->svgLogo = $svgLogo;
  }

}
