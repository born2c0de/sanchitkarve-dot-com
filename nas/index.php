<?php
$key = $_GET["key"];
$hash = sha1($key);
if($hash == "853810e40a61125dc909609017764e4657c423c2" || $hash == "747281708931bf4a38c92abf9819349654f9d793")
   header("Location: http://76.115.170.70:43582/ui/");
else
   header("Location: http://www.sanchitkarve.com");
?>