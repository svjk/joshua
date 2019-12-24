<?php
$servername = "localhost";
$username = "svjk";
$password = "password";
$dbname = "web";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$description = $_POST['description'];
$sql = "INSERT INTO faculty (name, email, phone, description) VALUES ('$name', '$email', '$phone', '$description')";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('User created succefull')</script>";
	header("location: home.php?AccountCreatedSuccefull");
	
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>