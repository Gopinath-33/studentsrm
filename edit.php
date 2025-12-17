<!DOCTYPE html>
<html>
<head>
    <title>Student-Info</title>
    <link rel="stylesheet" href="student.css">
</head>
<body>
    <form action="" method="post">
        <center>
            <img src="srm.jpg" alt="srm" class="logo">
            <h1>SRM TRICHY ARTS AND SCIENCE COLLEGE</h1>
            <h3>THIRUCHIRAPALLI-621105.</h3>
           

            <!-- Search Form -->
            <div class="search">
                <label><b>Enter Register Number:</b></label>
                <input type="text" name="regno" placeholder="ex-23054611802111020" required>
                <button name="btn" type="submit">Search</button>
                 <button><a href="add.php">ADD</a></button>
            </div>
        </center>
       
    </form>

</body>
</html>
<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "student");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Run only when form is submitted
if (isset($_POST['regno'])) {

    $regno = $_POST['regno'];

    // SQL query
    $sql = "SELECT * FROM infoo WHERE register_no = '$regno'";
    $result = mysqli_query($conn, $sql);

    // CSS styling
    echo "<style>
            table {
                border-collapse: collapse;
                width: 60%;
                margin: 20px auto;
                font-family: Arial, sans-serif;
            }
            th, td {
                border: 1px solid #333;
                padding: 10px;
                text-align: center;
            }
            th {
                background-color: #000;
                color: green;
            }
            tr:nth-child(even) {
                background-color: #0ff81bb7;
            }
        </style>";

    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr>
                <th>Register No</th>
                <th>Name</th>
                <th>Department</th>
                <th>Year</th>
                <th>Email</th>
                <th>Phone</th>
              </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['register_no']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['department']}</td>
                    <td>{$row['year']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['phone']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='text-align:center;color:red;'>No record found!</p>";
    }
}

mysqli_close($conn);
?>