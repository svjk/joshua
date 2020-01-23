<?php
include '.././PHPMailer/PHPMailerAutoload.php';
$emailArray = array('chawannaikd@gmail.com', 'svjktutor@gmail.com');

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->Username = 'testsvjk@gmail.com'; //svjktutor@gmail.com
$mail->Password = 'test@SVJK70'; //svjk123!@#
$mail->setFrom('testsvjk@gmail.com');
foreach ($emailArray as $toEmail) {
	$mail->addBCC($toEmail);
}
$mail->addReplyTo('testsvjk@gmail.com');
$mail->isHTML(true);
$mail->Subject = "Test Message From Svjk";
$mail->Body = 'Test Mail from SVJK';

if (!$mail->send()) {
  echo "ERROR: " . $mail->ErrorInfo;
} else {
  echo "SUCCESS  ";
}
?>