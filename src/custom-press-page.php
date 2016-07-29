<?php
/**
 * Template Name: Custom Press Page
 *
 * This is the template for the 'Press' page and includes
 * some advanced custom fields used as content containers
 * on the TEDx Aarhus webiste.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ted_x
 */

get_header(); ?>

	<?php get_template_part( 'template-parts/hero', 'press' ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
