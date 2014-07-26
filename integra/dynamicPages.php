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
elseif($content == "AdditionalProducts")
{
include("EmbedIntegraPOSLogo.php"); 
}?>


if($login == "error")
{
	echo "<font color='red'> The details you have provided are incorrect, please try again</font>";
	
}
?>