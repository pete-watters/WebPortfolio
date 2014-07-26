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
$result = mysql_query("SELECT max(dates) FROM {$table} where customer LIKE \"%VCOM%\" AND SEVERITY LIKE \"%HeartBeat%\"  AND RESOLVED != \"1\" ORDER BY datem DESC");

                  if (!$result) {
                  die("Query to show fields from table failed");
                   }

               $fields_num = mysql_num_fields($result);
                
              while($row = mysql_fetch_row($result))
                {
                foreach($row as $cell)
#                echo $cell ;
                 $last_check = $cell;
                }
				

               mysql_free_result($result);
                                ?>

<div style="background:#00FF00;width:200;height:40">
Last Hearbeat: <br />
<b>
<?php
echo $last_check;
?></b>
</div>

