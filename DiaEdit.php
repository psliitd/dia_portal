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
// if(isset($_SESSION["studentid"])){
// 	$studentid = $_SESSION["studentid"];
// 	$query = "SELECT * FROM profile WHERE studentid='$studentid'";
// 	$result = mysqli_query($con,$query);
// 	$numrows = mysqli_num_rows($result);
// 	if($numrows==1){
// 		$row = mysqli_fetch_array($result);
// 		$name = $row['name'];
// 		$registration_number = $row['registration_number'];
// 		$mobile = $row['mobile'];
// 		$email = $row['email'];
// 		$gender = $row['gender'];
// 		$advisor_name = $row['advisor_name'];
// 		$address = $row['address'];
// 		$nationality = $row['nationality'];
// 		$iit_name = $row['iit_name'];
// 		$department_name = $row['department_name'];
// 		$joining_date = $row['joining_date'];
// 		$joining_date_campus = $row['joining_campus_date'];	
// 	}
// 	else{
// 		header("Location:./DiaEdit.php");
// 	}
// }
// else{
// 	header("Location:./DiaEdit.php");
// }


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
        max-width: 1000px; /* Adjust the maximum width as needed */
        width: 200%; /* Adjust the width as needed */
        text-align: left;
        font-size: 16px; /* Adjust the font size as needed */
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    }

    #legendModal h3 {
        font-size: 24px; /* Adjust the font size as needed */
        margin-bottom: 10px;
    }

    #legendModal p {
        margin-bottom: 15px;
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
    <h1>Doctoral-fellowship in India for ASEAN - Fellowship Sought from MoE</h1>
   
    
</div>
<div class="divdanger" style="text-align: center;">
    <h3 class="text-danger" style="text-transform: capitalize;">Please enter 0 for any amount/number that is not applicable</h3>
</div>


<div class="divform">
    <form id="myForm" >
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="quarter" class="font-weight-bold" style="font-size: 16px;">Quarter *</label>
                        <select id="quarter" name="quarter" required class="form-control" style="font-size: 14px;">
                            <option value="">---Select---</option>
                            <option value="Q1">Q1</option>
                            <option value="Q2">Q2</option>
                            <option value="Q3">Q3</option>
                            <option value="Q4">Q4</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="excess_funds" class="font-weight-bold" style="font-size: 16px;">Excess Funds *</label>
                        <input type="number" id="excess_funds" name="excess_funds" value="0" required class="form-control" style="font-size: 14px;">
                    </div>
                    <div class="form-group">
                        <label for="total_funds" class="font-weight-bold" style="font-size: 16px;">Total Funds Received *</label>
                        <input type="text" id="total_funds" name="total_funds" placeholder="Enter total fund received" required class="form-control" style="font-size: 14px;">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="position_of_funds" class="font-weight-bold" style="font-size: 16px;">Position of Funds *</label>
                        <textarea id="position_of_funds" name="position_of_funds" rows="4" class="form-control" style="font-size: 14px;" maxlength="1000"></textarea>
                        
<p id="charCount">0/1000</p>
                    </div>
                    <div class="form-group">
                        <label for="students_joined" class="font-weight-bold" style="font-size: 16px;">No. Of Students Joined On Campus *</label>
                        <input type="number" id="students_joined" name="students_joined" placeholder="Enter number of students joined" required class="form-control" style="font-size: 14px;">
                    </div>
                    <div class="form-group">
                        <label for="additional_comments" class="font-weight-bold" style="font-size: 16px;">Additional Comments</label>
                        <textarea id="additional_comments" name="additional_comments" rows="4" class="form-control" style="font-size: 14px;" maxlength="1000"></textarea>
<p id="wordCount">0/1000</p>
                    </div>
                </div>
            </div>
        </div>
    
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
                                <tr>
            <th style="background-color: #39CCCC; color: white;">Select</th>
            <th style="background-color: #39CCCC; color: white;">S.No</th>
            <th style="background-color: #39CCCC; color: white;">Name of Applicant</th>
            <th style="background-color: #39CCCC; color: white;">Application Number</th>
            <th style="background-color: #39CCCC; color: white;">Country</th>
            <th style="background-color: #39CCCC; color: white;">Round</th>
            <th style="background-color: #39CCCC; color: white;">Date of Joining <span style="color: red;">*</span></th>
            
            <th style="background-color: #39CCCC; color: white;">Stipend<span style="color: red;">*</span></th>
            <th style="background-color: #39CCCC; color: white;">No. Of Months<span style="color: red;">*</span></th>
            <th style="background-color: #39CCCC; color: white;">Per Day Basis Stipend (For First Month, if any)<span style="color: red;">*</span></th>
            <th style="background-color: #39CCCC; color: white;">Annual Research Grant<span style="color: red;">*</span></th>
            <th style="background-color: #39CCCC; color: white;">Balance Research Grant (till previous quarter)<span style="color: red;">*</span></th>
        </tr>
                                </thead>
                                <tbody>
                                     

                            <?php
                             
                            
                            // Assuming you have an active database connection

                            // Fetch data from the database
                            $query = "SELECT * FROM applicants"; // Replace 'institute_summary' with your actual table name
                            $result = mysqli_query($con, $query);

                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr>';
                                    echo '<td><input type="checkbox" name="eligible[]" value="1"></td>';
                                    echo '<td style="padding: 2px; font-weight:bold;">' . $row['SNo'] . '</td>';
                                    echo '<td style="padding: 2px; font-weight:bold;">' . $row['Name_of_Applicant'] . '</td>'; // Replace 'data1', 'data2', 'data3' with your actual column names
                                    echo '<td style="padding: 2px; font-weight:bold;">' . $row['Application_Number'] . '</td>';
                                    echo '<td style="padding: 2px; font-weight:bold;">' . $row['Country'] . '</td>';
                                    echo '<td style="padding: 2px; font-weight:bold;">' . $row['Round'] . '</td>';
                                    echo '<td style="padding: 2px; font-weight:bold;"><input type="date" name="joining_date" value="' . $row['Date_of_Joining'] . '"></td>';

                                    echo '<td style="padding: 2px; font-weight:bold;"><input type="number" name="stipend" value="' . $row['Stipend'] . '"></td>';

                                    echo '<td style="padding: 2px; font-weight:bold;"><input type="text" name="no_of_months" value="' . $row['No_Of_Months'] . '"></td>';
                                    echo '<td style="padding: 2px; font-weight:bold;"><input type="text" name="per_day_basis_stipend" value="' . $row['Per_Day_Basis_Stipend'] . '"></td>';
                                    echo '<td style="padding: 2px; font-weight:bold;"><input type="text" name="annual_research_grant" value="' . $row['Annual_Research_Grant'] . '"></td>';
                                    echo '<td style="padding: 2px; font-weight:bold;"><input type="text" name="balance_research_grant" value="' . $row['Balance_Research_Grant'] . '" ></td>';

                                    echo '</tr>';
                                    
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
                                    <label for="total_amount" style="margin-bottom: 5px; font-weight: bold; white-space: nowrap;">Total Amount Sought For Fellowship</label>
                                    <div id="totalAmountBox" style="width: 100%; border: 1px solid #ccc; padding: 12px;"></div>
                            </div>
                            <div style="display: flex; flex-direction: column; padding: 5px; font-size: 16px; flex-grow: 1;">
                            <label for="excess_fund" style="margin-bottom: 5px; font-weight: bold; white-space: nowrap;">Excess Fund For The Next Quarter</label>
                            <div id="excessFundBox" style="width: 100%; border: 1px solid #ccc; padding: 12px;"></div>
                        </div>
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
                                            <button class="btn btn-success" onclick="showLegend()">View Legend</button>
                                            <button class="btn btn-success" onclick="calculateFunds(event)">Calculate</button>
                                            <button class="btn btn-success" onclick="submitForm(event)">Submit</button>
                                            <button class="btn btn-danger" onclick="window.location.href = 'DiaHome.php';">Cancel</button>
                                        </div>
                         </form>
                                    <div id="legendModal" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 20px; border: 1px solid black;">
                                        <h3>Legend Information</h3>
                                        
                                        <p><strong>Total Amount Sought for Fellowship (Stipend + Annual Research Grant (if applicable)): </strong> This is the total amount that is required for the list of students under the DIA Fellowship Programme. If a student has joined in the current quarter, the annual research grant should also be considered for the calculation.

                                        <br><strong>Excess Funds (Before calculating the funds for the current quarter):</strong> This is the excess amount from the previous quarter. If you have no excess funds remaining, please enter 0 in the field.

                                        <br><strong>Total Fund Received: </strong>This is the total amount received from the MoE till date.

                                        <br><strong>Position of Funds (Please mention expenditure if any/ Committed to):</strong> This is the status of the funds received till date.

                                        <br><strong>No. of Students Joined on Campus: </strong>This is the total number of students (across admission rounds) who are attending classes on campus.

                                        <br><strong>Date of joining:</strong> This is the date of joining for each student under the DIA Programme.

                                        <br><strong>Stipend:</strong> This is the monthly stipend(Rs. 31000/-).

                                        <br><strong>No of Months: </strong>This is number of months for which fellowship is being sought.

                                        <br><strong>Per day basis Stipend:</strong> This is the amount sought for the first month, if the candidate has joined the programme in the middle of the month. For example, if a candidate has joined on the 24th of August, the first month's amount would be calculated as Rs.31000/- divided by the number of days in the month (30/31), which is Rs. 8000/- in this case.

                                        <br><strong>Annual Research Grant: </strong>This is the Annual Research Grant amount( Rs. 170000/- or as required).

                                        <br><strong>Balance Research Grant(till previous quarter):</strong> This is the pending research grant amount for each candidate. This amount is not included in the calculation.</p>
                                        
                                        <div class="sample-calculation">

                                            <caption>Sample calculation</caption>
                                            <thead>
                                                <tr>
                                                    <th>Quarter1</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>No. Of Candidates:</td>
                                                    <td>2</td>
                                                </tr>
                                                <tr>
                                                    <td>Monthly Stipend:
                                                        <br>(First month stipend of the fellow will be calculated from 
                                                        <br>the date of joining at the rate per day basis from the stipend amount.)
                                                        <br>No of days between date of joining and last day of the month * Rs. 1000</td>
                                                    <td>Rs. 31000/- </td>
                                                </tr>
                                                <!-- Add other rows here -->
                                                <tr>
                                                    <td>Annual Research Grant:</td>
                                                    <td>Rs. 170000/-</td>
                                                </tr>
                                                <tr>
                                                    <td>Fund Calculation for Quarter 1:</td>
                                                    <td>(2 candidates * 3 months * Rs. 31000/-) + (2 candidates * Rs. 170000/-) = Rs. 526000/-</td>
                                                </tr>
                                                <tr>
                                                    <td>Fund allocated:</td>
                                                    <td>Rs. 600000/-</td>
                                                </tr>
                                                <tr>
                                                    <td>Excess Fund in this quarter:</td>
                                                    <td>Rs. 74000/-</td>
                                                </tr>

                                                
                                            </tbody>
                                        </table>
                                            <br>Please email <strong>aseaniitfellowship@gmail.com</strong> for any technical queries.
                                            <button onclick="closeLegendModal()">Close</button>
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
                            function calculateFunds(event) {
                                event.preventDefault();
                            const totalFundsReceived = parseFloat(document.getElementById('total_funds').value);
                            console.log(totalFundsReceived)
                            // Initialize variable to store the total amount sought for fellowship
                            let totalAmountSought = 0;
                             
                            // Get all rows in the table body
                            const tableRows = document.querySelectorAll('.table tbody tr');
                             
                            // Loop through each row
                            tableRows.forEach(row => {

                                const checkbox = row.querySelector('input[type="checkbox"]');
                                 console.log(row)
                                 if (checkbox.checked) {
                                // Get the stipend and annual research grant for the candidate in this row
                                const stipend = parseFloat(row.cells[7].querySelector('input[name="stipend"]').value);// Assuming stipend is in the 8th column
                                console.log("stipend",row.cells[7].querySelector('input[name="stipend"]').value)
                                const researchGrant = parseFloat(row.cells[10].querySelector('input[name="annual_research_grant"]').value); // Assuming research grant is in the 11th column
                                const totalMonths = parseFloat(row.cells[8].querySelector('input[name="no_of_months"]').value);
                                // Calculate the total amount sought for this candidate
                                const totalAmountForCandidate = stipend * totalMonths + researchGrant; // Multiply stipend by number of months

                                // Add this amount to the total amount sought
                                totalAmountSought += totalAmountForCandidate;
                                console.log(totalAmountSought)
                                // console.log("totalAmountSought" )
                                 }     
                            });
                             
                            // Calculate the excess funds
                            const excessFunds = totalFundsReceived - totalAmountSought; 
                            // console.log("excess funds",excessFunds)
                            // Display the result in the "Excess Fund For The Next Quarter" input field
                            document.getElementById('totalAmountBox').innerText = totalAmountSought;


                            document.getElementById('excessFundBox').innerText = excessFunds;
                    }

                    function submitForm(event) {
                        event.preventDefault();
                        
                        // Validate form fields
                        if (!validateForm()) {
                            alert('Please fill in all required fields.');
                            return;
                        }
                        
                        // Gather form data
                        const formData = {};
                        const formElements = document.getElementById('myForm').elements;
                        for (let i = 0; i < formElements.length; i++) {
                            const element = formElements[i];
                            if (element.name) {
                                formData[element.name] = element.value;
                            }
                        }
                        setTimeout(() => {
        alert('Form submitted successfully!');
        // Optionally, reset the form after successful submission
        // document.getElementById('myForm').reset();
    }, 1000); // Assuming a delay for simulating server response
                        // Gather table data
                        const tableData = [];
                        const tableRows = document.querySelectorAll('.table tbody tr');
                        tableRows.forEach(row => {
                            const rowData = {};
                            const cells = row.cells;
                            rowData['name_of_applicant'] = cells[2].textContent;
                            rowData['application_number'] = cells[3].textContent;
                            rowData['country'] = cells[4].textContent;
                            rowData['round'] = cells[5].textContent;
                            rowData['date_of_joining'] = cells[6].querySelector('input[type="date"]').value;
                            rowData['stipend'] = cells[7].querySelector('input[name="stipend"]').value;
                            rowData['no_of_months'] = cells[8].querySelector('input[name="no_of_months"]').value;
                            rowData['per_day_basis_stipend'] = cells[9].querySelector('input[name="per_day_basis_stipend"]').value;
                            rowData['annual_research_grant'] = cells[10].querySelector('input[name="annual_research_grant"]').value;
                            rowData['balance_research_grant'] = cells[11].querySelector('input[name="balance_research_grant"]').value;
                            tableData.push(rowData);
                        });
                        
                        // Add table data to form data
                        formData['table_data'] = JSON.stringify(tableData);
                        
                        // Log form data
                        console.log('Form Data:', formData.quarter);

                        
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
                            // Optionally, reset the form after successful submission
                            // document.getElementById('myForm').reset();
                        })
                        .catch(error => {
                            console.error('Error saving form data:', error.message);
                        });
                        
                        
                        
                    }
                    


                    function validateForm() {
                        // Check if all required fields are filled
                        const requiredFields = document.querySelectorAll('input[required], select[required]');
                        for (let field of requiredFields) {
                            if (!field.value.trim()) {
                                return false; // Field is empty
                            }
                        }
                        return true; // All required fields are filled
                    }


                        
                    
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
