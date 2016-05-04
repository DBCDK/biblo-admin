<?php

/**
 * @file
 * Contains \Drupal\dbcdk_community_devel\Command\GenerateCommand.
 */

namespace Drupal\dbcdk_community_devel\Command;

use DBCDK\CommunityServices\Model\Comment;
use DBCDK\CommunityServices\Model\Flag;
use DBCDK\CommunityServices\Model\ImageCollection;
use DBCDK\CommunityServices\Model\Post;
use DBCDK\CommunityServices\Model\Profile;
use DBCDK\CommunityServices\Model\Quarantine;
use DBCDK\CommunityServices\Model\Review;
use DBCDK\CommunityServices\Model\VideoCollection;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Drupal\Console\Command\Command;
use Drupal\Console\Style\DrupalStyle;

/**
 * This command generates dummy content in the community service.
 *
 * This can be used one of more times to generate a data set for development
 * purposes.
 *
 * @package Drupal\dbcdk_community_devel
 */
class GenerateCommand extends Command {

  /**
   * The generated profiles.
   *
   * @var Profile[]
   */
  protected $profiles = [];

  /**
   * The generated quarantines.
   *
   * @var Quarantine[]
   */
  protected $quarantines = [];

  /**
   * The generated posts.
   *
   * @var Post[]
   */
  protected $posts = [];

  /**
   * The generated comments.
   *
   * @var Comment[]
   */
  protected $comments = [];

  /**
   * The generated reviews.
   *
   * @var Review[]
   */
  protected $reviews = [];

  /**
   * The generated image collections.
   *
   * @var ImageCollection[]
   */
  protected $imageCollections = [];

  /**
   * The generated video collections.
   *
   * @var VideoCollection[]
   */
  protected $videoCollections = [];

  /**
   * The generated flags.
   *
   * @var Flag[]
   */
  protected $flags = [];

  /**
   * {@inheritdoc}
   */
  protected function configure() {
    $this
      ->setName('dbcdk_community_devel:generate')
      ->setDescription($this->trans('command.dbcdk_community_devel.generate.description'));
  }

  /**
   * {@inheritdoc}
   */
  protected function execute(InputInterface $input, OutputInterface $output) {
    $io = new DrupalStyle($input, $output);

    $faker = \Faker\Factory::create();

    // First we create some profiles.
    /* @var \DBCDK\CommunityServices\Api\ProfileApi $profile_api */
    $profile_api = \Drupal::service('dbcdk_community.api.profile');
    foreach (range(1, 10) as $i) {
      $profile = new Profile();
      $profile->setUsername($faker->userName);
      $profile->setDisplayName($faker->firstName);
      $profile->setFullName($faker->name);
      $profile->setDescription($faker->sentence());
      $profile->setEmail($faker->email);
      $profile->setPhone($faker->phoneNumber);
      $profile->setBirthday($faker->dateTimeThisDecade);
      $profile->setCreated($faker->dateTimeBetween('-1 month'));
      $profile->setFavoriteLibrary(['libraryId' => $faker->randomNumber(6, TRUE)]);
      $this->profiles[] = $profile_api->profileCreate($profile);
    };
    $io->success(sprintf('Created %d profiles', count($this->profiles)));

    // Put some users in quarantine.
    /* @var \DBCDK\CommunityServices\Api\QuarantineApi $quarantine_api */
    $quarantine_api = \Drupal::service('dbcdk_community.api.quarantine');
    foreach (range(1, 5) as $i) {
      $quarantine = new Quarantine();

      $quarantined = $this->profiles[rand(0, count($this->profiles) - 1)];
      $quarantine->setQuarantinedProfileId($quarantined->getId());

      $quarantine->setStart($faker->dateTimeBetween($quarantined->getCreated()));
      // We create quarantines to up 1 month ahead. Since we create users up to
      // 1 month back we should have a good shot at generating both active and
      // inactive quarantines.
      $quarantine->setEnd($faker->dateTimeBetween($quarantine->getStart(), '+1 month'));
      $quarantine->setReason($faker->sentence());

      $this->quarantines[] = $quarantine_api->quarantineCreate($quarantine);
    }
    $io->success(sprintf('Created %d quarantines', count($this->quarantines)));

    // Then we create some content.
    /* @var \DBCDK\CommunityServices\Api\PostApi $post_api */
    $post_api = \Drupal::service('dbcdk_community.api.post');
    foreach (range(1, 10) as $i) {
      $post = new Post();
      $post->setTitle($faker->sentence());
      $post->setContent($faker->paragraphs());

      $owner = $this->profiles[rand(0, count($this->profiles) - 1)];
      $post->setPostownerid($owner->getId());

      $post->setTimeCreated($faker->dateTimeBetween($owner->getCreated()));

      $this->posts[] = $post_api->postCreate($post);
    }
    $io->success(sprintf('Created %d posts', count($this->posts)));

    /* @var \DBCDK\CommunityServices\Api\CommentApi $comment_api */
    $comment_api = \Drupal::service('dbcdk_community.api.comment');
    foreach (range(1, 50) as $i) {
      $comment = new Comment();
      $comment->setContent($faker->paragraph);

      $post = $this->posts[rand(0, count($this->posts) - 1)];
      $comment->setPostid($post->getId());

      /* @var Profile $owner */
      $owner = $this->profiles[rand(0, count($this->profiles) - 1)];
      $comment->setCommentownerid($owner->getId());

      $comment->setTimeCreated($faker->dateTimeBetween($post->getTimeCreated()));

      $this->comments[] = $comment_api->commentCreate($comment);
    }
    $io->success(sprintf('Created %d comments', count($this->comments)));

    /* @var \DBCDK\CommunityServices\Api\ReviewApi */
    $review_api = \Drupal::service('dbcdk_community.api.review');
    foreach (range(1, 10) as $i) {
      $review = new Review();
      $review->setContent($faker->paragraphs());
      $review->setRating($faker->numberBetween(1, 5));

      $review->setLibraryid($faker->randomNumber(6, TRUE));
      $review->setPid($faker->randomLetter);
      $review->setWorktype($faker->randomLetter);

      $owner = $this->profiles[rand(0, count($this->profiles) - 1)];
      $review->setReviewownerid($owner->getId());

      $review->setCreated($faker->dateTimeBetween($owner->getCreated()));
      $review->setModified($faker->dateTimeBetween($review->getCreated()));

      $this->reviews[] = $review_api->reviewCreate($review);
    }
    $io->success(sprintf('Created %d reviews', count($this->reviews)));

    // Add some image collections to some content.
    /* @var \DBCDK\CommunityServices\Api\ImageCollectionApi */
    $image_collection_api = \Drupal::service('dbcdk_community.api.image_collection');
    foreach (range(1, 5) as $i) {
      $image_collection = new ImageCollection();
      $post = $this->posts[rand(0, count($this->posts) - 1)];
      $image_collection->setPostImageCollection($post->getId());
      $this->imageCollections[] = $image_collection_api->imageCollectionCreate($image_collection);
    }
    foreach (range(1, 20) as $i) {
      $image_collection = new ImageCollection();
      $comment = $this->comments[rand(0, count($this->comments) - 1)];
      $image_collection->setCommentImageCollection($comment->getId());
      $this->imageCollections[] = $image_collection_api->imageCollectionCreate($image_collection);
    }
    foreach (range(1, 5) as $i) {
      $image_collection = new ImageCollection();
      $review = $this->reviews[rand(0, count($this->reviews) - 1)];
      $image_collection->setReviewImageCollection($review->getId());
      $this->imageCollections[] = $image_collection_api->imageCollectionCreate($image_collection);
    }
    $io->success(sprintf('Created %d image collections', count($this->imageCollections)));

    // Add some video collections to posts and reviews. It is not used for
    // comments.
    /* @var \DBCDK\CommunityServices\Api\VideoCollectionApi */
    $video_collection_api = \Drupal::service('dbcdk_community.api.video_collection');
    foreach (range(1, 5) as $i) {
      $video_collection = new VideoCollection();
      $post = $this->posts[rand(0, count($this->posts) - 1)];
      $video_collection->setPostVideoCollection($post->getId());
      $this->videoCollections[] = $video_collection_api->videoCollectionCreate($video_collection);
    }
    foreach (range(1, 5) as $i) {
      $video_collection = new VideoCollection();
      $review = $this->reviews[rand(0, count($this->reviews) - 1)];
      $video_collection->setReviewVideoCollection($review->getId());
      $this->videoCollections[] = $video_collection_api->videoCollectionCreate($video_collection);
    }
    $io->success(sprintf('Created %d video collections', count($this->videoCollections)));

    // Flag some content.
    /* @var \DBCDK\CommunityServices\Api\FlagApi $flag_api */
    $flag_api = \Drupal::service('dbcdk_community.api.flag');
    foreach (range(1, 20) as $i) {
      $flag = new Flag();
      $flag->setDescription($faker->sentence());
      $flag->setMarkedAsRead((bool) rand(0, 1));

      $owner = $this->profiles[rand(0, count($this->profiles) - 1)];
      $flag->setOwnerId($owner->getId());

      $flag->setTimeFlagged($faker->dateTimeBetween($owner->getCreated()));

      $this->flags[] = $flag_api->flagCreate($flag);
    }
    $io->success(sprintf('Created %d flags', count($this->flags)));

    // Link flags to posts.
    foreach (array_slice($this->flags, 0, 10) as $flag) {
      /* @var Flag $flag */
      $post = $this->posts[rand(0, count($this->posts) - 1)];
      $flag->setPosts($post);
      $flag_api->flagUpsert($flag);
    }
    $io->success(sprintf('Linked flags to posts'));

    // Link flags to comments.
    foreach (array_slice($this->flags, 10) as $flag) {
      /* @var Flag $flag */
      $comment = $this->comments[rand(0, count($this->comments) - 1)];
      $flag->setComments($comment);
      $flag_api->flagUpsert($flag);
    }
    $io->success(sprintf('Linked flags to comments'));

    // Link flags to reviews.
    foreach (array_slice($this->flags, 20) as $flag) {
      /* @var Flag $flag */
      $review = $this->reviews[rand(0, count($this->reviews) - 1)];
      $flag->setReviews($review);
      $flag_api->flagUpsert($flag);
    }
    $io->success(sprintf('Linked flags to reviews'));
  }

}
