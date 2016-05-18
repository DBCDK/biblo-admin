<?php

namespace Drupal\dbcdk_community\Url;

/**
 * Generate an url for an object.
 */
interface UrlGeneratorInterface {

  /**
   * Generate a url for an object.
   *
   * @param object $object
   *   The object to generate an url for.
   *
   * @return string
   *   The url for the object
   */
  public function generate($object);

}
