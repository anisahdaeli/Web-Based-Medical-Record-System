# Medical Record System (Web-Based)

<img width="682" height="359" alt="Halaman Login" src="https://github.com/user-attachments/assets/af0c0094-e0bd-4b5c-b2d1-841789663653" />

A **Web-Based Medical Record System** developed using **PHP (CodeIgniter)** and **MySQL**, running on an **Apache web server (XAMPP)**.  
This application is designed to manage patient medical records efficiently in a local (localhost) environment.

---

## 📋 System Requirements

Make sure your system meets the following requirements:

- Operating System: Windows / Linux / macOS
- Web Server: **XAMPP**
  - Apache
  - MySQL
- Web Browser: Google Chrome / Mozilla Firefox
- PHP version 7.x or 8.x
- Git (optional, for cloning the repository)

---

## 🛠️ Tools Used

- XAMPP
- Apache
- MySQL
- phpMyAdmin
- CodeIgniter
- GitHub

---

## 📥 Installation Guide

Follow the steps below to run the application on your local machine (localhost):

### 1️⃣ Start XAMPP Services
Open **XAMPP Control Panel**, then:
- Start **Apache**
- Start **MySQL**

Make sure both services are running without errors.

---

### 2️⃣ Download the Source Code
You can obtain the project by:
- Downloading this repository as a **ZIP file**, or
- Cloning it using Git:
  ```bash
  git clone https://github.com/username/repository-name.git

---

### 3️⃣ Extract and Place the Project Folder

- Extract the downloaded ZIP file (if downloaded manually)
- Move the extracted project folder into the following directory:
- 
```
C:\xampp\htdocs\
```

⚠️ Make sure the project folder name is exactly:

medical_record_system

Example folder structure:

htdocs/
└── medical_record_system/

Changing the folder name may cause URL and routing errors in the application.

---

### 4️⃣ Import the Database

1. Open your web browser and access:
   http://localhost/phpmyadmin
2. Create a new database (if it does not exist):
   db_medicalrecord
3. Select the database
4. Click the **Import** tab
5. Choose the SQL file provided in the project:
   db_medicalrecord.sql
6. Click **Go** and wait until the import process is completed successfully

---

### 5️⃣ Database Configuration (If Required)

Make sure the database configuration matches your local environment.

File location (CodeIgniter 3):

application/config/database.php

Example configuration:

```php
'hostname' => 'localhost',
'username' => 'root',
'password' => '',
'database' => 'db_medicalrecord',
```

If your database name, username, or password is different, adjust the configuration accordingly.

---

### 6️⃣ Run the Application

After completing all installation and configuration steps, open your web browser and access the following URL:

http://localhost/medical_record_system/

If the setup is correct, the Medical Record System login page will be displayed successfully.  
You can now log in and start using the application.

---

## 🔐 Default Login Account

Use the default account below to access the system:

--------------------------------
Username : admin
Password : admin
--------------------------------

You may change the login credentials directly from the database for security purposes.
