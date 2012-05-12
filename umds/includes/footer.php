<?php
	if(isset($_SESSION['username']))
		print "<h1>Logged in as : " . $_SESSION['username'] . "</h1>";
	else
		print "<h1>Written by Sanchit Karve</h1>";
?>