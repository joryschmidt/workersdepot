<?php
/**
 * Add theme dashboard page
 */
if ( ! function_exists( 'glob_admin_scripts' ) ) {
    /**
     * Enqueue scripts for admin page only: Theme info page
     */
    function glob_admin_scripts($hook)
    {
        if ($hook === 'widgets.php' || $hook === 'appearance_page_ft_glob') {
            wp_enqueue_style('glob-admin-css', get_template_directory_uri() . '/assets/css/admin.css');
            // Add recommend plugin css
            wp_enqueue_style('plugin-install');
            wp_enqueue_script('plugin-install');
            wp_enqueue_script('updates');
            add_thickbox();
        }
    }
}
add_action( 'admin_enqueue_scripts', 'glob_admin_scripts' );
add_action('admin_menu', 'glob_theme_info');
function glob_theme_info() {
    $menu_title = esc_html__('Glob Theme', 'glob');
    add_theme_page( esc_html__( 'Glob Dashboard', 'glob' ), $menu_title, 'edit_theme_options', 'ft_glob', 'glob_theme_info_page');
}
function glob_theme_info_page() {
    $theme_data = wp_get_theme('glob');
    // Check for current viewing tab
    $tab = null;
    ?>
    <div class="wrap about-wrap theme_info_wrapper">
        <h1><?php printf(esc_html__('Welcome to Glob - Version %1s', 'glob'), $theme_data->Version ); ?></h1>
        <div class="about-text"><?php esc_html_e( 'Glob is a flexible, clean, simple responsive WordPress theme, perfect for any news or online magazine website.', 'glob' ); ?></div>
        <a target="_blank" href="<?php echo esc_url('http://www.famethemes.com/?utm_source=theme_dashboard_page&utm_medium=badge_link&utm_campaign=theme_admin'); ?>" class="famethemes-badge wp-badge"><span><?php esc_html_e( 'FameThemes', 'glob' ); ?></span></a>
        <h2 class="nav-tab-wrapper">
            <a href="?page=ft_glob" class="nav-tab<?php echo is_null($tab) ? ' nav-tab-active' : null; ?>"><?php echo $theme_data->Name; ?></a>
            <?php do_action( 'glob_admin_more_tabs' ); ?>
        </h2>
        <?php if ( is_null( $tab ) ) { ?>
            <div class="theme_info info-tab-content">
                <div class="theme_info_column clearfix">
                    <div class="theme_info_left">
                        <div class="theme_link">
                            <h3><?php esc_html_e( 'Theme Customizer', 'glob' ); ?></h3>
                            <p class="about"><?php printf(esc_html__('%s supports the Theme Customizer for all theme settings. Click "Customize" to start customize your site.', 'glob'), $theme_data->Name); ?></p>
                            <p>
                                <a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary"><?php esc_html_e('Start Customize', 'glob'); ?></a>
                            </p>
                        </div>
                        <div class="theme_link">
                            <h3><?php esc_html_e( 'Theme Documentation', 'glob' ); ?></h3>
                            <p class="about"><?php printf(esc_html__('Need any help to setup and configure %s? Please have a look at our documentations instructions.', 'glob'), $theme_data->Name); ?></p>
                            <p>
                                <a href="<?php echo esc_url( 'http://docs.famethemes.com/article/109-glob-documentation' ); ?>" target="_blank" class="button button-secondary"><?php esc_html_e('Glob Documentation', 'glob'); ?></a>
                            </p>
                            <?php do_action( 'glob_dashboard_theme_links' ); ?>
                        </div>
                        <div class="theme_link">
                            <h3><?php esc_html_e( 'Having Trouble, Need Support?', 'glob' ); ?></h3>
                            <p class="about"><?php printf(esc_html__('Support for %s WordPress theme is conducted through FameThemes support ticket system.', 'glob'), $theme_data->Name); ?></p>
                            <p>
                                <a href="<?php echo esc_url('https://www.famethemes.com/dashboard/tickets/' ); ?>" target="_blank" class="button button-secondary"><?php echo sprintf( esc_html__('Create a support ticket', 'glob'), $theme_data->Name); ?></a>
                            </p>
                        </div>
                    </div>
                    <div class="theme_info_right">
                        <img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" alt="<?php esc_attr_e( 'Theme Screenshot', 'glob' ); ?>" />
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php do_action( 'glob_more_tabs_details' ); ?>
    </div> <!-- END .theme_info -->
    <?php
}
