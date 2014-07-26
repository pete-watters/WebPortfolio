<?php
/**
 * Plugin Name: PHI // SUBPAGE LIST
 * Plugin URI: http://themeforest.net
 * Description: Displays a list of child pages.
 * Version: 0.1
 * Author: Phi - Andreas Wilthil
 * Author URI: http://themeforest.net/user/Phi - http://itworx.no - http://phiworx.com
 */

/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'subpage_load_widgets' );

/**
 * Register our widget.
 * 'Phi_Subpage_Widget' is the widget class used below.
 *
 * @since 0.1
 */
function subpage_load_widgets() {
	register_widget( 'Phi_Subpage_Widget' );
}

/**
 * Example Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class Phi_Subpage_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function Phi_Subpage_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'example', 'description' => __('Displays a list of child pages', 'example') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 200, 'height' => 350, 'id_base' => 'subpage-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'subpage-widget', __('PHI // SUB PAGE LIST', 'example'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$subpagecount = $instance['subpagecount'];
		//$sex = $instance['sex'];
		//$show_sex = isset( $instance['show_sex'] ) ? $instance['show_sex'] : false;

		/* Before widget (defined by themes). */
		

		/* Display the widget title if one was input (before and after defined by themes). */
				
		echo $before_widget;
		
	
		
		
	
	global $post;
	if($post->post_parent==true){
 	$children = wp_list_pages("link_before=<span>&link_after=</span>&title_li=&child_of=".$post->post_parent."&echo=0&sort_column=menu_order");
	}
  	else{
  	$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0&sort_column=menu_order");
	}
  	if ($children == true){ 
  		echo $before_title . $title . $after_title;
		echo '<ul>';
  		echo $children;
  		echo '</ul>';
	}	

			///////////////////////////////////////////

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		//$instance['subpagecount'] = strip_tags( $new_instance['subpagecount'] );

		/* No need to strip tags for sex and show_sex. */
		//$instance['sex'] = $new_instance['sex'];
		//$instance['show_sex'] = $new_instance['show_sex'];

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Subpages', 'example'), 'subpagecount' => __('5', 'example') );
		//$instance = wp_parse_args( (array) $instance, $defaults ); ?>
<!-- Widget Title: Text Input -->
<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
						<?php _e('Title:', 'hybrid'); ?>
			</label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
</p>

<?php
	}
}

?>
