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
        
	</head>
	<body>
		<div id="tabs">
			<ul>
				<li><a href="#tabs-1">Alarms</a></li>
				<li><a href="#tabs-2">Map</a></li>
				<li><a href="#tabs-3">Table</a></li>
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
			<div id="tabs-3"></div>
		</div>

	</body>
</html>


