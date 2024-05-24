<?php
require('util/Connection.php');
require('util/SessionCheck.php');
require('DiaHeader.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
$SNo = "";
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
$Name_of_Applicant="";
$Application_Number ="";
$Country ="";
$Round ="";
$Date_of_Joining ="";
$Stipend ="";
$No_Of_Months ="";
$Per_Day_Basis_Stipend ="";
$Annual_Research_Grant ="";
$Balance_Research_Grant ="";
 
// }
  
// Retrieve the iit_name value from the URL
if(isset($_GET['iit_name'])) {
    $iit_name = $_GET['iit_name'];
      
    // Use the $iit_name variable in your code
} else {
    // Handle case when the iit_name is not provided in the URL
}



?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>



th, td {
        text-align: center;
        font-size: 14px; 
        border: 2px solid black;
       
    }
    .table > thead > tr > th {
    background: #f1f5f9;
    color: #56688A;
    font-size: 16px;}
    table.table tr:hover td,
    table.table tr:hover th {
        background-color: #CFE2FF;
    }
     .form-group label::after {
        content: '*';
        font-size: 1.2em; /* Adjust the font size as needed */
        color: red; /* Set the color to red */
        margin-left: 4px; /* Provide some spacing between the label text and asterisk */
        
    }
    .sample-calculation {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
        font-size:18px;
    }

    .sample-calculation caption {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .sample-calculation th,
    .sample-calculation td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .sample-calculation th {
        background-color: #f2f2f2;
    }

    .sample-calculation button {
        background-color: #007bff;
        color: white;
        padding: 10px;
        border: none;
        cursor: pointer;
        margin-top: 20px;
    }

    .sample-calculation button:hover {
        background-color: #0056b3;
    }
  
    #legendModal {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 20px;
        border: 1px solid black;
        max-width: 1000px; 
        width: 200%;
        text-align: left;
        font-size: 16px; 
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    }

    #legendModal h3 {
        font-size: 24px; 
        margin-bottom: 10px;
    }

    #legendModal p {
        margin-bottom: 15px;
    }
    .text-center {
  text-align: center;
}

.form-group {
  display: inline-flex;
  align-items: center;
}

.font-weight-bold {
  font-weight: bold;
  font-size: 16px;
  width: 300px;
  margin-top: 50px;
  height: 80px;
}

#uploadUC {
  font-size: 14px;
}

#uploadUC {

  background-image: linear-gradient(to right, #fb4b4b, #d0a4a4); /* Gradient background */
}



#uploadUC:hover {
  border-color: #333; /* Darker stroke color */
}

.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

    
    </style>

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>

                </ul>
                <!-- END BREADCRUMB -->


				<!-- PAGE CONTENT WRAPPER -->
                <body>
                <div class="divheader" style="text-align: center; background-color:#39CCCC;">
                <h1 style="border: 2px solid black; border-image: linear-gradient(to right, red, blue) 1; margin-top: 80px;">Doctoral-fellowship in India for ASEAN - Fellowship Sought from MoE</h1>

   
    
</div>
<div class="divdanger" style="text-align: center;">
    <h3 class="text-danger" style="text-transform: capitalize;">Please enter 0 for any amount/number that is not applicable</h3>
</div>


<div class="divform">
    <form id="myForm" enctype="multipart/form-data"  method ="post" action="api/saveFormData.php" >
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="quarter" class="font-weight-bold" style="font-size: 16px;">Quarter *</label>
                        <select id="quarter" name="quarter" required class="form-control" style="font-size: 14px;">
                            <option value="">---Select---</option>
                            <option value="Q1(Apr-Jun)">Q1 (Apr-Jun)</option>
                            <option value="Q2(July-Sept)">Q2 (July-Sept)</option>
                            <option value="Q3(Oct-Dec)">Q3 (Oct-Dec)</option>
                            <option value="Q4(Jan-Mar)">Q4 (Jan-Mar)</option>
                        </select>
                    </div>
                     
                    <div class="form-group">
                        <label for="fund_available" class="font-weight-bold" style="font-size: 16px;">Fund Available on PFMS: FOR</label>
                        <input type="number" id="fund_available" name="fund_available" value="0"  min="0" required class="form-control" style="font-size: 14px;">
                    </div>
                    <!-- <div class="form-group">
                        <label for="excess_funds" class="font-weight-bold" style="font-size: 16px;">Excess Funds from last quarter</label>
                        <input type="text" id="excess_funds" name="excess_funds" placeholder="Excess Funds from last quarter" required class="form-control" style="font-size: 14px;">
                    </div> -->
                    <!-- <div class="form-group">
                        <label for="total_lapsed_funds" class="font-weight-bold" style="font-size: 16px;">Total funds lapsed (Last Quarter-dropdown)</label>
                        <input type="text" id="total_lapsed_funds" name="total_lapsed_funds" placeholder="Total funds lapsed " required class="form-control" style="font-size: 14px;">
                    </div> -->

                    <div class="form-group">
                        <label for="total_lapsed_funds" class="font-weight-bold" style="font-size: 16px;">Total funds lapsed ( Last Quarter ): FOR</label>
                        <input type="number" id="total_lapsed_funds" name="total_lapsed_funds"  min="0" required class="form-control" style="font-size: 14px;">
                             
                    </div>


                    <div class="form-group">
                        <label for="total_funds_received" class="font-weight-bold" style="font-size: 16px;">Total Funds received since the year 2020 till date (as per sanction orders and CNA allocation):FOR</label>
                        <input type="number" id="total_funds_received" name="total_funds_received"  min="0"  required class="form-control" style="font-size: 14px;"  >
                        
 
                    </div>
                </div>

                
                <div class="col-md-6">

                    <div class="form-group">
                            <label for="Financial_year" class="font-weight-bold" style="font-size: 16px;">Select Financial Year</label>
                            <select id="financial_year" name="financial_year" required class="form-control" style="font-size: 14px;">
                                <option value="">---Select---</option>
                                <option value="FY2024-25">FY2024-25</option>
                                <option value="FY2025-26">FY2025-26</option>
                                <option value="FY2026-27">FY2026-27</option>
                                <option value="FY2027-28">FY2027-28</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                    <!-- <div class="form-group">
                        <label for="total_funds_received" class="font-weight-bold" style="font-size: 16px;">Total Funds received since the year 2020 till date (as per sanction orders and CNA allocation)</label>
                        <textarea id="total_funds_received" name="total_funds_received"   required class="form-control" style="font-size: 14px;"  ></textarea>
                        
 
                    </div> -->
                    <!-- <div class="form-group">
                        <label for="t_f_l_n_r" class="font-weight-bold" style="font-size: 16px;">Total funds lapsed and not reallocated(financial year-dropdown)</label>
                        <input type="number" id="t_f_l_n_r" name="t_f_l_n_r" placeholder="Enter Total funds lapsed and not reallocated" required class="form-control" style="font-size: 14px;">
                    </div> -->
                    <div class="form-group">
                        <label for="t_f_l_n_r" class="font-weight-bold" style="font-size: 16px;">Total funds lapsed and not reallocated<span style="color:red;">  [A]</span></label>
                        <input type="number"  id="t_f_l_n_r" name="t_f_l_n_r"  min="0" required class="form-control" style="font-size: 14px;"   placeholder="Total Funds lapsed and not reallocated"  >
                        
                    </div>
                    <div class="form-group">
                        <label for="excess_funds" class="font-weight-bold" style="font-size: 16px;">Excess Funds from last quarter<span style="color:red;">  [B]</span></label>
                        <input type="number"  min="0" id="excess_funds" name="excess_funds" placeholder="Excess Funds from last quarter" required class="form-control" style="font-size: 14px;">
                    </div>
                     

                    <!-- <div class="form-group">
                        <label for="additional_comments" class="font-weight-bold" style="font-size: 16px;">Student Status (Drop-Down)</label>
                        <textarea id="additional_comments" name="additional_comments" rows="4" class="form-control" style="font-size: 14px;" maxlength="1000"></textarea>
<p id="wordCount">0/1000</p>
                    </div> -->

                    <div class="form-group">
                        <label for="student_status" class="font-weight-bold" style="font-size: 16px;"> Total No of students</label>
                        <input  type="number"  min="0" id="student_status" name="student_status" placeholder="Total No of students" required class="form-control" style="font-size: 14px;">
                             
                            
                        
                    </div>

                </div>
            </div>
        </div>
    <br><br>

         
      
        <br>
        <br>
         
    
<br>
<br>
 
  <p class="h2" style="text-align: center; color: #3c8dbc; text-transform: capitalize; margin-top: -30px;">
    Please verify the candidates who are eligible for fellowship in the current quarter
</p>
  
</div>

<BR><BR><BR></BR>

<div class="divtable" style="width: 96%;margin-left:3rem;">
<table class="table  table-striped table-hover table-responsive-sm">
                                <thead >

                                 <th style="background-color: #39CCCC; color: white;">Select All<input type="checkbox" id="selectAll" checked></th>
                                <th style="background-color: #39CCCC; color: white;">S.No</th>
                                <th style="background-color: #39CCCC; color: white;">Name of Applicant</th>
                                <th style="background-color: #39CCCC; color: white;">Application Number</th>
                                <th style="background-color: #39CCCC; color: white;">IIT Entry No</th>
                                <th style="background-color: #39CCCC; color: white;">Country</th>
                                <!-- <th style="background-color: #39CCCC; color: white;">Round</th> -->
                                <th style="background-color: #39CCCC; color: white;">Date of Joining <span style="color: red;">*</span></th>
                                
                                <th style="background-color: #39CCCC; color: white;">Stipend per month<span style="color: red;">*</span></th>
                                <th style="background-color: #39CCCC; color: white;">Stipend disbursed last Quarter<span style="color: red;">*</span></th>
                                <th style="background-color: #39CCCC; color: white;">Student Status<span style="color: red;">*</span></th>
                                <th style="background-color: #39CCCC; color: white;"> Annual Research <br>Grant claimed (last Quarter) <span style="color: red;">*</span></th>
                                <th style="background-color: #39CCCC; color: white;">Total Annual Research <br>Grant Received<br> in this FY<span style="color: red;">*</span></th>
                                </thead>
                                <tbody>
                                     

                            <?php
                             
                            
                            // Assuming you have an active database connection

                            // Fetch data from the database
                            // $query = "SELECT * FROM profile where iit_name= $_GET['iit_name']"; // Replace 'institute_summary' with your actual table name
                            // $result = mysqli_query($con, $query);

                            if(isset($_GET['iit_name'])) {
                                // Sanitize the input to prevent SQL injection
                                $iit_name = mysqli_real_escape_string($con, $_GET['iit_name']);
                                
                                // Prepare the SQL statement using a prepared statement
                                $query = "SELECT * FROM profile WHERE iit_name = ?";
                                
                                // Prepare the statement
                                $stmt = mysqli_prepare($con, $query);
                                
                                if ($stmt) {
                                    // Bind parameters
                                    mysqli_stmt_bind_param($stmt, "s", $iit_name);
                                    
                                    // Execute the statement
                                    mysqli_stmt_execute($stmt);
                                    
                                    // Get the result
                                    $result = mysqli_stmt_get_result($stmt);
                                    
                                    // Do further processing with $result
                                } else {
                                    // Handle error in preparing the statement
                                    echo "Error: " . mysqli_error($con);
                                }
                            } else {
                                // Handle case when the iit_name is not provided in the URL
                            }



                            $rowNumber = 1;

                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr>';
                                    
                                    echo '<td style="text-align: center; vertical-align: middle;"><input type="checkbox" name="eligible[]" value="1" checked></td>';
                                    echo '<td style="padding: 2px; font-weight:bold; text-align: center; vertical-align: middle;">' . $rowNumber . '</td>';
                                    echo '<td style="padding: 2px; font-weight:bold; text-align: center; vertical-align: middle;">' . $row['name'] . '</td>'; 
                                    echo '<td style="padding: 2px; font-weight:bold; text-align: center; vertical-align: middle;">' . $row['registration_number'] . '</td>';
                                    echo '<td style="padding: 2px; font-weight:bold; text-align: center; vertical-align: middle;">' . $row['iit_entry_no'] . '</td>';
                                    echo '<td style="padding: 2px; font-weight:bold; text-align: center; vertical-align: middle;">' . $row['country'] . '</td>';
                                    echo '<td style="padding: 2px; font-weight:bold; text-align: center; vertical-align: middle;">'  . $row['joining_date'] .  '</td>';

                                    echo '<td style="padding: 2px; font-weight:bold; text-align: center; vertical-align: middle;"><input type="number" name="stipend" value="" style="width: 80px;" required></td>';

                                    echo '<td style="padding: 2px; font-weight:bold; text-align: center; vertical-align: middle;">';
                                    echo '<select name="stipend_received">';
                                    echo '<option value="Yes"' . ($row['Stipend_received'] == 'Yes' ? ' selected' : '') . '>Yes</option>';
                                    echo '<option value="No"' . ($row['Stipend_received'] == 'No' ? ' selected' : '') . '>No</option>';
                                    echo '</select>';
                                    echo '</td>';
                                    echo '<td style="padding: 2px; font-weight:bold; text-align: center; vertical-align: middle;">';
                                    echo '<select name="student_status">';
                                    echo '<option value="Ongoing"' . ($row['student_status'] == 'Ongoing' ? ' selected' : '') . '>Ongoing</option>';
                                    echo '<option value="Dropped"' . ($row['student_status'] == 'Dropped' ? ' selected' : '') . '>Dropped</option>';
                                    echo '<option value="Failed"' . ($row['student_status'] == 'Failed' ? ' selected' : '') . '>Failed</option>';
                                    echo '<option value="Graduated"' . ($row['student_status'] == 'Graduated' ? ' selected' : '') . '>Graduated</option>';
                                    echo '</select>';
                                    echo '</td>';
                                     

                                    echo '<td style="padding: 2px; font-weight:bold; text-align: center; vertical-align: middle;">';
                                    echo '<input type="number" name="annual_reimbursement_received_last_quarter" value="" style="width: 80px;" required>';
                                    echo '</td>';
                                    
                                    echo '<td style="padding: 2px; font-weight:bold; text-align: center; vertical-align: middle;">';
                                    echo '<input type="number" name="total_annual_reimbursement_received" value="" style="width: 80px;" required>';
                                    echo '</td>';
                                    
                                    // echo '<td style="padding: 2px; font-weight:bold;"><input type="text" name="no_of_months" value="' . $row['No_Of_Months'] . '"></td>';
                                    // echo '<td style="padding: 2px; font-weight:bold;"><input type="text" name="per_day_basis_stipend" value="' . $row['Per_Day_Basis_Stipend'] . '"></td>';
                                    // echo '<td style="padding: 2px; font-weight:bold;"><input type="text" name="annual_research_grant" value="' . $row['Annual_Research_Grant'] . '"></td>';
                                    // echo '<td style="padding: 2px; font-weight:bold;"><input type="text" name="balance_research_grant" value="' . $row['Balance_Research_Grant'] . '" ></td>';

                                    echo '</tr>';
                                    $rowNumber++;
                                    
                                }
                            } else {
                                echo '<tr><td colspan="5">No data available</td></tr>';
                            }
                             

                            ?>
                            </tbody>
                            </table>
                            <br><br><br>
                            <div style="display: flex; flex-direction: column; align-items: center;">
                            <div style="display: flex; flex-direction: row; gap: 20px; align-items: flex-start; max-width: 600px;">
                                <div style="display: flex; flex-direction: column; padding: 5px; font-size: 16px; flex-grow: 1;">
                                    <label for="total_amount" style="margin-bottom: 5px; font-weight: bold; white-space: nowrap;">Total Amount Sought  <span style="color:red;">[C]*</span></label>
                                    <label for="total_amount" style="margin-bottom: 5px; font-weight: bold; white-space: nowrap;">(Not for user input and click "Calculate" to fill this)</label>
                                    <div id="totalAmountBox" style="width: 100%; border: 1px solid #ccc; padding: 12px;" required data-value=""></div>
                            </div>
                            <!-- <div style="display: flex; flex-direction: column; padding: 5px; font-size: 16px; flex-grow: 1;">
                            <label for="excess_fund" style="margin-bottom: 5px; font-weight: bold; white-space: nowrap;">Excess Fund For The Next Quarter</label>
                            <div id="excessFundBox" style="width: 100%; border: 1px solid #ccc; padding: 12px;"></div> -->
                        <!-- </div> -->
                            </div>
                        </div>

                        <br><br>
                            </div>
                            <div style="text-align: center;">
                                    <h1>Declaration</h1>
                                    <label for="acknowledgement" style="font-size: 18px;">
                                        <input type="checkbox" id="acknowledgement" name="acknowledgement" required>
                                        I acknowledge that this is correct information to the best of my knowledge
                                    </label>
                                </div>
                                    <br><br>
                                        
                                        <div style="position: fixed; bottom: 20px; right: 20px; text-align: right;">
                                        <!-- <button class="btn btn-primary" onclick="showLegend()">View Legend</button> -->
                                        <button class="btn btn-warning" onclick="calculateFunds(event)">Calculate</button>
                                        <button class="btn btn-success" id="submitButton"  >Submit Fund Requirement</button>
                                         

                                        <button class="btn btn-danger" onclick="window.location.href = 'DiaHome.php';">Cancel</button>
                                        </div>
                         </form>
                         <div id="legendModal" style="display: none; position: fixed; top: 55%; left: 55%; transform: translate(-50%, -50%); background-color: white; padding: 20px; border: 1px solid black; max-width: 80%; max-height: 70%; overflow-y: auto;">
    <h3 style="font-size: 20px; font-weight: bold;">Legend Information</h3>
    <p><strong>Total Amount Sought for Fellowship (Stipend + Annual Research Grant):</strong> This is the total amount required for the list of students under the DIA Fellowship Programme. If a student has joined in the current quarter, the annual research grant should also be considered for the calculation.</p>
    <p><strong>Excess Funds (Before calculating the funds for the current quarter):</strong> This is the excess amount from the previous quarter. If there are no excess funds remaining, please enter 0 in the field.</p>
    <p><strong>Total Fund Received:</strong> This is the total amount received from the MoE to date.</p>
    <p><strong>Position of Funds:</strong> This is the status of the funds received to date, including any expenditures committed.</p>
    <p><strong>No. of Students Joined on Campus:</strong> This is the total number of students attending classes on campus across admission rounds.</p>
    <p><strong>Date of Joining:</strong> This is the date of joining for each student under the DIA Programme.</p>
    <p><strong>Stipend:</strong> This is the monthly stipend(Rs. 37000/- for first 2 years and Rs. 42000/- in 3rd, 4th, and 5th year).</p>
    <p><strong>No of Months:</strong> This is the number of months for which fellowship is being sought.</p>
    <p><strong>Per Day Basis Stipend:</strong> This is the amount sought for the first month based on the number of days in that month.</p>
    <p><strong>Annual Research Grant:</strong> This is the Annual Research Grant amount (Rs. 170,000/- or as required).</p>
    

    <div class="sample-calculation" style="margin-top: 20px;">
    <table style="width: 100%; font-size: 16px;">
            <caption style="font-size: 20px; font-weight: bold; margin-bottom: 10px;">Sample calculation</caption>
            <thead>
                <tr>
                    <th style="text-align: left;">Item</th>
                    <th style="text-align: left;">Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>No. Of Candidates:</td>
                    <td>2</td>
                </tr>
                <tr>
                    <td>Monthly Stipend:</td>
                    <td>Rs. 42,000/-</td>
                </tr>
                <tr>
                    <td>Annual Research Grant:</td>
                    <td>Rs. 170,000/-</td>
                </tr>
                <tr>
                    <td>Fund Calculation for Quarter 1:</td>
                    <td>(2 candidates * 3 months * Rs. 42,000/-) + (2 candidates * Rs. 170,000/-) = Rs. 592,000/-</td>
                </tr>
                <tr>
                    <td>Total Annual Research Grant Received:</td>
                    <td>Rs. 600,000/-</td>
                </tr>
                <tr>
                    <td>Excess Fund in this quarter:</td>
                    <td>Rs. 8,000/-</td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top: 20px;">Please email <strong style="background-color: yellow;">asean@iitd.ac.in</strong> for any technical queries.</p>
        <button onclick="closeLegendModal()" style="margin-top: 10px; padding: 5px 5px; background-color: #dc3545; color: white; border: none; border-radius: 5px; cursor: pointer;">Close</button>
                                        </div>
                        </div>

                        <script>
                             



                            function showLegend() {
                                var modal = document.getElementById('legendModal');
                                modal.style.display = 'block';
                            }

                            function closeLegendModal() {
                                var modal = document.getElementById('legendModal');
                                modal.style.display = 'none';
                            }
                    //        

                             
                    //         // Calculate the excess funds
                    //         // const excessFunds = totalFundsReceived - totalAmountSought; 
                    //         // console.log("excess funds",excessFunds)
                    //         // Display the result in the "Excess Fund For The Next Quarter" input field
                    //         document.getElementById('totalAmountBox').innerText = totalAmountSought;


                    //         // document.getElementById('excessFundBox').innerText = excessFunds;
                    // }

                    function calculateFunds(event) {
                        event.preventDefault();

                        let totalAmountSought = 0;

                        const tableRows = document.querySelectorAll('.table tbody tr');

                        tableRows.forEach(row => {
                            const checkbox = row.querySelector('input[type="checkbox"]');
                            
                            if (checkbox.checked ) {
                                const sno = row.cells[1].innerText.trim();
                                const appNumber = row.cells[2].innerText.trim();
                                const stipend = parseFloat(row.cells[7].querySelector('input[name="stipend"]').value);
                                const researchGrantClaimed = parseFloat(row.cells[10].querySelector('input[name="annual_reimbursement_received_last_quarter"]').value);
                                const researchGrantReceived = parseFloat(row.cells[11].querySelector('input[name="total_annual_reimbursement_received"]').value);

                                if (researchGrantClaimed + researchGrantReceived > 170000) {
                                    alert(`Error: Total ARG (ARG Claimed + ARG Received) for S. No. ${sno} and Applicant ${appNumber} can't be more than 1,70,000. Please adjust the ARG claimed accordingly, and click the calculate button again. If you do not, the ARG Claimed will be adjusted to keep the ARG claimed and ARG received to the max of 1,70,000.`);
                                }

                                const totalAmountForCandidate = stipend * 3 + researchGrantClaimed;
                                totalAmountSought += totalAmountForCandidate;
                            }
                        });

                        document.getElementById('totalAmountBox').textContent = totalAmountSought;
                        document.getElementById('totalAmountBox').setAttribute('data-value', totalAmountSought);
                    }

                    document.getElementById('submitButton').addEventListener('click', function(event) {
                        // Prevent the default form submission behavior
                        event.preventDefault();

                        // Show the confirmation alert
                        if (confirm('Please note you are going to submit. You will not be able to change this later. Continue Submitting?')) {
                            // If the user confirms, proceed with form submission
                            submitForm();
                        } else {
                            // If the user cancels, do nothing
                            return;
                        }
                    });


                    function submitForm() {
                        
                        
                        if (!validateForm()) {
                            alert(
                                    ' 1. Please fill in all required fields.\n' +
                                    ' 2. Please select all students whose fellowship needs to be released.\n' +
                                    ' 3. Please ensure you have clicked the button "calculate" before "submit" (if not done already)'
                                );
                            return;
                        }


                        
                        
                        // Gather form data
                        const formData = {};
                        const formElements = document.getElementById('myForm').elements;
 
                         


                        for (let i = 0; i < formElements.length; i++) {
                            const element = formElements[i];
                            if (element.name) {
                                formData[element.name] = element.value;
                                console.log("formData",formData[element.name]);
                            }
                        }
                        formData['totalAmountBox'] = document.getElementById('totalAmountBox').getAttribute('data-value');
                        // console.log("iitname",iitName);
                       
                        // Gather table data
                        const tableData = [];
                        const tableRows = document.querySelectorAll('.table tbody tr');
                        console.log("tableRows",tableRows);
                        tableRows.forEach(row => {
                            const checkbox = row.querySelector('input[type="checkbox"]');
                           if(checkbox.checked){
                            const rowData = {};
                            const cells = row.cells;
                            rowData['name_of_applicant'] = cells[2].textContent;
                            console.log("nameofapplicant",rowData['name_of_applicant']);
                            rowData['application_number'] = cells[3].textContent;
                            console.log("application no",rowData['application_number']);
                            rowData['iit_entry_no'] = cells[4].textContent;
                            console.log("iit_entry_no",rowData['iit_entry_no']);
                            rowData['country'] = cells[5].textContent;
                            console.log("country",rowData['country']);
                            // rowData['round'] = cells[5].textContent;
                            rowData['Date_of_Joining'] = cells[6].textContent;
                            console.log("date_of_joining",rowData['Date_of_Joining']);
                            rowData['stipend'] = cells[7].querySelector('input[name="stipend"]').value;
                            rowData['stipend_received'] = cells[8].querySelector('select[name="stipend_received"]').value;
                            rowData['student_status'] = cells[9].querySelector('select[name="student_status"]').value;

                            console.log("stipend_received",rowData['stipend_received']);
                            // rowData['per_day_basis_stipend'] = cells[9].querySelector('input[name="per_day_basis_stipend"]').value;
                            rowData['annual_reimbursement_received_last_quarter'] = cells[10].querySelector('input[name="annual_reimbursement_received_last_quarter"]').value;
                            console.log("annual_reimbursement_received_last_quarter",rowData['annual_reimbursement_received_last_quarter']);
                            rowData['total_annual_reimbursement_received'] = cells[11].querySelector('input[name="total_annual_reimbursement_received"]').value;
                            console.log("total_annual_reimbursement_received",rowData['total_annual_reimbursement_received']);
                            tableData.push(rowData);
                           }
                        });
                        
                        // Add table data to form data
                        formData['table_data'] = JSON.stringify(tableData);
                        
                         // Get the value of iit_name
                         const iitName = "<?php echo $iit_name; ?>";
  
                        console.log("iitname",iitName);
                        // Add iit_name to form data
                        formData['iit_name'] = iitName;


                        // Log form data
                        console.log('Form Data:', formData);

                        
                        fetch('./api/saveFormData.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },

                            body: JSON.stringify(formData)
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.text(); // Assuming the server returns a text response
                        })
                        .then(data => {
                            console.log('Form data saved successfully:', data);
                            alert("Form data saved successfully");
                            // Assuming you have the variable 'iitName' containing the IIT name
                            var iitName = "<?php echo isset($_GET['iit_name']) ? htmlspecialchars($_GET['iit_name']) : ''; ?>";

                            // Construct the URL with the IIT name appended
                            var url = 'upload_file.php?iit_name=' + encodeURIComponent(iitName);

                            // Redirect to the constructed URL
                            window.location.href = url;
                        })
                        .catch(error => {
                            console.error('Error saving form data:', error.message);
                        });
                        
                          
 
                    }
                    


                    function validateForm() {
                        // Check if all required fields are filled
                        const requiredFields = document.querySelectorAll('input[required], select[required], div[required]');
                        
                        for (let field of requiredFields) {
                            if (field.tagName.toLowerCase() === 'div') {
                                // For div elements, check if the data-value attribute is empty
                                if (!field.getAttribute('data-value').trim()) {
                                    return false; // Div's data-value attribute is empty
                                }
                            } else if (!field.value.trim()) {
                                return false; // Field is empty
                            } else if (field.type === 'checkbox') {
                                if (!field.checked) {
                                    alert("checkbox is required");
                                    return false; // Checkbox is not checked
                                }
                            }
                        }  
                        
                        return true; // All required fields are filled
                    }
 
                    // function getCurrentQuarter() {
                    //     var date = new Date();
                    //     var month = date.getMonth() + 1; // Get current month (January is 1)
                    //     var day = date.getDate(); // Get current day

                    //     if ((month === 3 && day >= 15) &&  (month === 3 && day <= 31)) {
                    //         return "Q1(Apr-Jun)";
                    //     } else if ((month === 6 && day >= 15) && (month === 6 && day <= 30)) {
                    //         return "Q2(July-Sept)";
                    //     } else if ((month === 9 && day >= 15) &&  (month === 12 && day <= 30)) {
                    //         return "Q3(Oct-Dec)";
                    //     } else if ((month === 12 && day >= 15) && (month === 3 && day <= 31)) {
                    //         return "Q4(Jan-Mar)";
                    //     }
                    // }

                    // console.log(getCurrentQuarter()); // Test the function
                     
                    function getCurrentQuarter() {
                                var month = new Date().getMonth() + 1; // Get current month (January is 1)
                                if (month >= 4 && month <= 6) {
                                    return "Q1(Apr-Jun)";
                                } else if (month >= 7 && month <= 9) {
                                    return "Q2(July-Sept)";
                                } else if (month >= 10 && month <= 12) {
                                    return "Q3(Oct-Dec)";
                                } else {
                                    return "Q4(Jan-Mar)";
                                }
                            }

                            // Function to disable options that are not the next quarter
                            // function disableNextQuarters() {
                            //     // Get the current quarter
                            //     var currentQuarter = getCurrentQuarter();

                            //     // Get all options
                            //     var options = document.querySelectorAll("#quarter option");

                            //     // Iterate over each option and disable those that are not the next quarter
                            //     options.forEach(function(option) {
                            //         if (option.value !== "") { // Skip the "---Select---" option
                            //             // Enable options for the next quarter
                            //             if (option.value.includes(currentQuarter.charAt(1))) {
                            //                 option.disabled = false;
                            //             } else {
                            //                 option.disabled = true;
                            //             }
                            //         }
                            //     });
                            // }
                            function disableNextQuarters() {
                                    // Get the current quarter
                                    var currentQuarter = getCurrentQuarter();
                                    console.log(currentQuarter);
                                    // Get all options
                                    var options = document.querySelectorAll("#quarter option");
                                    console.log(options);
                                    // Iterate over each option and disable those that are not the current quarter or the next quarter
                                    options.forEach(function(option) {
                                        if (option.value !== "") { // Skip the "---Select---" option
                                            // Calculate the next quarter based on the current quarter
                                            var nextQuarter;
                                            if (currentQuarter === "Q1(Apr-Jun)") {
                                                nextQuarter = "Q2(July-Sept)";
                                            } else if (currentQuarter === "Q2(July-Sept)") {
                                                nextQuarter = "Q3(Oct-Dec)";
                                            } else if (currentQuarter === "Q3(Oct-Dec)") {
                                                nextQuarter = "Q4(Jan-Mar)";
                                            } else {
                                                nextQuarter = "Q1(Apr-Jun)";
                                            }
                                            
                                            // Enable options for the current quarter and the next quarter
                                            if (option.value === currentQuarter || option.value === nextQuarter) {
                                                option.disabled = false;
                                            } else {
                                                option.disabled = true;
                                            }
                                        }
                                    });
                                }

                            // Call the function initially
                            disableNextQuarters();

                            // Add event listener to the quarter select to call the function when it changes
                            document.getElementById("quarter").addEventListener("change", function() {
                                disableNextQuarters();
                            });
                                                
                             // Function to determine the current financial year
                            // function getCurrentFinancialYear() {
                            //     var today = new Date();
                            //     var currentYear = today.getFullYear();
                            //     var nextYear = currentYear + 1;
                            //     var lastTwoDigits = String(nextYear).substring(2);
                            //     return "FY" + lastTwoDigits;
                            // }

                            function getCurrentFinancialYear() {
                                var today = new Date();
                                var currentYear = today.getFullYear();
                                var nextYear = currentYear + 1;
                                var CurrentYear = String(currentYear);
                                var lastTwoDigitsNextYear = String(nextYear).substring(2);
                                return "FY" + CurrentYear + "-" + lastTwoDigitsNextYear;
                            }


                            // Function to disable options that are not the next financial year
                            function disableNextFinancialYears() {
                                // Get the current financial year
                                var currentFinancialYear = getCurrentFinancialYear();

                                // Get all options
                                var options = document.querySelectorAll("#financial_year option");

                                // Iterate over each option and disable those that are not the next financial year
                                options.forEach(function(option) {
                                    if (option.value !== "") { // Skip the "---Select---" option
                                        // Enable options for the next financial year
                                        if (option.value === currentFinancialYear) {
                                            option.disabled = false;
                                        } else {
                                            option.disabled = true;
                                        }
                                    }
                                });
                            }

                            // Call the function initially
                            disableNextFinancialYears();

                            // Add event listener to the financial year select to call the function when it changes
                            document.getElementById("financial_year").addEventListener("change", function() {
                                disableNextFinancialYears();
                            });

                                                        // Get the "Select All" checkbox element
                            var selectAllCheckbox = document.getElementById('selectAll');

                            // Get all checkboxes in the table body
                            var checkboxes = document.querySelectorAll('tbody input[type="checkbox"]');

                            // Add event listener to "Select All" checkbox
                            selectAllCheckbox.addEventListener('change', function() {
                                checkboxes.forEach(function(checkbox) {
                                    checkbox.checked = selectAllCheckbox.checked;
                                });
                            });

                            // Add event listener to individual checkboxes to update "Select All" checkbox status
                            checkboxes.forEach(function(checkbox) {
                                checkbox.addEventListener('change', function() {
                                    // Check if all checkboxes are checked
                                    var allChecked = Array.from(checkboxes).every(function(checkbox) {
                                        return checkbox.checked;
                                    });

                                    // Update "Select All" checkbox status
                                    selectAllCheckbox.checked = allChecked;
                                });
                            });

                             

                        </script>

                </body>
                <!-- PAGE CONTENT WRAPPER -->
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->



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
