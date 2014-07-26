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

                   // sending query for HeartBeat
$result = mysql_query("SELECT *  FROM {$table} where customer LIKE \"%VFIE%\" AND SEVERITY LIKE \"%HeartBeat%\"  AND RESOLVED != \"1\" ORDER BY datem DESC");

                  if (!$result) {
                  die("Query to show fields from table failed");
                   }

               $fields_num = mysql_num_fields($result);
                
              while($row = mysql_fetch_row($result))
                {
                foreach($row as $cell)
                echo $cell ;
                }
				

               mysql_free_result($result);
                                ?>
