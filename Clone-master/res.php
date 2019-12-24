<?php
if (isset($_POST['submit'])){
	      //-----------------------connect php to mysql------------------// 
   include_once('connection.php');
	     //-------------------------Get information from users----------------//
	     //Using php function mysqli_real_escape_string to protect against Sql injection
   $categories= $_POST['signup_form_select'];
   $fname=$_POST['fname'];
   $phone=$_POST['phone'];
   $email=$_POST['email'];
   $pass= $_POST['pass1'];
   $cnfrm_password=$_POST['cnfrm-pass'];
    /*$sql = "INSERT INTO student('dsaas', '79879', 'email', 'pass', 'cnfrm_password')";
	            
	           if (mysqli_query($conn, $sql)) {
			            	echo "done ";
			              echo "<script>alert('User created succefull')</script>";
			                header("location: home.php?AccountCreatedSuccefull");
			              }
		            else{ 	
		            echo "not done ";	
		                echo "<script>alert('User is not created succefull !!!')</script>";
		            }*/
            
 //$fac1=$_GET['fname'];
   //$sql = "INSERT INTO student (name,phone,email,password,comfirm)VALUES('$fname','$phone','$email','$pass','$cnfrm_password')";
			//-----------------Checking Empty Password into the fields----------------//  
   if (empty($categories)) {
   echo "<script>alert('You must choose one option')</script>"; 
   	 } 
   elseif (empty($fname)) {
       echo "<script>alert('You must Enter a Full name')</script>";
     }
   elseif (empty($phone)) {
	   echo "<script>alert('You must Enter a Phone Number')</script>";
	 }
   elseif (empty($email)) {
	   echo "<script>alert('You must Enter a Email ')</script>";
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
            switch ($categories) {
            case 1:
            //-------------------------Checking if the user is already exist into the database -------------------//
            $sql_e = "SELECT * FROM student WHERE email='$email'";
            $res = mysqli_query($conn,$sql_e);
            if (mysqli_num_rows($res) > 0) {
               echo "<script>alert('Email already used !!! Please choose another one')</script>";
            }
            //------------------------Sending data information into the Mysql database -------------------------//
            else
            {
	            //$hash = md5($pass);
	           /* $sql = "INSERT INTO student (name, phone, email, password, comfirm)VALUES('$fname', '$phone', '$email', '$pass', '$cnfrm_password')";
	            $res = mysqli_query($conn, $sql);
			            if ($res) {
			            	echo "done ";
			              echo "<script>alert('User created succefull')</script>";
			                header("location: home.php?AccountCreatedSuccefull");
			              }
		            else{ 	
		            echo "not done ";	
		                echo "<script>alert('User is not created succefull !!!')</script>";
		            }
            }// ELSE CLOSE*/



	 	$sql = "INSERT INTO student (fname, phone, email, pass, cnfrm_password)
		VALUES ('$fname', '$phone', '$email', '$pass', '$cnfrm_password')";

		if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}//else close
               break;
              case 2:
                    //-------------------------Checking if the user is already exist into the database -------------------//
		            $sql_e = "SELECT * FROM Faculty WHERE email='$email'";
		            $res = mysqli_query($conn,$sql_e);
		            if (mysqli_num_rows($res) > 0) {
		            echo "<script>alert('Email already used !!! Please choose another one')</script>";
		            }
		             //------------------------Sending data information into the Mysql database -------------------------//
                   else
                   {
			            $hash = md5($pass);
			            $sql = "INSERT INTO Faculty (name,phone,email,password,comfirm)VALUES('$fname','$phone','$email','$pass','$cnfrm_password')";
			           
			            if (mysqli_query($conn, $sql)) {
			                echo "<script>alert('User created succefull')</script>";
			                header("location: home.php?AccountCreatedSuccefull");
			            }
			            else
			            {
			                echo "<script>alert('User is not created succefull !!!')</script>";
			            }
                   }// ELSE CLOSED
              break;
              case 3:
			            //-------------------------Checking if the user is already exist into the database -------------------//
			            $sql_e = "SELECT * FROM institut WHERE email='$email'";
			            $res = mysqli_query($conn,$sql_e);
			            if (mysqli_num_rows($res) > 0) {
			               echo "<script>alert('Email already used !!! Please choose another one')</script>";
			               }
			             //------------------------Sending data information into the Mysql database -------------------------//
			            else {
					            $hash = md5($pass);
					            $sql = "INSERT INTO institut(name,phone,email,password,comfirm)VALUES('$fname','$phone','$email','$pass','$cnfrm_password')";
					            $res = mysqli_query($conn, $sql);
					            if ($res) {
					                echo "<script>alert('User created succefull')<script>";
					                header("location: home.php?AccountCreatedSuccefull");
					            }
					            else {
					                echo "<script>alert('User is not created succefull !!!')<script>";
					            }
                                           }
              break;// CASE 3 BREAK
            default:
            echo "<script>alert('PLease You must choose something !!!!')</script>";
            break;
        }// SWITCH CLOSE
    }// ELSE ABOVE SWITCH
}
}
?>