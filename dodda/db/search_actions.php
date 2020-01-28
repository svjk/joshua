<?php
include 'db_config.php';
if (isset($_POST['advSearchBtn'])) {
	$loc = $_POST['location'];
	$qfication = $_POST['qualification'];
	$subj = $_POST['subject'];
	$genr = $_POST['gender'];
	$expernce = $_POST['experience'];
	//  1,2,3,4,5
	if ($loc AND $qfication AND $subj AND $genr AND $expernce) {
		$searchTutors = "SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, tut.tutor_email, gr.gender_name, tut.tutor_dob, tut.tutor_location, tut.tutor_profile_image, tut.tutor_age, qf.qualification_name, tut.boards_id, tut.classnames_id, sb.Subject, tut.teaching_mode_id, tut.teaching_medium_id, tut.job_type_id, tut.permanent_address, tut.address_proof_id, tut.proof_id_number, tut.address_proof_front, tut.address_proof_back, exp.experience_name, tut.institution_name, tut.tutor_designation, tut.tutor_salary, tut.languages_id, tut.question1_answer, tut.question2_answer, tut.question3_answer, tut.tutor_lat, tut.tutor_lng, tut.city_id, tut.tutor_desired_city, tut.tutor_svjk_score, tut.tutor_rating, tut.passport_status, tut.tutor_specialization, tut.teaching_certification, tut.criminal_cases_complaints, tut.tutor_created_datetime, tut.tutor_updated_datetime
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp, tutor_selected_boards AS sbrd, tutor_selected_class AS scls, tutor_selected_subjects AS ssub, tutor_selected_teaching_mode AS stmode, tutor_selected_teaching_medium AS stmedium
		WHERE tut.qualification_id=qf.qualification_id AND sb.ID=ssub.subject_id AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id AND tut.tutor_id=sbrd.tutor_id AND tut.tutor_id=scls.tutor_id AND tut.tutor_id=ssub.tutor_id AND tut.tutor_id=stmode.tutor_id AND tut.tutor_id=stmedium.tutor_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND ssub.subject_id='$subj' AND tut.gender_id='$genr' AND tut.experience_id<='$expernce' GROUP BY tut.tutor_id ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}

	// 1,2,3,4
	else if ($loc AND $qfication AND $subj AND $genr) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, tut.tutor_email, gr.gender_name, tut.tutor_dob, tut.tutor_location, tut.tutor_profile_image, tut.tutor_age, qf.qualification_name, tut.boards_id, tut.classnames_id, sb.Subject, tut.teaching_mode_id, tut.teaching_medium_id, tut.job_type_id, tut.permanent_address, tut.address_proof_id, tut.proof_id_number, tut.address_proof_front, tut.address_proof_back, exp.experience_name, tut.institution_name, tut.tutor_designation, tut.tutor_salary, tut.languages_id, tut.question1_answer, tut.question2_answer, tut.question3_answer, tut.tutor_lat, tut.tutor_lng, tut.city_id, tut.tutor_desired_city, tut.tutor_svjk_score, tut.tutor_rating, tut.passport_status, tut.tutor_specialization, tut.teaching_certification, tut.criminal_cases_complaints, tut.tutor_created_datetime, tut.tutor_updated_datetime
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp, tutor_selected_boards AS sbrd, tutor_selected_class AS scls, tutor_selected_subjects AS ssub, tutor_selected_teaching_mode AS stmode, tutor_selected_teaching_medium AS stmedium
		WHERE tut.qualification_id=qf.qualification_id AND sb.ID=ssub.subject_id AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id AND tut.tutor_id=sbrd.tutor_id AND tut.tutor_id=scls.tutor_id AND tut.tutor_id=ssub.tutor_id AND tut.tutor_id=stmode.tutor_id AND tut.tutor_id=stmedium.tutor_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND ssub.subject_id='$subj' AND tut.gender_id='$genr' GROUP BY tut.tutor_id";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
	// 1,2,3
	else if ($loc AND $qfication AND $subj) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, tut.tutor_email, gr.gender_name, tut.tutor_dob, tut.tutor_location, tut.tutor_profile_image, tut.tutor_age, qf.qualification_name, tut.boards_id, tut.classnames_id, sb.Subject, tut.teaching_mode_id, tut.teaching_medium_id, tut.job_type_id, tut.permanent_address, tut.address_proof_id, tut.proof_id_number, tut.address_proof_front, tut.address_proof_back, exp.experience_name, tut.institution_name, tut.tutor_designation, tut.tutor_salary, tut.languages_id, tut.question1_answer, tut.question2_answer, tut.question3_answer, tut.tutor_lat, tut.tutor_lng, tut.city_id, tut.tutor_desired_city, tut.tutor_svjk_score, tut.tutor_rating, tut.passport_status, tut.tutor_specialization, tut.teaching_certification, tut.criminal_cases_complaints, tut.tutor_created_datetime, tut.tutor_updated_datetime
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp, tutor_selected_boards AS sbrd, tutor_selected_class AS scls, tutor_selected_subjects AS ssub, tutor_selected_teaching_mode AS stmode, tutor_selected_teaching_medium AS stmedium
		WHERE tut.qualification_id=qf.qualification_id AND sb.ID=ssub.subject_id AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id AND tut.tutor_id=sbrd.tutor_id AND tut.tutor_id=scls.tutor_id AND tut.tutor_id=ssub.tutor_id AND tut.tutor_id=stmode.tutor_id AND tut.tutor_id=stmedium.tutor_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND ssub.subject_id='$subj' GROUP BY tut.tutor_id";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}

	//  1,2,4,5
	else if ($loc AND $qfication AND $genr AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, tut.tutor_email, gr.gender_name, tut.tutor_dob, tut.tutor_location, tut.tutor_profile_image, tut.tutor_age, qf.qualification_name, tut.boards_id, tut.classnames_id, sb.Subject, tut.teaching_mode_id, tut.teaching_medium_id, tut.job_type_id, tut.permanent_address, tut.address_proof_id, tut.proof_id_number, tut.address_proof_front, tut.address_proof_back, exp.experience_name, tut.institution_name, tut.tutor_designation, tut.tutor_salary, tut.languages_id, tut.question1_answer, tut.question2_answer, tut.question3_answer, tut.tutor_lat, tut.tutor_lng, tut.city_id, tut.tutor_desired_city, tut.tutor_svjk_score, tut.tutor_rating, tut.passport_status, tut.tutor_specialization, tut.teaching_certification, tut.criminal_cases_complaints, tut.tutor_created_datetime, tut.tutor_updated_datetime
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp, tutor_selected_boards AS sbrd, tutor_selected_class AS scls, tutor_selected_subjects AS ssub, tutor_selected_teaching_mode AS stmode, tutor_selected_teaching_medium AS stmedium
		WHERE tut.qualification_id=qf.qualification_id AND sb.ID=ssub.subject_id AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id AND tut.tutor_id=sbrd.tutor_id AND tut.tutor_id=scls.tutor_id AND tut.tutor_id=ssub.tutor_id AND tut.tutor_id=stmode.tutor_id AND tut.tutor_id=stmedium.tutor_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.gender_id='$genr' AND tut.experience_id<='$expernce' GROUP BY tut.tutor_id ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}

	//  1,2,5
	else if ($loc AND $qfication AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, tut.tutor_email, gr.gender_name, tut.tutor_dob, tut.tutor_location, tut.tutor_profile_image, tut.tutor_age, qf.qualification_name, tut.boards_id, tut.classnames_id, sb.Subject, tut.teaching_mode_id, tut.teaching_medium_id, tut.job_type_id, tut.permanent_address, tut.address_proof_id, tut.proof_id_number, tut.address_proof_front, tut.address_proof_back, exp.experience_name, tut.institution_name, tut.tutor_designation, tut.tutor_salary, tut.languages_id, tut.question1_answer, tut.question2_answer, tut.question3_answer, tut.tutor_lat, tut.tutor_lng, tut.city_id, tut.tutor_desired_city, tut.tutor_svjk_score, tut.tutor_rating, tut.passport_status, tut.tutor_specialization, tut.teaching_certification, tut.criminal_cases_complaints, tut.tutor_created_datetime, tut.tutor_updated_datetime
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp, tutor_selected_boards AS sbrd, tutor_selected_class AS scls, tutor_selected_subjects AS ssub, tutor_selected_teaching_mode AS stmode, tutor_selected_teaching_medium AS stmedium
		WHERE tut.qualification_id=qf.qualification_id AND sb.ID=ssub.subject_id AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id AND tut.tutor_id=sbrd.tutor_id AND tut.tutor_id=scls.tutor_id AND tut.tutor_id=ssub.tutor_id AND tut.tutor_id=stmode.tutor_id AND tut.tutor_id=stmedium.tutor_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.experience_id<='$expernce' GROUP BY tut.tutor_id ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}

	//  1,2,4
	else if ($loc AND $qfication AND $genr) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, tut.tutor_email, gr.gender_name, tut.tutor_dob, tut.tutor_location, tut.tutor_profile_image, tut.tutor_age, qf.qualification_name, tut.boards_id, tut.classnames_id, sb.Subject, tut.teaching_mode_id, tut.teaching_medium_id, tut.job_type_id, tut.permanent_address, tut.address_proof_id, tut.proof_id_number, tut.address_proof_front, tut.address_proof_back, exp.experience_name, tut.institution_name, tut.tutor_designation, tut.tutor_salary, tut.languages_id, tut.question1_answer, tut.question2_answer, tut.question3_answer, tut.tutor_lat, tut.tutor_lng, tut.city_id, tut.tutor_desired_city, tut.tutor_svjk_score, tut.tutor_rating, tut.passport_status, tut.tutor_specialization, tut.teaching_certification, tut.criminal_cases_complaints, tut.tutor_created_datetime, tut.tutor_updated_datetime
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp, tutor_selected_boards AS sbrd, tutor_selected_class AS scls, tutor_selected_subjects AS ssub, tutor_selected_teaching_mode AS stmode, tutor_selected_teaching_medium AS stmedium
		WHERE tut.qualification_id=qf.qualification_id AND sb.ID=ssub.subject_id AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id AND tut.tutor_id=sbrd.tutor_id AND tut.tutor_id=scls.tutor_id AND tut.tutor_id=ssub.tutor_id AND tut.tutor_id=stmode.tutor_id AND tut.tutor_id=stmedium.tutor_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' AND tut.gender_id='$genr' GROUP BY tut.tutor_id ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}

	//  1,2
	else if ($loc AND $qfication) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, tut.tutor_email, gr.gender_name, tut.tutor_dob, tut.tutor_location, tut.tutor_profile_image, tut.tutor_age, qf.qualification_name, tut.boards_id, tut.classnames_id, sb.Subject, tut.teaching_mode_id, tut.teaching_medium_id, tut.job_type_id, tut.permanent_address, tut.address_proof_id, tut.proof_id_number, tut.address_proof_front, tut.address_proof_back, exp.experience_name, tut.institution_name, tut.tutor_designation, tut.tutor_salary, tut.languages_id, tut.question1_answer, tut.question2_answer, tut.question3_answer, tut.tutor_lat, tut.tutor_lng, tut.city_id, tut.tutor_desired_city, tut.tutor_svjk_score, tut.tutor_rating, tut.passport_status, tut.tutor_specialization, tut.teaching_certification, tut.criminal_cases_complaints, tut.tutor_created_datetime, tut.tutor_updated_datetime
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp, tutor_selected_boards AS sbrd, tutor_selected_class AS scls, tutor_selected_subjects AS ssub, tutor_selected_teaching_mode AS stmode, tutor_selected_teaching_medium AS stmedium
		WHERE tut.qualification_id=qf.qualification_id AND sb.ID=ssub.subject_id AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id AND tut.tutor_id=sbrd.tutor_id AND tut.tutor_id=scls.tutor_id AND tut.tutor_id=ssub.tutor_id AND tut.tutor_id=stmode.tutor_id AND tut.tutor_id=stmedium.tutor_id
		AND tut.tutor_location='$loc' AND tut.qualification_id='$qfication' GROUP BY tut.tutor_id ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}

	//  1,3,4,5
	else if ($loc AND $subj AND $genr AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, tut.tutor_email, gr.gender_name, tut.tutor_dob, tut.tutor_location, tut.tutor_profile_image, tut.tutor_age, qf.qualification_name, tut.boards_id, tut.classnames_id, sb.Subject, tut.teaching_mode_id, tut.teaching_medium_id, tut.job_type_id, tut.permanent_address, tut.address_proof_id, tut.proof_id_number, tut.address_proof_front, tut.address_proof_back, exp.experience_name, tut.institution_name, tut.tutor_designation, tut.tutor_salary, tut.languages_id, tut.question1_answer, tut.question2_answer, tut.question3_answer, tut.tutor_lat, tut.tutor_lng, tut.city_id, tut.tutor_desired_city, tut.tutor_svjk_score, tut.tutor_rating, tut.passport_status, tut.tutor_specialization, tut.teaching_certification, tut.criminal_cases_complaints, tut.tutor_created_datetime, tut.tutor_updated_datetime
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp, tutor_selected_boards AS sbrd, tutor_selected_class AS scls, tutor_selected_subjects AS ssub, tutor_selected_teaching_mode AS stmode, tutor_selected_teaching_medium AS stmedium
		WHERE tut.qualification_id=qf.qualification_id AND sb.ID=ssub.subject_id AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id AND tut.tutor_id=sbrd.tutor_id AND tut.tutor_id=scls.tutor_id AND tut.tutor_id=ssub.tutor_id AND tut.tutor_id=stmode.tutor_id AND tut.tutor_id=stmedium.tutor_id
		AND tut.tutor_location='$loc' AND ssub.subject_id='$subj' AND tut.gender_id='$genr' AND tut.experience_id<='$expernce' GROUP BY tut.tutor_id ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}

	//  1,3,5
	else if ($loc AND $subj AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, tut.tutor_email, gr.gender_name, tut.tutor_dob, tut.tutor_location, tut.tutor_profile_image, tut.tutor_age, qf.qualification_name, tut.boards_id, tut.classnames_id, sb.Subject, tut.teaching_mode_id, tut.teaching_medium_id, tut.job_type_id, tut.permanent_address, tut.address_proof_id, tut.proof_id_number, tut.address_proof_front, tut.address_proof_back, exp.experience_name, tut.institution_name, tut.tutor_designation, tut.tutor_salary, tut.languages_id, tut.question1_answer, tut.question2_answer, tut.question3_answer, tut.tutor_lat, tut.tutor_lng, tut.city_id, tut.tutor_desired_city, tut.tutor_svjk_score, tut.tutor_rating, tut.passport_status, tut.tutor_specialization, tut.teaching_certification, tut.criminal_cases_complaints, tut.tutor_created_datetime, tut.tutor_updated_datetime
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp, tutor_selected_boards AS sbrd, tutor_selected_class AS scls, tutor_selected_subjects AS ssub, tutor_selected_teaching_mode AS stmode, tutor_selected_teaching_medium AS stmedium
		WHERE tut.qualification_id=qf.qualification_id AND sb.ID=ssub.subject_id AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id AND tut.tutor_id=sbrd.tutor_id AND tut.tutor_id=scls.tutor_id AND tut.tutor_id=ssub.tutor_id AND tut.tutor_id=stmode.tutor_id AND tut.tutor_id=stmedium.tutor_id
		AND tut.tutor_location='$loc' AND ssub.subject_id='$subj' AND tut.experience_id<='$expernce' GROUP BY tut.tutor_id ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}

	//  1,3,4
	else if ($loc AND $subj AND $genr) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, tut.tutor_email, gr.gender_name, tut.tutor_dob, tut.tutor_location, tut.tutor_profile_image, tut.tutor_age, qf.qualification_name, tut.boards_id, tut.classnames_id, sb.Subject, tut.teaching_mode_id, tut.teaching_medium_id, tut.job_type_id, tut.permanent_address, tut.address_proof_id, tut.proof_id_number, tut.address_proof_front, tut.address_proof_back, exp.experience_name, tut.institution_name, tut.tutor_designation, tut.tutor_salary, tut.languages_id, tut.question1_answer, tut.question2_answer, tut.question3_answer, tut.tutor_lat, tut.tutor_lng, tut.city_id, tut.tutor_desired_city, tut.tutor_svjk_score, tut.tutor_rating, tut.passport_status, tut.tutor_specialization, tut.teaching_certification, tut.criminal_cases_complaints, tut.tutor_created_datetime, tut.tutor_updated_datetime
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp, tutor_selected_boards AS sbrd, tutor_selected_class AS scls, tutor_selected_subjects AS ssub, tutor_selected_teaching_mode AS stmode, tutor_selected_teaching_medium AS stmedium
		WHERE tut.qualification_id=qf.qualification_id AND sb.ID=ssub.subject_id AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id AND tut.tutor_id=sbrd.tutor_id AND tut.tutor_id=scls.tutor_id AND tut.tutor_id=ssub.tutor_id AND tut.tutor_id=stmode.tutor_id AND tut.tutor_id=stmedium.tutor_id
		AND tut.tutor_location='$loc' AND ssub.subject_id='$subj' AND tut.gender_id='$genr' GROUP BY tut.tutor_id  ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}

	//  1,3
	else if ($loc AND $subj) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, tut.tutor_email, gr.gender_name, tut.tutor_dob, tut.tutor_location, tut.tutor_profile_image, tut.tutor_age, qf.qualification_name, tut.boards_id, tut.classnames_id, sb.Subject, tut.teaching_mode_id, tut.teaching_medium_id, tut.job_type_id, tut.permanent_address, tut.address_proof_id, tut.proof_id_number, tut.address_proof_front, tut.address_proof_back, exp.experience_name, tut.institution_name, tut.tutor_designation, tut.tutor_salary, tut.languages_id, tut.question1_answer, tut.question2_answer, tut.question3_answer, tut.tutor_lat, tut.tutor_lng, tut.city_id, tut.tutor_desired_city, tut.tutor_svjk_score, tut.tutor_rating, tut.passport_status, tut.tutor_specialization, tut.teaching_certification, tut.criminal_cases_complaints, tut.tutor_created_datetime, tut.tutor_updated_datetime
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp, tutor_selected_boards AS sbrd, tutor_selected_class AS scls, tutor_selected_subjects AS ssub, tutor_selected_teaching_mode AS stmode, tutor_selected_teaching_medium AS stmedium
		WHERE tut.qualification_id=qf.qualification_id AND sb.ID=ssub.subject_id AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id AND tut.tutor_id=sbrd.tutor_id AND tut.tutor_id=scls.tutor_id AND tut.tutor_id=ssub.tutor_id AND tut.tutor_id=stmode.tutor_id AND tut.tutor_id=stmedium.tutor_id
		AND tut.tutor_location='$loc' AND ssub.subject_id='$subj' GROUP BY tut.tutor_id ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}

	//  1,4,5
	else if ($loc AND $genr AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, tut.tutor_email, gr.gender_name, tut.tutor_dob, tut.tutor_location, tut.tutor_profile_image, tut.tutor_age, qf.qualification_name, tut.boards_id, tut.classnames_id, sb.Subject, tut.teaching_mode_id, tut.teaching_medium_id, tut.job_type_id, tut.permanent_address, tut.address_proof_id, tut.proof_id_number, tut.address_proof_front, tut.address_proof_back, exp.experience_name, tut.institution_name, tut.tutor_designation, tut.tutor_salary, tut.languages_id, tut.question1_answer, tut.question2_answer, tut.question3_answer, tut.tutor_lat, tut.tutor_lng, tut.city_id, tut.tutor_desired_city, tut.tutor_svjk_score, tut.tutor_rating, tut.passport_status, tut.tutor_specialization, tut.teaching_certification, tut.criminal_cases_complaints, tut.tutor_created_datetime, tut.tutor_updated_datetime
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp, tutor_selected_boards AS sbrd, tutor_selected_class AS scls, tutor_selected_subjects AS ssub, tutor_selected_teaching_mode AS stmode, tutor_selected_teaching_medium AS stmedium
		WHERE tut.qualification_id=qf.qualification_id AND sb.ID=ssub.subject_id AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id AND tut.tutor_id=sbrd.tutor_id AND tut.tutor_id=scls.tutor_id AND tut.tutor_id=ssub.tutor_id AND tut.tutor_id=stmode.tutor_id AND tut.tutor_id=stmedium.tutor_id
		AND tut.tutor_location='$loc' AND tut.gender_id='$genr' AND tut.experience_id<='$expernce' GROUP BY tut.tutor_id ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}

	//  1,4
	else if ($loc AND $genr) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, tut.tutor_email, gr.gender_name, tut.tutor_dob, tut.tutor_location, tut.tutor_profile_image, tut.tutor_age, qf.qualification_name, tut.boards_id, tut.classnames_id, sb.Subject, tut.teaching_mode_id, tut.teaching_medium_id, tut.job_type_id, tut.permanent_address, tut.address_proof_id, tut.proof_id_number, tut.address_proof_front, tut.address_proof_back, exp.experience_name, tut.institution_name, tut.tutor_designation, tut.tutor_salary, tut.languages_id, tut.question1_answer, tut.question2_answer, tut.question3_answer, tut.tutor_lat, tut.tutor_lng, tut.city_id, tut.tutor_desired_city, tut.tutor_svjk_score, tut.tutor_rating, tut.passport_status, tut.tutor_specialization, tut.teaching_certification, tut.criminal_cases_complaints, tut.tutor_created_datetime, tut.tutor_updated_datetime
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp, tutor_selected_boards AS sbrd, tutor_selected_class AS scls, tutor_selected_subjects AS ssub, tutor_selected_teaching_mode AS stmode, tutor_selected_teaching_medium AS stmedium
		WHERE tut.qualification_id=qf.qualification_id AND sb.ID=ssub.subject_id AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id AND tut.tutor_id=sbrd.tutor_id AND tut.tutor_id=scls.tutor_id AND tut.tutor_id=ssub.tutor_id AND tut.tutor_id=stmode.tutor_id AND tut.tutor_id=stmedium.tutor_id
		AND tut.tutor_location='$loc' AND tut.gender_id='$genr' GROUP BY tut.tutor_id ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}

	//  1,5
	else if ($loc AND $expernce) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, tut.tutor_email, gr.gender_name, tut.tutor_dob, tut.tutor_location, tut.tutor_profile_image, tut.tutor_age, qf.qualification_name, tut.boards_id, tut.classnames_id, sb.Subject, tut.teaching_mode_id, tut.teaching_medium_id, tut.job_type_id, tut.permanent_address, tut.address_proof_id, tut.proof_id_number, tut.address_proof_front, tut.address_proof_back, exp.experience_name, tut.institution_name, tut.tutor_designation, tut.tutor_salary, tut.languages_id, tut.question1_answer, tut.question2_answer, tut.question3_answer, tut.tutor_lat, tut.tutor_lng, tut.city_id, tut.tutor_desired_city, tut.tutor_svjk_score, tut.tutor_rating, tut.passport_status, tut.tutor_specialization, tut.teaching_certification, tut.criminal_cases_complaints, tut.tutor_created_datetime, tut.tutor_updated_datetime
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp, tutor_selected_boards AS sbrd, tutor_selected_class AS scls, tutor_selected_subjects AS ssub, tutor_selected_teaching_mode AS stmode, tutor_selected_teaching_medium AS stmedium
		WHERE tut.qualification_id=qf.qualification_id AND sb.ID=ssub.subject_id AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id AND tut.tutor_id=sbrd.tutor_id AND tut.tutor_id=scls.tutor_id AND tut.tutor_id=ssub.tutor_id AND tut.tutor_id=stmode.tutor_id AND tut.tutor_id=stmedium.tutor_id
		AND tut.tutor_location='$loc' AND tut.experience_id<='$expernce' GROUP BY tut.tutor_id ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}

	// 1
	else if ($loc) {
		$searchTutors = "
		SELECT tut.tutor_id, tut.tutor_name, tut.tutor_phone, tut.tutor_email, gr.gender_name, tut.tutor_dob, tut.tutor_location, tut.tutor_profile_image, tut.tutor_age, qf.qualification_name, tut.boards_id, tut.classnames_id, sb.Subject, tut.teaching_mode_id, tut.teaching_medium_id, tut.job_type_id, tut.permanent_address, tut.address_proof_id, tut.proof_id_number, tut.address_proof_front, tut.address_proof_back, exp.experience_name, tut.institution_name, tut.tutor_designation, tut.tutor_salary, tut.languages_id, tut.question1_answer, tut.question2_answer, tut.question3_answer, tut.tutor_lat, tut.tutor_lng, tut.city_id, tut.tutor_desired_city, tut.tutor_svjk_score, tut.tutor_rating, tut.passport_status, tut.tutor_specialization, tut.teaching_certification, tut.criminal_cases_complaints, tut.tutor_created_datetime, tut.tutor_updated_datetime
		FROM tutors AS tut, qualifications AS qf, subjects AS sb, gender AS gr, experience AS exp, tutor_selected_boards AS sbrd, tutor_selected_class AS scls, tutor_selected_subjects AS ssub, tutor_selected_teaching_mode AS stmode, tutor_selected_teaching_medium AS stmedium
		WHERE tut.qualification_id=qf.qualification_id AND sb.ID=ssub.subject_id AND tut.gender_id=gr.gender_id AND tut.experience_id=exp.experience_id AND tut.tutor_id=sbrd.tutor_id AND tut.tutor_id=scls.tutor_id AND tut.tutor_id=ssub.tutor_id AND tut.tutor_id=stmode.tutor_id AND tut.tutor_id=stmedium.tutor_id
		AND tut.tutor_location='$loc' GROUP BY tut.tutor_id ";
		$searchedTutorsdArray = $connect->query($searchTutors);
	}
}	
// ***********	End Advanced Search **************
?>