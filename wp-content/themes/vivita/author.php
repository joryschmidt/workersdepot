<?php
/**
 * The template for displaying Author Archive pages
 *
 * Used to display archive-type pages for posts by an author.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Vivita
 */

get_header(); ?>

    <div id="primary" class="content-area">
        
        <main id="main" class="site-main" role="main">

            <div id="author-content-wrapper" class="container-fluid">
                
                <div class="row">
                    
                    <div class="col-sm-12">
                        
                        <div id="author-page-inner" class="container">
                    
                            <div class="row">

                                <?php if ( have_posts() ) : ?>
                                
                                    <?php the_post(); ?>
                                
                                    <div class="col-sm-12">
                                        
                                        <div id="author-block">

                                            <div class="row"> 
                                            
                                                <div class="col-sm-2"></div>

                                                <div class="col-sm-8">
                                                        
                                                    <?php echo get_avatar( get_the_author_meta( 'user_email' ), 150 ); ?>

                                                    <h2 id="about-primary">
                                                        <?php echo esc_html( get_the_author_meta( 'user_firstname' ) . ' ' . get_the_author_meta( 'user_lastname' ) ); ?>
                                                    </h2>

                                                    <p id="about-secondary">
                                                        <?php echo esc_html( get_the_author_meta( 'description' ) ); ?>
                                                    </p>

                                                    <hr>
                                                    
                                                    <?php if ( get_the_author_meta( 'user_email' ) != '' ) : ?>
                                                        <a href="mailto:<?php echo esc_attr( get_the_author_meta( 'user_email' ) ); ?>">
                                                            <i class="fa fa-envelope"></i>
                                                            <?php echo esc_html( get_the_author_meta( 'user_email' ) ); ?>
                                                        </a>
                                                    <?php endif; ?>
                                                    
                                                    <?php if ( get_the_author_meta( 'user_url' ) != '' ) : ?> 
                                                        <a href="<?php echo esc_url( get_the_author_meta( 'user_url' ) ); ?>">
                                                            <i class="fa fa-home"></i>
                                                            <?php echo esc_url( get_the_author_meta( 'user_url' ) ); ?>
                                                        </a>
                                                    <?php endif; ?>

                                                </div>

                                                <div class="col-sm-2"></div>
                                                
                                            </div>
                                            
                                        </div>

                                    </div>
                                
                                    <?php rewind_posts(); ?>

                                <?php endif; ?>
                                
                                <div id="page-content" class="col-sm-12">

                                    <?php if ( have_posts() ) : ?>

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

                                        <div id="author-no-results">

                                            <h2 class="entry-title">
                                                <?php echo esc_html( get_theme_mod( 'vivita_search_no_results', __( 'Your search did not return any results.', 'vivita' ) ) ); ?>
                                            </h2>

                                        </div>

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
