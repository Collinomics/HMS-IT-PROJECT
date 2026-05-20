<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('config.php');
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="City Hospital - Quality healthcare services in Kampala, Uganda">
<meta name="keywords" content="hospital, healthcare, doctors, appointments, Kampala, Uganda">
<title>City Hospital - Quality Healthcare for Every Patient</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<div class="manage" style="padding: 2px 0; font-size: 12px; color: white; background-color: #2c3e50; letter-spacing: 1px; font-family: arial; text-align: center;">HOSPITAL MANAGEMENT INFORMATION SYSTEM</div>
<!-- Top Bar -->
<table width="99%" height="10" border="0" cellpadding="0" cellspacing="0" class="top-bar">
  <tbody>
    <tr bgcolor="#F8F9FA" style="font-family: Arial; color: #555555;">
      <td width="31%" style="text-align: center">📞 <a href="tel:+256756950472">+256 756 950 472</a></td>
      <td width="35%" style="text-align: center">📍 <a href="https://maps.google.com/?q=Kampala+Uganda+Hospital">Kampala, Uganda</a></td>
      <td width="34%" style="text-align: center"><table width="100%" border="0" cellpadding="2">
        <tbody>
          <tr style="text-align: center">
            <td width="153" style="text-align: right; font-weight: bold;">Follow us:</td>
            <td width="25"><a href="https://www.twitter.com/hospitalpage"><img src="resources/twitter.png" width="15" height="15" alt="Twitter"/></a></td>
            <td width="25"><a href="https://www.facebook.com/hospitalpage"><img src="resources/facebook.png" width="15" height="15" alt="Facebook"/></a></td>
            <td width="25"><a href="https://www.linkedin.com/company/hospital"><img src="resources/linkedin.png" width="15" height="15" alt="LinkedIn"/></a></td>
            <td width="25"><a href="https://www.instagram.com/company/hospital"><img src="resources/instagram.png" width="15" height="15" alt="Instagram"/></a></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
  </tbody>
</table>

<!-- Header with Logo and Navigation -->
<table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td width="59%" height="64" valign="top"><table width="100%" border="0" cellpadding="0">
        <tbody>
          <tr>
            <td width="5%" style="text-align: center"><img style="border-radius: 30%" src="resources/logo.jpg" width="60" height="auto" alt="City Hospital Logo"/></td>
            <td width="95%" height="20px" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="1">
              <tbody>
                <tr>
                  <td align="left"><span style="font-size: 28px; font-weight: 700; color: #2c3e50; font-family: Helvetica; text-align: left;">CITY HOSPITAL</span></td>
                </tr>
                <tr>
                  <td align="left"><span style="font-size: 16px; font-family: sans-serif; font-style: italic; color: #7f8c8d; text-align: left;">Caring for your health</span></td>
                </tr>
              </tbody>
            </table></td>
          </tr>
        </tbody>
      </table></td>
      <td width="41%" valign="middle"><table width="100%" border="0" cellpadding="2" cellspacing="0" class="nav-table">
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

<!-- Hero Section -->
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="50" style="background: #f0f8ff; margin: 0;" >
  <tbody>
    <tr>
      <td align="center" style="text-align: center; font-size: 24px;">
        <p><span style="font-size: 18px; color: #2c3e50;">Welcome to</span><br>
        <span style="font-size: 42px; font-weight: bold; color: #2c3e50;" class="hero-title">CITY HOSPITAL</span></p>
        <p style="font-size: 20px; color: #555555;">Quality Healthcare for Every Patient</p>
        <p> 
          <a href="appointments.php">
            <input class="btn-primary" type="button" name="Make Appointment" value="Make appointment">
          </a>        
          <a href="departments.php">
            <input class="btn-outline" type="button" name="View Departments" value="View Departments">
          </a>		  
        </p>
      </td>
      <td align="center"><img src="resources/hms.jpg" style="border-radius: 20px" width="300" height="auto" alt="City Hospital Main Building"/></td>
    </tr>
  </tbody>
</table>

	<!-- Quick Actions Section -->
<table width="99%" border="0" align="center" cellpadding="20" style="background: #ffffff; border: 1px solid #e0e0e0; border-radius: 10px">
  <tbody>
    <tr>
      <td align="center">
        <h2 style="font-family: Arial; font-size: 24px; font-weight: 700; color: #2c3e50; text-align: center; margin-bottom: 30px; letter-spacing: 1px;">QUICK ACTIONS</h2>
        <table width="90%" border="0" align="center">
          <tbody>
            <tr align="center">
             
              <td style="background: #ffffff; border: 1px solid #e0e0e0; border-radius: 10px; width: 180px; height: 130px; padding: 15px 10px; text-align: center; box-shadow: 0px 4px 8px rgba(0,0,0,0.05); cursor: pointer; transition: 0.3s;" 
                  onmouseover="this.style.boxShadow='0px 8px 16px rgba(0,0,0,0.1)'; this.style.borderColor='#3498db'; this.querySelector('.icon').style.color='#3498db'; this.querySelector('.text').style.color='#3498db';"
                  onmouseout="this.style.boxShadow='0px 4px 8px rgba(0,0,0,0.05)'; this.style.borderColor='#e0e0e0'; this.querySelector('.icon').style.color='#2c3e50'; this.querySelector('.text').style.color='#34495e';"
                  onclick="location.href='patient.php'">
                <div class="icon" style="font-size: 40px; display: block; margin-bottom: 10px; color: #2c3e50; transition: 0.3s;">📝</div>
                <div class="text" style="font-family: Arial; font-size: 14px; font-weight: 600; color: #34495e; line-height: 1.4; text-decoration: none; transition: 0.3s;">Register<br>Patient</div>
              </td>
              
              <td style="background: #ffffff; border: 1px solid #e0e0e0; border-radius: 10px; width: 180px; height: 130px; padding: 15px 10px; text-align: center; box-shadow: 0px 4px 8px rgba(0,0,0,0.05); cursor: pointer; transition: 0.3s;" 
                  onmouseover="this.style.boxShadow='0px 8px 16px rgba(0,0,0,0.1)'; this.style.borderColor='#3498db'; this.querySelector('.icon').style.color='#3498db'; this.querySelector('.text').style.color='#3498db';"
                  onmouseout="this.style.boxShadow='0px 4px 8px rgba(0,0,0,0.05)'; this.style.borderColor='#e0e0e0'; this.querySelector('.icon').style.color='#2c3e50'; this.querySelector('.text').style.color='#34495e';"
                  onclick="location.href='appointments.php'">
                <div class="icon" style="font-size: 40px; display: block; margin-bottom: 10px; color: #2c3e50; transition: 0.3s;">📅</div>
                <div class="text" style="font-family: Arial; font-size: 14px; font-weight: 600; color: #34495e; line-height: 1.4; text-decoration: none; transition: 0.3s;">Schedule<br>Appointment</div>
              </td>
              
              <td style="background: #ffffff; border: 1px solid #e0e0e0; border-radius: 10px; width: 180px; height: 130px; padding: 15px 10px; text-align: center; box-shadow: 0px 4px 8px rgba(0,0,0,0.05); cursor: pointer; transition: 0.3s;" 
                  onmouseover="this.style.boxShadow='0px 8px 16px rgba(0,0,0,0.1)'; this.style.borderColor='#3498db'; this.querySelector('.icon').style.color='#3498db'; this.querySelector('.text').style.color='#3498db';"
                  onmouseout="this.style.boxShadow='0px 4px 8px rgba(0,0,0,0.05)'; this.style.borderColor='#e0e0e0'; this.querySelector('.icon').style.color='#2c3e50'; this.querySelector('.text').style.color='#34495e';"
                  onclick="location.href='doctors.php'">
                <div class="icon" style="font-size: 40px; display: block; margin-bottom: 10px; color: #2c3e50; transition: 0.3s;">👨‍⚕️</div>
                <div class="text" style="font-family: Arial; font-size: 14px; font-weight: 600; color: #34495e; line-height: 1.4; text-decoration: none; transition: 0.3s;">Add<br>Doctor</div>
              </td>
              
              <!-- Box 4: Add Record -->
              <td style="background: #ffffff; border: 1px solid #e0e0e0; border-radius: 10px; width: 180px; height: 130px; padding: 15px 10px; text-align: center; box-shadow: 0px 4px 8px rgba(0,0,0,0.05); cursor: pointer; transition: 0.3s;" 
                  onmouseover="this.style.boxShadow='0px 8px 16px rgba(0,0,0,0.1)'; this.style.borderColor='#3498db'; this.querySelector('.icon').style.color='#3498db'; this.querySelector('.text').style.color='#3498db';"
                  onmouseout="this.style.boxShadow='0px 4px 8px rgba(0,0,0,0.05)'; this.style.borderColor='#e0e0e0'; this.querySelector('.icon').style.color='#2c3e50'; this.querySelector('.text').style.color='#34495e';"
                  onclick="location.href='records.php'">
                <div class="icon" style="font-size: 40px; display: block; margin-bottom: 10px; color: #2c3e50; transition: 0.3s;">📋</div>
                <div class="text" style="font-family: Arial; font-size: 14px; font-weight: 600; color: #34495e; line-height: 1.4; text-decoration: none; transition: 0.3s;">Add<br>Medical Record</div>
              </td>
              
              <!-- Box 5: Issue Rx -->
              <td style="background: #ffffff; border: 1px solid #e0e0e0; border-radius: 10px; width: 180px; height: 130px; padding: 15px 10px; text-align: center; box-shadow: 0px 4px 8px rgba(0,0,0,0.05); cursor: pointer; transition: 0.3s;" 
                  onmouseover="this.style.boxShadow='0px 8px 16px rgba(0,0,0,0.1)'; this.style.borderColor='#3498db'; this.querySelector('.icon').style.color='#3498db'; this.querySelector('.text').style.color='#3498db';"
                  onmouseout="this.style.boxShadow='0px 4px 8px rgba(0,0,0,0.05)'; this.style.borderColor='#e0e0e0'; this.querySelector('.icon').style.color='#2c3e50'; this.querySelector('.text').style.color='#34495e';"
                  onclick="location.href='records.php'">
                <div class="icon" style="font-size: 40px; display: block; margin-bottom: 10px; color: #2c3e50; transition: 0.3s;">💊</div>
                <div class="text" style="font-family: Arial; font-size: 14px; font-weight: 600; color: #34495e; line-height: 1.4; text-decoration: none; transition: 0.3s;">Issue<br>Prescription</div>
              </td>
             
        </table>
  </tbody>
        </table>

<!-- Section Container -->
<div style="background: #ffffff; padding: 30px 20px; margin-top: 20px; margin-bottom: 20px;">

  <!-- Section Heading -->
  <h2 style="font-family: Arial; font-size: 22px; font-weight: bold; color: #2c3e50; margin-bottom: 5px;">RECENT APPOINTMENTS</h2>
  
  <!-- Subheading -->
  <p style="font-family: Arial; font-size: 14px; color: #7f8c8d; margin-bottom: 20px;">Upcoming appointments for today and tomorrow</p>

  <!-- Table -->
  <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border: 1px solid #ddd;">
    <!-- Header Row -->
      <tr style="background: #2c3e50; border-bottom: 2px solid #3498db;">
        <th style="width: 10%; font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left;">Appt ID</th>
        <th style="width: 25%; font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left;">Patient Name</th>
        <th style="width: 25%; font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left;">Doctor Name</th>
        <th style="width: 15%; font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left;">Date</th>
        <th style="width: 10%; font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left;">Time</th>
        <th style="width: 10%; font-family: Arial; font-weight: bold; color: #ffffff; padding: 12px; text-align: left;">Status</th>
      </tr>
  <tbody>
      <?php
      $query = "SELECT a.*, 
                p.first_name as pat_fname, p.last_name as pat_lname, 
                d.first_name as doc_fname, d.last_name as doc_lname
                FROM Appointment a
                JOIN Patient p ON a.patient_id = p.patient_id
                JOIN Doctor d ON a.doctor_id = d.doctor_id
                ORDER BY a.appointment_date ASC, a.appointment_time ASC
                LIMIT 5";
      $result = mysql_query($query);

      if (mysql_num_rows($result) > 0) {
          $row_count = 0;
          while ($row = mysql_fetch_assoc($result)) {
              $row_count++;
              $bg_color = ($row_count % 2 == 0) ? '#f9f9f9' : '#ffffff';
              
              // Status badge color
              $status_color = '#f39c12'; // default orange for Scheduled
              if ($row['status'] == 'Confirmed') {
                  $status_color = '#2ecc71'; // green
              } elseif ($row['status'] == 'Completed') {
                  $status_color = '#3498db'; // blue
              } elseif ($row['status'] == 'Pending') {
                  $status_color = '#e74c3c'; // red
              } elseif ($row['status'] == 'Cancelled') {
                  $status_color = '#95a5a6'; // gray
              }
              
              // Format time
              $formatted_time = date('g:i A', strtotime($row['appointment_time']));
              ?>
              
              <tr style="background: <?php echo $bg_color; ?>; border-bottom: 1px solid #eee; cursor: pointer;" 
                  onmouseover="this.style.background='#f1f1f1';" 
                  onmouseout="this.style.background='<?php echo $bg_color; ?>';"
                  onclick="window.location.href='appointments.php?id=<?php echo $row['appointment_id']; ?>'">
                  
                  <td style="padding: 10px; font-family: Arial; font-size: 14px; color: #34495e; text-align: left;">
                      APT-<?php echo str_pad($row['appointment_id'], 3, '0', STR_PAD_LEFT); ?>
                  </td>
                  <td style="padding: 10px; font-family: Arial; font-size: 14px; color: #34495e; text-align: left;">
                      <?php echo htmlspecialchars($row['pat_fname']) . ' ' . htmlspecialchars($row['pat_lname']); ?>
                  </td>
                  <td style="padding: 10px; font-family: Arial; font-size: 14px; color: #34495e; text-align: left;">
                      Dr. <?php echo htmlspecialchars($row['doc_fname']) . ' ' . htmlspecialchars($row['doc_lname']); ?>
                  </td>
                  <td style="padding: 10px; font-family: Arial; font-size: 14px; color: #34495e; text-align: left;">
                      <?php echo $row['appointment_date']; ?>
                  </td>
                  <td style="padding: 10px; font-family: Arial; font-size: 14px; color: #34495e; text-align: left;">
                      <?php echo $formatted_time; ?>
                  </td>
                  <td style="text-align: left">
                      <span style="background: <?php echo $status_color; ?>; color: white; padding: 4px 10px; border-radius: 20px; font-family: Arial; font-size: 12px; font-weight: 600; display: inline-block;">
                          <?php echo $row['status']; ?>
                      </span>
                  </td>
              </tr>
              <?php
          }
      } else {
          ?>
          <tr>
              <td colspan="6" style="text-align: center; padding: 30px;">No appointments found. Schedule your first appointment.</td>
          </tr>
          <?php
      }
      ?>
  </tbody>
  </table>

  <!-- View All Button -->
  <div style="text-align: right; margin-top: 15px;">
    <a href="appointments.php" style="font-family: Arial; font-size: 14px; color: #3498db; text-decoration: none;">View All Appointments →</a>
  </div>

</div>
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