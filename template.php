<?php

/**
 * @file
 * Contains preprocess and override functions for the theme.
 */

/**
 * Implements hook_html_head_alter().
 * Overwrite the default character encoding <meta> tag to the shorter HTML5 type
 */ 
function tee_html_head_alter(&$head_elements) {
  $head_elements['system_meta_content_type']['#attributes'] = array(
    'charset' => 'utf-8',
  );
}
