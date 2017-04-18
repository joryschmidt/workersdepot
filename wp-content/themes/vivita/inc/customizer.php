<?php
/**
 * Vivita Theme Customizer.
 *
 * @package Vivita
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vivita_customize_register( $wp_customize ) {
    
    class VivitaCustomizerPanel extends WP_Customize_Control {

        public function render_content() { ?>
            
            <p>
                <a target="_BLANK" href="http://vivita-personal.smartcatdev.wpengine.com/" class="button-secondary"><?php _e( 'Live demo', 'vivita' ); ?></a>
                <a target="_BLANK" href="https://smartcatdesign.net/downloads/vivita-pro/" class="button-primary"><?php _e( 'Get Vivita Pro', 'vivita' ); ?></a>
            </p>

            <p>
                <?php _e( 'The pro version of Vivita includes a ton of additional features, which allows you to take your site layout and design to the next step.', 'vivita' ); ?>
            </p>
            
            <p>
            <h3><?php _e( 'Pro Features:', 'vivita' ); ?></h3>
                <ol>
                    <li><?php _e( 'FAQ, Call-to-action, Contact Info & Contact Form Widgets', 'vivita' ) ?></li>
                    <li><?php _e( 'Responsive Image Gallery', 'vivita' ) ?></li>
                    <li><?php _e( 'Clients, Projects, News & Events Post Types & Widgets', 'vivita' ) ?></li>
                    <li><?php _e( 'Testimonials & Work History', 'vivita' ) ?></li>
                    <li><?php _e( '11 Additional page & post templates', 'vivita' ) ?></li>
                    <li><?php _e( '5 Additional widget areas', 'vivita' ) ?></li>
                    <li><?php _e( '13 Additional widgets', 'vivita' ) ?></li>
                    <li><?php _e( 'Social sharing & Google Analytics tracking code', 'vivita' ) ?></li>
                    <li><?php _e( 'Remove the "Design by Smartcat" brading', 'vivita' ) ?></li>
                </ol>
            </p>
            
            
            <h4>
                <?php _e( 'Enjoy this free theme! If you have any recommendations, comments or suggestions please leave us a comment on our', 'vivita' ); ?>
                <a href="https://www.facebook.com/SmartcatDesign/" target="_BLANK"><?php _e( 'Facebook page', 'vivita' ); ?></a>
            </h4>
        <?php }

    }
    
    $wp_customize->add_section('vivita_demo', array(
        'title'     => __( 'Pro Version Demo', 'vivita'),
        'priority'  => 0.5,
    ));
    
	$wp_customize->add_setting( 'vivita_demo_details', array(
            'default'           => false,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
            new VivitaCustomizerPanel(
            $wp_customize,
            'vivita_demo',
                array(
                    'label'     => __('Vivita Demo','vivita'),
                    'section'   => 'vivita_demo',
                    'settings'  => 'vivita_demo_details',
                )
            )
	);
    
    
        // Header and Footer Panel
        require_once trailingslashit( get_template_directory() ) . 'inc/customizer/settings-header-footer.php';
        
        // Site Logo & Title
        require_once trailingslashit( get_template_directory() ) . 'inc/customizer/settings-identity.php';

        // Front Page Panel
        require_once trailingslashit( get_template_directory() ) . 'inc/customizer/settings-front-page.php';

        // Site Appearance Panel
        require_once trailingslashit( get_template_directory() ) . 'inc/customizer/settings-appearance.php';

        // Blog Panel
        require_once trailingslashit( get_template_directory() ) . 'inc/customizer/settings-blog.php';
        
        // Single Post Panel
        require_once trailingslashit( get_template_directory() ) . 'inc/customizer/settings-single.php';
       
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
        
}
add_action( 'customize_register', 'vivita_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function vivita_customize_preview_js() {
	wp_enqueue_script( 'vivita_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), VIVITA_VERSION, true );
}
add_action( 'customize_preview_init', 'vivita_customize_preview_js' );


function vivita_customize_enqueue() {
    
    wp_enqueue_style('vivita_customizer_css', get_template_directory_uri() . '/inc/css/customizer.css', array(), VIVITA_VERSION);
    
}
add_action( 'customize_controls_enqueue_scripts', 'vivita_customize_enqueue' );

/**
 * Sanitization Functions
 */

function vivita_sanitize_integer( $input ) {
    return is_numeric( $input ) ? intval( $input ) : '';
}

function vivita_sanitize_post( $input ) {
    
    $valid_keys = vivita_all_posts_array( true );
    
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }  
    
}

function vivita_sanitize_overlay_decimal( $input ) {
    return is_numeric( $input ) && $input <= 1.0 && $input >= 0.0 ? $input : '';
}

function vivita_sanitize_show_hide( $input ) {
    
    $valid_keys = array(
        'show'      => __( 'Show', 'vivita' ),
        'hide'      => __( 'Hide', 'vivita' ),
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }  
    
}

function vivita_sanitize_logo_portrait_location( $input ) {
    
    $valid_keys = array(
        'header'    => __( 'Site Header', 'vivita' ),
        'promo'     => __( 'Featured Post Section', 'vivita' ),
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }  
    
}

function vivita_sanitize_logo_portrait_crop( $input ) {
    
    $valid_keys = array(
        'default'   => __( 'Unmodified', 'vivita' ),
        'circle'    => __( 'Circle Cropped', 'vivita' ),
        'rounded'   => __( 'Rounded Rectangle Cropped', 'vivita' ),
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }  
    
}

function vivita_sanitize_link_target( $input ) {
    
    $valid_keys = array(
        'same'      => __( 'Same Window', 'vivita' ),
        'new'       => __( 'New Window', 'vivita' ),
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }  
    
}

function vivita_sanitize_skin_color( $input ) {
    
    $valid_keys = array(
        'blueberry'         => __( 'Blueberry', 'vivita' ),
        'lilac'             => __( 'Lilac', 'vivita' ),
        'pumpkin-spice'     => __( 'Pumpkin Spice', 'vivita' ),
        'freshwater'        => __( 'Freshwater', 'vivita' ),
        'wintergreen'       => __( 'Wintergreen', 'vivita' ),
        'autumn'            => __( 'Autumn', 'vivita' ),
        'jelly'             => __( 'Jelly', 'vivita' ),
        'shade'             => __( 'Shade', 'vivita' ),
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }  
    
}

function vivita_sanitize_social_style( $input ) {
    
    $valid_keys = array(
        'just-icons'    => __( 'No Border (just the icons)', 'vivita' ),
        'rounded-rect'  => __( 'Rounded Rectangles', 'vivita' ),
        'bubbles'       => __( 'Bubbles', 'vivita' ),
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }  
    
}

function vivita_sanitize_blog_roll_style( $input ) {
    
    $valid_keys = array(
        'multi-card'      => __( 'Multi-card', 'vivita' ),
        'full-width'      => __( 'Stacked Full-width', 'vivita' ),
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }  
    
}

function vivita_sanitize_font( $input ) {
    
    $valid_keys = vivita_fonts();
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }  
    
}

