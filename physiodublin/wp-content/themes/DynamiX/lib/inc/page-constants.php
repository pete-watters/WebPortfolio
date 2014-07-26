<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
    <?php $data = maybe_unserialize(get_post_meta( $post->ID, 'pgopts', true )); // Call custom page attributes  
	
	global 
	$DYN_skinopt,
	$DYN_layout,
	$DYN_textresize,
	$DYN_pagetitle,
	$DYN_pagesubtitle,
	$DYN_hidebreadcrumbs,
	$DYN_contentborder,
	$DYN_postdate,
	$DYN_authorname,
	$DYN_hidecontent,	
	$DYN_sidebar_one_borders,
	$DYN_sidebar_two_borders,
	$DYN_sidebar_one_select,
	$DYN_sidebar_two_select,
	$DYN_twitter,
	$DYN_socialicons,
	$DYN_disableheart,
	$DYN_socialdeli,
	$DYN_socialdigg,
	$DYN_socialtwitter,
	$DYN_socialfb,
	$DYN_socialrss,
	$DYN_show_slider,
	$DYN_gallerycat,
	$DYN_slidesetid,
	$DYN_imgheight,
	$DYN_imgwidth,
	$DYN_galleryheight,
	$DYN_gallerynumposts,
	$DYN_gallerysortby,
	$DYN_galleryexcerpt,
	$DYN_galleryorderby,
	$DYN_stagetimeout,	
	$DYN_playnav,	
	$DYN_gridcolumns,
	$DYN_gridshowposts,
	$DYN_gridfilter,
	$DYN_groupsliderpos,
	$DYN_groupgridcontent,
	$DYN_accordiontitles,
	$DYN_accordionautoplay,
	$DYN_imageeffect,
	$DYN_lightbox,
	$DYN_disablegallink,
	$DYN_galexturl,
	$DYN_inskin,
	$DYN_outskin,
	$DYN_archivecat;
	

	if(isset($data["layout"])) {$DYN_layout=$data['layout'];}
	
	if(isset($data["textresize"])) {$DYN_textresize=$data['textresize'];}
	
	if(isset($data["pagetitle"])) {$DYN_pagetitle=$data['pagetitle'];}
	
	if(isset($data["pagesubtitle"])) {$DYN_pagesubtitle=$data['pagesubtitle'];}
	
	if(isset($data["postdate"])) {$DYN_postdate=$data['postdate'];}
	
	if(isset($data["authorname"])) {$DYN_authorname=$data['authorname'];}	
	
	if(isset($data["hidebreadcrumbs"])) {$DYN_hidebreadcrumbs=$data['hidebreadcrumbs'];}

	if(isset($data["contentborder"])) {$DYN_contentborder=$data['contentborder'];}
	
	if(isset($data["hidecontent"])) {$DYN_hidecontent=$data['hidecontent'];}	
	
	if(isset($data["border_config_one"])) {$DYN_sidebar_one_borders=$data['border_config_one'];}
	
	if(isset($data["border_config_two"])) {$DYN_sidebar_two_borders=$data['border_config_two'];}
	
	if(isset($data["sidebar_one"])) {$DYN_sidebar_one_select=$data['sidebar_one'];}
	
	if(isset($data["sidebar_two"])) {$DYN_sidebar_two_select=$data['sidebar_two'];}
	
	if(isset($data["socialicons"])) {$DYN_socialicons=$data['socialicons'];}
	
	if(isset($data["disableheart"])) {$DYN_disableheart=$data['disableheart'];}
	
	if(isset($data["twitter"])) {$DYN_twitter=$data['twitter'];}
	
	if(isset($data["socialdeli"])) {$DYN_socialdeli=$data['socialdeli'];}
	
	if(isset($data["socialdigg"])) {$DYN_socialdigg=$data['socialdigg'];}
	
	if(isset($data["socialtwitter"])) {$DYN_socialtwitter=$data['socialtwitter'];}
	
	if(isset($data["socialfb"])) {$DYN_socialfb=$data['socialfb'];}
	
	if(isset($data["socialrss"])) {$DYN_socialrss=$data['socialrss'];}
	
	
	if(isset($data["gallery"])) {$DYN_show_slider=$data["gallery"];}
	
	if(isset($data["gallerycat"])) {$DYN_gallerycat=$data["gallerycat"];}
	
	if(isset($data["slideset"])) {$DYN_slidesetid=$data["slideset"];}
	
	if(isset($data["archivecat"])) {$DYN_archivecat=$data["archivecat"];}
	
	if(isset($data["imgheight"])) {$DYN_imgheight=$data["imgheight"];}
	
	if(isset($data["imgwidth"])) {$DYN_imgwidth=$data["imgwidth"];}
	
	if(isset($data["galleryheight"])) {$DYN_galleryheight=$data["galleryheight"];}
	
	if(isset($data["gallerynumposts"])) {$DYN_gallerynumposts=$data["gallerynumposts"];}
	
	$DYN_galleryexcerpt	= ($data["gallerynpostexcerpt"]!="") ? $data["gallerynpostexcerpt"]	: "55";

	if(isset($data["gallerysortby"])) {$DYN_gallerysortby=$data["gallerysortby"];}

	if(isset($data["galleryorderby"])) {$DYN_galleryorderby=$data["galleryorderby"];}
	
	if(isset($data["stagetimeout"])) {$DYN_stagetimeout=$data["stagetimeout"];}
	
	if(isset($data["stageplaypause"])) {$DYN_stageplaypause=$data["stageplaypause"];}
	
	if(isset($data["groupsliderpos"])) {$DYN_groupsliderpos=$data["groupsliderpos"];}

	if(isset($data["gridcolumns"])) {$DYN_gridcolumns=$data["gridcolumns"];}
	
	if(isset($data["gridshowposts"])) {$DYN_gridshowposts=$data["gridshowposts"];}
	
	if(isset($data["gridfilter"])) {$DYN_gridfilter=$data["gridfilter"];}

	if(isset($data["groupgridcontent"])) {$DYN_groupgridcontent=$data["groupgridcontent"];}	
	
	if(isset($data["accordiontitles"])) {$DYN_accordiontitles=$data["accordiontitles"];}
	
	if(isset($data["accordionautoplay"])) {$DYN_accordionautoplay=$data["accordionautoplay"];}
	
	if(isset($data["imageeffect"])) {$DYN_imageeffect=$data["imageeffect"];}	
	
	if(isset($data["lightbox"])) {$DYN_lightbox=$data["lightbox"];}
	
	
	if($data["outskin"]) {
		$DYN_outskin=$data["outskin"];
		$_SESSION['DYN_outskin'] = $DYN_outskin;
	} else {
		if(DYN_OUTSKIN) {
		$DYN_outskin=DYN_OUTSKIN;
		$_SESSION['DYN_outskin'] = DYN_OUTSKIN;
		} else {
		$DYN_outskin="ten";
		$_SESSION['DYN_outskin'] = "ten";
		}
	}	
	
	if($data["inskin"]) {
	$DYN_inskin=$data["inskin"];
	$_SESSION['DYN_inskin']=$DYN_inskin;
	} else {
		if(DYN_INSKIN) {
		$DYN_inskin=DYN_INSKIN;
		$_SESSION['DYN_inskin']=DYN_INSKIN;
		} else {
		$DYN_inskin = "one";
		$_SESSION['DYN_inskin']="one";
		}
	}
		

 endwhile; endif; ?>