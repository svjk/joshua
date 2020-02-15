<?php
	if (session_status() == PHP_SESSION_NONE) 
	{
		session_start();
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

	function getTutorInfo()
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		if(isset($_SESSION["user_type"]))
		{
			if($_SESSION["user_type"] == "tutor")
			{
				$loginName = $_SESSION["login_name"];				
				if($_SESSION["login_type"] == "email")
				{	
					$query = "SELECT T.*, CS.id AS country_id, S.id AS state_id, 
							C.id AS city_id FROM tutors T 
						 LEFT JOIN Cities C ON C.id=T.city_id
						 LEFT JOIN States S ON S.id=C.state_id
						 LEFT JOIN Countries CS ON CS.id=S.country_id
						 WHERE tutor_email = '$loginName'";
				}
				else if($_SESSION["login_type"] == "mobile")
				{	
					$query = "SELECT T.*, CS.id AS country_id, S.id AS state_id, 
							C.id AS city_id FROM tutors T 
						LEFT JOIN Cities C ON C.id=T.city_id
						 LEFT JOIN States S ON S.id=C.state_id
						 LEFT JOIN Countries CS ON CS.id=S.country_id
						 WHERE tutor_phone = '$loginName'";
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
							"address_line1"=>trim($row['address_line1']),
							"address_line2"=>trim($row['address_line2']),
							"address_line2"=>trim($row['address_line2']),
							"country_id"=>$row['country_id'],
							"state_id"=>$row['state_id'],
							"city_id"=>$row['city_id']
							);
				}
				$result->close();
				$conn->close();				
				
				return $res;
				
			}
		}			
		
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
		
		$query = "SELECT * FROM classnames ORDER BY id";
				
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
		
		$query = "SELECT * FROM teaching_mode";
				
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		$rows = $result->num_rows;				 
		
		$res = array();
		for($i=0; $i<$rows; ++$i)
		{
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			
			$res[] = array("id"=>$row['teaching_mode_id'],
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
			
			$res[] = array("id"=>$row['teaching_medium_id'],
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
	
	
	function updateTutorProfileStep1($name, $email, $mobile, $address_line1, 
				$address_line2, $city_id, $tutor_email)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "UPDATE tutors SET tutor_name='$name', tutor_email='$email',
					tutor_phone='$mobile', address_line1='$address_line1',
					 address_line2='$address_line2', city_id='$city_id'
					 WHERE tutor_email='$tutor_email'";
		
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		return "Tutor profile updated successfully";		
	}
	
	function updateTutorQualificationJobType($qualification_id, 
			$job_type_id, $tutor_email)
	{
		$hn = 'localhost';
		$db = 'svjk';
		$un = 'root';
		$pw = '';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$query = "UPDATE tutors SET qualification_id='$qualification_id', 
					job_type_id='$job_type_id' WHERE tutor_email='$tutor_email'";
		
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		
		return "Tutor profile updated successfully";		
	}
	
	
	
	
	
	function get_post($conn, $var)
	{
		return $conn->real_escape_string($_POST[$var]);
	}
?>