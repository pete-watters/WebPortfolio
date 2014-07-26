<!-- FEATURED BLOCK - BIG SLIDER-->

<div id="feature-wrap">
			<div id="feature-inner-wrap">
						<div id="feature">
									<div id="slide-frame">
												<div class="p-slide"></div>
												<div class="n-slide"></div>
												<div id="cycle">
															<?php		
global $post;
query_posts(array('post_type' => 'phislide', 'showposts' => '-1'));

if (have_posts()): while (have_posts()) : the_post(); 		

						$slideurl = get_post_meta($post->ID,'phi_customurl',true);
						$slideurlname = get_post_meta($post->ID,'phi_customurlname',true);
												
?>
															<div class="slide">
																		<?php phi_post_image('slider','',$slideurl);?>
																		<div class="slide-info">
																					<?php if($slideurl):?>
																					<div class="slide-button"><a href="<?php echo $slideurl;?>" class="button-dark"><span><?php echo $slideurlname;?></span></a></div>
																					<?php endif;?>
																					<div class="slide-text">
																								<h1>
																											<?php the_title();?>
																								</h1>
																								<?php the_excerpt();?>
																					</div>
																		</div>
															</div>
															<?php endwhile; ?>
															<?php endif; ?>
															<?php wp_reset_query();?>
												</div>
									</div>
						</div>
			</div>
</div>
<!-- / FEATURED BLOCK -->
