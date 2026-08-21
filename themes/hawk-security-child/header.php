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

<div id="hawk-v2-page" class="hawk-v2-site-wrapper">

	<!-- Native HAWK v2 Header -->
	<header id="hawk-v2-masthead" class="hawk-v2-header">
		<div class="hawk-v2-header-container">
			
			<!-- Left: Primary Navigation -->
			<nav class="hawk-v2-desktop-nav" aria-label="<?php esc_attr_e( 'Primary Navigation', 'hawk-security-child' ); ?>">
				<?php hawk_render_primary_nav( 'hawk-v2-nav-list', 'hawk-v2-primary-menu' ); ?>
			</nav>

			<!-- Center: Brand Logo -->
			<div class="hawk-v2-logo-wrap">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hawk-v2-logo-link" rel="home">
					<img src="<?php echo esc_url( hawk_get_logo_url() ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="hawk-v2-logo-img" />
				</a>
			</div>

			<!-- Right: Quote Action & Mobile Toggle -->
			<div class="hawk-v2-header-actions">
				<a href="<?php echo esc_url( home_url( '/contacts/' ) ); ?>" class="hawk-v2-btn hawk-v2-header-quote-btn">
					<?php esc_html_e( 'Request a Security Quote', 'hawk-security-child' ); ?>
				</a>

				<button type="button" class="hawk-v2-mobile-toggle js-hawk-drawer-open" aria-label="<?php esc_attr_e( 'Open Navigation Menu', 'hawk-security-child' ); ?>" aria-expanded="false" aria-controls="hawk-v2-mobile-drawer">
					<span class="hawk-v2-hamburger-box">
						<span class="hawk-v2-hamburger-inner"></span>
					</span>
				</button>
			</div>

		</div>
	</header>

	<!-- Mobile Drawer -->
	<div id="hawk-v2-mobile-drawer" class="hawk-v2-drawer" aria-hidden="true">
		<div class="hawk-v2-drawer-backdrop js-hawk-drawer-close"></div>
		<div class="hawk-v2-drawer-panel">
			<div class="hawk-v2-drawer-head">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hawk-v2-drawer-logo" rel="home">
					<img src="<?php echo esc_url( hawk_get_logo_url() ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
				</a>
				<button type="button" class="hawk-v2-drawer-close js-hawk-drawer-close" aria-label="<?php esc_attr_e( 'Close Navigation Menu', 'hawk-security-child' ); ?>">
					<span>&times;</span>
				</button>
			</div>

			<nav class="hawk-v2-drawer-nav" aria-label="<?php esc_attr_e( 'Mobile Navigation', 'hawk-security-child' ); ?>">
				<?php hawk_render_primary_nav( 'hawk-v2-drawer-nav-list', 'hawk-v2-drawer-menu' ); ?>
			</nav>

			<div class="hawk-v2-drawer-footer">
				<a href="<?php echo esc_url( home_url( '/contacts/' ) ); ?>" class="hawk-v2-btn hawk-v2-btn-block">
					<?php esc_html_e( 'Request a Security Quote', 'hawk-security-child' ); ?>
				</a>
			</div>
		</div>
	</div>

	<div id="hawk-v2-content-area" class="hawk-v2-content">
