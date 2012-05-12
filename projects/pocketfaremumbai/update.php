<?php
  $latestVersion = "1.0";
  $phoneVersion = $_GET['ver'];
  if(strcmp($phoneVersion,$latestVersion) != 0)
    print "1";
  else
    print "0";
?>
