<?php
/**
 * @file
 * ApiClient class definition.
 */

namespace Drupal\dbcdk_community\Api;

use DBCDK\CommunityServices\ApiException;

/**
 * API client subclass tailored to the Community Service API.
 *
 * This adds modifications to the generated API client.
 */
class ApiClient extends \DBCDK\CommunityServices\ApiClient {

  /**
   * {@inheritdoc}
   */
  public function callApi($resource_path, $method, $query_params, $post_data, $header_params, $response_type = NULL) {
    try {
      return parent::callApi($resource_path, $method, $query_params, $post_data, $header_params, $response_type);
    }
    catch (ApiException $e) {
      // Improve API exception message. Normally this would a generic message
      // "Error connecting to the API". The community service stores the
      // specifics about the error in the response body so try to extract that
      // and rethrow if possible.
      $message = $e->getMessage();
      $response_body = $e->getResponseBody();
      if (isset($response_body->error->message)) {
        $message = $response_body->error->message . ' ' . $message;
      }
      throw new ApiException($message, $e->getCode(), $e->getResponseHeaders(), $e->getResponseBody());
    }
  }

}
