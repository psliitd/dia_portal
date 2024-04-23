<?php
require('util/Connection.php');
require('util/SessionCheck.php');

// Handle the AJAX request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the quarter, year, and IIT name values from the POST data
    $quarter = $_POST['quarter'];
    $year = $_POST['year'];
    $iit_name = $_POST['iit_name'];

    // Define your SQL queries to fetch filtered data from the formData and anotherTable tables
    $formDataQuery1 = "SELECT name_of_applicant, 
                            application_number, 
                            country, 
                            date_of_joining, 
                            stipend, 
                            stipend_received,
                            student_status, 
                            ARG_Claimed_last_quarter, 
                            Total_ARG_Received 
                            FROM formData  
                            WHERE iit_name = ?";
    $formDataQuery2 = "SELECT name_of_applicant, 
                                application_number, 
                                country, 
                                date_of_joining, 
                                stipend, 
                                stipend_received,
                                student_status, 
                                ARG_Claimed_last_quarter, 
                                Total_ARG_Received 
                                FROM formData 
                                WHERE curr_quarter = ? AND financial_year = ? AND iit_name = ?";
    $anotherTableQuery = "SELECT Fund_available_PFMS, 
                                 Excess_fund_last_quarter, 
                                 Total_Funds_lapsed_last_quarter, 
                                 TFR_since_2020, 
                                 Total_Funds_lapsed_and_not_reallocated
                                  
                                 FROM anotherTable WHERE curr_quarter = ? AND financial_year = ? AND iit_name = ?";

    // Prepare and execute the query for formData table
    $formDataStmt = $con->prepare($quarter && $year ? $formDataQuery2 : $formDataQuery1);
    if ($quarter && $year) {
        $formDataStmt->bind_param("sss", $quarter, $year, $iit_name);
    } else {
        $formDataStmt->bind_param("s", $iit_name);
    }
    $formDataStmt->execute();
    $formDataResult = $formDataStmt->get_result();

    // Prepare and execute the query for anotherTable table
    $anotherTableStmt = $con->prepare($anotherTableQuery);
    $anotherTableStmt->bind_param("sss", $quarter, $year, $iit_name);
    $anotherTableStmt->execute();
    $anotherTableResult = $anotherTableStmt->get_result();

    // Fetch the data from both result sets
    $formData = [];
    while ($row = $formDataResult->fetch_assoc()) {
        $formData[] = $row;
    }

    $anotherTableData = [];
    while ($row = $anotherTableResult->fetch_assoc()) {
        $anotherTableData[] = $row;
    }

    // Close prepared statements
    $formDataStmt->close();
    $anotherTableStmt->close();

    // Close the database connection
    $con->close();

    // Convert the filtered data to JSON format
    $filteredData = [
        'formData' => $formData,
        'anotherTableData' => $anotherTableData
    ];

    // Return the JSON response
    header('Content-Type: application/json');
    echo json_encode($filteredData);

    exit;
}
?>
