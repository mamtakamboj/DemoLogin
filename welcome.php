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
?>
<html>
	<head>
		<title>welcome</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<div id="conatiner1">
			<div class="header1"><b> Welcome <?php echo " " . $name; ?></b>
				<span style="float:right; color:white; margin-right:4px;" ><b><a href="logout.php" style="text-decoration:none;">Logout</a></b></span>
			</div>
			<div style="width:155px; height:300px; border-right:1px gray solid; border-bottom:1px gray solid; float:left;">
				<div class="left-menu" style="padding-left:5px; text-align:center;"><a href="records.php">See Records</a></div>
				<div class="left-menu" style="padding-left:5px; text-align:center;"><a href="edit.php">Edit Records</a></div>
			</div>
		</div>
	</body>
</html>