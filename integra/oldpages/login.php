<?php

?>


<?php include("header.php"); ?>


<div style="margin-left:12px; margin-top:1px; margin-bottom:100px; margin-right:100px ">
Please login to see this section
<font face="verdana,arial" size=-1>
<center><table cellpadding=2 cellspacing=0 border=0>
<tr><td bgcolor="blue"><table cellpadding=0 cellspacing=0 border=0 width=100%><tr><td bgcolor="blue" align=center style="padding:2;padding-bottom:4"><b><font size=-1 color="white">Enter your login and password</font></th></tr>
<tr><td bgcolor="white" style="padding:5"><br>
<form method="post" action="http://www.authpro.com/cgi-bin/auth.fcgi" name=pform>
<input type="hidden" name="action" value="login">
<input type="hidden" name="user" value="deluxe">
<input type="hidden" name="hide" value="">
<center><table>
<tr><td><font face="verdana,arial" size=-1>Login:</td><td><input type="text" name="login"></td></tr>
<tr><td><font face="verdana,arial" size=-1>Password:</td><td><input type="password" name="password"></td></tr>
<tr><td><font face="verdana,arial" size=-1>&nbsp;</td><td><font face="verdana,arial" size=-1><input type="submit" value="Enter"></td></tr>
<tr><td colspan=2><font face="verdana,arial" size=-1>&nbsp;</td></tr>
<tr><td colspan=2><font face="verdana,arial" size=-1></td></tr>
</table></center>
</form>
</td></tr></table></td></tr></table>


<?php include("footer.php"); ?>