<?php
/**
 * Configuration functions for this theme.
 *
 * Update options and insert posts
 *
 * @package _s
 */

function _s_configuration_child() {

	/**
	 * Updating Core Options
	 *
	 * @link https://codex.wordpress.org/Function_Reference/update_option
	 */
	function _s_configuration_options_child() {
		// Timezone
		update_option( 'timezone_string', 'Australia/Brisbane' );
		// Allow people to post comments on new articles
		update_option( 'default_comment_status', 'closed' );
		// Users must be registered and logged in to comment
		update_option( 'comment_registration', 1 );
		// Permalink Settings
		update_option( 'permalink_structure', '/%postname%/' );
		global $wp_rewrite;
		$wp_rewrite->flush_rules();
		// Organize my uploads into month- and year-based folders
		update_option( 'uploads_use_yearmonth_folders', 0 );
		// Front page displays
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', 2 );

		// Activate plugins
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		activate_plugin( 'contact-form-7/wp-contact-form-7.php' );
		activate_plugin( 'really-simple-captcha/really-simple-captcha.php' );
		activate_plugin( 'contact-form-7-honeypot/honeypot.php' );
		activate_plugin( 'wordpress-seo/wp-seo.php' );
	}

	/**
	 * Inserting posts
	 *
	 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/wp_insert_post
	 */
	function _s_configuration_posts_child() {

		function _s_wp_update_post_sample_page() {
		  $post = array(
				'ID' => 2,
		    'post_title' => 'Home',
		    'post_name' => 'home',
		  );

		  wp_update_post($post);
		}
		_s_wp_update_post_sample_page();
	}

	/**
	 * Initialize configuration conditionally
	 */
	function _s_configuration_initialize_child() {

		if (get_option('_s_configuration') != "yes") {

			_s_configuration_options_child();
			_s_configuration_posts_child();

			update_option( '_s_configuration', 'yes' );

		}
	}

	_s_configuration_initialize_child();
}

add_action( 'after_switch_theme', '_s_configuration_child' );
