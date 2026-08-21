<?php
/**
 * Plugin Name: HAWK v2 Design Loader
 * Description: Loads the HAWK Security child-theme CSS/JS while Solutech remains the active theme. Skips itself after hawk-security-child is activated.
 * Version: 0.5.1
 *
 * Deploy target: wp-content/mu-plugins/hawk-v2-loader.php
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action(
	'wp_enqueue_scripts',
	function () {
		if ( function_exists( 'get_stylesheet' ) && 'hawk-security-child' === get_stylesheet() ) {
			return;
		}

		$dir = WP_CONTENT_DIR . '/themes/hawk-security-child';
		$uri = content_url( 'themes/hawk-security-child' );

		if ( ! file_exists( $dir . '/assets/css/hawk-v2.css' ) ) {
			return;
		}

		wp_enqueue_style(
			'hawk-v2-fonts',
			'https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700&family=Manrope:wght@400;500;600;700&display=swap',
			array(),
			null
		);

		wp_enqueue_style(
			'hawk-v2',
			$uri . '/assets/css/hawk-v2.css',
			array( 'style', 'pixtheme-main', 'hawk-v2-fonts' ),
			'0.5.1'
		);

		wp_enqueue_script(
			'hawk-v2',
			$uri . '/assets/js/hawk-v2.js',
			array(),
			'0.5.1',
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
	},
	99
);

add_filter(
	'body_class',
	function ( $classes ) {
		$classes[] = 'hawk-v2';
		return $classes;
	}
);

add_action(
	'wp_head',
	function () {
		echo '<style id="hawk-v2-pix-tokens">:root{--pix-main-color:#0b0b0b;--pix-button-color:#e6c200;--pix-title-color:#0b0b0b;--pix-tab-overlay-opacity:0.55;}</style>' . "\n";
	},
	99
);
