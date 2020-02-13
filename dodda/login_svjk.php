<!DOCTYPE html>
<html lang="en">

<head>  
  <script src="https://apis.google.com/js/platform.js" async defer></script>  
  <meta name="google-signin-client_id" content="1001357057262-dmc1djlim88hunosf9ug0mmequq35km2.apps.googleusercontent.com">
  
  <style>
	body
	{
		font-family: verdana;
		font-size: 12px;
		margin: 15px;
	}
	
	#div_login
	{
		border-style: solid;
		border-width: 1px;
		border-radius: 5px;
		padding: 10px;
		width: 250px;
		margin-left: 330px;
		margin-top: 80px;
	}
	
	.mandatory
	{
		color: Red;
		font-weight: bold;
	}
	
	#error_msg, .error_msg
	{
		color: Red;		
	}
  </style>
  
  <script>	
	$(document).ready( function() {
		
		$("#google_sign_in").click(function() {
			alert("Hi");
			$("#div_google").html("<div class='g-signin2' data-onsuccess='onSignIn'></div>");
		});
				
		$("#submit_register").click( function() {
			var selectOption = $("#userType option:selected").text();
			var txtName=$("#name");
			var txtEmail=$("#email");
			var txtMobile=$("#mobile");
			var txtPassword=$("#password");
			var txtConfrim_Password=$("#confirm_password");
			
			var error_msg=$("#error_msg");
			error_msg.html("");
			var msg="";
			
			var return_val=true;
			
			if(selectOption == "--Select--")
			{
				msg+="*Please select UserType<br/>";				
				return_val=false;
			}
			
			if(txtName.val().trim() == null || txtName.val().trim() == "")
			{
				msg+="*Please enter Name<br/>";				
				return_val=false;
			}
			
			if(txtEmail.val().trim() == null || txtEmail.val().trim() == "")
			{
				msg+="*Please enter Email<br/>";				
				return_val=false;
			}
						
			if(txtMobile.val().trim() == null || txtMobile.val().trim() == "")
			{
				msg+="*Please enter Mobile No<br/>";								
				return_val=false;
			}
			
			if(txtPassword.val().trim() == null || txtPassword.val().trim() == "")
			{
				msg+="*Please enter Password<br/>";				
				return_val=false;
			}
			
			if(txtConfrim_Password.val().trim() == null || txtConfrim_Password.val().trim() == "")
			{
				msg+="*Please enter Confirm Password<br/>";				
				return_val=false;
			}
			
			if(txtPassword.val().trim()!=txtConfrim_Password.val().trim())
			{
				msg+="*Password and Confirm Password does not match<br/>";				
				return_val=false;
			}
			
			error_msg.html(msg);
			return return_val;
			
		});	
		
	});	
	
	function onSignIn(googleUser) 
	{
	
	  //alert("Signed In");
	  
	  var profile = googleUser.getBasicProfile();
	  //alert(profile.getId());
	  //alert(profile.getName());
	  //alert(profile.getImageUrl());
	  //alert(profile.getEmail());
	  
	  //console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
	  //console.log('Name: ' + profile.getName());
	  //console.log('Image URL: ' + profile.getImageUrl());
	  //console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
	}
	
	function signOut() 
	{		
		//alert("Signed Out");
		
		var auth2 = gapi.auth2.getAuthInstance();		
		
		auth2.signOut().then(function () 
		{
		  //alert("Signed out");
		  
		  var x = document.cookie;
		  //alert(x);
		  
		  //deleteAllCookies();
		  
		  var y = document.cookie;
		  //alert(y);
		  		  
		  console.log('User signed out.');
		  
		  location.href="http://localhost/joshua/dodda/login_register.php?signout=1";
		});
		
		
	}
	
	function deleteAllCookies() {
    var cookies = document.cookie.split(";");

    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
}
	
  </script>
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

	<?php
	 require_once 'business_functions.php';	
	 
	 session_start();
	?>
	<form name="frmRegister" method="post">		
		<div id="div_login">
			<?php
				if (isset($_POST['submit_login']))
				{	
					$userType = trim($_POST['userType']);					
					$loginName = trim($_POST['loginName']);					
					$password = trim($_POST['password']);
					
					$return_val = tutorLoginExists($userType, $loginName, $password);
					
					if($return_val == 1)
					{
						$cookie_name = "AUTH_SVJK";
						$cookie_value = "1";
						if($return_val == 1)
						{
							setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");						
							header("Location: tutor/tutor_dashboard.php");
						}						
					}					
					
				}
			?>
			<div id="error_msg"></div>
			<label>User Type</label>
			<label class="mandatory">*</label>
			<br/>
			<select id="userType" name="userType">
				<option value="0">--Select--</option>
				<option value="3">Tutor</option>
				<option value="4">Student</option>
			</select>
			<br/>
			<br/>
			<label>Email/Mobile</label>
			<label class="mandatory">*</label>
			<br/>
			<input type="text" name="loginName" id="loginName" maxlength="40" 
					value="<?php echo isset($_POST['email']) ? $_POST['email'] : "" ?>" />							
			<br/>
			<br/>
			<label>Password</label>
			<label class="mandatory">*</label>
			<br/>
			<input type="password" name="password" id="password" maxlength="15"
				value="<?php echo isset($_POST['password']) ? $_POST['password'] : "" ?>"/>
			<br/>
			<br/>
			<input type="submit" id="submit_login" name="submit_login" value="Log-In"/>	
			<br/>
			<br/>
			<div>-------------------OR-------------------</div>
			<br/>
			<div class="g-signin2" data-onsuccess="onSignIn"></div>
		</div>
	</form>
</body>