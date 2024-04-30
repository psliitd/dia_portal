<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the file parameter is set in the URL
if (isset($_GET['file'])) {
    $filePath = $_GET['file'];
    echo $filePath;
    // Check if the file exists
    if (file_exists($filePath)) {
        // Set headers to force download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
 
        // Clear output buffer
        ob_clean();
        flush();

        // Read and output the file
        if (readfile($filePath) !== false) {
            // File was successfully sent to the browser
            exit;
        } else {
            // Error reading the file
            echo "Error reading the file.";
        }
    } else {
        // File not found
        echo "File not found.";
    }
} else {
    // Invalid file parameter
    echo "Invalid file.";
}
?>

