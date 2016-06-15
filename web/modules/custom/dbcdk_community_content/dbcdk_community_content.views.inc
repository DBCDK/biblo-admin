<?php

/**
 * @file
 * Contains dbcdk_community_content\dbcdk_community_content.views.inc.
 */

/**
 * Implements hook_views_data().
 */
function dbcdk_community_content_views_data() {
  $data = [];
  $data['node']['community_site_link'] = [
    'title' => t('Community site link'),
    'help' => t('Link to content on the community site'),
    'field' => [
      'id' => 'community_site_link',
    ],
  ];
  return $data;
}
