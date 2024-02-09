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
    round VARCHAR(255),
    date_of_joining DATE,
    stipend FLOAT,
    no_of_months INT,
    per_day_basis_stipend FLOAT,
    annual_research_grant FLOAT,
    balance_research_grant FLOAT
)";
echo ("ritesh3");
if ($con->query($sqlCreateTable) === FALSE) {
    echo "Error creating table: " . $con->error;
}

$sqlCreateAnotherTable = "CREATE TABLE IF NOT EXISTS anotherTable (
    id INT AUTO_INCREMENT PRIMARY KEY,
    quarter VARCHAR(255),
    excess_funds INT,
    total_funds INT,
    position_of_funds VARCHAR(255),
    students_joined INT
)";
if ($con->query($sqlCreateAnotherTable) === FALSE) {
    echo "Error creating anotherTable table: " . $con->error;
}
echo ("ritesh4");
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST"  ) {
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




    $quarter = $data['quarter'];
    $excessFunds = $data['excess_funds'];
    $totalFunds = $data['total_funds'];
    $positionOfFunds = $data['position_of_funds'];
    $studentsJoined = $data['students_joined'];

    $stmt2 = $con->prepare("INSERT INTO anotherTable (quarter, excess_funds, total_funds, position_of_funds, students_joined) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt2) {
        echo "Error preparing statement for anotherTable: " . $con->error;
        exit;
    }

    $stmt2->bind_param("siiii", $quarter, $excessFunds, $totalFunds, $positionOfFunds, $studentsJoined);
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
    $stmt = $con->prepare("INSERT INTO formData (name_of_applicant, application_number, country, round, date_of_joining, stipend, no_of_months, per_day_basis_stipend, annual_research_grant, balance_research_grant) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        echo "Error preparing statement: " . $con->error;
        exit; // Exit if there's an error preparing the statement
    }

    // Bind parameters
    $stmt->bind_param("sssssidddd", $name_of_applicant, $application_number, $country, $round, $date_of_joining, $stipend, $no_of_months, $per_day_basis_stipend, $annual_research_grant, $balance_research_grant);

    // Insert each row of table data
    foreach ($array as $row) {
        $name_of_applicant = $row['name_of_applicant'];
        $application_number = $row['application_number'];
        $country = $row['country'];
        $round = $row['round'];
        $date_of_joining = $row['date_of_joining'];
        $stipend = $row['stipend'];
        $no_of_months = $row['no_of_months'];
        $per_day_basis_stipend = $row['per_day_basis_stipend'];
        $annual_research_grant = $row['annual_research_grant'];
        $balance_research_grant = $row['balance_research_grant'];

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
