<?php
require('util/Connection.php');
require('util/SessionCheck.php');
require('CoHeader.php');

$name = "";
$registration_number = "";
$mobile = "";
$email = "";
$gender = "";
$advisor_name = "";
$address = "";
$nationality = "";
$iit_name = "";
$department_name = "";
$joining_date = "";
$joining_date_campus = "";

 



?>
 <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Academic Status</a></li>
                     
                </ul>
                <!-- END BREADCRUMB -->
 
    
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

 
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <div class="container">
            <h2>All IITs Information</h2>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>IIT Name</th>
                    <th>Total Students</th>
                    <th>View</th>
                </tr>
                </thead>
                <tbody>
                <?php
    // $query1 = "SELECT * FROM iitsInfo"; // Replace 'iitsInfo' with your actual table name
    // $result1 = mysqli_query($con, $query1);

    $query1 = "SELECT COUNT(name) AS total_students, iit_name FROM profile GROUP BY iit_name";
    $result1 = mysqli_query($con, $query1);
    
    // Replace 'profile' with your actual table name
    
    if ($result1->num_rows > 0) {
        $serialNumber = 1; // Initialize serial number
        while ($row = $result1->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$serialNumber}</td>"; // Display serial number
            echo "<td>{$row['iit_name']}</td>";
            echo "<td>{$row['total_students']}</td>";
            echo "<td><a href='viewStudents.php?iit_name={$row['iit_name']}'>View Students</a></td>";
            echo "</tr>";
            $serialNumber++; // Increment serial number
        }
    } else {
        echo "<tr><td colspan='4'>No IITs found in the database.</td></tr>";
    }
    

    // Display total count of IITs and total students
     
?>


                </tbody>
            </table>
        </div>

    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
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