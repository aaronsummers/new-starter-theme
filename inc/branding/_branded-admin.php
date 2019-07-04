<?php 
/*
 * LOGIN PAGE
 *************************************************************/
add_action('login_head', 'wptricks_custom_login');
function wptricks_custom_login() { // Include a stylesheet to adapt the login page
		echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/inc/branding/branded-login-styles.css?rev=1.0.0" />';
}

add_filter( 'login_headerurl', 'wptricks_login_logo_url' );
function wptricks_login_logo_url() { // Change the logo link from wordpress
		return 'https://makeagency.co.uk';
}

add_filter( 'login_headertitle', 'wptricks_login_logo_url_title' );
function wptricks_login_logo_url_title() { // Change the title
		return 'Built by Make Agency';
}

add_filter('login_errors', 'login_error_override');
function login_error_override() { // Change the login error message
		return 'Incorrect login details.';
}

add_action( 'init', 'login_checked_remember_me' );
function login_checked_remember_me() { // Auto check the "remember me" box
		add_filter( 'login_footer', 'rememberme_checked' );
}
function rememberme_checked() {
		echo "<script>document.getElementById('rememberme').checked = true;</script>";
}
/*
 * ADMIN AREA
 *************************************************************/

// Add our logo to the admin bar
add_action( 'admin_bar_menu', 'wptricks_admin_bar', 11 );
function wptricks_admin_bar( $wp_admin_bar ) {
	$wp_admin_bar->remove_menu('wp-logo');
	$wp_admin_bar->add_menu( array(
		 'id'    => 'branded-logo',
		 'title' => '<img src="' . get_template_directory_uri() . '/inc/branding/img/branded-agency-logo.png" width="38">',
		 'href'  => get_site_url().'/wp-admin/',
		 'meta'  => array(
		'title'  => __( 'Make Agency' ),
		 ),
	) );
}
// include make in the footer
add_filter('admin_footer_text', 'wptricks_footer_admin');
function wptricks_footer_admin () {
	echo 'Powered by <a href="http://www.wordpress.org/" target="new">WordPress</a> | Built by <a href="http://makeagency.co.uk">Make Agency</a>';
}

// Enque Admin CSS
add_action( 'admin_enqueue_scripts', 'wptricks_admin_styles' );
function wptricks_admin_styles() {
		wp_enqueue_style( 'admin-styles', get_template_directory_uri() . '/inc/branding/branded-admin.css', array(), '1.0.0' );
		wp_enqueue_style( 'admin-css', get_template_directory_uri() . '/inc/branding/branded-login-styles.css', array(), '1.0.0' );
}

// Continue make logo style on front end
add_action('wp_head', 'wptricks_admin_inline_styles', 100);
function wptricks_admin_inline_styles() {
	echo "<style> #wp-admin-bar-branded-logo .ab-item { background: #8e48ff; } #wp-admin-bar-branded-logo .ab-item:hover { background: #6721d8 !important; } #wp-admin-bar-branded-logo .ab-item img {width: 38px; height: auto; margin-top: 9px; } </style>";
}

function admin_bar(){
	if(is_user_logged_in()){
		add_filter( 'show_admin_bar', '__return_true' , 1000 );
	}
}
add_action('init', 'admin_bar' );