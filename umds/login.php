<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?php include("includes/constants.php"); ?>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title><?php print APP_NAME; ?></title>
<link href="css/style1.css" rel="stylesheet" type="text/css">
<style type="text/css">
.style2 {
	margin-left: 40px;
	text-align: center;
}
.style3 {
	color: #0000FF;
}
</style>
</head>
<body>
<?php	include("includes/header.php"); ?>
<?php	include("includes/leftbar.php"); ?>
<?php	include("includes/rightbar.php");?>
<div id="content">
<h2 style="text-align:center">login to umds</h2>
<?php
	if(isset($_SESSION['username']))
	{
?>
	<p>You are already logged in to UMDS with username :<b><?php print $_SESSION['username']; ?></b> </p>
	<p>Please <a href="logout.php">Logout</a> and try again.</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
<?php
	}
	else
	{
?>
		<p>
		Enter your login credentials to begin your session.</p>
		<p>
		Click <a href="register.php" class="style3">here</a> to register for a new account.</p>
		<form method="post" action="login_action.php">
			<p class="style2">Email Address	
			<input name="txtEmail" type="text" style="width: 255px"></p>
			<p class="style2">Password&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
			<input name="txtPassword" type="password" style="width: 255px"></p>
			<p class="style2"><input name="cmdLogin" type="submit" value="Login"> 
			(Forgot Password)</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
		</form>
<?php
	}
?>
</div>
<?php include("includes/footer.php"); ?>

</body>
</html>