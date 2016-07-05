<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ted_x
 */

$category_red_teaser_headline = get_field('category_red_teaser_headline');
$category_red_teaser_text = get_field('category_red_teaser_text');

$category_news_header_headline = get_field('category_news_header_headline');
$category_news_header_text = get_field('category_news_header_text');

get_header(); ?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="red-page-header">
				<div class="red-page-header__line"></div>
				<h2 class="red-page-header__headline test"><?php the_field('category_red_teaser_headline', 'category_'.$cat->cat_ID); ?></h2>
				<p class="red-page-header__text"><?php the_field('category_red_teaser_text', 'category_'.$cat->cat_ID); ?></p>
			</header>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
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
