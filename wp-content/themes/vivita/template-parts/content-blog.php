<?php
/**
 * Template part for displaying results in blog pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Vivita
 */

$comment_data = get_comment_count( get_the_ID() );

?>

<div class="blog-roll-item">

    <article data-link="<?php echo esc_url( get_the_permalink( get_the_ID() ) ); ?>" id="post-<?php echo intval( get_the_ID() ); ?>" <?php post_class(); ?>>

        <?php if ( has_post_thumbnail() ) : ?>
            <div class="image">
                <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                    <?php the_post_thumbnail( 'medium' ); ?>
                </a>
            </div>
        <?php endif; ?>
        
        <div class="inner" style="border-radius: <?php echo has_post_thumbnail() ? esc_attr( '0' ) : esc_attr( '7px 7px 0 0' ); ?>;">

            <h3 class="post-title">
                <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                    <?php echo esc_html( get_the_title() ); ?>
                </a>
            </h3>
            
            <?php if ( get_theme_mod( 'vivita_blog_roll_words_trim', 50 ) != 0 ) : ?>
            
                <hr>

                <div class="post-content">
                    <?php echo esc_html( wp_trim_words( strip_tags( strip_shortcodes( get_the_content() ) ), get_theme_mod( 'vivita_blog_roll_words_trim', 50 ), '...' ) ); ?>
                </div>
            
            <?php endif; ?>
            
        </div>
        
        <div class="bottom-meta">
            
            <?php if ( get_theme_mod( 'vivita_blog_roll_author', 'show' ) == 'show' ) : ?>
                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="ext-link" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( get_the_author() ); ?>">
                    <div class="meta-author-section">
                        <i class="fa fa-user"></i>    
                    </div>
                </a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'vivita_blog_roll_date', 'show' ) == 'show' ) : ?>
                <div class="meta-section" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( date( get_option( 'date_format' ), get_post_time() ) ); ?>">
                    <i class="fa fa-calendar"></i>
                </div>
            <?php endif; ?>
           
            <?php if ( get_theme_mod( 'vivita_blog_roll_comments', 'show' ) == 'show' ) : ?>
                <a href="<?php echo esc_url( get_permalink() . '#comments' ); ?>" class="ext-link" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $comment_data['approved'] . ' comment(s)' ); ?>">
                    <div class="meta-comments-section">
                        <i class="fa fa-comment"></i>    
                    </div>
                </a>
            <?php endif; ?>
            
            <a href="<?php echo esc_url( get_permalink() ); ?>" class="ext-link">
                <div class="ext-link-section">
                    <i class="fa fa-external-link"></i>    
                </div>
            </a>
            
        </div>

    </article>

</div>