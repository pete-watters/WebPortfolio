	<style type="text/css" title="currentStyle">@import "AlarmTable.css";</style>
                <script type="text/javascript" language="javascript" src="js/dataTables/jquery.dataTables.js"></script>

	

	
               <!-- Data table sorting function -->
               <script type="text/javascript" charset="utf-8">
			jQuery.fn.dataTableExt.oSort['string-case-asc']  = function(x,y) {
				return ((x < y) ? -1 : ((x > y) ?  1 : 0));
				};
				
			jQuery.fn.dataTableExt.oSort['string-case-desc'] = function(x,y) {
				return ((x < y) ?  1 : ((x > y) ? -1 : 0));
				};
				
			$(document).ready(function() {
		        	/* 
				Initialise DataTable and Sort on columns 
				0 and 4 - Severity and recieve time
				*/
			oTable = $('#VodafoneIreland_AlarmTable').dataTable( {
			    "bJQueryUI": true,
				"sPaginationType": "full_numbers",
				"aaSorting": [ [0,'desc'], [4,'asc'] ],
				"aoColumns": [
				                null,
						null,
						null,
						{ "sType": 'string-case' },
						null,
						null
						],
						"bLengthChange" : false
					} );
					
					
				oTable = $('#VodafoneItaly_AlarmTable').dataTable( {
				"bJQueryUI": true,
				"sPaginationType": "full_numbers",
				"aaSorting": [ [0,'asc'], [4,'asc'] ],
				"aoColumns": [
		                		null,
						null,
						null,
						{ "sType": 'string-case' },
						null,
						null
						],
						"bLengthChange" : false
					} );

				oTable = $('#TmobileUSA_AlarmTable').dataTable( {
				"bJQueryUI": true,
				"sPaginationType": "full_numbers",
				"aaSorting": [ [0,'desc'], [4,'asc'] ],
				"aoColumns": [
		                		null,
						null,
						null,
						{ "sType": 'string-case' },
						null,
						null
						],
						"bLengthChange" : false
					} );
					
					
				oTable = $('#VodafoneSA_AlarmTable').dataTable( {
				"bJQueryUI": true,
				"sPaginationType": "full_numbers",
				"aaSorting": [ [0,'desc'], [4,'asc'] ],
				"aoColumns": [
						null,
		                		null,
						null,
						{ "sType": 'string-case' },
						null,
						null
						],
						"bLengthChange" : false
					} );
					
				oTable = $('#Rogers_AlarmTable').dataTable( {
				"bJQueryUI": true,
				"sPaginationType": "full_numbers",	
				"aaSorting": [ [0,'desc'], [4,'asc'] ],
				"aoColumns": [
						null,
		                		null,
						null,
						{ "sType": 'string-case' },
						null,
						null
						],
						"bLengthChange" : false
					} );
					
				} );
				
				</script>
