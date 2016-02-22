<?php

/**
 * Normalize.
 */
require get_stylesheet_directory() . '/inc/normalize.php';

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
