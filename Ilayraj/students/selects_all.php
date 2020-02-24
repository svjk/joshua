<?php
include '.././db/db_config.php';
$selectAllTutor = mysqli_query($db_connect, "SELECT * FROM tutors");
$tutorsArray = array();
while ($row = mysqli_fetch_array($selectAllTutor)) {
	$tutorsArray[] = $row;
}
// ******* Select Selected Subjects **********
$tutorSelectedSubjects = mysqli_query($db_connect, "SELECT * FROM tutor_selected_subjects ");
$tutorSubjectsArray = array();
while ($row=mysqli_fetch_array($tutorSelectedSubjects)) {
	$tutorSubjectsArray[] = $row;
}
// ******* End Selected Subjects Select ******
?>