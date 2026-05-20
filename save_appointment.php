<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('config.php');

// Receive data from the form
$patient_id = $_POST['patient_id'];
$doctor_id = $_POST['doctor_id'];
$appointment_date = $_POST['appointment_date'];
$appointment_time = $_POST['appointment_time'];
$reason = $_POST['reason'];
$status = $_POST['status'];
$booked_date = date('Y-m-d H:i:s'); // Auto-set to current datetime

// Create the INSERT query
$query = "INSERT INTO Appointment (
    patient_id, 
    doctor_id, 
    appointment_date, 
    appointment_time, 
    reason, 
    status, 
    booked_date
) VALUES (
    '$patient_id',
    '$doctor_id',
    '$appointment_date',
    '$appointment_time',
    '$reason',
    '$status',
    '$booked_date'
)";

// Execute the query
if (mysqli_query($con, $query)) {
    echo "<script>alert('Appointment scheduled successfully!'); window.location='appointments.php';</script>";
} else {
    echo "<script>alert('Error: " . mysqli_error() . "'); window.location='appointments.php';</script>";
}

mysqli_close();
?>