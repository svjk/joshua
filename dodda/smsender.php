<?php

  // Declare the security credentials to use
  $username = "9880604765";
  $password = "100004";

  // Set the attributes of the message to send
  $message  = "Hello World";
  $type     = "2-way";
  $senderid = "TUSVJK";
  $to       = "9739981327";

  // Build the URL to send the message to. Make sure the 
  // message text and Sender ID are URL encoded. You can
  // use HTTP or HTTPS
  $url = "http://2factor.in/API/V1/293832-67745-11e5-88de-5600000c6b13/ADDON_SERVICES/SEND/PSMS?" .
         "username=" . $username . "&" .
         "password=" . $password . "&" .
         "message="  . urlencode($message) . "&" .
         "type="     . $type . "&" .
         "senderid=" . urlencode($senderid) . "&" .
         "to="       . $to;

  // Send the request
  $output = file($url);

  // The response from the gateway is going to look like 
  // this:
  // id: a4c5ad77ad6faf5aa55f66a
  // 
  // In the event of an error, it will look like this:
  // err: invalid login credentials
  $result = explode(":", $output[0]);

  if($result[0] == "id") 
  {
    echo("Message sent\n");
  }
  else
  {
    echo("Error - " . $result[1] . "\n");
  }

?>