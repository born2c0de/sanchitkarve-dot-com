<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>BunkM - Sanchit Karve</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="../../css/style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="banner"><img src="../../images/banner2.jpg" alt="" /></div>
<div id="menu">
	<ul>
		<li class="first"><a href="../../index.php" accesskey="1" title="">Home</a></li>
		<li><a href="../../projects/" accesskey="2" title="">Projects</a></li>
		<li><a href="http://www.sanchitkarve.com/blog" accesskey="3" title="">Blog</a></li>
		<li><a href="../../tutorials/" accesskey="4" title="">Tutorials</a></li>
		<li><a href="../../resume/" accesskey="4" title="">Résumé</a></li>
		<li><a href="../../calendar/" accesskey="6" title="">Calendar</a></li>
		<li><a href="../../gradschool" accesskey="4" title="">Graduate School</a></li>
		<li><a href="../../faq/" accesskey="5" title="">FAQs</a></li>		
		<li><a href="../../contact/" accesskey="6" title="">Contact</a></li>
	</ul>
</div>
<hr />
<!-- start page -->
<div id="page">
	<!-- start content -->
	<div id="content">
		<div class="post">
			<h1 class="title">BunkM - Mobile Attendance Manager</h1>
			<div class="entry">
				<h3>Lecture Attendance Calculator for your mobile phone</h3>				
			</div>
		</div>
		<div style="margin-bottom:20px;"></div>
		<div class="post">
			<h2 class="title"><a href="#">Why Backup?</a></h2>
			<div class="entry">				
				<p>As of now you're using BunkM on your phone, which means that all the attendance records are stored locally on your phone. However, what if:</p>
				<ul>
					<li>you switch to anothe phone temporarily or buy a new one?</li>
					<li>you send your phone for repairs and the handset company formats your phone?</li>
					<li>you accidentaly delete the application or factory reset your phone?</li>
					<li>you lose your attendance data in a manner not described in this list? :P</li>
				</ul>
				<p>With the new backup system in place, you can sync your attendance information to the BunkM web server and retrieve it directly from your phone if you lose your existing data.</p>				
			</div>
			<div style="margin-bottom:20px;"></div>						
		</div>
		<div class="post">
			<h2 class="title"><a href="#">Enter Account Information</a></h2>
			<div class="entry">								
				<form method="post" style="height: 331px" action="reg_action.php">
					Full Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="txtName" type="text" style="width: 234px" size="20" /><br/><br/>
					Email Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="txtEmail" type="text" style="width: 234px" /><br/><br/>
					Password :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
					<input name="txtPassword" type="password" style="width: 234px" />(6-20 characters)<br/><br/>
					Confirm	Password:&nbsp;<input name="txtConfirmPassword" type="password" style="width: 234px" />(6-20 characters)<br/><br/>			
					<strong>Prove that you're a human:</strong>
			
			<?php
			require_once('recaptchalib.php');
			// Get a key from http://recaptcha.net/api/getkey
			$publickey = "6LfnsAkAAAAAABY_vEGcRlAOR_ZzBsGYGnvBax72";
			$privatekey = "6LfnsAkAAAAAALdyMLQaNcQavdG5JGoWLiAs8NY7";

			# the response from reCAPTCHA
			$resp = null;
			# the error code from reCAPTCHA, if any
			$error = null;
			
			# was there a reCAPTCHA response?
		if ($_POST["recaptcha_response_field"]) {
        $resp = recaptcha_check_answer ($privatekey,
                                        $_SERVER["REMOTE_ADDR"],
                                        $_POST["recaptcha_challenge_field"],
                                        $_POST["recaptcha_response_field"]);

        if ($resp->is_valid) {
                #echo "You got it!";
        } else {
                # set the error code so that we can display it
                $error = $resp->error;
        }
}
echo recaptcha_get_html($publickey, $error);
?>
<br/><input name="Submit1" type="submit" value="submit" /><br />
			<br />
			<br />
			<br />
		</form>		
			</div>
			<div style="margin-bottom:20px;"></div>
		</div>
				
	</div>
	<!-- end content -->
	<!-- start sidebar -->
	<div id="sidebar">
		<ul>
			
			<li>
				<h2>Did You Know?</h2>
				<ul>
					<li>BunkM was originally written for a PC and eventually evolved into a mobile phone application.</li>
					<li>In August 2010, BunkM was featured in an article in daily newspaper "Maharashtra Times", which has a readership of over 1 million.</li>
				</ul>
			</li>			
			<li>
			<h2>Valid Website Code</h2>
			<p>Coded for the Web, not the Browser.</p>
            <p><a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-xhtml10-blue" alt="Valid XHTML 1.0 Strict" height="31" width="88" /></a><a href="http://jigsaw.w3.org/css-validator/check/referer?profile=css3"><img height="31" width="88" src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS!" /></a></p>
			</li>
		</ul>
	</div>
	<!-- end sidebar -->
</div>
<!-- end page -->
<div id="footer">
	<p class="legal">Copyright © 2011 Sanchit Karve. All rights reserved.</p>	
	<p class="credit"><a href="../../design/">Designed by Sanchit Karve</a></p>	
</div>
</body>
</html>
