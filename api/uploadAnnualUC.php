<?php

require('../util/Connection.php');
require('../structures/Login.php');

$iit_name = '';
$financial_year = '';

// Check if the 'iit_name' query parameter is set
if (isset($_POST['iit_name'])) {
    $iit_name = htmlspecialchars($_POST['iit_name']);
    echo $iit_name;
}

if (isset($_POST['hiddenFinancialYear'])) {
    $financial_year = htmlspecialchars($_POST['hiddenFinancialYear']);
}

// Create the table if it doesn't exist
$sqlCreateTable = "CREATE TABLE IF NOT EXISTS annualucfiles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filepath VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    iit_name VARCHAR(255) NOT NULL,
    financial_year VARCHAR(9) NOT NULL,
    UNIQUE KEY unique_filename_iitname (iit_name, filename)
)";

if ($con->query($sqlCreateTable) === TRUE) {
    // Table created successfully
} else {
    echo "Error creating table: " . $con->error;
}

// Specify the full path to the upload directory
$targetDir = $_SERVER['DOCUMENT_ROOT'] . "uploadsannualuc/";

// Create the upload directory if it doesn't exist
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
}

// Handle file upload
if (isset($_POST["submit"])) {
    $fileName = basename($_FILES["fileToUpload"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if ($_FILES["fileToUpload"]["size"] > 20 * 1024 * 1024) {
        echo "<script>alert('Sorry, your file is too large.');</script>";
    } else {
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFilePath)) {
                $stmt = $con->prepare("INSERT INTO annualucfiles (filename, filepath, iit_name, financial_year) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $fileName, $targetFilePath, $iit_name, $financial_year);
                if ($stmt->execute()) {
                    echo "<script>alert('File uploaded successfully');</script>";
                    $url = "../viewannualUC.php?fileName=" . urlencode($fileName) . "&targetFilePath=" . urlencode($targetFilePath) . "&iit_name=" . urlencode($iit_name);
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
