<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('config.php');

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$blood_type = $_POST['blood_type'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$emergency_contact = $_POST['emergency_contact'];
$registration_date = date('Y-m-d');

$query = "INSERT INTO Patient (
    first_name, last_name, date_of_birth, gender, blood_type, 
    phone, address, emergency_contact_name, registration_date
) VALUES (
    '$first_name', '$last_name', '$dob', '$gender', '$blood_type',
    '$phone', '$address', '$emergency_contact', '$registration_date'
)";

if (mysqli_query($con, $query)) {
    header("Location: patient.php?msg=added");
    exit();
} else {
    echo "Error: " . mysql_error();
}

mysql_close();
?>