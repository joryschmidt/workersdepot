<?php
/**
 * ProfitMag Theme Customizer.
 *
 * @package ProfitMag
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function profitmag_customize_register( $wp_customize ) {  

	// Basic Setting Panel starts
  $wp_customize->add_panel('profitmag_basic_panel', array(
    'title' 			   => __('Theme Options', 'profitmag'),
    'priority' 			 => 3097,
    'theme_supports' => '',
    'capabitity' 		 => 'edit_theme_options',
    'description' 	 => __('Option to change general settings', 'profitmag') 
  ));


  // Header Setting Section starts
  $wp_customize->add_section('profitmag_header_section', array(    
    'title'       => __('Header', 'profitmag'),
    'panel'       => 'profitmag_basic_panel'    
  ));

 // To use site title in logo    
  $wp_customize->add_setting('profitmag_theme_options[profitmag_logo_options]', array(
    'default'         => __('title', 'profitmag'), 
    'type'            => 'theme_mod',
    'capability'      => 'edit_theme_options',
    'theme_supports'  => '',
    'transport'       => 'refresh',
    'sanitize_callback' => 'profitmag_sanitize_select'     
  ));

  $wp_customize->add_control('profitmag_theme_options[profitmag_logo_options]', array(      
    'label'   => __('Select Image or Site title for logo of the site', 'profitmag'),    
    'settings'=> 'profitmag_theme_options[profitmag_logo_options]',
    'section' => 'profitmag_header_section',
    'type'    => 'radio',
    'choices' => array(         
                  'logo'    => __('Logo (Upload logo if you select this option)', 'profitmag'),
                  'title'   => __('Site Title (Site title and description will be used if you select this option)', 'profitmag'),
                  'disable' => __('Disable', 'profitmag'),
                )
  ));

  //Header Ads 
  $wp_customize->add_setting( 'profitmag_theme_options[profitmag_header_ads_setting]', array(
    'default'               => '',
    'type'                  => 'theme_mod',
    'capability'            => 'edit_theme_options',
    'theme_supports'        => '',
    'transport'             => 'refresh',
    'sanitize_callback'     => 'esc_html',
    'sanitize_js_callback'  => 'esc_html'
  ) );

  $wp_customize->add_control( 'profitmag_theme_options[profitmag_header_ads_setting]', array(
    'label'       => __('Header Ads', 'profitmag'),
    'description' => __('Please insert the image of size 790X90px', 'profitmag'), 
    'settings'    => 'profitmag_theme_options[profitmag_header_ads_setting]',
    'section'     => 'profitmag_header_section',   
    'type'        => 'textarea' 
  ) );

  // Show home icon in Menu
  $wp_customize->add_setting('profitmag_theme_options[profitmag_homeicon_setting]', array(
    'default'           => 1,
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
    'theme_supports'    => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'profitmag_checkbox_sanitization'
  ));

  $wp_customize->add_control('profitmag_theme_options[profitmag_homeicon_setting]', array(
    'label'       => __('Check to show home icon in navigation bar', 'profitmag'),   
    'settings'    => 'profitmag_theme_options[profitmag_homeicon_setting]',
    'section'     => 'profitmag_header_section',
    'type'        => 'checkbox'
  ));

  // Menu Alignment 
  $wp_customize->add_setting('profitmag_theme_options[profitmag_menu_setting]', array(
    'default'         => __('Left', 'profitmag'),
    'type'            => 'theme_mod',
    'capability'      => 'edit_theme_options',
    'theme_supports'  => '',
    'transport'       => 'refresh',
    'sanitize_callback' => 'profitmag_sanitize_select'      
  ));

  $wp_customize->add_control('profitmag_theme_options[profitmag_menu_setting]', array(      
    'label'   => __('Menu Alignment', 'profitmag'),    
    'settings'=> 'profitmag_theme_options[profitmag_menu_setting]',
    'section' => 'profitmag_header_section',
    'type'    => 'select',
    'choices' => array(         
                  'Left'  => __('Left', 'profitmag'),
                  'Right' => __('Right', 'profitmag')
                )
  ));

  // Search in Menu
  $wp_customize->add_setting('profitmag_theme_options[profitmag_search_setting]', array(
    'default'           => 1,
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
    'theme_supports'    => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'profitmag_checkbox_sanitization'
  ));

  $wp_customize->add_control('profitmag_theme_options[profitmag_search_setting]', array(
    'label'       => __('Check to enable search in navigation bar', 'profitmag'),   
    'settings'    => 'profitmag_theme_options[profitmag_search_setting]',
    'section'     => 'profitmag_header_section',
    'type'        => 'checkbox'
  ));
  $wp_customize->add_setting('profitmag_theme_options[profitmag_search_placeholder]', array(
    'default'           =>  __('Search', 'profitmag'),
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
    'theme_supports'    => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'sanitize_text_field'
  ));

  $wp_customize->add_control('profitmag_theme_options[profitmag_search_placeholder]', array(
    'label'       => __('Search Placeholder', 'profitmag'),    
    'settings'    => 'profitmag_theme_options[profitmag_search_placeholder]',
    'section'     => 'profitmag_header_section',
    'type'        => 'text'
  ));

  // Enable/Disable latest news
   $wp_customize->add_setting( 'profitmag_theme_options[enable_latest_news]', array(
    'default'               => true,
    'type'                  => 'theme_mod',
    'capability'            => 'edit_theme_options',
    'theme_supports'        => '',
    'transport'             => 'refresh',
    'sanitize_callback' => 'profitmag_checkbox_sanitization'
  ) );

  $wp_customize->add_control( 'profitmag_theme_options[enable_latest_news]', array(
    'label'    => __( 'Check enable latest news', 'profitmag' ),
    'type'     => 'checkbox',
    'section'  => 'profitmag_header_section',
    'settings' => 'profitmag_theme_options[enable_latest_news]',
  ));

  // Footer Setting Section starts
  $wp_customize->add_section('profitmag_footer_section', array(    
    'title'       => __('Footer', 'profitmag'),
    'panel'       => 'profitmag_basic_panel'    
  ));

  // Footer Copyright
  $wp_customize->add_setting('profitmag_theme_options[profitmag_copyright_setting]', array(
    'default'           =>  __('Copyright 2016. All rights reserved', 'profitmag'),
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
    'theme_supports'    => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'sanitize_text_field'
  ));

  $wp_customize->add_control('profitmag_theme_options[profitmag_copyright_setting]', array(
    'label'       => __('Copyright Text', 'profitmag'),    
    'settings'    => 'profitmag_theme_options[profitmag_copyright_setting]',
    'section'     => 'profitmag_footer_section',
    'type'        => 'text'
  ));

  // General Setting Section starts
  $wp_customize->add_section('profitmag_general_section', array(    
    'title'       => __('General', 'profitmag'),
    'panel'       => 'profitmag_basic_panel'    
  ));

  // Responsive Setting 
  $wp_customize->add_setting('profitmag_theme_options[profitmag_responsive_setting]', array(
    'default'           => 0,
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
    'theme_supports'    => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'profitmag_checkbox_sanitization'
  ));

  $wp_customize->add_control('profitmag_theme_options[profitmag_responsive_setting]', array(
    'label'     => __('Check to disable Responsive Layout', 'profitmag'),
    'settings'  => 'profitmag_theme_options[profitmag_responsive_setting]',
    'section'   => 'profitmag_general_section',
    'type'      => 'checkbox'
  ));  

  // Posted Date 
  $wp_customize->add_setting('profitmag_theme_options[profitmag_postdate_setting]', array(
    'default'           => 0,
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
    'theme_supports'    => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'profitmag_checkbox_sanitization'
  ));

  $wp_customize->add_control('profitmag_theme_options[profitmag_postdate_setting]', array(
    'label'     => __('Check to hide Posted Date in Home Page', 'profitmag'),    
    'settings'  => 'profitmag_theme_options[profitmag_postdate_setting]',
    'section'   => 'profitmag_general_section',
    'type'      => 'checkbox'
  ));  

  // Web Page Color Setting  
  $wp_customize->add_setting('profitmag_theme_options[profitmag_layoutcolor_setting]', array(
    'default'         => __('red', 'profitmag'), 
    'type'            => 'theme_mod',
    'capability'      => 'edit_theme_options',
    'theme_supports'  => '',
    'transport'       => 'refresh',
    'sanitize_callback' => 'profitmag_sanitize_select'     
  ));

  $wp_customize->add_control('profitmag_theme_options[profitmag_layoutcolor_setting]', array(      
    'label'   => __('Color Scheme', 'profitmag'),    
    'settings'=> 'profitmag_theme_options[profitmag_layoutcolor_setting]',
    'section' => 'profitmag_general_section',
    'type'    => 'select',
    'choices' => array(         
                  'red'       => __('Red', 'profitmag'),
                  'blue'      => __('Blue', 'profitmag'),                  
                  'orange'    => __('Orange', 'profitmag'),                 
                )
  ));

  // Color For Header and Footer
  $wp_customize->add_setting('profitmag_theme_options[profitmag_headerlayoutcolor_setting]', array(
    'default'         => __('black-css', 'profitmag'), 
    'type'            => 'theme_mod',
    'capability'      => 'edit_theme_options',
    'theme_supports'  => '',
    'transport'       => 'refresh',
    'sanitize_callback' => 'profitmag_sanitize_select'     
  ));

  $wp_customize->add_control('profitmag_theme_options[profitmag_headerlayoutcolor_setting]', array(      
    'label'   => __('Header and Footer Color Scheme', 'profitmag'),    
    'settings'=> 'profitmag_theme_options[profitmag_headerlayoutcolor_setting]',
    'section' => 'profitmag_general_section',
    'type'    => 'select',
    'choices' => array(         
                  'yellow-css'       => __('Tangerine Yellow', 'profitmag'),
                  'blue-css'      => __('Dark Blue', 'profitmag'),                  
                  'dark-cyan-css'    => __('Dark cyan', 'profitmag'),
                   'black-css'    => __('Black', 'profitmag'),                 
                )
  ));

  // Web Page Layout    
  $wp_customize->add_setting('profitmag_theme_options[profitmag_layout_setting]', array(
    'default'         => __('Fullwidth', 'profitmag'), 
    'type'            => 'theme_mod',
    'capability'      => 'edit_theme_options',
    'theme_supports'  => '',
    'transport'       => 'refresh',
    'sanitize_callback' => 'profitmag_sanitize_select'     
  ));

  $wp_customize->add_control('profitmag_theme_options[profitmag_layout_setting]', array(      
    'label'   => __('Web Page Layout', 'profitmag'),    
    'settings'=> 'profitmag_theme_options[profitmag_layout_setting]',
    'section' => 'profitmag_general_section',
    'type'    => 'radio',
    'choices' => array(         
                  'Fullwidth'  => __('Full Width', 'profitmag'),
                  'Boxed'       => __('Boxed', 'profitmag')
                )
  ));  

  // Read More Text Setting starts
  $wp_customize->add_setting('profitmag_theme_options[profitmag_readmore_setting]', array(
    'default'           => '',   
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
    'theme_supports'    => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'sanitize_text_field'
  ));

  $wp_customize->add_control('profitmag_theme_options[profitmag_readmore_setting]', array(
    'label'       => __('Read More Text in Archive Pages', 'profitmag'),  
    'description' => __('Change text if you want to use other than "Read More"', 'profitmag'),   
    'settings'    => 'profitmag_theme_options[profitmag_readmore_setting]',
    'section'     => 'profitmag_general_section',
    'type'        => 'text'
  ));

  // Slider Setting Panel starts
  $wp_customize->add_section('profitmag_slider_section', array(    
    'title'       => __('Slider Block', 'profitmag'),
    'panel'       => 'profitmag_basic_panel',      
  ));

  $wp_customize->add_setting('profitmag_theme_options[profitmag_slider_type_setting]', array(
    'default'         => 'single_post_slider',
    'type'            => 'theme_mod',
    'capability'      => 'edit_theme_options',
    'theme_supports'  => '',
    'transport'       => 'refresh',
    'sanitize_callback' => 'profitmag_sanitize_select'
          
  ));

  $wp_customize->add_control('profitmag_theme_options[profitmag_slider_type_setting]', array(      
    'label'   => __('Show Slide From', 'profitmag'),    
    'settings'=> 'profitmag_theme_options[profitmag_slider_type_setting]',
    'section' => 'profitmag_slider_section',
    'type'    => 'radio',
    'choices' => array(         
                  'single_post_slider'  => __('Single Posts', 'profitmag'),
                  'cat_post_slider'     => __('Category Posts', 'profitmag')
                )
  ));

  $wp_customize->add_setting('profitmag_theme_options[profitmag_slider_note_setting]', array(
    'default'         => 0,
    'type'            => 'theme_mod',
    'capability'      => 'edit_theme_options',
    'theme_supports'  => '',
    'transport'       => 'refresh',
     'sanitize_callback' => 'profitmag_sanitize_html'  

         
  ));
  
  $wp_customize->add_control(
    new Profitmag_Customize_Info_Control(
        $wp_customize,
        'profitmag_theme_options[profitmag_slider_note_setting]',
        array(
            'label'       => __( 'Select the post for Slider', 'profitmag' ),            
            'settings'    => 'profitmag_theme_options[profitmag_slider_note_setting]',
            'section'     => 'profitmag_slider_section',
            'active_callback' => 'profitmag_slider_type_callback_single',
        )
    )
  );

    //Slider type single posts
    for ($i=1; $i < 5; $i++) {    
   
    $wp_customize->add_setting('profitmag_theme_options[profitmag_slider_post_setting'.$i.']', array(
      'default'         => 0,
      'type'            => 'theme_mod',
      'capability'      => 'edit_theme_options',
      'theme_supports'  => '',
      'transport'       => 'refresh',
      'sanitize_callback' => 'profitmag_post_sanitization'
    ));
    
    $wp_customize->add_control(
      new Profitmag_Customize_Slider_Posts_Control(
          $wp_customize,
          'profitmag_theme_options[profitmag_slider_post_setting'.$i.']',
          array(
              'label'       => __( 'Select Post', 'profitmag' ),            
              'settings'    => 'profitmag_theme_options[profitmag_slider_post_setting'.$i.']',
              'section'     => 'profitmag_slider_section',
              'active_callback' => 'profitmag_slider_type_callback_single',
          )
      )
    );
  }

  //Slider type category posts
  $wp_customize->add_setting('profitmag_theme_options[profitmag_slider_cat_setting]', array(
    'default'         => 0,
    'type'            => 'theme_mod',
    'capability'      => 'edit_theme_options',
    'theme_supports'  => '',
    'transport'       => 'refresh',
    'sanitize_callback' => 'profitmag_number_sanitization'
          
  ));
  
  $wp_customize->add_control(
    new Profitmag_Customize_Category_Control(
        $wp_customize,
        'profitmag_theme_options[profitmag_slider_cat_setting]',
        array(
            'label'       => __( 'Select Category', 'profitmag' ),
            'description' => __( 'Posts of selected category will be used as slider', 'profitmag' ),
            'settings'    => 'profitmag_theme_options[profitmag_slider_cat_setting]',
            'section'     => 'profitmag_slider_section',
            'active_callback' => 'profitmag_slider_type_callback_cat',
        )
    )
  ); 

  // Show Slider Controls (Arrows)    
  $wp_customize->add_setting('profitmag_theme_options[profitmag_slider_arrow_setting]', array(
    'default'         => 'yes',
    'type'            => 'theme_mod',
    'capability'      => 'edit_theme_options',
    'theme_supports'  => '',
    'transport'       => 'refresh',
    'sanitize_callback' => 'profitmag_sanitize_select'
          
  ));

  $wp_customize->add_control('profitmag_theme_options[profitmag_slider_arrow_setting]', array(      
    'label'   => __('Show or Hide Slider Controls (Arrows)', 'profitmag'),    
    'settings'=> 'profitmag_theme_options[profitmag_slider_arrow_setting]',
    'section' => 'profitmag_slider_section',
    'type'    => 'radio',
    'choices' => array(         
                  'yes' => __('Show', 'profitmag'),
                  'no'  => __('Hide', 'profitmag')
                )
  ));

  //Slider auto Transition
  $wp_customize->add_setting('profitmag_theme_options[profitmag_slider_transition_setting]', array(
    'default'         => 'yes',
    'type'            => 'theme_mod',
    'capability'      => 'edit_theme_options',
    'theme_supports'  => '',
    'transport'       => 'refresh',
    'sanitize_callback' => 'profitmag_sanitize_select'     
  ));

  $wp_customize->add_control('profitmag_theme_options[profitmag_slider_transition_setting]', array(      
    'label'   => __('Enable Slider auto Transition?', 'profitmag'),    
    'settings'=> 'profitmag_theme_options[profitmag_slider_transition_setting]',
    'section' => 'profitmag_slider_section',
    'type'    => 'radio',
    'choices' => array(         
                  'yes' => __('Yes', 'profitmag'),
                  'no'  => __('No', 'profitmag')
                )
  ));

  //Slider Speed Section    
  $wp_customize->add_setting('profitmag_theme_options[profitmag_slider_speed_setting]', array(
    'default'           => 2000,
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
    'theme_supports'    => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'profitmag_number_sanitization'    
  ));

  $wp_customize->add_control('profitmag_theme_options[profitmag_slider_speed_setting]', array(      
    'label'   => __('Enter slider speed', 'profitmag'),
    'settings'=> 'profitmag_theme_options[profitmag_slider_speed_setting]',
    'section' => 'profitmag_slider_section',   
    'type'    => 'text'    
  ));

  //Featured Block Category (Section Beside Slider )
  $wp_customize->add_setting('profitmag_theme_options[profitmag_fbxbesideslider_setting]', array(
    'default'         => 0,
    'type'            => 'theme_mod',
    'capability'      => 'edit_theme_options',
    'theme_supports'  => '',
    'transport'       => 'refresh',
    'sanitize_callback' => 'profitmag_number_sanitization'      
  ));
  
  $wp_customize->add_control(
    new Profitmag_Customize_Category_Control(
        $wp_customize,
        'profitmag_theme_options[profitmag_fbxbesideslider_setting]',
        array(
            'label'       => __( 'Featured Block Category', 'profitmag' ),
            'description' => __( 'Section Beside Slider', 'profitmag' ),
            'settings'    => 'profitmag_theme_options[profitmag_fbxbesideslider_setting]',
            'section'     => 'profitmag_slider_section'
        )
    )
  );

  // Home Page Setting starts    
  $wp_customize->add_section('profitmag_homepage_section', array(    
    'title'   => __('Home Page Blocks', 'profitmag'),
    'panel'   => 'profitmag_basic_panel'
  ));
  



  //Featured Block One Category ( Section Below Slider )
  $wp_customize->add_setting('profitmag_theme_options[profitmag_fbxone_setting]', array(
    'default'         => 0,
    'type'            => 'theme_mod',
    'capability'      => 'edit_theme_options',
    'theme_supports'  => '',
    'transport'       => 'refresh',
    'sanitize_callback' => 'profitmag_number_sanitization'       
  ));
  
  $wp_customize->add_control(
    new Profitmag_Customize_Category_Control(
        $wp_customize,
        'profitmag_theme_options[profitmag_fbxone_setting]',
        array(
            'label'        => __( 'Featured Block One Category', 'profitmag' ),
            'description'  => __( 'Section Below Slider', 'profitmag' ),
            'settings'     => 'profitmag_theme_options[profitmag_fbxone_setting]',
            'section'      => 'profitmag_homepage_section'
        )
    )
  );

  //No of post to display
  $wp_customize->add_setting('profitmag_theme_options[profitmag_fbxonepostnum_setting]', array(
    'default'           => 6,
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
    'theme_supports'    => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'profitmag_number_sanitization'    
  ));

  $wp_customize->add_control('profitmag_theme_options[profitmag_fbxonepostnum_setting]', array(      
    'label'   => __('No. of posts to display', 'profitmag'),
    'settings'=> 'profitmag_theme_options[profitmag_fbxonepostnum_setting]',
    'section' => 'profitmag_homepage_section',   
    'type'    => 'text'    
  ));

  //Featured Block Two Category (Section Below Featured block One )    
  $wp_customize->add_setting('profitmag_theme_options[profitmag_fbxtwo_setting]', array(
    'default'         => 0,
    'type'            => 'theme_mod',
    'capability'      => 'edit_theme_options',
    'theme_supports'  => '',
    'transport'       => 'refresh',
    'sanitize_callback' => 'profitmag_number_sanitization'       
  ));
  
  $wp_customize->add_control(
    new Profitmag_Customize_Category_Control(
        $wp_customize,
        'profitmag_theme_options[profitmag_fbxtwo_setting]',
        array(
            'label'        => __( 'Featured Block Two Category', 'profitmag' ),
            'description'  => __( 'Section Below Featured Block One', 'profitmag' ),
            'settings'     => 'profitmag_theme_options[profitmag_fbxtwo_setting]',
            'section'      => 'profitmag_homepage_section'
        )
    )
  );

  //No of post to display on Featured block Two 
  $wp_customize->add_setting('profitmag_theme_options[profitmag_fbxtwopostnum_setting]', array(
    'default'           => 6,
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
    'theme_supports'    => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'profitmag_number_sanitization'    
  ));

  $wp_customize->add_control('profitmag_theme_options[profitmag_fbxtwopostnum_setting]', array(      
    'label'   => __('No. of posts to display', 'profitmag'),
    'settings'=> 'profitmag_theme_options[profitmag_fbxtwopostnum_setting]',
    'section' => 'profitmag_homepage_section',   
    'type'    => 'text'    
  ));

  //Featured Block Three Category ( 5 Column Block )                           
  $wp_customize->add_setting('profitmag_theme_options[profitmag_fbxthree_setting]', array(
    'default'         => 0,
    'type'            => 'theme_mod',
    'capability'      => 'edit_theme_options',
    'theme_supports'  => '',
    'transport'       => 'refresh',
    'sanitize_callback' => 'profitmag_number_sanitization'       
  ));
  
  $wp_customize->add_control(
    new Profitmag_Customize_Category_Control(
        $wp_customize,
        'profitmag_theme_options[profitmag_fbxthree_setting]',
        array(
            'label'        => __( 'Featured Block Three Category', 'profitmag' ),
            'description'  => __( '5 Columns Block', 'profitmag' ),
            'settings'     => 'profitmag_theme_options[profitmag_fbxthree_setting]',
            'section'      => 'profitmag_homepage_section'
        )
    )
  );

  //No of post to display on Featured block Three
  $wp_customize->add_setting('profitmag_theme_options[profitmag_fbxthreepostnum_setting]', array(
    'default'           => 10,
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
    'theme_supports'    => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'profitmag_number_sanitization'    
  ));

  $wp_customize->add_control('profitmag_theme_options[profitmag_fbxthreepostnum_setting]', array(      
    'label'   => __('No. of posts to display', 'profitmag'),
    'settings'=> 'profitmag_theme_options[profitmag_fbxthreepostnum_setting]',
    'section' => 'profitmag_homepage_section',   
    'type'    => 'text'    
  ));

  //Home Page Ads ( Mid Section )
  $wp_customize->add_setting( 'profitmag_theme_options[profitmag_home_ads_setting]', array(
    'default'               => '',
    'type'                  => 'theme_mod',
    'capability'            => 'edit_theme_options',
    'theme_supports'        => '',
    'transport'             => 'refresh',
    'sanitize_callback'     => 'esc_html',
    'sanitize_js_callback'  => 'esc_html'
  ) );

  $wp_customize->add_control( 'profitmag_theme_options[profitmag_home_ads_setting]', array(
    'label'       => __('Home Page Ads ( Mid Section )', 'profitmag'),
    'description' => __('Please insert the image of size 855X91px', 'profitmag'), 
    'settings'    => 'profitmag_theme_options[profitmag_home_ads_setting]',
    'section'     => 'profitmag_homepage_section',   
    'type'        => 'textarea' 
  ) );

  //Featured Block Four ( Excerpt Posts )   
  $wp_customize->add_setting('profitmag_theme_options[profitmag_fbxfour_setting]', array(
    'default'         => 0,
    'type'            => 'theme_mod',
    'capability'      => 'edit_theme_options',
    'theme_supports'  => '',
    'transport'       => 'refresh',
    'sanitize_callback' => 'profitmag_number_sanitization'       
  ));
  
  $wp_customize->add_control(
    new Profitmag_Customize_Category_Control(
        $wp_customize,
        'profitmag_theme_options[profitmag_fbxfour_setting]',
        array(
            'label'        => __( 'Featured Block Four Category', 'profitmag' ),
            'description'  => __( 'Excerpt Posts', 'profitmag' ),
            'settings'     => 'profitmag_theme_options[profitmag_fbxfour_setting]',
            'section'      => 'profitmag_homepage_section'
        )
    )
  );

  //No of post to display on Featured block Four
  $wp_customize->add_setting('profitmag_theme_options[profitmag_fbxfourpostnum_setting]', array(
    'default'           => 7,
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
    'theme_supports'    => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'profitmag_number_sanitization'    
  ));

  $wp_customize->add_control('profitmag_theme_options[profitmag_fbxfourpostnum_setting]', array(      
    'label'   => __('No. of posts to display', 'profitmag'),
    'settings'=> 'profitmag_theme_options[profitmag_fbxfourpostnum_setting]',
    'section' => 'profitmag_homepage_section',   
    'type'    => 'text'    
  ));

  //Featured Block Five ( Left and Right Column )    
  //Featured Block Five Left
  $wp_customize->add_setting('profitmag_theme_options[profitmag_fbxfiveleft_setting]', array(
    'default'         => 0,
    'type'            => 'theme_mod',
    'capability'      => 'edit_theme_options',
    'theme_supports'  => '',
    'transport'       => 'refresh',
    'sanitize_callback' => 'profitmag_number_sanitization'       
  ));
  
  $wp_customize->add_control(
    new Profitmag_Customize_Category_Control(
        $wp_customize,
        'profitmag_theme_options[profitmag_fbxfiveleft_setting]',
        array(
            'label'        => __( 'Featured Block Five Left', 'profitmag' ),
            'description'  => __( 'Left Column', 'profitmag' ),
            'settings'     => 'profitmag_theme_options[profitmag_fbxfiveleft_setting]',
            'section'      => 'profitmag_homepage_section'
        )
    )
  );

  //Featured Block Five Left
  $wp_customize->add_setting('profitmag_theme_options[profitmag_fbxfiveleftpostnum_setting]', array(
    'default'           => 3,
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
    'theme_supports'    => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'profitmag_number_sanitization'    
  ));

  $wp_customize->add_control('profitmag_theme_options[profitmag_fbxfiveleftpostnum_setting]', array(      
    'label'   => __('No. of posts to display', 'profitmag'),
    'settings'=> 'profitmag_theme_options[profitmag_fbxfiveleftpostnum_setting]',
    'section' => 'profitmag_homepage_section',   
    'type'    => 'text'    
  ));


  //Featured Block Five Right
  $wp_customize->add_setting('profitmag_theme_options[profitmag_fbxfiveright_setting]', array(
    'default'         => 0,
    'type'            => 'theme_mod',
    'capability'      => 'edit_theme_options',
    'theme_supports'  => '',
    'transport'       => 'refresh',
    'sanitize_callback' => 'profitmag_number_sanitization'       
  ));
  
  $wp_customize->add_control(
    new Profitmag_Customize_Category_Control(
        $wp_customize,
        'profitmag_theme_options[profitmag_fbxfiveright_setting]',
        array(
            'label'        => __( 'Featured Block Five Right', 'profitmag' ),
            'description'  => __( 'Right Column', 'profitmag' ),
            'settings'     => 'profitmag_theme_options[profitmag_fbxfiveright_setting]',
            'section'      => 'profitmag_homepage_section'
        )
    )
  );

   //Featured Block Five Right
  $wp_customize->add_setting('profitmag_theme_options[profitmag_fbxfiverightpostnum_setting]', array(
    'default'           => 3,
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
    'theme_supports'    => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'profitmag_number_sanitization'    
  ));

  $wp_customize->add_control('profitmag_theme_options[profitmag_fbxfiverightpostnum_setting]', array(      
    'label'   => __('No. of posts to display', 'profitmag'),
    'settings'=> 'profitmag_theme_options[profitmag_fbxfiverightpostnum_setting]',
    'section' => 'profitmag_homepage_section',   
    'type'    => 'text'    
  ));


  //Media Gallery Setting starts  
  $wp_customize->add_setting('profitmag_theme_options[profitmag_gallery_setting]', array(
    'default'         => '',
    'type'            => 'theme_mod',
    'capability'      => 'edit_theme_options',
    'theme_supports'  => '',
    'transport'       => 'refresh',
    'sanitize_callback' => 'sanitize_text_field'       
  )); 

  $wp_customize->add_control(
    new Profitmag_Customize_Gallery_Control(
    $wp_customize, 
    'profitmag_theme_options[profitmag_gallery_setting]', 
      array(
        'type' => 'gallery-image',
        'label' => __('Select Gallery Images', 'profitmag'),
        'section' => 'profitmag_homepage_section',
        'settings' => 'profitmag_theme_options[profitmag_gallery_setting]'        
      )
    ));

  //For Social Option
  $wp_customize->add_section('profitmag_social_section', array(    
    'title'       => __('Social Links', 'profitmag'),
    'panel'       => 'profitmag_basic_panel'    
  ));

  //enable/disable social links header
  $wp_customize->add_setting('profitmag_theme_options[profitmag_social_op_setting]', array(
    'default'           => 0,
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
    'theme_supports'    => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'profitmag_checkbox_sanitization'
  ));

  $wp_customize->add_control('profitmag_theme_options[profitmag_social_op_setting]', array(
    'label'     => __('Social icons of header', 'profitmag'),
    'description'   => __( 'Check here to disable social icons of header', 'profitmag' ),   
    'settings'  => 'profitmag_theme_options[profitmag_social_op_setting]',
    'section'   => 'profitmag_social_section',
    'type'      => 'checkbox'
  ));  

  //enable/disable social links footer
  $wp_customize->add_setting('profitmag_theme_options[profitmag_social_foot_setting]', array(
    'default'           => 0,
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
    'theme_supports'    => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'profitmag_checkbox_sanitization'
  ));

  $wp_customize->add_control('profitmag_theme_options[profitmag_social_foot_setting]', array(
    'label'     => __('Social icons of footer', 'profitmag'),
    'description'   => __( 'Check here to disable social icons of footer', 'profitmag' ),   
    'settings'  => 'profitmag_theme_options[profitmag_social_foot_setting]',
    'section'   => 'profitmag_social_section',
    'type'      => 'checkbox'
  ));  

  //Social link text field
  $social_options = array('facebook', 'twitter', 'google_plus', 'youtube', 'pinterest', 'flickr', 'vimeo', 'stumbleupon', 'dribble', 'tumblr', 'linkedin', 'sound_cloud', 'skype', 'rss');

  foreach($social_options as $social) {

    $social_name = ucwords(str_replace('_', ' ', $social));

    $label = '';

    switch ($social) {

      case 'facebook':
        $label = __('Facebook', 'profitmag');
        break;

      case 'twitter':
        $label = __( 'Twitter', 'profitmag' );
        break;

      case 'google_plus':
        $label = __( 'Google Plus', 'profitmag' );
        break;

      case 'youtube':
        $label = __( 'Youtube', 'profitmag' );
        break;

      case 'pinterest':
        $label = __( 'Pinterest', 'profitmag' );
        break;

      case 'flickr':
        $label = __( 'Flickr', 'profitmag' );
        break;

      case 'vimeo':
        $label = __( 'Vimeo', 'profitmag' );
        break;

      case 'stumbleupon':
        $label = __( 'Stumbleupon', 'profitmag' );
        break;

      case 'dribble':
        $label = __( 'Dribble', 'profitmag' );
        break;

      case 'tumblr':
        $label = __( 'Tumblr', 'profitmag' );
        break;

      case 'linkedin':
        $label = __( 'Linkedin', 'profitmag' );
        break;

      case 'sound_cloud':
        $label = __( 'Sound Cloud', 'profitmag' );
        break;

      case 'skype':
        $label = __( 'Skype', 'profitmag' );
        break;

      case 'rss':
        $label = __( 'RSS', 'profitmag' );
        break;

    }

    $wp_customize->add_setting( 'profitmag_theme_options[profitmag_'. $social.'_setting]', array(
      'sanitize_callback'     => 'esc_url_raw',
      'sanitize_js_callback'  =>  'esc_url'
      ));

    $wp_customize->add_control( 'profitmag_theme_options[profitmag_'. $social.'_setting]', array(
      'label'     => $label,
      'type'      => 'text',
      'section'   => 'profitmag_social_section',
      'settings'  => 'profitmag_theme_options[profitmag_'. $social.'_setting]'
      ));
  }

  // Blog Layout   
  $wp_customize->add_section('profitmag_blog_section', array(    
    'title'       => __('Blog Setting', 'profitmag'),
    'panel'       => 'profitmag_basic_panel'    
  ));

  $wp_customize->add_setting('profitmag_theme_options[profitmag_sidebar_layout_setting]', array(
    'default'           => 'right_sidebar',
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
    'theme_supports'    => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'profitmag_sanitize_select'
  ));

  $wp_customize->add_control(
    new Profitmag_Customize_Sidebar_Control(
    $wp_customize, 
    'profitmag_theme_options[profitmag_sidebar_layout_setting]', 
      array(
        'type' => 'radio-image',
        'label' => __('Blog layout', 'profitmag'),
        'section' => 'profitmag_blog_section',
        'settings' => 'profitmag_theme_options[profitmag_sidebar_layout_setting]',
        'choices' => array(
        'left_sidebar' => get_template_directory_uri() . '/inc/images/left-sidebar.png',
        'right_sidebar' => get_template_directory_uri() . '/inc/images/right-sidebar.png',
        'both_sidebar' => get_template_directory_uri() . '/inc/images/both-sidebar.png',
        'no_sidebar' => get_template_directory_uri() . '/inc/images/no-sidebar.png',
      )
    )
    )); 

    //Left Sidebar Settings Starts 
    $wp_customize->add_section('profitmag_leftsidebar_section', array(    
      'title'   => __('Left Sidebar', 'profitmag'),
      'panel'   => 'profitmag_basic_panel'
    ));

    $wp_customize->add_setting('profitmag_theme_options[profitmag_leftsidebar_top_setting]', array(
      'default'         => 0,
      'type'            => 'theme_mod',
      'capability'      => 'edit_theme_options',
      'theme_supports'  => '',
      'transport'       => 'refresh',
      'sanitize_callback' => 'profitmag_number_sanitization'       
    ));
    
    $wp_customize->add_control(
      new Profitmag_Customize_Category_Control(
          $wp_customize,
          'profitmag_theme_options[profitmag_leftsidebar_top_setting]',
          array(
              'label'        => __( 'Category Post One', 'profitmag' ),           
              'settings'     => 'profitmag_theme_options[profitmag_leftsidebar_top_setting]',
              'section'      => 'profitmag_leftsidebar_section'
          )
      )
    );

    //No of post to display on category sidebar one
    $wp_customize->add_setting('profitmag_theme_options[profitmag_cat_one_num_setting]', array(
      'default'           => 3,
      'type'              => 'theme_mod',
      'capability'        => 'edit_theme_options',
      'theme_supports'    => '',
      'transport'         => 'refresh',
      'sanitize_callback' => 'profitmag_number_sanitization'    
    ));

    $wp_customize->add_control('profitmag_theme_options[profitmag_cat_one_num_setting]', array(      
      'label'   => __('No. of posts to display', 'profitmag'),
      'settings'=> 'profitmag_theme_options[profitmag_cat_one_num_setting]',
      'section' => 'profitmag_leftsidebar_section',   
      'type'    => 'text'    
    ));

  //Middle Ads on category sidebar one
  $wp_customize->add_setting( 'profitmag_theme_options[profitmag_left_mid_ads_setting]', array(
    'default'               => '',
    'type'                  => 'theme_mod',
    'capability'            => 'edit_theme_options',
    'theme_supports'        => '',
    'transport'             => 'refresh',
    'sanitize_callback'     => 'esc_html',
    'sanitize_js_callback'  => 'esc_html'
  ) );

  $wp_customize->add_control( 'profitmag_theme_options[profitmag_left_mid_ads_setting]', array(
    'label'       => __('Middle Ads', 'profitmag'),
    'description' => __('Please insert the image of size 302X222px', 'profitmag'), 
    'settings'    => 'profitmag_theme_options[profitmag_left_mid_ads_setting]',
    'section'     => 'profitmag_leftsidebar_section',   
    'type'        => 'textarea' 
  ) );

  //Left sidebar photo gallery
  $wp_customize->add_setting('profitmag_theme_options[profitmag_left_gallery_setting]', array(
    'default'         => '',
    'type'            => 'theme_mod',
    'capability'      => 'edit_theme_options',
    'theme_supports'  => '',
    'transport'       => 'refresh',
    'sanitize_callback' => 'sanitize_text_field'       
  )); 

  $wp_customize->add_control(
    new Profitmag_Customize_Gallery_Control(
    $wp_customize, 
    'profitmag_theme_options[profitmag_left_gallery_setting]', 
      array(
        'type' => 'gallery-image',
        'label' => __('Photo Gallery', 'profitmag'),
        'section' => 'profitmag_leftsidebar_section',
        'settings' => 'profitmag_theme_options[profitmag_left_gallery_setting]'        
      )
    ));

  //Category sidebar Two starts  
  $wp_customize->add_setting('profitmag_theme_options[profitmag_leftsidebar_bottom_setting]', array(
      'default'         => 0,
      'type'            => 'theme_mod',
      'capability'      => 'edit_theme_options',
      'theme_supports'  => '',
      'transport'       => 'refresh',
      'sanitize_callback' => 'profitmag_number_sanitization'       
    ));

    $wp_customize->add_control(
      new Profitmag_Customize_Category_Control(
          $wp_customize,
          'profitmag_theme_options[profitmag_leftsidebar_bottom_setting]',
          array(
              'label'        => __( 'Category Post Two', 'profitmag' ),           
              'settings'     => 'profitmag_theme_options[profitmag_leftsidebar_bottom_setting]',
              'section'      => 'profitmag_leftsidebar_section'
          )
      )
    );

    //No of post to display on category sidebar one
    $wp_customize->add_setting('profitmag_theme_options[profitmag_cat_two_num_setting]', array(
      'default'           => 3,
      'type'              => 'theme_mod',
      'capability'        => 'edit_theme_options',
      'theme_supports'    => '',
      'transport'         => 'refresh',
      'sanitize_callback' => 'profitmag_number_sanitization'    
    ));

    $wp_customize->add_control('profitmag_theme_options[profitmag_cat_two_num_setting]', array(      
      'label'   => __('No. of posts to display', 'profitmag'),
      'settings'=> 'profitmag_theme_options[profitmag_cat_two_num_setting]',
      'section' => 'profitmag_leftsidebar_section',   
      'type'    => 'text'    
    ));

  //Bottom Ads on category sidebar two
  $wp_customize->add_setting( 'profitmag_theme_options[profitmag_left_bottom_ads_setting]', array(
    'default'               => '',
    'type'                  => 'theme_mod',
    'capability'            => 'edit_theme_options',
    'theme_supports'        => '',
    'transport'             => 'refresh',
    'sanitize_callback'     => 'esc_html',
    'sanitize_js_callback'  => 'esc_html'
  ) );

  $wp_customize->add_control( 'profitmag_theme_options[profitmag_left_bottom_ads_setting]', array(
    'label'       => __('Bottom Ads One', 'profitmag'),
    'description' => __('Please insert the image of size 302X592px', 'profitmag'), 
    'settings'    => 'profitmag_theme_options[profitmag_left_bottom_ads_setting]',
    'section'     => 'profitmag_leftsidebar_section',   
    'type'        => 'textarea' 
  ) );

  //Bottom Ads on category sidebar two
  $wp_customize->add_setting( 'profitmag_theme_options[profitmag_left_bottom_ads_two_setting]', array(
    'default'               => '',
    'type'                  => 'theme_mod',
    'capability'            => 'edit_theme_options',
    'theme_supports'        => '',
    'transport'             => 'refresh',
    'sanitize_callback'     => 'esc_html',
    'sanitize_js_callback'  => 'esc_html'
  ) );

  $wp_customize->add_control( 'profitmag_theme_options[profitmag_left_bottom_ads_two_setting]', array(
    'label'       => __('Bottom Ads Two', 'profitmag'),
    'description' => __('Please insert the image of size 302X592px', 'profitmag'), 
    'settings'    => 'profitmag_theme_options[profitmag_left_bottom_ads_two_setting]',
    'section'     => 'profitmag_leftsidebar_section',   
    'type'        => 'textarea' 
  ) );

  //Right Sidebar Settings Starts 
    $wp_customize->add_section('profitmag_rightsidebar_section', array(    
      'title'   => __('Right Sidebar', 'profitmag'),
      'panel'   => 'profitmag_basic_panel'
    ));

    $wp_customize->add_setting('profitmag_theme_options[profitmag_rightsidebar_top_setting]', array(
      'default'         => 0,
      'type'            => 'theme_mod',
      'capability'      => 'edit_theme_options',
      'theme_supports'  => '',
      'transport'       => 'refresh',
      'sanitize_callback' => 'profitmag_number_sanitization'       
    ));
    
    $wp_customize->add_control(
      new Profitmag_Customize_Category_Control(
          $wp_customize,
          'profitmag_theme_options[profitmag_rightsidebar_top_setting]',
          array(
              'label'        => __( 'Category Post One', 'profitmag' ),           
              'settings'     => 'profitmag_theme_options[profitmag_rightsidebar_top_setting]',
              'section'      => 'profitmag_rightsidebar_section'
          )
      )
    );

    //No of post to display on category sidebar one
    $wp_customize->add_setting('profitmag_theme_options[profitmag_post_one_num_setting]', array(
      'default'           => 3,
      'type'              => 'theme_mod',
      'capability'        => 'edit_theme_options',
      'theme_supports'    => '',
      'transport'         => 'refresh',
      'sanitize_callback' => 'profitmag_number_sanitization'    
    ));

    $wp_customize->add_control('profitmag_theme_options[profitmag_post_one_num_setting]', array(      
      'label'   => __('No. of posts to display', 'profitmag'),
      'settings'=> 'profitmag_theme_options[profitmag_post_one_num_setting]',
      'section' => 'profitmag_rightsidebar_section',   
      'type'    => 'text'    
    ));

  //Middle Ads on category sidebar one
  $wp_customize->add_setting( 'profitmag_theme_options[profitmag_right_mid_ads_setting]', array(
    'default'               => '',
    'type'                  => 'theme_mod',
    'capability'            => 'edit_theme_options',
    'theme_supports'        => '',
    'transport'             => 'refresh',
    'sanitize_callback'     => 'esc_html',
    'sanitize_js_callback'  => 'esc_html'
  ) );

  $wp_customize->add_control( 'profitmag_theme_options[profitmag_right_mid_ads_setting]', array(
    'label'       => __('Middle Ads', 'profitmag'),
    'description' => __('Please insert the image of size 302X222px', 'profitmag'), 
    'settings'    => 'profitmag_theme_options[profitmag_right_mid_ads_setting]',
    'section'     => 'profitmag_rightsidebar_section',   
    'type'        => 'textarea' 
  ) );

  //Right sidebar photo gallery
  $wp_customize->add_setting('profitmag_theme_options[profitmag_right_gallery_setting]', array(
    'default'         => '',
    'type'            => 'theme_mod',
    'capability'      => 'edit_theme_options',
    'theme_supports'  => '',
    'transport'       => 'refresh',
    'sanitize_callback' => 'sanitize_text_field'       
  )); 

  $wp_customize->add_control(
    new Profitmag_Customize_Gallery_Control(
    $wp_customize, 
    'profitmag_theme_options[profitmag_right_gallery_setting]', 
      array(
        'type' => 'gallery-image',
        'label' => __('Photo Gallery', 'profitmag'),
        'section' => 'profitmag_rightsidebar_section',
        'settings' => 'profitmag_theme_options[profitmag_right_gallery_setting]'        
      )
    ));

  //Category sidebar Two starts  
  $wp_customize->add_setting('profitmag_theme_options[profitmag_rightsidebar_bottom_setting]', array(
      'default'         => 0,
      'type'            => 'theme_mod',
      'capability'      => 'edit_theme_options',
      'theme_supports'  => '',
      'transport'       => 'refresh',
      'sanitize_callback' => 'profitmag_number_sanitization'       
    ));

    $wp_customize->add_control(
      new Profitmag_Customize_Category_Control(
          $wp_customize,
          'profitmag_theme_options[profitmag_rightsidebar_bottom_setting]',
          array(
              'label'        => __( 'Category Post Two', 'profitmag' ),           
              'settings'     => 'profitmag_theme_options[profitmag_rightsidebar_bottom_setting]',
              'section'      => 'profitmag_rightsidebar_section'
          )
      )
    );

    //No of post to display on category sidebar one
    $wp_customize->add_setting('profitmag_theme_options[profitmag_post_two_num_setting]', array(
      'default'           => '3',
      'type'              => 'theme_mod',
      'capability'        => 'edit_theme_options',
      'theme_supports'    => '',
      'transport'         => 'refresh',
      'sanitize_callback' => 'profitmag_number_sanitization'    
    ));

    $wp_customize->add_control('profitmag_theme_options[profitmag_post_two_num_setting]', array(      
      'label'   => __('No. of posts to display', 'profitmag'),
      'settings'=> 'profitmag_theme_options[profitmag_post_two_num_setting]',
      'section' => 'profitmag_rightsidebar_section',   
      'type'    => 'text'    
    ));

  //Bottom Ads on category sidebar two
  $wp_customize->add_setting( 'profitmag_theme_options[profitmag_right_bottom_ads_setting]', array(
    'default'               => '',
    'type'                  => 'theme_mod',
    'capability'            => 'edit_theme_options',
    'theme_supports'        => '',
    'transport'             => 'refresh',
    'sanitize_callback'     => 'esc_html',
    'sanitize_js_callback'  => 'esc_html'
  ) );

  $wp_customize->add_control( 'profitmag_theme_options[profitmag_right_bottom_ads_setting]', array(
    'label'       => __('Bottom Ads One', 'profitmag'),
    'description' => __('Please insert the image of size 302X592px', 'profitmag'), 
    'settings'    => 'profitmag_theme_options[profitmag_right_bottom_ads_setting]',
    'section'     => 'profitmag_rightsidebar_section',   
    'type'        => 'textarea' 
  ) );

  //Bottom Ads on category sidebar two
  $wp_customize->add_setting( 'profitmag_theme_options[profitmag_right_bottom_ads_two_setting]', array(
    'default'               => '',
    'type'                  => 'theme_mod',
    'capability'            => 'edit_theme_options',
    'theme_supports'        => '',
    'transport'             => 'refresh',
    'sanitize_callback'     => 'esc_html',
    'sanitize_js_callback'  => 'esc_html'
  ) );

  $wp_customize->add_control( 'profitmag_theme_options[profitmag_right_bottom_ads_two_setting]', array(
    'label'       => __('Bottom Ads Two', 'profitmag'),
    'description' => __('Please insert the image of size 302X592px', 'profitmag'), 
    'settings'    => 'profitmag_theme_options[profitmag_right_bottom_ads_two_setting]',
    'section'     => 'profitmag_rightsidebar_section',   
    'type'        => 'textarea' 
  ) );

  // About Profitmag
  $wp_customize->add_section('profitmag_about_section', array(    
    'title'       => __('About Theme', 'profitmag'),
    'priority' => 3098,    
  ));

  $wp_customize->add_setting( 'profitmag_theme_options[profitmag_about_setting]', array(
   'default'               => '',
   'type'                  => 'theme_mod',
   'capability'            => 'edit_theme_options',
   'theme_supports'        => '',
   'transport'             => 'refresh',
   'sanitize_callback' => 'profitmag_sanitize_html'      
  ) );

  $wp_customize->add_control(
    new Profitmag_About_Theme(
      $wp_customize, 
      'profitmag_theme_options[profitmag_about_setting]', 
      array(
        'label' => __('Important Links', 'profitmag'),        
        'settings' => 'profitmag_theme_options[profitmag_about_setting]',
        'section' => 'profitmag_about_section'
      )
    )
  );
// Reset Profitmag
  $wp_customize->add_section('profitmag_section_reset_all_settings', array(    
    'title'       => __('Reset all settings', 'profitmag'),
    'description' => esc_html__( 'Caution: All theme settings will be reset to default. Refresh the page after save to view full effects.', 'profitmag' ),
    'priority' => 3099,    
  ));

  $wp_customize->add_setting( 'profitmag_theme_options[reset_all_settings]', array(
   'default'               => false,
   'type'                  => 'theme_mod',
   'capability'            => 'edit_theme_options',
   'theme_supports'        => '',
   'transport'             => 'postMessage',
   'sanitize_callback'     => 'profitmag_checkbox_sanitization',
  ) );

  $wp_customize->add_control( 'profitmag_theme_options[reset_all_settings]', array(
      'label'    => __( 'Check to reset all settings', 'profitmag' ),
      'type'     => 'checkbox',
      'section'  => 'profitmag_section_reset_all_settings',
      'settings' => 'profitmag_theme_options[reset_all_settings]',
  ));

 // Profitmag Checkbox Sanitization

 if ( ! function_exists( 'profitmag_checkbox_sanitization' ) ) :

 function profitmag_checkbox_sanitization( $input ) {

 	if ( $input == 1 ) {
       return 1;
    } else {
       return '';
    }
 }

 endif;


 // Profitmag Integer Number Sanitization

 if ( ! function_exists( 'profitmag_number_sanitization' ) ) :

 function profitmag_number_sanitization( $input, $setting ) {

  $input = absint( $input );

  return ( $input ? $input : $setting->default );
  
 }

 endif;

if ( ! function_exists( 'profitmag_sanitize_html' ) ) :

 function profitmag_sanitize_html( $html ) {
  return wp_filter_post_kses( $html );
}

endif;


   // Profitmag slider_type_callback for single posts 
 if ( ! function_exists( 'profitmag_slider_type_callback_single' ) ) :

 function profitmag_slider_type_callback_single( $control ) {    

  if( 'single_post_slider' == $control->manager->get_setting('profitmag_theme_options[profitmag_slider_type_setting]')->value() ){

    return true;

  } else {

        return false;
    }

  }
  
  endif;

  // Profitmag slider_type_callback for category posts 
  if ( ! function_exists( 'profitmag_slider_type_callback_cat' ) ) :

  function profitmag_slider_type_callback_cat( $control ) {
     
    if( 'cat_post_slider' == $control->manager->get_setting('profitmag_theme_options[profitmag_slider_type_setting]')->value() ){
         return true;
     } else {
         return false;
     }

   }

   endif;



//Profitmag post dropdown sanitization
  if ( !function_exists('profitmag_post_sanitization') ) :
  function profitmag_post_sanitization( $control ) {
    
    $post_id = absint( $control );

    if ( 'publish' == get_post_status( $post_id ) ) {
        return $post_id;
     } else {
        return false;
     }
   
    
  }
endif;

//Profitmag slider type sanitization
  if ( ! function_exists( 'profitmag_sanitize_select' ) ) :

    function profitmag_sanitize_select( $input, $setting ) {
      
    $input = esc_attr( $input );
      
      // Get list of choices from the control associated with the setting.
      $choices = $setting->manager->get_control( $setting->id )->choices;
      
      // If the input is a valid key, return it; otherwise, return the default.
      return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

    }

  endif;

  //Profitmag css sanitization
  if ( ! function_exists( 'profitmag_sanitize_css' ) ) :

  function profitmag_sanitize_css( $css ) {

    return wp_strip_all_tags( $css );
    
  }

  endif;

 


}

add_action( 'customize_register', 'profitmag_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function profitmag_customize_preview_js() {
	wp_enqueue_script( 'profitmag_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
  
}
add_action( 'customize_preview_init', 'profitmag_customize_preview_js' );


/**
 * Enqueue Profitmag Custom Script
 */
function profitmag_script_enqueue() {
 
  wp_enqueue_script( 'profitmag-gallery-script', get_template_directory_uri() . '/js/profitmag-scripts.js', array( 'jquery', 'customize-controls' ), '20151215', true );
}
add_action( 'customize_controls_enqueue_scripts', 'profitmag_script_enqueue' );