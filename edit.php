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
?>
<html>
	<head>
		<title>welcome</title>
		<link rel="stylesheet" type="text/css" href="css/main.css" />
		<script type="text/javascript" src="js/ajax.js"></script>
	</head>
	<body>
		<div id="conatiner">
			<div class="header1" style="width:800px;"><b> Welcome <?php echo " " . $name; ?></b><span style="float:right; color:white; margin-right:4px;" ><b><a href="logout.php" style="text-decoration:none;">Logout</a></b></span></div>
			<div style="width:155px; height:500px; border-right:1px gray solid; border-bottom:1px gray solid; float:left;">
				<div class="left-menu" style="padding-left:5px; text-align:center;"><a href="records.php">See Records</a></div>
				<div class="left-menu" style="padding-left:5px; text-align:center;"><a href="edit.php">Edit Records</a></div>
			</div>
			<form action="" method="">
				<select name="user" id="user" onchange="showUser(this.value)" >
					<option value="0">select </option>
					<?php
						while($row=mysql_fetch_array($result))
						{
					?>
					<option value="<?php echo $row['LOG_ID']; ?>"><?php echo $row['LOG_USER_NAME']; ?></option>
					<?php
						};
					?>
				</select> 
			</form>
			<div id="info">information</div>
		</div>
	</body>
</html>