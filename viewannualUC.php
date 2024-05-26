<?php
require('util/Connection.php');
require('util/SessionCheck.php');
require('DiaHeader.php');

$iit_name = "";

// Check if the download button is clicked and the required parameters are provided
if(isset($_GET['download']) && isset($_GET['fileName']) && isset($_GET['targetFilePath']) && isset($_GET['iit_name'])) {
    $fileName = $_GET['fileName'];
    $targetFilePath = $_GET['targetFilePath'];
    $iit_name = $_GET['iit_name'];

    // Fetch the file path from the database based on iit_name
    $sql = "SELECT filepath FROM annualucfiles WHERE iit_name = ? and filename = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $iit_name,$fileName);
    $stmt->execute();
    $stmt->store_result();

    // If a record is found, fetch the filepath and initiate file download
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
        // No file found with the provided iit_name
        echo "File not found.";
    }

    // Close statement and connection
    $stmt->close();
    $con->close();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add your custom CSS styles here */
        .upload-box {
            border: 2px dashed #ccc;
            padding: 20px;
            margin-top: 20px;
            text-align: center;
            cursor: pointer;
        }
        .upload-box:hover {
            border-color: #aaa;
        }
    </style>
</head>
<body>
    <div class="container">
    <h2 style="margin-top: 20%; font-weight: bold; color: #333;">View your Uploaded Annual UC by clicking on below download button.</h2>

        <?php
        // Check if all required parameters are provided in the URL
        if(isset($_GET['fileName']) && isset($_GET['targetFilePath']) && isset($_GET['iit_name'])) {
            $fileName = $_GET['fileName'];
            $targetFilePath = $_GET['targetFilePath'];
            $iit_name = $_GET['iit_name'];

            // Output a link that triggers the download when clicked
            echo '<a href="?download=1&fileName=' . urlencode($fileName) . '&targetFilePath=' . urlencode($targetFilePath) . '&iit_name=' . urlencode($iit_name) . '" style="margin-left:35%;color:red;font-size:20px;">Download Annual UC</a>';
        } else {
            // ID parameter not provided
            echo "File ID not provided.";
        }
        ?>
    </div>

    <!-- Include necessary Bootstrap and JavaScript files -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
