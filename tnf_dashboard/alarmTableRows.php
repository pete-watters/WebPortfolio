<!-- Andrea's PHP function to connect and view alarms -->
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
				$result = mysql_query("SELECT * FROM {$table} where alarm NOT LIKE \"OK%\" AND RESOLVED != \"1\" ORDER BY SEVERITY");
						
				
				if (!$result) {
					die("Query to show fields from table failed");
				}

				$fields_num = mysql_num_fields($result);
				
				// Table to draw alarms 
								
				// printing table rows
				while($row = mysql_fetch_row($result))
				{
					echo "<tr class=\"\">";

					// $row is array... foreach( .. ) puts every element
					// of $row to $cell variable
					foreach($row as $cell)
						echo "<td>$cell</td>";

					echo "</tr>\n";
				}
				mysql_free_result($result);
				?>
			
				