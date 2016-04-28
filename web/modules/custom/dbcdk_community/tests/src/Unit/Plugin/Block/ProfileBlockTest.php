<?php
/**
 * @file
 * Definition of ProfileBlockTest.
 */

namespace Drupal\Tests\dbcdk_community\Unit\Plugin\Block;

use DBCDK\CommunityServices\ApiException;
use DBCDK\CommunityServices\Model\Profile;
use Drupal\Core\Plugin\Context\ContextDefinition;
use Drupal\dbcdk_community\Plugin\Block\ProfileBlock;

/**
 * Tests for ProfileBlock.
 *
 * @group dbcdk_community
 */
class ProfileBlockTest extends BlockTestBase {

  /**
   * Generate a new ProfileBlock wired up with mocks.
   *
   * @return \Drupal\dbcdk_community\Plugin\Block\ProfileBlock
   *   New block ready for testing.
   */
  protected function newProfileBlock() {
    $data = $this
      ->getMockBuilder('\Drupal\Core\TypedData\Plugin\DataType\StringData')
      ->disableOriginalConstructor()
      ->getMock();

    $block = new ProfileBlock(
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
  public function testProfileDetails() {
    $birthday = new \DateTime();
    $profile = (new Profile())
      ->setUsername('username')
      ->setDisplayName('Display Name')
      ->setFullName('Hello')
      ->setBirthday($birthday)
      ->setDescription('Description of the profile.')
      ->setEmail('example@example.com')
      ->setPhone('12345678');
    // We do not bind the mock result to a specific id. We cannot get the
    // block with mocks to retrieve a profile id properly so we do not have a
    // specific ID to go with.
    $this->profileApi->method('profileFindOne')->willReturn($profile);

    // Make the date formatter return the birthday in a specific format we can
    // test against.
    $date_format = 'YMD';
    $this->dateFormatter->method('format')->willReturn($birthday->format($date_format));

    // Build the Profile block.
    $block = $this->newProfileBlock();
    $result = $block->build();

    // Check that fields from the Profile is displayed as expected.
    $this->assertArrayHasKey('table', $result);
    $this->assertDetailsRowEquals($profile->getUsername(), $result['table'], 'username');
    $this->assertDetailsRowEquals($profile->getFullName(), $result['table'], 'fullName');
    $this->assertDetailsRowEquals($profile->getDisplayName(), $result['table'], 'displayName');
    $this->assertDetailsRowEquals($profile->getEmail(), $result['table'], 'email');
    $this->assertDetailsRowEquals($profile->getPhone(), $result['table'], 'phone');
    $this->assertDetailsRowEquals($profile->getBirthday()->format($date_format), $result['table'], 'birthday');
    $this->assertEquals($profile->getDescription(), $result['table']['#rows']['description'][1]['data']['#markup']);

    // Check that the "Edit" link's route parameter is the same as the profile's
    // username.
    $this->assertEquals($profile->getUsername(), $result['actions'][0]['#url']->getRouteParameters()['username']);
  }

  /**
   * Test handling of API errors when trying to display the block.
   */
  public function testApiException() {
    $this->profileApi->method('profileFindOne')->willThrowException(new ApiException());
    // When an exception is thrown we should hit the log.
    $this->logger->expects($this->once())->method('error');

    // Build the Profile Block.
    $block = $this->newProfileBlock();
    $result = $block->build();

    // When an exception is thrown there should be no details.
    $this->assertNoDetails($result['table']);
  }

  /**
   * Test handling when trying to retrieve a profile with an invalid username.
   */
  public function testInvalidIdentifier() {
    // Let the stub return NULL when trying to retrieve a profile by username
    // to signal that there is no profile for that id.
    $this->profileApi->method('profileFindOne')->willReturn(NULL);
    // When this occours the logger should be hit.
    $this->logger->expects($this->once())->method('notice');

    // Build the Profile block.
    $block = $this->newProfileBlock();
    $result = $block->build();

    // When unable to retrieve content there should be no details.
    $this->assertNoDetails($result['table']);
  }

}
