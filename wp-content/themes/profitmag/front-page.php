<?php get_header();  ?>

<?php
$profitmag_settings = profit_get_theme_options();

if( 'posts' == get_option( 'show_on_front' ) ) { ?>
<section id="primary" class="content-area">
   <?php 
   if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); 
if ( is_front_page() && is_home() ) {
    get_template_part( 'content', '' );
} 
endwhile; 
            // Previous/next page navigation.
profitmag_pagination(); 

endif; ?>
</section>
<?php 

} else {?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php 
        if( 0 == $profitmag_settings['profitmag_fbxone_setting'] && 
            0 == $profitmag_settings['profitmag_fbxtwo_setting'] && 
            0 == $profitmag_settings['profitmag_fbxthree_setting'] &&
            0 == $profitmag_settings['profitmag_home_ads_setting'] &&
            0 == $profitmag_settings['profitmag_fbxfour_setting'] &&
            0 == $profitmag_settings['profitmag_fbxfiveleft_setting'] &&
            0 == $profitmag_settings['profitmag_fbxfiveright_setting'] &&
            0 == $profitmag_settings['profitmag_gallery_setting'] &&
            !is_active_sidebar( 'home-popular' ) ){ ?>

            <div class="home-featured-block">
                <?php
                $args = array(
                    'title' => __( 'Thank you for choosing Profitmag', 'profitmag' ),
                    'text'  => __( 'You are viewing this message because options of home page have not been setup.<br/> Please go to "Appearance >> Customize >> Theme Options >> Home Page Blocks" in admin panel to setup options.', 'profitmag' ),
                    );
                $widget_args = array(
                    'before_title' => '<h3 class="widget-title">',
                    'after_title'  => '</h3>',
                    );
                the_widget( 'WP_Widget_Text', $args, $widget_args );
                ?>
            </div>  


            <?php 
        }  else { 

            if( !empty( $profitmag_settings['profitmag_fbxone_setting'] ) && $profitmag_settings['profitmag_fbxone_setting']>0 ) : ?>
            <!-- Featured Block One -->
            <div class="home-featured-block">
                <?php
                $featured_block = $profitmag_settings['profitmag_fbxone_setting'];

                $no_of_block = $profitmag_settings['profitmag_fbxonepostnum_setting']; 
                $hide_posted_date =$profitmag_settings['profitmag_postdate_setting']; 

                $query1 = new WP_Query( 'cat='.$featured_block.'&posts_per_page='.$no_of_block );
                if( $query1->have_posts() ):

                    $cat_name = get_cat_name( $featured_block );                       
                ?>
                <h2 class="block-title"><span class="bordertitle-red"></span><?php echo esc_html($cat_name); ?></h2>
                <div class="feature-post-wrap clearfix">
                    <?php
                    $count = 0;
                    while( $query1->have_posts() ):
                        $query1->the_post();
                    $count++;
                    ?>
                    <div class="featured-post clearfix">
                        <figure class="post-thumb clearfix">
                            <?php
                            if( has_post_thumbnail() ):
                                $post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'three-col-thumb' );
                            ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><img src="<?php echo esc_url( $post_thumb[0] ); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" /></a>
                            <?php
                            endif;
                            ?>
                        </figure>

                        <div class="post-desc clearfix">
                            <h3 class="feature-main-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_title(); ?></a></h3>
                           <?php if(! $hide_posted_date == 1): ?>
                                <div class="post-date feature-main-date"><i class="fa fa-calendar"></i><?php echo get_the_date( 'F d, Y') ; ?></div>
                            <?php endif;?>
                        </div>
                    </div>
                    <?php
                    if($count % 3 == 0) echo "<div class='clear'></div>";
                    endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>  
            <!-- End of Featured Block One -->  

        <?php  endif; ?>

        
        <?php if( !empty( $profitmag_settings['profitmag_fbxtwo_setting'] ) && $profitmag_settings['profitmag_fbxtwo_setting']>0 ) : ?>
            <!-- Featured Block Two -->
            <div class="home-featured-block clearfix">
                <?php
                $featured_block = $profitmag_settings['profitmag_fbxtwo_setting'];

                $no_of_block = $profitmag_settings['profitmag_fbxtwopostnum_setting']; 
                $hide_posted_date =$profitmag_settings['profitmag_postdate_setting']; 
                

                $query2 = new WP_Query( 'cat='.$featured_block.'&posts_per_page='.$no_of_block );

                if( $query2->have_posts() ):

                    $cat_name = get_cat_name( $featured_block );                       
                ?>
                <h2 class="block-title"><span class="bordertitle-red"></span><?php echo $cat_name; ?></h2>
                <?php
                $count = 0;
                while( $query2->have_posts() ):
                    $query2->the_post();
                $count++;
                ?>
                <div class="featured-post clearfix">
                    <figure class="post-thumb clearfix">
                        <?php
                        if( has_post_thumbnail() ):
                            $post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'three-col-thumb' );
                        ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><img src="<?php echo esc_url($post_thumb[0] ); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" /></a>
                        <?php
                        endif;
                        ?>
                    </figure>

                    <div class="post-desc clearfix">
                        <h3 class="feature-main-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_title(); ?></a></h3>
                        <?php if( ! $hide_posted_date == 1): ?>
                            <div class="post-date feature-main-date"><i class="fa fa-calendar"></i><?php echo get_the_date( 'F d, Y') ; ?></div>
                        <?php endif;?>
                    </div>
                </div>
                <?php
                if($count % 3 == 0) echo "<div class='clear'></div>";
                endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>   
            <!-- Featured Block Two -->            
        <?php  endif; ?>




        <?php if( !empty( $profitmag_settings['profitmag_fbxthree_setting'] ) && $profitmag_settings['profitmag_fbxthree_setting']>0 ) : ?>            
            <!-- Featured Block Three -->
            <div class="home-featured-block block-3 clearfix">
                <?php
                $featured_block = $profitmag_settings['profitmag_fbxthree_setting'];

                $no_of_block = $profitmag_settings['profitmag_fbxthreepostnum_setting'];   

                $query3 = new WP_Query( 'cat='.$featured_block.'&posts_per_page='.$no_of_block );

                if( $query3->have_posts() ):
                    $cat_name = get_cat_name( $featured_block );                       
                ?>
                <h2 class="block-title"><span class="bordertitle-red"></span><?php echo esc_html($cat_name); ?></h2>
                <?php
                $i = 0;
                while( $query3->have_posts() ):
                    $i++;
                $query3->the_post();
                ?>
                <div class="featured-post-three clearfix">
                    <figure class="post-thumb-mini clearfix">
                        <?php
                        if( has_post_thumbnail() ):
                            $post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'five-col-thumb' );
                        ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><img src="<?php echo esc_url( $post_thumb[0] ); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" /></a>
                        <?php
                        endif;
                        ?>
                    </figure>

                    <div class="post-desc clearfix">
                        <h3 class="feature-main-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_title(); ?></a></h3>

                    </div>
                </div>
                <?php
                if($i%5==0){
                    echo '<div class="clear"></div>';
                }
                endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>   
            <!-- End Featured Block Three -->    

        <?php  endif; ?>

        <?php if( !empty( $profitmag_settings['profitmag_home_ads_setting'] ) && $profitmag_settings['profitmag_home_ads_setting'] != '' ): ?>
            <div class="mid-section-ads">                            
                <?php echo wp_specialchars_decode($profitmag_settings['profitmag_home_ads_setting'], '"'); ?>
            </div>   
        <?php endif; ?>


        <?php if( !empty( $profitmag_settings['profitmag_fbxfour_setting'] ) && $profitmag_settings['profitmag_fbxfour_setting']>0 ) : ?>            
            <!-- Featured Block Four Slider -->
            <div class="home-featured-block block-4">
                <?php
                $featured_block = $profitmag_settings['profitmag_fbxfour_setting'];

                $no_of_block = $profitmag_settings['profitmag_fbxfourpostnum_setting'];   

                $query4 = new WP_Query( 'cat='.$featured_block.'&posts_per_page='.$no_of_block );

                if( $query4->have_posts() ):
                    $cat_name = get_cat_name( $featured_block );
                $skip_flag=1;                       
                ?>
                <h2 class="block-title"><span class="bordertitle-red"></span><?php echo esc_html($cat_name); ?></h2>
                <div class="featured-excerpt-block clearfix">
                    <?php
                    while( $query4->have_posts() ):
                        $query4->the_post();
                    $content=substr( strip_tags(get_the_content()), 0, 70 );
                    $content=substr($content,0,strrpos($content," "));
                    if( $skip_flag == 1):
                        $skip_flag = 0;
                    $content=substr( get_the_content(), 0, 600 );
                    $content=substr($content,0,strrpos($content," "));
                    ?>

                    <div class="featured-post-main clearfix">
                        <figure class="post-main-thumb clearfix">
                            <?php
                            if( has_post_thumbnail() ):
                                $post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'block4-main-thumb' );
                            ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><img src="<?php echo esc_url( $post_thumb[0] ); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" /></a>
                            <?php
                            endif;
                            ?>
                        </figure>

                        <div class="post-main-desc clearfix">
                            <h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_title(); ?></a></h3>
                            <p class="post-excerpt"><?php echo $content; ?>...</p>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="featured-post clearfix">
                        <figure class="post-thumb-small clearfix">
                            <?php
                            if( has_post_thumbnail() ):
                                $post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'block4-post-thumb' );
                            ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><img src="<?php echo esc_url( $post_thumb[0] ); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" /></a>
                            <?php
                            endif;
                            ?>
                        </figure>

                        <div class="post-main-desc clearfix">
                            <h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_title(); ?></a></h3>
                            <p class="post-excerpt"><?php echo $content; ?></p>
                        </div>
                    </div>
                    <?php                                    
                    endif;
                    endwhile;
                    ?>
                </div><!-- .featured-excerpt-block -->
                <?php
                endif;
                wp_reset_postdata();
                ?>
            </div>   
            <!-- End Featured Block Four -->              
            
        <?php  endif; ?>


        <div class="single-col clearfix">
            <?php if( !empty( $profitmag_settings['profitmag_fbxfiveleft_setting'] ) && $profitmag_settings['profitmag_fbxfiveleft_setting']>0 ) : ?>            
                <!-- Featured Block Left -->
                <div class="home-featured-block-single-col">
                    <?php
                    $featured_block = $profitmag_settings['profitmag_fbxfiveleft_setting'];

                    $no_of_block = $profitmag_settings['profitmag_fbxfiveleftpostnum_setting'];
                    $hide_posted_date =$profitmag_settings['profitmag_postdate_setting'];     

                    $query5 = new WP_Query( 'cat='.$featured_block.'&posts_per_page='.$no_of_block );
                    if( $query5->have_posts() ):
                        $cat_name = get_cat_name( $featured_block );                       
                    ?>
                    <h2 class="block-title"><span class="bordertitle-red"></span><?php echo $cat_name; ?></h2>
                    <?php
                    while( $query5->have_posts() ):
                        $query5->the_post();
                    $content=substr( strip_tags(get_the_content()), 0, 60 );
                    $content=substr($content,0,strrpos($content," "));
                    ?>
                    <div class="featured-post-block-coltype clearfix">
                        <figure class="post-thumb-mini clearfix">
                            <?php
                            if( has_post_thumbnail() ):
                                $post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'block-left-right' );
                            ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><img src="<?php echo esc_url( $post_thumb[0] ); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" /></a>
                            <?php
                            endif;
                            ?>
                        </figure>

                        <div class="post-desc clearfix">
                            <h3 class="feature-main-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_title(); ?></a></h3>
                            <p><?php echo $content; ?></p>
                           <?php if( ! $hide_posted_date == 1): ?>
                                <div class="post-date feature-main-date"><i class="fa fa-calendar"></i><?php echo get_the_date( 'F d, Y') ; ?></div>
                            <?php endif;?>
                        </div>
                    </div>
                    <?php
                    endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>   
                <!-- End Featured Block Lefte -->                      
                
            <?php  endif; ?>




            <?php if( !empty( $profitmag_settings['profitmag_fbxfiveright_setting'] ) && $profitmag_settings['profitmag_fbxfiveright_setting']>0 ) : ?>            
                <!-- Featured Block Right -->
                <div class="home-featured-block-single-col">
                    <?php
                    $featured_block = $profitmag_settings['profitmag_fbxfiveright_setting'];

                    $no_of_block = $profitmag_settings['profitmag_fbxfiverightpostnum_setting']; 
                    $hide_posted_date =$profitmag_settings['profitmag_postdate_setting'];  

                    $query6 = new WP_Query( 'cat='.$featured_block.'&posts_per_page='.$no_of_block );

                    if( $query6->have_posts() ):
                        $cat_name = get_cat_name( $featured_block );                       
                    ?>
                    <h2 class="block-title"><span class="bordertitle-red"></span><?php echo $cat_name; ?></h2>
                    <?php
                    while( $query6->have_posts() ):
                        $query6->the_post();
                    $content=substr( strip_tags(get_the_content()), 0, 60 );
                    $content=substr($content,0,strrpos($content," "));
                    ?>
                    <div class="featured-post-block-coltype clearfix">
                        <figure class="post-thumb-mini clearfix">
                            <?php
                            if( has_post_thumbnail() ):
                                $post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'block-left-right' );
                            ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><img src="<?php echo esc_url( $post_thumb[0] ); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" /></a>
                            <?php
                            endif;
                            ?>
                        </figure>

                        <div class="post-desc clearfix">
                            <h3 class="feature-main-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_title(); ?></a></h3>
                            <p><?php echo $content; ?></p>
                           <?php if( ! $hide_posted_date == 1): ?>
                                <div class="post-date feature-main-date"><i class="fa fa-calendar"></i><?php echo get_the_date( 'F d, Y') ; ?></div>
                            <?php endif;?>
                        </div>
                    </div>
                    <?php
                    endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>                   

            <?php  endif; ?>

        </div><!--single-col-->
        <!-- End Featured Block Left -->

        <!-- Popular Widget Area -->
        <?php if( is_active_sidebar( 'home-popular' ) ) : ?>
            <div class="home-featured-block popular-widget-area clearfix">
             <?php   dynamic_sidebar( 'home-popular' ); ?>
         </div>               
     <?php endif; ?>
     <!-- End Popular Widget Area -->


     <!-- Media Gallery -->            
     <?php if( !empty( $profitmag_settings['profitmag_gallery_setting'] ) ): ?>
        <div class="home-media-gallery">
            <h2 class="block-title"><span class="bordertitle-red"></span><?php _e( 'Media Gallery', 'profitmag' ); ?></h2>

            <div class="gallery-block">
                <div id="gallery-slider" class="flexslider">
                    <ul class="slides">
                        <?php 
                        $gallery_ids    = $profitmag_settings['profitmag_gallery_setting'];

                        $gallery_ids    = explode("=", $gallery_ids);

                        $final_ids      = explode('"', $gallery_ids['1']);

                        $image_id       = explode(',', $final_ids['1']);                           



                        foreach( $image_id as $image ):        
                            $img_url = wp_get_attachment_image_src($image,'gallery-full');

                        ?>
                        <li><img id="previewHolder" src="<?php echo esc_url( $img_url[0] ); ?>" alt="Gallery" /></li>
                        <?php   break; endforeach; ?>
                    </ul>
                </div>

                <div id="gallery-carousel" class="flexslider clearfix scroll-content">
                    <ul class="slides ">
                        <?php   foreach( $image_id as $image ):                                             
                        $img_url = wp_get_attachment_image_src($image,'gallery-thumb');

                        $img_url_full = wp_get_attachment_image_src($image,'gallery-full');
                        ?>
                        <li><img class="fullPreview" src="<?php echo esc_url( $img_url[0] ); ?>" alt="Gallery" data-image-full="<?php echo esc_url( $img_url_full[0] ); ?>" /></li>
                    <?php   endforeach;?>
                </ul>
            </div>
        </div><!--gallery-block-->
    </div>             
<?php endif; ?>  
<!-- End Media Gallery -->

<?php } ?>                         


</main><!-- #main -->
</div><!-- #primary -->                

<?php    
}

get_sidebar(); 

get_footer(); ?>  