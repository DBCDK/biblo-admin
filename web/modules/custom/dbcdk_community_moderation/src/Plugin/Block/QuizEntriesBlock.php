<?php

namespace Drupal\dbcdk_community_moderation\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormBuilder;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a block displaying a simple form.
 *
 * @Block(
 *   id = "quiz_entries_block",
 *   admin_label = @Translation("Quiz entries block"),
 * )
 */
class QuizEntriesBlock extends BlockBase implements ContainerFactoryPluginInterface
{

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
    public function build()
    {
        return [
            'form' => $this->formBuilder->getForm('Drupal\dbcdk_community_moderation\Form\QuizListForm'),
            '#cache' => [
                'max-age' => 0,
            ],
        ];
    }

}
