<div class="formelement">
			<div class="title">
			<?php if($value['desc']!=''):?><a href="#" class="help" title="<?php echo $value['desc']; ?>"></a> <?php endif; ?>
			<?php echo $value['name']; ?>
			</div>
			
			<div class="item">
						
						<div class="select-wrap">
						<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" class="select">
									<option <?php if ( get_option( $value['id'] ) == 0) { echo ' selected="selected"'; } ?> value="0">Please Select</option>
									<?php foreach ($value['options'] as $op_val=>$option) { ?>
									<option<?php if ( get_option( $value['id'] ) == $op_val) { echo ' selected="selected"'; } elseif ($op_val == $value['std']) { echo ' selected="selected"'; } ?> value="<?php echo $op_val; ?>"><?php echo $option; ?></option>
									<?php } ?>
						</select>
						</div>
			</div>
</div>
