<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>jQuery UI Example Page</title>
		<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.5.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.5.custom.min.js"></script>
		<script type="text/javascript">
			$(function(){
				// Tabs
				$('#tabs').tabs();
				
				$('#tabs').tabs("rotate" , 5000 );

				
			});
		</script>
		
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
				<li><a href="#tabs-3">Table</a></li>
                <li><a href="#tabs-4">ff</a></li>
			</ul>
			<div id="tabs-1" style="height:600px;width:1200px;">
            
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><iframe src="jQ_index.php" height="300px" width="600px" align="middle"></iframe></td>
                    <td><iframe src="jQ_index.php" height="300px" width="600px" align="middle"></iframe></td>
                  </tr>
                  <tr>
                    <td><iframe src="jQ_index.php" height="300px" width="600px" align="middle"></iframe></td>
                    <td><iframe src="jQ_index.php" height="300px" width="600px" align="middle"></iframe></td>
                  </tr>
                </table>

            
            
                       
            </div>
			<div id="tabs-2">
            <div id="AlarmMap"></div>
            
            </div>
			<div id="tabs-3">
            
            
            
            
             <!-- content -->
  <div id="content">
  	<div class="container">
  	  <div class="inside">
  	    <div class="wrapper">
		
		<table>
		<tr><td>
		<h2>Vodafone Ireland</h2><br />
			<img src="irish_flag.gif" /> <br />
  	      <!-- Traffic Light --> 
		  <iframe src ="vodafone_traffic_light.html" width="100%" height="450" frameborder="0" align="middle">
			<p>Your browser does not support iframes.</p>
			</iframe>
	
					
			<!-- Dialog button -->
		<p>
        <a href="#" id="vodafone_dialog_link" class="ui-state-default ui-corner-all" style="text-decoration:none;">	         Vodafone Ireland</a></p>
			
			</td>
			<td>
			<h2>T-Mobile USA</h2><br />
            
            <img src="USA_flag.gif" /> <br />
  	      <!-- Traffic Light --> 
			<iframe src ="tmobile_traffic_light.html" width="100%" height="450" frameborder="0">
			<p>Your browser does not support iframes.</p>
			</iframe>
		
			
			
			
			
			<p><a href="#" id="tmobile_dialog_link" class="ui-state-default ui-corner-all" style="text-decoration:none;">T-Mobile USA</a>
            </p>
			
			</td>
			<td>
		<h2>Vodafone Italy</h2><br />        
			<img src="roman_flag.png" /> <br />
  	      <!-- Traffic Light --> 
			<iframe src ="rogers_traffic_light.html" width="100%" height="450" frameborder="0">
			<p>Your browser does not support iframes.</p>
			</iframe>
		
			
			<p>
            <a href="#" id="rogers_dialog_link" class="ui-state-default ui-corner-all" style="text-decoration:none;">Vodafone Italy</a></p>
			
			
			</td>
			<td>
			<h2>Vodacom</h2><br />
            
			<img src="SA_flag.gif" /> <br />
  	      <!-- Traffic Light --> 
			<iframe src ="mone_traffic_light.html" width="100%" height="450" frameborder="0">
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
        
        <div id="tabs-4">
        	<div id="container">
			<div class="full_width big">
				<i>DataTables</i> zero configuration example
			</div>
			<div id="demo">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>

			<th>Rendering engine</th>
			<th>Browser</th>
			<th>Platform(s)</th>
			<th>Engine version</th>
			<th>CSS grade</th>
		</tr>

	</thead>
	<tbody>
		<tr class="odd gradeX">
			<td>Trident</td>
			<td>Internet
				 Explorer 4.0</td>
			<td>Win 95+</td>
			<td class="center"> 4</td>

			<td class="center">X</td>
		</tr>
		<tr class="even gradeC">
			<td>Trident</td>
			<td>Internet
				 Explorer 5.0</td>
			<td>Win 95+</td>
			<td class="center">5</td>

			<td class="center">C</td>
		</tr>
		<tr class="odd gradeA">
			<td>Trident</td>
			<td>Internet
				 Explorer 5.5</td>
			<td>Win 95+</td>
			<td class="center">5.5</td>

			<td class="center">A</td>
		</tr>
		<tr class="even gradeA">
			<td>Trident</td>
			<td>Internet
				 Explorer 6</td>
			<td>Win 98+</td>
			<td class="center">6</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd gradeA">
			<td>Trident</td>
			<td>Internet Explorer 7</td>
			<td>Win XP SP2+</td>
			<td class="center">7</td>

			<td class="center">A</td>
		</tr>
		<tr class="even gradeA">
			<td>Trident</td>
			<td>AOL browser (AOL desktop)</td>
			<td>Win XP</td>
			<td class="center">6</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Gecko</td>
			<td>Firefox 1.0</td>
			<td>Win 98+ / OSX.2+</td>
			<td class="center">1.7</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Gecko</td>
			<td>Firefox 1.5</td>
			<td>Win 98+ / OSX.2+</td>
			<td class="center">1.8</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Gecko</td>
			<td>Firefox 2.0</td>
			<td>Win 98+ / OSX.2+</td>
			<td class="center">1.8</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Gecko</td>
			<td>Firefox 3.0</td>
			<td>Win 2k+ / OSX.3+</td>
			<td class="center">1.9</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Gecko</td>
			<td>Camino 1.0</td>
			<td>OSX.2+</td>
			<td class="center">1.8</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Gecko</td>
			<td>Camino 1.5</td>
			<td>OSX.3+</td>
			<td class="center">1.8</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Gecko</td>
			<td>Netscape 7.2</td>
			<td>Win 95+ / Mac OS 8.6-9.2</td>
			<td class="center">1.7</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Gecko</td>
			<td>Netscape Browser 8</td>
			<td>Win 98SE+</td>
			<td class="center">1.7</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Gecko</td>
			<td>Netscape Navigator 9</td>
			<td>Win 98+ / OSX.2+</td>
			<td class="center">1.8</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Gecko</td>
			<td>Mozilla 1.0</td>
			<td>Win 95+ / OSX.1+</td>
			<td class="center">1</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Gecko</td>
			<td>Mozilla 1.1</td>
			<td>Win 95+ / OSX.1+</td>
			<td class="center">1.1</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Gecko</td>
			<td>Mozilla 1.2</td>
			<td>Win 95+ / OSX.1+</td>
			<td class="center">1.2</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Gecko</td>
			<td>Mozilla 1.3</td>
			<td>Win 95+ / OSX.1+</td>
			<td class="center">1.3</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Gecko</td>
			<td>Mozilla 1.4</td>
			<td>Win 95+ / OSX.1+</td>
			<td class="center">1.4</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Gecko</td>
			<td>Mozilla 1.5</td>
			<td>Win 95+ / OSX.1+</td>
			<td class="center">1.5</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Gecko</td>
			<td>Mozilla 1.6</td>
			<td>Win 95+ / OSX.1+</td>
			<td class="center">1.6</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Gecko</td>
			<td>Mozilla 1.7</td>
			<td>Win 98+ / OSX.1+</td>
			<td class="center">1.7</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Gecko</td>
			<td>Mozilla 1.8</td>
			<td>Win 98+ / OSX.1+</td>
			<td class="center">1.8</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Gecko</td>
			<td>Seamonkey 1.1</td>
			<td>Win 98+ / OSX.2+</td>
			<td class="center">1.8</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Gecko</td>
			<td>Epiphany 2.20</td>
			<td>Gnome</td>
			<td class="center">1.8</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Webkit</td>
			<td>Safari 1.2</td>
			<td>OSX.3</td>
			<td class="center">125.5</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Webkit</td>
			<td>Safari 1.3</td>
			<td>OSX.3</td>
			<td class="center">312.8</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Webkit</td>
			<td>Safari 2.0</td>
			<td>OSX.4+</td>
			<td class="center">419.3</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Webkit</td>
			<td>Safari 3.0</td>
			<td>OSX.4+</td>
			<td class="center">522.1</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Webkit</td>
			<td>OmniWeb 5.5</td>
			<td>OSX.4+</td>
			<td class="center">420</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Webkit</td>
			<td>iPod Touch / iPhone</td>
			<td>iPod</td>
			<td class="center">420.1</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Webkit</td>
			<td>S60</td>
			<td>S60</td>
			<td class="center">413</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Presto</td>
			<td>Opera 7.0</td>
			<td>Win 95+ / OSX.1+</td>
			<td class="center">-</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Presto</td>
			<td>Opera 7.5</td>
			<td>Win 95+ / OSX.2+</td>
			<td class="center">-</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Presto</td>
			<td>Opera 8.0</td>
			<td>Win 95+ / OSX.2+</td>
			<td class="center">-</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Presto</td>
			<td>Opera 8.5</td>
			<td>Win 95+ / OSX.2+</td>
			<td class="center">-</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Presto</td>
			<td>Opera 9.0</td>
			<td>Win 95+ / OSX.3+</td>
			<td class="center">-</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Presto</td>
			<td>Opera 9.2</td>
			<td>Win 88+ / OSX.3+</td>
			<td class="center">-</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Presto</td>
			<td>Opera 9.5</td>
			<td>Win 88+ / OSX.3+</td>
			<td class="center">-</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Presto</td>
			<td>Opera for Wii</td>
			<td>Wii</td>
			<td class="center">-</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Presto</td>
			<td>Nokia N800</td>
			<td>N800</td>
			<td class="center">-</td>

			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>Presto</td>
			<td>Nintendo DS browser</td>
			<td>Nintendo DS</td>
			<td class="center">8.5</td>

			<td class="center">C/A<sup>1</sup></td>
		</tr>
		<tr class="gradeC">
			<td>KHTML</td>
			<td>Konqureror 3.1</td>
			<td>KDE 3.1</td>

			<td class="center">3.1</td>
			<td class="center">C</td>
		</tr>
		<tr class="gradeA">
			<td>KHTML</td>
			<td>Konqureror 3.3</td>
			<td>KDE 3.3</td>

			<td class="center">3.3</td>
			<td class="center">A</td>
		</tr>
		<tr class="gradeA">
			<td>KHTML</td>
			<td>Konqureror 3.5</td>
			<td>KDE 3.5</td>

			<td class="center">3.5</td>
			<td class="center">A</td>
		</tr>
		<tr class="gradeX">
			<td>Tasman</td>
			<td>Internet Explorer 4.5</td>
			<td>Mac OS 8-9</td>

			<td class="center">-</td>
			<td class="center">X</td>
		</tr>
		<tr class="gradeC">
			<td>Tasman</td>
			<td>Internet Explorer 5.1</td>
			<td>Mac OS 7.6-9</td>

			<td class="center">1</td>
			<td class="center">C</td>
		</tr>
		<tr class="gradeC">
			<td>Tasman</td>
			<td>Internet Explorer 5.2</td>
			<td>Mac OS 8-X</td>

			<td class="center">1</td>
			<td class="center">C</td>
		</tr>
		<tr class="gradeA">
			<td>Misc</td>
			<td>NetFront 3.1</td>
			<td>Embedded devices</td>

			<td class="center">-</td>
			<td class="center">C</td>
		</tr>
		<tr class="gradeA">
			<td>Misc</td>
			<td>NetFront 3.4</td>
			<td>Embedded devices</td>

			<td class="center">-</td>
			<td class="center">A</td>
		</tr>
		<tr class="gradeX">
			<td>Misc</td>
			<td>Dillo 0.8</td>
			<td>Embedded devices</td>

			<td class="center">-</td>
			<td class="center">X</td>
		</tr>
		<tr class="gradeX">
			<td>Misc</td>
			<td>Links</td>
			<td>Text only</td>

			<td class="center">-</td>
			<td class="center">X</td>
		</tr>
		<tr class="gradeX">
			<td>Misc</td>
			<td>Lynx</td>
			<td>Text only</td>

			<td class="center">-</td>
			<td class="center">X</td>
		</tr>
		<tr class="gradeC">
			<td>Misc</td>
			<td>IE Mobile</td>
			<td>Windows Mobile 6</td>

			<td class="center">-</td>
			<td class="center">C</td>
		</tr>
		<tr class="gradeC">
			<td>Misc</td>
			<td>PSP browser</td>
			<td>PSP</td>

			<td class="center">-</td>
			<td class="center">C</td>
		</tr>
		<tr class="gradeU">
			<td>Other browsers</td>
			<td>All others</td>
			<td>-</td>

			<td class="center">-</td>
			<td class="center">U</td>
		</tr>
	</tbody>
	<tfoot>
		<tr>
			<th>Rendering engine</th>

			<th>Browser</th>
			<th>Platform(s)</th>
			<th>Engine version</th>
			<th>CSS grade</th>
		</tr>
	</tfoot>
</table>

			</div>

        </div>    
            
            
            </div>
		</div>

	</body>
</html>


