<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
               <!-- <meta http-equiv="refresh" content="10">
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
                <meta http-Equiv="Cache-Control" Content="no-cache">
                <meta http-Equiv="Pragma" Content="no-cache">
                <meta http-Equiv="Expires" Content="0">-->
			
		<?php
			include("AlarmTable_JS.php");
			?>
			
       
	</head>
	<body>
		<div>
		
           <table cellpadding="0" cellspacing="0" border="0" class="display" id="VodafoneIreland_AlarmTable" >
	               <thead>
		       <tr>
			<th>Severity Level</th>
			<th>Customer</th>
            <th>Host</th>
			<th>Issue</th>
			<th>Probe Alarm Time</th>
			<th>TNF Recieve Time</th>
		       </tr>
	             </thead>
	       <tbody>

                  <?php
			include("VFI_AlarmRow.php");
			?>
	      </tbody>
              </table>
			  
			  <table cellpadding="0" cellspacing="0" border="0" class="display" id="VodafoneItaly_AlarmTable">
	               <thead>
		       <tr>
			<th>Severity Level</th>
			<th>Customer</th>
            <th>Host</th>
			<th>Issue</th>
			<th>Probe Alarm Time</th>
			<th>TNF Recieve Time</th>
		       </tr>
	             </thead>
	       <tbody>

                  <?php
include("VFIT_AlarmRow.php");
?>

	      </tbody>
              </table>	
			
			
           <table cellpadding="0" cellspacing="0" border="0" class="display" id="VodafoneSA_AlarmTable">
	               <thead>
		       <tr>
			<th>Severity Level</th>
			<th>Customer</th>
            <th>Host</th>
			<th>Issue</th>
			<th>Probe Alarm Time</th>
			<th>TNF Recieve Time</th>
		       </tr>
	             </thead>
	       <tbody>

                  <?php
			include("VCOM_AlarmRow.php");
			?>
	      </tbody>
              </table>
			  
           <table cellpadding="0" cellspacing="0" border="0" class="display" id="TmobileUSA_AlarmTable">
	               <thead>
		       <tr>
			<th>Severity Level</th>
			<th>Customer</th>
            <th>Host</th>
			<th>Issue</th>
			<th>Probe Alarm Time</th>
			<th>TNF Recieve Time</th>
		       </tr>
	             </thead>
	       <tbody>

                  <?php
			include("TMUSA_AlarmRow.php");
			?>
	      </tbody>
              </table>
			  
           <table cellpadding="0" cellspacing="0" border="0" class="display" id="Rogers_AlarmTable">
	               <thead>
		       <tr>
			<th>Severity Level</th>
			<th>Customer</th>
            <th>Host</th>
			<th>Issue</th>
			<th>Probe Alarm Time</th>
			<th>TNF Recieve Time</th>
		       </tr>
	             </thead>
	       <tbody>

                  <?php
			include("Rogers_AlarmRow.php");
			?>
	      </tbody>
              </table>
			
			
		</div>
	</body>
</html>
