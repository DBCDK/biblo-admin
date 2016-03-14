<?php

/**
 * @file
 * Contains Drupal\dbcdk_community\CommunityTraits.
 */

namespace Drupal\dbcdk_community;

use DBCDK\CommunityServices\ApiException;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Provides helping methods for DBCDK Community Service.
 */
trait CommunityTraits {

  use StringTranslationTrait;

  /**
   * Handle an Exception and log the event.
   *
   * The normal exception message does not provide any details of where the
   * code went bad but just informs about an error - this will log with more
   * details.
   * This function will also provide a more human-friendly error-message.
   *
   * @param \DBCDK\CommunityServices\ApiException $e
   *   A caught Community Service API Exception.
   */
  protected function handleException(ApiException $e) {
    // Set a more human-friendly error message for users.
    drupal_set_message($this->t('An error occurred when the system tried to fetch data from an external service. Please try and refresh the page or contact an administrator.'), 'error');

    // Log errors to dblog.
    \Drupal::logger('DBCDK Community Service')->error(urldecode($e->getMessage()) . '<br><br>' . $e->getTraceAsString());
  }

}
