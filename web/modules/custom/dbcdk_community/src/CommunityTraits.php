<?php

/**
 * @file
 * Contains Drupal\dbcdk_community\CommunityTraits.
 */

namespace Drupal\dbcdk_community;

use DBCDK\CommunityServices\ApiException;

/**
 * Provides helping methods for DBCDK Community Service.
 */
trait CommunityTraits {

  /**
   * Format an ApiException and log the event.
   *
   * The normal exception does not provide any details of where the code went
   * bad but just informs about an error - this will log with more details.
   * This function will also provide a more human-friendly error-message.
   *
   * @param \DBCDK\CommunityServices\ApiException $e
   *   A caught Community Service API Exception.
   *
   * @throws \DBCDK\CommunityServices\ApiException
   */
  protected function formatException(ApiException $e) {
    // Set a more human-friendly error message for users.
    drupal_set_message(\Drupal::translation()->translate('An error occurred when the system tried to fetch data from an external service. Please try and refresh the page or contact an administrator.'), 'error');

    // Log errors to dblog.
    \Drupal::logger('DBCDK Community Service')->error(urldecode($e->getMessage()) . '<br><br>' . $e->getTraceAsString());

    // Throw exception to stop the rest of the code from executing.
    throw $e;
  }

}
