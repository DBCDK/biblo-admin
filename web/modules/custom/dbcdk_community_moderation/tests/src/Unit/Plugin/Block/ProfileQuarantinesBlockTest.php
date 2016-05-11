<?php
/**
 * @file
 * Definition of ProfileQuarantinesBlockTest.
 */

namespace Drupal\Tests\dbcdk_community_moderation\Unit\Plugin\Block;

use DBCDK\CommunityServices\ApiException;
use DBCDK\CommunityServices\Model\Profile as ModelProfile;
use DBCDK\CommunityServices\Model\Quarantine;
use Drupal\Core\Plugin\Context\ContextDefinition;
use Drupal\dbcdk_community_moderation\Plugin\Block\ProfileQuarantinesBlock;
use Drupal\dbcdk_community_moderation\Profile\Profile;
use Drupal\Tests\dbcdk_community\Unit\UnitTestBase;

/**
 * Tests for ProfileQuarantinesBlock.
 *
 * @group dbcdk_community_moderation
 */
class ProfileQuarantinesBlockTest extends UnitTestBase {

  /**
   * Generate a new ProfileQuarantinesBlock wired up with mocks.
   *
   * @return \Drupal\dbcdk_community_moderation\Plugin\Block\ProfileBlock
   *   New block ready for testing.
   */
  protected function newProfileQuarantinesBlock() {
    $data = $this
      ->getMockBuilder('\Drupal\Core\TypedData\Plugin\DataType\StringData')
      ->disableOriginalConstructor()
      ->getMock();

    $block = new ProfileQuarantinesBlock(
      ['context' => ['username' => $data]],
      NULL,
      [
        // We set a default value for the context to make it work without
        // touching underlying Drupal services which have not been instantiated.
        // This works but the username will not have a retrievable value. Other
        // mocks must take this into account.
        'context' => ['username' => (new ContextDefinition('string'))->setDefaultValue($data)],
        'provider' => 'dbcdk_community',
      ],
      $this->logger,
      $this->profileRepository,
      $this->dateFormatter
    );

    $block->setStringTranslation($this->translation);
    return $block;
  }

  /**
   * Test that a table with profile details is returned.
   */
  public function testProfileQuarantine() {
    // Mock community service profile.
    $model_profile = (new ModelProfile())->setUsername('username');
    // Mock quarantine.
    $date = new \DateTime();
    $quarantine = (new Quarantine())
      ->setId(1)
      ->setReason('Reason for quarantine.')
      ->setStart($date)
      ->setEnd($date);
    // Mock enriched profile.
    $profile = new Profile($model_profile, [], [$quarantine]);

    // We do not bind the mock result to a specific id. We cannot get the
    // block with mocks to retrieve a profile id properly so we do not have a
    // specific ID to go with.
    $this->profileRepository->method('getProfileByUsername')->willReturn($profile);

    // Make the date formatter return the date in a specific format we can test
    // against.
    $date_format = 'YMD';
    $this->dateFormatter->method('format')->willReturn($date->format($date_format));

    // Build the Quarantines block.
    $block = $this->newProfileQuarantinesBlock();
    $result = $block->build();

    // Check that fields from the Quarantine is displayed as expected.
    $this->assertArrayHasKey('table', $result);
    $row = array_shift($result['table']['#rows']);
    $this->assertEquals($quarantine->getReason(), $row['reason']['data']['#markup']);
    $this->assertEquals($quarantine->getStart()->format($date_format), $row['start']);
    $this->assertEquals($quarantine->getEnd()->format($date_format), $row['end']);
    // Check the "Edit" link contains the correct parameters.
    $this->assertEquals($quarantine->getId(), $row['edit_link']->getUrl()->getRouteParameters()['quarantine_id']);
    $this->assertEquals($profile->getUsername(), $row['edit_link']->getUrl()->getRouteParameters()['username']);

    // Check the "Create Quarantine" link's route parameter matches the profiles
    // username.
    $this->assertEquals($profile->getUsername(), $result['add_quarantine']['#url']->getRouteParameters()['username']);
  }

  /**
   * Test handling of API errors when trying to display the block.
   */
  public function testApiException() {
    $this->profileRepository->method('getProfileByUsername')->willThrowException(new ApiException());
    // When an exception is thrown we should hit the log.
    $this->logger->expects($this->once())->method('error');

    // Build the Profile Block.
    $block = $this->newProfileQuarantinesBlock();
    $result = $block->build();

    // When an exception is thrown there should be no details.
    $this->assertNoDetails($result['table']);
  }

  /**
   * Test handling when trying to retrieve a profile with an invalid username.
   */
  public function testInvalidProfileIdentifier() {
    // Let the stub return NULL when trying to retrieve a profile by username
    // to signal that there is no profile for that id.
    $this->profileRepository->method('getProfileByUsername')->willReturn(NULL);

    // Build the Profile block.
    $block = $this->newProfileQuarantinesBlock();
    $result = $block->build();

    // When unable to retrieve content there should be no details.
    $this->assertNoDetails($result['table']);
  }

}
