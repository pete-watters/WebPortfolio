<div class="formelement">
			<div class="title">
			<?php if($value['desc']!=''):?><a href="#" class="help" title="<?php echo $value['desc']; ?>"></a> <?php endif; ?>
			<?php echo $value['name']; ?></div>
		
			<script type="text/javascript"> 
									  jQuery(document).ready(function($) {  
										 
										 $('#<?php echo $value['id']; ?>').ColorPicker({
											onSubmit: function(hsb, hex, rgb) {
												$(el).val(hex);
												$(el).ColorPickerHide();
											},
											
											onBeforeShow: function () {
												$(this).ColorPickerSetColor(this.value);
												return false;
											},
											
											onChange: function (hsb, hex, rgb) {
												$('#aw<?php echo $value['id']; ?> div').css({'backgroundColor':'#'+hex, 'backgroundImage': 'none', 'borderColor':'#'+hex});
												$('#aw<?php echo $value['id']; ?>').prev('input').attr('value', '#'+hex);
											}
										 })	
											 .bind('keyup', function(){
												$(this).ColorPickerSetColor(this.value);
											 });
									  	});
									  </script>
			<?php $cpvalue = $value['id'];?>
			<div class="item cp">
						
						<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo get_option($value['id']);?>" class="inputColorpicker"/>
						<div class="colorSelector" id="aw<?php echo $value['id']; ?>">
									<div style="background-color:<?php echo get_option($cpvalue);?>"></div>
						</div>
			</div>
</div>
