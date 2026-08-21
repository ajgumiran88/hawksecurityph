<?php
/**
 * HAWK Security Child Theme
 *
 * Custom theme layer for hawksecurityph.com. Keep redesign CSS/JS scoped
 * with hawk-v2- / hawk- class prefixes to avoid conflicts with Solutech,
 * WPBakery, Revolution Slider, and other plugins.
 *
 * @package Hawk_Security_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'HAWK_CHILD_VERSION', '0.1.0' );
define( 'HAWK_CHILD_DIR', get_stylesheet_directory() );
define( 'HAWK_CHILD_URI', get_stylesheet_directory_uri() );

/**
 * Enqueue parent + child assets.
 */
function hawk_security_child_enqueue_assets() {
	wp_enqueue_style(
		'solutech-parent',
		get_template_directory_uri() . '/style.css',
		array(),
		null
	);

	wp_enqueue_style(
		'hawk-v2',
		HAWK_CHILD_URI . '/assets/css/hawk-v2.css',
		array( 'solutech-parent' ),
		HAWK_CHILD_VERSION
	);

	wp_enqueue_script(
		'hawk-v2',
		HAWK_CHILD_URI . '/assets/js/hawk-v2.js',
		array(),
		HAWK_CHILD_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'hawk_security_child_enqueue_assets', 20 );
