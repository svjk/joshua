<?php
	require_once 'database_functions.php';
?>

<?php

	function registerUser($userType, $name, $email, $phone, $password)
	{
		if($userType==3)
		{
			$return_val1 = tutorEmailExists($email);
			$return_val2 = tutorPhoneExists($phone);
			
			if($return_val1 == 1)
			{
				return "Tutor email already exists";
			}
						
			if($return_val2 == 1)
			{
				return "Tutor mobile alerady exists";
			}
			
			if($return_val1 == 0 and $return_val2 == 0)
			{	
				$return_val = createTutor($name, $email, $phone, $password);
				if($return_val == 1)
				{	
					return "Tutor registered successfully";
				}
				else
				{
					return "Tutor registration failed";
				}					
			}
		}
		else if($userType==4)
		{
			$return_val1 = studentEmailExists($email);
			$return_val2 = studentPhoneExists($phone);
						
			if($return_val1 == 1)
			{
				return "Student email already exists";
			}
						
			if($return_val2 == 1)
			{
				return "Student mobile already exists";
			}
			
			if($return_val1 == 0 and $return_val2 == 0)
			{	
				$return_val = createStudent($name, $email, $phone, $password);
				if($return_val == 1)
				{
					return "Student registered successfully";
				}
				else
				{
					return "Student registration failed";
				}					
			}
		
		}
		
	}

	function tutorLoginExists($userType, $loginName, $password)
	{
		$return_val = tutorExists($userType, $loginName, $password);
		return $return_val;
	}
	
	function studentLoginExists($userType, $loginName, $password)
	{
		$return_val = studentExists($userType, $loginName, $password);
		return $return_val;
	}
	
	function get_tutor_info($login_name, $login_type)
	{
		$return_val = getTutorInfo($login_name, $login_type);
		return $return_val;
	}
	
	function get_countries()
	{
		$return_val = getCountries();
		return $return_val;
	}
	
	function get_states_country_id($country_id)
	{
		$return_val = getStatesByCountryID($country_id);
		return $return_val;
	}
	
	function get_cities_by_state_id($state_id)
	{
		$return_val = getCitiesByStateID($state_id);
		return $return_val;
	}
	
	function get_qualifications()
	{
		$return_val = getQualifications();
		return $return_val;
	}
	
	function get_boards()
	{
		$return_val = getBoards();
		return $return_val;
	}
	
	function get_classes()
	{
		$return_val = getClasses();
		return $return_val;
	}
	
	function get_subjects()
	{
		$return_val = getSubjects();
		return $return_val;
	}
	
	function get_teaching_modes()
	{
		$return_val = getTeachingModes();
		return $return_val;
	}
	
	function get_teaching_mediums()
	{
		$return_val = getTeachingMediums();
		return $return_val;
	}
	
	function get_job_types()
	{
		$return_val = getJobTypes();
		return $return_val;
	}
	
	function  update_tutor_personal_details($name, $email, $mobile,
				$address_line1, $address_line2, $city_id, $tutor_email, 
				$gender_id, $dob, $id_proof_type_id)
	{
		$return_val = updateTutorPersonalDetails($name, $email, $mobile,
				$address_line1, $address_line2, $city_id, $tutor_email, 
				$gender_id, $dob, $id_proof_type_id);
		return $return_val;
	}
	
	function update_tutor_profile_image($profile_image_filename, $tutor_email)
	{
		$return_val = updateTutorProfileImage($profile_image_filename, $tutor_email);
		return $return_val;
	}
	
	function update_tutor_address_proof_front_side($address_proof_front_filename, $tutor_email)
	{
		$return_val = updateTutorAddressProofFrontSide($address_proof_front_filename, $tutor_email);
		return $return_val;
	}
	
	function update_tutor_address_proof_back_side($address_proof_back_filename, $tutor_email)
	{
		$return_val = updateTutorAddressProofFrontSide($address_proof_back_filename, $tutor_email);
		return $return_val;
	}
	
	function update_tutor_qualification_job_type($qualification_id, $job_type_id, $job_timings,
			$tutor_email)
	{
		$return_val = updateTutorQualificationJobType($qualification_id, 
			$job_type_id, $job_timings, $tutor_email);
		return $return_val;
	}
	
	function get_tutor_qualification_job_type($tutor_email)
	{
		$return_val = getTutorQualificationJobType($tutor_email);
		return $return_val;
	}
	
	function get_selected_tutor_boards($tutor_email)
	{
		$return_val = getSelectedTutorBoards($tutor_email);
		return $return_val;
	}
	
	function update_tutor_boards($selectedBoards, $tutor_id)
	{
		$return_val = updateTutorBoards($selectedBoards, $tutor_id);
		return $return_val;	
	}
	
	function update_tutor_classes($selectedClasses, $tutor_id)
	{
		$return_val = updateTutorClasses($selectedClasses, $tutor_id);
		return $return_val;	
	}
	
	function get_selected_tutor_classes($tutor_email)
	{
		$return_val = getSelectedTutorClasses($tutor_email);
		return $return_val;
	}
	
	function update_tutor_subjects($selectedSubjects, $tutor_id)
	{
		$return_val = updateTutorSubjects($selectedSubjects, $tutor_id);
		return $return_val;	
	}
	
	function get_selected_tutor_subjects($tutor_email)
	{
		$return_val = getSelectedTutorSubjects($tutor_email);
		return $return_val;
	}	
	
	function update_tutor_teaching_modes($selectedTeachingModes, $tutor_id)
	{
		$return_val = updateTutorTeachingModes($selectedTeachingModes, $tutor_id);
		return $return_val;	
	}
	
	function get_selected_tutor_teaching_modes($tutor_email)
	{
		$return_val = getSelectedTutorTeachingModes($tutor_email);
		return $return_val;
	}	
	
	function update_tutor_teaching_mediums($selectedTeachingMediums, $tutor_id)
	{
		$return_val = updateTutorTeachingMediums($selectedTeachingMediums, $tutor_id);
		return $return_val;			
	}
	
	function get_selected_tutor_teaching_mediums($tutor_email)
	{
		$return_val = getSelectedTutorTeachingMediums($tutor_email);
		return $return_val;
	}	
	
	function get_genders()
	{
		$return_val = getGenders();
		return $return_val;
	}
	
	function get_id_proof_types()
	{
		$return_val = getIDProofTypes();
		return $return_val;
	}
	
	function get_experiences()
	{
		$return_val = getExperiences();
		return $return_val;
	}
	
	function update_tutor_experience_details($experience_id, $company_name, 
			$designation, $current_salary, $tutor_email)
	{
		$return_val = updateTutorExperienceDetails($experience_id, $company_name, 
						$designation, $current_salary, $tutor_email);
		return $return_val;
	}
	
	function get_experience_details($tutor_email)
	{
		$return_val = getExperienceDetails($tutor_email);
		return $return_val;
	}
	
	function get_languages()
	{
		$return_val = getLanguages();
		return $return_val;
	}
	
	function update_tutor_languages_known($selectedLanguages, $tutor_id)
	{
		$return_val = updateTutorLanguagesKnown($selectedLanguages, $tutor_id);
		return $return_val;
	}
	
	function get_selected_tutor_known_languages($tutor_email)
	{
		$return_val = getSelectedTutorKnownLanguages($tutor_email);
		return $return_val;
	}
	
	function update_tutor_questions_details($question_1_answer, $question_2_answer, 
			$question_3_answer, $tutor_email)
	{
		$return_val = updateTutorQuestionsDetails($question_1_answer, $question_2_answer, 
				$question_3_answer, $tutor_email);
		return $return_val;
	}
	
	function get_tutor_questions_details($tutor_email)
	{
		$return_val = getTutorQuestionsDetails($tutor_email);
		return $return_val;
	}
	
	function get_tutor_locations($tutor_email)
	{
		$return_val = getTutorLocations($tutor_email);
		return $return_val;
	}
	
	function get_tutor_state_by_city_id($tutor_email)
	{
		$return_val = getTutorStateByCityID($tutor_email);
		return $return_val;
	}
	
	function get_tutor_country_by_state_id($tutor_email)
	{
		$return_val = getTutorCountryByStateID($tutor_email);
		return $return_val;
	}
	
	function insert_tutors_to_db($params)
	{
		$return_val = insertTutorsToDB($params);
		return $return_val;
	}
	
	function is_authenticated()
	{
		if(isset($_COOKIE['svjk_session_id'])
			and isset($_COOKIE['svjk_email'])
			and isset($_COOKIE['svjk_phone'])) 
		{
			return 1;
		}
		return 0;
	}
	
	function get_cookie_value($cookie_name)
	{
		if(isset($_COOKIE[$cookie_name])) 
		{	
			return $_COOKIE[$cookie_name];
		}
		return 0;
	}
	
	function clear_all_cookies()
	{
		if (isset($_SERVER['HTTP_COOKIE'])) 
		{
			$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
			
			foreach($cookies as $cookie) 
			{
				$parts = explode('=', $cookie);
				$name = trim($parts[0]);
				setcookie($name, '', time()-1000);
				setcookie($name, '', time()-1000, '/');
			}
		}	
	}
	
?>