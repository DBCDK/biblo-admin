<?php
/**
 * @file
 * Definition of FlaggedContentListTest.
 */

namespace Drupal\Tests\dbcdk_community_moderation\Unit\Plugin\Block;

use DBCDK\CommunityServices\ApiException;
use DBCDK\CommunityServices\Model\Flag;
use Drupal\dbcdk_community_moderation\Content\Post;
use Drupal\dbcdk_community_moderation\Plugin\Block\FlaggedContentList;
use Drupal\Tests\dbcdk_community\Unit\Plugin\Block\BlockTestBase;

/**
 * Test class for FlaggedContentList block.
 *
 * @group dbcdk_community_moderation
 */
class FlaggedContentListTest extends BlockTestBase {

  /**
   * Generate a new FlaggedContentList wired up with mocks.
   *
   * @return \Drupal\dbcdk_community_moderation\Plugin\Block\FlaggedContentList
   *   New block ready for testing.
   */
  public function newFlaggedContentList() {
    $list = new FlaggedContentList(
      [],
      NULL,
      NULL,
      $this->logger,
      $this->flaggableContentRepository,
      $this->urlGenerator,
      $this->dateFormatter
    );

    $list->setStringTranslation($this->translation);

    return $list;
  }

  /**
   * Test list with a single flagged content element.
   */
  public function testSingleEntryList() {
    $post_content = 'Post content';
    $time_flagged = new \DateTime();
    $flag_text = 'Flag text';

    $post = new Post();
    $post->setContent($post_content);
    $post->addFlag((new Flag())
        ->setDescription($flag_text)
        ->setTimeFlagged($time_flagged)
    );
    $this->flaggableContentRepository->method('getContentWithUnreadFlags')->willReturn([
      $post,
    ]);

    $date_format = 'YMD';
    $this->dateFormatter->method('format')->willReturn($time_flagged->format($date_format));

    $url = 'http://biblo.dk';
    $this->urlGenerator->method('generate')->willReturnMap([
      [$post, $url],
    ]);

    // With only a single element the pager should return page 0.
    $this->pager->expects($this->once())->willReturn(0);

    $list = $this->newFlaggedContentList();
    $result = $list->build();

    $this->assertCount(1, $result['table']['#rows']);

    // Check that a row contains the expected data.
    $row = array_shift($result['table']['#rows']);
    $this->assertFlaggedContent($post_content, $row['content']);
    $this->assertEquals(1, $row['num_flags']);
    $this->assertEquals($time_flagged->format($date_format), $row['flag_time']);
    $this->assertEquals($flag_text, $row['flag_text']);
    // We only check that a details link is set. The link text does not contain
    // references to the content as that is displayed in other columns. The url
    // uses a route which is set internally.
    $this->assertNotEmpty($row['details']);
    $this->assertLinkUrl($url, $row['link']);
  }

  /**
   * Test list with multiple pages.
   */
  public function testMultiplePagesList() {
    // Generate a set of mock flaggable content which will span multiple pages
    // in the list.
    $flagged_content = [];
    // This number is aligned with the hardcoded value in the block.
    $posts_per_page = 10;
    // By choosing 21 we should get an initial page, a full subsequent page and
    // a partial last page.
    $num_posts = 21;
    $num_pages = ceil($num_posts / $posts_per_page);
    foreach (range(0, $num_posts - 1) as $post_id) {
      $post = new Post();
      // We set the content for each element to be a unique count. The list does
      // not contain the object or show the id so this is the best we can do to
      // have something to use when checking for equality.
      $post->setContent($post_id);
      $post->addFlag((new Flag())->setTimeFlagged(new \DateTime()));

      $flagged_content[$post_id] = $post;
    }
    $this->flaggableContentRepository->method('getContentWithUnreadFlags')->willReturn($flagged_content);

    // Make the pager return a page count increasing by one for each call.
    $this->pager->expects($this->any())->willReturnCallback(function() {
      static $page;
      $page = (!isset($page)) ? 0 : $page;
      return $page++;
    });

    // Test list content for each page.
    foreach (range(1, $num_pages) as $page) {
      $list = $this->newFlaggedContentList();
      $result = $list->build();

      // Expect a full count except when we are on the last page.
      $expected_count = ($page == $num_pages) ? $num_posts % $posts_per_page : $posts_per_page;
      $this->assertCount($expected_count, $result['table']['#rows']);

      // Based on how we set the content for the posts then the content of the
      // first row of the paged result should be the entry number from the total
      // set - 0-indexed. E.g. first row on page 1 should have the content 10.
      $row = array_shift($result['table']['#rows']);
      $this->assertFlaggedContent((($page - 1) * $posts_per_page), $row['content']);
    }

  }

  /**
   * Test list without any elements.
   */
  public function testNoContent() {
    $this->flaggableContentRepository->method('getContentWithUnreadFlags')->willReturn([]);

    $list = $this->newFlaggedContentList();
    $result = $list->build();

    $this->assertEmpty($result['table']['#rows']);
  }

  /**
   * Test list with an exception thrown from the repository.
   */
  public function testApiException() {
    $this->flaggableContentRepository->method('getContentWithUnreadFlags')->willThrowException(new ApiException());

    // API exceptions should be logged and a message shown to the user.
    $this->logger->expects($this->once())->method('error');
    $this->message->expects($this->once());

    $list = $this->newFlaggedContentList();
    $result = $list->build();

    $this->assertEmpty($result['table']['#rows']);
  }

  /**
   * Assert that a render array for flagged content should have certain content.
   *
   * @param string $expected
   *   The expected content.
   * @param array $actual_render_element
   *   The render array.
   */
  protected function assertFlaggedContent($expected, array $actual_render_element) {
    $this->assertEquals($expected, $actual_render_element['data']['#content']);
  }

}
