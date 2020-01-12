 <?php
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