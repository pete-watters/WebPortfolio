<?php
if ($_GET['randomId'] != "2o44qQyLH2fFkeV6CZ5DzcjWSP2ZUu0DSj5NSVMD0VuSnMdPoHiJGm8rwS1OQKxz") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  
