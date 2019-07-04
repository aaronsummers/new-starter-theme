<?php
// Add a shorcode to get the template part
function makeagency_shortcode() {
    ob_start();
    get_template_part('templates/parts/_section', 'news');
    return ob_get_clean();   
} 
add_shortcode( 'news_feed', 'makeagency_shortcode' );





// Add Shortcode
function link_shortcode( $atts , $content = null ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'colour' => '',
		),
		$atts
    );
    
	return '<a href="' . addScheme( $content ) . '" style="color: ' . $atts['colour'] . '">' . $content . '</a>';
}
add_shortcode( 'link', 'link_shortcode' );




// Add Shortcode
function email_shortcode( $atts , $content = null ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'colour' => '',
		),
		$atts
    );
    
	return '<a href="mailto:' . $content . '" style="color: ' . $atts['colour'] . '>' . $content . '</a>';
}
add_shortcode( 'email', 'email_shortcode' );




// Add Shortcode
function blue_text_shortcode( $atts , $content = null ) {
	return '<span class="blue-text">' . $content . '</span>';
}
add_shortcode( 'blue', 'blue_text_shortcode' );