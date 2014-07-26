<?php
$product = $_GET["product"];
$content = $_GET["content"];


if ($content == "") {
include("EmbedIntro.php"); 
	}

elseif($product == "IntegraRx" && $content == "Overview")
{
include("IntegraRxOverview.php"); 
}	
elseif($product == "IntegraRx" && $content == "Benefits")
{
include("IntegraRxBenefits.php"); 
}
elseif($product == "IntegraRx" && $content == "Modules")
{
include("IntegraRxModules.php"); 
}

elseif($product == "IntegraHO" && $content == "Overview")
{
include("IntegraHOOverview.php"); 
}	
elseif($product == "IntegraHO" && $content == "Benefits")
{
include("IntegraHOBenefits.php"); 
}
elseif($product == "IntegraHO" && $content == "TechnicalOverview")
{
include("IntegraHOTechnicalOverview.php"); 
}

elseif($product == "IntegraPOS" && $content == "Overview")
{
include("IntegraPOSOverview.php"); 
}	
elseif($product == "IntegraPOS" && $content == "Benefits")
{
include("IntegraPOSBenefits.php"); 
}
elseif($product == "IntegraPOS" && $content == "Modules")
{
include("IntegraPOSModules.php"); 
}


elseif($product == "AdditionalProducts" && $content == "Overview")
{
include("AdditionalProductsOverview.php"); 
}	
elseif($product == "AdditionalProducts" && $content == "IntegraScan")
{
include("IntegraSCAN.php"); 
}	
elseif($product == "AdditionalProducts" && $content == "IntegraSMS")
{
include("IntegraSMS.php"); 
}
elseif($product == "AdditionalProducts" && $content == "IntegraRxScan")
{
include("IntegraRxScan.php"); 
}


?>
