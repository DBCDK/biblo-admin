<?php

/**
 * @file
 * Contains \Drupal\dbcdk_community\Plugin\Block\ProfileBlock.
 */

namespace Drupal\dbcdk_community\Plugin\Block;

use DBCDK\CommunityServices\Model\Profile;
use DBCDK\CommunityServices\ApiException;
use DBCDK\CommunityServices\Api\ProfileApi;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Url;
use Drupal\Component\Utility\Xss;

/**
 * Provides a 'ProfileBlock' block.
 *
 * This block provides a display of a single Community Service Profile.
 *
 * @Block(
 *   id = "dbcdk_community_profile_block",
 *   admin_label = @Translation("DBCDK Community Profile"),
 *   context = {
 *     "username" = @ContextDefinition("string")
 *   }
 * )
 */
class ProfileBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * The DBCDK Community Service Profile API.
   *
   * @var ProfileApi $profileApi
   */
  protected $profileApi;

  /**
   * Creates a Profiles Block instance.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \DBCDK\CommunityServices\Api\ProfileApi $profile_api
   *   The DBCDK Community Service Profile API.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, ProfileApi $profile_api) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->profileApi = $profile_api;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('dbcdk_community.api.profile')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    // Tries to fetch a profile from the Community Service or catches any
    // exceptions and log them so the site can continue running and display an
    // empty table instead of a fatal error.
    $profile = NULL;
    $username = $this->getContext('username')->getContextData()->getValue();
    try {
      $filter = [
        'limit' => 1,
        'where' => [
          'username' => $username,
        ],
      ];
      $profile = $this->profileApi->profileFind(json_encode($filter))[0];
    }
    catch (ApiException $e) {
      \Drupal::logger('DBCDK Community Service')->error($e);
    }

    $rows = [];
    if (!empty($profile)) {
      // Create an array of the fields we wish to display as rows in our table.
      // The order the fields appear in the array is also the order they will
      // be displayed.
      $fields = [
        'username' => $this->t('Username'),
        'fullName' => $this->t('Full Name'),
        'displayName' => $this->t('Display Name'),
        'email' => $this->t('E-mail'),
        'phone' => $this->t('Phone'),
        'birthday' => $this->t('Birthday'),
        'description' => $this->t('Description'),
      ];
      $rows = $this->parseProfile($profile, $fields);
    }

    // Build table of profile information.
    $build = [];
    $build['table'] = [
      '#theme' => 'table',
      '#header' => [
        $this->t('Subject'),
        $this->t('Information'),
      ],
      '#rows' => $rows,
      '#empty' => $this->t('There were no information to be found for the profile "%username".', [
        '%username' => $this->getContext('username')->getContextData()->getValue(),
      ]),
      '#cache' => [
        'max-age' => 0,
      ],
    ];

    // Build action buttons to manipulate or navigate from the profile.
    if (!empty($profile)) {
      $build['actions'] = $this->buildActionButtons($profile);
    }

    return $build;
  }

  /**
   * Parse a Community Service Profile.
   *
   * Takes a Community Service Profile and an array of fields to determine
   * what values that should be display in the table of profile information.
   * Most fields will simply have to be returned with their values but some
   * of the fields require different treatments (either because they should
   * be presented in another way or it's an object of any kind).
   *
   * @param Profile $profile
   *   A Communtiy Service Profile.
   * @param array $fields
   *   An array of fields in the following format: field_name => title.
   *
   * @return array $rows
   *   An array of rows containing subjects and information.
   */
  protected function parseProfile(Profile $profile, array $fields) {
    $rows = [];
    foreach ($fields as $field => $title) {
      // Check if the field requires any special treatment or just use the
      // default behavior and return the value from the field.
      switch ($field) {
        // The birthday field returns a DateTime object and should be formatted
        // with a Drupal Date Format instead.
        case 'birthday':
          $date_formatter = \Drupal::service('date.formatter');
          $value = $date_formatter->format($profile->getBirthday()->getTimestamp(), 'dbcdk_community_service_birthday');
          break;

        // We have to allow HTML in the output of the description field since
        // Twig automatically escapes string variables because markup is meant
        // to be handled in templates.
        case 'description':
          $value = [
            'data' => [
              '#markup' => $profile->getDescription(),
              '#allowed_tags' => Xss::getAdminTagList(),
            ],
          ];
          break;

        default:
          // Use the machine-name of the field to fetch its value from the
          // Profile object (format: $profile->getFieldName()).
          $method = 'get' . ucfirst($field);
          $value = method_exists($profile, $method) ? $profile->{$method}() : '';

          // The render array cannot take an object or an array as a column
          // value (this will cause a fatal error). Instead we check if it is an
          // object or an array and return an empty string and log the event.
          // We only check for objects and arrays since none of the remaining
          // data types are nested and will be handled by Drupal.
          if (is_object($value) || is_array($value)) {
            $value = '';
            $message = $this->t('The field "%field" was an unknown value of type "%type" on the user "%username".', [
              '%field' => $field,
              '%type' => is_object($value) ? get_class($value) : 'Array',
              '%username' => $profile->getUsername(),
            ]);
            \Drupal::logger('DBCDK Community Service')->notice($message);
          }
          break;
      }

      $rows[] = [
        $title,
        $value,
      ];
    }

    return $rows;
  }

  /**
   * Build action buttons.
   *
   * The action buttons will give an administrator/moderator the possibility
   * to do something with the Community Service Profile. This could be "edit",
   * "delete", "add quarantine" etc.
   *
   * @param Profile $profile
   *   A Community Service Profile object of the context-profile.
   *
   * @return array
   *   A renderable array of links that will be displayed as buttons.
   */
  protected function buildActionButtons(Profile $profile) {
    return [
      [
        '#type' => 'link',
        '#title' => $this->t('Edit'),
        '#url' => new Url('dbcdk_community.profile.edit', [
          'username' => $profile->getUsername(),
        ]),
        '#attributes' => [
          'class' => [
            'button',
            'button--primary',
          ],
        ],
      ],
    ];
  }

}
