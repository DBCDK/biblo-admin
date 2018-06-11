<?php

namespace Drupal\menu_rest_resource\Normalizer;

use Drupal\Core\Menu\MenuLinkInterface;
use Drupal\serialization\Normalizer\NormalizerBase;

/**
 * Normalizer for MenuLinks.
 *
 * This will allow all types of menu links to be exposed through the REST
 * interface.
 */
class MenuLinkNormalizer extends NormalizerBase {

  /**
   * {@inheritdoc}
   */
  public function supportsNormalization($data, $format = NULL) {
    if (!is_object($data) || !$this->checkFormat($format)) {
      return FALSE;
    }

    // This normalizer handles all implementations of the menu link interface.
    // This provides uniform normalization across all subclasses.
    return is_a($data, MenuLinkInterface::class);
  }

  /**
   * {@inheritdoc}
   */
  public function normalize($object, $format = NULL, array $context = array()) {
    /* @var MenuLinkInterface $object */
    $url = $object->getUrlObject(FALSE);
    $data = [
      'url' => $this->serializer->normalize($url, $format, $context),
      'title' => $object->getTitle(),
      'description' => $object->getDescription(),
      'enabled' => $object->isEnabled(),
      'weight' => $object->getWeight(),
      'options' => $object->getOptions(),
      'meta_data' => $object->getMetaData(),
      'provider' => $object->getProvider(),
    ];

    return $data;
  }

}
