<?php
session_start();
require("header.php");

?>

<font face="Arial" size="2">

<h1>Welcome to the PEL publications Database!</h1>
<p>
This site was developed using HTML, PHP and MySQL for my final year project. 
It is a dynamic web database for storing references to papers published by the PEL lab.
</p>
<p>
It features the following communal services:

<ul>
<li> Search database</li>
<li>Advanced Boolean search</li>
<li>List generation by date</li>
</ul>


<?php
# If the user is logged in show additional features available
if(isset($_SESSION['USERNAME']) == TRUE) {

echo "Administrator priviledges:";
echo "<ul><li>Add new references</li>";
echo "<li>Edit or delete existing references</li>";
}
# Otherwise echo text below
else{
echo "<p>
To browse the site please use the navigation bar to the left
</p>
<p>
For further information please visit the FAQ section
</p>";
}
require("footer.php");

?>
</ul>

</font>
</body></html>