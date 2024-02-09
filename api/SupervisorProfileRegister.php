<?php

require('../util/Connection.php');
require('../util/SessionFunction.php');

if(!SessionCheck()){
	//return;
}


$name = $_POST['name'];
$mobile = $_POST['mobile'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$iit_name = $_POST['iit_name'];
$nationality = $_POST['nationality'];
$facultyNumber = $_POST['facultyNumber'];
$department = $_POST['department'];
$username = $_POST['username'];
$password = $_POST['password'];
$uid = uniqid();

$query_check = "SELECT * FROM supervisor WHERE email='$email' AND iit_name='$iit_name'";
$result_check = mysqli_query($con,$query_check);
$rows = mysqli_num_rows($result_check);
if($rows==0){
	$query = "INSERT INTO supervisor (name,mobile,gender,email,iit_name,nationality,faculty_id,department,username,password,uid) VALUES ('$name','$mobile','$gender','$email','$iit_name','$nationality','$facultyNumber','$department','$username','$password','$uid')";
	mysqli_query($con,$query);
	
	$query = "INSERT INTO advisor (name,id,institute) VALUES ('$name','$uid','$iit_name')";
	mysqli_query($con,$query);

	$query = "INSERT INTO login (username,password) VALUES ('$username','$password')";
	mysqli_query($con,$query);
	header("Location:../Login.html");

}
else{
	echo "This id already exist for the selected institute";
}

?>

