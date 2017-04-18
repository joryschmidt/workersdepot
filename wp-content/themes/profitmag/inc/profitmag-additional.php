<?php
/**
 *  Default theme options
 */
if ( !function_exists('profitmag_get_default_theme_options') ) :
    function profitmag_get_default_theme_options() {

    $default_options = array(    
    'profitmag_responsive_setting'          => 0,
    'profitmag_logo_options'                => __('title', 'profitmag'),
    'profitmag_copyright_setting'           =>  __('Copyright 2016. All rights reserved', 'profitmag'),
   
    'profitmag_layout_setting'              =>  __('Fullwidth', 'profitmag'), 
    'profitmag_fbxbesideslider_setting'     => 0,
    'profitmag_fbxone_setting'              => 0,
    'profitmag_fbxonepostnum_setting'       => 6,
    'profitmag_fbxtwo_setting'              => 0,
    'profitmag_fbxtwopostnum_setting'       => 6,
    'profitmag_fbxthree_setting'            => 0,
    'profitmag_fbxthreepostnum_setting'     => 10,
    'profitmag_fbxfour_setting'             => 0,
    'profitmag_fbxfourpostnum_setting'      => 7,
    'profitmag_fbxfiveleft_setting'         => 0,
    'profitmag_fbxfiveleftpostnum_setting'  => 3,
    'profitmag_fbxfiveright_setting'        => 0,
    'profitmag_fbxfiverightpostnum_setting' => 3,
    'profitmag_leftsidebar_top_setting'     => 0,                           
    'profitmag_cat_one_num_setting'         => 3,
    'profitmag_leftsidebar_bottom_setting'  => 0,
    'profitmag_cat_two_num_setting'         => 3,
    'profitmag_rightsidebar_top_setting'    => 0,                            
    'profitmag_post_one_num_setting'        => 3,  
    'profitmag_rightsidebar_bottom_setting' => 0,
    'profitmag_post_two_num_setting'        => 3,
    'profitmag_sidebar_layout_setting'      => 'right_sidebar',
    'profitmag_search_setting'              => 1,
    'profitmag_slider_type_setting'         => 'single_post_slider',
    'profitmag_slider_note_setting'         => 0,    
    'profitmag_slider_cat_setting'          => 0,
    'profitmag_slider_post_setting1'        => 0,
    'profitmag_slider_post_setting2'        => 0,
    'profitmag_slider_post_setting3'        => 0,
    'profitmag_slider_post_setting4'        => 0,    
    'profitmag_slider_arrow_setting'        => 'yes',
    'profitmag_slider_transition_setting'   => 'yes',
    'profitmag_slider_speed_setting'        => 2000,
    'profitmag_menu_setting'                => __('Left', 'profitmag'),                         
    'profitmag_social_op_setting'           => 0,
    'profitmag_social_foot_setting'         => 0,    
    'profitmag_postdate_setting'            => 0,
    'profitmag_readmore_setting'            => '',
    'profitmag_custom_css_setting'          => '',
    'profitmag_gallery_setting'             => '',
    'profitmag_left_mid_ads_setting'        => '',
    'profitmag_left_gallery_setting'        => '',
    'profitmag_left_bottom_ads_setting'     => '',
    'profitmag_left_bottom_ads_two_setting' => '',
    'profitmag_right_mid_ads_setting'       => '',
    'profitmag_right_gallery_setting'       => '',
    'profitmag_right_bottom_ads_setting'    => '',
    'profitmag_right_bottom_ads_two_setting' => '',
    'profitmag_header_ads_setting'          => '',
    'profitmag_home_ads_setting'            => '',
    'profitmag_social_op_setting'           => 0,
    'profitmag_social_foot_setting'         => 0,   
    'profitmag_layoutcolor_setting'         => __('Red', 'profitmag'),
    'profitmag_headerlayoutcolor_setting'   => __('Black', 'profitmag'),     
    'profitmag_homeicon_setting'            => 1,
    



    
    

    );


        return apply_filters( 'profitmag_default_theme_options', $default_options );
    }
endif;


/**
*  Get theme options
*/
if ( !function_exists('profit_get_theme_options') ) :
    function profit_get_theme_options() {

        $profitmag_default_theme_options = profitmag_get_default_theme_options();
        $profitmag_get_theme_options = get_theme_mod( 'profitmag_theme_options');
        if( is_array($profitmag_get_theme_options )){
            return array_merge( $profitmag_default_theme_options ,$profitmag_get_theme_options );
        }
        else{
            return $profitmag_default_theme_options;
        }

    }
endif;