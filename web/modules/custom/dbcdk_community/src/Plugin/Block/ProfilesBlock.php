<?php

/**
 * @file
 * Contains \Drupal\dbcdk_community\Plugin\Block\ProfilesBlock.
 */

namespace Drupal\dbcdk_community\Plugin\Block;

use DBCDK\CommunityServices\Api\ProfileApi;
use DBCDK\CommunityServices\ApiException;
use DBCDK\CommunityServices\Model\Profile;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Link;

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

  /**
   * The DBCDK Community Service Profile API.
   *
   * @var ProfileApi $profileApi
   */
  protected $profileApi;

  /**
   * The amount of items to be shown on each page.
   *
   * @var int $pagerLimit
   */
  protected $pagerLimit;

  /**
   * The current page number of the profiles table.
   *
   * @var int $pageNumber
   */
  protected $pageNumber;

  /**
   * Creates a Profiles Block instance.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param ProfileApi $profile_api
   *   The DBCDK Community Service Profile API.
   * @param int $page_number
   *   The current page number of the profiles table.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, ProfileApi $profile_api, $page_number) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->pageNumber = $page_number;
    $this->profileApi = $profile_api;
    $this->pagerLimit = (!empty($this->configuration['pager_limit']) ? $this->configuration['pager_limit'] : 25);
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('dbcdk_community.api.profile'),
      $container->get('request_stack')->getCurrentRequest()->query->get('page')
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
        'limit' => $this->pagerLimit,
        'offset' => $this->pageNumber * $this->pagerLimit,
      ];
      $profiles = $this->profileApi->profileFind(json_encode($filter));

      // TODO: Fix the failing "profileCount()" method so we don't have to
      // fetch all results to get a total of profiles.
      $profile_count = count($this->profileApi->profileFind());
    }
    catch (ApiException $e) {
      \Drupal::logger('DBCDK Community Service')->error($e);
    }

    // Build a table of profiles.
    $build = [];
    $table_columns = [
      'username' => $this->t('Username'),
      'fullName' => $this->t('Full Name'),
      'displayName' => $this->t('Display name'),
      'edit_link' => $this->t('Edit'),
    ];
    $build['table'] = $this->buildTable($profiles, $table_columns);

    // Build a pager for the table.
    $build['pager'] = $this->buildPager($profile_count, $this->pagerLimit, 5);

    return $build;
  }

  /**
   * Build Table of Profiles.
   *
   * @param array $profiles
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
          $row[] = Link::createFromRoute($username, 'page_manager.page_view_dbcdk_community_profile', [
            'username' => $username,
          ]);
          break;

        // The edit_link field is not a field provided by the Community Service
        // but a column we wish do display with a link to edit a profile.
        case 'edit_link':
          $username = $profile->getUsername();
          $row[] = Link::createFromRoute($title, 'dbcdk_community.profile.edit', [
            'username' => $username,
          ]);
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
