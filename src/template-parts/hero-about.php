<?php
/**
 * Template part for displaying the hero unit on the About Us page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ted_x
 */

?>

<section class="hero-unit full-width about-us">

	<div class="center">

	<?php if ( get_field( 'about_hero_quote' ) ) : ?>
		<div class="quote">
			<p class="right"><?php the_field( 'about_hero_quote' ); ?></p>
		</div><!-- .quote -->
	<?php endif; ?>

	<?php if ( get_field( 'about_hero_infobox' ) ) : ?>
		<div class="infobox">
			<?php the_field( 'about_hero_infobox' ); ?>
		</div><!-- .infobox -->
	<?php endif; ?>

	</div><!-- .center -->

</section><!-- .hero-unit -->
