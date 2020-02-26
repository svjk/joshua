<?php

	function get_post($conn, $var)
	{
		return $conn->real_escape_string($_POST[$var]);
	}
	
	function tutorEmailExists($email)
	{	
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
	
		$query = "SELECT EXISTS(SELECT * FROM tutors WHERE tutor_email='$email') AS Return_Val";	
				
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		$rows = $result->num_rows;				 
		
		$res = array();
		for($i=0; $i<$rows; ++$i)
		{
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			$res[] = array("Return_Val"=>$row['Return_Val']);
		}
		$result->close();
		$conn->close();
		
		if(count($res)>0)
		{
			return $res[0]["Return_Val"];
		}
		return 0;
	}
	
	function tutorPhoneExists($phone)
	{	
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
	
		$query = "SELECT EXISTS(SELECT * FROM tutors WHERE tutor_phone='$phone') 
			AS Return_Val";
			
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		$rows = $result->num_rows;				 
		
		$res = array();
		for($i=0; $i<$rows; ++$i)
		{
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			$res[] = array("Return_Val"=>$row['Return_Val']);
		}
		$result->close();
		$conn->close();
		
		if(count($res)>0)
		{
			return $res[0]["Return_Val"];
		}
		return 0;
	}
	
	function studentEmailExists($email)
	{		
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "SELECT EXISTS(SELECT * FROM student WHERE email='$email')
				AS Return_Val";
			
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		$rows = $result->num_rows;				 
		
		$res = array();
		for($i=0; $i<$rows; ++$i)
		{
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			$res[] = array("Return_Val"=>$row['Return_Val']);
		}
		$result->close();
		$conn->close();
		
		if(count($res)>0)
		{
			return $res[0]["Return_Val"];
		}
		return 0;
	}
	
	function studentPhoneExists($phone)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "SELECT EXISTS(SELECT * FROM student WHERE studentmobilenumber='$phone')
				AS Return_Val";
			
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		$rows = $result->num_rows;				 
		
		$res = array();
		for($i=0; $i<$rows; ++$i)
		{
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			$res[] = array("Return_Val"=>$row['Return_Val']);
		}
		$result->close();
		$conn->close();
		
		if(count($res)>0)
		{
			return $res[0]["Return_Val"];
		}
		return 0;
	}
	
	function createTutor($name, $email, $phone, $pwd)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "INSERT INTO tutors(tutor_name, tutor_email, tutor_phone, pwd) 
				VALUES('$name', '$email', '$phone', '$pwd')";	
		
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		return $result;
	}
	
	function createStudent($name, $email, $phone, $pwd)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "INSERT INTO Student(name, email, studentmobilenumber, pwd) 
					VALUES('$name', '$email', '$phone', '$pwd')";	

		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		return $result;
	}
	
	function tutorExists($userType, $loginName, $password)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		if(is_numeric($loginName))
		{
			$loginType = "mobile";			
		}
		else
		{
			$loginType = "email";
		}
				
		if($loginType == "email")
		{
			$query = "SELECT EXISTS(SELECT * FROM tutors WHERE tutor_email='$loginName' 
				and pwd='$password') AS Return_Val";
		}
		else if($loginType == "mobile")
		{
			$query = "SELECT EXISTS(SELECT * FROM tutors WHERE tutor_phone='$loginName' 
				and pwd='$password') AS Return_Val";
		}
				
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		$rows = $result->num_rows;				 
		
		$res = array();
		for($i=0; $i<$rows; ++$i)
		{
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			$res[] = array("Return_Val"=>$row['Return_Val']);
		}
		$result->close();
		$conn->close();
		
		if(count($res)>0)
		{
			$_SESSION["user_type"] = "tutor";
			$_SESSION["login_name"] = $loginName;
			$_SESSION["login_type"] = $loginType;
			
			return $res[0]["Return_Val"];
		}
		return 0;
	}

	function studentExists($userType, $loginName, $password)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		if(is_numeric($loginName))
		{
			$loginType = "mobile";
		}
		else
		{
			$loginType = "email";
		}
				
		if($loginType == "email")
		{
			$query = "SELECT EXISTS(SELECT * FROM student WHERE email='$loginName' 
				and pwd='$password') AS Return_Val";
		}
		else if($loginType == "mobile")
		{
			$query = "SELECT EXISTS(SELECT * FROM student WHERE studentmobilenumber='$loginName' 
				and pwd='$password') AS Return_Val";
		}
				
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		$rows = $result->num_rows;				 
		
		$res = array();
		for($i=0; $i<$rows; ++$i)
		{
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			$res[] = array("Return_Val"=>$row['Return_Val']);
		}
		$result->close();
		$conn->close();
		
		if(count($res)>0)
		{
			$_SESSION["user_type"] = "student";
			$_SESSION["login_name"] = $loginName;
			$_SESSION["login_type"] = $loginType;
			
			return $res[0]["Return_Val"];
		}
		return 0;
	}

	function getTutorInfo($login_name, $login_type)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);		
						
		if($login_type == "email")
		{	
			$query = "SELECT T.*, CS.id AS country_id, S.id AS state_id, 
					C.id AS city_id FROM tutors T 
				 LEFT JOIN Cities C ON C.id=T.city_id
				 LEFT JOIN States S ON S.id=C.state_id
				 LEFT JOIN Countries CS ON CS.id=S.country_id
				 WHERE tutor_email = '$login_name'";
		}
		else if($login_type == "phone")
		{	
			$query = "SELECT T.*, CS.id AS country_id, S.id AS state_id, 
					C.id AS city_id FROM tutors T 
				LEFT JOIN Cities C ON C.id=T.city_id
				LEFT JOIN States S ON S.id=C.state_id
			    LEFT JOIN Countries CS ON CS.id=S.country_id
				WHERE tutor_phone = '$login_name'";
		}
								
		$result = $conn->query($query);
		if (!$result) die($conn->error);
				
		$rows = $result->num_rows;				 
				
		$res = array();
		for($i=0; $i<$rows; ++$i)
		{
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
					
			$res[] = array("tutor_id"=>$row['tutor_id'], 
					"tutor_email"=>trim($row['tutor_email']),
					"tutor_phone"=>trim($row['tutor_phone']),
					"tutor_name"=>trim($row['tutor_name']),
					"gender_id"=>trim($row['gender_id']),
					"id_proof_type_id"=>trim($row['id_proof_type_id']),
					"address_line1"=>trim($row['address_line1']),
					"address_line2"=>trim($row['address_line2']),
					"address_line2"=>trim($row['address_line2']),
					"country_id"=>$row['country_id'],
					"state_id"=>$row['state_id'],
					"city_id"=>$row['city_id'],
					"gender_id"=>$row['gender_id'],
					"dob"=>$row['tutor_dob'],
					"id_proof_type_id"=>$row['id_proof_type_id'],
					"experience_id"=>$row['experience_id'],
					"institution_name"=>$row['institution_name'],
					"tutor_designation"=>$row['tutor_designation'],
					"tutor_salary"=>$row['tutor_salary'],
					"tutor_profile_image"=>$row['tutor_profile_image'],
					"address_proof_front"=>$row['address_proof_front'],
					"address_proof_back"=>$row['address_proof_back']
					);
		}
		$result->close();
		$conn->close();				
				
		return $res;
	}	
	
	function getCountries()
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "SELECT * FROM countries ORDER BY country_name ASC";
				
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		$rows = $result->num_rows;				 
		
		$res = array();
		for($i=0; $i<$rows; ++$i)
		{
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			$res[] = array("id"=>$row['id'],
						 "country_name"=>$row['country_name']);
		}
		$result->close();
		$conn->close();
		
		return $res;
	}
	
	function getStatesByCountryID($country_id)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "SELECT S.id AS state_id, S.state_name FROM States S 
					INNER JOIN Countries C ON C.id = S.country_id
					WHERE C.id = '$country_id'
					ORDER BY S.state_name ASC";
				
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		$rows = $result->num_rows;				 
		
		$res = array();
		for($i=0; $i<$rows; ++$i)
		{
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			$res[] = array("id"=>$row['state_id'],
						 "state_name"=>$row['state_name']);
		}
		$result->close();
		$conn->close();
		
		return $res;
	}
	
	function getCitiesByStateID($state_id)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "SELECT C.id AS city_id, C.city_name FROM cities C 
					INNER JOIN states S ON S.id = C.state_id
					WHERE S.id = '$state_id'
					ORDER BY C.city_name ASC";
				
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		$rows = $result->num_rows;				 
		
		$res = array();
		for($i=0; $i<$rows; ++$i)
		{
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			$res[] = array("id"=>$row['city_id'],
						 "city_name"=>$row['city_name']);
		}
		$result->close();
		$conn->close();
		
		return $res;
	}
	
	function getQualifications()
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "SELECT * FROM qualifications ORDER BY qualification_id";
				
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		$rows = $result->num_rows;				 
		
		$res = array();
		for($i=0; $i<$rows; ++$i)
		{
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			$res[] = array("id"=>$row['qualification_id'],
						 "qualification_name"=>$row['qualification_name']);
		}
		$result->close();
		$conn->close();
		
		return $res;
	}
	
	function getBoards()
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "SELECT * FROM boards ORDER BY id";
				
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		$rows = $result->num_rows;				 
		
		$res = array();
		for($i=0; $i<$rows; ++$i)
		{
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			$res[] = array("id"=>$row['id'],
				"board_name"=>$row['board_name']);
		}
		$result->close();
		$conn->close();
		
		return $res;
	}
	
	function getClasses()
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "SELECT * FROM classes ORDER BY id";
				
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		$rows = $result->num_rows;				 
		
		$res = array();
		for($i=0; $i<$rows; ++$i)
		{
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			$res[] = array("id"=>$row['id'],
				"class_name"=>$row['class_name']);
		}
		$result->close();
		$conn->close();
		
		return $res;
	}
	
	function getSubjects()
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "SELECT * FROM subjects";
				
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		$rows = $result->num_rows;				 
		
		$res = array();
		for($i=0; $i<$rows; ++$i)
		{
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			$res[] = array("id"=>$row['id'],
				"subject"=>$row['subject']);
		}
		$result->close();
		$conn->close();
		
		return $res;
	}
	
	function getTeachingModes()
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "SELECT * FROM teaching_modes";
				
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		$rows = $result->num_rows;				 
		
		$res = array();
		for($i=0; $i<$rows; ++$i)
		{
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			$res[] = array("id"=>$row['id'],
				"teaching_mode_name"=>$row['teaching_mode_name']);
		}
		$result->close();
		$conn->close();
		
		return $res;
	}
	
	function getTeachingMediums()
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "SELECT * FROM teaching_mediums";
				
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		$rows = $result->num_rows;				 
		
		$res = array();
		for($i=0; $i<$rows; ++$i)
		{
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			$res[] = array("id"=>$row['id'],
				"teaching_medium_name"=>$row['teaching_medium_name']);
		}
		$result->close();
		$conn->close();
		
		return $res;
	}
	
	function getJobTypes()
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "SELECT * FROM job_types";
				
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		$rows = $result->num_rows;				 
		
		$res = array();
		for($i=0; $i<$rows; ++$i)
		{
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			$res[] = array("id"=>$row['job_type_id'],
				"job_type_name"=>$row['job_type_name']);
		}
		$result->close();
		$conn->close();
		
		return $res;
	}
	
	
	function updateTutorPersonalDetails($name, $email, $mobile,
				$address_line1, $address_line2, $city_id, $tutor_email, 
				$gender_id, $dob, $id_proof_type_id)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "UPDATE tutors SET tutor_name='$name', tutor_email='$email',
					tutor_phone='$mobile', address_line1='$address_line1',
					 address_line2='$address_line2', city_id='$city_id',
					 gender_id='$gender_id', tutor_dob='$dob',					 
					 id_proof_type_id='$id_proof_type_id'					 
					 WHERE tutor_email='$tutor_email'";
		
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		return "Tutor profile updated successfully";		
	}
	
	function updateTutorProfileImage($profile_image_filename, $tutor_email)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "UPDATE tutors SET tutor_profile_image='$profile_image_filename'					 
					 WHERE tutor_email='$tutor_email'";
		
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		return "Tutor profile updated successfully";		
	}
	
	function updateTutorAddressProofFrontSide($address_proof_front_filename, $tutor_email)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "UPDATE tutors SET address_proof_front='$address_proof_front_filename'					 
					 WHERE tutor_email='$tutor_email'";
		
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		return "Tutor profile updated successfully";		
	}
	
	function updateTutorAddressProofBackSide($address_proof_back_filename, $tutor_email)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "UPDATE tutors SET address_proof_back='$address_proof_back_filename'					 
					 WHERE tutor_email='$tutor_email'";
		
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		return "Tutor profile updated successfully";		
	}
	
	function updateTutorQualificationJobType($qualification_id, 
			$job_type_id, $job_timings, $tutor_email)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "UPDATE tutors SET qualification_id='$qualification_id',
					job_timings='$job_timings',	job_type_id='$job_type_id' 
						WHERE tutor_email='$tutor_email'";
		
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		return "Tutor profile updated successfully";		
	}
	
	function getTutorQualificationJobType($tutor_email)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "SELECT qualification_id, job_type_id, job_timings 
					FROM tutors WHERE tutor_email='$tutor_email'";
					
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		$rows = $result->num_rows;				 
		
		$res = array();
		for($i=0; $i<$rows; ++$i)
		{
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			$res[] = array("qualification_id"=>$row['qualification_id'],
				"job_type_id"=>$row['job_type_id'],
				"job_timings"=>$row['job_timings']);
		}
		$result->close();
		$conn->close();
		
		return $res;		
	}
	
	
	function getSelectedTutorBoards($tutor_email)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "SELECT TB.id, TB.board_id 
				FROM boards B LEFT JOIN tutor_boards TB 
				ON TB.board_id=B.id INNER JOIN tutors T 				
				ON T.tutor_email='$tutor_email'";
					
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		$rows = $result->num_rows;				 
		
		$res = array();
		for($i=0; $i<$rows; ++$i)
		{
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			$res[] = array("id"=>$row['id'],
						"board_id"=>$row['board_id']);
		}
		$result->close();
		$conn->close();
		
		return $res;		
	}
	
	function updateTutorBoards($selectedBoards, $tutor_id)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "DELETE FROM tutor_boards WHERE tutor_id='$tutor_id'";
		
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		foreach($selectedBoards as $selected_boards)
		{
			$query = "INSERT INTO tutor_boards(tutor_id, board_id)
					 VALUES('$tutor_id', '$selected_boards')";
					 
			$result = $conn->query($query);
			if (!$result) die($conn->error);
		}
		
		return "Tutor boards updated successfully";				
	}
	
	function updateTutorClasses($selectedClasses, $tutor_id)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "DELETE FROM tutor_classes WHERE tutor_id='$tutor_id'";
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		foreach($selectedClasses as $selected_classes)
		{
			$query = "INSERT INTO tutor_classes(tutor_id, class_id)
					 VALUES('$tutor_id', '$selected_classes')";
					 
			$result = $conn->query($query);
			if (!$result) die($conn->error);
		}
		
		return "Tutor classes updated successfully";				
	}
	
	function getSelectedTutorClasses($tutor_email)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "SELECT TC.id, TC.class_id FROM classes C 
					LEFT JOIN tutor_classes TC ON TC.class_id=C.id 
					INNER JOIN tutors T ON T.tutor_email='$tutor_email'";
					
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		$rows = $result->num_rows;				 
		
		$res = array();
		for($i=0; $i<$rows; ++$i)
		{
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			$res[] = array("id"=>$row['id'],
						"class_id"=>$row['class_id']);
		}
		$result->close();
		$conn->close();
		
		return $res;		
	}
	
	function updateTutorSubjects($selectedSubjects, $tutor_id)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "DELETE FROM tutor_subjects WHERE tutor_id='$tutor_id'";
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		foreach($selectedSubjects as $selected_subjects)
		{
			$query = "INSERT INTO tutor_subjects(tutor_id, subject_id)
					 VALUES('$tutor_id', '$selected_subjects')";
					 
			$result = $conn->query($query);
			if (!$result) die($conn->error);
		}
		
		return "Tutor subjects updated successfully";				
	}
	
	function getSelectedTutorSubjects($tutor_email)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "SELECT TS.id, TS.subject_id FROM subjects S 
					LEFT JOIN tutor_subjects TS ON TS.subject_id=S.id 
					INNER JOIN tutors T ON T.tutor_email='$tutor_email'";
					
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		$rows = $result->num_rows;				 
		
		$res = array();
		for($i=0; $i<$rows; ++$i)
		{
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			$res[] = array("id"=>$row['id'],
						"subject_id"=>$row['subject_id']);
		}
		$result->close();
		$conn->close();
		
		return $res;		
	}
	
	function updateTutorTeachingModes($selectedTeachingModes, $tutor_id)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "DELETE FROM tutor_teaching_modes WHERE tutor_id='$tutor_id'";
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		foreach($selectedTeachingModes as $selected_teaching_mode)
		{
			$query = "INSERT INTO tutor_teaching_modes(tutor_id, teaching_mode_id)
					 VALUES('$tutor_id', '$selected_teaching_mode')";
			
			$result = $conn->query($query);
			if (!$result) die($conn->error);
		}
		
		return "Tutor teaching modes updated successfully";				
	}
	
	function getSelectedTutorTeachingModes($tutor_email)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "SELECT TTM.id, TTM.teaching_mode_id 
					FROM teaching_modes TM 
					LEFT JOIN tutor_teaching_modes TTM ON TTM.teaching_mode_id=TM.id 
					INNER JOIN tutors T ON T.tutor_email='$tutor_email'";
					
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		$rows = $result->num_rows;				 
		
		$res = array();
		for($i=0; $i<$rows; ++$i)
		{
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			$res[] = array("id"=>$row['id'],
						"teaching_mode_id"=>$row['teaching_mode_id']);
		}
		$result->close();
		$conn->close();
		
		return $res;	
		
	}
	
	function updateTutorTeachingMediums($selectedTeachingMediums, $tutor_id)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "DELETE FROM tutor_teaching_mediums WHERE tutor_id='$tutor_id'";
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		foreach($selectedTeachingMediums as $selected_teaching_medium)
		{
			$query = "INSERT INTO tutor_teaching_mediums(tutor_id, teaching_medium_id)
					 VALUES('$tutor_id', '$selected_teaching_medium')";
			
			$result = $conn->query($query);
			if (!$result) die($conn->error);
		}
		
		return "Tutor teaching mediums updated successfully";		
	}
	
	function getSelectedTutorTeachingMediums($tutor_email)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "SELECT TTM.id, TTM.teaching_medium_id 
					FROM teaching_mediums TM 
					LEFT JOIN tutor_teaching_mediums TTM ON TTM.teaching_medium_id=TM.id 
					INNER JOIN tutors T ON T.tutor_email='$tutor_email'";
					
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		$rows = $result->num_rows;				 
		
		$res = array();
		for($i=0; $i<$rows; ++$i)
		{
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			$res[] = array("id"=>$row['id'],
						"teaching_medium_id"=>$row['teaching_medium_id']);
		}
		$result->close();
		$conn->close();
		
		return $res;	
		
	}
	
	function getGenders()
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "SELECT * FROM genders ORDER BY gender_id ASC";
				
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		$rows = $result->num_rows;				 
		
		$res = array();
		for($i=0; $i<$rows; ++$i)
		{
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			$res[] = array("id"=>$row['gender_id'],
						 "gender_name"=>$row['gender_name']);
		}
		$result->close();
		$conn->close();
		
		return $res;
	}
	
	function getIDProofTypes()
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "SELECT * FROM id_proof_types ORDER BY id_proof_type_name ASC";
				
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		$rows = $result->num_rows;				 
		
		$res = array();
		for($i=0; $i<$rows; ++$i)
		{
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			$res[] = array("id"=>$row['id'],
						 "id_proof_type_name"=>$row['id_proof_type_name']);
		}
		$result->close();
		$conn->close();
		
		return $res;
	}
	
	function getExperiences()
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "SELECT * FROM experience";
				
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		$rows = $result->num_rows;				 
		
		$res = array();
		for($i=0; $i<$rows; ++$i)
		{
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			$res[] = array("id"=>$row['experience_id'],
						 "experience_name"=>$row['experience_name']);
		}
		$result->close();
		$conn->close();
		
		return $res;
	}
	
	function updateTutorExperienceDetails($experience_id, $company_name, 
			$designation, $current_salary, $tutor_email)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "UPDATE tutors SET experience_id='$experience_id',
					institution_name='$company_name', tutor_designation='$designation',
					 tutor_salary='$current_salary'
						WHERE tutor_email='$tutor_email'";
		
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		return "Tutor experience updated successfully";		
	}
	
	function getExperienceDetails($tutor_email)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "SELECT T.experience_id, T.institution_name,
					T.tutor_designation, T.tutor_salary
					FROM tutors T
					INNER JOIN experience E ON E.experience_id=T.experience_id
					WHERE T.tutor_email='$tutor_email'";
				
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		$rows = $result->num_rows;				 
		
		$res = array();
		for($i=0; $i<$rows; ++$i)
		{
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			$res[] = array("experience_id"=>$row['experience_id'],
						 "institution_name"=>$row['institution_name'],
						 "tutor_designation"=>$row['tutor_designation'],
						 "tutor_salary"=>$row['tutor_salary']
						 );
		}
		$result->close();
		$conn->close();
		
		return $res;
	}
	
	function getLanguages()
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "SELECT * FROM languages ORDER BY languages_id ASC";
				
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		$rows = $result->num_rows;				 
		
		$res = array();
		for($i=0; $i<$rows; ++$i)
		{
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			$res[] = array("id"=>$row['languages_id'],
						 "language_name"=>$row['languages_name']);
		}
		$result->close();
		$conn->close();
		
		return $res;
	}
	
	function updateTutorLanguagesKnown($selectedLanguages, $tutor_id)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "DELETE FROM tutor_languages_known WHERE tutor_id='$tutor_id'";
		
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		foreach($selectedLanguages as $selected_language)
		{
			$query = "INSERT INTO tutor_languages_known(tutor_id, language_id)
					 VALUES('$tutor_id', '$selected_language')";
					 
			$result = $conn->query($query);
			if (!$result) die($conn->error);
		}
		
		return "Tutor languages known updated successfully!";				
	}
	
	function getSelectedTutorKnownLanguages($tutor_email)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "SELECT TLK.id, TLK.language_id FROM languages L
				LEFT JOIN tutor_languages_known TLK ON L.languages_id=TLK.language_id 
				INNER JOIN tutors T ON T.tutor_email='$tutor_email'";
					
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		$rows = $result->num_rows;				 
		
		$res = array();
		for($i=0; $i<$rows; ++$i)
		{
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			$res[] = array("id"=>$row['id'],
						"language_id"=>$row['language_id']);
		}
		$result->close();
		$conn->close();
		
		return $res;		
	}
	
	function updateTutorQuestionsDetails($question_1_answer, $question_2_answer, 
			$question_3_answer, $tutor_email)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "UPDATE tutors SET question1_answer='$question_1_answer', 
					question2_answer='$question_2_answer',
					question3_answer='$question_3_answer'
					WHERE tutor_email='$tutor_email'";
		
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		return "Tutor questions updated successfully";		
	}
	
	function getTutorQuestionsDetails($tutor_email)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "SELECT T.question1_answer, T.question2_answer, T.question3_answer
				  FROM tutors T
				  WHERE tutor_email='$tutor_email'";
		
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		$rows = $result->num_rows;				 
		
		$res = array();
		for($i=0; $i<$rows; ++$i)
		{
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			$res[] = array("question_1_answer"=>$row['question1_answer'],
						"question_2_answer"=>$row['question2_answer'],
						"question_3_answer"=>$row['question3_answer']);
		}
		$result->close();
		$conn->close();
		
		return $res;			
	}
	
	function insertTutorsToDB($params)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$records_insert_count = 0;
		$records_skip_count = 0;
		
		for($i=0; $i<count($params); $i++)
		{
			$tutor_name = trim($params[$i][1]);
			$tutor_phone = trim($params[$i][2]);
			$tutor_email = trim($params[$i][3]);
			$tutor_gender_id = trim($params[$i][4]);
			$tutor_dob = trim($params[$i][5]);
			$address_line1 = trim($params[$i][6]);
			$address_line2 = trim($params[$i][7]);
			$tutor_city_id = trim($params[$i][8]);
			$tutor_institution_name = trim($params[$i][9]);
			$tutor_designation = trim($params[$i][10]);
			$tutor_salary = trim($params[$i][11]);
			$tutor_job_timings = trim($params[$i][12]);
			
			if($tutor_email == "")
			{
				$tutor_email = uniqid() . '@svjnanakendra.com';
			}
			
			if($tutor_phone == "")
			{
				$tutor_phone = microtime(true);
				$tutor_phone = str_replace(".", "", $tutor_phone);	
				$tutor_phone = substr($tutor_phone, 4);
			}
			
			if(myTutorExists($tutor_email, $tutor_phone)==false)
			{
				$query = "INSERT INTO tutors(tutor_name, tutor_phone, tutor_email, gender_id, tutor_dob,
						address_line1, address_line2, city_id, institution_name, tutor_designation,
						tutor_salary, job_timings)
						VALUES('$tutor_name', '$tutor_phone', '$tutor_email', '$tutor_gender_id', 
						'$tutor_dob', '$address_line1', '$address_line2', '$tutor_city_id', 
						'$tutor_institution_name', '$tutor_designation', '$tutor_salary', 
						'$tutor_job_timings');";
				
				$result = $conn->query($query);		
				if (!$result) die($conn->error);
				
				$records_insert_count = $records_insert_count + 1;
			}
			else
			{
				$records_skip_count = $records_skip_count + 1;
			}
		}
		
		$records_count=array();
		$records_count[] = array("records_insert_count"=>$records_insert_count,
								"records_skip_count"=>$records_skip_count);
		
		return $records_count;
	}
	
	function myTutorExists($email, $phone)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "SELECT EXISTS(SELECT 1 FROM tutors WHERE tutor_email='$email' 
					OR tutor_phone='$phone') AS Return_Val";
				
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		$rows = $result->num_rows;				 
		
		$res = array();
		for($i=0; $i<$rows; ++$i)
		{
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			$res[] = array("Return_Val"=>$row['Return_Val']);
		}
		$result->close();
		$conn->close();
		
		if(count($res)>0)
		{
			
			return $res[0]["Return_Val"];
		}
		return 0;
	}

?>