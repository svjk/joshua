<?php
/********************************************
tutor_id, tutor_name, tutor_phone, tutor_email, gender_id, tutor_dob, tutor_location, tutor_profile_image, tutor_age, qualification_id, boards_id, classnames_id, subject_id, teaching_mode_id, teaching_medium_id, job_type_id, permanent_address, address_proof_id, proof_id_number, address_proof_front, address_proof_back, experience_id, institution_name, tutor_designation, tutor_salary, languages_id, question1_answer, question2_answer, question3_answer, tutor_lat, tutor_lng, city_id, tutor_desired_city, tutor_svjk_score, tutor_rating, passport_status, tutor_specialization, teaching_certification, criminal_cases_complaints, tutor_created_datetime, tutor_updated_datetime
// Ramona Joy Paul
******************************************** */
include '.././db/db_config.php';
$phone_number = $_SESSION['phoneNumber'];
$selectTutorProfile = mysqli_query($db_connect, "SELECT * FROM tutors WHERE tutor_phone='$phone_number' ");
$row = mysqli_fetch_array($selectTutorProfile);
$_SESSION['tutor_id'] = $row['tutor_id'];
$tutorID = $_SESSION['tutor_id'];

if (isset($_POST['update1'])) {
	$tutName = $_POST['name'];
	$tutEmail = $_POST['email'];
	$tutGender = $_POST['gender'];
	$tutDOB =  $_POST['dob'];
	$tutAddress =  $_POST['current_address'];
	$tutProfileImg = $_FILES['profile-image']['name'];
	$targetToUpload = "tutor_upload_images/";
	$uploadImage = $targetToUpload.basename($_FILES['profile-image']['name']);
	
	if ($tutProfileImg) {
		move_uploaded_file($_FILES['profile-image']['tmp_name'], $uploadImage);
		$updateQuery = "UPDATE tutors SET tutor_name='$tutName', tutor_email='$tutEmail', gender_id='$tutGender', tutor_dob='$tutDOB', tutor_location='$tutAddress', tutor_profile_image='$tutProfileImg', tutor_updated_datetime='$now' WHERE tutor_phone='$phone_number' ";
		$updatePersonalInfo = mysqli_query($db_connect, $updateQuery);
		if ($updatePersonalInfo) {
			echo "<script>alert('Personal Information Updated')</script>";
			echo "<script>parent.location='section2_update.php'</script>";
		}
	}
	else{
		$updateQuery = "UPDATE tutors SET tutor_name='$tutName', tutor_email='$tutEmail', gender_id='$tutGender', tutor_dob='$tutDOB', tutor_location='$tutAddress', tutor_updated_datetime='$now' WHERE tutor_phone='$phone_number' ";
		$updatePersonalInfo = mysqli_query($db_connect, $updateQuery);
		if ($updatePersonalInfo) {
			echo "<script>alert('Personal Information Updated')</script>";
			echo "<script>parent.location='section2_update.php'</script>";
		}
	}
}
// *********** End Update 1 **********

if (isset($_POST['update2'])) {
	$qfication = $_POST['qualification'];
	$boardIDs = $_POST['boards'];
	$classNamesIDs = $_POST['classStandards'];
	$subjects = $_POST['subjectsTeach'];
	$teachModes = $_POST['teachingMode'];
	$teachMediums = $_POST['teachingMedium'];
	$jobType = $_POST['jobType'];

	if (!empty($boardIDs)) {
		$selectTutorsBoards = mysqli_query($db_connect, "SELECT * FROM tutor_selected_boards WHERE tutor_id = '$tutorID' ");
		if (mysqli_num_rows($selectTutorsBoards)>=1) {
			$deleteOldSelectedBoards = mysqli_query($db_connect, "DELETE  FROM tutor_selected_boards WHERE tutor_id = '$tutorID' ");
			for ($i=0; $i <count($boardIDs) ; $i++) { 
				$insertNewBoards = mysqli_query($db_connect, "INSERT INTO tutor_selected_boards(tutor_id, boards_id) VALUES ('$tutorID', '".$boardIDs[$i]."')");
			}
		}
		else if (mysqli_num_rows($selectTutorsBoards)<=0){
			for ($i=0; $i <count($boardIDs) ; $i++) { 
				$insertNewBoards = mysqli_query($db_connect, "INSERT INTO tutor_selected_boards(tutor_id, boards_id) VALUES ('$tutorID', '".$boardIDs[$i]."')");
			}
		}
	}

	if (!empty($classNamesIDs)) {
		$selectTutorClass = mysqli_query($db_connect, "SELECT * FROM tutor_selected_class WHERE tutor_id='$tutorID' ");
		if (mysqli_num_rows($selectTutorClass)>=1) {
			$deleteOldSelectedClass = mysqli_query($db_connect, "DELETE  FROM tutor_selected_class WHERE tutor_id = '$tutorID' ");
			for ($i=0; $i <count($classNamesIDs) ; $i++) { 
				$insertNewClass = mysqli_query($db_connect, "INSERT INTO tutor_selected_class(tutor_id, classnames_id) VALUES ('$tutorID', '".$classNamesIDs[$i]."')");
			}
		}
		else if (mysqli_num_rows($selectTutorClass)<=0){
			for ($i=0; $i <count($classNamesIDs) ; $i++) { 
				$insertNewClass = mysqli_query($db_connect, "INSERT INTO tutor_selected_class(tutor_id, classnames_id) VALUES ('$tutorID', '".$classNamesIDs[$i]."')");
			}
		}
	}

	if (!empty($subjects)) {
		$selectTutorSubjects = mysqli_query($db_connect, "SELECT * FROM tutor_selected_subjects WHERE tutor_id='$tutorID' ");
		if (mysqli_num_rows($selectTutorSubjects)>=1) {
			$deleteOldSelectedSubjects = mysqli_query($db_connect, "DELETE  FROM tutor_selected_subjects WHERE tutor_id = '$tutorID' ");
			for ($i=0; $i <count($subjects) ; $i++) { 
				$insertNewSubjects = mysqli_query($db_connect, "INSERT INTO tutor_selected_subjects(tutor_id, subject_id) VALUES ('$tutorID', '".$subjects[$i]."')");
			}
		}
		else if (mysqli_num_rows($selectTutorSubjects)<=0){
			for ($i=0; $i <count($subjects) ; $i++) { 
				$insertNewSubjects = mysqli_query($db_connect, "INSERT INTO tutor_selected_subjects(tutor_id, subject_id) VALUES ('$tutorID', '".$subjects[$i]."')");
			}
		}
	}
	
	if (!empty($teachModes)) {
		$selectTutorTutionTypes = mysqli_query($db_connect, "SELECT * FROM tutor_selected_teaching_mode WHERE tutor_id='$tutorID' ");
		if (mysqli_num_rows($selectTutorTutionTypes)>=1) {
			$deleteOldSelected = mysqli_query($db_connect, "DELETE  FROM tutor_selected_teaching_mode WHERE tutor_id = '$tutorID' ");
			for ($i=0; $i <count($teachModes) ; $i++) { 
				$insertNewTutionTypes = mysqli_query($db_connect, "INSERT INTO tutor_selected_teaching_mode(tutor_id, teaching_mode_id) VALUES ('$tutorID', '".$teachModes[$i]."')");
			}
		}
		else if (mysqli_num_rows($selectTutorTutionTypes)<=0){
			for ($i=0; $i <count($teachModes) ; $i++) { 
				$insertNewTutionTypes = mysqli_query($db_connect, "INSERT INTO tutor_selected_teaching_mode(tutor_id, teaching_mode_id) VALUES ('$tutorID', '".$teachModes[$i]."')");
			}
		}
	}

	if (!empty($teachMediums)) {
		$selectTutorTeachMedium = mysqli_query($db_connect, "SELECT * FROM tutor_selected_teaching_medium WHERE tutor_id='$tutorID' ");
		if (mysqli_num_rows($selectTutorTeachMedium)>=1) {
			$deleteOldSelected = mysqli_query($db_connect, "DELETE  FROM tutor_selected_teaching_medium WHERE tutor_id = '$tutorID' ");
			for ($i=0; $i <count($teachMediums) ; $i++) { 
				$insertNewTeachMedium = mysqli_query($db_connect, "INSERT INTO tutor_selected_teaching_medium(tutor_id, teaching_medium_id) VALUES ('$tutorID', '".$teachMediums[$i]."')");
			}
		}
		else if (mysqli_num_rows($selectTutorTeachMedium)<=0){
			for ($i=0; $i <count($teachMediums) ; $i++) { 
				$insertNewTeachMedium = mysqli_query($db_connect, "INSERT INTO tutor_selected_teaching_medium(tutor_id, teaching_medium_id) VALUES ('$tutorID', '".$teachMediums[$i]."')");
			}
		}
	}

	$updateQuery = "UPDATE tutors SET qualification_id='$qfication', job_type_id='$jobType', tutor_updated_datetime='$now' WHERE tutor_phone='$phone_number' ";
	$updateBasicInfo = mysqli_query($db_connect, $updateQuery);
	if ($updateBasicInfo) {
		echo "<script>alert('Basic Information Updated')</script>";
		echo "<script>parent.location='section3_update.php'</script>";
	}
}
// *********** End Update 2 **********
if (isset($_POST['update3'])) {
	$permtAddres = $_POST['permanentAddress'];
	$proofIdType = $_POST['proof_type_id'];
	$proofIdNum = $_POST['proofIdNumber'];
	$proofDocument = $_FILES['addressProofDocument']['name'];
	$targetToUpload = "tutor_upload_images/";
	$uploadImage = $targetToUpload.basename($_FILES['addressProofDocument']['name']);
	if ($proofDocument) {
		move_uploaded_file($_FILES['addressProofDocument']['tmp_name'], $uploadImage);

		$updateQuery = "UPDATE tutors SET permanent_address='$permtAddres', address_proof_id='$proofIdType', proof_id_number='$proofIdNum', address_proof_front='$proofDocument', tutor_updated_datetime='$now' WHERE tutor_phone='$phone_number' ";
		$updateContactInfo = mysqli_query($db_connect, $updateQuery);
		if ($updateContactInfo) {
			echo "<script>alert('Contact Information Updated')</script>";
			echo "<script>parent.location='section4_update.php'</script>";
		}
	}
	else{
		$updateQuery = "UPDATE tutors SET permanent_address='$permtAddres', address_proof_id='$proofIdType', proof_id_number='$proofIdNum', tutor_updated_datetime='$now' WHERE tutor_phone='$phone_number' ";
		$updateContactInfo = mysqli_query($db_connect, $updateQuery);
		if ($updateContactInfo) {
			echo "<script>alert('Contact Information Updated')</script>";
			echo "<script>parent.location='section4_update.php'</script>";
		}
	}
	
}
// *********** End Update 3 **********

if (isset($_POST['update4'])) {
	$expID = $_POST['experienceID'];
	$orgName = $_POST['organization_name'];
	$desigNation = $_POST['old_designation'];
	$currSalary = $_POST['current_sal'];

	$updateQuery = "UPDATE tutors SET experience_id='$expID', institution_name='$orgName', tutor_designation='$desigNation', tutor_salary='$currSalary', tutor_updated_datetime='$now' WHERE tutor_phone='$phone_number'";
	$updateExpInfo = mysqli_query($db_connect, $updateQuery);
	if ($updateExpInfo) {
		echo "<script>alert('Experience Information Updated')</script>";
		echo "<script>parent.location='section5_update.php'</script>";
	}

}
// *********** End Update 4 **********

if (isset($_POST['update5'])) {
	$lngKnown = $_POST['languagesKnown'];
	$quesAnwer1 = $_POST['answer1'];
	$quesAnwer2 = $_POST['answer2'];
	$quesAnwer3 = $_POST['answer3'];

	if (!empty($lngKnown)) {
		$selectTutorTutionTypes = mysqli_query($db_connect, "SELECT * FROM tutor_selected_languages_known WHERE tutor_id='$tutorID' ");
		if (mysqli_num_rows($selectTutorTutionTypes)>=1) {
			$deleteOldSelected = mysqli_query($db_connect, "DELETE  FROM tutor_selected_languages_known WHERE tutor_id = '$tutorID' ");
			for ($i=0; $i <count($lngKnown) ; $i++) { 
				$insertNewTutionTypes = mysqli_query($db_connect, "INSERT INTO tutor_selected_languages_known(tutor_id, languages_id) VALUES ('$tutorID', '".$lngKnown[$i]."')");
			}
		}
		else if (mysqli_num_rows($selectTutorTutionTypes)<=0){
			for ($i=0; $i <count($lngKnown) ; $i++) { 
				$insertNewTutionTypes = mysqli_query($db_connect, "INSERT INTO tutor_selected_languages_known(tutor_id, languages_id) VALUES ('$tutorID', '".$lngKnown[$i]."')");
			}
		}
	}

	$updateQuery = "UPDATE tutors SET question1_answer='$quesAnwer1', question2_answer='$quesAnwer2', question3_answer='$quesAnwer3', tutor_updated_datetime='$now' WHERE tutor_phone='$phone_number'";
	$updateOtherInfo = mysqli_query($db_connect, $updateQuery);
	if ($updateOtherInfo) {
		echo "<script>alert('Profile Successfully Updated')</script>";
		echo "<script>parent.location='my_profile.php'</script>";
	}
}
// *********** End Update 5 **********
?>