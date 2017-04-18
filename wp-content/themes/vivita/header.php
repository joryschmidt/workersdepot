<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Vivita
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    
    <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'vivita' ); ?></a>

    <div id="menu-overlay-wrapper">
    
        <div id="menu-overlay">

            <div class="inner">

                <?php if ( get_theme_mod( 'vivita_navigation_title', __( 'Navigation', 'vivita' ) ) != '' ) : ?>

                    <div id="menu-overlay-header">

                        <h3 class="navigation-title">
                            <?php esc_html( get_theme_mod( 'vivita_navigation_title', __( 'Navigation', 'vivita' ) ) ); ?>
                        </h3>

                    </div>

                <?php endif; ?>

                <nav class="main-nav main-navigation">

                    <?php if ( has_nav_menu( 'primary' ) ) : ?>

                        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>

                    <?php else : ?>

                        <?php if ( current_user_can( 'edit_theme_options' ) ) : ?>
                    
                            <div class="menu-testing-menu-container">

                                <ul id="primary-menu" class="menu">

                                    <li class="menu-item menu-item-type-custom menu-item-object-custom">

                                        <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>">
                                           <?php echo esc_html( __( 'Add a Primary Menu?', 'vivita' ) ); ?>
                                        </a>

                                    </li>

                                </ul>

                            </div>

                        <?php endif; ?>
                    
                    <?php endif; ?>

                </nav>

            </div>

        </div>
        
    </div>
    
    <header id="masthead" class="site-header" role="banner">
           
        <div id="theme-header">
            
            <div id="site-branding">
                    
                <div class="branding-content">

                    <?php if ( function_exists( 'has_custom_logo' ) && has_custom_logo() && get_theme_mod( 'vivita_logo_portrait_location', 'header' ) == 'header' ) :

                        the_custom_logo();

                    endif; ?>

                    <a class="site-title" href="<?php echo esc_url( home_url() ); ?>">
                        <?php esc_html( bloginfo( 'name' ) ); ?>
                    </a>

                    <p class="site-tagline">
                        <?php esc_html( bloginfo( 'description' ) ); ?>
                    </p>

                    <?php if ( get_theme_mod( 'vivita_header_social_toggle', 'show' ) == 'show' ) : ?>

                        <div id="social-area-wrapper">

                            <div id="social-container">

                                <?php if ( get_theme_mod( 'vivita_social_icon_facebook_url', '' ) != '' ) : ?>
                                    <a href="<?php echo esc_url( get_theme_mod( 'vivita_social_icon_facebook_url', '' ) ); ?>">
                                        <div class="social-bubble">
                                            <i class="fa fa-facebook"></i>
                                        </div>
                                    </a>
                                <?php endif; ?>

                                <?php if ( get_theme_mod( 'vivita_social_icon_twitter_url', '' ) != '' ) : ?>
                                    <a href="<?php echo esc_url( get_theme_mod( 'vivita_social_icon_twitter_url', '' ) ); ?>">
                                        <div class="social-bubble">
                                            <i class="fa fa-twitter"></i>
                                        </div>
                                    </a>
                                <?php endif; ?>

                                <?php if ( get_theme_mod( 'vivita_social_icon_google_url', '' ) != '' ) : ?>
                                    <a href="<?php echo esc_url( get_theme_mod( 'vivita_social_icon_google_url', '' ) ); ?>">
                                        <div class="social-bubble">
                                            <i class="fa fa-google-plus"></i>
                                        </div>
                                    </a>
                                <?php endif; ?>

                                <?php if ( get_theme_mod( 'vivita_social_icon_linkedin_url', '' ) != '' ) : ?>
                                    <a href="<?php echo esc_url( get_theme_mod( 'vivita_social_icon_linkedin_url', '' ) ); ?>">
                                        <div class="social-bubble">
                                            <i class="fa fa-linkedin"></i>
                                        </div>
                                    </a>
                                <?php endif; ?>

                                <?php if ( get_theme_mod( 'vivita_social_icon_behance_url', '' ) != '' ) : ?>
                                    <a href="<?php echo esc_url( get_theme_mod( 'vivita_social_icon_behance_url', '' ) ); ?>">
                                        <div class="social-bubble">
                                            <i class="fa fa-behance"></i>
                                        </div>
                                    </a>
                                <?php endif; ?>

                                <?php if ( get_theme_mod( 'vivita_social_icon_instagram_url', '' ) != '' ) : ?>
                                    <a href="<?php echo esc_url( get_theme_mod( 'vivita_social_icon_instagram_url', '' ) ); ?>">
                                        <div class="social-bubble">
                                            <i class="fa fa-instagram"></i>
                                        </div>
                                    </a>
                                <?php endif; ?>

                                <?php if ( get_theme_mod( 'vivita_social_icon_pinterest_url', '' ) != '' ) : ?>
                                    <a href="<?php echo esc_url( get_theme_mod( 'vivita_social_icon_pinterest_url', '' ) ); ?>">
                                        <div class="social-bubble">
                                            <i class="fa fa-pinterest-p"></i>
                                        </div>
                                    </a>
                                <?php endif; ?>

                                <?php if ( get_theme_mod( 'vivita_social_icon_youtube_url', '' ) != '' ) : ?>
                                    <a href="<?php echo esc_url( get_theme_mod( 'vivita_social_icon_youtube_url', '' ) ); ?>">
                                        <div class="social-bubble">
                                            <i class="fa fa-youtube-play"></i>
                                        </div>
                                    </a>
                                <?php endif; ?>

                                <?php if ( get_theme_mod( 'vivita_social_icon_vimeo_url', '' ) != '' ) : ?>
                                    <a href="<?php echo esc_url( get_theme_mod( 'vivita_social_icon_vimeo_url', '' ) ); ?>">
                                        <div class="social-bubble">
                                            <i class="fa fa-vimeo"></i>
                                        </div>
                                    </a>
                                <?php endif; ?>
                                
                                <?php if ( get_theme_mod( 'vivita_social_icon_soundcloud_url', '' ) != '' ) : ?>
                                    <a href="<?php echo esc_url( get_theme_mod( 'vivita_social_icon_soundcloud_url', '' ) ); ?>">
                                        <div class="social-bubble">
                                            <i class="fa fa-soundcloud"></i>
                                        </div>
                                    </a>
                                <?php endif; ?>

                            </div>

                        </div>

                    <?php endif; ?>
                    
                </div>
                    
            </div>
            
            <div id="primary-menu-toggle">
                <span id="menu-open" class="fa fa-bars"></span>
                <span id="menu-close" class="fa fa-close"></span>
            </div>
            
        </div>

    </header><!-- #masthead -->

    <div id="content" class="site-content">
