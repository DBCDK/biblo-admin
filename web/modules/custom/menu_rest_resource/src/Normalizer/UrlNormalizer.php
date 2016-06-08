<?php

namespace Drupal\menu_rest_resource\Normalizer;

use Drupal\Core\Routing\UrlGeneratorInterface;
use Drupal\Core\Url;
use Drupal\serialization\Normalizer\NormalizerBase;

/**
 * Normalizer for urls.
 *
 * This allows them to be exposed through the REST interface.
 */
class UrlNormalizer extends NormalizerBase {

  /**
   * {@inheritdoc}
   */
  protected $supportedInterfaceOrClass = Url::class;

  /**
   * The url generator to use for generating internal urls.
   *
   * @var \Drupal\Core\Routing\UrlGeneratorInterface
   */
  protected $urlGenerator;

  /**
   * UrlNormalizer constructor.
   *
   * @param UrlGeneratorInterface $url_generator
   *   The url generator to use for generating internal urls.
   */
  public function __construct(UrlGeneratorInterface $url_generator) {
    $this->urlGenerator = $url_generator;
  }

  /**
   * {@inheritdoc}
   */
  public function normalize($object, $format = NULL, array $context = array()) {
    /* @var Url $object */
    $data = [
      'external' => $object->isExternal(),
    ];

    // Determine the URI for the url.
    if ($object->isExternal()) {
      // For external urls we can just get it directly...
      $uri = $object->getUri();
    }
    else {
      // ... but for internal ones we have to go through the routing system.
      $url = Url::fromRoute($object->getRouteName(), $object->getRouteParameters());
      $url->setUrlGenerator($this->urlGenerator);
      $url->setAbsolute();
      $uri = $url->toString();
    }
    $data['uri'] = $uri;

    return $data;
  }

}
