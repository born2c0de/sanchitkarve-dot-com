<?php
   $referer = $_SERVER['HTTP_REFERER'];
   if (strpos($referer, 'sanchitkarve.com') === false)
   {
      header("Location: http://www.sanchitkarve.com/landing.php");
   }
   else if (strpos($referer,'google.com') !== false || strpos($referer, 'facebook.com') !== false)
   {
      header("Location: http://www.sanchitkarve.com/landing.php");
   }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Sanchit Karve's Home Page</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="css/style_homepage.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="banner"><img src="images/banner2.jpg" alt="" /></div>
<div id="menu">
	<ul>
		<li class="first"><a href="index.php" accesskey="1" title="">Home</a></li>
		<li><a href="projects/" accesskey="2" title="">Projects</a></li>
		<li><a href="http://www.sanchitkarve.com/blog" accesskey="3" title="">Blog</a></li>
		<li><a href="tutorials/" accesskey="4" title="">Tutorials</a></li>
		<li><a href="resume/" accesskey="4" title="">Résumé</a></li>
		<li><a href="calendar/" accesskey="6" title="">Calendar</a></li>
		<li><a href="gradschool/" accesskey="4" title="">Graduate School</a></li>
		<li><a href="faq/" accesskey="5" title="">FAQs</a></li>		
		<li><a href="contact/" accesskey="6" title="">Contact</a></li>
	</ul>
</div>
<hr />
<!-- start page -->
<div id="page">
	<!-- start content -->
	<div id="content">	
		<div class="post">	
			<div class="entry">
				<h3>Sanchit Karve is pronounced: Sun•chit Kurr•way</h3>
				<img src="images/b2c.png" alt="" class="left" />
				<p>Sanchit is a tech-enthusiast and a software developer. He maintains a Blog and is a forum moderator on Dream.In.Code, a programming and web-development community with over 500,000 members. He has an ardent interest in Mobile Phone Development, Desktop and Web Development and Reverse Engineering. He is currently a graduate student at Oregon State University and lives in Corvallis, Oregon where he spends his spare time biking/hiking to explore Oregon's diverse natural beauty.</p>
			</div>			
		</div>		
	<!-- end content -->
	<!-- start sidebar -->
	<!-- end sidebar -->		
</div>
<div class="columnTile">
<h2>Programming</h2>
<p><img alt="camera image" src="images/coding.png" /></p>
<p>
I enjoy writing code for desktop, web and mobile environments especially when done in collaboration with random developers I meet on the internet. You can view some of my projects <a href="projects/">here</a>. If you wish to work with me on a project, <a href="contact/">click here</a> for more information. I usually work with C#, PHP, C, C++ and Java SE, Java ME and Java for Android.
</p>
</div>
<div class="columnTile">
<h2>Reverse Eng.</h2>
<p><img alt="laptop image" src="images/revengg.png" /></p>
<p>
The idea of reconstructing high-level code from raw binaries fascinates me. I download and study viruses, worms and binaries of interesting programs in my spare time and write tutorials on reverse engineering related topics which can be found here. My tools of choice are IDA Pro, Ollydbg, HIEW and other PE tools. I also create and solve Rev. Eng. challenges on various <a href="http://en.wikipedia.org/wiki/Crackme">crackme</a> websites.
</p>
</div>
<div class="columnTile">
<h2>Hiking</h2>
<p><img alt="head image" src="images/hiking.png" /></p>
<p>
I love any activity that involves parting with technology (temporarily) to understand and appreciate nature. I am fortunate to live in Oregon where there are numerous trails and peaks to explore. I've enjoyed climbing <a href="http://en.wikipedia.org/wiki/Mary's_peak">Mary's Peak</a> and <a href="http://en.wikipedia.org/wiki/Mt._Bachelor">Mt. Bachelor</a>, but I'm especially proud of scaling <a href="http://www.peakware.com/peaks.html?pk=2220">Mt. Shitidhar</a>, a peak in the Himalayas with an elevation of over 17,000 feet.
</p>
</div>
</div>
<!-- end page -->
<div id="footer">
	<p class="legal">Copyright © 2011 Sanchit Karve. All rights reserved.</p>
	<p class="credit"><a href="design/">Designed by Sanchit Karve</a></p>
</div>
</body>
</html>