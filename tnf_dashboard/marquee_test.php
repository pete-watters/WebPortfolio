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
   
      <marquee behavior="scroll" direction="left" scrollamount="4" width="100%">
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

                   // sending query for Critical Alarms
                 $result = mysql_query("SELECT *  FROM {$table} where SEVERITY LIKE \"%CRITICAL%\" AND RESOLVED != \"1\" ORDER BY datem DESC");
				 // sending query for Warning Alarms
				$result1 = mysql_query("SELECT * FROM {$table} where SEVERITY LIKE \"%WARNING%\"   AND RESOLVED != \"1\" ORDER BY datem DESC");
				
			    if (!$result &&  !$result1) {
                  die("Query to show fields from table failed");
                   }

              while($row = mysql_fetch_row($result))
                {
				echo"<p><img src=\"siren.gif\" style=\"height:40px;width:70px;\"/><font size=\"10\" color=\"red\">";
				echo $row['severity'] . " " . $row['customer'];
  				echo "<br />";
  				echo"</font><img src=\"siren.gif\" style=\"height:40px;width:70px;\"/></p>";
				}
				
				while($row1 = mysql_fetch_row($result1))
                {
                echo"<p><img src=\"siren.gif\" style=\"height:40px;width:70px;\"/><font size=\"10\" color=\"orange\">";
		`		echo $row1['severity'] . " " . $row1['customer'];
  				echo "<br />";
  				echo"</font><img src=\"siren.gif\" style=\"height:40px;width:70px;\"/></p>";
				  }
				

               mysql_free_result($result);
			   mysql_free_result($result1);
                ?>
 		
         
         
         </marquee>
    
  </body>
</html>
