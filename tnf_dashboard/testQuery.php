<html><head><title>MySQL Table Viewer</title></head><body>
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
$AlarmCritical_resultSet = mysql_query("SELECT count(ID) as COUNT_CRITICAL_ALARMS from mail.alarms where customer LIKE 'Vodafone%' AND SEVERITY = 'CRITICAL' AND RESOLVED != 1");
$AlarmWarning_resultSet = mysql_query("SELECT count(ID) as COUNT_WARNING_ALARMS from mail.alarms where customer LIKE 'Vodafone%' AND SEVERITY = 'WARNING' AND RESOLVED != 1");
$AlarmUnknown_resultSet = mysql_query("SELECT count(ID) as COUNT_UNKNOWN_ALARMS from mail.alarms where customer LIKE 'Vodafone%' AND SEVERITY = 'UNKNOWN'AND RESOLVED != 1");
$AlarmOk_resultSet = mysql_query("SELECT count(ID) as COUNT_OK_ALARMS from mail.alarms where customer LIKE 'Vodafone%' AND SEVERITY = 'OK' AND RESOLVED != 1");


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

echo "Critical issue count: $critical_issue_count ";
echo "<br />\n";


// Print Alarm Warning Count
while($AlarmWarning_row = mysql_fetch_row($AlarmWarning_resultSet))
{
    foreach($AlarmWarning_row  as $cell)
    $warning_issue_count = $cell;
}

echo "Warning issue count: $warning_issue_count ";
echo "<br />\n";

// Print Alarm Unknown Count
while($AlarmUnknown_row = mysql_fetch_row($AlarmUnknown_resultSet))
{
    foreach($AlarmUnknown_row  as $cell)
    $unknown_issue_count = $cell;
}
echo "Unknown issue count: $unknown_issue_count ";
echo "<br />\n";

// Print Alarm OK Count
while($AlarmOk_row = mysql_fetch_row($AlarmOk_resultSet))
{
    foreach($AlarmOk_row  as $cell)
    $ok_issue_count = $cell;
}
echo "Ok issue count: $ok_issue_count ";
echo "<br />\n";


mysql_free_result($AlarmCritical_resultSet);
mysql_free_result($AlarmWarning_resultSet);
mysql_free_result($AlarmUnknown_resultSet);
mysql_free_result($AlarmOk_resultSet);

?>
</body></html>
