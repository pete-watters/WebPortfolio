<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<?php get_header();

/******************************************************************/
/*	Page Variables							      				  */
/******************************************************************/

if(!$DYN_layout) {
$DYN_layout=get_option("arhlayout"); 
}

if(get_option("postimgheight")) { // Get Image Height
	$DYN_postimgheight = get_option("postimgheight");
} else {
	if($DYN_layout=="layout_one") {	
	$DYN_postimgheight = "400";
	} elseif ($DYN_layout=="layout_three" || $DYN_layout=="layout_five" || $DYN_layout=="layout_six") {
	$DYN_postimgheight = "200";
	} elseif ($DYN_layout=="layout_two" || $DYN_layout=="layout_four") {
	$DYN_postimgheight = "300";
	} else {
	$DYN_postimgheight = "300";
	}
}

if(get_option("postimgwidth")) { // Get Image Height
	$DYN_postimgwidth = get_option("postimgwidth");
	$DYN_shadowwidth = get_option("postimgwidth");
} else {
	$DYN_shadowwidth = $DYN_postimgheight * "1.33"; // If no width is set use 4:3 ratio to calculate shadow width
}

$DYN_imgwrapheight = $DYN_postimgheight + "35";

$DYN_postvidwidth = $DYN_postimgheight * "1.77"; // 16:9 Ratio for Video

$shadowheight = $DYN_postimgheight-"24"; // Get Shadow Position

$DYN_postimgdisplay = get_option("postimgdisplay"); // Lightbox on First / Custom Images

$DYN_postpostpostmeta = get_option("arhpostpostmeta"); // Display Postmeta Data

$DYN_arhpostpostmeta = get_option("arhpostpostmeta"); // Display Postmeta Data

$DYN_blogcontent = get_option("arhpostcontent"); // Post Content

if(!get_option('timthumb_disable')) { // Check is Timthumb is Enabled or Disabled
	$DYN_imagepath = get_bloginfo('template_directory')."/lib/scripts/timthumb.php?h=". $DYN_postimgheight ."&amp;w=". $DYN_postimgwidth ."&amp;zc=". $DYN_imgzoomcrop ."&amp;src="; 
} else {
	$DYN_imagepath="";
}

/******************************************************************/
/*	Page Variables *END*					      				  */
/******************************************************************/

if($DYN_hidecontent!="yes") { ?>

<?php if (have_posts()) : 

    /******************  Get custom field data ******************/             
    
    $pdata = maybe_unserialize(get_post_meta( $post->ID, 'pgopts', true ));
    
    $DYN_movieurl = $pdata["movieurl"]; // Movie File URL
    $DYN_previewimgurl=$pdata["previewimgurl"]; // Preview Image URL
	$DYN_videotype=$pdata["videotype"]; // Video Embed	
    $DYN_stagegallery=$pdata["stagegallery"]; // Stage Layout
    $DYN_disablegallink=$pdata["disablegallink"];
    $DYN_galexturl=$pdata["galexturl"];
    $DYN_imgzoomcrop=$pdata["imgzoomcrop"];
    $DYN_displaytitle=$pdata["displaytitle"];
    $DYN_postsubtitle=$pdata["postsubtitle"];
    $DYN_posttitle=$pdata["posttitle"];
	$DYN_postshowimage=$pdata["postshowimage"];
	$DYN_imgorientation=$pdata["imgorientation"];    
	$DYN_videoautoplay=$pdata["videoautoplay"];

if($DYN_imgzoomcrop=="zoom") {
	$DYN_imgzoomcrop="1";
} elseif($DYN_imgzoomcrop=="zoom crop") {
	$DYN_imgzoomcrop="3";
} else {
	$DYN_imgzoomcrop="0";
}
	
if(get_option("postimgeffect")!="none" && get_option("postimgeffect")!="reflection") { // Image Effect

	if($DYN_imgorientation!="portrait") {
	
		if($DYN_shadowwidth>="850") {
			$shadow_size="shadow-large";
		} elseif($DYN_shadowwidth<"850" && $DYN_shadowwidth>="300" ) {
			$shadow_size="shadow-medium";
		} elseif($DYN_shadowwidth<"300" && $DYN_shadowwidth>="200") {
			$shadow_size="shadow-small";
		} elseif ($DYN_shadowwidth<"200") {
			$shadow_size="shadow-xsmall";
		}
		
		} else {
		if($DYN_postimgheight>="850") {
			$shadow_size="shadow-large";
		} elseif($DYN_postimgheight<"850" && $DYN_postimgheight>="350" ) {
			$shadow_size="shadow-medium";
		} elseif($DYN_postimgheight<"350" && $DYN_postimgheight>="250") {
			$shadow_size="shadow-small";
		} elseif ($DYN_postimgheight<"250") {
			$shadow_size="shadow-xsmall";
		}
	}
} 

if(get_option("postimgeffect")) {
	$image_effect=get_option("postimgeffect");
} else {
	$image_effect="shadowreflection";
}

if(get_option("postimgeffect")!="none" && get_option("postimgeffect")!="shadow") {
	$image_reflect='class="reflect"';
}	

$slide_id='';
$slide_id="slide-".$post->ID;
    
    /****************** / Get custom field data *****************/ 


	if($DYN_layout!="layout_four" && $DYN_layout!="layout_five") { 
		get_sidebar(); 
	} 

	?>

 			
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

<?php while (have_posts()) : the_post(); ?>

				<div class="post" id="post-<?php the_ID(); ?>"> 
                	<div class="entry">
<?php if($DYN_textresize=="yes") { ?>
					<div class="textresize">
						<ul>
							<li class="resize-sml"><img src="<?php bloginfo("template_url"); ?>/images/blank.gif" width="16" height="22"  alt="Decrease" class="decreaseFont" /></li>
							<li class="resize-lrg"><img src="<?php bloginfo("template_url"); ?>/images/blank.gif" width="20" height="22"  alt="Increase" class="increaseFont" /></li>
						</ul>
					</div><!-- /textresizer -->
<?php } ?>
<?php if($DYN_socialicons=="yes") { 
	require_once CWZ_FILES .'/inc/social-icons.php';
} ?>

<?php if($DYN_postshowimage!="archive") { ?>

<?php if(($DYN_previewimgurl || $DYN_videotype) && $DYN_blogcontent!="" || $DYN_postshowimage=="single" || $DYN_postshowimage=="singlearchive" ) { ?>
	<?php if($DYN_videotype) { // Check "Preview Image" field is completed ?>    
    
	
			<div class="container videotype <?php echo $image_effect; ?> <?php if($shadow_size) echo $shadow_size; ?>">
                             						
			<div class="gridimg-wrap" style="height:<?php echo $DYN_postimgheight; ?>px;width:<?php if($DYN_postimgwidth) { echo $DYN_postimgwidth; } else { echo $DYN_postvidwidth; } ?>px">                             	
				
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
				
				<iframe class="youtube-player" type="text/html" width="<?php if($DYN_postimgwidth) { echo $DYN_postimgwidth; } else { echo $DYN_postvidwidth; } ?>" height="<?php echo $DYN_postimgheight; ?>" src="http://www.youtube.com/embed/<?php echo $vidid; ?>?autoplay=<?php echo $DYN_videoautoplay ?>&amp;wmode=opaque&amp;title=" frameborder="0"></iframe>
				
				<?php } elseif($DYN_videotype=="vimeo") { ?>
				
				<iframe class="vimeo-player" src="http://player.vimeo.com/video/<?php echo $vidid; ?>?autoplay=<?php echo $DYN_videoautoplay ?>&amp;title=0&amp;byline=0&amp;portrait=0" width="<?php if($DYN_postimgwidth) { echo $DYN_postimgwidth; } else { echo $DYN_postvidwidth; } ?>" height="<?php echo $DYN_postimgheight; ?>" frameborder="0"></iframe>
				
				<?php } elseif($DYN_videotype=="swf") {?>
				          
			<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="<?php if($DYN_postimgwidth) { echo $DYN_postimgwidth; } else { echo $DYN_postvidwidth; } ?>" height="<?php echo $DYN_postimgheight; ?>">
				<param name="movie" value="<?php echo $vidid; ?><?php if($DYN_videotype!="swf") { ?>&amp;autoplay=<?php echo $DYN_videoautoplay ?><?php } ?>" />
                <param name="wmode" value="transparent" />
                <param name="allowFullScreen" value="true" />
                <param name="allowScriptAccess" value="always" />
                <param name="scale" value="exactfit">
           		<!--[if !IE]>-->                
				<object type="application/x-shockwave-flash" data="<?php echo $vidid; ?><?php if($DYN_videotype!="swf") { ?>&amp;autoplay=<?php echo $DYN_videoautoplay ?><?php } ?>" width="<?php if($DYN_postimgwidth) { echo $DYN_postimgwidth; } else { echo $DYN_postvidwidth; } ?>" height="<?php echo $DYN_postimgheight; ?>">
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
                'width': '<?php if($DYN_postimgwidth) { echo $DYN_postimgwidth; } else { echo $DYN_postvidwidth; } ?>',
                'height': '<?php echo $DYN_postimgheight; ?>',
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
				if("yes"=="<?php echo $DYN_videoautoplay; ?>") {
					jwplayer('<?php echo $slide_id; ?>').play(); 

				}
			});		
            </script>

			<?php } ?>

			</div><!-- / gridimg-wrap -->
				
            	

		</div><!-- / container -->		    
	
	

        
    <?php } elseif($DYN_previewimgurl) { // Check "Preview Image" field is completed ?>


		<div class="container <?php echo $image_effect; ?> <?php if($shadow_size) echo $shadow_size; ?>" align="center">
            	
				<?php if($DYN_postimgdisplay=="lightbox") { ?><a href="<?php if($DYN_movieurl) { echo $DYN_movieurl; } else { echo $DYN_previewimgurl; } ?>" rel="prettyPhoto[gallery]" <?php if($DYN_movieurl) { ?> class="galleryvid" <?php } else { ?> class="galleryimg" <?php } ?> ><?php } elseif(!$DYN_disablegallink) { ?><a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>" title="<?php echo the_title(); ?>"><?php } ?>
                
					<img <?php echo $image_reflect; ?> src="<?php echo $DYN_imagepath . dyn_getimagepath($DYN_previewimgurl); ?>"  <?php if($DYN_postimgwidth) { ?>width="<?php echo $DYN_postimgwidth; ?>" <?php } ?>  <?php if($DYN_postimgheight) { ?>height="<?php echo $DYN_postimgheight; ?>" <?php } ?> />
				<?php if(!$DYN_disablegallink || $DYN_arhimgdisplay=="lightbox") { ?>
					</a>
				<?php } ?>
            	

		</div><!-- / archiveimg-wrap -->	
	<?php } ?>
	<?php } ?>
<?php } ?>
 						<div class="post-titles"><!-- post-titles -->
                        	<?php if($DYN_posttitle) { ?>
							<?php if($DYN_posttitle != "BLANK") { ?>
                        		<h1><?php echo htmlspecialchars($DYN_posttitle); ?></h1>
							<?php } ?>    
							<?php } else { ?>
							<?php if($DYN_posttitle != "BLANK") { ?>                            
								<h1><?php the_title(); ?></h1>		
							<?php } ?>                                  					
							<?php } ?>							
							<?php if($DYN_postsubtitle) { ?>
							<h2><?php echo htmlspecialchars($DYN_postsubtitle); ?></h2>
							<?php } ?>
							<?php if($DYN_postdate) { ?>
								<p class="post-date">
								<?php if($DYN_postdate) { ?>
									<small><?php the_time('F jS | Y'); ?></small>
								<?php } ?>
								</p>        
							<?php } ?>
                            </div><!-- /post-titles -->
                            

<?php if($DYN_arhpostpostmeta=="" || $DYN_arhpostpostmeta=="post_only") { ?>
                       <div class="hozbreak nospace">&nbsp;</div>
                       <div class="postmetadata">
                                <p><small><?php echo get_the_date(); ?></small> <span class="break">&nbsp;</span> <?php the_tags('Tags: ', ', ', '<br />'); ?> <small><?php _e('Category:', 'DynamiX' ); ?></small> <?php the_category(', ') ?> <span class="break">&nbsp;</span> <?php edit_post_link(__('Edit', 'DynamiX' ), '', ' <span class="break">&nbsp;</span> '); ?>  <?php comments_popup_link( __('No Comments', 'DynamiX' ) .' <span class="comments no"><img src="'. get_bloginfo('template_url') .'/images/blank.gif" alt="comments" width="30" height="25" /></span> ', '1 '. __('Comment', 'DynamiX' ) . ' <span class="comments yes"><img src="'. get_bloginfo('template_url') .'/images/blank.gif" alt="comments" width="30" height="25" /></span> ', '% '. __('Comments', 'DynamiX' ) . ' <span class="comments yes"><img src="'. get_bloginfo('template_url') .'/images/blank.gif" alt="comments" width="30" height="25" /></span> '); ?></p>
                        </div><!-- /postmetadata -->
<?php } ?>                                                                 
							<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>  
                            
                            <?php wp_link_pages(array('before' => '<p><strong>'.__('Pages', 'DynamiX' ).':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                            
						</div><!-- /entry -->                                                                            
				</div><!-- /post -->
				<div class="clear"></div>
                <div class="hozbreak">&nbsp;</div>
                <?php if($DYN_authorname) { ?>
				<?php $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author')); ?>
                <?php echo get_avatar( get_the_author_email(), '68' ); ?>
                <strong><?php _e('About the Author:', 'DynamiX' ); ?></strong> <?php the_author_posts_link(); ?><p>&nbsp;</p>
                <p><?php the_author_description(); ?></p>
				<?php } ?>                         
				<?php comments_template(); ?>
				<?php edit_post_link(__('Edit this entry.', 'DynamiX' ), '<p>', '</p>'); ?>
 
 <?php endwhile; endif; ?>                   
			</div><!-- /content -->                    
		<div class="clear"></div>

	</div><!-- /mid-wrap -->                    
                                       

<?php get_sidebar(); ?>


<?php } // Hide Content *END* ?>

<?php get_footer(); ?>
