<?php
/**
 * @file
 * Definition of ProfilesBlockTest.
 */

namespace Drupal\Tests\dbcdk_community_moderation\Unit\Plugin\Block;

use DBCDK\CommunityServices\ApiException;
use DBCDK\CommunityServices\Model\Profile as ModelProfile;
use DBCDK\CommunityServices\Model\Quarantine;
use Drupal\dbcdk_community_moderation\Plugin\Block\ProfilesBlock;
use Drupal\dbcdk_community_moderation\Profile\Profile;
use Drupal\Tests\dbcdk_community\Unit\UnitTestBase;

/**
 * Test class for Profiles block.
 *
 * @group dbcdk_community_moderation
 */
class ProfilesBlockTest extends UnitTestBase {

  /* @var \PHPUnit_Framework_MockObject_MockObject */
  protected $pager;

  /* @var \PHPUnit_Framework_MockObject_MockObject */
  protected $message;

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();

    $namespace = '\Drupal\dbcdk_community_moderation\Plugin\Block';
    $this->pager = $this->getFunctionMock($namespace, 'pager_default_initialize');
    $this->message = $this->getFunctionMock($namespace, 'drupal_set_message');
  }

  /**
   * Generate a new ProfilesBlock wired up with mocks.
   *
   * @param array $filters
   *   Array of filter conditions (ex: 'quarantined' => TRUE).
   *
   * @return \Drupal\dbcdk_community_moderation\Plugin\Block\ProfilesBlock
   *   New block ready for testing.
   */
  public function newProfileBlock($filters = []) {
    $block = new ProfilesBlock(
      [],
      NULL,
      NULL,
      $this->logger,
      $this->formBuilder,
      $this->profileRepository,
      $this->urlGenerator,
      $filters
    );

    $block->setStringTranslation($this->translation);
    return $block;
  }

  /**
   * Test list with a single profile element.
   */
  public function testSingleProfileList() {
    $profile_data = [
      'username' => 'username',
      'full_name' => 'Full Name',
      'display_name' => 'Display Name',
    ];

    $profile = new Profile((new ModelProfile())
      ->setUsername($profile_data['username'])
      ->setFullName($profile_data['full_name'])
      ->setDisplayName($profile_data['display_name'])
    );
    $this->profileRepository->method('getProfiles')->willReturn([$profile]);

    $community_link = 'http://biblo.dk';
    $this->urlGenerator->method('generate')->willReturnMap([
      [$profile, $community_link],
    ]);

    $list = $this->newProfileBlock();
    $result = $list->build();

    // Check that we only have one row in the table.
    $this->assertCount(1, $result['table']['#rows']);

    // Check that a row contains the expected data.
    $row = array_shift($result['table']['#rows']);
    $this->assertNotEmpty($row);
    $this->assertEquals($profile_data['full_name'], $row['fullName']);
    $this->assertEquals($profile_data['display_name'], $row['displayName']);
    // The profile link is a route set internally. It does not make sense to
    // check exactly what the route name should be but we can check that the
    // username is displayed correctly.
    $this->assertLinkText($profile_data['username'], $row['username']);
    // The edit link is generated from a Drupal route. We are not as interested
    // in what route it is as the object being a Link object and it has a
    // route parameter that is equal to the profile username.
    $this->assertInstanceOf('\Drupal\Core\Link', $row['edit_link']);
    $this->assertEquals($profile_data['username'], $row['edit_link']->getUrl()->getRouteParameters()['username']);
    // We only check that a details link is set. The link text does not contain
    // references to the content as that is displayed in other columns. The url
    // uses a route which is set internally.
    $this->assertLinkUrl($community_link, $row['community_link']);
  }

  /**
   * Test list with the quarantined filter.
   *
   * We want to test that the quarantined filter executes correctly when the
   * "quarantined" filter option is provided.
   */
  public function testQuarantinedFilterList() {
    $profile = new Profile(new ModelProfile(), [], [new Quarantine()]);
    $this->profileRepository->method('getQuarantinedProfiles')->willReturn([$profile]);

    // Community Url.
    $community_link = 'http://biblo.dk';
    $this->urlGenerator->method('generate')->willReturnMap([
      [$profile, $community_link],
    ]);

    // Build the list of quarantined profiles.
    $list = $this->newProfileBlock(['quarantined' => TRUE]);
    $result = $list->build();

    // Our assumption here is that the quarantined filter works as intended if
    // we have rows in the table.
    $this->assertNotEmpty($result['table']['#rows']);
  }

  /**
   * Test list without any elements.
   */
  public function testNoContent() {
    $this->profileRepository->method('getProfiles')->willReturn([]);
    $block = $this->newProfileBlock();
    $result = $block->build();
    $this->assertEmpty($result['table']['#rows']);
  }

  /**
   * Test list with a thrown exception.
   */
  public function testApiException() {
    $this->profileRepository->method('getProfiles')->willThrowException(new ApiException());

    // API exceptions should be logged.
    $this->logger->expects($this->once())->method('error');

    $list = $this->newProfileBlock();
    $result = $list->build();

    $this->assertEmpty($result['table']['#rows']);
  }

}
