<?php
require('util/Connection.php');
require('util/SessionCheck.php');
require('CoHeader.php');

// Fetch students based on the selected IIT
$iit_name = $_GET['iit_name'];
$sql = "SELECT * FROM profile WHERE iit_name = '$iit_name' ORDER BY joining_date";
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
            /* height: 50vh; */
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
            background-color: #B8DAFF;
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
            echo "<h2>Students</h2>";
            echo "<table>";
            echo "<tr><th>Student Name</th><th>IIT Name</th><th>Date of Joining</th><th>View</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['iit_name']}</td>";
                echo "<td>{$row['joining_date']}</td>";
                echo "<td><a href='ViewSpecificStudent.php?StudentId={$row['studentid']}'>View {$row['name']} data</a></td>";
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
