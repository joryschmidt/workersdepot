<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package ProfitMag
 */

// Register Widgetized Area
function profitmag_widget_init() {

    register_sidebar( array(
        'name' => __( 'Right Sidebar Top', 'profitmag' ),
        'id'   => 'right-sidebar-top',
        'description' => __( 'Displays items on top of the sidebar.','profitmag' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',     
        ) );
    
    register_sidebar( array(
        'name' => __( 'Right Sidebar Middle', 'profitmag' ),
        'id'   => 'right-sidebar-middle',
        'description' => __( 'Displays items on middle of the sidebar.', 'profitmag'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',     
        ) );
    
    
    
    
    register_sidebar( array(
        'name' => __( 'Left Sidebar Top', 'profitmag' ),
        'id'   => 'left-sidebar-top',
        'description' =>  __( 'Displays items on top of the sidebar.', 'profitmag' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',     
        ) );
    
    register_sidebar( array(
        'name' => __( 'Left Sidebar Middle', 'profitmag' ),
        'id'   => 'left-sidebar-middle',
        'description' =>  __( 'Displays items on middle of the sidebar.', 'profitmag'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',     
        ) );
    
    register_sidebar( array(
        'name' => __( 'Home Popular Widget Area', 'profitmag' ),
        'id'   => 'home-popular',
        'description' =>  __( 'Displays Popular Widgets on home page.', 'profitmag'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',     
        ) );
    
    
    register_sidebar( array(
        'name' => __( 'Footer Top Column One', 'profitmag' ),
        'id'   => 'fo-top-col-one',
        'description' =>  __( 'Displays items on top footer section.', 'profitmag'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',     
        ) );
    
    register_sidebar( array(
        'name' => __( 'Footer Top Column Two', 'profitmag' ),
        'id'   => 'fo-top-col-two',
        'description' =>  __( 'Displays items on top footer section.', 'profitmag'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',     
        ) );
    
    register_sidebar( array(
        'name' => __( 'Footer Top Column Three', 'profitmag' ),
        'id'   => 'fo-top-col-three',
        'description' =>  __( 'Displays items on top footer section.', 'profitmag'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',     
        ) );
    
    register_sidebar( array(
        'name' => __( 'Footer Top Column Four', 'profitmag' ),
        'id'   => 'fo-top-col-four',
        'description' =>  __( 'Displays items on top footer section.', 'profitmag'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',     
        ) );       
    
    
    register_sidebar( array(
        'name' => __( 'Footer Bottom Column One', 'profitmag' ),
        'id'   => 'fo-bottom-col-one',
        'description' =>  __( 'Displays items on top footer section.', 'profitmag'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',     
        ) );
    
    register_sidebar( array(
        'name' => __( 'Footer Bottom Column Two', 'profitmag' ),
        'id'   => 'fo-bottom-col-two',
        'description' =>  __( 'Displays items on top footer section.', 'profitmag'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',     
        ) );
    
    register_sidebar( array(
        'name' => __( 'Footer Bottom Column Three', 'profitmag' ),
        'id'   => 'fo-bottom-col-three',
        'description' =>  __( 'Displays items on top footer section.', 'profitmag'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',     
        ) );
    
    register_sidebar( array(
        'name' => __( 'Footer Bottom Column Four', 'profitmag' ),
        'id'   => 'fo-bottom-col-four',
        'description' =>  __( 'Displays items on top footer section.', 'profitmag'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',     
        ) );
    
    
    
    
}
add_action( 'widgets_init', 'profitmag_widget_init' );

// Script Style enqueue functions
function profitmag_theme_scripts() {

    $profitmag_settings = profit_get_theme_options();    

    wp_enqueue_script( 'profitmag-bxslider-js', get_template_directory_uri().'/js/jquery.bxslider.js',array( 'jquery' ),'', true );
    wp_enqueue_script( 'profitmag-ticker-js', get_template_directory_uri().'/js/jquery.ticker.js',array( 'jquery' ),'', true );        
    wp_enqueue_script( 'profitmag-nivolightbox-js', get_template_directory_uri().'/js/nivo-lightbox.min.js', array('jquery') );
    wp_enqueue_script( 'profitmag-scrolljs', get_template_directory_uri() . '/js/jquery.mCustomScrollbar.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'profitmag-mousewheeljs', get_template_directory_uri() . '/js/jquery.mousewheel.min.js', array('jquery'), '2.0.19', true );               
    wp_enqueue_script( 'profitmag-slicknav-js', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array() );
    wp_enqueue_script( 'profitmag-mordenizer', get_template_directory_uri() . '/js/modernizr.min.js', array(), '2.6.2', false );
    wp_enqueue_script( 'profitmag-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );    
    wp_enqueue_script( 'profitmag-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true );   

    wp_enqueue_style( 'profitmag-font-awesome', get_template_directory_uri().'/css/font-awesome.min.css' );      
    wp_enqueue_style( 'profitmag-bxslider-style', get_template_directory_uri().'/css/jquery.bxslider.css' );    
    wp_enqueue_style( 'profitmag-ticker-style', get_template_directory_uri().'/css/ticker-style.css' );    
    wp_enqueue_style( 'profitmag-noivolightbox-style', get_template_directory_uri().'/css/nivo-lightbox.css' );
    wp_enqueue_style( 'profitmag-scrollcss', get_template_directory_uri() . '/css/jquery.mCustomScrollbar.css' );

    

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    
    //for google font     
    $font_args = array(
        'family' => 'Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic',
        'subset' => 'latin,latin-ext',
        );
    wp_register_style( 'profitmag-google-font', add_query_arg( $font_args, "//fonts.googleapis.com/css" ), array(), null );

    wp_enqueue_style( 'profitmag-google-font');


    wp_enqueue_style( 'profitmag-style', get_template_directory_uri(). '/style.css' );

    if( is_child_theme() ){

        wp_enqueue_style( 'profitmag-child-style', get_stylesheet_uri() );
    }


    if( $profitmag_settings[ 'profitmag_responsive_setting' ] == 0 ) {
        wp_enqueue_style( 'profitmag-responsive', get_template_directory_uri().'/css/responsive.css' );
    }   

    $site_color = strtolower( $profitmag_settings['profitmag_layoutcolor_setting'] );

    if ( ! empty( $site_color ) ) {
        wp_register_style( 'profitmag-color-scheme',
            get_template_directory_uri() . '/css/' . esc_attr( $site_color ) . '.css',
            array( 'profitmag-style' ), null );

        wp_enqueue_style( 'profitmag-color-scheme' );
    } 

    $header_color = strtolower( $profitmag_settings['profitmag_headerlayoutcolor_setting'] );
    

    if ( ! empty( $header_color ) ) {
        wp_register_style( 'profitmag-header-color-scheme',
            get_template_directory_uri() . '/css/' . esc_attr($header_color) . '.css',
            array( 'profitmag-style' ), null );

        wp_enqueue_style( 'profitmag-header-color-scheme' );
    }              

    
}
add_action( 'wp_enqueue_scripts', 'profitmag_theme_scripts' );


// Web Layout
if ( ! function_exists( 'profitmag_web_layout' ) ) :
    function profitmag_web_layout( $classes ) {

        $profitmag_settings = profit_get_theme_options();
        
        if( !empty( $profitmag_settings['profitmag_layout_setting'] ) ) {
            if( $profitmag_settings[ 'profitmag_layout_setting' ] == 'Boxed' ) {
                $classes[] = 'boxed-layout';
            }    
        }
        
        
        return $classes;
    }
    endif; 
    add_filter( 'body_class', 'profitmag_web_layout' );


// Home page slider
    if ( ! function_exists( 'profitmag_slider_fu' ) ) :
        function profitmag_slider_fu() {
            if( is_home() || is_front_page() ) {
                $profitmag_settings = profit_get_theme_options();        

                if((isset($profitmag_settings['profitmag_slider_post_setting1']) && !empty($profitmag_settings['profitmag_slider_post_setting1'])) 
                    || (isset($profitmag_settings['profitmag_slider_post_setting2']) && !empty($profitmag_settings['profitmag_slider_post_setting2'])) 
                    || (isset($profitmag_settings['profitmag_slider_post_setting3']) && !empty($profitmag_settings['profitmag_slider_post_setting3']))
                    || (isset($profitmag_settings['profitmag_slider_post_setting4']) && !empty($profitmag_settings['profitmag_slider_post_setting4'])) 
                    || (isset($profitmag_settings['profitmag_slider_cat_setting']) && !empty($profitmag_settings['profitmag_slider_cat_setting']))
                    ){
                    $show_controls = $profitmag_settings['profitmag_slider_arrow_setting'] == 'yes' ? 'true' : 'false' ;
                $slider_auto = $profitmag_settings['profitmag_slider_transition_setting'] == 'yes' ? 'true' : 'false' ;
                $slider_speed = $profitmag_settings['profitmag_slider_speed_setting']; 
                ?>
                <script type="text/javascript">
                    jQuery(document).ready(function() {

                        jQuery('.home-bxslider').bxSlider( {
                            speed: <?php echo absint($slider_speed); ?>,
                            auto: <?php echo esc_attr($slider_auto); ?>,
                            controls: <?php echo esc_attr($show_controls); ?>,
                            pager: false,

                        });
                    })
                </script>

                <?php
                if($profitmag_settings['profitmag_slider_type_setting'] == 'single_post_slider'){
                    if(!empty($profitmag_settings['profitmag_slider_post_setting1']) || !empty($profitmag_settings['profitmag_slider_post_setting2']) || !empty($profitmag_settings['profitmag_slider_post_setting3']) || !empty($profitmag_settings['profitmag_slider_post_setting4'])){
                        $sliders = array($profitmag_settings['profitmag_slider_post_setting1'],$profitmag_settings['profitmag_slider_post_setting2'],$profitmag_settings['profitmag_slider_post_setting3'],$profitmag_settings['profitmag_slider_post_setting4']);
                        $remove = array(0);
                        $sliders = array_diff($sliders, $remove);  ?>
                        <div class="slider-section">
                            <ul class="home-bxslider">  
                                <?php
                                foreach ($sliders as $slider){
                                    $args = array (
                                        'p' => $slider
                                        );
                                    $slider_query=new WP_Query( $args );
                                    if( $slider_query->have_posts() ):
                                        ?>


                                    <?php
                                    while( $slider_query->have_posts() ): $slider_query->the_post();
                                    $image_url=wp_get_attachment_image_src( get_post_thumbnail_id(), 'home-slider' );
                                    $content=substr( get_the_excerpt(), 0, 95 );
                                    $content=substr($content,0,strrpos($content," "));
                                    ?>

                                    <li>
                                        <img src="<?php echo esc_url($image_url[0]); ?>" />
                                        <div class="slider-desc">
                                            <div class="slide-date">
                                                <i class="fa fa-calendar"></i><?php echo get_the_date( 'F d, Y') ; ?>
                                            </div>
                                            <div class="slider-details">
                                                <div class="slide-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>                                            
                                                <div class="slide-caption"><?php echo $content; ?></div>
                                            </div>
                                        </div>
                                    </li>

                                <?php endwhile; ?>                                                      
                            <?php endif; ?>
                            <?php   } wp_reset_postdata(); ?>        
                        </ul>
                    </div>
                    <?php
                }
            }else {
                ?>
                <div class="slider-section">
                    <ul class="home-bxslider">  
                        <?php
                        if( $profitmag_settings['profitmag_slider_cat_setting'] != '0') {   
                            $args = array (
                                'cat' => $profitmag_settings['profitmag_slider_cat_setting'],
                                'posts_per_page' => 5,
                                );
                            $slider_query=new WP_Query( $args );
                            if( $slider_query->have_posts() ):
                                ?>


                            <?php
                            while( $slider_query->have_posts() ): $slider_query->the_post();
                            $image_url=wp_get_attachment_image_src( get_post_thumbnail_id(), 'home-slider' );
                            $content=substr( get_the_excerpt(), 0, 95 );
                            $content=substr($content,0,strrpos($content," "));
                            ?>

                            <li>
                                <img src="<?php echo esc_url( $image_url[0] ); ?>" />
                                <div class="slider-desc">
                                    <div class="slide-date">
                                        <i class="fa fa-calendar"></i><?php echo get_the_date( 'F d, Y') ; ?>
                                    </div>
                                    <div class="slider-details">
                                        <div class="slide-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                        <div class="slide-caption"><?php echo $content; ?></div>
                                    </div>
                                </div>
                            </li>

                        <?php endwhile; ?>      
                    <?php endif; ?>  
                    <?php  } ?>                      
                </ul>
            </div>
            <?php
        }
        wp_reset_postdata();
    }

}
}
endif;
add_action( 'profitmag_slider', 'profitmag_slider_fu' );


// Featured Post beside slider in Home Page
if ( ! function_exists( 'profitmag_beside_posts' ) ) :
    function profitmag_beside_posts() {
        if( is_home() || is_front_page() ){
            $profitmag_settings = profit_get_theme_options();
            if( !empty( $profitmag_settings['profitmag_fbxbesideslider_setting'] ) && $profitmag_settings['profitmag_fbxbesideslider_setting']>0 ) {
                $beside_query= new WP_Query( 'cat='.$profitmag_settings['profitmag_fbxbesideslider_setting'].'&posts_per_page=4' );
                if( $beside_query->have_posts()) {
                    ?>
                    <div class="besides-block">
                        <?php
                        while( $beside_query->have_posts() ) {
                            $beside_query->the_post();
                            $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'slider-beside' );
                            ?>
                            <div class="beside-post clearfix">
                                <a href="<?php the_permalink(); ?>">
                                    <figure class="beside-thumb clearfix">
                                        <img src="<?php echo esc_url( $image_url[0] ); ?>" alt="<?php echo the_title_attribute(); ?>" title="<?php echo the_title_attribute(); ?>"/>
                                        <div class="overlay"></div>
                                    </figure>
                                    <div class="beside-caption clearfix">
                                        <h3 class="post-title"><?php the_title(); ?></h3>
                                        <div class="post-date"><i class="fa fa-calendar"></i><?php echo get_the_date('F d, Y'); ?></div>
                                    </div>
                                </a>
                            </div>
                            <?php
                        }
                        ?>
                    </div><!-- .beides-block -->
                    <?php    
                }
                wp_reset_postdata();
            }
        }

    }
    endif;
    add_action( 'profitmag_featured_post_beside', 'profitmag_beside_posts' );


// Social Links
    if ( ! function_exists( 'profitmag_social_cb' ) ) :
        function profitmag_social_cb(){ 

            $settings = profit_get_theme_options();
            ?>
            <div class="socials">
                <?php if(!empty($settings['profitmag_facebook_setting'])){ ?>
                <a href="<?php echo esc_url($settings['profitmag_facebook_setting']); ?>" class="facebook" data-title="Facebook" target="_blank"><span class="font-icon-social-facebook"><i class="fa fa-facebook"></i></span></a>
                <?php } ?>

                <?php if(!empty($settings['profitmag_twitter_setting'])){ ?>
                <a href="<?php echo esc_url($settings['profitmag_twitter_setting']); ?>" class="twitter" data-title="Twitter" target="_blank"><span class="font-icon-social-twitter"><i class="fa fa-twitter"></i></span></a>
                <?php } ?>

                <?php if(!empty($settings['profitmag_google_plus_setting'])){ ?>
                <a href="<?php echo esc_url($settings['profitmag_google_plus_setting']); ?>" class="gplus" data-title="Google Plus" target="_blank"><span class="font-icon-social-google-plus"><i class="fa fa-google-plus"></i></span></a>
                <?php } ?>

                <?php if(!empty($settings['profitmag_youtube_setting'])){ ?>
                <a href="<?php echo esc_url($settings['profitmag_youtube_setting']); ?>" class="youtube" data-title="Youtube" target="_blank"><span class="font-icon-social-youtube"><i class="fa fa-youtube"></i></span></a>
                <?php } ?>

                <?php if(!empty($settings['profitmag_pinterest_setting'])){ ?>
                <a href="<?php echo esc_url($settings['profitmag_pinterest_setting']); ?>" class="pinterest" data-title="Pinterest" target="_blank"><span class="font-icon-social-pinterest"><i class="fa fa-pinterest"></i></span></a>
                <?php } ?>

                <?php if(!empty($settings['profitmag_linkedin_setting'])){ ?>
                <a href="<?php echo esc_url($settings['profitmag_linkedin_setting']); ?>" class="linkedin" data-title="Linkedin" target="_blank"><span class="font-icon-social-linkedin"><i class="fa fa-linkedin"></i></span></a>
                <?php } ?>

                <?php if(!empty($settings['profitmag_flickr_setting'])){ ?>
                <a href="<?php echo esc_url($settings['profitmag_flickr_setting']); ?>" class="flickr" data-title="Flickr" target="_blank"><span class="font-icon-social-flickr"><i class="fa fa-flickr"></i></span></a>
                <?php } ?>

                <?php if(!empty($settings['profitmag_vimeo_setting'])){ ?>
                <a href="<?php echo esc_url($settings['profitmag_vimeo_setting']); ?>" class="vimeo" data-title="Vimeo" target="_blank"><span class="font-icon-social-vimeo"><i class="fa fa-vimeo-square"></i></span></a>
                <?php } ?>

                <?php if(!empty($settings['profitmag_stumbleupon_setting'])){ ?>
                <a href="<?php echo esc_url($settings['profitmag_stumbleupon_setting']); ?>" class="stumbleupon" data-title="Stumbleupon" target="_blank"><span class="font-icon-social-stumbleupon"><i class="fa fa-stumbleupon"></i></span></a>
                <?php } ?>

                <?php if(!empty($settings['profitmag_dribble_setting'])){ ?>
                <a href="<?php echo esc_url($settings['profitmag_dribble_setting']); ?>" class="dribble" data-title="dribble" target="_blank"><span class="fa fa-dribbble"><i class="fa fa-dribbble"></i></span></a>
                <?php } ?>

                <?php if(!empty($settings['profitmag_tumblr_setting'])){ ?>
                <a href="<?php echo esc_url($settings['profitmag_tumblr_setting']); ?>" class="tumblr" data-title="Tumblr" target="_blank"><span class="font-icon-social-tumblr"><i class="fa fa-tumblr"></i></span></a>
                <?php } ?>

                <?php if(!empty($settings['instagram'])){ ?>
                <a href="<?php echo esc_url($settings['instagram']); ?>" class="instagram" data-title="instagram" target="_blank"><span class="fa fa-instagram"><i class="fa fa-instagram"></i></span></a>
                <?php } ?>

                <?php if(!empty($settings['profitmag_sound_cloud_setting'])){ ?>
                <a href="<?php echo esc_url($settings['profitmag_sound_cloud_setting']); ?>" class="sound-cloud" data-title="sound-cloud" target="_blank"><span class="font-icon-social-soundcloud"><i class="fa fa-soundcloud"></i></span></a>
                <?php } ?>

                <?php if(!empty($settings['profitmag_skype_setting'])){ ?>
                <a href="<?php echo esc_attr($settings['profitmag_skype_setting']); ?>" class="skype" data-title="Skype" target="_blank"><span class="font-icon-social-skype"><i class="fa fa-skype"></i></span></a>
                <?php } ?>

                <?php if(!empty($settings['profitmag_rss_setting'])){ ?>
                <a href="<?php echo esc_url($settings['profitmag_rss_setting']); ?>" class="rss" data-title="RSS" target="_blank"><span class="font-icon-rss"><i class="fa fa-rss"></i></span></a>
                <?php } ?>
            </div>
            <?php } 
            endif;
            add_action( 'profitmag_social_links', 'profitmag_social_cb', 10 );


/**
 * Menu Alignment
 */
if ( ! function_exists( 'profitmag_menu_alignment_cb' ) ) :
    function profitmag_menu_alignment_cb(){

        $profitmag_settings = profit_get_theme_options();

        if($profitmag_settings['profitmag_menu_setting'] =="Right"){

            $profitmag_alignment_class="menu-right";

        }else{

            $profitmag_alignment_class="menu-left";

        }

        echo $profitmag_alignment_class;
    }
    endif;
    add_action('profitmag_menu_alignment','profitmag_menu_alignment_cb');

/**
 * Show related posts 
 */
if ( ! function_exists( 'profitmag_related_post' ) ):

    function profitmag_related_post( $post_id ) {
        $categories = get_the_category( $post_id );    
        if( $categories ) {
            $category_ids = array();
            foreach( $categories as $category ) {
                $category_ids[] = $category->term_id;
            }
            $args = array(
                'category__in' => $category_ids,
                'post__not_in' => array( $post_id ),
                'posts_per_page' => 5,                                
                );
            $related_query = new WP_Query( $args );
            if( $related_query->have_posts() ) {
                echo '<ul>';
                while( $related_query->have_posts()){
                    $related_query->the_post();
                    ?>                
                    <li><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li> 

                    <?php                
                }
                echo '</ul>'; 
                ?>    
                <?php           
            }else {
                ?>
                <ul><li><?php _e( 'No related post.', 'profitmag'); ?></li></ul>
                <?php            
            }
            wp_reset_postdata();          
        }
    } 

    endif;

/**
 * Comment Form
 */ 
if ( ! function_exists( 'profitmag_alter_comment_form' ) ):
    function profitmag_alter_comment_form( $form ) {    
        $required = get_option( 'require_name_email' );    
        $req = $required ? 'aria-required="true"' : '';    
        $form['fields']['author'] = '<p class="comment-form-author"><label for="author"></label><input id="author" name="author" type="text" placeholder="FULL NAME" value="" size="30" '.$req.'/></p>';
        $form['fields']['email'] = '<p class="comment-form-email"><label for="email"></label> <input id="email" name="email" type="email" value="" placeholder="EMAIL" size="30"'.$req.'/></p>';
        $form['fields']['url'] = '<p class="comment-form-url"><label for="url"></label> <input id="url" name="url" placeholder="WEBSITE" type="url" value="" size="30" /></p>';
        $form['comment_field'] = '<p class="comment-form-comment"><label for="comment"></label> <textarea id="comment" name="comment" placeholder="WRITE SOMETHING..." cols="45" rows="8" aria-required="true"></textarea></p>';
        $form['comment_notes_before'] = '';
        $form['label_submit'] = 'Add Comment';
        $form['title_reply'] = '<span class="bordertitle-red"></span>Leave a Comment';
        return $form;
    }
    endif;
    add_filter( 'comment_form_defaults', 'profitmag_alter_comment_form' );


/**
 * Comment list Form
 * 
 */
if ( ! function_exists( 'profitmag_commment_list' ) ) :
    function profitmag_commment_list( $comment, $args, $depth ) { 
        $GLOBALS['comment'] = $comment;
        extract($args, EXTR_SKIP);

        if ( 'div' == $args['style'] ) {
            $tag = 'div';
            $add_below = 'comment';
        } else {
            $tag = 'li';
            $add_below = 'div-comment';
        }
        ?>
        <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
        <?php if ( 'div' != $args['style'] ) : ?>
            <div id="div-comment-<?php comment_ID() ?>" class="comment-body clearfix">
            <?php endif; ?>
            <div class="comment-author vcard">
                <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, '117' ); ?>
                <?php printf( __( '<cite class="fn">%s</cite>', 'profitmag' ), get_comment_author_link() ); ?>
            </div>
            <?php if ( $comment->comment_approved == '0' ) : ?>
                <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'profitmag' ); ?></em>
                <br />
            <?php endif; ?>

            <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
                <i class="fa fa-clock-o"></i>
                <?php
                /* translators: 1: date, 2: time */
                printf( __('%1$s at %2$s', 'profitmag'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)','profitmag' ), '  ', '' );
                ?>
            </div>

            <?php comment_text(); ?>

            <div class="reply">
                <i class="fa fa-thumbs-up"></i>
                <i class="fa fa-thumbs-down"></i>
                <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            </div>
            <?php if ( 'div' != $args['style'] ) : ?>
            </div>
        <?php endif; ?>
        <?php
    }
    endif;

/**
 * Excerpt length and more text
 */ 
if ( ! function_exists( 'profitmag_alter_excerpt' ) ) :
    function profitmag_alter_excerpt() {
        return 75;
    }
    endif;
    add_filter( 'excerpt_length', 'profitmag_alter_excerpt' );

    if ( ! function_exists( 'profitmag_excerpt_more' ) ) :
        function profitmag_excerpt_more( $more ) {
            return '...';
        }
        endif;
        add_filter( 'excerpt_more', 'profitmag_excerpt_more' );


/**
 * ProfitMag Pagination
 */ 
if ( ! function_exists( 'profitmag_pagination' ) ) :
    function profitmag_pagination() {
        global $wp_query;

    $big = 999999999; // need an unlikely integer

    
    echo paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,        
        'prev_text'    => __('&laquo;', 'profitmag'),
        'next_text'    => __('&raquo;', 'profitmag'),
        ) );
    
}
endif;

// retrieves the attachment ID from the file URL
if ( ! function_exists( 'profitmag_get_image_id' ) ) :
    function profitmag_get_image_id($image_url) {
        global $wpdb;
        $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
        return $attachment[0]; 
    }
    endif;

// Modify Search Form
    if ( ! function_exists( 'profitmag_search_form' ) ) :
        function profitmag_search_form( $form ) {
            $options = profit_get_theme_options();
            $placeholder = array_key_exists('profitmag_search_placeholder', $options) ? $options['profitmag_search_placeholder'] : 'Search';

            $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . esc_url( home_url( '/' ) ) . '" >
            <div><label class="screen-reader-text" for="s"></label>
                <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_html($placeholder).'" />
                <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search', 'profitmag' ) .'" />
            </div>
        </form>';

        return $form;
    }
    endif;
    add_filter( 'get_search_form', 'profitmag_search_form' );

    if ( ! function_exists( 'profitmag_sidebar_excerpt' ) ) :
        function profitmag_sidebar_excerpt( $content ) {
            $content=substr( $content, 0, 70 );
            $content=substr($content,0,strrpos($content," "));
            echo $content;
        };
        endif;

// To add class on body for sidebar
        if ( ! function_exists( 'profitmag_alter_body_class' ) ) :
            function profitmag_alter_body_class( $classes ) {
                if( is_home() || is_front_page() ) {
                    $sidebar_layout = 'right_sidebar';    
                }else {
                    $profitmag_settings = profit_get_theme_options();
                    if( isset( $profitmag_settings['profitmag_sidebar_layout_setting'] )) {
                        $sidebar_layout = $profitmag_settings['profitmag_sidebar_layout_setting'];    
                    }else {
                        $sidebar_layout = 'no_sidebar';
                    }    
                }    

                $classes[] = $sidebar_layout;
                return $classes;
            }
            endif;
            add_filter( 'body_class', 'profitmag_alter_body_class' );


// To change read more text
            $profitmag_settings = profit_get_theme_options();

            if ( !empty($profitmag_settings['profitmag_readmore_setting']) ) {

                add_filter( 'gettext', 'profitmag_change_text', 20, 3 );

                if ( ! function_exists( 'profitmag_change_text' ) ) :
                    function profitmag_change_text( $translated_text, $text, $domain ) { 

                        $profitmag_read =  get_theme_mod( "profitmag_theme_options");

                        $read_more = $profitmag_read['profitmag_readmore_setting'];


                        switch ( $translated_text ) {

                            case 'Read More' :

                            $translated_text = $read_more;

                            break;
                        }

                        return $translated_text;
                    }
                    endif;

                }

// To check widget status
                if ( ! function_exists( 'profitmag_widget_count' ) ) :

                 function profitmag_widget_count( $sidebar_names ){

                    $status = 0;

                    foreach ($sidebar_names as $sidebar) {

                        if( is_active_sidebar( $sidebar )){
                            $status = $status+1;
                        }
                    }

                    return $status;        
                }

                endif;

/**
 * Displays the optional custom logo.
 * 
 */

if ( ! function_exists( 'profitmag_custom_logo' ) ) :

    function profitmag_custom_logo() {
        if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
        }
    }
    endif;


 //=============================================================
 // Function to remove default controls
 //=============================================================
    add_action( "customize_register", "profitmag_remove_controls" );

    function profitmag_remove_controls( $wp_customize ) {

 //=============================================================
 // Remove header image, Colors, Background image
 //=============================================================
     $wp_customize->remove_control("header_image");
     $wp_customize->remove_section("colors");
     $wp_customize->remove_section("background_image");

 }

 if( ! function_exists( 'profitmag_customize_callback_reset_all_settings' ) ):

  /**
   * Callback for Reset all settings.
   *
   * @since 1.0.0
   *
   * @return bool Return false.
   */
function profitmag_customize_callback_reset_all_settings(){
    $arr = profit_get_theme_options();
    $value = $arr['reset_all_settings'];
    if ( 1 === $value ) {
        set_theme_mod( 'profitmag_theme_options', array() );
        remove_theme_mod( 'custom_logo' );

    }
    else {
        return false;

    }

}
endif;
add_action( 'customize_save_after', 'profitmag_customize_callback_reset_all_settings' );