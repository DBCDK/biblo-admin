<?php

/**
 * @file
 * Contains \Drupal\dbcdk_community\Form\ProfileEditForm.
 */

namespace Drupal\dbcdk_community\Form;

use DBCDK\CommunityServices\ApiException;
use DBCDK\CommunityServices\Model\CommunityRole;
use Drupal\Core\Datetime\DrupalDateTime;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;
use Drupal\dbcdk_community\Profile\Profile;
use Drupal\dbcdk_community\Profile\ProfileRepository;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Edit a Community Service Profile.
 */
class ProfileEditForm extends FormBase implements ContainerInjectionInterface {
  use LoggerAwareTrait;

  /**
   * The profile repository to use.
   *
   * @var \Drupal\dbcdk_community\Profile\ProfileRepository $profileRepository
   */
  protected $profileRepository;

  /**
   * The Community Service Profile object from the username context.
   *
   * @var \Drupal\dbcdk_community\Profile\Profile $profile
   */
  protected $profile;

  /**
   * Creates a Profile Edit Form instance.
   *
   * @param \Psr\Log\LoggerInterface $logger
   *   The logger to use.
   * @param \Drupal\dbcdk_community\Profile\ProfileRepository $profile_repository
   *   The repository for use for handling profiles.
   * @param \DBCDK\CommunityServices\Model\Profile $profile
   *   The DBCDK Community Profile object we wish to edit.
   */
  public function __construct(LoggerInterface $logger, ProfileRepository $profile_repository, Profile $profile = NULL) {
    $this->logger = $logger;
    $this->profileRepository = $profile_repository;
    $this->profile = $profile;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    /* @var \Drupal\dbcdk_community\Profile\ProfileRepository $profile_repository */
    $profile_repository = $container->get('dbcdk_community.profile.profile_repository');
    /* @var LoggerInterface $logger */
    $logger = $container->get('dbcdk_community.logger');

    try {
      $profile = $profile_repository->getProfileByUsername($container->get('request_stack')->getCurrentRequest()->get('username'));
    }
    catch (ApiException $e) {
      $logger->error($e);
      $profile = NULL;
    }

    return new static(
      $logger,
      $profile_repository,
      $profile
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
      '#description' => $this->t('Day/Month/Year.'),
      '#date_time_element' => 'none',
      // Make sure the date is a DateTime object before we try to use it as one.
      // We do this to avoid fatal errors.
      '#default_value' => ($this->profile->getBirthday() instanceof \DateTime) ? DrupalDateTime::createFromDateTime($this->profile->getBirthday()) : NULL,
    ];

    $profile_role_ids = array_map(function(CommunityRole $role) {
      return $role->getId();
    }, $this->profile->getCommunityRoles());

    $all_role_options = array_reduce(
      $this->profileRepository->getCommunityRoles(),
      function ($result, CommunityRole $role) {
        $result[$role->getId()] = $role->getName();
        return $result;
      }
    );
    $form['roles'] = [
      '#type' => 'checkboxes',
      '#title' => $this->t('Roles'),
      '#default_value' => $profile_role_ids,
      '#options' => $all_role_options,
    ];

    $library = $this->profile->getFavoriteLibrary();
    $form['favoriteLibrary'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Library'),
      '#default_value' => ((!empty($library['libraryId'])) ? $library['libraryId'] : ''),
      '#description' => $this->t('The library id for users favorite library'),
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
        'favoriteLibrary',
        'description',
      ];
      $this->updateProfileFields($fields, $form_state);

      // Update roles based on the submitted "roles" input.
      // The array returned from a checkbox field includes both selected and
      // unselected elements so we have to filter away any elements that are
      // considered false.
      $role_ids = array_filter($form_state->getValue('roles'));
      $this->profileRepository->updateProfileRoles($this->profile, $role_ids);
    }
    catch (ApiException $e) {
      $this->logger->error($e);
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
            // Make sure the date is a DrupalDateTime object before we try to
            // use it as one. We do this to avoid fatal errors.
            if ($value instanceof DrupalDateTime) {
              $date = new \DateTime();
              $date = $date->setTimestamp($value->getTimestamp());
              $this->profile->{$setter}($date);
            }
            break;

          case 'favoriteLibrary':
            if (!empty($value)) {
              // Library is specificed as an object but no corresponding class
              // is defined. Instead we use a map which will be converted to an
              // non-classed object down the line.
              $library = ['libraryId' => $value];
              $this->profile->setFavoriteLibrary($library);
            }
            else {
              // To properly unset the favorite library we use an empty map.
              $this->profile->setFavoriteLibrary([]);
            }
            break;

          default:
            $this->profile->{$setter}($value);
            break;
        }
      }
    }

    return $this->profileRepository->saveProfile($this->profile);
  }

}
