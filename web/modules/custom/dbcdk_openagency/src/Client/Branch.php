<?php

namespace Drupal\dbcdk_openagency\Client;

/**
 * Instances of the Branch class represent libraries or similar locations.
 *
 * This will usually be locations where citizens can pick up and return loaned
 * materials.
 *
 * Properties in the class correspond to values returned by the DBC OpenAgency
 * service.
 *
 * @see https://opensource.dbc.dk/services/open-agency
 */
class Branch {

  /**
   * The id of the branch.
   *
   * @var int
   */
  public $branchId;

  /**
   * The name of the branch.
   *
   * @var string
   */
  public $branchName;

}
