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



/**
//fixa till fil iconer till nedladdningsbara filer och även ljudfiler
*/
function kivnew_theme_registry_alter(&$theme_registry) {
  if (!empty($theme_registry['file_icon']['function'])) {
    $theme_registry['file_icon']['function'] = 'kivnew_file_icon';
  }
}
/**
 * Returns HTML for an image with an appropriate icon for the given file.
 *
 * @param $variables
 *   An associative array containing:
 *   - file: A file object for which to make an icon.
 *   - icon_directory: (optional) A path to a directory of icons to be used for
 *     files. Defaults to the value of the "file_icon_directory" variable.
 *
 * @ingroup themeable
 */
function kivnew_file_icon($variables) {
  $retst="";
  $file = $variables['file'];
  $icon_directory = $variables['icon_directory'];

  $mime = check_plain($file->filemime);
  $icon_url = file_icon_url($file, $icon_directory);
  
  $retst = '<img class="file-icon" alt="START'. base_path() .'" title="' . $mime . '" src="' . $icon_url . '" />';
  if($mime == "application/pdf"){
  // tabort bilden framför om det är en pdf
	 $retst ="";
	// Detta är om man vill lägga till egen icon framför: 
	//$retst = '<img class="file-icon" alt="START" title="' . $mime . '" src="'. $GLOBALS['base_url']  .'/sites/all/themes/kivnew/images/icondownarrow.png" />';
	// sköter det via css istället
  }
  if($mime == "audio/mpeg"){
  // tabort bilden framför om det är en ljudfil
   $retst="";	
  }
  
    return $retst;
}