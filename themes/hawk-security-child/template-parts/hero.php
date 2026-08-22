<?php
/**
 * Native homepage hero.
 *
 * @package Hawk_Security_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_bg_url = home_url( '/wp-content/uploads/2026/01/Gemini_Generated_Image_d6ftgud6ftgud6ft.png' );
?>

<section class="hawk-v2-hero">
	<div class="hawk-v2-hero-atmosphere" aria-hidden="true">
		<div class="hawk-v2-hero-grid"></div>
		<div class="hawk-v2-hero-orb hawk-v2-hero-orb--gold"></div>
		<div class="hawk-v2-hero-orb hawk-v2-hero-orb--steel"></div>
		<div class="hawk-v2-hero-scan"></div>
	</div>
	<div class="hawk-v2-hero-overlay"></div>
	<div class="hawk-v2-hero-container">
		<div class="hawk-v2-hero-content">
			<div class="hawk-v2-hero-badge-wrap">
				<span class="hawk-v2-hero-badge">
					<span class="hawk-v2-hero-badge-dot"></span>
					<?php esc_html_e( 'HAWK SECURITY SERVICE, INC.', 'hawk-security-child' ); ?>
					<span class="hawk-v2-hero-badge-meta"><?php esc_html_e( 'EST. 1987', 'hawk-security-child' ); ?></span>
				</span>
			</div>

			<h1 id="hawk-v2-hero-heading" class="hawk-v2-hero-title">
				<span class="hawk-v2-hero-title-line"><?php esc_html_e( 'Protect yourself and', 'hawk-security-child' ); ?></span>
				<span class="hawk-v2-hero-title-line hawk-v2-hero-accent"><?php esc_html_e( 'your business', 'hawk-security-child' ); ?></span>
			</h1>

			<p class="hawk-v2-hero-desc">
				<?php esc_html_e( 'Providing trusted security since 1987. Through continuous training, we ensure our team is equipped to meet evolving challenges with professionalism and expertise.', 'hawk-security-child' ); ?>
			</p>

			<div class="hawk-v2-hero-actions">
				<a href="<?php echo esc_url( home_url( '/contacts/' ) ); ?>" class="hawk-v2-btn hawk-v2-hero-btn-primary">
					<?php esc_html_e( 'Request a Security Quote', 'hawk-security-child' ); ?>
					<svg class="hawk-v2-btn-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
				</a>
				<a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>" class="hawk-v2-btn-outline hawk-v2-hero-btn-secondary">
					<?php esc_html_e( 'About Us', 'hawk-security-child' ); ?>
				</a>
			</div>

			<div class="hawk-v2-hero-stats">
				<div class="hawk-v2-hero-stat">
					<span class="hawk-v2-hero-stat-value">1987</span>
					<span class="hawk-v2-hero-stat-label"><?php esc_html_e( 'Established', 'hawk-security-child' ); ?></span>
				</div>
				<div class="hawk-v2-hero-stat">
					<span class="hawk-v2-hero-stat-value">24/7</span>
					<span class="hawk-v2-hero-stat-label"><?php esc_html_e( 'Live dispatch', 'hawk-security-child' ); ?></span>
				</div>
				<div class="hawk-v2-hero-stat">
					<span class="hawk-v2-hero-stat-value">PH</span>
					<span class="hawk-v2-hero-stat-label"><?php esc_html_e( 'Nationwide', 'hawk-security-child' ); ?></span>
				</div>
			</div>
		</div>

		<div class="hawk-v2-hero-media-frame">
			<div class="hawk-v2-hero-media" style="background-image: url('<?php echo esc_url( $hero_bg_url ); ?>');" aria-hidden="true"></div>
			<div class="hawk-v2-hero-hud">
				<span class="hawk-v2-hero-hud-chip">
					<span class="hawk-v2-pulse-dot"></span>
					<?php esc_html_e( 'Field operations', 'hawk-security-child' ); ?>
				</span>
				<span class="hawk-v2-hero-hud-meta"><?php esc_html_e( 'Active watch', 'hawk-security-child' ); ?></span>
			</div>
		</div>
	</div>
</section>
