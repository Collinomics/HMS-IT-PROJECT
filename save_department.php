<?php
include('config.php');

$department_name = $_POST['department_name'];
$location = $_POST['location'];

$query = "INSERT INTO Department (department_name, location) VALUES ('$department_name', '$location')";

if (mysql_query($query)) {
    header("Location: departments.php?msg=added");
} else {
    echo "Error: " . mysql_error();
}

mysql_close();
?>