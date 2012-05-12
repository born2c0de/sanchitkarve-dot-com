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
<h2 class="style1">Login Result</h2>
	<p>&nbsp;</p>
<p>Login Failed. Click <a href="login.php">here</a> and try again.</p>
	<p>&nbsp;</p>
	<p class="style1">
	<img alt="" height="135" src="images/placeholder.png" width="328"></p>
</div>
<?php include("includes/footer.php"); ?>

</body>
</html>