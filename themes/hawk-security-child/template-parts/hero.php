<?php
/**
 * Template part for the Native Homepage Hero
 *
 * Replaces Revolution Slider with clean semantic markup and responsive CSS.
 *
 * @package Hawk_Security_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_bg_url = home_url( '/wp-content/uploads/2026/01/Gemini_Generated_Image_d6ftgud6ftgud6ft.png' );
?>

<section class="hawk-v2-hero" style="background-image: url('<?php echo esc_url( $hero_bg_url ); ?>');">
	<div class="hawk-v2-hero-overlay"></div>
	<div class="hawk-v2-hero-container">
		<div class="hawk-v2-hero-content">
			
			<div class="hawk-v2-hero-badge-wrap">
				<span class="hawk-v2-hero-badge">
					<span class="hawk-v2-hero-badge-dot"></span>
					<?php esc_html_e( 'HAWK SECURITY SERVICE, INC.', 'hawk-security-child' ); ?>
				</span>
			</div>

			<h1 class="hawk-v2-hero-title">
				<?php esc_html_e( 'Protect yourself and your business', 'hawk-security-child' ); ?>
			</h1>

			<p class="hawk-v2-hero-desc">
				<?php esc_html_e( 'Providing trusted security since 1987. Through continuous training, we ensure our team is equipped to meet evolving challenges with professionalism and expertise.', 'hawk-security-child' ); ?>
			</p>

			<div class="hawk-v2-hero-actions">
				<a href="<?php echo esc_url( home_url( '/contacts/' ) ); ?>" class="hawk-v2-btn hawk-v2-hero-btn-primary">
					<?php esc_html_e( 'Request a Security Quote', 'hawk-security-child' ); ?>
					<i class="fas fa-arrow-right"></i>
				</a>

				<a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>" class="hawk-v2-btn-outline hawk-v2-hero-btn-secondary">
					<?php esc_html_e( 'About Us', 'hawk-security-child' ); ?>
				</a>
			</div>

		</div>
	</div>
</section>
