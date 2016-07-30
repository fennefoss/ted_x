<?php
/**
 * Template part for displaying the hero unit on the Press page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ted_x
 */

?>

<section class="hero-unit full-width press">

<?php if ( get_field( 'press_hero_infobox' ) ) : ?>
	<div class="center">

		<div class="infobox">
			<?php the_field( 'press_hero_infobox' ); ?>
		</div><!-- .infobox -->

	</div><!-- .center -->
<?php endif; ?>

</section><!-- .hero-unit -->
