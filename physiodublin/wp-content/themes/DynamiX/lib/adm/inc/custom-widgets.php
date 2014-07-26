<?php
/**
/**
 * Plugin Name: Mini Gallery
 * Version: 1.1
 * Author: CreativeWorkz
 * Author URI: http://creativeworkz.co.uk
 *
 */

add_action( 'widgets_init', 'load_mini_gallery' );

/**
 * Register our widget.
 * 'Mini_Gallery_Widget' is the widget class used below.
 *
 * @since 0.1
 */
function load_mini_gallery() {
	register_widget( 'Mini_Gallery_Widget' );
}

/**
 * Example Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class Mini_Gallery_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function Mini_Gallery_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'gallery', 'description' => __('DynamiX Widget Image/Text gallery, use posts or a gallery slide set.', 'gallery') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'gallery-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'gallery-widget', __('DynamiX Widget Gallery', 'gallery'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$DYN_imgheight = $instance['height'];
		$DYN_imgwidth = $instance['width'];
		$img_effect = $instance['img_effect'];
		$img_align = $instance['img_align'];
		$content_type = $instance['content_type'];
		$cats = $instance['gallerycats'];
		$slidesetid = $instance['slidesetid'];
		$id = $instance['id'];
		$timeout = $instance['timeout'];
		
		

		/* Before widget (defined by themes). */
		echo "<li class=\"widget sidebar-slider\">";
		
		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		/* Display categories from widget settings if one was input. */
		if ( $cats || $slidesetid )

        if($DYN_imgheight) { // Calculate gallery height based on effect
        $DYN_galleryheight = $DYN_imgheight+"35";
        } else {
		$DYN_imgheight="145";
		$DYN_galleryheight = "175";
		}

        if(!$DYN_imgwidth) { // Calculate gallery height based on effect
        $DYN_imgwidth = "220";
        }
		
		$chars = array("[", "]");
		$galid = str_replace($chars,"",$this->get_field_name( 'id' ));
		
		?>        
<div class="mini-slider <?php echo $galid; ?>" style="height:<?php echo $DYN_galleryheight; ?>px">
		
		<?php

		if(!$slidesetid) {
		
		$postcount = 0;	
		foreach ($cats as $value)
		{$string = $string.$value.",";}
		$string = lTrim($string,',');	
		$cat_isnum = str_replace(",","", $string); // join cats to check if numeric
	
		if (is_numeric ($cat_isnum)) { // backwards compatible with post id
			$cat_type= "cat";
		} else {
			$cat_type= "category_name"; // if not numeric, use category name
		}
	
	   $args=array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'meta_key' => 'Order',
		$cat_type => $string,
		'paged' => $paged,
		'orderby' => $sortby,
		'order' => $orderby,
		'posts_per_page' => $DYN_gridshowposts,
		'caller_get_posts'=> 1
		);
			
		$featured_query = new wp_query($args);  
			

while ($featured_query->have_posts()) : $featured_query->the_post(); 

/******************  Get custom field data ******************/             

$pdata = maybe_unserialize(get_post_meta( get_the_ID(), 'pgopts', true ));

$DYN_movieurl = $pdata["movieurl"]; // Movie File URL
$DYN_previewimgurl=$pdata["previewimgurl"]; // Preview Image URL
$DYN_disablegallink=$pdata["disablegallink"];
$DYN_galexturl=$pdata["galexturl"];
$DYN_imgzoomcrop=$pdata["imgzoomcrop"];
$DYN_cssclasses = $pdata["cssclasses"];

if(!$instance['excerpt']) {
	$DYN_galleryexcerpt="55";
} else {
	$DYN_galleryexcerpt=$instance['excerpt'];
}

if($DYN_imgzoomcrop=="zoom") {
	$DYN_imgzoomcrop="1";
} elseif($DYN_imgzoomcrop=="zoom crop") {
	$DYN_imgzoomcrop="3";
} else {
	$DYN_imgzoomcrop="0";
}

if(!get_option('timthumb_disable')) { // Check is Timthumb is Enabled or Disabled
	$DYN_imagepath = get_bloginfo('template_directory')."/lib/scripts/timthumb.php?h=". $DYN_imgheight ."&amp;w=". $DYN_imgwidth ."&amp;zc=". $DYN_imgzoomcrop ."&amp;src="; 
} else {
	$DYN_imagepath="";
}

/****************** / Get custom field data *****************/ 

$do_not_duplicate[] = get_the_ID();

$postcount++;

$image = catch_image(); // Check for images within post

?>


<?php if($content_type!="text") { ?>
<div class="panel <?php if($img_effect=="shadow") { ?>shadow<?php } elseif($img_effect=="shadowreflection") { ?>reflectshadow<?php } ?>" >
    
	<div class="panel-inner">
        
	<?php if($DYN_previewimgurl) { // Check "Preview Image" field is completed ?>     
   
		<div class="container <?php echo $img_effect.' '.$img_align.' '.$DYN_cssclasses; ?>">
			<div class="gridimg-wrap">
				<?php if(!$DYN_disablegallink) { ?>
					<a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink(get_the_ID()); } ?>"><?php } ?>
						<img class="<?php if($img_effect=="reflection" || $img_effect=="shadowreflection") { ?>reflect <?php } ?>" src="<?php echo $DYN_imagepath . dyn_getimagepath($DYN_previewimgurl); ?>" alt="<?php the_title(); ?>" width="<?php echo $DYN_imgwidth; ?>" height="<?php echo $DYN_imgheight; ?>" />
				<?php if(!$DYN_disablegallink) { ?>
					</a>
				<?php } ?>
            	
			</div><!-- / gridimg-wrap -->
		</div><!-- / container -->				
				
	<?php } elseif($image) { // Check image exists within post ?>
            	
		<div class="container <?php echo $img_effect.' '.$img_align.' '.$DYN_cssclasses; ?>">
			<div class="gridimg-wrap">
                   
				<?php if(!$DYN_disablegallink) { ?>
					<a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>"><?php } ?>
						<img class="<?php if($img_effect=="reflection" || $img_effect=="shadowreflection") { ?>reflect <?php } ?>" src="<?php echo $DYN_imagepath . dyn_getimagepath($image); ?>" alt="<?php the_title(); ?>" width="<?php echo $DYN_imgwidth; ?>" height="<?php echo $DYN_imgheight; ?>" />
				<?php if(!$DYN_disablegallink) { ?>
					</a>
				<?php } ?>
                
            </div><!-- / gridimg-wrap --> 
        </div><!-- / container -->		         
	<?php } ?>
     </div><!--  / panel-inner -->
</div><!--  / panel -->          
<?php } else { ?>

<div class="panel text">
    
	<div class="panel-inner">
        
		<div class="panelcontent">
			<h5><?php if(!$DYN_disablegallink) { ?><a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>" title="<?php echo the_title(); ?>"><?php } ?><?php echo the_title(); ?><?php if(!$DYN_disablegallink) { ?></a><?php } ?></h5>
			
			<?php global $more; $more = FALSE; ?>
			<?php if ( empty($post->post_excerpt) ) {
    					
				the_excerpt_reloaded($DYN_galleryexcerpt, '<a>', 'content', false);
				if(!$DYN_disablegallink) { ?>
				<a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>"><?php _e( 'Read More', 'DynamiX' );  ?></a>
				<?php }
			} else {
						
				the_excerpt(); 
				if(!$DYN_disablegallink) { ?>
				<a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>"><?php _e( 'Read More', 'DynamiX' );  ?></a>
				<?php }
    					
			} ?>
       		
		</div><!-- /panelcontent --> 
          
    </div><!--  / panel-inner -->
</div><!--  / panel -->  
 
<?php } ?>
<?php endwhile;

wp_reset_query();

} else { // use slide set

$postcount=0;

$DYN_slidesetids=$slidesetid;

		
if(is_array($DYN_slidesetids)) {
	foreach ($DYN_slidesetids as $DYN_slidesetid) { 
		$get_slideset = get_option("slideset_data_".$DYN_slidesetid);		
		$post_count = $post_count+$get_slideset['slideset_id_slide_count'];
	}
} else {
	$get_slideset_data 	= get_option("slideset_data_".$DYN_slidesetids);
	$post_count = $get_slideset_data['slideset_id_slide_count'];		
}

foreach($DYN_slidesetids as $DYN_slidesetid) {
$z = 0;

$get_slideset_data 	= get_option("slideset_data_".$DYN_slidesetid);
$get_slides_count = $get_slideset_data['slideset_id_slide_count'];

while ($z < $get_slides_count):

/******************  Get custom field data ******************/             

$DYN_movieurl = $get_slideset_data['slideset_id_videourl_'.$z]; // Movie File URL
$DYN_previewimgurl=$get_slideset_data['slideset_id_url_'.$z]; // Preview Image URL
$DYN_cssclasses = $get_slideset_data['slideset_id_cssclasses_'.$z];
if(!$get_slideset_data['slideset_id_link_'.$z]) {
$DYN_disablegallink='yes';} else {$DYN_disablegallink='';}
$DYN_galexturl=$get_slideset_data['slideset_id_link_'.$z];
$DYN_imgzoomcrop=strtolower($get_slideset_data['slideset_id_crop_'.$z]);
$DYN_description=stripslashes($get_slideset_data['slideset_id_desc_'.$z]);
$DYN_posttitle=stripslashes($get_slideset_data['slideset_id_title_'.$z]);

if($DYN_imgzoomcrop=="zoom") {
	$DYN_imgzoomcrop="1";
} elseif($DYN_imgzoomcrop=="zoom crop") {
	$DYN_imgzoomcrop="3";
} else {
	$DYN_imgzoomcrop="0";
}

if(!get_option('timthumb_disable')) { // Check is Timthumb is Enabled or Disabled
	$DYN_imagepath = get_bloginfo('template_directory')."/lib/scripts/timthumb.php?h=". $DYN_imgheight ."&amp;w=". $DYN_imgwidth ."&amp;zc=". $DYN_imgzoomcrop ."&amp;src="; 
} else {
	$DYN_imagepath="";
}

/****************** / Get custom field data *****************/ 
?>

<?php if($content_type!="text") { ?>
<div class="panel <?php if($img_effect=="shadow") { ?>shadow<?php } elseif($img_effect=="shadowreflection") { ?>reflectshadow<?php } ?>">
    
	<div class="panel-inner">
        
	<?php if($DYN_previewimgurl) { // Check "Preview Image" field is completed ?>     
   
		<div class="container <?php echo $img_effect.' '.$img_align.' '.$DYN_cssclasses; ?>">
			<div class="gridimg-wrap">
				<?php if(!$DYN_disablegallink) { ?>
					<a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink(get_the_ID()); } ?>"><?php } ?>
						<img class="<?php if($img_effect=="reflection" || $img_effect=="shadowreflection") { ?>reflect <?php } ?>" src="<?php echo $DYN_imagepath . dyn_getimagepath($DYN_previewimgurl); ?>" alt="<?php the_title(); ?>" width="<?php echo $DYN_imgwidth; ?>" height="<?php echo $DYN_imgheight; ?>" />
				<?php if(!$DYN_disablegallink) { ?>
					</a>
				<?php } ?>
            	
			</div><!-- / gridimg-wrap -->
		</div><!-- / container -->				
				
	<?php } elseif($image) { // Check image exists within post ?>
            	
		<div class="container <?php echo $img_effect.' '.$img_align.' '.$DYN_cssclasses; ?>">
			<div class="gridimg-wrap">
                   
				<?php if(!$DYN_disablegallink) { ?>
					<a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>"><?php } ?>
						<img class="<?php if($img_effect=="reflection" || $img_effect=="shadowreflection") { ?>reflect <?php } ?>" src="<?php echo $DYN_imagepath . dyn_getimagepath($image); ?>" alt="<?php the_title(); ?>" width="<?php echo $DYN_imgwidth; ?>" height="<?php echo $DYN_imgheight; ?>" />
				<?php if(!$DYN_disablegallink) { ?>
					</a>
				<?php } ?>
                
            </div><!-- / gridimg-wrap --> 
        </div><!-- / shadow -->		         
	<?php } ?>            
     </div><!--  / panel-inner -->
</div><!--  / panel -->          
<?php } else { ?>

<div class="panel text">
    
	<div class="panel-inner">
        
		<div class="panelcontent">
        	<?php if($DYN_posttitle) { ?>
			<h5><?php if(!$DYN_disablegallink) { ?><a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } ?>" title="<?php echo $DYN_posttitle; ?>"><?php } ?><?php echo $DYN_posttitle; ?><?php if(!$DYN_disablegallink) { ?></a><?php } ?></h5>
			<?php } ?>

            
			<?php echo do_shortcode($DYN_description);
			
			if(!$DYN_disablegallink) { ?>
			<p><a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } ?>"><?php _e( 'Read More', 'DynamiX' );  ?></a></p>
			<?php } ?>
			

       		
		</div><!-- /panelcontent --> 
          
    </div><!--  / panel-inner -->
</div><!--  / panel -->   

<?php } ?>        

<?php $z++; endwhile;
}
}

$postcount = 0; 


		/* Define default settings */
		if($instance['tween_type']) {
			$DYN_tween=$instance['tween_type'];
		} else {
			$DYN_tween="easeInOutExpo";
		}
		
		if($instance['tween_type']) {
			$DYN_animation=$instance['animation_type'];
		} else {
			$DYN_animation="scrollHorz";
		}
		
		if($instance['timeout']) {
			$DYN_timeout=$instance['timeout']*1000;
		} else {
			$DYN_timeout=$instance['timeout']="5000";
		}
				
?>
</div><!-- / mini-slider -->
<script type='text/javascript'>
<!--
jQuery(window).load(function() {

	jQuery('.mini-slider.<?php echo $galid; ?>').cycle({ 
		fx:     '<?php echo $DYN_animation; ?>', 
		timeout: <?php echo $DYN_timeout; ?>,
		speed: 750,
		easing: '<?php echo $DYN_tween; ?>',		
		prev: '#leftnav',
		next: '#rightnav',
		cleartype:  true,
    	cleartypeNoBg:  true
	});



});
//-->
</script>

		<?php	echo "</li>";
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['height'] = strip_tags( $new_instance['height'] );
		$instance['width'] = strip_tags( $new_instance['width'] );
		$instance['gallerycats'] = $new_instance['gallerycats'];
		$instance['slidesetid'] = $new_instance['slidesetid'];
		$instance['img_effect'] = $new_instance['img_effect'];
		$instance['img_align'] = $new_instance['img_align'];
		$instance['content_type'] = $new_instance['content_type'];
		$instance['tween_type'] = $new_instance['tween_type'];
		$instance['animation_type'] = $new_instance['animation_type'];
		$instance['timeout'] = $new_instance['timeout'];
		$instance['excerpt'] = $new_instance['excerpt'];

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */ ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title: (Optional)', 'hybrid'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:96%;" />
		</p>

		<!-- Image Height: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e('Image Height:', 'gallery'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'height' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'height' ); ?>" value="<?php echo $instance['height']; ?>" style="width:50%;" /><small> px <em>( Default is 145 )</em></small>	
		</p>

		<!-- Image Width: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e('Image Width:', 'gallery'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'width' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'width' ); ?>" value="<?php echo $instance['width']; ?>" style="width:50%;" /><small> px <em>( Default is 220 )</em></small>	
		</p>        

		<p>
		<small class="description">Please select either a Gallery Slide Set or Post Category.</small>
        <h4>Slide Set ID</h4>
		<p><small class="description">Selecting a Slide Set ID will override any category selected.</small></p>
					<?php 
                    
					
						
						$slideset_data_ids  = substr(maybe_unserialize(get_option('slideset_data_ids')), 0, -1);  // trim last comma
						$slideset_data_ids = explode(",", $slideset_data_ids);

						if($slideset_data_ids) {			
								foreach ($slideset_data_ids as $slideset_data_ids) {
									$option='<input type="checkbox" id="'. $this->get_field_id( 'slidesetid' ) .'[]" name="'. $this->get_field_name( 'slidesetid' ) .'[]"';		
									if (is_array($instance['slidesetid'])) {
									foreach ($instance['slidesetid'] as $slidesets) {					
										if($slidesets==$slideset_data_ids) {
											$option=$option.' checked="checked"'; 
										}
									}
									} else {
										if($instance['slidesetid']==$slideset_data_ids) {
											$option=$option.' checked="checked"'; 
										} 										
									}
									$option .= ' value="'.$slideset_data_ids.'" />';
				
									$option .= ' '.$slideset_data_ids;
									$option .= '<br />';
									echo $option;
								}
						}						
										
					?>
 
        </p>
		<p>
        <h4>Categories</h4>

		<p>
			<label for="<?php echo $this->get_field_id( 'excerpt' ); ?>"><?php _e('Excerpt:', 'gallery'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'excerpt' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'excerpt' ); ?>" value="<?php echo $instance['excerpt']; ?>" style="width:50px" /><small class="description"><em>( Default is 55 words )</em></small>	
		</p>
        
        
        <label for="<?php echo $this->get_field_id( 'gallerycats' ); ?>"><?php _e('Select Post Categories:', 'Categories'); ?></label><br /><br />
			<?php 
				$categories=  get_categories(); 
				foreach ($categories as $cat) {
					$option='<input type="checkbox" id="'. $this->get_field_id( 'gallerycats' ) .'[]" name="'. $this->get_field_name( 'gallerycats' ) .'[]"';
					if (is_array($instance['gallerycats'])) {
					foreach ($instance['gallerycats'] as $cats) {					
					if($cats==$cat->term_id) {
						$option=$option.' checked="checked"'; 
					} elseif($cats==$cat->cat_name) {
						$option=$option.' checked="checked"'; 
					}
					}
					}
					$option .= ' value="'.$cat->cat_name.'" />';

                    $option .= ' '.$cat->cat_name;
                    $option .= ' ('.$cat->category_count.')';
                    $option .= '<br />';
                    echo $option;
                  }
				  
			?>		

		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'timeout' ); ?>"><?php _e('Timeout:', 'gallery'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'timeout' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'timeout' ); ?>" value="<?php echo $instance['timeout']; ?>" style="width:50px" /><small> seconds <em>( Default is 5 )</em></small>	
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'img_align' ); ?>"><?php _e('Image Align:', 'gallery'); ?></label> 
			<select id="<?php echo $this->get_field_id( 'img_align' ); ?>" name="<?php echo $this->get_field_name( 'img_align' ); ?>" class="widefat" style="width:100%;">
				<option value="" <?php if ( '' == $instance['img_align'] ) echo 'selected="selected"'; ?>>Left</option>
                <option value="alignright" <?php if ( 'alignright' == $instance['img_align'] ) echo 'selected="selected"'; ?>>Right</option>
                <option value="aligncenter" <?php if ( 'aligncenter' == $instance['img_align'] ) echo 'selected="selected"'; ?>>Center</option>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'content_type' ); ?>"><?php _e('Content Type:', 'gallery'); ?></label> 
			<select id="<?php echo $this->get_field_id( 'content_type' ); ?>" name="<?php echo $this->get_field_name( 'content_type' ); ?>" class="widefat" style="width:100%;">
				<option value="" <?php if ( '' == $instance['content_type'] ) echo 'selected="selected"'; ?>>Image</option>
                <option value="text" <?php if ( 'text' == $instance['content_type'] ) echo 'selected="selected"'; ?>>Text</option>
			</select>
		</p>

		<!-- Image Effect: Select Box -->
		<p>
			<label for="<?php echo $this->get_field_id( 'img_effect' ); ?>"><?php _e('Image Effect:', 'gallery'); ?></label> 
			<select id="<?php echo $this->get_field_id( 'img_effect' ); ?>" name="<?php echo $this->get_field_name( 'img_effect' ); ?>" class="widefat" style="width:100%;">
				<option value="none" <?php if ( 'none' == $instance['img_effect'] ) echo 'selected="selected"'; ?>>No Effect</option>
                <option value="shadow" <?php if ( 'shadow' == $instance['img_effect'] ) echo 'selected="selected"'; ?>>Shadow</option>
				<option value="reflection" <?php if ( 'reflection' == $instance['img_effect'] ) echo 'selected="selected"'; ?>>Reflection</option>
                <option value="shadowreflection" <?php if ( 'shadowreflection' == $instance['img_effect'] ) echo 'selected="selected"'; ?>>Reflection &amp; Shadow</option>
			</select>
		</p>


        <p>
        <label for="<?php echo $this->get_field_id( 'animation_type' ); ?>"><?php _e('Animation Type:', 'gallery'); ?></label> 
        <select id="<?php echo $this->get_field_id( 'animation_type' ); ?>" name="<?php echo $this->get_field_name( 'animation_type' ); ?>" class="widefat" style="width:100%;">
        <?php 
				 $animation_types = array("blindX","blindY","blindZ","cover","curtainX","curtainY","fade","fadeZoom","growX","growY","none","scrollUp","scrollDown","scrollLeft","scrollRight","scrollHorz","scrollVert","shuffle","slideX","slideY","toss","turnUp","turnDown","turnLeft","turnRight","uncover","wipe","zoom");
		 
                  foreach ($animation_types as $animation_type) {
				  	if($instance['animation_type']==$animation_type) {
                    $option = '<option selected="selected" value="'.$animation_type.'">';
					} else {
					$option = '<option value="'.$animation_type.'">';
					}
                    $option .= $animation_type;
                    $option .= '</option>';
                    echo $option;
                  } ?>
					

        </select>    
        </p>
        
        <p>
        <label for="<?php echo $this->get_field_id( 'tween_type' ); ?>"><?php _e('Tween Type:', 'gallery'); ?></label> 
        <select id="<?php echo $this->get_field_id( 'tween_type' ); ?>" name="<?php echo $this->get_field_name( 'tween_type' ); ?>" class="widefat" style="width:100%;">
        <?php 
				 $tween_types = array("linear","easeInSine","easeOutSine", "easeInOutSine", "easeInCubic", "easeOutCubic", "easeInOutCubic", "easeInQuint", "easeOutQuint", "easeInOutQuint", "easeInCirc", "easeOutCirc", "easeInOutCirc", "easeInBack", "easeOutBack", "easeInOutBack", "easeInQuad", "easeOutQuad", "easeInOutQuad", "easeInQuart", "easeOutQuart", "easeInOutQuart", "easeInExpo", "easeOutExpo", "easeInOutExpo", "easeInElastic", "easeOutElastic", "easeInOutElastic", "easeInBounce", "easeOutBounce", "easeInOutBounce");
		 
                  foreach ($tween_types as $tween_type) {
				  	if($instance['tween_type']==$tween_type) {
                    $option = '<option selected="selected" value="'.$tween_type.'">';
					} else {
					$option = '<option value="'.$tween_type.'">';
					}
                    $option .= $tween_type;
                    $option .= '</option>';
                    echo $option;
                  } ?>
					

        </select>    
        </p>

	<?php
	}
}

?>
