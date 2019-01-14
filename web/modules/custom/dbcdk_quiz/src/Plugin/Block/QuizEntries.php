<?php

namespace Drupal\dbcdk_quiz\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\dbcdk_openagency\Service\AgencyBranchService;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'QuizEntries block' block.
 *
 * @Block(
 *  id = "dbcdk_quiz_entries_block",
 *  admin_label = @Translation("Quiz Entries"),
 * )
 */
class QuizEntries extends BlockBase implements ContainerFactoryPluginInterface
{

    /**
     * FormBlock constructor.
     *
     * @param array $configuration
     *   A configuration array containing information about the plugin instance.
     * @param string $plugin_id
     *   The plugin_id for the plugin instance.
     * @param mixed $plugin_definition
     *   The plugin implementation definition.
     * @param Drupal\dbcdk_openagency\Service\AgencyBranchService $agency_branch
     *   The form builder to use.
     */
    public function __construct(
        array $configuration,
        $plugin_id,
        $plugin_definition,
        AgencyBranchService $agency_branch
    ) {
        parent::__construct($configuration, $plugin_id, $plugin_definition);
        $this->agencyBranch = $agency_branch;
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
            $container->get('dbcdk_openagency.agency_branch')

        );
    }
    /**
     * {@inheritdoc}
     */
    public function build()
    {
        $token = \Drupal::service('config.factory')->get('dbcdk_openplatform.settings')->get('smaug_token');
        return [
            '#markup' => '<div id="quiz-entries">Dette er en placeholder til biblo quiz entries</div>',
            '#attached' => array(
                'library' => array('dbcdk_quiz/dbcdk_quiz_entries'),
                'drupalSettings' => [
                    'openPlatformToken' => $token,
                    'branches' => $this->agencyBranch->getOptions(true),
                ],
            ),
        ];
    }

}
