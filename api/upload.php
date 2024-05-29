<?php

require('../util/Connection.php');
require('../structures/Login.php');

$iit_name = '';
$quarter='';
$year='';
// Check if the 'iit_name' query parameter is set
if (isset($_POST['id'])  ) {
    // If it is set, retrieve and assign its value to a variable
    $uniqueid = htmlspecialchars($_POST['id']);
    // $quarter = htmlspecialchars($_GET['quarter']);
    // $year = htmlspecialchars($_GET['financial_year']);
    print_r($uniqueid); // Debugging purposes
} 

// Create the table if it doesn't exist
$sqlCreateTable = "CREATE TABLE IF NOT EXISTS files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filepath VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
     
    uniqueid VARCHAR(255) NOT NULL,
    UNIQUE KEY unique_filename_iitname (uniqueid) 
)";

if ($con->query($sqlCreateTable) === TRUE) {
    
} else {
    echo "Error creating table: " . $con->error;
}

// Specify the full path to the upload directory
$targetDir = $_SERVER['DOCUMENT_ROOT'] . "uploads/";

// Create the upload directory if it doesn't exist
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true); // Create directory with full permissions
}{
     
    
}
// $iit_name = htmlspecialchars($_GET['iit_name']);
// Handle file upload
if (isset($_POST["submit"])) {
    $uniqueid = isset($_POST['id']) ? htmlspecialchars($_POST['id']) : '';
    
    $fileName = basename($_FILES["fileToUpload"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

     
    if ($_FILES["fileToUpload"]["size"] > 20 * 1024 * 1024) {
        echo "<script>alert('Sorry, your file is too large.');</script>";
    } else {
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFilePath)) {
            // Insert file metadata into database using prepared statement
            $stmt = $con->prepare("INSERT INTO files (filename, filepath,uniqueid) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $fileName, $targetFilePath, $uniqueid);
            if ($stmt->execute()) {
                echo "<script>alert('File uploaded successfully');</script>";
                $url = "../viewUC.php?uniqueid=" . urlencode($uniqueid) ;
                header("Location: " . $url);
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
}

// Close connection
$con->close();

?>
