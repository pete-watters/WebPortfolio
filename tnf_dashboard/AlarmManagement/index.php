<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>TNF Monitoring System Dashboard</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="layout.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 7]>
	<link href="ie_style.css" rel="stylesheet" type="text/css" />
   <script type="text/javascript" src="js/ie_png.js"></script>
   <script type="text/javascript">
       ie_png.fix('.png, .button');
   </script>
<![endif]-->


<!-- jQuery  Includes -->
<link type="text/css" href="css/custom-theme/jquery-ui-1.8.4.custom.css" rel="stylesheet" />	
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>

<script type="text/javascript" language="javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="../js/jquery.dataTables.js"></script>
		
<!--<script src="../js/jquery.tablesorter.js" type="text/javascript"></script>-->



<style type="text/css" title="currentStyle">
			@import "css/demo_page.css";
			@import "css/demo_table.css";
		</style>

<!-- HighCharts  Includes -->
<script type="text/javascript" src="js/highcharts.js"></script>
<script type="text/javascript" src="js/highcharts.src.js"></script>
<!-- Begin Traffic Light Code -->

<link rel="stylesheet" type="text/css" href="spiderscript_complete_v1.0.8.20090939.css" />
<script language="JavaScript" src="spiderscript_complete_v1.0.8.20090930.js" type="text/javascript"></script>


<!-- Begin jQuery Declarations --> 
<script type="text/javascript">
			$(function(){

				// Accordion
				$("#accordion").accordion({ header: "h3" });
				
				$("#alarm_accordion").accordion({ header: "h3" });
				
				// Tabs
				$('#dashboard_tabs').tabs();
	

				// Vodafone Dialog			
				$('#vodafone_dialog').dialog({
					autoOpen: false,
					modal: true,
					width: 1000,
					height: 800,
					buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}
				});
				
				// Dialog Link
				$('#vodafone_dialog_link').click(function(){
					$('#vodafone_dialog').dialog('open');
					return false;
				});
				
				//hover states on the static widgets
				$('#vodafone_dialog_link, ul#icons li').hover(
					function() { $(this).addClass('ui-state-hover'); }, 
					function() { $(this).removeClass('ui-state-hover'); }
				);				
			});
		</script>		
<!-- End jQuery Declarations --> 



	<!--jQuery Alarm Data Table --> 
	<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#AlarmDataTable').dataTable();
			} );
		</script>
		
</head>

<body>
  <!-- header -->
<div class="inner_copy"></div>
  <div id="header">
    <div class="container">
    	<!-- .logo -->
    	<div class="logo">
      	<a href="index.html"><img src="images/tnf_logo.jpg" alt="" /></a>
      </div>
    	<!-- /.logo -->
      <!-- .slogan -->
      <div class="slogan">
      	<h1>TNF Customer Dashboard</h1>
      </div>
    
    </div>
  </div>
   
  
  <div id="dashboard_tabs">
			<ul>
				<li><a href="#tabs-1">Alarm Traffic Lights</a></li>
				<li><a href="#tabs-2">Alarm Data Table</a></li>
				<li><a href="#tabs-3">Alarm Management</a></li>		
			</ul>
			<!-- Start tabs 1 -> Map -->
			<div id="tabs-1">
		
				<div id="content">
					<div class="container">
						<div class="inside">
							<div class="wrapper">
								<table>
									<tr>
										<td>
										<center><h2> Vodafone</h2></center>
										  <!-- Traffic Light --> 
										  <iframe src = "VodafoneAlarmTrafficLight.php" width="100%" height="450" frameborder="0">
											<p>Your browser does not support iframes.</p>
											</iframe>
											
											<!-- Dialog button -->
										<p><center><a href="#" id="vodafone_dialog_link" class="ui-state-default ui-corner-all" style="text-decoration:none;">Vodafone</a></center></p>
										
										<!-- ui-dialog actual dialog contents DIV-->
											<div id="vodafone_dialog" title="Vodafone Sites">
											<p> 
											<div id="VodafoneAlarmTable" style="width:200px;height:120px;"></div>
											</p>
											</div>
										</td>
									</tr>
								 </table>
  	    </div>
  	  </div>
  	</div>
  </div>
		
		
		
		
			</div>
			
<!-- Start tabs 2 -> Alarm Data Table -->
  			
	<div id="tabs-2">
		<iframe src ="alarmTable.php" width="100%" height="600" frameborder="0">
			<p>Your browser does not support iframes.</p>
			</iframe>
  </div>
  
  <!-- End tabs 2 -> overview -->
  
   <!-- Start tabs 3 -> Customer Support issues -->
  	<div id="tabs-3">
	
	
	</div>
	
	 <!-- End tabs 3 -> Customer Support issues -->
	
		</div>
  
  
  
  <!-- footer -->
  <div id="footer">
  	<p><center>Developed by Peter Watters 30-9-2010</center></p>
  </div>
</body>
</html>

