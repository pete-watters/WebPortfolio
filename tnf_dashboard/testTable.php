<?php
?>
<html>
<head>

<!--  DataTables -->
		<script type="text/javascript" src="js/jquery.dataTables.js"></script>
		<!-- jQuery 1.4.2 -->
		<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
		<!--  jQuery UI Files-->
		<script type="text/javascript" src="js/jquery-ui-1.8.custom.min.js"></script>
		<script type="text/javascript" src="js/jquery.bgiframe-2.1.1.js"></script>
		<script type="text/javascript" src="js/jquery.ui.core.js"></script>
		<script type="text/javascript" src="js/jquery.ui.widget.js"></script>
		<script type="text/javascript" src="js/jquery.ui.mouse.js"></script>

		<script type="text/javascript" src="js/jquery.ui.button.js"></script>
		<script type="text/javascript" src="js/jquery.ui.draggable.js"></script>
		<script type="text/javascript" src="js/jquery.ui.position.js"></script>
		<script type="text/javascript" src="js/jquery.ui.resizable.js"></script>
	
		<script type="text/javascript" src="js/jquery.ui.dialog.js"></script>
		<script type="text/javascript" src="js/ui.formValidator.js"> </script>

		<script type="text/javascript" src="js/jquery.effects.core.js"></script>
					
<!-- Data Tables Style -->
		<style type="text/css" title="currentStyle">
			@import "css/DataTables_demo_page.css";
			@import "css/DataTables_demo_table.css";
		</style>
<link type="text/css" href="css/custom-theme/jquery-ui-1.8.custom.css" rel="stylesheet" />
<link type="text/css" href="css/jquery.ui.all.css" rel="stylesheet" />



<script tye="text/javascript">
			
			$(document).ready(function() {
				oTable = $('#ProbeInfo_DataTable').dataTable({
					"bJQueryUI": true,
					"sPaginationType": "full_numbers",
						"aoColumns": [
							null,
							null,
							null,
							null,
							null,
							null,
							null,
							null							
						],
						"bLengthChange": false	
						
				});
			} );

		</script>


</head>

<body>

<div id="container">
            <div id="demo">
           
                       
    <!-- <table cellpadding="0" cellspacing="0" border="0" class="display" id="example" style="width:800px;">-->
           
   <table cellpadding="0" cellspacing="0" border="0" class="display" id="ProbeInfo_DataTable" style="height:400px;">

                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Site</th>
                        <th>IP</th>           
                        <th>Dacas Version</th>
                        <th>Netro I.</th>

                        <th>Netro C.</th>
                        <th>LocalAgent</th>           
                        <th>Swriter Type</th>
                    </tr>
                </thead>
                <tbody>  
				

               <tr>
			<td>VFPT</td>
			<td>Alfragide</td>
			<td>10.2.37.197</td>
			<td>4.3.3</td>
			<td>No</td>
			<td>Yes</td>
			<td>Yes</td>
			<td>Socket</td>
		</tr>
               
                </tbody>

                </table>

            </div>
        </div>


</body>

</html>




