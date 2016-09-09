<?php

namespace Drupal\dbcdk_community_content\Campaign;

use DBCDK\CommunityServices\Api\CampaignApi;
use DBCDK\CommunityServices\Api\CampaignWorktypeApi;
use DBCDK\CommunityServices\Api\GroupApi;
use DBCDK\CommunityServices\ApiException;
use DBCDK\CommunityServices\Model\CampaignWorktype;
use Drupal\Component\Utility\UrlHelper;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\StreamWrapper\PublicStream;
use Drupal\file\FileInterface;
use Drupal\file\FileStorageInterface;
use Drupal\file\FileUsage\FileUsageInterface;
use Drupal\image\Entity\ImageStyle;
use Psr\Log\LoggerAwareTrait;

/**
 * Repository for managning campaigns.
 *
 * Campaigns storage are spread across multiple APIs. This repository provides
 * a single entry point.
 */
class CampaignRepository {
  use LoggerAwareTrait;

  /**
   * The campaign API to use when retrieving core information about campaigns.
   *
   * @var CampaignApi
   */
  protected $campaignApi;

  /**
   * The work type API to use for relating review campaigns to work types.
   *
   * @var CampaignWorktypeApi
   */
  protected $worktypeApi;

  /**
   * The group API to use for relating group campaigns to groups.
   *
   * @var GroupApi
   */
  protected $groupApi;

  /**
   * The file storage to use when managed uploaded campaign files.
   *
   * @var FileStorageInterface
   */
  protected $fileStorage;

  /**
   * The file usage manager to use for registering campaign files.
   *
   * @var FileUsageInterface
   */
  protected $fileUsage;

  /**
   * The image style storage to use to determine derivatives of images.
   *
   * @var EntityStorageInterface
   */
  protected $imageStyleStorage;

  /**
   * CampaignRepository constructor.
   *
   * @param CampaignApi $campaign_api
   *   The campaign API to use.
   * @param CampaignWorktypeApi $work_type_api
   *   The work type API to use.
   * @param GroupApi $group_api
   *   The group API to use.
   * @param FileStorageInterface $file_storage
   *   The file storage to use.
   * @param EntityStorageInterface $image_style_storage
   *   The image style storage to use.
   */
  public function __construct(
    CampaignApi $campaign_api,
    CampaignWorktypeApi $work_type_api,
    GroupApi $group_api,
    FileStorageInterface $file_storage,
    FileUsageInterface $file_usage,
    EntityStorageInterface $image_style_storage
  ) {
    $this->campaignApi = $campaign_api;
    $this->worktypeApi = $work_type_api;
    $this->groupApi = $group_api;
    $this->fileStorage = $file_storage;
    $this->fileUsage = $file_usage;
    $this->imageStyleStorage = $image_style_storage;
  }

  /**
   * Retrieve a campaign matching an ID along with used work types or group.
   *
   * @param int $id
   *   The campaign id.
   *
   * @return \Drupal\dbcdk_community_content\Campaign\Campaign
   *   The campaign matching the id.
   */
  public function getCampaignById($id) {
    $campaign = new Campaign($this->campaignApi->campaignFindById($id));

    try {
      $campaign->setGroup($this->campaignApi->campaignPrototypeGetGroup($campaign->getId()));
    }
    catch (ApiException $e) {
      // If we cannot get a group for the campaign then ignore it. It may not
      // have any.
    }
    try {
      $campaign->setWorkTypes((array) $this->campaignApi->campaignPrototypeGetWorkTypes($campaign->getId()));
    }
    catch (ApiException $e) {
      // If we cannot get work types for the campaign then ignore it. It may not
      // have any.
    }

    $logo_urls = $campaign->getLogos();
    try {
      $campaign->setImgLogo($this->loadFileFromUrl($logo_urls['small']));
    }
    catch (\UnexpectedValueException $e) {
      // If we cannot load a file from an url then simply do not set the logo.
    }
    try {
      $campaign->setSvgLogo($this->loadFileFromUrl($logo_urls['svg']));
    }
    catch (\UnexpectedValueException $e) {
      // If we cannot load a file from an url then simply do not set the logo.
    }

    return $campaign;
  }

  /**
   * Get work types which can be used for review campaigns.
   *
   * @param array $filter
   *   The JSON filter to use when retrieving work types.
   *
   * @return CampaignWorktype[]
   *   The work types corresponding the filter. If no filter is provided all
   *   work types is returned.
   */
  public function getCampaignWorkTypes(array $filter = []) {
    $filter = (!empty($filter)) ? json_encode($filter) : NULL;
    return (array) $this->worktypeApi->campaignWorktypeFind($filter);
  }

  /**
   * Persist a campaign with related work types or group.
   *
   * @param \Drupal\dbcdk_community_content\Campaign\Campaign $campaign
   *   The campaign to save.
   */
  public function saveCampaign(Campaign $campaign) {
    // Keep a record of existing files.
    $existing_files = array_reduce(
      array_intersect_key((array) $campaign->getLogos(), array_flip(['small', 'svg'])),
      function (array $files, $uri) {
        try {
          $file = $this->loadFileFromUrl($uri);
          $files[$file->id()] = $file;
        }
        catch (\UnexpectedValueException $e) {
          // If the url does not match a file then ignore it. It does not
          // require management.
        }
        return $files;
      },
      []
    );
    $current_files = array_reduce(array_filter([$campaign->getImgLogo(), $campaign->getImgLogo()]),
      function (array $files, FileInterface $file) {
        $files[$file->id()] = $file;
        return $files;
      },
      []
    );
    // array_diff() only works for variables than can be converted to strings.
    // That does not work for File objects so we rely on keyed arrays and
    // array_diff_key() instead.
    $removed_files = array_diff_key($existing_files, $current_files);
    $new_files = array_diff_key($current_files, $existing_files);

    // Before we save the campaign we clean up any existing associations.
    // This only applies for existing campaigns.
    if ($campaign->getId()) {
      // First up: Work types. Remove all links.
      array_map(function (CampaignWorktype $work_type) use ($campaign) {
        $this->campaignApi->campaignPrototypeUnlinkWorkTypes($work_type->getId(), $campaign->getId());
      }, $this->getCampaignWorkTypes());

      // Next we remove any link from a group to the campaign.
      /* @var \DBCDK\CommunityServices\Model\Group $existing_group */
      try {
        $existing_group = $this->campaignApi->campaignPrototypeGetGroup($campaign->getId());
        // We have to set the value to FALSE to unset. NULL will not touch the
        // existing value.
        $existing_group->setCampaignGroupFK(FALSE);
        $this->groupApi->groupUpsert($existing_group);
      }
      catch (ApiException $e) {
        // Do nothing. This will occur if there is no group associated with the
        // campaign.
      }

      // Delete all removed files.
      array_map(function (FileInterface $file) use ($campaign) {
        $this->fileUsage->delete($file, 'dbcdk_community_content', 'campaign', $campaign->getId());
        $file->delete();
      }, $removed_files);
    }

    // Update logo set.
    $logos = $campaign->getLogos();

    if (!empty($campaign->getSvgLogo())) {
      // We can just set the raw URL to the SVG. There is no need to create
      // derivatives of vectors.
      $logos['svg'] = file_create_url($campaign->getSvgLogo()->getFileUri());
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
    if (!empty($campaign->getImgLogo())) {
      $logos = array_merge($logos, array_map(
        function (ImageStyle $style) use ($campaign) {
          return $style->buildUrl($campaign->getImgLogo()->get('uri')->getString());
        },
        $image_styles
      ));
    }

    $campaign->setLogos($logos);

    // Now we can update the campaign information.
    if (!$campaign->getId()) {
      $saved_campaign = $this->campaignApi->campaignCreate($campaign);
    }
    else {
      $saved_campaign = $this->campaignApi->campaignUpsert($campaign);
    }

    $group = $campaign->getGroup();
    $work_types = $campaign->getWorkTypes();
    $campaign = new Campaign($saved_campaign);
    (empty($group)) ?: $campaign->setGroup($group);
    $campaign->setWorkTypes($work_types);

    // Set work types for review campaigns.
    if ($campaign->getType() == 'review') {
      // Extract the work type ids and create links.
      $work_type_ids = array_map(function (CampaignWorktype $work_type) {
        return $work_type->getId();
      }, $campaign->getWorkTypes());
      array_map(function ($work_type_id) use ($campaign) {
        $this->campaignApi->campaignPrototypeLinkWorkTypes($work_type_id, $campaign->getId());
      }, $work_type_ids);
    }
    elseif ($campaign->getType() == 'group') {
      // For group campaigns link the group to the campaign.
      $group = $campaign->getGroup();
      $group->setCampaignGroupFK($campaign->getId());
      $this->groupApi->groupUpsert($group);
    }

    // Register new files.
    array_map(function (FileInterface $file) use ($campaign) {
      $file->setPermanent();
      $file->save();
      // We have to register file usage. Otherwise validation fails. Note that
      // Drupal expects the type used here to be an entity type. That is not
      // the case for us and consequently the file usage view does not work.
      // @see \Drupal\file\Element\ManagedFile::validateManagedFile()
      $this->fileUsage->add($file, 'dbcdk_community_content', 'campaign', $campaign->getId());
    }, $new_files);
  }

  /**
   * Load a File entity based on a public url.
   *
   * @param string $url
   *   The url for which to load the file.
   *
   * @return FileInterface|Null
   *   The file corresponding to the url.
   *
   * @throws \UnexpectedValueException
   *   Thrown if the url cannot be converted to a file.
   */
  protected function loadFileFromUrl($url) {
    try {
      $local = UrlHelper::externalIsLocal($url, PublicStream::baseUrl());
    }
    catch (\InvalidArgumentException $e) {
      $local = FALSE;
    }
    if (!$local) {
      throw new \UnexpectedValueException(sprintf('Unable to determine file for %s', $url));
    }

    // Do convertions:
    // 1. Convert from full urls to stream wrapper.
    $url = str_replace(PublicStream::baseUrl(), 'public:/', $url);
    // 2. Remove image style path prefixes.
    $url = str_replace('/styles/small/public', '', $url);
    // 3. Remove query parameters such a itok.
    $url = explode('?', $url, 2)[0];
    // 4. Decode url parameters.
    $url = urldecode($url);

    // Load and return the first file.
    $files = $this->fileStorage->loadByProperties(['uri' => $url]);
    if (empty($files)) {
      throw new \UnexpectedValueException(sprintf('Unable to determine file for %s', $url));
    }
    return array_shift($files);
  }

}
