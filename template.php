<?php

/**
 * @file
 * Contains functions of theme logic for the tee theme.
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

/**
 * Implements theme_html_tag().
 *
 * Returns HTML for a generic HTML tag with attributes. It is changed to remove
 * the uneccessary HTML code from the output not reqired by HTML5.
 */ 
function tee_html_tag($variables) {
  $element = $variables['element'];
  // Remove type="..." attribute from <style> tags
  if($element['#tag'] === 'style') {
    unset($element['#attributes']['type']);
  }
  // Remove type="..." attribute and CDATA pre/suffixes from <script> tags
  if($element['#tag'] === 'script') {
    unset($element['#attributes']['type'], $element['#value_prefix'], $element['#value_suffix']);
  }
  // Remove type="text/css" from the <link> tags
  if($element['#tag'] === 'link' && $element['#attributes']['type'] === 'text/css') {
    unset($element['#attributes']['type']);
  }
  // Remove media="all" attribute from <style> tags
  if (isset($element['#attributes']['media']) && $element['#attributes']['media'] === 'all') {
    unset($element['#attributes']['media']);
  }
  if (!isset($element['#value'])) {
    // Changed to remove XHTML's self-closing slashes: " />" becomes ">".
    return '<' . $element['#tag'] . drupal_attributes($element['#attributes']) . ">\n";
  }
  else {
    $output = '<' . $element['#tag'] . drupal_attributes($element['#attributes']) . '>';
    if (isset($element['#value_prefix'])) {
      $output .= $element['#value_prefix'];
    }
    $output .= $element['#value'];
    if (isset($element['#value_suffix'])) {
      $output .= $element['#value_suffix'];
    }
    $output .= '</' . $element['#tag'] . ">\n";
    return $output;
  }
} 