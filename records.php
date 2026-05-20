<?php
include('config.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Delete medical record
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    mysqli_query($con, "DELETE FROM Prescription WHERE record_id = $delete_id");
    mysql_query($con, "DELETE FROM MedicalRecord WHERE record_id = $delete_id");
    header("Location: records.php?msg=deleted");
    exit();
}

// Show success messages
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'deleted') {
        echo '<div style="background: #d4edda; color: #155724; padding: 8px 15px; margin: 5px 20px; border-radius: 4px; font-size: 13px; text-align: center;">Medical record deleted successfully!</div>';
    }
    if ($_GET['msg'] == 'added') {
        echo '<div style="background: #d4edda; color: #155724; padding: 8px 15px; margin: 5px 20px; border-radius: 4px; font-size: 13px; text-align: center;">Medical record and prescription saved successfully!</div>';
    }
    if ($_GET['msg'] == 'updated') {
        echo '<div style="background: #d4edda; color: #155724; padding: 8px 15px; margin: 5px 20px; border-radius: 4px; font-size: 13px; text-align: center;">Medical record updated successfully!</div>';
    }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>City Hospital - Quality Healthcare for Every Patient</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="manage" style="padding: 2px 0; font-size: 12px; color: white; background-color: #2c3e50; letter-spacing: 1px; font-family: arial; text-align: center;">HOSPITAL MANAGEMENT INFORMATION SYSTEM</div>
<table width="99%" height="10" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr bgcolor="#F8F9FA" style="font-family: Arial; color: #555555;">
      <td width="31%" style="text-align: center">📞 <a href="tel:+256756950472">+256 756 950 472</a></td>
      <td width="35%" style="text-align: center">📍 <a href="https://maps.google.com/?q=Kampala+Uganda+Hospital">Kampala, Uganda</a></td>
      <td width="34%" style="text-align: center"><table width="100%" border="0" cellpadding="2">
        <tbody>
          <tr style="text-align: center">
            <td width="153" style="text-align: right; font-weight: bold;">Follow us:</td>
            <td width="25"><a href="https://www.twitter.com/hospitalpage"><img src="resources/twitter.png" width="15" height="15" alt=""/></a></td>
            <td width="25"><a href="https://www.facebook.com/hospitalpage"><img src="resources/facebook.png" width="15" height="15" alt="fb"/></a></td>
            <td width="25"><a href="https://www.linkedin.com/company/hospital"><img src="resources/linkedin.png" width="15" height="15" alt="ln"/></a></td>
            <td width="25"><a href="https://www.instagram.com/company/hospital"><img src="resources/instagram.png" width="15" height="15" alt="ig"/></a></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
  </tbody>
</table>
<table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td width="59%" height="64" valign="top"><table width="100%" border="0" cellpadding="0">
        <tbody>
          <tr>
            <td width="5%" style="text-align: center"><img style="border-radius: 30%" src="resources/logo.jpg" width="60" height="auto" alt="logo"/></td>
            <td width="95%" height="20px" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="1">
              <tbody>
                <tr>
                  <td><span style="font-size: 28px; font-weight: 700; color: #2c3e50; font-family: Helvetica;">CITY HOSPITAL</span></td>
                </tr>
                <tr>
                  <td><span style="font-size: 16px; font-family: sans-serif; font-style: italic; color: #7f8c8d;">Caring for your health</span></td>
                </tr>
              </tbody>
            </table></td>
          </tr>
        </tbody>
      </table></td>
      <td width="41%" valign="middle"><table width="100%" border="0" cellpadding="2" cellspacing="0">
        <tbody>
          <tr>
            <td width="14%" style="font-weight: 400;"><a href="index.php">Home</a></td>
            <td width="18%" style="font-weight: 400"><a href="patient.php">Patients</a></td>
            <td width="18%" style="font-weight: 400"><a href="doctors.php">Doctors</a></td>
            <td width="23%" style="font-weight: 400"><a href="appointments.php">Appointments</a></td>
            <td width="18%" style="font-weight: 400"><a href="records.php">Records</a></td>
			<td width="23%" style="font-weight: 400"><a href="departments.php">Departments</a></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
  </tbody>
</table>
<hr width="99%" size="6">
<!-- ADD NEW MEDICAL RECORD Section -->
<div style="background: #ffffff; padding: 30px 20px; margin: 20px auto; width: 92%; border: 1px solid #e0e0e0; border-radius: 10px; box-sizing: border-box;">

  <h2 style="font-family: Arial; font-size: 22px; font-weight: bold; color: #2c3e50; margin-bottom: 5px; margin-top: 0;">ADD NEW MEDICAL RECORD</h2>
  <p style="font-family: Arial; font-size: 14px; color: #7f8c8d; margin-bottom: 25px;">Fill in the details below to create a new medical record</p>

  <form id="form1" name="records_form" method="post" action="save_medical_record.php">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tbody>

        <!-- Row 1: Record ID (Auto) & Doctor -->
        <tr>
          <td width="50%" style="padding: 8px 15px 8px 0;">
            <label style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Record ID</label>
            <input type="text" name="record_id" id="record_id" value="REC-2025-001" readonly
              style="width: 100%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #7f8c8d; background: #f5f5f5; box-sizing: border-box; outline: none;">
          </td>
          <td width="50%" style="padding: 8px 0 8px 15px;">
            <label for="doctor" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Doctor</label>
            <select name="doctor_id" id="doctor" required
              style="width: 100%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none; background: #fff;">
              <option value="">-- Select Doctor --</option>
                    <?php
                            $doc_query = "SELECT * FROM Doctor ORDER BY first_name";
                            $doc_result = mysqli_query($con, $doc_query);
                            while ($doc = mysqli_fetch_assoc($doc_result)) {
                                echo '<option value="' . $doc['doctor_id'] . '">Dr. ' . $doc['first_name'] . ' ' . $doc['last_name'] . '</option>';
                            }
                    ?>
            </select>
          </td>
        </tr>

        <!-- Row 2: Patient & Visit Date -->
        <tr>
          <td width="50%" style="padding: 8px 15px 8px 0;">
            <label for="patient" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Patient</label>
            <select name="patient_id" id="patient" required
              style="width: 100%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none; background: #fff;">
              <option value="">-- Select Patient --</option>
                      <?php
                            $pat_query = "SELECT * FROM Patient ORDER BY first_name";
                            $pat_result = mysqli_query($con, $pat_query);
                            while ($pat = mysqli_fetch_assoc($pat_result)) {
                                echo '<option value="' . $pat['patient_id'] . '">' . $pat['first_name'] . ' ' . $pat['last_name'] . '</option>';
                            }
                      ?>
            </select>
          </td>
          <td width="50%" style="padding: 8px 0 8px 15px;">
            <label for="visit_date" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Visit Date</label>
            <input type="date" name="visit_date" id="visit_date"
              style="width: 100%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none;">
          </td>
        </tr>

        <!-- Row 3: Symptoms -->
        <tr>
          <td colspan="2" style="padding: 8px 0;">
            <label for="symptoms" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Symptoms</label>
            <textarea name="symptoms" id="symptoms" rows="2" placeholder="Describe symptoms"
              style="width: 100%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none; resize: vertical;"></textarea>
          </td>
        </tr>

        <!-- Row 4: Treatment -->
        <tr>
          <td colspan="2" style="padding: 8px 0;">
            <label for="treatment" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Treatment</label>
            <textarea name="treatment" id="treatment" rows="2" placeholder="Describe treatment given"
              style="width: 100%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none; resize: vertical;"></textarea>
          </td>
        </tr>

        <!-- Row 5: Notes -->
        <tr>
          <td colspan="2" style="padding: 8px 0;">
            <label for="notes" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Notes</label>
            <textarea name="notes" id="notes" rows="2" placeholder="Additional notes"
              style="width: 100%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none; resize: vertical;"></textarea>
          </td>
        </tr>

        <!-- Row 6: Follow-up Date -->
        <tr>
          <td colspan="2" style="padding: 8px 0;">
            <label for="followup_date" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Follow-up Date</label>
            <input type="date" name="follow_up_date" id="followup_date"
              style="width: 49%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none;">
          </td>
        </tr>

        <!-- PRESCRIPTION Section Header -->
        <tr>
          <td colspan="2" style="padding: 15px 0 5px 0;">
            <h3 style="font-family: Arial; font-size: 18px; font-weight: bold; color: #2c3e50; margin: 0;">PRESCRIPTION</h3>
          </td>
        </tr>

        <!-- Row 7: Medication & Dosage -->
        <tr>
          <td width="50%" style="padding: 8px 15px 8px 0;">
            <label for="medication" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Medication</label>
            <input type="text" name="medication_name" id="medication" placeholder="e.g. Aspirin, Amoxicillin"
              style="width: 100%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none;">
          </td>
          <td width="50%" style="padding: 8px 0 8px 15px;">
            <label for="dosage" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Dosage</label>
            <input type="text" name="dosage" id="dosage" placeholder="e.g. 500mg, 1 tablet"
              style="width: 100%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none;">
          </td>
        </tr>

        <!-- Row 8: Quantity & Instructions -->
        <tr>
          <td width="50%" style="padding: 8px 15px 8px 0;">
            <label for="quantity" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Quantity</label>
            <input type="text" name="quantity" id="quantity" placeholder="e.g. 30 tablets"
              style="width: 100%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none;">
          </td>
          <td width="50%" style="padding: 8px 0 8px 15px;">
            <label for="instructions" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Instructions</label>
            <input type="text" name="instructions" id="instructions" placeholder="e.g. Take after meals"
              style="width: 100%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none;">
          </td>
        </tr>

        <!-- Row 9: Refills & Status -->
        <tr>
          <td width="50%" style="padding: 8px 15px 8px 0;">
            <label for="refills" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Refills</label>
            <input type="number" name="refills" id="refills" placeholder="0" min="0" max="10"
              style="width: 100%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none;">
          </td>
          <td width="50%" style="padding: 8px 0 8px 15px;">
            <label for="prescription_status" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Status</label>
            <select name="prescription_status" id="prescription_status"
              style="width: 100%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none; background: #fff;">
              <option value="Active">Active</option>
              <option value="Completed">Completed</option>
              <option value="Expired">Expired</option>
              <option value="Discontinued">Discontinued</option>
            </select>
          </td>
        </tr>

        <!-- Add Another Medication Button -->
        <tr>
          <td colspan="2" style="padding: 10px 0;">
            <button type="button" onclick="addAnotherMedication()"
              style="background-color: #ecf0f1; color: #3498db; border: 1px solid #3498db; padding: 8px 20px; border-radius: 6px; font-family: Arial; font-size: 14px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;"
              onmouseover="this.style.backgroundColor='#3498db'; this.style.color='white';"
              onmouseout="this.style.backgroundColor='#ecf0f1'; this.style.color='#3498db';">+ Add Another Medication</button>
          </td>
        </tr>

        <!-- Submit Button -->
        <tr>
          <td colspan="2" style="padding: 20px 0 5px 0;">
            <input type="submit" name="submit" id="submit" value="SAVE MEDICAL RECORD"
              style="background-color: #3498db; color: #ffffff; border: none; padding: 11px 30px; border-radius: 6px; font-family: Arial; font-size: 14px; font-weight: 600; cursor: pointer; letter-spacing: 0.5px; transition: all 0.3s ease;"
              onmouseover="this.style.backgroundColor='#2980b9'; this.style.transform='scale(1.05)';"
              onmouseout="this.style.backgroundColor='#3498db'; this.style.transform='scale(1)';">
			  <input type="reset" value="Clear"
              style="background-color: #ffffff; color: #555555; border: 1px solid #ddd; padding: 11px 30px; border-radius: 6px; font-family: Arial; font-size: 14px; font-weight: 600; cursor: pointer; margin-left: 10px; transition: all 0.3s ease;"
              onmouseover="this.style.backgroundColor='#f5f5f5'; this.style.borderColor='#3498db'; this.style.color='#3498db'; this.style.transform='scale(1.05)';"
              onmouseout="this.style.backgroundColor='#ffffff'; this.style.borderColor='#ddd'; this.style.color='#555555'; this.style.transform='scale(1)';">
          </td>
        </tr>

      </tbody>
    </table>
  </form>
</div>

<hr width="99%" size="6">

<!-- MEDICAL RECORDS LISTED Section -->
<div style="background: #ffffff; padding: 30px 20px; margin: 0 auto 20px; width: 92%; border: 1px solid #e0e0e0; border-radius: 10px; box-sizing: border-box;">

  <h2 style="font-family: Arial; font-size: 22px; font-weight: bold; color: #2c3e50; margin-bottom: 5px; margin-top: 0;">MEDICAL RECORDS</h2>
  <p style="font-family: Arial; font-size: 14px; color: #7f8c8d; margin-bottom: 20px;">List of all medical records in the system</p>

  <!-- Search and Filter Functionality -->
  <div style="margin-bottom: 20px; display: flex; justify-content: space-between; gap: 10px; flex-wrap: wrap; align-items: center;">
    <div style="display: flex; gap: 10px; align-items: center;">
      <span style="font-family: Arial; font-size: 14px; color: #34495e;">🔍 Search:</span>
      <input type="text" id="searchInput" placeholder="Search by record ID, patient, or doctor..."
        style="width: 250px; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none;"
        onkeyup="searchRecords()">
    </div>
    <div style="display: flex; gap: 10px; align-items: center;">
      <span style="font-family: Arial; font-size: 14px; color: #34495e;">Status:</span>
      <select id="statusFilter" onchange="filterByStatus()"
        style="width: 150px; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none; background: #fff;">
        <option value="All">All</option>
        <option value="Active">Active</option>
        <option value="Completed">Completed</option>
        <option value="Expired">Expired</option>
        <option value="Discontinued">Discontinued</option>
      </select>
      <button onclick="resetFilters()"
        style="background-color: #95a5a6; color: #ffffff; border: none; padding: 9px 15px; border-radius: 6px; font-family: Arial; font-size: 14px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;"
        onmouseover="this.style.backgroundColor='#7f8c8d'; this.style.transform='scale(1.02)';"
        onmouseout="this.style.backgroundColor='#95a5a6'; this.style.transform='scale(1)';">Reset</button>
    </div>
  </div>

  <table width="100%" border="0" cellpadding="0" cellspacing="0" id="recordsTable" style="border-collapse: collapse; border: 1px solid #ddd;">
      <thead>
          <tr style="background: #2c3e50; border-bottom: 2px solid #3498db;">
              <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Record ID</th>
              <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Visit Date</th>
              <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Patient</th>
              <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Doctor</th>
              <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Symptoms</th>
              <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Medication</th>
              <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Dosage</th>
              <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Status</th>
              <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Actions</th>
          </tr>
      </thead>
      <tbody>
          <?php
          $query = "SELECT m.*, 
                    p.first_name as pat_fname, p.last_name as pat_lname, 
                    d.first_name as doc_fname, d.last_name as doc_lname,
                    r.medication_name, r.dosage, r.status as rx_status
                    FROM MedicalRecord m
                    JOIN Patient p ON m.patient_id = p.patient_id
                    JOIN Doctor d ON m.doctor_id = d.doctor_id
                    LEFT JOIN Prescription r ON m.record_id = r.record_id
                    ORDER BY m.record_id DESC";
          $result = mysqli_query($con, $query);

          if (mysqli_num_rows($result) > 0) {
              $row_count = 0;
              while ($row = mysqli_fetch_assoc($result)) {
                  $row_count++;
                  $bg_color = ($row_count % 2 == 0) ? '#f9f9f9' : '#ffffff';
                  
                  // Status badge color
                  $status_color = '#2ecc71'; // default green for Active
                  if ($row['rx_status'] == 'Completed') {
                      $status_color = '#3498db';
                  } elseif ($row['rx_status'] == 'Expired') {
                      $status_color = '#95a5a6';
                  } elseif ($row['rx_status'] == 'Cancelled') {
                      $status_color = '#e74c3c';
                  }
                  
                  // Format date
                  $formatted_date = date('Y-m-d', strtotime($row['visit_date']));
                  
                  // Shorten symptoms if too long
                  $short_symptoms = (strlen($row['symptoms']) > 50) ? substr($row['symptoms'], 0, 50) . '...' : $row['symptoms'];
                  ?>
                  
                  <tr style="background: <?php echo $bg_color; ?>; border-bottom: 1px solid #eee;">
                      <td style="padding: 10px 12px;"><?php echo $row['record_id']; ?></td>
                      <td style="padding: 10px 12px;"><?php echo $formatted_date; ?></td>
                      <td style="padding: 10px 12px;"><?php echo htmlspecialchars($row['pat_fname']) . ' ' . htmlspecialchars($row['pat_lname']); ?></td>
                      <td style="padding: 10px 12px;">Dr. <?php echo htmlspecialchars($row['doc_fname']) . ' ' . htmlspecialchars($row['doc_lname']); ?></td>
                      <td style="padding: 10px 12px;"><?php echo htmlspecialchars($short_symptoms); ?></td>
                      <td style="padding: 10px 12px;"><?php echo htmlspecialchars($row['medication_name']); ?></td>
                      <td style="padding: 10px 12px;"><?php echo htmlspecialchars($row['dosage']); ?></td>
                      <td style="padding: 10px 12px;">
                          <span style="background: <?php echo $status_color; ?>; color: white; padding: 4px 10px; border-radius: 20px; font-size: 12px; display: inline-block;">
                              <?php echo htmlspecialchars($row['rx_status']); ?>
                          </span>
                      </td>
                      <td style="padding: 10px 12px;">
                          <a href="edit_medical_record.php?id=<?php echo $row['record_id']; ?>" style="text-decoration: none; font-size: 18px; margin-right: 8px; color: #3498db;">✏️</a>
                          <a href="records.php?delete_id=<?php echo $row['record_id']; ?>" onclick="return confirm('Delete this record?')" style="text-decoration: none; font-size: 18px; color: #e74c3c;">🗑️</a>
                      </td>
                  </tr>
                  <?php
              }
          } else {
              ?>
              <tr>
                  <td colspan="9" style="text-align: center; padding: 30px;">No medical records found. Add your first record above.</td>
              </tr>
              <?php
          }
          ?>
      </tbody>
  </table>
</div>

<script type="text/javascript">
  // Auto-set visit date to today
  document.getElementById('visit_date').value = new Date().toISOString().split('T')[0];

  // Auto-generate Record ID
  let recordCounter = 4;
  function generateRecordID() {
    recordCounter++;
    let newID = 'REC-' + String(recordCounter).padStart(3, '0');
    document.getElementById('record_id').value = newID;
    return newID;
  }

  // Add Another Medication Function
  function addAnotherMedication() {
    alert('This would add another medication field in a real application.\nCurrent medications: ' + document.getElementById('medication').value);
  }

  // Save Medical Record Function
  function saveMedicalRecord(event) {
    event.preventDefault();
    
    let recordID = generateRecordID();
    let patient = document.getElementById('patient').value;
    let doctor = document.getElementById('doctor').value;
    let visitDate = document.getElementById('visit_date').value;
    let symptoms = document.getElementById('symptoms').value;
    let treatment = document.getElementById('treatment').value;
    let medication = document.getElementById('medication').value;
    let status = document.getElementById('prescription_status').value;
    
    if(!patient || !doctor || !visitDate) {
      alert('Please fill in required fields: Patient, Doctor, and Visit Date');
      return false;
    }
    
    alert('Medical Record saved successfully!\nRecord ID: ' + recordID + '\nPatient: ' + patient + '\nDoctor: ' + doctor);
    
    // Clear form
    document.getElementById('form1').reset();
    document.getElementById('visit_date').value = new Date().toISOString().split('T')[0];
    document.getElementById('prescription_status').value = 'Active';
    document.getElementById('record_id').value = generateRecordID();
    
    return false;
  }

  // Search Functionality
  function searchRecords() {
    let input = document.getElementById('searchInput').value.toLowerCase();
    let table = document.getElementById('recordsTable');
    let rows = table.getElementsByTagName('tr');
    
    for(let i = 1; i < rows.length; i++) {
      let row = rows[i];
      let cells = row.getElementsByTagName('td');
      let found = false;
      
      if(cells.length > 0) {
        let recordID = cells[0].innerText.toLowerCase();
        let patient = cells[2].innerText.toLowerCase();
        let doctor = cells[3].innerText.toLowerCase();
        
        if(recordID.includes(input) || patient.includes(input) || doctor.includes(input)) {
          found = true;
        }
      }
      
      if(found) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    }
  }

  // Filter by Status
  function filterByStatus() {
    let status = document.getElementById('statusFilter').value;
    let table = document.getElementById('recordsTable');
    let rows = table.getElementsByTagName('tr');
    
    for(let i = 1; i < rows.length; i++) {
      let row = rows[i];
      let rowStatus = row.getAttribute('data-status');
      
      if(status === 'All' || rowStatus === status) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    }
  }

  // Reset Filters
  function resetFilters() {
    document.getElementById('searchInput').value = '';
    document.getElementById('statusFilter').value = 'All';
    
    let table = document.getElementById('recordsTable');
    let rows = table.getElementsByTagName('tr');
    
    for(let i = 1; i < rows.length; i++) {
      rows[i].style.display = '';
    }
  }

  // Edit Record Function
  function editRecord(recordID) {
    alert('Edit medical record: ' + recordID + '\nThis would open edit form in a real application.');
  }

  // Delete Record Function
  function deleteRecord(button) {
    if(confirm('Are you sure you want to delete this medical record?')) {
      let row = button.parentElement.parentElement;
      row.remove();
      alert('Medical record deleted successfully!');
    }
  }
</script>
<hr width="99%" size="6">
<!-- Footer -->
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="background: #2c3e50;">
  <tbody>
    <tr>
      <td style="padding-top: 40px; padding-bottom: 0; padding-left: 20px; padding-right: 20px;">
        <table width="88%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <!-- Column 1: Hospital Info -->
              <td width="40%" align="center" valign="middle" style="padding-right: 40px;">
                <p style="font-family: Arial; font-size: 32px; font-weight: bold; color: #ffffff; margin: 0 0 15px 0;">🏥 CITY HOSPITAL</p>
                <p style="font-family: Arial; font-size: 18px; font-weight: normal; color: #bdc3c7; margin: 0; line-height: 1.5;">Quality care for all<br>Since 2025</p>
              </td>
              
              <!-- Column 2: Quick Links -->
              <td width="30%" valign="top" style="padding-right: 40px;">
                <p style="font-family: Arial; font-size: 18px; font-weight: bold; color: #ffffff; margin: 0 0 15px 0;">QUICK LINKS</p>
                <p style="font-family: Arial; font-size: 14px; font-weight: normal; color: #bdc3c7; margin: 0; line-height: 1.8;">
                  • <a href="index.php" class="footer-link" style="font-family: Arial; font-size: 14px; color: #bdc3c7; text-decoration: none;">Home</a><br>
                  • <a href="patient.php" class="footer-link" style="font-family: Arial; font-size: 14px; color: #bdc3c7; text-decoration: none;">Patients</a><br>
                  • <a href="doctors.php" class="footer-link" style="font-family: Arial; font-size: 14px; color: #bdc3c7; text-decoration: none;">Doctors</a><br>
                  • <a href="appointments.php" class="footer-link" style="font-family: Arial; font-size: 14px; color: #bdc3c7; text-decoration: none;">Appointments</a><br>
                  • <a href="records.php" class="footer-link" style="font-family: Arial; font-size: 14px; color: #bdc3c7; text-decoration: none;">Records</a><br>
                  • <a href="departments.php" class="footer-link" style="font-family: Arial; font-size: 14px; color: #bdc3c7; text-decoration: none;">Departments</a>
                </p>
              </td>
              
              <!-- Column 3: Contact -->
              <td width="30%" valign="top">
                <p style="font-family: Arial; font-size: 18px; font-weight: bold; color: #ffffff; margin: 0 0 15px 0;">CONTACT</p>
                <p style="font-family: Arial; font-size: 14px; font-weight: normal; color: #bdc3c7; margin: 0; line-height: 1.8;">
                  📞 <a href="tel:+256756950472" class="footer-link" style="font-family: Arial; font-size: 14px; color: #bdc3c7; text-decoration: none;">+256 756 950 472</a><br>
                  ✉️ <a href="mailto:info@cityhospital.com" class="footer-link" style="font-family: Arial; font-size: 14px; color: #bdc3c7; text-decoration: none;">info@cityhospital.com</a><br>
                  <a href="https://wa.me/256756950472" class="footer-link" style="font-family: Arial; font-size: 14px; color: #bdc3c7; text-decoration: none;">
                    <img src="resources/whatsapp.png" class="footer-link" width="20" height="20" alt="WhatsApp" style="vertical-align: middle;"> Chat on WhatsApp
                  </a>
                </p>
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
    
    <tr>
      <td bgcolor="#1a252f" style="padding-top: 15px; padding-bottom: 15px; text-align: center;">
        <p style="font-family: Arial; font-size: 12px; font-weight: normal; color: #7f8c8d; margin: 0;">© 2025 City Hospital. All rights reserved.</p>
      </td>
    </tr>
  </tbody>
</table>
</body>
</html>
