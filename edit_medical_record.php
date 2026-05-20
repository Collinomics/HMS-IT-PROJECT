<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('config.php');

// Update logic
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $record_id = $_POST['record_id'];
    $patient_id = $_POST['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $visit_date = $_POST['visit_date'];
    $symptoms = $_POST['symptoms'];
    $treatment = $_POST['treatment'];
    $notes = $_POST['notes'];
    $follow_up_date = $_POST['follow_up_date'];
    
    // Update MedicalRecord
    $query = "UPDATE MedicalRecord SET 
        patient_id = '$patient_id',
        doctor_id = '$doctor_id',
        visit_date = '$visit_date',
        symptoms = '$symptoms',
        treatment = '$treatment',
        notes = '$notes',
        follow_up_date = '$follow_up_date'
    WHERE record_id = $record_id";
    
    if (mysqli_query($con, $query)) {
        // Update Prescription
        $medication_name = $_POST['medication_name'];
        $dosage = $_POST['dosage'];
        $quantity = $_POST['quantity'];
        $instructions = $_POST['instructions'];
        $refills = $_POST['refills'];
        $status = $_POST['prescription_status'];
        
        $query2 = "UPDATE Prescription SET 
            medication_name = '$medication_name',
            dosage = '$dosage',
            quantity = '$quantity',
            instructions = '$instructions',
            refills = '$refills',
            status = '$status'
        WHERE record_id = $record_id";
        
        if (mysqli_query($con, $query2)) {
            header("Location: records.php?msg=updated");
            exit();
        } else {
            $error = "Error updating prescription: " . mysqli_error();
        }
    } else {
        $error = "Error updating medical record: " . mysqli_error();
    }
}

// Get record data
$record_id = $_GET['id'];
$query = "SELECT m.*, r.* FROM MedicalRecord m 
          JOIN Prescription r ON m.record_id = r.record_id 
          WHERE m.record_id = $record_id";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Medical Record</title>
    <style>
        body { font-family: Arial; background: #f0f0f0; padding: 20px; margin: 0; }
        .container { max-width: 600px; margin: auto; background: white; padding: 25px; border-radius: 8px; }
        h2 { margin-top: 0; color: #2c3e50; }
        input, select, textarea { width: 100%; padding: 8px; margin: 6px 0 15px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { background: #2c3e50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #3498db; }
        .back { display: inline-block; margin-top: 15px; color: #3498db; text-decoration: none; }
        label { font-weight: bold; }
        h3 { color: #2c3e50; margin: 20px 0 10px 0; }
    </style>
</head>
<body>

<div class="container">
    <h2>✏️ Edit Medical Record & Prescription</h2>
    
    <?php if(isset($error)) echo '<div style="color:red;">' . $error . '</div>'; ?>
    
    <form method="post" action="">
        <input type="hidden" name="record_id" value="<?php echo $row['record_id']; ?>">
        
        <label>Patient</label>
        <select name="patient_id" required>
            <?php
            $pat_query = "SELECT * FROM Patient ORDER BY first_name";
            $pat_result = mysqli_query($con, $pat_query);
            while ($pat = mysqli_fetch_assoc($pat_result)) {
                $selected = ($pat['patient_id'] == $row['patient_id']) ? 'selected' : '';
                echo '<option value="' . $pat['patient_id'] . '" ' . $selected . '>' . $pat['first_name'] . ' ' . $pat['last_name'] . '</option>';
            }
            ?>
        </select>
        
        <label>Doctor</label>
        <select name="doctor_id" required>
            <?php
            $doc_query = "SELECT * FROM Doctor ORDER BY first_name";
            $doc_result = mysqli_query($con, $doc_query);
            while ($doc = mysqli_fetch_assoc($doc_result)) {
                $selected = ($doc['doctor_id'] == $row['doctor_id']) ? 'selected' : '';
                echo '<option value="' . $doc['doctor_id'] . '" ' . $selected . '>Dr. ' . $doc['first_name'] . ' ' . $doc['last_name'] . '</option>';
            }
            ?>
        </select>
        
        <label>Visit Date & Time</label>
        <input type="datetime-local" name="visit_date" value="<?php echo date('Y-m-d\TH:i', strtotime($row['visit_date'])); ?>" required>
        
        <label>Symptoms</label>
        <textarea name="symptoms" rows="3"><?php echo htmlspecialchars($row['symptoms']); ?></textarea>
        
        <label>Treatment / Diagnosis</label>
        <textarea name="treatment" rows="3"><?php echo htmlspecialchars($row['treatment']); ?></textarea>
        
        <label>Notes</label>
        <textarea name="notes" rows="2"><?php echo htmlspecialchars($row['notes']); ?></textarea>
        
        <label>Follow-up Date</label>
        <input type="date" name="follow_up_date" value="<?php echo $row['follow_up_date']; ?>">
        
        <h3>💊 Prescription</h3>
        
        <label>Medication Name</label>
        <input type="text" name="medication_name" value="<?php echo htmlspecialchars($row['medication_name']); ?>" required>
        
        <label>Dosage</label>
        <input type="text" name="dosage" value="<?php echo htmlspecialchars($row['dosage']); ?>" required>
        
        <label>Quantity</label>
        <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>" required>
        
        <label>Instructions</label>
        <textarea name="instructions" rows="2"><?php echo htmlspecialchars($row['instructions']); ?></textarea>
        
        <label>Refills</label>
        <input type="number" name="refills" value="<?php echo $row['refills']; ?>">
        
        <label>Prescription Status</label>
        <select name="prescription_status">
            <option value="Active" <?php if($row['status'] == 'Active') echo 'selected'; ?>>Active</option>
            <option value="Completed" <?php if($row['status'] == 'Completed') echo 'selected'; ?>>Completed</option>
            <option value="Expired" <?php if($row['status'] == 'Expired') echo 'selected'; ?>>Expired</option>
            <option value="Cancelled" <?php if($row['status'] == 'Cancelled') echo 'selected'; ?>>Cancelled</option>
        </select>
        
        <button type="submit">💾 Update Record</button>
    </form>
    
    <a href="records.php" class="back">← Back to Medical Records</a>
</div>

</body>
</html>

<?php mysqli_close(); ?>