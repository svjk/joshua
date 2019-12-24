<?php
/*if (isset($_POST['submit']))
 {
//-----------------------connect php to mysql------------------// 
include_once('connection.php');
//-------------------------Get information from users----------------//

//Using php function mysqli_real_escape_string to protect against Sql injection

$categories= mysqli_real_escape_string($conn,$_POST['signup_form_select']);
$fname= mysqli_real_escape_string($conn,$_POST['fname']);
$phone= mysqli_real_escape_string($conn,$_POST['phone']);
$email= mysqli_real_escape_string($conn,$_POST['email']);
$pass= mysqli_real_escape_string($conn,$_POST['pass1']);
$cnfrm_password= mysqli_real_escape_string($conn,$_POST['cnfrm-pass']);




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
    if (!preg_match("/^[A-Z][a-z]*$/", $fname)) {
    echo "<script>alert('You must Enter Only Uppercase')</script>";    
    }
    elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
    echo "<script>alert('You must Enter Only 10 Number ')</script>";    
    }
    elseif(!preg_match("/^[a-zA-Z@_0-9]{7,16}$/",$pass))
    {
    echo "<script>alert('Password Must content only Uppercase ,@ and Lowercase')</script>";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email Format')</script>";
    }else{
  $sql = "INSERT INTO student(name,phone,email,password)VALUES('$fname','$phone','$email','$hash')";
            $res = mysqli_query($conn, $sql);
}

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
            $hash = md5($pass);
            $sql = "INSERT INTO student(name,phone,email,password,comfirm)VALUES('$fname','$phone','$email','$hash','$hash')";
            $res = mysqli_query($conn, $sql);
            if ($res) {
              echo "<script>alert('User created succefull')<script>";
                header("location: home.php?AccountCreatedSuccefull");
            }else{
                echo "<script>alert('User is not created succefull !!!')<script>";
            }
            }
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
            $sql = "INSERT INTO Faculty (name,phone,email,password,comfirm)VALUES('$fname','$phone','$email','$hash','$hash')";
            $res = mysqli_query($conn, $sql);
            if ($res) {
                echo "<script>alert('User created succefull')<script>";
                header("location: home.php?AccountCreatedSuccefull");
            }
            else
            {
                echo "<script>alert('User is not created succefull !!!')<script>";
            }
        }
                break;
            case 3:
            //-------------------------Checking if the user is already exist into the database -------------------//
            $sql_e = "SELECT * FROM institut WHERE email='$email'";
            $res = mysqli_query($conn,$sql_e);
            if (mysqli_num_rows($res) > 0) {
               echo "<script>alert('Email already used !!! Please choose another one')</script>";
               }
             //------------------------Sending data information into the Mysql database -------------------------//
               else
               {
            $hash = md5($pass);
            $sql = "INSERT INTO institut(name,phone,email,password,comfirm)VALUES('$fname','$phone','$email','$hash','$hash')";
            $res = mysqli_query($conn, $sql);
            if ($res) {
                echo "<script>alert('User created succefull')<script>";
                header("location: home.php?AccountCreatedSuccefull");
            }
            else
            {
                echo "<script>alert('User is not created succefull !!!')<script>";
            }
               
               }
                break;
            default:
            echo "<script>alert('PLease You must choose something !!!!')</script>";
            break;
        }
    }
    
 }
}*/
 include "header.php" ?>
<div class="spacer"></div>
<section class="register-section">

    <div class="register-page-body"></div>
    <div class="spacer"></div>
    <div class="container">
        <div class="row">
           
                <div><span class="error"> </span></div>
                <div class="col-md-8 col-md-offset-2">
                    <div class="register-layout">
                        <div class="success-msz"></div>
                        <div class="error-msz"></div>
                        <div class="error-msz"></div>
                        <div class="register-content-opacity">
                            <h1 class="text-center register-heading">Sign Up For Free</h1>
                            <div class="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="inner-body">
                                        <form action="res.php"  method="POST" id="form-register"> -->
                                              
                                                <label class="register-label ">
                                                    <input type="radio" name="signup_form_select" value="1" id="register_select_student" checked> Student  
                                                </label>
                                                  
                                               <label class="register-label">
                                                    <input type="radio" name="signup_form_select" id="register_select_faculty" value="2">
                                                    Faculty
                                                </label>
                                                  
                                                <label class="register-label">
                                                    <input type="radio" name="signup_form_select" id="register_select_institute" value="3">
                                                    Institute
                                                </label>
                                            
                                                <div class="input--with-icon form-group">
                                                    <div class="column">
                                                        <i class="fa fa-user"></i>
                                                        <input type="text" maxlength="25" class="form-control form-name" name="fname" placeholder=" Name..." id="change_placeholder" value="">
                                                    </div> 
                                                    <span class="error"></span>
                                                </div>
                                                <div class="input--with-icon form-group">
                                                    <div class="column">
                                                        <i class=" fa fa-phone"></i>
                                                        <input type="tel" class="form-control form-phoneno" name="phone" placeholder="Phone number.." maxlength="10">
                                                    </div>
                                                    <span class="error"></span>   
                                                </div>
                        
                                                <div class="input--with-icon form-group">
                                                    <div class="column">
                                                        <i class="fa fa-envelope"></i>
                                                        <input type="email" class="form-control form-emailid" name="email" placeholder="Email id..." >
                                                    </div>
                                                    
                                                    <span class="error"></span>
                                                </div>

                                                <div class="input--with-icon form-group">
                                                    <div class="column ">
                                                        <i class="fa fa-lock"></i>
                                                        <input type="password" class="form-control form-password" name="pass1" placeholder="Password...">
                                                        <span class="tooltip_text" >Enter a password longer than 8 characters include(a-zA-Z@_0-9)</span>
                                                    </div>
                                                    <span class="error"></span>   
                                                </div>
                                            
                                                <div class="input--with-icon form-group">
                                                    <div class="column">
                                                        <i class="fa fa-lock"></i>
                                                        <input type="password" class="form-control form-confrmpass" name="cnfrm-pass" placeholder="confirm password...">
                                                    </div>
                                                    <span class="error"></span>   
                                                </div>
                                                
                                                <div class="register-submit1 form-group1"> 
                                                    <!-- Adding one into class register-submit to avoid javascript checking --> 
                                                    <input type="submit" name="submit" value="Submit" id="">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include "footer.php" ?>