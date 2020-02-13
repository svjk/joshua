<?php
session_start();
session_destroy();
unset($_SESSION['phoneNumber']);
header('location:index.php');
?>