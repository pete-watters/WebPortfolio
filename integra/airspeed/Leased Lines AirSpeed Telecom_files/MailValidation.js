<!--
// Function to validate EMail IDs
// Arguments   : 1. mail : Value of the field containing Email or String Constant.
// Return Value: true if date is valid, false otherwise.

function isValidMail(mail)
{	
	m=new String(mail);
	var mailLength=m.length
	var totalDOT=0
	var totalROUTE=0
	var totalSPACE=0

	// Should not beging with a '.' or '@'
	if(m.charAt(0)=='@' || m.charAt(0) == '.')
	{	return false;		}

	// 
	for(ctr=1;ctr<=mailLength;ctr++)
	{	if (m.charAt(ctr)=='@')	{	totalROUTE++;	}	
		if (m.charAt(ctr)=='.')	{	totalDOT++;	}	
		if (m.charAt(ctr)==' ') {	totalSPACE++;	}
	}

	if (totalROUTE!=1)			//Checking for Multiple @
	{	return false;		}
	if(totalDOT<1)				//Checking for Route Domain
	{	return false;		}
	if(totalSPACE>0)			//No Embeded Space
	{	return false;		}
	
	//Checking for Invalid Characters

	for(ctr=0;ctr<=mailLength;ctr++)
	{	
		if (m.charAt(ctr)=='`')	return false;	
		else if (m.charAt(ctr)=='!')	return false;	
		else if (m.charAt(ctr)==' ') 	return false;	
		else if (m.charAt(ctr)=='#')	return false;	
		else if (m.charAt(ctr)=='$')	return false;	
		else if (m.charAt(ctr)=='%')	return false;	
		else if (m.charAt(ctr)=='^')	return false;	
		else if (m.charAt(ctr)=='&')	return false;	
		else if (m.charAt(ctr)=='*')	return false;	
		else if (m.charAt(ctr)=='(')	return false;	
		else if (m.charAt(ctr)==')')	return false;	
		else if (m.charAt(ctr)=='+')	return false;	
		else if (m.charAt(ctr)=='=')	return false;	
		else if (m.charAt(ctr)=='|')	return false;	
		else if (m.charAt(ctr)=='\\')	return false;	
		else if (m.charAt(ctr)=='{')	return false;	
		else if (m.charAt(ctr)=='}')	return false;	
		else if (m.charAt(ctr)=='[')	return false;	
		else if (m.charAt(ctr)==']')	return false;	
		else if (m.charAt(ctr)==':')	return false;
		else if (m.charAt(ctr)==';')	return false;	
		else if (m.charAt(ctr)=='"')	return false;	
		else if (m.charAt(ctr)=="'")	return false;	
		else if (m.charAt(ctr)=='<')	return false;	
		else if (m.charAt(ctr)=='>')	return false;	
		else if (m.charAt(ctr)==',')	return false;	
		else if (m.charAt(ctr)=='?')	return false;	
		else if (m.charAt(ctr)=='/')	return false;	
	}
	return true;
}
//-->
