<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('config.php');

// Receive Medical Record data
$patient_id = $_POST['patient_id'];
$doctor_id = $_POST['doctor_id'];
$visit_date = $_POST['visit_date'];
$symptoms = $_POST['symptoms'];
$treatment = $_POST['treatment'];
$notes = $_POST['notes'];
$follow_up_date = $_POST['follow_up_date'];

// Insert into MedicalRecord table
$query1 = "INSERT INTO MedicalRecord (
    patient_id, 
    doctor_id, 
    visit_date, 
    symptoms, 
    treatment, 
    notes, 
    follow_up_date
) VALUES (
    '$patient_id',
    '$doctor_id',
    '$visit_date',
    '$symptoms',
    '$treatment',
    '$notes',
    '$follow_up_date'
)";

if (mysqli_query($con, $query1)) {
    // Get the auto-generated record_id
    $record_id = mysqli_insert_id($con);
    
    // Receive Prescription data
    $medication_name = $_POST['medication_name'];
    $dosage = $_POST['dosage'];
    $quantity = $_POST['quantity'];
    $instructions = $_POST['instructions'];
    $prescribed_date = date('Y-m-d');
    $refills = $_POST['refills'];
    $prescription_status = $_POST['prescription_status'];
    
    // Insert into Prescription table
    $query2 = "INSERT INTO Prescription (
        record_id,
        patient_id,
        doctor_id,
        medication_name,
        dosage,
        quantity,
        instructions,
        prescribed_date,
        refills,
        status
    ) VALUES (
        '$record_id',
        '$patient_id',
        '$doctor_id',
        '$medication_name',
        '$dosage',
        '$quantity',
        '$instructions',
        '$prescribed_date',
        '$refills',
        '$prescription_status'
    )";
    
    if (mysqli_query($con, $query2)) {
        echo "<script>alert('Medical record and prescription saved successfully!'); window.location='records.php';</script>";
    } else {
        echo "<script>alert('Medical record saved but prescription error: " . mysqli_error() . "'); window.location='records.php';</script>";
    }
} else {
    echo "<script>alert('Error saving medical record: " . mysqli_error() . "'); window.location='records.php';</script>";
}

mysqli_close();
?>