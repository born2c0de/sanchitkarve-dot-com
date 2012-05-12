<?php session_start(); ?>
<?php include("includes/constants.php"); ?>
<?php
	if(!isset($_SESSION['username']))
		header("Location: " . APP_WEB_ADDRESS . "/login.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title><?php print APP_NAME; ?></title>
<link href="css/style1.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php	include("includes/header.php"); ?>
<?php	include("includes/leftbar.php"); ?>
<?php	include("includes/rightbar.php");?>
<div id="content">
<h2 style="text-align:center">UMDS HOME</h2>
	<p style="text-align:center">&nbsp;</p>
	<p style="text-align:center">
	<img alt="" height="170" src="images/logo_box.png" width="207"></p>
<p>&nbsp;</p>
<p>Welcome <?php print $_SESSION['username']; ?> to Universal Mobile Device 
Synchronization.</p>
<p>&nbsp;</p>
<p><a href="registerDevice.php">Register your device</a> to begin the UMDS 
experience.</p>
	<p>&nbsp;</p>
	<p>Use the menu from the right-aligned bar to view, edit and delete contact 
	information, todo lists and calendar events.</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
<?php include("includes/footer.php"); ?>

</body>
</html>