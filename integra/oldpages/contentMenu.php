<?php

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Integra Pharmacy Management System</title>
<meta http-equiv="Content-Style-Type" content="text/css">

<!-- -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript" src="inc/jquery.metadata.js"></script>
	<script type="text/javascript" src="inc/mbMenu.js"></script>
	<script type="text/javascript" src="inc/styleswitch.js"></script>
	<script type="text/javascript" src="inc/jquery.hoverIntent.js"></script>
	<!-- -->


<link href="css/styleSite.css" type="text/css" rel="stylesheet">

<!-- -->
	<link rel="stylesheet" type="text/css" href="css/menu.css" title="styles1"  media="screen" />
	<link rel="alternate stylesheet" type="text/css" href="css/menu1.css" title="styles2" media="screen" />
		<style type="text/css">
		body .style a{
			color:gray;
			font-family:sans-serif;
			font-size:15px;
			text-decoration:none;
		}
	</style>
	<!-- -->
	
	
	
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>

<script type="text/javascript">

		

		$(function(){
			$(".myMenu").buildMenu(
			{
				template:"menuVoices.html",
				additionalData:"pippo=1",
				menuWidth:200,
				openOnRight:false,
				menuSelector: ".menuContainer",
				iconPath:"ico/",
				hasImages:true,
				fadeInTime:100,
				fadeOutTime:300,
				adjustLeft:2,
				minZindex:"auto",
				adjustTop:10,
				opacity:.95,
				shadow:true,
				closeOnMouseOut:false,
				closeAfter:1000
			});

			$(".vertMenu").buildMenu(
			{
				template:"menuVoices.html",
				menuWidth:170,
				openOnRight:true,
				menuSelector: ".menuContainer",
				iconPath:"ico/",
				hasImages:true,
				fadeInTime:200,
				fadeOutTime:200,
				adjustLeft:0,
				adjustTop:0,
				opacity:.95,
				openOnClick:false,
				minZindex:200,
				shadow:true,
				hoverIntent:300,
				submenuHoverIntent:500,
				closeOnMouseOut:true
			});

			$(document).buildContextualMenu(
			{
				template:"menuVoices.html",
				menuWidth:200,
				overflow:2,
				menuSelector: ".menuContainer",
				iconPath:"ico/",
				hasImages:false,
				fadeInTime:100,
				fadeOutTime:100,
				adjustLeft:0,
				adjustTop:0,
				opacity:.99,
				closeOnMouseOut:false,
				onContextualMenu:function(o,e){
					//testForContextMenu(o)
				},
				shadow:true
			});

		}
			);


		//this function get the id of the element that fires the context menu.	
		function testForContextMenu(el){
			if (!el) el= $.mbMenu.lastContextMenuEl;
			alert("the ID of the element is:   "+$(el).attr("id"))
		}

	</script>
	
	
	<!-- horizontal menu --> 
	
	<link rel="stylesheet" type="text/css" href="jqueryslidemenu.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<script type="text/javascript" src="jqueryslidemenu.js"></script>

	
	
</head>
<BODY BGCOLOR=#FFFFFF LEFTMARGIN=0 TOPMARGIN=0 MARGINWIDTH=0 MARGINHEIGHT=0 onLoad="MM_preloadImages('images/m1r.jpg','images/m2r.jpg','images/m3r.jpg','images/m4r.jpg','images/m5r.jpg')">


<!-- ImageReady Slices (1_home.psd - Slices: 01, 02, 03) -->
<TABLE WIDTH=100% height="100%" BORDER=0 CELLPADDING=0 CELLSPACING=0 align="center">


	<TR>
	 <!-- left side -->

		<TD width="50%" background="images/left_bg.jpg" style="background-position:right; background-repeat:repeat-y " bgcolor="#CFCFCF"><IMG SRC="images/spacer.gif" WIDTH=17 HEIGHT=637 ALT=""></TD>
		<TD WIDTH=731 HEIGHT=637 ALT="" valign="top">
		<TABLE WIDTH=731 BORDER=0 CELLPADDING=0 CELLSPACING=0>
	<TR>
		<TD WIDTH="731" HEIGHT= "285" ALT="" valign="top">
		  <TABLE WIDTH="731" BORDER= "0" CELLPADDING =0 CELLSPACING=0>
	<TR>
	
<img src="images/BannerBlue2.jpg" alt="Integra" usemap="#Map" align="center" border="0" height="158" width="780">
<map name="Map" id="Map">
<area shape="rect" coords="20,7,135,120" href="index.php">
</map>

			<table  border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="container">
				<tr>
					<td class="myMenu" align="right">

						<!-- start horizontal menu -->

						<table width="100%"  class="rootVoices" cellspacing='0' cellpadding='0' border='0'><tr>
							<td class="rootVoice {menu: 'menu_1'}" >Products</td>
							<td class="rootVoice {menu: 'menu_2'}" >Services</td>
							<td class="rootVoice {menu: 'menu_3'}" >Technical</td>
							<td class="rootVoice {menu: 'empty'}">Customer Area</td>
							<td class="rootVoice {menu: 'empty'}" onclick="window.open('orderDemo.php','ww')">Order Demo</td>
								<td class="rootVoice {menu: 'empty'}" onclick="window.open('support.php','ww')">Support</td>
							
						</tr></table>

						<!-- end horizontal menu -->





<!-- start vertical menu -->
	
	
	
</div>
<!-- end vertical menu -->


</div>


              <!-- InstanceEndEditable --></td>




<!-- menues -->

<!-- products menu --> 
<div id="menu_1" class="menu">
	<a class="{ menu:'integraRX'}">Integra Rx</a>
	<!-- menuvoice with js action, image and submenu-->
	<a class="{ menu:'integraPOS'}">Integra POS</a>
	<!-- menuvoice with js action, image and submenu-->
	<a class="{ menu:'integraHO'}">Integra HO</a>
	<!-- menuvoice with js action, image and submenu-->
</div>

<div id="menu_2" class="menu">
	<!-- menuvoice with href-->
	<a href="ServiceLevels.php#Maintenance"  > Maintenance</a>
	<a class="{menu: 'services_sub_menu_1'}">7 - Day Support</a>
	<a class="{menu: 'services_sub_menu_2'}">SLA</a>
</div>

<div id="menu_3" class="menu">

	
	
	
	
	<a href="IntegraRxFeatures.php"  >Features</a> Table of Features</a>
	<a href="IntegraRxSystemArchitecture.php">System Architecture</a> <!-- menuvoice with href-->
	<a href="IntegraRxHelpFile.php">Help file for download or browsing</a>
	<a href="IntegraRxShortcuts.php" > Keyboard Strip</a>
	
</div>

<div id="menu_4" class="menu">
	
	<!--
	<a rel="title" >Customer Area</a>
	<a class="{action: 'document.title=(\'Suport\')'}"> Support Link</a>
	<a class="{action: 'document.title=(\'menu_2.2\')'}">Version Downloads</a>
	<a class="{action: 'document.title=(\'menu_2.2\')'}">User Docs</a>
	<a class="{action: 'document.title=(\'menu_2.2\')'}">Forum</a> -->
</div>




<!-- end menues -->

<!-- mymenus --> 
<div id="integraRX" class="menu">
	<a href="IntegraRxOverview.php" class="{img: 'IntegraBall.png'}" >Overview</a>
	<a href="IntegraRxFeatures.php" class="{img: 'IntegraBall.png'}" >Features</a> <!-- menuvoice with href-->
	<a href="IntegraRxSystemArchitecture.php" class="{img: 'IntegraBall.png'}" >System Architecture</a> <!-- menuvoice with href-->
	<a href="IntegraRxAuditTrail.php" class="{img: 'IntegraBall.png'}" >Audit Trail </a> <!-- menuvoice with href-->
	<a href="IntegraRxPatientManagement.php" class="{img: 'IntegraBall.png'}" >Patient Management </a> <!-- menuvoice with href-->
	<a href="IntegraRxPracticeManagement.php" class="{img: 'IntegraBall.png'}" >Practice Management </a> <!-- menuvoice with href-->
		<a href="IntegraRxPrescriptionManagement.php" class="{img: 'IntegraBall.png'}" >Prescription Management </a> <!-- menuvoice with href-->
	
	<a href="IntegraRxProductManagement.php" class="{img: 'IntegraBall.png'}" >Ordering and Product Management </a> <!-- menuvoice with href-->
	
	<a href="IntegraRxMDSModule.php" class="{img: 'IntegraBall.png'}" >MDS and MAR Management</a> <!-- menuvoice with href-->
	<a href="IntegraRxShortcuts.php" class="{img: 'IntegraBall.png'}" >Keyboard Shortcuts </a> <!-- menuvoice with href-->
	
</div>
	
<div id="integraPOS" class="menu">

	<a href="IntegraEpos.php#1.1" class="{img: 'IntegraBall.png'}" >Overview </a> 
	<a href="IntegraEpos.php#1.2" class="{img: 'IntegraBall.png'}" >Orders Module</a> 
	<a href="IntegraEpos.php#1.3" class="{img: 'IntegraBall.png'}" >Stock Module </a> 
	<a href="IntegraEpos.php#1.4" class="{img: 'IntegraBall.png'}" >Features</a> 
</div>

<div id="integraHO" class="menu">

<a href="IntegraHOOverview.php" class="{img: 'IntegraBall.png'}" >Overview</a> 
<a href="IntegraHOFeatures.php" class="{img: 'IntegraBall.png'}" >Features</a>
	<a href="IntegraEnterprise.php" class="{img: 'IntegraBall.png'}" >Integra Enterprise</a> 
</div>

<div id="services_sub_menu_1" class="menu">
	<a href="ServiceLevels.php#IssueReporting"  >Issue reporting</a>
</div>

<div id="services_sub_menu_2" class="menu">
	<a href="ServiceLevels.php#Metrics"  >Metrics</a>
</div>
<div id="technical_sub_menu_1" class="menu">
	<a class="{action: 'document.title=(\'sub_menu_1.1\')'}">Stability</a>
	<a class="{action: 'document.title=(\'sub_menu_1.1\')'}">Security</a>
</div>

		

		
		
</TABLE>

<div style="margin-left:12px; margin-top:1px; margin-bottom:100px; margin-right:100px ">

<div id="myslidemenu" class="jqueryslidemenu">
<ul>
<li><a href="http://www.dynamicdrive.com">Item 1</a></li>
<li><a href="#">Item 2</a></li>
<li><a href="#">Folder 1</a>
  <ul>
  <li><a href="#">Sub Item 1.1</a></li>
  <li><a href="#">Sub Item 1.2</a></li>
  <li><a href="#">Sub Item 1.3</a></li>
  <li><a href="#">Sub Item 1.4</a></li>
  </ul>
</li>
<li><a href="#">Item 3</a></li>
<li><a href="#">Folder 2</a>
  <ul>
  <li><a href="#">Sub Item 2.1</a></li>
  <li><a href="#">Folder 2.1</a>
    <ul>
    <li><a href="#">Sub Item 2.1.1</a></li>
    <li><a href="#">Sub Item 2.1.2</a></li>
    <li><a href="#">Folder 3.1.1</a>
		<ul>
    		<li><a href="#">Sub Item 3.1.1.1</a></li>
    		<li><a href="#">Sub Item 3.1.1.2</a></li>
    		<li><a href="#">Sub Item 3.1.1.3</a></li>
    		<li><a href="#">Sub Item 3.1.1.4</a></li>
    		<li><a href="#">Sub Item 3.1.1.5</a></li>
		</ul>
    </li>
    <li><a href="#">Sub Item 2.1.4</a></li>
    </ul>
  </li>
  </ul>
</li>
<li><a href="http://www.dynamicdrive.com/style/">Item 4</a></li>
</ul>
<br style="clear: left" />
</div>




<TR>
		<TD WIDTH="731" HEIGHT= "100%" ALT="" valign="top">
		<table width="731" height="5" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="26"><img src="images/spacer.gif"></td>
    <td width="681" valign="top" background="images/bot_px.jpg" style="background-position:top; background-repeat:repeat-x ">
	<div align="center" style="margin-top:10px " class="copy">
	<a href="CompanyHistory.php" class="copy">Company</a>	<img src="images/spacer.gif" width="8" height="1">|<img src="images/spacer.gif" width="8" height="1">
	<a href="IntegraRx.php" class="copy">Products</a><img src="images/spacer.gif" width="8" height="1">|<img src="images/spacer.gif" width="8" height="1">
	<a href="ServiceLevels.php" class="copy">Services</a><img src="images/spacer.gif" width="8" height="1">|<img src="images/spacer.gif" width="8" height="1">
	<a href="orderDemo.php" class="copy">Sales</a><img src="images/spacer.gif" width="8" height="1">|<img src="images/spacer.gif" width="8" height="1">
	<a href="http://www.ocuco.com/support.php" class="copy">Support</a><img src="images/spacer.gif" width="8" height="1">|<img src="images/spacer.gif" width="8" height="1">
	<a href="contact.php" class="copy">Contact</a><img src="images/spacer.gif" width="8" height="1"></div>
	<div align="center" style="margin-top:10px " class="copy">Copyright &copy; Ocuco, 2009. All Rights Reserved</div>
	</td>
   
  </tr>
</table>

		</TD>
	</TR>
</TABLE>
		</TD>
		<!--  side -->
		
		<TD width="50%" background="images/right_bg.jpg" style="background-position:left; background-repeat:repeat-y " bgcolor="#CFCFCF">
		<IMG SRC="images/spacer.gif" WIDTH="18" HEIGHT="637" ALT=""></TD>
	</TR>
</TABLE>
</BODY>
</HTML>