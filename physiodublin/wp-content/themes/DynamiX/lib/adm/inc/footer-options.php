<?php	
require CWZ_FILES .'/adm/inc/widget-options.php';

if(get_option('ftdrpwidget_enable')!="enable") { // Check to see if Droppanel / Footer widgets are enabled

// Declare default Widgets

$firstdefaultwidget ="3"; // Define First Column Default Widget
$seconddefaultwidget ="4"; // Define Second Column Default Widget
$thirddefaultwidget ="5"; // Define Third Column Default Widget
$fourthdefaultwidget ="1"; // Define Fourth Column Default Widget

?>

<script type="text/javascript" charset="utf8" > // Load Sections
window.onload=function(){
	toggle_shrtcode('<?php if(get_option('BotFirstselect')) { echo get_option('BotFirstselect'); } else { echo "BotFirst-".$firstdefaultwidget; } ?>','BotFirstselect');
	toggle_shrtcode('<?php if(get_option('BotSecondselect')) { echo get_option('BotSecondselect'); } else { echo "BotSecond-".$seconddefaultwidget; } ?>','BotSecondselect');
	toggle_shrtcode('<?php if(get_option('BotThirdselect')) { echo get_option('BotThirdselect'); } else { echo "BotThird-".$thirddefaultwidget; } ?>','BotThirdselect');
	toggle_shrtcode('<?php if(get_option('BotFourthselect')) { echo get_option('BotFourthselect'); } else { echo "BotFourth-".$fourthdefaultwidget; } ?>','BotFourthselect');
};
</script>

<?php } ?>

<div class="wrap">
<form method="post" action="options.php">
<?php settings_fields( 'footer-settings-group' ); ?>
<div class="metabox-holder">
<div>
<div id="icon-themes" class="icon32"></div><h2 style="padding-bottom:15px">DynamiX Footer Settings</h2>



<?php if(get_option('ftdrpwidget_enable')!="enable") { // Check to see if Droppanel / Footer widgets are enabled

// Define Position

$position = "Bot";

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

} else { ?>

<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div>
<h3 class='hndle'><span>Footer Column Options</span></h3>
<div class="inside">

<table class="form-table">

<tr valign="top">
	<td class="tr-top" colspan="4">
	<label for="footer_columns_num"><strong>Select Number of Columns</strong></label>
	<select name="footer_columns_num">
		<option <?php if(get_option('footer_columns_num')=="") {?> selected="selected" <?php } ?> value="">4 Columns</option>
		<option <?php if(get_option('footer_columns_num')=="3") {?> selected="selected" <?php } ?> value="3">3 Columns</option>
		<option <?php if(get_option('footer_columns_num')=="2") {?> selected="selected" <?php } ?> value="2">2 Columns</option> 
        <option <?php if(get_option('footer_columns_num')=="1") {?> selected="selected" <?php } ?> value="1">1 Column</option>                
	</select><p>&nbsp;</p>
	<small class="description"><strong>Dimensions</strong>: 4 Columns (width: 203px;), 3 Columns (width: 288px), 2 Columns (width: 452px), 1 Column (width: 940px)</small>
	</td>
</tr>
</table>



</div><!-- /inside -->
</div><!-- /postbox -->


<?php } ?>


<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div>
<h3 class='hndle'><span>Lower Footer Options</span></h3>
<div class="inside">

<table class="form-table">

<tr valign="top">
	<td class="tr-top" colspan="4">
	<label for="lowerfooter">Enable</label> 
    	<input type="radio" class="hspace" name="lowerfooter" <?php if(get_option('lowerfooter')=="enable" || get_option('lowerfooter')=="") {?> checked="checked" <?php } ?>  value="enable" />
    	<label for="lowerfooter">Disable</label> 
    	<input type="radio" class="hspace" name="lowerfooter" <?php if(get_option('lowerfooter')=="disable") {?> checked="checked" <?php } ?>  value="disable" /><br />
	<small class="description">Disabling will remove the lower footer section completely.</small>
	</td>
</tr>

<tr valign="top">
	<td colspan="2" class="tr-top-lite title">
	Enter TEXT or HTML into the boxes below - either of these areas can contain <strong>Google Analytics Code</strong>. 
	</td>
</tr>
<tr valign="top">    
	<td class="tr-top-lite title">
	<label for="lowfooterleft"><strong>Lower footer text (Left)</strong></label> 
	</td>
	<td class="tr-top-lite">
		<textarea name="lowfooterleft" cols="70" rows="2" ><?php if(get_option('lowfooterleft')) { echo get_option('lowfooterleft'); } else { echo "&copy; ". date("Y") ." ".get_option("blogname"); } ?></textarea>
        
	</td>
</tr>

<tr valign="top">
	<td class="tr-top title">
	<label for="lowfooterleft"><strong>Lower footer text (Right)</strong></label> 
	</td>
	<td class="tr-top">
		<textarea name="lowfooterright" cols="70" rows="2" /><?php if(get_option('lowfooterright')) { echo get_option('lowfooterright'); } ?></textarea>
        
    </td>
</tr>

</table>



</div><!-- /inside -->
</div><!-- /postbox -->

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>


</div>
</div>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="droppanel, contact, contacttitle, contactdesc, contactemail, contactmsg" />


</form>
</div>


