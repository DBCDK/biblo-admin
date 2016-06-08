<?php

namespace Drupal\Tests\menu_rest_resource\Mock;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Mock class which implements multiple interfaces.
 *
 * This is not supported by PHPUnit.
 */
class SerializerNormalizerStub implements SerializerInterface, NormalizerInterface {

  protected $returnValue;

  /**
   * SerializerNormalizerStub constructor.
   *
   * @param mixed $returnValue
   *   The value to return form any method.
   */
  public function __construct($returnValue) {
    $this->returnValue = $returnValue;
  }

  /**
   * {@inheritdoc}
   */
  public function normalize($object, $format = NULL, array $context = array()) {
    return $this->returnValue;
  }

  /**
   * {@inheritdoc}
   */
  public function supportsNormalization($data, $format = NULL) {
    return TRUE;
  }

  /**
   * {@inheritdoc}
   */
  public function serialize($data, $format, array $context = array()) {
    return $this->returnValue;
  }

  /**
   * {@inheritdoc}
   */
  public function deserialize($data, $type, $format, array $context = array()) {
    return $this->returnValue;
  }

}
