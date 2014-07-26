<?php
/**
 * Plugin Name: PHI // LATEST POSTS
 * Plugin URI: http://themeforest.net
 * Description: A widget that displays the latest post from a chosen posttype
 * Version: 0.1
 * Author: Phi - Andreas Wilthil
 * Author URI: http://themeforest.net/user/Phi - http://itworx.no - http://phiworx.com
 */

/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'phi_tags_load_widgets' );

/**
 * Register our widget.
 * 'Phi_Tags_Widget' is the widget class used below.
 *
 * @since 0.1
 */
function phi_tags_load_widgets() {
	register_widget( 'Phi_Tags_Widget' );
}

/**
 * Example Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class Phi_Tags_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function Phi_Tags_Widget() {
		/* Widget settings. */
		$phi_tagswidget_ops = array( 'classname' => 'example', 'description' => __('Displays a list of tags', 'example') );

		/* Widget control settings. */
		$control_ops = array(  'id_base' => 'phi_tags-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'phi_tags-widget', __('PHI // TAGS LIST', 'example'), $phi_tagswidget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$tagcount = $instance['tagcount'];
	
		
		if($tagcount == ''){
			$tagcount = 500;
		}
		else{
			$tagcount = $tagcount;
		}
		
		
		

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;
		
		
		global $post;
		
		
			echo '<div class="tags">';
			$tags = get_tags( array('orderby' => 'count', 'order' => 'DESC', 'number' => $tagcount ) );
			foreach ( (array) $tags as $tag ) {
			echo '<a href="' . get_tag_link ($tag->term_id) . '" rel="tag">' . $tag->name . ' </a>';
			}
			echo '</div>';

				

		
		
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['tagcount'] = strip_tags( $new_instance['tagcount'] );
			
		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		
		$defaults = array( 'title' => __('Tags', 'itworx'), 'tagcount' => '50');
		$instance = wp_parse_args( (array) $instance, $defaults ); 
?>




		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

		<!-- Your Name: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e('Maximum number of tags to display:', 'example'); ?></label>
			<input id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'tagcount' ); ?>" value="<?php echo $instance['tagcount']; ?>" style="width:100%;" />
		</p>

		
		
		
	

		
		

	<?php
	}
}

?>