  <marquee behavior="scroll" direction="left" scrollamount="10" width="100%"><p>
<?php
$con = mysql_connect("localhost","monitor","cinnara123.");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("mail", $con);

$result = mysql_query("SELECT * FROM alarms where (SEVERITY LIKE \"%CRITICAL%\" || SEVERITY LIKE \"%DOWN%\"  || SEVERITY LIKE \"%WARNING%\") AND RESOLVED = \"0\"  AND customer NOT LIKE \"%SUN%\" AND host NOT LIKE \"%SUN%\" ORDER BY datem DESC");


while($row = mysql_fetch_array($result))
  {
     if ($row['severity'] == "CRITICAL")
       {
		   
		echo"<img src=\"siren.gif\" style=\"height:40px;width:70px;\"/><font size=\"10\" color=\"red\">";
		echo " " . $row['severity'] . "";
        echo "  " . $row['customer'] . "  ";
        echo "Host: " . $row['host'] . "  ";
		echo "Alarm: " . $row['alarm'] . "  ";
		echo "" . $row['datem'] . "";
        echo"</font><img src=\"siren.gif\" style=\"height:40px;width:70px;\"/>";
		
		}
     if ($row['severity'] == "DOWN")
       {

                echo"<img src=\"siren.gif\" style=\"height:40px;width:70px;\"/><font size=\"10\" color=\"red\">";
                echo " " . $row['severity'] . "";
        echo "  " . $row['customer'] . "  ";
        echo "Host: " . $row['host'] . "  ";
                echo "Alarm: " . $row['alarm'] . "  ";
                echo "" . $row['datem'] . "";
        echo"</font><img src=\"siren.gif\" style=\"height:40px;width:70px;\"/>";

                }
    elseif($row['severity'] == "WARNING")
       {
		echo"<img src=\"siren.gif\" style=\"height:40px;width:70px;\"/><font size=\"10\" color=\"orange\">";
		echo " " . $row['severity'] . "";
        echo "  " . $row['customer'] . "  ";
        echo "Host: " . $row['host'] . "  ";
        echo "Alarm: " . $row['alarm'] . "  ";
        echo "" . $row['datem'] . "";
        echo"</font><img src=\"siren.gif\" style=\"height:40px;width:70px;\"/>   ";
		}
     }


mysql_close($con);
?> 
</p>
         </marquee>
