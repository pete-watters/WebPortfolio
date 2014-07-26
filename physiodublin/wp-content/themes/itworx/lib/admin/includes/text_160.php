<!-- Text 160px -->
<div class="formelement">
			<div class="title"><?php echo $value['name']; ?></div>
			<div class="desc"><?php echo $value['desc']; ?></div>
			<div class="item">
						<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>"  class="input160" />
			</div>
</div>
<!-- / Text 160 -->
