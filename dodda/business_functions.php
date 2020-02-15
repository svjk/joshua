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
	
	function get_tutor_info()
	{
		return(getTutorInfo());	
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
	
	function update_tutor_profile_step1($name, $email, $mobile, $address_line1, 
				$address_line2, $city_id, $tutor_email)
	{
		$return_val = updateTutorProfileStep1($name, $email, $mobile, $address_line1, 
				$address_line2, $city_id, $tutor_email);
		
		return $return_val;
	}
	
	function update_tutor_qualification_job_type($qualification_id, $job_type_id, $tutor_email)
	{
		$return_val = updateTutorQualificationJobType($qualification_id, 
			$job_type_id, $tutor_email);
		
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
	
	function isGoogleAuthenticated($cookeName)
	{
		if(isset($_COOKIE[$cookeName])) 
		{
			return 1;
		}
		return 0;
	}
	
?>