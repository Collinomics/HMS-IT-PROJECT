<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('config.php');

// Update logic
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $department_id = $_POST['department_id'];
    $department_name = $_POST['department_name'];
    $location = $_POST['location'];

    $query = "UPDATE Department SET 
        department_name = '$department_name',
        location = '$location'
    WHERE department_id = $department_id";

    if (mysqli_query($con, $query)) {
        header("Location: departments.php?msg=updated");
        exit();
    } else {
        $error = "Error updating: " . mysqli_error();
    }
}

// Get department data
$department_id = $_GET['id'];
$query = "SELECT * FROM Department WHERE department_id = $department_id";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Department</title>
    <style>
        body { font-family: Arial; background: #f0f0f0; padding: 20px; margin: 0; }
        .container { max-width: 500px; margin: auto; background: white; padding: 25px; border-radius: 8px; }
        h2 { margin-top: 0; color: #2c3e50; }
        input { width: 100%; padding: 8px; margin: 6px 0 15px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { background: #2c3e50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #3498db; }
        .back { display: inline-block; margin-top: 15px; color: #3498db; text-decoration: none; }
        label { font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <h2>✏️ Edit Department</h2>
    
    <?php if(isset($error)) echo '<div style="color:red;">' . $error . '</div>'; ?>
    
    <form method="post" action="">
        <input type="hidden" name="department_id" value="<?php echo $row['department_id']; ?>">
        
        <label>Department Name</label>
        <input type="text" name="department_name" value="<?php echo htmlspecialchars($row['department_name']); ?>" required>
        
        <label>Location</label>
        <input type="text" name="location" value="<?php echo htmlspecialchars($row['location']); ?>" required>
        
        <button type="submit">💾 Update Department</button>
    </form>
    
    <a href="departments.php" class="back">← Back to Departments</a>
</div>

</body>
</html>

<?php mysqli_close($con) ?>