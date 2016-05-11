<?php
/**
 * @file
 * Test case for FormBlock.
 */

namespace Drupal\Tests\dbcdk_community\Unit\Plugin\Block;

use Drupal\Core\Form\FormState;
use Drupal\dbcdk_community\Plugin\Block\FormBlock;
use Drupal\Tests\dbcdk_community\Unit\UnitTestBase;

/**
 * Test case for FormBlock.
 *
 * @group dbcdk_community
 */
class FormBlockTest extends UnitTestBase {

  /**
   * Test configuration form.
   */
  public function testConfigurationForm() {
    $form_state = new FormState();
    $form_class = 'SomeClass';

    $block = $this->newFormBlock();
    $block->setConfiguration(['form_class' => $form_class]);
    $form = $block->blockForm([], $form_state);

    // When the block is configured with a class it should be the default value.
    $this->assertEquals($form_class, $form['form_class']['#default_value']);
  }

  /**
   * Test handling of invalid forms during configuration.
   */
  public function testInvalidConfiguration() {
    $this->formBuilder->method('getForm')->willThrowException(new \InvalidArgumentException());

    $form_state = new FormState();
    $form_class = 'SomeClass';

    $block = $this->newFormBlock();
    $block->setConfiguration(['form_class' => $form_class]);
    $block->blockValidate([], $form_state);

    // If an invalid form is provided then the form state should contain errors.
    $this->assertTrue($form_state->hasAnyErrors());
  }

  /**
   * Test form building.
   */
  public function testFormBuild() {
    $form_class = 'SomeClass';

    // When building the block the form builder should be called with the
    // configured form class name.
    $this->formBuilder->expects($this->once())->method('getForm')->with($form_class);

    $block = $this->newFormBlock();
    $block->setConfiguration(['form_class' => $form_class]);
    $block->build();
  }

  /**
   * Get a new FormBlock for testing.
   *
   * @return \Drupal\dbcdk_community\Plugin\Block\FormBlock
   *   A default block to use for testing.
   */
  protected function newFormBlock() {
    $block = new FormBlock([], NULL, NULL, $this->formBuilder);
    $block->setStringTranslation($this->translation);
    return $block;
  }

}
