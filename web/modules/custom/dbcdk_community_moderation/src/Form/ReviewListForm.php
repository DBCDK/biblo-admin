<?php
/**
 * @file
 * Class definition for review lists.
 */

namespace Drupal\dbcdk_community_moderation\Form;

use DBCDK\CommunityServices\Api\ReviewApi;
use DBCDK\CommunityServices\ApiException;
use Drupal\Core\Datetime\DateFormatter;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Link;
use Drupal\Core\Url;
use Drupal\dbcdk_community\Url\PropertyUrlGenerator;
use Drupal\dbcdk_community\Url\UrlGeneratorInterface;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * A form for displaying and filtering in lists of reviews.
 */
class ReviewListForm extends FormBase {
  use LoggerAwareTrait;

  /**
   * The date formatter to use when displaying creation dates for reviews.
   *
   * @var DateFormatter
   */
  protected $dateFormatter;

  /**
   * The url generatur to use for links to reviews on the biblo.dk site.
   *
   * @var UrlGeneratorInterface
   */
  protected $urlGenerator;

  /**
   * The review api to use for retrieving reviews
   *
   * @var ReviewApi
   */
  protected $reviewApi;

  /**
   * ReviewListForm constructor.
   *
   * @param \Psr\Log\LoggerInterface $logger
   *   The logger to use.
   * @param \Drupal\Core\Datetime\DateFormatter $date_formatter
   *   The date formatter to use.
   * @param \Drupal\dbcdk_community\Url\UrlGeneratorInterface $url_generator
   *   The url generator to use.
   * @param \DBCDK\CommunityServices\Api\ReviewApi $review_api
   *   The review api to use.
   */
  public function __construct(LoggerInterface $logger, DateFormatter $date_formatter, UrlGeneratorInterface $url_generator, ReviewApi $review_api) {
    $this->logger = $logger;
    $this->dateFormatter = $date_formatter;
    $this->urlGenerator = $url_generator;
    $this->reviewApi = $review_api;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    /* @var \Drupal\Core\Config\Config $config */
    $config = $container->get('config.factory')->get('dbcdk_community.settings');
    $url_generator = new PropertyUrlGenerator(
      $config->get('community_site_url') .
      $config->get('community_site_review_url_pattern')
    );
    return new static(
      $container->get('dbcdk_community.logger'),
      $container->get('date.formatter'),
      $url_generator,
      $container->get('dbcdk_community.api.review')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'dbcdk_community_moderation_review_list_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // Get the user submitted values without Drupals extras.
    // As we use form rebuild these have to be retrieved as user input - not
    // values.
    $input = $form_state->getUserInput();
    $input = array_diff_key(
      $input,
      ['op' => 1, 'form_build_id' => 1, 'form_token' => 1]
    );

    $form['filter'] = [
      '#type' => 'details',
      '#title' => $this->t('Filter list'),
      '#description' => $this->t('Show reviews matching the following criteria'),
      // If we have user submitted values then show the filter.
      '#open' => (!empty($input)),
    ];

    $form['filter']['library_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Library id'),
      '#default_value' => ((empty($input['library_id'])) ?: $input['library_id']),
    ];

    $form['filter']['actions']['#type'] = 'actions';
    $form['filter']['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Filter'),
    ];

    $filter = new \stdClass();
    if (!empty($input['library_id'])) {
      $filter->libraryid = $input['library_id'];
    }
    $page_filter = ['where' => $filter];

    $num_reviews = NULL;
    $content_per_page = 10;
    // Page number from pager_default_initialize() is 0-indexed.
    $page = 0;
    try {
      // If we can get a count of the total number of reviews then limit the
      // review filter to support paging. Otherwise we just get all that we can.
      $num_reviews = $this->reviewApi->reviewCount(json_encode($filter))->getCount();
      $page = pager_default_initialize($num_reviews, $content_per_page);

      $page_filter['offset'] = $page * $content_per_page;
      $page_filter['limit'] = $content_per_page;
    }
    catch (ApiException $e) {
      $this->logger->warning($e);
    }

    /* @var \DBCDK\CommunityServices\Model\Review[] $reviews */
    $reviews = [];
    try {
      $reviews = (array) $this->reviewApi->reviewFind(json_encode($page_filter));
    }
    catch (ApiException $e) {
      drupal_set_message($this->t('An error occurred when retrieving data from the community service. Please try again later or contact an administrator.'), 'error');
      $this->logger->error($e);
    }

    $caption = '';
    if ($num_reviews > $content_per_page) {
      $caption = $this->t('Showing %from-%to of %total reviews', [
        '%from' => ($page * $content_per_page) + 1,
        '%to' => min((($page + 1) * $content_per_page), $num_reviews),
        '%total' => $num_reviews,
      ]);
    }
    $table = [
      '#theme' => 'table',
      '#caption' => $caption,
      '#header' => [
        $this->t('Content'),
        $this->t('Rating'),
        $this->t('PID'),
        $this->t('Library'),
        $this->t('Author'),
        $this->t('Date'),
        $this->t('Link'),
      ],
      '#rows' => [],
      '#empty' => $this->t('No reviews found'),
    ];

    foreach ($reviews as $review) {
      try {
        // If we can get the owner profile for the review then link to it.
        $profile = $this->reviewApi->reviewPrototypeGetOwner($review->getId());
        $author = Link::createFromRoute($profile->getUsername(),
          'dbcdk_community_moderation.profile.edit', [
            'username' => $profile->getUsername(),
          ]
        );
      }
      catch (ApiException $e) {
        // Otherwise just show the id and issue a warning.
        $author = $this->t('User %id', ['%id' => $review->getReviewownerid()]);
        $this->logger->warning($e);
      }

      $table['#rows'][] = [
        'content' => $review->getContent(),
        'rating' => $review->getRating(),
        'pid' => $review->getPid(),
        'library' => $review->getLibraryid(),
        'author' => $author,
        'date' => $this->dateFormatter->format($review->getCreated()->getTimestamp(), 'dbcdk_community_service_date_time'),
        'community_link' => Link::fromTextAndUrl(
          $this->t('View on Biblo.dk'),
          Url::fromUri($this->urlGenerator->generate($review))
        ),
      ];
    }

    $form['table'] = $table;
    $form['pager'] = [
      '#type' => 'pager',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Rebuild the form to perform the actual filtering. There is nothing to
    // submit as such.
    $form_state->setRebuild(TRUE);
  }

}