<html>
  <head>
    <script type='text/javascript' src='https://www.google.com/jsapi'></script>
    <script type='text/javascript'>
      google.load('visualization', '1', {packages:['gauge']});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Label');
        data.addColumn('number', 'Value');
        data.addRows(4);
        data.setValue(0, 0, 'Vodafone Ireland');
        data.setValue(0, 1, 0);
        data.setValue(1, 0, 'T-Mobile USA');
        data.setValue(1, 1, 55);
        data.setValue(2, 0, 'Vodacom SA');
        data.setValue(2, 1, 0);
        data.setValue(3, 0, 'Vodafone Italy');
        data.setValue(3, 1, 0);

        var chart = new google.visualization.Gauge(document.getElementById('gauge_chart_div'));
        var options = {width: 1000, height: 1000, redFrom: 75, redTo: 100,
                       yellowFrom:25, yellowTo: 75, greenFrom:0, greenTo:25, minorTicks: 5};
        chart.draw(data, options);
      }
    </script>
  </head>

  <body>
    <div id='gauge_chart_div'></div>
  </body>
</html>
