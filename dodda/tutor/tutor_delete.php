<?php
include '.././db/db_config.php';
$tutorID = $_SESSION['tutor_id'];
$deleteTutor = mysqli_query($db_connect, "DELETE FROM tutors WHERE tutor_id = '$tutorID' ");
if ($deleteTutor) {
	echo "<script>alert('Your Account Permanently Deleted..!')</script>";
	session_destroy();
	echo "<script>parent.location='index.php'</script>";
}
?>