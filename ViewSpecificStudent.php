<?php
require('util/Connection.php');
require('util/SessionCheck.php');
require('CoHeader.php');
 

// Retrieve student details based on the student name (assuming student name is passed as a GET parameter)
$student_id = $_GET['StudentId']; // Assuming 'name' is the parameter name
$sql = "SELECT * FROM profile WHERE studentid = '$student_id'";
$result = $con->query($sql);
 

if ($result->num_rows > 0) {
    // Student details found
    $row = $result->fetch_assoc();
    $student_name = $row['name'];
    $joining_date = $row['joining_date'];
    $registration_number = $row['registration_number'];
    $mobile = $row['mobile'];
    $email = $row['email'];
    $gender = $row['gender'];
    $advisor_name = $row['advisor_name'];
    $nationality = $row['nationality'];
    $department_name = $row['department_name'];
    $joining_campus_date = $row['joining_campus_date'];
    $studentid = $row['studentid'];


     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link rel="stylesheet" href="css/student-detail.css">
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #192B34;
            margin: 0;
            padding: 0;
            font-size: 14px;
        }
    h3, .h3 {
    margin-bottom: 10px;
    font-size: 20px!important;
    font-weight: 600;
    text-align: center;
    background-color:#39CCCC;
    /* width: 90%; 
    margin: 0 auto; */

}
h2, .h2 {
    margin-bottom: 10px;
    font-size: 26px;
    font-weight: 600;
    text-align: center;
    background-color:#39CCCC;
    /* width: 90%; 
    margin: 0 auto; */
}

        .student-details-table {
            margin: 20px;
            margin-left: 20%;
            margin-top: 90px;
            padding: 20px;
            background-color: #fff;
            /* border: 1px solid #000;  */
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            overflow-x: hidden !important;
            width: 60%;
        }

        table {
            border-collapse: collapse;
            margin-top: 20px;
            border: 1px solid #000;
            background-color:#fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
            width: 100%;
            margin-bottom: 20px;
          
        }

        th, td {
            border: 1px solid #000;
            padding: 15px;
            text-align: center;
            
        }

        th {
            background-color: #f2f2f2;
            
        }

        tr:hover {
            background-color: #B8DAFF;
        }

        @media only screen and (max-width: 600px) {
            .student-details-table {
                width: 100%;
                margin-left: 0;
            }
        }
     
    </style>
<body>

<div class="student-details-table">
<h2 style="border: 2px solid black; border-image: linear-gradient(to right, red, blue) 1">Student Details</h2>


    <table>
        <tr>
            <td><strong>Student Name:</strong></td>
            <td><?php echo $student_name; ?></td>
        </tr>
        <tr>
            <td><strong>Joining Date:</strong></td>
            <td><?php echo $joining_date; ?></td>
        </tr>
        <tr>
            <td><strong>Registration Number:</strong></td>
            <td><?php echo $registration_number; ?></td>
        </tr>
        <tr>
            <td><strong>Mobile:</strong></td>
            <td><?php echo $mobile; ?></td>
        </tr>
        <tr>
            <td><strong>Email:</strong></td>
            <td><?php echo $email; ?></td>
        </tr>
        <tr>
            <td><strong>Gender:</strong></td>
            <td><?php echo $gender; ?></td>
        </tr>
        <tr>
            <td><strong>Advisor Name:</strong></td>
            <td><?php echo $advisor_name; ?></td>
        </tr>
        <tr>
            <td><strong>Nationality:</strong></td>
            <td><?php echo $nationality; ?></td>
        </tr>
        <tr>
            <td><strong>Department Name:</strong></td>
            <td><?php echo $department_name; ?></td>
        </tr>
        <tr>
            <td><strong>Joining Campus Date:</strong></td>
            <td><?php echo $joining_campus_date; ?></td>
        </tr>
        <tr>
            <td><strong>Student ID:</strong></td>
            <td><?php echo $studentid; ?></td>
        </tr>
    </table>
</div>
 <br>
 <br>
<?php
// Retrieve and display grades details
// $grades_sql = "SELECT * FROM grades WHERE studentid = '$studentid'";
// $grades_result = $con->query($grades_sql);
// if ($grades_result->num_rows > 0) {
// echo "<div style='overflow-x: auto; text-align: center;'>";
// echo "<h3>Grades Detail</h3>";
// echo "<br>";
// echo "<table border='1' style='width: 90%; margin: 0 auto;'>"; 
// echo "<tr><th>Student UID</th><th>Subject</th><th>Grade</th><th>Date</th><th>Approved</th><th>Student ID</th></tr>";
// while ($grades_row = $grades_result->fetch_assoc()) {
//     echo "<tr>";
//     echo "<td>" . $grades_row['uid'] . "</td>";
//     echo "<td>" . $grades_row['subject'] . "</td>";
//     echo "<td>" . $grades_row['grade'] . "</td>";
//     echo "<td>" . $grades_row['date'] . "</td>";
//     echo "<td>" . $grades_row['approved'] . "</td>";
//     echo "<td>" . $grades_row['studentid'] . "</td>";
//     echo "</tr>";
// }
// echo "</table>";
// echo "</div>";
// echo "<br>"; 
// echo "<br>";
// }

$grades_sql = "SELECT * FROM grades WHERE studentid = '$studentid'";
$grades_result = $con->query($grades_sql);
if ($grades_result->num_rows > 0) {
    echo "<div style='overflow-x: auto; text-align: center; '>";
    echo "<h3 style=\"border: 2px solid black; border-image: linear-gradient(to right, red, blue) 1;width:1500px;margin-left:90px;\">Grades Detail</h3>";
    echo "<br>";
    echo "<table border='1' style='width: 90%; margin: 0 auto;'>"; 
    echo "<tr><th>Student UID</th><th>Subject</th><th>Grade</th><th>Date</th><th>Status</th><th>Student ID</th></tr>";
    while ($grades_row = $grades_result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $grades_row['uid'] . "</td>";
        echo "<td>" . $grades_row['subject'] . "</td>";
        echo "<td>" . $grades_row['grade'] . "</td>";
        echo "<td>" . $grades_row['date'] . "</td>";
        // Check if grade is approved or pending and set appropriate style
        if ($grades_row['approved'] == 'Approved') {
            echo "<td style='color: green;'>" . $grades_row['approved'] . "</td>";
        } else {
            echo "<td style='color: red;'>" . $grades_row['approved'] . "</td>";
        }
        echo "<td>" . $grades_row['studentid'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
    echo "<br>"; 
    echo "<br>";
}


// Retrieve and display journal details
$journal_sql = "SELECT * FROM journals WHERE studentid = '$studentid'";
$journal_result = $con->query($journal_sql);
if ($journal_result->num_rows > 0) {
    echo "<div style='overflow-x: auto; text-align: center;'>";
    echo "<h3 style=\"border: 2px solid black; border-image: linear-gradient(to right, red, blue) 1;width:1500px;margin-left:90px;\">Journal Detail</h3>";
    echo "<br>";
    echo "<table border='1' style='width: 90%; margin: 0 auto;'>"; 
    echo "<tr><th>Journals Unique ID</th><th>Journal Name</th><th>Publish Date</th><th>Approved</th><th>Journal Link</th><th>Journal Website</th></tr>";
    while ($journal_row = $journal_result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $journal_row['uid'] . "</td>";
        echo "<td>" . $journal_row['journal_name'] . "</td>";
        echo "<td>" . $journal_row['publish_date'] . "</td>";
        // Check if journal is approved or pending and set appropriate style
        if ($journal_row['approved'] == 'Approved') {
            echo "<td style='color: green;'>" . $journal_row['approved'] . "</td>";
        } else {
            echo "<td style='color: red;'>" . $journal_row['approved'] . "</td>";
        }
        echo "<td><a href='" . $journal_row['journal_link'] . "' target='_blank'>" . $journal_row['journal_link'] . "</a></td>";
        echo "<td><a href='" . $journal_row['journal_website'] . "' target='_blank'>" . $journal_row['journal_website'] . "</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
    echo "<br>";
    echo "<br>";
}


// Retrieve and display paper details
$paper_sql = "SELECT * FROM papers WHERE studentid = '$studentid'";
$paper_result = $con->query($paper_sql);
if ($paper_result->num_rows > 0) {
    echo "<div style='overflow-x: auto; text-align: center;'>";
    echo "<h3 style=\"border: 2px solid black; border-image: linear-gradient(to right, red, blue) 1;width:1500px;margin-left:90px;\">Conference Paper Detail</h3>";
    echo "<br>";
    echo "<table border='1' style='width: 90%; margin: 0 auto;'>"; 
    echo "<tr><th>Papers Unique ID</th><th>Paper Name</th><th>Presentation Date</th><th>Approved</th><th>Paper Link</th><th>Paper Website</th><th>Presentation Country</th></tr>";
    while ($paper_row = $paper_result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $paper_row['uid'] . "</td>";
        echo "<td>" . $paper_row['paper_name'] . "</td>";
        echo "<td>" . $paper_row['presentation_date'] . "</td>";
        // Check if paper is approved or pending and set appropriate style
        if ($paper_row['approved'] == 'Approved') {
            echo "<td style='color: green;'>" . $paper_row['approved'] . "</td>";
        } else {
            echo "<td style='color: red;'>" . $paper_row['approved'] . "</td>";
        }
        echo "<td><a href='" . $paper_row['paper_link'] . "' target='_blank'>" . $paper_row['paper_link'] . "</a></td>";
        echo "<td><a href='" . $paper_row['paper_website'] . "' target='_blank'>" . $paper_row['paper_website'] . "</a></td>";
        echo "<td>" . $paper_row['presentation_country'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
    echo "<br>"; 
    echo "<br>"; 
}

 // Retrieve and display patent details
$patent_sql = "SELECT * FROM patent WHERE studentid = '$studentid'";
$patent_result = $con->query($patent_sql);
if ($patent_result->num_rows > 0) {
    echo "<div style='overflow-x: auto; text-align: center;'>";
    echo "<h3 style=\"border: 2px solid black; border-image: linear-gradient(to right, red, blue) 1;width:1500px;margin-left:90px;\">Patent Detail</h3>";
    echo "<br>";
    echo "<table border='1' style='width: 90%; margin: 0 auto;'>"; 
    echo "<tr><th>Patents Unique ID</th><th>Patent Title</th><th>Approved</th><th>Patent Link</th><th>Patent Grade</th><th>Approval Date</th></tr>";
    while ($patent_row = $patent_result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $patent_row['uid'] . "</td>";
        echo "<td>" . $patent_row['patent_title'] . "</td>";
        // Check if patent is approved or pending and set appropriate style
        if ($patent_row['approved'] == 'Approved') {
            echo "<td style='color: green;'>" . $patent_row['approved'] . "</td>";
        } else {
            echo "<td style='color: red;'>" . $patent_row['approved'] . "</td>";
        }
        echo "<td><a href='" . $patent_row['patent_link'] . "' target='_blank'>" . $patent_row['patent_link'] . "</a></td>";
        echo "<td>" . $patent_row['patent_grade'] . "</td>";
        echo "<td>" . $patent_row['approval_date'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
    echo "<br>"; 
    echo "<br>";
}

?>

<?php
    // Close PHP tag to resume HTML content
} else {
    // Student details not found
    echo "<p>Student not found.</p>";
}
?>

<?php
$photo_url = ''; // Initialize $photo_url

// if(isset($_GET["studentid"])){
//     $studentid = $_GET["studentid"];
//     $query1 = "SELECT photo_url FROM profile WHERE studentid='$studentid'";
//     $result1 = mysqli_query($con, $query1);
//     $numrows1 = mysqli_num_rows($result1);
//     if($numrows1 == 1){
//         $row1 = mysqli_fetch_array($result1);
//         $photo_url = $row1['photo_url'];
        
//     }else {
//         echo "no rows getting";
//     }
// }

 
if(isset($_GET["StudentId"])){
     
    $studentid = $_GET["StudentId"];
     
    $query1 = "SELECT photo_url FROM profile WHERE studentid='$studentid'";
    $result1 = mysqli_query($con, $query1);
    if($result1) {
        $numrows1 = mysqli_num_rows($result1);
        if($numrows1 == 1){
            $row1 = mysqli_fetch_array($result1);
            $photo_url = $row1['photo_url'];
             
        } else {
            echo "No rows found for student with ID: $studentid";
        }
    } else {
        echo "Error executing query: " . mysqli_error($con);
    }
}

?>

<div class="col-md-3">
<p style="font-weight: bold; text-decoration: underline; font-size: medium;">View Profile Photo</p>

    <?php if(isset($photo_url)): ?>
        <img src="<?php echo $photo_url; ?>" alt="Profile Photo" class="img-thumbnail" style="width: 150px; height: 200px; margin-left: 40vw;">
    <?php endif; ?>
</div>


<div class="row">
                        <div class="col-md-12">

                            <!-- START SIMPLE DATATABLE -->
							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h3 class="panel-title">Stipend Received Data</h3>
										</div>
										<div class="panel-body">
											<?php
											$sql = "SELECT month, stipend, year FROM stipend_received where studentid='$studentid'";
											$result = $con->query($sql);

											// Check if the query returned any rows
											if ($result->num_rows > 0) {
												// Output table structure
												echo '<table class="table">';
												echo '<thead><tr><th>Month</th><th>Stipend</th><th>Year</th></tr></thead>';
												echo '<tbody>';

												// Fetch and display each row of the result set
												while ($row = $result->fetch_assoc()) {
													echo "<tr><td>{$row['month']}</td><td>{$row['stipend']}</td><td>{$row['year']}</td></tr>";
												}

												echo '</tbody></table>';
											} else {
												echo "No data found.";
											}
											?>
										</div>
									</div>
								</div>
							</div>

                            <!-- END SIMPLE DATATABLE -->
                        </div>
                    </div>

</body>
</html>
