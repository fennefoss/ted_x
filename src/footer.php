<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ted_x
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<section id="main-footer">
			<div class="container">
				<div class="newsletter">

				</div><!-- .newsletter -->
				<div class="navigation">

				</div><!-- .navigation -->
				<div class="social-media">

				</div><!-- .social-media -->
			</div><!-- .container -->
		</section><!-- #main-footer -->
		<section id="sub-footer">
			<div class="container">
				<p class="copyright-notice">
					<?php printf( esc_html( 'This independent TEDx event is operated under license from %s.', 'ted_x' ), '<a href="https://www.ted.com/">TED</a>' ); ?><br>
					<?php printf( esc_html( 'Copyright &copy; %s TEDxAarhus', 'ted_x' ), date( 'Y' ) ); ?>
				</p>
			</div><!-- .container -->
		</section><!-- #sub-footer -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
