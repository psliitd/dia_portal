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



// Access the IIT name from the session variable
if(isset($_SESSION['user'])) {
    $iit_name = $_SESSION['user'];
} else {
    // Handle case when the session variable is not set
     
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Your Website Title</title>
    <!-- Your existing styles and external libraries -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Your additional styles -->
    <style>
      /* Add this CSS code to your existing styles or style tag */
.container, .container-lg, .container-md, .container-sm, .container-xl {
    max-width: 100%; /* Set the desired max-width, you can adjust this value */
}

@media (min-width: 1200px) {
    .container, .container-lg, .container-md, .container-sm, .container-xl {
        max-width: 3500px; /* Set the desired max-width for larger screens */
    }
}

.table {
    width: 100%; /* Set the desired width, you can adjust this value */
}

.main-div table {
    width: 100%; /* Set the desired width, you can adjust this value */
}

.institute-summary table {
    width: 100%; 
    border: 1px solid balck;
        padding: 8px;
        text-align: center;
        background: white;
        color:black;
    }

/* Add this CSS code to your existing styles or style tag */
body, h1, h2, h3, h4, h5, h6, p, a, span, td, th {
    font-size: 16px;
}

.main-div h3 {
    font-size: 16px;
}

.institute-summary  h2 {
    font-size: 16px; 

}

.table > thead > tr > th {
    background: #39CCCC;
    color: white;
    font-size: 14px;
    font-weight: 700;
    
}



    </style>
</head>
<body>

<div class="container mt-0">
    <div class="row">
        <div class="col-md-12">
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
          <p><strong>Stipend:</strong> This is the monthly stipend(Rs. 37000/- for first 2 years and Rs. 42000/- in 3rd, 4th, and 5th year).</p>
          <!-- <p><strong>No of Months: </strong>This is number of months for which fellowship is being sought.</p> -->
          <!-- <p><strong>Per day basis Stipend:</strong> This is the amount sought for the first month, if the candidate has joined the programme in the middle of the month. For example, if a candidate has joined on the 24th of August, the first month's amount would be calculated as Rs.31000/- divided by the number of days in the month (30/31), which is Rs. 8000/- in this case.</p> -->
          <p><strong>Annual Research Grant: </strong>This is the Annual Research Grant amount( Rs. 170000/- or as required).</p>
          <!-- <p><strong>Balance Research Grant(till previous quarter):</strong> This is the pending research grant amount for each candidate. This amount is not included in the calculation.</p> -->
                <br><br>

                <div class="table-responsive">
                <table class="table table-bordered">
                <thead>
            <tr>
                <th>Sample calculation</th>
            </tr>
            <tr>
                <th>No. Of Candidates</th>
                <!-- <th>Monthly Stipend Description</th> -->
                <th>Monthly Stipend Amount</th>
                <th>Annual Research Grant Description</th>
                <th>Annual Research Grant Claimed(Last Quarter)</th>
                <th>Fund Calculation Description</th>
                <th>Fund Calculation Result</th>
                <th>TOtal Annual Research Grant Received</th>
                <th>Excess Fund</th>
            </tr>
        </thead>
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
                    // echo '<td>' . $row['Monthly_Stipend_Description'] . '</td>';
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
                <br><br>
               
                <p>Please email <strong style="background-color: yellow;">asean@iitd.ac.in</strong> for any technical queries.</p>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <br><br>

    <!-- Separate div for the second table -->
    <div class="col-md-12 mt-4">
        <div class="institute-summary p-4">
        <h2 style='font-size: 20px;'>Institute Summary</h2>
        <br>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Institute</th>
                        <!-- <th>Institute Code</th> -->
                        <!-- <th>No. Of Students</th> -->
                        <th>Action</th>
                        <th>Upload Annual UC</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                             
                            
                             // Assuming you have an active database connection
 
                             // Fetch data from the database
                             $query = "SELECT * FROM institute_summary WHERE Institute='{$_SESSION['user']}'";
                                                     // Replace 'institute_summary' with your actual table name
                             $result = mysqli_query($con, $query);
 
                             if ($result && mysqli_num_rows($result) > 0) {
                                 while ($row = mysqli_fetch_assoc($result)) {
                                     echo '<tr>';
                                     echo '<td style="padding: 20px; font-weight:bold;">' . $row['Institute'] . '</td>'; // Replace 'data1', 'data2', 'data3' with your actual column names
                                    //  echo '<td style="padding: 20px; font-weight:bold;">' . $row['Institute Code'] . '</td>';
                                    //  echo '<td style="padding: 20px; font-weight:bold;">' . $row['No. Of Students'] . '</td>';

                                     echo '<td style="padding: 10px;"><a href="DiaEdit.php?iit_name=' . urlencode($iit_name) . '" style="color:red;font-weight:bold;">Seek Quarterly Funds</a></td>';

                                     echo '<td style="padding: 10px;"><a href="DiaAnnualUC.php?iit_name=' . urlencode($iit_name) . '" style="color:#35914A; font-weight:bold;">Upload Annual UC</a></td>';
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

<!-- Your existing scripts and external libraries -->
<script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
<!-- ... Additional scripts ... -->
</body>
</html>
