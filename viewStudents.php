<?php
require('util/Connection.php');
require('util/SessionCheck.php');
require('CoHeader.php');

// Fetch students based on the selected IIT
$iit_name = $_GET['iit_name'];
 
$sql = "SELECT * FROM profile WHERE iit_name = '$iit_name' ORDER BY joining_date";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // Display student records in a table
    echo "<h2>Students</h2>";
    echo "<table>";
    echo "<tr><th>Student Name</th><th>IIT Name</th><th>Date of Joining</th><th>View</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        // echo "<td>{$row['id']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['iit_name']}</td>";
        echo "<td>{$row['joining_date']}</td>";
        
        echo "<td><a href='ViewSpecificStudent.php?StudentId={$row['studentid']}'>View {$row['name']} data</a></td>";

        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No students found for the selected IIT.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students</title>
    <style>
        
        table {
            border-collapse: collapse;
            width: 50%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <!-- HTML content here -->
</body>
</html>
