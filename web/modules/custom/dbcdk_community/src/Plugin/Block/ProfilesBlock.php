<?php

/**
 * @file
 * Contains \Drupal\dbcdk_community\Plugin\Block\ProfilesBlock.
 */

namespace Drupal\dbcdk_community\Plugin\Block;

use DBCDK\CommunityServices\Api\ProfileApi;
use DBCDK\CommunityServices\Api\QuarantineApi;
use DBCDK\CommunityServices\ApiException;
use DBCDK\CommunityServices\Model\Profile;
use DBCDK\CommunityServices\Model\Quarantine;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormBuilder;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Link;
use Drupal\Core\Url;
use Drupal\dbcdk_community\Url\ModelUrlGenerator;
use Drupal\dbcdk_community\Url\PropertyUrlGenerator;
use Drupal\dbcdk_community\Url\UrlGeneratorInterface;

/**
 * Provides a 'ProfilesBlock' block.
 *
 * This block provides a list of users from the Community Service.
 *
 * @Block(
 *   id = "dbcdk_community_profiles_block",
 *   admin_label = @Translation("DBCDK Community Profiles"),
 * )
 */
class ProfilesBlock extends BlockBase implements ContainerFactoryPluginInterface {
  use LoggerAwareTrait;

  /**
   * Drupal Form Builder.
   *
   * @var FormBuilder $form_builder
   */
  protected $formBuilder;

  /**
   * The DBCDK Community Service Profile API.
   *
   * @var \DBCDK\CommunityServices\Api\ProfileApi $profileApi
   */
  protected $profileApi;

  /**
   * The DBCDK Community Service Quarantine API.
   *
   * @var \DBCDK\CommunityServices\Api\QuarantineApi $quarantineApi
   */
  protected $quarantineApi;

  /**
   * Generator to use when creating urls for community content on frontend site.
   *
   * @var \Drupal\dbcdk_community\Url\UrlGeneratorInterface
   */
  protected $urlGenerator;

  /**
   * Array of filter conditions from the query string for the profiles list.
   *
   * @var array $filterQuery
   */
  protected $filterQuery;

  /**
   * The amount of items to be shown on each page.
   *
   * @var int $pagerLimit
   */
  protected $pagerLimit;

  /**
   * Creates a Profiles Block instance.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param FormBuilder $form_builder
   *   Drupal Cores form builder.
   * @param \DBCDK\CommunityServices\Api\ProfileApi $profile_api
   *   The DBCDK Community Service Profile API.
   * @param \DBCDK\CommunityServices\Api\QuarantineApi $quarantine_api
   *   The DBCDK Community Service Quarantine API.
   * @param \Drupal\dbcdk_community\Url\UrlGeneratorInterface $url_generator
   *   The generator to use when creating urls to the frontend site.
   * @param array $filter_query
   *   Array of filter conditions from the query string for the profiles list.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, LoggerInterface $logger, FormBuilder $form_builder, ProfileApi $profile_api, QuarantineApi $quarantine_api, UrlGeneratorInterface $url_generator, array $filter_query) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->logger = $logger;
    $this->formBuilder = $form_builder;
    $this->profileApi = $profile_api;
    $this->quarantineApi = $quarantine_api;
    $this->urlGenerator = $url_generator;
    $this->filterQuery = $filter_query;
    $this->pagerLimit = (!empty($this->configuration['pager_limit']) ? $this->configuration['pager_limit'] : 25);
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    // Setup url generation for Profiles.
    /* @var \Drupal\Core\Config\Config $config */
    $config = $container->get('config.factory')->get('dbcdk_community.settings');
    $url_generator = new ModelUrlGenerator();
    $url_generator->registerClassGenerator(
      'DBCDK\CommunityServices\Model\Profile',
      new PropertyUrlGenerator(
        $config->get('community_site_url') . $config->get('community_site_profile_url_pattern')
      )
    );

    /* @var \Symfony\Component\HttpFoundation\RequestStack $request_stack */
    $request_stack = $container->get('request_stack');

    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('dbcdk_community.logger'),
      $container->get('form_builder'),
      $container->get('dbcdk_community.api.profile'),
      $container->get('dbcdk_community.api.quarantine'),
      $url_generator,
      [
        'page_number' => $request_stack->getCurrentRequest()->query->get('page'),
        'username' => $request_stack->getCurrentRequest()->query->get('username'),
        'fullName' => $request_stack->getCurrentRequest()->query->get('fullName'),
        'displayName' => $request_stack->getCurrentRequest()->query->get('displayName'),
        'email' => $request_stack->getCurrentRequest()->query->get('email'),
        'quarantined' => $request_stack->getCurrentRequest()->query->get('quarantined'),
      ]
    );
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['pager_limit'] = array(
      '#type' => 'number',
      '#title' => $this->t('Pager limit'),
      '#description' => $this->t('The amount of items to be shown on each page.'),
      '#maxlength' => 255,
      '#default_value' => $this->configuration['pager_limit'],
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    if (!$form_state->getErrors()) {
      $this->configuration['pager_limit'] = $form_state->getValue('pager_limit');
    }
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    // Tries to fetch profiles from the Community Service or catches any
    // exceptions and log them so the site can continue running and display an
    // empty table instead of a fatal error.
    $profiles = [];
    $profile_count = 0;
    try {
      $filter = [
        'order' => 'username ASC',
        'limit' => $this->pagerLimit,
        'offset' => (isset($this->filterQuery['page_number']) ? $this->filterQuery['page_number'] : 0) * $this->pagerLimit,
      ];
      $filter_fields = [
        'username',
        'fullName',
        'displayName',
        'email',
      ];
      foreach ($filter_fields as $filter_field) {
        if (!empty($this->filterQuery[$filter_field])) {
          $filter['where'][$filter_field] = ['regexp' => '/' . $this->filterQuery[$filter_field] . '/i'];
        }
      }

      // Fetch a list or profiles with an active quarantine.
      if (isset($this->filterQuery['quarantined']) && $this->filterQuery['quarantined']) {
        $profiles = $this->getQuarantinedProfiles($filter);
        $profile_count = $this->getQuarantinedProfilesCount($filter);
      }
      // Fetch a list of profiles.
      else {
        $profiles = (array) $this->profileApi->profileFind(json_encode($filter));
        $result = $this->profileApi->profileCount();
        $profile_count = (isset($result['count'])) ? $result['count'] : NULL;
      }
      // Throw an exception if we do not get a count from the API.
      if ($profile_count === NULL) {
        throw new ApiException('Unexpected response from Profiles API. No count returned');
      }
    }
    catch (ApiException $e) {
      $this->logger->error($e);
    }

    $build = [];
    // Build exposed filter form.
    $build['filter'] = $this->formBuilder->getForm('Drupal\dbcdk_community\Form\ProfilesFilterForm');

    // Build a table of profiles.
    $table_columns = [
      'username' => $this->t('Username'),
      'fullName' => $this->t('Full Name'),
      'displayName' => $this->t('Display name'),
      'edit_link' => $this->t('Edit'),
      'community_link' => $this->t('Community link'),
    ];
    $build['table'] = $this->buildTable($profiles, $table_columns);

    // Build a pager for the table.
    $build['pager'] = $this->buildPager($profile_count, $this->pagerLimit, 5);

    return $build;
  }

  /**
   * Get all quarantined profiles.
   *
   * @param array $profiles_filter
   *   An array containing filter arguments.
   *
   * @throws \DBCDK\CommunityServices\ApiException
   *   Throws API Exception if any of the calls to the services fails.
   *
   * @return \DBCDK\CommunityServices\Model\Profile[] $profiles
   *   An array of Profile objects with an active quarantine.
   */
  protected function getQuarantinedProfiles(array $profiles_filter) {
    // Fetch all quarantines that are active from the moment of the request.
    $quarantined_filter = [
      'where' => [
        'end' => [
          // The string should be in a format recognized by the Date.parse()
          // method which is ISO-8601 in our case.
          // @See https://developer.mozilla.org/en/docs/Web/JavaScript/Reference/Global_Objects/Date
          'gt' => date(\DateTime::ATOM),
        ],
      ],
    ];
    $quarantines = (array) $this->quarantineApi->quarantineFind(json_encode($quarantined_filter));

    // Reduce all the quarantines to an array of quarantined profile ids.
    $quarantine_ids = array_map(function(Quarantine $quarantine) {
      return $quarantine->getQuarantinedProfileId();
    }, $quarantines);
    // A profile can have multiple active quarantines. Make sure each profile id
    // occurs only once. array_unique maintains keys for entries so we use
    // array_values to get a properly indexed array.
    $quarantine_ids = array_values(array_unique($quarantine_ids));

    // Use the array of quarantined ids as "where" arguments.
    $profiles_filter['where']['id'] = ['inq' => $quarantine_ids];

    return (array) $this->profileApi->profileFind(json_encode($profiles_filter));
  }

  /**
   * Count all quarantined profiles matching a filter.
   *
   * @param array $profiles_filter
   *   An array containing filter arguments.
   *
   * @throws \DBCDK\CommunityServices\ApiException
   *   Throws API Exception if any of the calls to the services fails.
   *
   * @return int|NULL
   *   The number of quarantined profiles matching the filter.
   */
  protected function getQuarantinedProfilesCount(array $profiles_filter = []) {
    // Fetch all quarantines that are active from the moment of the request.
    $quarantined_filter = [
      'where' => [
        'end' => [
          // The string should be in a format recognized by the Date.parse()
          // method which is ISO-8601 in our case.
          // @See https://developer.mozilla.org/en/docs/Web/JavaScript/Reference/Global_Objects/Date
          'gt' => date(\DateTime::ATOM),
        ],
      ],
    ];
    $quarantines = (array) $this->quarantineApi->quarantineFind(json_encode($quarantined_filter));

    // Reduce all the quarantines to an array of quarantined profile ids.
    $quarantine_ids = array_map(function(Quarantine $quarantine) {
      return $quarantine->getQuarantinedProfileId();
    }, $quarantines);
    // A profile can have multiple active quarantines. Make sure each profile id
    // occurs only once. array_unique maintains keys for entries so we use
    // array_values to get a properly indexed array.
    $quarantine_ids = array_keys(array_unique($quarantine_ids));

    // Use the array of quarantined ids as "where" arguments.
    $profiles_filter['where']['id'] = ['inq' => $quarantine_ids];

    $result = $this->profileApi->profileCount(json_encode($profiles_filter['where']));
    return (isset($result['count'])) ? $result['count'] : NULL;
  }

  /**
   * Build Table of Profiles.
   *
   * @param \DBCDK\CommunityServices\Model\Profile[] $profiles
   *   An array of Profiles objects.
   * @param array $columns
   *   An array of the fields that should be displayed as columns in the table.
   *   The order the fields appear in the array is also the order they will
   *   be displayed.
   *
   * @return array
   *   A renderable array containing a table of profiles.
   */
  protected function buildTable(array $profiles, array $columns) {
    $rows = [];
    if (!empty($profiles)) {
      foreach ($profiles as $index => $profile) {
        $rows[] = $this->parseProfile($profile, $columns);
      }
    }

    return [
      '#theme' => 'table',
      '#header' => isset($columns) ? $columns : [],
      '#rows' => $rows,
      '#empty' => $this->t('There were no profiles to be found at this time.'),
      '#cache' => [
        'max-age' => 0,
      ],
    ];
  }

  /**
   * Parse a Community Service Profile.
   *
   * Takes a Community Service Profile and an array of columns to determine
   * what fields/values that should be display in the table of profiles.
   * Most fields will simply have to be returned with their values but some
   * of the fields require different treatments (either because they should
   * be presented in another way or it's an object of any kind).
   *
   * @param Profile $profile
   *   A Community Service Profile.
   * @param array $columns
   *   An array of columns in the following format: field_name => title.
   *
   * @return array $columns
   *   An array containing parsed columns that will make up a row in the table.
   */
  protected function parseProfile(Profile $profile, array $columns) {
    $row = [];
    foreach ($columns as $field => $title) {
      // Check if the field requires any special treatment or just use the
      // default behavior and return the value from the field.
      switch ($field) {
        // The username should link to the profile but the field only provides
        // a string with a unique name so we have to prepare it as a link.
        case 'username':
          $username = $profile->getUsername();
          $row[$field] = Link::createFromRoute($username, 'page_manager.page_view_dbcdk_community_profile', [
            'username' => $username,
          ]);
          break;

        // The edit_link field is not a field provided by the Community Service
        // but a column we wish do display with a link to edit a profile.
        case 'edit_link':
          $username = $profile->getUsername();
          $row[$field] = Link::createFromRoute($title, 'dbcdk_community.profile.edit', [
            'username' => $username,
          ]);
          break;

        // Generate community profile link based on a pattern defined on the
        // settings page.
        case 'community_link':
          $community_site_url = Url::fromUri($this->urlGenerator->generate($profile));
          $row[$field] = Link::fromTextAndUrl($this->t('View on Biblo.dk'), $community_site_url);
          break;

        default:
          // Use the machine-name of the field to fetch its value from the
          // Profile object (format: $profile->getFieldName()).
          $method = 'get' . ucfirst($field);
          $row[$field] = method_exists($profile, $method) ? $profile->{$method}() : '';

          // The render array cannot take an object or an array as a column
          // value (this will cause a fatal error). Instead we check if it is an
          // object or an array and return an empty string and log the event.
          // We only check for objects and arrays since none of the remaining
          // data types are nested and will be handled by Drupal.
          if (is_object($row[$field]) || is_array($row[$field])) {
            $row[$field] = '';
            $message = $this->t('The field "%field" was an unknown value of type "%type" on the user "%username".', [
              '%field' => $field,
              '%type' => is_object($row[$field]) ? get_class($row[$field]) : 'Array',
              '%username' => $profile->getUsername(),
            ]);
            \Drupal::logger('DBCDK Community Service')->notice($message);
          }
          break;
      }
    }

    return $row;
  }

  /**
   * Build a pager.
   *
   * @param int $total
   *   The total number of items to be paged.
   * @param int $limit
   *   (optional) The number of items the calling code will display per page.
   * @param int $quantity
   *   (optional) The maximum number of numbered page links to create.
   * @param int $element
   *   (optional) An integer to distinguish between pagers on one page.
   *
   * @return array
   *   A renderable array containing a pager.
   */
  protected function buildPager($total, $limit = 25, $quantity = 5, $element = 0) {
    pager_default_initialize($total, $limit, $element);
    return [
      '#type' => 'pager',
      '#quantity' => $quantity,
    ];
  }

}
