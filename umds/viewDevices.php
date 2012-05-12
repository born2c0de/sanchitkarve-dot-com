<?php session_start(); ?>
<?php
	include("includes/constants.php");
	include("includes/commonFunctions.php");
	
	if(!isset($_SESSION['username']))
		header("Location: " . APP_WEB_ADDRESS . "/login.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title><?php print APP_NAME; ?></title>
<link href="css/style1.css" rel="stylesheet" type="text/css">
<style type="text/css">
.style1 {
	text-align: center;
}
</style>
</head>
<body>
<?php	include("includes/header.php"); ?>
<?php	include("includes/leftbar.php"); ?>
<?php	include("includes/rightbar.php");?>
<div id="content">
<h2 class="style1">VIEW Devices</h2>
	<p>&nbsp;</p>
	<p>Registered devices for : <b><?php print $_SESSION['username']; ?></b></p>
	<?php
		$regSuccess = false;
	
		$conn = mysql_connect(DATABASE_SERVER_ADDRESS,DATABASE_USERNAME,DATABASE_PASSWORD) or die("Couldn't connect to server");
		$db = mysql_select_db(DATABASE_NAME,$conn) or die("Couldn't select database");
		$username = $_SESSION['username'];
		//$password = md5($_POST["txtPassword"] . MD5_SALT);

		$query="SELECT * FROM devices WHERE username LIKE '" . $username . "'";
		$result = mysql_query($query) or die("Query Failed");
		//echo "Number of Rows : " . mysql_num_rows($result);
		if(mysql_num_rows($result) == 0)
		{
			print "<p>No Devices Registered.</p>";
		}
		else
		{
			while($row = mysql_fetch_array($result))
			{
				$deviceName = $row['deviceName'];
				$deviceID = $row['deviceID'];
				$status = $row['status'];
				print "<p>";
				print "<img alt=\"\" height=\"18\" src=\"images/mobile-icon.gif\" width=\"12\">";
				print $deviceName . " [" . $deviceID . "] ";
				if($status === "paired")
					print "<a href=\"devices_action.php?deviceID=$deviceID\"><img alt=\"\" height=\"16\" src=\"images/delete_icon.png\" width=\"14\" ></a>";
				else
					print "<img alt=\"\" height=\"15\" src=\"images/exclamation-icon.gif\" width=\"15\">";
						
				print "</p>";
			}
		}		
		mysql_close($conn);	
	?>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</div>
<?php include("includes/footer.php"); ?>

</body>
</html>