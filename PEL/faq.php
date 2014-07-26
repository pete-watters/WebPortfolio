<?php
session_start();
require("header.php");
?>

<h2>Searching the Database</h2>
<p>
To search the PEL database simply use the panel to the left to navigate to the search page.
Then enter the search parameters and press submit. 
</p>


<h2>Advanced Search</h2>
<p>
If more complicated parameters are to be included then advanced search is probably a better alternative. It consists of two ways of searching:
<ul>
<li>Boolean search</li>
<li>Search by year</li>
</ul>
</p>
<p>
<b>Boolean Search:</b>
</p>
<p>
Using the drop down menus select the search query data type and enter the query. Combine queries using the drop down AND/OR menu and press submit to query the database.
</p>

<p>
<b> Search by year:</b>
<p>
To generate a list of publications by year either enter a specific year or use the menu to choose a date range then press submit to process the query.
</p>

<?php
# If user is logged in show more instructions
if(isset($_SESSION['USERNAME']) == TRUE) {

echo "
<h2>Adding and deleting references</h2>
<p>
To add delete or modify references you must be logged in. Follow the link to the administration page where you will see a table of all current references. To delete any of these simply click on the red cross beside it. To add a reference to the database fill in the details and submit the form. To modify an existing reference enter the row id number and the new data then press the edit button. 

</p>


<h2>Managing users</h2>
<p>
To manage user accounts yopu must be logged in. Go to the manage accounts page and you will see a list of current usernames and id's. To add a new user simply type in the new username and password. 
</p>";

require("footer.php");
}
?>
