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

// ******* Start Tutor Selected Subjects List ****
$tutorSelectedSubject = mysqli_query($db_connect, "
	SELECT ssub.tutor_selected_subjects_id, ssub.tutor_id, ssub.subject_id, sb.Subject
	FROM tutor_selected_subjects AS ssub, subjects AS sb
	WHERE ssub.subject_id=sb.ID ");
$tutorSelectedSubjectsArray = array();
while ($row = mysqli_fetch_array($tutorSelectedSubject)) {
	$tutorSelectedSubjectsArray[] = $row;
}
// *******	End Tutor Selected Subjects List *************

// *******	Select Teaching Modes ********
$selectTeachingModes = "SELECT * FROM teaching_mode";
$fetchTeachingModes = mysqli_query($db_connect, $selectTeachingModes);
$teachingModeArray = array();
while ($row = mysqli_fetch_array($fetchTeachingModes)) {
	$teachingModeArray[] = $row;
}
// *******	End Select Teaching Modes ****
// ******* Select Teaching Mediums *******
$selectTeachingMediums = mysqli_query($db_connect, "SELECT * FROM teaching_mediums");
$teachingMediumArray = array();
while ($row = mysqli_fetch_array($selectTeachingMediums)) {
	$teachingMediumArray[] = $row;
}
// ******* End Teaching Mediums **********
// ******* Select Job Types *******
$selectJobTypes = mysqli_query($db_connect, "SELECT * FROM job_types");
$jobTypesArray = array();
while ($row = mysqli_fetch_array($selectJobTypes)) {
	$jobTypesArray[] = $row;
}

// ******* End Job Types **********

// ****** Select ID Proofs Types ***
$selectAddressProofTypes = mysqli_query($db_connect, "SELECT * FROM address_proofs");
$addressProofArray = array();
while ($row = mysqli_fetch_array($selectAddressProofTypes)) {
	$addressProofArray[] = $row;
}
// ****** End ID Proofs Types ******
// ****** Select Experience ********
$selectExperience = mysqli_query($db_connect, "SELECT * FROM experience");
$experienceArray = array();
while ($row = mysqli_fetch_array($selectExperience)) {
	$experienceArray[] = $row;
}
// ****** End Experience ********

// ****** Select Languages ******
$selectLanguages =mysqli_query($db_connect, "SELECT * FROM languages");
$languagesArray = array();
while ($row  = mysqli_fetch_array($selectLanguages)) {
	$languagesArray[] = $row;
}
// ****** End Languaes **********

// *******	Select User Types ********
$selectUserTypes = "SELECT * FROM usertype";
$fetchUserTypes = mysqli_query($db_connect, $selectUserTypes);
$userTypesArray = array();
while ($row = mysqli_fetch_array($fetchUserTypes)) {
	$userTypesArray[] = $row;
}
// *******	End Select User Types ****

// ********** Strat Basic Search *************
if (isset($_POST['basicSearchBtn'])) {
	$uType = $_POST['user_type'];
	$basicSearchLoc = $_POST['location'];
	$subjectID = $_POST['subject_id'];

	if ($uType == 4) {
		$searchTutor = "
		SELECT tut.tutor_id, tut.tutor_name AS searchedname, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location AS searchedlocation 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp 
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id AND tut.tutor_location='$basicSearchLoc' AND tut.subject_id='$subjectID' ";
		$fetchTutor = mysqli_query($db_connect, $searchTutor);
		$basicSearchedArray = array();
		while ($row = mysqli_fetch_array($fetchTutor)) {
			$basicSearchedArray[] = $row;
		}
	}
	else if ($uType == 3) {
		$searchStudents = "
		SELECT st.Name AS searchedname, st.ParentName, sb.Subject, gr.gender_name, br.Boards, st.student_location AS searchedlocation 
		FROM student AS st, subjects AS sb, gender AS gr, boards AS br
		WHERE st.Subject=sb.ID AND st.gender_id=gr.gender_id AND st.board_id=br.ID AND st.student_location='$basicSearchLoc' AND st.Subject='$subjectID' ";
		
		$fetchStudents = mysqli_query($db_connect, $searchStudents);
		$basicSearchedArray = array();
		while ($row = mysqli_fetch_array($fetchStudents)) {
			$basicSearchedArray[] = $row;
		}
	}
}
// ********** End Basic Search ***************

// ********** Start Medium Search Form ********
if (isset($_POST['mediumSearchBtn'])) {
  $teachimgModeId = $_POST['teach_mode'];
  $classCategoryId = $_POST['class_category'];
  $subjectId = $_POST['subject_list'];
  $tutorLocation = $_POST['location'];

  $searchTutors = "
  SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
  FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp 
  WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id AND tut.teaching_mode_id='$teachimgModeId' AND tut.classnames_id='$classCategoryId' AND tut.subject_id='$subjectId' AND tut.tutor_location='$tutorLocation' " ;
  $searchedTutors = mysqli_query($db_connect, $searchTutors);
  if (mysqli_num_rows($searchedTutors)>=1) {
    $midiumSearchedArray = array();
    while ($row = mysqli_fetch_array($searchedTutors)) {
      $midiumSearchedArray[] = $row;
    }
  }
}
// ********** End Medium Search Form **********



$selectAllTutors = "
SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, tut.tutor_email, gr.gender_name, tut.tutor_dob, tut.tutor_location, tut.tutor_profile_image, tut.tutor_age, qf.qualification_name, tut.boards_id, tut.classnames_id, sb.Subject, tut.teaching_mode_id, tut.teaching_medium_id, tut.job_type_id, tut.permanent_address, tut.address_proof_id, tut.proof_id_number, tut.address_proof_front, tut.address_proof_back, exp.experience_name, tut.institution_name, tut.tutor_designation, tut.tutor_salary, tut.languages_id, tut.question1_answer, tut.question2_answer, tut.question3_answer, tut.tutor_lat, tut.tutor_lng, tut.city_id, tut.tutor_desired_city, tut.tutor_svjk_score, tut.tutor_rating, tut.passport_status, tut.tutor_specialization, tut.teaching_certification, tut.criminal_cases_complaints, tut.tutor_created_datetime, tut.tutor_updated_datetime
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp, tutor_selected_boards AS sbrd, tutor_selected_class AS scls, tutor_selected_subjects AS ssub, tutor_selected_teaching_mode AS stmode, tutor_selected_teaching_medium AS stmedium
		WHERE tut.qualification_id=qf.qualification_id AND sb.ID=ssub.subject_id AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id AND tut.tutor_id=sbrd.tutor_id AND tut.tutor_id=scls.tutor_id AND tut.tutor_id=ssub.tutor_id AND tut.tutor_id=stmode.tutor_id AND tut.tutor_id=stmedium.tutor_id GROUP BY tut.tutor_id";
$fetchAllTutors = mysqli_query($db_connect, $selectAllTutors);
$allTutorsArray = array();
while ($row = mysqli_fetch_array($fetchAllTutors)) {
	$allTutorsArray[] = $row;
}

$selectGender = mysqli_query($db_connect, "SELECT * FROM gender");
$genderArray = array();
while ($row = mysqli_fetch_array($selectGender)) {
	$genderArray[] = $row;
}
// $genderArray = $connect->query($selectGender);

$selectQualifications = mysqli_query($db_connect, "SELECT * FROM qualifications");
$qualificationsArray = array();
while ($row = mysqli_fetch_array($selectQualifications)) {
	$qualificationsArray[] = $row;
}

$selectBoards = "SELECT * FROM boards";
$fetchBoards = mysqli_query($db_connect, $selectBoards);
$boardsArray = array();
while ($row = mysqli_fetch_array($fetchBoards)) {
	$boardsArray[] = $row;
}

?>