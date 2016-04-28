<?php
/**
 * @file
 * Class definition for ProfileRepository.
 */

namespace Drupal\dbcdk_community\Profile;

use DateTime;
use DBCDK\CommunityServices\Api\CommunityRoleApi;
use DBCDK\CommunityServices\Api\ProfileApi;
use DBCDK\CommunityServices\Api\QuarantineApi;
use DBCDK\CommunityServices\Model\CommunityRole;
use DBCDK\CommunityServices\Model\Profile as ModelProfile;
use DBCDK\CommunityServices\Model\Quarantine;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\NullLogger;

/**
 * A repository for retrieving profiles with related objects.
 *
 * Related objects can be quarantines and community roles.
 */
class ProfileRepository {
  use LoggerAwareTrait;

  /**
   * The API to use when retrieving profiles.
   *
   * @var \DBCDK\CommunityServices\Api\ProfileApi $profileApi
   */
  protected $profileApi;

  /**
   * The API to use when retrieving quarantines.
   *
   * @var \DBCDK\CommunityServices\Api\QuarantineApi $quarantineApi
   */
  protected $quarantineApi;

  /**
   * The API to use when retrieving community roles.
   *
   * @var \DBCDK\CommunityServices\Api\CommunityRoleApi
   */
  protected $communityRoleApi;

  /**
   * ProfileRepository constructor.
   *
   * @param \DBCDK\CommunityServices\Api\ProfileApi $profile_api
   *   The profile api to use.
   * @param \DBCDK\CommunityServices\Api\QuarantineApi $quarantine_api
   *   The quarantine api to use.
   * @param \DBCDK\CommunityServices\Api\CommunityRoleApi $community_role_api
   *   The community role api to use.
   */
  public function __construct(ProfileApi $profile_api, QuarantineApi $quarantine_api, CommunityRoleApi $community_role_api) {
    $this->profileApi = $profile_api;
    $this->quarantineApi = $quarantine_api;
    $this->communityRoleApi = $community_role_api;
    $this->logger = new NullLogger();
  }

  /**
   * Transform a filter data structure to the format expected by APIs.
   *
   * @param array $filter
   *   The filter. This can contain entries such as where, limit, offset.
   *
   * @return string|NULL
   *   A JSON encoded version of the filter. NULL if there are no entries.
   *
   * @see https://docs.strongloop.com/display/public/LB/Querying+data
   */
  protected function processFilter(array $filter) {
    // The API fails if we provide a JSON-encoded empty array as a filter so we
    // must use NULL instead.
    return (!empty($filter)) ? json_encode($filter) : NULL;
  }

  /**
   * Retrieve a profile by id.
   *
   * The profile will be enriched with related objects e.g. community roles and
   * quarantines.
   *
   * @param int $id
   *   The profile id to retrieve.
   *
   * @return Profile|NULL
   *   The profile corresponding to the id. NULL if no profile is found.
   *
   * @throws \DBCDK\CommunityServices\ApiException
   *   Throws API Exception if any of the calls to the services fails.
   */
  public function getProfile($id) {
    $filter = [
      'where' => ['id' => $id],
    ];
    return $this->findProfile($filter);
  }

  /**
   * Retrieve a profile by username.
   *
   * The profile will be enriched with related objects e.g. community roles and
   * quarantines.
   *
   * @param string $username
   *   The username for the profile to retrieve.
   *
   * @return Profile|NULL
   *   The profile corresponding to the username. NULL if no profile is found.
   *
   * @throws \DBCDK\CommunityServices\ApiException
   *   Throws API Exception if any of the calls to the services fails.
   */
  public function getProfileByUsername($username) {
    $filter = [
      'where' => ['username' => $username],
    ];
    return $this->findProfile($filter);
  }

  /**
   * Retrieve a profile matching a filter.
   *
   * The profile will be enriched with related objects e.g. community roles and
   * quarantines.
   *
   * @param array $filter
   *   The filter to use for retrieving the profile.
   *
   * @return Profile|NULL
   *   The profile corresponding to the filter. NULL if no profiles match.
   *
   * @throws \DBCDK\CommunityServices\ApiException
   *   Throws API Exception if any of the calls to the services fails.
   */
  protected function findProfile(array $filter) {
    $profile = $this->profileApi->profileFindOne($this->processFilter($filter));
    if (!empty($profile)) {
      $profile = $this->enrichProfile($profile);
    }
    return $profile;
  }

  /**
   * Get all profiles matching a filter.
   *
   * For performance reasons these profiles will not include related objects.
   * This should be retrieved subsequently.
   *
   * @param array $filter
   *   The filter to use.
   *
   * @return \DBCDK\CommunityServices\Model\Profile[]
   *   The matching profiles.
   *
   * @throws \DBCDK\CommunityServices\ApiException
   *   Throws API Exception if any of the calls to the services fails.
   *
   * @see ProfileRepository::enrichProfile
   */
  public function getProfiles(array $filter = []) {
    return (array) $this->profileApi->profileFind($this->processFilter($filter));
  }

  /**
   * Count the number of profiles matching a filter.
   *
   * @param array $filter
   *   The filter to use.
   *
   * @return int|NULL
   *   The number of profiles matching the filter. NULL if no count is returned.
   */
  public function countProfiles(array $filter = []) {
    $result = $this->profileApi->profileCount($this->processFilter($filter));
    return (isset($result['count'])) ? $result['count'] : NULL;
  }

  /**
   * Enrich a "flat" profile object.
   *
   * This adds details about community roles and quarantines.
   *
   * @param ModelProfile $profile
   *   The original profile object.
   *
   * @return Profile
   *   The profile object enriched with details about it.
   */
  public function enrichProfile(ModelProfile $profile) {
    $community_roles = (array) $this->profileApi->profilePrototypeGetCommunityRoles(
      $profile->getId()
    );
    $quarantines = (array) $this->profileApi->profilePrototypeGetQuarantines(
      $profile->getId()
    );
    return new Profile($profile, $community_roles, $quarantines);
  }

  /**
   * Get profiles with an active quarantine at a specific time.
   *
   * For performance reasons these profiles will not include related objects.
   * This should be retrieved this subsequently.
   *
   * @param DateTime $time
   *   The time to check quarantine date ranges against.
   * @param array $profiles_filter
   *   An array containing filter arguments.
   *
   * @return \DBCDK\CommunityServices\Model\Profile[] $profiles
   *   An array of Profile objects with an active quarantine.
   *
   * @throws \DBCDK\CommunityServices\ApiException
   *   Throws API Exception if any of the calls to the services fails.
   *
   * @see ProfileRepository::enrichProfile
   */
  public function getQuarantinedProfiles(DateTime $time, array $profiles_filter = []) {
    $quarantines = $this->getActiveQuarantines($time);

    // Use the array of quarantined ids as "where" arguments.
    $profiles_filter['where'] = (empty($profiles_filter['where'])) ? [] : $profiles_filter['where'];
    $profiles_filter['where'] += $this->getQuarantinedProfilesFilter($quarantines);

    return (array) $this->profileApi->profileFind($this->processFilter($profiles_filter));
  }

  /**
   * Count the number of quarantined profiles matching a filter.
   *
   * @param DateTime $time
   *   The time to check quarantine date ranges against.
   * @param array $profiles_filter
   *   The filter to match profiles against.
   *
   * @return int|NULL
   *   The number of quarantined profiles. NULL if no count is returned.
   *
   * @throws \DBCDK\CommunityServices\ApiException
   *   Throws API Exception if any of the calls to the services fails.
   */
  public function countQuarantinedProfiles(DateTime $time, array $profiles_filter = []) {
    // Fetch all quarantines that are active from the moment of the request.
    $quarantines = $this->getActiveQuarantines($time);

    // Use the array of quarantined ids as "where" arguments.
    $profiles_filter += $this->getQuarantinedProfilesFilter($quarantines);

    $result = $this->profileApi->profileCount($this->processFilter($profiles_filter));
    return (isset($result['count'])) ? $result['count'] : NULL;
  }

  /**
   * Get all active quarantines.
   *
   * An active quarantine is a quarantine where the end date has not
   * yet passed.
   *
   * @param DateTime $time
   *   The time to check against.
   *
   * @return Quarantine[]
   *   Active quarantines.
   *
   * @throws \DBCDK\CommunityServices\ApiException
   *   Throws API Exception if any of the calls to the services fails.
   */
  protected function getActiveQuarantines(DateTime $time) {
    // Fetch all quarantines that are active from the moment of the request.
    $quarantined_filter = [
      'where' => [
        'start' => [
          // The string should be in a format recognized by the Date.parse()
          // method which is ISO-8601 in our case.
          // @See https://developer.mozilla.org/en/docs/Web/JavaScript/Reference/Global_Objects/Date
          'lt' => $time->format(\DateTime::ATOM),
        ],
        'end' => [
          'gt' => $time->format(\DateTime::ATOM),
        ],
      ],
    ];
    return (array) $this->quarantineApi->quarantineFind(
      $this->processFilter($quarantined_filter)
    );
  }

  /**
   * Build an array of quarantined profile ids suitable for API filtering.
   *
   * @param Quarantine[] $quarantines
   *   The quarantines to get profiles from.
   *
   * @return array
   *   A filter array.
   */
  protected function getQuarantinedProfilesFilter(array $quarantines) {
    $quarantine_ids = array_map(function (Quarantine $quarantine) {
        return $quarantine->getQuarantinedProfileId();
    }, $quarantines);

    // Multiple quarantines can belong to the same profile resulting in the same
    // id occurring multiple times. That is unnecessary so remove this.
    $quarantine_ids = array_unique($quarantine_ids);
    // array_unique preserves keys for entries. This results in the filter
    // behaving like a map instead of an array. This may later on cause problems
    // when filters are converted to JSON. Reset keys to avoid this.
    $quarantine_ids = array_values($quarantine_ids);

    return ['id' => ['inq' => $quarantine_ids]];
  }

  /**
   * Get all community roles.
   *
   * @return CommunityRole[]
   *   All available community roles.
   *
   * @throws \DBCDK\CommunityServices\ApiException
   *   Throws API Exception if any of the calls to the services fails.
   */
  public function getCommunityRoles() {
    return (array) $this->communityRoleApi->communityRoleFind();
  }

  /**
   * Save a profile.
   *
   * @param \DBCDK\CommunityServices\Model\Profile $profile
   *   The profile to save.
   *
   * @return \DBCDK\CommunityServices\Model\Profile
   *   The saved profile
   *
   * @throws \DBCDK\CommunityServices\ApiException
   *   Throws API Exception if any of the calls to the services fails.
   */
  public function saveProfile(Profile $profile) {
    return $this->profileApi->profileUpsert($profile);
  }

  /**
   * Update a Community Profile's roles.
   *
   * Find out if we have to remove or add any roles from a Community Profile
   * based on values from $form_state and the current Community Profile's roles.
   *
   * @param \Drupal\dbcdk_community\Profile\Profile $profile
   *   The profile to update.
   * @param array $new_role_ids
   *   An array of new role ids.
   *
   * @throws \DBCDK\CommunityServices\ApiException
   *   Throws API Exception if the roles could not be added/removed.
   */
  public function updateProfileRoles(Profile $profile, array $new_role_ids) {
    // Format an array of the profiles role ids before any update has happened.
    // The generated Profile model does not have a public roles attribute but
    // the repository will add it when retrieving the object.
    // @see ProfileRepository::findProfile.
    $old_role_ids = array_map(function(CommunityRole $role) {
      return $role->getId();
    }, $profile->getCommunityRoles());

    // We find the difference from the new roles and the old once to see if any
    // roles have to be added to the community profile.
    foreach (array_diff($new_role_ids, $old_role_ids) as $new_role_id) {
      $this->profileApi->profilePrototypeLinkCommunityRoles($new_role_id, $profile->getId());
    };

    // We find the difference from the old roles and the new once to see if any
    // roles have to be removed from the community profile.
    foreach (array_diff($old_role_ids, $new_role_ids) as $remove_role_id) {
      $this->profileApi->profilePrototypeUnlinkCommunityRoles($remove_role_id, $profile->getId());
    };
  }

}
