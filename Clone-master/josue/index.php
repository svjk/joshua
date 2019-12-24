

<?php
//----Connect to mysql database --------//
include_once('../connection.php');
if (isset($_POST['submit'])) {
$status = mysqli_real_escape_string($conn,$_POST['signup_form_select']);
$name = mysqli_real_escape_string($conn,$_POST['fname']);
$phone = mysqli_real_escape_string($conn,$_POST['phone']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$pass = mysqli_real_escape_string($conn,$_POST['pass1']);
$pass_conf = mysqli_real_escape_string($conn,$_POST['cnfrm-pass']);
//----------- Checking Empty field -----------//
if (empty($status)) {
  header("location: index.php?option=Empty");
  exit();
}
elseif (empty($name)) {
  echo "<script>alert('Name must not be empty')</script>";
}
elseif (empty($phone)) {
  echo "<script>alert('Phone must not be empty')</script>";
}
elseif (empty($email)) {
  echo "<script>alert('Email must not be empty')</script>";
}
elseif (empty($pass)) {
  echo "<script>alert('Password must not be empty')</script>";
}
elseif (empty($pass_conf)) {
echo "<script>alert('confirm password must not be empty')</script>";
}
elseif( $pass != $pass_conf){
    echo "Password must be same";
}
elseif ($status == 1) {

    $sql_e = "select * from student where email='$email'";
    $check = mysqli_query($conn, $sql_e);

    if (mysqli_num_rows($check) > 0) {
        echo "Email already exist ";
    }
    else
    {
    $hashpass = md5($pass);
    $hashconf = md5($pass_conf);
    $sql = "insert into student(name,phone,email,password,comfirm) values('$name','$phone','$email','$hashpass','$hashconf')";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "User created succefull ";
    }else{
        echo "sorry shadow ";
    }
}
}
elseif ($status == 2) {
    $sql = "insert into faculty(name,phone,email,password,comfirm) values('$name','$phone','$email','$pass','$pass_conf')";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "User created succefull ";
    }else{
        echo "sorry shadow ";
    }
}
elseif ($status == 3) {
    $sql = "insert into institut(name,phone,email,password,comfirm) values('$name','$phone','$email','$pass','$pass_conf')";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "User created succefull ";
    }else{
        echo "sorry shadow ";
    }
}
}
?>
<?php include "../header.php" ?>
<div class="spacer"></div>
<section class="register-section">

    <div class="register-page-body"></div>
    <div class="spacer"></div>
    <div class="container">
        <div class="row">
           
                <div><span class="error"></span></div>
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
                                            <form action=""  method="POST" id="form-register"> 
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
                                                        <span class="tooltip_text" ></span>
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
                                                
                                                <div class="register-submit form-group">
                                                    <input type="submit" name="submit" value="submit" id="register_form_submit">
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
<?php include "../footer.php" ?>