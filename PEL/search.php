<?php
# Start the session
session_start();
# Include header file
require("header.php");

$con = mysql_connect("localhost","peterjwa_peter","5zejyc8v");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("peterjwa_pel", $con);
# If the submit button in the form is pressed
if($_POST['submit'])
{
#Select rows form table where values match user input
$result = mysql_query("SELECT * FROM publications WHERE title LIKE '%$_POST[query1]%' AND p_author LIKE '%$_POST[query2]%'  AND s_author LIKE '%$_POST[query3]%'");

# Display table headers
echo "<table border='0' bgcolor='#eee'>
<tr>
<th>Title</th>
<th>Primary Author</th>
<th>Secondary Authors</th>
<th>URL</th>
<th>Category</th>
<th>Location</th>
<th>Date</th>
</tr>";

$i=0;
# While the result is a row display the results in the table
while($row = mysql_fetch_array($result))
  {
if($i>0)
{
echo "<tr valign=bottom>";
echo "<td bgcolor='#eee' colspan='6'></td>";
echo "</tr>";
}
echo "<tr valign=center>";


  echo "<tr>";
echo "<td >" . $row['title'] . "</td>";
echo "<td >" . $row['p_author'] . "</td>";
echo "<td>" . $row['s_author'] . "</td>";
echo "<td>" . $row['url'] . "</td>";
echo "<td>" . $row['cat_description'] . "</td>";
echo "<td>" . $row['location'] . "</td>";
echo "<td>" . $row['date'] . "</td>";
echo "</tr>";

$i++;
  }
echo "</table>";

}

else{
?>


<!--Form definition -->
<form name="input" action="search.php" method="POST">
<!--Table definitions -->
<table border="0" cellpadding="0" cellspacing="0" width="770">
<tbody>
 <tr><td height="28">
<font face="Arial" size="4">
<b>
Search PEL publications database:
</b></font>
<p></p>

<!-- Title-->		
<table border="0" cellpadding="0" cellspacing="0" color="#000">
<tr bgcolor=#eee>
<font face="Arial" size="4">
<b>
Search by:
</b></font>
<p></p>
<tbody><tr>
<td valign="top">
<font face="Arial" size="2">
<b>Title</b>
</font></label></td>

<td valign="top">
<font face="Arial" size="2">
<input type="text" size="27" name="query1" value="" >
</font></td></tr>
<p></p>

<!-- Primary Author-->
<tr><td valign="top">
<font face="Arial" size="2">
<b>Primary Author</b>
</font></label></td>

<td valign="top">
<font face="Arial" size="2">
<input type="text"  size="27" name="query2" >
</font></td></tr>
<p></p>

<!-- Secondary Authors-->
<tr><td valign="top">
<font face="Arial" size="2">
<b>Secondary Author</b>
</font></label></td>

<td valign="top">
<font face="Arial" size="2">
<input type="text" size="27" name="query3" >
</font></td></tr>


<tr>
<td>&nbsp;</td>
<td align="center">
<font face="Arial" size="2">
<input name="submit" value="Search" type="submit">&nbsp;
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
?>