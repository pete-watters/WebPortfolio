<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
*/

/*
Template Name: Blog
*/ 

get_header();

/******************************************************************/
/*	Page Variables							      				  */
/******************************************************************/

if(!$forceDYN_gridblog) {
$DYN_gridblog=get_option("arhpostdisplay"); // Check is GRID or Normal Display
} else {
$DYN_gridblog=$forceDYN_gridblog;
}

if(get_option("arhimgheight")) { // Get Image Height
	$DYN_arhimgheight = get_option("arhimgheight");
} else {
	if($DYN_gridblog) {
	$DYN_arhimgheight = "180";
	} else {
	$DYN_arhimgheight = "300";
	}
}

if(get_option("arhimgwidth")) { // Get Image Width
	$DYN_arhimgwidth = get_option("arhimgwidth");
	$DYN_shadowwidth = get_option("arhimgwidth");
} else {
	$DYN_shadowwidth = $DYN_arhimgheight * "1.33"; // If no width is set use 4:3 ratio to calculate shadow width
}


if(!$DYN_gridblog) {
	$DYN_arhvidwidth = $DYN_arhimgheight * "1.77"; // 16:9 Ratio for Video
} else {
	if($DYN_layout=="layout_one") { // Detect page layout and set width for GRID blog video
		$DYN_arhvidwidth = "300";
	} elseif ($DYN_layout=="layout_two" || $DYN_layout=="layout_four") {
		$DYN_arhvidwidth = "211";	
	} elseif ($DYN_layout=="layout_three" || $DYN_layout=="layout_five" || $DYN_layout=="layout_six") {
		$DYN_arhvidwidth = "129";
	}
}
$shadowheight = $DYN_arhimgheight-"24"; // Get Shadow Position

$DYN_blogcontent = get_option("arhpostcontent"); // Post Content

if(get_option("arhexcerpt")) {
$DYN_arhexcerpt = get_option("arhexcerpt"); // Excerpt Value
} else {
$DYN_arhexcerpt = "55"; 
}

$DYN_arhimgdisplay = get_option("arhimgdisplay"); // Lightbox on First / Custom Images

$DYN_arhpostpostmeta = get_option("arhpostpostmeta"); // Display Postmeta Data

$postcount = 0;

if(!get_option('timthumb_disable')) { // Check is Timthumb is Enabled or Disabled
	$DYN_imagepath = get_bloginfo('template_directory')."/lib/scripts/timthumb.php?h=". $DYN_arhimgheight ."&amp;w=". $DYN_arhimgwidth ."&amp;zc=". $DYN_imgzoomcrop ."&amp;src="; 
} else {
	$DYN_imagepath="";
}

/******************************************************************/
/*	Page Variables *END*					      				  */
/******************************************************************/
?>

<?php if($DYN_hidecontent!="yes") { ?>

<?php if($DYN_layout!="layout_four" && $DYN_layout!="layout_five") { 

	get_sidebar(); 

} ?>

    <div class="mid-wrap <?php 

		if($DYN_layout=="layout_one") { ?> left out-full  <?php } 
		
		elseif($DYN_layout=="layout_two") { ?> right out-threequarter  <?php }
		
		elseif($DYN_layout=="layout_three") { ?> right out-half  <?php }
		
		elseif($DYN_layout=="layout_four") { ?> left out-threequarter  <?php }
		
		elseif($DYN_layout=="layout_five") { ?> left out-half  <?php }
		
		elseif($DYN_layout=="layout_six") { ?> left out-half  <?php }
		
		else { ?> left out-threequarter  <?php }
	
	?>">

	<div id="content">
		<?php if($DYN_textresize=="yes") { ?>
                            <div class="textresize">
                                <ul>
                                    <li class="resize-sml"><img src="<?php bloginfo("template_url"); ?>/images/blank.gif" width="16" height="22"  alt="Decrease" class="decreaseFont" /></li>
                                    <li class="resize-lrg"><img src="<?php bloginfo("template_url"); ?>/images/blank.gif" width="20" height="22"  alt="Increase" class="increaseFont" /></li>
                                </ul>
                            </div><!-- /textresizer -->
        <?php } ?>
        <?php if($DYN_socialicons=="yes") { ?>
			<?php if($DYN_disableheart=="yes") { ?><div class="socialicons" style="display:block;"><?php } else { ?>
				<div id="togglesocial">
					<ul>                     
						<li class="socialinit"><img src="<?php bloginfo("template_url"); ?>/images/blank.gif" width="26" height="22" alt="Show Icons" /></li>
						<li style="display: none;" class="socialhide"><img src="<?php bloginfo("template_url"); ?>/images/blank.gif" width="26" height="22" alt="Show Icons" /></li>
					</ul>
				</div><!-- /togglesocial -->                            
				<div class="socialicons">
			<?php } ?>
                                <ul>
        <?php if($DYN_socialdeli!="yes") { ?><li class="social-delicious"><a href="http://del.icio.us/post?url=<?php the_permalink() ?>&amp;title=<?php the_title() ?>" title="Submit to Del.icio.us" target="_blank"><img src="<?php bloginfo("template_url"); ?>/images/blank.gif" width="21" height="21" alt="Delicious" /></a></li><?php } ?>  
        <?php if($DYN_socialdigg!="yes") { ?><li class="social-digg"><a href="http://www.digg.com/submit?phase=2&amp;url=<?php the_permalink() ?>&amp;title=<?php the_title() ?>" title="Submit to Digg" target="_blank"><img src="<?php bloginfo("template_url"); ?>/images/blank.gif" width="21" height="21" alt="Digg" /></a></li><?php } ?>  
        <?php if($DYN_socialtwitter!="yes") { ?><li class="social-twitter"><a href="http://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink() ?>" title="Tweet this" target="_blank"><img src="<?php bloginfo("template_url"); ?>/images/blank.gif" width="21" height="21" alt="Twitter" /></a></li><?php } ?>  
        <?php if($DYN_socialfb!="yes") { ?><li class="social-facebook"><a href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>&amp;t=<?php echo  the_title(); ?>" title="Submit to Facebook" target="_blank"><img src="<?php bloginfo("template_url"); ?>/images/blank.gif" width="21" height="21" alt="Facebook" /></a></li><?php } ?> 
        <?php if($DYN_socialrss!="yes") { ?><li class="social-rss"><a href="feed://<?php echo get_permalink(); ?>feed/rss/" title="RSS" target="_blank"><img src="<?php bloginfo("template_url"); ?>/images/blank.gif" width="21" height="21" alt="RSS" /></a></li><?php } ?>  
                                </ul>
                            </div><!-- /socialicons -->
<?php } ?>  		
 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
                     <?php if($DYN_postdate!="" && $DYN_authorname!="" && $DYN_pagesubtitle!="" && $DYN_pagetitle!="" || $DYN_pagetitle !="BLANK") { ?>
                            <div class="post-titles"><!-- post-titles -->
                               <?php if($DYN_pagetitle) { ?>
                                		<?php if($DYN_pagetitle != "BLANK") { ?>
										<h1><?php echo htmlspecialchars($DYN_pagetitle); ?></h1>
                                        <?php } ?>
								<?php } else { ?>
                                		<?php if($DYN_pagetitle != "BLANK") { ?>
										<h1><?php the_title(); ?></h1>
                                        <?php } ?>							
								<?php } ?>		
                                <?php if($DYN_pagesubtitle) { ?>
                                        <h2><?php echo htmlspecialchars($DYN_pagesubtitle); ?></h2>
                                        <?php } ?>
                                <?php if($DYN_postdate || $DYN_authorname) { ?>
                                 <div class="hozbreak nospace">&nbsp;</div>
                                    <p class="post-date">
                                            <?php if($DYN_postdate) { ?>
                                            <small><?php the_time('F jS  Y'); ?></small><span class="break">&nbsp;</span>
                                            <?php } ?>
                                            <?php if($DYN_authorname) { ?>
                                            <small>By <span class="author"><?php echo the_author_firstname() ."&nbsp; ". the_author_lastname(); ?></span></small>
                                            <?php } ?>
                                    </p>
                                 <div class="hozbreak nospace">&nbsp;</div>
								<?php } ?>           
                            </div><!-- /post-titles -->
							<div class="clear"></div>
                            <?php } ?>  
							
                            <div class="entry">
								<?php $content = get_the_content(); ?>
                                <?php if($content) { echo do_shortcode($content); } // Check if there is content ?>
                            </div><!-- /entry -->                       

	<?php if($DYN_archivecat) { // Selected Blog Categories
	foreach ($DYN_archivecat as $catlist) { // Get category ID Array
		$cats = $cats.",".$catlist;
	}
	}

$cats = lTrim($cats,',');

	$cat_isnum = str_replace(",","", $cats); // join cats to check if numeric

	if (is_numeric ($cat_isnum)) { // backwards compatible with post id
		$cat_type= "cat";
	} else {
		$cat_type= "category_name"; // if not numeric, use category name
	}

if(is_home() || is_front_page()) {
$paged = (get_query_var('page')) ? get_query_var('page') : 1;
} else {
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
}

query_posts( array ($cat_type => $cats , 'paged' => $paged));

if($DYN_gridblog) { ?>
<div class="post-grid archive">
<div class="gallerywrap clearfix">
<?php } 


if (have_posts()) : while (have_posts()) : the_post(); 


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
	$DYN_postshowimage=$pdata["postshowimage"];
	$DYN_imgorientation=$pdata["imgorientation"];
	$DYN_videotype=$pdata["videotype"];
	$DYN_videoautoplay=$pdata["videoautoplay"];

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
	
	
if(get_option("arhimgeffect")!="none" && get_option("arhimgeffect")!="reflection") { // Image Effect


	if($DYN_imgorientation=="portrait" && $DYN_arhimgwidth=="") {

		if($DYN_arhimgheight>="850") {
			$shadow_size="shadow-large";
		} elseif($DYN_arhimgheight<"850" && $DYN_arhimgheight>="350" ) {
			$shadow_size="shadow-medium";
		} elseif($DYN_arhimgheight<"350" && $DYN_arhimgheight>="250") {
			$shadow_size="shadow-small";
		} elseif ($DYN_arhimgheight<"250") {
			$shadow_size="shadow-xsmall";
		}	

		
		} else {
		if($DYN_shadowwidth>="850") {
			$shadow_size="shadow-large";
		} elseif($DYN_shadowwidth<"850" && $DYN_shadowwidth>="300" ) {
			$shadow_size="shadow-medium";
		} elseif($DYN_shadowwidth<"300" && $DYN_shadowwidth>="200") {
			$shadow_size="shadow-small";
		} elseif ($DYN_shadowwidth<"200") {
			$shadow_size="shadow-xsmall";
		}
	}
} 

if(get_option("arhimgeffect")) {
	$image_effect=get_option("arhimgeffect");
} else {
	$image_effect="shadowreflection";
}

if(get_option("arhimgeffect")!="none" && get_option("arhimgeffect")!="shadow") {
	$image_reflect='class="reflect"';
}

$slide_id='';
$slide_id="slide-".get_the_ID();

/****************** / Get custom field data *****************/ 

$do_not_duplicate[] = get_the_ID();

$postcount++; ?>

<?php $image = catch_image(); // Check for images within post ?>


<?php 
/******************************************************************/
/*	GRID BLOG								      				  */
/******************************************************************/
?>


<?php if($DYN_gridblog) { 

if($postcount=="1") { ?>
	
    <div class="panelwrap" style="height:auto;">

<?php } ?>

<div class="panel">

<?php

 if($DYN_blogcontent!="full_post" || $DYN_blogcontent!="")  { ?>

	<?php if($DYN_postshowimage!="single") { ?>
    
	<?php if($DYN_blogcontent=="excerpt_image" || $DYN_blogcontent=="image_only" || $DYN_postshowimage=="archive" || $DYN_postshowimage=="singlearchive")  { // Display Excerpt Only - unless Post Overrides this ?>

	<?php if($DYN_videotype) { // Check "Preview Image" field is completed ?>    
    
	
    	<div class="container videotype <?php echo $image_effect; ?> <?php if($shadow_size) echo $shadow_size; ?>">
			<div class="gridimg-wrap" style="width:<?php if($DYN_arhimgwidth) { echo $DYN_arhimgwidth; } else { echo $DYN_arhvidwidth; } ?>px;height:<?php echo $DYN_arhimgheight; ?>px;" >
                             					
				<?php           
 
				$vidurl = $DYN_movieurl;
				$file = basename($vidurl); 
				$parts = explode(".", $file); 
				//File name 
				$vidid = $parts[0]; 
   				if($DYN_videotype=="youtube") {
				
					$vidid = strstr($vidid,'='); // trim id after = 
					$vidid = substr($vidid, 1); // remove =			
					
				} elseif($DYN_videotype=="swf" || $DYN_videotype=="jwp") {
					$vidid = $vidurl;
				}
				
				if($DYN_videotype=="youtube") { ?>
				
				<iframe class="youtube-player" type="text/html" width="<?php if($DYN_arhimgwidth) { echo $DYN_arhimgwidth; } else { echo $DYN_arhvidwidth; } ?>" height="<?php echo $DYN_arhimgheight; ?>" src="http://www.youtube.com/embed/<?php echo $vidid; ?>?autoplay=<?php echo $DYN_videoautoplay ?>&amp;wmode=opaque&amp;title=" frameborder="0"></iframe>
				
				<?php } elseif($DYN_videotype=="vimeo") { ?>
				
				<iframe class="vimeo-player" src="http://player.vimeo.com/video/<?php echo $vidid; ?>?autoplay=<?php echo $DYN_videoautoplay ?>&amp;title=0&amp;byline=0&amp;portrait=0" width="<?php if($DYN_arhimgwidth) { echo $DYN_arhimgwidth; } else { echo $DYN_arhvidwidth; } ?>" height="<?php echo $DYN_arhimgheight; ?>" frameborder="0"></iframe>
				
				<?php } elseif($DYN_videotype=="swf") {?>
				          
			<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="<?php if($DYN_arhimgwidth) { echo $DYN_arhimgwidth; } else { echo $DYN_arhvidwidth; } ?>" height="<?php echo $DYN_arhimgheight; ?>">
				<param name="movie" value="<?php echo $vidid; ?><?php if($DYN_videotype!="swf") { ?>&amp;autoplay=<?php echo $DYN_videoautoplay ?><?php } ?>" />
                <param name="wmode" value="transparent" />
                <param name="allowFullScreen" value="true" />
                <param name="allowScriptAccess" value="always" />
                <param name="scale" value="exactfit">
           		<!--[if !IE]>-->                
				<object type="application/x-shockwave-flash" data="<?php echo $vidid; ?><?php if($DYN_videotype!="swf") { ?>&amp;autoplay=<?php echo $DYN_videoautoplay ?><?php } ?>" width="<?php if($DYN_arhimgwidth) { echo $DYN_arhimgwidth; } else { echo $DYN_arhvidwidth; } ?>" height="<?php echo $DYN_arhimgheight; ?>">
                <param name="wmode" value="transparent" />
                <param name="allowFullScreen" value="true" />
                <param name="allowScriptAccess" value="always" />
                <param name="scale" value="exactfit">			
                <!--<![endif]-->
				<div>
					<p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
				</div>
				<!--[if !IE]>-->
				</object>
				<!--<![endif]-->
			</object>
				
			<?php } elseif($DYN_videotype=="jwp") {?>

            <div id="<?php echo $slide_id; ?>"></div>
            <script type="text/javascript">
              jwplayer('<?php echo $slide_id; ?>').setup({
                'id': 'player_<?php echo $slide_id; ?>',
                'width': '<?php if($DYN_arhimgwidth) { echo $DYN_arhimgwidth; } else { echo $DYN_arhvidwidth; } ?>',
                'height': '<?php echo $DYN_arhimgheight; ?>',
                'file': '<?php echo $vidid; ?>',
				'stretching': 'exactfit',
				'controlbar.idlehide':'true',
				'wmode': 'transparent',
                'image': '<?php echo dyn_getimagepath($DYN_previewimgurl); ?>',
				'players': [
					{type: 'flash', src: '<?php echo get_option('jwplayer_swf'); ?>'},				
					{type: 'html5'},
                    {type: 'download'}
                ]
              });
			  
			jQuery(document).ready(function() {
    			jQuery('#<?php echo $slide_id; ?>').addClass('jwplayer'); 
				if("1"=="<?php echo $DYN_videoautoplay; ?>") {
					jwplayer('<?php echo $slide_id; ?>').play(); 

				}
			});		
            </script>

			<?php } ?>
            
			</div><!-- / gridimg-wrap -->
		</div><!-- / container -->		
	

        
    <?php } elseif($DYN_previewimgurl) { // Check "Preview Image" field is completed ?>     
   
   
		<div class="container <?php echo $image_effect; ?> <?php if($shadow_size) echo $shadow_size; ?>">
			<div class="gridimg-wrap" align="center">
            	
				<?php if($DYN_arhimgdisplay=="lightbox") { ?><a href="<?php if($DYN_movieurl) { echo $DYN_movieurl; } else { echo $DYN_previewimgurl; } ?>" rel="prettyPhoto[gallery]" <?php if($DYN_movieurl) { ?> class="galleryvid" <?php } else { ?> class="galleryimg" <?php } ?> ><?php } elseif(!$DYN_disablegallink) { ?><a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>" title="<?php echo the_title(); ?>"><?php } ?>
                
					<img <?php echo $image_reflect; ?> src="<?php echo $DYN_imagepath . dyn_getimagepath($DYN_previewimgurl); ?>" alt="<?php the_title(); ?>"  height="<?php echo $DYN_arhimgheight; ?>" <?php if($DYN_arhimgwidth) { ?>width="<?php echo $DYN_arhimgwidth; ?>" <?php } ?> />
				<?php if(!$DYN_disablegallink || $DYN_arhimgdisplay=="lightbox") { ?>
					</a>
				<?php } ?>
            	
			</div><!-- / gridimg-wrap -->
		</div><!-- / container -->				
				
	<?php } elseif($image) { // Check image exists within post ?>
            	
		<div class="container <?php echo $image_effect; ?> <?php if($shadow_size) echo $shadow_size; ?>">
			<div class="gridimg-wrap" align="center">
                           
				<?php if($DYN_arhimgdisplay=="lightbox") { ?><a href="<?php if($DYN_movieurl) { echo $DYN_movieurl; } else { echo $image; } ?>" rel="prettyPhoto[gallery]" <?php if($DYN_movieurl) { ?> class="galleryvid" <?php } else { ?> class="galleryimg" <?php } ?> ><?php } elseif(!$DYN_disablegallink) { ?><a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>" title="<?php echo the_title(); ?>"><?php } ?>
                
					<img <?php echo $image_reflect; ?> src="<?php echo $DYN_imagepath . dyn_getimagepath($image); ?>" alt="<?php the_title(); ?>" height="<?php echo $DYN_arhimgheight; ?>" <?php if($DYN_arhimgwidth) { ?>width="<?php echo $DYN_arhimgwidth; ?>" <?php } ?> />
				<?php if(!$DYN_disablegallink || $DYN_arhimgdisplay=="lightbox") { ?>
					</a>
				<?php } ?>
                
			</div><!-- / gridimg-wrap --> 
		</div><!-- / container -->		         
     
     <?php }    
	 	}  // excerpt only 
	} // not single	?>
				
<?php if($DYN_blogcontent!="image_only")  { ?>

		<div class="panelcontent">
			<h2><?php if(!$DYN_disablegallink) { ?><a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>" title="<?php echo the_title(); ?>"><?php } ?><?php echo the_title(); ?><?php if(!$DYN_disablegallink) { ?></a><?php } ?></h2>
			
            
			<?php global $more; $more = FALSE; ?>
			<?php if ( empty($post->post_excerpt) ) {
    					
				the_excerpt_reloaded($DYN_arhexcerpt, '<a><br /><p>', 'content', false);
				if(!$DYN_disablegallink && !$DYN_disablereadmore) { ?>
				<a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>"><?php _e( 'Read More', 'DynamiX' );  ?></a>
				<?php }
			} else {
				
				the_excerpt(); 
				if(!$DYN_disablegallink && !$DYN_disablereadmore) { ?>
				<a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>"><?php _e( 'Read More', 'DynamiX' );  ?></a>
				<?php }
    								
			}?>
       		
		</div><!-- /panelcontent -->  
<?php } ?>

<?php } elseif($DYN_blogcontent=="full_post") { ?>

    <div class="entry">
    <h2><?php if(!$DYN_disablegallink) { ?><a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>" title="<?php echo the_title(); ?>"><?php } ?><?php echo the_title(); ?><?php if(!$DYN_disablegallink) { ?></a><?php } ?></h2>
        <?php do_shortcode(the_content()); // show full post ?>
    </div>

<?php } ?>

<?php if($DYN_arhpostpostmeta=="" || $DYN_arhpostpostmeta=="archive_only") { ?>
	<div class="hozbreak nospace">&nbsp;</div>
    <div class="postmetadata">
    	<p><small><?php echo get_the_date(); ?></small> <span class="break">&nbsp;</span> <?php the_tags('Tags: ', ', ', '<br />'); ?> <small><?php _e('Category:', 'DynamiX' ); ?></small> <?php the_category(', ') ?> <span class="break">&nbsp;</span> <?php edit_post_link('Edit', '', ' <span class="break">&nbsp;</span> '); ?>  <?php comments_popup_link( __('No Comments', 'DynamiX' ) .' <span class="comments no"><img src="'. get_bloginfo('template_url') .'/images/blank.gif" alt="comments" width="30" height="25" /></span> ', '1 '. __('Comment', 'DynamiX' ) . ' <span class="comments yes"><img src="'. get_bloginfo('template_url') .'/images/blank.gif" alt="comments" width="30" height="25" /></span> ', '% '. __('Comments', 'DynamiX' ) . ' <span class="comments yes"><img src="'. get_bloginfo('template_url') .'/images/blank.gif" alt="comments" width="30" height="25" /></span> '); ?></p>
	</div><!-- /postmetadata -->

<?php } ?>
</div><!--  / panel -->

<?php if($postcount=="3") { 
	$postcount="0";
?>
	</div><!--  / panelwrap -->
<?php }

/******************************************************************/
/*	GRID BLOG *END*							      				  */
/******************************************************************/



/******************************************************************/
/*	NORMAL BLOG 							      				  */
/******************************************************************/

} else { ?>
		<div <?php post_class() ?>>

<?php if($DYN_blogcontent!="full_post")  { ?>


<?php if($DYN_blogcontent!="image_only")  { ?>

 						<div class="post-titles"><!-- post-titles -->
                        	<?php if($DYN_posttitle) { ?>
							<?php if($DYN_posttitle != "BLANK") { ?>
                        		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php echo htmlspecialchars($DYN_posttitle); ?></a></h2>
							<?php } ?>    
							<?php } else { ?>
							<?php if($DYN_posttitle != "BLANK") { ?>                            
								<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>		
							<?php } ?>                                  					
							<?php } ?>							
							<?php if($DYN_postsubtitle) { ?>
							<h3><?php echo htmlspecialchars($DYN_postsubtitle); ?></h3>
							<?php } ?>
							<?php if($DYN_postdate || $DYN_authorname) { ?>
								<p class="post-date">
								<?php if($DYN_postdate) { ?>
									<small><?php the_time('F jS | Y'); ?></small>
								<?php } ?>
								<?php if($DYN_authorname) { ?>
									<small>By <span class="author"><?php echo the_author_firstname() ." ". the_author_lastname(); ?></span></small>
								<?php } ?>
								</p>        
							<?php } ?>
                            </div><!-- /post-titles -->
<?php } ?>

		<?php if($DYN_postshowimage!="single") { ?>

		<?php if($DYN_blogcontent=="excerpt_image" || $DYN_blogcontent=="image_only" || $DYN_postshowimage=="archive" || $DYN_postshowimage=="singlearchive")  { // Display Excerpt Only - unless Post Overrides this ?>    
       
		<?php if($DYN_videotype) { // Check "Preview Image" field is completed ?>    
    
	
    	<div class="container videotype <?php echo $image_effect; ?> <?php if($shadow_size) echo $shadow_size; ?>">
			<div class="gridimg-wrap" style="width:<?php if($DYN_arhimgwidth) { echo $DYN_arhimgwidth; } else { echo $DYN_arhvidwidth; } ?>px;height:<?php echo $DYN_arhimgheight; ?>px;" >
                             					
				<?php           
 
				$vidurl = $DYN_movieurl;
				$file = basename($vidurl); 
				$parts = explode(".", $file); 
				//File name 
				$vidid = $parts[0]; 
   				if($DYN_videotype=="youtube") {
				
					$vidid = strstr($vidid,'='); // trim id after = 
					$vidid = substr($vidid, 1); // remove =			
					
				} elseif($DYN_videotype=="swf" || $DYN_videotype=="jwp") {
					$vidid = $vidurl;
				}
				
				if($DYN_videotype=="youtube") { ?>
				
				<iframe class="youtube-player" type="text/html" width="<?php if($DYN_arhimgwidth) { echo $DYN_arhimgwidth; } else { echo $DYN_arhvidwidth; } ?>" height="<?php echo $DYN_arhimgheight; ?>" src="http://www.youtube.com/embed/<?php echo $vidid; ?>?autoplay=<?php echo $DYN_videoautoplay ?>&amp;wmode=opaque&amp;title=" frameborder="0"></iframe>
				
				<?php } elseif($DYN_videotype=="vimeo") { ?>
				
				<iframe class="vimeo-player" src="http://player.vimeo.com/video/<?php echo $vidid; ?>?autoplay=<?php echo $DYN_videoautoplay ?>&amp;title=0&amp;byline=0&amp;portrait=0" width="<?php if($DYN_arhimgwidth) { echo $DYN_arhimgwidth; } else { echo $DYN_arhvidwidth; } ?>" height="<?php echo $DYN_arhimgheight; ?>" frameborder="0"></iframe>
				
				<?php } elseif($DYN_videotype=="swf") {?>
				          
			<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="<?php if($DYN_arhimgwidth) { echo $DYN_arhimgwidth; } else { echo $DYN_arhvidwidth; } ?>" height="<?php echo $DYN_arhimgheight; ?>">
				<param name="movie" value="<?php echo $vidid; ?><?php if($DYN_videotype!="swf") { ?>&amp;autoplay=<?php echo $DYN_videoautoplay ?><?php } ?>" />
                <param name="wmode" value="transparent" />
                <param name="allowFullScreen" value="true" />
                <param name="allowScriptAccess" value="always" />
                <param name="scale" value="exactfit">
           		<!--[if !IE]>-->                
				<object type="application/x-shockwave-flash" data="<?php echo $vidid; ?><?php if($DYN_videotype!="swf") { ?>&amp;autoplay=<?php echo $DYN_videoautoplay ?><?php } ?>" width="<?php if($DYN_arhimgwidth) { echo $DYN_arhimgwidth; } else { echo $DYN_arhvidwidth; } ?>" height="<?php echo $DYN_arhimgheight; ?>">
                <param name="wmode" value="transparent" />
                <param name="allowFullScreen" value="true" />
                <param name="allowScriptAccess" value="always" />
                <param name="scale" value="exactfit">			
                <!--<![endif]-->
				<div>
					<p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
				</div>
				<!--[if !IE]>-->
				</object>
				<!--<![endif]-->
			</object>
				
			<?php } elseif($DYN_videotype=="jwp") {?>

            <div id="<?php echo $slide_id; ?>"></div>
            <script type="text/javascript">
              jwplayer('<?php echo $slide_id; ?>').setup({
                'id': 'player_<?php echo $slide_id; ?>',
                'width': '<?php if($DYN_arhimgwidth) { echo $DYN_arhimgwidth; } else { echo $DYN_arhvidwidth; } ?>',
                'height': '<?php echo $DYN_arhimgheight; ?>',
                'file': '<?php echo $vidid; ?>',
				'stretching': 'exactfit',
				'controlbar.idlehide':'true',
				'wmode': 'transparent',
                'image': '<?php echo dyn_getimagepath($DYN_previewimgurl); ?>',
				'players': [
					{type: 'flash', src: '<?php echo get_option('jwplayer_swf'); ?>'},				
					{type: 'html5'},
                    {type: 'download'}
                ]
              });
			  
			jQuery(document).ready(function() {
    			jQuery('#<?php echo $slide_id; ?>').addClass('jwplayer'); 
				if("1"=="<?php echo $DYN_videoautoplay; ?>") {
					jwplayer('<?php echo $slide_id; ?>').play(); 

				}
			});		
            </script>

			<?php } ?>
            
			</div><!-- / gridimg-wrap -->
		</div><!-- / container -->		    
	
	

        
    <?php } elseif($DYN_previewimgurl) { // Check "Preview Image" field is completed ?>     
   
   
		<div class="container <?php echo $image_effect; ?> <?php if($shadow_size) echo $shadow_size; ?>" align="center">
			<div class="gridimg-wrap">
				<?php if($DYN_arhimgdisplay=="lightbox") { ?><a href="<?php if($DYN_movieurl) { echo $DYN_movieurl; } else { echo $DYN_previewimgurl; } ?>" rel="prettyPhoto[gallery]" <?php if($DYN_movieurl) { ?> class="galleryvid" <?php } else { ?> class="galleryimg" <?php } ?> ><?php } elseif(!$DYN_disablegallink) { ?><a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>" title="<?php echo the_title(); ?>"><?php } ?>

                
					<img <?php echo $image_reflect; ?> src="<?php echo $DYN_imagepath . dyn_getimagepath($DYN_previewimgurl); ?>" alt="<?php the_title(); ?>"  height="<?php echo $DYN_arhimgheight; ?>"  <?php if($DYN_arhimgwidth) { ?>width="<?php echo $DYN_arhimgwidth; ?>"<?php } ?> />
				<?php if(!$DYN_disablegallink || $DYN_arhimgdisplay=="lightbox") { ?>
					</a>
				<?php } ?>
			</div><!-- / gridimg-wrap -->	
		</div><!-- / container -->				
				
	<?php } elseif($image) { // Check image exists within post ?>
            	
		<div class="container <?php echo $image_effect; ?>  <?php if($shadow_size) echo $shadow_size; ?>" align="center">
			<div class="gridimg-wrap">                           
				<?php if($DYN_arhimgdisplay=="lightbox") { ?><a href="<?php if($DYN_movieurl) { echo $DYN_movieurl; } else { echo $image; } ?>" rel="prettyPhoto[gallery]" <?php if($DYN_movieurl) { ?> class="galleryvid" <?php } else { ?> class="galleryimg" <?php } ?> ><?php } elseif(!$DYN_disablegallink) { ?><a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>" title="<?php echo the_title(); ?>"><?php } ?>
                
					<img <?php echo $image_reflect; ?> src="<?php echo $DYN_imagepath . dyn_getimagepath($image); ?>" alt="<?php the_title(); ?>" height="<?php echo $DYN_arhimgheight; ?>"  <?php if($DYN_arhimgwidth) { ?>width="<?php echo $DYN_arhimgwidth; ?>"<?php } ?> />
				<?php if(!$DYN_disablegallink || $DYN_arhimgdisplay=="lightbox") { ?>
					</a>
				<?php } ?>
			</div><!-- / gridimg-wrap -->
		</div><!-- / container -->        
     
     <?php }
		}
	} // not single ?>

<?php if($DYN_blogcontent!="image_only")  { ?>
				
		<div class="entry">
			<?php global $more; $more = FALSE; ?>
			<?php if ( empty($post->post_excerpt) ) {
    					
				the_excerpt_reloaded($DYN_arhexcerpt, '<a><br /><p>', 'content', false);
				if(!$DYN_disablegallink && !$DYN_disablereadmore) { ?>
				<a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>"><?php _e( 'Read More', 'DynamiX' );  ?></a>
				<?php }
			} else {
				
				the_excerpt(); 
				if(!$DYN_disablegallink && !$DYN_disablereadmore) { ?>
				<a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>"><?php _e( 'Read More', 'DynamiX' );  ?></a>
				<?php }
    								
			}?>
		</div>
<?php } ?>

<?php } elseif($DYN_blogcontent=="full_post") { ?>

    <div class="entry">
        <h2><?php if(!$DYN_disablegallink) { ?><a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>" title="<?php echo the_title(); ?>"><?php } ?><?php echo the_title(); ?><?php if(!$DYN_disablegallink) { ?></a><?php } ?></h2>
        <?php do_shortcode(the_content()); // show full post ?>
    </div>

<?php } ?>
	<div class="hozbreak nospace">&nbsp;</div>
<?php if($DYN_arhpostpostmeta=="" || $DYN_arhpostpostmeta=="archive_only") { ?>

    <div class="postmetadata">
    	<p><small><?php echo get_the_date(); ?></small> <span class="break">&nbsp;</span> <?php the_tags('Tags: ', ', ', '<br />'); ?> <small><?php _e('Category:', 'DynamiX' ); ?></small> <?php the_category(', ') ?> <span class="break">&nbsp;</span> <?php edit_post_link('Edit', '', ' <span class="break">&nbsp;</span> '); ?>  <?php comments_popup_link( __('No Comments', 'DynamiX' ) .' <span class="comments no"><img src="'. get_bloginfo('template_url') .'/images/blank.gif" alt="comments" width="30" height="25" /></span> ', '1 '. __('Comment', 'DynamiX' ) . ' <span class="comments yes"><img src="'. get_bloginfo('template_url') .'/images/blank.gif" alt="comments" width="30" height="25" /></span> ', '% '. __('Comments', 'DynamiX' ) . ' <span class="comments yes"><img src="'. get_bloginfo('template_url') .'/images/blank.gif" alt="comments" width="30" height="25" /></span> '); ?></p>
	</div><!-- /postmetadata -->

<?php } ?>

		</div><!-- / post_class -->
<?php } 

/******************************************************************/
/*	NORMAL BLOG *END*						      				  */
/******************************************************************/
?>
<?php endwhile; ?>

	<?php else :

		if ( is_category() ) { // If this is a category archive
			printf("<h2 class='center'>". __("Sorry, but there aren't any posts in the %s category yet.", 'DynamiX' ) ."</h2>", single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo("<h2>". __( "Sorry, but there aren't any posts with this date.", 'DynamiX' )  ."</h2>");
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<h2 class='center'>". __("Sorry, but there aren't any posts by %s yet.", 'DynamiX' ) ."</h2>", $userdata->display_name);
		} else {
			echo("<h2 class='center'>". __('No posts found.', 'DynamiX' ) ."</h2>");
		}

	endif;

if($DYN_gridblog) {
if($postcount!="3" && $postcount!="0") { 
	$postcount="0";
?>
		</div><!--  / panelwrap -->
<?php } ?>

	</div>
</div>
<?php } 

$postcount = 0; ?>



				<div class="clear"></div>
                </div><!-- /content -->
                <div class="clear"></div>
                
<?php
include(CWZ_FILES .'/inc/wp-pagenavi.php');

if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
wp_reset_query();
?>

     
	</div><!-- /mid-wrap -->

<?php get_sidebar(); ?>

<?php } // Hide Content *END* ?>

<?php get_footer(); ?>
