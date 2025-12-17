<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

    <form action="" method="post">
        <h1>Welcome!</h1>

        <!-- Error Message -->
        <?php if (!empty($message)) { ?>
            <p style="color:red; text-align:center;"><?php echo $message; ?></p>
        <?php } ?>

        <label>EMAIL</label>
        <input type="email" name="email" placeholder="Enter your email" required>

        <label>PASSWORD</label>
        <input type="password" name="password" placeholder="Enter your password" required>

        <button type="submit">Login</button>

        <a href="regsiter.php" class="user">New User?</a>
    </form>

</body>
</html>
<?php
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "student");

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepared statement (safer)
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {

        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {

            $_SESSION['email'] = $email;
            header("Location: dept.php");
            exit();

        } else {
            $message = "❌ Incorrect Password!";
        }

    } else {
        $message = "❌ Email not found!";
    }
}
?>