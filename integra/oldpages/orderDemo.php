<?php

?>


<?php include("header.php"); ?>


<div style="margin-left:12px; margin-top:1px; margin-bottom:100px; margin-right:100px ">

<p> 
              Feel free to order a demonstration of our products, we can arrange an online demonstration or answer any queries you may have.<br>
              We will contact you promptly to understand your requirements and suggest the most appropriate solution. 
              </p>
              
              <p>
              <b> Fields marked with an asterix are required </b> 
              </p>
              
<form action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" name ="orderDemoForm" method="POST">

<input type=hidden name="oid" value="00D200000000kBg">

                    
<label for="title">Title</label> <span class="star"> *</span><br />
<select name="title"   id="label">
                        <option value="" selected="selected">--None--</option>
                        <option value="Mr.">Mr.</option>
                        <option value="Ms.">Ms.</option>
                        <option value="Mrs.">Mrs.</option>
                       
                    </select>
<br />

<label for="first_name">First Name</label> <span class="star"> *</span><br />
<input  id="first_name" maxlength="40" name="first_name" size="20" type="text" /><br />

<label for="last_name">Last Name</label> <span class="star"> *</span><br />
<input  id="last_name" maxlength="80" name="last_name" size="20" type="text" /><br />

<label for="email">Email</label><span class="star"> *</span><br />
<input  id="email" maxlength="80" name="email" size="20" type="text" /><br />

<label for="phone">Phone</label><br />
<input  id="phone" maxlength="40" name="phone" size="20" type="text" /><br />

<label for="company">Company</label><br />
<input  id="company" maxlength="40" name="company" size="20" type="text" /><br />

<label for="country">Country</label><br />
<input  id="country" maxlength="40" name="country" size="20" type="text" /><br />

No. Practices: <br />
<input  id="00N20000000pPok" name="00N20000000pPok" size="20" type="text" /><br />

Requirements Description:  <br />
<textarea  id="00N20000000mdGp" name="00N20000000mdGp" type="text" wrap="soft"></textarea><br />



<input type=hidden name="retURL" value="http://www.integra.ie/orderDemoConfirmed.php">

<input type="submit" name="submit">

</form>
<!-- Form validation --> 
<script language="JavaScript" type="text/javascript">
//You should create the validator only after the definition of the HTML form

  var frmvalidator  = new Validator("orderDemoForm");
  
   frmvalidator.addValidation("title","req","Please select your title");
   
  frmvalidator.addValidation("first_name","req","Please enter your First Name");
  frmvalidator.addValidation("first_name","alpha","Alphabetic chars only");
  
  frmvalidator.addValidation("last_name","req","Please enter your Last Name");
  frmvalidator.addValidation("last_name","alpha","Alphabetic chars only");
  
  frmvalidator.addValidation("email","maxlen=50");
  frmvalidator.addValidation("email","req", "Please enter your email address");
  frmvalidator.addValidation("email","email");
 
  

 
</script>






<?php include("footer.php"); ?>