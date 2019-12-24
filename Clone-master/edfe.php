$sql = "INSERT INTO student (name, email, phone, pass, cnfrm_password)
VALUES ('$name', '$email', '$phone', '$pass', '$cnfrm_password')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('User created succefull')</script>";
	header("location: student_form1.html?AccountCreatedSuccefull");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}