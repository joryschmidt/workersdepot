<?php

// ---------------------------------------------
// Site Appearance Panel
// ---------------------------------------------
$wp_customize->add_panel( 'vivita_appearance_panel', array (
    'title'                 => __( 'Appearance', 'vivita' ),
    'description'           => __( 'Customize your site colors, fonts and other appearance settings', 'vivita' ),
    'priority'              => 10
) );

// ---------------------------------------------
// Colors
// ---------------------------------------------
$wp_customize->add_section( 'vivita_colors_section', array(
    'title'                 => __( 'Colors', 'vivita'),
    'description'           => __( 'Customize the colors in use on your site', 'vivita' ),
    'panel'                 => 'vivita_appearance_panel'
) );

    // Color Skin Selector
    $wp_customize->add_setting( 'vivita_theme_color_skin', array (
        'default'               => 'blueberry',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'vivita_sanitize_skin_color',
    ) );
    $wp_customize->add_control( 'vivita_theme_color_skin', array(
        'type'                  => 'radio',
        'section'               => 'vivita_colors_section',
        'label'                 => __( 'Select the theme skin color.', 'vivita' ),
        'choices'               => array(
            'blueberry'         => __( 'Blueberry', 'vivita' ),
            'lilac'             => __( 'Lilac', 'vivita' ),
            'pumpkin-spice'     => __( 'Pumpkin Spice', 'vivita' ),
            'freshwater'        => __( 'Freshwater', 'vivita' ),
            'wintergreen'       => __( 'Wintergreen', 'vivita' ),
            'autumn'            => __( 'Autumn', 'vivita' ),
            'jelly'             => __( 'Jelly', 'vivita' ),
            'shade'             => __( 'Shade', 'vivita' ),
    ) ) );

// ---------------------------------------------
// Fonts
// ---------------------------------------------
$wp_customize->add_section( 'vivita_fonts_section', array(
    'title'                 => __( 'Fonts', 'vivita'),
    'description'           => __( 'Customize the fonts in use on your site', 'vivita' ),
    'panel'                 => 'vivita_appearance_panel'
) );

    // Primary Font Family
    $wp_customize->add_setting( 'vivita_font_primary', array (
        'default'               => 'Raleway, sans-serif',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'vivita_sanitize_font'
    ) );
    $wp_customize->add_control( 'vivita_font_primary', array(
        'type'                  => 'select',
        'section'               => 'vivita_fonts_section',
        'label'                 => __( 'Primary Font', 'vivita' ),
        'description'           => __( 'Select the primary font of the theme', 'vivita' ),
        'choices'               => vivita_fonts()
    ) );

    // Secondary Font Family
    $wp_customize->add_setting( 'vivita_font_secondary', array (
        'default'               => 'Catamaran, sans-serif',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'vivita_sanitize_font'
    ) );
    $wp_customize->add_control( 'vivita_font_secondary', array(
        'type'                  => 'select',
        'section'               => 'vivita_fonts_section',
        'label'                 => __( 'Secondary Font', 'vivita' ),
        'description'           => __( 'Select the secondary font of the theme', 'vivita' ),
        'choices'               => vivita_fonts()
    ) );

    // Menu Items Font Family
    $wp_customize->add_setting( 'vivita_font_menu', array (
        'default'               => 'Catamaran, sans-serif',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'vivita_sanitize_font'
    ) );
    $wp_customize->add_control( 'vivita_font_menu', array(
        'type'                  => 'select',
        'section'               => 'vivita_fonts_section',
        'label'                 => __( 'Menu Items Font', 'vivita' ),
        'description'           => __( 'Set the font family for the navigation menu items', 'vivita' ),
        'choices'               => vivita_fonts()
    ) );

    // Site Title Font Size
    $wp_customize->add_setting( 'vivita_title_font_size', array (
        'default'               => 36,
        'transport'             => 'refresh',
        'sanitize_callback'     => 'vivita_sanitize_integer',
    ) );
    $wp_customize->add_control( 'vivita_title_font_size', array(
        'type'                  => 'number',
        'section'               => 'vivita_fonts_section',
        'label'                 => __( 'Site Title Font Size', 'vivita' ),
        'description'           => __( 'Adjust the font size of the site title in pixels', 'vivita' ),
        'input_attrs'           => array(
            'min' => 18,
            'max' => 64,
            'step' => 2,
    ) ) );
    
    // Font Size for Navigation Menu
    $wp_customize->add_setting( 'vivita_nav_menu_font_size', array (
        'default'               => 10,
        'transport'             => 'refresh',
        'sanitize_callback'     => 'vivita_sanitize_integer',
    ) );
    $wp_customize->add_control( 'vivita_nav_menu_font_size', array(
        'type'                  => 'number',
        'section'               => 'vivita_fonts_section',
        'label'                 => __( 'Navigation Menu Font Size', 'vivita' ),
        'description'           => __( 'Adjust the font size of the navigation menu items in pixels', 'vivita' ),
        'input_attrs'           => array(
            'min' => 8,
            'max' => 22,
            'step' => 2,
    ) ) );
    
    // Body Font Size
    $wp_customize->add_setting( 'vivita_font_body_size', array (
        'default'               => 14,
        'transport'             => 'refresh',
        'sanitize_callback'     => 'vivita_sanitize_integer',
    ) );
    $wp_customize->add_control( 'vivita_font_body_size', array(
        'type'                  => 'number',
        'section'               => 'vivita_fonts_section',
        'label'                 => __( 'Body Text Font Size', 'vivita' ),
        'description'           => __( 'Adjust the font size of most generic text content in pixels', 'vivita' ),
        'input_attrs'           => array(
            'min' => 10,
            'max' => 36,
            'step' => 2,
    ) ) );
    