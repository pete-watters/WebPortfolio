<?php

?>


<?php include("headercontent.php"); ?>


<div style="margin-left:12px; margin-top:1px; margin-bottom:100px; margin-right:100px ">

<a href="IntegraRxmain.php">
<img src="images/IntegraRX_thumb.jpg" alt="Integra Rx" align="left" border="0" height="104" width="230" />
</a>

<div class="ubercolortabs">
<ul>
<li class="selected"><a href="IntegraRxmain.php" ><span>Overview</span></a></li>
<li><a href="IntegraRxmain.php&content=IRXFeatures"><span>Features</span></a></li>
<li><a href="IntegraRxmain.php&content=IRXArchitecture"><span>System Architecture</span></a></li>
<li><a href="IntegraRxmain.php&content=IRXAuditTrail"><span>Audit Trail</span></a></li>	
<br /><br />
<li><a href="IntegraRxmain.php&content=IRXPatient"><span>Patient Management</span></a></li>	
<li><a href="IntegraRxmain.php&content=IRXPractice"><span>Practice Management</span></a></li>	
<li><a href="IntegraRxmain.php&content=IRXPrescription"><span>Prescription Management</span></a></li>	
<br /><br />
<li><a href="IntegraRxmain.php&content=IRXOrdering"><span>Ordering and Product Management</span></a></li>	
<li><a href="IntegraRxmain.php&content=IRXMDS"><span>MDS and MAR Management</span></a></li>	
<br /><br />
<li><a href="IntegraRxmain.php&content=IRXKeyboard"><span>Keyboard shortcuts</span></a></li>	
</ul>
</div>

<div class="ubercolordivider"> </div>


<?php
$content = $_GET["content"];

if ($content == "") {
include("content/IRXoverview.php"); 

	}
		elseif($content == "IRXFeatures")
{
include("content/IRXFeatures.php"); 
}	
	elseif($content == "IRXArchitecture")
{
include("content/IRXArchitecture.php"); 
}	
	elseif($content == "IRXAuditTrail")
{
include("content/IRXAuditTrail.php"); 
}	

	elseif($content == "IRXPatient")
{
include("content/IRXPatient.php"); 
}	
elseif($content == "IRXPractice")
{
include("content/IRXPractice.php"); 
}	
elseif($content == "IRXPrescription")
{
include("content/IRXPrescription.php"); 
}	
elseif($content == "IRXOrdering")
{
include("content/IRXOrdering.php"); 
}	
elseif($content == "IRXMDS")
{
include("content/IRXMDS.php"); 
}	

	elseif($content == "IRXKeyboard")
{
include("content/IRXKeyboard.php"); 
}	

else {
include("content/IRXoverview.php");
}
?>



<h2>Integra Rx Overview:</h2>

Why choose Integra Rx??
<br/>
<br/>

You can save money:
<br/>
<ul>
<li>	Unique Margin Protection module*</li>
<li>	Unique Prescription Cash Management module</li>
<li>	Unique Co-Payment separation function – only ever claim for family scripts over the DPS threshold</li>
<li>	FREE decision support data (Drug Interactions), used in real-time Drug History Review</li>
<li>	SMS charges off set to patients</li>
<li>	Freedom to select your own Hardware supplier </li>
<li>	2nd Generation claiming to the PCRS (claim LT & HT – Zero rejects)</li>
<li>	MDS - NO Pre-printed stationary required</li>
</ul>

You will save time:
<br/>
<ul>
<li>	FAST!!!  Fewer keystrokes to dispense – single screen interface</li>
<li>	FULLY keyboard driven (no need for expensive touch screen monitors)</li>
<li>	Reduce MDS administration to as little as 20 minutes</li>
<li>	Unique Practice Performance Report – All key aspects of your business on one report</li>
<li>	Unique Practice Sales Performance Report – 11 metrics, over 12 months, over 3 years. (Integra POS only)</li>
</ul>

We can provide security:
<br/>
<ul>
<li>Over 15 years know-how writing Windows software</li>
<li>	Growing company – 100 staff, € 10m turnover</li>
<li>	Built on Oracle, the database used for 90% of the world’s healthcare databases</li>
<li>	FULLY audit trailed PIN protected transactions</li>
</ul>

Integra Rx unique features:
<br/>
<ul>
<li>	Automatic DPS co-payment tracking </li>
<li>	Unique Prescription Cash Management module</li>
<li>	Second Generation PCRS Claims (XML), allowing you to correct exceptions before the early payment deadline</li>
<li>	No transaction fees on PCRS Claims</li>
<li>	Groundbreaking Monitored Dosage System for Nursing Homes and private patients.  </li>
<li>	Unique Methadone Dosage module </li>
<li>	SMS text messaging sends Prescription Reminder and Prescription Collection messages directly to patient mobile phones and recoups the cost of this service from the patient</li>
<li>	Unique “Script Due” patient search filter, allows you to select patients due for repeat  prescriptions today allowing you to prepare regular patients scripts.  The Automatic Collection SMS message will then be sent to prompt patients to present for their prescription </li>
</ul>



<?php include("footer.php"); ?>