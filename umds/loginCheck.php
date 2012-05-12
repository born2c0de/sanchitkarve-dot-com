<?php
	//include("includes/validationfunctions.php");
	include("includes/constants.php");
	
	if(!isset($_POST['username']) || !isset($_POST['password']))
	{
		print "Error";
	}
	else
	{	
		$conn = mysql_connect(DATABASE_SERVER_ADDRESS,DATABASE_USERNAME,DATABASE_PASSWORD) or die("Couldn't connect to server");
		$db = mysql_select_db(DATABASE_NAME,$conn) or die("Couldn't select database");
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$query="SELECT * FROM users WHERE username LIKE '" . $username . "' AND password LIKE '" . $password . "'";
		$result = mysql_query($query) or die("Query Failed");
		//echo "Number of Rows : " . mysql_num_rows($result);
		if(mysql_num_rows($result) == 1)
		{
			print "True";
		}
		else
		{
			print "Incorrect Login Credentials";
		}
		mysql_close($conn);
	}
?>