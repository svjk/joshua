<?php
session_start();

$OTPValue='447782'; ### OTP value entered by user

#### 2Factor Credentials
$YourAPIKey='YOUR_API_KEY';

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
if ( $Response_json->Details =='OTP Matched')
echo "OTP Matched";
else
echo "OTP Mismatched";
