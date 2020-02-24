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
	require_once 'check_auth_tutor.php';
?>

<form name="frmDashboard" method="post">
<input type="submit" value="Logout" name="submit_logout"/>	
<?php
	$return_val1 = is_authenticated();
	echo $return_val1;
	
	if(isset($_POST['submit_logout']))
	{	
		if($return_val1 == 1)
		{
			clear_all_cookies();			
			
			//header("Location: ../login_svjk.php");
		}		
	}
?>
</form>
</body>
</html>