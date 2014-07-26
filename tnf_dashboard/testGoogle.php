<?php
echo "<script type=\"text/javascript\" src=\"http://www.google.com/jsapi\"></script>";
echo "<script type=\"text/javascript\">";
echo "google.load('visualization', '1', {packages: ['table']}); </script>";
echo "<script type=\"text/javascript\">";
echo "function drawVisualization() {";
echo "var VodafoneAlarmsJSONObject = {";
echo "cols: [{id: 'issueSeverity', label: 'Issue Severity', type: 'string'},";
echo "{id: 'issueCount', label: 'Issues', type: 'number'}],";
echo "rows: [";
echo "{c:[{v: 'Critical'}, {v:" . $critical_issue_count ." }]},";
echo "{c:[{v: 'Warning'}, {v:" . $warning_issue_count ."}]},";
echo "{c:[{v: 'OK'}, {v:" . $unknown_issue_count . "}]},";
echo "{c:[{v: 'Unknown'}, {v: " . $ok_issue_count ." }]}";
echo " ]};";
echo "var data = new google.visualization.DataTable(VodafoneAlarmsJSONObject , 0.5);";
echo "visualization = new google.visualization.Table(document.getElementById('VodafoneAlarmTable'));";
echo "      visualization.draw(data, {'allowHtml': true});";
echo "    }";
echo "google.setOnLoadCallback(drawVisualization);";
echo "</script>";
?>