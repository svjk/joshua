<?php

$servername="sg2plcpnl0055";
$username="svjnanakendra";
$password="Svjk@123";

$db="nearsvjk";

$conn=new mysqli($servername,$username,$password,$db);

if($conn->connect_error){
	die("connection failed".$conn->connect_error);
	//echo "hello";
}

?>