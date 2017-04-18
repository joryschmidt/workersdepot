<?php
/**
 * Template Name: Frontpage Blog
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Vivita
 */
get_header(); 
?>

<div id="primary" class="content-area">
    
    <main id="main" class="site-main" role="main">
        
        <?php if ( get_theme_mod( 'vivita_promo_bio_visibility_toggle', 'show' ) == 'show' ) { do_action( 'vivita_promo_bio' ); } ?>

        <?php if ( get_theme_mod( 'vivita_jumbotron_visibility_toggle', 'show' ) == 'show' ) { do_action( 'vivita_jumbotron' ); } ?>

        <?php do_action( 'vivita_homepage_widget_areas' ); ?>

        <div id="front-page-content" class="container-fluid">

            <div class="row">
                
                <div class="col-sm-12">
                    
                    <div id="blog-page-inner" class="container">

                        <div class="row">
                            
                            <div id="front-page-blog" class="col-sm-<?php echo $front != 'posts' ? intval( vivita_main_width() ) : intval( '12' ); ?>">

                                <div class="row">

                                    <?php 
                                        
                                    $args = array(
                                        'post_type'         => 'post',
                                        'post_status'       => 'publish',
                                        'posts_per_page'    => 6,
                                    );

                                    ?>

                                    <?php $the_query = new WP_Query( $args ); ?>
                                    
                                    <?php if ( $the_query->have_posts() ) : ?>

                                        <?php if ( is_home() && !is_front_page() ) : ?>

                                            <header>
                                                <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                                            </header>

                                        <?php endif; ?>

                                        <?php if ( get_theme_mod( 'vivita_blog_title_toggle', 'hide' ) == 'show' ) : ?> 

                                            <div class="col-sm-12">
                                                <div id="blog-title-box">

                                                    <h2 class="entry-title">
                                                        <?php echo esc_html( get_theme_mod( 'vivita_blog_title', __( 'Blog', 'vivita' ) ) ); ?>
                                                    </h2>
                                                    
                                                    <hr>
                                                    
                                                </div>
                                            </div>
                                    
                                            <div class="clear"></div>

                                        <?php endif; ?>

                                        <?php if ( is_active_sidebar( 'sidebar-left' ) ) : ?>
                                            <div class="col-sm-3">
                                                <div class="sidebar-container">

                                                    <?php get_sidebar( 'left' ); ?>

                                                </div>
                                            </div>
                                        <?php endif; ?>    
                                            
                                        <div class="col-sm-<?php echo intval( vivita_main_width() ); ?>">

                                            <div class="vivita-blog-content">
                                                    
                                                <div id="masonry-blog-wrapper">
                                                        
                                                    <div class="grid-sizer"></div>
                                                    <div class="gutter-sizer"></div>

                                                    <?php /* Start the Loop */ ?>
                                                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                                                        <?php get_template_part( 'template-parts/content-blog', get_post_format() ); ?>

                                                    <?php endwhile; ?>

                                                </div>

                                                <?php if ( get_option( 'page_for_posts' ) && get_theme_mod( 'vivita_frontpage_blog_read_more', __( 'Read more', 'vivita' ) ) != '' ) : ?> 
                                                
                                                    <div class="pagination-links"> 
                                                        <a id="blog-template-read-more" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">
                                                            <?php echo get_theme_mod( 'vivita_frontpage_blog_read_more', __( 'Read More', 'vivita' ) ); ?>
                                                        </a>
                                                    </div>

                                                <?php endif; ?>
                                            
                                            </div>

                                        </div>

                                        <?php if ( is_active_sidebar( 'sidebar-right' ) ) : ?>
                                            <div class="col-sm-3">
                                                <div class="sidebar-container">

                                                    <?php get_sidebar( 'right' ); ?>

                                                </div>
                                            </div>
                                        <?php endif; ?> 
                                            
                                    <?php else : ?>

                                        <?php get_template_part('template-parts/content', 'none'); ?>

                                    <?php endif; ?>

                                </div>

                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>

            </div>

        </div>
            
    </main><!-- #main -->
    
</div><!-- #primary -->

<?php get_footer(); ?>      