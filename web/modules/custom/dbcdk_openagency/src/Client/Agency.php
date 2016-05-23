<?php
/**
 * @file
 * Agency class definition.
 */

namespace Drupal\dbcdk_openagency\Client;

/**
 * Instances of the Agency class represents library institutions.
 *
 * Each institution consists of many pickup agencies - locations where citizens
 * can pick up loaned materials etc.
 *
 * Properties in the class correspond to values returned by the DBC OpenAgency
 * service.
 *
 * @see https://opensource.dbc.dk/services/open-agency
 */
class Agency {

  /**
   * The agency id.
   *
   * This is also referred to the library number or library id.
   *
   * @var int
   */
  public $agencyId;

  /**
   * The name of the agency.
   *
   * @var string
   */
  public $agencyName;

  /**
   * All branches related to this agency.
   *
   * @var Branch[]
   */
  public $pickupAgency = [];

}
