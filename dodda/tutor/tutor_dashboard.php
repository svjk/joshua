<html lang="en">

<head> 
  <script src="https://apis.google.com/js/platform.js" async defer></script>  
  <meta name="google-signin-client_id" content="1001357057262-dmc1djlim88hunosf9ug0mmequq35km2.apps.googleusercontent.com">
  
  <script src="../js/google_auth.js">
  </script>
  
  <script>
  </script>
</head>

<body>
<?php
	require_once '../business_functions.php';
?>

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
	<form name="frmDashboard" method="post">
		<input type="submit" value="Logout" name="submit_logout"/>
	</form>	
<?php
	if(isset($_POST['submit_logout']))
	{
		$return_val1 = isAuthenticated($cookie_name);
		//$return_val2 = isGoogleAuthenticated($google_cookie_name);
		
		
		if($return_val1 == 1)
		{
			setcookie($cookie_name, $cookie_value, time() - 2592000, '/');			
			header("Location: ../login_svjk.php");
		}
		
	}
?>

</body>
</html>