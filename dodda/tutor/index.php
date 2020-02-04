<?php
include '.././db/db_config.php';
if (!empty($_GET['phone'])) {
	$phone = $_GET['phone'];
	$disabled = 'disabled';
}
else{
	$phone = '';
	$disabled = '';
}

#### 2Factor Credentials
$YourAPIKey='33119aa2-46a6-11e9-8806-0200cd936042';

if (isset($_POST['loginBTn'])) {
	$phone = $_POST['phoneNumber'];
	$_SESSION['phoneNumber'] = $phone ;

	$selectSvjkStaff = mysqli_query($db_connect, "SELECT * FROM svjk_staff WHERE svjk_staff_user='$phone' ");
	if (mysqli_num_rows($selectSvjkStaff)>=1) {
		echo "<script>parent.location='tutors.php'</script>";
	}
	else if (mysqli_num_rows($selectSvjkStaff)<=0){
		$selectPhone = mysqli_query($db_connect, "SELECT tutor_phone FROM tutors WHERE tutor_phone='$phone' ");
		if (mysqli_num_rows($selectPhone)>=1) {
			echo "<script>parent.location='my_profile.php'</script>";
		}
		else if (mysqli_num_rows($selectPhone)<=0) {
			$SentTo=$phone; 
		### Customer's phone number in International number format ( with leading + sign)
		//Prabhakar sir Number+919731263208	

		### Sending OTP to Customer's Number
			$agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
			$url = "https://2factor.in/API/V1/$YourAPIKey/SMS/$SentTo/AUTOGEN"; 
			$ch = curl_init(); 
			curl_setopt($ch, CURLOPT_URL,$url); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_USERAGENT, $agent);
			$Response= curl_exec($ch); 
			curl_close($ch);
		### Store OTP Session Id In Session Variable ( to be used in Verify step)

			$Response_json=json_decode($Response,false);
			if ($_SESSION['OTPSessionId']=$Response_json->Details) {

				echo "<script>alert('OTP Sent Your Phone Number')</script>";
			}
			else{
				echo "<script>alert('Enter Valid Phone Number Phone Number')</script>";
			}
		}
		
	}	
}
if (isset($_POST['verifyOtp'])) {
	$otp = $_POST['otp'];
	$OTPValue=$otp; ### OTP value entered by user
	
	#### Retrive OTP value stored in session variable ( in sendOtp Process )

	$OTPSessionId=$_SESSION['OTPSessionId'];

	### Verify OTP Entered By User
	$agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
	$url = "https://2factor.in/API/V1/$YourAPIKey/SMS/VERIFY/$OTPSessionId/$OTPValue"; 
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL,$url); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_USERAGENT, $agent);
	$Response= curl_exec($ch); 
	curl_close($ch);

	### Parse API Response to check if OTP matched or mismatched
	$Response_json=json_decode($Response,false);
	if ( $Response_json->Details =='OTP Matched'){
		$phone = $_SESSION['phoneNumber'] ;
		$insertTutor = mysqli_query($db_connect, "INSERT INTO tutors (tutor_phone, tutor_created_datetime) VALUE ('$phone', '$now')");
		echo "<script>alert('Phone Number Verified Succes')</script>";
		echo "<script>parent.location='my_profile.php'</script>";
	}
	else{
		echo "<script>alert('OTP Mismatched')</script>";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<?php include 'header_links.php'; ?>
	<style type="text/css">
		@import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
		.login-block{
			background: #DE6262;  /* fallback for old browsers */
			background: -webkit-linear-gradient(to bottom, #FFB88C, #DE6262);  /* Chrome 10-25, Safari 5.1-6 */
			background: linear-gradient(to bottom, #FFB88C, #DE6262); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
			float:left;
			width:100%;
			padding : 50px 0;
		}
		.banner-sec{background:url(.././images/chalkboard.jpg)  no-repeat left bottom; background-size:cover; min-height:500px; border-radius: 0 10px 10px 0; padding:0;}
		.container{background:#fff; border-radius: 10px; box-shadow:15px 20px 0px rgba(0,0,0,0.1);}
		.login-sec h2{margin-bottom:30px; font-weight:800; font-size:30px; color: #DE6262;}
		.login-sec h2:after{content:" "; width:100px; height:5px; background:#FEB58A; display:block; margin-top:20px; border-radius:3px; margin-left:auto;margin-right:auto}
		.btn-login{background: #DE6262; color:#fff; font-weight:600;}		
		
		.main-title{
			position: relative;
			margin-top: 100px;
			text-align: center;
			color: #ffff;
			text-transform: uppercase;			
		}
		.main-title h1{
			font-weight: 700;
		}
		.banner-text{
			position:relative;
			width: 100%; 
			top: 50px;
			left: 0%;
			text-align: center;
			padding: 20px;
			
		}
		.banner-text p{
			background: rgb(0,0,0, .4);
			border-radius: 15px;
			color:#fff; 
			font-weight: 400;}
	</style>
</head>
<body>
	<section class="login-block">
		<div class="container">
			<div class="row">
				<div class="col-md-4 login-sec">
					<h2 class="text-center">Login Now</h2>
					<form class="login-form" action="" method="POST">
						<div class="form-group">
							<input type="text" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="Phone Number / User Name" value="<?php echo $phone?>" required <?php echo $disabled ?>>
						</div>
						<div class="form-group text-center">
							<button type="submit" name="loginBTn" class="btn btn-login">LOGIN</button>
						</div>
					</form>
				</div>
				<div class="col-md-8 banner-sec">
					<div class="overlay" style="position: absolute;width: 100%;height: 100%;background: rgb(0,0,0, .7);"></div>
					<div class="main-title">
						<h1>Swami Vivekananda Jnana Kendra</h1>
					</div>				
					<div class="banner-text">
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</p>
					</div>
				</div>
			</div>
		</section>
	<!-- <section>
		<div class="container" style="padding-top: 20px;">
			<div class="col-md-12">
				<form action="" method="POST">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<input type="text" class="form-control" name="phoneNumber" placeholder="Enter Phone Number" required value="<?php echo $phone?>" readonly>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<button class="btn btn-primary" name="loginBTn">
								Login to Update <i class="fa fa-hand-o-right"></i> 
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="container" style="padding-top: 20px;">
			<div class="col-md-12">
				<form action="" method="POST">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<input type="text" class="form-control" name="otp" placeholder="Enter OTP" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<button class="btn btn-primary" name="verifyOtp">
								Verify OTP
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section> -->
	<?php include 'script_links.php'; ?>
</body>
</html>