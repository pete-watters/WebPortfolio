<?php
$data = '{ "aaData": [[1, 2], [11, 22], [111, 222]] }';

header("content-type: application/json");
header("Pragma: no-cache");
header("Expires: 0");
echo($data);
?>