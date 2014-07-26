<?php 
/* Meta Config 
** Build Page & Post option forms.
*/

if ( $meta_box[ 'type' ]=="text") { 
	if($meta_box[ 'opentag' ]) {echo $meta_box[ 'opentag' ];} ?>
        <div class="page-options <?php if($meta_box[ 'size' ]) { echo $meta_box[ 'size' ]; } ?>">
            <p><?php echo $meta_box[ 'description' ]; ?></p>
        </div><div class="clear"></div>
    <?php if($meta_box[ 'closetag' ]) {echo $meta_box[ 'closetag' ];} 

} elseif ( $meta_box[ 'type' ]=="field") { 
	if($meta_box['opentag']) {echo $meta_box[ 'opentag' ];} ?>
        <div class="page-options <?php if($meta_box[ 'size' ]) { echo $meta_box[ 'size' ]; } ?>">
            <label for="<?php echo $meta_box[ 'name' ]; ?>"><?php echo $meta_box[ 'title' ]; ?></label>
            <input type="text" <?php if($meta_box[ 'class' ]) { ?> class="<?php echo $meta_box[ 'class' ]; ?>" <?php } ?> name="<?php echo $meta_box[ 'name' ]; ?>"  id="<?php echo $meta_box[ 'name' ]; ?>" value="<?php echo htmlspecialchars($data[$meta_box['name']]); ?>" /> <?php if($meta_box[ 'extras' ]) { echo $meta_box[ 'extras' ]; } ?>
            <p><?php echo $meta_box['description']; ?></p>
        </div>
    <?php if($meta_box[ 'closetag' ]) {echo $meta_box[ 'closetag' ];} 
	
} elseif ( $meta_box[ 'type' ]=="hidden") { 
	if($meta_box['opentag']) {echo $meta_box[ 'opentag' ];} ?>
            <input type="hidden" <?php if($meta_box[ 'class' ]) { ?> class="<?php echo $meta_box[ 'class' ]; ?>" <?php } ?> name="<?php echo $meta_box[ 'name' ]; ?>"  id="<?php echo $meta_box[ 'name' ]; ?>" value="<?php echo htmlspecialchars($data[$meta_box['name']]); ?>" /> <?php if($meta_box[ 'extras' ]) { echo $meta_box[ 'extras' ]; } ?>
            <p><?php echo $meta_box['description']; ?></p>
            
            <?php if($meta_box[ 'id' ]=="slideset") { ?>
            	<div class="clear"></div>
				<ul id="catselect">
					<?php
					if(htmlspecialchars($data[$meta_box['name']])) {
						$selected_cats = explode(",", htmlspecialchars($data[$meta_box['name']]));
							
						if(is_array($selected_cats)) {
							foreach ($selected_cats as $selected_cat) { ?>
								<li class="button-secondary" title="<?php echo $selected_cat; ?>"><span class="cat-remove"></span><?php echo $selected_cat; ?></li>
							<?php }
						} else { ?>
								<li class="button-secondary" title="<?php echo $selected_cats; ?>"><span class="cat-remove"></span><?php echo $selected_cats; ?></li>
							<?php }							
					  } ?>
                      </ul>				
			<?php }
    if($meta_box[ 'closetag' ]) {echo $meta_box[ 'closetag' ];} 

} elseif ( $meta_box[ 'type' ]=="chkbox") { 
	if($meta_box[ 'opentag' ]) {echo $meta_box[ 'opentag' ];} 
		if( $meta_box[ 'array' ] ) {
			if($meta_box['array']=="cats") { 
			
                  $categories=get_categories(); 

					foreach ($categories as $cat) {

                    $option = '<input type="checkbox" name="'. $meta_box[ 'name' ] .'[]" '; 
					
					if (is_array($data[$meta_box[ 'name' ]])) {
					foreach ($data[$meta_box['name']] as $cats) {					
					if($cats==$cat->term_id) {
					$option .= 'checked="checked"'; 
					} elseif($cats==$cat->cat_name) {
					$option .= 'checked="checked"'; 
					}
					}
					} else {
					if($data[$meta_box['name']]==$cat->term_id) {
					$option .= 'checked="checked"'; 
					} elseif ($data[$meta_box['name']]==$cat->cat_name) {
					$option .= 'checked="checked"'; 
					}
					}				
					$option .= ' value="'. htmlspecialchars($cat->term_id) .'">';
                    $option .= '<small class="description">'.$cat->cat_name;
                    $option .= ' ('.$cat->category_count.') </small><br />';
                    echo $option;
                  }
				  
			} elseif($meta_box[ 'array']=="archivecats") {
				
                  $categories=  get_categories(); 

					foreach ($categories as $cat) {

                    $option = '<input type="checkbox" name="'. $meta_box[ 'name' ] .'[]" '; 
					
					if (is_array($data[ $meta_box[ 'name' ]])) {
					foreach ($data[ $meta_box[ 'name' ]] as $cats) {					
					if($cats==$cat->term_id) {
					$option .= 'checked="checked"'; 
					}
					}
					} else {
					if($data[ $meta_box[ 'name' ]]==$cat->term_id) {
					$option .= 'checked="checked"'; 
					}
					}				
					$option .= ' value="'.$cat->term_id.'">';
                    $option .= '<small class="description">'.$cat->cat_name;
                    $option .= ' ('.$cat->category_count.') </small>';
                    echo $option;
                  }
			} 
			
			if($meta_box[ 'closetag' ]) {echo $meta_box[ 'closetag' ];}  
		
		} else { ?>

<div class="page-options <?php if($meta_box[ 'size' ]) { echo $meta_box[ 'size' ]; } ?>">
<label for="<?php echo $meta_box[ 'name' ]; ?>"><?php echo $meta_box[ 'title' ]; ?></label>
<input type="checkbox" name="<?php echo $meta_box[ 'name' ]; ?>" <?php if($data[ $meta_box[ 'name' ] ]=="yes") {?> checked="checked"  <?php } ?> value="yes" />
<?php echo $meta_box[ 'description' ]; ?>
</div>
<?php if($meta_box[ 'closetag' ]) {echo $meta_box[ 'closetag' ];} ?>
<?php } }

elseif ( $meta_box[ 'type' ]=="radio") { ?>
	<?php if($meta_box[ 'opentag' ]) {echo $meta_box[ 'opentag' ];} ?>
    <?php if($meta_box[ 'maintitle' ]) {echo '<label>'.$meta_box[ 'maintitle' ].'</label>';} ?>
    <div class="page-options <?php if($meta_box[ 'size' ]) { echo $meta_box[ 'size' ]; } ?>">
        <label for="<?php echo $meta_box[ 'name' ]; ?>"><?php echo $meta_box[ 'title' ]; ?></label>
        <p><input type="radio" name="<?php echo $meta_box[ 'name' ]; ?>" <?php if($data[ $meta_box[ 'name' ] ]==$meta_box[ 'id' ]) {?> checked="checked"  <?php } ?> value="<?php echo $meta_box[ 'id' ]; ?>" />
        <?php if($meta_box[ 'image' ]) { ?><img src="<?php bloginfo('template_url'); ?>/lib/adm/imgs/<?php echo $meta_box[ 'image' ]; ?>" alt="<?php echo $meta_box[ 'name' ]; ?>" /><?php } ?><?php echo $meta_box[ 'description' ]; ?></p>
    </div>
    <?php if($meta_box[ 'closetag' ]) {echo $meta_box[ 'closetag' ];} ?>
<?php }

elseif ( $meta_box[ 'type' ]=="clear") { ?>
    <div class="clear"></div>
<?php }

elseif ( $meta_box[ 'type' ]=="menu") { ?>
<?php if($meta_box[ 'opentag' ]) {echo $meta_box[ 'opentag' ];} ?>
    <div class="page-options <?php if($meta_box[ 'size' ]) { echo $meta_box[ 'size' ]; } ?>">
        <label for="<?php echo $meta_box[ 'name' ]; ?>"><?php echo $meta_box[ 'title' ]; ?></label>
        <select name="<?php echo $meta_box[ 'name' ]; ?>" id="<?php echo $meta_box[ 'name' ]; ?>" <?php if($meta_box[ 'list' ]) { ?> size="<?php echo $meta_box[ 'list' ]; ?>" multiple="multiple" style="height:70px" <?php } ?>>

		<?php
		
		if($meta_box[ 'id' ]=="columns") { ?>
					<option value="">Select Sidebar</option>
		<?php $i=1;
			while($i<=$num_sidebars)
				{ ?>
					<option value="Sidebar<?php echo $i; ?>" <?php if($data[ $meta_box[ 'name' ] ]=="Sidebar".$i) {?> selected="selected" <?php } ?> >Sidebar<?php echo $i; ?></option>
				<?php $i++;
				}
		
		} elseif($meta_box[ 'id' ]=="twitter") { ?>
        
				<option value="none">Disabled</option>
                <option value="pagetop" <?php if($data[ $meta_box[ 'name' ] ]=="pagetop") { ?> selected="selected" <?php } ?>>Above Page Content</option>
                <option value="pagebot" <?php if($data[ $meta_box[ 'name' ] ]=="pagebot") { ?> selected="selected" <?php } ?>>Below Page Content</option>

		
		<?php 
		
		} elseif($meta_box[ 'id' ]=="outskin") { ?>
        
                <option <?php if($data[ $meta_box[ 'name' ] ]=="") {?> selected="selected" <?php } ?> value="">Default</option>
                <option <?php if($data[ $meta_box[ 'name' ] ]=="one") {?> selected="selected" <?php } ?> value="one">Light Grey</option>
                <option <?php if($data[ $meta_box[ 'name' ] ]=="two") {?> selected="selected" <?php } ?> value="two">Dark Blue</option>
                <option <?php if($data[ $meta_box[ 'name' ] ]=="three") {?> selected="selected" <?php } ?> value="three">Blue</option>
                <option <?php if($data[ $meta_box[ 'name' ] ]=="four") {?> selected="selected" <?php } ?> value="four">Teal</option>
                <option <?php if($data[ $meta_box[ 'name' ] ]=="five") {?> selected="selected" <?php } ?> value="five">Green</option> 
                <option <?php if($data[ $meta_box[ 'name' ] ]=="six") {?> selected="selected" <?php } ?> value="six">Mustard</option>   
                <option <?php if($data[ $meta_box[ 'name' ] ]=="seven") {?> selected="selected" <?php } ?> value="seven">Orange</option>           
                <option <?php if($data[ $meta_box[ 'name' ] ]=="eight") {?> selected="selected" <?php } ?> value="eight">Red</option>   
                <option <?php if($data[ $meta_box[ 'name' ] ]=="nine") {?> selected="selected" <?php } ?> value="nine">Pink</option>  
                <option <?php if($data[ $meta_box[ 'name' ] ]=="ten") {?> selected="selected" <?php } ?> value="ten">Dark Grey</option>   
                <option <?php if($data[ $meta_box[ 'name' ] ]=="eleven") {?> selected="selected" <?php } ?> value="eleven">Urban</option> 
                <option <?php if($data[ $meta_box[ 'name' ] ]=="twelve") {?> selected="selected" <?php } ?> value="twelve">Carbon</option> 
                <option <?php if($data[ $meta_box[ 'name' ] ]=="thirteen") {?> selected="selected" <?php } ?> value="thirteen">Wood</option>                 
                <option <?php if($data[ $meta_box[ 'name' ] ]=="fourteen") {?> selected="selected" <?php } ?> value="fourteen">Grunge</option>  
                <option <?php if($data[ $meta_box[ 'name' ] ]=="fithteen") {?> selected="selected" <?php } ?> value="fithteen">Bokeh</option>   
                <option <?php if($data[ $meta_box[ 'name' ] ]=="sixteen") {?> selected="selected" <?php } ?> value="sixteen">Dark Teal</option>  
                <option <?php if($data[ $meta_box[ 'name' ] ]=="seventeen") {?> selected="selected" <?php } ?> value="seventeen">Dark Green</option>   
                <option <?php if($data[ $meta_box[ 'name' ] ]=="eighteen") {?> selected="selected" <?php } ?> value="eighteen">Dark Pink</option>
                <option <?php if($data[ $meta_box[ 'name' ] ]=="nineteen") {?> selected="selected" <?php } ?> value="nineteen">Dark Red</option>
                <option <?php if($data[ $meta_box[ 'name' ] ]=="twenty") {?> selected="selected" <?php } ?> value="twenty">Dark Brown</option>  
                <option <?php if($data[ $meta_box[ 'name' ] ]=="custom") {?> selected="selected" <?php } ?> value="custom">Custom</option>         
		
		<?php 
		
		} elseif($meta_box[ 'id' ]=="inskin") { ?>

                <option <?php if($data[ $meta_box[ 'name' ] ]=="") {?> selected="selected" <?php } ?> value="">Default</option>        
                <option <?php if($data[ $meta_box[ 'name' ] ]=="one") {?> selected="selected" <?php } ?> value="one">Light</option>
                <option <?php if($data[ $meta_box[ 'name' ] ]=="two") {?> selected="selected" <?php } ?> value="two">Dark</option>

		
		<?php 
		
		} elseif ($meta_box[ 'id' ]=="gallerycat") { ?>
        

                 <?php 
                  $categories=  get_categories(); 
                  foreach ($categories as $cat) {
				  	if($data[ $meta_box[ 'name' ] ]==$cat->category_nicename) {
                    $option = '<option selected="selected" value="'.$cat->category_nicename.'">';
					} else {
					$option = '<option value="'.$cat->category_nicename.'">';
					}
                    $option .= $cat->cat_name;
                    $option .= ' ('.$cat->category_count.')';
                    $option .= '</option>';
                    echo $option;
                  }
               
		} elseif($meta_box[ 'id' ]=="stagegallery") { ?>
        
				<option value="image" <?php if($data[ $meta_box[ 'name' ] ]=="image") { ?> selected="selected" <?php } ?>>Image Only (Default) </option>
                <option value="textimageleft" <?php if($data[ $meta_box[ 'name' ] ]=="textimageleft") { ?> selected="selected" <?php } ?>>Text &amp; Image (Left Align) </option>
                <option value="textimageright" <?php if($data[ $meta_box[ 'name' ] ]=="textimageright") { ?> selected="selected" <?php } ?>>Text &amp; Image (Right Align) </option>
				<option value="titleoverlay" <?php if($data[ $meta_box[ 'name' ] ]=="titleoverlay") { ?> selected="selected" <?php } ?>>Title Overlay</option>
                <option value="titletextoverlay" <?php if($data[ $meta_box[ 'name' ] ]=="titletextoverlay") { ?> selected="selected" <?php } ?>>Title / Text Overlay</option>
                <option value="textonly" <?php if($data[ $meta_box[ 'name' ] ]=="textonly") { ?> selected="selected" <?php } ?>>Text Only </option>
		<?php 
		
		} elseif($meta_box[ 'id' ]=="imageeffect") { ?>
        
				<option value="none" <?php if($data[ $meta_box[ 'name' ] ]=="none") { ?> selected="selected" <?php } ?>>No Effect </option>
                <option value="shadow" <?php if($data[ $meta_box[ 'name' ] ]=="shadow") { ?> selected="selected" <?php } ?>>Drop Shadow </option>
                <option value="reflection" <?php if($data[ $meta_box[ 'name' ] ]=="reflection") { ?> selected="selected" <?php } ?>>Reflection </option>
                <option value="shadowreflection" <?php if($data[ $meta_box[ 'name' ] ]=="shadowreflection") { ?> selected="selected" <?php } ?>>Shadow &amp; Reflection</option>

		
		<?php 
		} elseif($meta_box[ 'id' ]=="slidesetselect") {
        
        $slideset_data_ids  = substr(maybe_unserialize(get_option('slideset_data_ids')), 0, -1);  // trim last comma
        $slideset_data_ids = explode(",", $slideset_data_ids);
			
            if(!$slideset_data_ids) {?>
					<option value="">No Slide Sets</option>            	
            <?php } else {?>
                    <option value="">Select Slide Set</option>
					<?php

					if($slideset_data_ids) {
						
                 		if(is_array($slideset_data_ids)) {
    						foreach ($slideset_data_ids as $slideset_data_ids) {
                                  echo"<option value='". $slideset_data_ids ."'>". $slideset_data_ids ."</option>";

    						}
                 		} else {
    							  echo"<option value='". $slideset_data_ids ."'>". $slideset_data_ids ."</option>";
                 		}	
               		}	
				
					
					}
				
		?>

		
		<?php 
		} elseif($meta_box[ 'id' ]=="groupgridcontent") { ?>
        
				<option value="textimage" <?php if($data[ $meta_box[ 'name' ] ]=="textimage") { ?> selected="selected" <?php } ?>>Text &amp; Image </option>        
				<option value="titleimage" <?php if($data[ $meta_box[ 'name' ] ]=="titleimage") { ?> selected="selected" <?php } ?>>Title &amp; Image </option>
                <option value="titleoverlay" <?php if($data[ $meta_box[ 'name' ] ]=="titleoverlay") { ?> selected="selected" <?php } ?>>Title Overlay Image </option>
                <option value="titletextoverlay" <?php if($data[ $meta_box[ 'name' ] ]=="titletextoverlay") { ?> selected="selected" <?php } ?>>Title &amp; Text Overlay Image </option>
				<option value="image" <?php if($data[ $meta_box[ 'name' ] ]=="image") { ?> selected="selected" <?php } ?>>Image Only </option>
				<option value="text" <?php if($data[ $meta_box[ 'name' ] ]=="text") { ?> selected="selected" <?php } ?>>Text Only </option>                
		
		<?php 

				
		
		} elseif($meta_box[ 'id' ]=="accordiontitles") { ?>
        
				<option value="" <?php if($data[ $meta_box[ 'name' ] ]=="") { ?> selected="selected" <?php } ?>>Enabled </option>        
				<option value="disabled" <?php if($data[ $meta_box[ 'name' ] ]=="disabled") { ?> selected="selected" <?php } ?>>Disabled </option>           
		
		<?php 

				
		
		} elseif($meta_box[ 'id' ]=="accordionautoplay") { ?>
        
				<option value="" <?php if($data[ $meta_box[ 'name' ] ]=="") { ?> selected="selected" <?php } ?>>Disabled </option>        
				<option value="enabled" <?php if($data[ $meta_box[ 'name' ] ]=="enabled") { ?> selected="selected" <?php } ?>>Enabled </option>           
		
		<?php 

				
		
		} elseif($meta_box[ 'id' ]=="groupsliderpos") { ?>
        
				<option value="above" <?php if($data[ $meta_box[ 'name' ] ]=="above") { ?> selected="selected" <?php } ?>>Above Page Content </option>        
				<option value="below" <?php if($data[ $meta_box[ 'name' ] ]=="below") { ?> selected="selected" <?php } ?>>Below Page Content </option>
		
		<?php 

		} elseif($meta_box[ 'id' ]=="gridcolumns") { ?>
        
				<option value="" <?php if($data[ $meta_box[ 'name' ] ]=="") { ?> selected="selected" <?php } ?>>3 Columns </option>        
				<option value="4" <?php if($data[ $meta_box[ 'name' ] ]=="4") { ?> selected="selected" <?php } ?>>4 Columns </option>
				<option value="5" <?php if($data[ $meta_box[ 'name' ] ]=="5") { ?> selected="selected" <?php } ?>>5 Columns </option>
				<option value="6" <?php if($data[ $meta_box[ 'name' ] ]=="6") { ?> selected="selected" <?php } ?>>6 Columns </option>
                <option value="7" <?php if($data[ $meta_box[ 'name' ] ]=="7") { ?> selected="selected" <?php } ?>>7 Columns </option>
		<?php 
		
		} elseif($meta_box[ 'id' ]=="gridgallery") { ?>

				<option value="textimage" <?php if($data[ $meta_box[ 'name' ] ]=="textimage") { ?> selected="selected" <?php } ?>>Text &amp; Image (Default) </option>        
				<option value="image" <?php if($data[ $meta_box[ 'name' ] ]=="image") { ?> selected="selected" <?php } ?>>Image Only </option>
                <option value="text" <?php if($data[ $meta_box[ 'name' ] ]=="text") { ?> selected="selected" <?php } ?>>Text Only </option>

		
		<?php 
		
		} elseif($meta_box[ 'id' ]=="imgzoomcrop") { ?>

				<option value="crop" <?php if($data[ $meta_box[ 'name' ] ]=="crop") { ?> selected="selected" <?php } ?>>Crop Image</option>        
				<option value="zoom" <?php if($data[ $meta_box[ 'name' ] ]=="zoom") { ?> selected="selected" <?php } ?>>Zoom Image</option>	
				<option value="zoom crop" <?php if($data[ $meta_box[ 'name' ] ]=="zoom crop") { ?> selected="selected" <?php } ?>>Zoom &amp; Crop Image</option>			
		<?php 
		
		} elseif($meta_box[ 'id' ]=="videotype") { ?>

				<option value="" <?php if($data[ $meta_box[ 'name' ] ]=="") { ?> selected="selected" <?php } ?>>Disabled</option>        
				<option value="vimeo" <?php if($data[ $meta_box[ 'name' ] ]=="vimeo") { ?> selected="selected" <?php } ?>>Vimeo</option>		
				<option value="youtube" <?php if($data[ $meta_box[ 'name' ] ]=="youtube") { ?> selected="selected" <?php } ?>>YouTube</option>  
                <option value="swf" <?php if($data[ $meta_box[ 'name' ] ]=="swf") { ?> selected="selected" <?php } ?>>SWF</option>        
				<option value="3dvid" <?php if($data[ $meta_box[ 'name' ] ]=="3dvid") { ?> selected="selected" <?php } ?>>Video (3d Gallery Only)</option>
				<option value="jwp" <?php if($data[ $meta_box[ 'name' ] ]=="jwp") { ?> selected="selected" <?php } ?>>JW Player</option>  	  	
		<?php 

		} elseif($meta_box[ 'id' ]=="postshowimage") { ?>

				<option value="" <?php if($data[ $meta_box[ 'name' ] ]=="") { ?> selected="selected" <?php } ?>>Default</option>        
				<option value="single" <?php if($data[ $meta_box[ 'name' ] ]=="single") { ?> selected="selected" <?php } ?>>Single Post</option>
                <option value="archive" <?php if($data[ $meta_box[ 'name' ] ]=="archive") { ?> selected="selected" <?php } ?>>Archive Pages</option>		
                <option value="singlearchive" <?php if($data[ $meta_box[ 'name' ] ]=="singlearchive") { ?> selected="selected" <?php } ?>>Post &amp; Archive</option>		                	
		<?php 
			
		} elseif($meta_box[ 'id' ]=="imgorientation") { ?>

				<option value="landscape" <?php if($data[ $meta_box[ 'name' ] ]=="landscape") { ?> selected="selected" <?php } ?>>Landscape</option>        
				<option value="portrait" <?php if($data[ $meta_box[ 'name' ] ]=="portrait") { ?> selected="selected" <?php } ?>>Portrait</option>		
		<?php 
		
		} elseif($meta_box[ 'id' ]=="displaytitle") { ?>
        
		<option value="disabled" <?php if($data[ $meta_box[ 'name' ] ]=="disabled") { ?> selected="selected" <?php } ?>>Disabled</option>
        <option value="center left light" <?php if($data[ $meta_box[ 'name' ] ]=="center left light") { ?> selected="selected" <?php } ?>>Center Left Light Text </option>
        <option value="center right light" <?php if($data[ $meta_box[ 'name' ] ]=="center right light") { ?> selected="selected" <?php } ?>>Center Right Light Text </option>
		<option value="center middle light" <?php if($data[ $meta_box[ 'name' ] ]=="center middle light") { ?> selected="selected" <?php } ?>>Center Middle Light Text </option>                
        <option value="center left dark" <?php if($data[ $meta_box[ 'name' ] ]=="center left dark") { ?> selected="selected" <?php } ?>>Center Left Dark Text </option>
        <option value="center right dark" <?php if($data[ $meta_box[ 'name' ] ]=="center right dark") { ?> selected="selected" <?php } ?>>Center Right Dark Text </option>
        <option value="center middle dark" <?php if($data[ $meta_box[ 'name' ] ]=="center middle dark") { ?> selected="selected" <?php } ?>>Center Middle Dark Text </option>                	

		<option value="top left light" <?php if($data[ $meta_box[ 'name' ] ]=="top left light") { ?> selected="selected" <?php } ?>>Top Left Light Text </option>
		<option value="top right light" <?php if($data[ $meta_box[ 'name' ] ]=="top right light") { ?> selected="selected" <?php } ?>>Top Right Light Text </option>
		<option value="top middle light" <?php if($data[ $meta_box[ 'name' ] ]=="top middle light") { ?> selected="selected" <?php } ?>>Top Middle Light Text </option>        
		<option value="top left dark" <?php if($data[ $meta_box[ 'name' ] ]=="top left dark") { ?> selected="selected" <?php } ?>>Top Left Dark Text </option>
		<option value="top right dark" <?php if($data[ $meta_box[ 'name' ] ]=="top right dark") { ?> selected="selected" <?php } ?>>Top Right Dark Text </option>	
 		<option value="top middle dark" <?php if($data[ $meta_box[ 'name' ] ]=="top middle dark") { ?> selected="selected" <?php } ?>>Top Middle Dark Text </option>	
        
		<option value="bottom left light" <?php if($data[ $meta_box[ 'name' ] ]=="bottom left light") { ?> selected="selected" <?php } ?>>Bottom Left Light Text </option>
		<option value="bottom right light" <?php if($data[ $meta_box[ 'name' ] ]=="bottom right light") { ?> selected="selected" <?php } ?>>Bottom Right Light Text </option>
		<option value="bottom middle light" <?php if($data[ $meta_box[ 'name' ] ]=="bottom middle light") { ?> selected="selected" <?php } ?>>Bottom Middle Light Text </option>        
		<option value="bottom left dark" <?php if($data[ $meta_box[ 'name' ] ]=="bottom left dark") { ?> selected="selected" <?php } ?>>Bottom Left Dark Text </option>
		<option value="bottom right dark" <?php if($data[ $meta_box[ 'name' ] ]=="bottom right dark") { ?> selected="selected" <?php } ?>>Bottom Right Dark Text </option>
		<option value="bottom middle dark" <?php if($data[ $meta_box[ 'name' ] ]=="bottom middle dark") { ?> selected="selected" <?php } ?>>Bottom Middle Dark Text </option>        
                	           	
		<?php 
		
		} elseif($meta_box[ 'id' ]=="gallerysortby") { ?>
				<option value="" <?php if($data[ $meta_box[ 'name' ] ]=="") { ?> selected="selected" <?php } ?>>Post Order (Default)</option>
  				<option value="date" <?php if($data[ $meta_box[ 'name' ] ]=="date") { ?> selected="selected" <?php } ?>>Date</option>
                <option value="rand" <?php if($data[ $meta_box[ 'name' ] ]=="rand") { ?> selected="selected" <?php } ?>>Random</option>	
                <option value="title" <?php if($data[ $meta_box[ 'name' ] ]=="title") { ?> selected="selected" <?php } ?>>Title</option>		
		<?php 
		
		} elseif($meta_box[ 'id' ]=="galleryorderby") { ?>
				<option value="" <?php if($data[ $meta_box[ 'name' ] ]=="") { ?> selected="selected" <?php } ?>>Ascending (Default)</option>
  				<option value="DESC" <?php if($data[ $meta_box[ 'name' ] ]=="DESC") { ?> selected="selected" <?php } ?>>Descending</option>		
		<?php 
		
		} elseif($meta_box[ 'id' ]=="stageplaypause") { ?>
				<option value="" <?php if($data[ $meta_box[ 'name' ] ]=="") { ?> selected="selected" <?php } ?>>Bullet Nav</option>
  				<option value="enabled" <?php if($data[ $meta_box[ 'name' ] ]=="enabled") { ?> selected="selected" <?php } ?>>Bullet Nav + Play/Pause Nav</option>
				<option value="disabled" <?php if($data[ $meta_box[ 'name' ] ]=="disabled") { ?> selected="selected" <?php } ?>>Disable All Nav</option>			
		<?php 
		
		} elseif($meta_box[ 'id' ]=="gallery3dtween") { ?>
		  		<option value="" <?php if($data[ $meta_box[ 'name' ] ]=="") { ?> selected="selected" <?php } ?>>Default</option>
		<?php  $tween_types = array("linear","easeInSine","easeOutSine", "easeInOutSine", "easeInCubic", "easeOutCubic", "easeInOutCubic", "easeOutInCubic", "easeInQuint", "easeOutQuint", "easeInOutQuint", "easeOutInQuint", "easeInCirc", "easeOutCirc", "easeInOutCirc", "easeOutInCirc", "easeInBack", "easeOutBack", "easeInOutBack", "easeOutInBack", "easeInQuad", "easeOutQuad", "easeInOutQuad", "easeOutInQuad", "easeInQuart", "easeOutQuart", "easeInOutQuart", "easeOutInQuart", "easeInExpo", "easeOutExpo", "easeInOutExpo", "easeOutInExpo", "easeInElastic", "easeOutElastic", "easeInOutElastic", "easeOutInElastic", "easeInBounce", "easeOutBounce", "easeInOutBounce", "easeOutInBounce");
		 
                  foreach ($tween_types as $tween_type) {
				  	if($data[$meta_box[ 'name' ]]==$tween_type) {
                    $option = '<option selected="selected" value="'.$tween_type.'">';
					} else {
					$option = '<option value="'.$tween_type.'">';
					}
                    $option .= $tween_type;
                    $option .= '</option>';
                    echo $option;
                  }
					
		}?>		        		

        </select>

    <p><?php echo $meta_box[ 'description' ]; ?></p>
</div>
<?php if($meta_box[ 'closetag' ]) {echo $meta_box[ 'closetag' ];} ?>
<?php } ?>
