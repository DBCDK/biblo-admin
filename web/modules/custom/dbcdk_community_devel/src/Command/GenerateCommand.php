<?php

namespace Drupal\dbcdk_community_devel\Command;

use Faker\Factory;
use DBCDK\CommunityServices\Model\Comment;
use DBCDK\CommunityServices\Model\Flag;
use DBCDK\CommunityServices\Model\ImageCollection;
use DBCDK\CommunityServices\Model\Post;
use DBCDK\CommunityServices\Model\Profile;
use DBCDK\CommunityServices\Model\Quarantine;
use DBCDK\CommunityServices\Model\Review;
use DBCDK\CommunityServices\Model\VideoCollection;
use Drupal\dbcdk_openagency\Client\Branch;
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

    $faker = Factory::create();

    /* @var AgencyBranchService $agency_branch */
    $agency_branch = \Drupal::service('dbcdk_openagency.agency_branch');
    $branch_ids = array_map(function(Branch $branch) {
      return $branch->branchId;
    }, $agency_branch->allBranches());
    // Reviews require a branch id. If there are no branches available because
    // data has not been synced yet then default to the one for Copenhagen
    // libraries. Surrounding code should be able to handle not finding a branch
    // corresponding to an id.
    if (empty($branch_ids)) {
      $branch_ids = [710100];
    }

    // First we create some profiles.
    /* @var \DBCDK\CommunityServices\Api\ProfileApi $profile_api */
    $profile_api = \Drupal::service('dbcdk_community.api.profile');
    foreach (range(1, 10) as $i) {
      $profile = new Profile();
      $profile->setUsername($faker->userName);
      $profile->setDisplayName($faker->firstName . $faker->randomNumber(3));
      $profile->setFullName($faker->name);
      $profile->setDescription($faker->sentence());
      $profile->setEmail($faker->email);
      $profile->setPhone($faker->phoneNumber);
      $profile->setBirthday($faker->dateTimeThisDecade);
      $profile->setCreated($faker->dateTimeBetween('-1 month'));
      $profile->setFavoriteLibrary(['libraryId' => $faker->randomElement($branch_ids)]);
      $this->profiles[] = $profile_api->profileCreate($profile);
    };
    $io->success(sprintf('Created %d profiles', count($this->profiles)));

    // Put some users in quarantine.
    /* @var \DBCDK\CommunityServices\Api\QuarantineApi $quarantine_api */
    $quarantine_api = \Drupal::service('dbcdk_community.api.quarantine');
    foreach (range(1, 5) as $i) {
      $quarantine = new Quarantine();

      $quarantined = $faker->randomElement($this->profiles);
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

      $owner = $faker->randomElement($this->profiles);
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

      $post = $faker->randomElement($this->posts);
      $comment->setPostid($post->getId());

      /* @var Profile $owner */
      $owner = $faker->randomElement($this->profiles);
      $comment->setCommentownerid($owner->getId());

      $comment->setTimeCreated($faker->dateTimeBetween($post->getTimeCreated()));

      $this->comments[] = $comment_api->commentCreate($comment);
    }
    $io->success(sprintf('Created %d comments', count($this->comments)));

    /* @var \DBCDK\CommunityServices\Api\ReviewApi */
    $review_api = \Drupal::service('dbcdk_community.api.review');
    foreach (range(1, 20) as $i) {
      $review = new Review();
      $review->setContent($faker->paragraph());
      $review->setRating($faker->numberBetween(1, 5));
      // Marked as deleted support NULL, TRUE and FALSE
      // Use optional with weight to aim for 1/3 NULL, 1/3 TRUE and 1/3 FALSE.
      $review->setMarkedAsDeleted($faker->optional(0.67)->randomElement([TRUE, FALSE]));
      $review->setLibraryid($faker->randomElement($branch_ids));
      $review->setPid($faker->randomLetter);
      $review->setWorktype($faker->randomLetter);

      $owner = $faker->randomElement($this->profiles);
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
      $post = $faker->randomElement($this->posts);
      $image_collection->setPostImageCollection($post->getId());
      $this->imageCollections[] = $image_collection_api->imageCollectionCreate($image_collection);
    }
    foreach (range(1, 20) as $i) {
      $image_collection = new ImageCollection();
      $comment = $faker->randomElement($this->comments);
      $image_collection->setCommentImageCollection($comment->getId());
      $this->imageCollections[] = $image_collection_api->imageCollectionCreate($image_collection);
    }
    foreach (range(1, 5) as $i) {
      $image_collection = new ImageCollection();
      $review = $faker->randomElement($this->reviews);
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
      $post = $faker->randomElement($this->posts);
      $video_collection->setPostVideoCollection($post->getId());
      $this->videoCollections[] = $video_collection_api->videoCollectionCreate($video_collection);
    }
    foreach (range(1, 5) as $i) {
      $video_collection = new VideoCollection();
      $review = $faker->randomElement($this->reviews);
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

      $owner = $faker->randomElement($this->profiles);
      $flag->setOwnerId($owner->getId());

      $flag->setTimeFlagged($faker->dateTimeBetween($owner->getCreated()));

      $this->flags[] = $flag_api->flagCreate($flag);
    }
    $io->success(sprintf('Created %d flags', count($this->flags)));

    // Link flags to posts.
    foreach (array_slice($this->flags, 0, 10) as $flag) {
      /* @var Flag $flag */
      $post = $faker->randomElement($this->posts);
      $flag->setPosts($post);
      $flag_api->flagUpsert($flag);
    }
    $io->success(sprintf('Linked flags to posts'));

    // Link flags to comments.
    foreach (array_slice($this->flags, 10) as $flag) {
      /* @var Flag $flag */
      $comment = $faker->randomElement($this->comments);
      $flag->setComments($comment);
      $flag_api->flagUpsert($flag);
    }
    $io->success(sprintf('Linked flags to comments'));

    // Link flags to reviews.
    foreach (array_slice($this->flags, 20) as $flag) {
      /* @var Flag $flag */
      $review = $faker->randomElement($this->reviews);
      $flag->setReviews($review);
      $flag_api->flagUpsert($flag);
    }
    $io->success(sprintf('Linked flags to reviews'));
  }

}
