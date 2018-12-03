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
    public function getAllQuizEntries($id)
    {
        $limit = isset($_GET["limit"]) ? $_GET["limit"] : 100;
        $offset = isset($_GET["offset"]) ? $_GET["offset"] : 0;
        try {
            $filter = (object) [
                "include" => (object) [
                    "relation" => 'profiles',
                    "scope" => (object) [
                        "fields" => (object) [
                            "username" => true,
                            "displayName" => true,
                        ],
                    ],
                ],
                "limit" => $limit,
                "offset" => $offset,
                "where" => (object) ["quizId" => $id],
            ];
            $path = $this->baseUrl . '/QuizResults?filter=' . json_encode($filter);
            $response = $this->httpClient->get($path);
            return json_decode($response->getBody()->getContents(), true);
        } catch (\Throwable $e) {
            return 'null';
        } catch (\Exception $e) {
            return 'null expection';
        }
    }
    /**
     * Count number of entries on a list.
     *
     * @return \Drupal\dbcdk_openagency\Client\Agency[]
     *   The libraries matching the request.
     */
    public function count($id)
    {
        try {
            $path = $this->baseUrl . '/QuizResults/count?where={"quizId": "' . $id . '"}';
            $response = $this->httpClient->get($path);

            return json_decode($response->getBody()->getContents(), true);
        } catch (\Throwable $e) {
            return 'null';
        } catch (\Exception $e) {
            return 'null expection';
        }
    }
}
