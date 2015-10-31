<?php
	/* Session - Start*/
	session_start();
	/* Session - End*/
	/*File Includes - Start */
	require_once('library/msg.php');
	require_once('library/query.php');
	require_once('config/config.php');
	/*File Includes - End */
	$msg="";
	if(isset($_POST['Submit']))
	{
		$usrname=$_POST['uname'];
		$pwd=$_POST['pwd'];
		if(($usrname=="" || $usrname==NULL) && ($pwd=="" || $pwd==NULL))
		{
			$msg=$msg4;
		}
		else
		{ 
			$result=login($usrname,$pwd);/*query function */
			$count=mysql_num_rows($result);
			if($count>0)
			{
				$row=mysql_fetch_array($result);
				$_SESSION['UserId']=$usrname;
				$_SESSION['UserName']=$row['LOG_USER_NAME'];
				header("Location:welcome.php");
			}
			else
			{
				$msg=$msg1;
			}
		}
	}
?>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<script type="text/javascript" src="validation/loginValidate.js"> </script>
	</head>
	<body>
		<div id="conatiner">
			<div class="header"><b> Welcome </b></div>
			<div class="mid-panel">
				<div class="mid-left"></div>
				<div class="mid-right">
					<div id="msg" style="color:white"><?php echo $msg; ?></div>
					<form method="post" action="index.php">
						<fieldset>
							<legend style="color:white"><b>Login</b></legend>
							<table>
								<tr>
									<td width="100">Email-id <span style="color:red;">*</span></td>
									<td><input type="text" name="uname" id="uname" onblur="return ValidateName();" />
								</tr>
								<tr>
									<td> </td>
									<td><div id="errorname" style="color:#FF0000; font-size:10px;"></div> </td>
								</tr>
								<tr>
									<td>Password <span style="color:red;">*</span></td>
									<td><input type="password" name="pwd" id="pwd" onblur="return ValidatePassword()"/>
								</tr>
								<tr>
									<td> </td>
									<td><div id="errorpwd" style="color:#FF0000; font-size:10px;"></div> </td>
								</tr>
								<tr>
									<td><a href="registration.php" style="">New User</a></td>
									<td><input type="submit" name="Submit" value="Submit" />
								</tr>

							</table>
						</fieldset>
					</form>
				</div>
			</div>
			<div class="footer"></div>
		</div>
	</body>
</html>