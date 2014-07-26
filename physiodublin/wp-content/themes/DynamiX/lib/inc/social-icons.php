<?php 
if($DYN_disableheart=="yes") { ?><div class="socialicons" style="display:block;"><?php } else { ?>
	<div id="togglesocial">
		<ul>                     
			<li class="socialinit"><img src="<?php bloginfo("template_url"); ?>/images/blank.gif" width="26" height="22" alt="Show Icons" /></li>
			<li style="display: none;" class="socialhide"><img src="<?php bloginfo("template_url"); ?>/images/blank.gif" width="26" height="22" alt="Show Icons" /></li>
		</ul>
	</div><!-- /togglesocial -->                            
<div class="socialicons">
<?php } ?>

<ul>
<?php if($DYN_socialdeli!="yes") { ?>
<li class="social-delicious"><a href="http://del.icio.us/post?url=<?php the_permalink() ?>&amp;title=<?php the_title() ?>" title="<?php _e('Submit to', 'DynamiX' ); ?> Del.icio.us" target="_blank"><img src="<?php bloginfo("template_url"); ?>/images/blank.gif" width="21" height="21" alt="Delicious" /></a></li><?php } ?>  
<?php if($DYN_socialdigg!="yes") { ?>
<li class="social-digg"><a href="http://www.digg.com/submit?phase=2&amp;url=<?php the_permalink() ?>&amp;title=<?php the_title() ?>" title="<?php _e('Submit to', 'DynamiX' ); ?> Digg" target="_blank"><img src="<?php bloginfo("template_url"); ?>/images/blank.gif" width="21" height="21" alt="Digg" /></a></li><?php } ?>  
<?php if($DYN_socialtwitter!="yes") { ?>
<li class="social-twitter"><a href="http://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink() ?>" title="<?php _e('Submit to', 'DynamiX' ); ?> Twitter" target="_blank"><img src="<?php bloginfo("template_url"); ?>/images/blank.gif" width="21" height="21" alt="Twitter" /></a></li><?php } ?>  
<?php if($DYN_socialfb!="yes") { ?>
<li class="social-facebook"><a href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>&amp;t=<?php echo  the_title(); ?>" title="<?php _e('Submit to', 'DynamiX' ); ?> Facebook" target="_blank"><img src="<?php bloginfo("template_url"); ?>/images/blank.gif" width="21" height="21" alt="Facebook" /></a></li><?php } ?> 
<?php if($DYN_socialrss!="yes") { ?>
<li class="social-rss"><a href="<?php echo get_permalink(); ?>feed/rss/" title="RSS" target="_blank"><img src="<?php bloginfo("template_url"); ?>/images/blank.gif" width="21" height="21" alt="RSS" /></a></li><?php } ?>  
</ul>
</div><!-- /socialicons -->
<div class="clear"></div>