<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Vivita
 */

get_header(); ?>

    <div id="primary" class="content-area">
        
        <main id="main" class="site-main" role="main">

            <div id="archive-content-wrapper" class="container-fluid"> 
                
                <div class="row">
                    
                    <div class="col-sm-12">
                        
                        <div id="archive-page-inner" class="container">
                    
                            <div class="row">

                                <div id="archive-content" class="col-sm-12">

                                    <?php if ( have_posts() ) : ?>

                                        <div id="archive-title-box">

                                            <h2 class="entry-title">
                                                <?php the_archive_title(); ?>
                                            </h2>

                                            <?php the_archive_description(); ?>
                                            
                                        </div>

                                        <hr>

                                        <div class="row">
                                                
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
                                                        <?php while ( have_posts() ) : the_post(); ?>

                                                            <?php get_template_part( 'template-parts/content-blog', get_post_format() ); ?>

                                                        <?php endwhile; ?>

                                                    </div>

                                                    <?php the_posts_navigation(); ?>
                                                    
                                                </div>
                                                
                                            </div>
                                        
                                            <?php if ( is_active_sidebar( 'sidebar-right' ) ) : ?>
                                                <div class="col-sm-3">
                                                    <div class="sidebar-container">

                                                        <?php get_sidebar( 'right' ); ?>

                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        
                                        </div>
                                        
                                    <?php else : ?>

                                        <?php get_template_part('template-parts/content', 'none'); ?>

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
