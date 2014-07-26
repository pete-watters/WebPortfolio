<?php
session_start();

require("header.php");
# If the user is logged in then display:
if(isset($_SESSION['USERNAME']) == TRUE) {

if(!mysql_connect("localhost","root",""))
{
echo "<h2>Cannot connect to database</h2>";
die();
}
mysql_select_db("pel");
?>
<h2>Current users</h2>

<table border=1 cellpadding=0 cellspacing=1>
<tr bgcolor=#eee>
<font color=#fff face="Arial" size="2">
<td class=tabhead><b>ID</b></td>
<td class=tabhead><b>Username</b></td>
</font>
</tr>

<?php
# Displays all registered users in the admins table
$result=mysql_query("SELECT id,username FROM admins ORDER BY id;");

$i=0;
while( $row=mysql_fetch_array($result) )
{
if($i>0)
{
echo "<tr valign=bottom>";
echo "<td bgcolor=#ffffff colspan=6><img src=b_drop.png width=1 height=1></td>";
echo "</tr>";
}
echo "<tr valign=center>";

echo "<td class=tabval><b>".$row['id']."</b></td>";
echo "<td class=tabval><b>".$row['username']."</b></td>";
echo "</tr>";
$i++;

}
# If information is submitted
if($_POST['submit'])
{
# add new user to admins table
$result = mysql_query("INSERT INTO admins (username,password) VALUES ('$_POST[add_username]', '$_POST[add_password]')");

echo "You have sucessfully updated the database!";
echo "<a href=manage_accounts.php>View changes made</a>";
}

?>


<!--Form definition -->
<form name="input" action="manage_accounts.php" method="POST">
<!--Table definitions -->
<table border="0" cellpadding="0" cellspacing="0" width="770">
<tbody>
 <tr><td height="28">
<font face="Arial" size="4">
<b>
Add a user:
</b></font>
<p></p>

<!-- Username-->		
<table border="0" cellpadding="0" cellspacing="0">
<tbody><tr>
<td valign="top">
<font face="Arial" size="2">
<b>Username</b>
</font></label></td>

<td valign="top">
<font face="Arial" size="2">
<input type="text" size="27" name="add_username" value="" >
</font></td></tr>
<p></p>

<!-- Primary Author-->
<tr><td valign="top">
<font face="Arial" size="2">
<b>Primary Author</b>
</font></label></td>

<td valign="top">
<font face="Arial" size="2">
<input type="password"  size="27" name="add_password" >
</font></td></tr>
<p></p>



<tr>
<td>&nbsp;</td>
<td> align="center">
<font face="Arial" size="2">
<input name="submit" value="Add User" type="submit">&nbsp;
<input name="reset" value="Clear" type="reset">
</font>
</td>
</tr>
</tbody></table>
</td>

</form>
</body></html>

<?php
require("footer.php");
}
# If the user isn't logged in then print:
else {
echo "You don't have access to this page";
}
?>