<?php
if ($loc AND $qfication AND $subj AND $genr AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.subject_id='$subj' AND tut.gender_id='$genr' AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $qfication AND $subj AND $genr) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.subject_id='$subj' AND tut.gender_id='$genr' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $qfication AND $subj) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.subject_id='$subj' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $qfication) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $subj) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.subject_id='$subj' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $genr) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.gender_id='$genr' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	if ($loc AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}




// ***********	Tested Adavnce Search ************
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
// ***********	End Advanced Search **************

// 1). 1,2,3,4,5
	if ($loc AND $qfication AND $subj AND $genr AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.subject_id='$subj' AND tut.gender_id='$genr' AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $subj AND $genr AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.subject_id='$subj' AND tut.gender_id='$genr' AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $qfication AND $genr AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.gender_id='$genr' AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}

	else if ($loc AND $qfication AND $subj AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.subject_id='$subj' AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $qfication AND $subj AND $genr) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.subject_id='$subj' AND tut.gender_id='$genr' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $qfication AND $subj) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.subject_id='$subj' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $qfication AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $qfication  AND $genr ) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.gender_id='$genr' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $subj AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.subject_id='$subj' AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	else if ($loc AND $subj AND $genr ) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.subject_id='$subj' AND tut.gender_id='$genr' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}



	// 2). 1,2,4,5
	else if ($loc AND $qfication AND $genr AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.gender_id='$genr' AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	// 3). 1,2,5
	else if ($loc AND $qfication AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	// 4). 1,2,4
	else if ($loc AND $qfication AND $genr) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.gender_id='$genr' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	// 5). 1,2
	else if ($loc AND $qfication) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	// 6). 1,3,4,5
	else if ($loc AND $subj AND $genr AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.subject_id='$subj' AND tut.gender_id='$genr' AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	// 7). 1,3,5
	else if ($loc AND $subj AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.subject_id='$subj' AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	// 8). 1,3,4
	else if ($loc AND $subj AND $genr) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.subject_id='$subj' AND tut.gender_id='$genr'  ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	// 9). 1,3
	else if ($loc AND $subj) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.subject_id='$subj' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	// 10). 1,4,5
	else if ($loc AND $genr AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc'AND tut.gender_id='$genr' AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	// 11). 1,4
	else if ($loc AND $genr) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc'AND tut.gender_id='$genr' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	// 12). 1,5
	else if ($loc AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc'AND tut.experience_id<='$expernce' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
// 1). 1,2,3,4
	else if ($loc AND $qfication AND $subj AND $genr) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.subject_id='$subj' AND tut.gender_id='$genr' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	// 1). 1,2,3
	else if ($loc AND $qfication AND $subj) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, qf.qualification_name, sb.Subject, gr.gender_name, exp.experience_name, tut.tutor_location 
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp
		WHERE tut.qualification_id=qf.qualification_id AND tut.subject_id=sb.ID AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.subject_id='$subj' ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
?>