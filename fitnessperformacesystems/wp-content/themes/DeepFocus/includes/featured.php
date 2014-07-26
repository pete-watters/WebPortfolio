<?php 
	$responsive = 'on' != get_option('deepfocus_responsive_layout') ? false : true;
	$featured_auto_class = '';
	if ( 'on' == get_option('deepfocus_slider_auto') ) $featured_auto_class .= ' et_slider_auto et_slider_speed_' . get_option('deepfocus_slider_autospeed');
?>
<?php if ( $responsive ) echo '<div class="flex-container">'; ?>
<div id="featured"<?php if ( $responsive ) echo ' class="flexslider' . $featured_auto_class . '"'; else echo ' class="et_cycle"'; ?>>
	<span id="left-shadow"></span>
	<span id="right-shadow"></span>
	
<?php if ( $responsive ) { ?>
	<ul class="slides">
<?php } else { ?>
	<div id="slides">
<?php } ?>
		<?php global $ids;
		$ids = array(); 
		
		$featured_cat = get_option('deepfocus_feat_cat'); 
		$featured_num = (int) get_option('deepfocus_featured_num'); 
	
		if (get_option('deepfocus_use_pages') == 'false') query_posts("showposts=$featured_num&cat=".get_cat_ID($featured_cat));
		else {
			global $pages_number;
			
			if (get_option('deepfocus_feat_pages') <> '') $featured_num = count(get_option('deepfocus_feat_pages'));
			else $featured_num = $pages_number;
			
			query_posts(array
							('post_type' => 'page',
							'orderby' => 'menu_order',
							'order' => 'ASC',
							'post__in' => (array) get_option('deepfocus_feat_pages'),
							'showposts' => $featured_num
						));
		} ?>
		<?php if (have_posts()) : while (have_posts()) : the_post();
		global $post; ?>
		<?php if ( $responsive ) { ?>
			<li class="slide">
		<?php } else { ?>
			<div class="slide">
		<?php } ?>
				<?php 
				$width = 960;
				$height = 447;
				$titletext = get_the_title();
	
				$thumbnail = get_thumbnail($width,$height,'',$titletext,$titletext,false,'Featured');
				$thumb = $thumbnail["thumb"];
				print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, ''); ?>
				<div class="overlay"></div>
				<div class="overlay2"></div>
				
				<div class="description">
					<div class="outer-content">
						<div class="inner-content">
							<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p><?php truncate_post(460); ?></p>
						</div> <!-- end .inner-content -->
					</div> <!-- end .outer-content -->
					
					<div class="bottom">
						<a href="<?php the_permalink(); ?>" class="readmore"><span><?php esc_html_e('Read More','DeepFocus'); ?></span></a>
					</div> <!-- end .bottom -->
				</div> <!-- end .description -->
		<?php if ( $responsive ) { ?>
			</li> <!-- end .slide -->
		<?php } else { ?>
			</div> <!-- end .slide -->
		<?php } ?>
		<?php $ids[] = $post->ID; endwhile; endif; wp_reset_query(); ?>
<?php if ( $responsive ) { ?>
	</ul> <!-- end .slides -->
<?php } else { ?>
	</div> <!-- end #slides -->
<?php } ?>	
								
	<div id="controllers-wrapper">
		<div id="controllers">
			<a href="#" id="left-arrow"><?php esc_html_e('Previous','DeepFocus'); ?></a>
			
			<?php for ($i=1; $i <= count($ids); $i++) { ?>
				<a href="#" rel="<?php echo $i; ?>" class="switch<?php if ($i == 1) echo(' active'); ?>"><?php echo $i; ?></a>
			<?php } ?>
			
			<a href="#" id="right-arrow"><?php esc_html_e('Next','DeepFocus'); ?></a>
		</div>	<!-- end #controllers -->
		<div id="controllers-right"></div>
	</div> <!-- end #controllers-wrapper -->
</div>	<!-- end #featured -->
<?php if ( $responsive ) echo '</div> <!-- end .flex-container -->'; ?>