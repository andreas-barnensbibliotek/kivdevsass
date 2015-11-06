<?php

/**
 * Implements template_preprocess_html().
 */
function STARTER_preprocess_html(&$variables) {
}

/**
 * Implements template_preprocess_page.
 */
function STARTER_preprocess_page(&$variables) {
}

/**
 * Implements template_preprocess_node.
 */
function STARTER_preprocess_node(&$variables) {
}


function kivnew_menu_tree__menu_block(&$variables) {
  return '<ul class="off-canvas-list">' . $variables['tree'] . '</ul>';
}

/**
 * Implements theme_menu_link().
 */
function kivnew_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    // Wrap in dropdown-menu.
    unset($element['#below']['#theme_wrappers']);
    $sub_menu = '<ul class="off-canvas-submenu multiColumn">' . drupal_render($element['#below']) . '</ul>';
  }//else{
  // här funkar custom a class
  	//$variables['element']['#localized_options']['attributes']['class'][] = 'level2-link';
  	//return theme_menu_link($variables);
  //}
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

