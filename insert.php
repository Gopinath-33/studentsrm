<?php
$servername = "localhost"; 
$username = "root";   // XAMPP la default
$password = "";       // default empty
$dbname = "student";

// DB connect
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connect
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get values from form
$regno = $_POST['regno'];
$name = $_POST['name'];
$department = $_POST['department'];
$year = $_POST['year'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Insert query
$sql = "INSERT INTO infoo (register_no, name, department, year, email, phone) 
        VALUES ('$regno', '$name', '$department', '$year', '$email', '$phone')";

if ($conn->query($sql) === TRUE) {
    echo "<h3>✅ Student record added successfully!</h3>";
   // echo "<a href='search.php'>Go Back</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>