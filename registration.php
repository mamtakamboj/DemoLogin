<?php
	/*File Includes - Start */
	require_once('library/msg.php');
	require_once('library/query.php');
	require_once('config/config.php');
	/*File Includes - End */
	/*Error reporting -Start */
	error_reporting(E_ALL^E_NOTICE);
	/*Error reporting -End */
	$msg=""; /* variable to show the message */ 
	$lang="";
	$mailstring= "^[a-z0-9_\+-]+(\.[a-z0-9_\+-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*\.([a-z]{2,4})$"; 
	if(isset($_POST['Submit']))
	{ 
		$name=trim($_POST['uname1']);   /* Variables to get the value from forms */
		$pass=trim($_POST['pwd']);
		$email=trim($_POST['email']);
		$gender=$_POST['gender'];
		$add=trim($_POST['address']);
		$country=$_POST['country'];
		$lang=$_POST['language'];
		if($name=="" || $name==NULL)
		{
			$msg=$msg5;
		}
		elseif($pass=="" || $pass==NULL)
		{	
			$msg=$msg6;
		}
		elseif($email=="" || $email==NULL)
		{
			$msg=$msg7;
		}
		elseif(!eregi($mailstring, $email))
		{
			$msg=$msg11;
		}
		
		elseif($add=="" || $add==NULL)
		{
			$msg=$msg8;
		}
		elseif($lang=="")
		{
			$msg=$msg10;
		}
		elseif($country=="0")
		{
			$msg=$msg9;
		}
		if($msg=="")
		{
			$result1=ChkEmail($email);/*query function*/
			$count=mysql_num_rows($result1);
			if($count>0)
			{
				$msg= $msg13;
				echo '<meta http-equiv="refresh" content="1; url=registration.php">';
			}
			else
			{
				$result=insert($name,$pass,$email,$gender,$add,$country);/*query function*/
				$id=mysql_insert_id();/*get last inserted id*/
				if($result!="")
				{
					for($i=0; $i<count($lang); $i++)
					{
						$result1=InsertLanguage($id,$lang[$i]);/*query function*/
					}
				}
				if(!$result)
				{
					$msg=$msg3;
				}
				else
				{
					$msg=$msg2;
					echo '<meta http-equiv="refresh" content="3; url=index.php">';
				}
			}
		}
	}
?>
<html>
	<head>
		<title>Registration</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<script type="text/javascript" src="validation/loginValidate.js"></script>
	</head>
	<body>
		<div class="registration">
			<div style="width:400px; height:30px; background-color:#0066CC; color:#FFFFFF; text-align:center;"><b>Registration Form</b></div>
			<div id="msg" style="margin-left:100px; color:red;"><?php echo $msg; ?></div>
			<form action="#" method="post" onSubmit="return ValidateLanguage()">
				<div style="width:400px; height:40px; padding-top:5px;">
					<div style="" class="registration-text">User Name:</div>
					<div style="" class="registration-feild" ><input type="text" name="uname1" id="uname" onblur="return ValidateName();" value=""/></div>
					<div id="errorname" class="error" style=""></div>
				</div>
				<div style="width:400px; height:40px;">
					<div class="registration-text" >Password:</div>
					<div class="registration-feild" ><input type="password" name="pwd" id="pwd" onblur="return ValidatePassword()"/></div>
					<div id="errorpwd" class="error" style=""></div>
				</div>
				<div style="width:400px; height:40px;">
					<div class="registration-text" >Email-id:</div>
					<div class="registration-feild" ><input type="text" name="email" id="email" onblur="return ValidateMail()" /></div>
					<div id="errormail" class="error" style=""></div>
				</div>
				<div style="width:400px; height:40px;">
					<div class="registration-text" >Gender:</div>
					<div class="registration-feild" ><input type="radio" name="gender" value="M" checked="checked"/>Male<input type="radio" name="gender" value="F"/>Female</div>
				</div>
				<div style="width:400px; height:100px;">
					<div class="registration-text">Address:</div>
					<div class="registration-feild" ><textarea cols="14" rows="3" name="address" id="address" style="max-width:180px; max-height:100px; min-width:180px; min-height:100px;" onblur="return ValidateAddress()"></textarea></div>
					<div id="erroradd" class="error" style=""></div>
				</div>
				<div style="width:400px; height:80px;">
					<div class="registration-text" >language:</div>
					<div class="registration-feild" ><input type="checkbox" name="language[]" value="English" />English<br>
						<input type="checkbox" name="language[]" value="Hindi" />Hindi<br>
						<input type="checkbox" name="language[]" value="Punjabi" />Punjabi
					</div>
					<div id="errorlang" class="error" style=""></div>
				</div>
				<div style="width:400px; height:40px;">
					<div class="registration-text" >Country:</div>
					<div class="registration-feild" >
						<select name="country" id="country" onblur="return ValidateCountry()">
							<option value="0">select country</option>
							<option value="India">India</option>
							<option value="UK">UK</option>
							<option value="USA">USA </option>
							<option value="China"> China</option>
						</select>
					</div>
					<div id="errorcountry" class="error" style=""></div>
				</div>
				<div style="width:400px; height:40px;">
					<div style="width:100px; margin-left:150px;"><input type="submit" name="Submit" value="Submit" onclick="" /></div>
				</div>
			</form>
		</div>
	</body>
</html>