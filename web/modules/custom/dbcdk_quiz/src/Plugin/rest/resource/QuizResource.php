<?php

namespace Drupal\dbcdk_quiz\Plugin\rest\resource;

use Drupal\dbcdk_quiz\Client\QuizClient;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a resource to handle menu data and structure.
 *
 * @RestResource(
 *   id = "quiz",
 *   label = @Translation("Quiz API"),
 *   uri_paths = {
 *     "canonical" = "/quiz/{id}"
 *   }
 * )
 */
class QuizResource extends ResourceBase
{

    /**
     * Constructs a Drupal\rest\Plugin\ResourceBase object.
     *
     * @param array $configuration
     *   A configuration array containing information about the plugin instance.
     * @param string $plugin_id
     *   The plugin_id for the plugin instance.
     * @param mixed $plugin_definition
     *   The plugin implementation definition.
     */
    public function __construct(
        $container,
        array $configuration,
        $plugin_id,
        $plugin_definition,
        array $serializer_formats,
        LoggerInterface $logger
    ) {
        parent::__construct($configuration, $plugin_id, $plugin_definition, $serializer_formats, $logger);
        $this->path = $container->get('config.factory')->get('dbcdk_community.settings')->get('community_service_url');
        $this->client = new QuizClient($this->path);
    }

    /**
     * {@inheritdoc}
     */
    public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition)
    {
        return new static(
            $container,
            $configuration,
            $plugin_id,
            $plugin_definition,
            $container->getParameter('serializer.formats'),
            $container->get('logger.factory')->get('dbc_quiz')
        );
    }

    /**
     * Responds to GET requests.
     *
     * Returns the menu structure for a specific menu.
     *
     * @param string $id
     *   The id for the menu to retrieve.
     *
     * @return ResourceResponse
     *   The response.
     */
    public function get($id)
    {
        $res = $this->client->getAllQuizEntries($id);
        return new ResourceResponse($res);
    }
}
