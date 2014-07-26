<?php
$sub = $_GET["sub"];
$product = $_GET["product"];


if ($sub == "" && $product == "IntegraRx") {
include("IntegraRxDispensing.php"); 
	}
elseif ($sub == "" && $product == "IntegraPOS") {
include("IntegraPOSPatientManagement.php"); 
	}
elseif($sub == "IntegraRxDispensing")
{
include("IntegraRxDispensing.php"); 
}	
elseif($sub == "IntegraRxOrders")
{
include("IntegraRxOrders.php"); 
}	
elseif($sub == "IntegraRxProductMaintenance")
{
include("IntegraRxProductMaintenance.php"); 
}	
elseif($sub == "IntegraRxClaims")
{
include("IntegraRxClaims.php"); 
}	
elseif($sub == "IntegraRxReports")
{
include("IntegraRxReports.php"); 
}	
elseif($sub == "IntegraRxMDS")
{
include("IntegraRxMDS.php"); 
}	
elseif($sub == "IntegraRxAccounts")
{
include("IntegraRxAccounts.php"); 
}	
elseif($sub == "IntegraRxIPU")
{
include("IntegraRxIPU.php"); 
}	
elseif($sub == "IntegraRxConfiguration")
{
include("IntegraRxConfiguration.php"); 
}	

elseif($sub == "IntegraPOS")
{
include("IntegraPOSPatientManagement.php"); 
}
elseif($sub == "IntegraPOSPriceOverrides")
{
include("IntegraPOSPriceOverrides.php"); 
}
elseif($sub == "IntegraPOSSuspendedSales")
{
include("IntegraPOSSuspendedSales.php"); 
}
elseif($sub == "IntegraPOSTillShifts")
{
include("IntegraPOSTillShifts.php"); 
}
elseif($sub == "IntegraPOSPriceUpdates")
{
include("IntegraPOSPriceUpdates.php"); 
}
elseif($sub == "IntegraPOSOrders")
{
include("IntegraPOSOrders.php"); 
}
elseif($sub == "IntegraPOSStock")
{
include("IntegraPOSStock.php"); 
}
elseif($sub == "IntegraPOSReports")
{
include("IntegraPOSReports.php"); 
}
elseif($sub == "IntegraPOSAccounts")
{
include("IntegraPOSAccounts.php"); 
}
elseif($sub == "IntegraPOSIPU")
{
include("IntegraPOSIPU.php"); 
}
elseif($sub == "IntegraPOSConfiguration")
{
include("IntegraPOSConfiguration.php"); 
}

?>
