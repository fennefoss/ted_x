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
			<div class="center">
				<div class="column-left">
					<div class="newsletter">
						<h3 class="signup-heading">Newsletter Signup</h3>
						<?php // TODO: Add hardcoded newsletter signup form? ?>
					</div><!-- .newsletter -->
					<div class="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu' ) ); ?>
					</div><!-- .navigation -->
				</div><!-- .column-left -->
				<div class="column-right">
					<div class="social-media">

					</div><!-- .social-media -->
				</div><!-- .column-right -->
			</div><!-- .center -->
		</section><!-- #main-footer -->
		<section id="sub-footer">
			<div class="center">
				<p class="copyright-notice">
					<?php printf( esc_html( 'This independent TEDx event is operated under license from %s.', 'ted_x' ), '<a href="https://www.ted.com/">TED</a>' ); ?><br>
					<?php printf( esc_html( 'Copyright &copy; %s TEDxAarhus', 'ted_x' ), date( 'Y' ) ); ?>
				</p>
			</div><!-- .center -->
		</section><!-- #sub-footer -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
