<?php
/**
 * The Home Page Template
 *
 * Template Name: Home
 *
 * Renders the native HAWK hero banner followed by the remaining WPBakery interior sections.
 * The Revolution Slider shortcode and markup are filtered out from the_content().
 *
 * @package Hawk_Security_Child
 */

get_header();
?>

<?php get_template_part( 'template-parts/hero' ); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<main id="primary" class="hawk-v2-main hawk-v2-home-main" tabindex="-1" aria-labelledby="hawk-v2-hero-heading">
		<div class="hawk-v2-home-content">
			<?php the_content(); ?>
		</div>
	</main>

<?php endwhile; endif; ?>

<?php
get_footer();
