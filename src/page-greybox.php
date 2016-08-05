<?php
/**
 * Template Name: Grey Box Header
 *
 * This template includes a large hero unit with a cover sized
 * background image and a grey infobox at the top of the page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ted_x
 */

get_header();

// If Custom Fields plugin is installed and content has been defined, include a red infobox.
if ( function_exists( 'the_field' ) && get_field( 'grey_infobox_content' ) ):

	get_template_part( 'template-parts/hero', 'greybox' );

endif;
?>

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
