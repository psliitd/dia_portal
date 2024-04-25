<?php
require('util/Connection.php');
require('util/SessionCheck.php');
require('CoHeader.php');

// Initialize $iit_name variable
$iit_name = '';

// Check if iit_name is set in the URL
if(isset($_GET['iit_name'])) {
    $iit_name = $_GET['iit_name'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fund Status</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
    .container {
    max-width: 1500px;
    margin: 100px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}


        h2 {
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        select, input[type="submit"] {
            margin: 0 10px;
            padding: 8px 12px;
            font-size: 14px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 15px;
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
   <div><?php if(isset($iit_name)): ?>
    <h2 style="text-align:center; background-color: #39cccc; font-weight: 700;">Fund status table for <span style="color: red;"><?php echo $iit_name; ?></span></h2>

        <?php endif; ?></div>
<form method="get" action="">
       <input type="hidden" name="iit_name" value="<?php echo isset($iit_name) ? htmlspecialchars($iit_name) : ''; ?>">
        <label for="quarter">Select Quarter:</label>
        <select id="quarter" name="quarter">
            <option value="Q1(Apr-Jun)">Q1(Apr-Jun)</option>
            <option value="Q2(July-Sept)">Q2(July-Sept)</option>
            <option value="Q3(Oct-Dec)">Q3(Oct-Dec)</option>
            <option value="Q4(Jan-Mar)">Q4(Jan-Mar)</option>
        </select>

        <label for="year">Select Financial Year:</label>
        <select id="year" name="year">
            <option value="FY2024-25">FY2024-25</option>
            <option value="FY2025-26">FY2025-26</option>
            <option value="FY2026-27">FY2026-27</option>
            <option value="FY2027-28">FY2027-28</option>
            <!-- Add more years as needed -->
        </select>
    
           
        <input type="submit" name="apply_filter" value="Apply Filter" style="background-color: #007bff; color: #ffffff;  padding: 5px 10px; border: none; border-radius: 20px; margin:10px; cursor: pointer; font-size: 16px; transition: background-color 0.3s ease;" onmouseover="this.style.backgroundColor='#0056b3'" onmouseout="this.style.backgroundColor='#007bff'">
</form>

    <!-- New Table for Fund Information -->
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>S. No.</th>
                    <th>Name of Applicant</th>
                    <th>Application Number</th>
                    <th>Country</th>
                    <th>Date of Joining</th>
                    <th>Stipend</th>
                    <th>Stipend Received</th>
                    <th>Student Status</th>
                    <th>ARG Claimed Last Quarter</th>
                    <th>Total ARG Received</th>
                </tr>
            </thead>
            <tbody>
            <?php
                // Get selected financial year and quarter from the form submission
                $selected_financial_year = $_GET['year'] ?? '';
                $selected_quarter = $_GET['quarter'] ?? '';
                $iit_name = isset($_GET['iit_name']) ? $_GET['iit_name'] : '';
                $query = "SELECT name_of_applicant, 
                                    application_number, 
                                    country, 
                                    date_of_joining, 
                                    stipend, 
                                    stipend_received,
                                    student_status, 
                                    ARG_Claimed_last_quarter, 
                                    Total_ARG_Received 
                                    FROM formData";

                // If filter is applied, add WHERE clause
                if (isset($_GET['apply_filter'])) {
                    $query .= " WHERE curr_quarter = '$selected_quarter' AND financial_year = '$selected_financial_year'";
                    // If iit_name is set, add it to the WHERE clause
                    if (!empty($iit_name)) {
                        $query .= " AND iit_name = '$iit_name'";
                    }
                } else {
                    // If iit_name is set, filter by iit_name
                    if (!empty($iit_name)) {
                        $query .= " WHERE iit_name = '$iit_name'";
                    }
                }

                $result = mysqli_query($con, $query);

                if ($result->num_rows > 0) {
                    $serialNumber = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$serialNumber}</td>";
                        echo "<td>{$row['name_of_applicant']}</td>";
                        echo "<td>{$row['application_number']}</td>";
                        echo "<td>{$row['country']}</td>";
                        echo "<td>{$row['date_of_joining']}</td>";
                        echo "<td>{$row['stipend']}</td>";
                        echo "<td>{$row['stipend_received']}</td>";
                        echo "<td>{$row['student_status']}</td>";
                        echo "<td>{$row['ARG_Claimed_last_quarter']}</td>";
                        echo "<td>{$row['Total_ARG_Received']}</td>";
                        echo "</tr>";
                        $serialNumber++;
                    }
                } else {
                    echo "<tr><td colspan='10'>No data found.</td></tr>";
                }
            ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
