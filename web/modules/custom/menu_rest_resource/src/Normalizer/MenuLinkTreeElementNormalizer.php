<?php

namespace Drupal\menu_rest_resource\Normalizer;

use Drupal\Core\Menu\MenuLinkTreeElement;
use Drupal\serialization\Normalizer\NormalizerBase;

/**
 * Normalizer for menu link tree elements.
 *
 * This allows them to be exposed through the REST interface.
 */
class MenuLinkTreeElementNormalizer extends NormalizerBase {

  /**
   * {@inheritdoc}
   */
  protected $supportedInterfaceOrClass = MenuLinkTreeElement::class;

  /**
   * {@inheritdoc}
   */
  public function normalize($object, $format = NULL, array $context = array()) {
    /* @var MenuLinkTreeElement $object */
    return [
      'link' => $this->serializer->normalize($object->link),
      'subtree' => $this->serializer->normalize($object->subtree),
      'depth' => $object->depth,
      'options' => $object->options,
    ];
  }

}
