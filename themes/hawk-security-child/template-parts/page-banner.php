<?php
/**
 * Native inner-page banner.
 *
 * Displays the page title, gold accent bar, breadcrumbs, and the official HAWK logo panel.
 *
 * @package Hawk_Security_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$banner_logo_url = home_url( '/wp-content/uploads/2025/01/HAWK-LOGO-scaled.webp' );
if ( function_exists( 'hawk_get_logo_url' ) ) {
	$custom_logo = hawk_get_logo_url();
	if ( ! empty( $custom_logo ) ) {
		$banner_logo_url = $custom_logo;
	}
}
?>

<div class="hawk-v2-page-banner">
	<div class="hawk-v2-hero-atmosphere" aria-hidden="true">
		<div class="hawk-v2-hero-grid"></div>
		<div class="hawk-v2-hero-orb hawk-v2-hero-orb--gold"></div>
	</div>
	<div class="hawk-v2-banner-overlay"></div>
	<div class="hawk-v2-banner-container">
		<div class="hawk-v2-banner-content">
			<h1 id="hawk-v2-page-title" class="hawk-v2-banner-title"><?php the_title(); ?></h1>
			<div class="hawk-v2-heading-bar"></div>

			<div class="hawk-v2-banner-breadcrumbs">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'hawk-security-child' ); ?></a>
				<span class="hawk-v2-breadcrumb-sep">/</span>
				<span class="hawk-v2-breadcrumb-current"><?php the_title(); ?></span>
			</div>
		</div>

		<div class="hawk-v2-banner-media hawk-v2-banner-logo">
			<img src="<?php echo esc_url( $banner_logo_url ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="hawk-v2-banner-logo-img" />
		</div>
	</div>
</div>
