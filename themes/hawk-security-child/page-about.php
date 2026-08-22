<?php
/**
 * The About Us Page Template
 *
 * Template Name: About Us
 *
 * Renders the modern corporate About Us layout for HAWK SECURITY SERVICE, INC.
 *
 * @package Hawk_Security_Child
 */

get_header();
?>

<?php get_template_part( 'template-parts/page-banner' ); ?>

<main id="primary" class="hawk-v2-main hawk-v2-about-main" tabindex="-1">
	<div class="hawk-v2-content">
		<?php get_template_part( 'template-parts/about-content' ); ?>
	</div>

	<?php get_template_part( 'template-parts/cta-section' ); ?>
</main>

<?php
get_footer();
