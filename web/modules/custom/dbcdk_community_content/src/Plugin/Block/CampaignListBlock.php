<?php

namespace Drupal\dbcdk_community_content\Plugin\Block;

use DBCDK\CommunityServices\ApiException;
use DBCDK\CommunityServices\Model\Campaign;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Datetime\DateFormatterInterface;
use Drupal\Core\Link;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use DBCDK\CommunityServices\Api\CampaignApi;

/**
 * Provides a 'CampaignListBlock' block.
 *
 * @Block(
 *  id = "dbcdk_community_content_campaign_list_block",
 *  admin_label = @Translation("Campaign list"),
 * )
 */
class CampaignListBlock extends BlockBase implements ContainerFactoryPluginInterface {
  use LoggerAwareTrait;

  /**
   * The campaign API to use.
   *
   * @var CampaignApi
   */
  protected $campaignApi;

  /**
   * The date Formatter to use.
   *
   * @var DateFormatterInterface
   */
  protected $dateFormatter;

  /**
   * Construct.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param string $plugin_definition
   *   The plugin implementation definition.
   * @param LoggerInterface $logger
   *   The logger to use.
   * @param CampaignApi $campaign_api
   *   The campagin API to use.
   * @param DateFormatterInterface $date_formatter
   *   The date formatter to use.
   */
  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    LoggerInterface $logger,
    CampaignApi $campaign_api,
    DateFormatterInterface $date_formatter
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->campaignApi = $campaign_api;
    $this->logger = $logger;
    $this->dateFormatter = $date_formatter;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('dbcdk_community.logger'),
      $container->get('dbcdk_community.api.campaign'),
      $container->get('date.formatter')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    try {
      // We do not add any form of filtering or paging here. There should be
      // so few campaigns that this is not needed.
      $campaigns = (array) $this->campaignApi->campaignFind();
    }
    catch (ApiException $e) {
      // Log errors, display an error message and an empty table.
      drupal_set_message($this->t('Unable to fetch campaigns. Please try again later.', 'error'));
      $this->logger->error($e);
      $campaigns = [];
    }

    $table = [
      '#theme' => 'table',
      '#header' => [
        $this->t('Campaign'),
        $this->t('Start time'),
        $this->t('End time'),
        $this->t('Edit'),
      ],
      '#rows' => [],
      '#empty' => $this->t('No campaigns found.'),
    ];

    $table['#rows'] = array_map(function (Campaign $campaign) {
      return [
        $campaign->getCampaignName(),
        [
          'data' => $this->dateFormatter->format($campaign->getStartDate()->getTimestamp(), 'dbcdk_community_service_date_time'),
          'style' => 'white-space: nowrap;',
        ],
        [
          'data' => $this->dateFormatter->format($campaign->getEndDate()->getTimestamp(), 'dbcdk_community_service_date_time'),
          'style' => 'white-space: nowrap;',
        ],
        Link::createFromRoute($this->t('Edit'), 'dbcdk_community_content.campaign.edit', ['campaign_id' => $campaign->getId()]),
      ];
    }, $campaigns);

    return [
      'table' => $table,
      '#cache' => [
        'max-age' => 0,
      ],
    ];
  }

}
