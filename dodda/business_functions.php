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
				$gender_id, $dob, $id_proof_type_id, $id_proof_front_filename, 
				$id_proof_back_filename)
	{
		$return_val = updateTutorPersonalDetails($name, $email, $mobile,
				$address_line1, $address_line2, $city_id, $tutor_email, 
				$gender_id, $dob, $id_proof_type_id, $id_proof_front_filename, $id_proof_back_filename);
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
	
	function set_session($session_id, $email, $phone)
	{
		$return_val = setSession($session_id, $email, $phone);
		return $return_val;
	}
	
	function remove_session($session_id)
	{
		$return_val = removeSession($session_id);
		return $return_val;
	}
	
	function get_session($session_id)
	{
		$return_val = getSession($session_id);
		return $return_val;
	}
	
	function isAuthenticated($cookeName)
	{
		if(isset($_COOKIE[$cookeName])) 
		{
			if($_COOKIE[$cookeName] == 1)
			{
				return 1;								
			}
			return 0;
		}
	}
	
	function get_cookie_value($cookie_name)
	{
		if(isset($_COOKIE[$cookie_name])) 
		{
			return $_COOKIE[$cookie_name];
		}
		return 0;
	}
	
	function isGoogleAuthenticated($cookeName)
	{
		if(isset($_COOKIE[$cookeName])) 
		{
			return 1;
		}
		return 0;
	}
	
	function array_element_exists($arr, $ele)
	{
		if (in_array($ele, $arr)) 
		{ 
		  return 1; 
		} 
		else
		{ 
		  return 0; 
		} 
	}
	
?>