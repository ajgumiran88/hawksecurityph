<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="https://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}
?>

<a class="hawk-v2-skip-link" href="#primary"><?php esc_html_e( 'Skip to content', 'hawk-security-child' ); ?></a>

<div id="hawk-v2-page" class="hawk-v2-site-wrapper">

	<!-- Native HAWK v2 Header -->
	<header id="hawk-v2-masthead" class="hawk-v2-header">
		<div class="hawk-v2-header-shell">
			<div class="hawk-v2-header-container">
			
			<!-- Brand Logo & Wordmark Lockup -->
			<div class="hawk-v2-logo-wrap">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hawk-v2-logo-link" rel="home">
					<img src="<?php echo esc_url( hawk_get_logo_url() ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="hawk-v2-logo-img" />
					<div class="hawk-v2-brand-meta">
						<span class="hawk-v2-brand-title">HAWK <span class="hawk-v2-brand-accent">SECURITY</span></span>
						<span class="hawk-v2-brand-sub"><?php esc_html_e( 'Service, Inc. • Est. 1987', 'hawk-security-child' ); ?></span>
					</div>
				</a>
			</div>

			<!-- Center: Primary Navigation -->
			<nav class="hawk-v2-desktop-nav" aria-label="<?php esc_attr_e( 'Primary Navigation', 'hawk-security-child' ); ?>">
				<?php hawk_render_primary_nav( 'hawk-v2-nav-list', 'hawk-v2-primary-menu' ); ?>
			</nav>

			<!-- Dedicated desktop dispatch contact -->
			<a href="tel:09189209379" class="hawk-v2-header-hotline" title="<?php esc_attr_e( '24/7 Security Hotline: 0918 920 9379', 'hawk-security-child' ); ?>">
				<span class="hawk-v2-hotline-icon">
					<svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
				</span>
				<span class="hawk-v2-hotline-text">
					<span class="hawk-v2-hotline-status"><span class="hawk-v2-pulse-dot"></span><?php esc_html_e( '24/7 Dispatch', 'hawk-security-child' ); ?></span>
					<span class="hawk-v2-hotline-num">0918 920 9379</span>
				</span>
			</a>

			<!-- Right: Quote Action & Mobile Toggle -->
			<div class="hawk-v2-header-actions">
				<a href="<?php echo esc_url( home_url( '/contacts/' ) ); ?>" class="hawk-v2-btn hawk-v2-header-quote-btn">
					<span class="hawk-v2-quote-label-long"><?php esc_html_e( 'Request a Quote', 'hawk-security-child' ); ?></span>
					<span class="hawk-v2-quote-label-short"><?php esc_html_e( 'Quote', 'hawk-security-child' ); ?></span>
					<svg class="hawk-v2-btn-arrow" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
				</a>

				<button type="button" class="hawk-v2-mobile-toggle js-hawk-drawer-open" aria-label="<?php esc_attr_e( 'Open Navigation Menu', 'hawk-security-child' ); ?>" aria-expanded="false" aria-controls="hawk-v2-mobile-drawer">
					<span class="hawk-v2-hamburger-box">
						<span class="hawk-v2-hamburger-inner"></span>
					</span>
				</button>
			</div>

			</div>
			<div class="hawk-v2-header-accent-line" aria-hidden="true"></div>
		</div>
	</header>

	<!-- Mobile Drawer -->
	<div id="hawk-v2-mobile-drawer" class="hawk-v2-drawer" aria-hidden="true">
		<div class="hawk-v2-drawer-backdrop js-hawk-drawer-close"></div>
		<div class="hawk-v2-drawer-panel" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Mobile navigation', 'hawk-security-child' ); ?>" tabindex="-1">
			<div class="hawk-v2-drawer-head">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hawk-v2-drawer-logo" rel="home">
					<img src="<?php echo esc_url( hawk_get_logo_url() ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
					<div class="hawk-v2-drawer-brand-meta">
						<span class="hawk-v2-brand-title">HAWK <span class="hawk-v2-brand-accent">SECURITY</span></span>
						<span class="hawk-v2-brand-sub"><?php esc_html_e( 'Service, Inc. • Est. 1987', 'hawk-security-child' ); ?></span>
					</div>
				</a>
				<button type="button" class="hawk-v2-drawer-close js-hawk-drawer-close" aria-label="<?php esc_attr_e( 'Close Navigation Menu', 'hawk-security-child' ); ?>">
					<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
				</button>
			</div>

			<nav class="hawk-v2-drawer-nav" aria-label="<?php esc_attr_e( 'Mobile Navigation', 'hawk-security-child' ); ?>">
				<?php hawk_render_primary_nav( 'hawk-v2-drawer-nav-list', 'hawk-v2-drawer-menu' ); ?>
			</nav>

			<div class="hawk-v2-drawer-hotline-card">
				<div class="hawk-v2-drawer-hotline-head">
					<span class="hawk-v2-pulse-dot"></span>
					<span class="hawk-v2-drawer-hotline-badge"><?php esc_html_e( '24/7 Security Operations', 'hawk-security-child' ); ?></span>
				</div>
				<a href="tel:09189209379" class="hawk-v2-drawer-phone">0918 920 9379</a>
				<div class="hawk-v2-drawer-landlines">
					<span>8735 7516</span> &bull; <span>8735 7341</span>
				</div>
			</div>

			<div class="hawk-v2-drawer-footer">
				<a href="<?php echo esc_url( home_url( '/contacts/' ) ); ?>" class="hawk-v2-btn hawk-v2-btn-block">
					<?php esc_html_e( 'Request a Security Quote', 'hawk-security-child' ); ?>
					<svg class="hawk-v2-btn-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
				</a>
			</div>
		</div>
	</div>

	<div id="hawk-v2-content-area" class="hawk-v2-content">
