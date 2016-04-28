<?php
/**
 * @file
 * Test case for ProfileRepository.
 */

namespace Drupal\dbcdk_community\Test\Content;

use DBCDK\CommunityServices\Model\CommunityRole;
use DBCDK\CommunityServices\Model\Profile as ModelProfile;
use DBCDK\CommunityServices\Model\Quarantine;
use Drupal\dbcdk_community\Profile\Profile;
use Drupal\dbcdk_community\Profile\ProfileRepository;
use PHPUnit_Framework_TestCase;

/**
 * Profile retrieval.
 *
 * @group dbcdk_community
 */
class ProfileRepositoryTest extends PHPUnit_Framework_TestCase {

  /**
   * Test profile retrieval by id.
   */
  public function testProfileById() {
    $profile = (new ModelProfile())->setId(1);
    $profile_api = $this->getMock('\DBCDK\CommunityServices\Api\ProfileApi');
    $profile_api->method('profileFindOne')->willReturnMap([
        [json_encode(['where' => ['id' => 1]]), $profile],
    ]);

    $repo = new ProfileRepository(
      $profile_api,
      $this->getMock('\DBCDK\CommunityServices\Api\QuarantineApi'),
      $this->getMock('\DBCDK\CommunityServices\Api\CommunityRoleApi')
    );
    $this->assertEquals(
      new Profile($profile),
      $repo->getProfile(1),
      'Repository does not return expected profile by id'
    );
  }

  /**
   * Test profile retrieval by username.
   */
  public function testProfileByUsername() {
    $profile = (new ModelProfile())->setUsername('name');
    $profile_api = $this->getMock('\DBCDK\CommunityServices\Api\ProfileApi');
    $profile_api->method('profileFindOne')->willReturnMap([
      [json_encode(['where' => ['username' => 'name']]), $profile],
    ]);

    $repo = new ProfileRepository(
      $profile_api,
      $this->getMock('\DBCDK\CommunityServices\Api\QuarantineApi'),
      $this->getMock('\DBCDK\CommunityServices\Api\CommunityRoleApi')
    );
    $this->assertEquals(
      new Profile($profile),
      $repo->getProfileByUsername('name'),
      'Repository does not return expected profile by username'
    );
  }

  /**
   * Test retrieval of profiles by filter.
   */
  public function testProfilesFilter() {
    $profile = (new ModelProfile())->setId(1);
    $profile_api = $this->getMock('\DBCDK\CommunityServices\Api\ProfileApi');
    $profile_api->method('profileFind')->willReturnMap([
      [json_encode(['limit' => 1]), [$profile]],
    ]);

    $repo = new ProfileRepository(
      $profile_api,
      $this->getMock('\DBCDK\CommunityServices\Api\QuarantineApi'),
      $this->getMock('\DBCDK\CommunityServices\Api\CommunityRoleApi')
    );
    $this->assertEquals(
      [$profile],
      $repo->getProfiles(['limit' => 1]),
      'Repository does not return expected profiles by filter'
    );
  }

  /**
   * Test retrieval of profiles without a filter.
   */
  public function testProfilesEmptyFilter() {
    $profile = (new ModelProfile())->setId(1);
    $profile_api = $this->getMock('\DBCDK\CommunityServices\Api\ProfileApi');
    $profile_api->method('profileFind')->willReturnMap([
      [NULL, [$profile]],
    ]);

    $repo = new ProfileRepository(
      $profile_api,
      $this->getMock('\DBCDK\CommunityServices\Api\QuarantineApi'),
      $this->getMock('\DBCDK\CommunityServices\Api\CommunityRoleApi')
    );
    $this->assertEquals(
      [$profile],
      $repo->getProfiles(),
      'Repository does not return expected profiles when not using a filter'
    );
  }

  /**
   * Test retrieval of profile count.
   */
  public function testProfileCount() {
    $profile_api = $this->getMock('\DBCDK\CommunityServices\Api\ProfileApi');
    $profile_api->method('profileCount')->willReturnMap([
      [NULL, ['count' => 42]],
    ]);

    $repo = new ProfileRepository(
      $profile_api,
      $this->getMock('\DBCDK\CommunityServices\Api\QuarantineApi'),
      $this->getMock('\DBCDK\CommunityServices\Api\CommunityRoleApi')
    );
    $this->assertEquals(
      42,
      $repo->countProfiles(),
      'Repository does not return expected profile count'
    );
  }

  /**
   * Test that profile models can be enriched with quarantines and roles.
   */
  public function testProfileEnrichment() {
    $profile_api = $this->getMock('\DBCDK\CommunityServices\Api\ProfileApi');
    $profile = (new ModelProfile())->setId(1);

    $quarantines = [(new Quarantine())->setId(1)];
    $profile_api->method('profilePrototypeGetQuarantines')->willReturnMap([
      [1, NULL, $quarantines],
    ]);

    $roles = [(new CommunityRole())->setId(1)];
    $profile_api->method('profilePrototypeGetCommunityRoles')->willReturnMap([
      [1, NULL, $roles],
    ]);

    $repo = new ProfileRepository(
      $profile_api,
      $this->getMock('\DBCDK\CommunityServices\Api\QuarantineApi'),
      $this->getMock('\DBCDK\CommunityServices\Api\CommunityRoleApi')
    );

    $enriched_profile = $repo->enrichProfile($profile);
    $this->assertEquals(
      $quarantines,
      $enriched_profile->getQuarantines(),
      'Enriched profile does not have expected quarantines.'
    );
    $this->assertEquals(
      $roles,
      $enriched_profile->getCommunityRoles(),
      'Enriched profile does not have expected roles'
    );

    $expected_profile = new Profile($profile, $roles, $quarantines);
    $this->assertEquals(
      $expected_profile,
      $enriched_profile,
      'Profile is not enriched as expected'
    );
  }

  /**
   * Test retrieval of quarantined profiles.
   */
  public function testQuarantinedProfiles() {
    $quarantined_profiles = [
      (new ModelProfile())->setId(1),
      (new ModelProfile())->setId(2),
    ];
    $now = new \DateTime();

    $quarantines = [
      (new Quarantine())->setId(1)->setQuarantinedProfileId(1),
      (new Quarantine())->setId(2)->setQuarantinedProfileId(1),
      (new Quarantine())->setId(3)->setQuarantinedProfileId(2),
    ];
    $quarantine_api = $this->getMock('\DBCDK\CommunityServices\Api\QuarantineApi');
    $quarantine_api->method('quarantineFind')->willReturnMap([
      [
        json_encode([
          'where' => [
            'start' => ['lt' => $now->format(\DateTime::ATOM)],
            'end' => ['gt' => $now->format(\DateTime::ATOM)],
          ],
        ]),
        $quarantines,
      ],
    ]);

    $profile_api = $this->getMock('\DBCDK\CommunityServices\Api\ProfileApi');
    $profile_api->method('profileFind')->willReturnMap([
      [
        json_encode([
          'where' => [
            'id' => [
              'inq' => [1, 2],
            ],
          ],
        ]),
        $quarantined_profiles,
      ],
    ]);

    $repo = new ProfileRepository(
      $profile_api,
      $quarantine_api,
      $this->getMock('\DBCDK\CommunityServices\Api\CommunityRoleApi')
    );
    $this->assertEquals(
      $quarantined_profiles,
      $repo->getQuarantinedProfiles($now),
      'Repository does not return quarantined profiles'
    );
  }

  /**
   * Test that the number of quarantines profiles can be retrieved.
   */
  public function testQuarantinedProfileCount() {
    $now = new \DateTime();

    $quarantines = [
      (new Quarantine())->setId(1)->setQuarantinedProfileId(1),
      (new Quarantine())->setId(2)->setQuarantinedProfileId(1),
    ];
    $quarantine_api = $this->getMock('\DBCDK\CommunityServices\Api\QuarantineApi');
    $quarantine_api->method('quarantineFind')->willReturnMap([
      [
        json_encode([
          'where' => [
            'start' => ['lt' => $now->format(\DateTime::ATOM)],
            'end' => ['gt' => $now->format(\DateTime::ATOM)],
          ],
        ]),
        $quarantines,
      ],
    ]);

    $profile_api = $this->getMock('\DBCDK\CommunityServices\Api\ProfileApi');
    $profile_api->method('profileCount')->willReturnMap([
      [json_encode(['id' => ['inq' => [1]]]), ['count' => 1]],
    ]);

    $repo = new ProfileRepository(
      $profile_api,
      $quarantine_api,
      $this->getMock('\DBCDK\CommunityServices\Api\CommunityRoleApi')
    );
    $this->assertEquals(
      1,
      $repo->countQuarantinedProfiles($now),
      'Repository does not return expected profiles by filter'
    );
  }

}
