
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