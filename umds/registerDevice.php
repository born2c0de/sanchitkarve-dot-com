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
}</style>
</head>
<body>
<?php	include("includes/header.php"); ?>
<?php	include("includes/leftbar.php"); ?>
<?php	include("includes/rightbar.php");?>
<div id="content">
<h2 class="style1">Register Device</h2>
	<p>&nbsp;</p>
	<p class="style1">
	<img alt="" height="135" src="images/placeholder.png" width="328"></p>
	<form method="post" action="devices_action.php">
		<p>Enter Phone Name&nbsp;&nbsp; : 
		<input name="txtPhoneName" type="text" style="width: 208px"></p>
		<p>Generated Device ID:
		<?php $deviceID = getUniqueCode(5); ?>
		<input name="txtDeviceID" type="text" style="width: 208px" readonly="readonly" value= <?php print "\"$deviceID\""; ?> ></p>
		<p class="style1"><input name="cmdSubmit" type="submit" value="Pair Device"></p>
		<p><strong>INSTRUCTIONS</strong></p>
		<ol>
			<li>Enter your Phone Model Name. (Eg. Nokia N72)</li>
			<li>Note down the 5 character device ID for later.</li>
			<li>Click Pair Device.</li>
			<li>Start the UMDS J2ME Application on your phone.</li>
			<li>Choose the Register Device menu.</li>
			<li>Enter the device ID received from this web-page.</li>
			<li>Choose the Pair Device option on your phone.</li>
			<li>The phone connects to UMDS online and pairs itself.</li>
		</ol>
		<p>&nbsp;</p>
	</form>
	
</div>
<?php include("includes/footer.php"); ?>

</body>
</html>