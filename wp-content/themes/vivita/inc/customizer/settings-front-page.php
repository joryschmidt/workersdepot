<?php

// ---------------------------------------------
// Frontpage Content Panel
// ---------------------------------------------
$wp_customize->add_panel( 'vivita_front_page_panel', array (
    'title'                 => __( 'Frontpage Content', 'vivita' ),
    'description'           => __( 'Customize the appearance of your front page', 'vivita' ),
    'priority'              => 10
) );

// ---------------------------------------------
// Promo / Bio Section
// ---------------------------------------------
$wp_customize->add_section( 'vivita_biography_section', array(
    'title'                 => __( 'Featured Post Section', 'vivita'),
    'description'           => __( 'Customize the front page Featured Post section', 'vivita' ),
    'panel'                 => 'vivita_front_page_panel'
) );

    // Promo / Bio Section Visibility Toggle
    $wp_customize->add_setting( 'vivita_promo_bio_visibility_toggle', array (
        'default'               => 'show',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'vivita_sanitize_show_hide',
    ) );
    $wp_customize->add_control( 'vivita_promo_bio_visibility_toggle', array(
        'type'                  => 'radio',
        'section'               => 'vivita_biography_section',
        'label'                 => __( 'Show the Featured Post section?', 'vivita' ),
        'choices'               => array(
            'show'      => __( 'Show', 'vivita' ),
            'hide'      => __( 'Hide', 'vivita' ),
    ) ) );
    
    // Promo Bio Post
    $wp_customize->add_setting( 'vivita_promo_bio_post', array (
        'default'               => 1,
        'transport'             => 'refresh',
        'sanitize_callback'     => 'vivita_sanitize_post',
    ) );
    $wp_customize->add_control( 'vivita_promo_bio_post', array(
        'type'                  => 'select',
        'section'               => 'vivita_biography_section',
        'label'                 => __( 'Featured Post - Select Post or Page', 'vivita' ),
        'description'           => __( 'The title and content of your selected post/page will be automatically displayed', 'vivita' ),
        'choices'               => vivita_all_posts_array( true ),
    ) );
    
    // About / Biography Section - Button Label
    $wp_customize->add_setting( 'vivita_promo_bio_button_label', array (
        'default'               => __( 'Show Me More', 'vivita' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'vivita_promo_bio_button_label', array(
        'type'                  => 'text',
        'section'               => 'vivita_biography_section',
        'label'                 => __( 'Button Label', 'vivita' ),
    ) );

// ---------------------------------------------
// Jumbotron Section
// ---------------------------------------------
$wp_customize->add_section( 'vivita_jumbotron_section', array(
    'title'                 => __( 'Jumbotron', 'vivita'),
    'description'           => __( 'Customize the front page jumbotron banner', 'vivita' ),
    'panel'                 => 'vivita_front_page_panel'
) );

    // Jumbotron Visibility Toggle
    $wp_customize->add_setting( 'vivita_jumbotron_visibility_toggle', array (
        'default'               => 'show',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'vivita_sanitize_show_hide',
    ) );
    $wp_customize->add_control( 'vivita_jumbotron_visibility_toggle', array(
        'type'                  => 'radio',
        'section'               => 'vivita_jumbotron_section',
        'label'                 => __( 'Show the jumbotron?', 'vivita' ),
        'choices'               => array(
            'show'      => __( 'Show', 'vivita' ),
            'hide'      => __( 'Hide', 'vivita' ),
    ) ) );
    
    // Jumbotron Post
    $wp_customize->add_setting( 'vivita_jumbotron_post', array (
        'default'               => 1,
        'transport'             => 'refresh',
        'sanitize_callback'     => 'vivita_sanitize_post',
    ) );
    $wp_customize->add_control( 'vivita_jumbotron_post', array(
        'type'                  => 'select',
        'section'               => 'vivita_jumbotron_section',
        'label'                 => __( 'Jumbotron Post - Select Post or Page', 'vivita' ),
        'description'           => __( 'The title of your selected post/page will be automatically displayed.<b>To change the image you need to edit the Page/Post you have selected and Set the Featured Image from the Page/Post edit screen.</b>', 'vivita' ),
        'choices'               => vivita_all_posts_array( true ),
    ) );
    
    // Slide's Dark Tint Overlay
    $wp_customize->add_setting( 'vivita_slider_dark_tint', array (
        'default'               => .25,
        'transport'             => 'refresh',
        'sanitize_callback'     => 'vivita_sanitize_overlay_decimal',
    ) );
    $wp_customize->add_control( 'vivita_slider_dark_tint', array(
        'type'                  => 'number',
        'section'               => 'vivita_jumbotron_section',
        'label'                 => __( 'Dark Tinted Slide Overlay', 'vivita' ),
        'description'           => __( 'Adjust the amount of dark tint to apply to slider images, from 0.0 for no tint to 1.0 for solid black, or anything in between', 'vivita' ),
        'input_attrs'           => array(
            'min' => .0,
            'max' => 1.0,
            'step' => .05,
    ) ) );
   
    // Jumbotron Button - Text 
    $wp_customize->add_setting( 'vivita_jumbotron_button_text', array (
        'default'               => __( 'Show Me More', 'vivita' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'vivita_jumbotron_button_text', array(
        'type'                  => 'text',
        'section'               => 'vivita_jumbotron_section',
        'label'                 => __( 'Button - Text', 'vivita' ),
        'description'           => __( 'Leaving this blank will hide the button', 'vivita' ),
    ) );
    
    // Jumbotron Button - Target = Blank?
    $wp_customize->add_setting( 'vivita_jumbotron_button_target', array (
        'default'               => 'same',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'vivita_sanitize_link_target',
    ) );
    $wp_customize->add_control( 'vivita_jumbotron_button_target', array(
        'type'                  => 'radio',
        'section'               => 'vivita_jumbotron_section',
        'label'                 => __( 'Open Button link in a new window?', 'vivita' ),
        'choices'               => array(
            'same'      => __( 'Same Window', 'vivita' ),
            'new'       => __( 'New Window', 'vivita' ),
    ) ) );
    
// ---------------------------------------------
// Homepage Widget A
// ---------------------------------------------
$wp_customize->add_section( 'vivita_home_widget_area_a_section', array(
    'title'                 => __( 'Homepage Widget Area A', 'vivita'),
    'panel'                 => 'vivita_front_page_panel'
) );

    // Toggle Visibility of Widget Area A
    $wp_customize->add_setting( 'vivita_toggle_widget_area_a', array (
        'default'               => 'show',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'vivita_sanitize_show_hide',
    ) );
    $wp_customize->add_control( 'vivita_toggle_widget_area_a', array(
        'type'                  => 'radio',
        'section'               => 'vivita_home_widget_area_a_section',
        'label'                 => __( 'Show Home Page Widget Area A?', 'vivita' ),
        'choices'               => array(
            'show'      => __( 'Show', 'vivita' ),
            'hide'      => __( 'Hide', 'vivita' ),
    ) ) );

// ---------------------------------------------
// Homepage Widget B
// ---------------------------------------------
$wp_customize->add_section( 'vivita_home_widget_area_b_section', array(
    'title'                 => __( 'Homepage Widget Area B', 'vivita'),
    'panel'                 => 'vivita_front_page_panel'
) );

    // Toggle Visibility of Widget Area B
    $wp_customize->add_setting( 'vivita_toggle_widget_area_b', array (
        'default'               => 'show',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'vivita_sanitize_show_hide',
    ) );
    $wp_customize->add_control( 'vivita_toggle_widget_area_b', array(
        'type'                  => 'radio',
        'section'               => 'vivita_home_widget_area_b_section',
        'label'                 => __( 'Show Home Page Widget Area B?', 'vivita' ),
        'choices'               => array(
            'show'      => __( 'Show', 'vivita' ),
            'hide'      => __( 'Hide', 'vivita' ),
    ) ) );

// ---------------------------------------------
// Static Front Page
// ---------------------------------------------
    $wp_customize->get_section( 'static_front_page' )->panel = 'vivita_front_page_panel';