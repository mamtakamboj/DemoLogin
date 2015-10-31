/* .............Java script functions for client side validations ..........*/
/*Function to validate the name field */
function ValidateName()
{
	var usrname=document.getElementById('uname').value;
	if(usrname=="" || usrname.trim()=="")
	{
		document.getElementById('errorname').innerHTML="Enter User Name";
		return false;
	}
	else
		document.getElementById('errorname').innerHTML="";
}
/*Function to validate password field */
function ValidatePassword()
{
	var pass=document.getElementById('pwd').value;
	if(pass=="" || pass.trim()=="")
	{
		document.getElementById('errorpwd').innerHTML="Enter Password";
		return false;
	}
	else
		document.getElementById('errorpwd').innerHTML="";
}
/*Function to validate Email-id*/
function ValidateMail()
{
	var mail=document.getElementById('email').value;
	var atpos=mail.indexOf("@");
	var dotpos=mail.lastIndexOf(".");
	if(mail=="")
	{
		document.getElementById('errormail').innerHTML="Enter Email-id";
		return false;
	}
	else if(atpos<1 || dotpos<atpos+2 || dotpos+2>=mail.length)
	{
		document.getElementById('errormail').innerHTML="Not a valid e-mail address";
		return false;
	}
	else
		document.getElementById('errormail').innerHTML="";
}
/*Function to validate address address */
function ValidateAddress()
{
	var add=document.getElementById('address').value;
	if(add=="" || add.trim()=="")
	{
		document.getElementById('erroradd').innerHTML="Enter address";
		return false;
	}
	else
		document.getElementById('erroradd').innerHTML="";
}
/*Function to validate language field */
function ValidateLanguage()
{
	var lang=document.getElementsByName('language[]');
	var hasChecked=false;
    for (var i = 0; i < lang.length; i++)
	{
		if (lang[i].checked) 
		{
			hasChecked = true;
			break;
		}
	}
	if (hasChecked==false)
	{
		document.getElementById('errorlang').innerHTML="Please select at least one language.";
		return false;
	}
	else
		document.getElementById('errorlang').innerHTML="";
}
/*Function to validate the country field */
function ValidateCountry()
{
	var count=document.getElementById('country').value;
	if(count=="0")
	{
		document.getElementById('errorcountry').innerHTML="Select at least one country";
		return false;
	}
	else
		document.getElementById('errorcountry').innerHTML="";
}