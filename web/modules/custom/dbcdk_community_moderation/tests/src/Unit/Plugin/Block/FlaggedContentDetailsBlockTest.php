<?php
/**
 * @file
 * Definition of FlaggedContentDetailsBlockTest.
 */

namespace Drupal\Tests\dbcdk_community_moderation\Unit\Plugin\Block;

use DateTime;
use DBCDK\CommunityServices\ApiException;
use DBCDK\CommunityServices\Model\Profile;
use Drupal\Core\Plugin\Context\ContextDefinition;
use Drupal\dbcdk_community_moderation\Content\Post;
use Drupal\dbcdk_community_moderation\Plugin\Block\FlaggedContentDetailsBlock;
use Drupal\Tests\dbcdk_community\Unit\Plugin\Block\BlockTestBase;

/**
 * Tests for FlaggedContentDetailsBlock.
 *
 * @group dbcdk_community_moderation
 */
class FlaggedContentDetailsBlockTest extends BlockTestBase {

  /**
   * Generate a new FlaggedContentDetailsBlock wired up with mocks.
   *
   * @return \Drupal\dbcdk_community_moderation\Plugin\Block\FlaggedContentDetailsBlock
   *   New block ready for testing.
   */
  protected function newFlaggedContentDetailsBlock() {
    $data = $this
      ->getMockBuilder('\Drupal\Core\TypedData\Plugin\DataType\IntegerData')
      ->disableOriginalConstructor()
      ->getMock();

    $flagged_content_details = new FlaggedContentDetailsBlock(
      ['context' => ['flag_id' => $data]],
      NULL,
      [
        // We set a default value for the context to make it work without
        // touching underlying Drupal services which have not been instantiated.
        // This works but the flag will not have a retrievable value. Other
        // mocks must take this into account.
        'context' => ['flag_id' => (new ContextDefinition('integer'))->setDefaultValue($data)],
        'provider' => 'dbcdk_community',
      ],
      $this->logger,
      $this->flaggableContentRepository,
      $this->profileApi,
      $this->urlGenerator,
      $this->dateFormatter
    );

    $flagged_content_details->setStringTranslation($this->translation);

    return $flagged_content_details;
  }

  /**
   * Test that a table with flag details are returned.
   */
  public function testDetails() {
    $post_owner_id = 1;
    $now = new DateTime('now');
    $post = (new Post())
      ->setContent('Some content')
      ->setPostownerid($post_owner_id)
      ->setTimeCreated($now);
    // We do not bind the mock result to a specific id. We cannot get the
    // block with mocks to retrieve a flag id properly so we do not have a
    // specific ID to go with.
    $this->flaggableContentRepository->method('getContentById')->willReturn($post);

    // Return a Profile which represents the flagged content owner.
    // The username is required to make link generation work.
    $username = 'username';
    $this->profileApi->method('profileFindById')->willReturnMap([
      [$post_owner_id, NULL, (new Profile())->setUsername($username)],
    ]);

    // Generate a dummy url for the post.
    $content_url = 'http://biblo.dk/some/url';
    $this->urlGenerator->method('generate')->willReturnMap([
      [$post, $content_url],
    ]);

    // Make the date formatter return the post date in a specific format we can
    // test against.
    $date_format = 'YMD';
    $this->dateFormatter->method('format')->willReturn($now->format($date_format));

    $flagged_content_details = $this->newFlaggedContentDetailsBlock();

    $result = $flagged_content_details->build();

    $this->assertArrayHasKey('table', $result);
    $this->assertDetailsRowEquals($post->getContent(), $result['table'], 'content');
    $this->assertDetailsRowEquals($now->format($date_format), $result['table'], 'date');

    // Check that the url to the content is the one generated.
    $this->assertDetailsRowLinkUrl($content_url, $result['table'], 'link');
    // The profile link is a route set internally. It does not make sense to
    // check exactly what the route name should be but we can check that the
    // username for the flagged content is used.
    $this->assertDetailsRowLinkText($username, $result['table'], 'profile');
  }

  /**
   * Test handling of API errors when trying to display the block.
   */
  public function testApiException() {
    $this->flaggableContentRepository->method('getContentById')->willThrowException(new ApiException());
    // When an exception is thrown we should hit the log.
    $this->logger->expects($this->once())->method('error');

    $flagged_content_details = $this->newFlaggedContentDetailsBlock();

    $result = $flagged_content_details->build();

    // When an exception is thrown there should be no details.
    $this->assertNoDetails($result['table']);
  }

  /**
   * Test handling when trying to retrieve flagged content with an invalid id.
   */
  public function testInvalidId() {
    // Let the repository stub return NULL when trying to retrieve content by id
    // to signal that there is no content for that id.
    $this->flaggableContentRepository->method('getContentById')->willReturn(NULL);
    // When this occours the logger should be hit.
    $this->logger->expects($this->once())->method('notice');

    $flagged_content_details = $this->newFlaggedContentDetailsBlock();

    $result = $flagged_content_details->build();

    // When unable to retrieve content there should be no details.
    $this->assertNoDetails($result['table']);
  }

}
