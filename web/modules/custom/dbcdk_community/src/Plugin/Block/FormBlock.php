<?php
/**
 * @file
 * FormBlock definition.
 */

namespace Drupal\dbcdk_community\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormBuilder;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a block displaying a simple form.
 *
 * @Block(
 *   id = "form_block",
 *   admin_label = @Translation("Form"),
 * )
 */
class FormBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * The form builder to use.
   *
   * @var FormBuilder
   */
  protected $formBuilder;

  /**
   * FormBlock constructor.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Form\FormBuilder $form_builder
   *   The form builder to use.
   */
  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    FormBuilder $form_builder
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->formBuilder = $form_builder;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(
    ContainerInterface $container,
    array $configuration,
    $plugin_id,
    $plugin_definition
  ) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('form_builder')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['form_class'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Form class'),
      '#description' => $this->t('The fully qualified class name of the form to display in the block'),
      '#required' => TRUE,
      '#default_value' => ((empty($this->configuration['form_class'])) ?: $this->configuration['form_class']),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockValidate($form, FormStateInterface $form_state) {
    try {
      $this->formBuilder->getForm($form_state->getValue('form_class'));
    }
    catch (\InvalidArgumentException $e) {
      $form_state->setErrorByName('form_class', $this->t('Unknown form class name'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['form_class'] = $form_state->getValue('form_class');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      'form' => $this->formBuilder->getForm($this->configuration['form_class']),
      '#cache' => [
        'max-age' => 0,
      ],
    ];
  }

}
