<?php
include('config.php');

// Delete doctor
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    mysql_query("DELETE FROM Doctor WHERE doctor_id = $delete_id");
    header("Location: doctors.php?msg=deleted");
    exit();
}

// Show success message
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'deleted') {
        echo '<div style="background: #d4edda; color: #155724; padding: 8px 15px; margin: 5px 20px; border-radius: 4px; font-size: 13px; text-align: center;">Doctor deleted successfully!</div>';
    }
    if ($_GET['msg'] == 'added') {
        echo '<div style="background: #d4edda; color: #155724; padding: 8px 15px; margin: 5px 20px; border-radius: 4px; font-size: 13px; text-align: center;">Doctor added successfully!</div>';
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
<!-- ADD DOCTOR Section -->
<div style="background: #ffffff; padding: 30px 20px; margin: 20px auto; width: 92%; border: 1px solid #e0e0e0; border-radius: 10px; box-sizing: border-box;">

  <h2 style="font-family: Arial; font-size: 22px; font-weight: bold; color: #2c3e50; margin-bottom: 5px; margin-top: 0;">ADD NEW DOCTOR</h2>
  <p style="font-family: Arial; font-size: 14px; color: #7f8c8d; margin-bottom: 25px;">Fill in the details below to register a new doctor</p>

  <form id="form1" name="doctors_form" method="post"  action="save_doctor.php">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tbody>

        <!-- Row 1: Doctor ID (Auto) & Email -->
        <tr>
          <td width="50%" style="padding: 8px 15px 8px 0;">
            <label style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Doctor ID</label>
            <input type="text" name="doctor_id" id="doctor_id" value="DOC-2025-001" readonly
              style="width: 100%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #7f8c8d; background: #f5f5f5; box-sizing: border-box; outline: none;">
          </td>
          <td width="50%" style="padding: 8px 0 8px 15px;">
            <label for="email" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Email</label>
            <input type="email" name="email" id="email" placeholder="e.g. doctor@cityhospital.com"
              style="width: 100%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none;">
          </td>
        </tr>

        <!-- Row 2: First Name & Department -->
        <tr>
          <td width="50%" style="padding: 8px 15px 8px 0;">
            <label for="firstname" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">First Name</label>
            <input type="text" name="first_name" id="firstname" placeholder="Enter first name"
              style="width: 100%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none;">
          </td>
          <td width="50%" style="padding: 8px 0 8px 15px;">
            <label for="department" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Department</label>
            <select name="department_id" id="department" required
              style="width: 100%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none; background: #fff;">
              <option value="">-- Select --</option>
              <?php
                $dept_query = "SELECT * FROM Department ORDER BY department_name";
                $dept_result = mysql_query($dept_query);
                while ($dept = mysql_fetch_assoc($dept_result)) {
                    echo '<option value="' . $dept['department_id'] . '">' . $dept['department_name'] . '</option>';
                }
                ?>
            </select>
          </td>
        </tr>

        <!-- Row 3: Last Name & License Number -->
        <tr>
          <td width="50%" style="padding: 8px 15px 8px 0;">
            <label for="lastname" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Last Name</label>
            <input type="text" name="last_name" id="lastname" placeholder="Enter last name"
              style="width: 100%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none;">
          </td>
          <td width="50%" style="padding: 8px 0 8px 15px;">
            <label for="license" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">License Number</label>
            <input type="text" name="license_number" id="license" placeholder="e.g. MED-2025-001"
              style="width: 100%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none;">
          </td>
        </tr>

        <!-- Row 4: Specialization & Hire Date -->
        <tr>
          <td width="50%" style="padding: 8px 15px 8px 0;">
            <label for="specialization" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Specialization</label>
            <input type="text" name="specialization" id="specialization" placeholder="e.g. Interventional Cardiology"
              style="width: 100%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none;">
          </td>
          <td width="50%" style="padding: 8px 0 8px 15px;">
            <label for="hiredate" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Hire Date</label>
            <input type="date" name="hire_date" id="hiredate"
              style="width: 100%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none;">
          </td>
        </tr>

        <!-- Row 5: Phone Number (Full width) -->
        <tr>
          <td colspan="2" style="padding: 8px 0;">
            <label for="phone" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Phone Number</label>
            <input type="tel" name="phone" id="phone" placeholder="e.g. +256 700 000 000"
              style="width: 49%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none;">
          </td>
        </tr>

        <!-- Submit Button -->
        <tr>
          <td colspan="2" style="padding: 20px 0 5px 0;">
            <input type="submit" name="submit" id="submit" value="REGISTER DOCTOR"
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

<!-- DOCTORS LISTED Section -->
<div style="background: #ffffff; padding: 30px 20px; margin: 0 auto 20px; width: 92%; border: 1px solid #e0e0e0; border-radius: 10px; box-sizing: border-box;">

  <h2 style="font-family: Arial; font-size: 22px; font-weight: bold; color: #2c3e50; margin-bottom: 5px; margin-top: 0;">DOCTORS LISTED</h2>
  <p style="font-family: Arial; font-size: 14px; color: #7f8c8d; margin-bottom: 20px;">List of all registered doctors in the system</p>

  <!-- Search Functionality -->
  <div style="margin-bottom: 20px; display: flex; justify-content: flex-end; gap: 10px; flex-wrap: wrap;">
    <input type="text" id="searchInput" placeholder="Search by name, ID, department, or phone..."
      style="width: 300px; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none;"
      onkeyup="searchDoctors()">
    <button onclick="searchDoctors()"
      style="background-color: #3498db; color: #ffffff; border: none; padding: 9px 20px; border-radius: 6px; font-family: Arial; font-size: 14px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;"
      onmouseover="this.style.backgroundColor='#2980b9'; this.style.transform='scale(1.05)';"
      onmouseout="this.style.backgroundColor='#3498db'; this.style.transform='scale(1)';">Search</button>
  </div>

  <table width="100%" border="0" cellpadding="0" cellspacing="0" id="doctorTable" style="border-collapse: collapse; border: 1px solid #ddd;">
    <tbody>
      <!-- Header Row -->
      <tr style="background: #2c3e50; border-bottom: 2px solid #3498db;">
        <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Doctor ID</th>
        <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">First Name</th>
        <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Last Name</th>
        <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Department</th>
        <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Specialization</th>
        <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">License No.</th>
        <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Phone</th>
        <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Email</th>
        <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Hire Date</th>
        <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Actions</th>
      </tr>

      <?php
        $query = "SELECT * FROM Doctor ORDER BY doctor_id ASC";
        $result = mysql_query($query);

        if (mysql_num_rows($result) > 0) {
            $row_count = 0;
            while ($row = mysql_fetch_assoc($result)) {
                $row_count++;
                $bg_color = ($row_count % 2 == 0) ? '#f9f9f9' : '#ffffff';
                
                // Get department name from department_id
                $dept_id = $row['department_id'];
                $dept_query = "SELECT department_name FROM Department WHERE department_id = $dept_id";
                $dept_result = mysql_query($dept_query);
                $dept_row = mysql_fetch_assoc($dept_result);
                $dept_name = $dept_row ? $dept_row['department_name'] : 'Unknown';
                
                echo '<tr style="background: ' . $bg_color . '; border-bottom: 1px solid #eee;">';
                echo '<td style="padding: 10px 12px;">DOC-' . str_pad($row['doctor_id'], 3, '0', STR_PAD_LEFT) . '</td>';
                echo '<td style="padding: 10px 12px;">' . htmlspecialchars($row['first_name']) . '</td>';
                echo '<td style="padding: 10px 12px;">' . htmlspecialchars($row['last_name']) . '</td>';
                echo '<td style="padding: 10px 12px;">' . htmlspecialchars($dept_name) . '</td>';
                echo '<td style="padding: 10px 12px;">' . htmlspecialchars($row['specialization']) . '</td>';
                echo '<td style="padding: 10px 12px;">' . htmlspecialchars($row['license_number']) . '</td>';
                echo '<td style="padding: 10px 12px;">' . $row['phone'] . '</td>';
                echo '<td style="padding: 10px 12px;">' . $row['email'] . '</td>';
                echo '<td style="padding: 10px 12px;">' . $row['hire_date'] . '</td>';
                
                // Actions column
                echo '<td style="padding: 10px 12px;">';
                echo '<a href="edit_doctor.php?id=' . $row['doctor_id'] . '" style="text-decoration: none; font-size: 16px; margin-right: 12px; color: #3498db;">✏️</a>';
                echo '<a href="doctors.php?delete_id=' . $row['doctor_id'] . '" onclick="return confirm(\'Delete this doctor?\')" style="text-decoration: none; font-size: 16px; color: #e74c3c;">🗑️</a>';
                echo '</td>';
                
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="10" style="text-align: center; padding: 20px;">No doctors found. Add your first doctor above.</td></tr>';
        }
        ?>

    </tbody>
  </table>
</div>

<script type="text/javascript">
  // Auto-set registration date to today
  document.getElementById('reg_date').value = new Date().toISOString().split('T')[0];

  // Auto-generate Doctor ID
  let doctorCounter = 3;
  function generateDoctorID() {
    doctorCounter++;
    let newID = 'DOC-' + String(doctorCounter).padStart(3, '0');
    document.getElementById('doctor_id').value = newID;
    return newID;
  }

  // Search Functionality
  function searchDoctors() {
    let input = document.getElementById('searchInput').value.toLowerCase();
    let table = document.getElementById('doctorTable');
    let rows = table.getElementsByTagName('tr');
    
    for(let i = 1; i < rows.length; i++) {
      let row = rows[i];
      let cells = row.getElementsByTagName('td');
      let found = false;
      
      if(cells.length > 0) {
        let doctorID = cells[0].innerText.toLowerCase();
        let name = cells[1].innerText.toLowerCase();
        let phone = cells[4].innerText.toLowerCase();
        
        if(doctorID.includes(input) || name.includes(input) || phone.includes(input)) {
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

  // Edit Doctor Function
  function editDoctor(doctorID) {
    alert('Edit doctor: ' + doctorID + '\nThis would open edit form in a real application.');
  }

  // Delete Doctor Function
  function deleteDoctor(button) {
    if(confirm('Are you sure you want to delete this doctor?')) {
      let row = button.parentElement.parentElement;
      row.remove();
      alert('Doctor deleted successfully!');
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
