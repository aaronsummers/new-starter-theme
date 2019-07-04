<?php 
/**
 * @var [post_type]
 * @var $archive_cpts should contain the post_type as the name, [with the news page being an exception!]
 * this inturn gets used on the archive pages via get_queried_object()
 * to call the correct content.
 */
	global $custom_post_types;
	$archive_cpts = array_keys($custom_post_types);

foreach ($archive_cpts as $archive_cpt) :

    // Create the titles, button labels etc...
    $archive_cpt__title = ucwords(str_replace('_', ' ', $archive_cpt));
   // Create the post types for the page links in the columns page dropdown 
    $all_post_types = get_post_types( array('public'=>true) );
    $post_links = array_diff($all_post_types, array($archive_cpt));

    $meta_boxes[] = array(
        'title'          => $archive_cpt__title,
        'id'             => $archive_cpt,
        'settings_pages' => 'archive_pages',
        'tab'            => $archive_cpt,
        'fields' => array(

			array(
				'type' => 'custom_html',
				'std'  => '<div class="alert alert-warning">Posts for this section are added through... <a href="'. admin_url( 'edit.php?post_type=' . $archive_cpt ) .'" target="new">Click here to add or edit the "' . $archive_cpt__title . '" pages</a></div>',
			),
 		// GROUP
 		array(
 			'id'     => "{$archive_cpt}hero_slides",
 			'type'   => 'group',
 			'clone'  => true,
 			'sort_clone' => true,
 			'collapsible' => true,
 			'group_title' => array('field' => "{$archive_cpt}hero_title" ),
 			'add_button' => '+ Slide',
 			'fields' => array(
 				// TEXTAREA
 				array(
 					'name' => 'Title',
 					'id'   => "{$archive_cpt}hero_title",
 					'type' => 'textarea',
 					'cols' => 20,
 					'rows' => 1,
 					'desc' => 'If left empty the archive title will be used.',
 				),
 				// TEXTAREA
 				array(
 					'name' => 'Content',
 					'id'   => "{$archive_cpt}hero_content",
 					'type' => 'textarea',
 					'cols' => 20,
 					'rows' => 3,
 					'desc' => '<code>[b] This is bold text [/b]</code>'
 				),
 				array(
 				    'name' => 'Button',
 				    'type' => "heading",
 				),
 				
 				array(
 				    'name'      => 'Add Button',
 				    'id'        => "{$archive_cpt}button_switch",
 				    'type'      => 'switch',
 				    'style'     => 'rounded',
 				    'on_label'  => '<i class="dashicons dashicons-yes"></i> Button',
 				    'off_label' => '<i class="dashicons dashicons-no"></i> Button',
 				),
 				// TEXT
 				array(
 				    'name' => 'Label',
 				    'id' => "{$archive_cpt}button_label",
 				    'type' => 'text',
				    'datalist'    => array(
						'options' => $button_labels,
					),
					'desc' => $datalist_desc,
 				    'visible' => [
 				        'when' => [
 				            ["{$archive_cpt}button_switch", 1],
 				            ["{$archive_cpt}download_active", 0]
 				        ],
 				        'relation' => 'and'
 				    ],
 				),
 				// CHECKBOX
 				array(
 					'name' => 'Add a Download?',
 					'id'   => "{$archive_cpt}download_active",
 					'type' => 'checkbox',
 					'std'  => 0,
 				    'visible' => ["{$archive_cpt}button_switch", 1],
 				), 				
 				// POST LINK
 				array(
 					'name'        => 'File Link',
 					'id'          => "{$archive_cpt}hero_post_download",
 					'type'        => 'post',
 					'post_type'   => 'dlm_download',
 					'field_type'  => 'select_advanced',
 					'placeholder' => 'Select an Item',
 					'query_args'  => array(
 						'post_status'    => 'publish',
 						'posts_per_page' => - 1,
 				        'orderby'     => 'title',
 				        'order'       => 'ASC',
 					),
 				    'visible' => ["{$archive_cpt}download_active", 1],
 				), 				
 				// POST LINK
 				array(
 					'name'        => 'Page Link',
 					'id'          => "{$archive_cpt}hero_post_link",
 					'type'        => 'post',
 					'post_type'   => 'page',
 					'field_type'  => 'select_advanced',
 					'placeholder' => 'Select an Item',
 					'query_args'  => array(
 						'post_status'    => 'publish',
 						'posts_per_page' => - 1,
 				        'orderby'     => 'title',
 				        'order'       => 'ASC',
 					),
 				    'visible' => [
 				        'when' => [
 				            ["{$archive_cpt}button_switch", 1],
 				            ["{$archive_cpt}download_active", 0]
 				        ],
 				        'relation' => 'and'
 				    ],
 				),
 				array(
 				    'name' => 'Image',
 				    'type' => "heading",
 				),
 				
 				array(
 				    'name' => 'Upload Image',
 				    'id'   => "{$archive_cpt}hero_image",
 				    'type' => 'single_image',
 				),
 				
 			),
 		), // end Group
		),
	);

endforeach;