	</div><!-- /#hawk-v2-content-area -->

	<!-- Native HAWK v2 Footer -->
	<footer id="hawk-v2-colophon" class="hawk-v2-footer">
		<div class="hawk-v2-footer-container">
			<div class="hawk-v2-footer-grid">
				
				<!-- Column 1: Brand -->
				<div class="hawk-v2-footer-col hawk-v2-footer-brand">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hawk-v2-footer-logo-link" rel="home">
						<img src="<?php echo esc_url( hawk_get_logo_url() ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="hawk-v2-footer-logo" />
					</a>
					<p class="hawk-v2-footer-tagline">
						<?php esc_html_e( 'Protecting What Matters, Securing Your Future with Unwavering Commitment.', 'hawk-security-child' ); ?>
					</p>

					<!-- HUD Visitor Counter -->
					<div class="hawk-v2-footer-counter" aria-label="<?php esc_attr_e( 'Secure Visits Counter', 'hawk-security-child' ); ?>">
						<div class="hawk-v2-counter-header">
							<span class="hawk-v2-pulse-dot" aria-hidden="true"></span>
							<span class="hawk-v2-counter-title"><?php esc_html_e( 'TOTAL VISITORS', 'hawk-security-child' ); ?></span>
						</div>
						<div class="hawk-v2-counter-display">
							<?php echo hawk_render_visitor_counter_digits( hawk_get_visitor_count() ); ?>
						</div>
						<div class="hawk-v2-counter-meta">
							<span><?php esc_html_e( '24/7 Monitored Portal', 'hawk-security-child' ); ?></span>
						</div>
					</div>
				</div>

				<!-- Column 2: Helpful Links -->
				<div class="hawk-v2-footer-col hawk-v2-footer-links">
					<h3 class="hawk-v2-footer-heading"><?php esc_html_e( 'Helpful Links', 'hawk-security-child' ); ?></h3>
					<div class="hawk-v2-heading-bar"></div>
					<ul class="hawk-v2-footer-menu">
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'hawk-security-child' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>"><?php esc_html_e( 'About Us', 'hawk-security-child' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/our-services/' ) ); ?>"><?php esc_html_e( 'Our Services', 'hawk-security-child' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/core-competencies-2/' ) ); ?>"><?php esc_html_e( 'Core Competencies', 'hawk-security-child' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/careers/' ) ); ?>"><?php esc_html_e( 'Careers', 'hawk-security-child' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/contacts/' ) ); ?>"><?php esc_html_e( 'Contacts', 'hawk-security-child' ); ?></a></li>
					</ul>
				</div>

				<!-- Column 3: Contact Info -->
				<div class="hawk-v2-footer-col hawk-v2-footer-contact">
					<h3 class="hawk-v2-footer-heading"><?php esc_html_e( 'Contact Us', 'hawk-security-child' ); ?></h3>
					<div class="hawk-v2-heading-bar"></div>
					
					<div class="hawk-v2-contact-entry">
						<span class="hawk-v2-contact-label"><?php esc_html_e( 'Mobile Number:', 'hawk-security-child' ); ?></span>
						<a href="tel:09189209379" class="hawk-v2-contact-value">09189209379</a>
					</div>

					<div class="hawk-v2-contact-entry">
						<span class="hawk-v2-contact-label"><?php esc_html_e( 'Telephone Number:', 'hawk-security-child' ); ?></span>
						<span class="hawk-v2-contact-value">87357516 / 87357341</span>
					</div>

					<div class="hawk-v2-contact-entry">
						<span class="hawk-v2-contact-label"><?php esc_html_e( 'Email:', 'hawk-security-child' ); ?></span>
						<a href="mailto:hssi1987@yahoo.com" class="hawk-v2-contact-value">hssi1987@yahoo.com</a>
						<a href="mailto:contact@hawksecurityph.com" class="hawk-v2-contact-value">contact@hawksecurityph.com</a>
					</div>

					<div class="hawk-v2-footer-hiring">
						<a href="<?php echo esc_url( home_url( '/careers/' ) ); ?>" class="hawk-v2-btn-outline">
							<?php esc_html_e( "We're Hiring – Apply Now", 'hawk-security-child' ); ?> <i class="fas fa-arrow-right"></i>
						</a>
					</div>
				</div>

			</div>

			<!-- Bottom Copyright Bar & Stats -->
			<div class="hawk-v2-footer-bottom">
				<div class="hawk-v2-footer-bottom-wrap">
					<p class="hawk-v2-copyright">
						&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php esc_html_e( 'HAWK SECURITY SERVICE, INC. All Rights Reserved.', 'hawk-security-child' ); ?>
					</p>
					<div class="hawk-v2-footer-stats-pill">
						<span class="hawk-v2-pulse-dot" aria-hidden="true"></span>
						<span class="hawk-v2-stat-pill-label"><?php esc_html_e( 'Total Visitors:', 'hawk-security-child' ); ?></span>
						<span class="hawk-v2-stat-pill-num"><?php echo esc_html( number_format_i18n( hawk_get_visitor_count() ) ); ?></span>
					</div>
				</div>
			</div>

		</div>
	</footer>

</div><!-- /#hawk-v2-page -->

<?php wp_footer(); ?>
</body>
</html>
