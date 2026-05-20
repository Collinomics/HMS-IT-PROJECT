<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('config.php');

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Get data from form with proper checks
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $specialization = isset($_POST['specialization']) ? $_POST['specialization'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $department_id = isset($_POST['department_id']) ? $_POST['department_id'] : '';
    $license_number = isset($_POST['license_number']) ? $_POST['license_number'] : '';
    $hire_date = isset($_POST['hire_date']) ? $_POST['hire_date'] : '';
    
    // Validate required fields
    if (empty($first_name) || empty($last_name) || empty($department_id)) {
        die("Error: First Name, Last Name, and Department are required.");
    }
    
    // First, check if the department exists
    $check_dept = "SELECT department_id FROM Department WHERE department_id = '$department_id'";
    $dept_result = mysql_query($check_dept);
    
    if (mysql_num_rows($dept_result) == 0) {
        die("Error: Department ID '$department_id' does not exist. Please add the department first.");
    }
    
    // Insert into Doctor table
    $query = "INSERT INTO Doctor (
        first_name, 
        last_name, 
        specialization, 
        phone, 
        email, 
        department_id, 
        license_number, 
        hire_date
    ) VALUES (
        '$first_name',
        '$last_name',
        '$specialization',
        '$phone',
        '$email',
        '$department_id',
        '$license_number',
        '$hire_date'
    )";
    
    if (mysql_query($query)) {
        header("Location: doctors.php?msg=added");
        exit();
    } else {
        echo "Error: " . mysql_error();
    }
} else {
    echo "Invalid request method.";
}

mysql_close();
?>