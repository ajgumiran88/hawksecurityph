<?php
/**
 * Template part for displaying Inner Page Banners
 *
 * Provides a crisp, high-contrast banner with page title, gold accent bar, and breadcrumbs.
 *
 * @package Hawk_Security_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$banner_bg = '';
if ( has_post_thumbnail() ) {
	$banner_bg = get_the_post_thumbnail_url( get_the_ID(), 'full' );
}

if ( empty( $banner_bg ) ) {
	$banner_bg = home_url( '/wp-content/uploads/2026/01/Gemini_Generated_Image_d6ftgud6ftgud6ft.png' );
}
?>

<div class="hawk-v2-page-banner" style="background-image: url('<?php echo esc_url( $banner_bg ); ?>');">
	<div class="hawk-v2-banner-overlay"></div>
	<div class="hawk-v2-banner-container">
		<div class="hawk-v2-banner-content">
			
			<h1 class="hawk-v2-banner-title"><?php the_title(); ?></h1>
			<div class="hawk-v2-heading-bar"></div>

			<div class="hawk-v2-banner-breadcrumbs">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'hawk-security-child' ); ?></a>
				<span class="hawk-v2-breadcrumb-sep">/</span>
				<span class="hawk-v2-breadcrumb-current"><?php the_title(); ?></span>
			</div>

		</div>
	</div>
</div>
