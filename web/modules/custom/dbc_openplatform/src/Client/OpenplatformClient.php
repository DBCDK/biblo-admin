<?php

namespace Drupal\dbcdk_openplatform\Client;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Client;

/**
 * Openplatform serviceclient.
 *
 * Use this class to perform calls against the service.
 *
 * @see https://opensource.dbc.dk/services/open-agency
 */
class OpenplatformClient {

  /**
   * The HTTP client used to perform the actual request.
   *
   * @var \GuzzleHttp\ClientInterface
   */
  protected $httpClient;

  /**
   * The base url of the service to call.
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
   *   The base url for the service to call. This will usually be
   *   https://auth.dbc.dk/.
   * @param string $client_id
   *   Smaug client ID
   * @param string $client_secret
   *   Smaug client Secret
   */
  public function __construct($base_url, $client_id, $client_secret) {
    $this->httpClient = new Client();
    $this->setConfig($base_url, $client_id, $client_secret);
  }

  /**
   * Set configuration
   *
   * @param string $base_url
   *   The base url for the service to call. This will usually be
   *   https://auth.dbc.dk/.
   * @param string $client_id
   *   Smaug client ID
   * @param string $client_secret
   *   Smaug client Secret
   */
  public function setConfig($base_url, $client_id, $client_secret) {
    $this->baseUrl = $base_url;
    $this->clientId = $client_id;
    $this->clientSecret = $client_secret;
    return $this;
  }

  /**
   * Get a list of agencies grouped by the libraries they belong to.
   *
   * @return \Drupal\dbcdk_openagency\Client\Agency[]
   *   The libraries matching the request.
   */
  public function getToken() {
    try {
    $response = $this->httpClient->post($this->baseUrl . 'oauth/token', [
      "form_params" => [
        'grant_type' => 'password',
        'username' => '@',
        'password' => '@',
      ],
      'auth' => [$this->clientId, $this->clientSecret]
    ]);
    return $tokenResponse = json_decode($response->getBody()->getContents())->access_token;
    } catch(\Throwable $e) {
      return null;
    } catch(\Exception $e) {
      return null;
    }
    
  }
}
