<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
			<style type="text/css" title="currentStyle">
			@import "AlarmTable.css";
		</style>
		<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			
			
							
							
							 /* Define two custom functions (asc and desc) for string sorting */
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
				} );
			</script>
        			<!--$(document).ready(function() {
				$('#example').dataTable( {
					"aaSorting": [[ 0, "asc" ]]
				} );
			} );-->

        
       
	</head>
	<body id="dt_example">
		<div id="container">
			<div class="full_width big">
				<center><i>TNF</i> Midas+ Alarm Monitor</center>
			</div>
			
					
			<div id="demo">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="AlarmTable">
	<thead>
		<tr>
			<th>Severity Level</th>
			<th>Customer</th>
			<th>Issue</th>
			<th>Probe Alarm Time</th>
			<th>TNF Recieve Time</th>
		</tr>
	</thead>
	<tbody>
		<tr class="gradeA">
			<td class="center">0 - OK CLEAR</td>
			<td>VCOM</td>
			<td>OK: Silverton has recovered from hardware failure</td>
			<td>2010-11-18 18:53</td>
			<td class="center">2010-11-18 18:55</td>
		</tr>
		<tr class="gradeX">
			<td class="center">2 - CRITICAL</td>
			<td>TMUSA</td>
			<td>CRITICAL: Manhattan is not producing log files</td>
			<td>2010-11-18 19:53</td>
			<td class="center">2010-11-18 19:55</td>
		</tr>
		<tr class="gradeC">
			<td class="center">1 - WARNING</td>
			<td>VFIE</td>
			<td>WARNING: NIC Speed is below 80 Mb/s in CTW</td>
            <td>2010-11-18 18:47</td>
			<td class="center">2010-11-18 18:50</td>
		</tr>
	</tbody>
	<tfoot>
		<tr>
			<th>Severity</th>
			<th>Customer</th>
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