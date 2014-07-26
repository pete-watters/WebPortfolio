<?php 

if($DYN_imgheight) {
$DYN_galleryheight=$DYN_imgheight; // No Reflection
} else {
$DYN_galleryheight="350"; // Set default Gallery Height
}

if(!$DYN_imgwidth) { // Set Default Width
	$DYN_imgwidth="940";
}

$DYN_orgimgwidth=$DYN_imgwidth;

if($DYN_imageeffect=="reflection" || $DYN_imageeffect=="shadowreflection") {	 
	$DYN_galleryheight=$DYN_galleryheight+"55"; 
} else {
	$DYN_galleryheight=$DYN_galleryheight+"40"; 
} 

// Calculate height of Gallery based on Image Height ?>

<div class="gallerywrap stage-slider-wrap" style="height:<?php echo $DYN_galleryheight; ?>px">
<?php if($DYN_stageplaypause!="disabled") { ?>
<div class="control-wrap">
<?php if($DYN_stageplaypause=="enabled") { ?>
	<div class="stage-control">
		<ul>
			<li><a href="#" id="stage-prev"><img src="<?php bloginfo('template_url'); ?>/images/blank.gif" width="20" height="34" alt="Previous Slide" /></a></li>
			<li id="stage-pauseresume">
				<span id="stage-pause"><img src="<?php bloginfo('template_url'); ?>/images/blank.gif" width="26" height="34" alt="Pause" /></span>
				<span id="stage-resume" style="display:none;"><img src="<?php bloginfo('template_url'); ?>/images/blank.gif" width="26" height="34" alt="Resume" /></span>
			</li>
			<li><a href="#" id="stage-next"><img src="<?php bloginfo('template_url'); ?>/images/blank.gif" width="20" height="34" alt="Next Slide" /></a></li>
		</ul>
    </div>
<?php } ?>    
	<div class="control-panel">

	</div><!-- / control-panel -->
</div><!-- / control-wrap -->
<?php } ?>
<div class="stage-slider">

<?php if(!$DYN_slidesetid) { // If no Slide Set is selected use Categories ?>

<?php $postcount = 0;

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


while ($featured_query->have_posts()) : $featured_query->the_post(); 

/******************  Get custom field data ******************/             

$pdata = maybe_unserialize(get_post_meta( $post->ID, 'pgopts', true ));

$DYN_movieurl = $pdata["movieurl"]; // Movie File URL
$DYN_previewimgurl=$pdata["previewimgurl"]; // Preview Image URL
$DYN_stagegallery=$pdata["stagegallery"]; // Stage Layout
$DYN_disablegallink=$pdata["disablegallink"];
$DYN_disablereadmore=$pdata["disablereadmore"];
$DYN_galexturl=$pdata["galexturl"];
$DYN_imgzoomcrop=$pdata["imgzoomcrop"];
$DYN_displaytitle=$pdata["displaytitle"];
$DYN_postsubtitle=$pdata["postsubtitle"];
$DYN_posttitle=$pdata["posttitle"];
$DYN_videotype=$pdata["videotype"];
$DYN_videoautoplay=$pdata["videoautoplay"];
$DYN_slidetimeout=$pdata["slidetimeout"];
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

if($DYN_videotype !="" && $postcount!="1") { // Stop IE autoplaying hidden video onload. 
	$display_none ="";
	$display_none = "yes";
}

$slide_id='';
$slide_id="slide-".$post->ID;

	$DYN_stagelayout='';
	if($DYN_stagegallery=="textimageleft") { 
		$DYN_stagelayout="width:640px;float:left";	
		$DYN_imgwidth="640";
	} elseif($DYN_stagegallery=="textimageright") {
		$DYN_stagelayout="width:640px;float:right";	
		$DYN_imgwidth="640";
	} else {
		$DYN_imgwidth=$DYN_orgimgwidth;
	}
	

if(!get_option('timthumb_disable')) { // Check is Timthumb is Enabled or Disabled
	$DYN_imagepath = get_bloginfo('template_directory')."/lib/scripts/timthumb.php?h=". $DYN_imgheight ."&amp;w=". $DYN_imgwidth ."&amp;zc=". $DYN_imgzoomcrop ."&amp;src="; 
} else {
	$DYN_imagepath="";
}

?>

<?php require CWZ_FILES .'/inc/stage-gallery-frame.php'; ?>   
        
<?php if($DYN_slidetimeout) {
	$DYN_slidearray = $DYN_slidearray . $DYN_slidetimeout .","; 
} elseif($DYN_stagetimeout) {
	$DYN_slidearray = $DYN_slidearray . $DYN_stagetimeout .","; 
} else {
	$DYN_slidearray = $DYN_slidearray . "10,";
} ?>   

<?php endwhile; ?>

<?php wp_reset_query();

} else { // Use Slide Set

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
$DYN_stagegallery=$get_slideset_data['slideset_id_stagecontent_'.$z]; // Stage Layout
$DYN_cssclasses = $get_slideset_data['slideset_id_cssclasses_'.$z];

if($DYN_stagegallery=="Image Only") { $DYN_stagegallery="image"; } elseif($DYN_stagegallery=="Text/Image (Left Align)") { $DYN_stagegallery="textimageleft"; } elseif($DYN_stagegallery=="Text/Image (Right Align)") { $DYN_stagegallery="textimageright"; } elseif($DYN_stagegallery=="Title Overlay Image") { $DYN_stagegallery="titleoverlay"; } elseif($DYN_stagegallery=="Title / Text Overlay Image") { $DYN_stagegallery="titletextoverlay"; } elseif($DYN_stagegallery=="Text Only") { $DYN_stagegallery="textonly"; }

$DYN_displaytitle=strtolower($get_slideset_data['slideset_id_overlay_'.$z]);

if(!$get_slideset_data['slideset_id_link_'.$z]) {
$DYN_disablegallink="yes";
} 

$DYN_disablereadmore=$get_slideset_data['slideset_id_disreadmore_'.$z];

$DYN_galexturl=$get_slideset_data['slideset_id_link_'.$z];
$DYN_videotype=strtolower($get_slideset_data['slideset_id_embed_'.$z]);

$DYN_videoautoplay=$get_slideset_data['slideset_id_autoplay_'.$z];
$DYN_posttitle=stripslashes($get_slideset_data['slideset_id_title_'.$z]);
$DYN_description=stripslashes($get_slideset_data['slideset_id_desc_'.$z]);
$DYN_slidetimeout=$get_slideset_data['slideset_id_timeout_'.$z];

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

if($DYN_videotype !="" && $postcount!="1") { // Stop IE autoplaying hidden video onload. 
	$display_none ="";
	$display_none = "yes";
}

$slide_id='';
$slide_id="slideset".$slideset_id."-".$z;

	$DYN_stagelayout='';
	if($DYN_stagegallery=="textimageleft") { 
		$DYN_stagelayout="width:640px;float:left";	
		$DYN_imgwidth="640";
	} elseif($DYN_stagegallery=="textimageright") {
		$DYN_stagelayout="width:640px;float:right";	
		$DYN_imgwidth="640";
	} else {
		$DYN_imgwidth=$DYN_orgimgwidth;
	}

if(!get_option('timthumb_disable')) { // Check is Timthumb is Enabled or Disabled
	$DYN_imagepath = get_bloginfo('template_directory')."/lib/scripts/timthumb.php?h=". $DYN_imgheight ."&amp;w=". $DYN_imgwidth ."&amp;zc=". $DYN_imgzoomcrop ."&amp;src="; 
} else {
	$DYN_imagepath="";
}

?>

<?php require CWZ_FILES .'/inc/stage-gallery-frame.php'; ?>   
        
<?php if($DYN_slidetimeout) {
	$DYN_slidearray = $DYN_slidearray . $DYN_slidetimeout .","; 
} elseif($DYN_stagetimeout) {
	$DYN_slidearray = $DYN_slidearray . $DYN_stagetimeout .","; 
} else {
	$DYN_slidearray = $DYN_slidearray . "10,";
}

$z++;

endwhile;
}

}

$postcount = 0; ?>

</div><!-- / stageslider -->

<div class="clear"></div>
<script type='text/javascript'>
<!--
jQuery(document).ready(function() {

	jQuery('.control-panel').append('<ul class="nav"></ul>');

	jQuery('.stage-slider').cycle({ 
		fx:     'fade', 
		timeoutFn: calculateTimeout,
		speed: 750,
		before:  onBefore,
		after:  onAfter,
		pager:  '.control-panel .nav',
		pause:  1,
		cleartype:  true,
    	cleartypeNoBg:  true,
		next:   '#stage-next', 
    	prev:   '#stage-prev',
		
		pagerAnchorBuilder: function(idx, slide) { 
        return '<li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/blank.gif" width="16" height="16" alt="slide" /></a></li>'; 
    } 
	
	});



	function onBefore() { 
   		var videoid = jQuery(this).find('.jwplayer').attr("id");
			
		jQuery('.jwplayer').each(function(index) {
					str='';
					str = jQuery(this).attr("id");
					if(str!=videoid) {
						if(str.search("video")==-1) {
						jwplayer(str).stop();
						}
					}					 
		});
	
	} 

	function onAfter() { 

   		var videoid = jQuery(this).find('.jwplayer').attr("id");
			
		jQuery('.jwplayer').each(function(index) {
					str='';
					str = jQuery(this).attr("id");
					autostart = jQuery(this).attr("class");
					if(str==videoid) {
						if(str.search("video")==-1 && autostart.search("autostart")!=-1) {
						jwplayer(str).stop().play();
						}
					}					 
		});
					
	} 






	jQuery('#stage-pause').click(function() { 
		jQuery('.stage-slider').cycle('pause'); 
	});
	
	jQuery('#stage-resume').click(function() { 
		jQuery('.stage-slider').cycle('resume'); 
	});
	
	jQuery("#stage-pauseresume").click(function () {
			jQuery("#stage-pauseresume span").toggle();
	});	

});
//-->


// timeouts per slide (in seconds) 
var timeouts = [<?php echo $DYN_slidearray; ?>]; 
function calculateTimeout(currElement, nextElement, opts, isForward) { 
    var index = opts.currSlide; 
    return timeouts[index] * 1000; 
} 
</script>
</div><!-- / gallerywrap -->
