<?php

namespace Drupal\dbcdk_community\Url;

/**
 * Run different url generators based on the class of an object.
 */
class ModelUrlGenerator implements UrlGeneratorInterface {

  /**
   * A map of fully qualified class names and their registered generators.
   *
   * @var UrlGeneratorInterface[] $generators
   */
  protected $generators = [];

  /**
   * Register a generator to be used for a specific class.
   *
   * @param string $class
   *   Fully qualified class name to use with the generator.
   * @param \Drupal\dbcdk_community\Url\UrlGeneratorInterface $generator
   *   The generator to use.
   */
  public function registerClassGenerator($class, UrlGeneratorInterface $generator) {
    $this->generators[$class] = $generator;

  }

  /**
   * {@inheritdoc}
   */
  public function generate($object) {
    if (empty($this->generators[get_class($object)])) {
      throw new \InvalidArgumentException('No url generator defined for' . get_class($object));
    }
    return $this->generators[get_class($object)]->generate($object);
  }

}
