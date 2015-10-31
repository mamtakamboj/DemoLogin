<?php
	/* Connection to a MySQL Server - Start */
	$con=mysql_connect("localhost","root","12345");
	if(!$con)
	{
		die("Could not connect:" . mysql_error());
	}
	/* Select a MySQL database */
	$con=mysql_select_db("DEMOLOGIN", $con);
	if(!$con)
	{
		die("Could not find database:" . mysql_error());
	}
?>