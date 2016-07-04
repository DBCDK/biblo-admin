<?php

namespace Drupal\dbcdk_community_content\Normalizer;

use Drupal\serialization\Normalizer\ContentEntityNormalizer as SerializationContentEntityNormalizer;

/**
 * Normalizes/denormalizes Drupal content entities into an array structure.
 *
 * We override the default "ContentEntityNormalizer" to clean up the returned
 * json object from unnecessary fields and remove all of the array nesting for
 * single value fields.
 */
class ContentEntityNormalizer extends SerializationContentEntityNormalizer {

  /**
   * {@inheritdoc}
   */
  public function normalize($object, $format = NULL, array $context = []) {
    $context += [
      'account' => NULL,
    ];

    $attributes = [];
    foreach ($object as $name => $field) {
      $blacklist = [
        // Ignore unnecessary fields to be normalized.
        'uuid',
        'vid',
        'uid',
        'langcode',
        'promote',
        'sticky',
        'publish_on',
        'unpublish_on',
        'revision_timestamp',
        'revision_uid',
        'revision_log',
        'revision_translation_affected',
        'default_langcode',
        'path',
        'field_slug',
        'field_sub_path',
      ];
      $singular_fields = [
        // These fields should always be normalized to a single value.
        'nid',
        'type',
        'title',
        'status',
        'created',
        'changed',
        'field_article_type',
        'field_author',
      ];
      if (!in_array($name, $blacklist)) {
        if ($field->access('view', $context['account'])) {
          $data = $this->serializer->normalize($field, $format, $context);
          if (in_array($name, $singular_fields)) {
            $attributes[$name] = current($data);
          }
          else {
            $attributes[$name] = $data;
          }
        }
      }
    }

    return $attributes;
  }

}
