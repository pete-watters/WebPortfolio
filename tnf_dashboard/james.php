<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
                <meta http-equiv="refresh" content="600"> 
		<title>James Nea Pissed Off Level Dashboard</title>
		<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.5.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.5.custom.min.js"></script>
        <script type="text/javascript" src="js/jquery.marquee.js"></script>

		<script type="text/javascript">
			$(function(){
				// Tabs
				$('#tabs').tabs();
				$('#tabs').tabs("rotate" , 15000 );
			});
		</script>
                

                <!-- Marquee scroll code -->
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
           <!-- End Marquee scroll code -->



<?php
include("AlarmTable_JS.php");
?>
<?php
include("marquee_JavaScript.php");
?>



	</head>
	<body>
    <?php
include("marquee_DIV.php");
?>
    
	<div id="tabs">
			<ul>
				<li><a href="#tabs-1">Alarms</a></li>
	</ul>
            
            <!-- Start tabs-1 -->
			<div id="tabs-1" style="height:1200px;width:1200px;">
                     
					 <!-- This is the beginning of the area to hold the traffic lights -->
                      <div id="content" align="center">
                        <div class="container">
                          <div class="inside">
                            <div class="wrapper">
                            
                              <table>
                               <tr>
                               <td>
                                <h2>James Nea</h2><br />
                                <img src="irish_flag.gif" /> <br />
                                <!-- Vodafone Ireland Traffic Light --> 
           						<iframe src ="VodafoneIrelandAlarmTrafficLight.php" width="100%" height="450" frameborder="0" align="middle">
                                <p>Your browser does not support iframes.</p>
                                </iframe>
                               </td>
                                
                               </tr>
                          	 </table>
                          	 </div>
                          </div>
                       	</div>
 					</div>

			 <!-- This is the beginning of the area to hold the traffic lights -->
                                  
            </div>
            <!--End of tab 1 --> 
            
            </div>

          </div>
	</body>
</html>

