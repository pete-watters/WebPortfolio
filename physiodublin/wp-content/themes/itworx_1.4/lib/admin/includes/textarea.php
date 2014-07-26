<div class="formelement">
			<div class="title">
			<?php if($value['desc']!=''):?><a href="#" class="help" title="<?php echo $value['desc']; ?>"></a> <?php endif; ?>
			
			<?php echo $value['name']; ?></div>
			<div class="item"><textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"/><?php if ( get_option( $value['id'] ) != "") { echo (get_option( $value['id'] )); } else { echo $value['std']; } ?></textarea></div>
</div>
