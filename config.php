<?php
$username = "root";
$password = "";
$database = "hospital_db";

mysql_connect("localhost", $username, $password) or die("Unable to connect to MySQL");
mysql_select_db($database) or die("Unable to select database: " . $database);
?>