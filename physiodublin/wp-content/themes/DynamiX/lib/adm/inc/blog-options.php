<div class="wrap">
<form method="post" action="options.php">
<?php settings_fields( 'blog-settings-group' ); ?>
<div class="metabox-holder">
<div>
<div id="icon-themes" class="icon32"></div><h2 style="padding-bottom:15px">DynamiX Blog / Archive Settings</h2>


<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Archive / Index Posts Configuration</span></h3>
<div class="inside">
<table class="form-table">
<tr valign="top">
<td class="tr-top">
<strong>Post View Type</strong><br />
<label for="arhpostdisplay"><small class="description">Select Normal or Grid View</small></label>
	<select name="arhpostdisplay">
		<option <?php if(get_option('arhpostdisplay')=="") {?> selected="selected" <?php } ?> value="">Normal</option>    
		<option <?php if(get_option('arhpostdisplay')=="grid") {?> selected="selected" <?php } ?> value="grid">Grid</option>                      
	</select>
  </td>
</tr>
<tr valign="top">
<td class="tr-top" style="background:#fff;">
<strong>Post Content</strong><br />
<label for="arhpostcontent"><small class="description">Select Post Content Type</small></label>
	<select name="arhpostcontent">
		<option <?php if(get_option('arhpostcontent')=="") {?> selected="selected" <?php } ?> value="">Excerpt Only</option>    
		<option <?php if(get_option('arhpostcontent')=="excerpt_image") {?> selected="selected" <?php } ?> value="excerpt_image">Excerpt + First Image / Custom Image</option>  
		<option <?php if(get_option('arhpostcontent')=="image_only") {?> selected="selected" <?php } ?> value="image_only">First Image / Custom Image Only</option>    
		<option <?php if(get_option('arhpostcontent')=="full_post") {?> selected="selected" <?php } ?> value="full_post">Full Post</option>                              
	</select>
<p>&nbsp;</p>
<label><small class="description"><strong>Custom Image</strong> - URL of Image File (see posts)</small></label><br />
<label><small class="description"><strong>First Image</strong> - The first image inserted into the post.</small></label><br />
<label><small class="description"><strong>Full Post</strong> - NOT recommended for large posts</small></label><br /><br />

  </td>
</tr>

<tr valign="top">
<td class="tr-top">
<strong>Excerpt Limit</strong><br />
<label for="arhexcerpt"><small class="description">Enter excerpt word limit (default is 55)</small></label>
<input type="text" name="arhexcerpt" size="10" value="<?php echo get_option('arhexcerpt'); ?>" />
</td>
</tr>
<tr valign="top">
<td class="tr-top" style="background:#fff;">
<strong>Postmeta Data</strong><small class="description">Show Date / Comments Information</small><br />
<label for="arhpostcontent"><small class="description">Show Postmeta Data in</small></label>
	<select name="arhpostpostmeta">
		<option <?php if(get_option('arhpostpostmeta')=="") {?> selected="selected" <?php } ?> value="">Archive / Single Post</option>    
		<option <?php if(get_option('arhpostpostmeta')=="archive_only") {?> selected="selected" <?php } ?> value="archive_only">Archive Only</option>  
		<option <?php if(get_option('arhpostpostmeta')=="post_only") {?> selected="selected" <?php } ?> value="post_only">Single Post Only</option>    
		<option <?php if(get_option('arhpostpostmeta')=="disabled") {?> selected="selected" <?php } ?> value="disabled">Disabled</option>                              
	</select>
  </td>
</tr>

</table>


</div><!-- /inside -->
</div><!-- /postbox -->

<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Archive / Index Pages Image Configuration (First / Custom Images)</span></h3>
<div class="inside">
<table class="form-table">
<tr valign="top">
	<td class="tr-top">
<strong>Image Behaviour</strong><br />
<label for="arhimgdisplay"><small class="description">Select Normal or Lightbox</small></label>
	<select name="arhimgdisplay">
		<option <?php if(get_option('arhimgdisplay')=="") {?> selected="selected" <?php } ?> value="">Normal</option>    
		<option <?php if(get_option('arhimgdisplay')=="lightbox") {?> selected="selected" <?php } ?> value="lightbox">Lightbox</option>                      
	</select>
<p>&nbsp;</p>
<label><small class="description"><strong>Normal</strong> - Links through to post</small></label><br />
<label><small class="description"><strong>Lightbox</strong> - Opens the full image in a lightbox</small></label><br />    
  </td>
</tr>

<tr valign="top">
	<td class="tr-top">
<strong>Image Effect</strong><br />
<label for="arhimgeffect"><small class="description">Select Image Effect</small></label>
	<select name="arhimgeffect">
		<option <?php if(get_option('arhimgeffect')=="") {?> selected="selected" <?php } ?> value="">Shadow / Reflection</option>    
		<option <?php if(get_option('arhimgeffect')=="reflection") {?> selected="selected" <?php } ?> value="reflection">Reflection</option>                      
		<option <?php if(get_option('arhimgeffect')=="shadow") {?> selected="selected" <?php } ?> value="shadow">Shadow</option> 
		<option <?php if(get_option('arhimgeffect')=="none") {?> selected="selected" <?php } ?> value="none">None</option> 
	</select>
<p>&nbsp;</p>
  </td>
</tr>

<tr valign="top">
	<td class="tr-top" style="background:#fff;">
        <strong>Image Height</strong> <small class="description">(width is calculated from this height value if width if left blank)</small><br />
        <label for="arhimgheight"><small class="description">Height</small></label>
        <input type="text" name="arhimgheight" size="10" value="<?php echo get_option('arhimgheight'); ?>" /><small class="description">px &nbsp;&nbsp; (default is 300)</small>
  </td>
</tr>

<tr valign="top">
	<td class="tr-top">
        <strong>Image Width</strong> <small class="description">(optional)</small><br />
        <label for="arhimgheight"><small class="description">Width</small></label>
        <input type="text" name="arhimgwidth" size="10" value="<?php echo get_option('arhimgwidth'); ?>" /><small class="description">px</small>
  </td>
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->



<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Single Post Image Configuration (First / Custom Images)</span></h3>
<div class="inside">
<table class="form-table">
<tr valign="top">
	<td class="tr-top">
<strong>Image Behaviour</strong><br />
<label for="postimgdisplay"><small class="description">Select Normal or Lightbox</small></label>
	<select name="postimgdisplay">
		<option <?php if(get_option('postimgdisplay')=="") {?> selected="selected" <?php } ?> value="">Normal</option>    
		<option <?php if(get_option('postimgdisplay')=="lightbox") {?> selected="selected" <?php } ?> value="lightbox">Lightbox</option>                      
	</select>
<p>&nbsp;</p>
<label><small class="description"><strong>Normal</strong> - Displays normal image</small></label><br />
<label><small class="description"><strong>Lightbox</strong> - Opens the full image in a lightbox</small></label><br />    
  </td>
</tr>
<tr valign="top">
	<td class="tr-top">
<strong>Image Effect</strong><br />
<label for="arhimgeffect"><small class="description">Select Image Effect</small></label>
	<select name="postimgeffect">
		<option <?php if(get_option('postimgeffect')=="") {?> selected="selected" <?php } ?> value="">Shadow / Reflection</option>    
		<option <?php if(get_option('postimgeffect')=="reflection") {?> selected="selected" <?php } ?> value="reflection">Reflection</option>                      
		<option <?php if(get_option('postimgeffect')=="shadow") {?> selected="selected" <?php } ?> value="shadow">Shadow</option> 
		<option <?php if(get_option('postimgeffect')=="none") {?> selected="selected" <?php } ?> value="none">None</option> 
	</select>
<p>&nbsp;</p>
  </td>
</tr>
<tr valign="top">
<td class="tr-top" style="background:#fff;">
<strong>Image Height</strong><small class="description">(width is calculated from this height value)</small><br />
<label for="postimgheight"><small class="description">Height</small></label>
<input type="text" name="postimgheight" size="10" value="<?php echo get_option('postimgheight'); ?>" /><small class="description">px &nbsp;&nbsp; (default is 500)</small>
</td>
</tr>
<tr valign="top">
<td class="tr-top">
<strong>Image Width</strong><small class="description">(optional)</small><br />
<label for="postimgwidth"><small class="description">Width</small></label>
<input type="text" name="postimgwidth" size="10" value="<?php echo get_option('postimgwidth'); ?>" /><small class="description">px</small>
</td>
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->



<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Archive / Index Page Layout Config</span></h3>
<div class="inside">
<table class="form-table">
<tr valign="top">
<td class="tr-top">
<strong>Page Configuration</strong><br />
<small class="description">Select Page Configuration options.</small><br /><br />
<label><small class="description">Layout</small></label>
	<select name="arhlayout">
		<option <?php if(get_option('arhlayout')=="layout_four") {?> selected="selected" <?php } ?> value="layout_four">1x Column (Right)</option>    
		<option <?php if(get_option('arhlayout')=="layout_one") {?> selected="selected" <?php } ?> value="layout_one">Full Width</option>
		<option <?php if(get_option('arhlayout')=="layout_two") {?> selected="selected" <?php } ?> value="layout_two">1x Column (Left)</option>
		<option <?php if(get_option('arhlayout')=="layout_three") {?> selected="selected" <?php } ?> value="layout_three">2x Column (Left)</option>
		<option <?php if(get_option('arhlayout')=="layout_five") {?> selected="selected" <?php } ?> value="layout_five">2x Column (Right)</option> 
		<option <?php if(get_option('arhlayout')=="layout_six") {?> selected="selected" <?php } ?> value="layout_six">2x Column (Left,Right)</option>                            
	</select>

<span style="margin-right:20px;">&nbsp;</span>
<label><small class="description">Breadcrumbs</small></label><span style="margin-right:10px;">&nbsp;</span>
<label for="archbreadcrumb">Enable</label> 
    	<input type="radio" name="archbreadcrumb" <?php if(get_option('archbreadcrumb')=="enable" || get_option('archbreadcrumb')=="" ) {?> checked="checked" <?php } ?>  value="enable" /> 
<label for="archbreadcrumb">Disable</label> 
    	<input type="radio" name="archbreadcrumb" <?php if(get_option('archbreadcrumb')=="disable") {?> checked="checked" <?php } ?>  value="disable" />    


<span style="margin-right:20px;">&nbsp;</span>
<label><small class="description">Content Border</small></label><span style="margin-right:10px;">&nbsp;</span>
<label for="archcontentborder">Enable</label> 
    	<input type="radio" name="archcontentborder" <?php if(get_option('archcontentborder')=="enable" || get_option('archcontentborder')=="" ) {?> checked="checked" <?php } ?>  value="enable" /> 
<label for="archbreadcrumb">Disable</label> 
    	<input type="radio" name="archcontentborder" <?php if(get_option('archcontentborder')=="disable") {?> checked="checked" <?php } ?>  value="disable" />            
        
  </td>
</tr>
<tr valign="top">
<td class="tr-top">
<strong>Column Configuration</strong><br />
<small class="description">If sidebars are required, please select below for each column (Column Two option is ignored if not required).</small><br /><br />
<?php 
$num_sidebars=get_option('sidebars_num');

if($num_sidebars=="") {
	$num_sidebars="2"; // set default sidebars if no option is set
}

?>
<label for="archcolone">Select Sidebar for <em>Column <strong>One</strong></em></label> 
<select name="archcolone">
		<?php
			$i=1;
			while($i<=$num_sidebars)
				{ ?>
					<option value="Sidebar<?php echo $i; ?>" <?php if(get_option('archcolone')=="Sidebar".$i) {?> selected="selected" <?php } ?> >Sidebar<?php echo $i; ?></option>
				<?php $i++;
				} 
		?>
</select><span style="margin-right:20px;">&nbsp;</span>
<label for="archcolone_border">Border</label> 
    	<input type="radio" name="archcolone_border" <?php if(get_option('archcolone_border')=="sidebarwrap" || get_option('archcolone_border')=="" ) {?> checked="checked" <?php } ?>  value="sidebarwrap" /> 
<label for="archcolone_border">Borderless</label> 
    	<input type="radio" name="archcolone_border" <?php if(get_option('archcolone_border')=="borderless") {?> checked="checked" <?php } ?>  value="borderless" />
<br />

<label for="archcoltwo">Select Sidebar for <em>Column <strong>Two</strong></em></label> 
<select name="archcoltwo">
		<?php
			$i=1;
			while($i<=$num_sidebars)
				{ ?>
					<option value="Sidebar<?php echo $i; ?>" <?php if(get_option('archcoltwo')=="Sidebar".$i) {?> selected="selected" <?php } ?> >Sidebar<?php echo $i; ?></option>
				<?php $i++;
				} 
		?>
</select>
<span style="margin-right:20px;">&nbsp;</span>
<label for="archcoltwo_border">Border</label> 
    	<input type="radio" name="archcoltwo_border" <?php if(get_option('archcoltwo_border')=="sidebarwrap" || get_option('archcoltwo_border')=="" ) {?> checked="checked" <?php } ?>  value="sidebarwrap" /> 
<label for="archcoltwo_border">Borderless</label> 
    	<input type="radio" name="archcoltwo_border" <?php if(get_option('archcoltwo_border')=="borderless") {?> checked="checked" <?php } ?>  value="borderless" />

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