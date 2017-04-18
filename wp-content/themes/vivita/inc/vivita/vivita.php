<?php

/**
 * Enqueue scripts and styles.
 */
function vivita_scripts() {
    
	wp_enqueue_style( 'vivita-style', get_stylesheet_uri() );
        
        // Load Fonts from array
        $fonts              = vivita_fonts();
        $non_google_fonts   = vivita_non_google_fonts();

        // Primary Font Enqueue
        if( array_key_exists ( get_theme_mod( 'vivita_font_primary', 'Raleway, sans-serif'), $fonts ) && !array_key_exists ( get_theme_mod( 'vivita_font_primary', 'Raleway, sans-serif'), $non_google_fonts ) ) :
            wp_enqueue_style( 'vivita-font-primary', '//fonts.googleapis.com/css?family=' . esc_attr( $fonts[ get_theme_mod( 'vivita_font_primary', 'Raleway, sans-serif' ) ] ), array(), VIVITA_VERSION );
        endif;

        // Secondary Font Enqueue
        if( array_key_exists ( get_theme_mod( 'vivita_font_secondary', 'Catamaran, sans-serif'), $fonts ) && !array_key_exists ( get_theme_mod( 'vivita_font_secondary', 'Catamaran, sans-serif'), $non_google_fonts ) ) :
            wp_enqueue_style( 'vivita-font-secondary', '//fonts.googleapis.com/css?family=' . esc_attr( $fonts[ get_theme_mod( 'vivita_font_secondary', 'Catamaran, sans-serif' ) ] ), array(), VIVITA_VERSION );
        endif;

        // Menu Font Enqueue
        if( array_key_exists ( get_theme_mod( 'vivita_font_menu', 'Catamaran, sans-serif'), $fonts ) && !array_key_exists ( get_theme_mod( 'vivita_font_menu', 'Catamaran, sans-serif'), $non_google_fonts ) ) :
            wp_enqueue_style( 'vivita-font-menu', '//fonts.googleapis.com/css?family=' . esc_attr( $fonts[ get_theme_mod( 'vivita_font_menu', 'Catamaran, sans-serif' ) ] ), array(), VIVITA_VERSION );
        endif;
    
        // Styles
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.min.css', array(), VIVITA_VERSION );
        wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/inc/css/font-awesome.min.css', array(), VIVITA_VERSION );
        wp_enqueue_style( 'vivita-main-style', get_template_directory_uri() . '/inc/css/style-human.css', array(), VIVITA_VERSION );
        
        // Scripts
        wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/inc/js/bootstrap.min.js', array('jquery'), VIVITA_VERSION, true );
        wp_enqueue_script( 'jquery-slimScroll', get_template_directory_uri() . '/inc/js/jquery.slimscroll.min.js', array('jquery'), VIVITA_VERSION, true );
        wp_enqueue_script( 'vivita-main-script', get_template_directory_uri() . '/inc/js/custom.js', array('jquery', 'jquery-masonry', 'jquery-ui-core'), VIVITA_VERSION, true );
        
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
        
}
add_action( 'wp_enqueue_scripts', 'vivita_scripts' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vivita_widgets_init() {
    
        register_sidebar( array(
                'name'          => esc_html__( 'Left Sidebar', 'vivita' ),
                'id'            => 'sidebar-left',
                'description'   => esc_html__( 'Add widgets here.', 'vivita' ),
                'before_widget' => '<div class="col-sm-12"><section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section></div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
        ) );

        register_sidebar( array(
                'name'          => esc_html__( 'Right Sidebar', 'vivita' ),
                'id'            => 'sidebar-right',
                'description'   => esc_html__( 'Add widgets here.', 'vivita' ),
                'before_widget' => '<div class="col-sm-12"><section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section></div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
        ) );
        
        register_sidebar( array(
                'name'          => esc_html__( 'Featured Post Section', 'vivita' ),
                'id'            => 'sidebar-promo',
                'description'   => esc_html__( 'Add widgets here.', 'vivita' ),
                'before_widget' => '<div class="col-sm-4"><section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section></div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
        ) );

        register_sidebar( array(
                'name'          => esc_html__( 'Homepage A', 'vivita' ),
                'id'            => 'sidebar-front-a',
                'description'   => esc_html__( 'Add widgets here.', 'vivita' ),
                'before_widget' => '<div class="col-sm-4"><section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section></div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
        ) );

        register_sidebar( array(
                'name'          => esc_html__( 'Homepage B', 'vivita' ),
                'id'            => 'sidebar-front-b',
                'description'   => esc_html__( 'Add widgets here.', 'vivita' ),
                'before_widget' => '<div class="col-sm-4"><section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section></div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
        ) );

        register_sidebar( array(
                'name'          => esc_html__( 'Footer', 'vivita' ),
                'id'            => 'sidebar-footer',
                'description'   => esc_html__( 'Add widgets here.', 'vivita' ),
                'before_widget' => '<div class="col-sm-4"><section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section></div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
        ) );
        
}
add_action( 'widgets_init', 'vivita_widgets_init' );

/**
 * Returns all posts as an array.
 * Pass true to include Pages
 * 
 * @param boolean $include_pages
 * @return array of posts
 */
function vivita_all_posts_array( $include_pages = false ) {
    
    $posts = get_posts( array(
        'post_type'        => $include_pages ? array( 'post', 'page' ) : 'post',
        'posts_per_page'   => -1,
        'post_status'      => 'publish',
        'orderby'          => 'title',
        'order'            => 'ASC',
    ));

    $posts_array = array();

    foreach ( $posts as $post ) :
        
        if ( ! empty( $post->ID ) ) :
            $posts_array[ $post->ID ] = $post->post_title;
        endif;
        
    endforeach;
    
    return $posts_array;
    
}

/**
 * Render the Featured Post section on the front page
 */
function vivita_render_promo_bio() { ?>

    <div id="about-section" class="container-fluid">
        
        <div class="row">
        
            <div class="col-sm-12">
            
                <div id="about-inner" class="container">
                    
                    <div class="row">
                
                        <div class="col-sm-2"></div>

                        <div class="col-sm-8">
                            
                            <?php if ( function_exists( 'has_custom_logo' ) && has_custom_logo() && get_theme_mod( 'vivita_logo_portrait_location', 'header' ) == 'promo' ) : ?>

                                <div class="branding-content">

                                    <?php the_custom_logo(); ?>

                                </div>

                            <?php endif; ?>
                                            
                            <?php $about_post = get_theme_mod( 'vivita_promo_bio_post', 1 ); ?>
                                            
                            <?php if ( !empty( $about_post ) && get_post( $about_post ) ) : ?> 
                                    
                                <h2 id="about-primary">
                                    <?php echo esc_html( get_the_title( $about_post ) ); ?>
                                </h2>   

                                <hr class="accent-divider">

                                <p id="about-secondary">
                                    <?php echo wp_trim_words( wp_strip_all_tags( apply_filters( 'the_content', get_post_field( 'post_content', $about_post ) ) ), 50 ); ?>
                                </p>

                                <?php if ( get_theme_mod( 'vivita_promo_bio_button_label', __( 'Show Me More', 'vivita' ) ) != '' ) : ?>
                                    <a class="accent-button" href="<?php echo esc_url( get_the_permalink( $about_post ) ); ?>">
                                        <?php echo esc_html( get_theme_mod( 'vivita_promo_bio_button_label', __( 'Show Me More', 'vivita' ) ) ); ?>
                                    </a>
                                <?php endif; ?>
                            
                            <?php endif; ?>
                            
                        </div>

                        <div class="col-sm-2"></div>

                        <?php if ( is_active_sidebar( 'sidebar-promo' ) ) : ?>

                            <div class="col-sm-12">

                                <div id="promo-widgets">

                                    <?php get_sidebar( 'promo' ); ?>

                                </div>

                            </div>

                        <?php endif; ?>
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        
    </div>
    
<?php 
}
add_action('vivita_promo_bio', 'vivita_render_promo_bio');

/**
 * Render the Jumbotron section on the front page
 */
function vivita_render_jumbotron() { ?>
    
    <?php $jumbotron_post_id = get_theme_mod( 'vivita_jumbotron_post', 1 ); ?>

    <?php if ( !empty( $jumbotron_post_id ) && get_post( $jumbotron_post_id ) ) : ?> 

        <div id="jumbotron-section" <?php echo has_post_thumbnail( $jumbotron_post_id ) ? 'style="background-image: url(' . get_the_post_thumbnail_url( $jumbotron_post_id ) . ');"' : '' ; ?>>

            <div id="jumbotron-overlayer">            
            </div>

            <div class="container">

                <div class="row">

                    <div class="col-sm-12">

                        <?php if ( get_the_title( $jumbotron_post_id ) ) : ?>
                            <h2 class="overlay-title">
                                <?php echo esc_html( get_the_title( $jumbotron_post_id ) ); ?>
                            </h2>
                        <?php endif; ?>

                        <?php if( get_theme_mod( 'vivita_jumbotron_button_text', __( 'Show Me More', 'vivita' ) ) != '' ) : ?>

                            <a href="<?php echo esc_url( get_the_permalink( $jumbotron_post_id ) ); ?>"
                                <?php echo get_theme_mod( 'vivita_jumbotron_button_target', 'same' ) == 'same' ? esc_attr( '' ) : esc_attr( ' target="_BLANK" ' ); ?>
                                class="accent-button jumbotron-btn">
                                    <?php echo esc_html( get_theme_mod( 'vivita_jumbotron_button_text', __( 'Show Me More', 'vivita' ) ) ); ?>
                            </a>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

        </div>

    <?php endif; 
    
}
add_action('vivita_jumbotron', 'vivita_render_jumbotron');

/**
 * Render the Footer
 */
function vivita_render_footer() { ?>
    
    <div id="footer-sidebar-wrapper" class="container-fluid">

        <div class="row">

            <div class="col-md-12">

                <div class="container">
                    
                    <div class="row">

                        <?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
                            <div class="col-md-12">

                                <div id="footer-widget-area">

                                    <?php get_sidebar( 'footer' ); ?>

                                </div>

                            </div>
                        <?php endif; ?>
                       
                    </div>
                    
                </div>
                
            </div>
    
        </div>
            
    </div>
    
    <div id="footer-branding-wrapper" class="container-fluid">

        <div class="row">

            <div class="col-md-12">

                <div class="container">
                    
                    <div class="row">
                        
                        <div class="col-md-12">
                            
                            <div id="footer-branding">

                                <?php if ( get_theme_mod( 'vivita_footer_copyright', get_bloginfo( 'name' ) ) ) : ?>
                                    <span class="site-info">
                                        <?php echo esc_html( get_theme_mod( 'vivita_footer_copyright', get_bloginfo( 'name' ) ) ); ?>
                                    </span>
                                <?php endif; ?>

                                <a href="https://smartcatdesign.net" rel="designer">
                                    <?php printf( esc_html__( 'Designed by %s', 'vivita' ), 'Smartcat' ); ?> 
                                    <img src="<?php echo esc_url( trailingslashit( get_template_directory_uri() ) . 'inc/images/sc-emblem-skyblue.png' ); ?>" alt="<?php printf( esc_attr__( '%s Logo', 'vivita' ), 'Smartcat' ); ?>" />
                                </a>
                                
                            </div>

                        </div>

                    </div>
                    
                </div>
                
            </div>
    
        </div>
            
    </div>
    
<?php 
}
add_action('vivita_footer', 'vivita_render_footer');

/**
 * Render the homepage widget areas.
 */
function vivita_render_homepage_widget_areas() { ?>
    
    <!-- Homepage Area A -->
    <?php if ( get_theme_mod( 'vivita_toggle_widget_area_a', 'show' ) == 'show' ) : ?>
    
        <?php if ( ! is_active_sidebar( 'sidebar-front-a' ) ) : ?>

            <div class="container-fluid area-a">
                
                <div class="row">
                    
                    <div class="col-sm-12">
                        
                        <div class="container">
                            
                            <section class="front-page-widget area-a">

                                <div class="row">

                                    <div class="col-sm-12">

                                        <?php if( current_user_can( 'edit_theme_options' ) ) :  ?>
                                        
                                            <h6 class="widget-title">
                                                <?php esc_html_e( 'Homepage A Widget Area', 'vivita' ); ?>
                                            </h6>
                                            <div class="textwidget">
                                                <p class="default-text"><?php esc_html_e( 'You can enable/disable this widget area from Customizer - Frontpage - Homepage Widget A. This is a widget placeholder, and you can add any widget to it from Customizer - Widgets.', 'vivita' ); ?></p>
                                            </div>
                                        
                                        <?php else: ?>
                                        
                                            <h6 class="widget-title">
                                                <?php bloginfo( 'name' ); ?>
                                            </h6>
                                            <div class="textwidget">
                                                <p class="default-text"><?php bloginfo( 'description' ); ?></p>
                                            </div>
                                        
                                        <?php endif; ?>

                                    </div>

                                </div>

                            </section>
                            
                        </div>
                        
                    </div>
                    
                </div>
    
            </div>

        <?php else : ?>

            <?php get_sidebar( 'front-a' ); ?>

        <?php endif; ?>
    
    <?php endif; ?>

    <!-- Homepage Area B -->
    <?php if ( get_theme_mod( 'vivita_toggle_widget_area_b', 'show' ) == 'show' ) : ?>
    
        <?php if ( ! is_active_sidebar( 'sidebar-front-b' ) ) : ?>

            <div class="container-fluid area-b">
                
                <div class="row">
                    
                    <div class="col-sm-12">
                        
                        <div class="container">
                            
                            <section class="front-page-widget area-b">

                                <div class="row">

                                    <div class="col-sm-12">

                                        <?php if( current_user_can( 'edit_theme_options' ) ) : ?>
                                        
                                            <h6 class="widget-title">
                                                <?php esc_html_e( 'Homepage B Widget Area', 'vivita' ); ?>
                                            </h6>
                                            <div class="textwidget">
                                                <p class="default-text"><?php esc_html_e( 'You can enable/disable this widget area from Customizer - Frontpage - Homepage Widget B. This is a widget placeholder, and you can add any widget to it from Customizer - Widgets.', 'vivita' ); ?></p>
                                            </div>
                                        
                                        <?php else: ?>
                                        
                                            <h6 class="widget-title">
                                                <?php bloginfo( 'name' ); ?>
                                            </h6>
                                            <div class="textwidget">
                                                <p class="default-text"><?php bloginfo( 'description' ); ?></p>
                                            </div>
                                        
                                        <?php endif; ?>

                                    </div>

                                </div>

                            </section>
                            
                        </div>
                        
                    </div>
                    
                </div>
    
            </div>

        <?php else : ?>

            <?php get_sidebar( 'front-b' ); ?>

        <?php endif; ?>
    
    <?php endif; ?>
    
    
<?php }
add_action( 'vivita_homepage_widget_areas', 'vivita_render_homepage_widget_areas' );

/**
 * Returns all available fonts as an array
 * 
 * @return array of fonts
 */
function vivita_fonts(){
    
    $font_family_array = array(
        
        // Web Fonts
        'Arial, Helvetica, sans-serif'                          => 'Arial',
        'Arial Black, Gadget, sans-serif'                       => 'Arial Black',
        'Courier New, monospace'                                => 'Courier New',
        'Georgia, serif'                                        => 'Georgia',
        'Impact, Charcoal, sans-serif'                          => 'Impact',
        'Lucida Console, Monaco, monospace'                     => 'Lucida Console',
        'Lucida Sans Unicode, Lucida Grande, sans-serif'        => 'Lucida Sans Unicode',
        'MS Sans Serif, Tahoma, sans-serif'                     => 'MS Sans Serif',
        'MS Serif, New York, serif'                             => 'MS Serif',
        'Palatino Linotype, Book Antiqua, Palatino, serif'      => 'Palatino Linotype',
        'Tahoma, Geneva, sans-serif'                            => 'Tahoma',
        'Times New Roman, Times, serif'                         => 'Times New Roman',
        'Trebuchet MS, sans-serif'                              => 'Trebuchet MS',
        'Verdana, Geneva, sans-serif'                           => 'Verdana',
        
        // Google Fonts
        'Abel, sans-serif'                                      => 'Abel',
        'Arvo, serif'                                           => 'Arvo:400,400i,700',
        'Catamaran, sans-serif'                                 => 'Catamaran:200,300,400,500,600',
        'Bangers, cursive'                                      => 'Bangers',
        'Dosis, sans-serif'                                     => 'Dosis:200,300,400',
        'Droid Sans, sans-serif'                                => 'Droid+Sans:400,700',
        'Josefin Sans, sans-serif'                              => 'Josefin+Sans:300,400,600,700',
        'Lato, sans-serif'                                      => 'Lato:100,300,400,700,900,300italic,400italic',
        'Lobster Two, cursive'                                  => 'Lobster+Two',
        'Lora, serif'                                           => 'Lora',
        'Montserrat, sans-serif'                                => 'Montserrat:400,700',
        'Old Standard TT, serif'                                => 'Old+Standard+TT:400,400i,700',
        'Open Sans, sans-serif'                                 => 'Open Sans',
        'Open Sans Condensed, sans-serif'                       => 'Open+Sans+Condensed:300,300i,700',
        'Orbitron, sans-serif'                                  => 'Orbitron',
        'Oswald, sans-serif'                                    => 'Oswald:300,400',
        'Poiret One, cursive'                                   => 'Poiret+One',
        'PT Sans Narrow, sans-serif'                            => 'PT+Sans+Narrow',
        'Raleway, sans-serif'                                   => 'Raleway:400,300,500,700',
        'Rajdhani, sans-serif'                                  => 'Rajdhani:300,400,500,600',
        'Roboto Condensed, sans-serif'                          => 'Roboto+Condensed:400,300,700',
        'Shadows Into Light, cursive'                           => 'Shadows+Into+Light',
        'Source Sans Pro, sans-serif'                           => 'Source+Sans+Pro:200,400,600',
        'Vollkorn, serif'                                       => 'Vollkorn:400,400i,700',
        
    );
    
    return $font_family_array;
    
}

/**
 * Returns all available non-Google Fonts fonts as an array
 * 
 * @return array of websafe fonts
 */
function vivita_non_google_fonts() {

    $non_google_fonts = array(
        
        // Web Fonts Only (Non-Google)
        
        'Arial, Helvetica, sans-serif'                          => 'Arial',
        'Arial Black, Gadget, sans-serif'                       => 'Arial Black',
        'Courier New, monospace'                                => 'Courier New',
        'Georgia, serif'                                        => 'Georgia',
        'Impact, Charcoal, sans-serif'                          => 'Impact',
        'Lucida Console, Monaco, monospace'                     => 'Lucida Console',
        'Lucida Sans Unicode, Lucida Grande, sans-serif'        => 'Lucida Sans Unicode',
        'MS Sans Serif, Tahoma, sans-serif'                     => 'MS Sans Serif',
        'MS Serif, New York, serif'                             => 'MS Serif',
        'Palatino Linotype, Book Antiqua, Palatino, serif'      => 'Palatino Linotype',
        'Tahoma, Geneva, sans-serif'                            => 'Tahoma',
        'Times New Roman, Times, serif'                         => 'Times New Roman',
        'Trebuchet MS, sans-serif'                              => 'Trebuchet MS',
        'Verdana, Geneva, sans-serif'                           => 'Verdana',
        
    );

    return $non_google_fonts;
    
}

/**
 * Determine the width of columns based on left and right sidebar settings.
 */
function vivita_main_width( $override = 'vivita_default' ) {
    
    if ( $override == 'vivita_default' ) :
        
        // An override was not passed from the Page / Post calling this function, or default is set
        
        if( is_active_sidebar( 'sidebar-left' ) && is_active_sidebar( 'sidebar-right' ) ) :
            $width = 6;
        elseif( is_active_sidebar( 'sidebar-left' ) || is_active_sidebar( 'sidebar-right' ) ) :
            $width = 9;
        else:
            $width = 12;
        endif;
        
    else :

        // An override was passed from the Page / Post calling this function
        
        if( $override == 'vivita_leftright' && ( is_active_sidebar( 'sidebar-left' ) && is_active_sidebar( 'sidebar-right' ) ) ) :
            $width = 6;
        elseif( ( ( $override == 'vivita_left' || $override == 'vivita_leftright' ) && is_active_sidebar( 'sidebar-left' ) ) || ( ( $override == 'vivita_right' || $override == 'vivita_leftright' ) && is_active_sidebar( 'sidebar-right' ) ) ) :
            $width = 9;
        else:
            $width = 12;
        endif;
        
    endif;        
    
    return $width;

}

/**
 * 
 * Inject custom JS in the header to handle certain scripted features.
 * 
 */
function vivita_custom_script() { ?>

    <script type="text/javascript">
        
        jQuery(document).ready(function ($) {
          
            /*
            * Handle Blog Roll Masonry
            */
            function doMasonry() {

                var $grid = $( "#masonry-blog-wrapper" ).imagesLoaded(function () {
                    $grid.masonry({
                        itemSelector: '.blog-roll-item',
                        columnWidth: '.grid-sizer',
                        percentPosition: true,
                        gutter: '.gutter-sizer',
                        transitionDuration: '.75s'
                    });
                });

                <?php if ( get_theme_mod( 'vivita_blog_roll_style', 'multi-card' ) == 'multi-card' ) : ?>

                    if ( $( window ).width() >= 992 ) {  

                        $('.vivita-blog-content .gutter-sizer').css('width', '2%');
                        $('.vivita-blog-content .grid-sizer').css('width', '32%');
                        $('.vivita-blog-content .blog-roll-item').css('width', '32%');

                    } else if ( $( window ).width() < 992 && $( window ).width() >= 768 ) {

                       $('.vivita-blog-content .gutter-sizer').css('width', '2%');
                       $('.vivita-blog-content .grid-sizer').css('width', '48%');
                       $('.vivita-blog-content .blog-roll-item').css('width', '48%');

                    } else {

                       $('.vivita-blog-content .gutter-sizer').css('width', '0%');
                       $('.vivita-blog-content .grid-sizer').css('width', '100%');
                       $('.vivita-blog-content .blog-roll-item').css('width', '100%');

                    }

                <?php else : ?>

                    $('.vivita-blog-content .gutter-sizer').css('width', '0%');
                    $('.vivita-blog-content .grid-sizer').css('width', '100%');
                    $('.vivita-blog-content .blog-roll-item').css('width', '100%');

                <?php endif; ?>

           }

           /**
            * Call Masonry on window resize and load
            */
           $( window ).resize( function() {
               doMasonry();
           });
           doMasonry();
            
        });

    </script>
    
<?php }
add_action('wp_head', 'vivita_custom_script');

/**
 * 
 * Inject custom CSS in the header to handle certain theme mods.
 * 
 */
function vivita_custom_css() { ?>

    <?php $skin = vivita_get_skin_colors(); ?>
    
    <style type="text/css">
        
        /* ---------- FONT SIZES ---------- */
        
        body {
            font-size: <?php echo intval( get_theme_mod( 'vivita_font_body_size', '14') ); ?>px; 
        }
                
        #site-branding .site-title {
            font-size: <?php echo intval( get_theme_mod( 'vivita_title_font_size', '36') ); ?>px;
        }
       
        .main-navigation li a,
        .main-navigation ul ul li a {
            font-size: <?php echo intval( get_theme_mod( 'vivita_nav_menu_font_size', '14') ); ?>px;
        }
        
        /* ---------- FONT FAMILIES ---------- */
        
        #archive-page-inner #archive-content .entry-title,
        div#author-page-inner #page-content .entry-title,
        div#author-block a,
        .vivita-blog-content .blog-roll-item .inner h3.post-title,
        .tooltip-inner,
        div#blog-content-wrapper div#blog-page-inner #page-content .entry-title,
        div#front-page-content div#front-page-inner #front-page-blog .entry-title,
        div#front-page-content div#blog-page-inner #front-page-blog .entry-title,
        #site-branding .site-title,
        #jumbotron-section .overlay-title,
        #menu-overlay .inner div#menu-overlay-header .navigation-title,
        #about-primary,
        div#search-page-inner div#search-block .entry-title,
        div#search-page-inner #page-content .entry-title,
        div#page-content-wrapper div#page-content-inner #page-content .entry-title,
        div#post-content-inner #post-content div#single-title-box .entry-title,
        a.accent-button.jumbotron-btn,
        .vivita-contact-info .contact-row .detail,
        .vivita-contact-info .textwidget,
        .event-post .event-details .title a,
        div.single-faq .faq-title,
        .vivita-news .news-item a,
        .vivita-projects .project-title a,
        #vivita-testimonials .testimonial-author h4,
        .vivita-pricing-table .title,
        .single-position .position-title a
        {
            font-family: <?php echo esc_attr( get_theme_mod( 'vivita_font_primary', 'Raleway, sans-serif' ) ); ?>;
        }
        
        * 
        {
            font-family: <?php echo esc_attr( get_theme_mod( 'vivita_font_secondary', 'Catamaran, sans-serif' ) ); ?>;
        }
        
        .main-navigation li a {
            font-family: <?php echo esc_attr( get_theme_mod( 'vivita_font_menu', 'Catamaran, sans-serif' ) ); ?> !important;
        }
        
        /* ---------- THEME COLORS ---------- */
        
            /* --- DARK --- */
            
                #site-branding { 
                    background-color: <?php echo esc_attr( $skin[ 'dark' ] ); ?>; 
                }
            
            /* --- PRIMARY --- */
            
                a, a:visited, a:hover, a:focus, a:active,
                #post-content-inner #post-content .post-meta .posted-on a,
                #post-content-inner #post-content .post-meta .post-author a,
                #footer-sidebar-wrapper #footer-widget-area .widget-title a,
                .container-fluid.area-a .widget-title,
                .container-fluid.area-b .widget-title,
                .container-fluid.area-c .widget-title,
                div#promo-widgets .widget-title,
                #footer-widget-area .widget-title,
                .sidebar-container .widget-title,
                #footer-widget-area .widget-title,
                .vivita-news .news-item a,
                .widget_calendar table td#next a,
                .widget_calendar table td#prev a,
                .widget-title,
                .container-fluid.area-d .widget_calendar table td#today,
                .area-d .vivita-pricing-table .special .fa {
                    color: <?php echo esc_attr( $skin[ 'primary' ] ); ?>;
                }
            
                .container-fluid.area-d,
                nav.post-navigation .nav-links .nav-next, 
                nav.post-navigation .nav-links .nav-previous,
                #single-title-box h6.category-link,
                .widget_calendar table td#today,
                nav.posts-navigation .nav-links a { 
                    background-color: <?php echo esc_attr( $skin[ 'primary' ] ); ?>; 
                }
                
                .container-fluid.area-a .widget-title,
                .container-fluid.area-b .widget-title,
                .container-fluid.area-c .widget-title,
                #footer-widget-area .widget-title,
                .sidebar-container .widget-title,
                div#promo-widgets .widget-title,
                #footer-widget-area .widget-title,
                .widget-title {
                    border-bottom: thin solid <?php echo esc_attr( $skin[ 'primary' ] ); ?>; 
                }
        
            /* --- SECONDARY --- */
            
                .vivita-blog-content .blog-roll-item article.sticky .inner .post-title a,
                .vivita-blog-content .blog-roll-item .bottom-meta .meta-section:hover i,
                .vivita-blog-content .blog-roll-item .bottom-meta a.ext-link:hover i,
                #site-branding .site-tagline,
                .main-navigation li a,
                .area-d .widget a:hover,
                .testimonial-author h4,
                .vivita-pricing-table .title {
                    color: <?php echo esc_attr( $skin[ 'secondary' ] ); ?>;
                }

                a.accent-button,
                #comments input[type="submit"],
                #primary-menu-toggle,
                .share-buttons li a,
                input[type="submit"] {
                    background-color: <?php echo esc_attr( $skin[ 'secondary' ] ); ?>;
                }

                #menu-overlay .inner #menu-overlay-header .navigation-title {
                    border-bottom: 1px solid <?php echo esc_attr( $skin[ 'secondary' ] ); ?>;
                }

                .vivita-pricing-table .inner {
                    border-color: <?php echo esc_attr( $skin[ 'secondary' ] ); ?>;
                }
                
                .vivita-pricing-table .special {
                    border-color: <?php echo esc_attr( $skin[ 'secondary' ] ); ?> transparent transparent transparent;
                }
                
                .testimonial-author h4 {
                    border-top: thin solid <?php echo esc_attr( $skin[ 'secondary' ] ); ?>;
                }
                
            /* --- TERTIARY --- */
            
                .pagination-links .page-numbers.current,
                a#blog-template-read-more {
                    background-color: <?php echo esc_attr( $skin[ 'tertiary' ] ); ?>;
                }
                
                #jumbotron-section .overlay-subtitle {
                    color: <?php echo esc_attr( $skin[ 'tertiary' ] ); ?>;
                }
            
            /* --- GRADIENT --- */
            
                div#archive-content-wrapper,
                div#author-content-wrapper,
                div#blog-content-wrapper,
                div#front-page-content,
                #about-section,
                div#search-content-wrapper,
                div#page-content-wrapper,
                div#post-content-wrapper {

                    background: <?php echo esc_attr( $skin[ 'gradient' ] ); ?>; /* Old browsers */
                    background: -moz-linear-gradient(top, <?php echo esc_attr( $skin[ 'gradient' ] ); ?> 0%, rgba(255,255,255,1) 100%); /* FF3.6-15 */
                    background: -webkit-linear-gradient(top, <?php echo esc_attr( $skin[ 'gradient' ] ); ?> 0%,rgba(255,255,255,1) 100%); /* Chrome10-25,Safari5.1-6 */
                    background: linear-gradient(to bottom, <?php echo esc_attr( $skin[ 'gradient' ] ); ?> 0%,rgba(255,255,255,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
                    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo esc_attr( $skin[ 'gradient' ] ); ?>', endColorstr='#ffffff',GradientType=0 ); /* IE6-9 */

                } 
                
            /* --- ACCENT --- */
            .area-d .search-form input.search-submit,
            .area-d a.accent-button,
            .area-d input[type="submit"],
            .vivita-contact-info .contact-row span {
                background-color: <?php echo esc_attr( $skin[ 'accent' ] ); ?>;
            }
            
            .container-fluid.area-d .widget-title,
            .container-fluid.area-d a:hover,
            .area-d #portfolio-clients .client-title a,
            .area-d .vivita-news .news-item .title a:hover,
            .area-d .vivita-pricing-table .title,
            .vivita-projects .project-date,
            .container-fluid.area-d ul#vivita-testimonials .owl-item .testimonial-author h4,
            .vivita-callout .detail a {
                color: <?php echo esc_attr( $skin[ 'accent' ] ); ?>;
            }
            
            .container-fluid.area-d .widget-title,
            .area-d .search-form input.search-submit {
                border-color: <?php echo esc_attr( $skin[ 'accent' ] ); ?>;
            }
        
        /* --- JUMBOTRON TINT --- */
        
        #jumbotron-section #jumbotron-overlayer {
            background-color: rgba(0,0,0,<?php echo esc_attr( get_theme_mod( 'vivita_slider_dark_tint', .25 ) ); ?>);
        }
        
        /* --- LOGO OR PORTRAIT IMAGE --- */
        
        img.custom-logo { 
            width: auto;
            height: <?php echo intval( get_theme_mod( 'vivita_custom_logo_height', '150' ) ); ?>px;
            <?php if ( get_theme_mod( 'vivita_logo_portrait_crop_style', 'default' ) != 'default' ) : ?>
                border-radius: <?php echo get_theme_mod( 'vivita_logo_portrait_crop_style', 'default' ) == 'circle' ? esc_attr( '50%' ) : esc_attr( '15px' ); ?>;
            <?php endif; ?>
        }
        
        /* --- AUTHOR PORTRAIT --- */
        
        #author-block .avatar {
            <?php if ( get_theme_mod( 'vivita_logo_portrait_crop_style', 'default' ) != 'default' ) : ?>
                border-radius: <?php echo get_theme_mod( 'vivita_logo_portrait_crop_style', 'default' ) == 'circle' ? esc_attr( '50%' ) : esc_attr( '15px' ); ?>;
            <?php endif; ?>
        }
        
        /* --- HEADER SOCIAL STYLE --- */
       
        div.social-bubble:hover i {
            color: <?php echo esc_attr( $skin[ 'secondary' ] ); ?> !important;
        }
        
        <?php if ( get_theme_mod( 'vivita_header_social_icon_style', 'just-icons' ) == 'bubbles' || get_theme_mod( 'vivita_header_social_icon_style', 'just-icons' ) == 'rounded-rect' ) : ?>
        
            div.social-bubble {
                border: 2px solid #fff;
                line-height: 30px;
                border-radius: <?php echo get_theme_mod( 'vivita_header_social_icon_style', 'just-icons' ) == 'rounded-rect' ? esc_attr( '5px' ) : esc_attr( '50%' ); ?>;
            }
            
            div.social-bubble:hover {
                border-color: <?php echo esc_attr( $skin[ 'secondary' ] ); ?>;
            }
            
        <?php endif; ?>
        
    </style>
    
    <?php 
    
}
add_action('wp_head', 'vivita_custom_css');

function vivita_get_skin_colors() {
    
    $skin_color_array[] = null;
    
    switch ( get_theme_mod( 'vivita_theme_color_skin', 'blueberry' ) ) :
        
        case 'blueberry' :
            $skin_color_array[ 'dark' ]         = '#1b2226';
            $skin_color_array[ 'primary' ]      = '#74c2c7';
            $skin_color_array[ 'secondary' ]    = '#e91e63';
            $skin_color_array[ 'tertiary' ]     = '#57d2db';
            $skin_color_array[ 'gradient' ]     = '#74c2c7';
            $skin_color_array[ 'accent' ]       = '#265659';
            break;

        case 'lilac' :
            $skin_color_array[ 'dark' ]         = '#272c35';
            $skin_color_array[ 'primary' ]      = '#7c67e4';
            $skin_color_array[ 'secondary' ]    = '#00d4b0';
            $skin_color_array[ 'tertiary' ]     = '#00ffd5';
            $skin_color_array[ 'gradient' ]     = '#90a2d5';
            $skin_color_array[ 'accent' ]       = '#00d2e6';
            break;

        case 'pumpkin-spice' :
            $skin_color_array[ 'dark' ]         = '#2e261f';
            $skin_color_array[ 'primary' ]      = '#FFA019';
            $skin_color_array[ 'secondary' ]    = '#ff9500';
            $skin_color_array[ 'tertiary' ]     = '#ffcc33';
            $skin_color_array[ 'gradient' ]     = '#b89e7a';
            $skin_color_array[ 'accent' ]       = '#5c2600';
            break;

        case 'freshwater' :
            $skin_color_array[ 'dark' ]         = '#292c33';
            $skin_color_array[ 'primary' ]      = '#f7646b';
            $skin_color_array[ 'secondary' ]    = '#f7646b';
            $skin_color_array[ 'tertiary' ]     = '#29D9C2';
            $skin_color_array[ 'gradient' ]     = '#29D9C2';
            $skin_color_array[ 'accent' ]       = '#61050a';
            break;

        case 'wintergreen' :
            $skin_color_array[ 'dark' ]         = '#153715';
            $skin_color_array[ 'primary' ]      = '#57db8e';
            $skin_color_array[ 'secondary' ]    = '#a6e90c';
            $skin_color_array[ 'tertiary' ]     = '#a6e90c';
            $skin_color_array[ 'gradient' ]     = '#57db8e';
            $skin_color_array[ 'accent' ]       = '#12542d';
            break;
        
        case 'autumn' :
            $skin_color_array[ 'dark' ]         = '#4d0d00';
            $skin_color_array[ 'primary' ]      = '#B64926';
            $skin_color_array[ 'secondary' ]    = '#FFB03B';
            $skin_color_array[ 'tertiary' ]     = '#FFB03B';
            $skin_color_array[ 'gradient' ]     = '#db9957';
            $skin_color_array[ 'accent' ]       = '#FFB03B';
            break;

        case 'jelly' :
            $skin_color_array[ 'dark' ]         = '#4d1933';
            $skin_color_array[ 'primary' ]      = '#993366';
            $skin_color_array[ 'secondary' ]    = '#ca2b72';
            $skin_color_array[ 'tertiary' ]     = '#d61f71';
            $skin_color_array[ 'gradient' ]     = '#c24770';
            $skin_color_array[ 'accent' ]       = '#f986bf';
            break;

        case 'shade' :
            $skin_color_array[ 'dark' ]         = '#1c1c1c';
            $skin_color_array[ 'primary' ]      = '#3c3c3c';
            $skin_color_array[ 'secondary' ]    = '#8c8c8c';
            $skin_color_array[ 'tertiary' ]     = '#cacaca';
            $skin_color_array[ 'gradient' ]     = '#808080';
            $skin_color_array[ 'accent' ]       = '#cacaca';
            break;
        
    endswitch;
    
    return $skin_color_array;
    
}

