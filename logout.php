<?php
	/* Session block to check the status of the session*/
	session_start();
	/*If session exist, destroy it and redirect to home page */
	session_destroy();
	header('location: index.php');
?>