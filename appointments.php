<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('config.php');

// Delete appointment
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    mysqli_query($con, "DELETE FROM Appointment WHERE appointment_id = $delete_id");
    header("Location: appointments.php?msg=deleted");
    exit();
}

// Show success message
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'deleted') {
        echo '<div style="background: #d4edda; color: #155724; padding: 8px 15px; margin: 5px 20px; border-radius: 4px; font-size: 13px; text-align: center;">Appointment deleted successfully!</div>';
    }
    if ($_GET['msg'] == 'added') {
        echo '<div style="background: #d4edda; color: #155724; padding: 8px 15px; margin: 5px 20px; border-radius: 4px; font-size: 13px; text-align: center;">Appointment scheduled successfully!</div>';
    }
    if ($_GET['msg'] == 'updated') {
        echo '<div style="background: #d4edda; color: #155724; padding: 8px 15px; margin: 5px 20px; border-radius: 4px; font-size: 13px; text-align: center;">Appointment updated successfully!</div>';
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
<!-- SCHEDULE NEW APPOINTMENT Section -->
<div style="background: #ffffff; padding: 30px 20px; margin: 20px auto; width: 92%; border: 1px solid #e0e0e0; border-radius: 10px; box-sizing: border-box;">

  <h2 style="font-family: Arial; font-size: 22px; font-weight: bold; color: #2c3e50; margin-bottom: 5px; margin-top: 0;">SCHEDULE NEW APPOINTMENT</h2>
  <p style="font-family: Arial; font-size: 14px; color: #7f8c8d; margin-bottom: 25px;">Fill in the details below to schedule a new appointment</p>

  <form id="form1" name="form1" method="post" action="save_appointment.php">
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tbody>

          <!-- Row 1: Appointment ID (Auto) & Doctor -->
          <tr>
            <td width="50%" style="padding: 8px 15px 8px 0;">
              <label style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Appointment ID</label>
              <input type="text" name="appointment_id" id="appointment_id" value="APT-2025-001" readonly
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
                    echo '<option value="' . $doc['doctor_id'] . '">Dr. ' . $doc['first_name'] . ' ' . $doc['last_name'] . ' (' . $doc['specialization'] . ')</option>';
                }
                ?>
              </select>
            </td>
          </tr>

          <!-- Row 2: Patient & Time -->
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
              <label for="time" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Time</label>
              <select name="appointment_time" id="appointment_time" required
                style="width: 100%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none; background: #fff;">
                <option value="">-- Select Time --</option>
                <option value="09:00">09:00 AM</option>
                <option value="09:30">09:30 AM</option>
                <option value="10:00">10:00 AM</option>
                <option value="10:30">10:30 AM</option>
                <option value="11:00">11:00 AM</option>
                <option value="11:30">11:30 AM</option>
                <option value="12:00">12:00 PM</option>
                <option value="14:00">02:00 PM</option>
                <option value="14:30">02:30 PM</option>
                <option value="15:00">03:00 PM</option>
                <option value="15:30">03:30 PM</option>
                <option value="16:00">04:00 PM</option>
              </select>
            </td>
          </tr>

          <!-- Row 3: Date -->
          <tr>
            <td colspan="2" style="padding: 8px 0;">
              <label for="date" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Date</label>
              <input type="date" name="appointment_date" id="date"
                style="width: 49%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none;">
            </td>
          </tr>

          <!-- Row 4: Reason -->
          <tr>
            <td colspan="2" style="padding: 8px 0;">
              <label for="reason" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Reason</label>
              <textarea name="reason" id="reason" rows="3" placeholder="e.g., Chest pain, Fever, Check-up, etc."
                style="width: 100%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none; resize: vertical;"></textarea>
            </td>
          </tr>

          <!-- Row 5: Status -->
          <tr>
            <td colspan="2" style="padding: 8px 0;">
              <label for="status" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Status</label>
              <select name="status" id="status"
                style="width: 49%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none; background: #fff;">
                <option value="Scheduled">Scheduled</option>
                <option value="Confirmed">Confirmed</option>
                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>
                <option value="Cancelled">Cancelled</option>
                <option value="No Show">No Show</option>
              </select>
            </td>
          </tr>

          <!-- Submit Button -->
          <tr>
            <td colspan="2" style="padding: 20px 0 5px 0;">
              <input type="submit" name="submit" id="submit" value="SCHEDULE APPOINTMENT"
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

<!-- APPOINTMENTS LISTED Section -->
<div style="background: #ffffff; padding: 30px 20px; margin: 0 auto 20px; width: 92%; border: 1px solid #e0e0e0; border-radius: 10px; box-sizing: border-box;">

  <h2 style="font-family: Arial; font-size: 22px; font-weight: bold; color: #2c3e50; margin-bottom: 5px; margin-top: 0;">APPOINTMENTS LISTED</h2>
  <p style="font-family: Arial; font-size: 14px; color: #7f8c8d; margin-bottom: 20px;">List of all scheduled appointments in the system</p>

  <!-- Search and Filter Functionality -->
  <div style="margin-bottom: 20px; display: flex; justify-content: space-between; gap: 10px; flex-wrap: wrap; align-items: center;">
    <div style="display: flex; gap: 10px; align-items: center;">
      <span style="font-family: Arial; font-size: 14px; color: #34495e;">Search:</span>
      <input type="text" id="searchInput" placeholder="Search by patient, doctor, or ID..."
        style="width: 250px; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none;"
        onkeyup="searchAppointments()">
    </div>
    <div style="display: flex; gap: 10px; align-items: center;">
      <span style="font-family: Arial; font-size: 14px; color: #34495e;">Status:</span>
      <select id="statusFilter" onchange="filterByStatus()"
        style="width: 150px; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none; background: #fff;">
        <option value="All">All</option>
        <option value="Scheduled">Scheduled</option>
        <option value="Confirmed">Confirmed</option>
        <option value="Pending">Pending</option>
        <option value="Completed">Completed</option>
        <option value="Cancelled">Cancelled</option>
      </select>
      <button onclick="resetFilters()"
        style="background-color: #95a5a6; color: #ffffff; border: none; padding: 9px 15px; border-radius: 6px; font-family: Arial; font-size: 14px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;"
        onmouseover="this.style.backgroundColor='#7f8c8d'; this.style.transform='scale(1.02)';"
        onmouseout="this.style.backgroundColor='#95a5a6'; this.style.transform='scale(1)';">Reset</button>
    </div>
  </div>

  <table width="100%" border="0" cellpadding="0" cellspacing="0" id="appointmentTable" style="border-collapse: collapse; border: 1px solid #ddd;">
    <thead>
        <tr style="background: #2c3e50; border-bottom: 2px solid #3498db;">
            <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Appt ID</th>
            <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Patient</th>
            <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Doctor</th>
            <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Date</th>
            <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Time</th>
            <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Reason</th>
            <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Status</th>
            <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT a.*, 
                  p.first_name as pat_fname, p.last_name as pat_lname, 
                  d.first_name as doc_fname, d.last_name as doc_lname 
                  FROM Appointment a
                  JOIN Patient p ON a.patient_id = p.patient_id
                  JOIN Doctor d ON a.doctor_id = d.doctor_id
                  ORDER BY a.appointment_date DESC, a.appointment_time DESC";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            $row_count = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $row_count++;
                $bg_color = ($row_count % 2 == 0) ? '#f9f9f9' : '#ffffff';
                
                // Status badge color
                $status_class = '';
                $status_color = '';
                switch($row['status']) {
                    case 'Scheduled':
                        $status_color = '#f39c12';
                        break;
                    case 'Confirmed':
                        $status_color = '#2ecc71';
                        break;
                    case 'Completed':
                        $status_color = '#3498db';
                        break;
                    case 'Pending':
                        $status_color = '#e74c3c';
                        break;
                    case 'Cancelled':
                        $status_color = '#95a5a6';
                        break;
                    default:
                        $status_color = '#7f8c8d';
                }
                
                // Format time (e.g., 14:30:00 → 02:30 PM)
                $formatted_time = date('g:i A', strtotime($row['appointment_time']));
                
                echo '<tr style="background: ' . $bg_color . '; border-bottom: 1px solid #eee;">';
                echo '<td style="padding: 10px 12px;">APT-' . str_pad($row['appointment_id'], 4, '0', STR_PAD_LEFT) . '</td>';
                echo '<td style="padding: 10px 12px;">' . htmlspecialchars($row['pat_fname']) . ' ' . htmlspecialchars($row['pat_lname']) . '</td>';
                echo '<td style="padding: 10px 12px;">Dr. ' . htmlspecialchars($row['doc_fname']) . ' ' . htmlspecialchars($row['doc_lname']) . '</td>';
                echo '<td style="padding: 10px 12px;">' . $row['appointment_date'] . '</td>';
                echo '<td style="padding: 10px 12px;">' . $formatted_time . '</td>';
                echo '<td style="padding: 10px 12px;">' . htmlspecialchars($row['reason']) . '</td>';
                echo '<td style="padding: 10px 12px;"><span style="background: ' . $status_color . '; color: white; padding: 4px 10px; border-radius: 20px; font-size: 12px; display: inline-block;">' . $row['status'] . '</span></td>';
                echo '<td style="padding: 10px 12px;">';
                echo '<a href="edit_appointment.php?id=' . $row['appointment_id'] . '" style="background: none; border: none; cursor: pointer; font-size: 18px; margin-right: 8px; color: #3498db; text-decoration: none;">✏️</a>';
                echo '<a href="appointments.php?delete_id=' . $row['appointment_id'] . '" onclick="return confirm(\'Delete this appointment?\')" style="background: none; border: none; cursor: pointer; font-size: 18px; color: #e74c3c; text-decoration: none;">🗑️</a>';
                echo '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="8" style="text-align: center; padding: 30px;">No appointments found. Schedule your first appointment above.</td></tr>';
        }
        ?>
    </tbody>
  </table>
</div>

<script type="text/javascript">
  // Auto-set today's date as default
  document.getElementById('date').value = new Date().toISOString().split('T')[0];

  // Auto-generate Appointment ID
  let appointmentCounter = 5;
  function generateAppointmentID() {
    appointmentCounter++;
    let newID = 'APT-' + String(appointmentCounter).padStart(3, '0');
    document.getElementById('appointment_id').value = newID;
    return newID;
  }

  // Schedule Appointment Function
  function scheduleAppointment(event) {
    event.preventDefault();
    
    let appointmentID = generateAppointmentID();
    let patient = document.getElementById('patient').value;
    let doctor = document.getElementById('doctor').value;
    let date = document.getElementById('date').value;
    let time = document.getElementById('time').value;
    let reason = document.getElementById('reason').value;
    let status = document.getElementById('status').value;
    
    if(!patient || !doctor || !date || !time) {
      alert('Please fill in required fields: Patient, Doctor, Date, and Time');
      return false;
    }
    
    alert('Appointment scheduled successfully!\nAppointment ID: ' + appointmentID + '\nPatient: ' + patient + '\nDoctor: ' + doctor + '\nDate: ' + date + '\nTime: ' + time);
    
    // Clear form
    document.getElementById('form1').reset();
    document.getElementById('date').value = new Date().toISOString().split('T')[0];
    document.getElementById('status').value = 'Scheduled';
    document.getElementById('appointment_id').value = generateAppointmentID();
    
    return false;
  }


  // Search Functionality
  function searchAppointments() {
    let input = document.getElementById('searchInput').value.toLowerCase();
    let table = document.getElementById('appointmentTable');
    let rows = table.getElementsByTagName('tr');
    
    for(let i = 1; i < rows.length; i++) {
      let row = rows[i];
      let cells = row.getElementsByTagName('td');
      let found = false;
      
      if(cells.length > 0) {
        let apptID = cells[0].innerText.toLowerCase();
        let patient = cells[1].innerText.toLowerCase();
        let doctor = cells[2].innerText.toLowerCase();
        
        if(apptID.includes(input) || patient.includes(input) || doctor.includes(input)) {
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
    let table = document.getElementById('appointmentTable');
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
    
    let table = document.getElementById('appointmentTable');
    let rows = table.getElementsByTagName('tr');
    
    for(let i = 1; i < rows.length; i++) {
      rows[i].style.display = '';
    }
  }

  // Edit Appointment Function
  function editAppointment(apptID) {
    alert('Edit appointment: ' + apptID + '\nThis would open edit form in a real application.');
  }

  // Delete Appointment Function
  function deleteAppointment(button) {
    if(confirm('Are you sure you want to delete this appointment?')) {
      let row = button.parentElement.parentElement;
      row.remove();
      alert('Appointment deleted successfully!');
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
