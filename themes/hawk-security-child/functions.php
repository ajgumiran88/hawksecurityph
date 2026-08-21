<?php
/**
 * HAWK Security Child Theme
 *
 * Overlay for Solutech + WPBakery. Redesign CSS/JS use hawk-v2- / hawk- prefixes
 * and also restyle existing live hawk-* content blocks.
 *
 * @package Hawk_Security_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'HAWK_CHILD_VERSION', '0.2.0' );
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
		'hawk-v2-fonts',
		'https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700&family=Manrope:wght@400;500;600;700&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'hawk-v2',
		HAWK_CHILD_URI . '/assets/css/hawk-v2.css',
		array( 'solutech-parent', 'pixtheme-main', 'hawk-v2-fonts' ),
		HAWK_CHILD_VERSION
	);

	wp_enqueue_script(
		'hawk-v2',
		HAWK_CHILD_URI . '/assets/js/hawk-v2.js',
		array(),
		HAWK_CHILD_VERSION,
		true
	);

	wp_localize_script(
		'hawk-v2',
		'hawkV2',
		array(
			'homeUrl'    => home_url( '/' ),
			'contactUrl' => home_url( '/contacts/' ),
			'quoteLabel' => 'Request a Security Quote',
		)
	);
}
add_action( 'wp_enqueue_scripts', 'hawk_security_child_enqueue_assets', 40 );

/**
 * Mark public markup for scoped redesign.
 */
function hawk_security_child_body_class( $classes ) {
	$classes[] = 'hawk-v2';
	return $classes;
}
add_filter( 'body_class', 'hawk_security_child_body_class' );

/**
 * Override Solutech accent tokens toward HAWK gold / graphite.
 */
function hawk_security_child_pix_colors() {
	?>
	<style id="hawk-v2-pix-tokens">
		:root {
			--pix-main-color: #0b0b0b;
			--pix-button-color: #e6c200;
			--pix-title-color: #0b0b0b;
			--pix-font-color: #3d3d3d;
			--pix-tab-overlay-color: #0b0b0b;
			--pix-tab-overlay-opacity: 0.55;
		}
	</style>
	<?php
}
add_action( 'wp_head', 'hawk_security_child_pix_colors', 99 );
