<?php

/* START */

global $base_url;

function remix_preprocess_html(&$variables) {

    // === FRONT ===

    drupal_add_css('http://fonts.googleapis.com/css?family=Oswald', array('type' => 'external'));
   // drupal_add_css('http://fonts.googleapis.com/css?family=Open Sans:300,300italic,400,italic,600,600italic,700,700italic,800,800italic&ver=4.0', array('type' => 'external'));

    /**
      //drupal_add_library('system', 'ui.accordion');
      drupal_add_js('misc/ui/jquery.ui.core.min.js');
      drupal_add_js('misc/ui/jquery.ui.widget.min.js');
      drupal_add_js('misc/ui/jquery.ui.accordion.min.js');
     * */
    // Add css
    drupal_add_css(path_to_theme() . '/css/bootstrap.min.css');
    drupal_add_css(path_to_theme() . '/css/bootstrap-responsive.min.css');
    drupal_add_css(path_to_theme() . '/css/icons/icons.css');
    drupal_add_css(path_to_theme() . '/js/rs-plugin/css/settings.css');
    drupal_add_css(path_to_theme() . '/css/style.css');
   
   //if (drupal_is_front_page()) {
        drupal_add_css(path_to_theme() . '/css/update.css');
		
		$version_remix = theme_get_setting('remix_version', 'remix');
    if (empty($version_remix))
        $version_remix = 'default';
    if ($version_remix == 'default') {
    	
	}else{
		 drupal_add_css(path_to_theme() . '/css/light.css');
//		drupal_add_css(base_path() . path_to_theme() . '/css/light.css');
	}
    //}
    // Add js
    drupal_add_js(path_to_theme() . '/js/theme-custom.js');
    drupal_add_js(path_to_theme() . '/js/bootstrap.min.js');
    drupal_add_js(path_to_theme() . '/js/countdown.js');
    drupal_add_js(path_to_theme() . '/js/jquery.prettyPhoto.js');
    drupal_add_js(path_to_theme() . '/js/jquery.flexslider-min.js');
    drupal_add_js(path_to_theme() . '/js/jquery.nicescroll.min.js');
    drupal_add_js(path_to_theme() . '/js/jquery-waypoints.js');
    drupal_add_js(path_to_theme() . '/js/custom.js');


    // === THEME SETTING ===
    //STYLE SWITCHER
    /*$disable_switcher = theme_get_setting('remix_disable_switch', 'remix');
    if (empty($disable_switcher))
        $disable_switcher = 'on';
    if (!empty($disable_switcher) && $disable_switcher == 'on') {
        //style switcher
        //drupal_add_js(base_path().path_to_theme().'/js/themeseting-front/style-switcher/jquery-1.8.2.js', array('type' => 'file', 'scope' => 'footer'));
        drupal_add_js(base_path() . path_to_theme() . '/js/themeseting-front/style-switcher/styleselector.js');
        drupal_add_css(base_path() . path_to_theme() . '/js/themeseting-front/style-switcher/color-switcher.css');
    }
    //SWITCHER
    $disable_switcher = theme_get_setting('remix_disable_switch', 'remix');
    */
    
	
    //Switcher Region layout
    $layout_region = theme_get_setting('remix_regions', 'remix');
    if (!empty($layout_region) and $layout_region == 'other') {
        drupal_add_css(base_path() . path_to_theme() . '/css/themeseting-front/rtl.css', array('type' => 'external'));
    }


    //Site Background
    $pic_fid = theme_get_setting('remix_background', 'remix');
    if (!empty($pic_fid)) {
        $file = file_load($pic_fid);
        if ($file) {
            $variables['body_background'] = file_create_url($file->uri);
        }
    }
}

//-------------------------------------------------------------------------------------------------------------------
//----------- THEME SETTING & BACK END ------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------
// Add css skin
$setting_skin = theme_get_setting('built_in_skins', 'remix');
if (!empty($setting_skin)) {
    $skin_color = '/css/themeseting-front/switcher_colors/' . $setting_skin;
} else {
    $skin_color = '/css/themeseting-front/switcher_colors/default.css';
}
$css_skin = array(
    '#tag' => 'link', // The #tag is the html tag - <link />
    '#attributes' => array(// Set up an array of attributes inside the tag
        'href' => $base_url . '/' . path_to_theme() . $skin_color,
        'rel' => 'stylesheet',
        'type' => 'text/css',
        'id' => 'select_skin',
        'data-baseurl' => $base_url . '/' . path_to_theme()
    ),
    '#weight' => 1,
);
drupal_add_html_head($css_skin, 'skin');



//-------------------------------------------------------------------------------------------------------------------
// ----------- FRONTEND ---------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------
//custom main menu
function remix_links__system_main_menu($vars) {
    $class = implode($vars['attributes']['class'], ' ');
    $html = '<ul class="' . $class . '">';


    foreach ($vars['links'] as $key => $link) {
        //dsm($link);
        if (is_numeric($key)) {
            $sub_menu = '';
            $link_class = '';
            $link_title = $link['#title'];
            if (!empty($link['#localized_options']['attributes']['title'])) {
                $link_title .= '<span class="sub">' . $link['#localized_options']['attributes']['title'] . '</span>';
            }
            if (!empty($link['#below'])) {
                $sub_menu = theme('links__system_main_menu', array('links' => $link['#below'], 'attributes' => array('class' => array('sub-menu'))));
            }
            $html .= '<li' . $link_class . '>' . l($link_title, $link['#href'], array('html' => 'true')) . $sub_menu . '</li>';
        }
    }
    $html .= '</ul>';

    return $html;
}

//Custom Sidebar shortcode
function remix_links__menu_list($variables) {
    $html = '<ul class="list">';
    foreach ($variables['links'] as $link) {

        $class = '';

        $link_title = '<i class="icon-caret-right"></i> ';
        $link_title .= $link['title'];

        if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page())) && (empty($link['language']) || $link['language']->language == $language_url->language)) {
            $class = 'current';
        }


        $html .= '<li' . drupal_attributes(array('class' => $class)) . '>' . l($link_title, $link['href'], array('html' => 'true')) . '</li>';
    }
    $html .= '</ul>';
    return $html;
}

//NODE PREV NEXT
function node_sibling($dir = 'next', $node, $next_node_text = NULL, $prepend_text = NULL, $append_text = NULL, $tid = FALSE) {
    if ($tid) {
        $query = 'SELECT n.nid, n.title FROM {node} n INNER JOIN {term_node} tn ON n.nid=tn.nid WHERE '
                . 'n.nid ' . ($dir == 'previous' ? '<' : '>') . ' :nid AND n.type = :type AND n.status=1 '
                . 'AND tn.tid = :tid ORDER BY n.nid ' . ($dir == 'previous' ? 'DESC' : 'ASC');
        //use fetchObject to fetch a single row
        $row = db_query($query, array(':nid' => $node->nid, ':type' => $node->type, ':tid' => $tid))->fetchObject();
    } else {
        $query = 'SELECT n.nid, n.title FROM {node} n WHERE '
                . 'n.nid ' . ($dir == 'previous' ? '<' : '>') . ' :nid AND n.type = :type AND n.status=1 '
                . 'ORDER BY n.nid ' . ($dir == 'previous' ? 'DESC' : 'ASC');
        //use fetchObject to fetch a single row
        $row = db_query($query, array(':nid' => $node->nid, ':type' => $node->type))->fetchObject();
    }
    // add Class for </a>
    $a_class = ($dir == 'next') ? "flr" : "fll";

    if ($row) {
        $text = $next_node_text ? $next_node_text : $row->title;

        // add icon </i>
        $node_title = '';

        if ($dir == 'next') {
            $node_title .= $text . ' <i class="icon-long-arrow-right"></i>';
        }
        if ($dir == 'previous') {
            $node_title .= '<i class="icon-long-arrow-left"></i> ' . $text;
        }

        return $prepend_text . l($node_title, 'node/' . $row->nid, array('rel' => $dir, 'html' => 'true', 'attributes' => array('class' => $a_class))) . $append_text;
    } else {
        return FALSE;
    }
}

// Rate widget
function remix_process_rate_template_thumbs_up(&$variables) {
    extract($variables);

    $classes = 'fa ';

    if (isset($results['user_vote']) && $results['user_vote'] == $links[0]['value']) {
        $classes .= 'fa-heart user-voted';
    } else {
        $classes .= 'fa-heart-o user-not-voted';
    }

    $variables['up_button'] = theme('rate_button', array('href' => $links[0]['href'], 'class' => $classes));
}

//Bread crumb
function remix_breadcrumb($variables) {
    $crumbs = '<ul>';
    $breadcrumb = $variables['breadcrumb'];
    if (!empty($breadcrumb)) {
        $breadcrumb[0] = '<a class="toptip" original-title="Homepage" href="' . url('<front>', array('absolute' => TRUE)) . '"><i class="icon-home"></i></a>';
        foreach ($breadcrumb as $value) {
            $crumbs .= '<li>' . $value . '</li>';
        }
        $crumbs .= '<li>' . drupal_get_title() . '</li>';

        $crumbs .='</ul>';
        return $crumbs;
    } else {
        return NULL;
    }
}

//-------------------------------------------------------------------------------------------------------------------
//----------- BACK END ------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------
// Remove css files for Tab list link view, edit on page.tpl.php.
//function remix_css_alter(&$css) {
//	unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
//	unset($css[drupal_get_path('module', 'system') . '/system.theme.css']);
//	unset($css[drupal_get_path('module', 'system') . '/system.base.css']);
//}
//function remix_js_alter(&$js){
//    unset($js[drupal_get_path('module', 'fivestar').'/js/fivestar.js']);
//    unset($js[drupal_get_path('module', 'fivestar').'/js/fivestar.ajax.js']);    
//}


function remix_form_comment_form_alter(&$form, &$form_state) {
    $form['comment_body']['#after_build'][] = 'remix_customize_comment_form';
    //dpm($form);
    $form['subject'] = FALSE;
    $form['author']['name']['#autocomplete_path'] = FALSE;
}

function remix_customize_comment_form(&$form) {
    $form[LANGUAGE_NONE][0]['format']['#access'] = FALSE;
    return $form;
}


function remix_preprocess_views_view(&$vars) {
  // Get the current view info
  $view = $vars['view'];
  //dsm($view);

  // Add JS/CSS based on view name
  if ($view->name == 'page_gallery') {    
    drupal_add_js(path_to_theme() . '/js/modernizr.custom.63321.js');
    drupal_add_js(path_to_theme() . '/js/jquery.stapel.js');
  }
  if ($view->name == 'page_album_mp3') {    
    drupal_add_js(path_to_theme() . '/js/jquery.jplayer.js');
    drupal_add_js(path_to_theme() . '/js/ttw-music-player-min.js');
  }
  if ($view->name == 'page_news' || $view->name == 'revolution') {        
    drupal_add_js(path_to_theme() . '/js/rs-plugin/js/jquery.themepunch.plugins.min.js');
    drupal_add_js(path_to_theme() . '/js/rs-plugin/js/jquery.themepunch.revolution.min.js');
  }
  if ($view->name == 'page_shop' ||  $view->name == 'commerce_cart_form' || $view->name == 'commerce_cart_summary') {    
    drupal_add_css(path_to_theme()  . '/css/shop.css');
  }
  
  
//
//  // Add JS/CSS based on current view display
//  if ($view->current_display == 'current_display_name') {
//    drupal_add_js( /* parameters */ );
//    drupal_add_css( /* parameters */ );
//  }
}


function remix_preprocess_page(&$vars) {
    
     // Add JS & CSS by node type
  if (isset($vars['node']) && $vars['node']->type == 'mp3') {    
    drupal_add_js(path_to_theme() . '/js/jquery.jplayer.js');
    drupal_add_js(path_to_theme() . '/js/ttw-music-player-min.js');
  }
  
     // Add JS & CSS by node type
  if (isset($vars['node']) && $vars['node']->type == 'product') {    
    drupal_add_css(path_to_theme()  . '/css/shop.css');
  }
    
    
    
    //404 page
    $status = drupal_get_http_header("status");
    if ($status == "404 Not Found") {
        $vars['theme_hook_suggestions'][] = 'page__404';
        if (theme_get_setting('not_found_title', 'remix')) {
            $vars['not_found_title'] = theme_get_setting('not_found_title', 'remix');
        }
        if (theme_get_setting('not_found_description', 'remix')) {
            $vars['not_found_description'] = theme_get_setting('not_found_description', 'remix');
        }
    }




    if (isset($vars['node'])) {
        $vars['theme_hook_suggestions'][] = 'page__' . $vars['node']->type;
    }
    if (arg(0) == 'comment' & arg(1) == 'reply') {
        $node = node_load(arg(2));
        $vars['theme_hook_suggestions'][] = 'page__comment__reply__' . str_replace('_', '--', $node->type);
    }

    if (isset($vars['node'])) :
        //print $vars['node']->type;
        if ($vars['node']->type == 'page'):

            $node = node_load($vars['node']->nid);
            $output = field_view_field('node', $node, 'field_show_page_title', array('label' => 'hidden'));
            $vars['field_show_page_title'] = $output;
            //sidebar
            $output = field_view_field('node', $node, 'field_sidebar', array('label' => 'hidden'));
            $vars['field_sidebar'] = $output;
        endif;
    endif;
}

function remix_form_alter(&$form, &$form_state, $form_id) {
    if ($form_id == 'search_block_form') {
        $form['search_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty
        $form['search_block_form']['#default_value'] = t('Search'); // Set a default value for the textfield
        $form['search_block_form']['#attributes']['id'] = array("mod-search-searchword");
        //disabled submit button
        //unset($form['actions']['submit']);
        unset($form['search_block_form']['#title']);
        $form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Search';}";
        $form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Search') {this.value = '';}";
    }
    if ($form_id == 'contact_site_form') {
        $form['mail']['#attributes']['class'] = array("input-contact-form");
        $form['name']['#attributes']['class'] = array("input-contact-form");
        $form['subject']['#attributes']['class'] = array("input-contact-form");
        $form['message']['#attributes']['class'] = array("message-contact-form");
        $form['actions']['submit']['#attributes']['class'] = array('btn btn-success contact-form-button');
    }
    if ($form_id == 'comment_form') {
        $form['comment_filter']['format'] = array(); // nuke wysiwyg from comments
    }
}

function hook_preprocess_page(&$variables) {
    if (arg(0) == 'node' && is_numeric($nid)) {
        if (isset($variables['page']['content']['system_main']['nodes'][$nid])) {
            $variables['node_content'] = & $variables['page']['content']['system_main']['nodes'][$nid];
            if (empty($variables['node_content']['field_show_page_title'])) {
                $variables['node_content']['field_show_page_title'] = NULL;
            }
        }
    }
}

/* * *********** 
 * FORM FIELD 
 * *********** */

function remix_textarea($variables) {
    $element = $variables['element'];
    $element['#attributes'] = array('placeholder' => $element['#title']);
    element_set_attributes($element, array('id', 'name', 'cols', 'rows'));
    _form_set_class($element, array('form-control'));

    // Add resizable behavior.
    if (!empty($element['#resizable'])) {
        drupal_add_library('system', 'drupal.textarea');
        $wrapper_attributes['class'][] = 'resizable';
        $output = '<div' . drupal_attributes($wrapper_attributes) . '>';
        $output .= '<textarea' . drupal_attributes($element['#attributes']) . '>' . check_plain($element['#value']) . '</textarea>';
        $output .= '</div>';
        return $output;
    } else {
        $output = '<textarea' . drupal_attributes($element['#attributes']) . '>' . check_plain($element['#value']) . '</textarea>';
        return $output;
    }
}

function remix_textfield($variables) {
    $element = $variables['element'];
    if (isset($element['#title'])) {
        $element['#attributes'] = array('placeholder' => $element['#title']);
    }
    $element['#attributes']['type'] = 'text';
    element_set_attributes($element, array('id', 'name', 'value', 'size', 'maxlength'));
    _form_set_class($element, array('form-text'));

    $extra = '';
    if ($element['#autocomplete_path'] && drupal_valid_path($element['#autocomplete_path'])) {
        drupal_add_library('system', 'drupal.autocomplete');
        $element['#attributes']['class'][] = 'form-autocomplete';

        $attributes = array();
        $attributes['type'] = 'hidden';
        $attributes['id'] = $element['#attributes']['id'] . '-autocomplete';
        $attributes['value'] = url($element['#autocomplete_path'], array('absolute' => TRUE));
        $attributes['disabled'] = 'disabled';
        $attributes['class'][] = 'autocomplete';
        $extra = '<input' . drupal_attributes($attributes) . ' />';
    }

    $output = '<input' . drupal_attributes($element['#attributes']) . ' />';

    return $output . $extra;
}

function remix_password($variables) {
    $element = $variables['element'];
    $element['#attributes'] = array('placeholder' => $element['#title']);
    $element['#attributes']['type'] = 'password';
    element_set_attributes($element, array('id', 'name', 'size', 'maxlength'));
    _form_set_class($element, array('form-text'));

    return '<input' . drupal_attributes($element['#attributes']) . ' />';
}



/*
 * Page Template
 */
function remix_pager($variables) {
  $tags = $variables['tags'];
  $element = $variables['element'];
  $parameters = $variables['parameters'];
  $quantity = $variables['quantity'];
  global $pager_page_array, $pager_total;

  // Calculate various markers within this pager piece:
  // Middle is used to "center" pages around the current page.
  $pager_middle = ceil($quantity / 2);
  // current is the page we are currently paged to
  $pager_current = $pager_page_array[$element] + 1;
  // first is the first page listed by this pager piece (re quantity)
  $pager_first = $pager_current - $pager_middle + 1;
  // last is the last page listed by this pager piece (re quantity)
  $pager_last = $pager_current + $quantity - $pager_middle;
  // max is the maximum page number
  $pager_max = $pager_total[$element];
  // End of marker calculations.
  // Prepare for generation loop.
  $i = $pager_first;
  if ($pager_last > $pager_max) {
    // Adjust "center" if at end of query.
    $i = $i + ($pager_max - $pager_last);
    $pager_last = $pager_max;
  }
  if ($i <= 0) {
    // Adjust "center" if at start of query.
    $pager_last = $pager_last + (1 - $i);
    $i = 1;
  }
  // End of generation loop preparation.

  $li_first = theme('pager_first', array('text' => (isset($tags[0]) ? $tags[0] : t('« first')), 'element' => $element, 'parameters' => $parameters));
  $li_previous = theme('pager_previous', array('text' => (isset($tags[1]) ? $tags[1] : t('‹ previous')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_next = theme('pager_next', array('text' => (isset($tags[3]) ? $tags[3] : t('next ›')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_last = theme('pager_last', array('text' => (isset($tags[4]) ? $tags[4] : t('last »')), 'element' => $element, 'parameters' => $parameters));

  if ($pager_total[$element] > 1) {
    if ($li_first) {
      $items[] = array(
        'class' => array('pager-first'),
        'data' => $li_first,
      );
    }
    if ($li_previous) {
      $items[] = array(
        'class' => array('pager-previous'),
        'data' => $li_previous,
      );
    }

    // When there is more than one page, create the pager list.
    if ($i != $pager_max) {
      if ($i > 1) {
        $items[] = array(
          'class' => array('pager-ellipsis'),
          'data' => 'â€¦',
        );
      }
      // Now generate the actual pager piece.
      for (; $i <= $pager_last && $i <= $pager_max; $i++) {
        if ($i < $pager_current) {
          $items[] = array(
            'class' => array('pager-item'),
            'data' => theme('pager_previous', array('text' => $i, 'element' => $element, 'interval' => ($pager_current - $i), 'parameters' => $parameters)),
          );
        }
        if ($i == $pager_current) {
          $items[] = array(
            'class' => array('active'),
            'data' => '<a class="tbutton"><span>' . $i . '</span></a>',
          );
        }
        if ($i > $pager_current) {
          $items[] = array(
            'class' => array('pager-item'),
            'data' => theme('pager_next', array('text' => $i, 'element' => $element, 'interval' => ($i - $pager_current), 'parameters' => $parameters)),
          );
        }
      }
      if ($i < $pager_max) {
        $items[] = array(
          'class' => array('pager-ellipsis'),
          'data' => 'â€¦',
        );
      }
    }
    // End generation.
    if ($li_next) {
      $items[] = array(
        'class' => array('pager-next'),
        'data' => $li_next,
      );
    }
    if ($li_last) {
      $items[] = array(
        'class' => array('pager-last'),
        'data' => $li_last,
      );
    }
    $output = '<div class="pagination-tt clearfix"><ul>';
    foreach ($items as $item) {
      $output .= '<li class="' . $item['class'][0] . '">' . $item['data'] . "</li>\n";
    }
    $output .= '</ul></div>';

    return $output;
  }
}

function remix_pager_link($variables) {
  $text = $variables['text'];
  $page_new = $variables['page_new'];
  $element = $variables['element'];
  $parameters = $variables['parameters'];
  $attributes = $variables['attributes'];

  $page = isset($_GET['page']) ? $_GET['page'] : '';
  if ($new_page = implode(',', pager_load_array($page_new[$element], $element, explode(',', $page)))) {
    $parameters['page'] = $new_page;
  }

  $query = array();
  if (count($parameters)) {
    $query = drupal_get_query_parameters($parameters, array());
  }
  if ($query_pager = pager_get_query_parameters()) {
    $query = array_merge($query, $query_pager);
  }

  // Set each pager link title
  if (!isset($attributes['title'])) {
    static $titles = NULL;
    if (!isset($titles)) {
      $titles = array(
        t('« first') => t('Go to first page'),
        t('‹ previous') => t('Go to previous page'),
        t('next ›') => t('Go to next page'),
        t('last »') => t('Go to last page'),
      );
    }
    $attributes['class'][] = 'tbutton';
    if (isset($titles[$text])) {
      $attributes['title'] = $titles[$text];
    }
    elseif (is_numeric($text)) {
      $attributes['title'] = t('Go to page @number', array('@number' => $text));
    }
  }

  // @todo l() cannot be used here, since it adds an 'active' class based on the
  //   path only (which is always the current path for pager links). Apparently,
  //   none of the pager links is active at any time - but it should still be
  //   possible to use l() here.
  // @see http://drupal.org/node/1410574
  $attributes['href'] = url($_GET['q'], array('query' => $query));
  return '<a' . drupal_attributes($attributes) . '><span>' . check_plain($text) . '</span></a>';
}



/**
 * Replacement for theme_form_element().
 */
function remix_webform_element($variables) {
  // Ensure defaults.
  $variables['element'] += array(
    '#title_display' => 'before',
  );

  $element = $variables['element'];

  // All elements using this for display only are given the "display" type.
  if (isset($element['#format']) && $element['#format'] == 'html') {
    $type = 'display';
  }
  else {
    $type = (isset($element['#type']) && !in_array($element['#type'], array(
        'markup',
        'textfield',
        'webform_email',
        'webform_number'
      ))) ? $element['#type'] : $element['#webform_component']['type'];
  }

  // Convert the parents array into a string, excluding the "submitted" wrapper.
  $nested_level = $element['#parents'][0] == 'submitted' ? 1 : 0;
  $parents = str_replace('_', '-', implode('--', array_slice($element['#parents'], $nested_level)));

  $wrapper_classes = array(
    'form-item',
    'grid_6',
    'mgb',
    'webform-component',
    'webform-component-' . $type,
    'contact-form-' . $parents,
  );
  if (isset($element['#title_display']) && strcmp($element['#title_display'], 'inline') === 0) {
    $wrapper_classes[] = 'webform-container-inline';
  }
  $output = '<div id="webform-component-' . $parents . '" class="' . implode(' ', $wrapper_classes) . '">' . "\n";

  // If #title is not set, we don't display any label or required marker.
  if (!isset($element['#title'])) {
    $element['#title_display'] = 'none';
  }
  $prefix = isset($element['#field_prefix']) ? '<span class="field-prefix">' . _webform_filter_xss($element['#field_prefix']) . '</span> ' : '';
  $suffix = isset($element['#field_suffix']) ? ' <span class="field-suffix">' . _webform_filter_xss($element['#field_suffix']) . '</span>' : '';

  switch ($element['#title_display']) {
    case 'inline':
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
    $output .= ' <div class="description">' . $element['#description'] . "</div>\n";
  }

  $output .= "</div>\n";

  return $output;
}