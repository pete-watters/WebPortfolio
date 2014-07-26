<?php
$product = $_GET["product"];
$content = $_GET["product"];


if ($content == "") {
include("EmbedIntro.php"); 
	}

elseif($content == "IntegraRx")
{
include("EmbedIntegraRxLogo.php"); 
}	
elseif($content == "IntegraHO")
{
include("EmbedIntegraHOLogo.php"); 
}
elseif($content == "IntegraSCAN")
{
include("EmbedIntegraSCANLogo.php"); 
}
elseif($content == "IntegraPOS")
{
include("EmbedIntegraPOSLogo.php"); 
}
elseif($content == "AdditionalProducts")
{
include("EmbedIntegraSCANLogo.php"); 
}
?>
