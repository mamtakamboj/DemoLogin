<?php
	/* Insert user details from registration from - registration.php*/
	function insert($name,$pass,$email,$gender,$add,$country)
	{
		$query="INSERT INTO LOGIN(LOG_USER_NAME,LOG_PASSWORD,LOG_EMAIL,LOG_GENDER,LOG_ADDRESS,LOG_COUNTRY) VALUES('$name','$pass','$email','$gender','$add','$country')";
		$result=mysql_query($query);
		return $result;
	}
	/*Insert languages selected by the user - registration.php*/
	function InsertLanguage($id,$lang)
	{
		$query = "INSERT INTO LANGUAGE(LANG_LOG_ID,LANG_LANGUAGE) VALUES($id,'$lang')";
		$result=mysql_query($query);
		return $result;
	}
	/*select email-id and password for login authentication process - index.php*/
	function login($usrname,$pwd)
	{
		$query="SELECT LOG_USER_NAME,LOG_PASSWORD,LOG_EMAIL FROM  LOGIN WHERE LOG_EMAIL='$usrname' and LOG_PASSWORD='$pwd'";
		$result=mysql_query($query);
		return $result;
	}
	/*Select email - registration.php */
	function ChkEmail($mail)
	{
		$query="SELECT LOG_EMAIL FROM LOGIN WHERE LOG_EMAIL='$mail'";
		$result=mysql_query($query);
		return $result;
	}
	/* Select registered users - records.php, edit.php*/
	function select()
	{
		$query="SELECT LOG_ID,LOG_USER_NAME,LOG_EMAIL,LOG_ADDRESS,LOG_COUNTRY ,GROUP_CONCAT(LANG_LANGUAGE, ' ')as lang FROM LOGIN,LANGUAGE WHERE LOGIN.LOG_ID=LANGUAGE.LANG_LOG_ID group by LOG_ID";
		$result=mysql_query($query);
		return $result;
	}
	/* Select user information for modification - showuser.php*/
	function selectForUpdate($id)
	{
		$query="SELECT LOG_ID,LOG_USER_NAME,LOG_EMAIL,LOG_ADDRESS,LOG_COUNTRY FROM LOGIN WHERE LOG_ID='$id'";
		$result=mysql_query($query);
		return $result;
	}
	/*Select user info - edit.php*/
	/*function selectUser()
		{
		$query="SELECT * FROM LOGIN";
		$result=mysql_query($query);
		return $result;
	}*/
	function update($name,$mail,$add,$country,$id)
	{
		$query="UPDATE LOGIN SET LOG_USER_NAME='$name', LOG_EMAIL='$mail', LOG_ADDRESS='$add', LOG_COUNTRY='$country' WHERE LOG_ID=$id";
		$result=mysql_query($query);
		return $result;
	}
	/*Delete user infromation from LOGIN and LANGUAGE table - records.php */
	function delete($id)
	{
		$query="DELETE LOGIN, LANGUAGE FROM LOGIN, LANGUAGE WHERE LOGIN.LOG_ID=LANGUAGE.LANG_LOG_ID  and LOGIN.LOG_ID=$id";
		$result=mysql_query($query);
		return $result;
	}

?>