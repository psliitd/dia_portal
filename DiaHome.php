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
                    <li><a href="#">Home</a></li>
                     
                </ul>
                <!-- END BREADCRUMB -->
<style>
    
     .main-div {
        /* Box shadow for the first div */
         box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); 
        background: #FDFDFD;
        padding: 0px;
        margin-bottom: 20px;
        /* margin-right: 200px; Remove this line */
        color: black;
        font-weight: 400;
        margin-left: -283px;
        width: 150%;
    }

    table {
        width: max-content;
        margin: auto;
        text-align: center;
    }

    table th,
    table td {
        text-align: center;
        
    }
    .main-div table {
        border-collapse: collapse;
        height: 100px;
        border: 1px solid black;
        /* background: #343A40; */
        color: white;
        margin-left:2px
        width: 100%;
        max-width: 100%;
        margin: auto;
        margin-bottom: 20px;
        margin-top: 58px 
px
;
    }

    .main-div th,
    .main-div td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
        background: #red;
        color: black;
    }

    .main-div th {
        background-color: white;
    }

    .institute-summary {
        /* Box shadow for the second div */
        /* box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); */
        /* background: linear-gradient(45deg, #f6c2d3, #a2d5f2); */
        width: 150%;
    padding: 11px;
    margin-left: -278px;
    }

    .institute-summary table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ccc;
        background: white;
        color: black;
    }

    .institute-summary th,
    .institute-summary td {
        border: 1px solid balck;
        padding: 8px;
        text-align: center;
        background: white;
        color:black;
    }

    .institute-summary th {
        background-color: #39CCCC;
    }
    body {
        font-family: 'Times New Roman', Times, serif;
        font-size: 16px; /* Adjust the font size as needed */
    }

    /* Other existing styles... */

    .main-div {
        /* Existing styles... */
        font-family: 'Times New Roman', Times, serif; /* Apply font family */
        font-size: 18px; /* Adjust the font size as needed */
    }

    table {
        /* Existing styles... */
        font-family: 'Times New Roman', Times, serif; /* Apply font family */
        font-size: 16px; /* Adjust the font size as needed */
    }

    /* Additional styles for the second table */
    .institute-summary {
        /* Existing styles... */
        font-family: 'Times New Roman', Times, serif; /* Apply font family */
        font-size: 16px; /* Adjust the font size as needed */
    }

    .institute-summary th,
    .institute-summary td {
        /* Existing styles... */
        font-family: 'Times New Roman', Times, serif; /* Apply font family */
        font-size: 16px; /* Adjust the font size as needed */
    }
  
element.style {
}

.table > thead > tr > th {
    background: #f1f5f9;
    color: #56688A;
    font-size: 16px;
}

</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="container mt-0">
    <div class="row">
        <div class="col-md-12"> <!-- Adjust the column size based on your preference -->
            <div class="main-div p-4">
            <h3 class="mb-3" style="background-color: #39CCCC; padding: 5px; color: white; font-weight: bold;">
    <i class="fa fa-info-circle"></i> Important Info
</h3>



                <!-- Content for the first table -->
                <p><strong>Total Amount Sought for Fellowship (Stipend + Annual Research Grant (if applicable)): </strong>This is the total amount that is required for the list of students under the DIA Fellowship Programme. If a student has joined in the current quarter, the annual research grant should also be considered for the calculation.</p>
          <p><strong>Excess Funds (Before calculating the funds for the current quarter):</strong> This is the excess amount from the previous quarter. If you have no excess funds remaining, please enter 0 in the field.</p>
          <p><strong>Total Fund Received: </strong>This is the total amount received from the MoE till date.</p>
          <p><strong>Position of Funds (Please mention expenditure if any/ Committed to):</strong> This is the status of the funds received till date.</p>
          <p><strong>Joined on Campus: </strong>This is the total number of students (across admission rounds) who are attending classes on campus.</p>
          <p><strong>Date of joining:</strong> This is the date of joining for each student under the DIA Programme.</p>
          <p><strong>Stipend:</strong> This is the monthly stipend(Rs. 31000/-).</p>
          <p><strong>No of Months: </strong>This is number of months for which fellowship is being sought.</p>
          <p><strong>Per day basis Stipend:</strong> This is the amount sought for the first month, if the candidate has joined the programme in the middle of the month. For example, if a candidate has joined on the 24th of August, the first month's amount would be calculated as Rs.31000/- divided by the number of days in the month (30/31), which is Rs. 8000/- in this case.</p>
          <p><strong>Annual Research Grant: </strong>This is the Annual Research Grant amount( Rs. 170000/- or as required).</p>
          <p><strong>Balance Research Grant(till previous quarter):</strong> This is the pending research grant amount for each candidate. This amount is not included in the calculation.</p>

          <div class="col-md-0">
            <div class="sample-solution">
                <!-- <h2>Sample Solution</h2> -->
           <div class="table"></div>
                <table>
        <thead>
            <tr>
                <th>Sample calculation</th>
            </tr>
            <tr>
                <th>No. Of Candidates</th>
                <th>Monthly Stipend Description</th>
                <th>Monthly Stipend Amount</th>
                <th>Annual Research Grant Description</th>
                <th>Annual Research Grant Amount</th>
                <th>Fund Calculation Description</th>
                <th>Fund Calculation Result</th>
                <th>Fund Allocated</th>
                <th>Excess Fund</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Assuming you have an active database connection
            // Fetch data from the database
            $query = "SELECT * FROM Quarter1Funds"; // Replace 'institute_summary' with your actual table name
            $result = mysqli_query($con, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['No_of_Candidates'] . '</td>';
                    echo '<td>' . $row['Monthly_Stipend_Description'] . '</td>';
                    echo '<td>' . $row['Monthly_Stipend_Amount'] . '</td>';
                    echo '<td>' . $row['Annual_Research_Grant_Description'] . '</td>';
                    echo '<td>' . $row['Annual_Research_Grant_Amount'] . '</td>';
                    echo '<td>' . $row['Fund_Calculation_Description'] . '</td>';
                    echo '<td>' . $row['Fund_Calculation_Result'] . '</td>';
                    echo '<td>' . $row['Fund_Allocated'] . '</td>';
                    echo '<td>' . $row['Excess_Fund'] . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="9">No data available</td></tr>';
            }
            ?>
        </tbody>
                </table>
               
    Please email <strong>aseaniitfellowship@gmail.com</strong> for any technical queries.
            </div>
        </div> 
    </div>
        </div>

 <br><br> 
    
    <!-- Separate div for the second table -->
    <div class="col-md-12 mt-4">
            <div class="institute-summary p-4">
                <h2>Institute Summary</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Institute</th>
                            <th>Institute Code</th>
                            <th>No. Of Students</th>
                            <th>Action</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                             
                            
                             // Assuming you have an active database connection
 
                             // Fetch data from the database
                             $query = "SELECT * FROM institute_summary"; // Replace 'institute_summary' with your actual table name
                             $result = mysqli_query($con, $query);
 
                             if ($result && mysqli_num_rows($result) > 0) {
                                 while ($row = mysqli_fetch_assoc($result)) {
                                     echo '<tr>';
                                     echo '<td style="padding: 20px; font-weight:bold;">' . $row['Institute'] . '</td>'; // Replace 'data1', 'data2', 'data3' with your actual column names
                                     echo '<td style="padding: 20px; font-weight:bold;">' . $row['Institute Code'] . '</td>';
                                     echo '<td style="padding: 20px; font-weight:bold;">' . $row['No. Of Students'] . '</td>';
                                     echo '<td style="padding: 10px;  "><a href="DiaEdit.php" style="color:red;font-weight:bold;">Edit</a></td>';
                                     echo '<td style="padding: 10px;"><a href="DiaView.php" style="color:#35914A; font-weight:bold;">View</a></td>';
                                     echo '</tr>';
                                 }
                             } else {
                                 echo '<tr><td colspan="5">No data available</td></tr>';
                             }
                              
 
                             ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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