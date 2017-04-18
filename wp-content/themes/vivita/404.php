<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Vivita
 */

get_header(); ?>

    <div id="primary" class="content-area">

        <main id="main" class="site-main" role="main">
            
            <div id="page-content-wrapper" class="container-fluid">
                
                <div class="row">
                    
                    <div class="col-sm-12">
                        
                        <div id="page-content-inner" class="container">
            
                            <div class="row">
           
                                <div id="error-page-wrapper" class="col-md-12">

                                    <section class="error-404 not-found">

                                        <header class="page-header">

                                            <h1 class="page-title">
                                                <?php echo esc_html_e( 'Oops!', 'vivita' ); ?>
                                            </h1>

                                            <p class="page-subtitle">
                                                <?php echo esc_html_e( 'It looks like nothing was found at this location, please check the address and try again!', 'vivita' ); ?>
                                            </p>
                                            
                                            <?php get_search_form(); ?>

                                        </header><!-- .page-header -->

                                    </section><!-- .error-404 -->

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
