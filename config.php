<?php
$username = "root";
$password = "";
$database = "hospital_db";

$con = mysqli_connect("localhost", $username, $password) or die("Unable to connect to MySQL");
mysqli_select_db($con, $database) or die("Unable to select database: " . $database);
?>