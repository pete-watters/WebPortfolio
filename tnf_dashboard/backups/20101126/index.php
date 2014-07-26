<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>TNF Midas+ Alarm Dashboard</title>
		<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.5.custom.css" rel="stylesheet" />	

		<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.5.custom.min.js"></script>




		<script type="text/javascript">
			$(function(){
				// Tabs
				$('#tabs').tabs();
				$('#tabs').tabs("rotate" , 15000 );





			});
		</script>


		
        <!-- Begin Google MAP Code -->
		  <script type="text/javascript" src="http://www.google.com/jsapi"></script>
          <script type="text/javascript">
            google.load('visualization', '1', {packages: ['geomap']});        
            function drawVisualization() {
              var data = new google.visualization.DataTable();
              data.addRows(17);
              data.addColumn('string', 'Country');
              data.addColumn('number', 'Warning Level');
              data.setValue(0, 0, 'Germany');
              data.setValue(0, 1, 0);
              data.setValue(1, 0, 'United States');
              data.setValue(1, 1, 1);
              data.setValue(2, 0, 'Brazil');
              data.setValue(2, 1, 0);
              data.setValue(3, 0, 'Canada');
              data.setValue(3, 1, 2);
              data.setValue(4, 0, 'France');
              data.setValue(4, 1, 1);
              data.setValue(5, 0, 'RU');
              data.setValue(5, 1, 0);
              data.setValue(6, 0, 'Australia');
              data.setValue(6, 1, 2);	  
              data.setValue(7, 0, 'Portugal');
              data.setValue(7, 1, 0);	  
              data.setValue(8, 0, 'Italy');
              data.setValue(8, 1, 0);	  
              data.setValue(9, 0, 'Spain');
              data.setValue(9, 1, 0);	  
              data.setValue(10, 0, 'Austria');
              data.setValue(10, 1, 0);	  
              data.setValue(11, 0, 'Eygpt');
              data.setValue(11, 1, 0);	  
              data.setValue(12, 0, 'Singapore');
              data.setValue(12, 1, 0);	  
              data.setValue(13, 0, 'Romania');
              data.setValue(13, 1, 0);	  
              data.setValue(14, 0, 'UK');
              data.setValue(14, 1, 0);	  
              data.setValue(15, 0, 'South Africa');
              data.setValue(15, 1, 0);	  
              data.setValue(16, 0, 'Czech Republic');
              data.setValue(16, 1, 0);
              
             var options = {};
                  options['colors'] = [0x7FFF00, 0xFFFF00, 0xFF0000]; //colours - green, yellow, red
                  options['dataMode'] = 'markers';      
                  options['width'] = '1200px';    
                  options['height'] = '600px';      
              
              var geomap = new google.visualization.GeoMap(
                  document.getElementById('AlarmMap'));
              geomap.draw(data, options );
            }
            google.setOnLoadCallback(drawVisualization);
          </script>
             <!-- End Google MAP Code -->   
        
        
        <style type="text/css" title="currentStyle">
			@import "css/demo_page.css";
			@import "css/demo_table.css";
		</style>
		<script type="text/javascript" language="javascript" src="js/jquery.js"></script>

		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>

		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable();
			} );
		</script>

	</head>
	<body>
		<div id="tabs">
			<ul>
				<li><a href="#tabs-1">Alarms</a></li>
				<li><a href="#tabs-2">Map</a></li>

				<!--
                <li><a href="#tabs-3">Issue Table</a></li>
                <li><a href="#tabs-4">Site Overview</a></li> -->
			</ul>
            
            <!-- Start tabs-1 -->
			<div id="tabs-1" style="height:1200px;width:1200px;">
                     <!-- This is the beginning of the area to hold the traffic lights -->
                      <div id="content" align="center">
                        <div class="container">
                          <div class="inside">
                            <div class="wrapper">

                            
                              <table>
                               <tr><td>
                                <h2>Vodafone Ireland</h2><br />
                                <img src="irish_flag.gif" /> <br />
                                
                                <!-- Vodafone Ireland Traffic Light --> 
                                <iframe src ="VodafoneIrelandAlarmTrafficLight.php" width="100%" height="450" frameborder="0" align="middle">
                               
                                <p>Your browser does not support iframes.</p>
                                </iframe>
                                <!-- Dialog button -->
                                 <p>

                                <a href="#" id="vodafone_dialog_link" class="ui-state-default ui-corner-all" style="text-decoration:none;">	         Vodafone Ireland</a></p>
                                </td>
                                
                                <td>
                                <h2>T-Mobile USA</h2><br />
                                
                                <img src="USA_flag.gif" /> <br />
                                <!-- T-Mobile USA Traffic Light --> 
                                <iframe src ="TmobileUSAAlarmTrafficLight.php" width="100%" height="450" frameborder="0">
                                <p>Your browser does not support iframes.</p>
                                </iframe>

                                <p><a href="#" id="tmobile_dialog_link" class="ui-state-default ui-corner-all" style="text-decoration:none;">T-Mobile USA</a>
                                </p>
                                </td>
                            
                               <td>
                               <h2>Vodafone Italy</h2><br />        
                                <img src="roman_flag.png" /> <br />
                              
                               <!-- Vodafone Italy Traffic Light --> 
                               <iframe src ="VodafoneItalyAlarmTrafficLight.php" width="100%" height="450" frameborder="0">
                               <p>Your browser does not support iframes.</p>
                               </iframe>

                                                           
                                <p>
                                <a href="#" id="rogers_dialog_link" class="ui-state-default ui-corner-all" style="text-decoration:none;">Vodafone Italy</a></p>
                                </td>
                                
                                <td>
                                <h2>Vodacom</h2><br />
                                <img src="SA_flag.gif" /> <br />
                                
                              <!-- Vodacom Traffic Light --> 
                                <iframe src ="VodafoneSouthAfricaAlarmTrafficLight.php" width="100%" height="450" frameborder="0">
                                <p>Your browser does not support iframes.</p>
                                </iframe>

                                                       
                                <p><a href="#" id="mone_dialog_link" style="text-decoration:none;" class="ui-state-default ui-corner-all">Vodacom</a></p>
                                                               
                               					 </td>
                              				  </tr>
                            			 </table>
                           			 </div>
                         		 </div>
                       		 </div>
 						 </div>

			 <!-- This is the beginning of the area to hold the traffic lights -->
                                  
            </div>
            <!--End of tab 1 --> 
            
            <!-- Start of tab 2 -->
			<div id="tabs-2" style="height:1200px;width:1200px;">
            	<!-- Div reference for MAP defined in Javascript above -->
            	<div id="AlarmMap" align="center"></div>
            </div>
            <!-- End tabs 2 -->  
             
            
            <!-- Start tabs-3 -->            
           <!-- <div id="tabs-3" style="height:1200px;width:1200px;">
            
            </div>
            -->

            <!-- End tabs-3 -->
            
            <!-- End tabs-4 -->
            <!--
			<div id="tabs-4" style="height:1200px;width:1200px;">
            
             <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                  </tr>
                </table>
				</div>-->
                <!--<iframe src="jQ_index.php" height="300px" width="600px" align="middle"></iframe>-->
                <!--End tabs-4 -->
        </div>
	</body>
</html>

