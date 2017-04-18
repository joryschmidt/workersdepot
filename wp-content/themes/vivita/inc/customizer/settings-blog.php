<?php

// ---------------------------------------------
// Blog Section
// ---------------------------------------------

$wp_customize->add_section( 'vivita_blog_layout_section', array (
    'title'                 => __( 'Blog', 'vivita' ),
    'description'           => __( 'Customize the layout of your blog template', 'vivita' ),
    'priority'              => 10
) );

    // Blog Section Title Toggle
    $wp_customize->add_setting( 'vivita_blog_title_toggle', array (
        'default'               => 'hide',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'vivita_sanitize_show_hide',
    ) );
    $wp_customize->add_control( 'vivita_blog_title_toggle', array(
        'type'                  => 'radio',
        'section'               => 'vivita_blog_layout_section',
        'label'                 => __( 'Show Blog Roll Title?', 'vivita' ),
        'choices'               => array(
            'show'      => __( 'Show', 'vivita' ),
            'hide'      => __( 'Hide', 'vivita' ),
    ) ) );

    // Blog Section Title
    $wp_customize->add_setting( 'vivita_blog_title', array (
        'default'               => __( 'Blog', 'vivita' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'vivita_blog_title', array(
        'type'                  => 'text',
        'section'               => 'vivita_blog_layout_section',
        'label'                 => __( 'Blog Roll Title', 'vivita' ),
    ) );
    
    // Blog Roll - Show Author Tab
    $wp_customize->add_setting( 'vivita_blog_roll_author', array (
        'default'               => 'show',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'vivita_sanitize_show_hide',
    ) );
    $wp_customize->add_control( 'vivita_blog_roll_author', array(
        'type'                  => 'radio',
        'section'               => 'vivita_blog_layout_section',
        'label'                 => __( 'Show Author tab on posts in the blog roll?', 'vivita' ),
        'choices'               => array(
            'show'      => __( 'Show', 'vivita' ),
            'hide'      => __( 'Hide', 'vivita' ),
    ) ) );
    
    // Blog Roll - Show Post Date Tab
    $wp_customize->add_setting( 'vivita_blog_roll_date', array (
        'default'               => 'show',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'vivita_sanitize_show_hide',
    ) );
    $wp_customize->add_control( 'vivita_blog_roll_date', array(
        'type'                  => 'radio',
        'section'               => 'vivita_blog_layout_section',
        'label'                 => __( 'Show Post Date tab on posts in the blog roll?', 'vivita' ),
        'choices'               => array(
            'show'      => __( 'Show', 'vivita' ),
            'hide'      => __( 'Hide', 'vivita' ),
    ) ) );
    
    // Blog Roll - Show Author Tab
    $wp_customize->add_setting( 'vivita_blog_roll_comments', array (
        'default'               => 'show',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'vivita_sanitize_show_hide',
    ) );
    $wp_customize->add_control( 'vivita_blog_roll_comments', array(
        'type'                  => 'radio',
        'section'               => 'vivita_blog_layout_section',
        'label'                 => __( 'Show Comments tab on posts in the blog roll?', 'vivita' ),
        'choices'               => array(
            'show'      => __( 'Show', 'vivita' ),
            'hide'      => __( 'Hide', 'vivita' ),
    ) ) );
    
    // Blog Section Title
    $wp_customize->add_setting( 'vivita_frontpage_blog_read_more', array (
        'default'               => __( 'Read More', 'vivita' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'vivita_frontpage_blog_read_more', array(
        'type'                  => 'text',
        'section'               => 'vivita_blog_layout_section',
        'label'                 => __( 'Frontpage Blog Template - "Read More" Button', 'vivita' ),
        'des'                 => __( 'When using the Frontpage Blog page template, six posts will show by default, and this button will link to the page set as your blog', 'vivita' ),
    ) );