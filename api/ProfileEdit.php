<?php

require('../util/Connection.php');
require('../util/SessionFunction.php');

if(!SessionCheck()){
	return;
}

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$iit_name = $_POST['iit_name'];
$nationality = $_POST['nationality'];
$registration_number = $_POST['registrationNumber'];
$address = $_POST['address'];
$advisor_name = $_POST['advisor_name'];
$joining_campus_date = $_POST['joiningDateCampus'];
$department_name = $_POST['department_name'];
$joining_date = $_POST['joiningDate'];


$query = "UPDATE profile SET name='$name',mobile='$mobile',gender='$gender',nationality='$nationality',registration_number='$registration_number',address='$address',advisor_name='$advisor_name',joining_campus_date='$joining_campus_date',department_name='$department_name',joining_date='$joining_date' WHERE email='$email' AND iit_name='$iit_name'";
mysqli_query($con,$query);


header("Location:../Profile.php");

?>

