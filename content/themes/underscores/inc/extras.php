<?php

/**
 * Add Sidebar Classes.
 *
 * @link https://codex.wordpress.org/Function_Reference/body_class#Add_Sidebar_Classes
 */

add_action( 'wp_head', create_function( '', 'ob_start();' ) );
add_action( 'get_sidebar', '_s_sidebar_class' );
add_action( 'wp_footer', '_s_sidebar_class_replace' );

function _s_sidebar_class( $name = '' ) {
	static $class = 'sidebar';
	if ( ! empty( $name ) ) {
		$class .= ' sidebar-' . $name;
	}
	_s_sidebar_class_replace( $class );
}

function _s_sidebar_class_replace( $c = '' ) {
	static $class = '';
	if ( ! empty( $c ) ) {
		$class = $c;
	} else {
		echo str_replace( '<body class="', '<body class="' . $class . ' ', ob_get_clean() );
		ob_start();
	}
}

/**
 * TinyMCE Custom Styles.
 *
 * @link https://codex.wordpress.org/TinyMCE_Custom_Styles
 */

// Callback function to insert 'styleselect' into the $buttons array
function _s_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
// Register our callback to the appropriate filter
add_filter( 'mce_buttons_2', '_s_mce_buttons_2' );

// Callback function to filter the MCE settings
function _s_mce_before_init_insert_formats( $init_array ) {
    // Define the style_formats array
    $style_formats = array(
        // Each array child is a format with it's own settings
        array(
            'title' => 'Button',
            'selector' => 'a',
            'classes' => 'button',
            'attributes' => array(
							'role' => 'button',
            )
        )
    );
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );

    return $init_array;
}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', '_s_mce_before_init_insert_formats' );
