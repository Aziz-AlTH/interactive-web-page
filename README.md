# interactive-web-page
# User Form Web Application

A simple full-stack web application that allows users to submit their name and age via a form, stores the data in a MySQL database, and displays all records in a table with real-time toggle functionality for the user status.

---

## 🚀 Features

- Single-line form to collect:
  - Name
  - Age
- Stores submitted data in a MySQL database (`users` table).
- Displays all stored users in an HTML table.
- Each user has a toggle button to switch their `status` between `0` and `1`.
- Toggle functionality is handled using AJAX to avoid page reload.
- Clean and minimal interface built with HTML, CSS, PHP, and JavaScript.

---

## 🛠️ Technologies Used

- **Frontend:** HTML, CSS, JavaScript (vanilla)
- **Backend:** PHP
- **Database:** MySQL
- **Local Server:** XAMPP (Apache + MySQL)

---

## 📦 Project Structure

user_form_project/
│
├── index.php # Main page with form and table
├── toggle.php # Handles AJAX request to toggle user status
└── README.md # Project documentation



## ⚙️ Setup Instructions

### 1. Requirements

- [XAMPP](https://www.apachefriends.org/index.html) installed and running.
- VS Code or any code editor.

### 2. Create the Database

1. Open `phpMyAdmin` at: `http://localhost/phpmyadmin`
2. Create a new database named:

my_webpage


3. Run the following SQL inside the new database:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    age INT,
    status TINYINT(1) DEFAULT 0
);


3. Setup Project
Copy the project folder user_form_project into:

makefile

C:\xampp\htdocs\
Start Apache and MySQL from the XAMPP Control Panel.

In your browser, navigate to:



http://localhost/user_form_project/
🖥️Usage
Fill in your name and age.

Click Submit to save your data.

Scroll down to see your entry in the users table.

Click the Toggle button to change the status between 0 and 1.

📌 Notes
Make sure index.php and toggle.php are placed in the same directory.

The database connection in the code assumes:

Host: localhost

User: root

Password: "" (empty)

Database: my_webpage

Edit these settings in index.php and toggle.php if needed.


Developed by [Abdulaziz Al-Thabeti]



