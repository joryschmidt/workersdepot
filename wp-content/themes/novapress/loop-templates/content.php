<?php
/**
 * @package understrap
 */
?>

<div class="col-sm-4 col-md-4 col-lg-4">
    
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	    <a href="<?php the_permalink() ?>" rel="bookmark"><?php echo get_the_post_thumbnail( $post->ID, 'novapress-square',array('class'=>'img-responsive')); ?></a>
	    
	    <header class="entry-header">
	        
			<?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
	        
		</header><!-- .entry-header -->
	    
	</article><!-- #post-## -->
    
</div>