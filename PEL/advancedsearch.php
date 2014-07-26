<!--PHP code is initialised and session is started -->
<?php
session_start();
# header.php is included
require("header.php");

# If unable to connect to database echo "Could not connect"
$con = mysql_connect("localhost","peterjwa_peter","5zejyc8v");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
# Select database and connection
mysql_select_db("peterjwa_pel", $con);

##################
# Boolean search #
##################

# If 'submit1' button is pressed:
if($_POST['submit1'])
{
# Advanced search query. 
# Selects all entries from publications where the option in menu 1 #is similar to the user input in field 1
# If selected $_POST[boolean1] is an AND/OR operation to link the #first input to the next and so on
# e.g. select where author LIKE .... AND title LIKE ... OR year ....
$result_1 = mysql_query("SELECT * FROM publications WHERE $_POST[adv1] LIKE '%$_POST[advanced1]%' $_POST[boolean1] $_POST[adv2] LIKE '%$_POST[advanced2]' $_POST[boolean2] $_POST[adv3] LIKE '%$_POST[advanced3]%' $_POST[boolean3] $_POST[adv4] LIKE '%$_POST[advanced4]%'");

# Display table header to contain results
echo "<table border='0' bgcolor='#eee'>
<tr>
<th>Title</th>
<th>Primary Author</th>
<th>Secondary Authors</th>
<th>URL</th>
<th>Category</th>
<th>Location</th>
<th>Year</th>
</tr>";

$i=0;

# While the query matches a row insert the row into the table displayed in the browser
while($row = mysql_fetch_array($result_1))
  {
if($i>0)
{
echo "<tr valign=bottom>";
echo "<td bgcolor='#eee' colspan='6'></td>";
echo "</tr>";
}
echo "<tr valign=center>";


  echo "<tr>";
echo "<td>" . $row['title'] . "</td>";
echo "<td>" . $row['p_author'] . "</td>";
echo "<td>" . $row['s_author'] . "</td>";
echo "<td>" . $row['url'] . "</td>";
echo "<td>" . $row['cat_description'] . "</td>";
echo "<td>" . $row['location'] . "</td>";
echo "<td>" . $row['year'] . "</td>";
  echo "</tr>";
$i++;
  }
echo "</table>";

}

##################
# Search by year #
##################

#If 'submit2' pressed, perform this query instead
elseif($_POST['submit2'])
{
# Select all entries where the year matches that typed in by the #user or when the year
# is between the two years selected in the menu
$result_2 = mysql_query("SELECT * FROM publications WHERE year='$_POST[searchManualYear]' OR 
year<='$_POST[searchDates2]' AND year>='$_POST[searchDates3]'");

# Header of results table
echo "<table border='0' bgcolor='#eee'>
<tr>
<th>Title</th>
<th>Primary Author</th>
<th>Secondary Authors</th>
<th>URL</th>
<th>Category</th>
<th>Location</th>
<th>Year</th>
</tr>";

$i=0;
# While the query matches a row
while($row = mysql_fetch_array($result_2))
  {

if($i>0)
{
echo "<tr valign=bottom>";
echo "<td bgcolor='#eee' colspan='6'></td>";
echo "</tr>";
}
echo "<tr valign=center>";

# Display results in browser
  echo "<tr>";
echo "<td>" . $row['title'] . "</td>";
echo "<td>" . $row['p_author'] . "</td>";
echo "<td>" . $row['s_author'] . "</td>";
echo "<td>" . $row['url'] . "</td>";
echo "<td>" . $row['cat_description'] . "</td>";
echo "<td>" . $row['location'] . "</td>";
echo "<td>" . $row['year'] . "</td>";
echo "</tr>";

$i++;
}
echo "</table>";

}


else{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<body>
<!--Form displayed in browser for boolean search -->
<form name="searchForm" method="post" action="advancedsearch.php">
<td>
<font face="Arial" size="2">
<font face="Arial" size="+2">Advanced Search</font><p></p>
</font>
</td>
</tr>

<table border="0" cellpadding="0" cellspacing="0" width="770">
<tbody>
<tr>
<td align="left" width="211"><font face="Arial" size="2"><b>
* Find where:
</b></font></td>
</tr>

<!--Row 1- first drop down menu-->
<tr>
<td align="left" valign="top">
<font face="Arial" size="2">
<!--Select name is what is used to refer to that option -->
<select name="adv1">
<option value="title">Title</option>
<option value="p_author">Primary Author</option>
<option value="s_author">Secondary Authors</option>
<option value="cat_description">Category</option>
<option value="location">Location</option>
<option value="year">Date(Year)</option>
</select>
</font>

<!-- input box for first query -->
<font face="Arial" size="2">
<input size="25" name="advanced1" value="" type="text">&nbsp;

<!-- boolean drop down menu -->
<select name="boolean1">
<option value="AND">And</option>
<option value="OR">Or</option>
</select>
</font>
</td>
</tr>

<!--Row 2 second drop down menu-->
<tr>
<td align="left" valign="top">
<font face="Arial" size="2">
<select name="adv2">
<option value="p_author">Primary Author</option>
<option value="title">Title</option>
<option value="s_author">Secondary Authors</option>
<option value="cat_description">Category</option>
<option value="location">Location</option>
<option value="year">Date(Year)</option>
</select>
</font>

<!-- input box for second query -->
<font face="Arial" size="2">
<input size="25" name="advanced2" value="" type="text">&nbsp;
<!-- boolean drop down menu -->
<select name="boolean2">
<option value="AND">And</option>
<option value="OR">Or</option>
</select></font></td></tr>

<!--Row 3 drop down menu-->
<tr>
<td align="left" valign="top">
<font face="Arial" size="2">
<select name="adv3">
<option value="s_author">Secondary Authors</option>
<option value="p_author">Primary Author</option>
<option value="title">Title</option>
<option value="cat_description">Category</option>
<option value="location">Location</option>
<option value="year">Date(Year)</option>
</select>
</font>


<font face="Arial" size="2">
<input size="25" name="advanced3" value="" type="text">&nbsp;

<select name="boolean3">
<option value="AND">And</option>
<option value="OR">Or</option>
</select></font></td></tr>

<tr>
<td align="left" valign="top">
<font face="Arial" size="2">
<select name="adv4">
<option value="year">Date(Year)</option>
<option value="title">Title</option>
<option value="p_author">Primary Author</option>
<option value="s_author">Secondary Authors</option>
<option value="cat_description">Category</option>
<option value="location">Location</option>
</select>
</font>
<font face="Arial" size="2">
<input name="advanced4" value="" type="text">&nbsp;
</font></td></tr>

<!-- 'submit1' button -->
<td align="center">
<font face="Arial" size="2">
<input name="submit1" value="Search" type="submit">&nbsp;
<!-- clears form -->
<input name="reset1" value="Clear" type="reset">
</font>
</td>
</tr>


<table border="0" cellpadding="0" cellspacing="0" width="770">
<tbody>
<tr>
<!-- Section for searching by year -->
<td colspan="2"><font face="Arial" size="2"><b>
* Generate list of publications by date:
</span></b></font></td>
</tr>
		
<tr>
<td align="left">
<font face="Arial" size="2">
Between&nbsp;&nbsp;
</font>

<!--Drop down menu of years -->
<font face="Arial" size="2">
<select name="searchDates2" size="3">
<option value=""></option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
</select>

<font face="Arial" size="2">
And&nbsp;&nbsp;
</font>

<font face="Arial" size="2">
<select name="searchDates3" size="3">
<option value=""></option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
</select>

<!-- Input box to search by specific year -->
<font face="Arial" size="2">
&nbsp; <b>OR</b> enter a specific year:&nbsp;</font>
<input name="searchManualYear" size="6" value="" type="text">

</td>
</tr>

<tr>
<td align="center">
<font face="Arial" size="2">
<!-- 'submit2' button to search by year -->
<input name="submit2" value="Search" type="submit">&nbsp;
<input name="reset2" value="Clear" type="reset">
</font>
</td>
</tr>

<p>
</form></body></html>
<?php
}
# footer.php is included
require("footer.php");
?>