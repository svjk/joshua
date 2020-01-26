 <?php
 date_default_timezone_set("Asia/Kolkata");//India time (GMT+5:30)
 $now = date('Y-m-d H:i:s');
 if (!isset($_SESSION)) { session_start();}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "svjk";
$db_connect = mysqli_connect($servername, $username, $password, $dbname);


try {
    $connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?> 