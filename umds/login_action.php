<?php session_start(); ?>
<?php
	//include("includes/validationfunctions.php");
	include("includes/constants.php");
	
	$loginSuccess = false;
	
	$conn = mysql_connect(DATABASE_SERVER_ADDRESS,DATABASE_USERNAME,DATABASE_PASSWORD) or die("Couldn't connect to server");
	$db = mysql_select_db(DATABASE_NAME,$conn) or die("Couldn't select database");
	$username = $_POST["txtEmail"];
	$password = md5($_POST["txtPassword"] . MD5_SALT);

	$query="SELECT * FROM users WHERE username LIKE '" . $username . "' AND password LIKE '" . $password . "'";
	$result = mysql_query($query) or die("Query Failed");
	//echo "Number of Rows : " . mysql_num_rows($result);
	if(mysql_num_rows($result) == 1)
	{
		session_start();
		$_SESSION['username']=$username;
		header("Location: " . APP_WEB_ADDRESS . "/home.php");
	}
	else
	{
		include("newPageTemplate.php");
		//print "<div id=\"content\">";
		//print "<p>Login Failed. Click <a href=\"login.php\">here</a> and try again";
		//print "</div>";
	}
	mysql_close($conn);	
?>