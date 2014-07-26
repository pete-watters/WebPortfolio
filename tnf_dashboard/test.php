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
	$result = mysql_query("SELECT dates, datem, alarm, host, customer, severity, ip FROM {$table} where customer LIKE \"%VFIT\" AND alarm NOT LIKE \"OK%\" AND RESOLVED != \"1\" ORDER BY SEVERITY");
						
				
		if (!$result) {
		die("Query to show fields from table failed");
		}

	$fields_num = mysql_num_fields($result);
				
		// Table to draw alarms 
								
		// printing table rows
		while($row = mysql_fetch_row($result))
		{
                #echo "$row\n";
                echo "<td>" . $row['dates'] . "</td>";
         	}
		mysql_free_result($result);
				?>
			
				
