<?php

namespace Drupal\dbcdk_community_moderation\Form;

use DBCDK\CommunityServices\Api\AdminMessageApi;
use DBCDK\CommunityServices\ApiException;
use DBCDK\CommunityServices\Model\AdminMessage;
use Drupal\Core\Datetime\DrupalDateTime;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;
use Drupal\dbcdk_community_moderation\Profile\Profile;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Create or edit a Community AdminMessage.
 */
class AdminMessageForm extends FormBase implements ContainerInjectionInterface {
  use LoggerAwareTrait;

  /**
   * Community Service AdminMessage API.
   *
   * @var \DBCDK\CommunityServices\Api\AdminMessageApi $messageApi
   */
  protected $messageApi;

  /**
   * Community Service AdminMessage object from the context.
   *
   * @var \DBCDK\CommunityServices\Model\AdminMessage $message
   */
  protected $message;

  /**
   * Community Service Profile from the context.
   *
   * @var \Drupal\dbcdk_community_moderation\Profile\Profile $profile
   */
  protected $profile;

  /**
   * AdminMessageForm constructor.
   *
   * @param \Psr\Log\LoggerInterface $logger
   *   The Logger to use.
   * @param \DBCDK\CommunityServices\Api\AdminMessageApi $message_api
   *   The Community Service AdminMessage API.
   * @param \DBCDK\CommunityServices\Model\AdminMessage $message
   *   The Community AdminMessage we wish to alter.
   * @param \Drupal\dbcdk_community_moderation\Profile\Profile $profile
   *   The Community Profile we wish to alter a message on.
   */
  public function __construct(LoggerInterface $logger, AdminMessageApi $message_api, AdminMessage $message = NULL, Profile $profile = NULL) {
    $this->logger = $logger;
    $this->messageApi = $message_api;
    $this->message = $message;
    $this->profile = $profile;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    /* @var LoggerInterface $logger */
    $logger = $container->get('dbcdk_community.logger');
    /* @var AdminMessageApi $message_api */
    $message_api = $container->get('dbcdk_community.api.admin_messages');

    try {
      // Set the $this->message if the request contains a message id.
      if ($message_id = $container->get('request_stack')->getCurrentRequest()->get('message_id')) {
        $message = $message_api->adminMessageFindById($message_id);
      }
      else {
        $message = NULL;
      }

      /* @var \Drupal\dbcdk_community_moderation\Profile\ProfileRepository $profile_repository */
      $profile_repository = $container->get('dbcdk_community_moderation.profile.profile_repository');
      $profile = $profile_repository->getProfileByUsername($container->get('request_stack')->getCurrentRequest()->get('username'));
    }
    catch (ApiException $e) {
      $logger->error($e);
      $profile = NULL;
      $message = NULL;
    }

    return new static(
      $logger,
      $message_api,
      $message,
      $profile
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'dbcdk_community_moderation_message_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // Defensive coding to make sure we only display the message form if we
    // could find a Community Profile that it should belong to.
    if (empty($this->profile)) {
      drupal_set_message($this->t('The system could not find the profile with this message. Please try again later or contact an administrator.'), 'error');
      return $form;
    }

    $form['message'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Message'),
      '#format' => 'dbcdk_community_basic_markup',
      '#default_value' => empty($this->message) ? '' : $this->message->getMessage(),
      '#required' => TRUE,
    ];

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => empty($this->message) ? $this->t('Create') : $this->t('Update'),
      '#button_type' => 'primary',
    ];
    $form['actions']['cancel'] = [
      '#type' => 'link',
      '#title' => $this->t('Cancel'),
      '#url' => Url::fromRoute('page_manager.page_view_dbcdk_community_profile', [
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
      // Instantiate a new AdminMessage if there is no message in the context.
      // The lack of a message in the context is also what we use to
      // determine if we're creating or editing an existing message.
      if (empty($this->message)) {
        $this->message = new AdminMessage();
        // Set the ID of the Drupal Moderator who created this message.
        // We would like to be able to look up who created a message but
        // because the system does not yet support "UNI Login", we then set the
        // Drupal user instead so we can create a script that will map these
        // IDs, later on.
        // @TODO Use the Profile ID when the system supports UNI Login.
        $this->message->setSenderProfileId($this->currentUser()->id());
        // Set the Community Profile ID that should own this message.
        $this->message->setReceiverProfileId($this->profile->getId());
      }

      // Set values for the message.
      $this->message->setMessage($form_state->getValue('message')['value']);
      // Determine if we should POST or PUT a request based on the existence of
      // a AdminMessage ID. The ID will only exist if we have fetched the
      // message from the Community Service.
      if (empty($this->message->getId())) {
        drupal_set_message($this->t('The message was successfully created.'));
        $this->messageApi->adminMessageCreate($this->message);
      }
      else {
        drupal_set_message($this->t('The message was successfully updated.'));
        $this->messageApi->adminMessageUpsertPutAdminMessages($this->message);
      }

      // Redirect to the Community Profile after successful submission.
      $form_state->setRedirect('page_manager.page_view_dbcdk_community_profile', [
        'username' => $this->profile->getUsername(),
      ]);
    }
    catch (ApiException $e) {
      \Drupal::logger('DBCDK Community Service')->error($e);
      drupal_set_message($this->t('An error occurred while the system tried to handle the message. Please try again later or contact an administrator.'), 'error');
    }
  }

}
