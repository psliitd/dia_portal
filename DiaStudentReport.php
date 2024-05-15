<?php
require('util/Connection.php');
require('util/SessionCheck.php');
require('DiaHeader.php');

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
 
    
      <title>DIA Portal</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
       

       .container {
    width: 80%; 
    border-radius: 20px; 
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); 
    margin-top:5%;
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
    </style> 

 
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <div class="container">
            <div class="title">
            <h2 style='text-align:center; background-color: #39CCCC; font-weight: 700;margin-top:5%; font-family: "Classic Official", sans-serif;'>
    <span style="color: black;">All IIT Students Academic Information</span>
     
</h2>



            </div>
           
            <table class="table">
                <thead>
                <tr>
                <th style='text-align:center; font-size: 14px;'>ID</th>
<th style='text-align:center; font-size: 14px;'>IIT Name</th>
<th style='text-align:center; font-size: 14px;'>Total Students</th>
<th style='text-align:center; font-size: 14px;'>View</th>

                </tr>
                </thead>
                <tbody>
                <?php
    // $query1 = "SELECT * FROM iitsInfo"; // Replace 'iitsInfo' with your actual table name
    // $result1 = mysqli_query($con, $query1);

                // Access the IIT name from the session variable
            if(isset($_SESSION['user'])) {
                $iit_name = $_SESSION['user'];
            } else {
                // Handle case when the session variable is not set
                
            }

            $query1 = "SELECT COUNT(name) AS total_students, iit_name FROM profile WHERE iit_name='$iit_name'";
            $result1 = mysqli_query($con, $query1);
    
    // Replace 'profile' with your actual table name
    
    if ($result1->num_rows > 0) {
        $serialNumber = 1; // Initialize serial number
        while ($row = $result1->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$serialNumber}</td>"; // Display serial number
            echo "<td>{$row['iit_name']}</td>";
            echo "<td>{$row['total_students']}</td>";
            echo "<td><a href='DiaViewStudents.php?iit_name={$row['iit_name']}'>View Students</a></td>";
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