<?php

require('../util/Connection.php');
//require('../util/SupervisorSessionFunction.php');
session_start();

//if(!SessionCheck()){
//	return;
//}

// Check if studentid is set in session
if(isset($_SESSION["studentid"])) {
    $studentid = $_SESSION["studentid"];
} else {
    // Handle case where studentid is not set
    // For example, you can redirect the user or show an error message
    // In this case, I'll redirect the user back to the profile page
    header("Location: ../Profile.php");
    exit(); // Terminate script execution after redirection
}

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$iit_name = $_POST['iit_name'];
$nationality = $_POST['nationality'];
$faculty_id = $_POST['facultyid'];
$department_name = $_POST['department_name'];

$query = "UPDATE supervisor SET mobile='$mobile',gender='$gender',email='$email',nationality='$nationality',faculty_id='$faculty_id',department='$department_name' WHERE uid='$studentid' ";
mysqli_query($con,$query);


header("Location:../supervisorProfile.php");

?>

