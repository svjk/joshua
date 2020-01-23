<?php
$token = 'Your Token Here';
$mobile = mysql_real_escape_string($_POST['phone']);
$msg = mysql_real_escape_string($_POST['message']);
$site = 'Your Site Address Here';
$url = "http://api.fast2sms.com/sms.php?token=".$token."&mob=".$mobile."&mess=".$msg."&sender=".$site."&route=0";
$homepage = file_get_contents($url);
if($homepage)
{
  echo "Message Send Compleated...";
}
else{
  echo "Something Went Wrong...";
}
?>
