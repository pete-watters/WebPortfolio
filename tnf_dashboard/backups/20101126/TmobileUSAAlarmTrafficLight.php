<html>
<head>

<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
<link rel='stylesheet' type='text/css' href='spiderscript_complete_v1.0.8.20090939.css' />
<script language='JavaScript' src='spiderscript_complete_v1.0.8.20090930.js' type='text/javascript'></script>

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
$AlarmCritical_resultSet = mysql_query("SELECT count(ID) as COUNT_CRITICAL_ALARMS from mail.alarms where customer LIKE '%TMUSA%' AND SEVERITY = 'CRITICAL' AND RESOLVED != 1");
$AlarmWarning_resultSet = mysql_query("SELECT count(ID) as COUNT_WARNING_ALARMS from mail.alarms where customer LIKE '%TMUSA%' AND SEVERITY = 'WARNING' AND RESOLVED != 1");
$AlarmUnknown_resultSet = mysql_query("SELECT count(ID) as COUNT_UNKNOWN_ALARMS from mail.alarms where customer LIKE '%TMUSA%' AND SEVERITY = 'UNKNOWN'AND RESOLVED != 1");
$AlarmOk_resultSet = mysql_query("SELECT count(ID) as COUNT_OK_ALARMS from mail.alarms where customer LIKE '%TMUSA%' AND SEVERITY = 'OK' AND RESOLVED != 1");

if (!$AlarmCritical_resultSet || !$AlarmWarning_resultSet) {
    die("Query to show fields from table failed");
}

// Print Alarm Critical Count
while($row = mysql_fetch_row($AlarmCritical_resultSet))
{

    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable
    foreach($row as $cell)
    $critical_issue_count = $cell; 
    echo "<br />\n";
}

// Print Alarm Warning Count
while($AlarmWarning_row = mysql_fetch_row($AlarmWarning_resultSet))
{
    foreach($AlarmWarning_row  as $cell)
    $warning_issue_count = $cell; 
}


// Print Alarm Unknown Count
while($AlarmUnknown_row = mysql_fetch_row($AlarmUnknown_resultSet))
{
    foreach($AlarmUnknown_row  as $cell)
    $unknown_issue_count = $cell;
}



// Print Alarm OK Count
while($AlarmOk_row = mysql_fetch_row($AlarmOk_resultSet))
{
    foreach($AlarmOk_row  as $cell)
    $ok_issue_count = $cell;
}


mysql_free_result($AlarmCritical_resultSet);
mysql_free_result($AlarmWarning_resultSet);
mysql_free_result($AlarmUnknown_resultSet);
mysql_free_result($AlarmOk_resultSet);

?>
	</head>
	
	<body>
    
	<div class='content'>
			


<!-- Traffic Light --> 
	<div class='r' align="center">
	<div id="divTrafficLight" style="height:400px;width:200px;background-image:url(traffic_light.png);float:left;">
				
					<div ext="imagetoggle" id="togLightTop" style="margin-left:35px;margin-top:4px;float: left;display:none;" van="value">
<?php 
	if($critical_issue_count >= 1){
	echo "<img src='traffic_light_red.png' value='red' selected/>";		
	echo "<img src='traffic_light_off.png' value='off'/>";		
	}
	else{
	echo "<img src='traffic_light_red.png' value='red'/>";		
	echo "<img src='traffic_light_off.png' value='off' selected/>";		
	}
	?>
	</div>

 <div ext="imagetoggle" id="togLightMiddle" style="margin-left:35px;margin-top:4px;float: left;display:none;" van="value">
        <?php
        if($warning_issue_count >= 1){
        echo "<img src='traffic_light_amber.png' value='red' selected/>";
        echo "<img src='traffic_light_off.png' value='off' />"; 
        }
        else{
        echo "<img src='traffic_light_amber.png' value='red' />";
        echo "<img src='traffic_light_off.png' value='off' selected/>";
        }
        ?>
        </div>
 
	<div ext="imagetoggle" id="togLightBottom" style="margin-left:35px;margin-top:4px;float: left;display:none;" van="value">
        <?php
        if($warning_issue_count == 0 && $critical_issue_count == 0){
        echo "<img src='traffic_light_green.png' value='green' selected/>";
        echo "<img src='traffic_light_off.png' value='off' />";
           }
        else{
        echo "<img src='traffic_light_green.png' value='green' />";
        echo "<img src='traffic_light_off.png' value='off' selected/>";
        
          }
        ?>
        </div>


</div>


</div>
<br />

</div>
</body>
</html>


