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

$graduate = $_POST['graduate'];
$post_graduate = $_POST['post_graduate'];
$org_name = $_POST['org_name'];
$description = $_POST['description'];
$expyear = $_POST['expyear'];
$sql = "SELECT name from faculty where name= '$name'";
$sql = "INSERT INTO faculty (graduate, post_graduate, org_name, description, expyear)
VALUES ('$graduate', '$post_graduate','$org_name', '$description','$expyear')";
echo $org_name ;
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('User created succefull')</script>";
	//header("location: facultyform3.html?AccountCreatedSuccefull");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>