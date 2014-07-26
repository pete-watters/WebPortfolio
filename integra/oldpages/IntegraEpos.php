
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
	
	
	<meta name=ProgId content=Excel.Sheet>
<meta name=Generator content="Microsoft Excel 12">
<link rel=File-List href="IntegraPOS%20Feature%20Grid_files/filelist.xml">
<style id="IntegraPOS Feature Grid_2136_Styles">
<!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
.xl632136
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:white;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Gill Sans MT", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:top;
	background:blue;
	mso-pattern:black none;
	white-space:nowrap;}
.xl642136
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:white;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Gill Sans MT", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:top;
	background:blue;
	mso-pattern:black none;
	white-space:normal;}
.xl652136
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Gill Sans MT", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:top;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl662136
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Gill Sans MT", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:top;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl672136
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:white;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Gill Sans MT", sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:top;
	background:#3366FF;
	mso-pattern:black none;
	white-space:normal;}
.xl682136
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:8.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Verdana, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:top;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl692136
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:white;
	font-size:8.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Verdana, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:top;
	background:#3366FF;
	mso-pattern:black none;
	white-space:normal;}
-->
</style>

</head>

<BODY BGCOLOR=#FFFFFF LEFTMARGIN=0 TOPMARGIN=0 MARGINWIDTH=0 MARGINHEIGHT=0 onLoad="MM_preloadImages('images/m1r.jpg','images/m2r.jpg','images/m3r.jpg','images/m4r.jpg','images/m5r.jpg')">
<!--[if !excel]>&nbsp;&nbsp;<![endif]-->



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
							<td class="rootVoice {menu: 'empty'}" onclick="window.open('login.php','ww')">Customer Area</td>

							<td class="rootVoice {menu: 'empty'}" onclick="window.open('orderDemo.php','ww')">Order Demo</td>
								<td class="rootVoice {menu: 'empty'}" onclick="window.open('login.php','ww')">Support</td>
							
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
<a href="IntegraHOOverview.php" class="{img: 'IntegraBall.png'}" >Overview</a> <!-- menuvoice with href-->
	<a href="IntegraHOFeatures.php" class="{img: 'IntegraBall.png'}" >Features</a> <!-- menuvoice with href-->
	<a href="IntegraEnterprise.php" class="{img: 'IntegraBall.png'}" >Integra Enterprise</a> <!-- menuvoice with href-->
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
<h2> <a name="top.php">Integra Epos:</a></h2>

<ul>
<li> <a href="#1.1">Introduction</a></li>
<li><a href="#1.2">Orders Module</a></li>
<li><a href="#1.3">Stock Module	</a></li>
<li><a href="#1.4">Features</a></li>
</ul>


<h3> Introduction </h3>
<a name="1.1"><a href="#top">Top</a></a>
<p>
Complementing Integra RX, but also a standalone till solution in its own right, IntegraPOS developed by Ocuco, is the first EPoS package fully integrated with the Dispensary and therefore aimed specifically at improving the workflow of Irish Pharmacies.
Based on the same three-tier open-architecture and highly reliable database as Integra RX, it is the most efficient and rapidly implemented EPoS system available to Irish Pharmacies today. 
</p>
<p>
Ocuco recognises the significance of technologically preparing your practice for better patient relationship management.  IntegraPOS follows the development of other Ocuco products for professional medical practices, with a wide user base in Ireland and the UK, and incorporates the feedback of its users.   At store level, the most basic requirements are to process financial transactions with the Customers accurately and efficiently, but IntegraPOS goes much further by integrating with the Dispensary and being able to show patients details and accounts, processing DPS payments, managing stock in the dispensary and at the front of shop, allowing to send orders and process deliveries, and much more.  
</p>
<p>

<h4>Why invest in IntegraPOS </h4>
<ul>
<li>	The most advanced EPoS System made for Pharmacy</li>
<li>The only Windows based Epos integrated with the Dispensary </li>
<li>The only proven Enterprise system</li>
<li>The best future-proof investment</li>
<li>	Advanced yet easy to use</li>
<li>	Basic Training in 15 minutes</li>
<li>	Uncluttered interface, touch-screen compatible</li>
<li>	Advanced functions accessible through menus</li>
<li>	Stable, Secure, Reliable</li>
<li>	Very easy to manage even for companies with no IT</li>
<li>	Security features and Audit Trail</li>
<li>	Robust and reliable</li>
</ul>

<h4>Main Benefits of IntegraPOS </h4>
<p>
Increase your pharmacy’s productivity at the till by installing a very advanced EPoS with a very easy-to-climb learning curve.  The clean, uncluttered touch-screen shows you only the options you need for the current activity.  You can chose which members of staff will have access to the most sensitive functions.  Product file management is facilitated by using the price file issued by the IPU (updated monthly), or you can manage your own product file.  High quality reports can be produced effortlessly.  IntegraPOS supports Integra HO, making it the first Enterprise-class Windows based EPoS system for Pharmacy. But of course, the main benefit of IntegraPOS is the seamless integration with Integra RX.
</p>

<h4>Integration with Integra Rx</h4>
<p>
The basic feature is that you can produce prescription bags in Integra RX and scan them in IntegraPOS; however, there is much more to the integration between IntegraPOS and Integra RX.  The patients and products files are shared, allowing monitoring and maintenance of accurate DPS co-payments, charging to patient’s accounts, receiving payments for patients accounts, and even viewing patient’s details.  Ordering is also integrated, which enables the Store Manager to compose, send or check in an order without interrupting the dispensing, thereby improving the workflow in the Pharmacy.</p>

<h4>Stock Control and Ordering</h4>
<p>IntegraPOS shares the Stock module with Integra RX, the first system allowing Unit-Level Stock Control, designed to facilitate just-in-time stock management.  It can manage stocks and orders for both the Dispensary and the Front of Shop.  Stock Control and Price Control can be interfaced with a Handheld PocketPC, to gather data, book stock, and identify products for which you need new shelf-edge labels.  </p>


<h3> Orders Module</h3>
<a name="1.2"><a href="#top">Top</a></a>
<p>
Orders module
Review your wants list – Pending orders, Shorts – Exceptions list and Validate received orders.  
<br />
Pending Orders, wants list
<ul>
<li>Bonus information is displayed in real time as you review your pending order</li>
<li>	Hold items on a Wants list to be ordered at a later time</li>
<li>	Fully configurable listing</li>
</ul>
<br />
Order Validation
<ul>
<li>	Unique handheld PC for order validation</li>
<li>	Unique line discount function</li>
<li>	Unique Bonus Stock handling function</li>
<li>	Unique FIFO cost price tracking for Exact COS value</li>
<li>	Automatic Price Update File creation – never under price again</li>
</ul>

</p>

<h3>Stock Module</h3>
<a name="1.3"><a href="#top">Top</a></a>
<p>
As mentioned above, the three-tier approach to implementation has many advantages, including the following:

Easily maintain product information with this simple to use interface.
<ul>
<li>	Review Product Usage at a glance</li>
<li>	Select Pack replacement and Re-Order levels</li>
<li>	Define Dispense defaults, Dosage codes, Dispense qty’s etc.</li>
<li>	Create Reference information to appear on product selection</li>
<li>	Review Stock Movement history</li>
</ul>
</p>
<h3>Features</h3>
<a name="1.4"><a href="#top">Top</a></a>


<div id="IntegraPOS Feature Grid_2136" align=center x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=434 style='border-collapse:
 collapse;table-layout:fixed;width:325pt'>
 <col class=xl652136 width=163 style='mso-width-source:userset;mso-width-alt:
 5961;width:122pt'>
 <col class=xl662136 width=271 style='mso-width-source:userset;mso-width-alt:
 9910;width:203pt'>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl632136 width=163 style='height:15.0pt;width:122pt'>Patients
  Functions<span style='mso-spacerun:yes'> </span></td>
  <td class=xl642136 width=271 style='width:203pt'>&nbsp;</td>

 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl652136 style='height:15.0pt'>Accept Payment</td>
  <td class=xl662136 width=271 style='width:203pt'>Payments on accounts are
  accepted at the till</td>
 </tr>
 <tr height=100 style='height:75.0pt'>
  <td height=100 class=xl652136 style='height:75.0pt'>Accounts Module</td>

  <td class=xl662136 width=271 style='width:203pt'>Accesses the patients'
  accounts.<span style='mso-spacerun:yes'>  </span>Accounts can be individual
  or grouped by family, Nursing Home or Company.<span
  style='mso-spacerun:yes'>  </span>This can be accessed directly from the Till
  interface or from the till menu.</td>
 </tr>
 <tr height=60 style='height:45.0pt'>
  <td height=60 class=xl652136 style='height:45.0pt'>Drug Interaction</td>
  <td class=xl662136 width=271 style='width:203pt'>Provides Drug Interaction
  information between the purchased items and the items on the patient's
  medical record.</td>

 </tr>
 <tr height=60 style='height:45.0pt'>
  <td height=60 class=xl652136 style='height:45.0pt'>Patient Maintenance</td>
  <td class=xl662136 width=271 style='width:203pt'>Insert or edit patient's
  contact details.<span style='mso-spacerun:yes'>  </span>This can be accessed
  directly from the Till interface or from the till menu.</td>
 </tr>
 <tr height=40 style='height:30.0pt'>
  <td height=40 class=xl652136 style='height:30.0pt'>DPS Payment</td>

  <td class=xl662136 width=271 style='width:203pt'>Available from the till
  interface, records a payment against a patient's DPS threshold.</td>
 </tr>
 <tr height=40 style='height:30.0pt'>
  <td height=40 class=xl652136 style='height:30.0pt'>Query Module</td>
  <td class=xl662136 width=271 style='width:203pt'>Full Query module, allows to
  lookup patients, create mailings, etc.</td>
 </tr>
 <tr height=20 style='height:15.0pt'>

  <td height=20 class=xl632136 style='height:15.0pt'>Price Control Functions</td>
  <td class=xl642136 width=271 style='width:203pt'>&nbsp;</td>
 </tr>
 <tr height=40 style='height:30.0pt'>
  <td height=40 class=xl652136 style='height:30.0pt'>Authorise Products</td>
  <td class=xl662136 width=271 style='width:203pt'>Management function to
  authorise modifications to product records</td>
 </tr>

 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl652136 style='height:15.0pt'>IPU Upload</td>
  <td class=xl662136 width=271 style='width:203pt'>Allows to upload the IPU
  monthly file</td>
 </tr>
 <tr height=60 style='height:45.0pt'>
  <td height=60 class=xl652136 style='height:45.0pt'>Price Overrides</td>
  <td class=xl662136 width=271 style='width:203pt'>Monitors all price
  overrrides and the staff members who performed them, and gives the option to
  make them permanent.<span style='mso-spacerun:yes'> </span></td>

 </tr>
 <tr height=60 style='height:45.0pt'>
  <td height=60 class=xl652136 style='height:45.0pt'>Price Updates</td>
  <td class=xl662136 width=271 style='width:203pt'>Manages price updates:
  allows monitoring of price changes from the system or from uploaded files.</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl652136 style='height:15.0pt'>Promotions</td>

  <td class=xl662136 width=271 style='width:203pt'></td>
 </tr>
 <tr height=60 style='height:45.0pt'>
  <td height=60 class=xl652136 style='height:45.0pt'>Discounts</td>
  <td class=xl662136 width=271 style='width:203pt'>Discounts available by
  amounts, by variable rate, and by assigned rate (e.g. Staff
  Discount=25%)<span style='mso-spacerun:yes'> </span></td>
 </tr>
 <tr height=20 style='height:15.0pt'>

  <td height=20 class=xl632136 style='height:15.0pt'>Stock Management/Orders</td>
  <td class=xl642136 width=271 style='width:203pt'>&nbsp;</td>
 </tr>
 <tr height=80 style='height:60.0pt'>
  <td height=80 class=xl662136 width=163 style='height:60.0pt;width:122pt'>Auto-Ordering</td>
  <td class=xl662136 width=271 style='width:203pt'>Products can be tagged to be
  reordered manually, or via Pack Replacement or Reorder Level.<span
  style='mso-spacerun:yes'>  </span>The Reorder Level can be fractional (useful
  for large packs)</td>

 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl662136 width=163 style='height:15.0pt;width:122pt'>Stock
  Level Control</td>
  <td class=xl662136 width=271 style='width:203pt'>Automatic, live and manual</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl662136 width=163 style='height:15.0pt;width:122pt'>Rolling
  Stocktaking</td>

  <td class=xl662136 width=271 style='width:203pt'>Supported</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl662136 width=163 style='height:15.0pt;width:122pt'>Ordering
  Methods</td>
  <td class=xl662136 width=271 style='width:203pt'>Electronic (EDI), Fax, Post,
  E-Mail, Phone</td>
 </tr>
 <tr height=40 style='height:30.0pt'>

  <td height=40 class=xl662136 width=163 style='height:30.0pt;width:122pt'>Ordering
  To All Major Wholesalers</td>
  <td class=xl662136 width=271 style='width:203pt'>Yes, without disruption to
  Dispensing</td>
 </tr>
 <tr height=40 style='height:30.0pt'>
  <td height=40 class=xl652136 style='height:30.0pt'>HandHeld Terminals</td>
  <td class=xl662136 width=271 style='width:203pt'>Dedicated PocketPC with
  Pocket PrometEPoS software.<span style='mso-spacerun:yes'>  </span>See the
  related documentation.</td>

 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl632136 style='height:15.0pt'>Till Operations</td>
  <td class=xl642136 width=271 style='width:203pt'>&nbsp;</td>
 </tr>
 <tr height=40 style='height:30.0pt'>
  <td height=40 class=xl652136 style='height:30.0pt'>Configuration</td>
  <td class=xl662136 width=271 style='width:203pt'>Allows to configure all the
  operative elements of the till.<span style='mso-spacerun:yes'>  </span>Access
  secured by PIN<span style='mso-spacerun:yes'> </span></td>

 </tr>
 <tr height=60 style='height:45.0pt'>
  <td height=60 class=xl652136 style='height:45.0pt'>Maintenance</td>
  <td class=xl662136 width=271 style='width:203pt'>Allows to insert/delete/edit
  variable system parametres, like security, VAT types, media types, discount
  types, reason codes etc.</td>
 </tr>
 <tr height=60 style='height:45.0pt'>
  <td height=60 class=xl652136 style='height:45.0pt'>Security</td>

  <td class=xl662136 width=271 style='width:203pt'>Part of the Maintenance set
  of options, allows to set staff member names, security level, access PIN, and
  functions available.</td>
 </tr>
 <tr height=40 style='height:30.0pt'>
  <td height=40 class=xl652136 style='height:30.0pt'>Staff messages</td>
  <td class=xl662136 width=271 style='width:203pt'>Small messaging facility
  allowing staff to send and receive internal messages.</td>
 </tr>
 <tr height=40 style='height:30.0pt'>

  <td height=40 class=xl652136 style='height:30.0pt'>Suspended Sales</td>
  <td class=xl662136 width=271 style='width:203pt'>Displayed in a list and
  accessed from the Menu or from the Till Interface.</td>
 </tr>
 <tr height=80 style='height:60.0pt'>
  <td height=80 class=xl652136 style='height:60.0pt'>Till Shifts</td>
  <td class=xl662136 width=271 style='width:203pt'>Management function to
  review till shifts, whether in progress, suspended, incomplete, complete and
  verified.<span style='mso-spacerun:yes'>  </span>Allows to view all financial
  ans sales data for each shift</td>

 </tr>
 <tr height=60 style='height:45.0pt'>
  <td height=60 class=xl652136 style='height:45.0pt'>Till Shifts Reports</td>
  <td class=xl662136 width=271 style='width:203pt'>Reports can be printed for a
  large range of till operations.<span style='mso-spacerun:yes'>  </span>Till
  shifts can be checked individually and validated.</td>
 </tr>
 <tr height=120 style='height:90.0pt'>
  <td height=120 class=xl652136 style='height:90.0pt'>Login/Logout/Change User</td>

  <td class=xl662136 width=271 style='width:203pt'>Each till user must login to
  the till at the beginning of their shift, and log out to perform a
  Z-read.<span style='mso-spacerun:yes'>  </span>However, another user can
  perform a sale by using their till PIN number; their sale will be recorded
  under their name in the shift in progress.</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl632136 style='height:15.0pt'>Till Interface</td>
  <td class=xl642136 width=271 style='width:203pt'>&nbsp;</td>
 </tr>
 <tr height=20 style='height:15.0pt'>

  <td height=20 class=xl652136 style='height:15.0pt'>Back</td>
  <td class=xl662136 width=271 style='width:203pt'>Allows to undo the last
  operation</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl652136 style='height:15.0pt'>Receipt</td>
  <td class=xl662136 width=271 style='width:203pt'>Prints a second copy of the
  last receipt</td>
 </tr>

 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl652136 style='height:15.0pt'>VAT Receipt</td>
  <td class=xl662136 width=271 style='width:203pt'>Prints a VAT receipt</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl652136 style='height:15.0pt'>Cancel</td>
  <td class=xl662136 width=271 style='width:203pt'>Cancel the transaction in
  progress</td>

 </tr>
 <tr height=40 style='height:30.0pt'>
  <td height=40 class=xl652136 style='height:30.0pt'>Price Lookup</td>
  <td class=xl662136 width=271 style='width:203pt'>View price details on
  selected items and provides a running total of the verified items</td>
 </tr>
 <tr height=40 style='height:30.0pt'>
  <td height=40 class=xl652136 style='height:30.0pt'>Review Previous Sales</td>

  <td class=xl662136 width=271 style='width:203pt'>From the Till, allows to
  review sales receipts by transaction ID, date, product or shift.</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl652136 style='height:15.0pt'>Refund</td>
  <td class=xl662136 width=271 style='width:203pt'>Allows to perform
  refunds<span style='mso-spacerun:yes'> </span></td>
 </tr>
 <tr height=40 style='height:30.0pt'>

  <td height=40 class=xl652136 style='height:30.0pt'>No Sale</td>
  <td class=xl662136 width=271 style='width:203pt'>Opens the till drawer
  without performing a sale</td>
 </tr>
 <tr height=40 style='height:30.0pt'>
  <td height=40 class=xl652136 style='height:30.0pt'>Lift</td>
  <td class=xl662136 width=271 style='width:203pt'>Allows to lift (remove and
  count) cash or cheques from the till drawer.</td>
 </tr>

 <tr height=40 style='height:30.0pt'>
  <td height=40 class=xl652136 style='height:30.0pt'>Payout</td>
  <td class=xl662136 width=271 style='width:203pt'>Records payments made from
  the till drawer (window cleaners, etc)</td>
 </tr>
 <tr height=40 style='height:30.0pt'>
  <td height=40 class=xl652136 style='height:30.0pt'>Payin</td>
  <td class=xl662136 width=271 style='width:203pt'>Records cash deposits made
  into the till drawer.</td>

 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl672136 width=163 style='height:15.0pt;width:122pt'>Reports
  Module</td>
  <td class=xl672136 width=271 style='width:203pt'>&nbsp;</td>
 </tr>
 <tr height=60 style='height:45.0pt'>
  <td height=60 class=xl682136 width=163 style='height:45.0pt;width:122pt'>Built-In
  Reports</td>
  <td class=xl662136 width=271 style='width:203pt'>61 available reports in the
  following categories: Accounts, Dispensing, Patients, Sales, Orders, Stock,
  System.</td>

 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl662136 width=163 style='height:15.0pt;width:122pt'>External
  Reporting</td>
  <td class=xl662136 width=271 style='width:203pt'>Easy interface with Crystal
  Reports.</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl692136 width=163 style='height:15.0pt;width:122pt'>System
  Administration</td>

  <td class=xl672136 width=271 style='width:203pt'>&nbsp;</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl662136 width=163 style='height:15.0pt;width:122pt'>Shelf-Edge
  Labelling</td>
  <td class=xl662136 width=271 style='width:203pt'>Yes, with user-definable
  layouts</td>
 </tr>
 <tr height=40 style='height:30.0pt'>
  <td height=40 class=xl662136 width=163 style='height:30.0pt;width:122pt'>Antivirus
  protection</td>

  <td class=xl662136 width=271 style='width:203pt'>Independent from Integra RX,
  most commercial products supported.</td>
 </tr>
 <tr height=60 style='height:45.0pt'>
  <td height=60 class=xl662136 width=163 style='height:45.0pt;width:122pt'>Backups</td>
  <td class=xl662136 width=271 style='width:203pt'>Independent from Integra RX,
  most commercial products supported. Ocuco offers a managed online backup
  solution for a low monthly cost.</td>
 </tr>
 <tr height=20 style='height:15.0pt'>

  <td height=20 class=xl662136 width=163 style='height:15.0pt;width:122pt'>Supported
  Receipt Printers</td>
  <td class=xl662136 width=271 style='width:203pt'>Serial and Parallel Till
  Printers</td>
 </tr>
 <tr height=40 style='height:30.0pt'>
  <td height=40 class=xl662136 width=163 style='height:30.0pt;width:122pt'>Supported
  Report Printers</td>
  <td class=xl662136 width=271 style='width:203pt'>Any printer with a
  Windows-compatible driver, including USB printers</td>
 </tr>

 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl672136 width=163 style='height:15.0pt;width:122pt'>The
  Engine Room</td>
  <td class=xl672136 width=271 style='width:203pt'>&nbsp;</td>
 </tr>
 <tr height=40 style='height:30.0pt'>
  <td height=40 class=xl662136 width=163 style='height:30.0pt;width:122pt'>Database</td>
  <td class=xl662136 width=271 style='width:203pt'>Oracle database to ensure
  stability, data integrity and transparent access to data.</td>

 </tr>
 <tr height=100 style='height:75.0pt'>
  <td height=100 class=xl662136 width=163 style='height:75.0pt;width:122pt'>System
  maintenance</td>
  <td class=xl662136 width=271 style='width:203pt'>Self-maintaining database
  requiring little or no administration.<span style='mso-spacerun:yes'> 
  </span>Automatic file optimisation performed by the system without assistance
  or disruption to the user, and without shutting down any workstation.</td>
 </tr>
 <tr height=100 style='height:75.0pt'>
  <td height=100 class=xl662136 width=163 style='height:75.0pt;width:122pt'>Data
  Security Compliance</td>

  <td class=xl662136 width=271 style='width:203pt'>Full Audit Trail -- every
  operation on the database is logged to a trail that can be analysed for
  Disaster Recovery purposes or to make sure that data has not been tampered
  with.</td>
 </tr>
 <tr height=40 style='height:30.0pt'>
  <td height=40 class=xl662136 width=163 style='height:30.0pt;width:122pt'>Maximum
  number of tills</td>
  <td class=xl662136 width=271 style='width:203pt'>Practically unlimited
  without degradation of performance.</td>
 </tr>
 <tr height=20 style='height:15.0pt'>

  <td height=20 class=xl672136 width=163 style='height:15.0pt;width:122pt'>Other
  Services</td>
  <td class=xl672136 width=271 style='width:203pt'>&nbsp;</td>
 </tr>
 <tr height=60 style='height:45.0pt'>
  <td height=60 class=xl662136 width=163 style='height:45.0pt;width:122pt'>Support</td>
  <td class=xl662136 width=271 style='width:203pt'>Support based in
  Ireland.<span style='mso-spacerun:yes'>  </span>In-house software support,
  one-stop-shop for all the Pharmacy’s support needs.</td>

 </tr>
 <tr height=120 style='height:90.0pt'>
  <td height=120 class=xl662136 width=163 style='height:90.0pt;width:122pt'>Hardware</td>
  <td class=xl662136 width=271 style='width:203pt'>Integra RX<span
  style='mso-spacerun:yes'>  </span>and Integra POS are not hardware-dependent,
  and you are free to choose your preferred hardware supplier; Ocuco will
  assist you in that choice and will work with the chosen hardware supplier for
  the success of the installation.</td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>

  <td width=163 style='width:122pt'></td>
  <td width=271 style='width:203pt'></td>
 </tr>
 <![endif]>
</table>

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