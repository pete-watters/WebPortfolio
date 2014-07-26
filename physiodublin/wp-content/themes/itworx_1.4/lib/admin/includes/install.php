<div class="formelement">
			<div class="title">
						<?php if($value['desc']!=''):?><a href="#" class="help" title="<?php echo $value['desc']; ?>"></a> <?php endif; ?>
						<?php echo $value['name']; ?>:
						<?php if(get_option('calibra_theme_status')=='uninstalled'):?>
						<span style="color:#900;">Demo content is not installed</span>
						<?php elseif(get_option('calibra_theme_status')=='installed'):?>
						<span style="color:#900;">Demo content is installed</span>
						<?php endif;?>
			</div>
			
			
			<div class="item">
			
						<div class="select-wrap">
						<?php if(get_option('calibra_theme_status')=='installed'):?>
						<input type="button" name="<?php echo $value['id']; ?>"  onclick="<?php calibra_reset();?>" value="UNINSTALL DEMO CONTENT"  id="installbtn"/>
						<?php elseif(get_option('calibra_theme_status')=='uninstalled'):?>
						<input type="button" name="<?php echo $value['id']; ?>"  onclick="<?php calibra_setup();?>" value="INSTALL DEMO CONTENT" id="resetbtn"/>
						<?php endif;?>
						</div>
			</div>
</div>
