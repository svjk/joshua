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

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$pass = $_POST['pass'];
$cnfrm_password = $_POST['cnfrm_password'];
$sql = "INSERT INTO faculty (name, email, phone, pass, cnfrm_password) VALUES ('$name', '$email', '$phone', '$pass', '$cnfrm_password')";
	ECHO $name ."from    form 1";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('User created succefull')</script>";
	header("location: facultyform2.html?AccountCreatedSuccefull");
	
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>