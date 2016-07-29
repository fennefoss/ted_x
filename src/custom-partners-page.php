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

	<?php
		$partners_intro_headline = get_field('partners_intro_headline');
		$partners_intro_p = get_field('partners_intro_p');
		$partners_company_headline = get_field('partners_company_headline');
		$partners_company_p = get_field('partners_company_p');
		$partners_benefits_headline = get_field('partners_benefits_headline');
		$partners_benefits_p = get_field('partners_benefits_p');
		$partners_shake_headline = get_field('partners_shake_headline');
		$partners_shake_p = get_field('partners_shake_p');
		$partners_TEDxAarhusLive2016_headline = get_field('partners_TEDxAarhusLive2016_headline');
		$partners_TEDxAarhusLive2016_p = get_field('partners_TEDxAarhusLive2016_p');

		
	?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<section class="red-page-header">
			<div class="red-page-header__line"></div>
			<h2 class="red-page-header__headline"><?php echo $partners_intro_headline; ?></h2>
			<p class="red-page-header__text"><?php echo $partners_intro_p; ?></p>
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
		<section class="partners_container">
			<div class="locotweet-line one"></div>
			<h2 class="partners_company_headline"><?php echo $partners_company_headline; ?></h2>
			<p class="partners_company_p"><?php echo $partners_company_p; ?></p>
			
			<div class="locotweet-line two"></div>
			<h2 class="partners_benefits_headline"><?php echo $partners_benefits_headline; ?></h2>
			<p class="partners_benefits_p"><?php echo $partners_benefits_p; ?></p>
			
			<div class="locotweet-line three"></div>
			<h2 class="partners_shake_headline"><?php echo $partners_shake_headline; ?></h2>
			<p class="partners_shake_p"><?php echo $partners_shake_p; ?></p>
			
			<div class="locotweet-line four"></div>
			<h2 class="partners_TEDxAarhusLive2016_headline"><?php echo $partners_TEDxAarhusLive2016_headline; ?></h2>
			<p class="partners_TEDxAarhusLive2016_p"><?php echo $partners_TEDxAarhusLive2016_p; ?></p>
		</section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
