<?php


namespace Drupal\dbcdk_openagency\tests\Unit\Form;


use Drupal\Core\Config\Config;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\KeyValueStore\KeyValueStoreInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\StringTranslation\TranslationInterface;
use Drupal\Core\Utility\LinkGeneratorInterface;
use Drupal\dbcdk_openagency\Client\Agency;
use Drupal\dbcdk_openagency\Client\Branch;
use Drupal\dbcdk_openagency\Client\Service;
use Drupal\dbcdk_openagency\Form\AdminForm;
use phpmock\phpunit\PHPMock;
use Psr\Log\LoggerInterface;

/**
 * Unit test for AdminForm.
 */
class AdminFormTest extends \PHPUnit_Framework_TestCase {
  use PHPMock;

  /* @var \PHPUnit_Framework_MockObject_MockObject */
  protected $agencyStore;

  /* @var \PHPUnit_Framework_MockObject_MockObject */
  protected $branchStore;

  /* @var \PHPUnit_Framework_MockObject_MockObject */
  protected $service;

  /* @var \PHPUnit_Framework_MockObject_MockObject */
  protected $translation;

  /* @var \PHPUnit_Framework_MockObject_MockObject */
  protected $configFactory;

  /* @var \PHPUnit_Framework_MockObject_MockObject */
  protected $logger;

  /* @var \PHPUnit_Framework_MockObject_MockObject */
  protected $linkGenerator;

  /* @var \PHPUnit_Framework_MockObject_MockObject */
  protected $formState;

  /* @var \PHPUnit_Framework_MockObject_MockObject */
  protected $message;

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    $this->agencyStore = $this->getMock(KeyValueStoreInterface::class);

    $this->branchStore = $this->getMock(KeyValueStoreInterface::class);

    $this->service = $this->getMockBuilder(Service::class)
      ->disableOriginalConstructor()
      ->getMock();

    $this->translation = $this->getMock(TranslationInterface::class);
    // Make the translation stubs return the source string.
    $this->translation->method('translate')->willReturnArgument(0);
    $this->translation->method('translateString')->willReturnCallback(
      function (TranslatableMarkup $markup) {
        return $markup->getUntranslatedString();
      }
    );

    $config = $this->getMockBuilder(Config::class)
      ->disableOriginalConstructor()
      ->getMock();
    $config->method('get')->willReturn('http://some-url');
    $this->configFactory = $this->getMock(ConfigFactoryInterface::class);
    $this->configFactory->method('getEditable')->willReturn($config);

    $this->logger = $this->getMock(LoggerInterface::class);

    $this->formState = $this->getMock(FormStateInterface::class);

    $this->linkGenerator = $this->getMock(LinkGeneratorInterface::class);

    $this->message = $this->getFunctionMock('\Drupal\dbcdk_openagency\Form', 'drupal_set_message');
  }

  /**
   * Return an form wired up with mocks ready for testing.
   *
   * @return AdminForm
   *   A form to be tested.
   */
  protected function getForm() {
    $form = new AdminForm(
      $this->configFactory,
      $this->logger,
      $this->agencyStore,
      $this->branchStore,
      $this->service
    );
    $form->setStringTranslation($this->translation);
    $form->setLinkGenerator($this->linkGenerator);
    return $form;
  }

  /**
   * Test form construction.
   */
  public function testFormBuild() {
    $form = $this->getForm();
    $form_array = $form->buildForm([], $this->formState);
    // It does not make sense to test the form structure. Just ensure that we
    // get an array back.
    $this->assertInternalType('array', $form_array);
  }

  /**
   * Test data synchronization.
   */
  public function testDataSync() {
    $branch = new Branch();
    $branch->branchId = 1;
    $branch->branchName = 'Branch 1';
    $agency = new Agency();
    $agency->agencyId = 2;
    $agency->agencyName = 'Agency 2';
    $agency->pickupAgency = [$branch];
    $this->service->method('pickupAgencyList')->willReturn([$agency]);

    // When synchronizing all preexisting data should be deleted.
    $this->agencyStore->expects($this->once())->method('deleteAll');
    $this->branchStore->expects($this->once())->method('deleteAll');

    // New data should be added to the stores.
    $this->agencyStore->expects($this->once())->method('set')->with($agency->agencyId, $agency);
    $this->branchStore->expects($this->once())->method('set')->with($branch->branchId, $branch);

    $form = $this->getForm();
    $form->synchronizeData();
  }

  /**
   * Test error handling during data sync.
   */
  public function testDataSyncError() {
    $form = $this->getForm();

    $this->service->method('pickupAgencyList')->willThrowException(new \RuntimeException());
    // When an exception is thrown it should logged and an error message shown
    // to the user.
    $this->message->expects($this->once())->with($this->anything(), 'error');
    $this->logger->expects($this->once())->method('warning');

    $form->synchronizeData();
  }

}
