<?php

namespace Drupal\menu_rest_resource\Normalizer;

use Drupal\Core\Routing\UrlGeneratorInterface;
use Drupal\Core\Url;
use Drupal\Core\Utility\UnroutedUrlAssemblerInterface;
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
   * The url generator to use for generating routed urls.
   *
   * @var UrlGeneratorInterface
   */
  protected $urlGenerator;

  /**
   * The url generator to use for generating unrouted urls.
   *
   * @var UnroutedUrlAssemblerInterface
   */
  protected $urlAssembler;

  /**
   * UrlNormalizer constructor.
   *
   * @param UrlGeneratorInterface $url_generator
   *   The url generator to use for generating routed urls.
   * @param UnroutedUrlAssemblerInterface $url_assembler
   *   The url assembler to use for generating unrouted urls.
   */
  public function __construct(UrlGeneratorInterface $url_generator, UnroutedUrlAssemblerInterface $url_assembler) {
    $this->urlGenerator = $url_generator;
    $this->urlAssembler = $url_assembler;
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
    if ($object->isRouted()) {
      // If the url is routed then generate an url from the route.
      $url = Url::fromRoute($object->getRouteName(), $object->getRouteParameters());
    }
    else {
      // For external urls we can just get it directly...
      $url = Url::fromUri($object->getUri());
    }

    $url->setUrlGenerator($this->urlGenerator);
    $url->setUnroutedUrlAssembler($this->urlAssembler);

    $data['uri'] = $url->toString();

    return $data;
  }

}
