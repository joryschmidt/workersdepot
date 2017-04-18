<?php
/**
 * Template part for displaying front page content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Vivita
 */
?>

<div class="row">

    <div class="col-sm-12">
        
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
            <div id="frontpage-page">
            
                <header class="entry-header">
                    <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
                </header><!-- .entry-header -->

                <hr>
                
                <div class="entry-content">
                    
                    <?php the_content(); ?>
                    
                    <?php
                        wp_link_pages( array(
                                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'vivita' ),
                                'after'  => '</div>',
                        ) );
                    ?>
                    
                </div><!-- .entry-content -->

                <footer class="entry-footer">
                    
                    <?php
                    edit_post_link(
                        sprintf(
                                /* translators: %s: Name of current post */
                                esc_html__( 'Edit %s', 'vivita' ),
                                the_title( '<span class="screen-reader-text">"', '"</span>', false )
                        ),
                        '<span class="edit-link">',
                        '</span>'
                    );
                    ?>
                </footer><!-- .entry-footer -->
            
            </div>
                
        </article><!-- #post-## -->

    </div>
    
</div>