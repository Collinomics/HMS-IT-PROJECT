<?php
include('config.php');

// Delete department
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    mysql_query("DELETE FROM Department WHERE department_id = $delete_id");
    header("Location: departments.php?msg=deleted");
    exit();
}

// Show success messages
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'deleted') {
        echo '<div style="background: #d4edda; color: #155724; padding: 8px 15px; margin: 5px 20px; border-radius: 4px; font-size: 13px; text-align: center;">Department deleted successfully!</div>';
    }
    if ($_GET['msg'] == 'added') {
        echo '<div style="background: #d4edda; color: #155724; padding: 8px 15px; margin: 5px 20px; border-radius: 4px; font-size: 13px; text-align: center;">Department added successfully!</div>';
    }
    if ($_GET['msg'] == 'updated') {
        echo '<div style="background: #d4edda; color: #155724; padding: 8px 15px; margin: 5px 20px; border-radius: 4px; font-size: 13px; text-align: center;">Department updated successfully!</div>';
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
<!-- ADD NEW DEPARTMENT Section -->
<div style="background: #ffffff; padding: 30px 20px; margin: 20px auto; width: 92%; border: 1px solid #e0e0e0; border-radius: 10px; box-sizing: border-box;">

  <h2 style="font-family: Arial; font-size: 22px; font-weight: bold; color: #2c3e50; margin-bottom: 5px; margin-top: 0;">ADD NEW DEPARTMENT</h2>
  <p style="font-family: Arial; font-size: 14px; color: #7f8c8d; margin-bottom: 25px;">Fill in the details below to add a new department</p>

  <form id="form1" name="departments_form" method="post" action="save_department.php">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tbody>

        <!-- Row 1: Department ID (Auto) & Department Name -->
        <tr>
          <td width="50%" style="padding: 8px 15px 8px 0;">
            <label style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Department ID</label>
            <input type="text" name="dept_id" id="dept_id" value="DEPT-001" readonly
              style="width: 100%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #7f8c8d; background: #f5f5f5; box-sizing: border-box; outline: none;">
          </td>
          <td width="50%" style="padding: 8px 0 8px 15px;">
            <label for="dept_name" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Department Name</label>
            <input type="text" name="department_name" id="dept_name" placeholder="Enter department name"
              style="width: 100%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none;">
          </td>
        </tr>

        <!-- Row 2: Location -->
        <tr>
          <td colspan="2" style="padding: 8px 0;">
            <label for="location" style="font-family: Arial; font-size: 13px; font-weight: 600; color: #34495e; display: block; margin-bottom: 5px;">Location</label>
            <input type="text" name="location" id="location" placeholder="e.g. Building A, Floor 2"
              style="width: 49%; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none;">
          </td>
        </tr>

        <!-- Submit Button -->
        <tr>
          <td colspan="2" style="padding: 20px 0 5px 0;">
            <input type="submit" name="submit" id="submit" value="ADD DEPARTMENT"
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

<!-- DEPARTMENTS LISTED Section -->
<div style="background: #ffffff; padding: 30px 20px; margin: 0 auto 20px; width: 92%; border: 1px solid #e0e0e0; border-radius: 10px; box-sizing: border-box;">

  <h2 style="font-family: Arial; font-size: 22px; font-weight: bold; color: #2c3e50; margin-bottom: 5px; margin-top: 0;">DEPARTMENTS</h2>
  <p style="font-family: Arial; font-size: 14px; color: #7f8c8d; margin-bottom: 20px;">List of all departments in the hospital</p>

  <!-- Search Functionality -->
  <div style="margin-bottom: 20px; display: flex; justify-content: flex-end; gap: 10px; flex-wrap: wrap;">
    <div style="display: flex; gap: 10px; align-items: center;">
      <input type="text" id="searchInput" placeholder="SEARCH DEPARTMENTS..."
        style="width: 250px; padding: 9px 12px; border: 1px solid #ddd; border-radius: 6px; font-family: Arial; font-size: 14px; color: #34495e; box-sizing: border-box; outline: none;"
        onkeyup="searchDepartments()">
      <button onclick="searchDepartments()"
        style="background-color: #3498db; color: #ffffff; border: none; padding: 9px 20px; border-radius: 6px; font-family: Arial; font-size: 14px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;"
        onmouseover="this.style.backgroundColor='#2980b9'; this.style.transform='scale(1.05)';"
        onmouseout="this.style.backgroundColor='#3498db'; this.style.transform='scale(1)';">SEARCH</button>
    </div>
  </div>

  <table width="100%" border="0" cellpadding="0" cellspacing="0" id="departmentsTable" style="border-collapse: collapse; border: 1px solid #ddd;">
     <thead>
        <tr style="background: #2c3e50; border-bottom: 2px solid #3498db;">
            <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Dept ID</th>
            <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Department Name</th>
            <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Location</th>
            <th style="font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left; font-size: 14px;">Actions</th>
        </tr>
    </thead>
  
    <tbody>
            <?php
            $query = "SELECT * FROM Department ORDER BY department_id ASC";
            $result = mysql_query($query);

            if (mysql_num_rows($result) > 0) {
                $row_count = 0;
                while ($row = mysql_fetch_assoc($result)) {
                    $row_count++;
                    $bg_color = ($row_count % 2 == 0) ? '#f9f9f9' : '#ffffff';
                    
                    echo '<tr style="background: ' . $bg_color . '; border-bottom: 1px solid #eee;">';
                    echo '<td style="padding: 10px 12px;">DPT-' . str_pad($row['department_id'], 3, '0', STR_PAD_LEFT) . '</td>';
                    echo '<td style="padding: 10px 12px;">' . htmlspecialchars($row['department_name']) . '</td>';
                    echo '<td style="padding: 10px 12px;">' . htmlspecialchars($row['location']) . '</td>';
                    echo '<td style="padding: 10px 12px;">';
                    echo '<a href="edit_department.php?id=' . $row['department_id'] . '" class="edit-link">✏️ Edit</a>';
                    echo '<a href="departments.php?delete_id=' . $row['department_id'] . '" class="delete-link" onclick="return confirm(\'Delete this department?\')">🗑️ Delete</a>';
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="4" style="text-align: center; padding: 30px;">No departments found. Add your first department above.</td></tr>';
            }
            ?>
        </tbody>
  </table>
</div>

<script type="text/javascript">
  // Auto-generate Department ID
  let deptCounter = 6;
  function generateDeptID() {
    deptCounter++;
    let newID = 'DEPT-' + String(deptCounter).padStart(3, '0');
    document.getElementById('dept_id').value = newID;
    return newID;
  }

  // Add Department Function
  function addDepartment(event) {
    event.preventDefault();
    
    let deptID = generateDeptID();
    let deptName = document.getElementById('dept_name').value;
    let location = document.getElementById('location').value;
    
    if(!deptName || !location) {
      alert('Please fill in all required fields: Department Name and Location');
      return false;
    }
    
    alert('Department added successfully!\nDepartment ID: ' + deptID + '\nDepartment: ' + deptName + '\nLocation: ' + location);
    
    // Clear form
    document.getElementById('form1').reset();
    document.getElementById('dept_id').value = generateDeptID();
    
    return false;
  }

  // Search Functionality
  function searchDepartments() {
    let input = document.getElementById('searchInput').value.toLowerCase();
    let table = document.getElementById('departmentsTable');
    let rows = table.getElementsByTagName('tr');
    
    for(let i = 1; i < rows.length; i++) {
      let row = rows[i];
      let cells = row.getElementsByTagName('td');
      let found = false;
      
      if(cells.length > 0) {
        let deptID = cells[0].innerText.toLowerCase();
        let deptName = cells[1].innerText.toLowerCase();
        let location = cells[2].innerText.toLowerCase();
        
        if(deptID.includes(input) || deptName.includes(input) || location.includes(input)) {
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

  // Edit Department Function
  function editDepartment(deptID) {
    alert('Edit department: ' + deptID + '\nThis would open edit form in a real application.');
  }

  // Delete Department Function
  function deleteDepartment(button) {
    if(confirm('Are you sure you want to delete this department?')) {
      let row = button.parentElement.parentElement;
      row.remove();
      alert('Department deleted successfully!');
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
