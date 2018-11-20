<?php

namespace Drupal\dbcdk_quiz\Client;

use GuzzleHttp\Client;

/**
 * Openplatform serviceclient.
 *
 * Use this class to perform calls against the service.
 *
 * @see https://opensource.dbc.dk/services/open-agency
 */
class QuizClient
{

    /**
     * The HTTP client used to perform the actual request.
     *
     * @var \GuzzleHttp\Client
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
     * @param string $base_url
     *   The base url for the service to call.
     */
    public function __construct($base_url)
    {
        $this->httpClient = new Client();
        $this->baseUrl = $base_url;
    }

    /**
     * Get a list of agencies grouped by the libraries they belong to.
     *
     * @return \Drupal\dbcdk_openagency\Client\Agency[]
     *   The libraries matching the request.
     */
    public function getAllQuizEntries()
    {
        try {
            $response = $this->httpClient->get($this->baseUrl . 'QuizResults');
            return json_decode($response->getBody()->getContents());
        } catch (\Throwable $e) {
            return null;
        } catch (\Exception $e) {
            return null;
        }
    }
}
