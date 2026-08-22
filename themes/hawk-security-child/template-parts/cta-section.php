<?php
/**
 * Executive Homepage CTA Section.
 *
 * @package Hawk_Security_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="hawk-v2-cta-section" aria-labelledby="hawk-v2-cta-heading">
	<!-- Atmospheric Radar & Lighting Elements -->
	<div class="hawk-v2-cta-atmosphere" aria-hidden="true">
		<div class="hawk-v2-cta-radar-ring hawk-v2-cta-radar-1"></div>
		<div class="hawk-v2-cta-radar-ring hawk-v2-cta-radar-2"></div>
		<div class="hawk-v2-cta-radar-ring hawk-v2-cta-radar-3"></div>
		<div class="hawk-v2-cta-glow-top"></div>
		<div class="hawk-v2-cta-grid"></div>
	</div>

	<div class="hawk-v2-cta-container">
		<!-- Central Command Glass Card -->
		<div class="hawk-v2-cta-card">
			<!-- Corner HUD brackets -->
			<div class="hawk-v2-cta-corner hawk-v2-cta-corner--tl" aria-hidden="true"></div>
			<div class="hawk-v2-cta-corner hawk-v2-cta-corner--tr" aria-hidden="true"></div>
			<div class="hawk-v2-cta-corner hawk-v2-cta-corner--bl" aria-hidden="true"></div>
			<div class="hawk-v2-cta-corner hawk-v2-cta-corner--br" aria-hidden="true"></div>

			<!-- Badge Header -->
			<div class="hawk-v2-cta-badge-wrap">
				<span class="hawk-v2-cta-badge">
					<span class="hawk-v2-pulse-dot"></span>
					<?php esc_html_e( '24/7 COMMAND & DISPATCH', 'hawk-security-child' ); ?>
					<span class="hawk-v2-cta-badge-meta"><?php esc_html_e( 'EST. 1987', 'hawk-security-child' ); ?></span>
				</span>
			</div>

			<!-- Main Title -->
			<h2 id="hawk-v2-cta-heading" class="hawk-v2-cta-title">
				<?php esc_html_e( 'Ready to Secure', 'hawk-security-child' ); ?>
				<span class="hawk-v2-cta-title-accent"><?php esc_html_e( 'Your Operations?', 'hawk-security-child' ); ?></span>
			</h2>

			<!-- Description -->
			<p class="hawk-v2-cta-desc">
				<?php esc_html_e( 'Partner with one of the Philippines\' most established security agencies. Get a customized, comprehensive security assessment and deployment proposal within 24 hours.', 'hawk-security-child' ); ?>
			</p>

			<!-- Action Buttons Hub -->
			<div class="hawk-v2-cta-actions">
				<a href="<?php echo esc_url( home_url( '/contacts/' ) ); ?>" class="hawk-v2-btn hawk-v2-cta-btn-primary">
					<span><?php esc_html_e( 'Request a Security Proposal', 'hawk-security-child' ); ?></span>
					<svg class="hawk-v2-btn-arrow" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
				</a>
				<a href="tel:09189209379" class="hawk-v2-btn-outline hawk-v2-cta-btn-phone">
					<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
					<span><?php esc_html_e( '24/7 Hotline: 0918 920 9379', 'hawk-security-child' ); ?></span>
				</a>
			</div>

			<!-- Trust Pillars Grid -->
			<div class="hawk-v2-cta-pillars">
				<div class="hawk-v2-cta-pillar">
					<div class="hawk-v2-cta-pillar-icon" aria-hidden="true">
						<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
					</div>
					<div class="hawk-v2-cta-pillar-content">
						<h3 class="hawk-v2-cta-pillar-title"><?php esc_html_e( 'Rapid Deployment', 'hawk-security-child' ); ?></h3>
						<p class="hawk-v2-cta-pillar-text"><?php esc_html_e( 'Immediate mobilization of licensed personnel across Metro Manila & Luzon.', 'hawk-security-child' ); ?></p>
					</div>
				</div>

				<div class="hawk-v2-cta-pillar">
					<div class="hawk-v2-cta-pillar-icon" aria-hidden="true">
						<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
					</div>
					<div class="hawk-v2-cta-pillar-content">
						<h3 class="hawk-v2-cta-pillar-title"><?php esc_html_e( '100% Certified Force', 'hawk-security-child' ); ?></h3>
						<p class="hawk-v2-cta-pillar-text"><?php esc_html_e( 'Strictly compliant with PNP-SOSIA standards & PADPAO membership.', 'hawk-security-child' ); ?></p>
					</div>
				</div>

				<div class="hawk-v2-cta-pillar">
					<div class="hawk-v2-cta-pillar-icon" aria-hidden="true">
						<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
					</div>
					<div class="hawk-v2-cta-pillar-content">
						<h3 class="hawk-v2-cta-pillar-title"><?php esc_html_e( 'Active Supervision', 'hawk-security-child' ); ?></h3>
						<p class="hawk-v2-cta-pillar-text"><?php esc_html_e( 'Continuous 24/7 roving inspection and real-time operations command.', 'hawk-security-child' ); ?></p>
					</div>
				</div>
			</div>

			<!-- Direct Contact Footer Strip -->
			<div class="hawk-v2-cta-footer-strip">
				<span class="hawk-v2-cta-landlines">
					<strong><?php esc_html_e( 'Direct Landlines:', 'hawk-security-child' ); ?></strong>
					<a href="tel:0287357516">(02) 8735-7516</a> / <a href="tel:0287357341">(02) 8735-7341</a>
				</span>
				<span class="hawk-v2-cta-sep">•</span>
				<span class="hawk-v2-cta-response-time">
					<span class="hawk-v2-cta-check">✓</span> <?php esc_html_e( 'Guaranteed 24-Hour Proposal Turnaround', 'hawk-security-child' ); ?>
				</span>
			</div>
		</div>
	</div>
</section>
