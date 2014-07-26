<?php
function admin_head_addition() 
{	
	$admin_stylesheet_url = get_template_directory_uri().'/lib/admin/css/style.css';
	$admin_stylesheet_url_form = get_template_directory_uri().'/lib/admin/css/jqtransform.css';
	$admin_stylesheet_url_colorpicker = get_template_directory_uri().'/lib/admin/css/colorpicker.css';
	$admin_stylesheet_url_thickbox = get_template_directory_uri().'/lib/admin/css/thickbox.css';
	$admin_stylesheet_url_ie = get_template_directory_uri().'/lib/admin/css/ie.css';
	
	$js1= get_template_directory_uri().'/lib/admin/js/jquery.selectlist.js';
	$js2= get_template_directory_uri().'/lib/admin/js/jquery.ui.js';
	$js3= get_template_directory_uri().'/lib/admin/js/script.js';
	$js4= get_template_directory_uri().'/lib/admin/js/jquery.js';
	$js5= get_template_directory_uri().'/lib/admin/js/jquery.qtip-1.0.0-rc3.js';
	$js6= get_template_directory_uri().'/lib/admin/js/colorpicker.js';
	$js8= get_template_directory_uri().'/lib/admin/js/thickbox.js';
	$js10= get_template_directory_uri().'/lib/admin/js/media-upload.js';
	
	if(is_admin()){
	echo '<link rel="stylesheet" href="'.$admin_stylesheet_url . '" type="text/css" />';
	echo '<link rel="stylesheet" href="'.$admin_stylesheet_url_colorpicker.'" type="text/css" media="screen" charset="utf-8" />';
	echo '<link rel="stylesheet" href="'.$admin_stylesheet_url_thickbox.'" type="text/css" charset="utf-8" />';
	echo '<script type="text/javascript" src="'.$js4.'"></script>'; // jquery.js
	echo '<script type="text/javascript" src="'.$js5.'"></script>'; // qtip.js
	echo '<script type="text/javascript" src="'.$js2.'"></script>'; // jquery.ui.js	
	echo '<script type="text/javascript" src="'.$js1.'"></script>'; // jquery.asmselect.js
	echo '<script type="text/javascript" src="'.$js6.'"></script>'; // colorpicker.js
	
	wp_enqueue_script('media-upload',get_template_directory_uri().'/lib/admin/js/media-upload.js'); 
	wp_enqueue_script('thickbox',get_template_directory_uri().'/lib/admin/js/thickbox.js'); 
	
	
	echo '<script type="text/javascript" src="'.$js3.'"></script>'; // colorpicker.js
	
	echo '<!--[if IE]>';
	echo '<link rel="stylesheet" href="'.$admin_stylesheet_url_ie . '" type="text/css" />';
	echo '<![endif]-->';
	}
	wp_head();
}




function phi_theme_option_menu()
	{
		add_menu_page('Theme Options', 'Theme Options', 'manage_options','options.php', 'phi_general');		
	}

 
require_once(TEMPLATEPATH . '/lib/admin/functions.php');
require_once(TEMPLATEPATH . '/lib/admin/options.php'); 
add_action('admin_menu', 'phi_theme_option_menu');

?>
<?php function phi_menu($page){?>

<div id="wrap">
<div id="menu-wrap">
			<h2><?php echo $optionpage_top_level; ?></h2>
			<ul id="tabnav">
						
						<li><a href="#tab1">Global settings</a></li>
						<li><a href="#tab2">Slideshow settings</a></li>
						<li><a href="#tab3">Home page settings</a></li>
						<li><a href="#tab4">Portfolio settings</a></li>
						<li><a href="#tab5">Blog pages</a></li>
						<li><a href="#tab6">News pages</a></li>
						<li><a href="#tab7">Testimonial pages</a></li>
						<li><a href="#tab8">FAQ pages</a></li>
						<li><a href="#tab9">Social media</a></li>
						<li><a href="#tab10">Skins/colors</a></li>
						<li><a href="#tab11">Fonts</a></li>
						<li><a href="#tab12">Image settings</a></li>
						<li><a href="#tab13">Translation panel</a></li>
			</ul>
</div>
<?php }


function phi_generate_form($options) {?>
<div id="content-wrap">
			<form method="post">
						
					
                        
						<div class="saver">
									<p class="submit">
													<input type="hidden" name="page" value="<?php echo $_REQUEST['page'];?>">
												<input name="save" type="submit" value="Save changes"/>
												<input type="hidden" name="action" value="save" />
                                               
									</p>
						</div>
						<div class="cycle" id="tab1">
							<?php 
							
							$count=1;
							
							foreach ($options as $value) { 
								if ($value['type'] == "text"){include(TEMPLATEPATH . '/lib/admin/includes/text.php');}
								elseif ($value['type'] == "upload") {include(TEMPLATEPATH . '/lib/admin/includes/upload.php');}	
								elseif ($value['type'] == "colorpicker") {include(TEMPLATEPATH . '/lib/admin/includes/colorpicker.php');}
								elseif ($value['type'] == "checkbox") {include(TEMPLATEPATH . '/lib/admin/includes/checkbox.php');} 
								elseif ($value['type'] == "textarea") {include(TEMPLATEPATH . '/lib/admin/includes/textarea.php');} 
								elseif ($value['type'] == "select"){include(TEMPLATEPATH . '/lib/admin/includes/select.php');}
								elseif ($value['type'] == "setupactivation") {include(TEMPLATEPATH . '/lib/admin/includes/setup.php');} 
								elseif ($value['type'] == "selectmultiple_pages"){include(TEMPLATEPATH . '/lib/admin/includes/selectmultiplepages.php');} 
								elseif ($value['type'] == "selectmultiple"){include(TEMPLATEPATH . '/lib/admin/includes/selectmultiple.php');} 
								elseif ($value['type'] == "heading"){include(TEMPLATEPATH . '/lib/admin/includes/header.php');}
								elseif ($value['type'] == "subheading") {include(TEMPLATEPATH . '/lib/admin/includes/subheader.php');}
								elseif ($value['type'] == "break") {$count ++; 	echo '</div><div class="cycle" id="tab'.$count.'">';}
							}					
							?>
						</div>
						<div class="saver-bottom"> <a href="#wrap" style="float:right; margin-top:40px;">top</a>
									<p class="submit">
													<input type="hidden" name="page" value="<?php echo $_REQUEST['page'];?>">
												<input name="save" type="submit" value="Save changes"/>
												<input type="hidden" name="action" value="save" />
                                               
									</p>
                                  
									
						</div>
			</form>
</div>


<?php }?>
