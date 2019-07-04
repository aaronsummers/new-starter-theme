<?php 
/**
 * Build the ninja forms dropdown options for our metabox select_advanced field.
 *
 * USE :
 	$theme_name = 'theme_name';
	include($_SERVER["DOCUMENT_ROOT"] ."/wp-content/themes/".$theme_name."/inc/metabox/inc/_ninja-form.php");

	array(
		'name'        => 'Forms',
		'id'          => "{$prefix}introduction_form",
		'type'        => 'select_advanced',
		// @var $option is the ninja form name and id
		'options'     => $option,
		'multiple'    => false,
		'placeholder' => 'Select a Form',
	),
 */
if ( class_exists( 'Ninja_Forms' ) ) {
	// AllFormsTable.php Line: 114
	$forms = Ninja_Forms()->form()->get_forms();
	$key = array();
	$value = array();
	foreach( $forms as $form ): 
		// admin-metabox-append-a-form.html.php
		$id = $form->get_id(); 
	    $key[] = intval( $id );
	    $value[] = esc_html( $form->get_setting( 'title' ) ) . ' [id:' . intval( $id ) . ']';
	endforeach;
	$option = array_combine($key, $value);
} else {
	$option = array('no_forms' => 'ACTIVATE NINJA FORM PLUGIN!!');
}
