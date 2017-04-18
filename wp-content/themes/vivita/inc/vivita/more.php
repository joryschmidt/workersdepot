<?php

/**
 * Metabox for Featured Image adjustments (height/content alignment)
 */
new Vivita_Featured_Image_Meta_Box;
class Vivita_Featured_Image_Meta_Box {

    public function __construct() {

        if ( is_admin() ) {
            add_action( 'load-post.php',        array ( $this, 'init_metabox' ) );
            add_action( 'load-post-new.php',    array ( $this, 'init_metabox' ) );
        }
        
    }

    public function init_metabox() {

        add_action( 'add_meta_boxes',           array ( $this, 'add_metabox' ) );
        add_action( 'save_post',                array ( $this, 'save_metabox' ), 10, 2 );
        
    }

    public function add_metabox() {

        add_meta_box( 'page_post_banner_meta', __( 'Featured Image Settings', 'vivita' ), array ( $this, 'render_page_post_banner_metabox' ), array( 'page', 'post' ), 'normal', 'high' );
        
    }

    public function render_page_post_banner_metabox( $post ) {

        // Add nonce for security and authentication.
        wp_nonce_field( 'banner_meta_box_nonce_action', 'banner_meta_box_nonce' );

        // Retrieve an existing value from the database.
        $banner_height      = get_post_meta( $post->ID, 'banner_meta_height', true );
        $banner_img_align   = get_post_meta( $post->ID, 'banner_meta_img_align', true );

        // Set default values.
        if ( empty( $banner_height ) )      { $banner_height = '400'; } 
        if ( empty( $banner_img_align ) )   { $banner_img_align = 'middle'; }
      
        $alignments = array(
            'top'       => __( 'Top', 'vivita' ),
            'middle'    => __( 'Middle', 'vivita' ),
            'bottom'    => __( 'Bottom', 'vivita' ),
        );
        
        // Form fields
        echo '<table class="form-table">';

        echo '	<tr>';
        echo '		<th><label for="banner_meta_height" class="banner_meta_height_label">' . __( 'Banner Height', 'vivita' ) . '</label></th>';
        echo '		<td>';
        echo '			<input type="number" id="banner_meta_height" name="banner_meta_height" class="banner_meta_height_field" value="' . intval( $banner_height ) . '" min="150" max="1000" step="50">';
        echo '		</td>';
        echo '	</tr>';

        echo '	<tr>';
        echo '		<th><label for="banner_meta_img_align" class="banner_meta_img_align_label">' . __( 'Alignment', 'vivita' ) . '</label></th>';
        echo '		<td>';
        echo '	                <select id="banner_meta_img_align" name="banner_meta_img_align" class="banner_meta_img_align_field">';
                                    foreach( $alignments as $key => $value ) :
        echo '                          <option value="' . $key . '" ' . selected( $banner_img_align, $key, false ) . '> ' . $value . '</option>';
                                    endforeach;
        echo '	                </select>';
        echo '		</td>';
        echo '	</tr>';
        
        echo '</table>';
        
    }
    
    public function save_metabox( $post_id, $post ) {

        // Add nonce for security and authentication.
        $nonce_name     = isset( $_POST[ 'banner_meta_box_nonce' ] ) ? $_POST[ 'banner_meta_box_nonce' ] : '';
        $nonce_action   = 'banner_meta_box_nonce_action';

        // Check if a nonce is set and valid
        if ( !isset( $nonce_name ) ) { return; }
        if ( !wp_verify_nonce( $nonce_name, $nonce_action ) ) { return; }
            
        // Sanitize user input.
        $banner_height      = isset( $_POST[ 'banner_meta_height' ] ) ? sanitize_text_field( $_POST[ 'banner_meta_height' ] ) : '400';
        $banner_img_align   = isset( $_POST[ 'banner_meta_img_align' ] ) ? sanitize_text_field( $_POST[ 'banner_meta_img_align' ] ) : 'middle';

        // Update the meta field in the database
        update_post_meta( $post_id, 'banner_meta_height', $banner_height );
        update_post_meta( $post_id, 'banner_meta_img_align', $banner_img_align );
        
    }
    
}

/**
 * Metabox for Page/Post Sidebars
 */
new Vivita_Sidebar_Meta_Box;
class Vivita_Sidebar_Meta_Box {

    public function __construct() {

        if ( is_admin() ) {
            add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
            add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
        }

    }

    public function init_metabox() {

        add_action( 'add_meta_boxes',        array( $this, 'add_metabox' )         );
        add_action( 'save_post',             array( $this, 'save_metabox' ), 10, 2 );

    }

    public function add_metabox() {

        add_meta_box(
            'vivita-sidebar',
            __( 'Sidebar', 'vivita' ),
            array( $this, 'render_metabox' ),
            array( 'post', 'page' ),
            'side',
            'high'
        );

    }

    public function render_metabox( $post ) {

        // Add nonce for security and authentication.
        wp_nonce_field( 'vivita_nonce_action', 'vivita_nonce' );

        // Retrieve an existing value from the database.
        $vivita_sidebar_location = get_post_meta( $post->ID, 'vivita_sidebar_location', true );

        // Set default values.
        if( empty( $vivita_sidebar_location ) ) $vivita_sidebar_location = '';

        // Form fields.
        echo '<table class="form-table">';

        echo '  <tr>';
        echo '      <th><label for="vivita_sidebar_location" class="vivita_sidebar_location_label">' . __( 'Sidebar Location', 'vivita' ) . '</label></th>';
        echo '      <td>';
        echo '          <select id="vivita_sidebar_location" name="vivita_sidebar_location" class="vivita_sidebar_location_field">';
        echo '          <option value="vivita_default" ' . esc_attr( selected( $vivita_sidebar_location, 'vivita_default', false ) ) . '> ' . __( 'Default', 'vivita' ) . '</option>';
        echo '          <option value="vivita_left" ' . esc_attr( selected( $vivita_sidebar_location, 'vivita_left', false ) ) . '> ' . __( 'Left Sidebar', 'vivita' ) . '</option>';
        echo '          <option value="vivita_right" ' . esc_attr( selected( $vivita_sidebar_location, 'vivita_right', false ) ) . '> ' . __( 'Right Sidebar', 'vivita' ) . '</option>';
        echo '          <option value="vivita_leftright" ' . esc_attr( selected( $vivita_sidebar_location, 'vivita_leftright', false ) ) . '> ' . __( 'Left + Right Sidebars', 'vivita' ) . '</option>';
        echo '          <option value="vivita_none" ' . esc_attr( selected( $vivita_sidebar_location, 'vivita_none', false ) ) . '> ' . __( 'No Sidebar', 'vivita' ) . '</option>';
        echo '          </select>';
        echo '          <p class="description">' . __( 'Do you want to display a sidebar on this post?', 'vivita' ) . '</p>';
        echo '      </td>';
        echo '  </tr>';

        echo '</table>';

    }

    public function save_metabox( $post_id, $post ) {

        // Add nonce for security and authentication.
        $nonce_name   = isset( $_POST['vivita_nonce'] ) ? $_POST['vivita_nonce'] : '';
        $nonce_action = 'vivita_nonce_action';

        // Check if a nonce is set.
        if ( ! isset( $nonce_name ) )
            return;

        // Check if a nonce is valid.
        if ( ! wp_verify_nonce( $nonce_name, $nonce_action ) )
            return;

        // Sanitize user input.
        $vivita_new_sidebar_location = isset( $_POST[ 'vivita_sidebar_location' ] ) ? $_POST[ 'vivita_sidebar_location' ] : '';

        // Update the meta field in the database.
        update_post_meta( $post_id, 'vivita_sidebar_location', $vivita_new_sidebar_location );

    }

}