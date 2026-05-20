# Hospital Management Information System (HMIS)
# City Hospital — Kampala, Uganda

A web-based Hospital Management Information System built with PHP and MySQL, designed to streamline hospital operations including patient registration, doctor management, appointment scheduling and medical records.

---

# Features

- **Patient Management** — Register, view, edit, and delete patient records
- **Doctor Management** — Manage doctor profiles linked to departments
- **Appointment Scheduling** — Book, update, and cancel patient appointments
- **Medical Records** — Create and manage medical records with prescriptions
- **Department Management** — Manage hospital departments and their locations
- **Dashboard (Home)** — Quick-action landing page with navigation to all modules

---

# Tech Stack

| Layer    | Technology |
|
| Backend = PHP (procedural) |
| Database = MySQL (via MySQLi) |
| Frontend = HTML, CSS (custom `style.css`) |
| Server = Apache / XAMPP / LAMP |

---

# Project Structure


HMS-IT-PROJECT-main/
├── index.php                  # Home / dashboard
├── config.php                 # Database connection
├── style.css                  # Global stylesheet
│
├── patient.php                # Patient list & management
├── save_patient.php           # Add new patient (form handler)
├── edit_patient.php           # Edit patient form & handler
│
├── doctors.php                # Doctor list & management
├── save_doctor.php            # Add new doctor (form handler)
├── edit_doctor.php            # Edit doctor form & handler
│
├── appointments.php           # Appointment list & management
├── save_appointment.php       # Book appointment (form handler)
├── edit_appointment.php       # Edit appointment form & handler
│
├── records.php                # Medical records list & management
├── save_medical_record.php    # Add medical record + prescription
├── edit_medical_record.php    # Edit medical record form & handler
│
├── departments.php            # Department list & management
├── save_department.php        # Add department (form handler)
├── edit_department.php        # Edit department form & handler
│
└── resources/                 # Static assets (images, icons)
    ├── logo.jpg
    ├── hms.jpg
    ├── format.jpg
    ├── facebook.png
    ├── twitter.png
    ├── instagram.png
    ├── linkedin.png
    └── whatsapp.png


---

## Database Setup

The application connects to a MySQL database named `hospital_db`. Create it and the required tables before running the project.

* 1. Create the database:**
```sql
CREATE DATABASE hospital_db;
USE hospital_db;
```

* 2. Create the tables:**
```sql
CREATE TABLE Department (
    department_id INT AUTO_INCREMENT PRIMARY KEY,
    department_name VARCHAR(100) NOT NULL,
    location VARCHAR(100)
);

CREATE TABLE Doctor (
    doctor_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    specialization VARCHAR(100),
    department_id INT,
    FOREIGN KEY (department_id) REFERENCES Department(department_id)
);

CREATE TABLE Patient (
    patient_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    date_of_birth DATE,
    gender VARCHAR(10),
    contact VARCHAR(20),
    address TEXT
);

CREATE TABLE Appointment (
    appointment_id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT,
    doctor_id INT,
    appointment_date DATE,
    appointment_time TIME,
    status VARCHAR(20),
    FOREIGN KEY (patient_id) REFERENCES Patient(patient_id),
    FOREIGN KEY (doctor_id) REFERENCES Doctor(doctor_id)
);

CREATE TABLE MedicalRecord (
    record_id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT,
    doctor_id INT,
    diagnosis TEXT,
    treatment TEXT,
    record_date DATE,
    FOREIGN KEY (patient_id) REFERENCES Patient(patient_id),
    FOREIGN KEY (doctor_id) REFERENCES Doctor(doctor_id)
);

CREATE TABLE Prescription (
    prescription_id INT AUTO_INCREMENT PRIMARY KEY,
    record_id INT,
    medication VARCHAR(100),
    dosage VARCHAR(100),
    instructions TEXT,
    FOREIGN KEY (record_id) REFERENCES MedicalRecord(record_id)
);
```

---

# Installation & Setup

# Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- A local server environment: [XAMPP](https://www.apachefriends.org/) (recommended), WAMP, or LAMP

# Steps

1. **Clone or download** this repository into your server's web root:
   
   # For XAMPP on Windows:
   C:/xampp/htdocs/HMS-IT-PROJECT-main/

   # For XAMPP on Linux/macOS:
   /opt/lampp/htdocs/HMS-IT-PROJECT-main/
   

2. **Set up the database** by running the SQL statements from the [Database Setup](#database-setup) section above in phpMyAdmin or the MySQL CLI.

3. **Configure the database connection** in `config.php`:
   ```php
   $username = "root";     // your MySQL username
   $password = "";         // your MySQL password
   $database = "hospital_db";
   ```

4. **Start your server** (Apache + MySQL via XAMPP Control Panel).

5. **Open the application** in your browser:
   ```
   http://localhost/HMS-IT-PROJECT-main/
   ```

---

## Usage

Navigate using the top navigation bar:

| Page | URL | Description |
|---|---|---|
| Home | `index.php` | Dashboard with quick-action buttons |
| Patients | `patient.php` | View, add, edit, delete patients |
| Doctors | `doctors.php` | View, add, edit, delete doctors |
| Appointments | `appointments.php` | Schedule and manage appointments |
| Records | `records.php` | View and manage medical records |
| Departments | `departments.php` | Manage hospital departments |

---

## Security Notes

> This project is intended for academic/demonstration purposes. Before deploying in any real environment, address the following:

- **SQL Injection** — All database queries use raw string interpolation. Switch to **prepared statements** (MySQLi or PDO).
- **Input Validation** — Add server-side validation and sanitization for all form inputs.
- **Authentication** — There is no login system. Add user authentication before any production use.
- **Error Display** — `display_errors` is enabled in all files. Disable this in production via `php.ini`.
- **Credentials** — Do not commit `config.php` with real credentials. Use environment variables instead.

---

# Contact

* City Hospital *
📍 Kampala, Uganda
📞 +256 756 950 472
