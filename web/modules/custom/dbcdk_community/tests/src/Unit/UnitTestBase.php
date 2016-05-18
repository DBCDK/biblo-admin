<?php

namespace Drupal\Tests\dbcdk_community\Unit;

use Drupal\Core\Link;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Tests\UnitTestCase;
use phpmock\phpunit\PHPMock;

/**
 * Base class for tests dealing with community service blocks.
 */
class UnitTestBase extends UnitTestCase {
  use PHPMock;

  /* @var \PHPUnit_Framework_MockObject_MockObject */
  protected $urlGenerator;

  /* @var \PHPUnit_Framework_MockObject_MockObject */
  protected $logger;

  /* @var \PHPUnit_Framework_MockObject_MockObject */
  protected $profileApi;

  /* @var \PHPUnit_Framework_MockObject_MockObject */
  protected $reviewApi;

  /* @var \PHPUnit_Framework_MockObject_MockObject */
  protected $profileRepository;

  /* @var \PHPUnit_Framework_MockObject_MockObject */
  protected $quarantineApi;

  /* @var \PHPUnit_Framework_MockObject_MockObject */
  protected $translation;

  /* @var \PHPUnit_Framework_MockObject_MockObject */
  protected $dateFormatter;

  /* @var \PHPUnit_Framework_MockObject_MockObject */
  protected $flaggableContentRepository;

  /* @var \PHPUnit_Framework_MockObject_MockObject */
  protected $formBuilder;

  /* @var \PHPUnit_Framework_MockObject_MockObject */
  protected $agencyBranchService;

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    $this->logger = $this->getMock('\Psr\Log\LoggerInterface');

    $this->flaggableContentRepository = $this->getMockBuilder(
      '\Drupal\dbcdk_community_moderation\Content\FlaggableContentRepository'
    )->disableOriginalConstructor()->getMock();

    $this->profileApi = $this->getMock(
      '\DBCDK\CommunityServices\Api\ProfileApi'
    );

    $this->reviewApi = $this->getMock(
      '\DBCDK\CommunityServices\Api\ReviewApi'
    );

    $this->profileRepository = $this->getMockBuilder(
      '\Drupal\dbcdk_community_moderation\Profile\ProfileRepository'
    )->disableOriginalConstructor()->getMock();

    $this->quarantineApi = $this->getMock(
      '\DBCDK\CommunityServices\Api\QuarantineApi'
    );

    $this->urlGenerator = $this->getMock(
      '\Drupal\dbcdk_community\Url\UrlGeneratorInterface'
    );

    $this->translation = $this->getMock(
      '\Drupal\Core\StringTranslation\TranslationInterface'
    );
    // Make the translation stubs return the source string.
    $this->translation->method('translate')->willReturnArgument(0);
    $this->translation->method('translateString')->willReturnCallback(
      function (TranslatableMarkup $markup) {
        return $markup->getUntranslatedString();
      }
    );

    $this->dateFormatter = $this->getMockBuilder(
      'Drupal\Core\Datetime\DateFormatter'
    )->disableOriginalConstructor()->getMock();

    $this->formBuilder = $this->getMockBuilder(
      'Drupal\Core\Form\FormBuilder'
    )->disableOriginalConstructor()->getMock();

    $this->agencyBranchService = $this->getMockBuilder(
      '\Drupal\dbcdk_openagency\Service\AgencyBranchService'
    )->disableOriginalConstructor()->getMock();
  }

  /**
   * Assert that an entry in a details table has the expected value.
   *
   * Rows in a details table have two columns:
   * - Name/label
   * - Value.
   *
   * @param mixed $expected
   *   The expected value for the row.
   * @param array $table
   *   The details table.
   * @param string|int $row_id
   *   The id of the row to check.
   * @param string|NULL $message
   *   The message to display if the assertion fails.
   */
  protected function assertDetailsRowEquals($expected, array $table, $row_id, $message = NULL) {
    $this->assertEquals($expected, $table['#rows'][$row_id][1], $message);
  }

  /**
   * Assert that an entry in a details table is not empty.
   *
   * @param array $table
   *   The details table.
   * @param string|int $row_id
   *   The id of the row to check.
   * @param string|null $message
   *   The message to display if the assertion fails.
   */
  protected function assertDetailsRowNotEmpty(array $table, $row_id, $message = NULL) {
    $this->assertNotEmpty($table['#rows'][$row_id][1], $message);
  }

  /**
   * Assert that an entry in a details table is a link to a specific url.
   *
   * @param string $expected_url
   *   The url the row should link to.
   * @param array $table
   *   The details table.
   * @param string|int $row_id
   *   The id of the row to check.
   * @param string|null $message
   *   The message to display if the assertion fails.
   */
  protected function assertDetailsRowLinkUrl($expected_url, array $table, $row_id, $message = NULL) {
    $this->assertInstanceOf('\Drupal\Core\Link', $table['#rows'][$row_id][1]);
    /* @var \Drupal\Core\Link $actual_link */
    $actual_link = $table['#rows'][$row_id][1];
    $this->assertLinkUrl($expected_url, $actual_link, $message);
  }

  /**
   * Assert that an entry in a details table is a link with a specific text.
   *
   * @param string $expected
   *   The expected text for the link.
   * @param array $table
   *   The details table.
   * @param string|int $row_id
   *   The id of the row to check.
   * @param string|null $message
   *   The message to display if the assertion fails.
   */
  protected function assertDetailsRowLinkText($expected, array $table, $row_id, $message = NULL) {
    $this->assertLinkText($expected, $table['#rows'][$row_id][1], $message);
  }

  /**
   * Assert that a details table contains no details.
   *
   * @param array $table
   *   The details table.
   * @param string|null $message
   *   The message to display if the assertion fails.
   */
  protected function assertNoDetails(array $table, $message = NULL) {
    $this->assertEmpty($table['#rows'], $message);
  }

  /**
   * Assert that an entry is a link with a specific text.
   *
   * @param string $expected_text
   *   The expected text for the link.
   * @param \Drupal\Core\Link $link
   *   The link to compare text with.
   * @param string|null $message
   *   The message to display if the assertion fails.
   */
  protected function assertLinkText($expected_text, Link $link, $message = NULL) {
    $this->assertEquals($link->getText(), $expected_text, $message);
  }

  /**
   * Assert that a link points to a specific url.
   *
   * @param string $expected_url
   *   The expected url for the link.
   * @param Link $link
   *   The actual link.
   * @param string $message
   *   The message to display if the assertion fails.
   */
  protected function assertLinkUrl($expected_url, Link $link, $message = NULL) {
    $this->assertEquals($expected_url, $link->getUrl()->getUri(), $message);
  }

}
