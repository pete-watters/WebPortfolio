<?php
?>
              
            <td valign="top" width="685"><!-- InstanceBeginEditable name="content_area" -->
              <table border="0" cellpadding="0" cellspacing="0" width="685">
                <tbody><tr>
                 
                </tr>
               
<td class = "text">
						
  						<!-- navigation --> 
                
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

<label for="phone">Phone</label><span class="star"> *</span><br />
<input  id="phone" maxlength="40" name="phone" size="20" type="text" /><br />

<label for="company">Company</label><span class="star"> *</span><br />
<input  id="company" maxlength="40" name="company" size="20" type="text" /><br />

<label for="country">Country</label><span class="star"> *</span><br />
<input  id="country" maxlength="40" name="country" size="20" type="text" /><br />

No. Practices: <br />
<input  id="00N20000000pPok" name="00N20000000pPok" size="20" type="text" /><br />

Requirements Description:  <span class="star"> *</span><br />
<textarea  id="00N20000000mdGp" name="00N20000000mdGp" type="text" wrap="soft"></textarea><br />



<input type=hidden name="retURL" value="http://www.ocuco.com/order_demo_confirmed.php">

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
 
  
  frmvalidator.addValidation("phone","req", "Please enter your contact phone number");
  frmvalidator.addValidation("phone","maxlen=50");
  frmvalidator.addValidation("phone","numeric");

  frmvalidator.addValidation("company","req","Please enter your Company");
   
  frmvalidator.addValidation("country","req","Please enter your Country");

  frmvalidator.addValidation("00N20000000mdGp","req","Please enter your requirements to help us direct you query");
</script>


</td>
                
                <tr>

                  <td>&nbsp;</td>
                </tr>
              </tbody></table>
            <!-- InstanceEndEditable --></td>
            </tr>
      
    </table></td>
  </tr>