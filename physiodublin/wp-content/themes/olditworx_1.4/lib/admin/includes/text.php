<!-- Text 240px -->
<div class="formelement">
			<div class="title">
			<?php if($value['desc']!=''):?><a href="#" class="help" title="<?php echo $value['desc']; ?>"></a> <?php endif; ?>
			<?php echo $value['name']; ?></div>
			
			<div class="item">
			
						<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>"  class="input240" />
			</div>
			
</div>
<!-- / Text 240 -->
