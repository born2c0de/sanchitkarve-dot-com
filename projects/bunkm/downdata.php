<?php

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
    //print_r($_POST);
    $username = $_POST['userName'];
    $password = $_POST['password'];
    $request = $_POST['request'];    
    //print $username;
    //print $password;
    //print $attendanceData;
    
    if(isset($username) && isset($password) && isset($request))
    {
        $userPassInvalidFlag = false;
        $conn = mysql_connect("localhost","sanchitk_bunkm","-bunkmdb-") or die("[Error] - Couldn't connect to server");
        $db = mysql_select_db("sanchitk_BunkM",$conn) or die("[Error] - Couldn't select database");
        $query="SELECT * FROM userInfo WHERE username LIKE '" . $username . "'";
        $result = mysql_query($query) or die("[Error] - Query Failed");
        //print mysql_num_rows($result);
        if(mysql_num_rows($result) == 1)        
        {
            $row = mysql_fetch_array($result);
            //print_r($row);
            //print "post = " . $password . " db = " . $row['password'] . "<br>";
            if($row['password'] == $password)
            {
                $addQuery = "UPDATE userInfo SET IP_lastAccess = '" . getRealIpAddr() . "' WHERE username LIKE '" . $username . "'";
                $addResult = mysql_query($addQuery) or die("[Error] - update error");
                if($request == "attendance") print $row['attendanceData'];
                if($request == "settings") print $row['settingsData'];                
            }
            else
            {
                //print "Incorrect Password";
                $userPassInvalidFlag=true;
            }
        }
        else
        {
            //echo "More than 1 result fetched";
            $userPassInvalidFlag=true;
        }
            
        if($userPassInvalidFlag)
            print "[Error] - Incorrect Username or Password";
        //else
            //print "Success";
            
        mysql_close($conn);
                            
                        
    }
    else
        print "[Error] - Paramaters Incomplete";   
?>