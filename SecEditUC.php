<?php
require('util/Connection.php');
require('util/SessionCheck.php');
require('CoHeader.php');

// Handle form submission for applying filters
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve selected quarter and financial year
    $quarter = $_POST['quarter'];
    $financial_year = $_POST['year'];

    // You can use $quarter and $financial_year to filter data accordingly
    // For now, let's assume you're fetching data based on these filters
    // Modify your SQL query accordingly
    // $query = "SELECT * FROM iit_name WHERE quarter = '$quarter' AND financial_year = '$financial_year' ORDER BY name ASC";
// } else {
    // If filters are not applied, fetch all data
  }  $query = "SELECT * FROM iit_name ORDER BY name ASC";


$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head content remains the same -->
    <style>
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            z-index: 9999;
        }

        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            display: none;
            z-index: 10000;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        }

        /* Additional styles for the upload box */
        .upload-box {
            border: 2px dashed #ccc;
            padding: 20px;
            cursor: pointer;
            text-align: center;
        }

        .upload-box:hover {
            background-color: #f0f0f0;
        }

        .btn-primary {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .uc-download-link {
    color: #28a745; /* Green color */
    text-decoration: none; /* Remove underline */
}

.uc-download-link:hover {
    color: #218838; /* Darker shade of green on hover */
}


    </style>
</head>

<body>

    <div class="container">
        <!-- Filter form -->
        <form method="post" action="">
    
    <label for="quarter" style="font-size: 14px;">Select Quarter:</label>
<select id="quarter" name="quarter">
<option value="Q1(Apr-Jun)" <?php if(isset($_GET['quarter']) && $_GET['quarter'] == 'Q1(Apr-Jun)') echo 'selected'; ?>>Q1 (Apr-Jun)</option>
<option value="Q2(July-Sept)" <?php if(isset($_GET['quarter']) && $_GET['quarter'] == 'Q2(July-Sept)') echo 'selected'; ?>>Q2 (July-Sept)</option>
<option value="Q3(Oct-Dec)" <?php if(isset($_GET['quarter']) && $_GET['quarter'] == 'Q3(Oct-Dec)') echo 'selected'; ?>>Q3 (Oct-Dec)</option>
<option value="Q4(Jan-Mar)" <?php if(isset($_GET['quarter']) && $_GET['quarter'] == 'Q4(Jan-Mar)') echo 'selected'; ?>>Q4 (Jan-Mar)</option>
</select>

<label for="year" style="font-size: 14px;">Select Financial Year:</label>
<select id="year" name="year">
<option value="FY2024-25" <?php if(isset($_GET['year']) && $_GET['year'] == 'FY2024-25') echo 'selected'; ?>>FY2024-25</option>
<option value="FY2025-26" <?php if(isset($_GET['year']) && $_GET['year'] == 'FY2025-26') echo 'selected'; ?>>FY2025-26</option>
<option value="FY2026-27" <?php if(isset($_GET['year']) && $_GET['year'] == 'FY2026-27') echo 'selected'; ?>>FY2026-27</option>
<option value="FY2027-28" <?php if(isset($_GET['year']) && $_GET['year'] == 'FY2027-28') echo 'selected'; ?>>FY2027-28</option>
</select>

    <input type="submit" name="apply_filter" value="Apply Filter" style="background-color: #007bff; color: #ffffff;  padding: 5px 10px; border: none; border-radius: 20px; margin:10px; cursor: pointer; font-size: 16px; transition: background-color 0.3s ease;" onmouseover="this.style.backgroundColor='#0056b3'" onmouseout="this.style.backgroundColor='#007bff'">

</form>

        <div class="table-responsive">
            <table class="table">
                <!-- Table header remains the same -->
                <thead>
                    <tr>
                        <th>IIT Name</th>
                        <th>UC Upload</th>
                        <th>UC Download</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $defaultQuarter = ''; // Set your default quarter value here
                    $defaultYear = '';

                     
                        // If the form is submitted, retrieve the quarter and year values from $_POST
                        $quarter = isset($_POST['quarter']) ? htmlspecialchars($_POST['quarter']) : $defaultQuarter;
                        $year = isset($_POST['year']) ? htmlspecialchars($_POST['year']) : $defaultYear;
                    // echo $quarter;
                    // echo $year;
                    if (isset($quarter) && isset($year)) {
                        echo "<div class='alert alert-info' role='alert'>";
                        echo "You have selected quarter <span style='color: black;'> $quarter</span> for year <span style='color: black;'> $year</span>";
                        echo "</div>";
                    }
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $iitId = $row['uid'];
                            $iitName = $row['name'];
                            echo "<tr>";
                            echo "<td>{$iitName}</td>";
                            echo "<td><button class='uc-upload-btn btn btn-primary' data-iit-id='" . $iitName . "-" . $quarter . "-" . $year . "' onclick='openPopup()'>UC Upload</button></td>";
                    
                            if (isset($quarter) && isset($year)) {
                                echo "<td><a class='uc-download-link' href='api/sec_download_uc.php?iit_id=" . $iitName . "-" . $quarter . "-" . $year . "'>UC Download</a></td>";
                            }  
                            // echo "<td><a href='api/sec_download_uc.php?iit_id={$iitName}&quarter={$quarter}&financial_year={$financial_year}'>UC Download</a></td>"; // Adjust URL as per your setup
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No IITs found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Popup for UC Upload -->
    <div class="overlay" id="overlay"></div>
        <div class="popup" id="popup">
            <form action="api/upload_uc_sec.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="iit_name" id="iit_name">
                <input type="hidden" name="quarter" id="quarter">
                <input type="hidden" name="year" id="year">

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

    <!-- START SCRIPTS -->
    <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script type="text/javascript">
    function openPopup() {
        document.getElementById("overlay").style.display = "block";
        document.getElementById("popup").style.display = "block";
    }

    function updateFileName() {
        var fileInput = document.getElementById('fileToUpload');
        var selectedFileName = document.getElementById('selectedFileName');

        if (fileInput.files.length > 0) {
            selectedFileName.textContent = fileInput.files[0].name;
        } else {
            selectedFileName.textContent = "Click here to upload file";
        }
    }

    // Attach event listener to UC Upload buttons
    document.addEventListener("DOMContentLoaded", function() {
        var ucUploadButtons = document.querySelectorAll('.uc-upload-btn');
        ucUploadButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                var iitName = this.getAttribute('data-iit-id'); // Get the IIT ID from data attribute
                var quarter = this.getAttribute('data-quarter');
                var year = this.getAttribute('data-financial-year');
                openPopup();
                document.getElementById("iit_name").value = iitName;
                document.getElementById("quarter").value = quarter;
                document.getElementById("year").value = year;
            });
        });

        // Function to close the popup
        document.getElementById("overlay").addEventListener("click", function() {
            document.getElementById("overlay").style.display = "none";
            document.getElementById("popup").style.display = "none";
        });
    });

</script>
    <!-- END SCRIPTS -->
</body>

</html>
