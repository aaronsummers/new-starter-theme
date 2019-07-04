<?php 
    /* Arrange WP Editor Toolbar Buttons */
    add_filter( 'mce_buttons', 'new_wpeditor_buttons', 10, 2 );
     
    /**
     * Add Buttons To WP Editor Toolbar.
     */
    function new_wpeditor_buttons( $buttons, $editor_id ){
        /* Add it as first item in the row */
        array_unshift( $buttons, 'styleselect' );
        return $buttons;
    }
     /* Filter  */
    add_filter( 'tiny_mce_before_init', 'my_wpeditor_formats_options' );
     
    /**
     * Override Formats Options in the Drop Down
     */
    function my_wpeditor_formats_options( $settings ){
     
        /* List all options as multi dimension array */
        $style_formats = array(

            array(
                'title'   => 'Text Highlight',
                'items' => array(
                    array(
                        'title'   => 'Red Text', /* Title of the option drop down */
                        'block'  => 'span', /* use "inline" or "block" as key and the element wrapper ( "div", "span", "etc" ) as value. */
                        'classes' => 'red-text', /* additional classes for the element created (separated by space) */
                        //'icon'    => 'blockquote',
                    ),
                    array(
                        'title'   => 'Yellow Text', /* Title of the option drop down */
                        'block'  => 'span', /* use "inline" or "block" as key and the element wrapper ( "div", "span", "etc" ) as value. */
                        'classes' => 'yellow-text', /* additional classes for the element created (separated by space) */
                        //'icon'    => 'blockquote',
                    ),
                ),
            ),
            array(
                'title'   => 'Buttons',
                'items' => array(
                    array(
		                'title'   => 'Transparent Background / White Border', /* Title of the option drop down */
		                'block'  => 'div', /* use "inline" or "block" as key and the element wrapper ( "div", "span", "etc" ) as value. */
		                'classes' => 'button-wrapper white-border', /* additional classes for the element created (separated by space) */
                        //'icon'    => 'blockquote',
                    ),
                    array(
		                'title'   => 'Red Background / White text', /* Title of the option drop down */
		                'block'  => 'div', /* use "inline" or "block" as key and the element wrapper ( "div", "span", "etc" ) as value. */
		                'classes' => 'button-wrapper button-red', /* additional classes for the element created (separated by space) */
                        //'icon'    => 'blockquote',
                    ),
                ),
            ),
            array(
                'title'   => 'Font Sizes',
                'items' => array(
                    array(
		                'title'   => '22px', /* Title of the option drop down */
		                'inline'  => 'span', /* use "inline" or "block" as key and the element wrapper ( "div", "span", "etc" ) as value. */
		                'classes' => 'font-size-22', /* additional classes for the element created (separated by space) */
                        //'icon'    => 'blockquote',
                    ),
                    array(
		                'title'   => '25px', /* Title of the option drop down */
		                'inline'  => 'span', /* use "inline" or "block" as key and the element wrapper ( "div", "span", "etc" ) as value. */
		                'classes' => 'font-size-25', /* additional classes for the element created (separated by space) */
                        //'icon'    => 'blockquote',
                    ),
                ),
            ),
            array(
                'title'   => 'Font Family',
                'items' => array(
                    array(
		                'title'   => 'Agent Bold', /* Title of the option drop down */
		                'inline'  => 'span', /* use "inline" or "block" as key and the element wrapper ( "div", "span", "etc" ) as value. */
		                'classes' => 'agent-bold', /* additional classes for the element created (separated by space) */
                        //'icon'    => 'blockquote',
                    ),
                    array(
		                'title'   => 'Agent DemiBold', /* Title of the option drop down */
		                'inline'  => 'span', /* use "inline" or "block" as key and the element wrapper ( "div", "span", "etc" ) as value. */
		                'classes' => 'agent-demi-bold', /* additional classes for the element created (separated by space) */
                        //'icon'    => 'blockquote',
                    ),
                    array(
		                'title'   => 'Agent Regular', /* Title of the option drop down */
		                'inline'  => 'span', /* use "inline" or "block" as key and the element wrapper ( "div", "span", "etc" ) as value. */
		                'classes' => 'agent-regular', /* additional classes for the element created (separated by space) */
                        //'icon'    => 'blockquote',
                    ),
                    array(
		                'title'   => 'Agent Thin', /* Title of the option drop down */
		                'inline'  => 'span', /* use "inline" or "block" as key and the element wrapper ( "div", "span", "etc" ) as value. */
		                'classes' => 'agent-thin', /* additional classes for the element created (separated by space) */
                        //'icon'    => 'blockquote',
                    ),
                    array(
		                'title'   => 'Have Heart', /* Title of the option drop down */
		                'inline'  => 'span', /* use "inline" or "block" as key and the element wrapper ( "div", "span", "etc" ) as value. */
		                'classes' => 'have-heart', /* additional classes for the element created (separated by space) */
                        //'icon'    => 'blockquote',
                    ),
                    array(
		                'title'   => 'Klinic Slab Bold', /* Title of the option drop down */
		                'inline'  => 'span', /* use "inline" or "block" as key and the element wrapper ( "div", "span", "etc" ) as value. */
		                'classes' => 'klinic-slab-bold', /* additional classes for the element created (separated by space) */
                        //'icon'    => 'blockquote',
                    ),
                    array(
		                'title'   => 'Klinic Slab Medium', /* Title of the option drop down */
		                'inline'  => 'span', /* use "inline" or "block" as key and the element wrapper ( "div", "span", "etc" ) as value. */
		                'classes' => 'klinic-slab-medium', /* additional classes for the element created (separated by space) */
                        //'icon'    => 'blockquote',
                    ),
                    array(
		                'title'   => 'Proxima Nova Semi Bold', /* Title of the option drop down */
		                'inline'  => 'span', /* use "inline" or "block" as key and the element wrapper ( "div", "span", "etc" ) as value. */
		                'classes' => 'proxima-nova-semi-bold', /* additional classes for the element created (separated by space) */
                        //'icon'    => 'blockquote',
                    ),
                ),
            ),
        );
     
        /* Add it in tinymce confTitleig as json data */
        $settings['style_formats'] = json_encode( $style_formats );
        return $settings;
    }

/*
 * Remove H1 tag from TinyMCE Editor
 */
add_filter('tiny_mce_before_init', 'tp_tinymce_remove_unused_formats' );
function tp_tinymce_remove_unused_formats($init)
{
  // Add block format elements you want to show in dropdown
    // $init['block_formats'] = 'Paragraph=p;Address=address;Pre=pre;Heading 1=h1;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6';
    $init['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Pre=pre;';
    return $init;
}


/**
 * Removes buttons from the first row of the tiny mce editor
 *
 * @link     http://thestizmedia.com/remove-buttons-items-wordpress-tinymce-editor/
 *
 * @param    array    $buttons    The default array of buttons
 * @return   array                The updated array of buttons that exludes some items
 */
add_filter( 'mce_buttons', 'jivedig_remove_tiny_mce_buttons_from_editor');
function jivedig_remove_tiny_mce_buttons_from_editor( $buttons ) {
    $remove_buttons = array(
        // 'bold',
        // 'italic',
        // 'strikethrough',
        // 'bullist',
        // 'numlist',
        // 'blockquote',
        // 'hr',
        // 'alignleft',
        // 'aligncenter',
        // 'alignright',
        // 'link',
        // 'unlink',
        'wp_more',
        // 'spellchecker',
        // 'dfw', // distraction free writing mode
        //'wp_adv', // kitchen sink toggle (if removed, kitchen sink will always display)
    );
    foreach ( $buttons as $button_key => $button_value ) {
        if ( in_array( $button_value, $remove_buttons ) ) {
            unset( $buttons[ $button_key ] );
        }
    }
    return $buttons;
}
/**
 * Removes buttons from the second row (kitchen sink) of the tiny mce editor
 *
 * @link     http://thestizmedia.com/remove-buttons-items-wordpress-tinymce-editor/
 *
 * @param    array    $buttons    The default array of buttons in the kitchen sink
 * @return   array                The updated array of buttons that exludes some items
 */
// add_filter( 'mce_buttons_2', 'jivedig_remove_tiny_mce_buttons_from_kitchen_sink');
// function jivedig_remove_tiny_mce_buttons_from_kitchen_sink( $buttons ) {
//     $remove_buttons = array(
//         'formatselect', // format dropdown menu for <p>, headings, etc
//         'underline',
//         'alignjustify',
//         'forecolor', // text color
//         'pastetext', // paste as text
//         'removeformat', // clear formatting
//         'charmap', // special characters
//         'outdent',
//         'indent',
//         'undo',
//         'redo',
//         'wp_help', // keyboard shortcuts
//     );
//     foreach ( $buttons as $button_key => $button_value ) {
//         if ( in_array( $button_value, $remove_buttons ) ) {
//             unset( $buttons[ $button_key ] );
//         }
//     }
//     return $buttons;
// }
