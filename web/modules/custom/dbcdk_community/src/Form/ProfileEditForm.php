<?php

/**
 * @file
 * Contains \Drupal\dbcdk_community\Form\ProfileEditForm.
 */

namespace Drupal\dbcdk_community\Form;

use DBCDK\CommunityServices\ApiException;
use DBCDK\CommunityServices\Api\ProfileApi;
use DBCDK\CommunityServices\Model\CommunityRole;
use DBCDK\CommunityServices\Model\Profile;
use Drupal\Core\Datetime\DrupalDateTime;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Edit a Community Service Profile.
 */
class ProfileEditForm extends FormBase implements ContainerInjectionInterface {

  /**
   * The DBCDK Community Service Profile API.
   *
   * @var \DBCDK\CommunityServices\Api\ProfileApi $profileApi
   */
  protected $profileApi;

  /**
   * The Community Service Profile object from the username context.
   *
   * @var \DBCDK\CommunityServices\Model\Profile $profile
   */
  protected $profile;

  /**
   * Array of all defined community roles.
   *
   * @var \DBCDK\CommunityServices\Model\CommunityRole[] $communityRoles
   */
  protected $communityRoles;

  /**
   * Creates a Profile Edit Form instance.
   *
   * @param \DBCDK\CommunityServices\Api\ProfileApi $profile_api
   *   The DBCDK Community Service Profile API.
   * @param \DBCDK\CommunityServices\Model\Profile $profile
   *   The DBCDK Community Profile object we wish to edit.
   * @param \DBCDK\CommunityServices\Model\CommunityRole[] $community_roles
   *   Results array with all possible Community Roles.
   */
  public function __construct(ProfileApi $profile_api, Profile $profile = NULL, array $community_roles = []) {
    $this->profileApi = $profile_api;
    $this->communityRoles = $community_roles;
    $this->profile = $profile;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    $profile_api = $container->get('dbcdk_community.api.profile');
    $community_roles_api = $container->get('dbcdk_community.api.community_roles');

    try {
      // Get the profile we wish to alter with the form.
      $filter = [
        'where' => [
          'username' => $container->get('request_stack')->getCurrentRequest()->get('username'),
        ],
      ];
      /* @var \DBCDK\CommunityServices\Model\Profile $profile */
      $profile = $profile_api->profileFindOne(json_encode($filter));
      // The Swagger-compiled Community Profile Model does not support Community
      // Roles when using "include" to get the profile. The response from the
      // service includes it but the model does not care about it, so we have to
      // handle this with a separate call.
      $profile->communityRoles = (array) $profile_api->profilePrototypeGetCommunityRoles($profile->getId());

      // Get all possible Community Roles. This will be used to give a moderator
      // the possibility to grant roles the profile does not yet have.
      /* @var \DBCDK\CommunityServices\Model\CommunityRole[] $community_roles */
      $community_roles = (array) $community_roles_api->communityRoleFind();
    }
    catch (ApiException $e) {
      \Drupal::logger('DBCDK Community Service')->error($e);
      $profile = NULL;
      $community_roles = [];
    }

    return new static(
      $profile_api,
      $profile,
      $community_roles
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'dbcdk_community_profile_edit_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // Defensive coding to make sure we only display the actual edit form if
    // the service could find a Community Profile.
    if (empty($this->profile)) {
      drupal_set_message($this->t('The system could not find any information about the profile at this moment. Please try and refresh or contact an administrator.'), 'error');
      return $form;
    }

    $form['username'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Username'),
      '#default_value' => $this->profile->getUsername(),
      '#disabled' => TRUE,
    ];

    $form['fullName'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Full Name'),
      '#default_value' => $this->profile->getFullName(),
    ];

    $form['displayName'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Display Name'),
      '#default_value' => $this->profile->getDisplayName(),
    ];

    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('E-mail'),
      '#default_value' => $this->profile->getEmail(),
    ];

    $form['phone'] = [
      '#type' => 'tel',
      '#title' => $this->t('Phone'),
      '#default_value' => $this->profile->getPhone(),
    ];

    $form['birthday'] = [
      '#type' => 'datetime',
      '#title' => $this->t('Birthday'),
      '#date_time_element' => 'none',
      '#default_value' => DrupalDateTime::createFromDateTime($this->profile->getBirthday()),
    ];

    $form['roles'] = [
      '#type' => 'checkboxes',
      '#title' => $this->t('Roles'),
      '#default_value' => array_map(function($role) {
        return $role->getId();
      }, $this->profile->communityRoles),
      '#options' => array_reduce($this->communityRoles, function($result, $role) {
        $result[$role->getId()] = $role->getName();
        return $result;
      }),
    ];

    $form['description'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Description'),
      '#default_value' => $this->profile->getDescription(),
    ];

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
      '#button_type' => 'primary',
    ];
    $form['actions']['cancel'] = [
      '#type' => 'link',
      '#title' => $this->t('Cancel'),
      '#url' => new Url('page_manager.page_view_dbcdk_community_profile', [
        'username' => $this->profile->getUsername(),
      ]),
      '#attributes' => ['class' => ['button']],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    try {
      // Update fields on the Community Profile. The elements in the $fields
      // array represents the fields we wish to update.
      $fields = [
        'fullName',
        'displayName',
        'email',
        'phone',
        'birthday',
        'description',
      ];
      $this->updateProfileFields($fields, $form_state);

      // Update roles based on the submitted "roles" input.
      // The array returned from a checkbox field includes both selected and
      // unselected elements so we have to filter away any elements that are
      // considered false.
      $role_ids = array_filter($form_state->getValue('roles'));
      $this->updateProfileRoles($role_ids);
    }
    catch (ApiException $e) {
      \Drupal::logger('DBCDK Community Service')->error($e);
      drupal_set_message($this->t('The profile could not be updated at this time. Please try again later or contact an administrator.'), 'error');
      return FALSE;
    }

    drupal_set_message($this->t('The profile "%profile" has been updated.', ['%profile' => $this->profile->getUsername()]));
    $form_state->setRedirect('page_manager.page_view_dbcdk_community_profile', [
      'username' => $this->profile->getUsername(),
    ]);
  }

  /**
   * Update Community Profile Fields.
   *
   * Go through each provided field on a Profile (some requires special
   * handling) and set the new value. We then update the Profile when the
   * iteration is done.
   *
   * @param array $fields
   *   Array of fields to update on the Community Profile.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state from the form.
   *
   * @throws \DBCDK\CommunityServices\ApiException
   *   Throws API Exception if the profile could not be updated.
   *
   * @return \DBCDK\CommunityServices\Model\Profile
   *   The updated Community Service Profile.
   */
  protected function updateProfileFields(array $fields, FormStateInterface $form_state) {
    foreach ($fields as $field) {
      $getter = 'get' . ucfirst($field);
      $setter = 'set' . ucfirst($field);
      if (method_exists($this->profile, $getter) && method_exists($this->profile, $setter)) {
        $value = $form_state->getValue($field);
        switch ($field) {
          case 'birthday':
            $date = new \DateTime();
            $date = $date->setTimestamp($value->getTimestamp());
            $this->profile->{$setter}($date);
            break;

          default:
            $this->profile->{$setter}($value);
            break;
        }
      }
    }

    return $this->profileApi->profileUpsert($this->profile);
  }

  /**
   * Update a Community Profile's roles.
   *
   * Find out if we have to remove or add any roles from a Community Profile
   * based on values from $form_state and the current Community Profile's roles.
   *
   * @param array $new_role_ids
   *   An array of new role ids.
   *
   * @throws \DBCDK\CommunityServices\ApiException
   *   Throws API Exception if the roles could not be added/removed.
   */
  protected function updateProfileRoles(array $new_role_ids) {
    // Format an array of the profile's role ids before any update has happened.
    $old_role_ids = array_map(function(CommunityRole $role) {
      return $role->getId();
    }, $this->profile->communityRoles);

    // We find the difference from the new roles and the old once to see if any
    // roles have to be added to the community profile.
    if ($add_roles = array_diff($new_role_ids, $old_role_ids)) {
      foreach ($add_roles as $role) {
        $this->profileApi->profilePrototypeLinkCommunityRoles($role, $this->profile->getId());
      }
    };

    // We find the difference from the old roles and the new once to see if any
    // roles have to be removed from the community profile.
    if ($remove_roles = array_diff($old_role_ids, $new_role_ids)) {
      foreach ($remove_roles as $role) {
        $this->profileApi->profilePrototypeUnlinkCommunityRoles($role, $this->profile->getId());
      }
    };
  }

}
