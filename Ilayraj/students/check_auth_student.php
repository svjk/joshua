<?php
	
	$cookie_name = "AUTH_SVJK";
	$cookie_value = "1";
		
	//$google_cookie_name = "G_AUTHUSER_H";
	
	$return_val1 = isAuthenticated($cookie_name);	
	//$return_val2 = isGoogleAuthenticated($google_cookie_name);
	
	if($return_val1 == 1)
	{
		echo "auth";
	}
	else
	{
		header("Location: ../login_svjk.php");
	}
	
?>