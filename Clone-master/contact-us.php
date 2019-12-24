
<?php
if (isset($_POST['submit']))
 {
//-----------------------connect php to mysql------------------// 
include_once('connection.php');
//-------------------------Get information from users----------------//

//Using php function mysqli_real_escape_string to protect against Sql injection

$fname= mysqli_real_escape_string($conn,$_POST['fname']);
$lname= mysqli_real_escape_string($conn,$_POST['lname']);
$email= mysqli_real_escape_string($conn,$_POST['email']);
$message= mysqli_real_escape_string($conn,$_POST['message']);





//-----------------Checking Empty Password into the fields----------------//  
 if (empty($fname)) {
     echo "<script>alert('You must Enter a First name')</script>";
 }
 elseif (empty($lname)) {
     echo "<script>alert('You must Enter a Last Name')</script>";
 }
  elseif (empty($email)) {
     echo "<script>alert('You must Enter a Email ')</script>";
 }
 elseif (empty($message)) {
     echo "<script>alert('You must Enter a Message')</script>";
 }
    //--------------------Checking if user Enter the right information------------------------------//
 elseif (!preg_match("/^[A-Z]*$/", $fname)) {
    echo "<script>alert('You must Enter Only Uppercase')</script>";    
    }
 elseif (!preg_match("/^[A-Z]*$/", $lname)) {
    echo "<script>alert('You must Enter Only Uppercase')</script>";    
    }
 elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email Format')</script>";
    }
 else
    {
       $sql_e = "select * from contact where email='$email'";
            $res = mysqli_query($conn,$sql_e);
            if (mysqli_num_rows($res) > 0) {
               echo "<script>alert('Email already used !!! Please choose another one to contact Us')</script>";
               }
            //------------------------Sending data information into the Mysql database -------------------------//
               else
               {
            $sql = "insert into contact(fname,lname,email,message) values('$fname','$lname','$email','$message')";
            $res = mysqli_query($conn, $sql);
            if ($res) 
            {
                header("location: contact-us.php?ThanksToContactUs");
            }
            else
            {
                echo "<script>alert('Sorry there is some problem !!!')<script>";
            }
        }
    }
}
    ?>
<?php include "header.php" ?>
<div class="spacer"></div>	
<section>
     <div class="contact-banner">
     		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15548.231548943226!2d77.6355753!3d13.0319857!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x140885b5b85ee969!2sSwami+Vivekananda+Jnana+Kendra!5e0!3m2!1sen!2sin!4v1528624291974" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
     </div>
		 <div class="container">
          <div class="row">
               <div class="col-md-12">

               </div>
             </div>
           </div>

  </section>
 
  <section class="contact-us">
	<div class="container">
		<div class="row">
			<div class="col-md-4 text-center">
				<div class="card">
					<div class="front front1"> 
						<img src="smartphone.png">
					</div> 
					<div class="back">
						<p>080-41722223</p>
						<p>9741264243 </p>   
						<p>9731663600</p>
					</div>   
				</div>	
			</div>
			<div class="col-md-4 text-center">
				<div class="card">
					<div class="front front2"> 
						<img src="location.png">
					</div> 
					<div class="back">
					<p>#184, Hennur Cross, Near Indian Academy College,<br> Off Ring Road, Bengaluru-560043 Karnataka, India.</p>
					</div>   
				</div>	
			</div>
			<div class="col-md-4 text-center">
				<div class="card">
					<div class="front front3"> 
						<img src="gmail.png">
					</div> 
					<div class="back">
						<p>svj.kendra@gmail.com</p>
						<p>write2svjk@svjnanakendra.com</p>
					</div>   
				</div>	
			</div>
			
			
		</div>
		
	</div>
</section>
</section>
</section>

<section>
	<div class="row">
		<div class="col-md-4 ">
			<h3 style="margin-left:38px">Contact Form</h3>

			<div class="container container-form">
			  <form method="post" action="">
			    <label for="fname">First Name</label>
			    <input type="text" id="fname" name="fname" placeholder="Your name..">

			    <label for="lname">Last Name</label>
			    <input type="text" id="lname" name="lname" placeholder="Your last name..">

			    <label for="email">Email id</label>
			    <input type="email" id="email" name="email" placeholder="Your email id..">
			    <label for="subject">Subject</label>
			    <textarea id="subject" name="message" placeholder="Write something.." style="height:200px"></textarea>

			    <input type="submit" value="Submit" name="submit">
			  </form>
			</div>
		</div>
	</div>
</section>
<?php include "footer.php" ?>


 



