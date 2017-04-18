<?php

// ---------------------------------------------
// Single Section
// ---------------------------------------------

$wp_customize->add_section( 'vivita_single_post_layout_section', array (
    'title'                 => __( 'Single Post', 'vivita' ),
    'description'           => __( 'Customize the layout of your single post template', 'vivita' ),
    'priority'              => 10
) );

// ---------------------------------------------
// Single Post Layout Section
// ---------------------------------------------
    
    // Single Posts - Show Date Posted?
    $wp_customize->add_setting( 'vivita_single_show_date', array (
        'default'               => 'show',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'vivita_sanitize_show_hide',
    ) );
    $wp_customize->add_control( 'vivita_single_show_date', array(
        'type'                  => 'radio',
        'section'               => 'vivita_single_post_layout_section',
        'label'                 => __( 'Show Date Posted on single posts?', 'vivita' ),
        'choices'               => array(
            'show'      => __( 'Show', 'vivita' ),
            'hide'      => __( 'Hide', 'vivita' ),
    ) ) );

    // Single Posts - Show Author?
    $wp_customize->add_setting( 'vivita_single_show_author', array (
        'default'               => 'show',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'vivita_sanitize_show_hide',
    ) );
    $wp_customize->add_control( 'vivita_single_show_author', array(
        'type'                  => 'radio',
        'section'               => 'vivita_single_post_layout_section',
        'label'                 => __( 'Show Author on single posts?', 'vivita' ),
        'choices'               => array(
            'show'      => __( 'Show', 'vivita' ),
            'hide'      => __( 'Hide', 'vivita' ),
    ) ) );

    // Single Posts - Show Author "By"?
    $wp_customize->add_setting( 'vivita_single_show_author_by', array (
        'default'               => 'show',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'vivita_sanitize_show_hide',
    ) );
    $wp_customize->add_control( 'vivita_single_show_author_by', array(
        'type'                  => 'radio',
        'section'               => 'vivita_single_post_layout_section',
        'label'                 => __( 'Show the word "by" before author link?', 'vivita' ),
        'choices'               => array(
            'show'      => __( 'Show', 'vivita' ),
            'hide'      => __( 'Hide', 'vivita' ),
    ) ) );

    // Single Posts - Show Category?
    $wp_customize->add_setting( 'vivita_single_show_single_category', array (
        'default'               => 'show',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'vivita_sanitize_show_hide',
    ) );
    $wp_customize->add_control( 'vivita_single_show_single_category', array(
        'type'                  => 'radio',
        'section'               => 'vivita_single_post_layout_section',
        'label'                 => __( 'Show the post category?', 'vivita' ),
        'choices'               => array(
            'show'      => __( 'Show', 'vivita' ),
            'hide'      => __( 'Hide', 'vivita' ),
    ) ) );