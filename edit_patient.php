<?php
include('config.php');

// Check if form was submitted (UPDATE)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get data from form
    $patient_id = $_POST['patient_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $blood_type = $_POST['blood_type'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $emergency_contact_name = $_POST['emergency_contact_name'];

    // Update query
    $query = "UPDATE Patient SET 
        first_name = '$first_name',
        last_name = '$last_name',
        date_of_birth = '$date_of_birth',
        gender = '$gender',
        blood_type = '$blood_type',
        phone = '$phone',
        address = '$address',
        emergency_contact_name = '$emergency_contact_name'
    WHERE patient_id = $patient_id";

    if (mysql_query($query)) {
        header("Location: patient.php?msg=updated");
        exit();
    } else {
        $error = "Error updating: " . mysql_error();
    }
}

// Get patient ID from URL (for DISPLAY)
$patient_id = $_GET['id'];
$query = "SELECT * FROM Patient WHERE patient_id = $patient_id";
$result = mysql_query($query);
$row = mysql_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Patient</title>
    <style>
        body { font-family: Arial; background: #f0f0f0; padding: 20px; margin: 0; }
        .container { max-width: 500px; margin: auto; background: white; padding: 25px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h2 { margin-top: 0; color: #2c3e50; }
        input, select { width: 100%; padding: 8px; margin: 6px 0 15px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { background: #2c3e50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #3498db; }
        .back { display: inline-block; margin-top: 15px; color: #3498db; text-decoration: none; }
        label { font-weight: bold; font-size: 13px; color: #555; }
        .error { background: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 15px; }
    </style>
</head>
<body>

<div class="container">
    <h2>✏️ Edit Patient</h2>
    
    <?php if(isset($error)) echo '<div class="error">' . $error . '</div>'; ?>
    
    <form method="post" action="">
        <input type="hidden" name="patient_id" value="<?php echo $row['patient_id']; ?>">
        
        <label>First Name</label>
        <input type="text" name="first_name" value="<?php echo htmlspecialchars($row['first_name']); ?>" required>
        
        <label>Last Name</label>
        <input type="text" name="last_name" value="<?php echo htmlspecialchars($row['last_name']); ?>" required>
        
        <label>Date of Birth</label>
        <input type="date" name="date_of_birth" value="<?php echo $row['date_of_birth']; ?>" required>
        
        <label>Gender</label>
        <select name="gender">
            <option value="Male" <?php if($row['gender'] == 'Male') echo 'selected'; ?>>Male</option>
            <option value="Female" <?php if($row['gender'] == 'Female') echo 'selected'; ?>>Female</option>
        </select>
        
        <label>Blood Type</label>
        <input type="text" name="blood_type" value="<?php echo $row['blood_type']; ?>">
        
        <label>Phone</label>
        <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required>
        
        <label>Address</label>
        <input type="text" name="address" value="<?php echo htmlspecialchars($row['address']); ?>">
        
        <label>Emergency Contact Name</label>
        <input type="text" name="emergency_contact_name" value="<?php echo htmlspecialchars($row['emergency_contact_name']); ?>">
        
        <button type="submit">💾 Update Patient</button>
    </form>
    
    <a href="patient.php" class="back">← Back to Patients</a>
</div>

</body>
</html>

<?php mysql_close(); ?>