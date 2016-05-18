<?php
/**
 * @file
 * Test case for ReviewListForm.
 */

namespace Drupal\dbcdk_community_moderation\Test\Unit\Form;

use DBCDK\CommunityServices\ApiException;
use DBCDK\CommunityServices\Model\InlineResponse200;
use DBCDK\CommunityServices\Model\Profile;
use DBCDK\CommunityServices\Model\Review;
use Drupal\Core\Form\FormState;
use Drupal\dbcdk_community_moderation\Form\ReviewListForm;
use Drupal\Tests\dbcdk_community\Unit\UnitTestBase;

/**
 * Test case for ReviewListForm.
 *
 * @group dbcdk_community_moderation
 */
class ReviewListFormTest extends UnitTestBase {

  /* @var \PHPUnit_Framework_MockObject_MockObject */
  protected $pager;

  /* @var \PHPUnit_Framework_MockObject_MockObject */
  protected $message;

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();

    $namespace = '\Drupal\dbcdk_community_moderation\Form';
    $this->pager = $this->getFunctionMock($namespace, 'pager_default_initialize');
    $this->message = $this->getFunctionMock($namespace, 'drupal_set_message');
  }

  /**
   * Test form creation.
   */
  public function testFormBuild() {
    $review_content = 'Some content';
    $review_rating = 5;
    $review_pid = '1234';
    $review_library_id = '2345';
    $review_date = new \DateTime();
    $review = new Review();
    $review->setId(1);
    $review->setCreated($review_date);
    $review->setContent($review_content);
    $review->setRating($review_rating);
    $review->setPid($review_pid);
    $review->setLibraryid($review_library_id);
    $reviews = [$review];
    $profile_username = 'username';
    $profile = new Profile();
    $profile->setUsername($profile_username);

    $count = (new InlineResponse200())->setCount(count($reviews));
    $this->reviewApi->method('reviewCount')->willReturn($count);

    $this->pager->expects($this->once())->willReturn(0);

    $this->reviewApi->method('reviewFind')->willReturn($reviews);
    $this->reviewApi->method('reviewPrototypeGetOwner')->willReturn($profile);

    $date_format = 'Y-m-d';
    $this->dateFormatter->method('format')->willReturn($review_date->format($date_format));

    $review_url = 'http://biblo.dk';
    $this->urlGenerator->method('generate')->willReturn($review_url);

    $form_state = (new FormState())->setUserInput([]);
    $form = $this->newReviewListForm();
    $form = $form->buildForm([], $form_state);

    $this->assertCount(1, $form['table']['#rows']);
    $row = array_shift($form['table']['#rows']);
    $this->assertEquals($review_content, $row['content']);
    $this->assertEquals($review_rating, $row['rating']);
    $this->assertEquals($review_pid, $row['pid']);
    $this->assertEquals($review_library_id, $row['library']);
    $this->assertLinkText($profile_username, $row['author']);
    $this->assertEquals($review_date->format($date_format), $row['date']['data']);
    $this->assertLinkUrl($review_url, $row['community_link']);
  }

  /**
   * Test library filter.
   */
  public function testLibraryFilter() {
    $library_id = 1;
    $form_state = (new FormState())->setUserInput(['library_id' => $library_id]);

    // With a library id set we should only count reviews with that id.
    $this->reviewApi
      ->expects($this->once())
      ->method('reviewCount')
      ->with(json_encode(['libraryid' => $library_id]))
      ->willReturn((new InlineResponse200())->setCount(1));

    // With a library id set we should only find reviews with that id.
    $this->reviewApi
      ->expects($this->once())
      ->method('reviewFind')
      ->with(json_encode(['where' => ['libraryid' => $library_id], 'offset' => 0, 'limit' => 10]));

    $form = $this->newReviewListForm();
    $form->buildForm([], $form_state);
  }

  /**
   * Test handling of count exceptions.
   */
  public function testCountException() {
    $this->reviewApi->method('reviewCount')->willThrowException(new ApiException());

    $review = new Review();
    $review->setId(1);
    $review->setCreated(new \DateTime());
    $reviews = [$review];

    // If we are unable to get the review count then we should not be trying to
    // do any paging when finding flags and thus there should be no offset or
    // limit.
    $this->reviewApi
      ->expects($this->once())
      ->method('reviewFind')
      ->with(json_encode(['where' => new \stdClass()]))
      ->willReturn($reviews);
    // We expect a warning though.
    $this->logger->expects($this->once())->method('warning');

    $this->reviewApi
      ->method('reviewPrototypeGetOwner')
      ->willReturn((new Profile)->setUsername('username'));

    $review_url = 'http://biblo.dk';
    $this->urlGenerator->method('generate')->willReturn($review_url);

    $form_state = (new FormState())->setUserInput([]);
    $form = $this->newReviewListForm();
    $return = $form->buildForm([], $form_state);

    $this->assertCount(count($reviews), $return['table']['#rows']);
  }

  /**
   * Test handling of find exceptions.
   */
  public function testFindException() {
    $count = (new InlineResponse200())->setCount(1);
    $this->reviewApi->method('reviewCount')->willReturn($count);
    $this->reviewApi->method('reviewFind')->willThrowException(new ApiException());

    // When we are not able to get any reviews then we expect an error to be
    // logged and an message shown to the user.
    $this->logger->expects($this->once())->method('error');
    $this->message->expects($this->once());

    $form_state = (new FormState())->setUserInput([]);
    $form = $this->newReviewListForm();
    $return = $form->buildForm([], $form_state);

    // There should be no rows in the resulting table.
    $this->assertEmpty($return['table']['#rows']);
  }

  /**
   * Test handling of exceptions where trying to retrieve review owners.
   */
  public function testReviewOwnerIdException() {
    $this->reviewApi->method('reviewPrototypeGetOwner')->willThrowException(new ApiException());

    $count = (new InlineResponse200())->setCount(1);
    $this->reviewApi->method('reviewCount')->willReturn($count);

    $review_owner_id = 2;
    $review = new Review();
    $review->setId(1);
    $review->setCreated(new \DateTime());
    $review->setReviewownerid($review_owner_id);
    $reviews = [$review];
    $this->reviewApi->method('reviewFind')->willReturn($reviews);

    $this->urlGenerator->method('generate')->willReturn('http://biblo.dk');

    // If we cannot get the owner of a review then a warning should be logged.
    $this->logger->expects($this->once())->method('warning');

    $form_state = (new FormState())->setUserInput([]);
    $form = $this->newReviewListForm();
    $return = $form->buildForm([], $form_state);

    // Despite the error the review should still appear in the list but only
    // showing the author user id.
    $this->assertCount(count($reviews), $return['table']['#rows']);
    $row = array_shift($return['table']['#rows']);
    $this->assertContains((string) $review_owner_id, (string) $row['author']);
  }

  /**
   * Get a new review list form ready for testing.
   *
   * @return ReviewListForm
   *   The ReviewListForm to test.
   */
  protected function newReviewListForm() {
    $form = new ReviewListForm(
      $this->logger,
      $this->dateFormatter,
      $this->urlGenerator,
      $this->reviewApi
    );
    $form->setStringTranslation($this->translation);
    return $form;
  }

}
