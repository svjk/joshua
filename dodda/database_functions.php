<?php
	
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
			return $res[0]["Return_Val"];
		}
		return 0;
	}	
	
	function get_post($conn, $var)
	{
		return $conn->real_escape_string($_POST[$var]);
	}
?>