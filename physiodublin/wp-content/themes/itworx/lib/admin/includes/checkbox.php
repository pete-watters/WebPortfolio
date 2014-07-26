<div class="formelement">
			<div class="title"><?php echo $value['name']; ?></div>
			<div class="full checkbox-wrap"><input type="checkbox" id="<?php echo $value['id']; ?>" name="<?php echo $value['id']; ?>" value="true" 
			<?php if(get_settings($value['id'])) echo "checked"; ?> class="checkbox"/><label><?php echo $value['desc']; ?></label>
			</div>
</div>