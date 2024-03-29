<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
        <head>
             <!--  

Make page auto refresh
			 <meta http-equiv="refresh" content="10">
                <meta http-Equiv="Cache-Control" Content="no-cache">
                <meta http-Equiv="Pragma" Content="no-cache">
                <meta http-Equiv="Expires" Content="0">
--> 

<link type="text/css" href="css/ui-lightness/jquery-ui-1.7.1.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
		<script type="text/javascript" src="js/jquery.dataTables.js"></script>
		
        
<link rel='stylesheet' type='text/css' href='spiderscript_complete_v1.0.8.20090930.css' />
<script language='JavaScript' src='spiderscript_base_v1.0.8.20090930.js' type='text/javascript'></script>

               <!-- Data table sorting function -->
               <script type="text/javascript" charset="utf-8">
                        jQuery.fn.dataTableExt.oSort['string-case-asc']  = function(x,y) {
                                return ((x < y) ? -1 : ((x > y) ?  1 : 0));
                                };

                        jQuery.fn.dataTableExt.oSort['string-case-desc'] = function(x,y) {
                                return ((x < y) ?  1 : ((x > y) ? -1 : 0));
                                };

                        $(document).ready(function() {
                                /*
                                Initialise DataTable and Sort on columns
                                0 and 4 - Severity and recieve time
                                */
                        $('.dataTable').dataTable( {
								"bJQueryUI": true,
                                "aaSorting": [ [0,'desc'], [4,'asc'] ],
                                "aoColumns": [
                                                null,
                                                null,
                                                { "sType": 'string-case' },
                                                null,
                                                null,
												null
                                                ]
                                        } );
                                } );
                        </script>

						
								
		<script type="text/javascript">
			$(function(){
				// Tabs
				$('#tabs').tabs();
				$('#tabs').tabs("rotate" , 15000 );
		});
		</script>
	

<style type="text/css" title="currentStyle">
			@import "css/AlarmTable.css";
		</style>

		 <script type="text/javascript" charset="utf-8">
			jQuery.fn.dataTableExt.oSort['string-case-asc']  = function(x,y) {
				return ((x < y) ? -1 : ((x > y) ?  1 : 0));
				};
				
			jQuery.fn.dataTableExt.oSort['string-case-desc'] = function(x,y) {
				return ((x < y) ?  1 : ((x > y) ? -1 : 0));
				};
				
			$(document).ready(function() {
		        	/* 
				Initialise DataTable and Sort on columns 
				0 and 4 - Severity and recieve time
				*/
			$('#AlarmTable').dataTable( {
				"aaSorting": [ [0,'desc'], [4,'asc'] ],
				"aoColumns": [
		                		null,
						null,
						{ "sType": 'string-case' },
						null,
						null
						]
					} );
					
					
				$('#AlarmTable2').dataTable( {
				"aaSorting": [ [0,'desc'], [4,'asc'] ],
				"aoColumns": [
		                		null,
						null,
						{ "sType": 'string-case' },
						null,
						null
						]
					} );	
				} );
			</script>
        </head>
        <body>
		
		
                                      
						
						
		<div id="tabs">
	<ul>
	        <li><a href="#tabs-1">Alarms</a></li>
			<li><a href="#tabs-2">Map</a></li>

            <li><a href="#tabs-3">Vodafone Ireland</a></li>

				
	</ul>
		
		
                
						
					<div id="tabs-1">
					 <!-- This is the beginning of the area to hold the traffic lights -->
                      <div id="content" align="center">
                        <div class="container">
                          <div class="inside">
                            <div class="wrapper">
                            
                            
                                <h2>Vodafone Ireland</h2><br />
                             <!-- Traffic Light --> 
<!-- Traffic Light --> 
	<div class='r' align="center">
	<div id="divTrafficLight" style="height:400px;width:200px;background-image:url(images/traffic_light.png);float:left;">
				
					<div ext="imagetoggle" id="togLightTop" style="margin-left:35px;margin-top:4px;float: left;display:none;" van="value">
<img src='images/traffic_light_red.png' value='red' selected/>
<img src='images/traffic_light_off.png' value='off'/>	</div>

 <div ext="imagetoggle" id="togLightMiddle" style="margin-left:35px;margin-top:4px;float: left;display:none;" van="value">
        <img src='images/traffic_light_amber.png' value='red' selected/><img src='images/traffic_light_off.png' value='on' />        </div>
 
	<div ext="imagetoggle" id="togLightBottom" style="margin-left:35px;margin-top:4px;float: left;display:none;" van="value">
        <img src='images/traffic_light_green.png' value='green' /><img src='images/traffic_light_off.png' value='selected' />        </div>


</div>
<br />
 </div>
                          </div>
                       	</div>
 					</div>
            </div>
			  
			  		
					<div id="tabs-2" style="height:1200px;width:1200px;">
					  	<!-- Div reference for MAP defined in AlarmMap above -->
            	<div id="AlarmMap" align="center"></div>   
            </div>		
					<div id="tabs-3" style="height:1200px;width:1200px;">

					<div id="container">
			<div class="full_width big">
				<center><i>Vodafone Ireland</i> Midas+ Alarm Monitor</center>
			</div>
			
			<div id="demo">
           <table cellpadding="0" cellspacing="0" border="0" class="display" id="AlarmTable">
	               <thead>
		       <tr>
			<th>Severity Level</th>
			<th>Customer</th>
                        <th>Host</th>
			<th>Issue</th>
			<th>Probe Alarm Time</th>
			<th>TNF Recieve Time</th>
		       </tr>
	             </thead>
	       <tbody>

        

	      </tbody>
	       <tfoot>
	        	<tr>
		              <th>Severity Level</th>
                              <th>Customer</th>
                              <th>Host</th>
                              <th>Issue</th>
                              <th>Probe Alarm Time</th>
                              <th>TNF Recieve Time</th>
                       </tr>
	       </tfoot>
              </table>
			  
			  
			  <table cellpadding="0" cellspacing="0" border="0" class="display" id="AlarmTable2">
	               <thead>
		       <tr>
			<th>Severity Level</th>
			<th>Customer</th>
                        <th>Host</th>
			<th>Issue</th>
			<th>Probe Alarm Time</th>
			<th>TNF Recieve Time</th>
		       </tr>
	             </thead>
	       <tbody>

                  

	      </tbody>
	       <tfoot>
	        	<tr>
		              <th>Severity Level</th>
                              <th>Customer</th>
                              <th>Host</th>
                              <th>Issue</th>
                              <th>Probe Alarm Time</th>
                              <th>TNF Recieve Time</th>
                       </tr>
	       </tfoot>
              </table>
			</div>	
			
		</div>
					
					
					 <table cellpadding="0" cellspacing="0" border="0" class="display dataTable" id="VFIE">
                       <thead>
                       <tr>
                        <th>Severity Level</th>
                        <th>Customer</th>
                        <th>Host</th>
                        <th>Issue</th>

                        <th>Probe Alarm Time</th>
                        <th>TNF Recieve Time</th>
                       </tr>
                     </thead>
               <tbody>

                 <tr class="gradeX"><td style="height:30px">CRITICAL</td><td style="height:30px">VFIE</td><td style="height:30px">VFIE_test_probe</td><td style="height:30px">DISK CRITICAL - free space: / 557 MB (1% inode=92%):</td><td style="height:30px">Thu Jan 5 11:54:07 UTC 2012</td><td style="height:30px">Thu Jan  5 11:45:07 UTC 2012</td></tr>

<tr class="gradeX"><td style="height:30px">CRITICAL</td><td style="height:30px">VFIE</td><td style="height:30px">VFIE_test_probe</td><td style="height:30px">CRITICAL - File production in /apps/midas/bin/MANAGE/process/dacas/log/ is 0, lower than 10</td><td style="height:30px">Thu Jan 5 11:42:02 UTC 2012</td><td style="height:30px">Thu Jan  5 11:35:06 UTC 2012</td></tr>
<tr class="gradeX"><td style="height:30px">CRITICAL</td><td style="height:30px">VFIE</td><td style="height:30px">VFIE_test_probe</td><td style="height:30px">RAID CRITICAL: 3 arrays not ok - Array MD0 is in state clean, degraded (raid1), Array MD1 is in state active, degraded (raid10), Array MD2 is in state</td><td style="height:30px">Thu Jan 5 11:35:57 UTC 2012</td><td style="height:30px">Thu Jan  5 11:30:06 UTC 2012</td></tr>
<tr class="gradeC"><td style="height:30px">WARNING</td><td style="height:30px">VFIE</td><td style="height:30px">VFIE_test_probe</td><td style="height:30px">DISK WARNING - free space: /apps 20640 MB (20% inode=99%):</td><td style="height:30px">Thu Jan 5 12:41:25 UTC 2012</td><td style="height:30px">Thu Jan  5 12:35:06 UTC 2012</td></tr>

<tr class="gradeC"><td style="height:30px">WARNING</td><td style="height:30px">VFIE</td><td style="height:30px">CdcGnProbe</td><td style="height:30px">WARNING - Some Physical Disk state is not good</td><td style="height:30px">Thu Jan 5 11:47:46 UTC 2012</td><td style="height:30px">Thu Jan  5 11:40:05 UTC 2012</td></tr>
<tr class="gradeA"><td style="height:30px">OK</td><td style="height:30px">VFIE</td><td style="height:30px">VFIE_test_probe</td><td style="height:30px">OK - Speed 747 Mbps</td><td style="height:30px">Thu Jan 5 11:38:14 UTC 2012</td><td style="height:30px">Thu Jan  5 11:30:07 UTC 2012</td></tr>
<tr class="gradeA"><td style="height:30px">OK</td><td style="height:30px">VFIE</td><td style="height:30px">CtwGnProbe</td><td style="height:30px">OK - Speed 759 Mbps</td><td style="height:30px">Thu Jan 5 11:33:35 UTC 2012</td><td style="height:30px">Thu Jan  5 11:25:25 UTC 2012</td></tr>

<tr class="gradeA"><td style="height:30px">OK</td><td style="height:30px">VFIE</td><td style="height:30px">CtwGnProbe</td><td style="height:30px">OK - Raid in good status</td><td style="height:30px">Thu Jan 5 11:27:46 UTC 2012</td><td style="height:30px">Thu Jan  5 11:20:06 UTC 2012</td></tr>
<tr class="gradeA"><td style="height:30px">OK</td><td style="height:30px">VFIE</td><td style="height:30px">VFIE_test_probe</td><td style="height:30px">DISK OK - free space: /apps 22591 MB (22% inode=99%):</td><td style="height:30px">Thu Jan 5 11:02:11 UTC 2012</td><td style="height:30px">Thu Jan  5 10:55:29 UTC 2012</td></tr>
              </tbody>
               <tfoot>

                        <tr>
                              <th>Severity Level</th>
                              <th>Customer</th>
                              <th>Host</th>
                              <th>Issue</th>
                              <th>Probe Alarm Time</th>

                              <th>TNF Recieve Time</th>
                       </tr>
               </tfoot>
              </table>
            </div>		
					
					
		
			
</div>
	
            
			
        </body>
</html>

