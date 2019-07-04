<?php

// http://aristath.github.io/kirki/docs/
add_action('customize_register', 'wptricks_customizer_settings');
function wptricks_customizer_settings($wp_customize) {
	add_theme_support('custom-logo');
}
// http://aristath.github.io/kirki/docs/
if ( class_exists( 'Kirki' ) ) {
	/**
	 * Add Panels & Secions
	 * https://aristath.github.io/kirki/docs/adding-panels-and-sections
	 *
	 * Master Panel added, add theme sections go within this panel!
	 */
	Kirki::add_panel( 'theme_settings_panel', array(
	    'priority'    => 10,
	    'title'       => esc_attr__( 'Theme Settings', 'textdomain' ),
	    'description' => esc_attr__( 'Edit global elements of your website', 'textdomain' ),
	) );

	/**
	 * Sections
	 * Sections live within the panel
	 */
	Kirki::add_section( 'social_section', array(
	    'title'          => esc_attr__( 'Social Media', 'textdomain' ),
	    'description'    => esc_attr__( 'Add your social links', 'textdomain' ),
	    'panel'          => 'theme_settings_panel',
	    'priority'       => 160,
	) );

	/**
	 * Add Controls
	 * http://aristath.github.io/kirki/docs/controls/
	 */
	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'repeater',
		'label'       => esc_attr__( 'Social Networks', 'textdomain' ),
		'section'     => 'social_section',
		'priority'    => 10,
		'row_label' => array(
			'type' => 'text',
			'value' => esc_attr__('Network', 'textdomain' ),
		),
		'button_label' => esc_attr__('+ Social Site', 'textdomain' ),
		'settings'     => 'my_setting',
		'fields' => array(
			'social_site' => array(
				'type'        => 'select',
				'label'       => __( 'Select Social Network...', 'textdomain' ),
				'default'     => 'search',
				'multiple'    => 0,
				'choices'     => array(
					'search' => esc_attr__( 'Search Here', 'textdomain' ),
					'facebook' => esc_attr__( 'Facebook', 'textdomain' ),
					'twitter' => esc_attr__( 'Twitter', 'textdomain' ),
					'instagram' => esc_attr__( 'Instagram', 'textdomain' ),
					'googleplus' => esc_attr__( 'Google Plus', 'textdomain' ),
				),
			),
			'link_url' => array(
				'type'        => 'text',
				'label'       => esc_attr__( 'Link URL', 'textdomain' ),
				'description' => esc_attr__( 'This will be your social link URL', 'textdomain' ),
				'default'     => '',
			),
		)
	) );


} // if ( class_exists( 'Kirki' ) ) {

