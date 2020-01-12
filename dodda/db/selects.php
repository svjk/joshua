<?php
include 'db_config.php';
if (isset($_POST['advSearchBtn'])) {
	$loc = $_POST['location'];
	$qfication = $_POST['qualification'];
	$subj = $_POST['subject'];
	$genr = $_POST['gender'];
	$expernce = $_POST['experience'];

	if ($loc AND $qfication AND $subj AND $genr AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, qf.qualification_name, sb.subject_name, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subject AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.subject_id AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.subject_id='$subj' AND tut.gender_id='$genr' AND tut.experience_id='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $qfication AND $subj AND $genr) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, qf.qualification_name, sb.subject_name, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subject AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.subject_id AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.subject_id='$subj' AND tut.gender_id='$genr' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $qfication AND $subj AND $genr AND $expnc) {
		$searchTutors = "";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $qfication AND $subj) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, qf.qualification_name, sb.subject_name, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subject AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.subject_id AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.subject_id='$subj' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $qfication) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, qf.qualification_name, sb.subject_name, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subject AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.subject_id AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, qf.qualification_name, sb.subject_name, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subject AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.subject_id AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}

	
}

$selectAllTutors = "
SELECT tut.tutor_id, tut.tutor_name, qf.qualification_name, sb.subject_name, gr.gender_name, exp.experience_name, tut.tutor_location 
FROM tutors AS tut, qualifications AS qf, subject AS sb, gender AS gr, experience AS exp
WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.subject_id AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id ";
$allTutorsArray = $connect->query($selectAllTutors);

$selectQualifications = "SELECT * FROM qualifications";
$qualificationsArray = $connect->query($selectQualifications);

$selectSubject = "SELECT * FROM subject";
$subjectArray = $connect->query($selectSubject);

$selectGender = "SELECT * FROM gender";
$genderArray = $connect->query($selectGender);

$selectExperience = "SELECT * FROM experience";
$experienceArray = $connect->query($selectExperience);


?>