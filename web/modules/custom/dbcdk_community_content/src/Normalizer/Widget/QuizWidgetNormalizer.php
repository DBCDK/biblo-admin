<?php

namespace Drupal\dbcdk_community_content\Normalizer\Widget;

use Drupal\Core\Entity\FieldableEntityInterface;
use Drupal\dbcdk_community_content\FieldNormalizer\TextLongItemFieldNormalizer;

/**
 * Normalizer for texts.
 */
class QuizWidgetNormalizer extends WidgetNormalizer {

  /**
   * {@inheritdoc}
   */
  protected function getSupportedBundle() {
    return 'quiz';
  }

  /**
   * {@inheritdoc}
   */
  protected function getWidgetName() {
    return 'QuizWidget';
  }

  /**
   * {@inheritdoc}
   */
  protected function getWidgetConfig(FieldableEntityInterface $object) {
    $normalizer = new TextLongItemFieldNormalizer();
    return [
      'quizId' => $normalizer->normalize($object->get('field_quiz_id')->first()),
    ];
  }
}
