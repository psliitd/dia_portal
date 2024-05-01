<?php

require('../util/Connection.php');
require('../structures/Login.php');

$iit_name = '';
// Check if the 'iit_name' query parameter is set
if (isset($_GET['iit_name'])) {
    // If it is set, retrieve and assign its value to a variable
    $iit_name = htmlspecialchars($_GET['iit_name']);
    print_r($iit_name); // Debugging purposes
} 

// Create the table if it doesn't exist
$sqlCreateTable = "CREATE TABLE IF NOT EXISTS files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filepath VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    iit_name VARCHAR(255) NOT NULL  ,
    UNIQUE KEY unique_filename_iitname (iit_name, filename) 
)";

if ($con->query($sqlCreateTable) === TRUE) {
    
} else {
    echo "Error creating table: " . $con->error;
}

// Specify the full path to the upload directory
$targetDir = $_SERVER['DOCUMENT_ROOT'] . "/dia/dia/uploads/";

// Create the upload directory if it doesn't exist
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true); // Create directory with full permissions
}
// $iit_name = htmlspecialchars($_GET['iit_name']);
// Handle file upload
if (isset($_POST["submit"])) {
    $iit_name = isset($_POST['iit_name']) ? htmlspecialchars($_POST['iit_name']) : '';
    $fileName = basename($_FILES["fileToUpload"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFilePath)) {
            // Insert file metadata into database using prepared statement
            $stmt = $con->prepare("INSERT INTO files (filename, filepath, iit_name) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $fileName, $targetFilePath, $iit_name);
            if ($stmt->execute()) {
                echo "<script>alert('File uploaded successfully');</script>";;
            } else {
                 
                echo "<script>alert('Error uploading file.');</script>";
            }
            $stmt->close();
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.');</script>";

             
        }
    } else {
        echo "<script>alert('Sorry, only JPG, JPEG, PNG, GIF, and PDF files are allowed.');</script>";

         
    }
}

// Close connection
$con->close();

?>
