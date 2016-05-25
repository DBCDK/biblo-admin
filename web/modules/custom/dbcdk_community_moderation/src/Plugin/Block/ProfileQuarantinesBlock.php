<?php

namespace Drupal\dbcdk_community_moderation\Plugin\Block;

use DBCDK\CommunityServices\ApiException;
use DBCDK\CommunityServices\Model\Quarantine;
use Drupal\Component\Utility\Xss;
use Drupal\Core\Datetime\DateFormatter;
use Drupal\Core\Url;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Link;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;
use Drupal\dbcdk_community_moderation\Profile\ProfileRepository;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'ProfileQuarantinesBlock' block.
 *
 * This block provides an overview of a Community Profile's Quarantines.
 *
 * @Block(
 *   id = "dbcdk_community_community_profile_quarantines_block",
 *   admin_label = @Translation("DBCDK Community Profile Quarantines"),
 *   context = {
 *     "username" = @ContextDefinition("string")
 *   }
 * )
 */
class ProfileQuarantinesBlock extends BlockBase implements ContainerFactoryPluginInterface {
  use LoggerAwareTrait;

  /**
   * The profile repository to use.
   *
   * @var ProfileRepository $profileRepository
   */
  protected $profileRepository;

  /**
   * Drupal's date formatter to format dates to Drupal Date Formats.
   *
   * @var \Drupal\Core\Datetime\DateFormatter $dateFormatter
   */
  protected $dateFormatter;

  /**
   * Creates a Profiles Block instance.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Psr\Log\LoggerInterface $logger
   *   The logger to use.
   * @param \Drupal\dbcdk_community_moderation\Profile\ProfileRepository $profile_repository
   *   The profile repository to use.
   * @param \Drupal\Core\Datetime\DateFormatter $date_formatter
   *   Drupal's date formatter to format dates to Drupal Date Formats.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, LoggerInterface $logger, ProfileRepository $profile_repository, DateFormatter $date_formatter) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->logger = $logger;
    $this->profileRepository = $profile_repository;
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
      $container->get('dbcdk_community_moderation.profile.profile_repository'),
      $container->get('date.formatter')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    // Tries to fetch quarantines from the Community Service or catches any
    // exceptions and log them so the site can continue running and display an
    // empty table instead of a fatal error.
    $profile = NULL;
    try {
      $profile = $this->profileRepository->getProfileByUsername($this->getContextValue('username'));
    }
    catch (ApiException $e) {
      $this->logger->error($e);
    }
    catch (\InvalidArgumentException $e) {
      $this->logger->notice($e);
    }

    // Create an array of the fields we wish to display as columns in our table.
    // The order the fields appear in the array is also the order they will
    // be displayed.
    $rows = [];
    $fields = [
      'reason' => $this->t('Reason'),
      'start' => $this->t('Start date'),
      'end' => $this->t('End date'),
      'edit_link' => $this->t('Edit'),
    ];
    if (!empty($profile)) {
      foreach ($profile->getQuarantines() as $quarantine) {
        $rows[] = $this->parseQuarantine($quarantine, $fields, $profile->getUsername());
      }
    }

    // Build table of quarantines.
    $build = [];
    $build['table'] = [
      '#theme' => 'table',
      '#header' => $fields,
      '#rows' => $rows,
      '#empty' => $this->t('There are no quarantines attached to this profile.'),
      '#cache' => [
        'max-age' => 0,
      ],
    ];

    // Create quarantine link.
    if (!empty($profile)) {
      $build['add_quarantine'] = [
        '#type' => 'link',
        '#title' => $this->t('Create quarantine'),
        '#url' => new Url('dbcdk_community_moderation.profile.quarantine.add', [
          'username' => $profile->getUsername(),
        ]),
        '#attributes' => [
          'class' => [
            'button',
            'button--danger',
          ],
        ],
      ];
    }

    return $build;
  }

  /**
   * Parse a Community Service Quarantine.
   *
   * Takes a Community Service Quarantine and an array of fields to determine
   * what values that should be display in the table of quarantines.
   * We also require a username so we can fill out the route arguments for the
   * edit link.
   *
   * @param \DBCDK\CommunityServices\Model\Quarantine $quarantine
   *   A Community Service Quarantine.
   * @param array $fields
   *   An array of fields in the following format: field_name => title.
   * @param string $username
   *   The username of the Community Profile.
   *
   * @return array $rows
   *   An array of rows containing subjects and information.
   */
  protected function parseQuarantine(Quarantine $quarantine, array $fields, $username) {
    $row = [];
    foreach ($fields as $field => $title) {
      switch ($field) {
        // Format DateTime objects to a string.
        case 'start':
        case 'end':
          $method = 'get' . ucfirst($field);
          if (method_exists($quarantine, $method)) {
            $row[$field] = $this->dateFormatter->format($quarantine->{$method}()->getTimestamp(), 'dbcdk_community_service_date');
          }
          break;

        // We have to allow HTML in the output of the description field since
        // Twig automatically escapes string variables because markup is meant
        // to be handled in templates.
        case 'reason':
          $row[$field] = [
            'data' => [
              '#markup' => $quarantine->getReason(),
              '#allowed_tags' => Xss::getAdminTagList(),
            ],
          ];
          break;

        // The edit_link field is not a field provided by the Community Service
        // but a column we wish to display with a link to edit a quarantine.
        case 'edit_link':
          $row[$field] = Link::createFromRoute($title, 'dbcdk_community_moderation.profile.quarantine.edit', [
            'username' => $username,
            'quarantine_id' => $quarantine->getId(),
          ]);
          break;
      }
    }

    return $row;
  }

}
