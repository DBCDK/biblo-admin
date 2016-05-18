<?php

namespace Drupal\dbcdk_community_content\FieldNormalizer;

use Drupal\Core\Field\FieldItemBase;

/**
 * Normalize the output for a VideoEmbedField field.
 */
class VideoEmbedFieldFieldNormalizer implements FieldNormalizerInterface {

  /**
   * {@inheritdoc}
   */
  public function normalize(FieldItemBase $field) {
    /* @var \Drupal\video_embed_field\ProviderManager $provider_manager */
    $provider_manager = \Drupal::service('video_embed_field.provider_manager');
    /* @var \Drupal\video_embed_field\ProviderPluginBase $provider */
    $provider = $provider_manager->loadProviderFromInput($field->getString());
    return [
      'type' => (new \ReflectionClass($provider))->getShortName(),
      // It's not possible to strictly fetch the processed embed url, so we have
      // to call the "renderEmbedCode" method to get a render array and then
      // cherry pick the ['#url'] property.
      'url' => $provider->renderEmbedCode(0, 0, FALSE)['#url'],
    ];
  }

}
