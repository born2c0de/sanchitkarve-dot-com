<?php
session_start(); ?>
<?php include("includes/constants.php"); ?>
<?php
if(isset($_SESSION['username']))
	header("Location: " . APP_WEB_ADDRESS . "/home.php");
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
<h2 style="text-align:center">UNIVERSAL MOBILE DEVICE SYNCHRONIZATION</h2>
<p>
	&nbsp;</p>
	<p class="style1">
	<img alt="" height="351" src="images/logo_devices.jpg" width="336">&nbsp;</p>
	<p class="style1">
	<a href="download.php">Download J2ME Application here.</a></p>
	<p>
	&nbsp;</p>
	<p class="style1">
	<a href="register.php">Create an account here.</a></p>
</div>
<?php include("includes/footer.php"); ?>

</body>
</html>