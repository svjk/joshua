
<!DOCTYPE html>
<html lang="en">

<head> 
  <script src="js/jquery-3.3.1.min.js"></script>
  
  <script src="https://apis.google.com/js/platform.js" async defer></script>  
  <meta name="google-signin-client_id" content="1001357057262-dmc1djlim88hunosf9ug0mmequq35km2.apps.googleusercontent.com">
  
  <style>
	body
	{
		font-family: verdana;
		font-size: 12px;
		margin: 12px;
	}
	
	#fs_registration
	{		
		border-radius: 5px;
		padding: 10px;
		width: 300px;
		margin-left: 330px;
		margin-top: 50px;
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
	
	#submit_register
	{
		border-radius: 3px;			
		width: 100px;
		height: 30px;
		border-style: solid;
		border-width: 1px;
	}
  </style>
  
  <script src="js/google_auth.js">
  </script>
  
  <script>
	$(document).ready( function() {
				
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
			var email_validated = false;
			var mobile_validated = false;
			
			var return_val=true;
			
			if(selectOption == "--Select--")
			{
				msg+="*Please select User Type<br/>";				
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
			else
			{
				email_validated = true;
			}
						
			if(txtMobile.val().trim() == null || txtMobile.val().trim() == "")
			{
				msg+="*Please enter Mobile No<br/>";								
				return_val=false;
			}
			else
			{
				mobile_validated = true;
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
			
			if(email_validated==true)
			{
				var return_val2 = validateEmail(txtEmail);
				if(return_val2==0)
				{
					msg+="*Invalid Email<br/>";
				}	
			}
			
			if(mobile_validated==true)
			{
				var return_val3 = validateMobile(txtMobile);
				if(return_val3==0)
				{
					msg+="*Invalid Mobile No.<br/>";
				}	
			}
			
			msg+="<br/>";
			error_msg.html(msg);
			
			return return_val;
			
		});	
		
		$("#mobile").bind("keypress", function (e) 
		{
          var keyCode = e.which ? e.which : e.keyCode
               
          if (!(keyCode >= 48 && keyCode <= 57)) 
		  {
            return false;
          }
		  else
		  {            
          }
		});
		
	});
	
	function validateEmail(ele)
	{
		var userinput = $(ele).val();
		var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;		
		var return_val = pattern.test(userinput);
		if(!return_val)
		{
			return 0;
		}
		return 1;
	}
	
	function validateMobile(ele)
	{
		var userinput = $(ele).val();
		var pattern = /[2-9]{2}\d{8}/;		
		var return_val = pattern.test(userinput);
		if(!return_val)
		{
			return 0;			
		}		
		return 1;
	}
</script>

</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

	<?php
	 require_once 'database_functions.php';	
	?>
	<form name="frmRegister" method="post">
		<fieldset id="fs_registration">
		<legend>Registration</legend>		
			<?php
				require_once 'business_functions.php';
			?>
			
			<?php
				if (isset($_POST['submit_register']))
				{	
					$userType = trim($_POST['userType']);
					$name = trim($_POST['name']);
					$email = trim($_POST['email']);
					$mobile = trim($_POST['mobile']);
					$password = trim($_POST['password']);
					
					$return_val = registerUser($userType, $name, $email, $mobile, $password);
					
					if($return_val == "Tutor registered successfully" or 
							$return_val == "Student registered successfully")
					{
						echo "<div class='msg'>$return_val</div><br/>";
					}		
					else
					{
						echo "<div class='error_msg'>$return_val</div><br/>";
					}
				}
				
			?>
			<div id="error_msg"></div>
			<div id="msg"></div>
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
			<label>Name</label>
			<label class="mandatory">*</label>
			<br/>
			<input type="text" name="name" id="name" maxlength="40"
				value="<?php echo isset($_POST['name']) ? $_POST['name'] : "" ?>" autocomplete="off" />
			<br/>
			<br/>
			<label>Email</label>
			<label class="mandatory">*</label>
			<br/>
			<input type="text" name="email" id="email" maxlength="40" 
					value="<?php echo isset($_POST['email']) ? $_POST['email'] : "" ?>" autocomplete="off"  />				
			<br/>
			<br/>
			<label>Mobile No.</label>
			<label class="mandatory">*</label>
			<br/>
			<input type="text" name="mobile" id="mobile" maxlength="10"
			value="<?php echo isset($_POST['mobile']) ? $_POST['mobile'] : "" ?>" autocomplete="off" />
			<br/>
			<br/>
			<label>Password</label>
			<label class="mandatory">*</label>
			<br/>
			<input type="password" name="password" id="password" maxlength="15"
				value="<?php echo isset($_POST['password']) ? $_POST['password'] : "" ?>" autocomplete="off" />
			<br/>
			<br/>
			<label>Confirm Password</label>
			<label class="mandatory">*</label>
			<br/>
			<input type="password" name="confirm_password" id="confirm_password" maxlength="15"
				value="<?php echo isset($_POST['confirm_password']) ? $_POST['confirm_password'] : "" ?>" 
				autocomplete="off" />		
			<br/>
			<br/>
			<input type="submit" id="submit_register" name="submit_register" value="Register"/>	
			<a style="margin: 20px;" href="login_svjk.php">Click here to login</a>
			<br/>
			<br/>
			<!--
			<div>-------------------OR-------------------</div>
			<br/>
			<div class="g-signin2" data-onsuccess="onSignIn"></div>	
			<br/>
			<a href="#" onclick="signOut();">Sign out</a>
			-->		
		</fieldset>
	</form>
</body>