<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package ProfitMag
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
    <?php

    $theme_options = profit_get_theme_options();
    ?>

    <div id="page" class="hfeed site">

       <header id="masthead" class="site-header clearfix" role="banner">
        <div class="top-header-block clearfix">
            <div class="wrapper">
                <?php 
                if( array_key_exists('enable_latest_news', $theme_options) && $theme_options['enable_latest_news'] == 1 ): 
                    $recent_args = array(
                        'numberposts' => 5,
                        'post_status' => 'publish',      
                        );
                $recent_posts = wp_get_recent_posts( $recent_args );
                if( !empty( $recent_posts ) ):
                    ?>
                <div class="header-latest-posts f-left">                                                                    
                    <div class="latest-post-title"><?php esc_html__('latest post','profitmag');?></div>
                    <div class="latest-post-content">
                     <?php 
                     $recent_args = array(
                        'numberposts' => 5,
                        'post_status' => 'publish',      
                        );
                     $recent_posts = wp_get_recent_posts( $recent_args );
                     if( !empty( $recent_posts ) ):
                        ?>

                    <ul id="js-latest" class="js-hidden">                        
                        <?php foreach( $recent_posts as $recent ): ?>

                            <li><a href="<?php echo esc_url( get_permalink( $recent["ID"] ) ); ?>" title="<?php echo esc_attr( $recent['post_title'] ); ?>"><?php echo esc_html( $recent['post_title'] ); ?></a></li>

                        <?php endforeach; ?>
                    </ul>

                    <?php                    
                    endif; 
                    ?>
                </div>
            </div> <!-- .header-latest-posts -->
            <?php  
            endif;                  
            endif; 
            ?>

            <div class="right-header f-right">
                <?php
                if( $theme_options['profitmag_social_op_setting'] == 0 ) {
                    do_action( 'profitmag_social_links' );   
                }
                ?>
            </div>
        </div>          
    </div><!-- .top-header-block -->

    <div class="wrapper header-wrapper clearfix">
      <div class="header-container"> 



        <div class="site-branding clearfix">
         <div class="site-logo f-left">

            <?php

            $logo_options = $theme_options['profitmag_logo_options'];   

            if( 'disable' !== $logo_options ){ 

                if( 'logo' == $logo_options ){ 

                    if ( has_custom_logo() ) {
                        the_custom_logo();
                    }
                }

                if( 'title' === $logo_options ){ ?>

                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-title">

                    <?php bloginfo( 'name' ); ?>
                </a> 
                <?php 
                if( get_bloginfo( 'description' ) ){ ?>

                <p class="site-description"><?php bloginfo( 'description' ); ?></p>

                <?php
            }                                     

        } 
    }
    ?>

</div>

<?php if( !empty( $theme_options['profitmag_header_ads_setting'] ) && $theme_options['profitmag_header_ads_setting'] != '' ): ?>
 <div class="header-ads f-right">
    <?php echo wp_specialchars_decode($theme_options['profitmag_header_ads_setting'], '"'); ?>
</div>
<?php endif; ?>

</div>

<?php 
$nav_class = ( 1 == $theme_options['profitmag_homeicon_setting'] ) ? "home-nav-icon" : '';
?>

<nav id="site-navigation" class="main-navigation <?php echo esc_attr($nav_class); ?> clearfix <?php do_action( 'profitmag_menu_alignment' ); ?>" role="navigation" >
 <div class="desktop-menu clearfix">
    <?php 
    if ( 1 == $theme_options['profitmag_homeicon_setting'] ) {
        if ( is_front_page() ) {
            $icon_class = 'home-icon icon-active';
        } else {
            $icon_class = 'home-icon';
        }
        ?>
        <div class="<?php echo esc_attr( $icon_class ); ?>">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><i class="fa fa-home"></i></a>
        </div>
        <?php
    }

    wp_nav_menu( array( 'theme_location' => 'primary', 'fallback_cb' => 'profitmag_default_menu_fallback') ); ?>

    <div class="search-block">
        <?php if( !empty( $theme_options['profitmag_search_setting']) && $theme_options['profitmag_search_setting'] == 1 ): ?>
            <?php echo get_search_form(); ?>
        <?php endif; ?>
    </div>
</div>
<div class="responsive-slick-menu clearfix"></div>

</nav><!-- #site-navigation -->

</div> <!-- .header-container -->
</div><!-- header-wrapper-->

</header><!-- #masthead -->


<div class="wrapper content-wrapper clearfix">

    <div class="slider-feature-wrap clearfix">
        <!-- Slider -->
        <?php do_action( 'profitmag_slider' ); ?>

        <!-- Featured Post Beside Slider -->
        <?php do_action( 'profitmag_featured_post_beside' ); ?>

        <?php
        if(is_home() || is_front_page() ){
           $profitmag_content_id = "home-content";
       }else{
           $profitmag_content_id ="content";
       } 
       ?>
   </div>    
   <div id="<?php echo esc_attr($profitmag_content_id); ?>" class="site-content">

