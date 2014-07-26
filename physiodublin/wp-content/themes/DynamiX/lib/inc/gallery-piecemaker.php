<div class="slider-3d-wrap">
	<div id="slider_3d">
	</div>
    <?php $DYN_galleryheight ? $DYN_galleryheight = $DYN_galleryheight : $DYN_galleryheight = '450'; 
	$page_id=$post->ID;
	$_SESSION['piecemaker_ID'] = $page_id;
	?>
    <script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#slider_3d').flash(
			{ 
				src: '<?php bloginfo('template_url'); ?>/images/piecemaker.swf',
				wmode:"transparent",
				height: <?php echo $DYN_galleryheight; ?>,
				width:'100%',
				AllowScriptAccess:'always',
				expressInstaller: "<?php bloginfo('template_url'); ?>/lib/inc/swfobject/expressInstall.swf",
				flashvars: { xmlSource: "<?php bloginfo('template_url'); ?>/lib/inc/piecemakerXML.php",cssSource: "<?php bloginfo('template_url'); ?>/stylesheets/piecemaker.php" }
			},
			{ version: 10 }
		);
	});

    </script>    
</div>