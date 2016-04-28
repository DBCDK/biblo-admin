<?php
/**
 * @file
 * Definition of ProfileQuarantinesBlockTest.
 */

namespace Drupal\Tests\dbcdk_community\Unit\Plugin\Block;

use DBCDK\CommunityServices\ApiException;
use DBCDK\CommunityServices\Model\Profile;
use DBCDK\CommunityServices\Model\Quarantine;
use Drupal\Core\Plugin\Context\ContextDefinition;
use Drupal\dbcdk_community\Plugin\Block\ProfileQuarantinesBlock;

/**
 * Tests for ProfileQuarantinesBlock.
 *
 * @group dbcdk_community
 */
class ProfileQuarantinesBlockTest extends BlockTestBase {

  /**
   * Generate a new ProfileQuarantinesBlock wired up with mocks.
   *
   * @return \Drupal\dbcdk_community\Plugin\Block\ProfileBlock
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
      $this->profileApi,
      $this->dateFormatter
    );

    $block->setStringTranslation($this->translation);
    return $block;
  }

  /**
   * Test that a table with profile details is returned.
   */
  public function testProfileQuarantine() {
    $profile = (new Profile())
      ->setUsername('username');
    // We do not bind the mock result to a specific id. We cannot get the
    // block with mocks to retrieve a profile id properly so we do not have a
    // specific ID to go with.
    $this->profileApi->method('profileFindOne')->willReturn($profile);

    $date = new \DateTime();
    $quarantine = (new Quarantine())
      ->setId(1)
      ->setReason('Reason for quarantine.')
      ->setStart($date)
      ->setEnd($date);
    $this->profileApi->method('profilePrototypeGetQuarantines')->willReturn([$quarantine]);

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
    $this->profileApi->method('profileFindOne')->willReturn(new Profile());
    $this->profileApi->method('profilePrototypeGetQuarantines')->willThrowException(new ApiException());
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
    $this->profileApi->method('profileFindOne')->willReturn(NULL);
    // When this occours the logger should be hit.
    $this->logger->expects($this->once())->method('notice');

    // Build the Profile block.
    $block = $this->newProfileQuarantinesBlock();
    $result = $block->build();

    // When unable to retrieve content there should be no details.
    $this->assertNoDetails($result['table']);
  }

}
