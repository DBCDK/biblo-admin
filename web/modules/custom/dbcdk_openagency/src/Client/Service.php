<?php

namespace Drupal\dbcdk_openagency\Client;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;
use Sabre\Xml\Reader;
use Sabre\Xml\Service as XmlService;

/**
 * OpenAgency service.
 *
 * Use this class to perform calls against the service.
 *
 * @see https://opensource.dbc.dk/services/open-agency
 */
class Service {

  /**
   * The HTTP client used to perform the actual request.
   *
   * @var \GuzzleHttp\ClientInterface
   */
  protected $httpClient;

  /**
   * The base url of the service to call.
   *
   * This will usually be in the form http://openagency.addi.dk/[version]/
   *
   * @var string
   */
  protected $baseUrl;

  /**
   * Service constructor.
   *
   * @param \GuzzleHttp\ClientInterface $client
   *   The client to use to perform requests.
   * @param string $base_url
   *   The base url for the service to call. This will usually be in the form
   *   http://openagency.addi.dk/[version]/.
   */
  public function __construct(ClientInterface $client, $base_url) {
    $this->httpClient = $client;
    $this->baseUrl = $base_url;
  }

  /**
   * Get a list of agencies grouped by the libraries they belong to.
   *
   * @return \Drupal\dbcdk_openagency\Client\Agency[]
   *   The libraries matching the request.
   */
  public function pickupAgencyList() {
    $query = http_build_query([
      'action' => 'pickupAgencyList',
      'libraryType' => 'Folkebibliotek',
      'outputType' => 'xml',
    ]);
    $request = new Request('GET', $this->baseUrl . '?' . $query);
    $response = $this->httpClient->send($request);

    // If we get a not-OK error code then throw an exception.
    if ($response->getStatusCode() != 200) {
      throw new \UnexpectedValueException(sprintf('(%s) %s when trying to access %s',
        $response->getStatusCode(),
        $response->getReasonPhrase(),
        $request->getUri()
      ));
    }

    // Setup mapping from XML elements to value objects.
    $service = new XmlService();
    $service->mapValueObject('{http://oss.dbc.dk/ns/openagency}pickupAgencyListResponse', PickupAgencyListResponse::class);
    $service->mapValueObject('{http://oss.dbc.dk/ns/openagency}library', Agency::class);
    // Use a custom mapping callback to support custom handling of properties.
    $service->elementMap['{http://oss.dbc.dk/ns/openagency}pickupAgency'] = function(Reader $reader) {
      $branch = new Branch();
      $elements = $reader->parseInnerTree();
      if (is_array($elements)) {
        foreach ($elements as $element) {
          switch ($element['name']) {
            case '{http://oss.dbc.dk/ns/openagency}branchId':
              $branch->branchId = $element['value'];
              break;

            case '{http://oss.dbc.dk/ns/openagency}branchName':
              // We only want the Danish branch name.
              if (isset($element['attributes']['{http://oss.dbc.dk/ns/openagency}language']) &&
                $element['attributes']['{http://oss.dbc.dk/ns/openagency}language'] == 'dan'
              ) {
                $branch->branchName = $element['value'];
              }
              break;

            default:
              // Unknown element. Do nothing.
          }
        }
      }
      return $branch;
    };

    /* @var PickupAgencyListResponse $result */
    $result = $service->parse($response->getBody()->getContents());

    // The HTTP layer may not have signaled an error but the content may contain
    // one just as well. If so throw an exception.
    if (!empty($result->error)) {
      throw new \RuntimeException(sprintf('%s when calling %s', $result->error, $request->getUri()));
    }

    return $result->library;
  }

}
