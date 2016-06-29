<?php

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
use Drupal\dbcdk_openagency\Service\AgencyBranchService;
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
   * The review api to use for retrieving reviews.
   *
   * @var ReviewApi
   */
  protected $reviewApi;

  /**
   * The service for retrieving agency/branch info.
   *
   * @var AgencyBranchService
   */
  protected $agencyBranchService;

  /**
   * Number of reviews to show on each page.
   *
   * @var int
   */
  const CONTENT_PER_PAGE = 100;

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
   * @param \Drupal\dbcdk_openagency\Service\AgencyBranchService $agency_branch_service
   *   The service for retrieving agency/branch info.
   */
  public function __construct(
    LoggerInterface $logger,
    DateFormatter $date_formatter,
    UrlGeneratorInterface $url_generator,
    ReviewApi $review_api,
    AgencyBranchService $agency_branch_service
  ) {
    $this->logger = $logger;
    $this->dateFormatter = $date_formatter;
    $this->urlGenerator = $url_generator;
    $this->reviewApi = $review_api;
    $this->agencyBranchService = $agency_branch_service;
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
      $container->get('dbcdk_community.api.review'),
      $container->get('dbcdk_openagency.agency_branch')
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
    $input = $this->getRequest()->query->all();

    $form['filter'] = [
      '#type' => 'details',
      '#title' => $this->t('Filter list'),
      '#description' => $this->t('Show reviews matching the following criteria'),
      // If we have user submitted values then show the filter.
      '#open' => (!empty($input)),
    ];

    $form['filter']['content'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Content'),
      '#default_value' => ((empty($input['content'])) ?: $input['content']),
    ];

    $form['filter']['library_id'] = [
      '#type' => 'select',
      '#title' => $this->t('Library'),
      '#options' => $this->agencyBranchService->getOptions(TRUE),
      '#default_value' => ((empty($input['library_id'])) ?: $input['library_id']),
      '#empty_option' => $this->t('All libraries'),
    ];

    $form['filter']['actions']['#type'] = 'actions';
    $form['filter']['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Filter'),
    ];

    $filter = new \stdClass();
    $filter->and = [];
    // Make sure we only get reviews that have not been deleted.
    // markedAsDeleted support TRUE, FALSE and NULL. In this regard not deleted
    // is regarded as NULL or FALSE. Use an OR filter as INQ and NEQ operators
    // do not support NULL properly.
    $filter->and[] = [
      'or' => [
        ['markedAsDeleted' => NULL],
        ['markedAsDeleted' => FALSE],
      ],
    ];
    // User-input filters.
    if (!empty($input['library_id'])) {
      $library_ids = explode(',', $input['library_id']);
      $filter->and[] = ['libraryid' => ['inq' => $library_ids]];
    }
    if (!empty($input['content'])) {
      // We have to use regular expressions to support case insensitive
      // filtering.
      $filter->and[] = [
        'content' => [
          'regexp' => '/' . $input['content'] . '/i',
        ],
      ];
    }
    $page_filter = [
      'where' => $filter,
      'order' => 'created DESC',
    ];

    $num_reviews = NULL;
    // Page number from pager_default_initialize() is 0-indexed.
    $page = 0;
    try {
      // If we can get a count of the total number of reviews then limit the
      // review filter to support paging. Otherwise we just get all that we can.
      $num_reviews = $this->reviewApi->reviewCount(json_encode($filter))->getCount();
      $page = pager_default_initialize($num_reviews, self::CONTENT_PER_PAGE);

      $page_filter['offset'] = $page * self::CONTENT_PER_PAGE;
      $page_filter['limit'] = self::CONTENT_PER_PAGE;
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

    // Generate a header based on whether paging is used.
    $num_pages = ceil($num_reviews / self::CONTENT_PER_PAGE);
    $caption = $this->formatPlural(
      $num_pages,
      'Showing %total reviews',
      'Showing %from-%to of %total reviews', [
        '%from' => ($page * self::CONTENT_PER_PAGE) + 1,
        '%to' => min((($page + 1) * self::CONTENT_PER_PAGE), $num_reviews),
        '%total' => $num_reviews,
      ]
    );
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

      $branch = $this->agencyBranchService->getBranch($review->getLibraryid());
      $table['#rows'][] = [
        'content' => $review->getContent(),
        'rating' => $review->getRating(),
        'pid' => $review->getPid(),
        'library' => (!empty($branch)) ? $branch->branchName : $review->getLibraryid(),
        'author' => $author,
        'date' => [
          'data' => $this->dateFormatter->format($review->getCreated()->getTimestamp(), 'dbcdk_community_service_date_time'),
          // Avoid dates spaning multiple lines.
          'style' => 'white-space: nowrap;',
        ],
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
    // Get the filter values and remove any Drupal extras.
    $input = array_filter(array_diff_key(
      $form_state->getValues(),
      array_flip(['op', 'form_id', 'form_build_id', 'form_token'])
    ));
    // Replace filter values into url query to pass them back to the form build
    // process.
    $this->getRequest()->query->replace($input);
  }

}
