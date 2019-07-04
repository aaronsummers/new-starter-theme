<?php
// Metabox
/**
 *
 * Metabox.io documentation : https://metabox.io/docs/
 * Metabox.io demo.php file : https://github.com/rilwis/meta-box/blob/master/demo/demo.php
 *
 */

// Install theme plugins
//include_once ('inc/functions/_action-required-plugins.php');

// Add Metaboxes
include_once ('inc/metabox/metaboxes.php');

// Add a Make Branding
include_once ('inc/branding/_branded-admin.php');

// Grab our functions files
foreach (glob(get_template_directory() . "/inc/functions/*.php") as $function) {
    include_once ( $function );
}

/*
 * REGISTER NAVIATION MENUS
 *************************************************************/

register_nav_menu('header-menu',__( 'Header Menu' ));

/*
 * REMOVE WIDTH AND HEIGHT ON IMAGES
 *************************************************************/
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}


/*
 * ADD CATEGORY AND PAGE TITLE TO PAGES AS CLASSES
 * ALLOWS US TO STYLE PAGES BY CATEGORY...
 *************************************************************/
function add_slug_body_class( $classes ) {

    // Grab the page title
    global $post;
    if ( isset( $post ) ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }

    // Grab the category
    if ( is_single() && !is_front_page() && !is_home() )
        return $classes;
    $post_categories = get_the_category();
    foreach( $post_categories as $current_category ) {
        $classes[] =  $current_category->slug;
    }
    return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

/*
 *  ADD THE SOCIAL TO THE NAVIGATION
 **  See functions/theme-customiser-func.php
 *************************************************************/

function social_navigation_addon($items, $args) {
    // If this isn't the primary menu and if they haven't given the OK on the theme customiser, do nothing
    if( !($args->theme_location == 'header-menu' && get_theme_mod('checkbox_navigation_add'))) 
    return $items;

    // Check the theme customizr that social links exist
    $social_sites = theme_slug_get_social_sites();
    // Any inputs that aren't empty are stored in $active_sites array
     foreach( $social_sites as $social_site ) {
         if ( strlen( get_theme_mod( $social_site ) ) > 0 ) {
             $active_sites[] = $social_site;
         }
     }

    // If there arn't any active social sites, do nothing
    if(empty($active_sites)) 
    return $items;

     // Build an array of the social icons
     $theme_social_site = array();
    foreach ( $active_sites as $active_site ) {
        $theme_social_site[] = '<a href="' . get_theme_mod( $active_site ) . '" class="social-link" target="new"><i class="circle icon-' . $active_site . '"></i></a>';
    }

    // Return and implode the array
    return $items . '<li class="no-border responsive-menu-pro-item menu-item">' . implode(' ' ,$theme_social_site) . '</li>';
}
add_filter('wp_nav_menu_items', 'social_navigation_addon', 10, 2);


/*
 *  SHOW SOCIAL MEDIA 
 **  See functions/theme-customiser-func.php
 *************************************************************/
function theme_slug_show_social_icons() {

     $social_sites = theme_slug_get_social_sites();

     // Any inputs that aren't empty are stored in $active_sites array
     foreach( $social_sites as $social_site ) {
         if ( strlen( get_theme_mod( $social_site ) ) > 0 ) {
             $active_sites[] = $social_site;
         }
     }

     // For each active social site, add it as a list item
     if ( !empty( $active_sites ) ) {
         echo "<ul class='social-media-icons'>";

         foreach ( $active_sites as $active_site ) { ?>
            <li>
             <a href="<?php echo get_theme_mod( $active_site ); ?>">
                 <i class="icon-<?php echo $active_site; ?>"></i>
             </a>
             </li>
            <?php
         }
         echo "</ul>";
     }
}

/*
 *  CUSTOM ARCHIVE TITLES ( REMOVE THE PRE-TITLE: ) 
 *************************************************************/
add_filter( 'get_the_archive_title', 'wptricks_archive_title' );
function wptricks_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
  
    return $title;
}

/*
 *  CHECK LINKS FOR HTTP
 *************************************************************/
function addScheme($url, $scheme = 'http://') {
  return parse_url($url, PHP_URL_SCHEME) === null ?
    $scheme . $url : $url;
}
// echo addScheme('this.com');

/*
 * TRUNCATE TEXT, USED TO SHORTED TITLES
 * https://stackoverflow.com/questions/79960/how-to-truncate-a-string-in-php-to-the-word-closest-to-a-certain-number-of-chara#answer-17852480
 *************************************************************/
function truncate($str, $width) {
    return strtok(wordwrap($str, $width, "...\n"), "\n");
}
// echo truncate('some text', $number);

/*
 *  CLEAN TITLES FOR ID USE
 *************************************************************/
function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
   return strtolower($string);
}

/*
 *  CUSTOM EXCERPT LENGTH
 *************************************************************/
function excerpt($limit) {
    return wp_trim_words(get_the_excerpt(), $limit);
}
// echo excerpt($number);