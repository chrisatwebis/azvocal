<?php

/**
 * @file
 * template.php
 */
/**
 * Implements template_preprocess_entity().
 */
function azvocal_preprocess_entity(&$variables, $hook) {
  // dpm($variables);
  $function = 'azvocal_preprocess_' . $variables['entity_type'];
  if (function_exists($function)) {
    $function($variables, $hook);
  }
}

/**
 * @file
 * The primary PHP file for this theme.
 */
function azvocal_preprocess_html(&$variables) {
  if (arg(0) == 'taxonomy' && arg(1) == 'term') {
    $term = taxonomy_term_load(arg(2));
    $variables['classes_array'][] = 'vocabulary-' . strtolower($term->vocabulary_machine_name);
  }
}

function azvocal_preprocess_page(&$variables) {
  //redirect the term to node if it has only one node.
  if (arg(0) == 'taxonomy' && arg(1) == 'term' && is_numeric(arg(2))) {
    $tid = arg(2);
    $items = taxonomy_select_nodes($tid);
    if(count($items) == 1){
      drupal_goto('node/'.$items[0]);
    }
  }
}

function azvocal_preprocess_bean(&$variables) {
  $bean_type = $variables['elements']['#bundle'];
  // dpm($variables);
  switch ($bean_type) {
    case 'image_block':
      //if the bg_image is not empty and it has uri
      if (!empty( $variables['elements']['#entity']->field_bg_image['und'][0]['uri'] )) {
        $variables['layout_attributes'] .= 'style = "background-image: url('. image_style_url('image_block_bg', $variables['elements']['#entity']->field_bg_image['und'][0]['uri']) .'")';
      }
      break;
    default:
      # code...
      break;
  }
}


/**
 * Returns HTML for status and/or error messages, grouped by type.
 *
 * An invisible heading identifies the messages for assistive technology.
 * Sighted users see a colored box. See http://www.w3.org/TR/WCAG-TECHS/H69.html
 * for info.
 *
 * @param array $variables
 *   An associative array containing:
 *   - display: (optional) Set to 'status' or 'error' to display only messages
 *     of that type.
 *
 * @return string
 *   The constructed HTML.
 *
 * @see theme_status_messages()
 *
 * @ingroup theme_functions
 */
function azvocal_status_messages($variables) {
  $display = $variables['display'];
  $output = '';

  $status_heading = array(
    'status' => t('Status message'),
    'error' => t('Error message'),
    'warning' => t('Warning message'),
    'info' => t('Informative message'),
  );

  // Map Drupal message types to their corresponding Bootstrap classes.
  // @see http://twitter.github.com/bootstrap/components.html#alerts
  $status_class = array(
    'status' => 'success',
    'error' => 'danger',
    'warning' => 'warning',
    // Not supported, but in theory a module could send any type of message.
    // @see drupal_set_message()
    // @see theme_status_messages()
    'info' => 'info',
  );

  // Retrieve messages.
  $message_list = drupal_get_messages($display);

  // Allow the disabled_messages module to filter the messages, if enabled.
  if (module_exists('disable_messages') && variable_get('disable_messages_enable', '1')) {
    $message_list = disable_messages_apply_filters($message_list);
  }

  foreach ($message_list as $type => $messages) {
    $class = (isset($status_class[$type])) ? ' alert-' . $status_class[$type] : '';
    $output .= "<div class=\"alert alert-block$class messages $type\">\n";
    $output .= "  <a class=\"close\" data-dismiss=\"alert\" href=\"#\">&times;</a>\n";

    if (!empty($status_heading[$type])) {
      $output .= '<h4 class="element-invisible">' . _bootstrap_filter_xss($status_heading[$type]) . "</h4>\n";
    }

    if (count($messages) > 1) {
      $output .= " <ul>\n";
      foreach ($messages as $message) {
        if (module_exists("devel")) {
          $output .= '  <li>' . ($message) . "</li>\n";
        }
        else {
          $output .= '  <li>' . _bootstrap_filter_xss($message) . "</li>\n";
        }
      }
      $output .= " </ul>\n";
    }
    else {
      if (module_exists("devel")) {
        $output .= ($messages[0]);
      }
      else {
        $output .= _bootstrap_filter_xss($messages[0]);        
      }
    }

    $output .= "</div>\n";
  }
  return $output;
}