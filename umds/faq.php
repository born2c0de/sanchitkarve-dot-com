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
.style2 {
	margin-left: 40px;
}
</style>
</head>
<body>
<?php	include("includes/header.php"); ?>
<?php	include("includes/leftbar.php"); ?>
<?php	include("includes/rightbar.php");?>
<div id="content">
<h2 style="text-align:center">frequently asked questions</h2>
<p class="style1">
	<img alt="" height="159" src="images/faq.jpg" width="350"></p>
	<p>
	<strong>Why am I constantly being prompted to allow the UMDS J2ME app to 
	access the Contacts, Calendar and ToDo Lists?</strong></p>
	<p class="style2">
	Unfortunately, there&#39;s nothing we can do about it as the only way these 
	prompts can be suppressed is by buying a digital certificate from a 
	Certification Authority which costs roughly about 200$ a year. Since UMDS is 
	free, these prompts are perpetually present as a security measure.</p>
	<p>
	&nbsp;</p>
	<p>
	<strong>Why is device registration required?</strong></p>
	<p class="style2">
	Since multiple devices contain different types of information, the server 
	needs to know which phones are paired with the service so it can send and 
	receive synchronization data based on the phone&#39;s capabilities.</p>
	<p class>
	&nbsp;</p>
	<p class>
	<strong>Why do I see an exclamation mark next to a registered device?</strong></p>
	<p class="style2">
	Newly registered devices on the UMDS server appear with an exclamation mark 
	against their name and deviceIDs to indicate that device pairing is 
	partially complete.</p>
	<p class="style2">
	To complete the pairing, install the application on the phone and choose 
	Register Device.</p>
	<p class>
	&nbsp;</p>
	<p class>
	<strong>Why is there an X mark next to my device name?</strong></p>
	<p class="style2">
	The X mark only appears next to completely paired devices. Clicking the X 
	mark removes pairing from the device completely.</p>
</div>
<?php include("includes/footer.php"); ?>

</body>
</html>