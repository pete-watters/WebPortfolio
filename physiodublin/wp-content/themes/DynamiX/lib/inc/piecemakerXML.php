<?php header("Content-type: text/xml; charset: UTF-8");
require_once( '../../../../../wp-load.php' );

if($_SESSION['piecemaker_ID']) $page_id = $_SESSION['piecemaker_ID'];

$data = maybe_unserialize(get_post_meta($page_id, 'pgopts', true )); // Call custom page attributes  

$DYN_show_slider=$data["gallery"];
$DYN_gallerycat=$data["gallerycat"];
$DYN_slidesetid=$data["slideset"];
$DYN_imageeffect=$data["imageeffect"];
$DYN_gallerynumposts=$data["gallerynumposts"];
$DYN_gallerysortby=$data["gallerysortby"];
$DYN_galleryorderby=$data["galleryorderby"];

$DYN_imgheight 		= ($data["imgheight"]			!="") ? $data["imgheight"]				: '350';
$DYN_imgwidth 		= ($data["imgwidth"]			!="") ? $data["imgwidth"]				: '940';
$CWZ_3dsegments		= ($data["gallery3dsegments"]	!="") ? $data["gallery3dsegments"]		: "15";
$CWZ_3dincolor		= ($data["gallery3dincolor"]	!="") ? "0x".$data["gallery3dincolor"]	: "0x111111";
$CWZ_3dtxtbcolor	= ($data["gallery3dtextcolor"]	!="") ? "0x".$data["gallery3dtextcolor"]: "0x111111";
$CWZ_3dtween		= ($data["gallery3dtween"]		!="") ? $data["gallery3dtween"]			: "linear";
$CWZ_3dtweentime	= ($data["gallery3dtweentime"]	!="") ? $data["gallery3dtweentime"]		: "1.2";
$CWZ_3dtweendelay	= ($data["gallery3dtweendelay"] !="") ? $data["gallery3dtweendelay"]	: "0.1";
$CWZ_3dzdistance	= ($data["gallery3dzdistance"]	!="") ? $data["gallery3dzdistance"]		: "0";
$CWZ_3dexpand		= ($data["gallery3dexpand"]		!="") ? $data["gallery3dexpand"]		: "20";
$CWZ_3dtextdist		= ($data["gallery3dtextdist"]	!="") ? $data["gallery3dtextdist"]		: "25";
$CWZ_3dtimeout		= ($data["stagetimeout"]		!="") ? $data["stagetimeout"]			: "10";
$CWZ_shadow 		= "100"; 
$CWZ_gallery3dypos	= ($data["gallery3dypos"]		!="") ? $data["gallery3dypos"]			: '280';
$CWZ_gallery3dxpos	= ($data["gallery3dxpos"]		!="") ? $data["gallery3dxpos"]			: '470';


echo '<?xml version="1.0" encoding="utf-8" ?>

<Piecemaker>
	<Contents>';

if($DYN_imgheight) {
$DYN_galleryheight=$DYN_imgheight; // No Reflection
} else {
$DYN_galleryheight="350"; // Set default Gallery Height
}


if($DYN_imageeffect=="reflection" || $DYN_imageeffect=="shadowreflection") {	 

	$DYN_galleryheight=$DYN_galleryheight+"55"; 

} else {
	$DYN_galleryheight=$DYN_galleryheight+"40"; 
} 

// Calculate height of Gallery based on Image Height 


?>

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

ob_start();

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

$CWZ_3dsegments_slide	= ($pdata["gallery3dsegments"]		!="") ? $pdata["gallery3dsegments"]		: $CWZ_3dsegments;
$CWZ_3dtween_slide		= ($pdata["gallery3dtween"]			!="") ? $pdata["gallery3dtween"]		: $CWZ_3dtween;
$CWZ_3dtweentime_slide	= ($pdata["gallery3dtweentime"]		!="") ? $pdata["gallery3dtweentime"]	: $CWZ_3dtweentime;
$CWZ_3dtweendelay_slide	= ($pdata["gallery3dtweendelay"] 	!="") ? $pdata["gallery3dtweendelay"]	: $CWZ_3dtweendelay;
$CWZ_3dzdistance_slide	= ($pdata["gallery3dzdistance"]		!="") ? $pdata["gallery3dzdistance"]	: $CWZ_3dzdistance;
$CWZ_3dexpand_slide		= ($pdata["gallery3dexpand"]		!="") ? $pdata["gallery3dexpand"]		: $CWZ_3dexpand;

if($CWZ_transitions) {
array_push($CWZ_transitions,'<Transition Pieces="'.$CWZ_3dsegments_slide.'" Time="'.$CWZ_3dtweentime_slide.'" Transition="'.$CWZ_3dtween_slide.'" Delay="'.$CWZ_3dtweendelay_slide.'"  DepthOffset="'.$CWZ_3dzdistance_slide.'" CubeDistance="'.$CWZ_3dexpand_slide.'"></Transition>');
} else {
$CWZ_transitions = array($CWZ_transitions,'<Transition Pieces="'.$CWZ_3dsegments_slide.'" Time="'.$CWZ_3dtweentime_slide.'" Transition="'.$CWZ_3dtween_slide.'" Delay="'.$CWZ_3dtweendelay_slide.'"  DepthOffset="'.$CWZ_3dzdistance_slide.'" CubeDistance="'.$CWZ_3dexpand_slide.'"></Transition>');
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

if(!get_option('timthumb_disable')) { // Check is Timthumb is Enabled or Disabled
	$DYN_imagepath = get_bloginfo('template_directory')."/lib/scripts/timthumb.php?h=". $DYN_imgheight ."&amp;w=". $DYN_imgwidth ."&amp;zc=". $DYN_imgzoomcrop ."&amp;src="; 
} else {
	$DYN_imagepath="";
}
?>

<?php require CWZ_FILES .'/inc/piecemaker-frame.php'; ?>

<?php endwhile; ?>

<?php wp_reset_query();

$output_string="";
$output_string=ob_get_contents();
ob_end_clean();

echo $output_string;


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

ob_start();

while ($z < $get_slides_count):

/******************  Get Slide Set data ******************/ 	

$DYN_disablegallink="";

	
$DYN_movieurl = $get_slideset_data['slideset_id_videourl_'.$z]; // Movie File URL
$DYN_previewimgurl=$get_slideset_data['slideset_id_url_'.$z]; // Preview Image URL
$DYN_imgzoomcrop=strtolower($get_slideset_data['slideset_id_crop_'.$z]);
$DYN_stagegallery=$get_slideset_data['slideset_id_stagecontent_'.$z]; // Stage Layout
$DYN_disablereadmore=$get_slideset_data['slideset_id_disreadmore_'.$z]; // Disable Read More
$DYN_cssclasses = $get_slideset_data['slideset_id_cssclasses_'.$z];

if($DYN_stagegallery=="Image Only") { $DYN_stagegallery="image"; } elseif($DYN_stagegallery=="Text/Image (Left Align)") { $DYN_stagegallery="textimageleft"; } elseif($DYN_stagegallery=="Text/Image (Right Align)") { $DYN_stagegallery="textimageright"; }

$DYN_displaytitle=strtolower($get_slideset_data['slideset_id_overlay_'.$z]);

if(!$get_slideset_data['slideset_id_link_'.$z]) {
$DYN_disablegallink="yes";
} 

$DYN_galexturl=$get_slideset_data['slideset_id_link_'.$z];
$DYN_videotype=strtolower($get_slideset_data['slideset_id_embed_'.$z]);

$DYN_videoautoplay=$get_slideset_data['slideset_id_autoplay_'.$z];
$DYN_posttitle=stripslashes($get_slideset_data['slideset_id_title_'.$z]);
$DYN_description=stripslashes($get_slideset_data['slideset_id_desc_'.$z]);
$DYN_slidetimeout=$get_slideset_data['slideset_id_timeout_'.$z];

if($DYN_videoautoplay) {
	$DYN_videoautoplay = "1";
} else {
	$DYN_videoautoplay ="0";	
}	

// Get Individual SlideSet Settings - If empty use Default Gallery Settings

$CWZ_3dsegments_slide	= ($get_slideset_data['slideset_id_segments_'.$z]		!="") ? $get_slideset_data['slideset_id_segments_'.$z]			: $CWZ_3dsegments;
$CWZ_3dtween_slide		= ($get_slideset_data['slideset_id_transition_'.$z]		!="") ? $get_slideset_data['slideset_id_transition_'.$z]		: $CWZ_3dtween;
$CWZ_3dtweentime_slide	= ($get_slideset_data['slideset_id_transtime_'.$z]		!="") ? $get_slideset_data['slideset_id_transtime_'.$z]			: $CWZ_3dtweentime;
$CWZ_3dtweendelay_slide	= ($get_slideset_data['slideset_id_transdelay_'.$z]		!="") ? $get_slideset_data['slideset_id_transdelay_'.$z]		: $CWZ_3dtweendelay;
$CWZ_3dzdistance_slide	= ($get_slideset_data['slideset_id_depthoffset_'.$z]	!="") ? $get_slideset_data['slideset_id_depthoffset_'.$z]		: $CWZ_3dzdistance;
$CWZ_3dexpand_slide		= ($get_slideset_data['slideset_id_cubdedistance_'.$z]	!="")  ? $get_slideset_data['slideset_id_cubdedistance_'.$z]	: $CWZ_3dexpand;

if($CWZ_transitions) {
array_push($CWZ_transitions,'<Transition Pieces="'.$CWZ_3dsegments_slide.'" Time="'.$CWZ_3dtweentime_slide.'" Transition="'.$CWZ_3dtween_slide.'" Delay="'.$CWZ_3dtweendelay_slide.'"  DepthOffset="'.$CWZ_3dzdistance_slide.'" CubeDistance="'.$CWZ_3dexpand_slide.'"></Transition>');
} else {
$CWZ_transitions = array($CWZ_transitions,'<Transition Pieces="'.$CWZ_3dsegments_slide.'" Time="'.$CWZ_3dtweentime_slide.'" Transition="'.$CWZ_3dtween_slide.'" Delay="'.$CWZ_3dtweendelay_slide.'"  DepthOffset="'.$CWZ_3dzdistance_slide.'" CubeDistance="'.$CWZ_3dexpand_slide.'"></Transition>');
}

/******************  / Get Slide Set data ******************/

if($DYN_videotype !="" && $postcount!="1") { // Stop IE autoplaying hidden video onload. 
	$display_none ="";
	$display_none = "yes";
}

if(!get_option('timthumb_disable')) { // Check is Timthumb is Enabled or Disabled
	$DYN_imagepath = get_bloginfo('template_directory')."/lib/scripts/timthumb.php?h=". $DYN_imgheight ."&amp;w=". $DYN_imgwidth ."&amp;zc=". $DYN_imgzoomcrop ."&amp;src="; 
} else {
	$DYN_imagepath="";
}

?>

<?php require CWZ_FILES .'/inc/piecemaker-frame.php'; ?>
        

<?php $z++;

endwhile;

$output_string="";
$output_string=ob_get_contents();
ob_end_clean();

echo $output_string;
}
$postcount = 0;
} 

echo '</Contents>

<Settings ImageWidth="'.$DYN_imgwidth.'" ImageHeight="'.$DYN_imgheight.'" LoaderColor="0x333333" InnerSideColor="0x222222" SideShadowAlpha="0.8" DropShadowAlpha="0.7" DropShadowDistance="25" DropShadowScale="0.95" DropShadowBlurX="40" DropShadowBlurY="4" MenuDistanceX="20" MenuDistanceY="50" MenuColor1="0x222222" MenuColor2="0x333333" MenuColor3="0xFFFFFF" ControlSize="70" ControlDistance="20" ControlColor1="0x222222" ControlColor2="0xFFFFFF" ControlAlpha="0.8" ControlAlphaOver="0.95" ControlsX="'.$CWZ_gallery3dxpos.'" ControlsY="'.$CWZ_gallery3dypos.'&#xD;&#xA;" ControlsAlign="center" TooltipHeight="30" TooltipColor="0x222222" TooltipTextY="5" TooltipTextStyle="P-Italic" TooltipTextColor="0xFFFFFF" TooltipMarginLeft="5" TooltipMarginRight="7" TooltipTextSharpness="50" TooltipTextThickness="-100" InfoWidth="400" InfoBackground="'.$CWZ_3dtxtbcolor.'" InfoBackgroundAlpha="0.65" InfoMargin="15" InfoSharpness="0" InfoThickness="0" Autoplay="'.$CWZ_3dtimeout.'" FieldOfView="45"></Settings>
  <Transitions>';

foreach($CWZ_transitions as $transition) { 
echo $transition."\n";
}
echo '</Transitions>
</Piecemaker>';
?>