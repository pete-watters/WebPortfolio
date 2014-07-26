<?php
$data = '{ "aaData": [[7, 6], [2, 1], [555, 333], [331, 233]] }';

header("content-type: application/json");
header("Pragma: no-cache");
header("Expires: 0");
echo($data);
?>