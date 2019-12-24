<?php

//---------------Create user variable to connect into -------------------//
$host = 'localhost';
$user = 'svjk';
$pass = 'password';
$dbname = 'website';

//---------------Connect into the mysql database ------------------------//
$conn = mysqli_connect($host, $user, $pass, $dbname);
echo "connected";
if (!$conn) {
	die("Sorry you cannot connect here");
}
