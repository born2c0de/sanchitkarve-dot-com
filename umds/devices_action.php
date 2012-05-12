<?php
	session_start();
	include("includes/constants.php");
	include("includes/validationFunctions.php");
	if(!isset($_SESSION['username']))
		header("Location: " . APP_WEB_ADDRESS . "/login.php");
		
		
	// Code for Device Registration
	if(isset($_POST['txtPhoneName']))
	{
		$username = $_SESSION['username'];
		$phoneName = $_POST['txtPhoneName'];
		$deviceID = $_POST['txtDeviceID'];
		$conn = mysql_connect(DATABASE_SERVER_ADDRESS,DATABASE_USERNAME,DATABASE_PASSWORD) or die("Couldn't connect to server");
	    $db = mysql_select_db(DATABASE_NAME,$conn) or die("Couldn't select database");
	    $query="SELECT * FROM devices WHERE username LIKE '" . $username . "' AND deviceID LIKE '" . $deviceID . "'";
	    $result = mysql_query($query) or die("Query Failed");
	    //echo "Number of Rows : " . mysql_num_rows($result);
	    if(mysql_num_rows($result) == 0)
	    {
	    	$ip = getRealIpAddr();
	        $regDate = gmdate(DATE_COOKIE);
	        $query = "INSERT INTO devices(deviceID,username,deviceName,deviceRegistrationDate,deviceRegistrationIP,status) VALUES ('$deviceID','$username','$phoneName','$regDate','$ip','pending')";
	        $result = mysql_query($query) or die("Device Registration failed");
	    }
  		mysql_close($conn);
        header("Location: " . APP_WEB_ADDRESS . "/viewDevices.php");
	}
	
	// Code for Device Deletion
	if(isset($_GET['deviceID']))
	{
		$success=true;
		$username = $_SESSION['username'];
		$deviceID = $_GET['deviceID'];
		$conn = mysql_connect(DATABASE_SERVER_ADDRESS,DATABASE_USERNAME,DATABASE_PASSWORD) or die("Couldn't connect to server");
	    $db = mysql_select_db(DATABASE_NAME,$conn) or die("Couldn't select database");
	    $query="SELECT * FROM devices WHERE deviceID LIKE '" . $deviceID . "' AND username LIKE '" . $username . "'";
	    $result = mysql_query($query) or die("Device Search Failed");
	    //echo "Number of Rows : " . mysql_num_rows($result);
	    if(mysql_num_rows($result) == 1)
	    {
	    	$query = "DELETE FROM devices WHERE deviceID LIKE '" . $deviceID . "' AND username LIKE '" . $username . "'";
	        $result = mysql_query($query) or die("Device Deletion failed");
	    }
	    else
	    {
	    	print "Error : Device Not Found.";
	    	$success=false;
	    }	    	
  		mysql_close($conn);
		if($success == true)
			header("Location: " . APP_WEB_ADDRESS . "/viewDevices.php");
	}
?>