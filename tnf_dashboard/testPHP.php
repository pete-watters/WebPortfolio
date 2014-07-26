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

// sending queries
$VFIE_AlarmCritical_resultSet = mysql_query("SELECT count(ID) as COUNT_CRITICAL_ALARMS from mail.alarms where customer LIKE '%VFIE%' AND (SEVERITY = 'CRITICAL'|| SEVERITY = 'DOWN') AND RESOLVED != 1");
$VFIE_AlarmWarning_resultSet = mysql_query("SELECT count(ID) as COUNT_WARNING_ALARMS from mail.alarms where customer LIKE '%VFIE%' AND SEVERITY = 'WARNING' AND RESOLVED != 1");


 while($row = mysql_fetch_row($VFIE_AlarmCritical_resultSet))
                {
                foreach($row as $cell)
                   $VFIE_CriticalCount =  $cell;
                }
echo "<hr>";
echo "VFIE<br>";

 while($row = mysql_fetch_row($VFIE_AlarmWarning_resultSet))
                {
                foreach($row as $cell)
                   $VFIE_WarningCount =  $cell;
                }

if($VFIE_CriticalCount > 0)
   {
   $VFIE_AlarmLevel = 2;
    }
else{

      if($VFIE_WarningCount > 0)
         {
          $VFIE_AlarmLevel = 1;
         } 
       else{
       $VFIE_AlarmLevel = 0;
      }
    }

echo $VFIE_AlarmLevel;

// sending queries
$VFIT_AlarmCritical_resultSet = mysql_query("SELECT count(ID) as COUNT_CRITICAL_ALARMS from mail.alarms where customer LIKE '%VFIT%' AND (SEVERITY = 'CRITICAL'|| SEVERITY = 'DOWN') AND RESOLVED != 1");
$VFIT_AlarmWarning_resultSet = mysql_query("SELECT count(ID) as COUNT_WARNING_ALARMS from mail.alarms where customer LIKE '%VFIT%' AND SEVERITY = 'WARNING' AND RESOLVED != 1");

while($row = mysql_fetch_row($VFIT_AlarmCritical_resultSet))
                {
                foreach($row as $cell)
                   $VFIT_CriticalCount =  $cell;
                }
echo "<hr>";
echo "VFIT<br>";


 while($row = mysql_fetch_row($VFIT_AlarmWarning_resultSet))
                {
                foreach($row as $cell)
                   $VFIT_WarningCount =  $cell;
                }

if($VFIT_CriticalCount > 0)
   {
   $VFIT_AlarmLevel = 2;
    }
else{

      if($VFIT_WarningCount > 0)
         {
          $VFIT_AlarmLevel = 1;
         }
       else{
       $VFIT_AlarmLevel = 0;
      }
    }

echo $VFIT_AlarmLevel;




// sending queries
$VCOM_AlarmCritical_resultSet = mysql_query("SELECT count(ID) as COUNT_CRITICAL_ALARMS from mail.alarms where customer LIKE '%VCOM%' AND (SEVERITY = 'CRITICAL'|| SEVERITY = 'DOWN') AND RESOLVED != 1");
$VCOM_AlarmWarning_resultSet = mysql_query("SELECT count(ID) as COUNT_WARNING_ALARMS from mail.alarms where customer LIKE '%VCOM%' AND SEVERITY = 'WARNING' AND RESOLVED != 1");
 
while($row = mysql_fetch_row($VCOM_AlarmCritical_resultSet))
                {
                foreach($row as $cell)
                   $VCOM_CriticalCount =  $cell;
                }
echo "<hr>";
echo "VCOM<br>";

 while($row = mysql_fetch_row($VCOM_AlarmWarning_resultSet))
                {
                foreach($row as $cell)
                   $VCOM_WarningCount =  $cell;
                }
if($VCOM_CriticalCount > 0)
   {
   $VCOM_AlarmLevel = 2;
    }
else{

      if($VCOM_WarningCount > 0)
         {
          $VCOM_AlarmLevel = 1;
         }
       else{
       $VCOM_AlarmLevel = 0;
      }
    }


echo $VCOM_AlarmLevel;


// sending queries
$ROGERS_AlarmCritical_resultSet = mysql_query("SELECT count(ID) as COUNT_CRITICAL_ALARMS from mail.alarms where customer LIKE '%ROGERS%' AND (SEVERITY = 'CRITICAL'|| SEVERITY = 'DOWN') AND RESOLVED != 1");
$ROGERS_AlarmWarning_resultSet = mysql_query("SELECT count(ID) as COUNT_WARNING_ALARMS from mail.alarms where customer LIKE '%ROGERS%' AND SEVERITY = 'WARNING' AND RESOLVED != 1");

while($row = mysql_fetch_row($ROGERS_AlarmCritical_resultSet))
                {
                foreach($row as $cell)
                   $ROGERS_CriticalCount =  $cell;
                }
echo "<hr>";
echo "ROGERS<br>";

 while($row = mysql_fetch_row($ROGERS_AlarmWarning_resultSet))
                {
                foreach($row as $cell)
                   $ROGERS_WarningCount =  $cell;
                }
if($ROGERS_CriticalCount > 0)
   {
   $ROGERS_AlarmLevel = 2;
    }
else{
      if($ROGERS_WarningCount > 0)
         {
          $ROGERS_AlarmLevel = 1;
         }
       else{
       $ROGERS_AlarmLevel = 0;
      }
    }

echo $ROGERS_AlarmLevel;


// sending queries
$TMUSA_AlarmCritical_resultSet = mysql_query("SELECT count(ID) as COUNT_CRITICAL_ALARMS from mail.alarms where customer LIKE '%TMUSA%' AND (SEVERITY = 'CRITICAL'|| SEVERITY = 'DOWN') AND RESOLVED != 1");
$TMUSA_AlarmWarning_resultSet = mysql_query("SELECT count(ID) as COUNT_WARNING_ALARMS from mail.alarms where customer LIKE '%TMUSA%' AND SEVERITY = 'WARNING' AND RESOLVED != 1");
 
while($row = mysql_fetch_row($TMUSA_AlarmCritical_resultSet))
                {
                foreach($row as $cell)
                   $TMUSA_CriticalCount =  $cell;
                }
echo "<hr>";
echo "TMUSA<br>";

 while($row = mysql_fetch_row($TMUSA_AlarmWarning_resultSet))
                {
                foreach($row as $cell)
                   $TMUSA_WarningCount =  $cell;
                }

if($TMUSA_CriticalCount > 0)
   {
   $TMUSA_AlarmLevel = 2;
    }
else{

      if($TMUSA_WarningCount > 0)
         {
          $TMUSA_AlarmLevel = 1;
         }
       else{
       $TMUSA_AlarmLevel = 0;
      }
    }

echo $TMUSA_AlarmLevel;

?>

