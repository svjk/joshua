<?php
/*
tutor_id, tutor_name, tutor_phone, tutor_email, gender_id, tutor_dob, tutor_location, tutor_profile_image, tutor_age, qualification_id, boards_id, classnames_id, subject_id, teaching_mode_id, teaching_medium_id, job_type_id, permanent_address, address_proof_id, proof_id_number, address_proof_front, address_proof_back, experience_id, institution_name, tutor_designation, tutor_salary, languages_id, question1_answer, question2_answer, question3_answer, tutor_lat, tutor_lng, city_id, tutor_desired_city, tutor_svjk_score, tutor_rating, passport_status, tutor_specialization, teaching_certification, criminal_cases_complaints, tutor_created_datetime, tutor_updated_datetime
*/
session_start();

include '.././db/db_config.php';
require_once '../business_functions.php';

//$return_val = get_tutor_info();
//$_SESSION['phoneNumber'] = $return_val[0]["tutor_phone"];

$phone_number = $_SESSION['phoneNumber'];
$phone_number = $return_val[0]["tutor_phone"];
$selectTutor = mysqli_query($db_connect, "SELECT * FROM tutors WHERE tutor_phone='$phone_number' ");
$row = mysqli_fetch_array($selectTutor);
$_SESSION['tutor_id'] = $row['tutor_id'];
$tutorID = $_SESSION['tutor_id'];
$tutName = $row['tutor_name'];
$tutPhone = $row['tutor_phone'];
$tutEmail = $row['tutor_email'];
$tutGenderId = $row['gender_id'];
$tutDob = $row['tutor_dob'];
$tutLocation = $row['tutor_location'];
$tutImage = $row['tutor_profile_image'];
$tutorImageUrl = "tutor_upload_images/".$tutImage;
$tutAge = $row['tutor_age'];
$tutQfc = $row['qualification_id'];
$tutJobType = $row['job_type_id'];
$tutPermAddress = $row['permanent_address'];
$tutAddProofID = $row['address_proof_id'];
$tutProofIdNum = $row['proof_id_number'];
$tutProofDoc = $row['address_proof_front'];
$tutProofDocUrl = "tutor_upload_images/".$tutProofDoc;
$tutuExperID = $row['experience_id'];
$tutOrg = $row['institution_name'];
$tutDesig = $row['tutor_designation'];
$tutSal = $row['tutor_salary'];
$tutAns1 = $row['question1_answer'];
$tutAns2 = $row['question2_answer'];
$tutAns3 = $row['question3_answer'];

$tutUpdated = $row['tutor_updated_datetime'];


// ******* Select Selected Boards **********
$tutorSelectedBoards = mysqli_query($db_connect, "SELECT * FROM tutor_selected_boards WHERE tutor_id='$tutorID' ");
$tutorBoardsArray = array();
while ($row=mysqli_fetch_array($tutorSelectedBoards)) {
	$tutorBoardsArray[] = $row;
}
// ******* End Selected Boards Select ******

// ******* Select Selected Class **********
$tutorSelectedClass = mysqli_query($db_connect, "SELECT * FROM tutor_selected_class WHERE tutor_id='$tutorID' ");
$tutorClassArray = array();
while ($row=mysqli_fetch_array($tutorSelectedClass)) {
	$tutorClassArray[] = $row;
}
// ******* End Selected Class Select ******

// ******* Select Selected Subjects **********
$tutorSelectedSubjects = mysqli_query($db_connect, "SELECT * FROM tutor_selected_subjects WHERE tutor_id='$tutorID' ");
$tutorSubjectsArray = array();
while ($row=mysqli_fetch_array($tutorSelectedSubjects)) {
	$tutorSubjectsArray[] = $row;
}
// ******* End Selected Subjects Select ******

// ******* Select Selected Tution Modes **********
$tutorSelectedTeachingModes = mysqli_query($db_connect, "SELECT * FROM tutor_selected_teaching_mode WHERE tutor_id='$tutorID' ");
$tutorTeachingModesArray = array();
while ($row=mysqli_fetch_array($tutorSelectedTeachingModes)) {
	$tutorTeachingModesArray[] = $row;
}
// ******* End Selected Tution Modes Select ******

// ******* Select Selected Tution Modes **********
$tutorSelectedTeachingMedium = mysqli_query($db_connect, "SELECT * FROM tutor_selected_teaching_medium WHERE tutor_id='$tutorID' ");
$tutorTeachingMediumArray = array();
while ($row=mysqli_fetch_array($tutorSelectedTeachingMedium)) {
	$tutorTeachingMediumArray[] = $row;
}
// ******* End Selected Tution Modes Select ******

// ********** Select Selected Languages Known ********
$selectTutorLangKnown = mysqli_query($db_connect, "SELECT * FROM tutor_selected_languages_known WHERE tutor_id='$tutorID' ");
$tutLangKnownArray = array();
while ($row=mysqli_fetch_array($selectTutorLangKnown)) {
	$tutLangKnownArray[] = $row;
}
// ********** End Selected Languages Known Select ****

?>