<?php

?>

<?php include("header.php"); ?>


<?php include("productSideNavigation.php"); ?>


    <td class="navigationMain" scope="col" width ="520">



 
 
<?php
$content = $_GET["content"];

if ($content == "") {
include("EmbedIntro.php"); 
	}

elseif($content == "Claims")
{
include("EmbedClaims.php"); 
}	
elseif($content == "Dispensing")
{
include("EmbedDispensing.php"); 
}
elseif($content == "Ordering")
{
include("EmbedOrdering.php"); 
}
elseif($content == "Reports")
{
include("EmbedReporting.php"); 
}?>


        
        <h3><font color="#046b95">Online demonstrations available:</font></h3>
      
        <div style="margin-top: 5px;">
        <a href = "ViewOnlineDemo.php?content=Dispensing" style="text-decoration:none"><font color="#046b95">
              <img src="icons/View_online_demo.png" style="margin-right: 5px;" align="absmiddle" width="16" height="16" alt="View Online Demo" border ="0" />
        Dispensing with Integra Rx</font></a></div>
        
          <div style="margin-top: 5px;">
          <a href = "ViewOnlineDemo.php?content=Claims" style="text-decoration:none"><font color="#046b95">
              <img src="icons/View_online_demo.png" style="margin-right: 5px;" align="absmiddle" width="16" height="16" alt="View Online Demo" border ="0" />
         Claims processing with Integra Rx</font></a></div>
        
         <div style="margin-top: 5px;">
         <a href = "ViewOnlineDemo.php?content=Ordering" style="text-decoration:none"><font color="#046b95">
              <img src="icons/View_online_demo.png" style="margin-right: 5px;" align="absmiddle" width="16" height="16" alt="View Online Demo" border ="0" />
        Stock control with Integra</font></a></div>
        
         <div style="margin-top: 5px;">
         <a href = "ViewOnlineDemo.php?content=Reports" style="text-decoration:none"><font color="#046b95">
              <img src="icons/View_online_demo.png" style="margin-right: 5px;" align="absmiddle" width="16" height="16" alt="View Online Demo" border ="0" />
        Pharmacy reporting with Integra</font></a></div>
        

        
        <hr>
        <p>
     <b>Integra Rx is now available from as little as € 200 per month </b>*<br />
<ul>
<li>No setup fee </li>
<li>No obligation</li>
<li>No hidden charges</li>
</ul>

<i> * Price quoted is for a single user system and excludes VAT at 21.5% <br/>
(€ 243 pm DD on going)</i></p>
       

</td> 
   
   

  

  
  

  
  </tr>
  
</table>

</td>
	</tr>
    
    
   
  
<?php include("footer.php"); ?>
