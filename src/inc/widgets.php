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
		// Create a two-dimensional array of social media services
		$services = array(
			'facebook'  => array(
				'url'  => $instance['url_facebook'],
				'icon' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="80.3301pt" height="80.3301pt" viewBox="0 0 80.3301 80.3301" version="1.1"><defs><clipPath id="clip1"><path d="M 0 0 L 80.328125 0 L 80.328125 80.332031 L 0 80.332031 Z M 0 0 "/></clipPath></defs><g id="surface1"><path style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,100%,100%);fill-opacity:1;" d="M 47.542969 34.570312 L 42.519531 34.570312 L 42.519531 31.273438 C 42.519531 30.039062 43.335938 29.75 43.914062 29.75 L 47.460938 29.75 L 47.460938 24.308594 L 42.578125 24.289062 C 37.15625 24.289062 35.921875 28.347656 35.921875 30.941406 L 35.921875 34.570312 L 32.785156 34.570312 L 32.785156 40.175781 L 35.921875 40.175781 L 35.921875 56.042969 L 42.519531 56.042969 L 42.519531 40.175781 L 46.96875 40.175781 Z M 47.542969 34.570312 "/><g clip-path="url(#clip1)" clip-rule="nonzero"><path style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,100%,100%);fill-opacity:1;" d="M 40.164062 3 C 19.671875 3 3 19.671875 3 40.164062 C 3 60.65625 19.671875 77.328125 40.164062 77.328125 C 60.65625 77.328125 77.328125 60.65625 77.328125 40.164062 C 77.328125 19.671875 60.65625 3 40.164062 3 M 40.164062 80.328125 C 18.019531 80.328125 0 62.3125 0 40.164062 C 0 18.019531 18.019531 0 40.164062 0 C 62.3125 0 80.328125 18.019531 80.328125 40.164062 C 80.328125 62.3125 62.3125 80.328125 40.164062 80.328125 "/></g></g></svg>'
			),
			'twitter' => array(
				'url'  => $instance['url_twitter'],
				'icon' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="80.3301pt" height="80.3301pt" viewBox="0 0 80.3301 80.3301" version="1.1"><defs><clipPath id="clip1"><path d="M 0 0 L 80.328125 0 L 80.328125 80.332031 L 0 80.332031 Z M 0 0 "/></clipPath></defs><g id="surface1"><path style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,100%,100%);fill-opacity:1;" d="M 61.433594 28.285156 C 59.957031 29 58.386719 29.460938 56.722656 29.671875 C 58.417969 28.582031 59.722656 26.863281 60.335938 24.800781 C 58.75 25.808594 56.996094 26.527344 55.125 26.945312 C 53.636719 25.226562 51.5 24.152344 49.148438 24.152344 C 44.625 24.152344 40.960938 28.097656 40.960938 32.972656 C 40.960938 33.65625 41.03125 34.332031 41.167969 34.972656 C 34.371094 34.621094 28.328125 31.097656 24.285156 25.769531 C 23.582031 27.070312 23.179688 28.582031 23.179688 30.203125 C 23.179688 33.253906 24.625 35.972656 26.828125 37.53125 C 25.480469 37.476562 24.21875 37.101562 23.117188 36.433594 L 23.117188 36.554688 C 23.117188 40.820312 25.9375 44.378906 29.683594 45.199219 C 29 45.402344 28.273438 45.492188 27.519531 45.492188 C 26.996094 45.492188 26.496094 45.457031 25.988281 45.335938 C 27.027344 48.851562 30.054688 51.40625 33.636719 51.457031 C 30.835938 53.835938 27.304688 55.230469 23.464844 55.230469 C 22.804688 55.230469 22.148438 55.191406 21.511719 55.109375 C 25.132812 57.621094 29.429688 59.085938 34.066406 59.085938 C 49.132812 59.085938 57.375 45.644531 57.375 33.992188 C 57.375 33.621094 57.367188 33.242188 57.347656 32.863281 C 58.945312 31.605469 60.335938 30.046875 61.433594 28.285156 "/><g clip-path="url(#clip1)" clip-rule="nonzero"><path style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,100%,100%);fill-opacity:1;" d="M 40.164062 3 C 19.671875 3 3 19.671875 3 40.164062 C 3 60.65625 19.671875 77.328125 40.164062 77.328125 C 60.65625 77.328125 77.328125 60.65625 77.328125 40.164062 C 77.328125 19.671875 60.65625 3 40.164062 3 M 40.164062 80.328125 C 18.019531 80.328125 0 62.3125 0 40.164062 C 0 18.019531 18.019531 0 40.164062 0 C 62.3125 0 80.328125 18.019531 80.328125 40.164062 C 80.328125 62.3125 62.3125 80.328125 40.164062 80.328125 "/></g></g></svg>'
			),
			'youtube' => array(
				'url'  => $instance['url_youtube'],
				'icon' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="80.3301pt" height="80.3301pt" viewBox="0 0 80.3301 80.3301" version="1.1"><defs><clipPath id="clip1"><path d="M 0 0 L 80.328125 0 L 80.328125 80.332031 L 0 80.332031 Z M 0 0 "/></clipPath></defs><g id="surface1"><g clip-path="url(#clip1)" clip-rule="nonzero"><path style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,100%,100%);fill-opacity:1;" d="M 40.164062 3 C 19.671875 3 3 19.671875 3 40.164062 C 3 60.65625 19.671875 77.328125 40.164062 77.328125 C 60.65625 77.328125 77.328125 60.65625 77.328125 40.164062 C 77.328125 19.671875 60.65625 3 40.164062 3 M 40.164062 80.328125 C 18.019531 80.328125 0 62.3125 0 40.164062 C 0 18.019531 18.019531 0 40.164062 0 C 62.3125 0 80.328125 18.019531 80.328125 40.164062 C 80.328125 62.3125 62.3125 80.328125 40.164062 80.328125 "/></g><path style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,100%,100%);fill-opacity:1;" d="M 44.558594 40.800781 L 38.570312 45.148438 C 38.445312 45.242188 38.292969 45.285156 38.144531 45.285156 C 38.035156 45.285156 37.921875 45.257812 37.820312 45.207031 C 37.578125 45.085938 37.425781 44.835938 37.425781 44.566406 L 37.425781 35.871094 C 37.425781 35.597656 37.578125 35.347656 37.820312 35.226562 C 38.058594 35.101562 38.351562 35.125 38.570312 35.285156 L 44.558594 39.632812 C 44.742188 39.769531 44.855469 39.984375 44.855469 40.214844 C 44.855469 40.449219 44.746094 40.664062 44.558594 40.800781 M 54.484375 33.140625 C 54.464844 33.03125 54.441406 32.917969 54.410156 32.808594 C 54.398438 32.761719 54.382812 32.707031 54.367188 32.660156 C 53.988281 31.539062 52.929688 30.726562 51.679688 30.726562 L 51.875 30.726562 C 51.875 30.726562 46.851562 29.96875 40.164062 29.9375 C 33.480469 29.96875 28.457031 30.726562 28.457031 30.726562 L 28.652344 30.726562 C 27.402344 30.726562 26.34375 31.539062 25.964844 32.660156 C 25.949219 32.707031 25.933594 32.761719 25.917969 32.808594 C 25.886719 32.917969 25.863281 33.03125 25.847656 33.140625 C 25.664062 34.445312 25.363281 37.046875 25.335938 40.164062 C 25.363281 43.285156 25.664062 45.882812 25.847656 47.1875 C 25.863281 47.300781 25.886719 47.410156 25.917969 47.519531 C 25.933594 47.570312 25.949219 47.621094 25.964844 47.671875 C 26.34375 48.792969 27.402344 49.601562 28.652344 49.601562 L 28.457031 49.601562 C 28.457031 49.601562 33.480469 50.359375 40.164062 50.390625 C 46.851562 50.359375 51.875 49.601562 51.875 49.601562 L 51.679688 49.601562 C 52.929688 49.601562 53.988281 48.792969 54.367188 47.671875 C 54.382812 47.621094 54.398438 47.570312 54.410156 47.519531 C 54.441406 47.410156 54.464844 47.300781 54.484375 47.1875 C 54.664062 45.882812 54.964844 43.285156 54.992188 40.164062 C 54.964844 37.046875 54.664062 34.445312 54.484375 33.140625 "/></g></svg>'
			),
			'snapchat' => array(
				'url'  => $instance['url_snapchat'],
				'icon' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="80.3301pt" height="80.3301pt" viewBox="0 0 80.3301 80.3301" version="1.1"><defs><clipPath id="clip1"><path d="M 0 0 L 80.328125 0 L 80.328125 80.332031 L 0 80.332031 Z M 0 0 "/></clipPath></defs><g id="surface1"><path style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,100%,100%);fill-opacity:1;" d="M 42.453125 18.921875 C 47.632812 20.605469 52.320312 24.023438 52.417969 29.878906 C 52.445312 31.675781 52.347656 33.480469 52.308594 35.277344 C 52.28125 36.410156 52.601562 36.609375 53.691406 36.355469 C 54.570312 36.152344 55.484375 36.019531 56.382812 36.03125 C 57.179688 36.042969 57.910156 36.4375 58.105469 37.320312 C 58.304688 38.230469 57.734375 38.78125 57 39.144531 C 55.878906 39.695312 54.71875 40.160156 53.605469 40.71875 C 52.5625 41.242188 52.328125 41.839844 52.792969 42.882812 C 54.449219 46.609375 56.984375 49.421875 61.011719 50.644531 C 61.535156 50.804688 62.03125 51.035156 62.542969 51.234375 L 62.542969 52.339844 C 62.0625 52.710938 61.632812 53.191406 61.09375 53.421875 C 60.050781 53.871094 58.964844 54.238281 57.863281 54.523438 C 57.03125 54.738281 56.527344 55.109375 56.300781 55.988281 C 55.855469 57.714844 55.558594 57.84375 53.792969 57.542969 C 51.589844 57.171875 49.46875 57.335938 47.476562 58.472656 C 45.578125 59.550781 43.652344 60.582031 41.738281 61.636719 L 38.417969 61.636719 C 36.585938 60.660156 34.753906 59.683594 32.921875 58.703125 C 32.695312 58.582031 32.476562 58.445312 32.253906 58.320312 C 30.3125 57.253906 28.253906 57.203125 26.136719 57.582031 C 25.203125 57.746094 24.175781 57.929688 23.957031 56.632812 C 23.707031 55.15625 22.839844 54.527344 21.449219 54.335938 C 20.839844 54.25 20.25 54 19.652344 53.816406 C 18.625 53.503906 17.789062 52.960938 17.394531 51.898438 L 17.394531 51.457031 C 17.84375 51.210938 18.265625 50.878906 18.742188 50.738281 C 22.734375 49.574219 25.359375 46.90625 27.09375 43.230469 C 27.765625 41.808594 27.550781 41.230469 26.0625 40.578125 C 25.089844 40.152344 24.089844 39.765625 23.148438 39.277344 C 22.332031 38.855469 21.648438 38.261719 22.023438 37.175781 C 22.347656 36.234375 23.335938 35.671875 24.433594 35.863281 C 25.082031 35.972656 25.699219 36.238281 26.339844 36.398438 C 27.425781 36.667969 27.765625 36.402344 27.746094 35.269531 C 27.722656 33.757812 27.640625 32.246094 27.628906 30.738281 C 27.582031 25.40625 29.910156 21.628906 34.964844 19.699219 C 36.082031 19.273438 37.265625 19.03125 38.417969 18.699219 C 38.417969 18.699219 40.742188 18.363281 42.453125 18.921875 "/><g clip-path="url(#clip1)" clip-rule="nonzero"><path style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,100%,100%);fill-opacity:1;" d="M 40.164062 3 C 19.671875 3 3 19.671875 3 40.164062 C 3 60.65625 19.671875 77.328125 40.164062 77.328125 C 60.65625 77.328125 77.328125 60.65625 77.328125 40.164062 C 77.328125 19.671875 60.65625 3 40.164062 3 M 40.164062 80.328125 C 18.019531 80.328125 0 62.3125 0 40.164062 C 0 18.019531 18.019531 0 40.164062 0 C 62.3125 0 80.328125 18.019531 80.328125 40.164062 C 80.328125 62.3125 62.3125 80.328125 40.164062 80.328125 "/></g></g></svg>'
			),
			'instagram' => array(
				'url'  => $instance['url_instagram'],
				'icon' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="80.33px" height="80.33px" viewBox="0 0 80.33 80.33" enable-background="new 0 0 80.33 80.33" xml:space="preserve"><g id="surface1"><g><defs><rect id="SVGID_1_" width="80.328" height="80.332"/></defs><clipPath id="SVGID_2_"><use xlink:href="#SVGID_1_"  overflow="visible"/></clipPath><g clip-path="url(#SVGID_2_)"><path fill="#FFFFFF" d="M40.164,3C19.672,3,3,19.672,3,40.164s16.672,37.164,37.164,37.164s37.164-16.672,37.164-37.164S60.656,3,40.164,3 M40.164,80.328C18.02,80.328,0,62.312,0,40.164C0,18.02,18.02,0,40.164,0c22.148,0,40.164,18.02,40.164,40.164C80.328,62.312,62.312,80.328,40.164,80.328"/></g></g></g><g><path fill="#FFFFFF" d="M40.164,27.205c4.306,0,4.816,0.017,6.517,0.093c1.572,0.072,2.427,0.335,2.995,0.555c0.752,0.293,1.29,0.643,1.854,1.207c0.563,0.564,0.913,1.102,1.205,1.854c0.222,0.568,0.483,1.422,0.556,2.994c0.078,1.7,0.094,2.21,0.094,6.516s-0.016,4.816-0.094,6.518c-0.072,1.571-0.334,2.426-0.556,2.995c-0.292,0.752-0.642,1.288-1.205,1.854c-0.564,0.564-1.103,0.914-1.854,1.206c-0.568,0.222-1.423,0.483-2.995,0.556c-1.7,0.077-2.21,0.093-6.517,0.093c-4.306,0-4.815-0.016-6.516-0.093c-1.572-0.072-2.426-0.334-2.994-0.556c-0.752-0.292-1.291-0.642-1.854-1.206c-0.564-0.565-0.914-1.102-1.207-1.854c-0.221-0.569-0.483-1.424-0.556-2.995c-0.077-1.701-0.093-2.212-0.093-6.518s0.017-4.815,0.093-6.516c0.072-1.572,0.335-2.426,0.556-2.994c0.293-0.753,0.643-1.291,1.207-1.854c0.563-0.564,1.102-0.914,1.854-1.207c0.568-0.22,1.422-0.483,2.994-0.555C35.349,27.222,35.858,27.205,40.164,27.205 M40.164,24.299c-4.379,0-4.928,0.019-6.648,0.097c-1.717,0.078-2.89,0.351-3.915,0.75c-1.061,0.412-1.96,0.963-2.856,1.86s-1.448,1.796-1.86,2.856c-0.399,1.025-0.671,2.198-0.75,3.915c-0.078,1.72-0.097,2.27-0.097,6.648c0,4.381,0.02,4.93,0.097,6.648c0.079,1.718,0.351,2.89,0.75,3.916c0.412,1.06,0.963,1.96,1.86,2.856s1.795,1.448,2.856,1.86c1.025,0.399,2.198,0.671,3.915,0.749c1.72,0.079,2.269,0.097,6.648,0.097c4.38,0,4.929-0.018,6.648-0.097c1.717-0.078,2.89-0.35,3.916-0.749c1.06-0.412,1.959-0.964,2.855-1.86s1.449-1.797,1.86-2.856c0.399-1.026,0.672-2.198,0.75-3.916c0.078-1.719,0.097-2.268,0.097-6.648c0-4.379-0.019-4.928-0.097-6.648c-0.078-1.716-0.351-2.889-0.75-3.915c-0.411-1.061-0.964-1.96-1.86-2.856s-1.796-1.448-2.855-1.86c-1.026-0.399-2.199-0.672-3.916-0.75C45.093,24.318,44.544,24.299,40.164,24.299L40.164,24.299z"/><path fill="#FFFFFF" d="M40.164,32.145c-4.573,0-8.281,3.708-8.281,8.28c0,4.575,3.708,8.281,8.281,8.281c4.574,0,8.281-3.706,8.281-8.281C48.445,35.852,44.738,32.145,40.164,32.145z M40.164,45.801c-2.969,0-5.375-2.406-5.375-5.376c0-2.968,2.406-5.375,5.375-5.375c2.969,0,5.376,2.406,5.376,5.375C45.54,43.395,43.133,45.801,40.164,45.801z"/><circle fill="#FFFFFF" cx="48.773" cy="31.817" r="1.935"/></g></svg>'
			),
			'linkedin' => array(
				'url'  => $instance['url_linkedin'],
				'icon' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="80.33px" height="80.33px" viewBox="0 0 80.33 80.33" enable-background="new 0 0 80.33 80.33" xml:space="preserve"><g id="surface1"><g><defs><rect id="SVGID_1_" width="80.328" height="80.332"/></defs><clipPath id="SVGID_2_"><use xlink:href="#SVGID_1_"  overflow="visible"/></clipPath><g clip-path="url(#SVGID_2_)"><path fill="#FFFFFF" d="M40.164,3C19.672,3,3,19.672,3,40.164s16.672,37.164,37.164,37.164s37.164-16.672,37.164-37.164S60.656,3,40.164,3 M40.164,80.328C18.02,80.328,0,62.312,0,40.164C0,18.02,18.02,0,40.164,0c22.148,0,40.164,18.02,40.164,40.164C80.328,62.312,62.312,80.328,40.164,80.328"/></g></g></g><path fill="#FFFFFF" d="M53.813,24.991H27.507c-1.257,0-2.277,0.996-2.277,2.226v26.416c0,1.23,1.021,2.229,2.277,2.229h26.307c1.26,0,2.285-0.998,2.285-2.229V27.216C56.099,25.987,55.073,24.991,53.813,24.991z M34.385,51.296h-4.578V36.564h4.578V51.296z M32.097,34.55c-1.468,0-2.656-1.19-2.656-2.656c0-1.464,1.188-2.654,2.656-2.654c1.463,0,2.652,1.19,2.652,2.654C34.749,33.36,33.56,34.55,32.097,34.55z M51.533,51.296h-4.575v-7.164c0-1.709-0.031-3.907-2.38-3.907c-2.383,0-2.747,1.862-2.747,3.782v7.289h-4.575V36.564h4.393v2.012h0.061c0.61-1.158,2.104-2.379,4.332-2.379c4.637,0,5.492,3.051,5.492,7.019V51.296z"/></svg>'
			),
		);
		// Iterate through the array and add markup for an icon if URL has been set
		foreach ( $services as $service => $atts ) {
			if ( $atts['url'] ) {
				$markup .= sprintf( '<a class="social-media-icon %1$s" href="%2$s" target="_blank">%3$s</a>', $service, $atts['url'], $atts['icon'] );
			}
		}

		// Output all the markup to STDOUT as per WordPress protocol
		echo $args['before_widget'];
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
			'url_facebook'  => '',
			'url_twitter'   => '',
			'url_youtube'   => '',
			'url_snapchat'  => '',
			'url_instagram' => '',
			'url_linkedin'  => '',
		) );
		// Fetch and sanitize social media profile URLs
		// using `wp_strip_all_tags()` to avoid breaking URLs
		$url_facebook  = wp_strip_all_tags( $instance['url_facebook'] );
		$url_twitter   = wp_strip_all_tags( $instance['url_twitter'] );
		$url_youtube   = wp_strip_all_tags( $instance['url_youtube'] );
		$url_snapchat  = wp_strip_all_tags( $instance['url_snapchat'] );
		$url_instagram = wp_strip_all_tags( $instance['url_instagram'] );
		$url_linkedin  = wp_strip_all_tags( $instance['url_linkedin'] );
		// Dump the markup for the setup form straight to STDOUT
		?>
		<p>
			Enter the URLs for the social network profiles that the widget icons should link to. Icons will only be shown if a URL has been entered in the corresponding field in the form below.
		</p>
		<p>
			<label for="<?php echo $this->get_field_name( 'url_facebook' ); ?>"><?php _e( 'Facebook:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'url_facebook' ); ?>" name="<?php echo $this->get_field_name( 'url_facebook' ); ?>" type="url" value="<?php echo esc_attr( $url_facebook ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_name( 'url_twitter' ); ?>"><?php _e( 'Twitter:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'url_twitter' ); ?>" name="<?php echo $this->get_field_name( 'url_twitter' ); ?>" type="url" value="<?php echo esc_attr( $url_twitter ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_name( 'url_youtube' ); ?>"><?php _e( 'YouTube:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'url_youtube' ); ?>" name="<?php echo $this->get_field_name( 'url_youtube' ); ?>" type="url" value="<?php echo esc_attr( $url_youtube ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_name( 'url_snapchat' ); ?>"><?php _e( 'Snapchat:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'url_snapchat' ); ?>" name="<?php echo $this->get_field_name( 'url_snapchat' ); ?>" type="url" value="<?php echo esc_attr( $url_snapchat ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_name( 'url_instagram' ); ?>"><?php _e( 'Instagram:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'url_instagram' ); ?>" name="<?php echo $this->get_field_name( 'url_instagram' ); ?>" type="url" value="<?php echo esc_attr( $url_instagram ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_name( 'url_linkedin' ); ?>"><?php _e( 'LinkedIn:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'url_linkedin' ); ?>" name="<?php echo $this->get_field_name( 'url_linkedin' ); ?>" type="url" value="<?php echo esc_attr( $url_linkedin ); ?>">
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
			'url_facebook'  => '',
			'url_twitter'   => '',
			'url_youtube'   => '',
			'url_snapchat'  => '',
			'url_instagram' => '',
			'url_linkedin'  => '',
		];
		$new_instance = wp_parse_args( $new_instance, $instance );
		// if we use sanitize_text_field() here we might break the URLs
		$instance['url_facebook']  = wp_strip_all_tags( $new_instance['url_facebook'] );
		$instance['url_twitter']   = wp_strip_all_tags( $new_instance['url_twitter'] );
		$instance['url_youtube']   = wp_strip_all_tags( $new_instance['url_youtube'] );
		$instance['url_snapchat']  = wp_strip_all_tags( $new_instance['url_snapchat'] );
		$instance['url_instagram'] = wp_strip_all_tags( $new_instance['url_instagram'] );
		$instance['url_linkedin']  = wp_strip_all_tags( $new_instance['url_linkedin'] );

		// Return the resulting instance with filtered values
		return $instance;
	}
}
