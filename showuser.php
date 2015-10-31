<?php
	/*File Includes - Start */
	require_once('library/msg.php');
	require_once('library/query.php');
	require_once('config/config.php');
	/*File Includes - End */
	/*Error reporting -Start */
	error_reporting(E_ALL^E_NOTICE);
	/*Error reporting -End */
	$name=$_SESSION['UserName'];
	$id=$_GET["user"];
	$result=selectForUpdate($id);/*query function*/
	if(isset($_GET['update']))
	{
		$uid=$_GET['u_id'];    /* Variables to get the values from input fields */
		$name=$_GET['uname1'];
		$mail=$_GET['email'];
		$add=$_GET['address'];
		$country=$_GET['country'];
		$result1=update($name,$mail,$add,$country,$uid);/*query function*/
		if($result1)
		{
			$msg=$msg12;
			echo '<meta http-equiv="refresh" content="1; url=welcome.php">';
		}
	}
?>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/main.css" />
		<script type="text/javascript" src="validation/loginValidate.js"></script>
	</head>
	<body>
		<div ><?php echo $msg;?></div>
		<?php 
			while($row=mysql_fetch_array($result))
			{
		?>
		<form action="showuser.php" method="get" >
			<input type="hidden" name="u_id" id="u_id"  value="<?php echo $row['LOG_ID'];?> "/>
			<table border="1" align="center" >
				<tr>
					<td>User Name:</td>
					<td><input type="text" name="uname1" id="uname"  value="<?php echo $row['LOG_USER_NAME'];?>"/></td>
				</tr>
				<tr>
					<td>Email-id:</td>
					<td><input type="text" name="email" id="email" value="<?php echo $row['LOG_EMAIL'];?>" /></td>
				</tr>
				<tr>
					<td>Address:</td>
					<td><textarea cols="14" rows="3" name="address" id="address" style="max-width:200px; max-height:100px; min-width:200px; min-height:100px;" value=""><?php echo $row['LOG_ADDRESS'];?></textarea></td>
				</tr>
				<tr>	
					<td>Country:</td>
					<td>
						<select name="country" id="country" > 
							<option value="0">select country</option>
							<option value="India" <?php if($row['LOG_COUNTRY']=='India'){echo 'selected=selected';}?> >India</option>
							<option value="UK" <?php if($row['LOG_COUNTRY']=='UK'){echo 'selected=selected';}?>>UK</option>
							<option value="USA" <?php if($row['LOG_COUNTRY']=='USA'){echo 'selected=selected';}?>>USA </option>
							<option value="China" <?php if($row['LOG_COUNTRY']=='China'){echo 'selected=selected';}?>> China</option>
						</select>
					</td>
				</tr>
				<tr>
					<td> </td>
					<td><input type="submit" name="update" value="Update"  /></td>
				</tr>
				<?php
					};
				?>
			</table>
		</form>
	</body>
</html>