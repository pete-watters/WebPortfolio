<div class="formelement">
			<div class="title">
			<?php if($value['desc']!=''):?><a href="#" class="help" title="<?php echo $value['desc']; ?>"></a> <?php endif; ?>
			<?php echo $value['name']; ?>
			</div>
		
		
			<div class="item">
				<div class="select-wrap">
						<select multiple name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" class="select" title="Please Select">
									<?php 
			
						$secilen_sayfalar = split(',', get_settings($value['id']) );
						$toplam_secilen_sayfa = count($secilen_sayfalar);
						for ($i = 0; $i < $toplam_secilen_sayfa -1; $i++) {
							$sayfa =get_pages('include='.$secilen_sayfalar[$i].'');
			?>
									<option value="<?php echo $sayfa[0]->ID; ?>" selected><?php echo $sayfa[0]->post_title; ?></option>
									<?php } ?>
									<?php
			
			foreach ($value['options'] as $op_val=>$option) { ?>
									<?php  
					if (get_settings($value['id']) != "" ) {			
						$bol=split(',',get_settings($value['id']));
						foreach ($bol as $ddd){
								if ($ddd == $op_val && $ddd != 0) {  
									$atla=1;
								}
							}
					}?>
									<?php
						if (!$atla){
					?>
									<option   value="<?php echo $op_val; ?>" <?php echo $atla;?>>
									<?php
					}	
					$atla="";
					?>
									<?php echo $option; ?> </option>
									<?php } ?>
						</select>
						</div>
			</div>
</div>
