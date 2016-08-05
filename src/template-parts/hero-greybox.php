<?php
/**
 * Template part for displaying the grey hero unit.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ted_x
 */

?>

<section class="hero-unit grey full-width " style="background-image:url(<?php the_field( 'hero_unit_background' ); ?>)">

	<div class="center">
		<div class="infobox">
			<?php the_field( 'grey_infobox_content' ); ?>
		</div><!-- .infobox -->
	</div><!-- .center -->

</section><!-- .hero-unit -->
