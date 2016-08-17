<?php

namespace Drupal\dbcdk_community_content\Form;

use DBCDK\CommunityServices\ApiException;
use DBCDK\CommunityServices\Model\Campaign;
use Drupal\Component\Utility\UrlHelper;
use Drupal\Core\Datetime\DrupalDateTime;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Path\PathValidatorInterface;
use Drupal\Core\StreamWrapper\PublicStream;
use Drupal\Core\Url;
use Drupal\file\Entity\File;
use Drupal\file\FileStorageInterface;
use Drupal\image\Entity\ImageStyle;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use DBCDK\CommunityServices\Api\CampaignApi;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Class CampaignForm.
 *
 * @package Drupal\dbcdk_community_content\Form
 */
class CampaignForm extends FormBase {
  use LoggerAwareTrait;

  /**
   * DBCDK\CommunityServices\Api\CampaignApi definition.
   *
   * @var DBCDK\CommunityServices\Api\CampaignApi
   */
  protected $campaignApi;

  /**
   * @var \Drupal\dbcdk_community_content\Form\Campaign
   */
  protected $campaign;

  protected $fileStorage;

  protected $imageStyleStorage;

  protected $pathValidator;

  public function __construct(
    LoggerInterface $logger,
    CampaignApi $campaign_api,
    Campaign $campaign,
    FileStorageInterface $file_storage,
    EntityStorageInterface $image_style_storage,
    PathValidatorInterface $path_validator
  ) {
    $this->logger = $logger;
    $this->campaignApi = $campaign_api;
    $this->campaign = $campaign;
    $this->fileStorage = $file_storage;
    $this->imageStyleStorage = $image_style_storage;
    $this->pathValidator = $path_validator;
  }

  public static function create(ContainerInterface $container) {
    /* @var CampaignApi $campaign_api */
    $campaign_api = $container->get('dbcdk_community.api.campaign');
    /* @var LoggerInterface $logger */
    $logger = $container->get('dbcdk_community.logger');

    $campaign = new Campaign();
    if ($campaign_id = $container->get('request_stack')->getCurrentRequest()->get('campaign_id')) {
      try {
        $campaign = $campaign_api->campaignFindById($campaign_id);
      }
      catch (ApiException $e) {
        drupal_set_message($container->get('string_translation')->t('Unable to retrieve campaign. Please try again later.', 'error'));
        $logger->error($e);
      }
    }

    return new static(
      $logger,
      $campaign_api,
      $campaign,
      $container->get('dbcdk_community_content.file_storage'),
      $container->get('dbcdk_community_content.image_style_storage'),
      $container->get('path.validator')
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
    $form['name'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#description' => $this->t('The name of the campaign'),
      '#default_value' => $this->campaign->getCampaignName(),
      '#required' => TRUE,
    );
    $form['type'] = array(
      '#type' => 'radios',
      '#title' => $this->t('Type'),
      '#description' => $this->t('The campaign type'),
      '#options' => [
        'group' => $this->t('group'),
        'review' => $this->t('review'),
      ],
      '#default_value' => $this->campaign->getType(),
      '#required' => TRUE,
    );

    $start_date = (!empty($this->campaign->getStartDate())) ? DrupalDateTime::createFromDateTime($this->campaign->getStartDate()) : NULL;
    $form['start_date'] = array(
      '#type' => 'datetime',
      '#title' => $this->t('Start date'),
      '#date_time_element' => 'none',
      '#default_value' => $start_date,
      '#required' => TRUE,
    );

    $end_date = (!empty($this->campaign->getEndDate())) ? DrupalDateTime::createFromDateTime($this->campaign->getEndDate()) : NULL;
    $form['end_date'] = array(
      '#type' => 'datetime',
      '#title' => $this->t('End date'),
      '#date_time_element' => 'none',
      '#default_value' => $end_date,
      '#required' => TRUE,
    );

    $logo_img_fids = [];
    $logo_img_url = $this->t('Not set');
    if (!empty($this->campaign->getLogos()['small'])) {
      $logo_img_url = $this->campaign->getLogos()['small'];
      $file = $this->loadFileFromUrl($this->campaign->getLogos()['small']);
      if (!empty($file)) {
        $logo_img_fids[] = $file->id();
      }
    }

    $form['logo_img'] = array(
      '#type' => 'managed_file',
      '#title' => $this->t('Logo'),
      '#default_value' => $logo_img_fids,
      '#description' => $this->t('The campaign logo in pixel format. Current value: %url', ['%url' => $logo_img_url ]),
      '#upload_location' => 'public://campaigns/logos/img',
    );

    $logo_svg_fids = [];
    $logo_svg_url = $this->t('Not set');
    if (!empty($this->campaign->getLogos()['svg'])) {
      $logo_svg_url = $this->campaign->getLogos()['svg'];
      $file = $this->loadFileFromUrl($this->campaign->getLogos()['svg']);
      if (!empty($file)) {
        $logo_svg_fids[] = $file->id();
      }
    }
    $form['logo_svg'] = array(
      '#type' => 'managed_file',
      '#title' => $this->t('Logo (SVG)'),
      '#default_value' => $logo_svg_fids,
      '#description' => $this->t('The campaign logo in SVG/vector format. Current value: %url', ['%url' => $logo_svg_url ]),
      '#upload_location' => 'public://campaigns/logos/svg',
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
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->campaign->setCampaignName($form_state->getValue('name'));
    $this->campaign->setType($form_state->getValue('type'));

    $start = new \DateTime();
    $start->setTimestamp($form_state->getValue('start_date')->getTimestamp());
    $start->setTime(0, 0, 0);
    $this->campaign->setStartDate($start);
    $end = new \DateTime();
    $end->setTimestamp($form_state->getValue('end_date')->getTimestamp());
    // Campaigns last throughout the final day.
    $end->setTime(23, 59, 59);
    $this->campaign->setEndDate($end);

    $logos = (array) $this->campaign->getLogos();

    if (!empty($form['logo_img']['#files'])) {
      /* @var \Drupal\file\Entity\File $logo_img */
      $logo_img = array_shift($form['logo_img']['#files']);
      if ($logo_img->isNew()) {
        $logo_img->setPermanent();
        $logo_img->save();
      }
      $image_styles = array_reduce(
        ['small', 'medium', 'large'],
        function ($image_styles, $image_style_name) {
          $image_styles[$image_style_name] = $this->imageStyleStorage->load(
            $image_style_name
          );
          return $image_styles;
        },
        []
      );

      $logos = array_merge($logos, array_map(
        function (ImageStyle $style) use ($logo_img) {
          return $style->buildUrl($logo_img->get('uri')->getString());
        },
        $image_styles
      ));
    }

    /* @var \Drupal\file\Entity\File $logo_svg */
    if (!empty($form['logo_svg']['#files'])) {
      $logo_svg = array_shift($form['logo_svg']['#files']);
      if ($logo_svg->isNew()) {
        $logo_svg->setPermanent();
        $logo_svg->save();
      }
      $logos['svg'] = file_create_url($logo_svg->getFileUri());
    }

    if (!empty($logos)) {
      $this->campaign->setLogos($logos);
    }

    try {
      if (empty($this->campaign->getId())) {
        $this->campaignApi->campaignCreate($this->campaign);
        drupal_set_message($this->t('The campaign was created successfully.'));
      }
      else {
        $this->campaignApi->campaignUpsert($this->campaign);
        drupal_set_message($this->t('The campaign was updated successfully.'));
      }

      // Redirect to the Community Profile after successful submission.
      $form_state->setRedirect('page_manager.page_view_dbcdk_community_content_campaign_list');
    }
    catch (ApiException $e) {
      $this->logger->error($e);
      drupal_set_message($this->t('Unable to create/update the campaign. Please try again later'), 'error');

      array_map(function(File $file) {
        $file->setTemporary();
        $file->save();
      }, array_filter([$logo_img, $logo_svg]));
    }
  }

  /**
   * @param $url
   * @return File
   */
  protected function loadFileFromUrl($url) {
    try {
      $local = UrlHelper::externalIsLocal($url, $this->getRequest()->getSchemeAndHttpHost());
    }
    catch (\InvalidArgumentException $e) {
      $local = FALSE;
    }
    if (!$local) {
      return NULL;
    }

    $url = str_replace(PublicStream::baseUrl(), 'public:/', $url);
    $url = str_replace('/styles/small/public', '', $url);
    $url = explode('?', $url, 2)[0];

    $files = $this->fileStorage->loadByProperties(['uri' => $url]);
    return array_shift($files);
  }

}
