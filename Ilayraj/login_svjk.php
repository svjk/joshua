<!DOCTYPE html>
<html lang="en">

<head> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="js/jquery-3.3.1.min.js"></script>	

  <script src="https://apis.google.com/js/platform.js" async defer></script>  
  <meta name="google-signin-client_id" content="1001357057262-dmc1djlim88hunosf9ug0mmequq35km2.apps.googleusercontent.com">
  
  <style>
	body
	{
		font-family: verdana;
		font-size: 12px;
		margin: 15px;
	}
	
	#fs_login
	{
		border-radius: 5px;
		padding: 10px;
		width: 300px;
		margin: 0 auto;
		margin-top: 120px;
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
	
	.msg
	{
		color: Black;
		font-weight: bold;	
	}
	
	select
	{
		border-radius: 3px;		
		width: 150px;
		height: 25px;
		border-style: solid;
		border-width: 1px;
	}
	
	input
	{
		border-radius: 3px;			
		width: 300px;
		height: 20px;
		border-style: solid;
		border-width: 1px;
		border-color: gray;
	}	
	
	#submit_login
	{
		border-radius: 3px;			
		width: 100px;
		height: 30px;
		border-style: solid;
		border-width: 1px;
	}
  </style>
  
  <script>	
	$(document).ready( function() {
				
		$("#submit_login").click( function() {
			var selectOption = $("#userType option:selected").text();			
			var txtLoginName=$("#loginName");			
			var txtPassword=$("#password");			
			
			var error_msg=$("#error_msg");
			error_msg.html("");
			var msg="";
			
			var return_val=true;
			
			if(selectOption == "--Select--")
			{
				msg+="*Please select UserType<br/>";				
				return_val=false;
			}
			
			if(txtLoginName.val().trim() == null || txtLoginName.val().trim() == "")
			{
				msg+="*Please enter Email or Mobile No.<br/>";				
				return_val=false;
			}
			
			if(txtPassword.val().trim() == null || txtPassword.val().trim() == "")
			{
				msg+="*Please enter Password<br/>";				
				return_val=false;
			}
					
			msg+="<br/>";
			error_msg.html(msg);
			
			return return_val;
			
		});
		
	});
  </script>
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

	<?php
	 require_once 'business_functions.php';	
	?>
	
	<form name="frmRegister" method="post">		
		<fieldset id="fs_login">
		<legend>Login</legend>
			<?php
				if (isset($_POST['submit_login']))
				{
					$userType = trim($_POST['userType']);					
					$loginName = trim($_POST['loginName']);					
					$password = trim($_POST['password']);
					
					if(strpos($loginName , ".") and strpos($loginName , "@"))
					{
						$login_type = "email";
					}
					else
					{
						$login_type = "phone";
					}
					
					if($userType == 3)
					{
						$return_val = tutorLoginExists($userType, $loginName, $password);
						
						if($return_val == 1)
						{
							if($return_val == 1)
							{
								$return_val = get_tutor_info($loginName, $login_type);								
								if(count($return_val)>0)
								{
									$svjk_session_id = uniqid();	
									setcookie('svjk_session_id', $svjk_session_id, time() + (86400 * 30), "/");
									setcookie('svjk_email', $return_val[0]["tutor_email"], time() + (86400 * 30), "/");
									setcookie('svjk_phone', $return_val[0]["tutor_phone"], time() + (86400 * 30), "/");	
									setcookie('svjk_user_type', "tutor", time() + (86400 * 30), "/");	
									setcookie('svjk_login_type', $login_type, time() + (86400 * 30), "/");	
										
									header("Location: tutor/tutor_personal_details.php");
								}
							}						
						}
						else
						{
							echo "<div class='error_msg'>Invalid Login/Password</div><br/>";
						}
					}
					else if($userType == 4)
					{
						$return_val = studentLoginExists($userType, $loginName, $password);
						
						if($return_val == 1)
						{
							$cookie_name = "AUTH_SVJK";
							$cookie_value = "1";
							if($return_val == 1)
							{
								setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");						
								header("Location: students/student_dashboard.php");
							}						
						}
						else
						{
							echo "<div class='error_msg'>Invalid Login/Password</div><br/>";
						}
					}
				}
			?>
			<div id="error_msg"></div>
			<div id="msg"></div>
			<label>User Type:</label>
			<label class="mandatory">*</label>
			<br/>
			<select id="userType" name="userType">
				<option value="0">--Select--</option>
				<option value="3">Tutor</option>
				<option value='4'>Student</option>
			</select>
			<br/>
			<br/>
			<label>Email/Mobile No.:</label>
			<label class="mandatory">*</label>
			<br/>
			<input type="text" name="loginName" id="loginName" maxlength="40" 
					value="<?php echo isset($_POST['loginName']) ? $_POST['loginName'] : "" ?>" autocomplete="off" />							
			<br/>
			<br/>
			<label>Password:</label>
			<label class="mandatory">*</label>
			<br/>
			<input type="password" name="password" id="password" maxlength="15"
				value="<?php echo isset($_POST['password']) ? $_POST['password'] : "" ?>"/>
			<br/>
			<br/>
			<input type="submit" id="submit_login" name="submit_login" value="Login"/>
			<a style="margin: 20px;" href="register.php">Click here to register</a>			
			<br/>
			<br/>
			<!--
			<div>-------------------OR-------------------</div>
			<br/>
			<div class="g-signin2" data-onsuccess="onSignIn"></div>
			-->
		</fieldset>
	</form>
</body>