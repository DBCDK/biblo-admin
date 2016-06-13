<?php

namespace Drupal\dbcdk_community_content\tests\Unit\views\field;

use Drupal\Core\Access\AccessManagerInterface;
use Drupal\Core\Access\AccessResultInterface;
use Drupal\Core\Config\Config;
use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Url;
use Drupal\dbcdk_community_content\Plugin\views\field\CommunitySiteLink;
use Drupal\Tests\UnitTestCase;
use Drupal\views\ResultRow;

/**
 * Unit test for CommunitySiteLink.
 *
 * @group dbcdk_community_content
 */
class CommunitySiteLinkTest extends UnitTestCase {

  /**
   * Test that a link with an url to the community site is generated.
   */
  public function testCommunitySiteLink() {
    $community_site_url = 'http://biblo.dk';
    $content_path = '/some-path';

    // Setup mocks.
    $access_manager = $this->getMock(AccessManagerInterface::class);
    $access_result = $this->getMock(AccessResultInterface::class);
    $access_result->method('isAllowed')->willReturn(TRUE);
    $access_manager->method('checkNamedRoute')->willReturn($access_result);

    $config = $this->getMockBuilder(Config::class)
      ->disableOriginalConstructor()
      ->getMock();
    $config->method('get')->willReturnMap([
      ['community_site_url', $community_site_url],
    ]);

    $url = $this->getMockBuilder(Url::class)->disableOriginalConstructor()->getMock();
    $url->method('getRouteParameters')->willReturn([]);
    $url->method('toString')->willReturn($content_path);

    $entity = $this->getMock(EntityInterface::class);
    $entity->method('urlInfo')->willReturn($url);
    $entity->method('getEntityType')->willReturn($this->getMock(EntityTypeInterface::class));

    $row = $this->getMock(ResultRow::class);
    // We fake returning an entity by setting an object property.
    $row->_entity = $entity;

    $container = new ContainerBuilder();
    $container->set('current_user', $this->getMock(AccountInterface::class));
    \Drupal::setContainer($container);

    $field = new CommunitySiteLink(
      [],
      NULL,
      [],
      $access_manager,
      $config
    );
    // Set dummy values on the field for further mocking.
    $field->options['relationship'] = 'none';
    $field->setStringTranslation($this->getStringTranslationStub());

    $result = $field->render($row);
    // The result is actually the text to be displayed in the field.
    $this->assertEquals('view on community site', $result['#markup']->getUntranslatedString());

    // The url is set as an option on the field.
    $this->assertEquals(
      Url::fromUri($community_site_url . $content_path),
      $field->options['alter']['url']
    );
  }

}
