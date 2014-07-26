<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		
		<title>DataTables example</title>
		<style type="text/css" title="currentStyle">
			@import "css/demo_page.css";
			@import "css/demo_table.css";
		</style>
		<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable();
			} );
		</script>
	</head>
	<body>
		<div id="container">
			<div id="demo">
	<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="800px" height="500px">
	<thead>
		<tr>
			<th>Date- on server</th>
                        <th>Date- Alarm Recieved </th>
			<th>Alarm</th>
			<th>Host</th>
			<th>Customer</th>
			<th>Severity</th>
			<th>IP</th>
		</tr>
	</thead>
	<tbody>
		<?php include("alarmTableRows.php"); ?>
	</tbody>
</table>
			</div>
									
		</div>
	</body>
</html>
