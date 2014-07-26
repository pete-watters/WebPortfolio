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
	
	
	<style type="text/css">

/*Credits: Dynamic Drive CSS Library */
/*URL: http://www.dynamicdrive.com/style/ */

.ubercolortabs{
padding: 0;
width: 100%;
overflow: hidden;
background: transparent;
}

.ubercolortabs ul{
font: bold 11px Arial, Verdana, sans-serif;
margin: 0;
padding: 0;
list-style: none;
}

.ubercolortabs li{
display: inline;
margin: 0 2px 0 0;
padding: 0;
text-transform: uppercase;
}


.ubercolortabs a{
float: left;
color: white;
background: #006600 url(media/roundleft.gif) no-repeat left top; /*default background color of tabs, left corner image*/
margin: 0 2px 0 0;
padding: 0 0 1px 3px;
text-decoration: none;
letter-spacing: 1px;
}

.ubercolortabs a span{
float: left;
display: block;
background: transparent url(media/roundright.gif) no-repeat right top; /*right corner image*/
padding: 7px 9px 3px 6px;
cursor: pointer;
}

.ubercolortabs a span{
float: none;
}


.ubercolortabs a:hover, .ubercolortabs li.selected a{
background-color: #CCFFCC; /*background color of tabs onMouseover*/
color: black;
}

.ubercolortabs a:hover span{
background-color: transparent;
}


.ubercolordivider{ /*CSS for horizontal line.*/
clear: both;
padding: 0;
width: 100%;
height: 5px;
line-height: 5px;
background: #006600; /*background color of horizontal line*/
border-top: 1px solid #fff; /*Remove this to remove border between bar and tabs*/
}

</style>

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

<?php include("top_menu.php"); ?>


		

		
		
</TABLE>