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
	color: #0000FF;
}
.style2 {
	font-size: 13px;
}
</style>
</head>
<body>
<?php	include("includes/header.php"); ?>
<?php	include("includes/leftbar.php"); ?>
<?php	include("includes/rightbar.php");?>
<div id="content">
<h2 style="text-align:center">download</h2>
<p>
	&nbsp;</p>
	<p>
	To use UMDS, you need to <a href="register.php">create an account</a> and 
	download a mobile application on your phone followed by registering your 
	device from your User Control Panel.</p>
	<p>
	&nbsp;</p>
	<p>
	<strong>Supported Phones:</strong></p>
	<ul>
		<li>Nokia N82</li>
		<li>Nokia E51</li>
		<li>Nokia E72</li>
		<li>Nokia 5800 Xpress Music</li>
		<li>Motorola E9</li>
	</ul>
	<p><strong>P</strong><span class="style2"><strong>IM Support</strong></span></p>
	<p>Most phones manufactured within the past 2 years offer built-in support 
	for retrieval of Contact information, calendar events and ToDo notes.</p>
	<p>However, certain Windows Mobile and Motorola phones do not support the 
	Personal Information Manager API completely and hence may only be able to 
	sync one or more data items.</p>
	<p>Visit your phone manufacturer&#39;s website for more information about your 
	device&#39;s technical features.</p>
	<p>
	&nbsp;</p>
	<p>
	<strong>Download Links:</strong></p>
	<p>
	<a class="style1" href="http://www.sanchitkarve.com/j2me/UnivMobileDeviceSync.jar">
	UMDS JAR File (version 0.4 pre-alpha)</a></p>
	<p>
	<a class="style1" href="http://www.sanchitkarve.com/j2me/UnivMobileDeviceSync.jad">
	UMDS JAD File (version 0.4 pre-alpha)</a></p>
</div>
<?php include("includes/footer.php"); ?>

</body>
</html>