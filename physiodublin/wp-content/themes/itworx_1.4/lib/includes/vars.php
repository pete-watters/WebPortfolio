<?php
function styleString(){
		
	
$hideauthor = get_option('phi_display_author');
$hidepublishdate = get_option('phi_display_publishdate');
$hidecategories = get_option('phi_display_categories');
$usecontent = get_option('phi_display_postcontent');

$trans_postedby = get_option('phi_trans_postedby');
$trans_postedon = get_option('phi_trans_postedon');
$trans_incategory = get_option('phi_trans_incategory');

$imageheight_slider = get_option('phi_slider_image_height'); 
$nivoHeightFullwidth = $imageheight_slider + 50;
$imageheight_post = get_option('phi_post_image_height');
$nivoHeightNormal = $imageheight_post + 50;
$imageheight2col = get_option('phi_2col_image_height'); 
$imageheight3col = get_option('phi_3col_image_height'); 
$imageheight2col = get_option('phi_4col_image_height');
$imageheightGallerySlider = get_option('phi_gallery_slider_image_height');
$backgroundimage_selected = get_option('phi_listed_background_image');
$backgroundimage_uploaded = get_option('phi_custom_background_image');
$backgroundcolor = get_option('phi_custom_background_color');

if($backgroundimage_selected){
$newbackgroundimage = get_template_directory_uri().''. $backgroundimage_selected;
}
if($backgroundimage_uploaded){
$newbackgroundimage = $backgroundimage_uploaded;
}
if(get_option('phi_disable_tiled_background')== true){
	$backgroundposition = 'background-repeat:no-repeat; background-position:top center;';
}

$menucolor = get_option('phi_primary_menu_color');
$alink = get_option('phi_custom_link_color');
$ahover = get_option('phi_custom_link_hover_color');
$button_hover_color = get_option('phi_custom_button_hover_color');
$button_color = get_option('phi_custom_button_color');
$titlefont = get_option('phi_titlefont');
$menufont = get_option('phi_menufont');

$menufontsize = get_option('phi_mainmenu');
$h1size = get_option('phi_h1');
$h2size = get_option('phi_h2');
$h3size = get_option('phi_h3');
$h4size = get_option('phi_h4');
$h5size = get_option('phi_h5');
$h6size = get_option('phi_h6');
$psize  = get_option('phi_p');

$contentcolor = get_option('phi_custom_content_color');
$featurecolor = get_option('phi_custom_slider_color');
$stylestring;

$stylestring.='<style type="text/css" media="screen">';

if($menucolor){
	$stylestring.= '#header #primary {background:'. $menucolor.' url('.get_bloginfo('template_url').'/lib/img/theme/primary-bg.png)}';
	
}

if($button_color){
	$stylestring.= 'input[type=submit], a.button, a.buttonmedium, a.buttonlarge{background-color:'.get_option('phi_custom_button_color').';} 
	a.lightbtn{background:#ddd; color:#333;}
	a.darkbtn{background:#333; color:#eee;}';
	}
	
if($button_hover_color){
	$stylestring.= '
	input[type=submit]:hover, 
	a.button:hover, a.buttonmedium:hover, a.buttonlarge:hover{background-color:'.get_option('phi_custom_button_hover_color').';} ';
	}
	


if($titlefont){
$stylestring.= 'h1,h2,h3,h4,.slide-info{font-family:'.$titlefont.';}';
}

if($menufont){
$stylestring.= '#primary ul li, #tabnav li,.quote, a.buttonlarge{font-family:'.$menufont.';}';
}
if($menufontsize){
$stylestring.= '#primary-menu ul li,#tabnav li,.quote{font-size:'.$menufontsize.';}';
}
if($h1size){
$stylestring.= 'h1{font-size:'.$h1size.';}';
}
if($h2size){
$stylestring.= 'h2{font-size:'.$h2size.';}';
}
if($h3size){
$stylestring.= 'h3{font-size:'.$h3size.';}';
}
if($h4size){
$stylestring.= 'h4{font-size:'.$h4size.';}';
}
if($h5size){
$stylestring.= 'h5{font-size:'.$h5size.';}';
}
if($h6size){
$stylestring.= 'h6{font-size:'.$h6size.';}';
}
if($psize){
$stylestring.= 'p,body,html{font-size:'.$psize.';}';
}

if($alink){
$stylestring.= 'a{color:'. get_option('phi_custom_link_color').';}';
}
if($ahover){
$stylestring.= 'a:hover{color:'. get_option('phi_custom_link_hover_color').';}';
}
$stylestring.= '
body,html{background-color:'.$backgroundcolor.'; font-family:'.get_option('phi_htmlfont').';}
body,html{background-image: url('. $newbackgroundimage.'); '.$backgroundposition.'}
.slide_fullwidth, #kwicks{height:'.$imageheight_slider.'px;}
.slide_normal{height:'.$imageheight_post.'px;}
.nivoSlider-slider{height:'.$nivoHeightFullwidth.'px;}
.nivoSlider-post{height:'.$nivoHeightNormal.'px;}
#footer{background-color:'. get_option('phi_custom_background_footer').';}

</style>';
echo $stylestring;

}
?>