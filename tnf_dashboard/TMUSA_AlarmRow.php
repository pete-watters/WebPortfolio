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
        $result = mysql_query("SELECT severity, customer, host,alarm, dates, datem  FROM {$table} where customer LIKE \"%TMUSA%\" AND (SEVERITY LIKE \"%CRITICAL%\" || SEVERITY LIKE \"%DOWN%\") AND RESOLVED != \"1\" ORDER BY datem DESC");
	// sending query for Warning Alarms
	$result1 = mysql_query("SELECT severity, customer, host,alarm, dates, datem  FROM {$table} where customer LIKE \"%TMUSA%\" AND SEVERITY LIKE \"%WARNING%\"   AND RESOLVED != \"1\" ORDER BY datem DESC");
        // sending query for OK Alarms
		 $result2 = mysql_query("SELECT severity, customer, host,alarm, dates, datem  FROM {$table2} where customer LIKE \"%TMUSA%\"  ORDER BY severity DESC, datem DESC");


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
