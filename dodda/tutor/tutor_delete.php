<?php
include '.././db/db_config.php';
if (!empty($_GET['tutor_id'])) {
	$tutorID = $_GET['tutor_id'];
	$deleteTutor = mysqli_query($db_connect, "DELETE FROM tutors WHERE tutor_id = '$tutorID' ");
	if ($deleteTutor) {
		echo "<script>alert('Tutor Account Permanently Deleted..!')</script>";
		echo "<script>parent.location='tutors.php'</script>";
	}
}
if (!empty($_SESSION['tutor_id'])) {
	$tutorID = $_SESSION['tutor_id'];
	$deleteTutor = mysqli_query($db_connect, "DELETE FROM tutors WHERE tutor_id = '$tutorID' ");
	if ($deleteTutor) {
		echo "<script>alert('Your Account Permanently Deleted..!')</script>";
		session_destroy();
		echo "<script>parent.location='index.php'</script>";
	}
}
?>