<?php
/**
  * Template Name: Custom speaker page
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
		// vars red page header
		$speaker_teaser_headline = get_field('speaker_teaser_headline');
		$speaker_teaser_text = get_field('speaker_teaser_text');

		$previous_speakers_headline = get_field('previous_speakers_headline');
		$previous_speakers_text = get_field('previous_speakers_text');

		$previous_speaker_thumbnail = get_field('previous_speaker_thumbnail');

	?>

	<div id="primary" class="content-area speaker-page-container">

		<header class="red-page-header">
			<div class="red-page-header__line"></div>
			<h2 class="red-page-header__headline"><?php echo $speaker_teaser_headline; ?></h2>
			<p class="red-page-header__text"><?php echo $speaker_teaser_text; ?></p>
		</header>

		<div class="previous-speakers-section">
			<div class="previous-speakers-line"></div>
			<h2 class="previous-speakers-headline"><?php echo $previous_speakers_headline; ?></h2>
			<p class="previous-speakers-text"><?php echo $previous_speakers_text; ?></p>
		</div>

		<section>
			<!--Super awesome snippet for showing the
			posts from a certain category ID. Replace the
			cat=ID with the number of the category wanted -->
			<?php query_posts( 'cat=5' ); ?>
		</section>

		<main id="main" class="site-main" role="main">


		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<img class="test" src="<?php echo $previous_speaker_thumbnail['url']; ?>" />
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
