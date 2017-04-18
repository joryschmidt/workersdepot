<?php

// ---------------------------------------------
// Site Logo & Title Panel
// ---------------------------------------------
$wp_customize->add_section( 'title_tagline', array(
  'title'    => __( 'Site Logo & Title', 'vivita' ),
  'priority' => 5,
) );

    // Logo / Portrait Height
    $wp_customize->add_setting( 'vivita_custom_logo_height', array (
        'default'               => 150,
        'transport'             => 'refresh',
        'sanitize_callback'     => 'vivita_sanitize_integer',
    ) );
    $wp_customize->add_control( 'vivita_custom_logo_height', array(
        'type'                  => 'number',
        'section'               => 'title_tagline',
        'label'                 => __( 'Custom Logo Height', 'vivita' ),
        'description'           => __( 'Set in pixels. Width will automatically maintain the image aspect ratio.', 'vivita' ),
        'input_attrs'           => array(
            'min' => 30,
            'max' => 300,
            'step' => 10,
    ) ) );
    
    // Logo / Portrait Location
    $wp_customize->add_setting( 'vivita_logo_portrait_location', array (
        'default'               => 'header',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'vivita_sanitize_logo_portrait_location',
    ) );
    $wp_customize->add_control( 'vivita_logo_portrait_location', array(
        'type'                  => 'radio',
        'section'               => 'title_tagline',
        'label'                 => __( 'Where would you like your logo or portrait image to be shown?', 'vivita' ),
        'choices'               => array(
            'header'    => __( 'Site Header', 'vivita' ),
            'promo'     => __( 'Featured Post Section', 'vivita' ),
    ) ) );

    // Logo / Portrait Style
    $wp_customize->add_setting( 'vivita_logo_portrait_crop_style', array (
        'default'               => 'default',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'vivita_sanitize_logo_portrait_crop',
    ) );
    $wp_customize->add_control( 'vivita_logo_portrait_crop_style', array(
        'type'                  => 'radio',
        'section'               => 'title_tagline',
        'label'                 => __( 'Would you like your image to be output "as is", or cropped to a shape?', 'vivita' ),
        'choices'               => array(
            'default'   => __( 'Unmodified', 'vivita' ),
            'circle'    => __( 'Circle Cropped', 'vivita' ),
            'rounded'   => __( 'Rounded Rectangle Cropped', 'vivita' ),
    ) ) );