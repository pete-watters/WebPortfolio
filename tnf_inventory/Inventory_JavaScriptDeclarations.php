<!-- Include jQuery declarations -->

<!-- jQuery & jQuery UI Declarations -->



		  <script type="text/javascript" src="http://www.google.com/jsapi"></script>

    <script type="text/javascript">

      google.load('visualization', '1', {packages: ['table']});

    </script>

<!--  Connection Table -->

   <script type="text/javascript">

     function drawVisualization() {

       var ConnectionDetails_JSONObject = {

           cols: [

             {id: 'cx_code', label: 'Customer', type: 'string'},

             {id: 'site', label: 'Site', type: 'string'},

             {id: 'hostname', label: 'Hostname', type: 'string'},

             {id: 'ip', label: 'IP', type: 'string'},

             {id: 'rmm_ip', label: 'RMM IP', type: 'string'},

                 ],

            rows: [{"c":[{"v":"Vodafone Portugal:VFPT"},{"v":"Location"},{"v":"Sourceworks"},{"v":"10.128.37.97"},{"v":"RMM IP ADDRESS"}]}]

				};

       var ConnectionDetailsData = new google.visualization.DataTable(ConnectionDetails_JSONObject, 0.5);

       ConnectionDetailsVisualization= new google.visualization.Table(document.getElementById('ConnectionDetails_table'));

       ConnectionDetailsVisualization.draw(ConnectionDetailsData , {'allowHtml': true});

     }

     google.setOnLoadCallback(drawVisualization);

     </script>

<!-- Sourceworks Software table -->

    <script type="text/javascript">

    function drawVisualization() {

      var SourceworksSoftWare_JSONObject = {

          cols: [

            {id: 'cx_code', label: 'Customer', type: 'string'},

            {id: 'site', label: 'Site', type: 'string'},

            {id: 'Sourceworks_version', label: 'Sourceworks Version', type: 'string'},

            {id: 'Sourceworks_md5sum', label: 'Sourceworks md5sum', type: 'string'},

            {id: 'netroVersion', label: 'Netro Version', type: 'string'},

            {id: 'dlauncherVersion', label: 'DLAUNCER Version', type: 'string'} ,           

            {id: 'LocalAgent', label: 'LocalAgent Version', type: 'string'}

            ],

            rows:   [{"c":[{"v":"VFPT"},{"v":"Location"},{"v":"IPTS 4.6.0.0"},{"v":"e4f1bfd13e2ae5c52bdd1063d40b367e"},{"v":""},{"v":"Dlauncher version here"},{"v":"?"}]}]
			
			
        };

      var SourceworksSoftWareData = new google.visualization.DataTable(SourceworksSoftWare_JSONObject, 0.5);

      SourceworksSoftWareVisualization = new google.visualization.Table(document.getElementById('SourceworksSoftWare_table'));

      SourceworksSoftWareVisualization.draw(SourceworksSoftWareData , {'allowHtml': true});

    }

    google.setOnLoadCallback(drawVisualization);

    </script>

    

<!-- Sourceworks Netro Software table -->


    <script type="text/javascript">

     function drawVisualization() {

       var NetroData_JSONObject = {

           cols: [

             {id: 'cx_code', label: 'Customer', type: 'string'},

             {id: 'site', label: 'Site', type: 'string'},

             {id: 'swriter_version', label: 'Swriter Version', type: 'string'},

             {id: 'swriter_version', label: 'Swriter Type', type: 'string'},

             {id: 'swriter_md5sum', label: 'Swriter md5sum', type: 'string'},

             {id: 'LocalAgent_version', label: 'LocalAgent Version', type: 'string'},

             {id: 'LocalAgent_version', label: 'LocalAgent md5sum', type: 'string'}      

                 ],

  rows: [{"c":[{"v":"VFPT"},{"v":"Location"},{"v":"x"},{"v":"swriter type socket / shm"},{"v":"d5ccffbfd600556f3397bf4a3924e7c2"},{"v":"?"},{"v":"3a6d614880c682824ae9d8a58184037c"}]},{"c":[{"v":"VFPT"},{"v":"Location"},{"v":"x"},{"v":"swriter type socket / shm"},{"v":"d5ccffbfd600556f3397bf4a3924e7c2"},{"v":"?"},{"v":"3a6d614880c682824ae9d8a58184037c"}]},{"c":[{"v":"VFPT"},{"v":"Location"},{"v":"x"},{"v":"swriter type socket / shm"},{"v":"d5ccffbfd600556f3397bf4a3924e7c2"},{"v":"?"},{"v":"3a6d614880c682824ae9d8a58184037c"}]},{"c":[{"v":"VFPT"},{"v":"Location"},{"v":"x"},{"v":"swriter type socket / shm"},{"v":"d5ccffbfd600556f3397bf4a3924e7c2"},{"v":"?"},{"v":"3a6d614880c682824ae9d8a58184037c"}]}]

		};     

       var NetroData = new google.visualization.DataTable(NetroData_JSONObject, 0.5);

       NetroDatavisualization = new google.visualization.Table(document.getElementById('NetroSoftWare_table'));

       NetroDatavisualization.draw(NetroData , {'allowHtml': true});

     }

     google.setOnLoadCallback(drawVisualization);

     </script>  

     

  <script type="text/javascript">

        function drawVisualization() {

          // Create and populate the data table.

          var NetroServices_JSONObject = {

              cols: [

                {id: 'cx_code', label: 'Customer', type: 'string'},

                {id: 'site', label: 'Site', type: 'string'},         

                {id: '_NETRO_UDP_LOWER', label: 'UDP Lower', type: 'string'},

                {id: '_NETRO_UDP_UPPER', label: 'UDP Upper', type: 'string'},

                {id: '_NETRO_TCP_LOWER', label: 'TCP Lower', type: 'string'},

                {id: '_NETRO_TCP_UPPER', label: 'TCP Upper', type: 'string'},

                {id: '_NETRO_ESP_UPPER', label: 'ESP Upper', type: 'string'},

                {id: '_NETRO_GRE_UPPER', label: 'GRE Upper', type: 'string'},

                {id: '_NETRO_GTP', label: 'GTP', type: 'string'}

				    ],

                

     rows:  [{"c":[{"v":"VFPT"},{"v":"Location"},{"v":"No"},{"v":"Yes"},{"v":"Yes"},{"v":"Yes"},{"v":"Yes"},{"v":"Yes"},{"v":"Yes"}]},{"c":[{"v":"VFPT"},{"v":"Location"},{"v":"No"},{"v":"Yes"},{"v":"Yes"},{"v":"Yes"},{"v":"Yes"},{"v":"Yes"},{"v":"Yes"}]},{"c":[{"v":"VFPT"},{"v":"Location"},{"v":"No"},{"v":"Yes"},{"v":"Yes"},{"v":"Yes"},{"v":"Yes"},{"v":"Yes"},{"v":"Yes"}]},{"c":[{"v":"VFPT"},{"v":"Location"},{"v":"No"},{"v":"Yes"},{"v":"Yes"},{"v":"Yes"},{"v":"Yes"},{"v":"Yes"},{"v":"Yes"}]}]



};

         var NetroServicesData = new google.visualization.DataTable(NetroServices_JSONObject, 0.5);

          NetroServicesvisualization = new google.visualization.Table(document.getElementById('NetroServices_table'));

          NetroServicesvisualization.draw(NetroServicesData , {'allowHtml': true});

        }

        google.setOnLoadCallback(drawVisualization);

</script>    

     

     

    <script type="text/javascript">

      function drawVisualization() {

        // Create and populate the data table.

        var RecordOutput_JSONObject = {

            cols: [

              {id: 'cx_code', label: 'Customer', type: 'string'},

              {id: 'site', label: 'Site', type: 'string'},

              {id: 'imei', label: 'IMEI', type: 'boolean'}, 

              {id: 'ULI', label: 'ULI', type: 'boolean'},

              {id: 'aran_feed', label: 'Aran Feed', type: 'string'},

              {id: 'MoMo_feed', label: 'MoMo Feed', type: 'boolean'},

              {id: 'record_format', label: 'Record Format', type: 'string'},

              {id: 'http_record', label: 'HTTP Record', type: 'string'}      

                  ],

   rows: 	      [{"c":[{"v":"VFPT"},{"v":"Location"},{"v":"IMEI bool"},{"v":"ULI bool"},{"v":"Aran Feed"},{"v":"_MOMO_FEED"},{"v":"_RECORD_FORMAT"},{"v":"_HTTP_RECORD"}]}]
          };

        var RecordOutputData = new google.visualization.DataTable(RecordOutput_JSONObject, 0.5);

        RecordOutputvisualization = new google.visualization.Table(document.getElementById('RecordOutput_table'));

        RecordOutputvisualization.draw(RecordOutputData , {'allowHtml': true});

      }    google.setOnLoadCallback(drawVisualization);

</script>  



   <script type="text/javascript">

       function drawVisualization() {

         // Create and populate the data table.

         var SourceworksServices_JSONObject1 = {

             cols: [

               {id: 'cx_code', label: 'Customer', type: 'string'},

               {id: 'site', label: 'Site', type: 'string'},                 

               {id: '_IPV4_LOWER', label: 'IP v4 Lower', type: 'boolean'},

               {id: '_IPV4_UPPER', label: 'IP v4 Upper', type: 'boolean'}, 

               {id: '_IPV6_LOWER', label: 'IP v6 Lower', type: 'boolean'},  

               {id: '_IPV6_UPPER', label: 'IP v6 Upper', type: 'boolean'},

               {id: '_HTTP_LOWER', label: 'HTTP Lower', type: 'boolean'},

               {id: '_HTTP_UPPER', label: 'HTTP Upper', type: 'boolean'},  

               {id: '_TCP_LOWER', label: 'TCP Lower', type: 'boolean'},   

               {id: '_TCP_UPPER', label: 'TCP Upper', type: 'boolean'},

               {id: '_UDP_LOWER', label: 'UDP Lower', type: 'boolean'},  

               {id: '_UDP_UPPER', label: 'UDP Upper', type: 'boolean'} 

                  ],

    rows:   [{"c":[{"v":"VFPT"},{"v":"Location"},{"v":1},{"v":1},{"v":1},{"v":1},{"v":0},{"v":1},{"v":0},{"v":1},{"v":1},{"v":1}]}]
		};

       

         var SourceworksServicesData1 = new google.visualization.DataTable(SourceworksServices_JSONObject1, 0.5);

       

         // Create and draw the visualization.

         SourceworksServicesvisualization1 = new google.visualization.Table(document.getElementById('SourceworksServices_table1'));

         SourceworksServicesvisualization1.draw(SourceworksServicesData1 , {'allowHtml': true});

       }

       google.setOnLoadCallback(drawVisualization);

       </script>

 <!-- Sourceworks Services 2 -->      

 <script type="text/javascript">google.load('visualization', '1', {packages: ['table']});</script>

   <script type="text/javascript">

       function drawVisualization() {

         // Create and populate the data table.

         var SourceworksServices_JSONObject2 = {

             cols: [

               {id: 'cx_code', label: 'Customer', type: 'string'},

               {id: 'site', label: 'Site', type: 'string'},              

               {id: '_RADIUS', label: 'Radius', type: 'boolean'},   

               {id: '_WV', label: 'WV', type: 'boolean'},   

               {id: '_MSN', label: 'MSN', type: 'boolean'},   

               {id: '_DNS', label: 'DNS', type: 'boolean'},   

               {id: '_SNMP', label: 'SNMP', type: 'boolean'},   

               {id: '_EMULE', label: 'EMULE', type: 'boolean'},   

               {id: '_GNUTELLA', label: 'GNUTELLA', type: 'boolean'},   

               {id: '_BITTORRENT', label: 'Bittorrent', type: 'boolean'},   

               {id: '_MOILEIP', label: 'Mobile IP', type: 'boolean'},   

               {id: '_SIP', label: 'SIP', type: 'boolean'},   

               {id: '_H232_GK', label: 'H232 GK', type: 'boolean'},   

               {id: '_MPLS', label: 'MPLS', type: 'boolean'},   

               {id: '_BGP', label: 'BGP', type: 'boolean'},   

               {id: '_SMB', label: 'SMB', type: 'boolean'},   

               {id: '_ICMP', label: 'ICMP', type: 'boolean'} 

               

                   ],

    rows:   [{"c":[{"v":"VFPT"},{"v":"Location"},{"v":0},{"v":0},{"v":1},{"v":0},{"v":0},{"v":1},{"v":0},{"v":1},{"v":0},{"v":0},{"v":0},{"v":0},{"v":1},{"v":0},{"v":0},{"v":0}]}]
	
		};

       

         var SourceworksServicesData2 = new google.visualization.DataTable(SourceworksServices_JSONObject2, 0.5);

       

         // Create and draw the visualization.

         SourceworksServicesvisualization2 = new google.visualization.Table(document.getElementById('SourceworksServices_table2'));

         SourceworksServicesvisualization2.draw(SourceworksServicesData2 , {'allowHtml': true});

       }

       google.setOnLoadCallback(drawVisualization);

       </script>

       

          <!-- Sourceworks Services 3 -->      

 <script type="text/javascript">google.load('visualization', '1', {packages: ['table']});</script>

   <script type="text/javascript">

       function drawVisualization() {

         // Create and populate the data table.

         var SourceworksServices_JSONObject3 = {

             cols: [

               {id: 'cx_code', label: 'Customer', type: 'string'},

               {id: 'site', label: 'Site', type: 'string'},     

               {id: '_BILLSHOCK_ENABLED', label: 'Billshock', type: 'boolean'},         

               {id: '_GTP', label: 'GTP', type: 'boolean'},   

               {id: '_WAP', label: 'WAP', type: 'boolean'},   

               {id: '_MMS', label: 'MMS', type: 'boolean'},   

               {id: '_RTSP', label: 'RTSP', type: 'boolean'},  

               {id: '_POP3', label: 'POP3', type: 'boolean'},   

               {id: '_PPTP', label: 'PPTP', type: 'boolean'},   

               {id: '_GREPP', label: 'GREPP', type: 'boolean'},   

               {id: '_ESP', label: 'ESP', type: 'boolean'},   

               {id: '_IMAP', label: 'IMAP', type: 'boolean'},   

               {id: '_SMTP', label: 'SMTP', type: 'boolean'},   

               {id: '_FTP', label: 'FTP', type: 'boolean'}      

                   ],

    rows:   [{"c":[{"v":"VFPT"},{"v":"Location"},{"v":0},{"v":1},{"v":0},{"v":0},{"v":0},{"v":1},{"v":0},{"v":0},{"v":0},{"v":1},{"v":1},{"v":1}]}]
		};

         var SourceworksServicesData3 = new google.visualization.DataTable(SourceworksServices_JSONObject3, 0.5);

         // Create and draw the visualization.

         SourceworksServicesvisualization3 = new google.visualization.Table(document.getElementById('SourceworksServices_table3'));

         SourceworksServicesvisualization3.draw(SourceworksServicesData3 , {'allowHtml': true});

       }

       google.setOnLoadCallback(drawVisualization);

       </script>

<!-- Sourceworks Configuration Table -->       



  <script type="text/javascript">

        function drawVisualization() {

          // Create and populate the data table.

          var SourceworksConfiguration_JSONObject = {

              cols: [

                {id: 'cx_code', label: 'Customer', type: 'string'},

                {id: 'site', label: 'Site', type: 'string'},         

                {id: '_TYPE', label: ' Type', type: 'string'},

                {id: '_TIMEZONE', label: 'Timezone', type: 'string'},        

                {id: '_Sourceworks_TYPE', label: 'Sourceworks Flavour', type: 'string'},

                {id: '_NO_OF_PROCESS_THREADS', label: 'Thread count', type: 'string'},

                {id: '_SHM', label: 'SHM Value', type: 'string'},               

                {id: '_QUEUE_SIZE', label: 'Queue Size', type: 'string'},                

                {id: '_BLOCKING', label: 'Blocking', type: 'string'},                

                {id: '_TCP_LOST_EVENTS', label: 'TCP Lost Events', type: 'string'},                

                {id: '_TCP_AUTO_DETECT', label: 'TCP AutoDetect', type: 'string'},

                {id: '_UDP_AUTO_DETECT', label: 'UDP AutoDetect', type: 'string'},

                {id: '_ANDROID_AUTO_DETECT', label: 'Auto Detect Android', type: 'string'},               

                {id: '_DEHASH_URLS', label: 'De-Hash URLs', type: 'string'},                

                {id: '_PDP_HIGH_WATERMARK', label: 'PDP High Watermark', type: 'string'},                

                {id: '_PDP_LOW_WATERMARK', label: 'PDP Low Watermark', type: 'string'},                

                {id: '_CONTEXT_FORMAT', label: 'Context format', type: 'string'}

                ],

                

     rows:  [{"c":[{"v":"VFPT"},{"v":"Location"},{"v":"H1 Midas+ . Kernel Version: 2.6.22-15"},{"v":"UTC"},{"v":"thread"},{"v":"0"},{"v":"3221225472 1610612736"},{"v":"48"},{"v":"48"},{"v":"No"},{"v":"Yes"},{"v":"No"},{"v":"No"},{"v":"Yes"},{"v":"200000"},{"v":"180000"},{"v":"shm"}]}] 
	 
};

         var SourceworksConfigurationData = new google.visualization.DataTable(SourceworksConfiguration_JSONObject, 0.5);

          SourceworksConfigurationvisualization = new google.visualization.Table(document.getElementById('SourceworksConfiguration_table'));

          SourceworksConfigurationvisualization.draw(SourceworksConfigurationData , {'allowHtml': true});

        }

        google.setOnLoadCallback(drawVisualization);

</script>





<!--  Hardware table -->


  <script type="text/javascript">

        function drawVisualization() {

          // Create and populate the data table.

          var HardWare_JSONObject = {

              cols: [

                {id: 'cx_code', label: 'Customer', type: 'string'},

                {id: 'site', label: 'Site', type: 'string'},         

                {id: '_CARD_NAME', label: 'Gn Card', type: 'string'},

                {id: '_CARD_PORTS', label: 'Gn Interfaces', type: 'string'},        

                {id: '_CARD_VERSION', label: 'Gn Firmware', type: 'string'},

                {id: 'RAM', label: 'RAM + Kernel', type: 'string'},

                {id: 'INTERNAL_DISK_SIZE', label: 'Internal Disc Size', type: 'string'},               

                {id: 'INTERNAL_DISK_RAID', label: 'Internal Disc RAID', type: 'string'},                

                {id: 'COUNT_EXTERNAL_DISKS', label: 'External Discs', type: 'string'},                

                {id: 'EXTERNAL_DISK_RAID', label: 'External Disc RAID', type: 'string'},                

                {id: 'EXTERNAL_DISK_PARTITION_SIZE', label: 'External Disc Partition Size', type: 'string'}

                ],

     rows:  [{"c":[{"v":"VFPT"},{"v":"Location"},{"v":"Name: ipb_oregon_2x10g_irn2022_lx155t ipb_oregon_m10g  TNF"},{"v":"(0)"},{"v":"Vers: 13.10.40 20100505-1217 lx155tDriver build: release_nic_20101117-1431.tar.gz"},{"v":"KERNEL2.6.22-15-serverSHM3221225472 1610612736"},{"v":"INTERNAL DISC SIZE"},{"v":"INTERNAL DISC RAID"},{"v":"COUNT EXTERNAL DISCS"},{"v":"EXTERNAL DISC RAID TYPE"},{"v":"EXTERNAL DISC PARTITION SIZE"}]}]
	 
	 
	 
};

         var HardWareData = new google.visualization.DataTable(HardWare_JSONObject, 0.5);

          HardWarevisualization = new google.visualization.Table(document.getElementById('HardWare_table'));

          HardWarevisualization.draw(HardWareData , {'allowHtml': true});

        }

        google.setOnLoadCallback(drawVisualization);

</script>



<!--   Support Table -->


  <script type="text/javascript">

        function drawVisualization() {

          // Create and populate the data table.

          var SupportInfo_JSONObject = {

              cols: [

                {id: 'cx_code', label: 'Customer', type: 'string'},

                {id: 'site', label: 'Site', type: 'string'},         

                {id: '_STATUS', label: 'Support Status', type: 'string'},

                {id: '_SUPPORT_LEVEL', label: 'Support Level', type: 'string'},        

                {id: '_SUPPORT_DESCRIPTION', label: 'Description', type: 'string'}

                ],

     rows:  [{"c":[{"v":"VFPT"},{"v":"Location"},{"v":"Active"},{"v":"Bronze"},{"v":"Coverage: 24/7 "}]}]
};

         var SupportInfoData = new google.visualization.DataTable(SupportInfo_JSONObject, 0.5);

          SupportInfovisualization = new google.visualization.Table(document.getElementById('SupportInfo_table'));

          SupportInfovisualization.draw(SupportInfoData , {'allowHtml': true});

        }

        google.setOnLoadCallback(drawVisualization);

</script>



     <!--  location Google Map -->

     <!--  location maps -->

	  <script type="text/javascript">

      google.load("visualization", "1", {packages:["map"]});

      google.setOnLoadCallback(drawMap);

      function drawMap() {

        var data = new google.visualization.DataTable();

        data.addColumn('number', 'Lat');

        data.addColumn('number', 'Lon');

        data.addColumn('string', 'Name');

        data.addColumn('string', 'Address');

        data.addRows(4);

        data.setCell(0, 0, 38.731294);

        data.setCell(0, 1, -9.207855);

        data.setCell(0, 2, 'VFPT Alfragide');

        data.setCell(1, 0, 41.280777);

        data.setCell(1, 1, -7.865699);

        data.setCell(1, 2, 'VFPT Boavista');

        data.setCell(2, 0, 38.698857);

        data.setCell(2, 1, -9.417196);

        data.setCell(2, 2, 'VFPT Matinha');

        data.setCell(3, 0, 39.875);

        data.setCell(3, 1, -8.684444);

        data.setCell(3, 2, 'VFPT Ranha');

       





		var map_table = new google.visualization.Table(document.getElementById('map_table_div'));

        map_table.draw(data);



        var map = new google.visualization.Map(document.getElementById('map_div'));

        map.draw(data, {showTip: true});

      }

    </script>

     
<!-- Data Tables- ->