<?php
require('util/Connection.php');
require('util/SessionCheck.php');
require('CoHeader.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fund Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 1090px;
            margin: 100px auto;
            overflow: auto; /* Add overflow to enable scrolling */
            height: 80vw; /* Set a fixed height for the container */
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #CFE2FF;
        }
        
        @media screen and (max-width: 768px) {
             

            table {
                width: 100%;
            }

            th, td {
                padding: 10px;
            }
            
        } 
        
    </style>
</head>
<body>

<div class="container">
    <?php
    // Check if iit_name is provided in the URL
    if(isset($_GET['iit_name'])) {
        $iit_name = $_GET['iit_name'];

        // Fetch data from formData table
        $formDataQuery = "SELECT * FROM formData WHERE iit_name = ?";
        $formDataStmt = $con->prepare($formDataQuery);
        $formDataStmt->bind_param("s", $iit_name);
        $formDataStmt->execute();
        $formDataResult = $formDataStmt->get_result();

        // Fetch data from anotherTable table
        $anotherTableQuery = "SELECT * FROM anotherTable WHERE iit_name = ?";
        $anotherTableStmt = $con->prepare($anotherTableQuery);
        $anotherTableStmt->bind_param("s", $iit_name);
        $anotherTableStmt->execute();
        $anotherTableResult = $anotherTableStmt->get_result();

        // Check if data is retrieved from both tables
        if($formDataResult->num_rows > 0 && $anotherTableResult->num_rows > 0) {
            // Data from both tables is available, display it in a beautiful manner

            // Display data from formData table
            echo "<h2 style='text-align: center; font-weight: 600;'>Fund Status Table for all students</h2>";

            echo "<table>";
            echo "<tr><th>Name of Applicant</th><th>Application Number</th><th>Country</th><th>Date of Joining</th><th>Stipend</th><th>Stipend  <br> Received</th><th>ARG Claimed <br>
            last quarter</th><th>Total ARG  <br>Received</th></tr>";
            while ($row = $formDataResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['name_of_applicant'] . "</td>";
                echo "<td>" . $row['application_number'] . "</td>";
                echo "<td>" . $row['country'] . "</td>";
                echo "<td>" . $row['date_of_joining'] . "</td>";
                echo "<td>" . $row['stipend'] . "</td>";
                echo "<td>" . $row['stipend_received'] . "</td>";
                echo "<td>" . $row['ARG_Claimed_last_quarter'] . "</td>";
                echo "<td>" . $row['Total_ARG_Received'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";

            // Display data from anotherTable table
            echo "<h2 style='text-align: center; font-weight: 600;'>Fund Status Table</h2>";
            echo "<table>";
            echo "<tr><th>Fund  Available  <br>  PFMS</th><th>Excess Fund  <br> Last Quarter</th><th>Total Funds Lapsed  <br> Last Quarter</th><th>TFR  <br> Since  2020</th><th>Total Funds Lapsed  <br> and not Reallocated</th><th>Student Status</th></tr>";
            while ($row = $anotherTableResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['Fund_available_PFMS'] . "</td>";
                echo "<td>" . $row['Excess_fund_last_quarter'] . "</td>";
                echo "<td>" . $row['Total_Funds_lapsed_last_quarter'] . "</td>";
                echo "<td>" . $row['TFR_since_2020'] . "</td>";
                echo "<td>" . $row['Total_Funds_lapsed_and_not_reallocated'] . "</td>";
                echo "<td>" . $row['student_status'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            // Handle case when data is not available for the provided IIT name
            echo "No data available for the selected IIT";
        }

        // Close prepared statements
        $formDataStmt->close();
        $anotherTableStmt->close();
    } else {
        // Handle case when iit_name is not provided
        echo "IIT name not provided";
    }

    // Close the database connection
    $con->close();
    ?>
</div>

</body>
</html>
