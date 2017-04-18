<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package ProfitMag
 */
 
$profitmag_settings = profit_get_theme_options();
?>

	</div><!-- #content -->
    </div><!-- content-wrapper-->

	<footer id="colophon" class="site-footer clearrfix" role="contentinfo">
        <div class="wrapper footer-wrapper clearfix">

                <div class="top-bottom clearfix">
                		<div id="footer-top">
                        <?php
                            $sidebar_names = array('fo-top-col-one', 'fo-top-col-two', 'fo-top-col-three', 'fo-top-col-four'  );

                            $widget_count = profitmag_widget_count( $sidebar_names );

                            if(0<$widget_count):

                                $colum_class = '';

                                if( 0 == $widget_count || 1  == $widget_count ){
                                    $colum_class = 'full-col';
                                } elseif( 2  == $widget_count ){
                                    $colum_class = 'half-col';
                                } elseif( 3  == $widget_count ){
                                    $colum_class = 'three-cols';
                                }elseif( 4  == $widget_count ){
                                    $colum_class = 'four-cols';
                                } ?>

                                <div class="footer-columns <?php echo $colum_class; ?>">
                                    <?php 
                                    $widget_number = 1;

                                    foreach ($sidebar_names as $key => $value) {

                                        if( $value == 'fo-top-col-one' ){ ?>

                                            <div class="footer1 col">
                                                <?php if( is_active_sidebar( 'fo-top-col-one' ) ) : ?>
                                                        <div class="footer-logo" class="footer-widget">
                                                         <?php dynamic_sidebar( 'fo-top-col-one' ); ?>
                                                        </div>
                                                <?php endif; ?>
                                                
                                                <?php if( $profitmag_settings['profitmag_social_foot_setting'] == 0 ) { ?>
                                                        <div class="social-links">
                                                            <?php do_action( 'profitmag_social_links' ); ?>
                                                        </div>   
                                                <?php } ?>
                                                            
                                            </div>

                                        <?php 

                                        } else {

                                            if( is_active_sidebar( $value ) ){ ?>

                                                <div class="footer<?php echo $widget_number; ?> col">
                                                    <?php dynamic_sidebar( $value ); ?>
                                                </div>

                                            <?php 
                                            }

                                        }
                                        $widget_number++;
                                    } ?>
                                </div>
                        <?php endif; ?>
                        
                        </div><!-- #foter-top -->
                        
                        <div id="footer-bottom">    
                            <?php
                                $sidebar_bottom = array('fo-bottom-col-one', 'fo-bottom-col-two', 'fo-bottom-col-three', 'fo-bottom-col-four'  );

                                $bottom_count = profitmag_widget_count( $sidebar_bottom );             

                                if( 0<$bottom_count):

                                    $bottom_class = '';

                                    if( 0 == $bottom_count || 1  == $bottom_count ){
                                        $bottom_class = 'full-col';
                                    } elseif( 2  == $bottom_count ){
                                        $bottom_class = 'half-col';
                                    } elseif( 3  == $bottom_count ){
                                        $bottom_class = 'three-cols';
                                    }elseif( 4  == $bottom_count ){
                                        $bottom_class = 'four-cols';
                                    }

                                    $bottom_number = 1; ?>

                                    <div class="footer-columns <?php echo $bottom_class; ?>">
                                        <?php 

                                        foreach ($sidebar_bottom as $key => $value) { 
                                            if( is_active_sidebar( $value ) ) : ?>
                                                <div class="footer<?php echo $key+'1'; ?> col" class="footer-widget">
                                                    <?php  dynamic_sidebar( $value ); ?>
                                                </div><?php 
                                            endif; 
                                        } ?>  

                                    </div>

                            <?php endif; ?>
                         
                        </div><!-- #foter-bottom -->
                </div><!-- top-bottom-->
                <div class="footer-copyright border t-center">
                    <p><?php if( !empty( $profitmag_settings['profitmag_copyright_setting'] ) && $profitmag_settings['profitmag_copyright_setting'] != '' ): ?>                        
                                    <?php echo esc_html( $profitmag_settings['profitmag_copyright_setting'] ); ?>
                            <?php endif; ?>
                    </p>
                    <div class="site-info">
                        <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'profitmag' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'profitmag' ), 'WordPress' ); ?></a>
                        <span class="sep"> | </span>
                        <?php printf( esc_html__( '%1$s by %2$s', 'profitmag' ), 'Profitmag', '<a href="http://rigorousthemes.com/" rel="designer">Rigorous Themes</a>' ); ?>
                    </div><!-- .site-info -->
                    
                </div>
                

        </div><!-- footer-wrapper-->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
