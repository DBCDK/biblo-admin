<?php

namespace Drupal\dbcdk_quiz\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'QuizEntries block' block.
 *
 * @Block(
 *  id = "dbcdk_quiz_entries_block",
 *  admin_label = @Translation("Quiz Entries"),
 * )
 */
class QuizEntries extends BlockBase
{

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
                'drupalSettings' => ['openPlatformToken' => $token],
            ),
        ];
    }

}
