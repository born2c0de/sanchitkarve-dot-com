<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?php include("includes/constants.php"); ?>
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
<h2 style="text-align:center">features</h2>
<p>
	&nbsp;</p>
	<p class="style1">
	<img alt="" height="301" src="images/features.jpg" width="399"></p>
	<p>
	UMDS offers a data synchronization solution for your cell phones.</p>
	<p>
	Some of the features are listed as follows:</p>
	<ul>
		<li>Works on all recent mobile phones supporting J2ME.</li>
		<li>Cross-platform access as UMDS is browser-based.</li>
		<li>Supports Synchronization of Contacts.</li>
		<li>Supports Synchronization of Calendar events.</li>
		<li>Supports Synchronization of ToDo Notes.</li>
		<li>Supports data syncing from multiple devices.</li>
	</ul>
	<p>
	&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</div>
<?php include("includes/footer.php"); ?>

</body>
</html>