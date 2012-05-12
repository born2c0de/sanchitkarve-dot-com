<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?php include("includes/constants.php"); ?>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title><?php print APP_NAME; ?></title>
<link href="css/style1.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php	include("includes/header.php"); ?>
<?php	include("includes/leftbar.php"); ?>
<?php	include("includes/rightbar.php");?>
<div id="content">
<h2 style="text-align:center">LOGOUT</h2>
<p>
	&nbsp;</p>
	<?php
		//you can remove a single variable in the session 
		unset($_SESSION['username']); 
 
		// or this would remove all the variables in the session, but not the session itself 
		//session_unset(); 
 
		// this would destroy the session variables 
		session_destroy();
		print "<p>You have logged out successfully.</p>";
		echo "<p>Click <a href=\"index.php\">here</a> to return to the home page.</p>";
	?>
	<p>&nbsp;</p>
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