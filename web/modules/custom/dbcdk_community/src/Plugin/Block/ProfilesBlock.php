<?php

/**
 * @file
 * Contains \Drupal\dbcdk_community\Plugin\Block\ProfilesBlock.
 */

namespace Drupal\dbcdk_community\Plugin\Block;

use Drupal\dbcdk_community\CommunityTraits;
use DBCDK\CommunityServices\Api\ProfileApi;
use DBCDK\CommunityServices\Model\Profile;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
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

  use CommunityTraits;

  /**
   * The current request stack.
   *
   * @var RequestStack $requestStack
   */
  protected $requestStack;

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
   * Creates a Profiles Block instance.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param RequestStack $request_stack
   *   The current request.
   * @param \DBCDK\CommunityServices\Api\ProfileApi $profile_api
   *   The DBCDK Community Service Profile API.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, RequestStack $request_stack, ProfileApi $profile_api) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->requestStack = $request_stack;
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
      $container->get('request_stack'),
      $container->get('dbcdk_community.api.profile')
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
    // Tries to fetch profiles from the Community Service.
    // We catch any API Exceptions and stop the rest of the code from executing
    // so we don't get fatal errors the will cause a "status code 500" but
    // rather displays an empty table.
    try {
      $filter = [
        'limit' => $this->pagerLimit,
        'offset' => $this->requestStack->getCurrentRequest()->query->get('page') * $this->pagerLimit,
      ];
      $profiles = $this->profileApi->profileFind(json_encode($filter));

      // TODO: Fix the failing "profileCount()" method so we don't have to fetch
      // all results to get a total of profiles.
      $profile_count = count($this->profileApi->profileFind());
    }
    catch (\Exception $e) {
      $this->handleException($e);
      $profiles = [];
      $profile_count = 0;
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
    // Defensive coding to make sure we don't break anything if the API returns
    // "NULL" or something similar instead of an array of profiles.
    // Check the first element in the array and to make sure it's a Profile.
    $rows = [];
    if (isset($profiles[0]) && $profiles[0] instanceof Profile) {
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
          $row[] = Link::createFromRoute($username, 'page_manager.page_view_profile', [
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
          $value = $profile->{'get' . ucfirst($field)}();

          // The render array cannot take an object as a column value (this
          // will cause a fatal error). Instead we check if it is an object
          // and return an empty string and log the event.
          if (is_object($value)) {
            $row[] = '';
            $message = $this->t('The field "%field" was an unknown object of type "%object" on the user "%username".', [
              '%field' => $field,
              '%object' => get_class($value),
              '%username' => $profile->getUsername(),
            ]);
            \Drupal::logger('DBCDK Community Service')->notice($message);
          }
          else {
            $row[] = $value;
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
