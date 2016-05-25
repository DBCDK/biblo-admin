<?php

namespace Drupal\dbcdk_openagency\Client;

/**
 * A response from a pickupAgencyList request.
 *
 * Properties in the class correspond to values returned by the DBC OpenAgency
 * service.
 *
 * @see https://opensource.dbc.dk/services/open-agency
 */
class PickupAgencyListResponse {

  /**
   * Agencies returned by the request.
   *
   * @var Agency[]
   */
  public $library = [];

  /**
   * Set if an error occurred processing the request.
   *
   * @var string
   */
  public $error;

}
