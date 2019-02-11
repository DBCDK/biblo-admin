<?php

namespace Drupal\dbcdk_community_moderation\Profile;

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
   * @param \DBCDK\CommunityServices\Model\AdminMessages[] $messages
   *   The messages for the profile.
   */
  public function __construct(ModelProfile $profile = NULL, array $community_roles = [], array $quarantines = [], array $messages = []) {
    parent::__construct($profile->container);

    $this->communityRoles = $community_roles;
    $this->quarantines = $quarantines;
    $this->messages = $messages;
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
  /**
   * Get messages related to the profile.
   *
   * @return \DBCDK\CommunityServices\Model\AdminMessages[]
   *   Related messages.
   */
  public function getMessages() {
    return $this->messages;
  }

}
