<?php

namespace Drupal\dbcdk_community_reference_field\Controller;

use DBCDK\CommunityServices\Api\CampaignApi;
use DBCDK\CommunityServices\Model\Campaign;
use Drupal\Core\Controller\ControllerBase;
use Drupal\dbcdk_community_reference_field\Plugin\Field\Mapper\IdValueMapperInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Controller for handling Community Service autocomplete lookups.
 *
 * @package Drupal\dbcdk_community_reference_field\Controller
 */
class CampaignAutocompleteController extends ControllerBase {

  /**
   * The API to retrieve data from.
   *
   * @var CampaignApi
   */
  protected $campaignApi;

  /**
   * The mapper to use when representing groups as values.
   *
   * @var IdValueMapperInterface
   */
  protected $idValueMapper;

  /**
   * {@inheritdoc}
   */
  public function __construct(
    CampaignApi $campaign_api,
    IdValueMapperInterface $id_value_mapper) {
    $this->campaignApi = $campaign_api;
    $this->idValueMapper = $id_value_mapper;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('dbcdk_community.api.campaign'),
      $container->get('dbcdk_community_reference_field.id_value_mapper.campaign')
    );
  }

  /**
   * Autocomplete.
   *
   * @return JsonResponse
   *   The autocomplete response
   */
  public function autocomplete(Request $request) {
    $campaigns = [];

    // Get groups matching query.
    $query = $request->get('q');
    if (!empty($query)) {
      $filter = [
        'where' => [
          'campaignName' => [
            // Use case-insensitive lookahead using regular expressions.
            // Strongloop does not support case-insensitive LIKE filtering.
            'regexp' => sprintf('/^%s/i', $query),
          ],
        ],
        'limit' => 100,
      ];
      $campaigns = (array) $this->campaignApi->campaignFind(json_encode($filter));
    }

    // Create autocomplete suggestions from groups. Each suggestion will include
    // both name and id of the group. In the end it is the ids that we store
    // but name is probably more useful to users.
    $campaigns = array_reduce($campaigns, function ($campaigns, Campaign $campaign) {
      try {
        $campaigns[] = $this->idValueMapper->toValue($campaign->getId());
      }
      catch (\Exception $e) {
        // Do nothing. If we cannot format a group then skip it.
        watchdog_exception('dbcdk_community_reference_field', $e);
      }
      return $campaigns;
    }, []);

    return new JsonResponse($campaigns);
  }

}
