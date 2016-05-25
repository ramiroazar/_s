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
        ),
        // Each array child is a format with it's own settings
        array(
            'title' => 'Odometer',
						'block' => 'span',
            'classes' => 'odometer',
						'wrapper' => true,
						'exact' => true
        )
    );
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );

    return $init_array;
}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', '_s_mce_before_init_insert_formats' );

/**
 * Truncate gallery
 *
 * @link
 */

function _s_truncate_gallery($atts) {

	$atts = shortcode_atts(
		array(
			'total' => -1,
		),
		$atts
	);

	$args = array(
		'p' => get_the_id(),
	);

	$query = new WP_Query( $args );
		if ( $query->have_posts() ) :
			$gallery_image_ids_array = array();
			while ($query->have_posts()) : $query->the_post();
				if ( get_post_gallery() ) :
					$gallery = get_post_gallery( get_the_ID(), false );
					$gallery_image_ids = explode(",", $gallery['ids']);
					$c = 0;
					foreach( $gallery_image_ids AS $gallery_image_id ) :
						array_push($gallery_image_ids_array, $gallery_image_id);
						if (++$c == $atts['total']) break;
					endforeach;
				endif;
			endwhile;
		endif;
	$query->reset_postdata();
	return implode(',', $gallery_image_ids_array);
}

/**
 * Filter attributes for the current gallery image tag.
 *
 * @param array   $atts       Gallery image tag attributes.
 * @param WP_Post $attachment WP_Post object for the attachment.
 * @return array (maybe) filtered gallery image tag attributes.
 */
function _s_filter_gallery_img_atts( $atts, $attachment, $size ) {
		$atts['data-media-file'] = wp_get_attachment_image_src( $attachment->ID, 'large' )[0];
    return $atts;
}
add_filter( 'wp_get_attachment_image_attributes', '_s_filter_gallery_img_atts', 10, 3 );

/**
 * Modify The Read More Link Text
 *
 * @link https://codex.wordpress.org/Customizing_the_Read_More#Modify_The_Read_More_Link_Text
 */

	add_filter( 'the_content_more_link', 'modify_read_more_link' );

	function modify_read_more_link() {
		return '<a class="more-link" href="' . get_permalink() . '">More</a>';
	}

/**
 * Register custom Yoast SEO variables
 *
 * @link https://github.com/Yoast/wordpress-seo/issues/1980
 * @link https://github.com/Yoast/wordpress-seo/issues/1782
 */

	function _s_wpseo_register_extra_replacements() {
		foreach (_s_shortcode_init_contact() as $key => $value) {
			wpseo_register_var_replacement(
				'%%contact' . $key . '%%',
				function ($key) {
					return do_shortcode( '[contact type="' . str_replace('contact', '', $key) . '" markup="false"]' );
				}
			);
		}
	}
	add_action('wpseo_register_extra_replacements', '_s_wpseo_register_extra_replacements');

/**
 * Theme color meta
 *
 * @link https://developers.google.com/web/updates/2014/11/Support-for-theme-color-in-Chrome-39-for-Android
 * @link https://developers.google.com/web/fundamentals/design-and-ui/browser-customization/theme-color
 */

function _s_theme_color_meta() {

	if (get_theme_mod('theme_color')) {
		$theme_color_meta = '<meta name="theme-color" content="' . get_theme_mod('theme_color') . '">';
	}

	echo $theme_color_meta;
}

add_action('wp_head','_s_theme_color_meta');
