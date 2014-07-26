<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
                <meta http-equiv="refresh" content="10">
                <meta http-equiv="content-type" content="text/html; charset=utf-8" />
                <meta http-Equiv="Cache-Control" Content="no-cache">
                <meta http-Equiv="Pragma" Content="no-cache">
                <meta http-Equiv="Expires" Content="0">


			<style type="text/css" title="currentStyle">
			@import "AlarmTable.css";
		</style>
	<script type="text/javascript" language="javascript" src="js/dataTables/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="js/dataTables/jquery.dataTables.js"></script>
		
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
       
	</head>
	<body id="dt_example">
		<div id="container">
			<div class="full_width big">
				<center><i>Vodacom South Africa</i> Midas+ Alarm Monitor</center>
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

                  <?php
                   $db_host = 'localhost';
                   $db_user = 'monitor';
                   $db_pwd = 'cinnara123.';

                   $database = 'mail';
                   $table = 'alarms';

                   if (!mysql_connect($db_host, $db_user, $db_pwd))
                   die("Can't connect to database");

                   if (!mysql_select_db($database))
                   die("Can't select database");

                   // sending query
                 $result = mysql_query("SELECT severity, customer, host,alarm, dates, datem  FROM {$table} where customer LIKE \"%VCOM%\" AND RESOLVED != \"1\" ORDER BY severity, datem");


                  if (!$result) {
                  die("Query to show fields from table failed");
                   }

               $fields_num = mysql_num_fields($result);
                
              while($row = mysql_fetch_row($result))
                {
              
                if($row['severity'] == "CRITICAL" ) {echo "<tr class=\"gradeX\">";}
                elseif($row['severity'] == "WARNING" ){echo "<tr class=\"gradeC\">";}
                elseif($row['severity'] == "OK" ){echo "<tr class=\"gradeA\">";}
                else {echo "<tr class=\"gradeX\">";}
                 

                foreach($row as $cell)
                echo "<td style=\"width:400px;\">$cell</td>";
                echo "</tr>\n";

                }

               mysql_free_result($result);
                                ?>

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
