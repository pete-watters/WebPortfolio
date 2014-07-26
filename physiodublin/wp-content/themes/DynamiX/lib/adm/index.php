<?php
function handleAdminMenu() {
    // You have to add one to the "post" writing/editing page, and one to the "page" writing/editing page
    add_meta_box('shortcodegen', 'Shortcode Generator', 'insertForm', 'post', 'normal', 'high');
    add_meta_box('shortcodegen', 'Shortcode Generator', 'insertForm', 'page', 'normal', 'high');
}

add_action('admin_menu', 'handleAdminMenu');

function insertForm() { ?>
<script type="text/javascript" charset="utf8" > // Load Sections
jQuery(document).ready(function() {
	toggle_shrtcode('none','dynshortcode_selector');
	toggle_shrtcode('twocolumns','dynshortcode_columns');
	toggle_shrtcode('postgallery_image','dynshortcode_postgallery');	
	toggle_shrtcode('linkbutton','dynshortcode_button_type');		
	
	
});
</script>
        <table class="form-table">
             <tr valign="top">
                <td width="80px" ><label for="dynshortcode_bar"><strong><?php _e('Shortcode:')?></strong></label></td>
                <td >
                    <select name="dynshortcode[selector]" id="dynshortcode_selector" onchange="toggle_shrtcode(this.options[this.options.selectedIndex].value,'dynshortcode_selector')">
						<option value="none">Select Shortcode</option>
						<option value="postgallery">Post / Slide Set Gallery</option>
                        <option value="columnlayout">Columns</option>
						<option value="styledboxes">Styled Boxes</option>
                        <option value="button">Button</option>
                        <option value="hozbreak">Horizontal Break</option>
                        <option value="blockquote">Block Quote</option>
                        <option value="highlight">Highlight</option>
                        <option value="imgeffect">Image Shortcode</option>
                        <option value="videoshortcode">Video Shortcode</option>
					    <option value="tabs">Tabs</option>
                        <option value="accordion">Accordion</option> 
                        <option value="list">List</option>  
                        <option value="reveal">Reveal Content</option>
                        <option value="dropcaps">Drop Caps</option>                        
					</select>
                </td>
            </tr>
		</table>
        <div id="none"></div>

       <div id="postgallery">
        <small class="description">Select gallery type and categories to use.</small>   
        <table class="form-table">
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_postgallery"><?php _e('Select Type:')?></label></td>
                <td>
					<select name="dynshortcode[postgallery]" id="dynshortcode_postgallery" onchange="toggle_shrtcode(this.options[this.options.selectedIndex].value,'dynshortcode_postgallery')">
						<option value="postgallery_image">Image Gallery</option>
                        <option value="postgallery_slider">Slider Gallery</option>
                        <option value="postgallery_grid">Grid Gallery</option>           
						<option value="postgallery_accordion">Accordion Gallery</option>                
					</select>
                </td>
            </tr>
            </table>
         <div id="postgallery_image">
		<table class="form-table">       
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_pg_image_imgw"><?php _e('Gallery Width:')?></label></td>
                <td >
                    <input type="text" style="width:50px;" name="dynshortcode[pg_image_imgw]" id="dynshortcode_pg_image_imgw" /> px
                </td>
            </tr>
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_pg_image_imgh"><?php _e('Gallery Height:')?></label></td>
                <td >
                    <input type="text" style="width:50px;" name="dynshortcode[pg_image_imgh]" id="dynshortcode_pg_image_imgh" /> px
                </td>
            </tr>
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_pg_image_animation"><?php _e('Animation Transition:')?></label></td>
                <td >
    			<select id="dynshortcode_pg_image_animation" name="dynshortcode[pg_image_animation]" class="widefat" style="width:auto">
            	<?php 
    			$animation_types = array("fade","blindY","blindZ","blindX","cover","curtainX","curtainY","fadeZoom","growX","growY","none","scrollUp","scrollDown","scrollLeft","scrollRight","scrollHorz","scrollVert","shuffle","slideX","slideY","toss","turnUp","turnDown","turnLeft","turnRight","uncover","wipe","zoom");
    		 
                      foreach ($animation_types as $animation_type) {
    					$option = '<option value="'.$animation_type.'">';
    					$option .= $animation_type;
                        $option .= '</option>';
                        echo $option;
                } ?>	
    
            	</select>  
                </td>
            </tr>
			
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_pg_image_tween"><?php _e('Animation Transition:')?></label></td>
                <td >
    			<select id="dynshortcode_pg_image_tween" name="dynshortcode[pg_image_tween]" class="widefat" style="width:auto">
            	<?php 
				$tween_types = array("linear","easeInSine","easeOutSine", "easeInOutSine", "easeInCubic", "easeOutCubic", "easeInOutCubic", "easeInQuint", "easeOutQuint", "easeInOutQuint", "easeInCirc", "easeOutCirc", "easeInOutCirc", "easeInBack", "easeOutBack", "easeInOutBack", "easeInQuad", "easeOutQuad", "easeInOutQuad", "easeInQuart", "easeOutQuart", "easeInOutQuart", "easeInExpo", "easeOutExpo", "easeInOutExpo", "easeInElastic", "easeOutElastic", "easeInOutElastic", "easeInBounce", "easeOutBounce", "easeInOutBounce");
		 
                  foreach ($tween_types as $tween_type) {
					$option = '<option value="'.$tween_type.'">';
                    $option .= $tween_type;
                    $option .= '</option>';
                    echo $option;
                } ?>
            	</select>  
                </td>
            </tr>
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_pg_image_align"><?php _e('Gallery Align:')?></label></td>
                <td >
                 	<select name="dynshortcode[pg_image_align]" id="dynshortcode_pg_image_align">
						<option value="">None</option>
						<option value="alignleft">Left</option>
						<option value="alignright">Right</option>
						<option value="aligncenter">Center</option>                        
					</select>                        
                </td>
            </tr> 
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_pg_imagenav"><?php _e('Gallery Navigation:')?></label></td>
                <td >
                 	<select name="dynshortcode[pg_imagenav]" id="dynshortcode_pg_imagenav">
						<option value="">Bullet Nav</option>
						<option value="enabled">Bullet Nav + Play/Pause Nav</option>      
						<option value="disabled">Disable All Nav</option>                
					</select>                        
                </td>
            </tr>                 
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_pg_imagetimeout"><?php _e('Slides Timeout:')?></label></td>
                <td >
                    <input type="text" style="width:50px;" name="dynshortcode[pg_imagetimeout]" id="dynshortcode_pg_imagetimeout" /> seconds <small class="description">Default is 10 seconds, if your post has a variable timeout it will overide this time.</small>
                </td>
            </tr>                     
        </table>         
         </div>
 
        <div id="postgallery_slider">
		<table class="form-table">       
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_pg_slider_content"><?php _e('Gallery Content')?></label></td>
                <td >
                 	<select name="dynshortcode[pg_slider_content]" id="dynshortcode_pg_slider_content">
						<option value="textimage">Text/Image</option>
						<option value="titleimage">Title/Image</option>
						<option value="titleoverlay">Title Overlay Image</option>
						<option value="titletextoverlay">Title &amp; Text Overlay Image</option>
						<option value="image">Image Only</option>
						<option value="text">Text Only</option>
					</select>                        
                </td>
            </tr>  
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_pg_sliderlightbox"><?php _e('Enable Lightbox:')?></label></td>
                <td >
                	<input name="dynshortcode[pg_sliderlightbox]" id="dynshortcode_pg_sliderlightbox" type="checkbox" value="yes" />
                    <small class="description">Alternatively image links to post/url.</small>
                </td>
            </tr>
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_pg_slider_height"><?php _e('Gallery Height:')?></label></td>
                <td >
                    <input type="text" style="width:50px;" name="dynshortcode[pg_slider_height]" id="dynshortcode_pg_slider_height" /> px <small class="description">Optional - this controls the overall height of the gallery.</small>
                </td>
            </tr>
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_pg_slider_imgwidth"><?php _e('Image Width')?></label></td>
                <td >
                    <input type="text" style="width:50px;" name="dynshortcode[pg_slider_imgwidth]" id="dynshortcode_pg_slider_imgwidth" /> px
                </td>
            </tr>            
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_pg_slider_imgheight"><?php _e('Image Height')?></label></td>
                <td >
                    <input type="text" style="width:50px;" name="dynshortcode[pg_slider_imgheight]" id="dynshortcode_pg_slider_imgheight" /> px
                </td>
            </tr>
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_pg_slidertimeout"><?php _e('Slide Timeout:')?></label></td>
                <td >
                    <input type="text" style="width:50px;" name="dynshortcode[pg_slidertimeout]" id="dynshortcode_pg_slidertimeout" /> seconds
                </td>
            </tr>   			
		</table> 
         </div>

        <div id="postgallery_grid">
		<table class="form-table">       
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_pg_grid_content"><?php _e('Gallery Content')?></label></td>
                <td >
                 	<select name="dynshortcode[pg_grid_content]" id="dynshortcode_pg_grid_content">
						<option value="textimage">Text/Image</option>
						<option value="titleimage">Title/Image</option>
						<option value="titleoverlay">Title Overlay Image</option>
						<option value="titletextoverlay">Title &amp; Text Overlay Image</option>						
						<option value="image">Image Only</option>
						<option value="text">Text Only</option>
					</select>                        
                </td>
            </tr>  
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_pg_gridfilter"><?php _e('Animated Filtering')?></label></td>
                <td >
					<input name="dynshortcode[pg_gridfilter]" id="dynshortcode_pg_gridfilter" type="checkbox" value="yes" />  
					<small class="description">Enable <strong>Animated</strong> Category Filtering.</small>               
                </td>
            </tr>  			
			
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_pg_grid_columns"><?php _e('Columns')?></label></td>
                <td >
                 	<select name="dynshortcode[pg_grid_columns]" id="dynshortcode_pg_grid_columns">
						<option value="">3 Columns</option>
						<option value="4">4 Columns</option>
						<option value="5">5 Columns</option>
						<option value="6">6 Columns</option>
                        <option value="7">7 Columns</option>
					</select>                        
                </td>
            </tr>  		
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_pg_gridlightbox"><?php _e('Enable Lightbox:')?></label></td>
                <td >
                	<input name="dynshortcode[pg_gridlightbox]" id="dynshortcode_pg_gridlightbox" type="checkbox" value="yes" />
                    <small class="description">Alternatively image links to post/url.</small>
                </td>
            </tr>
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_pg_grid_height"><?php _e('Row Height:')?></label></td>
                <td >
                    <input type="text" style="width:50px;" name="dynshortcode[pg_grid_height]" id="dynshortcode_pg_grid_height" /> px
                </td>
            </tr>
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_pg_grid_imgwidth"><?php _e('Image Width')?></label></td>
                <td >
                    <input type="text" style="width:50px;" name="dynshortcode[pg_grid_imgwidth]" id="dynshortcode_pg_grid_imgwidth" /> px
                </td>
            </tr>
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_pg_grid_imgheight"><?php _e('Image Height')?></label></td>
                <td >
                    <input type="text" style="width:50px;" name="dynshortcode[pg_grid_imgheight]" id="dynshortcode_pg_grid_imgheight" /> px
                </td>
            </tr>
		</table> 
         </div>       
        <div id="postgallery_accordion">
		<table class="form-table">       
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_pg_accordion_content"><?php _e('Gallery Content')?></label></td>
                <td >
                 	<select name="dynshortcode[pg_accordion_content]" id="dynshortcode_pg_accordion_content">
						<option value="textimage">Text/Image</option>
						<option value="titleimage">Title/Image</option>
						<option value="image">Image Only</option>
						<option value="text">Text Only</option>
					</select>                        
                </td>
            </tr>
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_pg_accordion_minititle"><?php _e('Show Startup Mini Titles')?></label></td>
                <td >
                 	<select name="dynshortcode[pg_accordion_minititle]" id="dynshortcode_pg_accordion_minititle">
						<option value="enable">Enable</option>
						<option value="disable">Disable</option>
					</select>                        
                </td>
            </tr>  			  
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_pg_accordion_autorotate"><?php _e('Auto Play')?></label></td>
                <td >
                 	<select name="dynshortcode[pg_accordion_autorotate]" id="dynshortcode_pg_accordion_autorotate">
						<option value="enable">Enable</option>
						<option value="disable">Disable</option>
					</select>                        
                </td>
            </tr>
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_pg_accordiontimeout"><?php _e('Auto Play Timeout:')?></label></td>
                <td >
                    <input type="text" style="width:50px;" name="dynshortcode[pg_accordiontimeout]" id="dynshortcode_pg_accordiontimeout" /> seconds <small class="description">Default is 10 seconds, Auto Play has to be enabled.</small>
                </td>
            </tr>   			  	
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_pg_accordionlightbox"><?php _e('Enable Lightbox:')?></label></td>
                <td >
                	<input name="dynshortcode[pg_accordionlightbox]" id="dynshortcode_pg_accordionlightbox" type="checkbox" value="yes" />
                    <small class="description">Alternatively image links to post/url.</small>
                </td>
            </tr>
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_pg_accordion_width"><?php _e('Gallery Width:')?></label></td>
                <td >
                    <input type="text" style="width:50px;" name="dynshortcode[pg_accordion_width]" id="dynshortcode_pg_accordion_width" /> px
                </td>
            </tr>
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_pg_accordion_imgheight"><?php _e('Image Height')?></label></td>
                <td >
                    <input type="text" style="width:50px;" name="dynshortcode[pg_accordion_imgheight]" id="dynshortcode_pg_accordion_imgheight" /> px
                </td>
            </tr>
		</table> 
         </div> 		   
         <table class="form-table">   
<tr valign="top">
                <td width="80px" ><label for="dynshortcode_postgallery_imageeffect"><?php _e('Image Effect')?></label></td>
                <td >
                 	<select name="dynshortcode[postgallery_imageeffect]" id="dynshortcode_postgallery_imageeffect">
						<option value="">No effect</option>
						<option value="shadow">Shadow</option>
						<option value="reflection">Reflect</option>  
						<option value="shadowreflection">Shadow / Reflect</option>                                                
					</select>                        
                </td>
            </tr>
             <tr valign="top">
                <td width="80px" ><label for="dynshortcode_postgallery_shadowsize"><?php _e('Shadow Size')?></label></td>
                <td >
                 	<select name="dynshortcode[postgallery_shadowsize]" id="dynshortcode_postgallery_shadowsize">
                        <option value="shadow-xsmall">XSmall (100px)</option>
                        <option value="shadow-small">Small (230px)</option>
						<option value="shadow-medium">Medium (320px)</option>
						<option value="shadow-large">Large (920px)</option>                                             
					</select>                        
                </td>
            </tr>         
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_gallery_id"><?php _e('Gallery ID:')?></label></td>
                <td >
                    <input type="text" style="width:18%;" name="dynshortcode[gallery_id]" id="dynshortcode_gallery_id" /><small class="description">Required if multiple post galleries on page. e.g. 2</small>
                </td>
            </tr>                 
            <tr valign="top">
                <td colspan="2" style="padding:0;">
                
                <table width="100%" class="form-table">
                  <tr>
                    <td><label for="dynshortcode_postcat"><strong><?php _e('Select Post Categories:')?></strong></label><br />
					<?php
                    $categories=  get_categories(); 
                    foreach ($categories as $cat) {
                        $option='<input type="checkbox" id="dynshortcode_postcat[]" name="dynshortcode_postcat[]"';					
                        $option .= ' value="'.$cat->cat_name.'" />';
    
                        $option .= $cat->cat_name;
                        $option .= ' ('.$cat->category_count.')';
                        $option .= '<br />';
                        echo $option;
                      }
                
					?>                     
                    </td>
                    <td><label for="dynshortcode_slideset"><strong><?php _e('Select Slide Set:')?></strong></label><br /><small class="description">Slide Sets override Post Category options</small><br />
					<?php 
					$slideset_data_ids  = substr(maybe_unserialize(get_option('slideset_data_ids')), 0, -1);  // trim last comma
					$slideset_data_ids = explode(",", $slideset_data_ids);
			
					if($slideset_data_ids) {			
    						foreach ($slideset_data_ids as $slideset_data_ids) {
								$option='<input type="checkbox" id="dynshortcode_slideset[]" name="dynshortcode_slideset[]"';					
								$option .= ' value="'.$slideset_data_ids.'" />';
			
								$option .= $slideset_data_ids;
								$option .= '<br />';
								echo $option;
    						}
					}
					?> 
                    </td>
                  </tr>
                </table>


                </td>
            </tr>      
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_postgallery_numposts"><?php _e('Posts Limit:')?></label></td>
                <td >
                    <input type="text" style="width:18%;" name="dynshortcode[postgallery_numposts]" id="dynshortcode_postgallery_numposts" /><small class="description">Limit the number of posts shown.</small>
                </td>
            </tr>
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_postgallery_excerpt"><?php _e('Excerpt Word Limit:')?></label></td>
                <td >
                    <input type="text" style="width:18%;" name="dynshortcode[postgallery_excerpt]" id="dynshortcode_postgallery_excerpt" /><small class="description">Default is 55 words.</small>
                </td>
            </tr> 			              
             <tr valign="top">
                <td width="80px" ><label for="dynshortcode_postgallery_sortby"><?php _e('Post Sort By')?></label></td>
                <td >
                 	<select name="dynshortcode[postgallery_sortby]" id="dynshortcode_postgallery_sortby">
                        <option value="">Post Order (Default)</option>
                        <option value="date">Date</option>
                        <option value="rand">Random</option>
                        <option value="title">Title</option>
                     </select>                        
                </td>
            </tr>      
             <tr valign="top">
                <td width="80px" ><label for="dynshortcode_postgallery_orderby"><?php _e('Post Order By')?></label></td>
                <td >
                 	<select name="dynshortcode[postgallery_orderby]" id="dynshortcode_postgallery_orderby">
                        <option value="">Ascending (Default)</option>
                        <option value="DESC">Descending</option>
                     </select>                        
                </td>
            </tr>                                                                      
		</table>
          <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;'); ?>" />
        </p><p>&nbsp;</p>
    
        </div>  
 

        <div id="columnlayout">
        <small class="description">Select column layout and paste content (including HTML) into fields.</small>   
        <table class="form-table">
            <tr valign="top">
                <td width="80px" ><label for="wpYourPluginName_content"><?php _e('Layout:')?></label></td>
                <td>
					<select name="dynshortcode[columns]" id="dynshortcode_columns" onchange="toggle_shrtcode(this.options[this.options.selectedIndex].value,'dynshortcode_columns')">
						<option value="twocolumns">2 Columns</option>
						<option value="threecolumns">3 Columns</option>
                        <option value="twothreecolumns">2/3 Columns</option>
						<option value="fourcolumns">4 Columns</option>
                        <option value="threefourcolumns">3/4 Columns</option>
					</select>
                </td>
            </tr>                                    
		</table>
        <div id="twocolumns">

		<table class="form-table">       
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_twocol_first"><?php _e('Column 1 Content:')?></label></td>
                <td >
                    <input type="text" style="width:100%;" name="dynshortcode[twocol_first]" id="dynshortcode_twocol_first" />
                </td>
            </tr>
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_twocol_second"><?php _e('Column 2 Content')?></label></td>
                <td >
                    <input type="text" style="width:100%;" name="dynshortcode[twocol_second]" id="dynshortcode_twocol_second" />
                </td>
            </tr>  
        </table>

        </div>
        
        <div id="threecolumns">

		<table class="form-table">       
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_threecol_first"><?php _e('Column 1 Content:')?></label></td>
                <td >
                    <input type="text" style="width:100%;" name="dynshortcode[threecol_first]" id="dynshortcode_threecol_first" />
                </td>
            </tr>
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_threecol_second"><?php _e('Column 2 Content')?></label></td>
                <td >
                    <input type="text" style="width:100%;" name="dynshortcode[threecol_second]" id="dynshortcode_threecol_second" />
                </td>
            </tr>  
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_threecol_third"><?php _e('Column 3 Content')?></label></td>
                <td >
                    <input type="text" style="width:100%;" name="dynshortcode[threecol_third]" id="dynshortcode_threecol_third" />
                </td>
            </tr>  
        </table>

        
        </div>
 
         <div id="twothreecolumns">

		<table class="form-table">       
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_threecol_first"><?php _e('1/3 Column Content:')?></label></td>
                <td >
                    <input type="text" style="width:100%;" name="dynshortcode[twothreecol_first]" id="dynshortcode_twothreecol_first" />
                </td>
            </tr>
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_threecol_second"><?php _e('2/3 Column Content')?></label></td>
                <td >
                    <input type="text" style="width:100%;" name="dynshortcode[twothreecol_second]" id="dynshortcode_twothreecol_second" />
                </td>
            </tr>  
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_23pos"><?php _e('2/3 Column Position')?></label></td>
                <td >
                 	<select name="dynshortcode[23pos]" id="dynshortcode_23pos">
						<option value="right">Right</option>
						<option value="left">Left</option>
					</select>                   
                </td>
            </tr>  
        </table>

        
        </div>
        
        <div id="fourcolumns">
		<table class="form-table">       
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_fourcol_first"><?php _e('Column 1 Content:')?></label></td>
                <td >
                    <input type="text" style="width:100%;" name="dynshortcode[fourcol_first]" id="dynshortcode_fourcol_first" />
                </td>
            </tr>
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_fourcol_second"><?php _e('Column 2 Content')?></label></td>
                <td >
                    <input type="text" style="width:100%;" name="dynshortcode[fourcol_second]" id="dynshortcode_fourcol_second" />
                </td>
            </tr>  
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_fourcol_third"><?php _e('Column 3 Content')?></label></td>
                <td >
                    <input type="text" style="width:100%;" name="dynshortcode[fourcol_third]" id="dynshortcode_fourcol_third" />
                </td>
            </tr>  
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_fourcol_fourth"><?php _e('Column 4 Content')?></label></td>
                <td >
                    <input type="text" style="width:100%;" name="dynshortcode[fourcol_fourth]" id="dynshortcode_fourcol_fourth" />
                </td>
            </tr>  
        </table>

        </div>        
        <div id="threefourcolumns">

		<table class="form-table">       
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_threefourcol_first"><?php _e('1/4 Column Content:')?></label></td>
                <td >
                    <input type="text" style="width:100%;" name="dynshortcode[threefourcol_first]" id="dynshortcode_threefourcol_first" />
                </td>
            </tr>
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_threefourcol_second"><?php _e('3/4 Column Content')?></label></td>
                <td >
                    <input type="text" style="width:100%;" name="dynshortcode[threefourcol_second]" id="dynshortcode_threefourcol_second" />
                </td>
            </tr>  
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_fourcol_third"><?php _e('3/4 Column Position')?></label></td>
                <td >
                 	<select name="dynshortcode[34pos]" id="dynshortcode_34pos">
						<option value="right">Right</option>
						<option value="left">Left</option>
					</select>                   
                </td>
            </tr>  
        </table>


        </div>
 		<table class="form-table">
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_border"><?php _e('Border:')?></label></td>
                <td >
                	<select name="dynshortcode[border]" id="dynshortcode_border">
						<option value="">No border</option>
						<option value="border">Border</option>
					</select>
                </td>
            </tr>   
			<tr valign="top">
                <td colspan="2" >
                <small class="description">Column height will make all columns of equal height, this is optional.</small>
                </td>
            </tr> 
              <tr valign="top">
                <td width="80px" ><label for="dynshortcode_colheight"><?php _e('Columns Height')?></label></td>
                <td >
                 <input type="text" style="width:80%;" name="dynshortcode[colheight]" id="dynshortcode_colheight" /> px
                </td>
            </tr>   
		</table>          <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;'); ?>" />
        </p><p>&nbsp;</p>    
        </div>
        
        
        
        <div id="styledboxes">
        <small class="description">Select styled box, enter text for box.</small>   
        <table class="form-table">
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_styledboxes"><?php _e('Select Type:')?></label></td>
                <td>
					<select name="dynshortcode[styledboxes]" id="dynshortcode_styledboxes" onchange="toggle_shrtcode(this.options[this.options.selectedIndex].value,'dynshortcode_styledboxes')">
						<option value="general">General</option>
                        <option value="warning">Warning</option>
						<option value="information">Information</option>
                        <option value="download">Download</option>
						<option value="help">Help</option>
						<option value="shadow">Shadow</option> 
						<option value="shadowbottom">Shadow (No Top)</option>                                                
					</select>
                </td>
            </tr>
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_boxwidth"><?php _e('Box Width: <small class="description">(Default 100%)</small>')?></label></td>
                <td >
					<input type="text" style="width:50px;" name="dynshortcode[boxwidth]" id="dynshortcode_boxwidth" /> px
                </td>
            </tr> 
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_boxcontent"><?php _e('Box content:')?></label></td>
                <td >
					<input type="text" style="width:100%;" name="dynshortcode[boxcontent]" id="dynshortcode_boxcontent" />
                </td>
            </tr> 
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_box_align"><?php _e('Alignment:')?></label></td>
                <td>
					<select name="dynshortcode[box_align]" id="dynshortcode_box_align">
						<option value="">None</option>
						<option value="left">Left</option>
						<option value="right">Right</option>
						<option value="center">Center</option>                        
					</select>
                </td>
            </tr>                                     
		</table>          <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;'); ?>" />
        </p><p>&nbsp;</p>    
        </div>  
        
        <div id="button">
        <small class="description">Select Button Type.</small>   
        <table class="form-table">
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_button_type"><?php _e('Button Type:')?></label></td>
                <td>
                	<select name="dynshortcode[button_type]" id="dynshortcode_button_type" onchange="toggle_shrtcode(this.options[this.options.selectedIndex].value,'dynshortcode_button_type')">
						<option value="linkbutton">Button</option>
						<option value="droppanelbutton">Drop Panel Trigger</option>
					</select>
                </td>
            </tr>
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_button_color"><?php _e('Color:')?></label></td>
                <td>
                	<select name="dynshortcode[button_color]" id="dynshortcode_button_color">
						<option value="">Dark Grey</option>
						<option value="grey">Light Grey</option>                        
						<option value="aqua">Aqua</option>
						<option value="blue">Blue</option>
						<option value="green">Green</option>
						<option value="red">Red</option>
						<option value="magenta">Magenta</option>
						<option value="orange">Orange</option>
						<option value="yellow">Yellow</option>                        
					</select>
                </td>
            </tr>  
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_button_width"><?php _e('Width:')?></label></td>
                <td>
                	<select name="dynshortcode[button_width]" id="dynshortcode_button_width">
						<option value="">Normal</option>
						<option value="full">Full</option>
						<option value="threequarter">Three Quarter</option>                                                 
						<option value="half">Half</option>
						<option value="onequarter">One Quarter</option>                        
                  
					</select>
                </td>
            </tr>                        
            </table>
         <div id="linkbutton">
         <table class="form-table">           
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_button_link"><?php _e('Button URL:')?></label></td>
                <td>
					<input type="text" style="width:100%;" name="dynshortcode[button_link]" id="dynshortcode_button_link" />
                </td>
            </tr>
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_button_text"><?php _e('Button Text:')?></label></td>
                <td>
					<input type="text" style="width:100%;" name="dynshortcode[button_text]" id="dynshortcode_button_text" />
                </td>
            </tr>            
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_button_target"><?php _e('Link Target:')?></label></td>
                <td >
                	<select name="dynshortcode[button_target]" id="dynshortcode_button_target">
						<option value="">Self</option>
						<option value="_blank">Blank Page</option>
					</select>
                </td>
            </tr>                    
		</table> 
        </div>
        <div id="droppanelbutton">
         <table class="form-table">           
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_droppanelbutton_text"><?php _e('Button Text:')?></label></td>
                <td>
					<input type="text" style="width:100%;" name="dynshortcode[droppanelbutton_text]" id="dynshortcode_droppanelbutton_text" />
                </td>
            </tr>                           
		</table>         
        </div>          <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;'); ?>" />
        </p><p>&nbsp;</p>    
        </div>

        <div id="hozbreak">
        <small class="description">Select horizontal break line with or without top link.</small>   
        <table class="form-table">
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_hozbreak"><?php _e('Select Type:')?></label></td>
                <td>
					<select name="dynshortcode[hozbreak]" id="dynshortcode_hozbreak">
						<option value="hozbreak">Break Line</option>
						<option value="hozbreaktop">Break Line Top Link</option>
					</select>
                </td>
            </tr>                
		</table>          <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;'); ?>" />
        </p><p>&nbsp;</p>     
        </div>
             
        <div id="blockquote">
        <small class="description">Select block quote type.</small>   
        <table class="form-table">
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_blockquote"><?php _e('Select Type:')?></label></td>
                <td>
					<select name="dynshortcode[blockquote]" id="dynshortcode_blockquote">
						<option value="blockquote_line">Block Quote Line</option>
						<option value="blockquote_quotes">Block Quote Quotes</option>
					</select>
                </td>
            </tr>
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_blockquote_align"><?php _e('Alignment:')?></label></td>
                <td>
					<select name="dynshortcode[blockquote_align]" id="dynshortcode_blockquote_align">
						<option value="left">Left</option>
						<option value="right">Right</option>
                        <option value="center">Center</option>
					</select>
                </td>
            </tr>            
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_blockquote_text"><?php _e('Block Quote Text:')?></label></td>
                <td >
					<input type="text" style="width:100%;" name="dynshortcode[blockquote_text]" id="dynshortcode_blockquote_text" />
                </td>
            </tr>                    
		</table>          <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;'); ?>" />
        </p><p>&nbsp;</p>      
        </div> 
        
        <div id="imgeffect">
        <small class="description">Select Image effect.</small>   
        <table class="form-table">
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_imageeffect"><?php _e('Select Effect:')?></label></td>
                <td>
					<select name="dynshortcode[imageeffect]" id="dynshortcode_imageeffect">
						<option value="frame">Frame</option>
						<option value="reflect">Reflect</option>
						<option value="shadow">Shadow</option>    
						<option value="shadowreflect">Shadow / Reflect</option>                                                
						<option value="framelightbox">Frame / Lightbox</option>
						<option value="reflectlightbox">Reflect / Lightbox</option>     
						<option value="shadowlightbox">Shadow / Lightbox</option>
						<option value="shadowreflectlightbox">Shadow/Reflect/Lightbox</option>                        
						<option value="lightbox">Lightbox</option>                                                
					</select>
                </td>
            </tr>
             <tr valign="top">
                <td width="80px" ><label for="dynshortcode_imageeffect_shadowsize"><?php _e('Shadow Size')?></label></td>
                <td >
                 	<select name="dynshortcode[imageeffect_shadowsize]" id="dynshortcode_imageeffect_shadowsize">
                    	<option value="shadow-xsmall">XSmall (100px)</option>
						<option value="shadow-small">Small (230px)</option>
						<option value="shadow-medium">Medium (320px)</option>
						<option value="shadow-large">Large (920px)</option>                                             
					</select>                        
                </td>
            </tr>               
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_imageeffectwidth"><?php _e('Image Width:')?></label></td>
                <td >
					<input type="text" style="width:60px;" name="dynshortcode[imageeffectwidth]" id="dynshortcode_imageeffectwidth" /> px
                </td>
            </tr>
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_imageeffectheight"><?php _e('Image Height:')?></label></td>
                <td >
					<input type="text" style="width:60px;" name="dynshortcode[imageeffectheight]" id="dynshortcode_imageeffectheight" /> px
                </td>
            </tr>            
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_imageeffecturl"><?php _e('Image URL:')?></label></td>
                <td >
					<input type="text" style="width:100%;" name="dynshortcode[imageeffecturl]" id="dynshortcode_imageeffecturl" />
                </td>
            </tr>
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_imageeffectvidurl"><?php _e('Video URL:')?></label></td>
                <td >
					<input type="text" style="width:100%;" name="dynshortcode[imageeffectvidurl]" id="dynshortcode_imageeffectvidurl" />
                    <small class="description">URL of alternative file e.g. youtube video (Lightbox effect only!).</small>
                </td>
            </tr>            
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_imageeffectalt"><?php _e('Image Title Text:')?></label></td>
                <td >
					<input type="text" style="width:100%;" name="dynshortcode[imageeffectalt]" id="dynshortcode_imageeffectalt" />
                </td>
            </tr>          
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_alttextoverlay"><?php _e('Enable Title Text Overlay:')?></label></td>
                <td >
                	<input name="dynshortcode[alttextoverlay]" id="dynshortcode_alttextoverlay" type="checkbox" value="yes" />
                    <small class="description">Overlay the title text on the image when mouse is rolled over.</small>
                </td>
            </tr>			  
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_imageeffectalign"><?php _e('Alignment:')?></label></td>
                <td>
					<select name="dynshortcode[imageeffectalign]" id="dynshortcode_imageeffectalign">
						<option value="">None</option>
						<option value="alignleft">Left</option>
						<option value="alignright">Right</option>
						<option value="aligncenter">Center</option>                        
					</select>
                </td>
            </tr>                                          
		</table>          <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;'); ?>" />
        </p><p>&nbsp;</p>      
        </div>

        <div id="videoshortcode">
        <small class="description">Embed Video.</small>   
        <table class="form-table">
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_videoshortcode"><?php _e('Select Video Type:')?></label></td>
                <td>
					<select name="dynshortcode[videoshortcode]" id="dynshortcode_videoshortcode">
						<option value="youtube">YouTube</option>
						<option value="vimeo">Vimeo</option>
						<option value="flash">Flash</option>    
						<option value="jwplayer">JW Player</option>                                                                                         
					</select>
                </td>
            </tr>
             <tr valign="top">
                <td width="80px" ><label for="dynshortcode_videoshortcode_shadowsize"><?php _e('Enable Shadow')?></label></td>
                <td >
                 	<select name="dynshortcode[videoshortcode_shadowsize]" id="dynshortcode_videoshortcode_shadowsize">
                    	<option value="">Disabled</option>
						<option value="shadow-xsmall">XSmall (100px)</option>
						<option value="shadow-small">Small (230px)</option>
						<option value="shadow-medium">Medium (320px)</option>
						<option value="shadow-large">Large (920px)</option>                                             
					</select>                        
                </td>
            </tr>               
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_videoshortcodewidth"><?php _e('Video Width:')?></label></td>
                <td >
					<input type="text" style="width:60px" name="dynshortcode[videoshortcodewidth]" id="dynshortcode_videoshortcodewidth" /> px
                </td>
            </tr>
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_videoshortcodeheight"><?php _e('Video Height:')?></label></td>
                <td >
					<input type="text" style="width:60px;" name="dynshortcode[videoshortcodeheight]" id="dynshortcode_videoshortcodeheight" /> px
                </td>
            </tr>            
             <tr valign="top">
                <td width="80px" ><label for="dynshortcode_videoshortcodeurl"><?php _e('Video URL:')?></label></td>
                <td >
					<input type="text" style="width:100%;" name="dynshortcode[videoshortcodeurl]" id="dynshortcode_videoshortcodeurl" />
                </td>
            </tr>            
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_videoshortcodeimgurl"><?php _e('JW Player Image URL:')?></label></td>
                <td >
					<input type="text" style="width:100%;" name="dynshortcode[videoshortcodeimgurl]" id="dynshortcode_videoshortcodeimgurl" />
					<small class="description">Enter holding image URL for JW Player videos.</small> 
                </td>
            </tr>   
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_videoshortcodeid"><?php _e('Video ID:')?></label></td>
                <td >
                    <input type="text" style="width:18%;" name="dynshortcode[videoshortcodeid]" id="dynshortcode_videoshortcodeid" /><small class="description">Required if multiple jw player videos on a page. e.g. 2</small>
                </td>
            </tr>  			
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_videoshortcodeautoplay"><?php _e('Video  Autoplay:')?></label></td>
                <td >
                	<input name="dynshortcode[videoshortcodeautoplay]" id="dynshortcode_videoshortcodeautoplay" type="checkbox" value="yes" />
                </td>
            </tr>							  
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_videoshortcodealign"><?php _e('Alignment:')?></label></td>
                <td>
					<select name="dynshortcode[videoshortcodealign]" id="dynshortcode_videoshortcodealign">
						<option value="">None</option>
						<option value="alignleft">Left</option>
						<option value="alignright">Right</option>
						<option value="aligncenter">Center</option>                        
					</select>
                </td>
            </tr>                                          
		</table>          <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;'); ?>" />
        </p><p>&nbsp;</p>      
        </div>
                 
        <div id="highlight">
        <small class="description">Select Hightlight type and enter text (Light Highlight is based on theme link colour).</small>   
        <table class="form-table">
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_highlight"><?php _e('Select Type:')?></label></td>
                <td>
					<select name="dynshortcode[highlight]" id="dynshortcode_highlight">
						<option value="one">Highlight Light</option>
						<option value="two">Highlight Dark</option>
					</select>
                </td>
            </tr> 
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_highlight_text"><?php _e('Highlighted Text:')?></label></td>
                <td >
					<input type="text" style="width:100%;" name="dynshortcode[highlight_text]" id="dynshortcode_highlight_text" />
                </td>
            </tr>                            
		</table>          <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;'); ?>" />
        </p><p>&nbsp;</p>      
        </div>  
        <div id="tabs">
        <small class="description">Enter Number of Tabs Required and click <em>"Send Shortcode to Editor"</em>.</small>   
        <table class="form-table">
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_numtabs"><?php _e('Enter Number of Tabs:')?></label></td>
                <td>
					<input type="text" style="width:35px;" name="dynshortcode[numtabs]" id="dynshortcode_numtabs" />
                </td>
            </tr>                                         
		</table>          <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;'); ?>" />
        </p><p>&nbsp;</p>      
        </div>
        <div id="accordion">
        <small class="description">Enter Number of Accordion Panels Required.</small>   
        <table class="form-table">
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_numaccordion"><?php _e('Enter Number of Panels:')?></label></td>
                <td>
					<input type="text" style="width:35px;"  name="dynshortcode[numaccordion]" id="dynshortcode_numaccordion" />
                </td>
            </tr>
            <tr>
				<td width="90px" ><label for="dynshortcode_accordioncollapse"><?php _e('Collapse Panels:')?></label></td>
                <td colspan="3"><input name="dynshortcode[accordioncollapse]" id="dynshortcode_accordioncollapse" type="checkbox" value="yes" /> <small class="description">Panels will be collapsed on startup.</small>  </td>            
            </tr>                                         
		</table>          <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;'); ?>" />
        </p><p>&nbsp;</p>      
        </div>        
        <div id="list"> 
        <small class="description">Select list type and color plus how many list items.</small>   
        <table class="form-table">
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_highlight"><?php _e('Select List Type:')?></label></td>
                <td>
					<select name="dynshortcode[liststyle]" id="dynshortcode_liststyle">
						<option value="arrow">Arrow</option>
						<option value="check">Check</option>
                        <option value="orb">Orb</option>
					</select>
                </td>
            </tr>         
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_listcolor"><?php _e('Select Color:')?></label></td>
                <td>
					<select name="dynshortcode[listcolor]" id="dynshortcode_listcolor">
						<option value="blue">Blue</option>
						<option value="green">Green</option>
						<option value="grey">Dark Grey</option>   
                        <option value="orange">Orange</option>   
                        <option value="pink">Pink</option>   
                        <option value="red">Red</option>   
                        <option value="teal">Teal</option>
                        <option value="white">White</option>                           
					</select>
                </td>
            </tr>             
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_numlist"><?php _e('Enter Number of List Items:')?></label></td>
                <td>
					<input type="text" style="width:35px;"  name="dynshortcode[numlist]" id="dynshortcode_numlist" />
                </td>
            </tr>                                         
		</table>          <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;'); ?>" />
        </p><p>&nbsp;</p>      
        </div>        
		<div id="reveal"> 
        <small class="description">Select list type and color plus how many list items.</small>   
        <table class="form-table">
           <tr valign="top">
               <td width="80px" ><label for="dynshortcode_revealtitle"><?php _e('Reveal Title:')?></label></td>
               <td >
					<input type="text" style="100px;" name="dynshortcode[revealtitle]" id="dynshortcode_revealtitle" />
               </td>
           </tr> 
           <tr valign="top">
                <td width="80px" ><label for="dynshortcode_revealcontent"><?php _e('Box content:')?></label></td>
                <td >
					<input type="text" style="width:100%;" name="dynshortcode[revealcontent]" id="dynshortcode_revealcontent" />
                </td>
           </tr> 
           <tr valign="top">
                <td width="80px" ><label for="dynshortcode_revealwidth"><?php _e('Box Width: <small class="description">(Default 100%)</small>')?></label></td>
                <td >
					<input type="text" style="width:50px;" name="dynshortcode[revealwidth]" id="dynshortcode_revealwidth" /> px
                </td>
            </tr> 
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_revealalign"><?php _e('Alignment:')?></label></td>
                <td>
					<select name="dynshortcode[revealalign]" id="dynshortcode_revealalign">
						<option value="">None</option>
						<option value="left">Left</option>
						<option value="right">Right</option>
						<option value="center">Center</option>                        
					</select>
                </td>
            </tr>                                                          
		</table>          <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;'); ?>" />
        </p><p>&nbsp;</p>      
        </div>        
		<div id="dropcaps"> 
        <small class="description">Select list type and color plus how many list items.</small>   
        <table class="form-table">
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_dropcapstyle"><?php _e('Drop Cap Style:')?></label></td>
                <td>
					<select name="dynshortcode[dropcapstyle]" id="dynshortcode_dropcapstyle">
						<option value="one">Style One</option>
						<option value="two">Style Two</option>                 
					</select>
                </td>
            </tr>  
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_dropcapcolor"><?php _e('Select Color:')?></label></td>
                <td>
					<select name="dynshortcode[dropcapcolor]" id="dynshortcode_dropcapcolor">
						<option value="blue">Blue</option>
						<option value="darkblue">Dark Blue</option>                        
						<option value="green">Green</option>
						<option value="grey">Dark Grey</option>   
                        <option value="mustard">Mustard</option>   
                        <option value="orange">Orange</option>   
                        <option value="pink">Pink</option>   
                        <option value="red">Red</option>   
                        <option value="teal">Teal</option>
                        <option value="lightgrey">Light Grey</option>                           
					</select>
                </td>
            </tr>  
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_dropcap"><?php _e('Drop Cap Text:')?></label></td>
                <td >
					<input type="text" style="width:50px;" name="dynshortcode[dropcap]" id="dynshortcode_dropcap" />
                </td>
            </tr>                                     
		</table>          <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;'); ?>" />
        </p><p>&nbsp;</p>      
        </div>        
                                             
<?php
}




// create custom plugin settings menu
add_action('admin_menu', 'cwz_create_menu');

function cwz_create_menu() {

	//create new top-level menu
	
	add_menu_page('DynamiX General Settings', 'DynamiX', 'administrator', 'main', 'load_main');
	add_submenu_page( 'main', 'DynamiX General Settings', 'Documentation', 'administrator', 'main', 'load_main');
	add_submenu_page( 'main', 'General Settings', 'General Settings', 'administrator', 'general', 'load_options');
	add_submenu_page( 'main', 'Blog Settings', 'Blog Settings', 'administrator', 'blog', 'load_blogoptions');
	add_submenu_page( 'main', 'Header Settings', 'Header Settings', 'administrator', 'droppanel', 'load_droppanel');
	add_submenu_page( 'main', 'Footer Settings', 'Footer Settings', 'administrator', 'footer', 'load_footer');
	add_submenu_page( 'main', 'Gallery Slide Sets', 'Gallery Slide Sets', 'administrator', 'gallery_slidesets', 'load_gallery_slidesets');	
	add_action( 'admin_init', 'register_themesettings' );
}


function register_themesettings() {



//  GENERAL OPTIONS 

	// Skin Select
	register_setting( 'general-settings-group', 'outskin' );
	register_setting( 'general-settings-group', 'inskin' );	

	// WP Custom Menu for Main Menu.
	register_setting( 'general-settings-group', 'wpcustomm_enable' );


	// BuddyPress Page Layout Config
	register_setting( 'general-settings-group', 'buddylayout' );
	register_setting( 'general-settings-group', 'buddycontentborder' );
	
	register_setting( 'general-settings-group', 'buddycolone' );
	register_setting( 'general-settings-group', 'buddycolone_border' );
	
	register_setting( 'general-settings-group', 'buddycoltwo' );
	register_setting( 'general-settings-group', 'buddycoltwo_border' );	
		
	// Enable Footer / Droppanel Widgets.
	register_setting( 'general-settings-group', 'ftdrpwidget_enable' );

	// Number of Sidebars to generate.
	register_setting( 'general-settings-group', 'sidebars_num' );

	// Branding Image URL.
	register_setting( 'general-settings-group', 'branding_url' );

	// General Font Color.
	register_setting( 'general-settings-group', 'font_color' );

	// General Link Color.
	register_setting( 'general-settings-group', 'font_link' );

	// General Link Hover Color.
	register_setting( 'general-settings-group', 'font_hover' );
	
	// Sidebar Link Color.
	register_setting( 'general-settings-group', 'side_link' );

	// Sidebar Link Hover Color.
	register_setting( 'general-settings-group', 'side_hover' );
	
	// Enable Cufon.
	register_setting( 'general-settings-group', 'cufon_enable' );
	
	// Effect HTML tags.
	register_setting( 'general-settings-group', 'cufon_tags' );
	
	// Cufon JS font file.
	register_setting( 'general-settings-group', 'cufon_font' );
	
	// Primary Cufon Gradient.
	register_setting( 'general-settings-group', 'cufongradpri_1' );
	register_setting( 'general-settings-group', 'cufongradpri_2' );
	register_setting( 'general-settings-group', 'cufongradpri_3' );
	register_setting( 'general-settings-group', 'cufongradpri_4' );
	register_setting( 'general-settings-group', 'cufongradpri_5' );	
	register_setting( 'general-settings-group', 'cufongradpri_6' );
		
	// Secondary Cufon Gradient.
	register_setting( 'general-settings-group', 'cufongradsec_1' );
	register_setting( 'general-settings-group', 'cufongradsec_2' );
	register_setting( 'general-settings-group', 'cufongradsec_3' );
	register_setting( 'general-settings-group', 'cufongradsec_4' );
	register_setting( 'general-settings-group', 'cufongradsec_5' );	
	register_setting( 'general-settings-group', 'cufongradsec_6' );	
	
	// Twitter Feed.
	register_setting( 'general-settings-group', 'twitter_usrname' );
	register_setting( 'general-settings-group', 'twitter_feednum' );
	register_setting( 'general-settings-group', 'twitter_label' );

	// Timthumb
	register_setting( 'general-settings-group', 'timthumb_disable' );
	
	// Gallery Slide Set Media Library Image List
	register_setting( 'general-settings-group', 'medialib_disable' );
	
	// JW Player.
	register_setting( 'general-settings-group', 'jwplayer_js' );
	register_setting( 'general-settings-group', 'jwplayer_swf' );
	register_setting( 'general-settings-group', 'jwplayer_yt' );	
	register_setting( 'general-settings-group', 'jwplayer_skin' );	
	register_setting( 'general-settings-group', 'jwplayer_skinpos' );
	register_setting( 'general-settings-group', 'jwplayer_plugins' );	

//	BLOG OPTIONS 

	// Post Display Type

	register_setting( 'blog-settings-group', 'arhpostdisplay' );
	register_setting( 'blog-settings-group', 'arhpostcontent' );
	register_setting( 'blog-settings-group', 'arhexcerpt' );	
	register_setting( 'blog-settings-group', 'arhpostpostmeta' );		
	
	
	// Index Image config
	
	register_setting( 'blog-settings-group', 'arhimgdisplay' );
	register_setting( 'blog-settings-group', 'arhimgheight' );	
	register_setting( 'blog-settings-group', 'arhimgwidth' );	
	register_setting( 'blog-settings-group', 'arhimgeffect' );	

	
	// Post Image config
	
	register_setting( 'blog-settings-group', 'postimgdisplay' );
	register_setting( 'blog-settings-group', 'postimgheight' );	
	register_setting( 'blog-settings-group', 'postimgwidth' );	
	register_setting( 'blog-settings-group', 'postimgeffect' );		
	

	// Archive / Index Page Layout Config
	register_setting( 'blog-settings-group', 'arhlayout' );
	register_setting( 'blog-settings-group', 'archbreadcrumb' );
	register_setting( 'blog-settings-group', 'archcontentborder' );
	
	register_setting( 'blog-settings-group', 'archcolone' );
	register_setting( 'blog-settings-group', 'archcolone_border' );
	
	register_setting( 'blog-settings-group', 'archcoltwo' );
	register_setting( 'blog-settings-group', 'archcoltwo_border' );


		
	

//  DROP PANEL OPTIONS 
	
	// Add Favicon
	register_setting( 'droppanel-settings-group', 'header_favicon' );
	
	// Add Custom HTML
	register_setting( 'droppanel-settings-group', 'header_html' );	
	
	// Enable Drop Panel
	register_setting( 'droppanel-settings-group', 'droppanel' );
	
	// Height of Drop Panel
	register_setting( 'droppanel-settings-group', 'droppanelheight' );

	// Drop Panel Trigger Name
	register_setting( 'droppanel-settings-group', 'droptriggername' );

	// Drop Panel Trigger Desc
	register_setting( 'droppanel-settings-group', 'droptriggerdesc' );	

	// Columns Number
	register_setting( 'droppanel-settings-group', 'droppanel_columns_num' );	
	
//  TopFirst OPTIONS 	
	
	// TopFirst Panel Select
	
	register_setting( 'droppanel-settings-group', 'TopFirstselect' );
	
	// HTML Editor 

	register_setting( 'droppanel-settings-group', 'TopFirsthtmltitle' );	
	register_setting( 'droppanel-settings-group', 'TopFirstcontent' );

	// ContactForm
		
	register_setting( 'droppanel-settings-group', 'TopFirstcontacttitle' );
	register_setting( 'droppanel-settings-group', 'TopFirstcontactdesc' );
	register_setting( 'droppanel-settings-group', 'TopFirstcontactemail' );
	register_setting( 'droppanel-settings-group', 'TopFirstcontactmsg' );
	
	// Pages List
	
	register_setting( 'droppanel-settings-group', 'TopFirstpagestitle' );
	register_setting( 'droppanel-settings-group', 'TopFirstpagesexc' );

	// Recent Posts
	
	register_setting( 'droppanel-settings-group', 'TopFirstrecenttitle' );
	register_setting( 'droppanel-settings-group', 'TopFirstrecentcat' );
	register_setting( 'droppanel-settings-group', 'TopFirstrecentnum' );
	
	// Categories
	
	register_setting( 'droppanel-settings-group', 'TopFirstcattitle' );
	register_setting( 'droppanel-settings-group', 'TopFirstcat' );
	
	// Meta Information
	
	register_setting( 'droppanel-settings-group', 'TopFirstmetatitle' );
	
	register_setting( 'droppanel-settings-group', 'TopFirstmeta1' );
	register_setting( 'droppanel-settings-group', 'TopFirstmeta2' );
	register_setting( 'droppanel-settings-group', 'TopFirstmeta3' );
	register_setting( 'droppanel-settings-group', 'TopFirstmeta4' );
	register_setting( 'droppanel-settings-group', 'TopFirstmeta5' );




//  TopSecond OPTIONS 	
	
	// TopSecond Panel Select
	
	register_setting( 'droppanel-settings-group', 'TopSecondselect' );
	
	// HTML Editor 

	register_setting( 'droppanel-settings-group', 'TopSecondhtmltitle' );	
	register_setting( 'droppanel-settings-group', 'TopSecondcontent' );

	// ContactForm
		
	register_setting( 'droppanel-settings-group', 'TopSecondcontacttitle' );
	register_setting( 'droppanel-settings-group', 'TopSecondcontactdesc' );
	register_setting( 'droppanel-settings-group', 'TopSecondcontactemail' );
	register_setting( 'droppanel-settings-group', 'TopSecondcontactmsg' );
	
	// Pages List
	
	register_setting( 'droppanel-settings-group', 'TopSecondpagestitle' );
	register_setting( 'droppanel-settings-group', 'TopSecondpagesexc' );

	// Recent Posts
	
	register_setting( 'droppanel-settings-group', 'TopSecondrecenttitle' );
	register_setting( 'droppanel-settings-group', 'TopSecondrecentcat' );
	register_setting( 'droppanel-settings-group', 'TopSecondrecentnum' );
	
	// Categories
	
	register_setting( 'droppanel-settings-group', 'TopSecondcattitle' );
	register_setting( 'droppanel-settings-group', 'TopSecondcat' );
	
	// Meta Information
	
	register_setting( 'droppanel-settings-group', 'TopSecondmetatitle' );
	
	register_setting( 'droppanel-settings-group', 'TopSecondmeta1' );
	register_setting( 'droppanel-settings-group', 'TopSecondmeta2' );
	register_setting( 'droppanel-settings-group', 'TopSecondmeta3' );
	register_setting( 'droppanel-settings-group', 'TopSecondmeta4' );
	register_setting( 'droppanel-settings-group', 'TopSecondmeta5' );




//  TopThird OPTIONS 	
	
	// TopThird Panel Select
	
	register_setting( 'droppanel-settings-group', 'TopThirdselect' );
	
	// HTML Editor 

	register_setting( 'droppanel-settings-group', 'TopThirdhtmltitle' );	
	register_setting( 'droppanel-settings-group', 'TopThirdcontent' );

	// ContactForm
		
	register_setting( 'droppanel-settings-group', 'TopThirdcontacttitle' );
	register_setting( 'droppanel-settings-group', 'TopThirdcontactdesc' );
	register_setting( 'droppanel-settings-group', 'TopThirdcontactemail' );
	register_setting( 'droppanel-settings-group', 'TopThirdcontactmsg' );
	
	// Pages List
	
	register_setting( 'droppanel-settings-group', 'TopThirdpagestitle' );
	register_setting( 'droppanel-settings-group', 'TopThirdpagesexc' );

	// Recent Posts
	
	register_setting( 'droppanel-settings-group', 'TopThirdrecenttitle' );
	register_setting( 'droppanel-settings-group', 'TopThirdrecentcat' );
	register_setting( 'droppanel-settings-group', 'TopThirdrecentnum' );
	
	// Categories
	
	register_setting( 'droppanel-settings-group', 'TopThirdcattitle' );
	register_setting( 'droppanel-settings-group', 'TopThirdcat' );
	
	// Meta Information
	
	register_setting( 'droppanel-settings-group', 'TopThirdmetatitle' );
	
	register_setting( 'droppanel-settings-group', 'TopThirdmeta1' );
	register_setting( 'droppanel-settings-group', 'TopThirdmeta2' );
	register_setting( 'droppanel-settings-group', 'TopThirdmeta3' );
	register_setting( 'droppanel-settings-group', 'TopThirdmeta4' );
	register_setting( 'droppanel-settings-group', 'TopThirdmeta5' );




//  TopFourth OPTIONS 	
	
	// TopFourth Panel Select
	
	register_setting( 'droppanel-settings-group', 'TopFourthselect' );
	
	// HTML Editor 

	register_setting( 'droppanel-settings-group', 'TopFourthhtmltitle' );	
	register_setting( 'droppanel-settings-group', 'TopFourthcontent' );

	// ContactForm
		
	register_setting( 'droppanel-settings-group', 'TopFourthcontacttitle' );
	register_setting( 'droppanel-settings-group', 'TopFourthcontactdesc' );
	register_setting( 'droppanel-settings-group', 'TopFourthcontactemail' );
	register_setting( 'droppanel-settings-group', 'TopFourthcontactmsg' );
	
	// Pages List
	
	register_setting( 'droppanel-settings-group', 'TopFourthpagestitle' );
	register_setting( 'droppanel-settings-group', 'TopFourthpagesexc' );

	// Recent Posts
	
	register_setting( 'droppanel-settings-group', 'TopFourthrecenttitle' );
	register_setting( 'droppanel-settings-group', 'TopFourthrecentcat' );
	register_setting( 'droppanel-settings-group', 'TopFourthrecentnum' );
	
	// Categories
	
	register_setting( 'droppanel-settings-group', 'TopFourthcattitle' );
	register_setting( 'droppanel-settings-group', 'TopFourthcat' );
	
	// Meta Information
	
	register_setting( 'droppanel-settings-group', 'TopFourthmetatitle' );
	
	register_setting( 'droppanel-settings-group', 'TopFourthmeta1' );
	register_setting( 'droppanel-settings-group', 'TopFourthmeta2' );
	register_setting( 'droppanel-settings-group', 'TopFourthmeta3' );
	register_setting( 'droppanel-settings-group', 'TopFourthmeta4' );
	register_setting( 'droppanel-settings-group', 'TopFourthmeta5' );




//  Footer Options

	// Columns Number
	register_setting( 'footer-settings-group', 'footer_columns_num' );
	
	// Lower footer LEFT
	register_setting( 'footer-settings-group', 'lowerfooter' );

	// Lower footer LEFT
	register_setting( 'footer-settings-group', 'lowfooterleft' );
	
	// Lower footer RIGHT
	register_setting( 'footer-settings-group', 'lowfooterright' );
	

//  BotFirst OPTIONS 	
	
	// BotFirst Panel Select
	
	register_setting( 'footer-settings-group', 'BotFirstselect' );
	
	// HTML Editor 

	register_setting( 'footer-settings-group', 'BotFirsthtmltitle' );	
	register_setting( 'footer-settings-group', 'BotFirstcontent' );

	// ContactForm
		
	register_setting( 'footer-settings-group', 'BotFirstcontacttitle' );
	register_setting( 'footer-settings-group', 'BotFirstcontactdesc' );
	register_setting( 'footer-settings-group', 'BotFirstcontactemail' );
	register_setting( 'footer-settings-group', 'BotFirstcontactmsg' );
	
	// Pages List
	
	register_setting( 'footer-settings-group', 'BotFirstpagestitle' );
	register_setting( 'footer-settings-group', 'BotFirstpagesexc' );

	// Recent Posts
	
	register_setting( 'footer-settings-group', 'BotFirstrecenttitle' );
	register_setting( 'footer-settings-group', 'BotFirstrecentcat' );
	register_setting( 'footer-settings-group', 'BotFirstrecentnum' );
	
	// Categories
	
	register_setting( 'footer-settings-group', 'BotFirstcattitle' );
	register_setting( 'footer-settings-group', 'BotFirstcat' );
	
	// Meta Information
	
	register_setting( 'footer-settings-group', 'BotFirstmetatitle' );
	
	register_setting( 'footer-settings-group', 'BotFirstmeta1' );
	register_setting( 'footer-settings-group', 'BotFirstmeta2' );
	register_setting( 'footer-settings-group', 'BotFirstmeta3' );
	register_setting( 'footer-settings-group', 'BotFirstmeta4' );
	register_setting( 'footer-settings-group', 'BotFirstmeta5' );




//  BotSecond OPTIONS 	
	
	// BotSecond Panel Select
	
	register_setting( 'footer-settings-group', 'BotSecondselect' );
	
	// HTML Editor 

	register_setting( 'footer-settings-group', 'BotSecondhtmltitle' );	
	register_setting( 'footer-settings-group', 'BotSecondcontent' );

	// ContactForm
		
	register_setting( 'footer-settings-group', 'BotSecondcontacttitle' );
	register_setting( 'footer-settings-group', 'BotSecondcontactdesc' );
	register_setting( 'footer-settings-group', 'BotSecondcontactemail' );
	register_setting( 'footer-settings-group', 'BotSecondcontactmsg' );
	
	// Pages List
	
	register_setting( 'footer-settings-group', 'BotSecondpagestitle' );
	register_setting( 'footer-settings-group', 'BotSecondpagesexc' );

	// Recent Posts
	
	register_setting( 'footer-settings-group', 'BotSecondrecenttitle' );
	register_setting( 'footer-settings-group', 'BotSecondrecentcat' );
	register_setting( 'footer-settings-group', 'BotSecondrecentnum' );
	
	// Categories
	
	register_setting( 'footer-settings-group', 'BotSecondcattitle' );
	register_setting( 'footer-settings-group', 'BotSecondcat' );
	
	// Meta Information
	
	register_setting( 'footer-settings-group', 'BotSecondmetatitle' );
	
	register_setting( 'footer-settings-group', 'BotSecondmeta1' );
	register_setting( 'footer-settings-group', 'BotSecondmeta2' );
	register_setting( 'footer-settings-group', 'BotSecondmeta3' );
	register_setting( 'footer-settings-group', 'BotSecondmeta4' );
	register_setting( 'footer-settings-group', 'BotSecondmeta5' );




//  BotThird OPTIONS 	
	
	// BotThird Panel Select
	
	register_setting( 'footer-settings-group', 'BotThirdselect' );
	
	// HTML Editor 

	register_setting( 'footer-settings-group', 'BotThirdhtmltitle' );	
	register_setting( 'footer-settings-group', 'BotThirdcontent' );

	// ContactForm
		
	register_setting( 'footer-settings-group', 'BotThirdcontacttitle' );
	register_setting( 'footer-settings-group', 'BotThirdcontactdesc' );
	register_setting( 'footer-settings-group', 'BotThirdcontactemail' );
	register_setting( 'footer-settings-group', 'BotThirdcontactmsg' );
	
	// Pages List
	
	register_setting( 'footer-settings-group', 'BotThirdpagestitle' );
	register_setting( 'footer-settings-group', 'BotThirdpagesexc' );

	// Recent Posts
	
	register_setting( 'footer-settings-group', 'BotThirdrecenttitle' );
	register_setting( 'footer-settings-group', 'BotThirdrecentcat' );
	register_setting( 'footer-settings-group', 'BotThirdrecentnum' );
	
	// Categories
	
	register_setting( 'footer-settings-group', 'BotThirdcattitle' );
	register_setting( 'footer-settings-group', 'BotThirdcat' );
	
	// Meta Information
	
	register_setting( 'footer-settings-group', 'BotThirdmetatitle' );
	
	register_setting( 'footer-settings-group', 'BotThirdmeta1' );
	register_setting( 'footer-settings-group', 'BotThirdmeta2' );
	register_setting( 'footer-settings-group', 'BotThirdmeta3' );
	register_setting( 'footer-settings-group', 'BotThirdmeta4' );
	register_setting( 'footer-settings-group', 'BotThirdmeta5' );




//  BotFourth OPTIONS 	
	
	// BotFourth Panel Select
	
	register_setting( 'footer-settings-group', 'BotFourthselect' );
	
	// HTML Editor 

	register_setting( 'footer-settings-group', 'BotFourthhtmltitle' );	
	register_setting( 'footer-settings-group', 'BotFourthcontent' );

	// ContactForm
		
	register_setting( 'footer-settings-group', 'BotFourthcontacttitle' );
	register_setting( 'footer-settings-group', 'BotFourthcontactdesc' );
	register_setting( 'footer-settings-group', 'BotFourthcontactemail' );
	register_setting( 'footer-settings-group', 'BotFourthcontactmsg' );
	
	// Pages List
	
	register_setting( 'footer-settings-group', 'BotFourthpagestitle' );
	register_setting( 'footer-settings-group', 'BotFourthpagesexc' );

	// Recent Posts
	
	register_setting( 'footer-settings-group', 'BotFourthrecenttitle' );
	register_setting( 'footer-settings-group', 'BotFourthrecentcat' );
	register_setting( 'footer-settings-group', 'BotFourthrecentnum' );
	
	// Categories
	
	register_setting( 'footer-settings-group', 'BotFourthcattitle' );
	register_setting( 'footer-settings-group', 'BotFourthcat' );
	
	// Meta Information
	
	register_setting( 'footer-settings-group', 'BotFourthmetatitle' );
	
	register_setting( 'footer-settings-group', 'BotFourthmeta1' );
	register_setting( 'footer-settings-group', 'BotFourthmeta2' );
	register_setting( 'footer-settings-group', 'BotFourthmeta3' );
	register_setting( 'footer-settings-group', 'BotFourthmeta4' );
	register_setting( 'footer-settings-group', 'BotFourthmeta5' );
	
	// Gallery Creator
	
	register_setting( 'gallery-settings-group', 'slideset_data' );	
	register_setting( 'gallery-settings-group', 'slideset_number' );	
	register_setting( 'gallery-settings-group', 'filter_categories' );	
}

if($_REQUEST['page']=="droppanel" || $_REQUEST['page']=="footer") {

	add_filter('admin_head','ShowTinyMCE'); // Display TinyMCE in Admin Options
    
	function ShowTinyMCE() {
	wp_enqueue_script( 'common' );
	wp_enqueue_script( 'jquery-color' );
	if (function_exists('add_thickbox')) add_thickbox();
	wp_print_scripts('media-upload');
	if (function_exists('wp_tiny_mce')) wp_tiny_mce();
	wp_admin_css();
	wp_enqueue_script('utils');
	wp_print_scripts('editor');
	do_action('admin_print_styles-post-php');
	do_action('admin_print_styles');
	
	} 
}

if($_REQUEST['page']=="general") {
	wp_enqueue_script( 'jquery');
	if (function_exists('add_thickbox')) add_thickbox();
	wp_admin_css();
}


if($_REQUEST['page']=="gallery_slidesets") {

	if (function_exists('add_thickbox')) add_thickbox();
	wp_admin_css();

	
	function save_gallery_data() {
	
		if ( $_POST['upgrade'] ) {
          $get_slideset_num = maybe_unserialize(get_option('slideset_number'));
          $get_gallery_data = maybe_unserialize(get_option('slideset_data')); 
		  
		  for($i = 0; $i < $get_slideset_num; $i++) {
		  		 foreach ($get_gallery_data as $key => $value) {
    				if($key=="slideset_id".$i."_id") {
    					$options_gallery_ids .= $value.",";	
						$slide_set_id = $value;
    				}
					if ( preg_match("/slideset_id".$i."/", $key) ) {
        				$find = "/slideset_id".$i."/";
						$replace = "slideset_id"; 
         				$key = preg_replace ($find, $replace, $key); 						
						$options_gallery_slidesets[$key] = $value;					
					
					}		 
				 }
                
        			update_option( 'slideset_data_'.$slide_set_id, $options_gallery_slidesets);
        			$options_gallery_slidesets="";
		  		}
				
				update_option( 'slideset_data_ids', $options_gallery_ids );
				update_option('slideset_data_update','yes');
		}			


	
		if ( $_POST['save'] ) {
		

			if(isset($_POST['filter_categories'])) {
			$filter_categories = $_POST['filter_categories'];
			delete_option( 'filter_categories');
			update_option( 'filter_categories', $filter_categories);

			}
		
			foreach ($_POST as $key => $value) {
					if ( preg_match("/slideset_id/", $key) ) {
						$options_gallery_slidesets[$key] = $value;
    				if($key=="slideset_id_dbid") {
						$slide_set_dbid = $value;
    				}						
    				if($key=="slideset_id_id") {
						$slide_set_id = $value;
    				}		
				}
			}
			
			if($slide_set_dbid) { delete_option( 'slideset_data_'.$slide_set_dbid, $options_gallery_slidesets); } // remove previous data 
			update_option( 'slideset_data_'.$slide_set_id, $options_gallery_slidesets);
			
			$slideset_data_ids = maybe_unserialize(get_option('slideset_data_ids'));
			
					if($slide_set_dbid) {
					$slideset_data_ids = str_replace($slide_set_dbid.",", $slide_set_id.",", $slideset_data_ids);
					$slideset_data_ids = str_replace(",,", ",", $slideset_data_ids);
					} else {
					$slideset_data_ids = str_replace($slide_set_id.",", "", $slideset_data_ids);
					$slideset_data_ids=$slideset_data_ids.$slide_set_id.",";
					$slideset_data_ids = str_replace(",,", ",", $slideset_data_ids);
					}
					
					delete_option('slideset_data_ids');
					update_option( 'slideset_data_ids', $slideset_data_ids );				 

   			}

		if ( $_POST['delete'] ) {
		   	$slideset_id_dbid = $_POST['slideset_id_dbid'];
			
			if($slideset_id_dbid) { delete_option( 'slideset_data_'.$slideset_id_dbid, $options_gallery_slidesets); } // remove previous data 
			
			$slideset_data_ids = maybe_unserialize(get_option('slideset_data_ids'));
			
					if($slideset_id_dbid) {
					$slideset_data_ids = str_replace($slideset_id_dbid.",", "", $slideset_data_ids);
					$slideset_data_ids = str_replace(",,", ",", $slideset_data_ids);
					}
					
					
					delete_option('slideset_data_ids');
					update_option( 'slideset_data_ids', $slideset_data_ids );

   			}
	
}
	add_action('admin_menu', 'save_gallery_data');
	
}

add_action( 'admin_print_scripts', 'load_scripts' );

function load_scripts() {
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script( 'cwzadmin', get_bloginfo('template_directory').'/lib/adm/js/DYN_admin.js' );
	wp_enqueue_script( 'tablednd', get_bloginfo('template_directory').'/lib/adm/js/jquery.tablednd.js' );
	wp_enqueue_script( 'cwzcolor', get_bloginfo('template_directory').'/lib/adm/js/colorpicker.js' );
}

function load_main() {
	require CWZ_FILES .'/adm/inc/main.php';
}

function load_options() {
	require CWZ_FILES .'/adm/inc/general-options.php';
}

function load_blogoptions() {
	require CWZ_FILES .'/adm/inc/blog-options.php';
}

function load_droppanel() {
	require CWZ_FILES .'/adm/inc/droppanel-options.php';
}

function load_footer() {
	require CWZ_FILES .'/adm/inc/footer-options.php';
}

function load_gallery_slidesets() {
	require CWZ_FILES .'/adm/inc/gallery-creator.php';
}


?>