<?php
if (isset($_POST['submit'])){
	      //-----------------------connect php to mysql------------------// 
   include_once('connection.php');
	     //-------------------------Get information from users----------------//
	     //Using php function mysqli_real_escape_string to protect against Sql injection
   $fname=$_POST['fname'];
   $email=$_POST['email'];
   $phone=$_POST['phone'];
   $pass= $_POST['pass1'];
   $cnfrm_password=$_POST['cnfrm-pass'];
    
   
   if (empty($fname)) {
       echo "<script>alert('You must Enter a Full name')</script>";
     }
   elseif (empty($email)) {
	   echo "<script>alert('You must Enter a Email ')</script>";
	 }
   elseif (empty($phone)) {
	   echo "<script>alert('You must Enter a Phone Number')</script>";
	 }
   elseif (empty($pass)) {
	   echo "<script>alert('You must Enter a password')</script>";
	 }
   elseif (empty($cnfrm_password)) {
	   echo "<script>alert('You must Confirm a password ')</script>";
	 }
   elseif($pass != $cnfrm_password){
	  echo "<script>alert('Password are not matching !!!')</script>";  
 	 }
   else{
				    //--------------------Checking if user Enter the right information------------------------------//
	    if (!preg_match("/^[a-z]*$/", $fname)) {
		 echo "<script>alert('You must Enter Only Uppercase')</script>";    
	     }
	     elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
		 echo "<script>alert('You must Enter Only 10 Number ')</script>";    
		 }
	    elseif(!preg_match("/^[a-zA-Z@_0-9]{7,16}$/",$pass)) {
		   echo "<script>alert('Password Must content only Uppercase ,@ and Lowercase')</script>";
	    }
	     elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  echo "<script>alert('Invalid email Format')</script>";
		}
        else {
            //-------------------------Checking if the user is already exist into the database -------------------//
            $sql_e = "SELECT * FROM student WHERE email='$email'";
            $res = mysqli_query($conn,$sql_e);
            if (mysqli_num_rows($res) > 0) {
               echo "<script>alert('Email already used !!! Please choose another one')</script>";
            }
            //------------------------Sending data information into the Mysql database -------------------------//
            else
            {
	            
         $sql = "INSERT INTO student (fname, email, phone, pass, cnfrm_password)
		 VALUES ('$fname', '$email', '$phone', '$pass', '$cnfrm_password')";

		if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

              
}
}
}
}
?>