<?php
include('config.php');

// Update logic
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $appointment_id = $_POST['appointment_id'];
    $patient_id = $_POST['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $reason = $_POST['reason'];
    $status = $_POST['status'];

    $query = "UPDATE Appointment SET 
        patient_id = '$patient_id',
        doctor_id = '$doctor_id',
        appointment_date = '$appointment_date',
        appointment_time = '$appointment_time',
        reason = '$reason',
        status = '$status'
    WHERE appointment_id = $appointment_id";

    if (mysql_query($query)) {
        header("Location: appointments.php?msg=updated");
        exit();
    } else {
        $error = "Error updating: " . mysql_error();
    }
}

// Get appointment data
$appointment_id = $_GET['id'];
$query = "SELECT * FROM Appointment WHERE appointment_id = $appointment_id";
$result = mysql_query($query);
$row = mysql_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Appointment</title>
    <style>
        body { font-family: Arial; background: #f0f0f0; padding: 20px; margin: 0; }
        .container { max-width: 500px; margin: auto; background: white; padding: 25px; border-radius: 8px; }
        h2 { margin-top: 0; color: #2c3e50; }
        input, select, textarea { width: 100%; padding: 8px; margin: 6px 0 15px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { background: #2c3e50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #3498db; }
        .back { display: inline-block; margin-top: 15px; color: #3498db; text-decoration: none; }
        label { font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <h2>✏️ Edit Appointment</h2>
    
    <?php if(isset($error)) echo '<div style="color:red;">' . $error . '</div>'; ?>
    
    <form method="post" action="">
        <input type="hidden" name="appointment_id" value="<?php echo $row['appointment_id']; ?>">
        
        <label>Patient</label>
        <select name="patient_id" required>
            <option value="">-- Select Patient --</option>
            <?php
            $pat_query = "SELECT * FROM Patient ORDER BY first_name";
            $pat_result = mysql_query($pat_query);
            while ($pat = mysql_fetch_assoc($pat_result)) {
                $selected = ($pat['patient_id'] == $row['patient_id']) ? 'selected' : '';
                echo '<option value="' . $pat['patient_id'] . '" ' . $selected . '>' . $pat['first_name'] . ' ' . $pat['last_name'] . '</option>';
            }
            ?>
        </select>
        
        <label>Doctor</label>
        <select name="doctor_id" required>
            <option value="">-- Select Doctor --</option>
            <?php
            $doc_query = "SELECT * FROM Doctor ORDER BY first_name";
            $doc_result = mysql_query($doc_query);
            while ($doc = mysql_fetch_assoc($doc_result)) {
                $selected = ($doc['doctor_id'] == $row['doctor_id']) ? 'selected' : '';
                echo '<option value="' . $doc['doctor_id'] . '" ' . $selected . '>Dr. ' . $doc['first_name'] . ' ' . $doc['last_name'] . ' (' . $doc['specialization'] . ')</option>';
            }
            ?>
        </select>
        
        <label>Appointment Date</label>
        <input type="date" name="appointment_date" value="<?php echo $row['appointment_date']; ?>" required>
        
        <label>Appointment Time</label>
        <input type="time" name="appointment_time" value="<?php echo $row['appointment_time']; ?>" required>
        
        <label>Reason for Visit</label>
        <textarea name="reason" rows="3"><?php echo htmlspecialchars($row['reason']); ?></textarea>
        
        <label>Status</label>
        <select name="status">
            <option value="Scheduled" <?php if($row['status'] == 'Scheduled') echo 'selected'; ?>>Scheduled</option>
            <option value="Confirmed" <?php if($row['status'] == 'Confirmed') echo 'selected'; ?>>Confirmed</option>
            <option value="Completed" <?php if($row['status'] == 'Completed') echo 'selected'; ?>>Completed</option>
            <option value="Cancelled" <?php if($row['status'] == 'Cancelled') echo 'selected'; ?>>Cancelled</option>
        </select>
        
        <button type="submit">💾 Update Appointment</button>
    </form>
    
    <a href="appointments.php" class="back">← Back to Appointments</a>
</div>

</body>
</html>

<?php mysql_close(); ?>