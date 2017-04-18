<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Vivita
 */

get_header(); ?>

<div id="primary" class="content-area">

    <main id="main" class="site-main" role="main">

        <div id="search-content-wrapper" class="container-fluid">
                
            <div class="row">

                <div class="col-sm-12">

                    <div id="search-page-inner" class="container">

                        <div class="row">

                            <div class="col-sm-12">

                                <div id="search-block">

                                    <div class="row"> 

                                        <div class="col-sm-2"></div>

                                        <div class="col-sm-8">

                                            <div id="blog-title-box">

                                                <h2 class="entry-title">
                                                    <?php printf( esc_html__( 'Search Results for: %s', 'vivita' ), '<span>' . get_search_query() . '</span>' ); ?>
                                                </h2>

                                            </div>

                                            <?php get_search_form(); ?>

                                        </div>

                                        <div class="col-sm-2"></div>

                                    </div>

                                </div>

                            </div>
                            
                            <div id="page-content" class="col-sm-12">
                                
                                <div class="row">
                            
                                    <?php if ( is_active_sidebar( 'sidebar-left' ) ) : ?>
                                        <div class="sidebar-container col-sm-3">

                                            <?php get_sidebar( 'left' ); ?>

                                        </div>
                                    <?php endif; ?>

                                    <div class="col-sm-<?php echo intval( vivita_main_width() ); ?>">

                                        <?php if ( have_posts() ) : ?>

                                            <div class="vivita-blog-content">

                                                <div id="masonry-blog-wrapper">

                                                    <div class="grid-sizer"></div>
                                                    <div class="gutter-sizer"></div>

                                                    <?php

                                                    /* Start the Loop */
                                                    while ( have_posts() ) : the_post();

                                                        get_template_part( 'template-parts/content', 'blog' );

                                                    endwhile;

                                                    ?>

                                                </div><!-- #masonry-blog-wrapper -->

                                                <?php the_posts_navigation(); ?>

                                            </div><!-- #vivita-blog-content -->

                                        <?php else : ?>

                                            <div id="search-no-results">
                                                
                                                <h2 class="entry-title">
                                                    <?php echo esc_html( get_theme_mod( 'vivita_search_no_results', __( 'Your search did not return any results.', 'vivita' ) ) ); ?>
                                                </h2>
                                                
                                            </div>
                                            
                                        <?php endif; ?>
                                            
                                    </div>

                                    <?php if ( is_active_sidebar( 'sidebar-right' ) ) : ?>
                                        <div class="sidebar-container col-sm-3">

                                            <?php get_sidebar( 'right' ); ?>

                                        </div>
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

<?php
get_footer();
