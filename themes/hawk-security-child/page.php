<?php
/**
 * Default page template override.
 *
 * Keeps default-template pages inside the same native child-theme chrome as
 * the WPBakery no-padding template.
 *
 * @package Hawk_Security_Child
 */

get_header();
?>

<?php get_template_part( 'template-parts/page-banner' ); ?>

<main id="primary" class="hawk-v2-main hawk-v2-inner-main" tabindex="-1" aria-labelledby="hawk-v2-page-title">
	<div class="hawk-v2-inner-content">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<div class="hawk-v2-entry-content">
					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</main>

<?php
get_footer();
