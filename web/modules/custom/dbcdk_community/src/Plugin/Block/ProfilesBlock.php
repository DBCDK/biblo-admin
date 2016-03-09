<?php

/**
 * @file
 * Contains \Drupal\dbcdk_community\Plugin\Block\ProfilesBlock.
 */

namespace Drupal\dbcdk_community\Plugin\Block;

use Drupal\dbcdk_community\CommunityTraits;
use DBCDK\CommunityServices\ApiException;
use DBCDK\CommunityServices\Model\Profile;
use Drupal\Core\Block\BlockBase;
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
class ProfilesBlock extends BlockBase {

  use CommunityTraits;

  /**
   * {@inheritdoc}
   */
  public function build() {
    // Tries to fetch profiles from the Community Service.
    // We catch any API Exceptions and stop the rest of the code from executing
    // so we don't get fatal errors the will cause a "status code 500" but
    // rather displays an empty table.
    try {
      $profile_api = \Drupal::service('dbcdk_community.api.profile');
      $profiles = $profile_api->profileFind();
    }
    catch (ApiException $e) {
      $this->formatException($e);
    }

    // Defensive coding to make sure we don't break anything if the API returns
    // "NULL" or something similar instead of an array of profiles.
    // Check the first element in the array and to make sure it's a Profile.
    if (isset($profiles[0]) && $profiles[0] instanceof Profile) {
      // Create an array of the fields we wish to display as columns in our
      // table. The order the fields appear in the array is also the order
      // they will be displayed.
      $columns = [
        'username' => $this->t('Username'),
        'fullName' => $this->t('Full Name'),
        'displayName' => $this->t('Display name'),
        'edit_link' => $this->t('Edit'),
      ];

      foreach ($profiles as $index => $profile) {
        $rows[] = $this->parseProfile($profile, $columns);
      }
    }

    return [
      '#theme' => 'table',
      '#header' => isset($columns) ? $columns : [],
      '#rows' => isset($rows) ? $rows : [],
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
   *   A Communtiy Service Profile.
   * @param array $columns
   *   An array of columns in the following format: field_name => title.
   *
   * @return array $columns
   *   An array containing parsed columns that will make up a row in the table.
   */
  protected function parseProfile(Profile $profile, array $columns) {
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

    return isset($row) ? $row : [];
  }

}
