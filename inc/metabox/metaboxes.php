<?php
/**
 * @var @wpdb [Include the global var to add the prefix to the tables ex. "wp_"]
 * @var $prefix [Create the global var used by the metaboxes]
 * @var $db_prefix [Create the global var for the database tables]
 */
$prefix = '_wptricks_';
$theme_name = 'add-theme';
// $db_prefix = $wpdb->prefix . 'wptricks_';
$meta_image = get_template_directory_uri() . '/inc/metabox/img/';
$all_post_types = get_post_types( array('public' => true) );
$button_labels = array('Click here', 'Find out more');
$datalist_desc = 'Start typing and then select the option from the dropdown';

/**
 * Options page
 * Used for:
 **  globalally used elements
 **  Pages not directly editable i.e. Archives
 * 	
 * 	https://docs.metabox.io/extensions/mb-settings-page/
 */
include_once('options/options-metaboxes.php');

/**
 * Call the metaboxes
 */
add_filter( "rwmb_meta_boxes", "_wptricks_register_meta_boxes" );

function _wptricks_register_meta_boxes( $meta_boxes ) {
	global $prefix;
	global $theme_name;	
	global $all_post_types;
	include($_SERVER["DOCUMENT_ROOT"] ."/wp-content/themes/".$theme_name."/inc/metabox/inc/_ninja-form.php");
	foreach (glob(get_template_directory() . "/inc/metabox/metaboxes/_meta*.php") as $metabox) {
	    include_once ( $metabox );
	}
	return $meta_boxes;
}
