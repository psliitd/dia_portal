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
$advisor_name = $_POST['advisor'];
$joining_campus_date = $_POST['joiningDateCampus'];
$department_name = $_POST['department'];
$joining_date = $_POST['joiningDate'];
$username = $_POST['username'];
$password = $_POST['password'];
$uid = uniqid();
$loginid = uniqid();


$query_check = "SELECT * FROM profile WHERE email='$email' AND iit_name='$iit_name'";
$result_check = mysqli_query($con,$query_check);
$rows = mysqli_num_rows($result_check);
if($rows==0){
	$query = "INSERT INTO profile (name,mobile,gender,email,iit_name,nationality,registration_number,address,advisor_name,joining_campus_date,department_name,joining_date,studentid) VALUES ('$name','$mobile','$gender','$email','$iit_name','$nationality','$registration_number','$address','$advisor_name','$joining_campus_date','$department_name','$joining_date','$uid')";
	mysqli_query($con,$query);
	
	$query = "INSERT INTO login (username,password,uid,studentid) VALUES ('$username','$password','$loginid','$uid')";
	mysqli_query($con,$query);

	header("Location:../Login.php");

}
else{
	echo "This id already exist for the selected institute";
}

?>

