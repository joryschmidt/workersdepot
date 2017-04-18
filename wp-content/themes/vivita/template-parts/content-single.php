<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Vivita
 */

$sidebar_override = get_post_meta( get_the_ID(), 'vivita_sidebar_location', true ) ? get_post_meta( get_the_ID(), 'vivita_sidebar_location', true ) : 'vivita_default';

?>

<?php if ( has_post_thumbnail() ) : ?> 
    
    <?php 
    
        $position = '50%';

        switch ( get_post_meta( get_the_ID(), 'banner_meta_img_align', true ) ) :
            
            case 'top' :
                $position = '0%';
                break;
            
            case 'bottom' :
                $position = '100%';
                break;
            
            default :
                $position = '50%';
        
        endswitch; 
        
    ?>

    <div id="post-content-image" class="col-sm-12" style="
        background-image: url(<?php echo has_post_thumbnail() ? esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ) : esc_attr( '' ); ?>);
        height: <?php echo get_post_meta( get_the_ID(), 'banner_meta_height', true ) ? intval( get_post_meta( get_the_ID(), 'banner_meta_height', true ) ) : intval( '400' ); ?>px;
        background-position: 50% <?php echo esc_attr( $position ); ?>; 
    ">
    </div>

<?php endif; ?>

<div id="post-content" class="col-sm-12">

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php if ( ( $sidebar_override == 'vivita_left' || $sidebar_override == 'vivita_leftright' || $sidebar_override == 'vivita_default' ) && is_active_sidebar( 'sidebar-left' ) ) : ?>
            <div class="col-sm-3">
                <div class="sidebar-container">

                    <?php get_sidebar( 'left' ); ?>

                </div>
            </div>
        <?php endif; ?>

        <div class="col-sm-<?php echo intval( vivita_main_width( $sidebar_override ) ); ?>">

            <div class="row">

                <div class="col-sm-12">

                    <div id="single-image-container" class="<?php echo has_post_thumbnail() ? esc_attr( '' ) : esc_attr( 'no-header-img' ); ?>" style="background-image: url(<?php echo has_post_thumbnail() ? esc_url( the_post_thumbnail_url( 'large' ) ) : esc_attr( '' ); ?>);">

                    </div>

                </div>

                <div class="col-sm-12">

                    <div id="single-title-box" class="<?php echo has_post_thumbnail() ? esc_attr( '' ) : esc_attr( 'no-header-img' ); ?>">

                        <div class="inner">

                            <h2 class="entry-title"><?php the_title(); ?></h2>
                            
                            <?php if ( get_theme_mod( 'vivita_single_show_date', 'show' ) == 'show' || get_theme_mod( 'vivita_single_show_author', 'show' ) == 'show' ) : ?>
                                <h6 class="post-meta">
                                    <?php echo get_theme_mod( 'vivita_single_show_date', 'show' ) == 'show' ? vivita_posted_on() : ''; ?>
                                    <?php if ( get_theme_mod( 'vivita_single_show_author', 'show' ) == 'show' ) : ?>    
                                        <?php echo get_theme_mod( 'vivita_single_show_author_by', 'show' ) == 'show' ? __( 'by', 'vivita' ) : ''; ?> <span class="post-author"><?php the_author_posts_link(); ?></span>
                                    <?php endif; ?>
                                </h6>
                            <?php endif; ?>

                            <?php if ( get_theme_mod( 'vivita_single_show_single_category', 'show' ) == 'show' ) : ?> 
                                <h6 class="category-link">
                                    <?php $categories = get_the_category(); ?>
                                    <?php echo esc_html( $categories[0]->cat_name ); ?>
                                </h6>
                            <?php endif; ?>
                            
                        </div>

                    </div>

                    <hr>
                    
                </div>

                <div class="col-sm-12">

                    <div class="entry-content">

                        <?php the_content(); ?>

                        <?php
                            wp_link_pages( array(
                                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'vivita' ),
                                'after'  => '</div>',
                            ) );
                        ?>

                    </div><!-- .entry-content -->

                    <?php the_post_navigation( array(
                        'prev_text' => __( 'Prev : %title', 'vivita' ),
                        'next_text' => __( 'Next : %title', 'vivita' )
                    )); ?>

                </div>

                <div class="col-sm-12">

                    <?php 
                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                                comments_template();
                        endif;
                    ?>

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

    </article>
        
</div>