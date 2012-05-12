<?php

	# Gets ReadIP Address of Client
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

	# Checks Email Validity and confirms with MX Servers.
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
?>