<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

include('database.php');

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$message= $_POST['message'];


$sql = "INSERT INTO contact_procass VALUES('','$name','$phone','$email','$message') ";


if( mysqli_query($conn,$sql))
 {
	echo "<script>alert('inserted successfully')</script>";
 }else{
	 echo "error";
 }

$content = '<html><body><h3>Applicant Details</h3>
			  <table border="1" width="100%" cellpadding="5" cellspacing="5">
			   <tr>
				<td width="30%">Name</td>
				<td width="70%">'.$name.'</td>
			   </tr>
			   <tr>
				<td width="30%">Mobile No</td>
				<td width="70%">'.$phone.'</td>
			   </tr>
			   <tr>
				<td width="30%">Email.</td>
				<td width="70%">'.$email.'</td>
			   </tr>
			   <tr>
				<td width="30%">Message</td>
				<td width="70%">'.$message.'</td>
			   </tr>
			   </table></body></html> ';

$mail = new PHPMailer();  // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true;  // authentication enabled
    $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
    $mail->SMTPAutoTLS = false;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;

	$mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);

   $mail->Username = "asktechhub123@gmail.com";
   $mail->Password = "ththv4334@!!#thhyijkvhhyytf";
	
    $mail->SetFrom("simplyfresh.greens@gmail.com");
    $mail->Subject = "Contact Details";
  //  $mail->Body = $content;
	$mail->MsgHTML($content);
    $mail->AddAddress("svj.kendra@gmail.com");
    if(!$mail->Send()) {
        $error = 'Mail error: '.$mail->ErrorInfo; 
        return false;
		
    } else {
        $error = 'Message sent!';
        return true;
    }


?>
