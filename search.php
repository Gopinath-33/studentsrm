<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "student");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get register number from form
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
            color: white;
        }
        tr:nth-child(even) {
            background-color: #dcd2d2b7;
        }
           
      </style>";

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr>
            <th>Register No</th>
            <th>Name</th>
            <th>Department</th>
            <th>Year</th>
            <th>email</th>
            <th>phone</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . $row['register_no'] . "</td>
                <td>" . $row['name'] . "</td>
                <td>" . $row['department'] . "</td>
                <td>" . $row['year'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['phone'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p style='text-align:center;color:red;'>No record found!</p>";
}

mysqli_close($conn);
?>