<?php 
/**
 * Functions to create titles and slugs
 * Very rough function !! 
 * If you require a more customised solution
 * Add your single title to a [$post_type__title_single] variable inside the if statement for the post type
 */
function wptricks_single_title($string) {
  $to_single = preg_replace("/s\b/", "", $string);
  return ucwords( $to_single );
}
function wptricks_slug($string) {
  $slug = str_replace("_", "-", $string);
  return $slug;
}
/**
 * Setting the custom post types here as $key => $value 
 * 
 * @var array
 * Called globally to add archive pages to the options page,
 * also being called in the metaboxes and template parts.
 */
$custom_post_types = array(
            'stories'           => 'Stories'
          );

// Register Custom Post Type
function wptricks_custom_post_types() {
  global $custom_post_types;

  /**
   * Loop through each $custom_post_types...
   */
  foreach ( $custom_post_types as $post_type => $post_title ) :
    /**
     * As Titles and slugs require a different format:
     * 
     * Create title and slug from the $post_type
     * @var [type]
     */
    
    $post_type__title        = $post_title;
    $post_type__title_single = wptricks_single_title($post_title);
    $post_type__slug         = wptricks_slug($post_type);
    $post_type__has_archive  = true;
    $post_type__taxonomies   = '';

    /**
     * Add post type supports, post type icons, taxonomies 
     ***********************************************************
     * @var [$post_type__supports] array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'page-attributes', 'revisions')
     * @var [$post_type__icon] https://developer.wordpress.org/resource/dashicons
     * @var [$post_type__taxonomies] array('category'=>'Category', 'post_tag'=>'Post Tag', 'custom_taxonomies'=>'Custom Taxonomy')
     */
    if ($post_type == 'stories') :

      $post_type__title_single = 'Story';

      $post_type__supports = array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' );
      $post_type__icon     = 'dashicons-welcome-write-blog';
      $post_type__taxonomies = array(
                                  'locations' => 'Locations', 
                                  'types' => 'Type'
                                );
      $post_type__has_archive = false;
      
    endif;

    /**
     * Add the taxonomy before the post type so we can use the post_type
     * before the taxonomy in the url.
     *
     * ./post_type/taxonomy/...
     * 
     * Loop through the taxonomies and implode them into the $post_args
     * 'taxonomies' => array(implode(',', $post_type__taxonomy))
     * @var array
     */
    $post_type__taxonomy = array();
    if (!empty($post_type__taxonomies)) :
      foreach ($post_type__taxonomies as $cpt_type => $cpt_tax) : 
        $post_type__taxonomy[] = $cpt_type;
      endforeach;
    endif;


    /**
     * If taxonomy is set and a custom taxonomy is required
     */
    if ( isset($post_type__taxonomies) && $post_type__taxonomies != '' ) :
      foreach ($post_type__taxonomies as $taxonomy_type => $taxonomy_name) :
        if ( $taxonomy_type == 'category' || $taxonomy_type == 'post_tag' )
          continue; // Let's skip this taxonomy loop if it's a default taxonomy

        /**
         * As Titles and slugs require a different format:
         * 
         * $taxonomy__title_single [ replace underscores, remove last letter if it's an s ]
         * $taxonomy__slug [ create a custom slug if one isn't set with the post_type above ]
         */
        $taxonomy__title        = $taxonomy_name;
        $taxonomy__title_single = wptricks_single_title($taxonomy_name);
        $taxonomy__slug         = $post_type__slug . '/' . wptricks_slug($taxonomy_type);

        $taxonomy_labels = array(
          'name'                        => $taxonomy__title,
          'singular_name'               => $taxonomy__title_single,
          'menu_name'                   => $taxonomy__title,
          'all_items'                   => "All {$taxonomy__title}",
          'parent_item'                 => "Parent {$taxonomy__title_single}",
          'parent_item_colon'           => "Parent {$taxonomy__title_single}:",
          'new_item_name'               => "New {$taxonomy__title_single} Name",
          'add_new_item'                => "Add New {$taxonomy__title_single}",
          'edit_item'                   => "Edit {$taxonomy__title_single}",
          'update_item'                 => "Update {$taxonomy__title_single}",
          'view_item'                   => "View {$taxonomy__title_single}",
          'separate_items_with_commas'  => "Separate {$taxonomy__title} with commas",
          'add_or_remove_items'         => "Add or remove {$taxonomy__title}",
          'choose_from_most_used'       => "Choose from the most used {$taxonomy__title}",
          'popular_items'               => "Popular {$taxonomy__title}",
          'search_items'                => "Search {$taxonomy__title}",
          'not_found'                   => "Not Found",
          'no_terms'                    => "No items",
          'items_list'                  => "Items list",
          'items_list_navigation'       => "Items list navigation",
        );
        $taxonomy_rewrite = array(
          'slug'          => $taxonomy__slug,
          'with_front'    => false,
          'hierarchical'  => false,
        );
        $taxonomy_args = array(
          'labels'            => $taxonomy_labels,
          'hierarchical'      => true,
          'public'            => true,
          'show_ui'           => true,
          'show_admin_column' => true,
          'show_in_nav_menus' => true,
          'show_tagcloud'     => false,
          'meta_box_cb'       => false,
          'rewrite'           => $taxonomy_rewrite,
        );
        register_taxonomy( $taxonomy_type, array( $post_type ), $taxonomy_args );

      endforeach; //  ($post_type__taxonomies as $taxonomy_type => $taxonomy_name) :
    endif; // if ( isset($post_type__taxonomies) && $post_type__taxonomies != '' ) :


    $post_labels = array(
      'name'                  => $post_type__title,
      'singular_name'         => $post_type__title_single,
      'menu_name'             => $post_type__title,
      'name_admin_bar'        => $post_type__title_single,
      'archives'              => "{$post_type__title_single} Archives",
      'attributes'            => "{$post_type__title} Attributes",
      'parent_item_colon'     => "Parent {$post_type__title_single}:",
      'all_items'             => "All {$post_type__title}",
      'add_new_item'          => "Add New {$post_type__title_single}",
      'add_new'               => "Add New",
      'new_item'              => "New {$post_type__title_single}",
      'edit_item'             => "Edit {$post_type__title_single}",
      'update_item'           => "Update {$post_type__title_single}",
      'view_item'             => "View {$post_type__title_single}",
      'view_items'            => "View {$post_type__title}",
      'search_items'          => "Search {$post_type__title}",
      'not_found'             => "Not found",
      'not_found_in_trash'    => "Not found in Trash",
      'featured_image'        => "Featured Image",
      'set_featured_image'    => "Set featured image",
      'remove_featured_image' => "Remove featured image",
      'use_featured_image'    => "Use as featured image",
      'insert_into_item'      => "Insert into {$post_type__title_single}",
      'uploaded_to_this_item' => "Uploaded to this {$post_type__title_single}",
      'items_list'            => "Items list",
      'items_list_navigation' => "Items list navigation",
      'filter_items_list'     => "Filter {$post_type__title} list",
    );
    $post_slug_rewrite = array(
      'slug'                  => $post_type__slug,
      'with_front'            => false,
      'pages'                 => true,
      'feeds'                 => true,
    );
    $post_args = array(
      'label'                 => $post_type__title,
      'description'           => 'Post Type Description',
      'labels'                => $post_labels,
      'supports'              => $post_type__supports,
      'taxonomies'            => array(implode(',', $post_type__taxonomy)),
      'hierarchical'          => true,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 5,
      'menu_icon'             => $post_type__icon,
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => $post_type__has_archive,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'rewrite'               => $post_slug_rewrite,
      'capability_type'       => 'page',
    );
    register_post_type( $post_type, $post_args );

    

  endforeach; // foreach ( $custom_post_types as $post_type ) :
}
add_action( 'init', 'wptricks_custom_post_types', 0 );

/**
 * If we're sharing a taxonomy between post types add them below
 * @return [taxonomy] [post_type]
 */
$post_types_with_location = array('post', 'stories');
function wptricks_share_taxonomies() {
  global $post_types_with_location;
  foreach ( $post_types_with_location as $shared_tax ) {
    register_taxonomy_for_object_type( 'locations', $shared_tax );
  }
} 
add_action( 'init', 'wptricks_share_taxonomies', 100  );


// Change default post_type "Posts" to News!
function wptricks_change_post_object() {
  $get_post_type = get_post_type_object('post');
  $labels = $get_post_type->labels;
    $labels->name               = 'News';
    $labels->singular_name      = 'News';
    $labels->add_new            = 'Add News';
    $labels->add_new_item       = 'Add News';
    $labels->edit_item          = 'Edit News';
    $labels->new_item           = 'News';
    $labels->view_item          = 'View News';
    $labels->search_items       = 'Search News';
    $labels->not_found          = 'No News found';
    $labels->not_found_in_trash = 'No News found in Trash';
    $labels->all_items          = 'All News';
    $labels->menu_name          = 'News';
    $labels->name_admin_bar     = 'News';
}
add_action( 'init', 'wptricks_change_post_object' );