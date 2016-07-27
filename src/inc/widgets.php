<?php
/**
 * Social Media Icon Widget
 *
 * @package ted_x
 * @subpackage Widgets
 *
 * @see WP_Widget
 */
class SoMe_Widget extends WP_Widget {

	/**
	 * Register and set up a new widget by calling the WP_Widget constructor.
	 *
	 * @see https://codex.wordpress.org/Widgets_API
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'social-media-icons',
			'description' => __( 'Insert icons that link to social media profiles.', 'ted_x' ),
		);
		parent::__construct( 'social-media-icons', __( 'Social Media Icons Widget', 'ted_x' ), $widget_ops );
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		// Determine if a title has been set or default to 'Social Media Icons' and apply the `widget_title` filter
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Social Media Icons', 'ted_x' ) : $instance['title'], $instance, $this->id_base );
		// Check for social media URLs set in the database
		$url_facebook  = isset( $instance['url_facebook'] ) ? $instance['url_facebook'] : false;
		$url_twitter   = isset( $instance['url_twitter'] ) ? $instance['url_twitter'] : false;
		$url_youtube   = isset( $instance['url_youtube'] ) ? $instance['url_youtube'] : false;
		$url_snapchat  = isset( $instance['url_snapchat'] ) ? $instance['url_snapchat'] : false;

		$icons = array(
			'facebook'  => $instance['url_facebook'],
			'twitter'   => $instance['url_twitter'],
			'youtube'   => $instance['url_youtube'],
			'snapchat'  => $instance['url_snapchat'],
		);

		// Iterate SoMe profiles and add markup for an icon if URL has been set
		foreach ($icons as $service => $url) {
			if ( $url ) {
				$markup .= sprintf( '<a class="social-media-icon %1$s" href="%2$s" target="_blank"></a>', $service, $url );
			}
		}

		// Output all the markup to STDOUT as per WordPress protocol
		echo $args['before_widget'];
		echo $args['before_title'] . $title . $args['after_title'];
		echo '<aside class="social-media-icons">' . $markup . '</aside>';
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array(
			'title'         => '',
			'url_facebook'  => '',
			'url_twitter'   => '',
			'url_youtube'   => '',
			'url_snapchat'  => '',
		) );
		// Fetch and sanitize the title field
		$title = sanitize_text_field( $instance['title'] );
		// Fetch and sanitize social media profile URLs
		// using `wp_strip_all_tags()` to avoid breaking URLs
		$url_facebook  = wp_strip_all_tags( $instance['url_facebook'] );
		$url_twitter   = wp_strip_all_tags( $instance['url_twitter'] );
		$url_youtube   = wp_strip_all_tags( $instance['url_youtube'] );
		$url_snapchat  = wp_strip_all_tags( $instance['url_snapchat'] );
		// Dump the markup for the setup form straight to STDOUT
		?>
		<p>
			<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_name( 'url_facebook' ); ?>"><?php _e( 'Facebook URL:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'url_facebook' ); ?>" name="<?php echo $this->get_field_name( 'url_facebook' ); ?>" type="url" value="<?php echo esc_attr( $url_facebook ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_name( 'url_twitter' ); ?>"><?php _e( 'Twitter URL:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'url_twitter' ); ?>" name="<?php echo $this->get_field_name( 'url_twitter' ); ?>" type="url" value="<?php echo esc_attr( $url_twitter ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_name( 'url_youtube' ); ?>"><?php _e( 'YouTube Channel URL:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'url_youtube' ); ?>" name="<?php echo $this->get_field_name( 'url_youtube' ); ?>" type="url" value="<?php echo esc_attr( $url_youtube ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_name( 'url_snapchat' ); ?>"><?php _e( 'Snapchat URL:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'url_snapchat' ); ?>" name="<?php echo $this->get_field_name( 'url_snapchat' ); ?>" type="url" value="<?php echo esc_attr( $url_snapchat ); ?>">
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		// Set defaults for $instance and $new_instance to avoid `undefined index` notices
		$instance = [
			'title'         => '',
			'url_facebook'  => '',
			'url_twitter'   => '',
			'url_youtube'   => '',
			'url_snapchat'  => '',
		];
		$new_instance = wp_parse_args( $new_instance, $instance );
		// Populate `$instance` with filtered values from widget options page
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		// if we use sanitize_text_field() here we might break the URLs
		$instance['url_facebook']  = wp_strip_all_tags( $new_instance['url_facebook'] );
		$instance['url_twitter']   = wp_strip_all_tags( $new_instance['url_twitter'] );
		$instance['url_youtube']   = wp_strip_all_tags( $new_instance['url_youtube'] );
		$instance['url_snapchat']  = wp_strip_all_tags( $new_instance['url_snapchat'] );

		// Return the resulting instance with filtered values
		return $instance;
	}
}
