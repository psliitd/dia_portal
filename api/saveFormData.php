<?php

require('../util/Connection.php');
require('../structures/Login.php');
echo ("ritesh1");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
echo ("ritesh2");

// Create the formData table if it doesn't exist
$sqlCreateTable = "CREATE TABLE IF NOT EXISTS formData (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name_of_applicant VARCHAR(255),
    application_number VARCHAR(255),
    country VARCHAR(255),
    date_of_joining DATE,
    stipend INT,
    stipend_received VARCHAR(255),
    student_status VARCHAR(255), 
    ARG_Claimed_last_quarter INT,
    Total_ARG_Received INT,
    iit_name VARCHAR(255),
    curr_quarter VARCHAR(255),
    financial_year VARCHAR(255)
)";

if ($con->query($sqlCreateTable) === FALSE) {
    echo "Error creating table: " . $con->error;
}

$sqlCreateAnotherTable = "CREATE TABLE IF NOT EXISTS anotherTable (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Fund_available_PFMS INT,
    TFR_since_2020 INT,
    Excess_fund_last_quarter INT,
    Total_Funds_lapsed_and_not_reallocated INT,
    Total_Funds_lapsed_last_quarter INT,
    Total_Amount_Sought INT,
    iit_name VARCHAR(255),
    financial_year VARCHAR(255),
    curr_quarter VARCHAR(255),
    upload_uc BLOB NOT NULL
)";

if ($con->query($sqlCreateAnotherTable) === FALSE) {
    echo "Error creating anotherTable table: " . $con->error;
}
echo ("ritesh4");

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Gather form data
    echo ("ritesh5");

    
    $postData = file_get_contents("php://input");
    //  echo $postData;
    $data = json_decode($postData, true);
    
    if ($data === null) {
        // JSON decoding failed
        echo "Error decoding JSON data";
        exit;
    }

 

     
    $fund_available = $data['fund_available'];
    $excess_funds = $data['excess_funds'];
    $total_lapsed_funds = $data['total_lapsed_funds'];
    $total_funds_received = $data['total_funds_received'];
    $total_funds_lapsed_not_reallocated = $data['t_f_l_n_r'];
    $total_amount_box = $data['totalAmountBox'];
    $upload_uc =   $data['upload_uc'];
//     $upload_uc = '';

    echo $_FILES['upload_ucl'];


// // Check if file upload is set and not empty
if (isset($_FILES['upload_uc'])) {
    $uploadFolder = "../uploads/"; // Assuming the target folder is "upload_uc/"
    $fileName = basename($_FILES['upload_uc']['name']);
    $targetFilePath = $uploadFolder . $fileName;

    // Move the uploaded file to the target folder
    if (move_uploaded_file($_FILES['upload_ucl']['tmp_name'], $targetFilePath)) {
        echo "File uploaded successfully.";
    } else {
        echo "Error moving uploaded file.";
    }
} else {
    echo "No file uploaded.";
}




    $iit_name = $data['iit_name'];
    $quarter = $data['quarter'];
    $financial_year = $data['financial_year'];
    echo $data['iit_name'];
    echo $data['totalAmountBox'];
    $stmt2 = $con->prepare("INSERT INTO anotherTable (Fund_available_PFMS, Excess_fund_last_quarter, Total_Funds_lapsed_last_quarter, TFR_since_2020, Total_Funds_lapsed_and_not_reallocated, Total_Amount_Sought, iit_name, curr_quarter, financial_year,upload_uc) VALUES (?, ?, ?,?, ?, ?,?, ?, ?,?)");
    if (!$stmt2) {
        echo "Error preparing statement for anotherTable: " . $con->error;
        exit;
    }

    $stmt2->bind_param("iiiiiissss", $fund_available, $excess_funds, $total_lapsed_funds, $total_funds_received, $total_funds_lapsed_not_reallocated,$total_amount_box,  $iit_name, $quarter, $financial_year,$upload_uc);
    if (!$stmt2->execute()) {
        echo "Error inserting data into anotherTable: " . $stmt2->error;
        exit;
    }

    $stmt2->close();

     echo $data['table_data'];
     $table_data = $data['table_data'] ;
     echo gettype($table_data);
     $array = json_decode($table_data, true);
     print_r($array[0]);
     
     
 
    // Prepare and bind SQL statement
    $stmt = $con->prepare("INSERT INTO formData (name_of_applicant, application_number, country, date_of_joining, stipend, stipend_received, student_status, ARG_Claimed_last_quarter, Total_ARG_Received, iit_name, curr_quarter, financial_year) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)");

    if (!$stmt) {
        echo "Error preparing statement: " . $con->error;
        exit; // Exit if there's an error preparing the statement
    }

    // Bind parameters
    $stmt->bind_param("ssssissiisss", $name_of_applicant, $application_number, $country, $date_of_joining, $stipend, $stipend_received, $student_status, $annual_reimbursement_received_last_quarter, $total_annual_reimbursement_received, $iit_name, $quarter, $financial_year);

    // Insert each row of table data
    foreach ($array as $row) {
        $name_of_applicant = $row['name_of_applicant'];
        $application_number = $row['application_number'];
        $country = $row['country'];
         
        $date_of_joining = $row['Date_of_Joining'];
        $stipend = $row['stipend'];
        $stipend_received = $row['stipend_received'] ;
        $student_status = $data['student_status'];
        $annual_reimbursement_received_last_quarter = $row['annual_reimbursement_received_last_quarter'];
        $total_annual_reimbursement_received = $row['total_annual_reimbursement_received'];
         
        // Execute the statement
        if (!$stmt->execute()) {
            echo "Error inserting data: " . $stmt->error;
        }
    }

    // Close statement
    $stmt->close();
}


// Close connection
$con->close();
?>
