<?php
/**
 * Plugin Name: Mediabox Latest Posts
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
add_action( 'widgets_init', 'mediaboximageposts_load_widgets' );

/**
 * Register our widget.
 * 'mediabox_Latestposts_Widget' is the widget class used below.
 *
 * @since 0.1
 */
function mediaboximageposts_load_widgets() {
	register_widget( 'Mediabox_Imageposts_Widget' );
}

/**
 * Example Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class Mediabox_Imageposts_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function Mediabox_Imageposts_Widget() {
		/* Widget settings. */
		$mediaboximagepostswidget_ops = array( 'classname' => 'example', 'description' => __('Displays a list of posts from a chosen category', 'example') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 240, 'height' => 350, 'id_base' => 'mediaboximageposts-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'mediaboximageposts-widget', __('Mediabox - Image posts', 'example'), $mediaboximagepostswidget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$newscount = $instance['newscount'];
		$excludeposts = $instance['excludeposts'];
		$mycategory = $instance['mycategory'];
		$listlayout = $instance['listlayout'];
		$showexcerpt = $instance['showexcerpt'];
		$showimage = $instance['showimage'];
		$showpublished = $instance['showpublished'];
		$showcomments = $instance['showcomments'];
		
		
		
		
		

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;
		
		
		global $post;
		
		
		$myposts = get_posts('showposts='.$newscount.'&category_name='.$mycategory.'&exclude='.$excludeposts.'');
		
		if($listlayout == 'List'){$thumbnailSize = 'micro'; $divclass= 'list';}
		elseif($listlayout == 'Small thumbnail 40x40px'){$thumbnailSize = '40'; $divclass= 'post-micro';}
		elseif($listlayout == 'Thumbnail 100px'){$thumbnailSize = '100'; $divclass= 'archive-420';}
		elseif($listlayout == 'Thumbnail 200px'){$thumbnailSize = '200'; $divclass= 'posts-200';}
		elseif($listlayout == 'Thumbnail 420px'){$thumbnailSize = '420'; $divclass= 'posts-420';}
		
		
		
		$counter = 0;
		
		if($divclass == 'post-micro'){echo '<ul class="postlist-micro">';}
		if($divclass == 'list'){echo '<ul class="postlist">';}
		
		foreach($myposts as $post):
		$counter++;
		setup_postdata($post);
		$customtitle = get_post_meta($post->ID,'phi_customtitle',true);
		$customexcerpt = get_post_meta($post->ID,'phi_customexcerpt',true);
		// Post images
		$featuredThumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), $thumbnailSize);
		$imagesource = '<img src="'.$featuredThumbnail[0].'"  alt=""/>';
		
		?>
		<?php if ($divclass == 'post-micro'):?>
		<li>
		<?php if($showimage == false):?>
		<?php phi_post_image($thumbnailSize,'','');?>
		
		<?php endif;?>
		
		<span class="title">
		<?php if($customtitle):?>
		<a href="<?php the_permalink();?>"><?php echo $customtitle;?></a>
		<?php else:?>
		<a href="<?php the_permalink();?>"><?php the_title();?></a>
		<?php endif;?>
		</span>
		
		<span class="meta">
		<?php if($showpublished == false):?>		
		<?php the_time('F j, Y');?>
		<?php endif;?>
		
		<?php if($showcomments == false):?>	
			<?php if ( comments_open() ) : ?>
				<?php comments_popup_link ( '0 comments', '1 comment', '% comments', '', '')?>
			<?php endif; ?>
		<?php endif;?>
		</span>
		<?php if($showexcerpt == false):?>
		<?php 
		if(has_excerpt()){
		
			the_excerpt(); 
		}
		
		?>
		<?php endif;?>
		
		
		
		<?php elseif ($divclass == 'list'):?>
		
		
		<li>
		<?php if($customtitle):?>
		<a href="<?php the_permalink();?>"><?php echo $customtitle;?></a>
		<?php else:?>
		<a href="<?php the_permalink();?>"><?php the_title();?></a>
		<?php endif;?>
		<span class="meta">
		<?php if($showpublished == false):?>		
		<?php the_time('F j, Y');?> 
		<?php endif;?>
		
		<?php if($showcomments == false):?>	
		<?php if ( comments_open() ) : ?>
				<?php comments_popup_link ( '0 comments', '1 comment', '% comments', '', '')?>
		<?php endif; ?>
		<?php endif;?>
		
		</span>
		</li>
		
		<?php elseif ($divclass == 'archive-420'):?>
		<div class="posts <?php echo $divclass;?> ">
		<div class="image">
		<?php if($showimage == false  && has_post_thumbnail()):?>
		<?php phi_post_image($thumbnailSize,'','');?>
		<?php endif;?>
		</div>
		<div class="info">
		<h5><?php the_title();?></h5>
		<div class="meta"><?php echo get_option('phi_trans_postedon');?>
		<?php if($showpublished == false):?>
		<?php the_time('F j, Y');?>
		<?php endif; ?>
		
		<?php if ( comments_open() && $showcomments == false) : ?>
		<?php comments_popup_link ( '0 COMMENTS', '1 COMMENT', '% COMMENTS', '', '')?>
		<?php endif; ?>
		</div>
		<?php the_excerpt();?>
		<a href="<?php the_permalink();?>" class="btn"><?php echo get_option('phi_trans_readmore');?></a> </div>
									
		</div>
		
		<?php else:?>
		
		<div class="posts <?php echo $divclass;?> <?php if (($counter % 2) == 0){echo 'last';}?>">
		<?php if($showimage == false):?>
		<?php phi_post_image($thumbnailSize,'');?>
		<?php endif;?>
		
		<div class="postdata">
		
		<h1>
		<?php if($customtitle):?>
		<a href="<?php the_permalink();?>"><?php echo $customtitle;?></a>
		<?php else:?>
		<a href="<?php the_permalink();?>"><?php the_title();?></a>
		<?php endif;?>
		</h1>
		
		
		<span class="tiny">
		<?php if($showpublished == false):?>
	<?php the_time('F j, Y');?>
		<?php endif;?>
		
		<?php if($showcomments == false):?>	
		<?php if ( comments_open() ) : ?>
				<?php comments_popup_link ( '0 comments', '1 comment', '% comments', '', '')?>
		<?php endif; ?>
		<?php endif;?>
		
		</span>
		
		
		<?php if($showexcerpt == false):?>
		<?php 
		if(has_excerpt()){
		
		the_excerpt(); 
		}
		
		?>
		<?php endif;?>
		</div>
		</div>
		
		
		<?php endif;?>
		
		
		<?php wp_reset_query();?>
		<?php	endforeach;
		if($divclass == 'post-micro'){echo '</ul>';}	
		elseif($divclass == 'list'){echo '</ul>';}		
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
		$instance['excludeposts'] = strip_tags( $new_instance['excludeposts'] );
		$instance['mycategory'] = $new_instance['mycategory'];
		$instance['listlayout'] = $new_instance['listlayout'];
		$instance['showexcerpt'] = ( isset( $new_instance['hierarchy'] ) ? 1 : 0 ); 
		$instance['showimage'] = ( isset( $new_instance['imagedisplay'] ) ? 1 : 0 ); 
		$instance['showpublished'] = ( isset( $new_instance['publishdisplay'] ) ? 1 : 0 ); 
		$instance['showcomments'] = ( isset( $new_instance['commentdisplay'] ) ? 1 : 0 ); 
		
		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		
		$defaults = array( 'title' => __('Latest posts', 'example'), 'newscount' => __('5', 'example'), 'mycategory' => '', 'listlayout' => '','showexcerpt' => 'checked', 'showimage' => '', 'showpublished' => '', 'showcomments' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults ); 
?>




		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:200px;" />
		</p>

		<!-- Your Name: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e('Number of posts:', 'example'); ?></label>
			<input id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'newscount' ); ?>" value="<?php echo $instance['newscount']; ?>" style="width:200px;" />
		</p>

		<p>
		
		
			<!-- Get categories -->
			<label for="<?php echo $this->get_field_id( 'mycategory' ); ?>">Category:</label>
			<select name="<?php echo $this->get_field_name('mycategory' ); ?>" id="<?php echo $this->get_field_id( 'mycategory' ); ?>" style="width:200px;">
			
			<option>Please Select</option>
			<?php $categories = get_categories(array('hide_empty'=>false));
			
			$phi_getcat = array();
			
			foreach ($categories as $category) { 
		
			
			
			?>
			<option <?php if ($category->cat_ID = $category->cat_name == $instance['mycategory']) echo 'selected="selected"'; ?>
			value="<?php echo  $category->cat_ID = $category->cat_name; ?>">
			<?php echo $category->cat_ID = $category->cat_name; ?>
			</option>	
			<?php } ?>
			</select>
			</p>
			
			
			<p>
		
		
			<!-- Get post -->
			<label for="<?php echo $this->get_field_id( 'myposts' ); ?>">Posts:</label>
			<select name="<?php echo $this->get_field_name('myposts' ); ?>" id="<?php echo $this->get_field_id( 'myposts' ); ?>" style="width:200px;">
			
			<option>Please Select</option>
			<?php 
			
			$posts = get_posts("category=$mycategory");
			$phi_getposts = array();
			foreach ($posts as $post ) {
					
			
			
			?>
			<option <?php if ($post->post_ID = $posts->post_name == $instance['myposts']) echo 'selected="selected"'; ?>
			value="<?php echo  $post->post_ID = $post->post_name; ?>">
			<?php echo $post->post_ID = $post->post_name; ?>
			</option>	
			<?php } ?>
			</select>
			</p>
			
			<p>
		
		
			<!-- Get page -->
			<label for="<?php echo $this->get_field_id( 'mypages' ); ?>">Pages:</label>
			<select name="<?php echo $this->get_field_name('mypages' ); ?>" id="<?php echo $this->get_field_id( 'mypages' ); ?>" style="width:200px;">
			
			<option>Please Select</option>
			<?php 
			
			$pages = get_pages();
			$phi_getpages = array();
			foreach ($pages as $page ) {
					
			
			
			?>
			<option <?php if ($page->post_ID = $page->post_name == $instance['mypages']) echo 'selected="selected"'; ?>
			value="<?php echo  $page->post_ID = $page->post_name; ?>">
			<?php echo $page->post_ID = $page->post_name; ?>
			</option>	
			<?php } ?>
			</select>
			</p>
			
			
			<p>
			<!-- List layout -->
			<label for="<?php echo $this->get_field_id( 'listlayout' ); ?>">Layout:</label>
			<select name="<?php echo $this->get_field_name('listlayout' ); ?>" id="<?php echo $this->get_field_id( 'listlayout' ); ?>" style="width:200px;">
			
			<option>Select layout</option>
				
				<option <?php if ( 'List' == $instance['listlayout'] ) echo 'selected="selected"'; ?>>List</option>
				<option <?php if ( 'Small thumbnail 40x40px' == $instance['listlayout'] ) echo 'selected="selected"'; ?>>Small thumbnail 40x40px</option>
				<option <?php if ( 'Thumbnail 100px' == $instance['listlayout'] ) echo 'selected="selected"'; ?>>Thumbnail 100px</option>
				<option <?php if ( 'Thumbnail 200px' == $instance['listlayout'] ) echo 'selected="selected"'; ?>>Thumbnail 200px</option>
				<option <?php if ( 'Thumbnail 420px' == $instance['listlayout'] ) echo 'selected="selected"'; ?>>Thumbnail 420px</option>
			
			</select>
		
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['showexcerpt'], true ); ?> id="<?php echo $this->get_field_id( 'hierarchy' ); ?>" name="<?php echo $this->get_field_name( 'hierarchy' ); ?>" /> 
			<label for="<?php echo $this->get_field_id( 'hierarchy' ); ?>"><?php _e('Hide excerpt', 'example'); ?></label>
		</p>
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['showimage'], true ); ?> id="<?php echo $this->get_field_id( 'imagedisplay' ); ?>" name="<?php echo $this->get_field_name( 'imagedisplay' ); ?>" /> 
			<label for="<?php echo $this->get_field_id( 'imagedisplay' ); ?>"><?php _e('Hide image', 'example'); ?></label>
		</p>
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['showpublished'], true ); ?> id="<?php echo $this->get_field_id( 'publishdisplay' ); ?>" name="<?php echo $this->get_field_name( 'publishdisplay' ); ?>" /> 
			<label for="<?php echo $this->get_field_id( 'publishdisplay' ); ?>"><?php _e('Hide publish date', 'example'); ?></label>
		</p>
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['showcomments'], true ); ?> id="<?php echo $this->get_field_id( 'commentdisplay' ); ?>" name="<?php echo $this->get_field_name( 'commentdisplay' ); ?>" /> 
			<label for="<?php echo $this->get_field_id( 'commentdisplay' ); ?>"><?php _e('Hide post comments', 'example'); ?></label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('exclude'); ?>"><?php _e('Exclude posts: <br/><i>Enter posts id. Separate with commas</i>', 'example'); ?></label>
			<input id="<?php echo $this->get_field_id('exclude'); ?>" name="<?php echo $this->get_field_name( 'excludeposts' ); ?>" value="<?php echo $instance['excludeposts']; ?>" style="width:200px;" />
		</p>
		
		

	<?php
	}
}

?>