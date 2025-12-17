<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>resigter</title>
    <link rel="stylesheet" href="reg.css">
</head>
<body>
    <form action="login.php" method="post">
        <h1>welcome!</h1>
        <label>NAME</label>
        <input type="text" name="name" placeholder="enter your name">
        <label>EMAIL</label>
        <input type="email" name="email" placeholder="enter your email">
        <label>PASSWORD</label>
        <input type="password" name="password" placeholder="enter your password">
        
        <label>DEPARTMENT</label>
        <input type="text" name="dept" placeholder="enter your dept">
        <a href="logmin.php"><button type="reg">regsiter</button></a>
       
     </form>
</body>
</html>
<?php
// Database Connection
$conn = new mysqli("localhost", "root", "", "student"); // change DB name if needed

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $dept = $_POST['dept'];

    $sql = "INSERT INTO users (name, email, password, dept) 
            VALUES ('$name', '$email', '$password', '$dept')";

    if ($conn->query($sql)) {
        $success = "✔ Registration Successful! Please Login.";
    } else {
        $error = "❌ Error: " . $conn->error;
    }
}
?>