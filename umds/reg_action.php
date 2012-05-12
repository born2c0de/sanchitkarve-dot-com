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
</style>
</head>
<body>
<?php	include("includes/header.php"); ?>
<?php	include("includes/leftbar.php"); ?>
<?php	include("includes/rightbar.php");?>
<div id="content">
<h2 style="text-align:center">registration result</h2>
	<p class="style1">
	<?php
		include("includes/validationFunctions.php");
		require_once('recaptchalib.php');
		error_reporting(0);

		# the response from reCAPTCHA
		$resp = null;
		# the error code from reCAPTCHA, if any
		$error = null;

		if ($_POST["recaptcha_response_field"])
		{
	        $resp = recaptcha_check_answer (RECAPTCHA_PRIVATE_KEY,
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
	                		$conn = mysql_connect(DATABASE_SERVER_ADDRESS,DATABASE_USERNAME,DATABASE_PASSWORD) or die("Couldn't connect to server");
	                		$db = mysql_select_db(DATABASE_NAME,$conn) or die("Couldn't select database");
	                		$query="SELECT * FROM users WHERE username LIKE '" . $_POST["txtEmail"] . "'";
	                		$result = mysql_query($query) or die("Query Failed");
	                		//echo "Number of Rows : " . mysql_num_rows($result);
	                		if(mysql_num_rows($result) == 0)
	                		{
	                			$username = $_POST["txtEmail"];
	                			$password = md5($_POST["txtPassword"] . MD5_SALT);
	                			$name = $_POST["txtFullName"];
	                            $ip = getRealIpAddr();
	                            $regDate = gmdate(DATE_COOKIE);
	                			$query = "INSERT INTO users(username,password,fullName,registrationIP,registrationDate) VALUES ('$username','$password','$name','$ip','$regDate')";
	                			$result = mysql_query($query) or die("User Registration failed");
	                			//$query = "SELECT * from users";
	                			//$result = mysql_query($query) or die("User retrieval failed");
	                			/*while($row = mysql_fetch_array($result))
	                			{
	                				echo $row['username'] . "<br/>";
	                			}*/
	                			echo "You have successfully registered with username : " . $username;
	                			#echo "<br/>Enter this username and your password in the BunkM application on your phone.";
	                			echo "<br/>Enter this username and your password in the UMDS Login Page.";
	                			echo "<br/>Click <a href=\"login.php\">here</a> to visit the login page.";
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
<?php include("includes/footer.php"); ?>

</body>
</html>