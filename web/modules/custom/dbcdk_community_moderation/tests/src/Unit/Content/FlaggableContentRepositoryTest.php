<?php

/**
 * @file
 * FlaggableContentRepositoryTest class definition.
 */

namespace Drupal\dbcdk_community\Test\Content;

use DBCDK\CommunityServices\ApiException;
use DBCDK\CommunityServices\Model\Flag;
use DBCDK\CommunityServices\Model\ImageCollection;
use DBCDK\CommunityServices\Model\VideoCollection;
use Drupal\dbcdk_community_moderation\Content\Comment;
use Drupal\dbcdk_community_moderation\Content\FlaggableContentRepository;
use Drupal\dbcdk_community_moderation\Content\Post;
use Drupal\dbcdk_community_moderation\Content\Review;
use Drupal\Tests\UnitTestCase;

/**
 * Tests flaggable content retrieval.
 *
 * @group dbcdk_community_moderation
 */
class FlaggableContentRepositoryTest extends UnitTestCase {

  /**
   * Mock FlagAPI.
   *
   * @var \PHPUnit_Framework_MockObject_MockObject
   */
  protected $flagApi;

  /**
   * Mock PostAPI.
   *
   * @var \PHPUnit_Framework_MockObject_MockObject
   */
  protected $postApi;

  /**
   * Mock CommentAPI.
   *
   * @var \PHPUnit_Framework_MockObject_MockObject
   */
  protected $commentApi;

  /**
   * Mock ReviewAPI.
   *
   * @var \PHPUnit_Framework_MockObject_MockObject
   */
  protected $reviewApi;

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();

    // Create stubs.
    $this->flagApi = $this->getMock('DBCDK\CommunityServices\Api\FlagApi');
    $this->postApi = $this->getMock('DBCDK\CommunityServices\Api\PostApi');
    $this->commentApi = $this->getMock('DBCDK\CommunityServices\Api\CommentApi');
    $this->reviewApi = $this->getMock('DBCDK\CommunityServices\Api\ReviewApi');
  }

  /**
   * Test that flaggable content can be retrieved by id.
   */
  public function testContentById() {
    $post = (new Post())->setId(1);
    $flag = (new Flag())->setId(1)->setPosts($post);

    $this->flagApi->method('flagFind')->will($this->returnValue([$flag]));

    $repo = new FlaggableContentRepository($this->flagApi, $this->postApi, $this->commentApi, $this->reviewApi);

    $flaggable_content = $repo->getContentById(1);
    $this->assertTrue($flaggable_content->equals($post));
  }

  /**
   * Test that flaggable content can be retrieved by id.
   */
  public function testContentWithAllFlagsById() {
    // This post should have two flags.
    $post = (new Post())->setId(1);
    $flags = [
      1 => (new Flag())->setId(1)->setTimeFlagged(new \DateTime('now'))->setPosts($post),
      2 => (new Flag())->setId(2)->setTimeFlagged(new \DateTime('-1 days'))->setPosts($post),
    ];

    $this->flagApi->method('flagFind')->will($this->returnCallback(function($filter) use ($flags) {
      $filter = json_decode($filter);
      $id = (!empty($filter->where->id)) ? $filter->where->id : NULL;
      return array_filter($flags, function(Flag $flag) use ($id) {
        return (empty($id)) || $flag->getId() === $id;
      });
    }));

    $repo = new FlaggableContentRepository($this->flagApi, $this->postApi, $this->commentApi, $this->reviewApi);

    $flaggable_content = $repo->getContentByIdAllFlags(1);
    $this->assertTrue($flaggable_content->equals($post));

    $this->assertSameSize($flags, $flaggable_content->getFlags());
    foreach ($flags as $post_flag) {
      $this->assertContains($post_flag, $flaggable_content->getFlags());
    }
  }

  /**
   * Test that we can assemble a list of content with flags.
   */
  public function testUnreadWithFlags() {
    // This post should have two flags.
    $post = (new Post())->setId(1);
    $post_flags = [
      1 => (new Flag())->setId(1)->setTimeFlagged(new \DateTime('now'))->setPosts($post),
      2 => (new Flag())->setId(2)->setTimeFlagged(new \DateTime('-1 days'))->setPosts($post),
    ];
    $post->addFlags($post_flags);

    // This comment should have a single flag.
    $comment = (new Comment())->setId(1);
    $comment_flags = [
      3 => (new Flag())->setId(3)->setTimeFlagged(new \DateTime('-2 days'))->setComments($comment),
    ];
    $comment->addFlags($comment_flags);

    // This review should have a single flag.
    $review = (new Review())->setId(1);
    $review_flags = [
      4 => (new Flag())->setId(4)->setTimeFlagged(new \DateTime('-3 days'))->setReviews($review),
    ];
    $review->addFlags($review_flags);

    $this->flagApi->method('flagFind')->willReturn(array_merge($post_flags, $comment_flags, $review_flags));

    $repo = new FlaggableContentRepository($this->flagApi, $this->postApi, $this->commentApi, $this->reviewApi);

    $flaggable_content = $repo->getContentWithUnreadFlags();

    $this->assertSameSize([$post, $comment, $review], $flaggable_content);

    // The first flaggable content should be the post.
    $this->assertEquals($post, array_shift($flaggable_content));

    // The second flaggable content should be the comment.
    $this->assertEquals($comment, array_shift($flaggable_content));

    // The third flaggable content should be the review and have one flag.
    $this->assertEquals($review, array_shift($flaggable_content));
  }

  /**
   * Test that ImageCollection's can be fetched by the repository.
   */
  public function testContentWithImageCollections() {
    // Data.
    $post = new Post();
    $post->setId(1);
    $collections = [];
    $collections[] = (new ImageCollection())
      ->setId(1)
      ->setPostImageCollection($post->getId());
    $collections[] = (new ImageCollection())
      ->setId(2)
      ->setPostImageCollection($post->getId());

    // Stubs.
    $this->postApi->method('postPrototypeGetImage')->willReturn($collections);

    // Get a FlaggableContentRepository with a Post object.
    $repo = new FlaggableContentRepository($this->flagApi, $this->postApi, $this->commentApi, $this->reviewApi);

    // Assume that the collections defined above is the same once returned by
    // the FlaggableContentRepository::getCollections method.
    $images = $repo->getImageCollections($post);
    $this->assertEquals($images, $collections);
  }

  /**
   * Test that VideoCollection's can be fetched by the repository.
   */
  public function testContentWithVideoCollections() {
    // Data.
    $post = new Post();
    $post->setId(1);
    $collections = [];
    $collections[] = (new VideoCollection())
      ->setId(1)
      ->setPostVideoCollection($post->getId());
    $collections[] = (new VideoCollection())
      ->setId(2)
      ->setPostVideoCollection($post->getId());

    $this->postApi->method('postPrototypeGetVideo')->willReturn($collections);

    // Get a FlaggableContentRepository with a Post object.
    $repo = new FlaggableContentRepository($this->flagApi, $this->postApi, $this->commentApi, $this->reviewApi);

    // Assume that the collections defined above is the same once returned by
    // the FlaggableContentRepository::getCollections method.
    $videos = $repo->getVideoCollections($post);
    $this->assertEquals($videos, $collections);
  }

  /**
   * Test that exceptions are if flag retrieval fails.
   */
  public function testExceptionThrowing() {
    $this->flagApi->method('flagFind')->willThrowException(new ApiException());

    $repo = new FlaggableContentRepository($this->flagApi, $this->postApi, $this->commentApi, $this->reviewApi);

    $this->setExpectedException('DBCDK\CommunityServices\ApiException');
    $repo->getContentWithUnreadFlags();
  }

}
