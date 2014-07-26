<div class="formelement">
			<div class="title">
			<?php if($value['desc']!=''):?><a href="#" class="help" title="<?php echo $value['desc']; ?>"></a> <?php endif; ?>
			<?php echo $value['name']; ?></div>
			<div class="item" style="width:520px; clear:both; margin:0 0 8px 0;">

			
						
						<?php $int = $count;?>
						<input type="text" name="<?php echo $value['id']; ?>"  id="<?php echo $value['id']; ?>" value="<?php echo get_option($value['id']) ?>" class="input400"/>
						<input id="upload_<?php echo $value['id']; ?>" class="upload_button" name="<?php echo $value['id']; ?>" type="button" value="Upload image" rel="<?php echo $int; ?>" />
		
						
			</div>
</div>
