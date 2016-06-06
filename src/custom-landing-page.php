<?php
/**
  * Template Name: Custom landing page
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
		// vars for highlight tiles
		$video = get_field('video');
		$video_header = get_field('video_header');
		$video_text = get_field('video_text');
		$video_button_link = get_field('video_button_link');
		$video_button_text = get_field('video_button_text');

		// vars for locotweet
		$locotweet_markup = get_field('locotweet_markup'); //make it a WYSIWYG editor for custom fields 
	?>

	<header class="video-container">
		<video class="video" width="100%" autoplay="autoplay" loop>
	    	<source src="<?php echo $video['url']; ?>" type="video/mp4">
	    	Your browser does not support HTML5 video.
		</video>
		
		<section class="video-section">
			<h1 class="video-header"><?php echo $video_header; ?></h1>
			<p class="video-text"><?php echo $video_text; ?></p>
			<button class="video-button">
				<a class="video-button-link" href="<?php echo $video_button_link; ?>"><?php echo $video_button_text; ?></a>
			</button>
		</section>
	</header>

	<div id="primary" class="content-area landing-page-container">
		<main id="main" class="site-main" role="main">

		<section class="locotweet-container">
			<div class="locotweet-buttons">
				<button class="locotweet-forward"><</button>
				<button class="locotweet-backward">></button>
			</div>
			<div class="locotweet-feed">
				<?php echo $locotweet_markup; ?>
			</div>
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
