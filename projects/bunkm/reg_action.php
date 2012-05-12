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
			<h2 class="title"><a href="#">Registration Result</a></h2>
			<div class="entry">				
				<p>
					<?php
						require_once('recaptchalib.php');
						error_reporting(0);
						
						function getRealIpAddr()
						{
    						if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    						{
								$ip=$_SERVER['HTTP_CLIENT_IP'];
    						}
    						elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    						{
								$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    						}
    						else
    						{
								$ip=$_SERVER['REMOTE_ADDR'];
    						}
    						return $ip;
						}
						
						function checkEmail($email) 
						{
							if(eregi("^[a-zA-Z0-9_]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$]", $email)) 
							{
								return FALSE;
							}
							
							list($Username, $Domain) = split("@",$email);
							
							if(getmxrr($Domain, $MXHost)) 
							{
								return TRUE;
							}
							else 
							{
								if(fsockopen($Domain, 25, $errno, $errstr, 30)) 
								{
									return TRUE; 
								}
								else 
								{
									return FALSE; 
								}
							}
						}

						
						// Get a key from http://recaptcha.net/api/getkey
						$publickey = "6LfnsAkAAAAAABY_vEGcRlAOR_ZzBsGYGnvBax72";
						$privatekey = "6LfnsAkAAAAAALdyMLQaNcQavdG5JGoWLiAs8NY7";
						
						# the response from reCAPTCHA
						$resp = null;
						# the error code from reCAPTCHA, if any
						$error = null;
						
						if ($_POST["recaptcha_response_field"])
						{
        						$resp = recaptcha_check_answer ($privatekey,
                                        $_SERVER["REMOTE_ADDR"],
                                        $_POST["recaptcha_challenge_field"],
                                        $_POST["recaptcha_response_field"]);

        						if ($resp->is_valid)
        						{
                						//echo "You got it!";
                						if(strcmp($_POST["txtPassword"],$_POST["txtConfirmPassword"])!=0 || (strlen($_POST["txtPassword"])<6 || strlen($_POST["txtPassword"])>20))
										{
											echo "Passwords don't match or aren't of acceptable length. Click <a href=\"register.php\">here</a> and try again";
										}
										else
										{
                							if(checkEmail($_POST["txtEmail"]))
                							{
                								$conn = mysql_connect("localhost","sanchitk_bunkm","-bunkmdb-") or die("Couldn't connect to server");
                								$db = mysql_select_db("sanchitk_BunkM",$conn) or die("Couldn't select database");
                								$query="SELECT * FROM userInfo WHERE username LIKE '" . $_POST["txtEmail"] . "'";
                								$result = mysql_query($query) or die("Query Failed");
                								//echo "Number of Rows : " . mysql_num_rows($result);
                								if(mysql_num_rows($result) == 0)
                								{
                									$username = $_POST["txtEmail"];
                									$password = md5($_POST["txtPassword"]);
                									$name = $_POST["txtName"];
                            						$ip = getRealIpAddr();
                									$query = "INSERT INTO userInfo(username,password,name,IP_reg) VALUES ('$username','$password','$name','$ip')";
                									$result = mysql_query($query) or die("User Registration failed");
                									$query = "SELECT * from userInfo";
                									$result = mysql_query($query) or die("User retrieval failed");
                									/*while($row = mysql_fetch_array($result))
                									{
                										echo $row['username'] . "<br/>";
                									}*/
                									echo "You have successfully registered with username : " . $username;
                									#echo "<br/>Enter this username and your password in the BunkM application on your phone.";
                									echo "<br/>Enter this username and your password in the new <b>BunkM v1.6</b>.";
                									echo "<br/>Click <a href=\"index.html\">here</a> to go back to BunkM's Home Page.";
                								}
                								else
                								{
                									echo "This username already exists. Click <a href=\"register.php\">here</a> and try again";                	
                								}
                								mysql_close($conn);
                							}
                							else
                							{
                								echo "Email address is invalid. Click <a href=\"register.php\">here</a> and try again.";
                							}
        							}
        						}
        						else
        						{
                						# set the error code so that we can display it
                						$error = $resp->error;
                						echo "Incorrect CAPCTHA code or unexpected error occurred. Click <a href=\"register.php\">here</a> to try again."; //$error;
        						}
						}
						else
						{
							echo "Incomplete data entered. Click <a href=\"register.php\">here</a> to try again.";
						}
					?>
				</p>
			</div>
			<div style="margin-bottom:20px;"></div>			
			<!-- <p class="meta">Posted on November 5, 2007 by <a href="#">Someone</a> &nbsp;|&nbsp; <a href="#">32 comments</a></p> -->
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
