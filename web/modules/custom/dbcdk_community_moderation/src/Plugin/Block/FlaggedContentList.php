<?php

/**
 * @file
 * FlaggedContentList class definition.
 */

namespace Drupal\dbcdk_community_moderation\Plugin\Block;

use DBCDK\CommunityServices\ApiException;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Datetime\DateFormatterInterface;
use Drupal\Core\Link;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Url;
use Drupal\dbcdk_community\Url\ModelUrlGenerator;
use Drupal\dbcdk_community\Url\PropertyUrlGenerator;
use Drupal\dbcdk_community\Url\UrlGeneratorInterface;
use Drupal\dbcdk_community_moderation\Content\FlaggableContentRepository;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a block displaying a list of flagged content.
 *
 * @Block(
 *   id = "flagged_content_list",
 *   admin_label = @Translation("Flagged content list"),
 * )
 */
class FlaggedContentList extends BlockBase implements ContainerFactoryPluginInterface {
  use LoggerAwareTrait;

  /**
   * The repository to use when retrieving flagged content.
   *
   * @var FlaggableContentRepository $flaggableContentRepository
   */
  protected $flaggableContentRepository;

  /**
   * Generator to use when creating urls for community content on frontend site.
   *
   * @var UrlGeneratorInterface
   */
  protected $urlGenerator;

  /**
   * The date formatter to use.
   *
   * @var DateFormatterInterface
   */
  protected $dateFormatter;

  /**
   * FlaggedContentList constructor.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin ID for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param LoggerInterface $logger
   *   The logger to use.
   * @param FlaggableContentRepository $repository
   *   The repository to use when retrieving flagged content.
   * @param UrlGeneratorInterface $url_generator
   *   The generator to use when creating urls to the frontend site.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, LoggerInterface $logger, FlaggableContentRepository $repository, UrlGeneratorInterface $url_generator, DateFormatterInterface $date_formatter) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->logger = $logger;
    $this->flaggableContentRepository = $repository;
    $this->urlGenerator = $url_generator;
    $this->dateFormatter = $date_formatter;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    // Setup url generation for flaggable content.
    /* @var \Drupal\Core\Config\Config $config */
    $config = $container->get('config.factory')->get('dbcdk_community.settings');
    $base_url = $config->get('community_site_url');
    $url_generator = new ModelUrlGenerator();
    $url_generator->registerClassGenerator(
      'Drupal\dbcdk_community_moderation\Content\Post',
      new PropertyUrlGenerator(
        $base_url . $config->get('community_site_post_url_pattern')
      )
    );
    $url_generator->registerClassGenerator(
      'Drupal\dbcdk_community_moderation\Content\Comment',
      new PropertyUrlGenerator(
        $base_url . $config->get('community_site_comment_url_pattern')
      )
    );

    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('dbcdk_community.logger'),
      $container->get('dbcdk_community_moderation.content.flaggable_content_repository'),
      $url_generator,
      $container->get('date.formatter')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    try {
      $all_content_elements = $this->flaggableContentRepository->getContentWithUnreadFlags();
    }
    catch (ApiException $e) {
      $this->logger->error($e);
      drupal_set_message($this->t('An error occurred when retrieving data from the community service. Please try again later or contact an administrator.'), 'error');
      $all_content_elements = [];
    }

    $content_per_page = 10;
    $page = pager_default_initialize(count($all_content_elements), $content_per_page);

    $caption = '';
    if (count($all_content_elements) > $content_per_page) {
      $caption = $this->t('Showing %from-%to of %total pieces of flagged content', [
        '%from' => ($page * $content_per_page) + 1,
        '%to' => min((($page + 1) * $content_per_page), count($all_content_elements)),
        '%total' => count($all_content_elements),
      ]);
    }

    $table = [
      '#theme' => 'table',
      '#caption' => $caption,
      '#header' => [
        $this->t('Content'),
        $this->t('Active flags'),
        $this->t('Latest flag'),
        $this->t('Flag comment'),
        $this->t('Details'),
        $this->t('Link'),
      ],
      '#rows' => [],
      '#empty' => $this->t('There is currently no flagged content'),
    ];

    /* @var \Drupal\dbcdk_community_moderation\Content\FlaggableContentInterface[] $page_content_elements */
    $page_content_elements = array_slice($all_content_elements, $page * $content_per_page, $content_per_page);
    foreach ($page_content_elements as $content_element) {

      try {
        $community_site_url = Url::fromUri(
          $this->urlGenerator->generate($content_element)
        );
        $community_site_link = Link::fromTextAndUrl(
          $this->t('View on Biblo.dk'),
          $community_site_url
        );

        $details_link = Link::createFromRoute(
          $this->t('See details'),
          'page_manager.page_view_dbcdk_community_flagged_content_details',
          ['flag_id' => $content_element->getLatestFlag()->getId()]
        );
      }
      catch (\Exception $e) {
        // If generating a link fails then do not output any links.
        $this->logger->warning($e);

        $details_link = '';
        $community_site_link = '';
      }

      $table['#rows'][] = [
        'content' => [
          'data' => [
            '#theme' => 'dbcdk_community_moderation__flagged_content__content',
            '#content' => $content_element->getContent(),
            '#image_collection_count' => count($this->flaggableContentRepository->getImageCollections($content_element)),
            '#video_collection_count' => count($this->flaggableContentRepository->getVideoCollections($content_element)),
          ],
        ],
        'num_flags' => count($content_element->getFlags()),
        'flag_time' => $this->dateFormatter->format($content_element->getLatestFlag()->getTimeFlagged()->getTimestamp(), 'dbcdk_community_service_date_time'),
        'flag_text' => $content_element->getLatestFlag()->getDescription(),
        'details' => $details_link,
        'link' => $community_site_link,
      ];
    }

    return [
      'table' => $table,
      'pager' => [
        '#type' => 'pager',
      ],
      '#cache' => [
        'max-age' => 0,
      ],
    ];
  }

}
