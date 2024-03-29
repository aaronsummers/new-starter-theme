<?php

require_once get_template_directory() . '/inc/required-plugins/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'wptricks_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function wptricks_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(


		array(
			'name'     			 => 'Meta Box',
			'slug'      		 => 'meta-box',
			'source'    		 => 'https://github.com/rilwis/meta-box/archive/master.zip',
			'required'           => true, 
			'version'            => '', 
			'force_activation'   => true, 
			'force_deactivation' => false, 
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		
		// Include a plugin bundled with a theme.
		array(
			'name'               => 'Meta Box AIO', 
			'slug'               => 'meta-box-aio', 
			'source'             => 'meta-box-aio.zip', 
			'required'           => true, 
			'version'            => '', 
			'force_activation'   => true, 
			'force_deactivation' => false, 
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		
		// Include a plugin bundled with a theme.
		array(
			'name'               => 'Responsive Menu Pro', 
			'slug'               => 'responsive-menu-pro', 
			'source'             => 'responsive-menu-pro.zip', 
			'required'           => true, 
			'version'            => '', 
			'force_activation'   => true, 
			'force_deactivation' => false, 
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		
		// Include a plugin bundled with a theme.
		array(
			'name'               => 'WP Sync DB', 
			'slug'               => 'wp-sync-db', 
			'source'             => 'wp-sync-db.zip', 
			'required'           => false, 
			'version'            => '', 
			'force_activation'   => false, 
			'force_deactivation' => false, 
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		
		// Include a plugin bundled with a theme.
		array(
			'name'               => 'WP Sync DB Media Files', 
			'slug'               => 'wp-sync-db-media-files', 
			'source'             => 'wp-sync-db-media-files.zip', 
			'required'           => false, 
			'version'            => '', 
			'force_activation'   => false, 
			'force_deactivation' => false, 
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),


		array(
			'name'        => 'Ninja Forms',
			'slug'        => 'ninja-forms',
			'is_callable' => '',
		),
		array(
			'name'        => 'WordPress SEO by Yoast',
			'slug'        => 'wordpress-seo',
			'is_callable' => 'wpseo_init',
			'force_activation'   => true,
		),
		array(
			'name'        => 'Wordfence Security',
			'slug'        => 'wordfence',
			'is_callable' => 'wordfence_save_activation_error()',
		),
		array(
			'name'        => 'Ajax Search Lite',
			'slug'        => 'ajax-search-lite',
			'is_callable' => '',
		),
		array(
			'name'        => 'W3 Total Cache',
			'slug'        => 'w3-total-cache',
			'is_callable' => '',
		),
		array(
			'name'        => 'Kirki',
			'slug'        => 'kirki',
			'is_callable' => '',
			'force_activation'   => true,
		),
		array(
			'name'        => 'Classic Editor',
			'slug'        => 'classic-editor',
			'is_callable' => '',
			'force_activation'   => true,
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'make',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => get_template_directory() . '/inc/required-plugins/',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'make' ),
			'menu_title'                      => __( 'Install Plugins', 'make' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'make' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'make' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'make' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'make'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'make'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'make'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'make'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'make'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'make'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'make'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'make'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'make'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'make' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'make' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'make' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'make' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'make' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'make' ),
			'dismiss'                         => __( 'Dismiss this notice', 'make' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'make' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'make' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
	);

	tgmpa( $plugins, $config );
}

// Move Yoast to bottom
function yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');
