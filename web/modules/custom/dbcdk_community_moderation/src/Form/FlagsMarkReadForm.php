<?php
/**
 * @file
 * Class definition for FlagsMarkReadForm.
 */

namespace Drupal\dbcdk_community_moderation\Form;

use DBCDK\CommunityServices\Api\FlagApi;
use DBCDK\CommunityServices\ApiException;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Form for marking a list of flags.
 */
class FlagsMarkReadForm extends FormBase {
  use LoggerAwareTrait;

  /**
   * The flag API to use when marking flags as read.
   *
   * @var \DBCDK\CommunityServices\Api\FlagApi
   */
  protected $flagApi;

  /**
   * FlagsMarkReadForm constructor.
   *
   * @param LoggerInterface $logger
   *   The logger to use.
   * @param FlagApi $flag_api
   *   The flag API to use when marking flags as read.
   */
  public function __construct(LoggerInterface $logger, FlagApi $flag_api) {
    $this->flagApi = $flag_api;
    $this->logger = $logger;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('dbcdk_community.logger'),
      $container->get('dbcdk_community.api.flag')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'dbcdk_community_moderation_flagged_content_mark_all_as_read_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // We expect one or more flags to be passed as a build argument when getting
    // the form.
    $info = $form_state->getBuildInfo();
    if (!empty($info['args'][0])) {
      $flags = $info['args'][0];
      if (!is_array($flags)) {
        $flags = [$flags];
      }
      $form_state->set('flags', $flags);
    }

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Mark all flags as read'),
      '#button_type' => 'primary',
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    /* @var \Drupal\dbcdk_community_moderation\Content\FlaggableContentInterface $flagged_content */
    $flags = $form_state->get('flags');
    if (empty($flags)) {
      $this->logger->warning('Attempt to mark all flags as read without a valid flaggable content element');
      return;
    }

    try {
      foreach ($flags as $flag) {
        $flag->setMarkedAsRead(TRUE);
        $this->flagApi->flagUpsert($flag);
        drupal_set_message($this->t('Marked flag(s) as read'));
      }
    }
    catch (ApiException $e) {
      $this->logger($e);
      drupal_set_message($this->t('An error occurred when trying to mark a flag as read'), 'error');
    }
  }

}
