<?php

$YourAPIKey='33119aa2-46a6-11e9-8806-0200cd936042';
$From='TFCTOR';
$To='+919731263208';

$Msg='Dear Sir/Medam this is doddanna from svjk';


### DO NOT Change anything below this line
$agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
$url = "https://2factor.in/API/V1/$YourAPIKey/ADDON_SERVICES/SEND/PSMS"; 
$ch = curl_init(); 
curl_setopt($ch,CURLOPT_URL,$url); 
curl_setopt($ch,CURLOPT_POST,true); 
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true); 
curl_setopt($ch,CURLOPT_POSTFIELDS,"From=$From&To=$To&Msg=$Msg"); 
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
echo curl_exec($ch); 
curl_close($ch);
