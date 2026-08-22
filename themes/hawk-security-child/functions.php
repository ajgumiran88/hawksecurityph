<?php
/**
 * HAWK Security Child Theme Functions
 *
 * Native Chrome pass: header, homepage hero, inner-page banners, footer.
 * Page interior copy and images remain powered by WPBakery / standard WordPress content.
 *
 * @package Hawk_Security_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'HAWK_CHILD_VERSION', '0.9.9' );
define( 'HAWK_CHILD_DIR', get_stylesheet_directory() );
define( 'HAWK_CHILD_URI', get_stylesheet_directory_uri() );

/**
 * Setup child theme features and menu locations.
 */
function hawk_security_child_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	register_nav_menus(
		array(
			'primary_nav' => esc_html__( 'HAWK Primary Navigation', 'hawk-security-child' ),
			'footer_nav'  => esc_html__( 'HAWK Footer Navigation', 'hawk-security-child' ),
		)
	);
}
add_action( 'after_setup_theme', 'hawk_security_child_setup', 20 );

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
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'hawk-v2',
		HAWK_CHILD_URI . '/assets/css/hawk-v2.css',
		array( 'solutech-parent', 'hawk-v2-fonts' ),
		HAWK_CHILD_VERSION
	);

	wp_enqueue_style(
		'hawk-premium',
		HAWK_CHILD_URI . '/assets/css/hawk-premium.css',
		array( 'hawk-v2' ),
		HAWK_CHILD_VERSION
	);

	wp_enqueue_style(
		'hawk-fx',
		HAWK_CHILD_URI . '/assets/css/hawk-fx.css',
		array( 'hawk-premium' ),
		HAWK_CHILD_VERSION
	);

	wp_enqueue_script(
		'hawk-v2',
		HAWK_CHILD_URI . '/assets/js/hawk-v2.js',
		array( 'jquery' ),
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
 *
 * @param array $classes Existing body classes.
 * @return array Modified body classes.
 */
function hawk_security_child_body_class( $classes ) {
	$classes[] = 'hawk-v2';
	$classes[] = 'hawk-child-active';
	return $classes;
}
add_filter( 'body_class', 'hawk_security_child_body_class' );

/**
 * Helper to retrieve the official HAWK logo URL.
 *
 * @return string Logo image URL.
 */
function hawk_get_logo_url() {
	$official_seal = home_url( '/wp-content/uploads/2025/01/hawk_seal.webp' );
	$official_path = ABSPATH . 'wp-content/uploads/2025/01/hawk_seal.webp';
	if ( file_exists( $official_path ) ) {
		return esc_url( $official_seal );
	}

	$theme_logo = HAWK_CHILD_URI . '/assets/img/hawk-logo.png';
	if ( file_exists( HAWK_CHILD_DIR . '/assets/img/hawk-logo.png' ) ) {
		return esc_url( $theme_logo );
	}

	$custom_logo_id = get_theme_mod( 'custom_logo' );
	if ( $custom_logo_id ) {
		$logo = wp_get_attachment_image_src( $custom_logo_id, 'full' );
		if ( ! empty( $logo[0] ) ) {
			return esc_url( $logo[0] );
		}
	}

	// Solutech theme option fallback
	if ( function_exists( 'pixtheme_get_option' ) ) {
		$solutech_logo = pixtheme_get_option( 'general_settings_logo', '' );
		if ( ! empty( $solutech_logo ) ) {
			return esc_url( $solutech_logo );
		}
	}

	// Production default logo path
	return esc_url( home_url( '/wp-content/uploads/2025/01/HAWK-LOGO-scaled.webp' ) );
}

/**
 * Render the primary navigation menu with resilient fallback.
 *
 * @param string $menu_class CSS class for the ul element.
 * @param string $menu_id    HTML id for the ul element.
 */
function hawk_render_primary_nav( $menu_class = 'hawk-v2-nav-list', $menu_id = 'hawk-v2-primary-menu' ) {
	if ( has_nav_menu( 'primary_nav' ) ) {
		wp_nav_menu(
			array(
				'theme_location' => 'primary_nav',
				'container'      => false,
				'menu_class'     => esc_attr( $menu_class ),
				'menu_id'        => esc_attr( $menu_id ),
				'depth'          => 2,
				'fallback_cb'    => 'hawk_render_fallback_nav',
			)
		);
		return;
	}

	// Check if any existing Solutech / WP nav menu exists
	$menus = wp_get_nav_menus();
	if ( ! empty( $menus ) ) {
		foreach ( $menus as $m ) {
			if ( in_array( $m->slug, array( 'primary-menu', 'main-menu', 'hawk-menu', 'primary' ), true ) ) {
				wp_nav_menu(
					array(
						'menu'        => $m->term_id,
						'container'   => false,
						'menu_class'  => esc_attr( $menu_class ),
						'menu_id'     => esc_attr( $menu_id ),
						'depth'       => 2,
						'fallback_cb' => 'hawk_render_fallback_nav',
					)
				);
				return;
			}
		}
	}

	hawk_render_fallback_nav( array( 'menu_class' => $menu_class, 'menu_id' => $menu_id ) );
}

/**
 * Fallback navigation rendering the 6 public site pages.
 *
 * @param array $args Menu arguments.
 */
function hawk_render_fallback_nav( $args = array() ) {
	$menu_class = isset( $args['menu_class'] ) ? $args['menu_class'] : 'hawk-v2-nav-list';
	$menu_id    = isset( $args['menu_id'] ) ? $args['menu_id'] : 'hawk-v2-fallback-menu';

	$current_url = home_url( add_query_arg( array(), $GLOBALS['wp']->request ?? '' ) );
	$current_url = trailingslashit( $current_url );

	$items = array(
		array(
			'label' => 'Home',
			'url'   => home_url( '/' ),
		),
		array(
			'label' => 'About Us',
			'url'   => home_url( '/about-us/' ),
		),
		array(
			'label' => 'Our Services',
			'url'   => home_url( '/our-services/' ),
		),
		array(
			'label' => 'Core Competencies',
			'url'   => home_url( '/core-competencies-2/' ),
		),
		array(
			'label' => 'Careers',
			'url'   => home_url( '/careers/' ),
		),
		array(
			'label' => 'Contacts',
			'url'   => home_url( '/contacts/' ),
		),
	);

	echo '<ul id="' . esc_attr( $menu_id ) . '" class="' . esc_attr( $menu_class ) . '">';
	foreach ( $items as $item ) {
		$item_url = trailingslashit( $item['url'] );
		$is_active = ( $current_url === $item_url || ( is_front_page() && home_url( '/' ) === $item['url'] ) );
		$active_class = $is_active ? ' current-menu-item' : '';
		echo '<li class="menu-item' . esc_attr( $active_class ) . '"><a href="' . esc_url( $item['url'] ) . '">' . esc_html( $item['label'] ) . '</a></li>';
	}
	echo '</ul>';
}

/**
 * Strip Revolution Slider & SmartSlider shortcodes and raw module blocks from the homepage content.
 *
 * @param string $content Post content.
 * @return string Filtered post content.
 */
function hawk_strip_homepage_slider( $content ) {
	if ( is_front_page() || is_page_template( 'page-home.php' ) ) {
		// Strip [rev_slider ...] shortcodes
		$content = preg_replace( '/\[rev_slider\b[^\]]*\]/i', '', $content );
		// Strip [slider-revolution ...] shortcodes
		$content = preg_replace( '/\[slider-revolution\b[^\]]*\]/i', '', $content );
		// Strip [smartslider3 ...] shortcodes
		$content = preg_replace( '/\[smartslider3\b[^\]]*\]/i', '', $content );
		// Strip <sr7-module...>...</sr7-module> tags and inner content
		$content = preg_replace( '/<sr7-module\b[^>]*>.*?<\/sr7-module>/is', '', $content );
		// Strip Revolution Slider initialization scripts
		$content = preg_replace( '/<script\b[^>]*>\s*SR7\.PMH.*?;<\/script>/is', '', $content );
		$content = preg_replace( '/<p class="rs-p-wp-fix"><\/p>/i', '', $content );
	}
	return $content;
}
add_filter( 'the_content', 'hawk_strip_homepage_slider', 1 );

/**
 * Dequeue legacy sliders on homepage.
 */
function hawk_dequeue_unwanted_sliders() {
	if ( is_front_page() || is_page_template( 'page-home.php' ) ) {
		wp_dequeue_style( 'rs-plugin-settings' );
		wp_dequeue_style( 'smartslider3' );
		wp_dequeue_script( 'revmin' );
		wp_dequeue_script( 'tp-tools' );
	}
}
add_action( 'wp_enqueue_scripts', 'hawk_dequeue_unwanted_sliders', 100 );

/**
 * Render executive personnel tactical showcase in place of legacy unstyled personnel block.
 *
 * @param string $content Post content.
 * @return string Filtered post content.
 */
function hawk_enhance_homepage_personnel( $content ) {
	if ( is_front_page() || is_page_template( 'page-home.php' ) ) {
		if ( false !== strpos( $content, 'Our Personnel' ) && false === strpos( $content, 'hawk-personnel-portal' ) ) {
			ob_start();
			get_template_part( 'template-parts/personnel-section' );
			$personnel_html = ob_get_clean();

			// Replace the WPBakery row containing the legacy Our Personnel section
			$pattern = '/<div[^>]*class="[^"]*vc_custom_1769396010111[^"]*"[^>]*>.*?<\/div>\s*<\/div>\s*<\/div>\s*<\/div>\s*<\/div>\s*<div class="vc_row-full-width vc_clearfix"><\/div>/is';
			if ( preg_match( $pattern, $content ) ) {
				$content = preg_replace( $pattern, $personnel_html, $content );
			} else {
				$pattern2 = '/<div[^>]*class="[^"]*vc_row[^"]*"[^>]*>(?:(?!<div[^>]*class="[^"]*vc_row).)*?Our Personnel.*?<\/div>\s*<div class="vc_row-full-width vc_clearfix"><\/div>/is';
				if ( preg_match( $pattern2, $content ) ) {
					$content = preg_replace( $pattern2, $personnel_html, $content, 1 );
				}
			}
		}
	}
	return $content;
}
add_filter( 'the_content', 'hawk_enhance_homepage_personnel', 10 );

/**
 * Render executive command CTA section in place of legacy dull CTA block.
 *
 * @param string $content Post content.
 * @return string Filtered post content.
 */
function hawk_enhance_homepage_cta( $content ) {
	if ( is_front_page() || is_page_template( 'page-home.php' ) ) {
		// If legacy "Ready to Get Started?" row exists, replace it with our executive CTA
		if ( false !== strpos( $content, 'Ready to Get Started?' ) || false !== strpos( $content, 'vc_custom_1739176079983' ) ) {
			ob_start();
			get_template_part( 'template-parts/cta-section' );
			$cta_html = ob_get_clean();

			// Replace the WPBakery row containing the legacy CTA
			$pattern = '/<div[^>]*class="[^"]*vc_custom_1739176079983[^"]*"[^>]*>.*?<\/div>\s*<\/div>\s*<\/div>\s*<\/div>\s*<\/div>\s*<div class="vc_row-full-width vc_clearfix"><\/div>/is';
			if ( preg_match( $pattern, $content ) ) {
				$content = preg_replace( $pattern, $cta_html, $content );
			} else {
				$pattern2 = '/<div[^>]*class="[^"]*vc_row[^"]*"[^>]*>(?:(?!<div[^>]*class="[^"]*vc_row).)*?Ready to Get Started\?.*?<\/div>\s*<div class="vc_row-full-width vc_clearfix"><\/div>/is';
				if ( preg_match( $pattern2, $content ) ) {
					$content = preg_replace( $pattern2, $cta_html, $content );
				} else {
					$content = preg_replace( '/<h1[^>]*>Ready to Get Started\?.*?<\/button>\s*<\/div>/is', '', $content );
					$content .= $cta_html;
				}
			}
		}
	}
	return $content;
}
add_filter( 'the_content', 'hawk_enhance_homepage_cta', 20 );

/**
 * Override Solutech accent tokens toward HAWK gold / graphite.
 */
function hawk_security_child_pix_colors() {
	?>
	<style id="hawk-v2-pix-tokens">
		:root {
	--pix-main-color: #17212A;
	--pix-button-color: #E8C64A;
	--pix-title-color: #17212A;
	--pix-font-color: #53616C;
	--pix-tab-overlay-color: #F7F8F6;
	--pix-tab-overlay-opacity: 0.12;
		}
	</style>
	<?php
}
add_action( 'wp_head', 'hawk_security_child_pix_colors', 99 );
