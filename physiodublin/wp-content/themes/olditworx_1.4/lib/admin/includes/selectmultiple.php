<div class="formelement">
			<div class="title">
			<?php if($value['desc']!=''):?><a href="#" class="help" title="<?php echo $value['desc']; ?>"></a> <?php endif; ?>
			<?php echo $value['name']; ?>
			</div>
			<div class="select-multiple-wrap  ">
						
							<select  size="1"  multiple name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" class="select-multiple">

			<?php foreach ($value['options'] as $op_val=>$option) { ?><option <?php  if (get_option($value['id']) != "" ) {$bol=split(',',get_option($value['id']));foreach ($bol as $ddd){if ($ddd == $op_val && $ddd != 0) { echo ' selected="selected"';}}}?>  value="<?php echo $op_val; ?>"><?php echo $option; ?></option><?php } ?></select>
						
						
						
					
			</div>
</div>


