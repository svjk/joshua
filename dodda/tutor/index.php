<?php
include '.././db/db_config.php';
#### 2Factor Credentials
$YourAPIKey='33119aa2-46a6-11e9-8806-0200cd936042';

if (isset($_POST['sendOtp'])) {
	$phone = $_POST['phoneNumber'];
	$_SESSION['phoneNumber'] = $phone ;
	$selectPhone = mysqli_query($db_connect, "SELECT tutor_phone FROM tutors WHERE tutor_phone='$phone' ");
	if (mysqli_num_rows($selectPhone)>=1) {
		echo "<script>parent.location='section1_update.php'</script>";
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
if (isset($_POST['verifyOtp'])) {
	$otp = $_POST['otp'];
	$OTPValue=$otp; ### OTP value entered by user
	
	#### Retrive OTP value stored in session variable ( in SendOTP Process )

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
		echo "<script>parent.location='section1_update.php'</script>";
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
</head>
<body>
	<section>
		<div class="container" style="padding-top: 20px;">
			<div class="col-md-12">
				<form action="" method="POST">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<input type="text" class="form-control" name="phoneNumber" placeholder="Enter Phone Number" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<button class="btn btn-primary" name="sendOtp">
								Submit
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
	</section>
	<?php include 'script_links.php'; ?>
</body>
</html>