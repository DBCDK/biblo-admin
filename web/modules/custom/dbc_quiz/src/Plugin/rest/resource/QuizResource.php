<?php

namespace Drupal\dbcdk_quiz\Plugin\rest\resource;

use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;

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
    public function get($id = null)
    {

        return new ResourceResponse('hep');
    }
}
