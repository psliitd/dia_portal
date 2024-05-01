<?php
require('util/Connection.php');
require('util/SessionCheck.php');
require('DiaHeader.php');

$iit_name = "";

// Retrieve the iit_name value from the URL
if(isset($_GET['iit_name'])) {
    $iit_name = $_GET['iit_name'];
      
    // Use the $iit_name variable in your code
} else {
    // Handle case when the iit_name is not provided in the URL
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
                <h1>Upload UC</h1>
                <form action="api/upload.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="iit_name" value="<?php echo isset($_GET['iit_name']) ? htmlspecialchars($_GET['iit_name']) : ''; ?>">
                <div class="form-group">
                        <label for="fileToUpload">Choose UC file:</label>
                        <div class="upload-box" onclick="document.getElementById('fileToUpload').click()">
                            <p id="selectedFileName">Click here to upload file</p>
                        </div>
                        <input type="file" name="fileToUpload" id="fileToUpload" style="display: none;" onchange="updateFileName()">
                    </div>
                    <button type="submit" name="submit" class="btn btn-success">Upload</button>
                </form>
            </div>

            <script>
                function updateFileName() {
                    var fileInput = document.getElementById('fileToUpload');
                    var selectedFileName = document.getElementById('selectedFileName');

                    if (fileInput.files.length > 0) {
                        selectedFileName.textContent = fileInput.files[0].name;
                    } else {
                        selectedFileName.textContent = "Click here to upload file";
                    }
                }
            </script>

    <!-- Include necessary Bootstrap and JavaScript files -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
