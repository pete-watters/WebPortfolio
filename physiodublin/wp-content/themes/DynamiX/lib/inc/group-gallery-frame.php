<?php 
if($DYN_movieurl && $DYN_videotype=="") { // Check if using JW Player -> Add Skin if enabled
	 $isplayer = strpos($DYN_movieurl, "player.swf");
	 
	 if ($isplayer !== false) {
	 		
			if($DYN_videoautoplay=="1") {
				$DYN_movieurl .= "&amp;autostart=true";
			}
			
			if(get_option('jwplayer_skin')) {
				$DYN_movieurl .="&amp;skin=".get_option('jwplayer_skin');
			}
			
			if(get_option('jwplayer_skinpos')) {
				$DYN_movieurl .="&amp;controlbar.position=".get_option('jwplayer_skinpos');
			}			

	 }
}
?>

<?php if($postcount=="1") { ?>
	
    <div class="panelwrap clearfix" style="height:<?php echo $DYN_galleryheight; ?>px">

<?php } ?>


	<div class="panel <?php if($postcount!="1") { ?> border-left <?php } else { ?> border-first <?php } ?>">
    
<?php if($DYN_groupgridcontent!="text") { ?> 

    <?php if($DYN_videotype) { // Check "Preview Image" field is completed ?>    
   
		<div class="container videotype <?php echo $DYN_shadowsize.' '.$DYN_imageeffect.' '.$DYN_cssclasses; ?>">
			<div class="gridimg-wrap" style="width:<?php echo $DYN_imgwidth; ?>px;height:<?php echo $DYN_imgheight; ?>px">
				<div class="title-wrap" style="width:<?php echo $DYN_imgwidth; ?>px">	             			
				<?php           
 
				$vidurl = $DYN_movieurl;
				$file = basename($vidurl); 
				$parts = explode(".", $file); 
				//File name 
				$vidid = $parts[0]; 
  				if($DYN_videotype=="youtube") {
				
                        $vidid = strstr($vidid,'='); // trim id after = 
						$vidremove = strstr($vidid,'&'); // trim id after = 
						
						$ishd = strpos($vidremove ,"hd=1");
						if($ishd!=false) {
							$ishd="hd=1";
						} else {
							$ishd="hd=0";
						}
						
						$vidid = str_replace($vidremove,"",$vidid);
                        $vidid = substr($vidid, 1); // remove =		
					
				} elseif($DYN_videotype=="swf" || $DYN_videotype=="jwp") {
					$vidid = $vidurl;
				}
				
				if($DYN_videotype=="youtube") { ?>
				
				<iframe class="youtube-player" type="text/html" width="<?php echo $DYN_imgwidth; ?>" height="<?php echo $DYN_imgheight; ?>" src="http://www.youtube.com/embed/<?php echo $vidid; ?>?autoplay=<?php echo $DYN_videoautoplay ?>&amp;wmode=opaque&amp;title="></iframe>
				
				<?php } elseif($DYN_videotype=="vimeo") { ?>
				
				<iframe src="http://player.vimeo.com/video/<?php echo $vidid; ?>?autoplay=<?php echo $DYN_videoautoplay ?>&amp;title=0&amp;byline=0&amp;portrait=0" width="<?php echo $DYN_imgwidth; ?>" height="<?php echo $DYN_imgheight; ?>"></iframe>
				
				<?php } elseif($DYN_videotype=="swf") {?>
				
                <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="<?php echo $DYN_imgwidth; ?>" height="<?php echo $DYN_imgheight; ?>">
                    <param name="movie" value="<?php echo $vidid; ?><?php if($DYN_videotype!="swf") { ?>&amp;autoplay=<?php echo $DYN_videoautoplay ?><?php } ?>" />
                    <param name="wmode" value="transparent" />
                    <param name="allowFullScreen" value="true" />
                    <param name="allowScriptAccess" value="always" />
                    <param name="scale" value="exactfit">	
                    <!--[if !IE]>-->                
                    <object type="application/x-shockwave-flash" data="<?php echo $vidid; ?><?php if($DYN_videotype!="swf") { ?>&amp;autoplay=<?php echo $DYN_videoautoplay ?><?php } ?>" width="<?php echo $DYN_imgwidth; ?>" height="<?php echo $DYN_imgheight; ?>">
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
                    'width': '<?php echo $DYN_imgwidth; ?>',
                    'height': '<?php echo $DYN_imgheight; ?>',
                    'file': '<?php echo $vidid; ?>',
					<?php if(get_option('jwplayer_plugins')) { ?>
					'plugins': '<?php echo get_option('jwplayer_plugins'); ?>',
					<?php } ?>					
                    <?php if(get_option('jwplayer_skin')) { ?>
                    'skin': '<?php echo get_option('jwplayer_skin'); ?>',
                    <?php } ?>
                    <?php if(get_option('jwplayer_skinpos')) { ?>
                    'controlbar.position': '<?php echo get_option('jwplayer_skinpos'); ?>',
                    <?php } ?>				
                    <?php if($DYN_imgwidth <="250") { ?>
                    'controlbar': 'false',
                    <?php } ?>
                    'wmode': 'transparent',
                    'controlbar.idlehide':'true',
                    'stretching': 'exactfit',
                    'image': '<?php echo dyn_getimagepath($DYN_previewimgurl); ?>',
                    'players': [
                        {type: 'flash', src: '<?php echo get_option('jwplayer_swf'); ?>'},
                        {type: 'html5'},
                        {type: 'download'}
                    ]
                });
                  
                jQuery(document).ready(function() {
                    jQuery('#<?php echo $slide_id; ?>').addClass('jwplayer'); 
                    jQuery('#<?php echo $slide_id; ?>').addClass('id<?php echo esc_attr($id); ?>'); 
                    if("1"=="<?php echo $DYN_videoautoplay; ?>") {
                        jQuery('#<?php echo $slide_id; ?>').addClass('autostart'); 
                        if("1"=="<?php echo $postcount; ?>") {
                        jQuery('#<?php echo $slide_id; ?>').addClass('first'); 
                        } 
                    }
                });		
                </script>
    
                <?php } ?>

 					<?php if(($DYN_groupgridcontent=="titleoverlay" || $DYN_groupgridcontent=="titletextoverlay")  && $DYN_slidesetid=="") { ?>
                    <div class="title"><h2><?php if(!$DYN_disablegallink) { ?><a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>" title="<?php echo the_title(); ?>"><?php } ?><?php echo the_title(); ?><?php if(!$DYN_disablegallink) { ?></a><?php } ?></h2>
                        
                        <?php if($DYN_groupgridcontent=="titletextoverlay") { ?>
                        <div class="overlaytext">
                            <?php global $more; $more = FALSE; ?>
                            <?php if ( empty($post->post_excerpt) ) {
                                        
                                the_excerpt_reloaded($DYN_galleryexcerpt, '<a>', 'content', false);
                                if(!$DYN_disablegallink && !$DYN_disablereadmore) { ?>
                                <a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>"><?php _e( 'Read More', 'DynamiX' );  ?></a>
                                <?php }
                            } else {
                                        
                                the_excerpt(); 
                                if(!$DYN_disablegallink && !$DYN_disablereadmore) { ?>
                                <a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>"><?php _e( 'Read More', 'DynamiX' );  ?></a>
                                <?php }
                                        
                            } ?>
                        </div> 
                        <?php } ?>
                    </div>	
                    <?php }  elseif(($DYN_groupgridcontent=="titleoverlay" || $DYN_groupgridcontent=="titletextoverlay") && $DYN_slidesetid!="") { ?>	
                    <div class="title"><h2><?php if(!$DYN_disablegallink) { ?><a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } ?>" title="<?php echo $DYN_posttitle; ?>" target="_blank"><?php } ?><?php echo $DYN_posttitle; ?><?php if(!$DYN_disablegallink) { ?></a><?php } ?></h2>
                        <?php if($DYN_groupgridcontent=="titletextoverlay") { ?>
                        <div class="overlaytext">
                        <?php echo do_shortcode($DYN_description); ?>
                        </div> 
                        <?php } ?>
                    </div>	             
                    <?php } ?>	
                    
				</div><!-- / title-wrap -->    	
			</div><!-- / gridimg-wrap -->
		</div><!-- / container -->		    
        
    <?php } elseif($DYN_previewimgurl) { // Check "Preview Image" field is completed ?>            
 
   
		<div class="container <?php echo $DYN_shadowsize.' '.$DYN_imageeffect.' '.$DYN_cssclasses; ?>">
			<div class="gridimg-wrap">
				<div class="title-wrap" style="width:<?php echo $DYN_imgwidth; ?>px">	
					<?php if($DYN_lightbox=="yes") { ?><a href="<?php if($DYN_movieurl) { echo $DYN_movieurl; } else { echo $DYN_previewimgurl; } ?>" rel="prettyPhoto[gallery]" <?php if($DYN_movieurl) { ?> class="galleryvid" <?php } else { ?> class="galleryimg" <?php } ?> style="height:<?php echo $DYN_imgheight;?>px"><?php } elseif(!$DYN_disablegallink) { ?><a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>" title="<?php if($DYN_slidesetid) { echo $DYN_posttitle; } else { the_title(); } ?>"><?php } ?>
                    
                        <img <?php if($DYN_imageeffect=="reflection" || $DYN_imageeffect=="shadowreflection") { ?>class="reflect"<?php } ?> src="<?php echo $DYN_imagepath . dyn_getimagepath($DYN_previewimgurl); ?>" alt="<?php if($DYN_slidesetid) { echo $DYN_posttitle; } else { the_title(); } ?>" width="<?php echo $DYN_imgwidth; ?>" height="<?php echo $DYN_imgheight; ?>" />
                    <?php if(!$DYN_disablegallink || $DYN_lightbox=="yes") { ?>
                        </a>
                    <?php } ?>

                <?php if(($DYN_groupgridcontent=="titleoverlay" || $DYN_groupgridcontent=="titletextoverlay")  && $DYN_slidesetid=="") { ?>
            	<div class="title"><h2><?php if(!$DYN_disablegallink) { ?><a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>" title="<?php echo the_title(); ?>"><?php } ?><?php echo the_title(); ?><?php if(!$DYN_disablegallink) { ?></a><?php } ?></h2>
                    
                    <?php if($DYN_groupgridcontent=="titletextoverlay") { ?>
                    <div class="overlaytext">
						<?php global $more; $more = FALSE; ?>
                        <?php if ( empty($post->post_excerpt) ) {
                                    
                            the_excerpt_reloaded($DYN_galleryexcerpt, '<a>', 'content', false);
                            if(!$DYN_disablegallink && !$DYN_disablereadmore) { ?>
                            <a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>"><?php _e( 'Read More', 'DynamiX' );  ?></a>
                            <?php }
                        } else {
                                    
                            the_excerpt(); 
                            if(!$DYN_disablegallink && !$DYN_disablereadmore) { ?>
                            <a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>"><?php _e( 'Read More', 'DynamiX' );  ?></a>
                            <?php }
                                    
                        } ?>
                    </div>         
                    <?php } ?>                          
                </div>	
                <?php }  elseif(($DYN_groupgridcontent=="titleoverlay" || $DYN_groupgridcontent=="titletextoverlay")  && $DYN_slidesetid!="") { ?>	
				<div class="title"><h2><?php if(!$DYN_disablegallink) { ?><a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } ?>" title="<?php echo $DYN_posttitle; ?>" target="_blank"><?php } ?><?php echo $DYN_posttitle; ?><?php if(!$DYN_disablegallink) { ?></a><?php } ?></h2>
                    
                    <?php if($DYN_groupgridcontent=="titletextoverlay") { ?>
                    <div class="overlaytext">
                    <?php echo do_shortcode($DYN_description); ?>
                	</div>      
                    <?php } ?>                              
                </div>	             
                <?php } ?>	
				</div><!-- / title-wrap --> 			           	
			</div><!-- / gridimg-wrap -->
		</div><!-- / container -->				
				
	<?php } elseif($image) { // Check image exists within post ?>
            	
         <div class="container <?php echo $DYN_shadowsize.' '.$DYN_imageeffect.' '.$DYN_cssclasses; ?>">
            <div class="gridimg-wrap">
				<div class="title-wrap" style="width:<?php echo $DYN_imgwidth; ?>px">                   
					<?php if($DYN_lightbox=="yes") { ?><a href="<?php if($DYN_movieurl) { echo $DYN_movieurl; } else { echo $image; } ?>" rel="prettyPhoto[gallery]" <?php if($DYN_movieurl) { ?> class="galleryvid" <?php } else { ?> class="galleryimg" <?php } ?> style="height:<?php echo $DYN_imgheight;?>px" ><?php } elseif(!$DYN_disablegallink) { ?><a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>" title="<?php echo the_title(); ?>"><?php } ?>
                    
                        <img <?php if($DYN_imageeffect=="reflection" || $DYN_imageeffect=="shadowreflection") { ?>class="reflect"<?php } ?> src="<?php echo $DYN_imagepath . dyn_getimagepath($image); ?>" alt="<?php the_title(); ?>" width="<?php echo $DYN_imgwidth; ?>" height="<?php echo $DYN_imgheight; ?>" />
                    <?php if(!$DYN_disablegallink || $DYN_lightbox=="yes") { ?>
                        </a>
                    <?php } ?>

                <?php if(($DYN_groupgridcontent=="titleoverlay" || $DYN_groupgridcontent=="titletextoverlay")  && $DYN_slidesetid=="") { ?>
            	<div class="title"><h2><?php if(!$DYN_disablegallink) { ?><a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>" title="<?php echo the_title(); ?>"><?php } ?><?php echo the_title(); ?><?php if(!$DYN_disablegallink) { ?></a><?php } ?></h2>
                    
                    <?php if($DYN_groupgridcontent=="titletextoverlay") { ?>
                    <div class="overlaytext">
						<?php global $more; $more = FALSE; ?>
                        <?php if ( empty($post->post_excerpt) ) {
                                    
                            the_excerpt_reloaded($DYN_galleryexcerpt, '<a>', 'content', false);
                            if(!$DYN_disablegallink && !$DYN_disablereadmore) { ?>
                            <a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>"><?php _e( 'Read More', 'DynamiX' );  ?></a>
                            <?php }
                        } else {
                                    
                            the_excerpt(); 
                            if(!$DYN_disablegallink && !$DYN_disablereadmore) { ?>
                            <a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>"><?php _e( 'Read More', 'DynamiX' );  ?></a>
                            <?php }
                                    
                        } ?>
                    </div>         
                    <?php } ?>                          
                </div>	
                <?php }  elseif(($DYN_groupgridcontent=="titleoverlay" || $DYN_groupgridcontent=="titletextoverlay")  && $DYN_slidesetid!="") { ?>	
				<div class="title"><h2><?php if(!$DYN_disablegallink) { ?><a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } ?>" title="<?php echo $DYN_posttitle; ?>" target="_blank"><?php } ?><?php echo $DYN_posttitle; ?><?php if(!$DYN_disablegallink) { ?></a><?php } ?></h2>
                    
                    <?php if($DYN_groupgridcontent=="titletextoverlay") { ?>
                    <div class="overlaytext">
                    <?php echo do_shortcode($DYN_description); ?>
                	</div>      
                    <?php } ?>                              
                </div>	             
                <?php } ?>	
                    
				</div><!-- / title-wrap -->                
			</div><!-- / gridimg-wrap --> 
		</div><!-- / container-->		         
     
    
	<?php }
	
	} ?>        
        

<?php if(($DYN_groupgridcontent!="image" && $DYN_groupgridcontent!="titleoverlay" && $DYN_groupgridcontent!="titletextoverlay" ) && $DYN_slidesetid=="") { ?>      
        
		<div class="panelcontent <?php echo $DYN_cssclasses; ?>" <?php if($DYN_groupgridcontent=="text") { ?>style="padding-top:15px;"<?php } ?>>
			<h2><?php if(!$DYN_disablegallink) { ?><a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>" title="<?php echo the_title(); ?>"><?php } ?><?php echo the_title(); ?><?php if(!$DYN_disablegallink) { ?></a><?php } ?></h2>

<?php if($DYN_groupgridcontent!="titleimage") { ?> 

			<?php global $more; $more = FALSE; ?>
			<?php if ( empty($post->post_excerpt) ) {
    					
				the_excerpt_reloaded($DYN_galleryexcerpt, '<a>', 'content', false);
				if(!$DYN_disablegallink && !$DYN_disablereadmore) { ?>
				<a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>"><?php _e( 'Read More', 'DynamiX' );  ?></a>
				<?php }
			} else {
						
				the_excerpt(); 
				if(!$DYN_disablegallink && !$DYN_disablereadmore) { ?>
				<a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>"><?php _e( 'Read More', 'DynamiX' );  ?></a>
				<?php }
    					

			} 
			
			} ?>
       		
		</div><!-- /panelcontent --> 			
			
<?php } elseif(($DYN_groupgridcontent!="image" && $DYN_groupgridcontent!="titleoverlay" && $DYN_groupgridcontent!="titletextoverlay" ) && $DYN_slidesetid!="") { ?>  

		<div class="panelcontent <?php echo $DYN_cssclasses; ?>">
			<h2><?php if(!$DYN_disablegallink) { ?><a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } ?>" title="<?php echo $DYN_posttitle; ?>"><?php } ?><?php echo $DYN_posttitle; ?><?php if(!$DYN_disablegallink) { ?></a><?php } ?></h2>
			
			<?php if($DYN_groupgridcontent!="titleimage")  { ?>
            
			<?php echo do_shortcode($DYN_description);
			
			if(!$DYN_disablegallink && !$DYN_disablereadmore) { ?>
			<p><a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } ?>"><?php _e( 'Read More', 'DynamiX' );  ?></a></p>
			<?php }			
			
			} ?>
       		
		</div><!-- /panelcontent --> 
     
<?php } ?>
	
    </div><!-- /panel -->     
        

<?php if($postcount=="3") { 
	$postcount="0";
?>
	</div><!--  / panelwrap -->
<?php } ?>    