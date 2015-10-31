<?php
	/* Session - Start*/
	session_start();
	if($_SESSION['UserName']=="")
	{ 
		header('location: index.php');
	}
	/* Session - End*/
	/*File Includes - Start */
	require_once('library/msg.php');
	require_once('library/query.php');
	require_once('config/config.php');
	/*File Includes - End */
	/*Error reporting -Start */
	error_reporting(E_ALL^E_NOTICE);
	/*Error reporting -End */
	$name=$_SESSION['UserName'];
	$result=select();/*query function*/
	$id=$_POST['del_id'];/*Variable to get the id to delete the record */
	if(isset($_POST['delete']))
	{
		$result1=delete($id);/*query function*/
		if($result1)
		{
			header('location: records.php');
		}
	}
?>
<html>
	<head>
		<title>welcome</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<div id="conatiner" style="width:900px;">
			<div class="header1" style="width:900px;">
				<b> Welcome <?php echo " " . $name; ?></b><span style="float:right; color:white; margin-right:4px;" ><b><a href="logout.php" style="text-decoration:none;">Logout</a></b></span>
			</div>
			<div style="width:155px; height:500px; border-right:1px gray solid; border-bottom:1px gray solid; float:left;">
				<div class="left-menu" style="padding-left:5px; text-align:center;"><a href="records.php">See Records</a></div>
				<div class="left-menu" style="padding-left:5px; text-align:center;"><a href="edit.php">Edit Records</a></div>

			</div>
			<div style="width:600px; height:auto; border:1px gray solid; float:left; margin:10px 10px 10px 10px ;">
				<table border="1">
					<tr>
						<td width="100"><b>User Name</b></td>
						<td width="100"><b>Email-id</b></td>
						<td width="100"><b>Address</b></td>
						<td width="100"><b>Country</b></td>
						<td width="100"><b>Languge</b></td>
						<td width="100"><b>delete</b></td>
					</tr>
					<?php
						while($row=mysql_fetch_array($result))
						{
					?>
					<tr>
						<form method="post" action="records.php" >
							<input type="hidden" name="del_id" value="<?php echo $row['LOG_ID']; ?>" />
							<td><?php echo $row['LOG_USER_NAME']; ?> </td>
							<td><?php echo $row['LOG_EMAIL']; ?> </td>
							<td ><textarea cols="14" rows="3" name="address" id="address" style="max-width:150px; max-height:100px; min-width:150px; min-height:100px;" disabled value="" ><?php echo $row['LOG_ADDRESS']; ?></textarea> </td>
							<td><?php echo $row['LOG_COUNTRY']; ?> </td>
							<td><?php echo $row['lang'] ; ?> </td>
							<td><input type="submit" name="delete" value="delete" /></td>
						</form>
					</tr>
					<?php
						};
					?>
				</table>
			</div>
		</div>
	</body>
</html>