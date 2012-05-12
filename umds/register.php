<?php session_start(); ?>
<?php include("includes/constants.php"); ?>
<?php
	if(isset($_SESSION['username']))
		header("Location: " . APP_WEB_ADDRESS . "/login.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title><?php print APP_NAME; ?></title>
<link href="css/style1.css" rel="stylesheet" type="text/css">
<style type="text/css">
.styleCenterText {	
	text-align: center;
}
.styleLeftTextAlign {
	text-align: left;
}

</style>
</head>
<body>
<?php	include("includes/header.php"); ?>
<?php	include("includes/leftbar.php"); ?>
<?php	include("includes/rightbar.php");?>
<div id="content">
<h2 style="text-align:center">create an account</h2>
	<p>Register for the complete Sync experience.</p>
	<form method="post" action="reg_action.php">
		<p class="styleLeftTextAlign">Email Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
		<input name="txtEmail" type="text" style="width: 255px"></p>
		<p class="styleLeftTextAlign">Full Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
		<input name="txtFullName" type="text" style="width: 255px"></p>
		<p class="styleLeftTextAlign">Password&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; 
		<input name="txtPassword" type="password" style="width: 255px"></p>
		<p class="styleLeftTextAlign">Confirm Password&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; 
		<input name="txtConfirmPassword" type="password" style="width: 255px"></p>
		<p class="styleLeftTextAlign">Type these words below:</p>
		<?php
			require_once('recaptchalib.php');
			# the response from reCAPTCHA
			$resp = null;
			# the error code from reCAPTCHA, if any
			$error = null;			
			echo recaptcha_get_html(RECAPTCHA_PUBLIC_KEY, $error);
		?>		
		<p class="styleCenterText"><input name="cmdRegister" type="submit" value="Register"></p>
	</form>
</div>
<?php include("includes/footer.php"); ?>

</body>
</html>