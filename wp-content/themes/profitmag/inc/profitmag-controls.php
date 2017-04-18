<?php
if ( ! class_exists( 'WP_Customize_Control' ) )
  return NULL;

/**
 * Profitmag customize category control.
 */

if (class_exists('WP_Customize_Control') && ! class_exists( 'Profitmag_Customize_Category_Control' ) ) {

    class Profitmag_Customize_Category_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         *
         * @since 3.4.0
         */
        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => 'profitmag-dropdown-categories-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __( '&mdash; Select &mdash;', 'profitmag' ),
                    'option_none_value' => '0',
                    'selected'          => $this->value(),
                    'hide_empty'        => 0,                   

                )
            ); 
            
            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
 
            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s <span class="description customize-control-description"></span>%s </label>',
                $this->label,
                $this->description,
                $dropdown

            );
        }
    }
}

/**
 * Profitmag customize sidebar layout control.
 */

if (class_exists('WP_Customize_Control') && ! class_exists( 'Profitmag_Customize_Sidebar_Control' ) ) {

    class Profitmag_Customize_Sidebar_Control extends WP_Customize_Control {
        public function render_content() {

            if ( empty( $this->choices ) )
                return;

            $name = '_customize-radio-' . $this->id;

            ?>
            <style>
                #profitmag-layouts-container li {
                    float: left;
                    display: inline;
                    text-align: left;
                    width: 45%;
                    margin-left: 12px;
                }
                              
                #profitmag-layouts-container li img.profitmag-sidebar-img {         
                   cursor: pointer;   
                   border: 3px solid #E4E4E4; 
                   border-radius: 3px;
                    -moz-border-radius: 3px;
                    -webkit-border-radius: 3px;              
                }

                #profitmag-layouts-container li img.profitmag-sidebar-img-selected {
                    border: 3px solid #BCBCBC;                    
                }
                
            </style>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <ul class="controls" id='profitmag-layouts-container'>
            <?php
                foreach ( $this->choices as $value => $label ) :

                    $class = ($this->value() == $value) ? 'profitmag-sidebar-img-selected profitmag-sidebar-img' : 'profitmag-sidebar-img';
                    ?>
                    <li>
                    <label>
                        <input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
                        <img src = '<?php echo esc_html( $label ); ?>' class = '<?php echo $class; ?>' />
                    </label>
                    </li>
                    <?php
                endforeach;
            ?>
            </ul>
            <script type="text/javascript">

                jQuery(document).ready(function($) {
                    $('#profitmag-layouts-container li label img').click(function(){
                        $('#profitmag-layouts-container li').each(function(){
                            $(this).find('img').removeClass ('profitmag-sidebar-img-selected') ;
                        });
                        $(this).addClass ('profitmag-sidebar-img-selected') ;
                    });                    
                });

            </script>
            <?php
        }
    }
}

if (class_exists('WP_Customize_Control') && ! class_exists( 'Profitmag_About_Theme' ) ) {

 class Profitmag_About_Theme extends WP_Customize_Control {

      public $type = "about-profitmag";

      public function render_content() {
         
         $about_theme = array(
                        'developed' => array(
                            'label' => __('Developed By: ', 'profitmag'),                         
                            'text' => __('Rigorous Themes', 'profitmag'),
                            'link' => esc_url('http://rigorousthemes.com/'),
                        ),

                        'demo' => array(
                            'label' => __('Live Preview: ', 'profitmag'),                           
                            'text' => __('Click Here', 'profitmag'),
                            'link' => esc_url('http://demo.rigorousthemes.com/profitmag'),
                        ),

                        'rate' => array(
                            'label' => __('Rate Theme: ', 'profitmag'),                            
                            'text' => __('Click Here', 'profitmag'),
                            'link' => esc_url('https://wordpress.org/support/view/theme-reviews/profitmag'),
                        ),

                        'pro' => array(
                            'label' => __('Profitmag Pro: ', 'profitmag'),                      
                            'text' => __('View Demo', 'profitmag'),
                            'link' => esc_url('http://demo.rigorousthemes.com/profitmag-pro'),
                        ),

                        
                        );
         foreach ($about_theme as $theme) {

            echo '<p>' . $theme['label'] . '<a target="_blank" href="' . esc_url( $theme['link'] ) . '" >' . esc_attr($theme['text']) . ' </a></p>';

         }
      }

   }
}

// For customize gallery control
if (class_exists('WP_Customize_Control') && ! class_exists( 'Profitmag_Customize_Gallery_Control' ) ) {

 class Profitmag_Customize_Gallery_Control extends WP_Customize_Control {

      public $type = "gallery-image";
  
      function render_content() {
        ?>
        <div class="profitmag-media">
          <label>
              <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
              <input type="text" class="gallery-input-field" value="<?php echo $this->value();?>" <?php $this->link();?>/>
            </label>
        </div>
        
        <?php
      }

   }
}


/**
 * Profitmag Customize Slider Posts Control.
 */

if (class_exists('WP_Customize_Control') && ! class_exists( 'Profitmag_Customize_Slider_Posts_Control' ) ) {

    class Profitmag_Customize_Slider_Posts_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         *
         * @since 3.4.0
         */
        public function render_content() {

          $dropdown = '<select> ';
           
          global $post; 

          $args = array( 'numberposts' => -1); 

          $posts = get_posts($args); 

          foreach( $posts as $post ) : 

            setup_postdata($post);

            $dropdown .= '<option value="'.$post->ID.'">'.get_the_title().'</option>';

          endforeach; 

          $dropdown .= '</select>';         
            
            
          $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
 
          printf(
            '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s <span class="description customize-control-description"></span>%s </label>',
            $this->label,
            $this->description,
            $dropdown
            );
        }
    }
}

/**
 * Profitmag Customize Information Control.
 */

if (class_exists('WP_Customize_Control') && ! class_exists( 'Profitmag_Customize_Info_Control' ) ) {

    class Profitmag_Customize_Info_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         *
         * @since 3.4.0
         */
        public function render_content() {        
 
          printf(
            '<label class="customize-control-info"><span class="customize-control-title">%s</span></label>',
            $this->label
            
            );
        }
    }
}

