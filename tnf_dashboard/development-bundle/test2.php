<html>  
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
    <script src="js/jquery.marquee.js" type="text/javascript"></script>

    <script type="text/javascript">
    <!--
    $(function () {
        // basic version is: $('div.demo marquee').marquee() - but we're doing some sexy extras
        
        $('div.demo marquee').marquee('pointer').mouseover(function () {
            $(this).trigger('stop');
        }).mouseout(function () {
            $(this).trigger('start');
        }).mousemove(function (event) {
            if ($(this).data('drag') == true) {
                this.scrollLeft = $(this).data('scrollX') + ($(this).data('x') - event.clientX);
            }
        }).mousedown(function (event) {
            $(this).data('drag', true).data('x', event.clientX).data('scrollX', this.scrollLeft);
        }).mouseup(function () {
            $(this).data('drag', false);
        });
    });
    //-->
    </script>
  </head>
  <body> 
   
      <marquee behavior="scroll" direction="left" scrollamount="4" width="100%"><p>
<?php
$con = mysql_connect("localhost","monitor","cinnara123.");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("mail", $con);

$result = mysql_query("SELECT * FROM alarms where (SEVERITY LIKE \"%CRITICAL%\" || SEVERITY LIKE \"%WARNING%\") AND RESOLVED = \"0\"  AND customer NOT LIKE \"%SUN mail%\" AND host NOT LIKE \"vancouver%\" ORDER BY datem DESC");


while($row = mysql_fetch_array($result))
  {
     if ($row['severity'] == "CRITICAL")
       {
		   
		echo"<img src=\"siren.gif\" style=\"height:40px;width:70px;\"/><font size=\"10\" color=\"red\">";
		echo "" . $row['severity'] . "";
        echo "" . $row['customer'] . "";
        echo "Host: " . $row['host'] . "";
		echo "Alarm: " . $row['alarm'] . "";
		echo "" . $row['datem'] . "";
        echo"</font><img src=\"siren.gif\" style=\"height:40px;width:70px;\"/>";
		
		}
      elseif($row['severity'] == "WARNING")
       {
		echo"<img src=\"siren.gif\" style=\"height:40px;width:70px;\"/><font size=\"10\" color=\"orange\">";
		echo "" . $row['severity'] . "";
        echo "" . $row['customer'] . "";
        echo "" . $row['host'] . "";
        echo "" . $row['alarm'] . "";
        echo "" . $row['datem'] . "";
        echo"</font><img src=\"siren.gif\" style=\"height:40px;width:70px;\"/>";
		}
     }


mysql_close($con);
?> 
</p>
         </marquee>
    
  </body>
</html>