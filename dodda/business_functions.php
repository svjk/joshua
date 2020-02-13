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
	
	function isAuthenticated($cookeName)
	{
		if(isset($_COOKIE[$cookeName])) 
		{
			if($_COOKIE[$cookeName] == 1)
			{
				return 1;								
			}
			else
			{
				return 0;
			}
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