<?php

namespace Drupal\dbcdk_community_content\Plugin\views\field;

use Drupal\Core\Access\AccessManagerInterface;
use Drupal\Core\Config\Config;
use Drupal\Core\Url;
use Drupal\views\Plugin\views\field\EntityLink;
use Drupal\views\ResultRow;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * A handler to provide a field that is completely custom by the administrator.
 *
 * @ingroup views_field_handlers
 *
 * @ViewsField("community_site_link")
 */
class CommunitySiteLink extends EntityLink {

  protected $config;

  /**
   * Constructs a LinkBase object.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Access\AccessManagerInterface $access_manager
   *   The access manager.
   */
  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    AccessManagerInterface $access_manager,
    Config $config
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition, $access_manager);
    $this->config = $config;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    $config = $container->get('config.factory')->get('dbcdk_community.settings');
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('access_manager'),
      $config
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function getDefaultLabel() {
    return $this->t('view on community site');
  }

  /**
   * {@inheritdoc}
   */
  protected function renderLink(ResultRow $row) {
    $text = parent::renderLink($row);

    $entity = $this->getEntity($row);
    $content_url = $entity->urlInfo($this->getEntityLinkTemplate())->toString();
    $community_site_url = $this->config->get('community_site_url');
    $this->options['alter']['url'] = Url::fromUri($community_site_url . $content_url);

    return $text;
  }

}
