<?php
/*
 * ADD THEME SUPPORT FOR POST-THUMBNAILS
 *************************************************************/
add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 84, 84, true);

add_action( 'after_setup_theme', 'wptricks_theme_setup' );
function wptricks_theme_setup() {
    add_image_size( 'hero', 1920, 500, true );
    add_image_size( 'post_grid', 500, 350, true );
}
