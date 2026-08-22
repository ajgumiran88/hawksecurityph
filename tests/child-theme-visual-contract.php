<?php
/**
 * Static public-theme contract checks.
 *
 * These checks protect the child-theme boundary when the complete WordPress
 * runtime and production content database are not available in CI.
 */

declare(strict_types=1);

$root = dirname(__DIR__);
$files = array(
	'css'         => $root . '/themes/hawk-security-child/assets/css/hawk-v2.css',
	'premium_css' => $root . '/themes/hawk-security-child/assets/css/hawk-premium.css',
	'fx_css'      => $root . '/themes/hawk-security-child/assets/css/hawk-fx.css',
	'js'          => $root . '/themes/hawk-security-child/assets/js/hawk-v2.js',
	'functions'   => $root . '/themes/hawk-security-child/functions.php',
	'header'      => $root . '/themes/hawk-security-child/header.php',
	'footer'      => $root . '/themes/hawk-security-child/footer.php',
	'home'        => $root . '/themes/hawk-security-child/page-home.php',
	'inner'       => $root . '/themes/hawk-security-child/page-no-padding.php',
	'page'        => $root . '/themes/hawk-security-child/page.php',
	'hero'        => $root . '/themes/hawk-security-child/template-parts/hero.php',
	'banner'      => $root . '/themes/hawk-security-child/template-parts/page-banner.php',
	'personnel'   => $root . '/themes/hawk-security-child/template-parts/personnel-section.php',
	'loader'      => $root . '/mu-plugins/hawk-v2-loader.php',
);

$source = array();
foreach ( $files as $name => $path ) {
	if ( ! is_readable( $path ) ) {
		fwrite( STDERR, "FAIL: {$name} source is unreadable: {$path}\n" );
		exit( 1 );
	}
	$source[ $name ] = (string) file_get_contents( $path );
}

$checks = array(
	'approved HAWK gold token'           => array( 'css', '#F4E52A' ),
	'approved premium gold token'        => array( 'css', '#D7B72D' ),
	'approved deep black token'          => array( 'css', '#070707' ),
	'Plus Jakarta Sans font loading'     => array( 'functions', 'Plus+Jakarta+Sans' ),
	'Inter font loading'                 => array( 'functions', 'Inter:wght' ),
	'keyboard skip link'                 => array( 'header', 'hawk-v2-skip-link' ),
	'homepage focusable main target'     => array( 'home', 'tabindex="-1"' ),
	'inner-page focusable main target'   => array( 'inner', 'tabindex="-1"' ),
	'default-page focusable main target' => array( 'page', 'tabindex="-1"' ),
	'focus-visible styles'               => array( 'css', ':focus-visible' ),
	'navigation focus style'             => array( 'css', '.hawk-v2-nav-list a:focus-visible' ),
	'motion preference support'          => array( 'css', 'prefers-reduced-motion: reduce' ),
	'drawer focus restoration'           => array( 'js', 'triggerElement.focus()' ),
	'Contact Form 7 visual treatment'    => array( 'css', '.wpcf7-form-control-wrap' ),
	'job listing visual treatment'       => array( 'css', '.job-listing' ),
	'light canvas token'                 => array( 'premium_css', '--hawk-canvas: #f7f8f6;' ),
	'frosted header surface'             => array( 'premium_css', 'rgba(255, 255, 255, 0.96)' ),
	'frosted header blur'                => array( 'premium_css', 'backdrop-filter: blur(18px)' ),
	'hero light overlay treatment'       => array( 'premium_css', 'rgba(247, 248, 246, 0.96)' ),
	'normal-proportion hero type'        => array( 'premium_css', 'font-size: clamp(2.75rem, 4.2vw, 4rem);' ),
	'compact card density'               => array( 'premium_css', 'min-height: 0 !important;' ),
	'premium refactor version'           => array( 'functions', "HAWK_CHILD_VERSION', '1.0.1" ),
	'personnel filter runs after WPBakery shortcodes' => array( 'functions', "add_filter( 'the_content', 'hawk_enhance_homepage_personnel', 20" ),
	'personnel showcase template is shipped' => array( 'personnel', 'hawk-personnel-portal' ),
	'navigation uses solid HAWK navy token' => array( 'fx_css', '--hawk-nav-solid: #17212A;' ),
	'navigation consumes solid HAWK navy token' => array( 'fx_css', 'background: var(--hawk-nav-solid);' ),
	'scrolled outer header remains transparent' => array( 'fx_css', 'body.hawk-v2.hawk-v2-scrolled .hawk-v2-header {' ),
	'scrolled transparent header preserves mobile contrast' => array( 'fx_css', 'body.hawk-v2.hawk-v2-scrolled .hawk-v2-mobile-toggle' ),
	'scrolled transparent header preserves dispatch contrast' => array( 'fx_css', 'body.hawk-v2.hawk-v2-scrolled .hawk-v2-header-hotline' ),
	'mobile hero keeps compact inline actions' => array( 'fx_css', 'flex: 1 1 0;' ),
	'tablet hero keeps desktop-like inline actions' => array( 'fx_css', 'flex-flow: row nowrap;' ),
	'mobile hero image uses wide banner crop' => array( 'fx_css', "aspect-ratio: 16 / 9;\n\t\tmax-height: none;\n\t\tmin-height: 0;" ),
	'small phone navigation preserves toggle target' => array( 'fx_css', 'flex: 0 0 42px;' ),
	'small phone header simplifies brand lockup' => array( 'fx_css', '@media (max-width: 360px)' ),
	'desktop dispatch has a dedicated grid area' => array( 'header', 'class="hawk-v2-header-hotline"' ),
	'header reserves a dispatch column' => array( 'premium_css', 'grid-template-areas: "brand nav dispatch actions"' ),
	'dispatch occupies its own grid area' => array( 'premium_css', 'grid-area: dispatch;' ),
	'laptop navigation has a compact spacing tier' => array( 'premium_css', '@media (max-width: 1366px)' ),
	'official transparent seal asset'    => array( 'functions', '/uploads/2025/01/hawk_seal.webp' ),
	'default pages use native chrome'    => array( 'page', "get_template_part( 'template-parts/page-banner' )" ),
	'hero uses rectangular media panel'  => array( 'hero', 'hawk-v2-hero-media' ),
	'banner uses rectangular media panel'=> array( 'banner', 'hawk-v2-banner-media' ),
	'inner pages clear the page banner'   => array( 'premium_css', '.wpb-content-wrapper > .vc_section:first-child' ),
	'default pages clear the page banner' => array( 'premium_css', '.wpb-content-wrapper > .vc_row:first-child:has(' ),
	'premium cards reset legacy placement'=> array( 'premium_css', 'grid-column: auto !important;' ),
	'banner uses logo panel'             => array( 'banner', 'hawk-v2-banner-logo' ),
	'hero restores approved preview image' => array( 'hero', '/wp-content/uploads/2026/01/Gemini_Generated_Image_d6ftgud6ftgud6ft.png' ),
	'hero preview image is tightly cropped' => array( 'premium_css', 'background-size: 245% auto;' ),
	'hero uses subtle technical grid'    => array( 'premium_css', 'repeating-linear-gradient(90deg' ),
	'hero uses technical corner frame'  => array( 'premium_css', '.hawk-v2-hero-media::before' ),
	'desktop viewport section gate'      => array( 'premium_css', '@media (min-width: 1200px) and (min-height: 720px)' ),
	'desktop viewport section height'    => array( 'premium_css', 'min-height: calc(100svh - var(--hawk-header-height)) !important;' ),
	'desktop services centered grid'     => array( 'premium_css', 'grid-template-columns: repeat(8, minmax(0, 1fr)) !important;' ),
	'premium content width token'        => array( 'premium_css', '--hawk-content-width: 1180px;' ),
	'proportional desktop header'        => array( 'premium_css', '--hawk-header-height: 76px;' ),
	'desktop header grid order'          => array( 'premium_css', 'grid-template-areas: "brand nav dispatch actions";' ),
	'bounded homepage hero'              => array( 'premium_css', 'min-height: clamp(500px, 68vh, 660px);' ),
	'compact WPBakery CTA treatment'     => array( 'premium_css', '.vc_row:has(.vc_btn3-container)' ),
	'mobile navigation breakpoint'       => array( 'premium_css', '@media (max-width: 1100px)' ),
	'legacy loader child-theme aware'    => array( 'loader', 'function hawk_v2_legacy_loader_should_load()' ),
);

$failures = array();
foreach ( $checks as $label => $check ) {
	list( $file, $needle ) = $check;
	if ( false === strpos( $source[ $file ], $needle ) ) {
		$failures[] = "{$label} is missing from {$file}";
	}
}

if ( ! preg_match( '/body\.hawk-v2\.hawk-v2-scrolled \.hawk-v2-header-shell\s*\{[^}]*backdrop-filter:\s*none;/s', $source['fx_css'] ) ) {
	$failures[] = 'scrolled navigation still uses a milky backdrop blur';
}

if ( substr_count( $source['fx_css'], 'background: var(--hawk-nav-solid);' ) < 2 ) {
	$failures[] = 'normal and scrolled navigation are not both solid HAWK navy';
}

if ( ! preg_match( '/body\.hawk-v2 \.hawk-v2-header-shell\s*\{[^}]*backdrop-filter:\s*none;/s', $source['fx_css'] ) ) {
	$failures[] = 'solid navigation still applies glass blur';
}

if ( ! preg_match( '/body\.hawk-v2 \.hawk-v2-header-shell::before\s*\{[^}]*background:\s*none;/s', $source['fx_css'] ) ) {
	$failures[] = 'solid navigation still applies a translucent sheen';
}

if ( substr_count( $source['premium_css'], '{' ) !== substr_count( $source['premium_css'], '}' ) ) {
	$failures[] = 'premium stylesheet has unbalanced braces';
}

if ( false !== strpos( $source['premium_css'], "\\\n" ) || false !== strpos( $source['premium_css'], '\\ ' ) ) {
	$failures[] = 'premium stylesheet contains a stray backslash';
}

$forbidden_footer_urls = array(
	'https://www.facebook.com/',
	'https://api.whatsapp.com/',
	'https://www.instagram.com/',
);
foreach ( $forbidden_footer_urls as $url ) {
	if ( false !== strpos( $source['footer'], $url ) ) {
		$failures[] = "generic social URL remains in footer: {$url}";
	}
}

if ( false !== strpos( $source['hero'], '/wp-content/uploads/2025/02/13.jpg' ) ) {
	$failures[] = 'replacement guard lineup image remains in homepage hero';
}

if ( false !== strpos( $source['banner'], 'background-image:' ) && false !== strpos( $source['banner'], 'hawk-v2-banner-logo-img' ) ) {
	$failures[] = 'banner crest is painted twice (CSS background-image plus img)';
}

foreach ( array( '#86efac', '#22C55E', '#22c55e' ) as $off_palette_color ) {
	if ( false !== strpos( $source['fx_css'], $off_palette_color ) ) {
		$failures[] = "off-palette status color remains in cinematic stylesheet: {$off_palette_color}";
	}
}

if ( $failures ) {
	fwrite( STDERR, "FAIL: HAWK child-theme visual contract\n" );
	foreach ( $failures as $failure ) {
		fwrite( STDERR, " - {$failure}\n" );
	}
	exit( 1 );
}

fwrite( STDOUT, "PASS: HAWK child-theme visual contract\n" );
