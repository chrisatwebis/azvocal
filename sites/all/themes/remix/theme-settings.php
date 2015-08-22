<?php

function remix_form_system_theme_settings_alter(&$form, $form_state) {

    $theme_path = drupal_get_path('theme', 'remix');
    $form['settings'] = array(
        '#type' => 'vertical_tabs',
        '#title' => t('Theme settings'),
        '#weight' => 2,
        '#collapsible' => TRUE,
        '#collapsed' => FALSE,
            '#attached' => array(
                  'css' => array(drupal_get_path('theme', 'remix') . '/theme-setting/css/admin.css'),
                  'js' => array(
                          drupal_get_path('theme', 'remix') . '/theme-setting/js/admin.js',
                  ),
              ),
    );

    $form['settings']['general_setting'] = array(
        '#type' => 'fieldset',
        '#title' => t('General Settings'),
        '#collapsible' => TRUE,
        '#collapsed' => FALSE,
    );

    $form['settings']['general_setting']['general_setting_tracking_code'] = array(
        '#type' => 'textarea',
        '#title' => t('Tracking Code'),
        '#default_value' => theme_get_setting('general_setting_tracking_code', 'remix'),
    );
     $form['settings']['general_setting']['remix_disable_slide_top_panel'] = array(

        '#title' => t('Slide display'),

        '#type' => 'select',

        '#options' => array('on' => t('SHOW'), 'off' => t('HIDE')),

        '#default_value' => theme_get_setting('remix_disable_slide_top_panel', 'remix'),

    );
    $form['settings']['general_setting']['button_like_facebook'] = array(
        '#type' => 'textfield',
        '#title' => t('Like Button'),
        '#description'  => t('URL of the page to like (could be your homepage or a facebook page e.g.)'),
        '#default_value' => theme_get_setting('button_like_facebook', 'remix'),
    );


    // 404 Not Found
    $form['settings']['notfound'] = array(
      '#type' => 'fieldset',
      '#title' => t('404 Not Found'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
    );
    $form['settings']['notfound']['not_found_title'] = array(
      '#type' => 'textfield',
      '#title' => t('Not Found Title'),
      '#default_value' => theme_get_setting('not_found_title', 'remix'),
    );
    $form['settings']['notfound']['not_found_description'] = array(
      '#type' => 'textarea',
      '#resizable' => FALSE,
      '#title' => t('Not Found Description'),
      '#default_value' => theme_get_setting('not_found_description', 'remix'),
    ); 



          //PORTFOLIO SETTING

    $form['settings']['portfolio'] = array(

        '#type' => 'fieldset',

        '#title' => t('Portfolio settings'),

        '#collapsible' => TRUE,

        '#collapsed' => FALSE,

    );



    $form['settings']['portfolio']['default_portfolio'] = array(

        '#type' => 'select',

        '#title' => t('Default portfolio display'),

        '#options' => array(
                          '2col' => 'Portfolio - 2cols',
                          '3col' => 'Portfolio - 3cols',
                          '4col' => 'Portfolio - 4cols',
        ),

        '#default_value' => theme_get_setting('default_portfolio', 'remix'),

    );

    $form['settings']['portfolio']['default_nodes_portfolio'] = array(

        '#type' => 'select',

        '#title' => t('Number nodes show on portfolio page'),

       '#options' => drupal_map_assoc(array(2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 25, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 100, 'ALL')),

        '#default_value' => theme_get_setting('default_nodes_portfolio', 'remix'),

    );

    //Header settings
    $form['settings']['header'] = array(

        '#type' => 'fieldset',

        '#title' => t('Header settings'),

        '#collapsible' => TRUE,

        '#collapsed' => FALSE,

    );



    $form['settings']['header']['default_header'] = array(

        '#type' => 'select',

        '#title' => t('Default header'),

        '#options' => array(
                          '1' => 'Default',
                          '2' => 'Style 2',
        ),

        '#default_value' => theme_get_setting('default_header', 'remix'),

    );
    $form['settings']['footer'] = array(
        '#type' => 'fieldset',
        '#title' => t('Footer settings'),
        '#collapsible' => TRUE,
        '#collapsed' => FALSE,
    );

    $form['settings']['footer']['footer_copyright_message'] = array(
        '#type' => 'textarea',
        '#title' => t('Footer copyright message'),
        '#default_value' => theme_get_setting('footer_copyright_message', 'remix'),
    );

    $form['settings']['custom_css'] = array(
              '#type' => 'fieldset',
              '#title' => t('Custom CSS'),
              '#collapsible' => TRUE,
              '#collapsed' => FALSE,
    );  

    $form['settings']['custom_css']['custom_css'] = array(
              '#type' => 'textarea',
              '#title' => t('Custom CSS'),
              '#default_value' => theme_get_setting('custom_css', 'remix'),
              '#description'  => t('<strong>Example:</strong><br/>h1 { font-family: \'Metrophobic\', Arial, serif; font-weight: 400; }')
    );
	
	
// SWitcher Style	
    $form['settings']['skin'] = array(

      '#type' => 'fieldset',

      '#title' => t('Switcher Style'),

      '#collapsible' => TRUE,

      '#collapsed' => FALSE,

    );
    
  /* $form['settings']['skin']['remix_layout'] = array(

      '#title' => t('Switcher Layout'),

      '#type' => 'select',

      '#options' => array('wide' => t('WIDE (Default)'), 'boxed' => t('BOXED')),

      '#default_value' => theme_get_setting('remix_layout', 'remix'),

   );*/
   $form['settings']['skin']['remix_regions'] = array(

      '#title' => t('RTL version'),

      '#type' => 'select',

      '#options' => array('default' => t('Default'), 'other' => t('RTL')),

      '#default_value' => theme_get_setting('remix_regions', 'remix'),

  );

  //Disable Switcher style;
  $form['settings']['skin']['remix_disable_switch'] = array(

      '#title' => t('Switcher style'),

      '#type' => 'select',

      '#options' => array('on' => t('ON'), 'off' => t('OFF')),

      '#default_value' => theme_get_setting('remix_disable_switch', 'remix'),

  );
  $form['settings']['skin']['remix_version'] = array(

      '#title' => t('Switcher Version'),

      '#type' => 'select',

      '#options' => array('default' => t('Default'), 'light' => t('Light')),

      '#default_value' => theme_get_setting('remix_version', 'remix'),

  );
  $form['settings']['skin']['remix_background'] = array(
    '#title' => t('Background Image'),
    // '#type' => 'file',
    '#type' => 'managed_file',
    ///'#title' => t('Background Image'),
    //'#default_value' => !empty($settings['secondary_menu']['background_image']) ? $settings['secondary_menu']['background_image'] : NULL,
    '#upload_location' => 'public://remix-background/',
    //'#options' => array('wide' => t('WIDE (Default)'), 'boxed' => t('BOXED')),
    '#default_value' => theme_get_setting('remix_background', 'remix'),

  );
  
  //Select Skin
  /*$form['settings']['skin']['built_in_skins'] = array(
        '#type' => 'radios',
        '#title' => t('Built-in Skins'),
        '#options' => array(
            'default.css' => t('Default'),
            'bridge.css' => t('Bridge'),
            'cyan.css' => t('Cyan'),
            'darkred.css' => t('Darkred'),
            'blue.css' => t('Blue'),
            'lightblue.css' => t('Lightblue'),
            'orange.css' => t('Orange'),
            'pink.css' => t('Pink'),
            'purple.css' => t('Purple'),
            'red.css' => t('Red'),
            'slate.css' => t('Slate'),
            'yellow.css' => t('Yellow'),
        ),
        '#default_value' => theme_get_setting('built_in_skins', 'remix')
    );*/
}