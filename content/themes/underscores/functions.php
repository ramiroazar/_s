<?php

/**
 * Normalize.
 */
require get_stylesheet_directory() . '/inc/normalize.php';

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _s_widgets_init_child() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', '_s' ),
		'id'            => 'sidebar',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', '_s_widgets_init_child' );

/**
 * Enqueue scripts and styles.
 */
function _s_scripts_enqueue() {
	wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
}
add_action( 'wp_enqueue_scripts', '_s_scripts_enqueue' );

/**
 * Dequeue scripts and styles.
 */
 add_filter( 'wpcf7_load_css', '__return_false' );

/**
 * Add image sizes
 */
add_image_size('2560', 2560);
add_image_size('1920', 1920);
add_image_size('1280', 1280);
add_image_size('1024', 1024);
add_image_size('768', 768);
add_image_size('480', 480);
add_image_size('320', 320);

add_image_size('thumbnail-large', 300, 300, true);

/**
 * Custom template tags for this theme.
 */
require get_stylesheet_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_stylesheet_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_stylesheet_directory() . '/inc/customizer.php';

/**
 * Custom post types.
 */
require get_stylesheet_directory() . '/inc/post-types.php';

/**
 * Shortcodes.
 */
require get_stylesheet_directory() . '/inc/shortcodes.php';

/**
 * Schema.org.
 */
require get_stylesheet_directory() . '/inc/schema.php';

/**
 * Google Tag Manager.
 */
require get_stylesheet_directory() . '/inc/google-tag-manager.php';

/**
 * Contact Form 7 Template.
 */
require get_stylesheet_directory() . '/inc/contact-form-template.php';

/**
 * Theme configuration.
 */
require get_stylesheet_directory() . '/inc/configuration.php';
