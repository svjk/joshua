<?php


$SentTo='+919739981327'; ### Customer's phone number in International number format ( with leading + sign)
//Prabhakar sir Number+919731263208

#### 2Factor Credentials
$YourAPIKey='33119aa2-46a6-11e9-8806-0200cd936042';

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
session_start();
$Response_json=json_decode($Response,false);
echo $_SESSION['OTPSessionId']=$Response_json->Details;