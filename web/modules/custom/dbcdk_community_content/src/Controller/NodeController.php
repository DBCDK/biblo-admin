<?php

namespace Drupal\dbcdk_community_content\Controller;

use Drupal\Core\Config\Config;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Routing\TrustedRedirectResponse;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Returns responses for Node routes.
 *
 * This NodeController is only used for the "node/{nid}" route and is called in
 * this modules routing.yml file.
 */
class NodeController implements ContainerInjectionInterface {

  /**
   * The community settings object.
   *
   * @var \Drupal\Core\Config\Config
   */
  protected $communitySettings;

  /**
   * THe current request object.
   *
   * @var \Symfony\Component\HttpFoundation\Request
   */
  protected $currentRequest;

  /**
   * NodeController constructor.
   *
   * @param \Drupal\Core\Config\Config $community_settings
   *   The community settings object.
   * @param \Symfony\Component\HttpFoundation\RequestStack $request_stack
   *   The request stack.
   */
  public function __construct(Config $community_settings, RequestStack $request_stack) {
    $this->communitySettings = $community_settings;
    $this->currentRequest = $request_stack->getCurrentRequest();
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory')->get('dbcdk_community.settings'),
      $container->get('request_stack')
    );
  }

  /**
   * Redirect node views to the community site.
   *
   * Redirect all node/{nid} paths to the community site so administrators can
   * be presented to their creations.
   *
   * @return \Drupal\Core\Routing\TrustedRedirectResponse
   *   A trusted redirect object forwarding to the community site.
   */
  public function communityRedirect() {
    return new TrustedRedirectResponse($this->communitySettings->get('community_site_url') . $this->currentRequest->getRequestUri());
  }

}
