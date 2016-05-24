<?php

namespace Drupal\dbcdk_openagency\Service;

use Drupal\Core\KeyValueStore\KeyValueStoreInterface;
use Drupal\Core\StringTranslation\TranslationInterface;

/**
 * The AgencyBranchService exposes agency anf branch data to other modules.
 */
class AgencyBranchService {

  /**
   * The separator between group options containing multiple ids.
   */
  const GROUP_BRANCH_ID_SEPARATOR = ',';

  /**
   * The translation manager to use.
   *
   * @var TranslationInterface
   */
  protected $translate;

  /**
   * The agency store to use.
   *
   * @var KeyValueStoreInterface
   */
  protected $agencyStore;

  /**
   * The branch store to use.
   *
   * @var KeyValueStoreInterface
   */
  protected $branchStore;

  /**
   * AgencyBranchService constructor.
   *
   * @param TranslationInterface $translate
   *   Translate strings.
   * @param KeyValueStoreInterface $agency_store
   *   The agency store to use.
   * @param KeyValueStoreInterface $branch_store
   *   The branch store to use.
   */
  public function __construct(
    TranslationInterface $translate,
    KeyValueStoreInterface $agency_store,
    KeyValueStoreInterface $branch_store) {
    $this->translate = $translate;
    $this->agencyStore = $agency_store;
    $this->branchStore = $branch_store;
  }

  /**
   * Get map of agency/branch ids to names for #options on select elements.
   *
   * The data will contain option groups for each agency with corresponding
   * options for each branch within each group.
   *
   * @return array
   *   An array of agency/branch ids and names.
   */
  public function getOptions() {
    $options = [];

    /* @var \Drupal\dbcdk_openagency\Client\Agency $agency */
    foreach ($this->agencyStore->getAll() as $agency) {
      $branches = [];
      foreach ($agency->pickupAgency as $branch) {
        $branches[$branch->branchId] = $branch->branchName;
      }

      if (!empty($branches)) {
        $options[$agency->agencyName] = $branches;
      }
    }

    return $options;
  }

  /**
   * Get map of agency/branch ids to names for #options on select elements.
   *
   * The data will contain option groups for each agency with corresponding
   * options for each branch within each group and an option for all branches
   * inside a group. Option groups are not selectable by themselves.
   *
   * @return array
   *   An array of agency/branch ids and names.
   */
  public function getOptionsWithGroupOption() {
    $options = $this->getOptions();
    foreach ($options as $group_title => &$option_group) {
      if (count($option_group) > 1) {
        $group_ids = implode(self::GROUP_BRANCH_ID_SEPARATOR, array_keys($option_group));
        $group_text = $this->translate->translate(
          'All %agency branches', ['%agency' => $group_title]
        );
        $option_group = [$group_ids => $group_text] + $option_group;
      }
    }
    return $options;
  }

  /**
   * Get a branch.
   *
   * @param int $id
   *   The id of the branch to retrieve.
   *
   * @return \Drupal\dbcdk_openagency\Client\Branch
   *   The corresponding branch.
   */
  public function getBranch($id) {
    return $this->branchStore->get($id);
  }

  /**
   * Get all branches.
   *
   * @return \Drupal\dbcdk_openagency\Client\Branch[]
   *   All branches.
   */
  public function allBranches() {
    return $this->branchStore->getAll();
  }

}
