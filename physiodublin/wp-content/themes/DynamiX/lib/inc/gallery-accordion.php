<?php 

if($DYN_imgheight) {
$DYN_galleryheight=$DYN_imgheight; // No Reflection
} else {
$DYN_galleryheight="350"; // Set default Gallery Height
$DYN_imgheight="350"; // Set default Gallery Height
}

$DYN_gallerywidth="940";

?>

<div id="cwz-accordion" class="accordion-gallery-wrap <?php if($DYN_imageeffect=="shadow") { ?>shadow<?php } elseif($DYN_imageeffect=="reflection") { ?>reflection<?php } elseif($DYN_imageeffect=="shadowreflection") { ?>shadowreflection<?php } ?> stage">
    <ul class="accordion-gallery stage" style="height:<?php echo $DYN_galleryheight; ?>px">
	 
<?php 

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

$DYN_imgwidth=$DYN_gallerywidth / $post_count;
$DYN_imgwidth=round($DYN_gallerywidth - $DYN_imgwidth);

?>

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

<?php require CWZ_FILES .'/inc/accordion-gallery-frame.php'; ?>  

<?php endwhile; 

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

$DYN_imgwidth=$DYN_gallerywidth / $post_count;
$DYN_imgwidth=$DYN_gallerywidth - $DYN_imgwidth;


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

<?php require CWZ_FILES .'/inc/accordion-gallery-frame.php'; ?>  

<?php 
$z++;
endwhile; 
}
}

$postcount = 0; ?>

	</ul>
</div><!-- / accordion-gallery -->
<?php if(!$DYN_stagetimeout) { $DYN_stagetimeout = "10"; }; ?>
<?php if(!$DYN_accordionautoplay) {$DYN_accordionautoplay="false";} else {$DYN_accordionautoplay="true";} ?>
<script type="text/javascript">
<!--
	jQuery().ready(function() {
		jQuery('.accordion-gallery.stage').kwicks({
		autorotation: <?php echo $DYN_accordionautoplay; ?>,
		event: 'mouseover',
		autorotationSpeed:<?php echo $DYN_stagetimeout; ?>,
		easing: 'easeInOutCubic',
		duration: 700,
		id: 'cwz-accordion'
		});
	});	

//-->
</script>