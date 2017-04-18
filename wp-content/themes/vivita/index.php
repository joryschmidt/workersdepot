<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Vivita
 */

$sidebar_override = get_post_meta( get_option( 'page_for_posts' ), 'vivita_sidebar_location', true ) ? get_post_meta( get_option( 'page_for_posts' ), 'vivita_sidebar_location', true ) : 'vivita_default';

get_header(); ?>

    <div id="primary" class="content-area">
        
        <main id="main" class="site-main" role="main">

            <div id="blog-content-wrapper" class="container-fluid">
                
                <div class="row">
                    
                    <div class="col-sm-12">
                        
                        <div id="blog-page-inner" class="container">
                    
                            <div class="row">

                                <div id="page-content" class="col-sm-12">

                                    <?php if ( have_posts() ) : ?>

                                        <?php if ( get_theme_mod( 'vivita_blog_title_toggle', 'hide' ) == 'show' ) : ?> 

                                            <div id="blog-title-box">

                                                <h2 class="entry-title">
                                                    <?php echo esc_html( get_theme_mod( 'vivita_blog_title', __( 'Blog', 'vivita' ) ) ); ?>
                                                </h2>

                                            </div>

                                            <hr>

                                        <?php endif; ?>
                                            
                                            <div class="row">
                                                
                                                <?php if ( ( $sidebar_override == 'vivita_left' || $sidebar_override == 'vivita_leftright' || $sidebar_override == 'vivita_default' ) && is_active_sidebar( 'sidebar-left' ) ) : ?>
                                                    <div class="col-sm-3">
                                                        <div class="sidebar-container">

                                                            <?php get_sidebar( 'left' ); ?>

                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                
                                                <div class="col-sm-<?php echo intval( vivita_main_width( $sidebar_override ) ); ?>">

                                                    <div class="vivita-blog-content">

                                                        <div id="masonry-blog-wrapper">

                                                            <div class="grid-sizer"></div>
                                                            <div class="gutter-sizer"></div>

                                                            <?php /* Start the Loop */ ?>
                                                            <?php while ( have_posts() ) : the_post(); ?>

                                                                <?php get_template_part( 'template-parts/content-blog', get_post_format() ); ?>

                                                            <?php endwhile; ?>

                                                        </div>

                                                        <div class="pagination-links"> 
                                                            <?php the_posts_pagination( array( 'mid_size' => 1 ) ); ?>
                                                        </div>
                                                            
                                                    </div>
                                                    
                                                </div>
                                                
                                                <?php if ( ( $sidebar_override == 'vivita_right' || $sidebar_override == 'vivita_leftright' || $sidebar_override == 'vivita_default' ) && is_active_sidebar( 'sidebar-right' ) ) : ?>
                                                    <div class="col-sm-3">
                                                        <div class="sidebar-container">

                                                            <?php get_sidebar( 'right' ); ?>

                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                
                                            </div>
                                                
                                    <?php else : ?>

                                        <?php get_template_part( 'template-parts/content', 'none' ); ?>

                                    <?php endif; ?>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                
            </div>

        </main><!-- #main -->
                
    </div><!-- #primary -->

<?php
get_footer();
