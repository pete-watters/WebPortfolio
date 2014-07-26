<div class="wrap">
<form method="post" action="options.php">
<?php settings_fields( 'general-settings-group' ); ?>
<div class="metabox-holder">
<div>
<div id="icon-themes" class="icon32"></div><h2 style="padding-bottom:15px">DynamiX General Settings</h2>


<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>DynamiX Skins</span></h3>
<div class="inside">

<table width="246" class="form-table">
<tr>
	<td colspan="2">
    Select your skin below, choose between an outer skin and inner skin. 
    </td>
</tr>
 
<tr valign="top">
<td width="300" class="tr-top"><label for="skinopt"><strong>Header / Footer Skin</strong></label>
	<select name="outskin">
		<option <?php if(get_option('outskin')=="one") {?> selected="selected" <?php } ?> value="one">Light Grey</option>
		<option <?php if(get_option('outskin')=="two") {?> selected="selected" <?php } ?> value="two">Dark Blue</option>
		<option <?php if(get_option('outskin')=="three") {?> selected="selected" <?php } ?> value="three">Blue</option>
		<option <?php if(get_option('outskin')=="four") {?> selected="selected" <?php } ?> value="four">Teal</option>
		<option <?php if(get_option('outskin')=="five") {?> selected="selected" <?php } ?> value="five">Green</option> 
		<option <?php if(get_option('outskin')=="six") {?> selected="selected" <?php } ?> value="six">Mustard</option>   
		<option <?php if(get_option('outskin')=="seven") {?> selected="selected" <?php } ?> value="seven">Orange</option>           
		<option <?php if(get_option('outskin')=="eight") {?> selected="selected" <?php } ?> value="eight">Red</option>   
		<option <?php if(get_option('outskin')=="nine") {?> selected="selected" <?php } ?> value="nine">Pink</option>  
		<option <?php if(get_option('outskin')=="ten") {?> selected="selected" <?php } ?> value="ten">Dark Grey</option>          
        <option <?php if(get_option('outskin')=="eleven") {?> selected="selected" <?php } ?> value="eleven">Urban</option>  
        <option <?php if(get_option('outskin')=="twelve") {?> selected="selected" <?php } ?> value="twelve">Carbon</option>  
		<option <?php if(get_option('outskin')=="thirteen") {?> selected="selected" <?php } ?> value="thirteen">Wood</option> 
		<option <?php if(get_option('outskin')=="fourteen") {?> selected="selected" <?php } ?> value="fourteen">Grunge</option>   
        <option <?php if(get_option('outskin')=="fithteen") {?> selected="selected" <?php } ?> value="fithteen">Bokeh</option>                           
        <option <?php if(get_option('outskin')=="sixteen") {?> selected="selected" <?php } ?> value="sixteen">Dark Teal</option>           
        <option <?php if(get_option('outskin')=="seventeen") {?> selected="selected" <?php } ?> value="seventeen">Dark Green</option>   
        <option <?php if(get_option('outskin')=="eighteen") {?> selected="selected" <?php } ?> value="eighteen">Dark Pink</option>   
        <option <?php if(get_option('outskin')=="nineteen") {?> selected="selected" <?php } ?> value="nineteen">Dark Red</option>   
        <option <?php if(get_option('outskin')=="twenty") {?> selected="selected" <?php } ?> value="twenty">Dark Brown</option>  
		<option <?php if(get_option('outskin')=="custom") {?> selected="selected" <?php } ?> value="custom">Custom</option>                        
	</select><p>&nbsp;</p>


<small class="description">Affects the header, drop panel and footer background / foreground colors.</small><br />
</td>
<td class="tr-top"><label for="skinopt"><strong>Body Skin</strong></label>
	<select name="inskin">
		<option <?php if(get_option('inskin')=="one") {?> selected="selected" <?php } ?> value="one">Light</option>
		<option <?php if(get_option('inskin')=="two") {?> selected="selected" <?php } ?> style="background:#202020;color:#fff;" value="two">Dark</option>
	</select><p>&nbsp;</p>


<small class="description">Affects the body background / foreground colors.</small><br />
</td>
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->


<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Wordpress Custom Menu (For Main Menu)</span></h3>
<div class="inside">
<table class="form-table">

<tr valign="top">
<td class="tr-top">
<small class="description">If you wish to use the Wordpress Custom Menu for the Main Menu navigation please enable it below.</small><br /><br />

	<label for="cufon_enable">Enable</label> 
    	<input type="radio" name="wpcustomm_enable" <?php if(get_option('wpcustomm_enable')=="enable" ) {?> checked="checked" <?php } ?>  value="enable" /> 

	<label for="cufon_enable">Disable</label> 
    	<input type="radio" name="wpcustomm_enable" <?php if(get_option('wpcustomm_enable')=="disable") {?> checked="checked" <?php } ?>  value="disable" />
  </td>
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->


<?php if (class_exists( 'BP_Core_User' ) ) { ?>
<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>BuddyPress Page Layout Config</span></h3>
<div class="inside">
<table class="form-table">
<tr valign="top">
<td class="tr-top">
<strong>Page Configuration</strong><br />
<small class="description">Select Page Configuration options.</small><br /><br />
<label><small class="description">Layout</small></label>
	<select name="buddylayout">
		<option <?php if(get_option('buddylayout')=="layout_four") {?> selected="selected" <?php } ?> value="layout_four">1x Column (Right)</option>    
		<option <?php if(get_option('buddylayout')=="layout_one") {?> selected="selected" <?php } ?> value="layout_one">Full Width</option>
		<option <?php if(get_option('buddylayout')=="layout_two") {?> selected="selected" <?php } ?> value="layout_two">1x Column (Left)</option>
		<option <?php if(get_option('buddylayout')=="layout_three") {?> selected="selected" <?php } ?> value="layout_three">2x Column (Left)</option>
		<option <?php if(get_option('buddylayout')=="layout_five") {?> selected="selected" <?php } ?> value="layout_five">2x Column (Right)</option> 
		<option <?php if(get_option('buddylayout')=="layout_six") {?> selected="selected" <?php } ?> value="layout_six">2x Column (Left,Right)</option>                            
	</select>

<span style="margin-right:20px;">&nbsp;</span>
<label><small class="description">Content Border</small></label><span style="margin-right:10px;">&nbsp;</span>
<label for="buddycontentborder">Enable</label> 
    	<input type="radio" name="buddycontentborder" <?php if(get_option('buddycontentborder')=="enable" || get_option('buddycontentborder')=="" ) {?> checked="checked" <?php } ?>  value="enable" /> 
<label for="archbreadcrumb">Disable</label> 
    	<input type="radio" name="buddycontentborder" <?php if(get_option('buddycontentborder')=="disable") {?> checked="checked" <?php } ?>  value="disable" />            
        
  </td>
</tr>
<tr valign="top">
<td class="tr-top">
<strong>Column Configuration</strong><br />
<small class="description">If sidebars are required, please select below for each column (Column Two option is ignored if not required).</small><br /><br />
<?php $num_sidebars=get_option('sidebars_num');?>
<label for="buddycolone">Select Sidebar for <em>Column <strong>One</strong></em></label> 
<select name="buddycolone">
		<?php
			$i=1;
			while($i<=$num_sidebars)
				{ ?>
					<option value="Sidebar<?php echo $i; ?>" <?php if(get_option('buddycolone')=="Sidebar".$i) {?> selected="selected" <?php } ?> >Sidebar<?php echo $i; ?></option>
				<?php $i++;
				} 
		?>
</select><span style="margin-right:20px;">&nbsp;</span>
<label for="buddycolone_border">Border</label> 
    	<input type="radio" name="buddycolone_border" <?php if(get_option('buddycolone_border')=="sidebarwrap" || get_option('buddycolone_border')=="" ) {?> checked="checked" <?php } ?>  value="sidebarwrap" /> 
<label for="buddycolone_border">Borderless</label> 
    	<input type="radio" name="buddycolone_border" <?php if(get_option('buddycolone_border')=="borderless") {?> checked="checked" <?php } ?>  value="borderless" />
<br />

<label for="buddycoltwo">Select Sidebar for <em>Column <strong>Two</strong></em></label> 
<select name="buddycoltwo">
		<?php
			$i=1;
			while($i<=$num_sidebars)
				{ ?>
					<option value="Sidebar<?php echo $i; ?>" <?php if(get_option('buddycoltwo')=="Sidebar".$i) {?> selected="selected" <?php } ?> >Sidebar<?php echo $i; ?></option>
				<?php $i++;
				} 
		?>
</select>
<span style="margin-right:20px;">&nbsp;</span>
<label for="buddycoltwo_border">Border</label> 
    	<input type="radio" name="buddycoltwo_border" <?php if(get_option('buddycoltwo_border')=="sidebarwrap" || get_option('buddycoltwo_border')=="" ) {?> checked="checked" <?php } ?>  value="sidebarwrap" /> 
<label for="buddycoltwo_border">Borderless</label> 
    	<input type="radio" name="buddycoltwo_border" <?php if(get_option('buddycoltwo_border')=="borderless") {?> checked="checked" <?php } ?>  value="borderless" />

  </td>
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->
<?php } ?>



<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Full Widget Footer / Drop Panel</span></h3>
<div class="inside">
<table class="form-table">

<tr valign="top">
<td class="tr-top">
<small class="description">Enable Widget based Footer / Drop Panel columns, once enabled goto Appearance -> Widgets.</small><br /><br />

	<label for="cufon_enable">Enable</label> 
    	<input type="radio" name="ftdrpwidget_enable" <?php if(get_option('ftdrpwidget_enable')=="enable" || get_option('BotFirstselect')=="" && get_option('TopFirstselect')=="" ) {?> checked="checked" <?php } ?>  value="enable" /> 

	<label for="cufon_enable">Disable</label> 
    	<input type="radio" name="ftdrpwidget_enable" <?php if(get_option('ftdrpwidget_enable')=="disable") {?> checked="checked" <?php } ?>  value="disable" />
  </td>
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->


<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Sidebars</span></h3>
<div class="inside">
<table class="form-table">

<tr valign="top">
<td class="tr-top"><label for="sidebars_num">Enter the amount of Sidebars required.</label> 
	<input type="text" name="sidebars_num"  size="4" value="<?php echo get_option('sidebars_num'); ?>" /><small class="description">Default is 2 Sidebars. See <a href="/wp-admin/widgets.php">Widgets</a>.</small></td>
</tr>

</table>


</div><!-- /inside -->
</div><!-- /postbox -->

<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Branding Image</span></h3>
<div class="inside">

<table class="form-table">
<tr valign="top">
	<td class="tr-top">
    	<strong>Upload Branding Image.</strong><br />
        <small class="description">Enter Image URL or leave empty to display <strong>Blog Title</strong> &amp; <strong>Tagline</strong> text, see <a href="options-general.php">Settings</a>. Dimensions of logo must be within (W) 225px * (H) 50px<br />
        <br /></small>
    	<label for="branding_url">URL of  Image</label>
        	<input type="text" name="branding_url" size="50" value="<?php echo get_option('branding_url'); ?>" /> 
  			<a href="media-upload.php?TB_iframe=true" target="_blank" class="thickbox button" title="Add File">Upload</a><small class="description">Copy  URL into box.</small>
	</td>
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->

<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Font Settings</span></h3>
<div class="inside">
<table class="form-table">

<tr valign="top">
<td class="tr-top"><label for="font_color">Content Font Color</label>
  : #<input type="text" id="font_color"  name="font_color"  size="15" value="<?php if(get_option('font_color')) {echo get_option('font_color');} ?>" /><span class="color_icon">&nbsp;</span><small class="description">Clear to use default color.</small></td>
</tr>
<tr valign="top">
<td class="tr-top"><label for="font_link">Content Link Color</label>
  : #<input type="text" name="font_link" id="font_link"  size="15" value="<?php if(get_option('font_link')) {echo get_option('font_link');} ?>" /><span class="color_icon">&nbsp;</span><small class="description">Clear to use default color.</small></td>
</tr>
<tr valign="top">
<td  class="tr-top"><label for="font_hover">Content Link Hover</label>
  : #<input type="text" id="font_hover" name="font_hover"  size="15" value="<?php if(get_option('font_hover')) {echo get_option('font_hover');} ?>" /><span class="color_icon">&nbsp;</span><small class="description">Clear to use default color</small></td>
</tr>

</table>

<table class="form-table">

<tr valign="top">
<td class="tr-top"><label for="font_link">Sidebar Link Color</label>
  : #<input type="text" id="side_link" name="side_link"  size="15" value="<?php if(get_option('side_link')) {echo get_option('side_link');} ?>" /><span class="color_icon">&nbsp;</span><small class="description">Clear to use default color.</small></td>
</tr>
<tr valign="top">
<td class="tr-top"><label for="font_hover">Sidebar Link Hover</label>
  : #<input type="text" id="side_hover" name="side_hover"  size="15" value="<?php if(get_option('side_hover')) {echo get_option('side_hover');} ?>" /><span class="color_icon">&nbsp;</span><small class="description">Clear to use default color.</small></td>
</tr>

</table>


</div><!-- /inside -->
</div><!-- /postbox -->


<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Cuf&oacute;n Font Options</span></h3>
<div class="inside">

<table class="form-table">

<tr valign="top">
<td class="tr-top">
	<label for="cufon_enable">Enable Cuf&oacute;n</label> 
    	<input type="radio" name="cufon_enable" <?php if(get_option('cufon_enable')=="enable" || get_option('cufon_enable')=="" ) {?> checked="checked" <?php } ?>  value="enable" /> 

	<label for="cufon_enable">Disable</label> 
    	<input type="radio" name="cufon_enable" <?php if(get_option('cufon_enable')=="disable") {?> checked="checked" <?php } ?>  value="disable" />
  </td>
</tr>
</table>

<table class="form-table">
<tr valign="top">
	<td class="tr-top">
    <strong>Where to use Cuf&oacute;n effect.</strong><br />

	<label for="cufontags">Branding &amp; <strong>&lt;h1&gt;</strong> to <strong>&lt;h6&gt;</strong> Tags </label> 
    	<input type="radio" class="hspace" name="cufon_tags" <?php if(get_option('cufon_tags')=="all") {?> checked="checked" <?php } ?>  value="all" /> 

	<label for="cufontags">Branding &amp; <strong>&lt;h1&gt;</strong> &amp; <strong>&lt;h2&gt;</strong> Tags </label> 
    	<input type="radio" class="hspace" name="cufon_tags" <?php if(get_option('cufon_tags')=="brandingh1h2") {?> checked="checked" <?php } ?>  value="brandingh1h2" /> 

	<label for="cufontags">Branding Only</label> 
    	<input type="radio" class="hspace" name="cufon_tags" <?php if(get_option('cufon_tags')=="branding") {?> checked="checked" <?php } ?>  value="branding" /> 

	</td>
</tr>
</table>

<table class="form-table">
<tr valign="top">
	<td  class="tr-top">
    	<strong>Upload new Cuf&oacute;n font.</strong><br />
        <small class="description">Default is Lucida Sans Unicode</small><br /><br />
    	<label for="cufon_font">Upload Cuf&oacute;n Font</label>
        	<input type="text" name="cufon_font" size="50" value="<?php echo get_option('cufon_font'); ?>" /> 
  			<a href="media-upload.php?TB_iframe=true" target="_blank" class="thickbox button" title="Add File">Upload</a><small class="description">Copy URL into box.</small><p>&nbsp;</p>
			Download <a href="http://www.cufonfonts.com/" target="_blank">Cuf&oacute;n Fonts</a>.
	</td>
</tr>
</table>

<table class="form-table">
<tr valign="top">
	<td class="tr-top">
    	<strong>Header / Footer Gradient Colors</strong><br />
        <small class="description">Enter gradient colors from <strong>Top</strong> to <strong>Bottom</strong>, affects branding and drop panel colors.</small><br />
<small class="description"><h2>h1 Tag</h2></small><br />

    	<label for="cufongradpri_1">1: </label>#<input type="text" id="cufongradpri_1" name="cufongradpri_1" size="15" value="<?php if(get_option('cufongradpri_1')) {echo get_option('cufongradpri_1');} ?>" /><span class="color_icon">&nbsp;</span>
        <label style="margin-left:20px" for="cufongradpri_2">2: </label>#<input type="text" id="cufongradpri_2" name="cufongradpri_2" size="15" value="<?php if(get_option('cufongradpri_2')) {echo get_option('cufongradpri_2');} ?>" /><span class="color_icon">&nbsp;</span>

<br />
<small class="description"><h2>h2 Tag</h2></small><br />

        <label for="cufongradpri_3">1: </label>#<input type="text" id="cufongradpri_3" name="cufongradpri_3" size="15" value="<?php echo get_option('cufongradpri_3'); ?>" /><span class="color_icon">&nbsp;</span>
        <label style="margin-left:20px" for="cufongradpri_4">2: </label>#<input type="text" id="cufongradpri_4" name="cufongradpri_4" size="15" value="<?php echo get_option('cufongradpri_4'); ?>" /><span class="color_icon">&nbsp;</span>

<br />
<small class="description"><h2>h3 - h6 Tags</h2></small><br />

        <label for="cufongradpri_5">1: </label>#<input type="text" id="cufongradpri_5" name="cufongradpri_5" size="15" value="<?php echo get_option('cufongradpri_5'); ?>" /><span class="color_icon">&nbsp;</span>
        <label style="margin-left:20px" for="cufongradpri_6">2: </label>#<input type="text" id="cufongradpri_6" name="cufongradpri_6" size="15" value="<?php echo get_option('cufongradpri_6'); ?>" /><span class="color_icon">&nbsp;</span>
        
    </td>
</tr>

<tr valign="top">
	<td class="tr-mid">
    	<strong>Content / Sidebar Gradient Colors</strong><br />
        <small class="description">Enter gradient colors from <strong>Top</strong> to <strong>Bottom</strong>, affects main content and sidebar colors.</small><br />
<small class="description"><h2>h1 Tag</h2></small><br />

    	<label for="cufongradsec_1">1: </label>#<input type="text" id="cufongradsec_1" name="cufongradsec_1" size="15" value="<?php if(get_option('cufongradsec_1')) {echo get_option('cufongradsec_1');} ?>" /><span class="color_icon">&nbsp;</span>
        <label style="margin-left:20px" for="cufongradsec_2">2: </label>#<input type="text" id="cufongradsec_2"  name="cufongradsec_2" size="15" value="<?php if(get_option('cufongradsec_2')) {echo get_option('cufongradsec_2');} ?>" /><span class="color_icon">&nbsp;</span>

<br />
<small class="description"><h2>h2 Tag</h2></small><br />

        <label for="cufongradsec_3">1: </label>#<input type="text" id="cufongradsec_3" name="cufongradsec_3" size="15" value="<?php echo get_option('cufongradsec_3'); ?>" /><span class="color_icon">&nbsp;</span>  
        <label style="margin-left:20px" for="cufongradsec_4">2: </label>#<input type="text" id="cufongradsec_4" name="cufongradsec_4" size="15" value="<?php echo get_option('cufongradsec_4'); ?>" /><span class="color_icon">&nbsp;</span>

<br />
<small class="description"><h2>h3 - h6 Tags</h2></small><br />

        <label for="cufongradsec_5">1: </label>#<input type="text" id="cufongradsec_5" name="cufongradsec_5" size="15" value="<?php echo get_option('cufongradsec_5'); ?>" /><span class="color_icon">&nbsp;</span>  
        <label style="margin-left:20px" for="cufongradsec_6">2: </label>#<input type="text" id="cufongradsec_6" name="cufongradsec_6" size="15" value="<?php echo get_option('cufongradsec_6'); ?>" /><span class="color_icon">&nbsp;</span>
    </td>
</tr>

</table>


</div><!-- /inside -->
</div><!-- /postbox -->


<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Timthumb Image Resizing Script</span></h3>
<div class="inside">

<table class="form-table">
<tr valign="top">
	<td class="tr-top">
	<strong>Disable or Enable the Timthumb image resizing script.</strong><br />
  	<label for="cufon_enable">Enable</label> 
      	<input type="radio" name="timthumb_disable" <?php if(get_option('timthumb_disable')=="" ) {?> checked="checked" <?php } ?>  value="" /> 
  
  	<label for="cufon_disable">Disable</label> 
      	<input type="radio" name="timthumb_disable" <?php if(get_option('timthumb_disable')=="disable") {?> checked="checked" <?php } ?>  value="disable" />	  			
	</td>
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->

<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>JW Player Configuration</span></h3>
<div class="inside">

<table class="form-table">
<tr valign="top">
	<td class="tr-top">
    	<strong>Upload JW Player Core Files</strong><br />
        For JW Player to work you <strong>MUST</strong> download the core files from <a href="http://www.longtailvideo.com/players/jw-flv-player/">Longtail Video</a>. 
        <br /><br />
		You can upload the following files <em>( jwplayer.js, player.swf )</em> into the media library and copy the URL's from there into the relevant boxes. <a href="media-upload.php?TB_iframe=true" target="_blank" class="thickbox button" title="Add File">Media Library</a><br /><br />
    	<label for="jwplayer_js" style="width:235px;display:inline-block;">JW Player <strong>Javascript</strong> URL <small class="description">( jwplayer.js )</small></label>
        	<input type="text" name="jwplayer_js" size="50" value="<?php echo get_option('jwplayer_js'); ?>" /><br />
    	<label for="jwplayer_swf" style="width:235px;display:inline-block;">JW Player <strong>Flash</strong> URL <small class="description">( player.swf )</small></label>
        	<input type="text" name="jwplayer_swf" size="50" value="<?php echo get_option('jwplayer_swf'); ?>" /><br /> 			 
		<label for="jwplayer_plugins" style="width:235px;display:inline-block;">JW Player <strong>Plugins</strong> <small class="description">( comma separated )</small></label>
        	<input type="text" name="jwplayer_plugins" size="50" value="<?php echo get_option('jwplayer_plugins'); ?>" /><br />
		<label for="jwplayer_skin" style="width:235px;display:inline-block;">JW Player <strong>Skin</strong> URL <small class="description">( .zip )</small></label>
        	<input type="text" name="jwplayer_skin" size="50" value="<?php echo get_option('jwplayer_skin'); ?>" /><br /> 		
		<label for="jwplayer_skinpos" style="width:235px;display:inline-block;">Controlbar Position</label>	
	<select name="jwplayer_skinpos">
		<option <?php if(get_option('jwplayer_skinpos')=="") {?> selected="selected" <?php } ?> value="">Over</option>
		<option <?php if(get_option('jwplayer_skinpos')=="top") {?> selected="selected" <?php } ?> value="top">Top</option>
		<option <?php if(get_option('jwplayer_skinpos')=="bottom") {?> selected="selected" <?php } ?> value="bottom">Bottom</option>                  
	</select><p>&nbsp;</p>
		    
	</td>
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->


<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Twitter</span></h3>
<div class="inside">
<table class="form-table">

<tr valign="top">
<td  class="tr-top"><label for="twitter_usrname">Enter your Twitter username</label> 
	<input type="text" name="twitter_usrname" value="<?php echo get_option('twitter_usrname'); ?>" /><small class="description">Latest Tweets will be pulled from this username.</small></td>
</tr>
<tr valign="top">
<td class="tr-top"><label for="twitter_feednum">Number of Tweets</label> 
	<input type="text" name="twitter_feednum" value="<?php echo get_option('twitter_feednum'); ?>" /><small class="description">Enter the amount of Tweets you would like to display.</small></td>
</tr>
<tr valign="top">
<td class="tr-top"><label for="twitter_label">Twitter Pod Label</label> 
	<input type="text" name="twitter_label" value="<?php echo get_option('twitter_label'); ?>" /><small class="description">Enter the label for the Twitter pod. (Blank is Latest Tweets)</small></td>
</tr>

</table>


</div><!-- /inside -->
</div><!-- /postbox -->

<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Media Library Image List (Gallery Slide Set)</span></h3>
<div class="inside">

<table class="form-table">
<tr valign="top">
	<td class="tr-top">
	<strong>Disable or Enable the Gallery Slide Set Media Library Image List.</strong><br />
  	<label for="cufon_enable">Enable</label> 
      	<input type="radio" name="medialib_disable" <?php if(get_option('medialib_disable')=="" ) {?> checked="checked" <?php } ?>  value="" /> 
  
  	<label for="cufon_disable">Disable</label> 
      	<input type="radio" name="medialib_disable" <?php if(get_option('medialib_disable')=="disable") {?> checked="checked" <?php } ?>  value="disable" />	  			
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
<input type="hidden" name="page_options" value="inskin,outskin,branding_url,font_color,font_link,font_hover,side_link,side_hover,sidebars_num,cufon_enable,cufontags,cufon_font,cufongradpri_1,cufongradpri_2,cufongradpri_3,cufongradpri_4,cufongradsec_1,cufongradsec_2,cufongradsec_3,cufongradsec_4,twitter_usrname,twitter_feednum,twitter_label" />


</form>
</div>