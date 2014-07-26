<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title></title>
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



<!-- HighCharts  Includes -->
<script type="text/javascript" src="js/highcharts.js"></script>
<script type="text/javascript" src="js/highcharts.src.js"></script>
<!-- Begin Traffic Light Code -->

<link rel="stylesheet" type="text/css" href="spiderscript_complete_v1.0.8.20090939.css" />
<script language="JavaScript" src="spiderscript_complete_v1.0.8.20090930.js" type="text/javascript"></script>
<script type="text/javascript">
		
			var sequence = 	function(top,middle,bottom,delay)
							{
								this.top = (top) ? top : "off";
								this.middle = (middle) ? middle : "off";
								this.bottom = (bottom) ? bottom : "off";
								this.delay = (delay) ? delay : 5000;
							};
		
			var sequences = [];
			
			sequences.add(new sequence("red","off","off",5000));
			sequences.add(new sequence("red","amber","off",1500));
			sequences.add(new sequence("off","off","green",5000));
			sequences.add(new sequence("off","amber","off",2000));
		
			var seqi = 0;
			function stepSequence()
			{
				var lightTop = $gc("togLightTop");
				var lightMiddle = $gc("togLightMiddle");
				var lightBottom = $gc("togLightBottom");
				
				var seq = sequences[seqi];
					
				if(lightTop && lightMiddle && lightBottom)
				{
					lightTop.selected(seq.top);
					lightMiddle.selected(seq.middle);
					lightBottom.selected(seq.bottom);
				}
			
				
				seqi++;
				if(seqi >= $ln(sequences))
				{
					seqi = 0;
				}
				
				$st(function(){stepSequence();},seq.delay);
			}
		
		</script>
<!-- End Traffic Light Code -->		



<!-- Begin jQuery Declarations --> 
<script type="text/javascript">
			$(function(){

				// Accordion
				$("#accordion").accordion({ header: "h3" });
	
				// Tabs
				$('#dashboard_tabs').tabs();
				
				$('#dashboard_tabs').tabs("rotate" , 10000, false );

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
				
				// T-Mobile Dialog			
				$('#tmobile_dialog').dialog({
					autoOpen: false,
					width: 600,
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
				$('#tmobile_dialog_link').click(function(){
					$('#tmobile_dialog').dialog('open');
					return false;
				});
				
				//hover states on the static widgets
				$('#tmobile_dialog_link, ul#icons li').hover(
					function() { $(this).addClass('ui-state-hover'); }, 
					function() { $(this).removeClass('ui-state-hover'); }
				);
				
				
				// Rogers Dialog			
				$('#rogers_dialog').dialog({
					autoOpen: false,
					width: 600,
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
				$('#rogers_dialog_link').click(function(){
					$('#rogers_dialog').dialog('open');
					return false;
				});
				
				//hover states on the static widgets
				$('#rogers_dialog_link, ul#icons li').hover(
					function() { $(this).addClass('ui-state-hover'); }, 
					function() { $(this).removeClass('ui-state-hover'); }
				);
				
				// MONE Dialog			
				$('#mone_dialog').dialog({
					autoOpen: false,
					width: 600,
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
				$('#mone_dialog_link').click(function(){
					$('#mone_dialog').dialog('open');
					return false;
				});
				
				//hover states on the static widgets
				$('#mone_dialog_link, ul#icons li').hover(
					function() { $(this).addClass('ui-state-hover'); }, 
					function() { $(this).removeClass('ui-state-hover'); }
				);
				
				
			});
		</script>

		
<!-- End jQuery Declarations --> 

<!-- Google API Data Table -> Vodafone Probes -->
   <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1', {packages: ['table']});
    </script>
    <script type="text/javascript">
    function drawVisualization() {
      // Create and populate the data table.
      var vodafone_JSONObject = {
          cols: [
            {id: 'cx_code', label: 'Customer', type: 'string'},
            {id: 'site', label: 'Site', type: 'string'},
            {id: 'ip_address', label: 'IP', type: 'string'},
			{id: 'dacas_version', label: 'dacas_version', type: 'string'},
            {id: 'feed', label: 'Feed', type: 'boolean'},
            {id: 'diskSpace', label: 'Disc Space', type: 'boolean'},
            {id: 'TDR_Production', label: 'TDR Production', type: 'boolean'},
            {id: 'TouchpointCollection', label: 'Touchpoint Collection', type: 'boolean'}         
                ],
          rows: [{c:[{v: 'VFPT'},{v: 'Alfragide'}, {v: '10.2.37.197'},{v: '4.3.3'}, {v: true}, {v: false}, {v: true}, {v: true}]},
                 {c:[{v: 'VFPT'},{v: 'Boavista'}, {v: '10.128.37.97'},{v: '4.3.3'}, {v: false}, {v: true}, {v: true}, {v: true}]},
                 {c:[{v: 'VFPT'},{v: 'Matinha'}, {v: '10.16.37.97'},{v: '4.3.3'}, {v: true}, {v: false}, {v: true}, {v: true}]},
                 {c:[{v: 'VFPT'},{v: 'Ranha'}, {v: '10.130.37.97'},{v: '4.3.3'}, {v: true}, {v: false}, {v: false}, {v: false}]}]};
    
      var data = new google.visualization.DataTable(vodafone_JSONObject, 0.5);
    
      // Create and draw the visualization.
      visualization = new google.visualization.Table(document.getElementById('vodafone_table'));
      visualization.draw(data, {'allowHtml': true});
    }
    

    google.setOnLoadCallback(drawVisualization);
    </script>
	
	
	
	
	
	
	
	
	
	
	

	<!-- Probe location maps -->
	  <script type="text/javascript">
      google.load("visualization", "1", {packages:["map"]});
      google.setOnLoadCallback(drawMap);
      function drawMap() {
        var data = new google.visualization.DataTable();
        data.addColumn('number', 'Lat');
        data.addColumn('number', 'Lon');
        data.addColumn('string', 'Name');
        data.addRows(4);
        data.setCell(0, 0, 38.731294);
        data.setCell(0, 1, -9.207855);
        data.setCell(0, 2, 'VFPT Alfragide');
        data.setCell(1, 0, 33.68466);
        data.setCell(1, 1, -117.795637);
        data.setCell(1, 2, 'T-Mobile Irvine');
        data.setCell(2, 0, 45.509018);
        data.setCell(2, 1, -73.555035);
        data.setCell(2, 2, 'Rogers Montreal');
        data.setCell(3, 0, 1.352669);
        data.setCell(3, 1, 103.804264);
        data.setCell(3, 2, 'MobOne Singapore');

		
		var map_table = new google.visualization.Table(document.getElementById('map_table_div'));
        map_table.draw(data);

        var map = new google.visualization.Map(document.getElementById('map_div'));
        map.draw(data, {showTip: true});
      }
    </script>
	
	
	
	
	
	<!-- CSI table --> 
	
	 <script type="text/javascript">
    function drawVisualization() {
      // Create and populate the data table.
      var CSI_JSONObject = {
          cols: [
            {id: 'cx_code', label: 'Customer', type: 'string'},
            {id: 'site', label: 'Site', type: 'string'},
            {id: 'ip_address', label: 'IP', type: 'string'},
            {id: 'jira_ref', label: 'JIRA Ticket', type: 'string'},
            {id: 'jira_ticket_description', label: 'JIRA Ticket Description', type: 'string'},
            {id: 'priority', label: 'Priority', type: 'string'},
            {id: 'log_date', label: 'Log Date', type: 'string'}         
                ],
          rows: [{c:[{v: 'VFPT'},{v: 'Alfragide'}, {v: '10.2.37.197'}, {v: 'CSM-VFPT1'}, {v: 'No FTP access'}, {v: 'Critical'}, {v: '2010-09-18'}]},
                 {c:[{v: 'VFPT'},{v: 'Boavista'}, {v: '10.128.37.97'}, {v: 'CSM-VFPT12'}, {v: 'Box making strange noise'}, {v: 'Major'}, {v: '2010-09-01'}]},
                 {c:[{v: 'VFPT'},{v: 'Matinha'}, {v: '10.16.37.97'}, {v: 'CSM-VFPT14'}, {v: 'Change request to LIF'}, {v: 'Minor'}, {v: '2010-08-10'}]},
                 {c:[{v: 'VFPT'},{v: 'Ranha'}, {v: '10.130.37.97'}, {v: 'CSM-VFPT19'}, {v: 'Training request for MoMo'}, {v: 'Minor'}, {v: '2010-07-01'}]}]};
    
      var CSI_data = new google.visualization.DataTable(CSI_JSONObject, 0.5);
    
      // Create and draw the visualization.
      visualization = new google.visualization.Table(document.getElementById('CSI_table_div'));
      visualization.draw(CSI_data, {'allowHtml': true});
    }
    

    google.setOnLoadCallback(drawVisualization);
    </script>
	
	
	<!-- HighCharts CSI issues column -->

<!-- 2. Add the JavaScript to initialize the chart on document ready -->
		<script type="text/javascript">
		
			var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'CSI_issues_container',
						defaultSeriesType: 'column'
					},
					title: {
						text: 'Outstanding CSIs'
					},
					xAxis: {
						categories: [
							'Vodafone', 
							'T-Mobile', 
							'Rogers', 
							'M-One'
						]
					},
					yAxis: {
						min: 0,
						title: {
							text: 'Jira Tickets (issues)'
						}
					},
					legend: {
						layout: 'vertical',
						backgroundColor: '#FFFFFF',
						align: 'left',
						verticalAlign: 'top',
						x: 100,
						y: 70
					},
					tooltip: {
						formatter: function() {
							return ''+
								this.x +': '+ this.y +' issues';
						}
					},
					plotOptions: {
						column: {
							pointPadding: 0.2,
							borderWidth: 0
						}
					},
				        series: [{
						name: 'Critical',
						data: [49, 71, 10, 12]
				
					}, {
						name: 'Major',
						data: [83, 78, 98, 93]
				
					}, {
						name: 'Minor',
						data: [48, 38, 39, 41]
				
					}, {
						name: 'Resolved',
						data: [42, 33, 34, 39]
				
					}]
				});
				
				
			});
				
		</script>


<!-- Operations ORG Chart -->
<script type="text/javascript">
      google.load('visualization', '1', {packages: ['orgchart']});
    </script>
    <script type="text/javascript">
      function drawVisualization() {
        // Create and populate the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('string', 'Manager');
        data.addColumn('string', 'ToolTip');
        data.addRows(9);
        data.setCell(0, 0, 'Aidan McHugh', 'Aidan McHugh<br/><font color="red"><i>Customer Relations Manager<i></font><br /> <i>Extension: x15</i>');
        data.setCell(0, 2, 'The President');
        data.setCell(1, 0, 'Tom Kelly', 'Tom Kelly<br/><font color="red"><i>Support Manager<i></font><br /> <i>Extension: x16</i>');
        data.setCell(1, 1, 'Aidan McHugh');
        data.setCell(2, 0, 'Dave Fitzgibbon', 'Dave Fitzgibbon<br/><font color="red"><i>Deployments Manager<i></font><br /> <i>Extension: x17</i>');
        data.setCell(2, 1, 'Aidan McHugh');
        data.setCell(3, 0, 'Peter Watters', 'Peter Watters<br/><font color="red"><i>Operations Support<i></font><br /> <i>Extension: x18</i>');
        data.setCell(3, 1, 'Tom Kelly');
        data.setCell(4, 0, 'Rafal Kowalski', 'Rafal Kowalski<br/><font color="red"><i>Operations Support<i></font><br /> <i>Extension: x19</i>');
        data.setCell(4, 1, 'Tom Kelly');
		data.setCell(5, 0, 'Andrea Ceresoni', 'Andrea Ceresoni<br/><font color="red"><i>Operations Support<i></font><br /> <i>Extension: x20</i>');
        data.setCell(5, 1, 'Tom Kelly');
		data.setCell(6, 0, 'Colm McCarthy', 'Colm McCarthy<br/><font color="red"><i>Operations Deployments<i></font><br /> <i>Extension: x21</i>');
        data.setCell(6, 1, 'Dave Fitzgibbon');
		data.setCell(7, 0, 'Dave McGettigan', 'Dave McGettigan<br/><font color="red"><i>Operations Deployments<i></font><br /> <i>Extension: x22</i>');
        data.setCell(7, 1, 'Dave Fitzgibbon');
		data.setCell(8, 0, 'Martin Kacerovsky', 'Martin Kacerovsky<br/><font color="red"><i>Operations Deployments<i></font><br /> <i>Extension: x23</i>');
        data.setCell(8, 1, 'Dave Fitzgibbon');
	  
        // Create and draw the visualization.
        new google.visualization.OrgChart(document.getElementById('org_chart_div')).
            draw(data, {allowHtml: true});
      }
      

      google.setOnLoadCallback(drawVisualization);
    </script>

<!-- Google API Data Table -> Support Resources -->
    <script type="text/javascript">
      google.load('visualization', '1', {packages: ['table']});
    </script>
    <script type="text/javascript">
    function drawVisualization() {
      // Create and populate the data table.
      var vodafone_JSONObject = {
          cols: [
            {id: 'engineer', label: 'Engineer', type: 'string'},
            {id: 'location', label: 'Location', type: 'string'},
            {id: 'in_office', label: 'In Office', type: 'boolean'},
            {id: 'return_date', label: 'Return Date', type: 'String'}       
                ],
          rows: [{c:[{v: 'Tom Kelly'},{v: 'Dublin'}, {v: true},{v: '-'}]},
                 {c:[{v: 'Rafal Kowalski'},{v: 'Dublin'}, {v: true},{v: '-'}]},
				 {c:[{v: 'Andrea Cerosoni'},{v: 'Dublin'}, {v: true},{v: '-'}]},
				 {c:[{v: 'Peter Watters'},{v: 'Dublin'}, {v: false},{v: '2010-09-30'}]}
				 ]};
    
      var data = new google.visualization.DataTable(vodafone_JSONObject, 0.5);
    
      // Create and draw the visualization.
      visualization = new google.visualization.Table(document.getElementById('support_resource_table'));
      visualization.draw(data, {'allowHtml': true});
    }
    

    google.setOnLoadCallback(drawVisualization);
    </script>
	<!-- Google API Data Table -> Support Resources -->
    <script type="text/javascript">
      google.load('visualization', '1', {packages: ['table']});
    </script>
    <script type="text/javascript">
    function drawVisualization() {
      // Create and populate the data table.
      var vodafone_JSONObject = {
          cols: [
            {id: 'engineer', label: 'Engineer', type: 'string'},
            {id: 'location', label: 'Location', type: 'string'},
            {id: 'in_office', label: 'In Office', type: 'boolean'},
            {id: 'return_date', label: 'Return Date', type: 'String'},
            {id: 'next_trip', label: 'Next Trip', type: 'String'}      
                ],
          rows: [{c:[{v: 'Dave Fitzgibbon'},{v: 'Dublin'}, {v: true},{v: '-'}, {v: '-'}]},
                 {c:[{v: 'Dave McGettigan'},{v: 'China'}, {v: false},{v: '2010-09-29'}, {v: 'Rome 2010-10-11'}]},
				 {c:[{v: 'Colm McCarthy'},{v: 'Dublin'}, {v: true},{v: '-'}, {v: 'Capetown 2010-10-16'}]},
				 {c:[{v: 'Martin Kacerovsky'},{v: 'Dublin'}, {v: false},{v: '2010-09-30'}, {v: 'Montreal 2010-09-20'}]}
				 ]};
    
      var data = new google.visualization.DataTable(vodafone_JSONObject, 0.5);
    
      // Create and draw the visualization.
      visualization = new google.visualization.Table(document.getElementById('deployment_resource_table'));
      visualization.draw(data, {'allowHtml': true});
    }
    

    google.setOnLoadCallback(drawVisualization);
    </script>
		
</head>

<body >
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
				<li><a href="#tabs-1">Probe Locations</a></li>
				<li><a href="#tabs-2">Alarms</a></li>
				<li><a href="#tabs-3">CSI's</a></li>		
				<li><a href="#tabs-4">Ops Resources</a></li>

			</ul>
		
			<!-- Start tabs 1 -> Map -->
			<div id="tabs-1">
			<table>
			<tr>
			<td>
			 <div id="map_div" style="width:1000px;height:500px"></div>
			</td>
			<td>	
			<div id="map_table_div" style="width:400px;height:500px"></div>
			</td>
			</tr>
			</table>
			</div>
			
<!-- Start tabs 2 -> overview -->
  			
	<div id="tabs-2">
  
  <!-- content -->
  <div id="content">
  	<div class="container">
  	  <div class="inside">
  	    <div class="wrapper">
		
		<table>
		<tr><td>
		<center><h2> Vodafone</h2></center>
  	      <!-- Traffic Light --> 
		  <iframe src ="vodafone_traffic_light.html" width="100%" height="450" frameborder="0">
			<p>Your browser does not support iframes.</p>
			</iframe>
	
					
			<!-- Dialog button -->
		<p><center><a href="#" id="vodafone_dialog_link" class="ui-state-default ui-corner-all" style="text-decoration:none;">Vodafone</a></center></p>
			
			
			<!-- ui-dialog actual dialog contents DIV-->
		<div id="vodafone_dialog" title="Vodafone Sites">
			<p> <div id="vodafone_table"></div></p>
		</div>
			
			</td>
			<td>
			<center><h2> T-Mobile</h2></center>
  	      <!-- Traffic Light --> 
			<iframe src ="tmobile_traffic_light.html" width="100%" height="450" frameborder="0">
			<p>Your browser does not support iframes.</p>
			</iframe>
		
			
			
			
			
			<p><center><a href="#" id="tmobile_dialog_link" class="ui-state-default ui-corner-all" style="text-decoration:none;">T-Mobile</a></center></p>
			
			
			<!-- ui-dialog actual dialog contents DIV-->
		<div id="tmobile_dialog" title="T-Mobile Sites">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		</div>
			</td>
			<td>
		<center><h2> Rogers</h2></center>
  	      <!-- Traffic Light --> 
			<iframe src ="rogers_traffic_light.html" width="100%" height="450" frameborder="0">
			<p>Your browser does not support iframes.</p>
			</iframe>
		
			
			<p><center><a href="#" id="rogers_dialog_link" class="ui-state-default ui-corner-all" style="text-decoration:none;">Rogers</a></center></p>
			
			
			<!-- ui-dialog actual dialog contents DIV-->
		<div id="rogers_dialog" title="Rogers Sites">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		</div>
			</td>
			<td>
			<center><h2> MONE</h2></center>
  	      <!-- Traffic Light --> 
			<iframe src ="mone_traffic_light.html" width="100%" height="450" frameborder="0">
			<p>Your browser does not support iframes.</p>
			</iframe>
	
		
			
			<p><center><a href="#" id="mone_dialog_link" style="text-decoration:none;" class="ui-state-default ui-corner-all">Mone</a></center></p>
			
			
			<!-- ui-dialog actual dialog contents DIV-->
		<div id="mone_dialog" title="MONE Sites">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		</div>
			</td>
			</tr>
  	     </table>
  	    </div>
  	  </div>
  	</div>
  </div>
  
  </div>
  
  <!-- End tabs 2 -> overview -->
  
   <!-- Start tabs 3 -> Customer Support issues -->
  	<div id="tabs-3">
	
	<table>
	<tr>
	<th><h3> Outstanding CSI's </h3></th>
	<th><h3> Customer Issue Breakdown </h3> </th>
	</tr>
	<tr>
	<td><div id="CSI_table_div" style="width:900px;height:500px"></div></td>
	<td> <div id="CSI_issues_container" style="width: 900px; height: 500px; margin: 0 auto"></div>	</td>
	</tr>
	</table>
	</div>
	
	 <!-- End tabs 3 -> Customer Support issues -->
	 
	  <!-- Start tabs 4 -> Operations Resources -->
		<div id="tabs-4">
		
		
		<table>
		<tr>
	<td> <div id="org_chart_div" style="width: 900px; height: 500px;"></div></td>
	<td> 
	<h3> On Call Engineer: Colm McCarthy</h3> 
	<br />
	<h3> Operations Support</h3> 
	<div id="support_resource_table" style="width: 900px; height: 200px;"></div>
	
	<h3> Operations Deployments</h3> 
	<div id="deployment_resource_table" style="width: 900px; height: 200px;"></div>
	
	</td>
	</tr>
	</table>
		
		
		
		</div>
  
    <!-- End tabs 4 -> Operations Resources -->
	
		</div>
  
  
  
  <!-- footer -->
  <div id="footer">
  	<p><center>Developed by Peter Watters 17-9-2010</center></p>
  </div>
</body>
</html>
