<?php
require('util/Connection.php');
require('util/SessionCheck.php');
require('DiaHeader.php');

$iit_name = '';

// Retrieve the iit_name value from the URL
if (isset($_GET['iit_name'])) {
    $iit_name = $_GET['iit_name'];
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
        <h1>Upload Annual UC</h1>
        <form action="api/uploadAnnualUC.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="iit_name" value="<?php echo htmlspecialchars($iit_name); ?>">
            <div class="form-group">
                <label for="financialYear">Select Financial Year:</label>
                <select class="form-control" id="financialYear" name="financialYear" required>
                    <option value="">Select Year</option>
                    <?php
                    $currentYear = date("Y");
                    for ($i = $currentYear; $i <= $currentYear + 3; $i++) {
                        $nextYear = $i + 1;
                        $disabled = $i == $currentYear ? "" : "disabled";
                        echo "<option value='$i-$nextYear' $disabled>$i-$nextYear</option>";
                    }
                    ?>
                </select>
            </div>
            <input type="hidden" id="hiddenFinancialYear" name="hiddenFinancialYear" value="">
            <div class="form-group">
                <label for="fileToUpload">Choose Annual UC file:</label>
                <div class="upload-box" onclick="document.getElementById('fileToUpload').click()">
                    <p id="selectedFileName">Click here to upload file</p>
                </div>
                <input type="file" name="fileToUpload" id="fileToUpload" style="display: none;" onchange="updateFileName()">
            </div>
            <button type="submit" name="submit" class="btn btn-success" onclick="updateHiddenFinancialYear()">Upload</button>
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

        function updateHiddenFinancialYear() {
            var financialYear = document.getElementById('financialYear').value;
            document.getElementById('hiddenFinancialYear').value = financialYear;
        }
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
