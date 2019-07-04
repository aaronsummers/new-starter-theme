<?php 


/*
 * REGISTER FOOTER SIDEBAR
 *************************************************************/
if ( function_exists('register_sidebar') ){
	register_sidebar( array(
		'name' => 'Footer Newsletter',
		'id' => 'footer-newsletter',
		'description' => 'Newsletter form shortcode and title',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<small>',
		'after_title' => '</small>',
	) );

	register_sidebar( array(
		'name' => 'Footer Widget #1',
		'id' => 'footer-contact',
		'description' => 'This is the 3rd item along the footer area, add your address details to a text widget in this area.',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => 'Footer Widget #2',
		'id' => 'footer-form',
		'description' => 'This is the 4th item along the footer area, add your community form to this area',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
}