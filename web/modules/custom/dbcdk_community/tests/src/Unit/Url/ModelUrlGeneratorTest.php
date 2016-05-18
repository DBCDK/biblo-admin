<?php

namespace Drupal\dbcdk_community\Test\Url;

use Drupal\dbcdk_community\Url\ModelUrlGenerator;

/**
 * Test cases for Drupal|dbcdk_community|Url|ModelUrlGenerator.
 *
 * @group dbcdk_community
 */
class ModelUrlGeneratorTest extends \PHPUnit_Framework_TestCase {

  /**
   * Test url generation for class.
   */
  public function testClassGenerator() {
    $mock_generator = $this->getMock('Drupal\dbcdk_community\Url\UrlGeneratorInterface');
    $mock_generator->expects($this->once())->method('generate');

    $mock_object = $this->getMock('testNamespace\testClass');

    $model_generator = new ModelUrlGenerator();
    $model_generator->registerClassGenerator(get_class($mock_object), $mock_generator);
    $model_generator->generate($mock_object);
  }

  /**
   * Test exception thrown when trying to generate url for unregistered class.
   */
  public function testMissingGenerator() {
    $this->setExpectedException('\InvalidArgumentException');

    $model_generator = new ModelUrlGenerator();
    $model_generator->generate(new \stdClass());
  }

}
