<?php

/**
 * @file
 * Contains \Drupal\dbcdk_community\Form\ProfileEditForm.
 */

namespace Drupal\dbcdk_community\Form;

use DBCDK\CommunityServices\ApiException;
use DBCDK\CommunityServices\Api\ProfileApi;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Edit a Community Service Profile.
 */
class ProfileEditForm extends FormBase implements ContainerInjectionInterface {

  /**
   * The date format the Community Client expects.
   */
  const DATE_FORMAT = 'Y-m-d';

  /**
   * The DBCDK Community Service Profile API.
   *
   * @var ProfileApi $profileApi
   */
  protected $profileApi;

  /**
   * The Community Service Profile object from the username context.
   *
   * @var Profile $profile
   */
  protected $profile;

  /**
   * Creates a Profile Edit Form instance.
   *
   * @param null|Profile $profile
   *   The current Community Profile or NULL if we had no successful matches.
   * @param ProfileApi $profile_api
   *   The DBCDK Community Service Profile API.
   */
  public function __construct($profile, ProfileApi $profile_api) {
    $this->profileApi = $profile_api;
    // Set the profile as NULL if we did not get any results array from the
    // service - or get the first element of the array, since we only get one
    // result, and set this as our profile property.
    $this->profile = empty($profile) ? NULL : $profile[0];
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    // Get the Profile API and fetch the Profile we wish to edit and inject
    // this into the forms constructor.
    $profile_api = $container->get('dbcdk_community.api.profile');
    try {
      $filter = [
        'limit' => 1,
        'where' => [
          'username' => $container->get('request_stack')->getCurrentRequest()->get('username'),
        ],
      ];
      /* @var Profile $profile */
      $profile = $profile_api->profileFind(json_encode($filter));
    }
    catch (ApiException $e) {
      \Drupal::logger('DBCDK Community Service')->error($e);
      $profile = NULL;
    }

    return new static(
      $profile,
      $profile_api
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
  public function buildForm(array $form, FormStateInterface $form_state, $username = NULL) {
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
      '#type' => 'date',
      '#title' => $this->t('Birthday'),
      '#default_value' => $this->profile->getBirthday()->format(self::DATE_FORMAT),
      '#date_date_format' => self::DATE_FORMAT,
    ];

    $form['description'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Description'),
      '#default_value' => $this->profile->getDescription(),
      '#format' => 'dbcdk_community_profiles__description',
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
        'username' => $username,
      ]),
      '#attributes' => ['class' => ['button']],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $fields = [
      'fullName',
      'displayName',
      'email',
      'phone',
      'birthday',
      'description',
    ];

    // Go through each field and check if there is any differences from the
    // original value and the new value. If so, we add it to an array of new
    // data. - We do this to make sure we actually have to PUT any data to the
    // Community Service and provide a different message to the editor when
    // nothing was updated or an actual update happened.
    $new_data = [];
    foreach ($fields as $field) {
      // Get the old and new value. This will be used to check if there were
      // any changes and will of cause also be used in the body of the request.
      $old_value = $this->profile->{'get' . ucfirst($field)}();
      $new_value = $form_state->getValue($field);

      switch ($field) {
        // The birthday field's original value is a DateTime object so we have
        // to get the same format as the string the date-field returns to check
        // if there is any differences.
        case 'birthday':
          if ($old_value->format(self::DATE_FORMAT) !== $new_value) {
            $new_data[$field] = $new_value;
          }
          break;

        // The description is a text_format field that returns an array with a
        // value key and text_format key so we have to get fetch the value of
        // it to compare.
        case 'description':
          if ($old_value !== $new_value['value']) {
            $new_data[$field] = $new_value['value'];
          }
          break;

        default:
          if ($old_value !== $new_value) {
            $new_data[$field] = $new_value;
          }
          break;
      }
    }

    if (!empty($new_data)) {
      try {
        // The Community Service needs to know who is being altered, so we have
        // to set the profiles ID to the body of the PUT request.
        $new_data['id'] = $this->profile->getId();
        $this->profile = $this->profileApi->profileUpsert(json_encode($new_data));
        drupal_set_message($this->t('The profile "%profile" has been updated.', ['%profile' => $this->profile->getUsername()]));
      }
      catch (ApiException $e) {
        \Drupal::logger('DBCDK Community Service')->error($e);
      }
    }
    else {
      drupal_set_message(
        $this->t('There were no changes detected for the profile "%profile".', ['%profile' => $this->profile->getUsername()]),
        'warning'
      );
    }

    // Redirect to the Profiles display page.
    $form_state->setRedirect('page_manager.page_view_dbcdk_community_profile', [
      'username' => $this->profile->getUsername(),
    ]);
  }

}
