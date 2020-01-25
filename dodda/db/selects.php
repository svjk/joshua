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
SELECT tut.tutor_id, tut.tutor_name, tut.tutor_email, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id ";
$fetchAllTutors = mysqli_query($db_connect, $selectAllTutors);
$allTutorsArray = array();
while ($row = mysqli_fetch_array($fetchAllTutors)) {
	$allTutorsArray[] = $row;
}


$selectQualifications = "SELECT * FROM qualifications";
$qualificationsArray = $connect->query($selectQualifications);

$selectGender = mysqli_query($db_connect, "SELECT * FROM gender");
$genderArray = array();
while ($row = mysqli_fetch_array($selectGender)) {
	$genderArray[] = $row;
}
// $genderArray = $connect->query($selectGender);



$selectBoards = "SELECT * FROM boards";
$fetchBoards = mysqli_query($db_connect, $selectBoards);
$boardsArray = array();
while ($row = mysqli_fetch_array($fetchBoards)) {
	$boardsArray[] = $row;
}

?>