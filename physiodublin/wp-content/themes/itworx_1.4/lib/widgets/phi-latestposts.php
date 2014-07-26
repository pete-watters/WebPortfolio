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
add_action( 'widgets_init', 'philatestposts_load_widgets' );

/**
 * Register our widget.
 * 'Phi_Latestposts_Widget' is the widget class used below.
 *
 * @since 0.1
 */
function philatestposts_load_widgets() {
	register_widget( 'Phi_Latestposts_Widget' );
}

/**
 * Example Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class Phi_Latestposts_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function Phi_Latestposts_Widget() {
		/* Widget settings. */
		$philatestpostswidget_ops = array( 'classname' => 'example', 'description' => __('Displays a list of recent posts', 'example') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'philatestposts-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'philatestposts-widget', __('PHI - LATEST POSTS', 'example'), $philatestpostswidget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$newscount = $instance['newscount'];
		$myposttype = $instance['myposttype'];
		$showexcerpt = $instance['showexcerpt'];
		$showimage = $instance['showimage'];
		
		
		
		
		

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;
		
		
		global $post;
		
		
		if($myposttype == 'News'){$setPosttype = 'news';}
		elseif($myposttype == 'Portfolio'){$setPosttype = 'phiPortfolio';}
		elseif($myposttype == 'Posts'){$setPosttype = 'post';}
		elseif($myposttype == 'Testimonials'){$setPosttype = 'testimonial';}
		//elseif($myposttype == 'Events'){$setPosttype = 'events';}
		
		$myposts = get_posts('showposts='.$newscount.'&post_type='.$setPosttype.'');
		
		
		
		
		//echo '<ul>';
		foreach($myposts as $post):
		setup_postdata($post);
		
		$customtitle = get_post_meta($post->ID,'phi_customtitle',true);
		$customexcerpt = get_post_meta($post->ID,'phi_customexcerpt',true);
		// Post images
		
				
		
		?>
		
		<div class="latestposts">
		<?php if($showimage):?>
		
		<?php phi_post_image('micro','','permalink');?>
		
		<?php endif;?>
		
		
		
		<span class="postlisttitle">
				
		<a href="<?php the_permalink();?>"><?php the_title();?></a>
		
		</span>
		<span class="tinytext"><?php the_time('F j, Y');?></span>
		<?php if($showexcerpt):?>
			<?php 
			if(has_excerpt()){
			
			the_excerpt(); 
			}
			else{
				echo '<p>'.$customexcerpt.'</p>';
				}
			?>
		
		<?php endif;?>
		</div>
	
		
		
		<?php
				

		/* After widget (defined by themes). */
		endforeach;
		wp_reset_query();
		//echo '</ul>';
		
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['newscount'] = strip_tags( $new_instance['newscount'] );
		$instance['myposttype'] = $new_instance['myposttype'];
		$instance['showexcerpt'] = ( isset( $new_instance['hierarchy'] ) ? 1 : 0 ); 
		$instance['showimage'] = ( isset( $new_instance['imagedisplay'] ) ? 1 : 0 ); 
		
		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		
		$defaults = array( 'title' => __('Latest posts', 'example'), 'newscount' => '5', 'myposttype' => 'phiPortfolio', 'showexcerpt' => 'checked', 'showimage' => 'checked' );
		$instance = wp_parse_args( (array) $instance, $defaults ); 
?>




		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

		<!-- Your Name: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e('Number of posts:', 'example'); ?></label>
			<input id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'newscount' ); ?>" value="<?php echo $instance['newscount']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'myposttype' ); ?>">Post type:</label>
			<select id="<?php echo $this->get_field_id( 'myposttype' ); ?>" name="<?php echo $this->get_field_name( 'myposttype' ); ?>" class="widefat" style="width:100%;">
				
				<option <?php if ( 'Posts' == $instance['myposttype'] ) echo 'selected="selected"'; ?>>Posts</option>
				<option <?php if ( 'Portfolio' == $instance['myposttype'] ) echo 'selected="selected"'; ?>>Portfolio</option>
				<option <?php if ( 'News' == $instance['myposttype'] ) echo 'selected="selected"'; ?>>News</option>
				<option <?php if ( 'Testimonials' == $instance['myposttype'] ) echo 'selected="selected"'; ?>>Testimonials</option>
			
			</select>
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['showexcerpt'], true ); ?> id="<?php echo $this->get_field_id( 'hierarchy' ); ?>" name="<?php echo $this->get_field_name( 'hierarchy' ); ?>" /> 
			<label for="<?php echo $this->get_field_id( 'hierarchy' ); ?>"><?php _e('Show excerpt', 'example'); ?></label>
		</p>
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['showimage'], true ); ?> id="<?php echo $this->get_field_id( 'imagedisplay' ); ?>" name="<?php echo $this->get_field_name( 'imagedisplay' ); ?>" /> 
			<label for="<?php echo $this->get_field_id( 'imagedisplay' ); ?>"><?php _e('Show image', 'example'); ?></label>
		</p>

		
		

	<?php
	}
}

?>