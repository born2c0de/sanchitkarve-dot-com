<?php
	include("includes/constants.php");
	if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['deviceID']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$deviceID = $_POST['deviceID'];
		
		
		$conn = mysql_connect(DATABASE_SERVER_ADDRESS,DATABASE_USERNAME,DATABASE_PASSWORD) or die("Couldn't connect to server");
	    $db = mysql_select_db(DATABASE_NAME,$conn) or die("Couldn't select database");
	    $query="SELECT * FROM users WHERE username LIKE '" . $username . "' AND password LIKE '" . $password . "'";
	    $result = mysql_query($query) or die("Cant execute Query#1");
	    //echo "Number of Rows : " . mysql_num_rows($result);
	    if(mysql_num_rows($result) == 1)
	    {
	    	$query = "SELECT * FROM devices WHERE username LIKE '" . $username . "' AND deviceID LIKE '" . $deviceID . "'";
	    	$result = mysql_query($query) or die("Cant execute Query#2");
   		    if(mysql_num_rows($result) == 1)
   		    {
   		    	$query = "UPDATE devices SET status = 'paired' WHERE username LIKE '" . $username . "' AND deviceID LIKE '" . $deviceID . "'";
   		    	$result = mysql_query($query) or die("Device Registration failed");
   		    	print "Success";
   		    }
   		    else
   		    	print "Wrong DeviceID.";   		    	    	
	    }
	    else
	    	print "Wrong Username/Password";
	    	
  		mysql_close($conn);
	}
	else
		print "Error"; //POST variables not set or not detected
?>