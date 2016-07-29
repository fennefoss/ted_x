<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ted_x
 */

$post_image = get_field('post_image');
$post_header = get_field('post_header');
$post_text = get_field('post_text');
$post_link = get_field('post_link');
$speaker_title = get_field('speaker_title');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title teaser"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>

		<h3 class="speaker-title">
			<?php echo $speaker_title; ?>
			<?php the_field('speaker_title', get_option('page_for_posts')); ?>
		</h3>

		<div class="post-teaser">
			<a class="post-teaser-link" href="<?php echo $post_link; ?>">
				<img class="post-teaser-img" src="<?php echo $post_image['url']; ?>">
			</a>
			<div class="post-teaser-text">
				<a href="<?php echo $post_link; ?>">
					<h2><?php echo $post_header; ?></h2>
				</a>
				<hr/>
				<p><?php echo $post_text; ?></p>
			</div>
		</div>

		<div class="entry-meta">
			<?php ted_x_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'ted_x' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ted_x' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php ted_x_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
