<?php

require('../util/Connection.php');
//require('../util/SupervisorSessionFunction.php');

//if(!SessionCheck()){
//	return;
//}

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$iit_name = $_POST['iit_name'];
$nationality = $_POST['nationality'];
$faculty_id = $_POST['facultyid'];
$department_name = $_POST['department_name'];

$query = "UPDATE supervisor SET name='$name',mobile='$mobile',gender='$gender',email='$email',nationality='$nationality',faculty_id='$faculty_id',department='$department_name' WHERE 1 ";
mysqli_query($con,$query);


header("Location:../supervisorProfile.php");

?>

