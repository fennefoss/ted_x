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

		// vars for intro area
		$intro_header = get_field('intro_header');
		$intro_text = get_field('intro_text');

		// vars for locotweet
		$locotweet_markup = get_field('locotweet_markup'); //make it a WYSIWYG editor for custom fields

		//vars for
		$show_all_news_link = get_field('show_all_news_link');
		$show_all_news_link_text = get_field('show_all_news_link_text');
		$show_all_news_header = get_field('show_all_news_header');
	?>

	<header class="video-container">
		<?php if( get_field( 'video' )['url'] ) : ?>
		<video class="video" autoplay="autoplay" loop>
			<source src="<?php echo $video['url']; ?>" type="video/mp4">
		</video>
		<?php endif; ?>
		<div class="content">
			<section class="video-section">
				<h1 class="video-header"><?php echo $video_header; ?></h1>
				<p class="video-text"><?php echo $video_text; ?></p>
				<button class="video-button">
					<a class="video-button-link" href="<?php echo $video_button_link; ?>"><?php echo $video_button_text; ?></a>
				</button>
			</section>
		</div>
	</header>

	<div id="primary" class="content-area landing-page-container">
		<main id="main" class="site-main" role="main">

		<section class="intro">
			<h2 class="intro-header"><?php echo $intro_header; ?></h2>
			<p class="intro-text"><?php echo $intro_text; ?></p>
		</section>

		<section class="locotweet-container">
			<div class="locotweet-line"></div>
			<h2 class="locotweet-header">TEDx Social Media</h2>
			<div class="locotweet-buttons">
				<button class="locotweet-forward"></button>
				<button class="locotweet-backward"></button>
			</div>
			<div class="locotweet-feed">
				<?php echo $locotweet_markup; ?>
				<button class="locotweet-follow">Follow @TEDxAarhus</button>
			</div>
			<aside class="locotweet-x"></aside>
		</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
