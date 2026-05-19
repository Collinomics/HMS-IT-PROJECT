<?php
include('config.php');

// Show success message
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'added') {
        echo '<div style="background: #d4edda; color: #155724; padding: 8px 15px; margin: 5px 20px; border-radius: 4px; font-size: 13px; text-align: center;">Patient added successfully!</div>';
    }
}

// Delete patient
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    mysql_query("DELETE FROM Patient WHERE patient_id = $delete_id");
    header("Location: patient.php?msg=deleted");
    exit();
}
?>
<!doctype html>
<html><head>
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
                  <td align="left"><span style="font-size: 28px; font-weight: 700; color: #2c3e50; font-family: Helvetica;">CITY HOSPITAL</span></td>
                </tr>
                <tr>
                  <td align="left"><span style="font-size: 16px; font-family: sans-serif; font-style: italic; color: #7f8c8d;">Caring for your health</span></td>
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

<!-- Add Patient Section -->
<div style="background: #ffffff; padding: 30px 20px; margin: 20px auto; width: 92%; border: 1px solid #e0e0e0; border-radius: 10px; box-sizing: border-box;">

  <h2 style="font-family: Arial; font-size: 22px; font-weight: bold; color: #2c3e50; margin-bottom: 5px; margin-top: 0;">ADD PATIENT</h2>
  <p style="font-family: Arial; font-size: 14px; color: #7f8c8d; margin-bottom: 25px;">Fill in the details below to register a new patient</p>

  <form id="form1" name="patient_form" method="post" action="save_patient.php">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tbody>

        <!-- Row 1: Patient ID (Auto) -->
        <tr>
          <td colspan="2" style="padding: 8px 0;">
            <label style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Patient ID</label>
            <input type="text" name="patient_id" id="patient_id" value="PAT-2025-001" readonly
              style="width: 49%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #7f8c8d; background: #f5f5f5; box-sizing: border-box; outline: none;">
          </td>
        </tr>

        <!-- Row 2: First name & Last name -->
        <tr>
          <td width="50%" style="padding: 8px 15px 8px 0;">
            <label for="firstname" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">First Name</label>
            <input type="text" name="first_name" id="firstname" placeholder="Enter first name"
              style="width: 100%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none;">
          </td>
          <td width="50%" style="padding: 8px 0 8px 15px;">
            <label for="lastname" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Last Name</label>
            <input type="text" name="last_name" id="lastname" placeholder="Enter last name"
              style="width: 100%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none;">
          </td>
        </tr>

        <!-- Row 3: DOB & Gender -->
        <tr>
          <td style="padding: 8px 15px 8px 0;">
            <label for="dob" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Date of Birth</label>
            <input type="date" name="dob" id="dob"
              style="width: 100%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none;">
          </td>
          <td style="padding: 8px 0 8px 15px;">
            <label style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 10px;">Gender</label>
            <label style="font-family: Arial; font-size: 14px; color: #34495e; margin-right: 20px; cursor: pointer;">
              <input type="radio" name="gender" value="Male" style="margin-right: 5px;"> Male
            </label>
            <label style="font-family: Arial; font-size: 14px; color: #34495e; cursor: pointer;">
              <input type="radio" name="gender" value="Female" style="margin-right: 5px;"> Female
            </label>
          </td>
        </tr>

        <!-- Row 4: Blood Type & Phone -->
        <tr>
          <td style="padding: 8px 15px 8px 0;">
            <label for="bloodtype" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Blood Type</label>
            <select name="blood_type" id="bloodtype"
              style="width: 100%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none; background: #fff;">
              <option value="">-- Select --</option>
              <option value="A+">A+</option>
              <option value="A-">A-</option>
              <option value="B+">B+</option>
              <option value="B-">B-</option>
              <option value="AB+">AB+</option>
              <option value="AB-">AB-</option>
              <option value="O+">O+</option>
              <option value="O-">O-</option>
            </select>
          </td>
          <td style="padding: 8px 0 8px 15px;">
            <label for="phone" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Phone Number</label>
            <input type="tel" name="phone" id="phone" placeholder="e.g. +256 700 000 000"
              style="width: 100%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none;">
          </td>
        </tr>

        <!-- Row 5: Address -->
        <tr>
          <td colspan="2" style="padding: 8px 0;">
            <label for="address" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Address</label>
            <input type="text" name="address" id="address" placeholder="Enter full address"
              style="width: 100%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none;">
          </td>
        </tr>

        <!-- Row 6: Emergency Contact -->
        <tr>
          <td colspan="2" style="padding: 8px 0;">
            <label for="emergency" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Emergency Contact</label>
            <input type="tel" name="emergency_contact" id="emergency" placeholder="e.g. +256 700 000 000"
              style="width: 49%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none;">
          </td>
        </tr>

        <!-- Row 7: Registration Date (Auto) -->
        <tr>
          <td colspan="2" style="padding: 8px 0;">
            <label style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Registration Date</label>
            <input type="text" name="Y-m-d" id="reg_date" readonly
              style="width: 49%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #7f8c8d; background: #f5f5f5; box-sizing: border-box; outline: none;">
          </td>
        </tr>

        <!-- Submit Buttons -->
        <tr>
          <td colspan="2" style="padding: 20px 0 5px 0;">
			  <input type="submit" name="submit" id="submit" value="Register Patient"
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

<!-- Available Patients Section -->
<div style="background: #ffffff; padding: 30px 20px; margin: 0 auto 20px; width: 92%; border: 1px solid #e0e0e0; border-radius: 10px; box-sizing: border-box;">

  <h2 style="font-family: Arial; font-size: 22px; font-weight: bold; color: #2c3e50; margin-bottom: 5px; margin-top: 0;">AVAILABLE PATIENTS</h2>
  <p style="font-family: Arial; font-size: 14px; color: #7f8c8d; margin-bottom: 20px;">List of all registered patients in the system</p>

  <!-- Search Functionality -->
  <div style="margin-bottom: 20px; display: flex; justify-content: flex-end; gap: 10px; flex-wrap: wrap;">
    <input type="text" id="searchInput" placeholder="Search by name, ID, or phone..."
      style="width: 300px; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none;"
      onkeyup="searchPatients()">
    <button onclick="searchPatients()"
	  style="background-color: #3498db; color: #ffffff; border: none; padding: 9px 20px; border-radius: 6px; font-family: Arial; font-size: 14px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;"
	  onmouseover="this.style.backgroundColor='#2980b9'; this.style.transform='scale(1.05)';"
	  onmouseout="this.style.backgroundColor='#3498db'; this.style.transform='scale(1)';">Search</button>
  </div>

  <table width="100%" border="0" cellpadding="0" cellspacing="0" id="patientTable" style="border-collapse: collapse; border: 1px solid #ddd;">
    <tbody>
      <!-- Header Row -->
      <tr style="background: #2c3e50; border-bottom: 2px solid #3498db;">
        <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Patient ID</th>
        <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Name</th>
        <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">D.O.B</th>
        <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Gender</th>
        <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Blood Type</th>
        <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Phone</th>
        <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Emergency</th>
        <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Reg Date</th>
        <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Actions</th>
      </tr>

      <?php
        // Query to get all patients from database
        $query = "SELECT * FROM Patient ORDER BY patient_id ASC";
        $result = mysql_query($query);

        // Check if there are any patients
        if (mysql_num_rows($result) > 0) {
            $row_count = 0;
            // Loop through each patient
            while ($row = mysql_fetch_assoc($result)) {
                $row_count++;
                // Alternate row background color
                $bg_color = ($row_count % 2 == 0) ? '#f9f9f9' : '#ffffff';
                
                echo '<tr style="background: ' . $bg_color . '; border-bottom: 1px solid #eee; cursor: pointer;" 
                          onmouseover="this.style.background=\'#f1f1f1\';" 
                          onmouseout="this.style.background=\'' . $bg_color . '\';">';
                
                echo '<td style="padding: 10px 12px; font-family: Arial; font-size: 14px; color: #34495e;">PAT-' . str_pad($row['patient_id'], 3, '0', STR_PAD_LEFT) . '</td>';
                
                echo '<td style="padding: 10px 12px; font-family: Arial; font-size: 14px; color: #34495e;">' . htmlspecialchars($row['first_name']) . ' ' . htmlspecialchars($row['last_name']) . '</td>';
                
                echo '<td style="padding: 10px 12px; font-family: Arial; font-size: 14px; color: #34495e;">' . $row['date_of_birth'] . '</td>';
                
                echo '<td style="padding: 10px 12px; font-family: Arial; font-size: 14px; color: #34495e;">' . $row['gender'] . '</td>';
                
                echo '<td style="padding: 10px 12px; font-family: Arial; font-size: 14px; color: #34495e;">' . $row['blood_type'] . '</td>';
                
                echo '<td style="padding: 10px 12px; font-family: Arial; font-size: 14px; color: #34495e;">' . $row['phone'] . '</td>';
                
                echo '<td style="padding: 10px 12px; font-family: Arial; font-size: 14px; color: #34495e;">' . htmlspecialchars($row['emergency_contact_name']) . '</td>';
                
                echo '<td style="padding: 10px 12px; font-family: Arial; font-size: 14px; color: #34495e;">' . $row['registration_date'] . '</td>';
                
                echo '<td style="padding: 10px 12px;">';
                echo '<a href="edit_patient.php?id=' . $row['patient_id'] . '" style="text-decoration: none; font-size: 18px; margin-right: 12px; color: #3498db;">✏️</a>';
                echo '<a href="patient.php?delete_id=' . $row['patient_id'] . '" onclick="return confirm(\'Delete this patient?\')" style="text-decoration: none; font-size: 18px; color: #e74c3c;">🗑️</a>';
                echo '</td>';
                
                echo '</tr>';
            }
        } else {
            // If no patients found
            echo '<tr><td colspan="9" style="text-align: center; padding: 20px;">No patients found. Add your first patient above.</td></tr>';
        }
      ?>
    </tbody>
  </table>

</div>

<script type="text/javascript">
  // Auto-set registration date to today
  document.getElementById('reg_date').value = new Date().toISOString().split('T')[0];

  // Auto-generate Patient ID (simple counter)
  let patientCounter = 3;
  function generatePatientID() {
    patientCounter++;
    let newID = 'PAT-' + String(patientCounter).padStart(3, '0');
    document.getElementById('patient_id').value = newID;
    return newID;
  }

  // Register Patient Function
  function registerPatient(event) {
    event.preventDefault();
    
    let firstName = document.getElementById('firstname').value;
    let lastName = document.getElementById('lastname').value;
    let dob = document.getElementById('dob').value;
    let gender = document.querySelector('input[name="gender"]:checked');
    let bloodType = document.getElementById('bloodtype').value;
    let phone = document.getElementById('phone').value;
    let address = document.getElementById('address').value;
    let emergency = document.getElementById('emergency').value;
    let regDate = document.getElementById('reg_date').value;
    let patientID = generatePatientID();
    
    if(!firstName || !lastName || !phone) {
      alert('Please fill in required fields: First Name, Last Name, and Phone');
      return false;
    }
    
    alert('Patient ' + firstName + ' ' + lastName + ' registered successfully!\nPatient ID: ' + patientID);
    
    // Clear form
    document.getElementById('form1').reset();
    document.getElementById('reg_date').value = new Date().toISOString().split('T')[0];
    
    return false;
  }

  // Search Functionality
  function searchPatients() {
    let input = document.getElementById('searchInput').value.toLowerCase();
    let table = document.getElementById('patientTable');
    let rows = table.getElementsByTagName('tr');
    
    for(let i = 1; i < rows.length; i++) {
      let row = rows[i];
      let cells = row.getElementsByTagName('td');
      let found = false;
      
      if(cells.length > 0) {
        let patientID = cells[0].innerText.toLowerCase();
        let name = cells[1].innerText.toLowerCase();
        let phone = cells[5].innerText.toLowerCase();
        
        if(patientID.includes(input) || name.includes(input) || phone.includes(input)) {
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

  // Edit Patient Function
  function editPatient(patientID) {
    alert('Edit patient: ' + patientID + '\nThis would open edit form in a real application.');
  }

  // Delete Patient Function
  function deletePatient(button) {
    if(confirm('Are you sure you want to delete this patient?')) {
      let row = button.parentElement.parentElement;
      row.remove();
      alert('Patient deleted successfully!');
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