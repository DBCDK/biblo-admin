<?php

/**
 * @file
 * Contains \Drupal\dbcdk_community\CommunityApiConfiguration.
 */

namespace Drupal\dbcdk_community\Api;

use DBCDK\CommunityServices\Configuration as Configuration;

/**
 * Community API Configuration Class.
 *
 * This class contains the configuration needed for the ApiClient to
 * communicate with the Community Service.
 *
 * @See DBCDK\CommunityServices\ApiClient
 */
class CommunityApiConfiguration extends Configuration {

  /**
   * Set configuration for the Community Service Api Client.
   */
  public function __construct() {
    parent::__construct();

    $config = \Drupal::config('dbcdk_community.settings');

    // The Community Service prefixes each endpoint with a slash,
    // so we make sure the host does not end with one.
    $host = rtrim($config->get('community_service_url'), '/');
    $this->setHost($host);

    // Set Debug Mode if it is enabled in the admin form.
    if ($config->get('community_service_debug')) {
      $this->setDebug((bool) $config->get('community_service_debug'));
    }
  }

}
