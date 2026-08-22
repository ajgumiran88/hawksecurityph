<?php
/**
 * The Page No Padding Template Override
 *
 * Template Name: Page No Padding
 *
 * Used by About Us, Our Services, Careers, Contacts, Core Competencies, etc.
 * Renders the native high-impact page banner followed by WPBakery page content
 * starting cleanly below the banner.
 *
 * @package Hawk_Security_Child
 */

get_header();
?>

<?php get_template_part( 'template-parts/page-banner' ); ?>

<main id="primary" class="hawk-v2-main hawk-v2-inner-main" tabindex="-1" aria-labelledby="hawk-v2-page-title">
	<div class="hawk-v2-inner-content">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
			<div class="hawk-v2-entry-content">
				<?php the_content(); ?>
			</div>

		<?php endwhile; endif; ?>
	</div>
</main>

<?php
get_footer();
