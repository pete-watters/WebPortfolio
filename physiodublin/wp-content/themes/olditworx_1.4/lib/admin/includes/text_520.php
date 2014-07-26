<!-- Text 520px -->
<div class="formelement">
			<div class="title"><?php echo $value['name']; ?></div>
			<div class="full"><?php echo $value['desc']; ?></div>
			<div class="full">
						<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" class="input520" />
			</div>
</div>
<!-- / Text 520 -->
