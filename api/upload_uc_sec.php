<?php

require('../util/Connection.php');
require('../structures/Login.php');

$iit_name = '';
 
// Create the table if it doesn't exist
$sqlCreateTable = "CREATE TABLE IF NOT EXISTS SecFilesUpload (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filepath VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    iit_name VARCHAR(255) NOT NULL  UNIQUE
     
)";

if ($con->query($sqlCreateTable) === TRUE) {
    
} else {
    echo "Error creating table: " . $con->error;
}

// Specify the full path to the upload directory
$targetDir = $_SERVER['DOCUMENT_ROOT'] . "secuploads/";

// Create the upload directory if it doesn't exist
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true); // Create directory with full permissions
}{
     
    
}
// $iit_name = htmlspecialchars($_GET['iit_name']);
// Handle file upload
if (isset($_POST["submit"])) {
    $iit_name = isset($_POST['iit_name']) ? htmlspecialchars($_POST['iit_name']) : '';
     
    // print_r($_POST);
    // print_r($iit_name);
     
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
            $stmt = $con->prepare("INSERT INTO secfilesupload (filename, filepath, iit_name) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $fileName, $targetFilePath, $iit_name);
            if ($stmt->execute()) {
                 // Show alert for successful upload
                echo "<script>alert('File uploaded successfully');</script>";
                // Redirect to SecEditUC.php after a delay
                echo "<script>setTimeout(function(){ window.location.href = '../SecEditUC.php'; }, 2000);</script>";
                exit(); // Ensure no further code is executed after redirection
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
