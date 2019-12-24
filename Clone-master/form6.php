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

$timings = $_POST['timings'];
$where_ = $_POST['where_'];
$address = $_POST['address'];
$pincode = $_POST['pincode'];
$temp = $_POST['pincode'];
$temp ="";
foreach($timings as $t)
{
	$temp=$temp.$t;
	print $t;
	echo"</br>";
	
}
echo $temp."</br>";
$sql = "SELECT name from faculty where name= '$name'";	
$sql = "INSERT INTO faculty(where_,temp, address, pincode) VALUES ( '$where_','$temp',' $address', '$pincode')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('User created succefull')</script>";
	header("location: home.php?AccountCreatedSuccefull");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
/*
foreach($timings as $t)
{
	update student set 
}
*/
mysqli_close($conn);

?>