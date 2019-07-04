<?php
	$meta_boxes[] = array(
 	'id'         => 'A_fullpage',
 	'title'      => 'HOMEPAGE SLIDES',
 	'post_types' => array( 'page' ),
 	'autosave'   => false,
 	'context'    => 'normal',
	'priority'   => 'high',
 	'fields'     => array(
		// GROUP
		array(
			'id'     => "{$prefix}fullpage",
			'type'   => 'group',
			'clone'  => true,
			'sort_clone' => true,
			'collapsible' => true,
			'save_state' => true,
			'default_state' => 'expanded', 
			'group_title' => array('field' => "{$prefix}title" ),
			'add_button' => '+ Slide',
			'fields' => array(
				array(
					'name' => 'Title',
					'id'   => "{$prefix}title",
					'type' => 'textarea',
					'cols' => 20,
					'rows' => 1,
				),
				array(
					'name' => 'Content',
					'id'   => "{$prefix}content",
					'type' => 'textarea',
					'cols' => 20,
					'rows' => 3,
				),
				array(
					'name' => 'Image',
					'id'   => "{$prefix}image",
					'type' => 'single_image',
				),
				array(
					'name' => 'Links',
					'type' => "heading",
				),
				// GROUP
				array(
					'id'     => "{$prefix}links",
					'type'   => 'group',
					'clone'  => true,
					'sort_clone' => true,
					'max_clone' => 4,
					'collapsible' => true,
					'save_state' => true,
					'default_state' => 'expanded', 
					'group_title' => array('field' => "{$prefix}label" ),
					'add_button' => '+ Link',
					'fields' => array(
						array(
							'name' => 'Label',
							'id' => "{$prefix}label",
							'type' => 'text',
						),
						array(
							'name'        => 'Page',
							'id'          => "{$prefix}page_link",
							'type'        => 'post',
							'post_type'   => $all_post_types,
							'field_type'  => 'select_advanced',
							'placeholder' => 'Select an Item',
							'query_args'  => array(
								'post_status'    => 'publish',
								'posts_per_page' => - 1,
								'orderby'     => 'title',
								'order'       => 'ASC',
							),
						),
					),
				), // end Group
			),
		), // end Group
 	),
 );
