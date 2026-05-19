<?php
include('config.php');

// Update logic (when form is submitted)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $doctor_id = $_POST['doctor_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $specialization = $_POST['specialization'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $department_id = $_POST['department_id'];
    $license_number = $_POST['license_number'];
    $hire_date = $_POST['hire_date'];

    $query = "UPDATE Doctor SET 
        first_name = '$first_name',
        last_name = '$last_name',
        specialization = '$specialization',
        phone = '$phone',
        email = '$email',
        department_id = '$department_id',
        license_number = '$license_number',
        hire_date = '$hire_date'
    WHERE doctor_id = $doctor_id";

    if (mysql_query($query)) {
        header("Location: doctors.php?msg=updated");
        exit();
    } else {
        $error = "Error updating: " . mysql_error();
    }
}

// Get doctor data for display
$doctor_id = $_GET['id'];
$query = "SELECT * FROM Doctor WHERE doctor_id = $doctor_id";
$result = mysql_query($query);
$row = mysql_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Doctor</title>
    <style>
        body { font-family: Arial; background: #f0f0f0; padding: 20px; margin: 0; }
        .container { max-width: 500px; margin: auto; background: white; padding: 25px; border-radius: 8px; }
        h2 { margin-top: 0; color: #2c3e50; }
        input, select { width: 100%; padding: 8px; margin: 6px 0 15px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { background: #2c3e50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #3498db; }
        .back { display: inline-block; margin-top: 15px; color: #3498db; text-decoration: none; }
        label { font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <h2>✏️ Edit Doctor</h2>
    
    <?php if(isset($error)) echo '<div style="color:red;">' . $error . '</div>'; ?>
    
    <form method="post" action="">
        <input type="hidden" name="doctor_id" value="<?php echo $row['doctor_id']; ?>">
        
        <label>First Name</label>
        <input type="text" name="first_name" value="<?php echo htmlspecialchars($row['first_name']); ?>" required>
        
        <label>Last Name</label>
        <input type="text" name="last_name" value="<?php echo htmlspecialchars($row['last_name']); ?>" required>
        
        <label>Specialization</label>
        <input type="text" name="specialization" value="<?php echo htmlspecialchars($row['specialization']); ?>" required>
        
        <label>Phone</label>
        <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required>
        
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
        
        <label>Department</label>
        <select name="department_id" required>
            <option value="">-- Select --</option>
            <?php
            $dept_query = "SELECT * FROM Department";
            $dept_result = mysql_query($dept_query);
            while ($dept = mysql_fetch_assoc($dept_result)) {
                $selected = ($dept['department_id'] == $row['department_id']) ? 'selected' : '';
                echo '<option value="' . $dept['department_id'] . '" ' . $selected . '>' . $dept['department_name'] . '</option>';
            }
            ?>
        </select>
        
        <label>License Number</label>
        <input type="text" name="license_number" value="<?php echo htmlspecialchars($row['license_number']); ?>" required>
        
        <label>Hire Date</label>
        <input type="date" name="hire_date" value="<?php echo $row['hire_date']; ?>" required>
        
        <button type="submit">💾 Update Doctor</button>
    </form>
    
    <a href="doctors.php" class="back">← Back to Doctors</a>
</div>

</body>
</html>

<?php mysql_close(); ?>