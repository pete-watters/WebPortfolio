<!-- Display menu of links to pages on site -->
<h1>Menu</h1>
<ul>
<li><a href="http://www.peterjwatters.com/PEL/search.php">Search</a></li>
<li><a href="http://www.peterjwatters.com/PEL/advancedsearch.php">Advanced Search</a></li>
<?php
# If the user is logged in
if(isset($_SESSION['USERNAME']) == TRUE) {
#Show links to administration pages
echo "<li><a href = 'admin.php'>Administration page</a></li>";
echo "<li><a href = 'manage_accounts.php'>Manage accounts</a></li>";
}
?>
</ul>