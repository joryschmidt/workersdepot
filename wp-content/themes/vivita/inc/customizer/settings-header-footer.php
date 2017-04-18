<?php

// ---------------------------------------------
// Header & Footer Panel
// ---------------------------------------------
$wp_customize->add_panel( 'vivita_header_bar_panel', array (
    'title'                 => __( 'Header & Footer', 'vivita' ),
    'description'           => __( 'Customize the appearance of the header and footer', 'vivita' ),
    'priority'              => 10
) );

// ---------------------------------------------
// Social Icon Links
// ---------------------------------------------
$wp_customize->add_section( 'vivita_header_social_links_section', array(
    'title'                 => __( 'Social Icon Links', 'vivita'),
    'description'           => __( 'Customize the social icon links that appear in the header', 'vivita' ),
    'panel'                 => 'vivita_header_bar_panel'
) );

    // Show Social Section in Header?
    $wp_customize->add_setting( 'vivita_header_social_toggle', array (
        'default'               => 'show',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'vivita_sanitize_show_hide',
    ) );
    $wp_customize->add_control( 'vivita_header_social_toggle', array(
        'type'                  => 'radio',
        'section'               => 'vivita_header_social_links_section',
        'label'                 => __( 'Show the Social Icon Links in the Header?', 'vivita' ),
        'choices'               => array(
            'show'      => __( 'Show', 'vivita' ),
            'hide'      => __( 'Hide', 'vivita' ),
    ) ) );
    
    // Social Icon Style
    $wp_customize->add_setting( 'vivita_header_social_icon_style', array (
        'default'               => 'just-icons',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'vivita_sanitize_social_style',
    ) );
    $wp_customize->add_control( 'vivita_header_social_icon_style', array(
        'type'                  => 'radio',
        'section'               => 'vivita_header_social_links_section',
        'label'                 => __( 'Select the appearance/style of the social icons.', 'vivita' ),
        'choices'               => array(
            'just-icons'    => __( 'No Border (just the icons)', 'vivita' ),
            'rounded-rect'  => __( 'Rounded Rectangles', 'vivita' ),
            'bubbles'       => __( 'Bubbles', 'vivita' ),
    ) ) );
    
    // Facebook URL
    $wp_customize->add_setting( 'vivita_social_icon_facebook_url', array (
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'vivita_social_icon_facebook_url', array(
        'type'                  => 'text',
        'section'               => 'vivita_header_social_links_section',
        'label'                 => __( 'Facebook', 'vivita' ),
    ) );
    
    // Twitter URL
    $wp_customize->add_setting( 'vivita_social_icon_twitter_url', array (
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'vivita_social_icon_twitter_url', array(
        'type'                  => 'text',
        'section'               => 'vivita_header_social_links_section',
        'label'                 => __( 'Twitter', 'vivita' ),
    ) );
    
    // Google+ URL
    $wp_customize->add_setting( 'vivita_social_icon_google_url', array (
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'vivita_social_icon_google_url', array(
        'type'                  => 'text',
        'section'               => 'vivita_header_social_links_section',
        'label'                 => __( 'Google+', 'vivita' ),
    ) );
    
    // LinkedIn URL
    $wp_customize->add_setting( 'vivita_social_icon_linkedin_url', array (
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'vivita_social_icon_linkedin_url', array(
        'type'                  => 'text',
        'section'               => 'vivita_header_social_links_section',
        'label'                 => __( 'LinkedIn', 'vivita' ),
    ) );
    
    // Behance URL
    $wp_customize->add_setting( 'vivita_social_icon_behance_url', array (
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'vivita_social_icon_behance_url', array(
        'type'                  => 'text',
        'section'               => 'vivita_header_social_links_section',
        'label'                 => __( 'Behance', 'vivita' ),
    ) );
    
    // Instagram URL
    $wp_customize->add_setting( 'vivita_social_icon_instagram_url', array (
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'vivita_social_icon_instagram_url', array(
        'type'                  => 'text',
        'section'               => 'vivita_header_social_links_section',
        'label'                 => __( 'Instagram', 'vivita' ),
    ) );
    
    // Instagram URL
    $wp_customize->add_setting( 'vivita_social_icon_pinterest_url', array (
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'vivita_social_icon_pinterest_url', array(
        'type'                  => 'text',
        'section'               => 'vivita_header_social_links_section',
        'label'                 => __( 'Pinterest', 'vivita' ),
    ) );
    
    // YouTube URL
    $wp_customize->add_setting( 'vivita_social_icon_youtube_url', array (
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'vivita_social_icon_youtube_url', array(
        'type'                  => 'text',
        'section'               => 'vivita_header_social_links_section',
        'label'                 => __( 'YouTube', 'vivita' ),
    ) );
    
    // Vimeo URL
    $wp_customize->add_setting( 'vivita_social_icon_vimeo_url', array (
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'vivita_social_icon_vimeo_url', array(
        'type'                  => 'text',
        'section'               => 'vivita_header_social_links_section',
        'label'                 => __( 'Vimeo', 'vivita' ),
    ) );

    // SoundCloud URL
    $wp_customize->add_setting( 'vivita_social_icon_soundcloud_url', array (
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'vivita_social_icon_soundcloud_url', array(
        'type'                  => 'text',
        'section'               => 'vivita_header_social_links_section',
        'label'                 => __( 'SoundCloud', 'vivita' ),
    ) );

// ---------------------------------------------
// Navigation Overlay
// ---------------------------------------------
$wp_customize->add_section( 'vivita_navigation_overlay_section', array(
    'title'                 => __( 'Navigation Overlay', 'vivita'),
    'description'           => __( 'Customize the navigation menu overlay', 'vivita' ),
    'panel'                 => 'vivita_header_bar_panel'
) );

    // Navigation Overlay Title
    $wp_customize->add_setting( 'vivita_navigation_title', array (
        'default'               => __( 'Navigation', 'vivita' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'vivita_navigation_title', array(
        'type'                  => 'text',
        'section'               => 'vivita_navigation_overlay_section',
        'label'                 => __( 'Navigation Overlay Title', 'vivita' ),
    ) );
    
// ---------------------------------------------
// Footer Section
// ---------------------------------------------
$wp_customize->add_section( 'vivita_footer_section', array(
    'title'                 => __( 'Footer', 'vivita'),
    'description'           => __( 'Customize the copyright line in the footer', 'vivita' ),
    'panel'                 => 'vivita_header_bar_panel'
) );

    // Copyright Line Company Name
    $wp_customize->add_setting( 'vivita_footer_copyright', array (
        'default'               => get_bloginfo( 'name' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'vivita_footer_copyright', array(
        'type'                  => 'text',
        'section'               => 'vivita_footer_section',
        'label'                 => __( 'Footer Text', 'vivita' ),
        'description'           => __( 'Leave blank to hide this text', 'vivita' ),
    ) );   
