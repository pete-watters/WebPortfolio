<?php header("Content-type: text/css; charset: UTF-8"); ?>
<?php include( '../../../wp-load.php' );

if ($_SESSION['DYN_inskin']) {
  $inskin = $_SESSION['DYN_inskin'];
} else {
  $inskin = '';
}

if ($_SESSION['DYN_outskin']) {
  $outskin = $_SESSION['DYN_outskin'];
} else {
  $outskin = '';
}


if($inskin=="two") {
	$defaultcolor_one="#ccc";
	$defaultcolor_two="#ddd";
} else {
	$defaultcolor_one="#5f5f5f";
	$defaultcolor_two="#999";
}

if(LINKCOLOR) {
	$linkcol = LINKCOLOR;
} else {
	if($outskin=="two") {
		$linkcol="2e52de";
	} elseif($outskin=="four") {
		$linkcol="008ec9";
	} elseif($outskin=="five") {
		$linkcol="13d700";		
	} elseif($outskin=="six") {
		$linkcol="ffa400";		
	} elseif($outskin=="seven") {
		$linkcol="ffb400";		
	} elseif($outskin=="eight") {
		$linkcol="f80016";		
	} elseif($outskin=="nine") {
		$linkcol="ff00cc";		
	} elseif($outskin=="twelve") {
		$linkcol="000";		
	} elseif($outskin=="sixteen") {
		$linkcol="34505c";		
	} elseif($outskin=="seventeen") {
		$linkcol="195f25";		
	} elseif($outskin=="eighteen") {
		$linkcol="990063";		
	} elseif($outskin=="nineteen") {
		$linkcol="bc0000";		
	} elseif($outskin=="twenty") {
		$linkcol="4e342a";		
	} else {
		$linkcol="1594d9";
	}
}

if(LINKHOVER) {
	$linkhov = LINKHOVER;
} else {
	if($outskin=="two") {
		$linkhov="7690e3";
	} elseif($outskin=="four") {
		$linkhov="00c0ff";
	} elseif($outskin=="five") {
		$linkhov="15ef00";		
	} elseif($outskin=="six") {
		$linkhov="ffd200";		
	} elseif($outskin=="seven") {
		$linkhov="ffe400";		
	} elseif($outskin=="eight") {
		$linkhov="ff4051";		
	} elseif($outskin=="nine") {
		$linkhov="fd4fff";		
	} elseif($outskin=="twelve") {
		$linkhov="d20000";		
	} elseif($outskin=="sixteen") {
		$linkhov="466f80";		
	} elseif($outskin=="seventeen") {
		$linkhov="458952";		
	} elseif($outskin=="eighteen") {
		$linkhov="c4007e";		
	} elseif($outskin=="nineteen") {
		$linkhov="d80000";		
	} elseif($outskin=="twenty") {
		$linkhov="794f40";		
	} else {
		$linkhov="3bb8ff";
	}
}

if(SIDECOLOR) {
  $sidecol = SIDECOLOR;
} else {
  $sidecol = '';
}

if(SIDEHOVER) {
  $sidehov = SIDEHOVER;
} else {
  $sidehov = '';
}


if(TEXTCOLOR) {
  $textcol = TEXTCOLOR;
} else {
  $textcol = '';
}
?>

#toppanel, #toppanel a,.lowerfooter,#wrapper, .tweets h3 a {
<?php if($textcol) { ?>
	color: #<?php echo $textcol; ?>;
<?php } else { ?>
	color:<?php echo $defaultcolor_one; ?>;
<?php } ?>
}	

.sidebar-content li a, #footer a, #panel a  {
<?php if($sidecol) { ?>
	color: #<?php echo $sidecol; ?>;
<?php } else { ?>
    color: <?php echo $defaultcolor_one; ?>;
<?php } ?>
}

.sidebar-content li a:hover, #toppanel a:hover{
<?php if($sidehov) { ?>
	color: #<?php echo $sidehov ?>;
<?php } else { ?>
	color: <?php echo $defaultcolor_two; ?>;
<?php } ?>

}

a, div.item-list-tabs#subnav a.show-hide-new, div.item-list-tabs#subnav a.new-reply-link {
	color: #<?php echo $linkcol; ?>;
  	text-decoration: none;
	outline: none; /* firefox fix  */
}

a:hover,#sub-tabs ul li.current_page_item,div.item-list-tabs#subnav a.show-hide-new:hover,div.item-list-tabs#subnav a.new-reply-link:hover {
	color: #<?php echo $linkhov ?>;
}

ul.paging li.pagebutton { 
	background-color: #<?php echo $linkcol ?>;
}

ul.paging li.pagebutton.active, ul.paging a li.pagebutton { 
	background-color: #<?php echo $linkhov ?>;
}

#sub-tabs ul li a {
	color:#b4b4b4;
}

acronym, abbr {
	border-bottom: 1px dashed #<?php echo $linkcol; ?>;
}


<?php if($inskin =="two") { ?>


.slidernav-left a {
	background:#<?php echo $linkcol; ?> url(stylesheets/images/gallery-nav-dark.png) top left no-repeat;
}

.slidernav-right a {
	background:#<?php echo $linkcol; ?> url(stylesheets/images/gallery-nav-dark.png) top right no-repeat;
}

.slidernav-left a:hover {
	background:#<?php echo $linkhov; ?> url(stylesheets/images/gallery-nav-dark.png) top left no-repeat;
}

.slidernav-right a:hover {
	background:#<?php echo $linkhov; ?> url(stylesheets/images/gallery-nav-dark.png) top right no-repeat;
}


<?php } else { ?>



.slidernav-left a {
	background:#<?php echo $linkcol; ?> url(images/gallery-nav.png) top left no-repeat;
}
.slidernav-right a {
	background:#<?php echo $linkcol; ?> url(images/gallery-nav.png) top right no-repeat;
}

.slidernav-left a:hover {
	background:#<?php echo $linkhov; ?> url(images/gallery-nav.png) top left no-repeat;
}

.slidernav-right a:hover {
	background:#<?php echo $linkhov; ?> url(images/gallery-nav.png) top right no-repeat;
}


<?php } ?>



#content .textresize ul li {
	background-color:#<?php echo $linkcol; ?>;
}

#content .textresize ul li:hover {
	background-color:#<?php echo $linkhov; ?>;
}


#content ul li.socialinit, #content ul li.socialhide:hover, #content .socialicons ul li, #content .postmetadata .comments.yes, .twitterfollow a {
	background-color:#<?php echo $linkcol; ?>;
}

#content ul li.socialinit:hover,#content ul li.socialhide, #content .socialicons ul li:hover, #content .postmetadata .comments.yes:hover, .twitterfollow a:hover  {
	background-color:#<?php echo $linkhov; ?>;
}



#wp-calendar td a {
	background-color:#<?php echo $linkcol; ?>;
}

#wp-calendar td a:hover {
	background-color:#<?php echo $linkhov; ?>;
}

.tab a.open {
background-color:#<?php echo $linkcol; ?>;
}

.tab a.close {
background-color:#<?php echo $linkcol; ?>;
}

.tab a:hover.open {
background-color:#<?php echo $linkhov; ?>;
}

.tab a:hover.close {
background-color:#<?php echo $linkhov; ?>;
}

.panelcontent h2 a, .panelcontent h2 {
	color:<?php if(CUFON_SECGRAD_3) { echo "#".CUFON_SECGRAD_3; } else { echo $defaultcolor_one; } ?>;
}

/** Hightlights *********************************/ 
span.highlight.one {background:#<?php echo $linkcol; ?>;}
/** / Hightlights *********************************/ 

/** Shortcodes *********************************/ 
.accordion .ui-icon,.revealbox .ui-icon { background-color:#<?php echo $linkcol; ?>; }
.accordion .ui-state-active .ui-icon {background-color:#<?php echo $linkhov; ?>;  }
/** / Shortcodes *********************************/ 

.stage-control #stage-prev,.stage-control #stage-next,.stage-control #stage-pause,.stage-control #stage-resume, .stage-control .poststage-prev,.stage-control .poststage-next,.stage-control .poststage-pause,.stage-control .poststage-resume  {background-color:#<?php echo $linkcol; ?>;} 
.stage-control #stage-prev:hover,.stage-control #stage-next:hover,.stage-control #stage-pause:hover,.stage-control #stage-resume:hover, .stage-control .poststage-prev:hover,.stage-control .poststage-next:hover,.stage-control .poststage-pause:hover,.stage-control .poststage-resume:hover  {background-color:#<?php echo $linkhov; ?>;}  