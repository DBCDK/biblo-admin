<?php

namespace Drupal\dbcdk_community_content\Form;

use DBCDK\CommunityServices\ApiException;
use DBCDK\CommunityServices\Model\Campaign;
use Drupal\Component\Utility\UrlHelper;
use Drupal\Core\Datetime\DrupalDateTime;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\StreamWrapper\PublicStream;
use Drupal\Core\Url;
use Drupal\file\FileStorageInterface;
use Drupal\image\Entity\ImageStyle;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use DBCDK\CommunityServices\Api\CampaignApi;

/**
 * Class CampaignForm.
 *
 * @package Drupal\dbcdk_community_content\Form
 */
class CampaignForm extends FormBase {
  use LoggerAwareTrait;

  /**
   * The campaign API to use.
   *
   * @var CampaignApi
   */
  protected $campaignApi;

  /**
   * The campaign which is managed by the form.
   *
   * @var Campaign
   */
  protected $campaign;

  /**
   * The file storage to use when managed uploaded campaign files.
   *
   * @var FileStorageInterface
   */
  protected $fileStorage;

  /**
   * The image style storage to use to determine derivatives of images.
   *
   * @var EntityStorageInterface
   */
  protected $imageStyleStorage;

  /**
   * CampaignForm constructor.
   *
   * @param LoggerInterface $logger
   *   The logger to use.
   * @param CampaignApi $campaign_api
   *   The campaign API to use.
   * @param Campaign $campaign
   *   The campaign to manage.
   * @param FileStorageInterface $file_storage
   *   The file storage to use.
   * @param EntityStorageInterface $image_style_storage
   *   The image style storage to use.
   */
  public function __construct(
    LoggerInterface $logger,
    CampaignApi $campaign_api,
    Campaign $campaign,
    FileStorageInterface $file_storage,
    EntityStorageInterface $image_style_storage
  ) {
    $this->logger = $logger;
    $this->campaignApi = $campaign_api;
    $this->campaign = $campaign;
    $this->fileStorage = $file_storage;
    $this->imageStyleStorage = $image_style_storage;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    /* @var CampaignApi $campaign_api */
    $campaign_api = $container->get('dbcdk_community.api.campaign');
    /* @var LoggerInterface $logger */
    $logger = $container->get('dbcdk_community.logger');

    // If we cannot determine a campaign to manage using the form then use a new
    // instance. This will result a new campaign being created.
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
      $container->get('dbcdk_community_content.image_style_storage')
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
    // Try to determine field id based on the small version of the logo.
    // If we manage the file then small, medium and large logos will be
    // derivations of the same image using image styles.
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
      '#description' => $this->t('The campaign logo in pixel format. Current value: %url', ['%url' => $logo_img_url]),
      '#upload_location' => 'public://campaigns/logos/img',
      // Logos are required if one does not exist already. If one is already set
      // it is not possible to unset it anyway.
      '#required' => empty($this->campaign->getLogos()['small']),
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
      '#description' => $this->t('The campaign logo in SVG/vector format. Current value: %url', ['%url' => $logo_svg_url]),
      '#upload_location' => 'public://campaigns/logos/svg',
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
    $new_files = [];

    if (!empty($form['logo_img']['#files'])) {
      // If a logo image has been uploaded then manage it.
      /* @var \Drupal\file\Entity\File $logo_img */
      $logo_img = array_shift($form['logo_img']['#files']);
      if ($logo_img->isNew()) {
        // Mark new images for permanent storage. Otherwise they will be cleaned
        // up at some point.
        $logo_img->setPermanent();
        $logo_img->save();
      }

      // Get image styles to match required versions.
      $image_styles = array_reduce(
        ['small', 'medium', 'large'],
        function ($image_styles, $image_style_name) {
          $image_styles[$image_style_name] = $this->imageStyleStorage->load(
            $image_style_name
          );
          // Remove nonexistant image styles - where load has returned null.
          return array_filter($image_styles);
        },
        []
      );

      // Build array of urls to logo files. We override preexisting values.
      $logos = array_merge($logos, array_map(
        function (ImageStyle $style) use ($logo_img) {
          return $style->buildUrl($logo_img->get('uri')->getString());
        },
        $image_styles
      ));
    }

    if (!empty($form['logo_svg']['#files'])) {
      // Manage SVG logos as well.
      /* @var \Drupal\file\Entity\File $logo_svg */
      $logo_svg = array_shift($form['logo_svg']['#files']);
      if ($logo_svg->isNew()) {
        $logo_svg->setPermanent();
        $logo_svg->save();
      }
      // We can just set the raw URL to the SVG. There is no need to create
      // derivatives of vectors.
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
    }
  }

  /**
   * Load a File entity based on a public url.
   *
   * @param string $url
   *   The url for which to load the file.
   *
   * @return File|Null
   *   The file corresponding to the url. NULL if there are no corresponding
   *   files.
   */
  protected function loadFileFromUrl($url) {
    try {
      $local = UrlHelper::externalIsLocal($url, $this->getRequest()->getSchemeAndHttpHost());
    }
    catch (\InvalidArgumentException $e) {
      $local = FALSE;
    }
    if (!$local) {
      // If the file is not local then we cannot possibly load a file.
      return NULL;
    }

    // Do convertions:
    // 1. Convert from full urls to stream wrapper.
    $url = str_replace(PublicStream::baseUrl(), 'public:/', $url);
    // 2. Remove image style path prefixes.
    $url = str_replace('/styles/small/public', '', $url);
    // 3. Remove query parameters such a itok.
    $url = explode('?', $url, 2)[0];
    // 4. Decode url parameters
    $url = urldecode($url);

    // Load and return the first file.
    $files = $this->fileStorage->loadByProperties(['uri' => $url]);
    return array_shift($files);
  }

}
