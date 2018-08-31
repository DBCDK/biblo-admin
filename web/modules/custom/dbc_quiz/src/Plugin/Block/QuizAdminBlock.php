<?php

namespace Drupal\dbcdk_quiz\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'CampaignListBlock' block.
 *
 * @Block(
 *  id = "dbcdk_quiz_admin_block",
 *  admin_label = @Translation("Quiz Admin"),
 * )
 */
class QuizAdminBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#markup' => '<div id="quiz-admin">Dette er en placeholder til biblo quiz admin</div>',
    ];
  }

}
