<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script> 
<title>
<?php wp_title('&laquo;', true, 'right'); ?>
<?php bloginfo('name'); ?>
</title>

<?php phi_enqueue_theme_js();?>
<?php load_theme_textdomain( 'itworx', TEMPLATEPATH . '/languages' );?>
<?php wp_head(); ?>
<meta name="kill_dropdown" content="<?php echo get_option('phi_dropdown');?>" />
<meta name="cycle_slider_timeout" content="<?php echo get_option('phi_cycle_slider_timeout'); ?>" />
<meta name="cycle_slider_effect" content="<?php echo get_option('phi_cycle_slider_effect'); ?>" />
<meta name="nivo_slider_effect" content="<?php echo get_option('phi_nivo_slider_effect'); ?>" />
<meta name="nivo_slider_timeout" content="<?php echo get_option('phi_nivo_slider_timeout'); ?>" />
<meta name="nivo_slider_slices" content="<?php echo get_option('phi_nivo_slider_slices'); ?>" />

<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/style.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/lib/css/skins/<?php echo get_option('phi_mycolourscheme');?>.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/lib/css/prettyPhoto.css"/>


<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/lib/scripts/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/lib/scripts/jquery.easing.1.1.3.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/lib/scripts/jquery.kwicks.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/lib/scripts/jquery.nivo.slider.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/lib/scripts/jquery.cycle.all.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/lib/scripts/custom.js"></script>
<?php if(get_option('phi_enable_config')== true):?>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/lib/scripts/colorpicker.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/lib/scripts/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/lib/scripts/demo.js"></script>
<?php endif;?>

<!-- / demo script -->

<?php styleString();?>

</head>
<body  <?php body_class( $class ); ?>>
<!-- demo only -->
<?php if(get_option('phi_enable_config')== true):?>
<div id="options_panel">
			<div id="options_panel_content_wrap">
						<form action="" method="post">
									<div id="options_panel_content">
												<div id="close"></div>
												<h2>Options</h2>
												<h6><span>Colors</span></h6>
												<div class="one-fifth">
															<div class="selector_wrap">
																		<div id="colorSelector" class="colorSelector">
																					<div style="background-color:#333"></div>
																		</div>
																		<span class="selector_text">Page</span> </div>
															<div class="selector_wrap">
																		<div id="colorSelector2" class="colorSelector">
																					<div style="background-color:#c03"></div>
																		</div>
																		<span class="selector_text">Links</span> </div>
															<div class="selector_wrap">
																		<div id="colorSelector3" class="colorSelector">
																					<div style="background-color:#555"></div>
																		</div>
																		<span class="selector_text">Menu</span> </div>
															
												</div>
												
												<h6><span>Select fonts</span></h6>
												<div class="one-fifth">
												<h6>Title fonts</h6>
												<select name="titlefont" id="titlefont">
												<option value="Arial">Arial</option>
												<option value="CandelaBook">Candela</option>
												<option value="CandelaBold">Candela Bold</option>
												<option value="CopseRegular">Copse</option>
												<option value="Courier New, Courier, monospace">Courier New</option>
												<option value="CousineRegular,Courier New, Courier, monospace">Cousine</option>
												<option value="CousineBold,Courier New, Courier, monospace">Cousine Bold</option>
												<option value="Georgia, Times New Roman, Times, serif">Georgia</option>
												<option value="JosefinSlabLight">Josefin Slab Light</option>
												<option value="JosefinSlabRegular">Josefin Slab Regular</option>
												<option value="JosefinSlabBold">Josefin Slab Bold</option>
												<option value="LacunaRegular">Lacuna</option>
												<option value="LatoRegular">Lato Regular</option>
												<option value="LatoBold">Lato Bold</option>
												<option value="LeagueGothic, Arial,Verdana,Helvetica,  sans serif">League Gothic</option>
												<option value="Lobster13Regular">Lobster</option>
												<option value="Lucida Sans Unicode, Helvetica, Lucida Grande,  sans serif">Lucida Sans Unicode</option>
												<option value="MarketingScriptRegular">Marketing script</option>
												<option value="PTSansRegular,Arial,Verdana, Geneva,Helvetica,  sans serif">PTSans</option>
												<option value="PTSansBold,Arial,Verdana, Geneva,Helvetica,  sans serif">PTSans Bold</option>
												<option value="PTSerifRegular">PTSerif</option>
												<option value="PTSerifBold">PTserif Bold</option>
												<option value="Tahoma, Geneva, Helvetica, sans serif">Tahoma</option>
												<option value="TinosRegular">Tinos</option>
												<option value="TinosBold">Tinos Bold</option>
												<option value="Trebuchet MS, Arial, Helvetica, sans serif">Trebuchet MS</option>
												<option value="UbuntuRegular,Arial,Verdana,Helvetica,  sans serif">Ubuntu</option>
												<option value="UbuntuBold,Arial,Verdana,Helvetica,  sans serif">Ubuntu Bold</option>
												<option value="Verdana, Geneva,Helvetica,  sans serif">Verdana</option>
												<option value="YanoneKaffeesatz, Arial,Helvetica,  sans serif">YanoneKaffeesatz</option>
												</select>
												
												<h6>Menu fonts</h6>
												<select name="menufont" id="menufont">
												<option value="Arial">Arial</option>
												<option value="CandelaBook">Candela</option>
												<option value="CandelaBold">Candela Bold</option>
												<option value="CopseRegular">Copse</option>
												<option value="Courier New, Courier, monospace">Courier New</option>
												<option value="CousineRegular,Courier New, Courier, monospace">Cousine</option>
												<option value="CousineBold,Courier New, Courier, monospace">Cousine Bold</option>
												<option value="Georgia, Times New Roman, Times, serif">Georgia</option>
												<option value="JosefinSlabLight">Josefin Slab Light</option>
												<option value="JosefinSlabRegular">Josefin Slab Regular</option>
												<option value="JosefinSlabBold">Josefin Slab Bold</option>
												<option value="LacunaRegular">Lacuna</option>
												<option value="LatoRegular">Lato Regular</option>
												<option value="LatoBold">Lato Bold</option>
												<option value="LeagueGothic, Arial,Verdana,Helvetica,  sans serif">League Gothic</option>
												<option value="Lobster13Regular">Lobster</option>
												<option value="Lucida Sans Unicode, Helvetica, Lucida Grande,  sans serif">Lucida Sans Unicode</option>
												<option value="MarketingScriptRegular">Marketing script</option>
												<option value="PTSansRegular,Arial,Verdana, Geneva,Helvetica,  sans serif">PTSans</option>
												<option value="PTSansBold,Arial,Verdana, Geneva,Helvetica,  sans serif">PTSans Bold</option>
												<option value="PTSerifRegular">PTSerif</option>
												<option value="PTSerifBold">PTserif Bold</option>
												<option value="Tahoma, Geneva, Helvetica, sans serif">Tahoma</option>
												<option value="TinosRegular">Tinos</option>
												<option value="TinosBold">Tinos Bold</option>
												<option value="Trebuchet MS, Arial, Helvetica, sans serif">Trebuchet MS</option>
												<option value="UbuntuRegular,Arial,Verdana,Helvetica,  sans serif">Ubuntu</option>
												<option value="UbuntuBold,Arial,Verdana,Helvetica,  sans serif">Ubuntu Bold</option>
												<option value="Verdana, Geneva,Helvetica,  sans serif">Verdana</option>
												<option value="YanoneKaffeesatz, Arial,Helvetica,  sans serif">YanoneKaffeesatz</option>
												</select>
												
												<h6>Paragraph font</h6>
												<select name="bodyfont" id="bodyfont">
												<option value="Arial">Arial</option>
												<option value="CandelaBook">Candela</option>
												<option value="CandelaBold">Candela Bold</option>
												<option value="CopseRegular">Copse</option>
												<option value="Courier New, Courier, monospace">Courier New</option>
												<option value="CousineRegular,Courier New, Courier, monospace">Cousine</option>
												<option value="CousineBold,Courier New, Courier, monospace">Cousine Bold</option>
												<option value="Georgia, Times New Roman, Times, serif">Georgia</option>
												<option value="JosefinSlabLight">Josefin Slab Light</option>
												<option value="JosefinSlabRegular">Josefin Slab Regular</option>
												<option value="JosefinSlabBold">Josefin Slab Bold</option>
												<option value="LacunaRegular">Lacuna</option>
												<option value="LatoRegular">Lato Regular</option>
												<option value="LatoBold">Lato Bold</option>
												<option value="LeagueGothic, Arial,Verdana,Helvetica,  sans serif">League Gothic</option>
												<option value="Lobster13Regular">Lobster</option>
												<option value="Lucida Sans Unicode, Helvetica, Lucida Grande,  sans serif">Lucida Sans Unicode</option>
												<option value="MarketingScriptRegular">Marketing script</option>
												<option value="PTSansRegular,Arial,Verdana, Geneva,Helvetica,  sans serif">PTSans</option>
												<option value="PTSansBold,Arial,Verdana, Geneva,Helvetica,  sans serif">PTSans Bold</option>
												<option value="PTSerifRegular">PTSerif</option>
												<option value="PTSerifBold">PTserif Bold</option>
												<option value="Tahoma, Geneva, Helvetica, sans serif">Tahoma</option>
												<option value="TinosRegular">Tinos</option>
												<option value="TinosBold">Tinos Bold</option>
												<option value="Trebuchet MS, Arial, Helvetica, sans serif">Trebuchet MS</option>
												<option value="UbuntuRegular,Arial,Verdana,Helvetica,  sans serif">Ubuntu</option>
												<option value="UbuntuBold,Arial,Verdana,Helvetica,  sans serif">Ubuntu Bold</option>
												<option value="Verdana, Geneva,Helvetica,  sans serif">Verdana</option>
												<option value="YanoneKaffeesatz, Arial,Helvetica,  sans serif">YanoneKaffeesatz</option>
												</select>
												</div>
												<h6><span>Show/hide elements</span></h6>
												<?php if(is_home() || is_page('home-accordion') || is_page('home-nivo')):?>
												<div class="one-fifth">
															
															<p>
																		<label>
																					<input type="radio" name="slideshow" value="cycleRadio" id="slideshow_0"/>
																					Cycle slider</label>
																		<br />
																		<label>
																					<input type="radio" name="slideshow" value="accordionRadio" id="slideshow_1" />
																					Accordion slider</label>
																		<br />
																		
																		<label>
																					<input type="radio" name="slideshow" value="accordionRadio" id="slideshow_2" />
																					Nivo slider</label>
																		<br />
															</p>
												</div>
												
												<div class="one-fifth">
															
															<div style="width:80px; float:left; clear:none;">
															<p>
																		<input name="showtabpanel" type="checkbox" value="tabpanel" id="showtabpanel" checked="checked" />
																		Tabs</p>
															<p>
																		<input name="showarticles" type="checkbox" value="articles" id="showarticles" checked="checked" />
																		Articles</p>
															<p>
																		<input name="showfeatured" type="checkbox" value="featured" id="showfeatured" checked="checked" />
																		Featured</p>
															<p>
																		<input name="showblog" type="checkbox" value="blog" id="showblog"  />
																		Blog</p>
															</div>
															<div style="width:80px; float:left; clear:none;">
															<p>
															
																		<input name="showwidget1" type="checkbox" value="widgets" id="showwidget1"  checked="checked" />
																		Widget 1 </p>
															<p>
																		<input name="showwidget2" type="checkbox" value="widgets" id="showwidget2"/>
																		Widget 2 </p>
															<p>
																		<input name="showwidget3" type="checkbox" value="widgets" id="showwidget3"  />
																		Widget 3 </p>
															<p>
																		<input name="showwidget4" type="checkbox" value="widgets" id="showwidget4"  />
																		Widget 4 </p>
																		</div>
												</div>
												<?php endif;?>
												<div class="one-fifth">
															
															<p>
																		<input name="showsecondary" type="checkbox" value="secondary" id="showsecondary" />
																		Top menus </p>
																		
															<p>
																		<input name="reset" type="submit" value="Reset all changes" id="resetColor"/>
															</p>
												</div>
									</div>
						</form>
			</div>
			<div id="openPanel"></div>
</div>
<?php endif;?>
<!-- End demo -->
<div id="wrapper">
<div id="inner">
<div id="header">
			<div id="header_top">
						<?php if(has_nav_menu('tertiary')):?>
						<?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'menu_container' => 'div', 'container_id' => 'tertiary-menu', 'menu_class' => '',  'theme_location' => 'tertiary'));?>
						<?php endif;?>
						<?php if(has_nav_menu('secondary')):?>
						<?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'menu_container' => 'div', 'container_id' => 'secondary-menu','menu_class' => '',  'theme_location' => 'secondary'));?>
						<?php endif;?>
			</div>
			<div id="header_center">
						<div id="logo" style="padding-top:<?php echo get_option('phi_logo_margin_top');?>px; padding-bottom:<?php echo get_option('phi_logo_margin_bottom');?>px; padding-left:<?php echo get_option('phi_logo_margin_left');?>px;">
									<?php if (get_option('phi_logo_url')):?>
									<a href="<?php echo home_url(); ?>" title="<?php echo $home_page_name;?>" ><img src="<?php echo get_option('phi_logo_url');?>" alt="<?php echo $home_page_name;?>"/> </a>
									<?php else:?>
									<h1><a href="<?php echo home_url(); ?>"><?php echo get_bloginfo('name');?></a></h1>
									<?php endif;?>
						</div>
						<?php if (get_option('phi_disable_search_header')== false):?>
						<div id="searchform" style="margin-top:<?php echo get_option('phi_search_margin');?>px;">
									<form action="<?php echo site_url();?>" method="get" id="searchform_header">
												<p>
															<input type="text" value="" name="s" id="s"/>
															<input type="submit" value="<?php _e('Search','itworx');?>" />
												</p>
									</form>
						</div>
						<?php endif;?>
			</div>
			<div id="primary">
						<div id="homebutton"><a href="<?php echo home_url();?>" title="<?php echo get_option('phi_trans_home');?>" <?php if (is_home()){echo 'class="active"';}?>><span>Home</span></a></div>
						<?php if(has_nav_menu('primary')):?>
						<?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'menu_container' => 'div', 'container_id' => 'primary-menu','menu_class' => '',  'theme_location' => 'primary'));?>
						<?php endif;?>
			</div>
</div>
<!-- End header -->
<!-- PAGE CONTENT -->
<div id="content">