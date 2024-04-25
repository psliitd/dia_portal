<?php
require('util/Connection.php');
require('util/SessionCheck.php');
require('CoHeader.php');
?>

<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Academic Status</a></li>
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
        border: 1px solid black;
        padding: 10px;
        text-align: center;
        font-size: 18px;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #b8daff;
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
        <h2 style='text-align:center; background-color: #39cccc; font-weight: 700;margin-top:5%;'>
            <span style="color: black;">All</span>
            <span style="color: red;">IIT'S Fund</span>
            <span style="color: blue;">Information</span>
        </h2>
    </div>
    <form method="get" action="">
    <label for="quarter" style="font-size: 14px;">Select Quarter:</label>
        <select id="quarter" name="quarter">
            <option value="Q1(Apr-Jun)">Q1(Apr-Jun)</option>
            <option value="Q2(July-Sept)">Q2(July-Sept)</option>
            <option value="Q3(Oct-Dec)">Q3(Oct-Dec)</option>
            <option value="Q4(Jan-Mar)">Q4(Jan-Mar)</option>
        </select>

        <label for="year"  style="font-size: 14px;">Select Financial Year:</label>
        <select id="year" name="year">
            <option value="FY2024-25">FY2024-25</option>
            <option value="FY2025-26">FY2025-26</option>
            <option value="FY2026-27">FY2026-27</option>
            <option value="FY2027-28">FY2027-28</option>
          
        </select>
    
        <input type="submit" name="apply_filter" value="Apply Filter" style="background-color: #007bff; color: #ffffff;  padding: 5px 10px; border: none; border-radius: 20px; margin:10px; cursor: pointer; font-size: 16px; transition: background-color 0.3s ease;" onmouseover="this.style.backgroundColor='#0056b3'" onmouseout="this.style.backgroundColor='#007bff'">

    </form>
    <!-- New Table for Fund Information -->
    <div class="table-responsive">
        <table class="table" id="fundTable">
            <thead>
                <tr>
                    <th style='text-align:center; font-size: 14px;'>S. No.</th>
                    <th style='text-align:center; font-size: 14px;'>IIT Name</th>
                    <th style='text-align:center; font-size: 14px;'>Fund Available on PFMS</th>
                    <th style='text-align:center; font-size: 14px;'>Total Fund Lapsed (last quarter)</th>
                    <th style='text-align:center; font-size: 14px;'>TFR_since_2020</th>
                    <th style='text-align:center; font-size: 14px;'>Total Amount Sought<span> [C]</span></th>
                    <th style='text-align:center; font-size: 14px;'>Total Funds Lapsed and Not Reallocated<span> [A]</span></th>
                    <th style='text-align:center; font-size: 14px;'>Excess Fund Last Quarter<span> [B]</span></th>
                    <th style='text-align:center; font-size: 14px;'>Net Fund Sought</th>
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
                          AND anothertable.curr_quarter = '$selected_quarter'";
                $result3 = mysqli_query($con, $query3);

                $query1 = "SELECT * FROM iit_name"; // Assuming 'iitsInfo' is your table name
                $result1 = mysqli_query($con, $query1);

                $query2 = "SELECT * FROM anothertable"; // Assuming 'anothertable' is your table name
                $result2 = mysqli_query($con, $query2);

                $query = "SELECT iit_name.*, anothertable.*
                            FROM iit_name
                            INNER JOIN anothertable ON iit_name.name = anothertable.iit_name";
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
                    echo "<td colspan='5'><strong>Total</strong></td>";
                    echo "<td>{$totalC}</td>";
                    echo "<td>{$totalA}</td>";
                    echo "<td>{$totalB}</td>";
                    echo "<td>{$totalNetFundSought}</td>";
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

<!-- New Table for Fund Status of Students -->
<div class="container">
    <div class="title">
        <h2 style='text-align:center; background-color: #39cccc; font-weight: 700;margin-top:5%;'>
            <span style="color: black;">All</span>
            <span style="color: red;">IIT'S Fund Status</span>
            <span style="color: blue;">of Students</span>
        </h2>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style='text-align:center; font-size: 14px;'>ID</th>
                    <th style='text-align:center; font-size: 14px;'>IIT Name</th>
                    <th style='text-align:center; font-size: 14px;'>View</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM iit_name"; // Assuming 'anothertable' is your table name
                $result = mysqli_query($con, $query);
                if ($result->num_rows > 0) {
                    $serialNumber = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$serialNumber}</td>";
                        echo "<td>{$row['name']}</td>";
                        echo "<td><a href='FundStatusOfiit.php?iit_name={$row['name']}'>View Fund Status of Students</a></td>";
                        echo "</tr>";
                        $serialNumber++;
                    }
                } else {
                    echo "<tr><td colspan='3'>No data found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

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
