<?php

?>

<?php include("header.php"); ?>


<?php include("productSideNavigation.php"); ?>


    <td class="navigationMain" scope="col" width ="520">

     

    <p>To access system documentation and the user forum please enter your login details below: </p>
    
    <table cellpadding=2 cellspacing=0 border=0 align="center">
<tr><td bgcolor="gray"><table cellpadding=0 cellspacing=0 border=0 width=100%><tr>
<td bgcolor="gray" align=center style="padding:2;padding-bottom:4"><b>
<font size=-1 color="white">Enter your login and password</font></th></tr>
<tr><td bgcolor="white" style="padding:5"><br>

<?php
$login = $_GET["login"];

if($login == "error")
{
	echo "<font color='red'> The details you have provided are incorrect, please try again</font>";
	
}
?>
<form method="post" action="Users.php?login=error">
<center><table>




<tr><td><font face="verdana,arial" size=-1>Login:</td><td><input type="text" name="login"></td></tr>
<tr><td><font face="verdana,arial" size=-1>Password:</td><td><input type="password" name="password"></td></tr>
<tr><td><font face="verdana,arial" size=-1>&nbsp;</td><td><font face="verdana,arial" size=-1>
<input type="submit" value="Login">
<input type="reset" value="Reset">
</td></tr>
<tr><td colspan=2><font face="verdana,arial" size=-1>&nbsp;</td></tr>
<tr><td colspan=2><font face="verdana,arial" size=-1></td></tr>
</table></center>
</form>
</td></tr></table></td></tr></table>
</td> 
   
   

  

  
  

  
  </tr>
  
</table>

</td>
	</tr>
    
    
   
  
<?php include("footer.php"); ?>
