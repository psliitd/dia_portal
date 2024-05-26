<?php
require('../util/Connection.php');

// Check if the iit_name and year parameters are provided in the URL
if (isset($_GET['iit_name']) && isset($_GET['year'])) {
    // Sanitize the parameters
    $iit_name = htmlspecialchars($_GET['iit_name']);  
    $year = htmlspecialchars($_GET['year']);
    echo $iit_name;
    echo $year;
    // Prepare and execute a query to retrieve the file path from the database
    $sql = "SELECT filepath FROM annualucfiles WHERE iit_name = ? AND financial_year = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $iit_name, $year);
    $stmt->execute();
 

    // Check if the query was executed successfully
    if ($stmt->errno) {
        echo "Error executing query: " . $stmt->error;
    } else {
        // Store the result set
        $stmt->store_result();

        // Check the number of rows returned
        if ($stmt->num_rows > 0) {
            echo "Rows found: " . $stmt->num_rows;
        } else {
            echo "No rows found.";
        }
    }
 


 

    // If a record is found, fetch the filepath
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($filepath);
        $stmt->fetch();

        // Set headers to initiate file download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . rawurlencode(basename($filepath)) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');

        // Open the file and stream its contents to the client
        $file = fopen($filepath, 'rb');
        if ($file) {
            // Stream the file to the client
            fpassthru($file);
            // Close the file
            fclose($file);
        } else {
            // File open error
            echo "Error opening file.";
        }

        // Exit script after file is downloaded
        exit;
    } else {
        // No file found with the provided parameters
        echo "File not found.";
    }

    // Close statement and connection
    $stmt->close();
    $con->close();
} else {
    // iit_name and year parameters not provided
    echo "iit_name and year parameters are required.";
}
?>
