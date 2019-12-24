<?php
$servername = "localhost";
$username = "svjk";
$password = "password";
$dbname = "website";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$time = $_POST['time'];
$address = $_POST['address'];
$pincode = $_POST['pincode'];
$db = mysqli_select_db("",$conn);
$sql = "INSERT INTO student(name, email, phone, pass, cnfrm_password, clas, boar, wher, sub, time, address, pincode)
VALUES ('$name', '$email', '$phone', '$pass', '$cnfrm_password', '$clas', '$boar', '$wher', '$sub', '$time', '$address', '$pincode')";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('User created succefull')</script>";
	header("location: home.php?AccountCreatedSuccefull");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>