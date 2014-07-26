<div class="formelement">
			<div class="title"><?php echo $value['name']; ?></div>
			<div class="desc"><?php echo $value['desc']; ?></div>
			<div class="item">
						<div class="select-wrap">
						<select multiple name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
									<option <?php if ( get_option( $value['id'] ) == 0) { echo ' selected="selected"'; } ?> value="0">Please Select</option>
									<?php foreach ($value['options'] as $op_val=>$option) { ?>
									<option<?php if ( get_option( $value['id'] ) == $op_val) { echo ' selected="selected"'; } elseif ($op_val == $value['std']) { echo ' selected="selected"'; } ?> value="<?php echo $op_val; ?>"><?php echo $option; ?></option>
									<?php } ?>
						</select>
						</div>
			</div>
</div>


