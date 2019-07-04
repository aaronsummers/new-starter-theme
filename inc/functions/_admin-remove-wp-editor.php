<?php 
/*
    * Hide the default editor on certain pages...
    * Add templates to the array()
 */
define('EDITOR_HIDE_PAGE_TEMPLATES', json_encode(array('page-template-home.php', 'page-template-landing.php', 'page-template-users.php')));

add_action('admin_init', 'atz_hide_editor');
function atz_hide_editor() {
    global $pagenow;
    if(!('post.php' == $pagenow)){
        return;
    }
    // Get the Post ID.
    $post_id = filter_input(INPUT_GET, 'post') ? filter_input(INPUT_GET, 'post') : filter_input(INPUT_POST, 'post_ID');
    if(!isset($post_id)) {
        return;
    }

    // Hide the editor on the page titled 'Homepage'
    // if(in_array(get_the_title($post_id), json_decode(EDITOR_HIDE_PAGE_TITLES))) {
    //     remove_post_type_support('page', 'editor');
    // }

    // Hide the editor on a page with a specific page template
    $template_filename = get_post_meta($post_id, '_wp_page_template', true);

    if(in_array($template_filename, json_decode(EDITOR_HIDE_PAGE_TEMPLATES))) {
        remove_post_type_support('page', 'editor');
    }
}