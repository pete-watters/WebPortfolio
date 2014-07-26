<?php 

$DYN_galleryheight	= ($DYN_galleryheight	!="") ? $DYN_galleryheight	: '415';
$DYN_imgheight 		= ($DYN_imgheight		!="") ? $DYN_imgheight		: '160';
$DYN_imgwidth 		= ($DYN_imgwidth		!="") ? $DYN_imgwidth		: '290';
$DYN_shadowsize		= "shadow-medium";

if(!$DYN_slidesetid) { // If no Slide Set is selected use Categories

$postcount = 0;

if($DYN_gallerycat) {

	foreach ($DYN_gallerycat as $catlist) { // Get category ID Array
		$cats = $cats.",".$catlist;
	}
	
	if($DYN_gallerynumposts) { // Number of posts to display
		$numposts = $DYN_gallerynumposts;
	} else {
		$numposts = -1;
	}
	
	if($DYN_gallerysortby) { // Sort Posts by
		$sortby = $DYN_gallerysortby;
	} else {
		$sortby = "meta_value";
	}
	
	if($DYN_galleryorderby) {
		$orderby = $DYN_galleryorderby;
	} else {
		$orderby = "ASC";
	}
	
	$cats = lTrim($cats,',');

	$cat_isnum = str_replace(",","", $cats); // join cats to check if numeric

	if (is_numeric ($cat_isnum)) { // backwards compatible with post id
		$cat_type= "cat";
	} else {
		$cat_type= "category_name"; // if not numeric, use category name
	}

   $args=array(
	'post_type' => 'post',
	'post_status' => 'publish',
	'meta_key' => 'Order',
	$cat_type => $cats,
	'paged' => $paged,
	'orderby' => $sortby,
	'order' => $orderby,
	'posts_per_page' => $numposts,
	'caller_get_posts'=> 1
	);

	$featured_query = new wp_query($args); 

}
else { // If no options select display all categories

$args=array(
      'post_type' => 'post',
      'post_status' => 'publish',
	  'meta_key' => 'Order',
	  'paged' => $paged,
	  'orderby' => $sortby,
	  'order' => $orderby,
	  'posts_per_page' => $numposts,
      'caller_get_posts'=> 1
      );


	$featured_query = new wp_query($args);
} 


$post_count = $featured_query->post_count; // Check how many posts in query.

?>

<div class="gallery-wrap clearfix" <?php if($DYN_galleryheight) { ?> style="height: <?php echo $DYN_galleryheight; ?>px" <?php } else { ?> style="height:415px;" <?php } ?>>
	<div class="slidernav-left">
<?php if($post_count>"3") { ?>
		<div class="slidernav">
			<a id="leftnav" href="#"><img src="<?php bloginfo("template_url"); ?>/images/blank.gif" width="22px" height="32px" alt="navigate left" /></a>
		</div>
<?php } ?>
	</div>
     
	<div class="group-slider">

<?php 
while ($featured_query->have_posts()) : $featured_query->the_post(); 

/******************  Get custom field data ******************/             

$pdata = maybe_unserialize(get_post_meta( $post->ID, 'pgopts', true ));

$DYN_movieurl = $pdata["movieurl"]; // Movie File URL
$DYN_previewimgurl=$pdata["previewimgurl"]; // Preview Image URL
$DYN_imgzoomcrop=$pdata["imgzoomcrop"];
$DYN_disablegallink=$pdata["disablegallink"];
$DYN_disablereadmore=$pdata["disablereadmore"];
$DYN_galexturl=$pdata["galexturl"];
$DYN_videotype=$pdata["videotype"];
$DYN_videoautoplay=$pdata["videoautoplay"];
$DYN_cssclasses = $pdata["cssclasses"];

if($DYN_imgzoomcrop=="zoom") {
	$DYN_imgzoomcrop="1";
} elseif($DYN_imgzoomcrop=="zoom crop") {
	$DYN_imgzoomcrop="3";
} else {
	$DYN_imgzoomcrop="0";
}

if($DYN_videoautoplay) {
	$DYN_videoautoplay = "1";
} else {
	$DYN_videoautoplay ="0";	
}

/****************** / Get custom field data *****************/ 

$do_not_duplicate[] = get_the_ID();

$postcount++;

$image = catch_image(); // Check for images within post

$slide_id='';
$slide_id="slide-".$post->ID;

if(!get_option('timthumb_disable')) { // Check is Timthumb is Enabled or Disabled
	$DYN_imagepath = get_bloginfo('template_directory')."/lib/scripts/timthumb.php?h=". $DYN_imgheight ."&amp;w=". $DYN_imgwidth ."&amp;zc=". $DYN_imgzoomcrop ."&amp;src="; 
} else {
	$DYN_imagepath="";
}

?>

<?php require CWZ_FILES .'/inc/group-gallery-frame.php'; ?>  

<?php endwhile; 

if($postcount!="0") { $postcount="0"; // Check to see if end tag needs to be set ?>
	</div><!--  / panelwrap -->
<?php } 

wp_reset_query();

} else { // Get Slide Set Data

$postcount=0;
						
$DYN_slidesetids = explode(",", $DYN_slidesetid);
					
if(is_array($DYN_slidesetids)) {
	foreach ($DYN_slidesetids as $DYN_slidesetid) { 
		$get_slideset = get_option("slideset_data_".$DYN_slidesetid);		
		$post_count = $post_count+$get_slideset['slideset_id_slide_count'];
	}
} else {
	$get_slideset_data 	= get_option("slideset_data_".$DYN_slidesetids);
	$post_count = $get_slideset_data['slideset_id_slide_count'];		
}
?>

<div class="gallery-wrap clearfix" <?php if($DYN_galleryheight) { ?> style="height: <?php echo $DYN_galleryheight; ?>px" <?php } else { ?> style="height:415px;" <?php } ?>>
	<div class="slidernav-left">
<?php if($post_count>"3") { ?>
		<div class="slidernav">
			<a id="leftnav" href="#"><img src="<?php bloginfo("template_url"); ?>/images/blank.gif" width="22px" height="32px" alt="navigate left" /></a>
		</div>
<?php } ?>
	</div>
     
	<div class="group-slider">

<?php 


foreach($DYN_slidesetids as $DYN_slidesetid) {
$z = 0;
$get_slideset_data 	= get_option("slideset_data_".$DYN_slidesetid);
$get_slides_count = $get_slideset_data['slideset_id_slide_count'];

while ($z < $get_slides_count):

/******************  Get Slide Set data ******************/ 	

$DYN_disablegallink="";
	
$DYN_movieurl = $get_slideset_data['slideset_id_videourl_'.$z]; // Movie File URL
$DYN_previewimgurl=$get_slideset_data['slideset_id_url_'.$z]; // Preview Image URL
$DYN_imgzoomcrop=strtolower($get_slideset_data['slideset_id_crop_'.$z]);
$DYN_cssclasses = $get_slideset_data['slideset_id_cssclasses_'.$z];

if(!$get_slideset_data['slideset_id_link_'.$z]) {
$DYN_disablegallink="yes";
} 

$DYN_disablereadmore=$get_slideset_data['slideset_id_disreadmore_'.$z];

$DYN_galexturl=$get_slideset_data['slideset_id_link_'.$z];
$DYN_videotype=strtolower($get_slideset_data['slideset_id_embed_'.$z]);

$DYN_videoautoplay=$get_slideset_data['slideset_id_autoplay_'.$z];
$DYN_posttitle=stripslashes($get_slideset_data['slideset_id_title_'.$z]);
$DYN_description=stripslashes($get_slideset_data['slideset_id_desc_'.$z]);

if($DYN_imgzoomcrop=="zoom") {
	$DYN_imgzoomcrop="1";
} elseif($DYN_imgzoomcrop=="zoom crop") {
	$DYN_imgzoomcrop="3";
} else {
	$DYN_imgzoomcrop="0";
}

if($DYN_videoautoplay) {
	$DYN_videoautoplay = "1";
} else {
	$DYN_videoautoplay ="0";	
}	

/******************  / Get Slide Set data ******************/

$postcount++; 

$slide_id='';
$slide_id="slideset".$slideset_id."-".$z;

if(!get_option('timthumb_disable')) { // Check is Timthumb is Enabled or Disabled
	$DYN_imagepath = get_bloginfo('template_directory')."/lib/scripts/timthumb.php?h=". $DYN_imgheight ."&amp;w=". $DYN_imgwidth ."&amp;zc=". $DYN_imgzoomcrop ."&amp;src="; 
} else {
	$DYN_imagepath="";
}

?>

<?php require CWZ_FILES .'/inc/group-gallery-frame.php'; ?>  

<?php 
$z++;
endwhile; 
}

if($postcount!="0") { $postcount="0"; // Check to see if end tag needs to be set ?>
	</div><!--  / panelwrap -->
<?php } 

}

$postcount = 0; ?>


</div><!-- / groupslider -->
<div class="slidernav-right">
<?php if($post_count>"3") { ?>
	<div class="slidernav">
		<a id="rightnav" href="#"><img src="<?php bloginfo("template_url"); ?>/images/blank.gif" width="22px" height="32px" alt="navigate left" /></a>
	</div>
<?php } ?>
</div>
<div class="clear"></div>
</div><!-- / gallerywrap -->

<script type="text/javascript">
<!--
jQuery(window).load(function() {
<?php if(!$DYN_stagetimeout) $DYN_slidetimeout = "0"; else $DYN_slidetimeout = $DYN_stagetimeout * 1000; ?>
	jQuery('.group-slider').cycle({ 
		fx:     'scrollHorz', 
		timeout: <?php echo $DYN_slidetimeout; ?>,
		speed: 750,
		before:  	
		function() { 
   		var videoid = jQuery(this).find('.jwplayer').attr("id");
		jQuery(".group-slider").find('.jwplayer').each(function(index) {
					str='';
					str = jQuery(this).attr("id");
					if(str!=videoid) {
						if(str.search("video")==-1) {
						jwplayer(str).stop();
						}
					}					 
		});
	
	} ,
		after:  function() { 
   		var videoid = jQuery(this).find('.jwplayer').attr("id");
		jQuery(this).find('.jwplayer').each(function(index) {
					str='';
					str = jQuery(this).attr("id");
					autostart = jQuery(this).attr("class");
					if(str==videoid) {
					
						if(str.search("video")==-1 && autostart.search("autostart")!=-1) {
						jwplayer(str).stop().play();
						}
					}					 
		});
					
	} ,		
		easing: 'easeInOutExpo',
		prev: '#leftnav',
		next: '#rightnav'
	});

});



	

	jQuery(window).load(function() {
		var firstvideo = jQuery(".group-slider").find('.jwplayer.first').attr("id");
		if(firstvideo) {
			var autostart = jQuery('#'+firstvideo).attr("class");
			if(autostart.search("autostart")!=-1) {
				jwplayer(firstvideo).stop().play();
			}
		}
	});

//-->
</script>