<?php
	// Gets Random String of a specific length. Length cannot exceed 32 characters.
	function getUniqueCode($length = "")
	{	
		$code = md5(uniqid(rand(), true));
		if ($length != "") return substr($code, 0, $length);
		else return $code;
	}
?>