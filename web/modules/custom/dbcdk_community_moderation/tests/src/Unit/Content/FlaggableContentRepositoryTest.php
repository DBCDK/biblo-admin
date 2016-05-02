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
use Drupal\Tests\UnitTestCase;

/**
 * Tests flaggable content retrieval.
 *
 * @group dbcdk_community_moderation
 */
class FlaggableContentRepositoryTest extends UnitTestCase {

  /**
   * Test that flaggable content can be retrieved by id.
   *
   * @param Flag[] $flags
   *   The flags to return from the Flag API in the test.
   * @param Flag[] $post_flags
   *   A map of flag ids to posts in the test.
   * @param Flag[] $comment_flags
   *   A map of flag ids to comments in the test.
   *
   * @dataProvider unreadWithFlagsDataProvider
   */
  public function testContentById(array $flags, array $post_flags, array $comment_flags) {
    // Create stubs.
    $flag_api_stub = $this->getMock('DBCDK\CommunityServices\Api\FlagApi');
    $post_api_stub = $this->getMock('DBCDK\CommunityServices\Api\PostApi');
    $comment_api_stub = $this->getMock('DBCDK\CommunityServices\Api\CommentApi');
    $flag_api_stub->method('flagFind')->will($this->returnValue([$flags[1]]));
    $repo = new FlaggableContentRepository($flag_api_stub, $post_api_stub, $comment_api_stub);
    $flaggable_content = $repo->getContentById(1);
    $this->assertTrue($flaggable_content->equals(new Post($post_flags[1]->getPosts())));
  }

  /**
   * Test that flaggable content can be retrieved by id.
   *
   * @param Flag[] $flags
   *   The flags to return from the Flag API in the test.
   * @param Flag[] $post_flags
   *   A map of flag ids to posts in the test.
   * @param Flag[] $comment_flags
   *   A map of flag ids to comments in the test.
   *
   * @dataProvider unreadWithFlagsDataProvider
   */
  public function testContentWithAllFlagsById(array $flags, array $post_flags, array $comment_flags) {
    // Create stubs.
    $flag_api_stub = $this->getMock('DBCDK\CommunityServices\Api\FlagApi');
    $post_api_stub = $this->getMock('DBCDK\CommunityServices\Api\PostApi');
    $comment_api_stub = $this->getMock('DBCDK\CommunityServices\Api\CommentApi');
    $flag_api_stub->method('flagFind')->will($this->returnCallback(function($filter) use ($flags) {
      $filter = json_decode($filter);
      $id = (!empty($filter->where->id)) ? $filter->where->id : NULL;
      return array_filter($flags, function(Flag $flag) use ($id) {
        return (empty($id)) || $flag->getId() === $id;
      });
    }));

    $repo = new FlaggableContentRepository($flag_api_stub, $post_api_stub, $comment_api_stub);

    $flaggable_content = $repo->getContentByIdAllFlags(1);
    $this->assertTrue($flaggable_content->equals(new Post($post_flags[1]->getPosts())));

    $this->assertSameSize($post_flags, $flaggable_content->getFlags());
    foreach ($post_flags as $post_flag) {
      $this->assertContains($post_flag, $flaggable_content->getFlags());
    }
  }

  /**
   * Test that we can assemble a list of content with flags.
   *
   * @param Flag[] $flags
   *   The flags to return from the Flag API in the test.
   * @param Flag[] $post_flags
   *   A map of flag ids to posts in the test.
   * @param Flag[] $comment_flags
   *   A map of flag ids to comments in the test.
   *
   * @dataProvider unreadWithFlagsDataProvider
   */
  public function testUnreadWithFlags(array $flags, array $post_flags, array $comment_flags) {
    // Create stubs.
    $flag_api_stub = $this->getMock('DBCDK\CommunityServices\Api\FlagApi');
    $post_api_stub = $this->getMock('DBCDK\CommunityServices\Api\PostApi');
    $comment_api_stub = $this->getMock('DBCDK\CommunityServices\Api\CommentApi');
    $flag_api_stub->method('flagFind')->willReturn($flags);

    $repo = new FlaggableContentRepository($flag_api_stub, $post_api_stub, $comment_api_stub);
    $flaggable_content = $repo->getContentWithUnreadFlags();

    // @TODO These assertions currently are thightly coupled with the data
    // provider.
    // We should have two pieces of flagged content: 1 post and 1 comment.
    $this->assertCount(2, $flaggable_content);

    // The first flaggable content should be the post and have two flags.
    $flaggable_post = new Post($post_flags[1]->getPosts());
    $flaggable_post->addFlags($post_flags);
    $this->assertEquals($flaggable_post, $flaggable_content[0]);

    // The second flaggable content should be the comment and have one flag.
    $flaggable_comment = new Comment($comment_flags[3]->getComments());
    $flaggable_comment->addFlag($comment_flags[3]);
    $this->assertEquals($flaggable_comment, $flaggable_content[1]);
  }

  /**
   * Data provider for testUnreadWithFlags.
   *
   * @return array
   *   Arrays of data sets to use with the test.
   */
  public function unreadWithFlagsDataProvider() {
    // This post should have two flags.
    $post = (new Post())->setId(1);

    $post_flags = [
      1 => (new Flag())->setId(1)->setTimeFlagged(new \DateTime('now'))->setPosts($post),
      2 => (new Flag())->setId(2)->setTimeFlagged(new \DateTime('-1 days'))->setPosts($post),
    ];

    // This comment should have a single flag.
    $comment = (new Comment())->setId(1);

    $comment_flags = [
      3 => (new Flag())->setId(3)->setTimeFlagged(new \DateTime('-2 days'))->setComments($comment),
    ];

    return [
      [
        array_merge($post_flags, $comment_flags),
        $post_flags,
        $comment_flags,
      ],
    ];
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
    $flag_api_stub = $this->getMock('DBCDK\CommunityServices\Api\FlagApi');
    $post_api_stub = $this->getMock('DBCDK\CommunityServices\Api\PostApi');
    $comment_api_stub = $this->getMock('DBCDK\CommunityServices\Api\CommentApi');
    $post_api_stub->method('postPrototypeGetImage')->willReturn($collections);

    // Get a FlaggableContentRepository with a Post object.
    $repo = new FlaggableContentRepository($flag_api_stub, $post_api_stub, $comment_api_stub);

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

    // Stubs.
    $flag_api_stub = $this->getMock('DBCDK\CommunityServices\Api\FlagApi');
    $post_api_stub = $this->getMock('DBCDK\CommunityServices\Api\PostApi');
    $comment_api_stub = $this->getMock('DBCDK\CommunityServices\Api\CommentApi');
    $post_api_stub->method('postPrototypeGetVideo')->willReturn($collections);

    // Get a FlaggableContentRepository with a Post object.
    $repo = new FlaggableContentRepository($flag_api_stub, $post_api_stub, $comment_api_stub);

    // Assume that the collections defined above is the same once returned by
    // the FlaggableContentRepository::getCollections method.
    $videos = $repo->getVideoCollections($post);
    $this->assertEquals($videos, $collections);
  }

  /**
   * Test that exceptions are if flag retrieval fails.
   */
  public function testExceptionThrowing() {
    $flag_api_stub = $this->getMock('DBCDK\CommunityServices\Api\FlagApi');
    $post_api_stub = $this->getMock('DBCDK\CommunityServices\Api\PostApi');
    $comment_api_stub = $this->getMock('DBCDK\CommunityServices\Api\CommentApi');
    $flag_api_stub->method('flagFind')->willThrowException(new ApiException());

    $repo = new FlaggableContentRepository($flag_api_stub, $post_api_stub, $comment_api_stub);

    $this->setExpectedException('DBCDK\CommunityServices\ApiException');
    $repo->getContentWithUnreadFlags();
  }

}
