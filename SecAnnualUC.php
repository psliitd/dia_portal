<?php
require('util/Connection.php');
require('util/SessionCheck.php');
require('CoHeader.php');
?>

<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Fund Status</a></li>
</ul>
<!-- END BREADCRUMB -->

<title>DIA Student Panel</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="theme-color" content="#ffffff">

<link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
    th, td {
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
    .button:hover {
        background-color: #0056b3;
    }
</style>

<div class="container">
    <div class="title">
        <h2 style='text-align:center; background-color: #39cccc; font-weight: 700;margin-top:5%;font-family: "Classic Official", sans-serif;'>
            <span style="color: black;">All IIT Fund Information</span>
        </h2>
    </div>
    <form method="get" action="">
        <label for="year" style="font-size: 14px;">Select Financial Year:</label>
        <select id="year" name="year">
            <option value="2024-2025" <?php if(isset($_GET['year']) && $_GET['year'] == 'FY2024-25') echo 'selected'; ?>>FY2024-25</option>
            <option value="2025-2026" <?php if(isset($_GET['year']) && $_GET['year'] == 'FY2025-26') echo 'selected'; ?>>FY2025-26</option>
            <option value="2026-2027" <?php if(isset($_GET['year']) && $_GET['year'] == 'FY2026-27') echo 'selected'; ?>>FY2026-27</option>
            <option value="2027-2028" <?php if(isset($_GET['year']) && $_GET['year'] == 'FY2027-28') echo 'selected'; ?>>FY2027-28</option>
        </select>
        <input type="submit" name="apply_filter" value="Apply Filter" class="button">
    </form>
    
    <div class="table-responsive">
        <table class="table" id="fundTable" style="border: 2px solid black; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style='text-align:center; font-size: 14px;'>S. No.</th>
                    <th style='text-align:center; font-size: 14px;'>IIT Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Get selected financial year from the form submission
                $selected_year = $_GET['year'] ?? '';

                // Query to filter results based on selected financial year
                $query = "SELECT iit_name FROM annualucfiles  ORDER BY iit_name ASC";
                $stmt = $con->prepare($query);
                 
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $serialNumber = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$serialNumber}</td>"; // Display serial number
                        echo "<td>{$row['iit_name']}</td>";
                        echo "<td><a href='api/downloadAnnualUC.php?iit_name={$row['iit_name']}&year={$selected_year}' class='btn btn-primary'>Download UC</a></td>";
                        echo "</tr>";
                        $serialNumber++;
                    }
                } else {
                    echo "<tr><td colspan='3'>No data found for the selected financial year.</td></tr>";
                }
                $stmt->close();
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Include XLSX library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.4/xlsx.full.min.js"></script>
<!-- START SCRIPTS -->
<script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
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
