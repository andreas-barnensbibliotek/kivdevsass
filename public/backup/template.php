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

// ANDREAS EDIT jag har lagt till ett id i Element["#name"] som gör att diven runt selectboxarna får ett eget id=contentfilterblock
function kivnew_form_element($variables) {
  $element = &$variables['element'];

  // This function is invoked as theme wrapper, but the rendered form element
  // may not necessarily have been processed by form_builder().
  $element += array(
    '#title_display' => 'before',
  );
 // Add element #id for #type 'item'.
  if (isset($element['#markup']) && !empty($element['#id'])) {
    $attributes['id'] = $element['#id'];
  }
  // Add element's #type and #name as class to aid with JS/CSS selectors.
  $attributes['class'] = array('form-item');
  if (!empty($element['#type'])) {
    $attributes['class'][] = 'form-type-' . strtr($element['#type'], '_', '-');
  }
  if (!empty($element['#name'])) {
    $attributes['class'][] = 'form-item-' . strtr($element['#name'], array(' ' => '-', '_' => '-', '[' => '-', ']' => ''));
	$attributes['id'] = 'contentfilterblock';
	
  }
  
  // Add a class for disabled elements to facilitate cross-browser styling.
  if (!empty($element['#attributes']['disabled'])) {
    $attributes['class'][] = 'form-disabled';
  }
  $output = '<div' . drupal_attributes($attributes) . '>' . "\n";

  // If #title is not set, we don't display any label or required marker.
  if (!isset($element['#title'])) {
    $element['#title_display'] = 'none';
  }
  $prefix = isset($element['#field_prefix']) ? '<span class="field-prefix">' . $element['#field_prefix'] . '</span> ' : '';
  $suffix = isset($element['#field_suffix']) ? ' <span class="field-suffix">' . $element['#field_suffix'] . '</span>' : '';

  switch ($element['#title_display']) {
    case 'before':
    case 'invisible':
      $output .= ' ' . theme('form_element_label', $variables);
      $output .= ' ' . $prefix . $element['#children'] . $suffix . "\n";
      break;

    case 'after':
      $output .= ' ' . $prefix . $element['#children'] . $suffix;
      $output .= ' ' . theme('form_element_label', $variables) . "\n";
      break;

    case 'none':
    case 'attribute':
      // Output no label and no required marker, only the children.
      $output .= ' ' . $prefix . $element['#children'] . $suffix . "\n";
      break;
  }

  if (!empty($element['#description'])) {
    $output .= '<div class="description">' . $element['#description'] . "</div>\n";
  }

  $output .= "</div>\n";

  return $output;
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

// Kalender

function kivnew_date_nav_title($params) {
	$granularity = $params['granularity'];
	$view = $params['view'];
	$date_info = $view->date_info;
	$link = !empty($params['link']) ? $params['link'] : FALSE;
	$format = !empty($params['format']) ? $params['format'] : NULL;
		switch ($granularity) {
			case 'year':
				$title = $date_info->year;
				$date_arg = $date_info->year;
			break;
			case 'month':
				$format = !empty($format) ? $format : (empty($date_info->mini) ? 'F Y' : 'F Y');
				$title = date_format_date($date_info->min_date, 'custom', $format);
				$date_arg = $date_info->year .'-'. date_pad($date_info->month);
			break;
			case 'day':
				$format = !empty($format) ? $format : (empty($date_info->mini) ? 'l, F j Y' : 'l, F j');
				$title = date_format_date($date_info->min_date, 'custom', $format);
				$date_arg = $date_info->year .'-'. date_pad($date_info->month) .'-'. date_pad($date_info->day);
			break;
			case 'week':
				$format = !empty($format) ? $format : (empty($date_info->mini) ? 'F j Y' : 'F j');
				$title = t('Week of @date', array('@date' => date_format_date($date_info->min_date, 'custom', $format)));
				$date_arg = $date_info->year .'-W'. date_pad($date_info->week);
			break;
		}
	if (!empty($date_info->mini) || $link) {
		// Month navigation titles are used as links in the mini view.
		$attributes = array('title' => t('View full page month'));
		$url = date_pager_url($view, $granularity, $date_arg, TRUE);
		return l($title, $url, array('attributes' => $attributes));
	}
	else {
		return $title;
	}
}


function THEMENAME_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
        
    $breadcrumbs = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

    $breadcrumbs .= '<ul class="mbc_navlinklist">';
	
	
	
    $title = strip_tags(drupal_get_title());
    $breadcrumbs .= '<li class="current"><a href="#">' . $title . '</a></li>';
    $breadcrumbs .= '</ul>';

    return $breadcrumbs;
  }
}


/**
 * Override theme_breadcrumb().
 *
 * Base breadcrumbs on paths e.g., about/our-organization/bob-jones
 * turns into About Us > Our Organization > Bob Jones
 */

function kivnew_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
    $crumbs = '<ul class="mbc_navlinklist">';
    $array_size = count($breadcrumb);
    $i = 0;
    
    while ( $i < $array_size) {
      $crumbs .= '<li class="breadcrumb-' . $i;
      if ($i == 0) {
        $crumbs .= ' first';
      }
      if ($i+1 == $array_size) {
        $crumbs .= ' last';
      }
      if ($i == 0){
      	$crumbs .=  '">Start</li>';
      }else{
      	$crumbs .=  '">' . $breadcrumb[$i] . '</li>';
      }
      $i++;
      
    // $breadcrumb[0] = "Start";
    
    }
    $title = strip_tags(drupal_get_title());

    $crumbs .= '<li class="current"><a href="#">' . $title . '</a></li>';
    $crumbs .= '</ul>';
    return $crumbs;
  }
}



function kivnew_form_alter(&$form, &$form_state, $form_id){
  if ($form_id == 'search_block_form'){
      $form['basic']['keys']['#title'] = 'Tester';
      $form['basic']['keys']['#value'] = 'Test';
   }
}

