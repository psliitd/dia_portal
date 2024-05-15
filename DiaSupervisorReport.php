<?php
require('util/Connection.php');
require('util/SessionCheck.php');
require('DiaHeader.php');

// Fetch students based on the selected IIT
if(isset($_SESSION['user'])) {
    $iit_name = $_SESSION['user'];
} else {
    // Handle case when the session variable is not set
    
}
$sql = "SELECT * FROM supervisor WHERE iit_name = '$iit_name'";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students</title>
    <style>
      
        .container {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 20px;
            margin-top: 5%;
            height: 100vh;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: coral;
        }

        h2 {
            text-align: center;
            background-color: #39CCCC;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if ($result->num_rows > 0) {
            echo "<h2 style=\"border: 2px solid black; border-image: linear-gradient(to right, red, blue) 1;\">Supervisor Details</h2>";

            echo "<table>";
            echo "<tr><th>Supervisor Name</th><th>IIT Name</th><th>Mobile</th><th>Gender</th><th>Email</th><th>Nationality</th><th>Faculty_id</th><th>Department</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['iit_name']}</td>";
                echo "<td>{$row['mobile']}</td>";
                echo "<td>{$row['gender']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['nationality']}</td>";
                echo "<td>{$row['faculty_id']}</td>";
                echo "<td>{$row['department']}</td>";
                 
                // echo "<td><a href='DiaViewSpecificStudent.php?StudentId={$row['studentid']}'>View {$row['name']} data</a></td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No students found for the selected IIT.</p>";
        }
        ?>
    </div>
</body>
</html>
