<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
</head>
<body style="background:transparent url('collage123.jpg') no-repeat center center /cover">
<div class="container-fluid">
  <div class="row">
     <div class="col-sm-2" style="background-color:lavender;"></div>
     <div class="col-sm-3" style="background-color:lavender;"></div>
     <div class="col-sm-3" style="background-color:lavenderblush;">
           <p>Already member? <a href="login.php">Login</a></p>
           <h3>Student Regisration form</h3>
           <?php

            //if (isset($_POST['submit'])){
           $servername = "localhost";
           $username = "svjk";
           $password = "password";
           $dbname = "website";
           $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
           if (!$conn) {
           die("Connection failed: " . mysqli_connect_error());
           }
           ?>
           <form action="form3.php" method="POST">
           <div class="form-group">
              <label for="clas">Class:</label>
                 <select name="clas">
                      <option name="clas" value="One to fifth">One to fifth</option>
                      <option name="clas" value="Sixth">Sixth</option>
                      <option name="clas" value="Seventh">Seventh</option>
                      <option name="clas" value="Eighth">Eighth</option>
                      <option name="clas" value="Nineth">Nineth</option>
                      <option name="clas" value="Tenth">Tenth</option>
                      <option name="clas" value="Eleventh">Eleventh</option>
                      <option name="clas" value="Tweleth">Tweleth</option>
                      <option name="clas" value="Diploma">Diploma</option>
                      <option name="clas" value="Degree">Degree</option>
                      <option name="clas" value="Engineering">Engineering</option>
                      <option name="clas" value="others">Others</option>
                </select>
       </div>
           <div class="form-group">
           <label for="boar">Board:</label>
           <select name="boar">
                    <option name="boar" value="STATE">STATE</option>
                    <option name="boar" value="CBSE">CBSE</option>
                    <option name="boar" value="ICSE">ICSE</option>
                    <option name="boar" value="ICSE">IGCSE</option>
                    <option name="boar" value="ISC">ISC</option>
                    <option name="boar" value="NIOS">NIOS</option>
                    <option name="boar" value="others">Others</option>
           </select>
      </div> 
      <div class="form-group">
              <label for="usr">where:</label>
              <select name="wher">
                  <option name="wher" value="Student's Home">Student's Home</option>
                  <option name="wher" value="Class room">Class room</option>
                  <option name="wher" value="Online">Online</option>
                  <option name="wher" value="Facutly">Faculty's Home</option>
             </select>
         </div>
      <div class="form-group">
          <label for="sub">Subject:</label>
          <select name="sub">
                <option name="sub" value="Science">Science</option>
                <option name="sub" value="Maths">Maths</option>
                <option name="sub" value="English">English</option>
                <option name="sub" value="Kannada">Kannada</option>
                <option name="sub" value="Hindi">Hindi</option>
                <option name="sub" value="Social">Socail</option>
                <option name="sub" value="French">French</option>
                <option name="sub" value="All">All</option>
                <option name="sub" value="other">other</option>
          </select>
     </div>
     <div class="form-group">
         <button style='font-size:24px'><a href="form3.php">submit<i class='fas fa-angle-double-right'></i></a></button>
     </div>
     </form>
  </div>
       <div class="col-sm-3" style="background-color:lavender;"> </div>
       <div class="col-sm-1" style="background-color:lavender;"></div>
 </div>
</div>

</body>
</html>
