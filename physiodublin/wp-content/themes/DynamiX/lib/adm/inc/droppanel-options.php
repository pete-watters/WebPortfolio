<?php

require CWZ_FILES .'/adm/inc/widget-options.php';

if(get_option('ftdrpwidget_enable')!="enable") { // Check to see if Droppanel / Footer widgets are enabled

// Declare default Widgets

$firstdefaultwidget ="1"; // Define First Column Default Widget
$seconddefaultwidget ="3"; // Define Second Column Default Widget
$thirddefaultwidget ="6"; // Define Third Column Default Widget
$fourthdefaultwidget ="2"; // Define Fourth Column Default Widget

?>

<script type="text/javascript" charset="utf8" > // Load Sections
window.onload=function(){
	toggle_shrtcode('<?php if(get_option('TopFirstselect')) { echo get_option('TopFirstselect'); } else { echo "TopFirst-".$firstdefaultwidget; } ?>','TopFirstselect');
	toggle_shrtcode('<?php if(get_option('TopSecondselect')) { echo get_option('TopSecondselect'); } else { echo "TopSecond-".$seconddefaultwidget; } ?>','TopSecondselect');
	toggle_shrtcode('<?php if(get_option('TopThirdselect')) { echo get_option('TopThirdselect'); } else { echo "TopThird-".$thirddefaultwidget; } ?>','TopThirdselect');
	toggle_shrtcode('<?php if(get_option('TopFourthselect')) { echo get_option('TopFourthselect'); } else { echo "TopFourth-".$fourthdefaultwidget; } ?>','TopFourthselect');
};
</script>


<?php } ?>

<div class="wrap">
<form method="post" action="options.php">
<?php settings_fields( 'droppanel-settings-group' ); ?>
<div class="metabox-holder">
<div>
<div id="icon-themes" class="icon32"></div><h2 style="padding-bottom:15px">DynamiX Header Settings</h2>

<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Add Custom HTML / Shortcode</span></h3>
<div class="inside">
<table class="form-table">

<tr valign="top">
	<td class="tr-top">
	<small class="description">Enter Custom HTML to be placed within the header section.</small><br /><br />
	<textarea name="header_html" id="header_html" style="width:100%;height:100px" /><?php echo get_option('header_html'); ?></textarea>
  </td>
</tr>
</table>
</div><!-- /inside -->
</div><!-- /postbox -->

<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Add Favicon</span></h3>
<div class="inside">
<table class="form-table">

<tr valign="top">
	<td class="tr-top">
	<small class="description">Enter the URL of your Favicon.</small><br /><br />
	<input type="text" name="header_favicon" style="width:300px" id="header_favicon"  value="<?php echo get_option('header_favicon'); ?>" />
  </td>
</tr>
</table>
</div><!-- /inside -->
</div><!-- /postbox -->

<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div>
<h3 class='hndle'><span>Drop Panel Options</span></h3>
<div class="inside">

<table class="form-table">


<tr valign="top">
	<td class="tr-top" colspan="4">
	<label for="skinopt"><strong>Select Number of Columns</strong></label>
	<select name="droppanel_columns_num">
		<option <?php if(get_option('droppanel_columns_num')=="") {?> selected="selected" <?php } ?> value="">4 Columns</option>
		<option <?php if(get_option('droppanel_columns_num')=="3") {?> selected="selected" <?php } ?> value="3">3 Columns</option>
		<option <?php if(get_option('droppanel_columns_num')=="2") {?> selected="selected" <?php } ?> value="2">2 Columns</option> 
        <option <?php if(get_option('droppanel_columns_num')=="1") {?> selected="selected" <?php } ?> value="1">1 Column</option>                
	</select><p>&nbsp;</p>
	<small class="description"><strong>Dimensions</strong>: 4 Columns (width: 203px;), 3 Columns (width: 288px), 2 Columns (width: 452px), 1 Column (width: 940px)</small>
	</td>
</tr>


<tr valign="top">
	<td class="tr-top" colspan="4">
    <table width="700" border="0">
  <tr>
    <td><label for="droppanel">Enable</label> 
    	<input type="radio" class="hspace" name="droppanel" <?php if(get_option('droppanel')=="enable" || get_option('droppanel')=="") {?> checked="checked" <?php } ?>  value="enable" /><br />
	<small class="description">Default shows Drop Panel /Search.</small></td>
    <td><label for="droppanel">Search Only</label> 
    	<input type="radio" class="hspace" name="droppanel" <?php if(get_option('droppanel')=="disable") {?> checked="checked" <?php } ?>  value="disable" /><br />
	<small class="description">Shows search bar only.</small></td>
    <td><label for="droppanel">Disable Drop Panel/Search</label> 
    	<input type="radio" class="hspace" name="droppanel" <?php if(get_option('droppanel')=="none") {?> checked="checked" <?php } ?>  value="none" /><br />
	<small class="description">Completely removes Drop Panel / Search Area.</small>   </td>
  </tr>
</table>



 
	</td>
</tr>


<?php if(get_option('wpcustomm_enable')!="enable") {?>

<tr valign="top">
	<td class="tr-top title">
		<label for="droptriggername"><strong>Menu Trigger Name</strong> <small class="description">( This will appear in the menu and act as a trigger )</small></label> 
	</td>
	<td class="tr-top">
		<input type="text" name="droptriggername" size="10"  value="<?php echo get_option('droptriggername'); ?>" /><small class="description">E.g. "Contact Us"</small>
    </td>
    	<td class="tr-top title">
		<label for="droptriggerdesc"><strong>Menu Trigger Description</strong> <small class="description">( This will appear below the <strong>Trigger Name</strong> )</small></label> 
	</td>
	<td class="tr-top">
		<input type="text" name="droptriggerdesc" size="10"  value="<?php echo get_option('droptriggerdesc'); ?>" /><small class="description">E.g. "Send an email"</small>
    </td>
</tr>

<?php } ?>

</table>




</div><!-- /inside -->
</div><!-- /postbox -->


<?php if(get_option('ftdrpwidget_enable')=="disable") { // Check to see if Droppanel / Footer widgets are enabled

// Define Position

$position = "Top";

// ***** First Section

$section = "First"; // Define Section 

$Firstsection = optionsmenu($position,$section,$firstdefaultwidget); 
if($Firstsection) { 

	$parts = (explode("||",$Firstsection));
	
	echo $parts[0];
	the_editor(get_option($position.$section.'content'),$position.$section.'content');
	
	echo $parts[1];

	echo "<label for=\"". $position.$section ."recentcat\">All Categories</label> ";
	echo "<input type=\"radio\" value=\"\" ";
	if(get_option($position.$section.'recentcat')=="") {
	echo "checked=\"checked\"";
	}
	echo "name=\"". $position.$section."recentcat\" class=\"hspace\">";

	$categories = get_categories(); // Categories for Recent Posts
		foreach ($categories as $cat) {			
		$option = '<label for="'.$position.$section.'recentcat">'.$cat->category_nicename.'</label> '
		.'<input type="radio" class="hspace" name="'.$position.$section.'recentcat" ';
	
		if(get_option($position.$section.'recentcat')==$cat->term_id) {
		$option=$option.' checked="checked"'; 
		}
						   
		$option = $option.' value="'. $cat->term_id .'" />';
		echo $option;
							
		}		
	
					
	echo $parts[2];	

	$categories = get_categories(); // Categories for Categories Widget
		foreach ($categories as $cat) {			
		$option = '<label for="'.$position.$section.'cat">'.$cat->category_nicename.'</label> '
		.'<input type="checkbox" class="hspace" name="'.$position.$section.'cat[]" ';
							
		if (is_array(get_option($position.$section.'cat'))) {
							
		foreach (get_option($position.$section.'cat') as $cats) {					
		if($cats==$cat->term_id) {
		$option=$option.' checked="checked"'; 
		}
		}
		}	
						   
		$option = $option.' value="'. $cat->term_id .'" />';
		echo $option;
							
		}		
					
	echo $parts[3];	

}

// ***** Second Section


$section = "Second"; // Define Section 

$Secondsection = optionsmenu($position,$section,$seconddefaultwidget); 
if($Secondsection) { 

	$parts = (explode("||",$Secondsection));
	
	echo $parts[0];
	the_editor(get_option($position.$section.'content'),$position.$section.'content');
	
	echo $parts[1];

	echo "<label for=\"". $position.$section ."recentcat\">All Categories</label> ";
	echo "<input type=\"radio\" value=\"\" ";
	if(get_option($position.$section.'recentcat')=="") {
	echo "checked=\"checked\"";
	}
	echo "name=\"". $position.$section."recentcat\" class=\"hspace\">";		

	$categories = get_categories(); // Categories for Recent Posts
		foreach ($categories as $cat) {			
		$option = '<label for="'.$position.$section.'recentcat">'.$cat->category_nicename.'</label> '
		.'<input type="radio" class="hspace" name="'.$position.$section.'recentcat" ';
	
		if(get_option($position.$section.'recentcat')==$cat->term_id) {
		$option=$option.' checked="checked"'; 
		}
						   
		$option = $option.' value="'. $cat->term_id .'" />';
		echo $option;
							
		}		
					
	echo $parts[2];	

	$categories = get_categories(); 
		foreach ($categories as $cat) {			
		$option = '<label for="'.$position.$section.'cat">'.$cat->category_nicename.'</label> '
		.'<input type="checkbox" class="hspace" name="'.$position.$section.'cat[]" ';
							
		if (is_array(get_option($position.$section.'cat'))) {
							
		foreach (get_option($position.$section.'cat') as $cats) {					
		if($cats==$cat->term_id) {
		$option=$option.' checked="checked"'; 
		}
		}
		}	
						   
		$option = $option.' value="'. $cat->term_id .'" />';
		echo $option;
							
		}		
					
	echo $parts[3];	

}
				
// ***** Third Section


$section = "Third"; // Define Section 

$Thirdsection = optionsmenu($position,$section,$thirddefaultwidget); 
if($Thirdsection) { 

	$parts = (explode("||",$Thirdsection));
	
	echo $parts[0];
	the_editor(get_option($position.$section.'content'),$position.$section.'content');
	
	echo $parts[1];

	echo "<label for=\"". $position.$section ."recentcat\">All Categories</label> ";
	echo "<input type=\"radio\" value=\"\" ";
	if(get_option($position.$section.'recentcat')=="") {
	echo "checked=\"checked\"";
	}
	echo "name=\"". $position.$section."recentcat\" class=\"hspace\">";	

	$categories = get_categories(); // Categories for Recent Posts
		foreach ($categories as $cat) {			
		$option = '<label for="'.$position.$section.'recentcat">'.$cat->category_nicename.'</label> '
		.'<input type="radio" class="hspace" name="'.$position.$section.'recentcat" ';
	
		if(get_option($position.$section.'recentcat')==$cat->term_id) {
		$option=$option.' checked="checked"'; 
		}
						   
		$option = $option.' value="'. $cat->term_id .'" />';
		echo $option;
							
		}		
					
	echo $parts[2];	

	$categories = get_categories(); 
		foreach ($categories as $cat) {			
		$option = '<label for="'.$position.$section.'cat">'.$cat->category_nicename.'</label> '
		.'<input type="checkbox" class="hspace" name="'.$position.$section.'cat[]" ';
							
		if (is_array(get_option($position.$section.'cat'))) {
							
		foreach (get_option($position.$section.'cat') as $cats) {					
		if($cats==$cat->term_id) {
		$option=$option.' checked="checked"'; 
		}
		}
		}	
						   
		$option = $option.' value="'. $cat->term_id .'" />';
		echo $option;
							
		}		
					
	echo $parts[3];	

}


// ***** Fourth Section


$section = "Fourth"; // Define Section 

$Fourthsection = optionsmenu($position,$section,$fourthdefaultwidget); 
if($Fourthsection) { 

	$parts = (explode("||",$Fourthsection));
	
	echo $parts[0];
	the_editor(get_option($position.$section.'content'),$position.$section.'content');
	
	echo $parts[1];

	echo "<label for=\"". $position.$section ."recentcat\">All Categories</label> ";
	echo "<input type=\"radio\" value=\"\" ";
	if(get_option($position.$section.'recentcat')=="") {
	echo "checked=\"checked\"";
	}
	echo "name=\"". $position.$section."recentcat\" class=\"hspace\">";

	$categories = get_categories(); // Categories for Recent Posts
		foreach ($categories as $cat) {			
		$option = '<label for="'.$position.$section.'recentcat">'.$cat->category_nicename.'</label> '
		.'<input type="radio" class="hspace" name="'.$position.$section.'recentcat" ';
	
		if(get_option($position.$section.'recentcat')==$cat->term_id) {
		$option=$option.' checked="checked"'; 
		}
						   
		$option = $option.' value="'. $cat->term_id .'" />';
		echo $option;
							
		}		
					
	echo $parts[2];	

	$categories = get_categories(); 
		foreach ($categories as $cat) {			
		$option = '<label for="'.$position.$section.'cat">'.$cat->category_nicename.'</label> '
		.'<input type="checkbox" class="hspace" name="'.$position.$section.'cat[]" ';
							
		if (is_array(get_option($position.$section.'cat'))) {
							
		foreach (get_option($position.$section.'cat') as $cats) {					
		if($cats==$cat->term_id) {
		$option=$option.' checked="checked"'; 
		}
		}
		}	
						   
		$option = $option.' value="'. $cat->term_id .'" />';
		echo $option;
							
		}		
					
	echo $parts[3];	

}

} ?>



<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>


</div>
</div>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="droppanel, contact, contacttitle, contactdesc, contactemail, contactmsg" />


</form>
</div>