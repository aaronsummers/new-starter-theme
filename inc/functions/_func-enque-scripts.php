<?php 

# Load styles and scripts
if (is_admin()) :

    // Add editor styles
    add_action('admin_init', 'wptricks_add_editor_styles');
    function wptricks_add_editor_styles() {
        add_editor_style( get_stylesheet_directory_uri() . '/inc/admin/admin-editor-styles.css' );
    }

    // Add admin styles
    add_action('admin_enqueue_scripts', 'wptricks_admin_style');
    function wptricks_admin_style() {
      wp_enqueue_style( 'general-admin-styles', get_stylesheet_directory_uri() . '/inc/admin/general-admin-styles.css', array(), '1.0.0');
    }

    // Add admin javascript
    add_action( 'admin_enqueue_scripts', 'wptricks_admin_script' );
    function wptricks_admin_script() {
        wp_enqueue_script( 'admin_js', get_stylesheet_directory_uri() . '/inc/admin/admin.js', array(), '1.0.0' );
    }
else :

    // Remove default wordpress scripts and styles
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');

    // Async load
    add_filter('clean_url', 'wptricks_async_scripts', 11, 1);
    function wptricks_async_scripts($url) {
        if (strpos($url, '#asyncload') === false) :
            return $url;
        elseif (is_admin()) :
            return str_replace('#asyncload', '', $url);
        else :
            return str_replace('#asyncload', '', $url) . "' async='async";
        endif;
    }

    // Remove Admin bar CSS from frontend
    add_action('get_header', 'remove_admin_login_header');
    function remove_admin_login_header() {
        remove_action('wp_head', '_admin_bar_bump_cb');
    }

    // Enque theme scripts and styles
    add_action('wp_enqueue_scripts', 'wptricks_scripts');
    function wptricks_scripts() {
        wp_dequeue_style('wp-admin');
        wp_deregister_style('wp-admin');      
        # Minified Stylesheet
        wp_enqueue_style('main-styles', get_template_directory_uri() . '/style.min.css', array(), filemtime(get_template_directory() . '/style.min.css'), 'screen'); 
        # Typekit
        wp_enqueue_style('typekit', '//use.typekit.net/gkf4pfv.css', array()); 
        if (is_front_page()) {
            wp_enqueue_script('fullpage', get_template_directory_uri() . '/assets/js/fullpage.min.js', array(), filemtime(get_template_directory() . '/assets/js/fullpage.min.js'), 'screen'); 
        }
        # Javascript
        wp_enqueue_script( 'flexibility', get_template_directory_uri() . '/assets/js/flexibility.js', false, filemtime( get_stylesheet_directory() . '/assets/js/flexibility.js' ), true );
        wp_script_add_data( 'flexibility', 'conditional', 'lt IE 9' ); 

        wp_enqueue_script( 'all.min-scripts', get_template_directory_uri() . '/assets/js/all.min.js', array('jquery'), filemtime( get_stylesheet_directory() . '/assets/js/all.min.js' ), true );

        wp_enqueue_script('theme.min', get_template_directory_uri() . '/theme.min.js#asyncload', array('jquery'), filemtime(get_stylesheet_directory() . '/theme.min.js'), true);
    }
    
endif; // end if (is_admin()) :