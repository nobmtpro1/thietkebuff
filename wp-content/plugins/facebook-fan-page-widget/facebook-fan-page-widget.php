<?php
/*
* Plugin Name: Fan Page Widget
* Plugin URI: https://portal.themencode.com/downloads/fan-page-widget-by-themencode/
* Description: An widget that will display Facebook Fan page like box. Uses new API of Facebook (v 2.3)
* Version: 2.0
* Author: ThemeNcode
* Author URI: https://themencode.com/
* License: GPLv2 or later
* License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// Add Scripts to header

function tnc_ffpw_head(){

	echo '<div id="fb-root"></div>';

	echo "<script>(function(d, s, id) {

	var js, fjs = d.getElementsByTagName(s)[0];

	if (d.getElementById(id)) return;

	js = d.createElement(s); js.id = id;

	js.src = '//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v16.0';

	fjs.parentNode.insertBefore(js, fjs);

	}(document, 'script', 'facebook-jssdk'));</script>";

}

add_action('wp_head', 'tnc_ffpw_head');

/**
 * Adds FFPW_SOCIAL widget.
 */

class FFPW_SOCIAL extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */

	function __construct() {

		parent::__construct(

			'FFPW_SOCIAL', // Base ID

			__( 'Facebook Fan Page Widget ', 'ffpw' ), // Name

			array( 'description' => __( 'Facebook Fan Page Widget', 'ffpw' ), ) // Args

		);

	}

	/**
	 * Front-end display of widget.
	 *
	 * @see FFPW_SOCIAL::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */

	public function widget( $args, $instance ) {

		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {

			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];

		}

		// Check values

		if ( ! empty( $instance['ffpw_fb_page'] ) ) {

			 $args['before_title'] . apply_filters( 'widget_title', $instance['ffpw_fb_page'] ). $args['after_title'];

		} 

		if ( ! empty( $instance['ffpw_fb_width'] ) ) {

			 $args['before_title'] . apply_filters( 'widget_title', $instance['ffpw_fb_width'] ). $args['after_title'];

		} 

		if ( ! empty( $instance['ffpw_fb_height'] ) ) {

			 $args['before_title'] . apply_filters( 'widget_title', $instance['ffpw_fb_height'] ). $args['after_title'];

		}

		if ( ! empty( $instance['ffpw_fb_faces'] ) ) {

			 $args['before_title'] . apply_filters( 'widget_title', $instance['ffpw_fb_faces'] ). $args['after_title'];

		} 

		if ( ! empty( $instance['ffpw_fb_cover'] ) ) {

			 $args['before_title'] . apply_filters( 'widget_title', $instance['ffpw_fb_cover'] ). $args['after_title'];

		} 
		
		if ( ! empty( $instance['ffpw_fb_tabs'] ) ) {

			 $args['before_title'] . apply_filters( 'widget_title', $instance['ffpw_fb_tabs'] ). $args['after_title'];

		}
		
		if ( ! empty( $instance['ffpw_fb_custom_call'] ) ) {

			$args['before_title'] . apply_filters( 'widget_title', $instance['ffpw_fb_custom_call'] ). $args['after_title'];

	 	}

		if ( ! empty( $instance['ffpw_fb_small_header'] ) ) {

			$args['before_title'] . apply_filters( 'widget_title', $instance['ffpw_fb_small_header'] ). $args['after_title'];

	 	}

		if ( ! empty( $instance['ffpw_fb_container_width'] ) ) {

			$args['before_title'] . apply_filters( 'widget_title', $instance['ffpw_fb_container_width'] ). $args['after_title'];

	 	}

		if ( ! empty( $instance['ffpw_fb_lazy_loading'] ) ) {

			$args['before_title'] . apply_filters( 'widget_title', $instance['ffpw_fb_lazy_loading'] ). $args['after_title'];

	 	}

		if( is_array( $instance['ffpw_fb_tabs'] )){
			$tabs_to_show = implode( ",", $instance['ffpw_fb_tabs'] );
		} else {
			$tabs_to_show = $instance['ffpw_fb_tabs'];
		}
		

		echo __( '<div class="fb-page" data-href="'.$instance['ffpw_fb_page'].'" data-width="'.$instance['ffpw_fb_width'].'" data-hide-cover="'.$instance['ffpw_fb_cover'].'" data-show-facepile="'.$instance['ffpw_fb_faces'].'" data-tabs="'.$tabs_to_show.'" data-hide-cta="'.$instance['ffpw_fb_custom_call'].'" data-small-header="'.$instance['ffpw_fb_small_header'].'" data-adapt-container-width="'.$instance['ffpw_fb_container_width'].'" data-lazy="'.$instance['ffpw_fb_lazy_loading'].'"><div class="fb-xfbml-parse-ignore"><blockquote cite="'.$instance['ffpw_fb_page'].'"><a href="'.$instance['ffpw_fb_page'].'">Facebook</a></blockquote></div></div>', 'ffpw' );

		echo $args['after_widget'];

	}

	
	/**
	 * Back-end widget form.
	 *
	 * @see FFPW_SOCIAL::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Find us on Facebook', 'ffpw' );
		$ffpw_fb_page = ! empty( $instance['ffpw_fb_page'] ) ? $instance['ffpw_fb_page'] : __( 'https://www.facebook.com/ThemeNcode', 'ffpw' );
		$ffpw_fb_width = ! empty( $instance['ffpw_fb_width'] ) ? $instance['ffpw_fb_width'] : __( '340', 'ffpw' );
		$ffpw_fb_height = ! empty( $instance['ffpw_fb_height'] ) ? $instance['ffpw_fb_height'] : __( '500', 'ffpw' );
		$ffpw_fb_faces = ! empty( $instance['ffpw_fb_faces'] ) ? $instance['ffpw_fb_faces'] : __( 'true', 'ffpw' );
		$ffpw_fb_cover = ! empty( $instance['ffpw_fb_cover'] ) ? $instance['ffpw_fb_cover'] : __( 'false', 'ffpw' );
		$ffpw_fb_tabs = ! empty( $instance['ffpw_fb_tabs'] ) ? $instance['ffpw_fb_tabs'] : __( 'timeline', 'ffpw' );
		$ffpw_fb_custom_call = ! empty( $instance['ffpw_fb_custom_call'] ) ? $instance['ffpw_fb_custom_call'] : __( 'false', 'ffpw' );
		$ffpw_fb_small_header = ! empty( $instance['ffpw_fb_small_header'] ) ? $instance['ffpw_fb_small_header'] : __( 'false', 'ffpw' );
		$ffpw_fb_container_width = ! empty( $instance['ffpw_fb_container_width'] ) ? $instance['ffpw_fb_container_width'] : __( 'true', 'ffpw' );
		$ffpw_fb_lazy_loading = ! empty( $instance['ffpw_fb_lazy_loading'] ) ? $instance['ffpw_fb_lazy_loading'] : __( 'false', 'ffpw' );
	?>

	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><strong><?php _e( 'Title:' ); ?></strong></label> <br /> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
	</p>

	<p>
		<label for="<?php echo $this->get_field_id( 'ffpw_fb_page' ); ?>"><strong><?php _e( 'Facebook Page Url:' ); ?></strong></label><br /> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'ffpw_fb_page' ); ?>" name="<?php echo $this->get_field_name( 'ffpw_fb_page' ); ?>" type="text" value="<?php echo esc_attr( $ffpw_fb_page ); ?>">
	</p>

	<p>
		<label for="<?php echo $this->get_field_id( 'ffpw_fb_width' ); ?>"><strong><?php _e( 'Width:' ); ?></strong></label> <br />
		<input class="widefat" id="<?php echo $this->get_field_id( 'ffpw_fb_width' ); ?>" name="<?php echo $this->get_field_name( 'ffpw_fb_width' ); ?>" type="text" value="<?php echo esc_attr( $ffpw_fb_width ); ?>" placeholder="The pixel width of the plugin. Min. is 280 & Max. is 500">
	</p>

	<p>
		<label for="<?php echo $this->get_field_id( 'ffpw_fb_height' ); ?>"><strong><?php _e( 'Height:' ); ?></strong></label><br /> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'ffpw_fb_height' ); ?>" name="<?php echo $this->get_field_name( 'ffpw_fb_height' ); ?>" type="text" value="<?php echo esc_attr( $ffpw_fb_height ); ?>" placeholder="The maximum pixel height of the plugin. Min. is 130">
	</p>

	<p>
		<?php $ffpw_faces_setting = esc_attr( $ffpw_fb_faces ); ?>
		<label><strong><?php _e( 'Show Friends Faces?' ); ?></strong></label><br />
		<input type="radio" id="<?php echo $this->get_field_id( 'ffpw_fb_faces' ); ?>-true" name="<?php echo $this->get_field_name( 'ffpw_fb_faces' ); ?>" value="true" <?php if($ffpw_faces_setting == "true"){echo ' checked="checked" ';} else {echo '';} ?>/>
		<label for="<?php echo $this->get_field_id( 'ffpw_fb_faces' ); ?>-true">Yes</label>
		<input type="radio" id="<?php echo $this->get_field_id( 'ffpw_fb_faces' ); ?>-false" name="<?php echo $this->get_field_name( 'ffpw_fb_faces' ); ?>" value="false" <?php if($ffpw_faces_setting == "false"){echo ' checked="checked" ';} else {echo '';} ?> />
		<label for="<?php echo $this->get_field_id( 'ffpw_fb_faces' ); ?>-false">No</label>
	</p>

	<p>
		<?php $ffpw_cover_setting = esc_attr( $ffpw_fb_cover ); ?>
		<label><strong><?php _e( 'Hide Cover?' ); ?></strong></label><br />
		<input type="radio" id="<?php echo $this->get_field_id( 'ffpw_fb_cover' ); ?>-true" name="<?php echo $this->get_field_name( 'ffpw_fb_cover' ); ?>" value="true" <?php if($ffpw_cover_setting == "true"){echo ' checked="checked" ';} else {echo '';} ?> />
		<label for="<?php echo $this->get_field_id( 'ffpw_fb_cover' ); ?>-true">Yes</label>
		<input type="radio" id="<?php echo $this->get_field_id( 'ffpw_fb_cover' ); ?>-false" name="<?php echo $this->get_field_name( 'ffpw_fb_cover' ); ?>" value="false" <?php if($ffpw_cover_setting == "false"){echo ' checked="checked" ';} else {echo '';} ?> />
		<label for="<?php echo $this->get_field_id( 'ffpw_fb_cover' ); ?>-false">No</label>
	</p>

	<p>
		<?php $ffpw_tabs_setting = esc_attr( $ffpw_fb_tabs ); ?>
		<label><strong><?php _e( 'Tabs to Display' ); ?></strong></label><br />
		<?php $get_tabs = esc_attr( $ffpw_fb_tabs );
		if( empty( $get_tabs ) ){
			$get_tabs = esc_attr( 'timeline,messages,events' );
		} ?>
		<input class="widefat" id="<?php echo $this->get_field_id( 'ffpw_fb_tabs' ); ?>" name="<?php echo $this->get_field_name( 'ffpw_fb_tabs' ); ?>" type="text" value="<?php echo esc_attr( $ffpw_fb_tabs ); ?>">
		<small><?php echo esc_html__( 'accepted values: timeline, events, messages', 'ffpw' ); ?></small>
	</p>

	<p>
		<?php $ffpw_custom_call_setting = esc_attr( $ffpw_fb_custom_call ); ?>
		<label><strong><?php _e( 'Hide the custom call ?' ); ?></strong></label><br />
		<input type="radio" id="<?php echo $this->get_field_id( 'ffpw_fb_custom_call' ); ?>-true" name="<?php echo $this->get_field_name( 'ffpw_fb_custom_call' ); ?>" value="true" <?php if($ffpw_custom_call_setting == "true"){echo ' checked="checked" ';} else {echo '';} ?> />
		<label for="<?php echo $this->get_field_id( 'ffpw_fb_custom_call' ); ?>-true">Yes</label>
		<input type="radio" id="<?php echo $this->get_field_id( 'ffpw_fb_custom_call' ); ?>-false" name="<?php echo $this->get_field_name( 'ffpw_fb_custom_call' ); ?>" value="false" <?php if($ffpw_custom_call_setting == "false"){echo ' checked="checked" ';} else {echo '';} ?> />
		<label for="<?php echo $this->get_field_id( 'ffpw_fb_custom_call' ); ?>-false">No</label>
	</p>

	<p>
		<?php $ffpw_small_header_setting = esc_attr( $ffpw_fb_small_header ); ?>
		<label><strong><?php _e( 'Use small header instead ?' ); ?></strong></label><br />
		<input type="radio" id="<?php echo $this->get_field_id( 'ffpw_fb_small_header' ); ?>-true" name="<?php echo $this->get_field_name( 'ffpw_fb_small_header' ); ?>" value="true" <?php if($ffpw_small_header_setting == "true"){echo ' checked="checked" ';} else {echo '';} ?> />
		<label for="<?php echo $this->get_field_id( 'ffpw_fb_small_header' ); ?>-true">Yes</label>
		<input type="radio" id="<?php echo $this->get_field_id( 'ffpw_fb_small_header' ); ?>-false" name="<?php echo $this->get_field_name( 'ffpw_fb_small_header' ); ?>" value="false" <?php if($ffpw_small_header_setting == "false"){echo ' checked="checked" ';} else {echo '';} ?> />
		<label for="<?php echo $this->get_field_id( 'ffpw_fb_small_header' ); ?>-false">No</label>
	</p>


	<p>
		<?php $ffpw_container_width_setting = esc_attr( $ffpw_fb_container_width ); ?>
		<label><strong><?php _e( 'Fit inside the container width ?' ); ?></strong></label><br />
		<input type="radio" id="<?php echo $this->get_field_id( 'ffpw_fb_container_width' ); ?>-true" name="<?php echo $this->get_field_name( 'ffpw_fb_container_width' ); ?>" value="true" <?php if($ffpw_container_width_setting == "true"){echo ' checked="checked" ';} else {echo '';} ?> />
		<label for="<?php echo $this->get_field_id( 'ffpw_fb_container_width' ); ?>-true">Yes</label>
		<input type="radio" id="<?php echo $this->get_field_id( 'ffpw_fb_container_width' ); ?>-false" name="<?php echo $this->get_field_name( 'ffpw_fb_container_width' ); ?>" value="false" <?php if($ffpw_container_width_setting == "false"){echo ' checked="checked" ';} else {echo '';} ?> />
		<label for="<?php echo $this->get_field_id( 'ffpw_fb_container_width' ); ?>-false">No</label>
	</p>

	<p>
		<?php $ffpw_lazy_loading_setting = esc_attr( $ffpw_fb_lazy_loading ); ?>
		<label><strong><?php _e( 'Lazy loading ?' ); ?></strong></label><br />
		<input type="radio" id="<?php echo $this->get_field_id( 'ffpw_fb_lazy_loading' ); ?>-true" name="<?php echo $this->get_field_name( 'ffpw_fb_lazy_loading' ); ?>" value="true" <?php if($ffpw_lazy_loading_setting == "true"){echo ' checked="checked" ';} else {echo '';} ?> />
		<label for="<?php echo $this->get_field_id( 'ffpw_fb_lazy_loading' ); ?>-true">Yes</label>
		<input type="radio" id="<?php echo $this->get_field_id( 'ffpw_fb_lazy_loading' ); ?>-false" name="<?php echo $this->get_field_name( 'ffpw_fb_lazy_loading' ); ?>" value="false" <?php if($ffpw_lazy_loading_setting == "false"){echo ' checked="checked" ';} else {echo '';} ?> />
		<label for="<?php echo $this->get_field_id( 'ffpw_fb_lazy_loading' ); ?>-false">No</label>
	</p>
	

	<p style="text-align: center;">
		<strong>TRENDING: </strong><a href="http://codecanyon.net/item/pdf-viewer-for-wordpress/8182815?ref=ThemeNcode" target="_blank">PDF Viewer for WordPress [Plugin]</a>
	</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see FFPW_SOCIAL::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */

	public function update( $new_instance, $old_instance ) {

		$instance = array();

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		$instance['ffpw_fb_page'] = ( ! empty( $new_instance['ffpw_fb_page'] ) ) ? strip_tags( $new_instance['ffpw_fb_page'] ) : '';

		$instance['ffpw_fb_width'] = ( ! empty( $new_instance['ffpw_fb_width'] ) ) ? strip_tags( $new_instance['ffpw_fb_width'] ) : '';

		$instance['ffpw_fb_height'] = ( ! empty( $new_instance['ffpw_fb_height'] ) ) ? strip_tags( $new_instance['ffpw_fb_height'] ) : '';

		$instance['ffpw_fb_faces'] = ( ! empty( $new_instance['ffpw_fb_faces'] ) ) ? strip_tags( $new_instance['ffpw_fb_faces'] ) : '';

		$instance['ffpw_fb_cover'] = ( ! empty( $new_instance['ffpw_fb_cover'] ) ) ? strip_tags( $new_instance['ffpw_fb_cover'] ) : '';

		$instance['ffpw_fb_tabs'] = ( ! empty( $new_instance['ffpw_fb_tabs'] ) ) ? strip_tags( $new_instance['ffpw_fb_tabs'] ) : '';

		$instance['ffpw_fb_custom_call'] = ( ! empty( $new_instance['ffpw_fb_custom_call'] ) ) ? strip_tags( $new_instance['ffpw_fb_custom_call'] ) : '';

		$instance['ffpw_fb_small_header'] = ( ! empty( $new_instance['ffpw_fb_small_header'] ) ) ? strip_tags( $new_instance['ffpw_fb_small_header'] ) : '';

		$instance['ffpw_fb_container_width'] = ( ! empty( $new_instance['ffpw_fb_container_width'] ) ) ? strip_tags( $new_instance['ffpw_fb_container_width'] ) : '';

		$instance['ffpw_fb_lazy_loading'] = ( ! empty( $new_instance['ffpw_fb_lazy_loading'] ) ) ? strip_tags( $new_instance['ffpw_fb_lazy_loading'] ) : '';

		return $instance;

	}

} // class FFPW_SOCIAL

// register FFPW_SOCIAL widget

function register_FFPW_SOCIAL() {

    register_widget( 'FFPW_SOCIAL' );
}

add_action( 'widgets_init', 'register_FFPW_SOCIAL' );

// Register Shortcode
function tnc_ffpw_shortcode( $atts ) {
	extract( shortcode_atts(
		array(
			'page' 			=> 'https://facebook.com/ThemeNcode',
			'width' 		=> '340',
			'height' 		=> '500',
			'hide_cover' 	=> 'false',
			'show_faces' 	=> 'true',
			'show_posts' 	=> 'false',
			'tabs'			=> 'timeline',
			'lazy'			=> 'true',
			'fit_width' 	=> 'false',
			'small_header'  => 'false',
		), $atts )
	);

	$show_tabs = implode( ",", $tabs );

	$output = '<div class="fb-page" data-href="'.$page.'" data-width="'.$width.'" data-height="'.$height.'" data-hide-cover="'.$hide_cover.'" data-show-facepile="'.$show_faces.'" data-tabs="'.$show_tabs.'" data-adapt-container-width="' . $fit_width . '" data-small-header="' . $small_header . '" data-lazy="' . $lazy . '" ><div class="fb-xfbml-parse-ignore"><blockquote cite="'.$page.'"><a href="'.$page.'">Facebook</a></blockquote></div></div>';
	
	return $output;
}
add_shortcode( 'themencode-fb-page-widget', 'tnc_ffpw_shortcode' );