<?php
/**
 * @file
 * Class definition for Profiles.
 */

namespace Drupal\dbcdk_community\Profile;

use \DBCDK\CommunityServices\Model\Profile as ModelProfile;

/**
 * This class extends the generated model with relations to other models.
 */
class Profile extends ModelProfile {

  /**
   * The community roles related to this object.
   *
   * @var \DBCDK\CommunityServices\Model\CommunityRole[]
   */
  protected $communityRoles = [];

  /**
   * The related quarantines.
   *
   * @var \DBCDK\CommunityServices\Model\Quarantine[] $quarantines
   */
  protected $quarantines = [];

  /**
   * Profile constructor.
   *
   * @param ModelProfile $profile
   *   The model object to base this upon.
   * @param \DBCDK\CommunityServices\Model\CommunityRole[] $community_roles
   *   The community roles for the profile.
   * @param \DBCDK\CommunityServices\Model\Quarantine[] $quarantines
   *   The quarantines for the profile.
   */
  public function __construct(ModelProfile $profile = NULL, array $community_roles = [], array $quarantines = []) {
    $data = get_object_vars($profile);
    parent::__construct($data);

    $this->communityRoles = $community_roles;
    $this->quarantines = $quarantines;
  }

  /**
   * Get the community roles for the profile.
   *
   * @return \DBCDK\CommunityServices\Model\CommunityRole[]
   *   Related community roles.
   */
  public function getCommunityRoles() {
    return $this->communityRoles;
  }

  /**
   * Get quarantines related to the profile.
   *
   * @return \DBCDK\CommunityServices\Model\Quarantine[]
   *   Related quarantines.
   */
  public function getQuarantines() {
    return $this->quarantines;
  }

}
