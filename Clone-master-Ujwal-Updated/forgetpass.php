<?php
if (isset($_POST['submit'])) {
	//---------------------onnection into the Mysql Database ----------------------//
	include 'connection.php';

	//-------------------------Getting inputs from the user -----------------------//
	$check = mysqli_real_escape_string($conn,$_POST['check']);
	$phone = mysqli_real_escape_string($conn,$_POST['phone']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$pass = mysqli_real_escape_string($conn,$_POST['password']);

	//------------------------Checking Empty Password ----------------------------//
	if (empty($check)) {
		echo "<script>alert('You must pick up one option')</script>";
	}
	elseif (empty($phone)) {
		echo "<script>alert('You must enter phone number')</script>";
	}
	elseif (empty($email)) {
		echo "<script>alert('You must enter Email')</script>";
	}
	elseif (empty($pass)) {
		echo "<script>alert('You must enter a New password')</script>";
	}
	else
	{
		//---------------------Checking for right inputs ---------------------//
		if (!preg_match("/^[0-9]{10}$/", $phone)) {
			echo "<script>alert('Phone number must be 10 digit')</script>";
		}
		 elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email Format')</script>";
	        }
	        elseif(!preg_match("/^[a-zA-Z@_0-9]{7,16}$/",$pass))
          {
    echo "<script>alert('Password Must content only Uppercase ,@ and Lowercase between 7-16')</script>";
    }else{
      //-----------------------Update data into the databases -------------------------//
      switch ($check) {
      	case 1:
      		$hash = md5($pass);
      		$sql = "update student set password='$hash',comfirm='$hash' where phone='$phone' and email='$email'";
      		$res = mysqli_query($conn, $sql);
      		if ($res) {
      			header("location: login.php?AccountUpdated");
      		}else
      		{
      			echo "<script>alert('Email or Phone Number not found'";
      		}
      		break;
      		case 2:
      		$hash = md5($pass);
      		$sql = "update faculty set password='$hash',comfirm='$hash' where phone='$phone' and email='$email'";
      		$res = mysqli_query($conn, $sql);
      		if ($res) {
      			header("location: login.php?AccountUpdated");
      		}else
      		{
      			echo "<script>alert('Email or Phone Number not found'";
      		}
      		break;
      		case 3:
      		$hash = md5($pass);
      		$sql = "update institut set password='$hash',comfirm='$hash' where phone='$phone' and email='$email'";
      		$res = mysqli_query($conn, $sql);
      		if ($res) {
      			header("location: login.php?AccountUpdated");
      		}else
      		{
      			echo "<script>alert('Email or Phone Number not found'";
      		}
      		break;
      	
      	default:
      		# code...
      		break;
      }
    }
	}
}


?>
<?php include "header.php" ?>
<section class="login-page-section">
	<div class="login-page-background-image"></div>
	<div class="spacer"></div>
		<div class="container">
	   		 <div class="row">
	        	<div class="col-md-7 col-md-offset-3">
	            	<div class=" login-form-container">
	                	<div class="login-form">
	                		<div class="error-msz"></div>
	                		
	                   		<form action="" method="post">
	                       		<h2>Forget  Password</h2>
	                       		<div class="imgcontainer">
	                            	<img src="images/img_avatar2.png" alt="Avatar" class="avatar">
	                        	</div>
	                        		

	                       		<div class="input--with-icon">
	                            	<i class="fa fa-user1"></i>
	                            	<input type="radio" name="check"  style= "margin-left: 6px;"value="1" checked>STUDENT
	                            	<input type="radio" name="check" style= "margin-left: 6px;" value="2" checked>FACULTY
	                            	<input type="radio" name="check" style= "margin-left: 6px;" value="3" checked>INSTITUTE
	                            	<input type="text" name="phone" placeholder="Phone Number !!!" class="form-control">
	                            	<input type="text" class="form-control" name="email" placeholder=" Email Id..">
	                        	</div>

	                        	<div class="input--with-icon">
	                            	<i class="fa fa-lock1"></i>
	                            	<input type="password" class="form-control" name="password" placeholder="New Password..">
	                            </div>

		                        <div class="login-checkbox">
		                            
		                        </div>
		                        <div class="login-submit">
		                            <input type="submit" value="RESET" name="submit">
		                        </div>
		                       
		                        <div class="login-forgot-password text-center">
		                            <p><a href="login.php">Login</a></p>
		                        </div>
	                    	</form>
	                	</div>
	            	</div>
	        	</div>
	    	</div>
		</div>
	
</section>



<?php include "footer.php"?>