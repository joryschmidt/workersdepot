<?php
/**
 * ProfitMag functions and definitions
 *
 * @package ProfitMag
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'profitmag_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function profitmag_setup() {

	/*
	 * Make theme available for translation.	
	 */	
	load_theme_textdomain( 'profitmag' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.	
	 */
	load_theme_textdomain( 'profitmag', get_template_directory() . '/languages' );

    
    /*
     * Enable support for custom logo.
     */  
   	add_theme_support( 'custom-logo', array(
   		'flex-height' => true,
   		'flex-width'  => true,
   	) );
    
    // Add Featured Image
    add_theme_support( 'post-thumbnails' );	

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'profitmag' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'profitmag_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
    
}
endif; // profitmag_setup
add_action( 'after_setup_theme', 'profitmag_setup' );


/**
 *  Store post view counter 
 */
function profitmag_record_views($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);    
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


// Resize images
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'home-slider', 660, 365, true ); 
    add_image_size( 'slider-beside', 240, 172, true );
    add_image_size( 'three-col-thumb', 265, 153, true );
    add_image_size( 'five-col-thumb', 148, 85, true );
    add_image_size( 'block4-main-thumb', 487, 304, true );
    add_image_size( 'block4-post-thumb', 100, 85, true );
    add_image_size( 'block-left-right', 174, 111, true );   
    add_image_size( 'popular-thumb', 193, 112, true ); 
    add_image_size( 'gallery-full', 818, 537, true );
    add_image_size( 'gallery-thumb', 71, 40, true );
    add_image_size( 'recent-thumb', 95, 62, true );
    add_image_size( 'sidebar-medium', 272, 137, true );
    add_image_size( 'sidebar-gallery', 83, 83, true );
    add_image_size( 'single-thumb', 563, 353, true );
    add_image_size( 'comment-thumb', 117, 91, true );
    add_image_size( 'archive-thumb', 200, 140, true );
    
}

//Menu fallback function
if ( !function_exists('profitmag_default_menu_fallback') ) :

function profitmag_default_menu_fallback(){

	echo '<ul id="menu-main-menu" class="menu">';
		echo '<li class="menu-item"><a href="' . esc_url( home_url( '/' ) ) . '">' . __( 'Home', 'profitmag' ). '</a></li>';
		wp_list_pages( array(
			'title_li' => '',
			'depth'    => 1,
			'number'   => 5,
		) );
		echo '</ul>';
	
}

endif;

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Custom Header Logo
 */
require get_template_directory() . '/inc/custom-header.php';



/*
* file for Profitmag Control functions
*/
require get_template_directory() . '/inc/profitmag-controls.php';

/*
* file for Profitmag Additional functions
*/
require get_template_directory() . '/inc/profitmag-additional.php';

/**
 * Custom functions for theme
 */
require get_template_directory().'/inc/profitmag-functions.php';

/**
 * ProfitMag Custom Widgets
 *
 * @package ProfitMag
 */
 
 /**
 * Register Recent Posts Widget 
 *
 * @since ProfitMag Widget Pack 1.0
 */
require get_template_directory() . '/inc/widgets/widget-recent-posts.php';


/**
 * Register Popular Posts Widget 
 *
 * @since ProfitMag Widget Pack 1.0
 */
require get_template_directory() . '/inc/widgets/widget-popular-posts.php';


