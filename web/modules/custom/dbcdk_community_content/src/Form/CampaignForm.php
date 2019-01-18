<?php

namespace Drupal\dbcdk_community_content\Form;

use DBCDK\CommunityServices\Api\GroupApi;
use DBCDK\CommunityServices\ApiException;
use DBCDK\CommunityServices\Model\CampaignWorktype;
use Drupal\Core\Datetime\DrupalDateTime;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\dbcdk_community_content\Campaign\Campaign;
use Drupal\dbcdk_community_content\Campaign\CampaignRepository;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class CampaignForm.
 *
 * @package Drupal\dbcdk_community_content\Form
 */
class CampaignForm extends FormBase {
  use LoggerAwareTrait;

  /**
   * The campaign repository to use.
   *
   * @var CampaignRepository
   */
  protected $campaignRepository;

  /**
   * The group API to use.
   *
   * @var GroupApi
   */
  protected $groupApi;

  /**
   * The campaign which is managed by the form.
   *
   * @var Campaign
   */
  protected $campaign;

  /**
   * CampaignForm constructor.
   *
   * @param LoggerInterface $logger
   *   The logger to use.
   * @param CampaignRepository $campaign_repository
   *   The campaign repository to use.
   * @param GroupApi $group_api
   *   The group api to use.
   * @param Campaign $campaign
   *   The campaign to manage.
   */
  public function __construct(
    LoggerInterface $logger,
    CampaignRepository $campaign_repository,
    GroupApi $group_api,
    Campaign $campaign
  ) {
    $this->logger = $logger;
    $this->campaignRepository = $campaign_repository;
    $this->groupApi = $group_api;
    $this->campaign = $campaign;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    /* @var CampaignRepository $campaign_repository */
    $campaign_repository = $container->get('dbcdk_community_content.campaign.campaign_repository');
    /* @var LoggerInterface $logger */
    $logger = $container->get('dbcdk_community.logger');

    // If we cannot determine a campaign to manage using the form then use a new
    // instance. This will result a new campaign being created.
    $campaign = new Campaign();
    if ($campaign_id = $container->get('request_stack')->getCurrentRequest()->get('campaign_id')) {
      try {
        $campaign = $campaign_repository->getCampaignById($campaign_id);
      }
      catch (ApiException $e) {
        drupal_set_message($container->get('string_translation')->t('Unable to retrieve campaign. Please try again later.', 'error'));
        $logger->error($e);
      }
    }

    return new static(
      $logger,
      $campaign_repository,
      $container->get('dbcdk_community.api.group'),
      $campaign
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'dbcdk_community_content_campaign_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#description' => $this->t('The name of the campaign'),
      '#default_value' => $this->campaign->getCampaignName(),
      '#required' => TRUE,
    ];

    $form['type'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Campaign type'),
    ];
    $form['type']['campaign_type'] = [
      '#type' => 'radios',
      '#title' => $this->t('Type'),
      '#description' => $this->t('The campaign type'),
      '#options' => [
        'group' => $this->t('group'),
        'review' => $this->t('review'),
      ],
      '#default_value' => $this->campaign->getType(),
      '#required' => TRUE,
    ];

    $group_id = ($this->campaign->getGroup()) ? $this->campaign->getGroup()->getId() : NULL;
    $form['type']['campaign_group'] = [
      '#type' => 'dbcdk_community_group_reference_autocomplete',
      '#title' => $this->t('Campaign group'),
      '#default_value' => $group_id,
      '#states' => [
        'visible' => [
          ':input[name="campaign_type"]' => ['value' => 'group'],
        ],
      ],
    ];

    $work_types = $this->campaignRepository->getCampaignWorkTypes();
    $work_type_options = array_reduce($work_types, function (array $work_types, CampaignWorktype $work_type) {
      $work_types[$work_type->getId()] = $work_type->getWorktype();
      return $work_types;
    }, []);
    $campaign_work_type_ids = array_map(function (CampaignWorktype $worktype) {
      return $worktype->getId();
    }, $this->campaign->getWorkTypes());
    $form['type']['campaign_work_types'] = [
      '#type' => 'checkboxes',
      '#title' => $this->t('Campaign work types'),
      '#options' => $work_type_options,
      '#default_value' => $campaign_work_type_ids,
      '#states' => [
        'visible' => [
          ':input[name="campaign_type"]' => ['value' => 'review'],
        ],
      ],
    ];

    $form['contact'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Required contact information'),
    ];
    $form['contact']['required_info'] = [
      '#type' => 'radios',
      '#title' => $this->t('Required info'),
      '#description' => $this->t('The type of contact information required by the user for this campaign'),
      '#options' => [
        'none' => $this->t('None'),
        'mail' => $this->t('Email'),
        'phone' => $this->t('Phone number'),
        'phoneAndMail' => $this->t('Email and Phone number'),
        'phoneOrMail' => $this->t('Email or Phone number'),
      ],
      '#default_value' => 'none',
      '#required' => TRUE,
    ];


    $start_date = (!empty($this->campaign->getStartDate())) ? DrupalDateTime::createFromDateTime($this->campaign->getStartDate()) : NULL;
    $form['start_date'] = [
      '#type' => 'datetime',
      '#title' => $this->t('Start date'),
      '#date_time_element' => 'none',
      '#default_value' => $start_date,
      '#required' => TRUE,
    ];

    $end_date = (!empty($this->campaign->getEndDate())) ? DrupalDateTime::createFromDateTime($this->campaign->getEndDate()) : NULL;
    $form['end_date'] = [
      '#type' => 'datetime',
      '#title' => $this->t('End date'),
      '#date_time_element' => 'none',
      '#default_value' => $end_date,
      '#required' => TRUE,
    ];

    // Try to determine if campaign uses images managed by this Drupal admin
    // interface. A campaign can use an image stored elsewhere but we will not
    // be able to show this in the administration interface.
    // This is also the reason why we cannot set the fields to required even
    // though they are required by the service.
    $logo_img_fids = [];
    $logo_img_url = $this->t('Not set');
    if ($this->campaign->getImgLogo()) {
      $logo_img_fids[] = $this->campaign->getImgLogo()->id();
    }
    // Get the raw file url from the remote object. The could be a local or
    // remote url depending on where the image is stored.
    if (!empty($this->campaign->getLogos()['small'])) {
      $logo_img_url = $this->campaign->getLogos()['small'];
    }
    $form['logo_img'] = array(
      '#type' => 'managed_file',
      '#title' => $this->t('Logo'),
      '#default_value' => $logo_img_fids,
      '#description' => $this->t('The campaign logo in pixel format. Current value: %url', ['%url' => $logo_img_url]),
      '#upload_location' => 'public://campaigns/logos/img',
      '#upload_validators' => [
        'file_validate_extensions' => ['jpeg jpg png gif'],
      ],
      // Logos are required if one does not exist already. If one is already set
      // it is not possible to unset it anyway.
      '#required' => empty($this->campaign->getLogos()['small']),
    );

    $logo_svg_fids = [];
    $logo_svg_url = $this->t('Not set');
    if (!empty($this->campaign->getSvgLogo())) {
      $logo_svg_fids[] = $this->campaign->getSvgLogo()->id();
    }
    if (!empty($this->campaign->getLogos()['svg'])) {
      $logo_svg_url = $this->campaign->getLogos()['svg'];
    }
    $form['logo_svg'] = array(
      '#type' => 'managed_file',
      '#title' => $this->t('Logo (SVG)'),
      '#default_value' => $logo_svg_fids,
      '#description' => $this->t('The campaign logo in SVG/vector format. Current value: %url', ['%url' => $logo_svg_url]),
      '#upload_location' => 'public://campaigns/logos/svg',
      '#upload_validators' => [
        'file_validate_extensions' => ['svg'],
      ],
      // Logos are required if one does not exist already. If one is already set
      // it is not possible to unset it anyway.
      '#required' => empty($this->campaign->getLogos()['svg']),
    );

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => empty($this->campaign->getId()) ? $this->t('Create') : $this->t('Update'),
      '#button_type' => 'primary',
    ];
    $form['actions']['cancel'] = [
      '#type' => 'link',
      '#title' => $this->t('Cancel'),
      '#url' => Url::fromRoute('page_manager.page_view_dbcdk_community_content_campaign_list'),
      '#attributes' => ['class' => ['button']],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    // Ensure that the necessary configuration for each campaign type is set.
    $type = $form_state->getValue('campaign_type');
    if ($type == 'review' &&
      empty(array_filter($form_state->getValue('campaign_work_types')))) {
      $form_state->setErrorByName('campaign_work_types', $this->t('Please specify work types for the campaign.'));
    }
    elseif ($type == 'group' && empty($form_state->getValue('campaign_group'))) {
      $form_state->setErrorByName('campaign_group', $this->t('Please specify the group corresponding to the campaign.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->campaign->setCampaignName($form_state->getValue('name'));
    $type = $form_state->getValue('campaign_type');
    $this->campaign->setType($type);
    
    $required_info = $form_state->getValue('required_info');
    $this->campaign->setRequiredContactInfo($required_info);

    // Set values according to type.
    if ($type == 'review') {
      $work_type_ids = array_values(array_filter($form_state->getValue('campaign_work_types')));
      $work_types = $this->campaignRepository->getCampaignWorkTypes(['where' => ['id' => ['inq' => $work_type_ids]]]);
      $this->campaign->setWorkTypes($work_types);
    }
    elseif ($type == 'group') {
      $group_id = $form_state->getValue('campaign_group');
      $group = $this->groupApi->groupFindById($group_id);
      $this->campaign->setGroup($group);
    }

    $start = new \DateTime();
    $start->setTimestamp($form_state->getValue('start_date')->getTimestamp());
    $start->setTime(0, 0, 0);
    $this->campaign->setStartDate($start);
    $end = new \DateTime();
    $end->setTimestamp($form_state->getValue('end_date')->getTimestamp());
    // Campaigns last throughout the final day.
    $end->setTime(23, 59, 59);
    $this->campaign->setEndDate($end);

    if (!empty($form['logo_img']['#files'])) {
      // If a logo image has been uploaded then manage it.
      /* @var \Drupal\file\Entity\File $logo_img */
      $this->campaign->setImgLogo(array_shift($form['logo_img']['#files']));
    }

    if (!empty($form['logo_svg']['#files'])) {
      // Manage SVG logos as well.
      /* @var \Drupal\file\Entity\File $logo_svg */
      $this->campaign->setSvgLogo(array_shift($form['logo_svg']['#files']));
    }

    try {
      $this->campaignRepository->saveCampaign($this->campaign);

      if (empty($this->campaign->getId())) {
        drupal_set_message($this->t('The campaign was created successfully.'));
      }
      else {
        drupal_set_message($this->t('The campaign was updated successfully.'));
      }

      // Redirect to the Community Profile after successful submission.
      $form_state->setRedirect('page_manager.page_view_dbcdk_community_content_campaign_list');
    }
    catch (ApiException $e) {
      $this->logger->error($e);
      drupal_set_message($this->t('Unable to create/update the campaign. Please try again later'), 'error');
    }
  }

}
