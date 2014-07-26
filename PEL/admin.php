<!--PHP code is initialised and session is started -->
<?
session_start();
# header.php is included
include("header.php");
# checks if user is logged in and displays page if they are
if(isset($_SESSION['USERNAME']) == TRUE) {

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<!-- Page title -->
<title>administration page</title>
<!-- apply stylesheet.css to the page -->
<link href="stylesheet.css" rel="stylesheet" type="text/css">
</head>

<body>


<?
# If unable to connect to the database
if(!mysql_connect("localhost","root",""))
{
# Print:
echo "<h2>Cannot connect to database</h2>";
die();
}
mysql_select_db("pel");
?>

<!--Table displaying references currently in the database -->
<h2>Currently exisiting references</h2>
<!-- Table properties -->
<table border='0' cellpadding='1' cellspacing='0' color='#000'>
<tr bgcolor='#eee'>
<!--Row titles -->
<td class=tabhead>ID</td>
<td class=tabhead>Title</td>
<td class=tabhead>Primary author</td>
<td class=tabhead>Secondary authors</td>
<td class=tabhead>Category description</td>
<td class=tabhead>URL</td>
<td class=tabhead>Year</td>
</tr>


<?
# If the delete icon is pressed
if($_REQUEST['action']=="del")
{
# Delete the entry for that row
mysql_query("DELETE FROM publications WHERE id={$_REQUEST['id']};");
}

# Select all currently existing reference details and display them 
# in order of year
$result=mysql_query("SELECT id,title, p_author,s_author,url, cat_description,location,year FROM publications ORDER BY year;");

# Initialise variable $i to zero
$i=0;
# While loop used to display results row by row
while( $row=mysql_fetch_array($result) )
{
if($i>0)
{
echo "<tr valign=bottom>";
echo "<td bgcolor='#ffffff' colspan='6'></td>";
echo "</tr>";
}
echo "<tr valign=center>";

# Displays delete icon beside each entry and processes it if pressed  
echo "<td class=tabval>
<a onclick=\"return confirm(<img src=b_drop.png width=16 height=16 alt=delete>);\" href=admin.php?action=del&id=".$row['id'].">
<img src=b_drop.png width=16 height=16 alt=delete>>
</a></td>";

# Code to insert the values from the database into rows in the table visible in the browser 
echo "<td class=tabval><b>".$row['id']."</b></td>";
echo "<td class=tabval><b>".$row['title']."</b></td>";
echo "<td class=tabval>".$row['p_author']."&nbsp;</td>";
echo "<td class=tabval>".$row['s_author']."&nbsp;</td>";
echo "<td class=tabval>".$row['cat_description']."&nbsp;</td>";
# Here I add code to make the url into a direct link to the paper 
# source
echo "<td class=tabval>
<a href=http://".$row['url'].">".$row['url']."</a>&nbsp;</td>";
echo "<td class=tabval>".$row['year']."&nbsp;</td>";

echo "</tr>";
$i++;

}
# These commands are carried out it the 'submit' button in the HTML form below is pressed
if($_POST['submit'])
{
# Query that inserts the form field values input by the user into 
# the database
$result = mysql_query("INSERT INTO publications (title,p_author, s_author, url, cat_description,location, year) VALUES ('$_POST[add_title]', '$_POST[add_pauthor]','$_POST[add_sauthor]','$_POST[add_url]',
'$_POST[add_cat_description]','$_POST[add_location]','$_POST[add_year]')");

echo "You have sucessfully updated the database!";
echo "<a href=admin.php>View changes made</a>";
}
# These commands are carried out if the 'submit2' button is pressed
if($_POST['submit2'])
{
# Query that updates the relevant row in the database with the user input
$result2=mysql_query("UPDATE publications SET title='$_POST[add_title]', p_author='$_POST[add_pauthor]',s_author='$_POST[add_sauthor]',url='$_POST[add_url]',
cat_description='$_POST[add_cat_description]',location='$_POST[add_location]',year='$_POST[add_year]' WHERE id='$_POST[old_id]'");

echo "You have sucessfully updated the database!";
echo "<a href=admin.php>View changes made</a>";
}
?>

</table>
<!-- This is the input form displayed before any buttons are pressed -->
<h2>Add a new reference/ Update existing reference</h2>

<!-- The forms action is this file admin.php and uses the POST method-->
<form name=input action=admin.php method=POST>

<table border=0 cellpadding=0 cellspacing=0>
<!-- Title -->
<tr><td valign="top">
<font face="Arial" size="2">
<b>Title</b>
</font></label></td>

<td valign="top">
<font face="Arial" size="2">
<input type="text" size="27" name="add_title" value="" >
</font></td></tr>
<p></p>

<!-- Primary Author-->
<tr><td valign="top">
<font face="Arial" size="2">
<b>Primary Author</b>
</font></label></td>

<td valign="top">
<font face="Arial" size="2">
<input type="text"  size="27" name="add_pauthor" >
</font></td></tr>
<p></p>

<!-- Secondary Authors-->
<tr><td valign="top">
<font face="Arial" size="2">
<b>Secondary Author</b>
</font></label></td>

<td valign="top">
<font face="Arial" size="2">
<input type="text" size="27" name="add_sauthor" >
</font></td></tr>

<!-- Conference/Journal-->
<tr><td valign="top">
<font face="Arial" size="2">
<b>Conference/Journal</b>
</font></label></td>

<td valign="top">
<font face="Arial" size="2">
<input type="text" size="27" name="add_cat_description" >
</font></td></tr>

<!-- Location-->
<tr><td valign="top">
<font face="Arial" size="2">
<b>Location</b>
</font></label></td>

<td valign="top">
<font face="Arial" size="2">
<input type="text" size="27" name="add_location" >
</font></td></tr>

<!-- Paper URL-->
<tr><td valign="top">
<font face="Arial" size="2">
<b>URL of publication</b>
</font></label></td>

<td valign="top">
<font face="Arial" size="2">
<input type="text" size="27" name="add_url" >
</font></td></tr>



<!-- Year-->
<tr><td valign="top">
<font face="Arial" size="2">
<b>Year</b>
</font></label></td>

<td valign="top">
<font face="Arial" size="2">
<input type="int" size="27" name="add_year" >
</font></td></tr>

<!-- Old id for Updating row -->
<tr><td>
<input type="submit" border="0" value= "add reference" name="submit">
Enter reference id and <b>Update</b>
<input type="text" size="3" name="old_id" >
<input type="image" src="b_edit.png" width="16" height="16" alt="edit reference" name="submit2"> 
</td></tr>


</table>
</form>

</body>
</html>
<?php
#Include footer.php
include("footer.php");
}
# If the user isn't logged in print the statement below
else {
echo "You don't have access to this page";
}
?>