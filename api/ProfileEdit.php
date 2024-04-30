<?php

require('../util/Connection.php');
require('../util/SessionFunction.php');

session_start();

// Check if session is valid
if (!SessionCheck()) {
    // Handle invalid session, maybe redirect to login page
    header("Location:../login.php");
    exit(); // Terminate script execution after redirect
}

// Check if student ID is set in session
if(isset($_SESSION["studentid"])) {
    $studentid = $_SESSION["studentid"];
} else {
    // Handle case where student ID is not set
    // Redirect or show error message
    header("Location:../error.php");
    exit(); // Terminate script execution after redirect
}

// Retrieve form data
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$personal_mobile = $_POST['personal_mobile'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$permanent_email = $_POST['permanent_email'];
$nationality = $_POST['nationality'];
$registration_number = $_POST['registrationNumber'];
$address = $_POST['address'];
$advisor_name = $_POST['advisor_name'];
$joining_campus_date = $_POST['joiningDateCampus'];
$department_name = $_POST['department_name'];
$joining_date = $_POST['joiningDate'];
$iit_entry_no = $_POST['iit_entry_no'];
$iit_name = $_POST['iit_name'];

// Update profile in database
$query = "UPDATE profile SET 
            name='$name',
            mobile='$mobile',
            personal_mobile='$personal_mobile',
            gender='$gender',
            email='$email',
            permanent_email='$permanent_email',
            nationality='$nationality',
            registration_number='$registration_number',
            address='$address',
             
            joining_campus_date='$joining_campus_date',
            department_name='$department_name',
            joining_date='$joining_date',
            iit_entry_no='$iit_entry_no' 
          WHERE  
            iit_name='$iit_name' AND studentid='$studentid'";

// Execute the query
$result = mysqli_query($con, $query);

if (!$result) {
    // Handle query error
    $error_message = mysqli_error($con);
    // Redirect or show error message
    header("Location:../error.php?message=" . urlencode($error_message));
    exit(); // Terminate script execution after redirect
}

// Redirect to profile page after successful update
header("Location:../Profile.php");
exit(); // Terminate script execution after redirect

?>
