<?php if(get_option("cufon_enable")!="disable") { 

if(DYN_INSKIN!="" && $DYN_inskin=="") { // detect global innerskin is is set 
	$DYN_inskin = DYN_INSKIN;
}

if(DYN_OUTSKIN!="" && $DYN_outskin=="") { // detect global outerskin is is set 
	$DYN_outskin = DYN_OUTSKIN;
}

if($DYN_inskin=="") { // If no skin is set, set default skin to one
	$DYN_inskin="one";
}

if($DYN_outskin=="") { // If no skin is set, set default skin to one
	$DYN_outskin="one";
}

if($DYN_inskin!="one") {

if($DYN_outskin!="one") { // If not light skin 
	$defaultcolor_one="#fff";
	$defaultcolor_two="#f5f5f5";
	$defaultcolor_three="#fff";	
	$defaultcolor_four="#f5f5f5";	
} else {
	$defaultcolor_one="#777";
	$defaultcolor_two="#222";
	$defaultcolor_three="#999";	
	$defaultcolor_four="#333";	
}	
	
	$defaultcolor_five="#f5f5f5";	
	$defaultcolor_six="#bbb";	

	$defaultcolor_seven="#ddd";	
	$defaultcolor_eight="#bbb";
	
} else {

if($DYN_outskin!="one") { // If not light skin 
	$defaultcolor_one="#fff";
	$defaultcolor_two="#f5f5f5";
	$defaultcolor_three="#fff";	
	$defaultcolor_four="#f5f5f5";	
} else {
	$defaultcolor_one="#777";
	$defaultcolor_two="#222";
	$defaultcolor_three="#999";	
	$defaultcolor_four="#333";	
}

	$defaultcolor_five="#7f7f7f";	
	$defaultcolor_six="#262323";	

	$defaultcolor_seven="#777";	
	$defaultcolor_eight="#555";	

}

?>
<script type="text/javascript">

<?php if(get_option("cufon_tags")=="all" || get_option("cufon_tags")=="") { ?>	

// Header/Toppanel Gradients

Cufon.replace('#header h1, #footer-wrap h1', {
color: '-linear-gradient(<?php if(CUFON_PRIGRAD_1) { echo "#".CUFON_PRIGRAD_1.","; } else { echo $defaultcolor_one.","; }?><?php if(CUFON_PRIGRAD_2) { echo "#".CUFON_PRIGRAD_2.","; } else { echo $defaultcolor_two.","; }?>)',textShadow: '0px 1px 5px rgba(0, 0, 0, 0.08)'
});	

Cufon.replace('#header h2, #footer-wrap h2', {
color: '-linear-gradient(<?php if(CUFON_PRIGRAD_3) { echo "#".CUFON_PRIGRAD_3.","; } else { echo $defaultcolor_three.","; }?><?php if(CUFON_PRIGRAD_4) { echo "#".CUFON_PRIGRAD_4.","; } else { echo $defaultcolor_four.","; }?>)',textShadow: '0px 1px 5px rgba(0, 0, 0, 0.08)'

});	

Cufon.replace('#header h3, #header h4, #header h5, #header h6, #footer-wrap h3,#footer-wrap h4,#footer-wrap h5,#footer-wrap h6,.tweets h3', {
color: '-linear-gradient(<?php if(CUFON_PRIGRAD_5) { echo "#".CUFON_PRIGRAD_5.","; } else { echo $defaultcolor_three.","; }?><?php if(CUFON_PRIGRAD_6) { echo "#".CUFON_PRIGRAD_6.","; } else { echo $defaultcolor_four.","; }?>;)',textShadow: '0px 1px 5px rgba(0, 0, 0, 0.08)'
});	

// Content Gradients

Cufon.replace('.inner-page h1,#toppanel h1, .stage-slider h1', {
color: '-linear-gradient(<?php if(CUFON_SECGRAD_1) { echo "#".CUFON_SECGRAD_1.","; } else { echo $defaultcolor_five.","; }?><?php if(CUFON_SECGRAD_2) { echo "#".CUFON_SECGRAD_2.","; } else { echo $defaultcolor_six.","; }?>)',textShadow: '0px 1px 5px rgba(0, 0, 0, 0.08)'
});	

Cufon.replace('.inner-page h2, .stagetext h2, #toppanel h2, .stage-slider h2', {
color: '-linear-gradient(<?php if(CUFON_SECGRAD_3) { echo "#".CUFON_SECGRAD_3.","; } else { echo $defaultcolor_seven.","; }?><?php if(CUFON_SECGRAD_4) { echo "#".CUFON_SECGRAD_4.","; } else { echo $defaultcolor_eight.","; }?>)',textShadow: '0px 1px 5px rgba(0, 0, 0, 0.08)'
});	

Cufon.replace('.inner-page h3,#toppanel h3,.stage-slider h3, .inner-page h4, #toppanel h4,.stage-slider h4, .inner-page h5,#toppanel h5,.stage-slider h5, .inner-page h6,#toppanel h6, .stage-slider h6', {
color: '-linear-gradient(<?php if(CUFON_SECGRAD_5) { echo "#".CUFON_SECGRAD_5.","; } else { echo $defaultcolor_seven.","; }?><?php if(CUFON_SECGRAD_6) { echo "#".CUFON_SECGRAD_6.","; } else { echo $defaultcolor_eight.","; }?>)',textShadow: '0px 1px 5px rgba(0, 0, 0, 0.08)'
});	


Cufon.replace('.stage-slider .gallerytitle.light h2, .stage-slider .gallerytitle.light h3, #item-header-content h2 span.highlight, .accordion-gallery .excerpt h2, .container .title h2, .accordion-gallery .title h5', {
	color: '-linear-gradient(<?php echo "#f9f9f9".","; ?> <?php echo "#fff".","; ?>)',textShadow: '0px 1px 5px rgba(0, 0, 0, 0.08)'
});

Cufon.replace('.stage-slider .gallerytitle.dark h2, .stage-slider .gallerytitle.dark h3', {
	color: '-linear-gradient(<?php echo "#999".","; ?> <?php echo "#333".","; ?>)',textShadow: '0px 1px 5px rgba(0, 0, 0, 0.08)'
});




<?php } elseif(get_option("cufon_tags")=="brandingh1h2") { ?>	

Cufon.replace('#header h1, #toppanel h1,#footer-wrap h1', {
color: '-linear-gradient(<?php if(CUFON_PRIGRAD_1) { echo "#".CUFON_PRIGRAD_1.","; } else { echo $defaultcolor_one.","; }?><?php if(CUFON_PRIGRAD_2) { echo "#".CUFON_PRIGRAD_2.","; } else { echo $defaultcolor_two.","; }?>)',textShadow: '0px 1px 5px rgba(0, 0, 0, 0.08)'
});	

Cufon.replace('#header h2, #toppanel h2,#footer-wrap h2', {
color: '-linear-gradient(<?php if(CUFON_PRIGRAD_3) { echo "#".CUFON_PRIGRAD_3.","; } else { echo $defaultcolor_one.","; }?><?php if(CUFON_PRIGRAD_4) { echo "#".CUFON_PRIGRAD_4.","; } else { echo $defaultcolor_two.","; }?>)',textShadow: '0px 1px 5px rgba(0, 0, 0, 0.08)'
});	


Cufon.replace('.inner-page h1', {
color: '-linear-gradient(<?php if(CUFON_SECGRAD_1) { echo "#".CUFON_SECGRAD_1.","; } else { echo $defaultcolor_three.","; }?><?php if(CUFON_SECGRAD_2) { echo "#".CUFON_SECGRAD_2.","; } else { echo $defaultcolor_four.","; }?>)',textShadow: '0px 1px 5px rgba(0, 0, 0, 0.08)'
});	

Cufon.replace('.inner-page h2, .stagetext h2', {
color: '-linear-gradient(<?php if(CUFON_SECGRAD_3) { echo "#".CUFON_SECGRAD_3.","; } else { echo $defaultcolor_five.","; }?><?php if(CUFON_SECGRAD_4) { echo "#".CUFON_SECGRAD_4.","; } else { echo $defaultcolor_six.","; }?>)',textShadow: '0px 1px 5px rgba(0, 0, 0, 0.08)'
});	


Cufon.replace('.stage-slider .gallerytitle.light h2', {
	color: '-linear-gradient(<?php echo "#f9f9f9".","; ?> <?php echo "#fff".","; ?>)',textShadow: '0px 1px 5px rgba(0, 0, 0, 0.08)'
});

Cufon.replace('.stage-slider .gallerytitle.dark h2, .stage-slider .gallerytitle.dark h3', {
	color: '-linear-gradient(<?php echo $defaultcolor_one.","; ?> <?php echo $defaultcolor_two.","; ?>)',textShadow: '0px 1px 5px rgba(0, 0, 0, 0.08)'
});

<?php } elseif(get_option("cufon_tags")=="branding") { ?>	


Cufon.replace('#logo h1', {
color: '-linear-gradient(<?php if(CUFON_PRIGRAD_1) { echo "#".CUFON_PRIGRAD_1.","; } else { echo $defaultcolor_one.","; }?><?php if(CUFON_PRIGRAD_2) { echo "#".CUFON_PRIGRAD_2.","; } else { echo $defaultcolor_two.","; }?>)',textShadow: '0px 1px 5px rgba(0, 0, 0, 0.08)'
});	

Cufon.replace('.description h2', {
color: '-linear-gradient(<?php if(CUFON_PRIGRAD_3) { echo "#".CUFON_PRIGRAD_3.","; } else { echo $defaultcolor_three.","; }?><?php if(CUFON_PRIGRAD_4) { echo "#".CUFON_PRIGRAD_4.","; } else { echo $defaultcolor_four.","; }?>)',textShadow: '0px 1px 5px rgba(0, 0, 0, 0.08)'
});	



<?php } ?>		
</script>
<?php } ?>
