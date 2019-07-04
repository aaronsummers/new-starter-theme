<?php 
/**
 * Register options page. In this case, it's a theme options page
 * https://docs.metabox.io/extensions/mb-settings-page/
 *
 *  $settings_pages[] 'id' is used in options-inc/file.php to link options page to this menu item
 *  'settings_pages' => 'global_features',
 *  
 *  $settings_pages[] 'tabs' => 'key' is used in options-inc/file.php to link options items to this tab
        'tab'            => 'tab_1',
 */

add_filter( 'mb_settings_pages', 'pqa_options_page' );
function pqa_options_page( $settings_pages ) {
    /**
     * Get our post types to create the archive options pages 
     */
    global $custom_post_types;

    $settings_pages[] = array(
        'menu_title'  => 'Archives',
        'id'          => 'archive_pages',
        'icon_url'    => get_template_directory_uri().'/inc/metabox/img/settings.svg',
        //'style'       => 'no-boxes',
        'columns'     => 1,
        'position'    => 2,
        'tabs'        => $custom_post_types
    );

    return $settings_pages;
}

/**
 * Register meta boxes and fields for options page
 */
add_filter( 'rwmb_meta_boxes', 'pqa_options_meta_boxes' );
function pqa_options_meta_boxes( $meta_boxes ) {
    global $button_labels;
    global $datalist_desc;
    foreach (glob(get_template_directory() . "/inc/metabox/options/options-inc/*.php") as $options_metabox) {
        include_once ( $options_metabox );
    }
 
    return $meta_boxes;
}