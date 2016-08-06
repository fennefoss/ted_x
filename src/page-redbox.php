<?php
/**
 * Template Name: Red Box Header
 *
 * This template includes a transparent hero unit
 * with a red infobox at the top of the page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ted_x
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				// If Custom Fields plugin is installed and content has been defined, include a red infobox.
				if ( function_exists( 'the_field' ) && get_field( 'red_infobox_content' ) ):
					get_template_part( 'template-parts/hero', 'redbox' );
				endif;

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
