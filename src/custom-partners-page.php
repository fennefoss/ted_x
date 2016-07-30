<?php
/**
 * Template Name: Custom Partners Page
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ted_x
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="red-page-header">
				<h2><?php the_field('partners_intro_headline'); ?></h2>
				<p><?php the_field('partners_intro_p'); ?></p>
			</section>

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>

			<section class="partners_container">
				<h2><?php the_field('partners_TEDxAarhusLive2016_headline'); ?></h2>
				<p><?php the_field('partners_TEDxAarhusLive2016_p'); ?></p>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
