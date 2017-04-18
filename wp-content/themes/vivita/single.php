<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Vivita
 */

get_header(); ?>

    <div id="primary" class="content-area">

        <main id="main" class="site-main" role="main">

            <div id="post-content-wrapper" class="container-fluid">
                
                <div class="row">
                    
                    <div class="col-sm-12">
                        
                        <div id="post-content-inner" class="container">
            
                            <div class="row">
            
                                <?php
                                while ( have_posts() ) : the_post();

                                    get_template_part( 'template-parts/content', 'single' );

                                endwhile; // End of the loop.
                                ?>
                                
                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>

        </main><!-- #main -->

    </div><!-- #primary -->

<?php
get_footer();
