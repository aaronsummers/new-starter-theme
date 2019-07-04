<?php

/* REORDER MENU ITEMS
 * http://code.tutsplus.com/articles/customizing-your-wordpress-admin--wp-24941
 *************************************************************/
add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
add_filter('menu_order', 'custom_menu_order');
function custom_menu_order($menu_ord) {
    if (!$menu_ord) return true;

    return array(
        'index.php', // Dashboard
        'separator1', // First separator
        'edit.php?post_type=page', // Pages ls
        'edit.php?post_type=country', // Custom post types moved using post_type=cpt name
        'edit.php?post_type=media',
        'edit.php?post_type=insights',
        'edit.php?post_type=pdf',
        'edit.php?post_type=casestudy',
        'edit.php?post_type=careers',
        'admin.php?page=wpcf7', // Contact form 7 moved using admin.php?page=wpcf7 name
        'separator2', // First separator
        'edit.php', // Posts
        'upload.php', // Media
        'link-manager.php', // Links
        'edit-comments.php', // Comments
        'separator4', // Second separator
        'themes.php', // Appearance
        'plugins.php', // Plugins
        'users.php', // Users
        'tools.php', // Tools
        'options-general.php', // Settings
        'separator-last', // Last separator
    );
}