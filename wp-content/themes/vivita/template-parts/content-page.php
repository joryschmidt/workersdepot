<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Vivita
 */

$sidebar_override = get_post_meta( get_the_ID(), 'vivita_sidebar_location', true ) ? get_post_meta( get_the_ID(), 'vivita_sidebar_location', true ) : 'vivita_default';

?>

<?php if ( has_post_thumbnail() ) : ?> 
    
    <div id="page-content-image" class="col-sm-12" style="background-image: url(<?php echo has_post_thumbnail() ? esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ): esc_attr( '' ); ?>);">
    </div>

<?php endif; ?>

<div id="page-content" class="col-sm-12">

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="row">
        
            <?php if ( ( $sidebar_override == 'vivita_left' || $sidebar_override == 'vivita_leftright' || $sidebar_override == 'vivita_default' ) && is_active_sidebar( 'sidebar-left' ) ) : ?>
                <div class="col-sm-3">
                    <div class="sidebar-container">

                        <?php get_sidebar( 'left' ); ?>

                    </div>
                </div>
            <?php endif; ?>
            
            <div class="col-sm-<?php echo intval( vivita_main_width( $sidebar_override ) ); ?>">
        
                <header class="entry-header">
                    <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
                </header><!-- .entry-header -->

                <hr>

                <div class="entry-content">
                    <?php
                    the_content();

                    wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'vivita' ),
                            'after'  => '</div>',
                    ) );
                    ?>
                </div><!-- .entry-content -->

                <?php if ( get_edit_post_link() ) : ?>

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

                <?php endif; ?>
                    
            </div>
            
            <?php if ( ( $sidebar_override == 'vivita_right' || $sidebar_override == 'vivita_leftright' || $sidebar_override == 'vivita_default' ) && is_active_sidebar( 'sidebar-right' ) ) : ?>
                <div class="col-sm-3">
                    <div class="sidebar-container">

                        <?php get_sidebar( 'right' ); ?>

                    </div>
                </div>
            <?php endif; ?>

    </article><!-- #post-## -->

</div>