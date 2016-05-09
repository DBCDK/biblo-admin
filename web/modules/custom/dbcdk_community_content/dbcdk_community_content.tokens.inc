<?php
/**
 * @file
 * Builds placeholder replacement tokens for DBCDK Communtiy Content.
 */

use Drupal\Core\Render\BubbleableMetadata;

/**
 * Implements hook_token_info_alter().
 *
 * Add a sub-path token to nodes.
 */
function dbcdk_community_content_token_info_alter(array &$data) {
  $data['tokens']['node']['sub-path'] = array(
    'name' => t('Sub Path'),
    'description' => t('The sub path of the article URL.'),
  );
}

/**
 * Implements hook_tokens().
 *
 * Give the node:sub-path token the aliased path for the taxonomy term it is
 * referencing. - We need this because there is, current, no support for
 * referenced entities "sub values".
 */
function dbcdk_community_content_tokens($type, array $tokens, array $data, array $options, BubbleableMetadata $bubbleable_metadata) {
  $replacements = array();
  if (isset($data['entity']) && $data['entity']->getEntityTypeId() === 'node' && !empty($data['entity']->getFieldDefinition('field_sub_path'))) {
    /* @var \Drupal\node\Entity\Node $node */
    $node = $data['entity'];
    /* @var Drupal\taxonomy\Entity\Term $term */
    if ($term = current($node->get('field_sub_path')->referencedEntities())) {
      /** @var \Drupal\Core\Path\AliasManager $alias_manager */
      $alias_manager = \Drupal::service('path.alias_manager');
      $replacements['[node:sub-path]'] = $alias_manager->getAliasByPath('/taxonomy/term/' . $term->id());
    }
    else {
      $replacements['[node:sub-path]'] = '';
    }
  }

  return $replacements;
}
