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
$iit_entry_no = $_POST['iit_entry_no'];
$permanent_email = $_POST['permanent_email'];
$personal_mobile =$_POST['personal_mobile'];



$query = "UPDATE profile SET name='$name',mobile='$mobile',personal_mobile='$personal_mobile',gender='$gender',email='$email',permanent_email='$permanent_email',nationality='$nationality',registration_number='$registration_number',address='$address',advisor_name='$advisor_name',joining_campus_date='$joining_campus_date',department_name='$department_name',joining_date='$joining_date', iit_entry_no='$iit_entry_no' WHERE  iit_name='$iit_name'";
mysqli_query($con,$query);


header("Location:../Profile.php");

?>

