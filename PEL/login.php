<?php

session_start();

$con = mysql_connect("localhost","peterjwa_peter","5zejyc8v");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("peterjwa_pel", $con);

#If the submit button is pressed then query the admins table
if($_POST['submit'])
 {

$result = mysql_query("SELECT * FROM admins WHERE username =  '$_POST[username]' AND 
password = '$_POST[password]'");

$numrows = mysql_num_rows($result);
#Check if the username and password exist in one and only one row
if($numrows == 1) {
#If they do then register the username and id
$row = mysql_fetch_assoc($result);
session_register("USERNAME");
session_register("USERID");

$_SESSION['USERNAME'] = $row['username'];
$_SESSION['USERID'] = $row['id'];
# Redirect to homepage
header("Location: " . $config_basedir . "/project/cd/");
}
# If no match is found print this error
else {
header("Location: " . $config_basedir . "/project/cd/login.php?error=1");
}
}
else {

require("header.php");
	
if($_GET['error']) {
echo "Incorrect login, please try again!";
}


?>

<form action="login.php" method="post">

<table>
<tr>
	<td>Username</td>
	<td><input type="text" name="username"></td>
</tr>
<tr>
	<td>Password</td>
	<td><input type="password" name="password"></td>
</tr>
<tr>
	<td></td>
	<td><input type="submit" name="submit" value="Login!"></td>
</tr>
</table>
</form>



<?php
require("footer.php");
}
?>