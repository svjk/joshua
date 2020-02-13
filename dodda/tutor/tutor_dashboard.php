<!DOCTYPE html>
<html lang="en">

<head> 
  <!--<script src="js/jquery-3.3.1.min.js"></script>-->
  
  <script src="https://apis.google.com/js/platform.js" async defer></script>  
  <meta name="google-signin-client_id" content="1001357057262-dmc1djlim88hunosf9ug0mmequq35km2.apps.googleusercontent.com">
  
  <script>
	function onSignIn(googleUser) 
	{
	  //alert("Signed In");
	  
	  //var profile = googleUser.getBasicProfile();
	  //alert(profile.getId());
	  //alert(profile.getName());
	  //alert(profile.getImageUrl());
	  //alert(profile.getEmail());
	  
	  //console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
	  //console.log('Name: ' + profile.getName());
	  //console.log('Image URL: ' + profile.getImageUrl());
	  //console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
	  
	  window.location.href = "tutor/tutor_dashboard.php";
	}
	
	function signOut() 
	{		
		//alert("Signed Out");
		
		onSignIn();
		
		var auth2 = gapi.auth2.getAuthInstance();
		auth2.signOut().then(function () 
		{
		  alert("Signed out");
		  
		  var x = document.cookie;
		  //alert(x);
		  
		  //deleteAllCookies();
		  
		  var y = document.cookie;
		  alert(y);
		  		  
		  console.log('User signed out.');
		  
		  window.location.href="http://localhost/joshua/dodda/register.php";
		});
	}	
   
  </script>
  
</head>

<?php
	require_once '../business_functions.php';	
	
	session_start();
?>

<?php
	$cookie_name = "AUTH_SVJK";
	$cookie_value = "1";
	
	$google_cookie_name = "G_AUTHUSER_H";
	
	$return_val1 = isAuthenticated($cookie_name);	
	$return_val2 = isGoogleAuthenticated($google_cookie_name);
	
	if($return_val1 == 1 or $return_val2 == 1)
	{
		echo "auth";
	}
	else
	{
		//header("Location: ../login_svjk.php");
	}
?>
	<form name="frmDashboard" method="post">
		<input type="submit" value="Logout" name="submit_logout"/>
	</form>	
	<a href="#" onclick="signOut();">Sign out</a>
<?php
	if(isset($_POST['submit_logout']))
	{
		$return_val1 = isAuthenticated($cookie_name);
		$return_val2 = isGoogleAuthenticated($google_cookie_name);
	
		if($return_val1 == 1 or $return_val2 == 1)
		{
			setcookie($cookie_name, $cookie_value, time() - 2592000, '/');
			//setcookie($google_cookie_name, $cookie_value, time() - 2592000, '/');
			//header("Location: ../login_svjk.php");
		}

		/*
		if($return_val2 == 1)
		{
			echo "<a href='#' onclick='signOut();'>Sign out</a>";
		}
		*/
	}
?>