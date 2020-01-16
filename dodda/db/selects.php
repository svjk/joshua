<?php
include 'db_config.php';
// ******* Select Class Category ********
$selectClassCategory = "SELECT * FROM classnames";
$fetchCategory = mysqli_query($db_connect, $selectClassCategory);
$classCategoryArray = array();
while ($row = mysqli_fetch_array($fetchCategory)) {
	$classCategoryArray[] = $row;
}
// ******* End Class Category ************
// ******* Start Select Subjects List ****
$selectSubject = "SELECT * FROM subjects";
$fetchSubjects = mysqli_query($db_connect, $selectSubject);
$subjectsArray = array();
while ($row = mysqli_fetch_array($fetchSubjects)) {
	$subjectsArray[] = $row;
}
// *******	End Subjects List *************
// *******	Select Teaching Modes ********
$selectTeachingModes = "SELECT * FROM teaching_mode";
$fetchTeachingModes = mysqli_query($db_connect, $selectTeachingModes);
$teachingModeArray = array();
while ($row = mysqli_fetch_array($fetchTeachingModes)) {
	$teachingModeArray[] = $row;
}
// *******	End Select Teaching Modes ****

// **********	Start Medium Search Form ********
if (isset($_POST['mediumSearchBtn'])) {
	$teachimgModeId = $_POST['teach_mode'];
	$classCategoryId = $_POST['class_category'];
	$subjectId = $_POST['subject_list'];
	$tutorLocation = $_POST['location'];

	$searchTutors = "
	SELECT tut.tutor_id, tut.tutor_name, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
	FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp 
	WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id AND tut.teaching_mode_id='$teachimgModeId' AND tut.classnames_id='$classCategoryId' AND tut.subject_id='$subjectId' AND tut.tutor_location='$tutorLocation' " ;
	$searchedTutors = mysqli_query($db_connect, $searchTutors);
	if (mysqli_num_rows($searchedTutors)>=1) {
		$searchedTutorsArray = array();
		while ($row = mysqli_fetch_array($searchedTutors)) {
			$searchedTutorsArray[] = $row;
		}
	}
}
// **********	End Medium Search Form **********

if (isset($_POST['advSearchBtn'])) {
	$loc = $_POST['location'];
	$qfication = $_POST['qualification'];
	$subj = $_POST['subject'];
	$genr = $_POST['gender'];
	$expernce = $_POST['experience'];

	if ($loc AND $qfication AND $subj AND $genr AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.subject_id='$subj' AND tut.gender_id='$genr' AND tut.experience_id='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $qfication AND $subj AND $genr) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.subject_id='$subj' AND tut.gender_id='$genr' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $qfication AND $subj AND $genr AND $expnc) {
		$searchTutors = "";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $qfication AND $subj) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.subject_id='$subj' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $qfication) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}

	
}
// ***********	End Advanced Search **************

$selectAllTutors = "
SELECT tut.tutor_id, tut.tutor_name, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id ";
$allTutorsArray = $connect->query($selectAllTutors);

$selectQualifications = "SELECT * FROM qualifications";
$qualificationsArray = $connect->query($selectQualifications);

$selectGender = "SELECT * FROM gender";
$genderArray = $connect->query($selectGender);

$selectExperience = "SELECT * FROM experience";
$experienceArray = $connect->query($selectExperience);


?>