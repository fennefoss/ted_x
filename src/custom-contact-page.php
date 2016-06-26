<?php
/**
 * Template Name: Custom Contact Page
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

	<?php
		$get_in_touch_header = get_field('get_in_touch_header');
		$get_in_touch_intro_p = get_field('get_in_touch_intro_p');
		$get_in_touch_body_text = get_field('get_in_touch_body_text');
	?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<section class="contact_intro">
			<h2 class="get-in-touch-h2"><?php echo $get_in_touch_header; ?></h2>
			<p class="get_in_touch_intro_p"><?php echo $get_in_touch_intro_p; ?></p>
		</section>
		<section class="contact_container">
			<p class="get_in_touch_body_text"><?php echo $get_in_touch_body_text; ?></p>
		</section>




		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
