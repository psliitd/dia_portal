<?php
require('../util/Connection.php');

// Check if the file ID is provided in the URL
if (isset($_GET['iit_id'])) {
    // Sanitize the ID
    $iit_name = htmlspecialchars($_GET['iit_id']);

    // Prepare and execute a query to retrieve the file path from the database
    $sql = "SELECT filepath FROM secfilesupload WHERE iit_name = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $iit_name);
    $stmt->execute();
    $stmt->store_result();

    // If a record is found, fetch the filepath
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($filepath);
        $stmt->fetch();

        // Set headers to initiate file download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        // Flush the output buffer
        flush();
        // Read the file and output it to the browser
        readfile($filepath);
        // Exit script after file is downloaded
        exit;
    } else {
        // No file found with the provided ID
        echo "File not found.";
    }

    // Close statement and connection
    $stmt->close();
    $con->close();
} else {
    // ID parameter not provided
    echo "File ID not provided.";
}
?>
