<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
                <meta http-equiv="refresh" content="10"> 
                <meta http-Equiv="Cache-Control" Content="no-cache">
                <meta http-Equiv="Pragma" Content="no-cache">
                <meta http-Equiv="Expires" Content="0">

		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
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
				   $table2 = 'alarms_cleared';

                   if (!mysql_connect($db_host, $db_user, $db_pwd))
                   die("Can't connect to database");

                   if (!mysql_select_db($database))
                   die("Can't select database");

                   // sending query for Critical Alarms
                 $result = mysql_query("SELECT severity, customer, host,alarm, dates, datem  FROM {$table} where customer NOT LIKE \"%SUN%\" AND SEVERITY LIKE \"%CRITICAL%\" AND RESOLVED != \"1\" ORDER BY datem DESC");
				 // sending query for Warning Alarms
				$result1 = mysql_query("SELECT severity, customer, host,alarm, dates, datem  FROM {$table} where customer NOT LIKE \"%SUN%\" AND SEVERITY LIKE \"%WARNING%\"   AND RESOLVED != \"1\" ORDER BY datem DESC");
				  // sending query for OK Alarms
				 $result2 = mysql_query("SELECT severity, customer, host,alarm, dates, datem  FROM {$table2} where customer NOT LIKE \"%SUN%\"  ORDER BY severity DESC, datem DESC");


                  if (!$result &&  !$result1) {
                  die("Query to show fields from table failed");
                   }

               $fields_num = mysql_num_fields($result);
                
              while($row = mysql_fetch_row($result))
                {
                echo "<tr class=\"gradeX\">"; 
                foreach($row as $cell)
                echo "<td style=\"height:30px\">$cell</td>";
                echo "</tr>\n";
                }
				
				while($row = mysql_fetch_row($result1))
                {
                echo "<tr class=\"gradeC\">"; 
                foreach($row as $cell)
                echo "<td style=\"height:30px\">$cell</td>";
                echo "</tr>\n";
                }
				
				while($row = mysql_fetch_row($result2))
                {
                echo "<tr class=\"gradeA\">"; 
                foreach($row as $cell)
                echo "<td style=\"height:30px\">$cell</td>";
                echo "</tr>\n";
                }

               mysql_free_result($result);
			   mysql_free_result($result1);
			   mysql_free_result($result2);
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
