<?php

/**
 * @file
 * Contains \Drupal\dbcdk_community\Plugin\Block\DbcdkCommunityProfileBlock.
 */

namespace Drupal\dbcdk_community\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\dbcdk_community\CommunityTraits;
use DBCDK\CommunityServices\ApiException;
use DBCDK\CommunityServices\Model\Profile;
use Drupal\Core\Url;


/**
 * Provides a 'DbcdkCommunityProfileBlock' block.
 *
 * This block provides a display of a single Community Service Profile.
 *
 * @Block(
 *   id = "dbcdk_community_profile_block",
 *   admin_label = @Translation("DBCDK Community Profile Block"),
 *   context = {
 *     "username" = @ContextDefinition("string")
 *   }
 * )
 */
class DbcdkCommunityProfileBlock extends BlockBase {

  use CommunityTraits;

  /**
   * {@inheritdoc}
   */
  public function build() {
    // Tries to fetch a profile from the Community Service.
    // We catch any API Exceptions and stop the rest of the code from executing
    // so we don't get fatal errors the will cause a "status code 500" but
    // rather displays an empty table.
    try {
      $profile_api = \Drupal::service('dbcdk_community.api.profile');
      $filter = [
        'limit' => 1,
        'where' => [
          'username' => $this->getContext('username')->getContextData()->getValue(),
        ],
      ];

      // Since we have a limit of 1 result, we simply select that one result
      // from the results array instead of looping through it.
      $profile = $profile_api->profileFind(json_encode($filter))[0];
    }
    catch (ApiException $e) {
      $this->formatException($e);
    }

    // Defensive coding to make sure we don't break anything if the API returns
    // "NULL" or something similar instead of an array of profiles.
    if (isset($profile) && $profile instanceof Profile) {
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

    return [
      '#theme' => 'table',
      '#header' => [
        $this->t('Subject'),
        $this->t('Information'),
      ],
      '#rows' => (isset($rows) ? $rows : ''),
      '#cache' => [
        'max-age' => 0,
      ],
      // Prefix and suffix can't handle a renderable array so we have to
      // render the array to markup by ourselves.
      '#suffix' => \Drupal::service('renderer')->render($this->getActionButtons($profile)),
    ];
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

        default:
          // Use the machine-name of the field to fetch its value from the
          // Profile object (format: $profile->getFieldName()).
          $value = $profile->{'get' . ucfirst($field)}();

          // The render array cannot take an object as a column value (this
          // will cause a fatal error). Instead we check if it is an object
          // and return an empty string and log the event.
          if (is_object($value)) {
            $value = '';
            $message = $this->t('The field "%field" was an unknown object of type "%object" on the user "%username".', [
              '%field' => $field,
              '%object' => get_class($value),
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

    return isset($rows) ? $rows : [];
  }

  /**
   * Get action buttons.
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
  protected function getActionButtons(Profile $profile) {
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
