<?php
require('util/Connection.php');
require('util/SessionCheck.php');
require('CoHeader.php');


$sqlCreateCopyTable = "CREATE TABLE IF NOT EXISTS CopyFundTable (
    id INT AUTO_INCREMENT PRIMARY KEY,
    iit_name VARCHAR(255),
    Fund_available_PFMS INT,
    Total_Funds_lapsed_last_quarter INT,
    TFR_since_2020 INT,
    Total_Amount_Sought INT,
    Total_Funds_lapsed_and_not_reallocated INT,
    Excess_fund_last_quarter INT,
     
    financial_year VARCHAR(255),
    curr_quarter VARCHAR(255)
)";

// Execute the SQL query to create the table
if ($con->query($sqlCreateCopyTable) === TRUE) {
     
} else {
    echo "Error creating table: " . $con->error;
}

// SQL query to copy data from another table to CopyFundTable only if it doesn't already exist
$sqlCopyData = "INSERT INTO CopyFundTable (iit_name, Fund_available_PFMS, Total_Funds_lapsed_last_quarter, TFR_since_2020, Total_Amount_Sought, Total_Funds_lapsed_and_not_reallocated, Excess_fund_last_quarter, financial_year, curr_quarter)
                SELECT iit_name, Fund_available_PFMS, Total_Funds_lapsed_last_quarter, TFR_since_2020, Total_Amount_Sought, Total_Funds_lapsed_and_not_reallocated, Excess_fund_last_quarter, financial_year, curr_quarter
                FROM anotherTable
                WHERE NOT EXISTS (
                    SELECT 1 FROM CopyFundTable WHERE CopyFundTable.iit_name = anotherTable.iit_name
                )";

// Execute the SQL query to copy data
if ($con->query($sqlCopyData) === TRUE) {
    if ($con->affected_rows > 0) {
        // echo "Data copied successfully";
    } else {
        // echo "No new data to copy";
    }
} else {
    // echo "Error copying data: " . $con->error;
}
 
?>

<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Fund Edit Tables</a></li>
</ul>
<!-- END BREADCRUMB -->

<title>DIA Student Panel</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="theme-color" content="#ffffff">

<link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


<style>
    .container {
        width: 100%;
        border-radius: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        margin-top: 5%;
    }

    table {
        width: 100%;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid black !important;
        padding: 10px;
        text-align: center;
        font-size: 18px;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: coral;
    }

    select {
    width: 150px;
    padding: 8px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
/* Normal state */
.button {
    background-color: #007bff;
    color: #ffffff;
    padding: 5px 10px;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
    margin: 10px;
}

/* Hover state */
.button:hover {
    background-color: #0056b3; /* Darker shade of blue */
}
 
     

    
    
</style>
 
<div class="container">
    <div class="title">
        <h2 style='text-align:center; background-color: #39cccc; font-weight: 700;margin-top:5%;font-family: "Classic Official", sans-serif;'>
            <span style="color: black;">All IIT Fund Information</span>
             
        </h2>
    </div>
    <form method="get" action="">
    
        <label for="quarter" style="font-size: 14px;">Select Quarter:</label>
<select id="quarter" name="quarter">
    <option value="Q1(Apr-Jun)" <?php if(isset($_GET['quarter']) && $_GET['quarter'] == 'Q1(Apr-Jun)') echo 'selected'; ?>>Q1 (Apr-Jun)</option>
    <option value="Q2(July-Sept)" <?php if(isset($_GET['quarter']) && $_GET['quarter'] == 'Q2(July-Sept)') echo 'selected'; ?>>Q2 (July-Sept)</option>
    <option value="Q3(Oct-Dec)" <?php if(isset($_GET['quarter']) && $_GET['quarter'] == 'Q3(Oct-Dec)') echo 'selected'; ?>>Q3 (Oct-Dec)</option>
    <option value="Q4(Jan-Mar)" <?php if(isset($_GET['quarter']) && $_GET['quarter'] == 'Q4(Jan-Mar)') echo 'selected'; ?>>Q4 (Jan-Mar)</option>
</select>

<label for="year" style="font-size: 14px;">Select Financial Year:</label>
<select id="year" name="year">
    <option value="FY2024-25" <?php if(isset($_GET['year']) && $_GET['year'] == 'FY2024-25') echo 'selected'; ?>>FY2024-25</option>
    <option value="FY2025-26" <?php if(isset($_GET['year']) && $_GET['year'] == 'FY2025-26') echo 'selected'; ?>>FY2025-26</option>
    <option value="FY2026-27" <?php if(isset($_GET['year']) && $_GET['year'] == 'FY2026-27') echo 'selected'; ?>>FY2026-27</option>
    <option value="FY2027-28" <?php if(isset($_GET['year']) && $_GET['year'] == 'FY2027-28') echo 'selected'; ?>>FY2027-28</option>
</select>
    
        <input type="submit" name="apply_filter" value="Apply Filter" style="background-color: #007bff; color: #ffffff;  padding: 5px 10px; border: none; border-radius: 20px; margin:10px; cursor: pointer; font-size: 16px; transition: background-color 0.3s ease;" onmouseover="this.style.backgroundColor='#0056b3'" onmouseout="this.style.backgroundColor='#007bff'">

    </form>
    <!-- New Table for Fund Information -->
    <div class="table-responsive">
        <table class="table" id="fundTable" style="border: 2px solid black; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style='text-align:center; font-size: 14px;  '>S. No.</th>
                    <th style='text-align:center; font-size: 14px;  '>IIT Name</th>
                    <th style='text-align:center; font-size: 14px; '>Fund Available on PFMS</th>
                    <th style='text-align:center; font-size: 14px;  '>Total Fund Lapsed (last quarter)</th>
                    <th style='text-align:center; font-size: 14px;  '>TFR_since_2020</th>
                    <th style='text-align:center; font-size: 14px;  '>Total Amount Sought<span> [C]</span></th>
                    <th style='text-align:center; font-size: 14px; '>Total Funds Lapsed and Not Reallocated<span> [A]</span></th>
                    <th style='text-align:center; font-size: 14px;  '>Excess Fund Last Quarter<span> [B]</span></th>
                    <th style='text-align:center; font-size: 14px;  '>Net Fund Sought</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Get selected financial year and quarter from the form submission
                $selected_financial_year = $_GET['year'] ?? '';
                $selected_quarter = $_GET['quarter'] ?? '';
                $query3 = "SELECT iit_name.*, anothertable.*
                          FROM iit_name
                          INNER JOIN anothertable ON iit_name.name = anothertable.iit_name
                          WHERE anothertable.financial_year = '$selected_financial_year'
                          AND anothertable.curr_quarter = '$selected_quarter' ORDER BY iit_name.name ASC";
                $result3 = mysqli_query($con, $query3);

                $query1 = "SELECT * FROM iit_name"; // Assuming 'iitsInfo' is your table name
                $result1 = mysqli_query($con, $query1);

                $query2 = "SELECT * FROM anothertable"; // Assuming 'anothertable' is your table name
                $result2 = mysqli_query($con, $query2);

                $query = "SELECT iit_name.*, anothertable.*
                            FROM iit_name
                            INNER JOIN anothertable ON iit_name.name = anothertable.iit_name ORDER BY iit_name.name ASC";
                $result = mysqli_query($con, $query);

                 


                if (isset($_GET['apply_filter'])) {
                    // If Apply Filter is clicked, use $result3
                    $result = $result3;
                } else {
                    // Otherwise, use $result
                    $result = $result;
                }

                if ($result->num_rows > 0 ) {
                    $totalC = 0;
                    $totalA = 0;
                    $totalB = 0;
                    $serialNumber = 1;

                    while ($row = $result->fetch_assoc()) {
                        $iit_name = $row['name'];

                        $Fund_available_PFMS = $row['Fund_available_PFMS'];
                        $Total_Funds_lapsed_last_quarter = $row['Total_Funds_lapsed_last_quarter'];
                        $TFR_since_2020 = $row['TFR_since_2020'];
                        $Total_Amount_sought = $row['Total_Amount_Sought'];//c
                        $Total_Funds_lapsed_and_not_reallocated = $row['Total_Funds_lapsed_and_not_reallocated'];//a
                        $Excess_fund_last_quarter = $row['Excess_fund_last_quarter'];//b

                        $netFundSought =  $Total_Amount_sought + $Total_Funds_lapsed_and_not_reallocated - $Excess_fund_last_quarter;
                        
                        
                        
                        


                        echo "<tr>";
                        echo "<td>{$serialNumber}</td>"; // Display serial number
                        echo "<td>{$iit_name}</td>";
                        echo "<td>{$Fund_available_PFMS}</td>";
                        echo "<td>{$Total_Funds_lapsed_last_quarter}</td>";
                        echo "<td>{$TFR_since_2020}</td>";
                        echo "<td>{$Total_Amount_sought}</td>";
                        echo "<td>{$Total_Funds_lapsed_and_not_reallocated}</td>";
                        echo "<td>{$Excess_fund_last_quarter }</td>";
                        echo "<td>{$netFundSought }</td>";
                        
                        // $baseURL = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
                        // $baseURL .= "://".$_SERVER['HTTP_HOST'];

                        // $downloadURL = $baseURL . "/api/downloadUC.php?id={$iit_name}";
                        // echo "<td><a href='{../api/downloadUC.php?id={$iit_name}"}' class='btn btn-primary'>Download UC</a></td>";
                        echo "<td><a href='api/downloadUC.php?id={$iit_name}' class='btn btn-primary'>Download UC</a></td>";

                        echo "</tr>";

                        // Accumulate total funds
                        $totalC += $Total_Amount_sought;
                        $totalA += $Total_Funds_lapsed_and_not_reallocated;
                        $totalB += $Excess_fund_last_quarter;
                        $serialNumber++; // Increment serial number
                    }

                    // Calculate total net fund sought
                    $totalNetFundSought = $totalC + $totalA - $totalB  ;

                    // Display Total row
                    echo "<tr>";
                    echo "<td colspan='5' style='background-color:yellow;'><strong>Total</strong></td>";
                    echo "<td style='background-color:yellow;'>{$totalC}</td>";
                    echo "<td style='background-color:yellow;'>{$totalA}</td>";
                    echo "<td style='background-color:yellow;'>{$totalB}</td>";
                    echo "<td style='background-color:yellow;'>{$totalNetFundSought}</td>";
                    echo "</tr>";
                } else {
                    echo "<tr><td colspan='5'>No data found.</td></tr>";
                }
                ?>
            </tbody>
        </table>

         

        <button onclick="downloadExcel()" 
        style="float: right; 
               background-color: #4CAF50; /* Green */
               border: none;
               color: white;
               padding: 10px 10px;
               text-align: center;
               text-decoration: none;
               display: inline-block;
               font-size: 14px;
               margin: 4px 2px;
               cursor: pointer;
               border-radius: 20px;
               transition-duration: 0.4s;
               transform: perspective(1px) translateZ(0);
               transform-origin: 0 0;
               transition: transform 0.5s, box-shadow 0.5s;
               /* Add glow effect */
               box-shadow: 0 0 10px rgba(76, 175, 80, 0.7); /* Green glow color */
               }
               /* Add hover effect */
               &:hover {
               box-shadow: 0 0 20px rgba(76, 175, 80, 0.7); /* Increased glow on hover */
               transform: scale(1.1); /* Scale up slightly on hover */
               }">
  Download Excel
</button>


        <script>
            // Function to trigger client-side download of Excel file
            function downloadExcel() {
                var table = document.getElementById("fundTable");
                var ws = XLSX.utils.table_to_sheet(table);
                var wb = XLSX.utils.book_new();
                XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
                XLSX.writeFile(wb, "iit_fund_information.xlsx");
            }

           
        </script>
    </div>  
</div>
 
<div class="container">
        <div class="title">
            <h2 style='text-align:center; background-color: #39cccc; font-weight: 700;margin-top:5%;font-family: "Classic Official", sans-serif;'>
                <span style="color: black;">All IIT Fund Information (Editable table)</span>
            </h2>
        </div>
        <form method="get" action="">
            <label for="quarter" style="font-size: 14px;">Select Quarter:</label>
            <select id="quarteredit" name="quarter">
                <option value="Q1(Apr-Jun)" <?php if(isset($_GET['quarter']) && $_GET['quarter'] == 'Q1(Apr-Jun)') echo 'selected'; ?>>Q1 (Apr-Jun)</option>
                <option value="Q2(July-Sept)" <?php if(isset($_GET['quarter']) && $_GET['quarter'] == 'Q2(July-Sept)') echo 'selected'; ?>>Q2 (July-Sept)</option>
                <option value="Q3(Oct-Dec)" <?php if(isset($_GET['quarter']) && $_GET['quarter'] == 'Q3(Oct-Dec)') echo 'selected'; ?>>Q3 (Oct-Dec)</option>
                <option value="Q4(Jan-Mar)" <?php if(isset($_GET['quarter']) && $_GET['quarter'] == 'Q4(Jan-Mar)') echo 'selected'; ?>>Q4 (Jan-Mar)</option>
            </select>

            <label for="year" style="font-size: 14px;">Select Financial Year:</label>
            <select id="yearedit" name="year">
                <option value="FY2024-25" <?php if(isset($_GET['year']) && $_GET['year'] == 'FY2024-25') echo 'selected'; ?>>FY2024-25</option>
                <option value="FY2025-26" <?php if(isset($_GET['year']) && $_GET['year'] == 'FY2025-26') echo 'selected'; ?>>FY2025-26</option>
                <option value="FY2026-27" <?php if(isset($_GET['year']) && $_GET['year'] == 'FY2026-27') echo 'selected'; ?>>FY2026-27</option>
                <option value="FY2027-28" <?php if(isset($_GET['year']) && $_GET['year'] == 'FY2027-28') echo 'selected'; ?>>FY2027-28</option>
            </select>
            <input type="submit" name="apply_filter2" value="Apply Filter" style="background-color: #007bff; color: #ffffff;  padding: 5px 10px; border: none; border-radius: 20px; margin:10px; cursor: pointer; font-size: 16px; transition: background-color 0.3s ease;" onmouseover="this.style.backgroundColor='#0056b3'" onmouseout="this.style.backgroundColor='#007bff'">
        </form>

        <!-- New Table for Fund Information -->
        <div class="table-responsive">
            <form method="post" action="">
                <table class="table" id="fundTable" style="border: 2px solid black; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th style='text-align:center; font-size: 14px;  '>S. No.</th>
                            <th style='text-align:center; font-size: 14px;  '>IIT Name</th>
                            <th style='text-align:center; font-size: 14px; '>Fund Available on PFMS</th>
                            <th style='text-align:center; font-size: 14px;  '>Total Fund Lapsed (last quarter)</th>
                            <th style='text-align:center; font-size: 14px;  '>TFR_since_2020</th>
                            <th style='text-align:center; font-size: 14px;  '>Total Amount Sought<span> [C]</span></th>
                            <th style='text-align:center; font-size: 14px; '>Total Funds Lapsed and Not Reallocated<span> [A]</span></th>
                            <th style='text-align:center; font-size: 14px;  '>Excess Fund Last Quarter<span> [B]</span></th>
                            <!-- <th style='text-align:center; font-size: 14px;  '>Net Fund Sought</th> -->
                            <th style='text-align:center; font-size: 14px;  '>Actions</th>
                             
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Get selected financial year and quarter from the form submission
                        $selected_financial_year = $_GET['year'] ?? '';
                        $selected_quarter = $_GET['quarter'] ?? '';
                        $query = "SELECT iit_name.*, copyfundtable.*
                                  FROM iit_name
                                  INNER JOIN copyfundtable ON iit_name.name = copyfundtable.iit_name
                                  WHERE copyfundtable.financial_year = '$selected_financial_year'
                                  AND copyfundtable.curr_quarter = '$selected_quarter' ORDER BY iit_name.name ASC";
                        $result = mysqli_query($con, $query);
                        
                if (isset($_GET['apply_filter2'])) {
                    // If Apply Filter is clicked, use $result3
                     
                    $result = $result;
                }
                        if ($result->num_rows > 0) {
                            $serialNumber = 1;

                            while ($row = $result->fetch_assoc()) {
                                $iit_name = $row['name'];

                                echo "<tr>";
                                echo "<td>{$serialNumber}</td>"; // Display serial number
                                echo "<td>{$iit_name}</td>";
                                // Replace each td with input fields for editable values
                                echo "<td><input type='number' name='fund_available[]' value='{$row['Fund_available_PFMS']}' style='width: 80px;'></td>";
                                echo "<td><input type='number' name='total_fund_lapsed[]' value='{$row['Total_Funds_lapsed_last_quarter']}' style='width: 80px;'></td>";
                                echo "<td><input type='number' name='tfr_since_2020[]' value='{$row['TFR_since_2020']}' style='width: 80px;'></td>";
                                echo "<td><input type='number' name='total_amount_sought[]' value='{$row['Total_Amount_Sought']}' style='width: 80px;'></td>";
                                echo "<td><input type='number' name='total_funds_lapsed[]' value='{$row['Total_Funds_lapsed_and_not_reallocated']}' style='width: 80px;'></td>";
                                echo "<td><input type='number' name='excess_fund_last_quarter[]' value='{$row['Excess_fund_last_quarter']}' style='width: 80px;'></td>";
                                // echo "<td>{$row['Net_Fund_Sought']}</td>";
                                // Add hidden inputs for iit_name and quarter_year to identify the row
                                echo "<input type='hidden' name='iit_name[]' value='{$iit_name}'>";
                                echo "<input type='hidden' name='quarter_year[]' value='{$selected_quarter} {$selected_financial_year}'>";
                                echo "<td><button type='submit' name='edit_row'>Edit</button></td>";
                                
                                
                                echo "</tr>";
                                $serialNumber++; // Increment serial number
                            }
                        } else {
                            echo "<tr><td colspan='5'>No data found.</td></tr>";
                        }
                        ?>
                    </tbody>
                     
                </table>

            </form>

            
        </div>  
    </div>
    
    <div class="container">
        <div class="title">
            <h2 style='text-align:center; background-color: #39cccc; font-weight: 700;margin-top:5%;font-family: "Classic Official", sans-serif;'>
                <span style="color: black;">All IIT Fund Information (Permanent table)</span>
            </h2>
        </div>
        <form method="get" action="">
            <label for="quarter" style="font-size: 14px;">Select Quarter:</label>
            <select id="quarter" name="quarter">
                <option value="Q1(Apr-Jun)" <?php if(isset($_GET['quarter']) && $_GET['quarter'] == 'Q1(Apr-Jun)') echo 'selected'; ?>>Q1 (Apr-Jun)</option>
                <option value="Q2(July-Sept)" <?php if(isset($_GET['quarter']) && $_GET['quarter'] == 'Q2(July-Sept)') echo 'selected'; ?>>Q2 (July-Sept)</option>
                <option value="Q3(Oct-Dec)" <?php if(isset($_GET['quarter']) && $_GET['quarter'] == 'Q3(Oct-Dec)') echo 'selected'; ?>>Q3 (Oct-Dec)</option>
                <option value="Q4(Jan-Mar)" <?php if(isset($_GET['quarter']) && $_GET['quarter'] == 'Q4(Jan-Mar)') echo 'selected'; ?>>Q4 (Jan-Mar)</option>
            </select>

            <label for="year" style="font-size: 14px;">Select Financial Year:</label>
            <select id="year" name="year">
                <option value="FY2024-25" <?php if(isset($_GET['year']) && $_GET['year'] == 'FY2024-25') echo 'selected'; ?>>FY2024-25</option>
                <option value="FY2025-26" <?php if(isset($_GET['year']) && $_GET['year'] == 'FY2025-26') echo 'selected'; ?>>FY2025-26</option>
                <option value="FY2026-27" <?php if(isset($_GET['year']) && $_GET['year'] == 'FY2026-27') echo 'selected'; ?>>FY2026-27</option>
                <option value="FY2027-28" <?php if(isset($_GET['year']) && $_GET['year'] == 'FY2027-28') echo 'selected'; ?>>FY2027-28</option>
            </select>
            <input type="submit" name="apply_filter3" value="Apply Filter" style="background-color: #007bff; color: #ffffff;  padding: 5px 10px; border: none; border-radius: 20px; margin:10px; cursor: pointer; font-size: 16px; transition: background-color 0.3s ease;" onmouseover="this.style.backgroundColor='#0056b3'" onmouseout="this.style.backgroundColor='#007bff'">
        </form>

        <!-- New Table for Fund Information -->
        <div class="table-responsive">
            <form method="post" action="">
                <table class="table" id="fundTable" style="border: 2px solid black; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th style='text-align:center; font-size: 14px;  '>S. No.</th>
                            <th style='text-align:center; font-size: 14px;  '>IIT Name</th>
                            <th style='text-align:center; font-size: 14px; '>Fund Available on PFMS</th>
                            <th style='text-align:center; font-size: 14px;  '>Total Fund Lapsed (last quarter)</th>
                            <th style='text-align:center; font-size: 14px;  '>TFR_since_2020</th>
                            <th style='text-align:center; font-size: 14px;  '>Total Amount Sought<span> [C]</span></th>
                            <th style='text-align:center; font-size: 14px; '>Total Funds Lapsed and Not Reallocated<span> [A]</span></th>
                            <th style='text-align:center; font-size: 14px;  '>Excess Fund Last Quarter<span> [B]</span></th>
                            <th style='text-align:center; font-size: 14px;  '>Net Fund Sought</th>
                            <!-- <th style='text-align:center; font-size: 14px;  '>Actions</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Get selected financial year and quarter from the form submission
                        $selected_financial_year = $_GET['year'] ?? '';
                        $selected_quarter = $_GET['quarter'] ?? '';
                        $query = "SELECT iit_name.*, copyfundtable.*
                                  FROM iit_name
                                  INNER JOIN copyfundtable ON iit_name.name = copyfundtable.iit_name
                                  WHERE copyfundtable.financial_year = '$selected_financial_year'
                                  AND copyfundtable.curr_quarter = '$selected_quarter'  ORDER BY iit_name.name ASC";
                        $result = mysqli_query($con, $query);
                        if (isset($_GET['apply_filter3'])) {
                             
                             
                            $result = $result;
                        }
                        if ($result->num_rows > 0) {
                            $serialNumber = 1;
                            $totalC = 0;
                            $totalA = 0;
                            $totalB = 0;

                        
                        
                            while ($row = $result->fetch_assoc()) {
                                $iit_name = $row['name'];
                                $Fund_available_PFMS = $row['Fund_available_PFMS'];
                                $Total_Funds_lapsed_last_quarter = $row['Total_Funds_lapsed_last_quarter'];
                                $TFR_since_2020 = $row['TFR_since_2020'];
                                $Total_Amount_sought = $row['Total_Amount_Sought'];//c
                                $Total_Funds_lapsed_and_not_reallocated = $row['Total_Funds_lapsed_and_not_reallocated'];//a
                                $Excess_fund_last_quarter = $row['Excess_fund_last_quarter'];//b
        
                                $netFundSought =  $Total_Amount_sought + $Total_Funds_lapsed_and_not_reallocated - $Excess_fund_last_quarter;
                                echo "<tr>";
                                echo "<td>{$serialNumber}</td>"; // Display serial number
                                echo "<td>{$iit_name}</td>";
                                echo "<td>{$row['Fund_available_PFMS']}</td>";
                                echo "<td>{$row['Total_Funds_lapsed_last_quarter']}</td>";
                                echo "<td>{$row['TFR_since_2020']}</td>";
                                echo "<td>{$row['Total_Amount_Sought']}</td>";
                                echo "<td>{$row['Total_Funds_lapsed_and_not_reallocated']}</td>";
                                echo "<td>{$row['Excess_fund_last_quarter']}</td>";
                                // Display the value of Net_Fund_Sought if needed
                                echo "<td>{$netFundSought}</td>";
                                echo "</tr>";
                            
                                
                        $totalC += $Total_Amount_sought;
                        $totalA += $Total_Funds_lapsed_and_not_reallocated;
                        $totalB += $Excess_fund_last_quarter;
                        $serialNumber++; // Increment serial number
                    }

                    // Calculate total net fund sought
                    $totalNetFundSought = $totalC + $totalA - $totalB  ;

                    // Display Total row
                    echo "<tr>";
                    echo "<td colspan='5' style='background-color:yellow;'><strong>Total</strong></td>";
                    echo "<td style='background-color:yellow;'>{$totalC}</td>";
                    echo "<td style='background-color:yellow;'>{$totalA}</td>";
                    echo "<td style='background-color:yellow;'>{$totalB}</td>";
                    echo "<td style='background-color:yellow;'>{$totalNetFundSought}</td>";
                    echo "</tr>";
                }  
                 else {
                            echo "<tr><td colspan='5'>No data found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </form>
        </div>  
    </div>

    <?php
    // Handle form submission to update database
    if (isset($_POST['edit_row'])) {
        // Retrieve edited values from $_POST
        $fund_available = $_POST['fund_available'];
        $total_fund_lapsed = $_POST['total_fund_lapsed'];
        $tfr_since_2020 = $_POST['tfr_since_2020'];
        $total_amount_sought = $_POST['total_amount_sought'];
        $total_funds_lapsed = $_POST['total_funds_lapsed'];
        $excess_fund_last_quarter = $_POST['excess_fund_last_quarter'];
        $iit_name = $_POST['iit_name'];
        $quarter_year = $_POST['quarter_year'];

        // Loop through each edited row and update the database
        for ($i = 0; $i < count($iit_name); $i++) {
            // Update database with the edited values using SQL UPDATE query
            $sql = "UPDATE copyfundtable SET 
                    Fund_available_PFMS='{$fund_available[$i]}', 
                    Total_Funds_lapsed_last_quarter='{$total_fund_lapsed[$i]}', 
                    TFR_since_2020='{$tfr_since_2020[$i]}', 
                    Total_Amount_Sought='{$total_amount_sought[$i]}', 
                    Total_Funds_lapsed_and_not_reallocated='{$total_funds_lapsed[$i]}', 
                    Excess_fund_last_quarter='{$excess_fund_last_quarter[$i]}'
                    WHERE iit_name='{$iit_name[$i]}' 
                    AND CONCAT(curr_quarter, ' ', financial_year)='{$quarter_year[$i]}'";

            if ($con->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $con->error;
            }
        }
        // Redirect the user to avoid resubmission
        header("Location: {$_SERVER['PHP_SELF']}");
         
        exit();
    }
    ?>





</body>
</html>

<?php

 
 
// Close database connection
$con->close();
?>   
  
 

<!-- Include XLSX library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.4/xlsx.full.min.js"></script>


<!-- START SCRIPTS -->
<!-- START PLUGINS -->
<script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>


<!-- END PLUGINS -->

<!-- THIS PAGE PLUGINS -->
<script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
<script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
<script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/tableexport/tableExport.js"></script>
<script type="text/javascript" src="js/plugins/tableexport/jquery.base64.js"></script>
<script type="text/javascript" src="js/plugins/tableexport/html2canvas.js"></script>
<script type="text/javascript" src="js/plugins/tableexport/jspdf/libs/sprintf.js"></script>
<script type="text/javascript" src="js/plugins/tableexport/jspdf/jspdf.js"></script>
<script type="text/javascript" src="js/plugins/tableexport/jspdf/libs/base64.js"></script>
<!-- END PAGE PLUGINS -->

<!-- START TEMPLATE -->
<script type="text/javascript" src="js/plugins.js"></script>
<script type="text/javascript" src="js/actions.js"></script>
<!-- END TEMPLATE -->

</body>

</html>
