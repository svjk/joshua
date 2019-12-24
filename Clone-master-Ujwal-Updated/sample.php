
<?php
if (isset($_POST['submit'])){
	      //-----------------------connect php to mysql------------------// 
   include_once('connection.php');

$categories = $_POST['signup_form_select'];
   $fname= $_POST['fname'];
   $phone=$_POST['phone'];
   $email=$_POST['email'];
   $pass= $_POST['pass1'];
   $cnfrm_password= $_POST['cnfrm-pass'];

$sql = "INSERT INTO student (fname, phone, email, pass, cnfrm_password)
VALUES ('$fname', '$phone', '$email', '$pass', '$cnfrm_password')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
?>