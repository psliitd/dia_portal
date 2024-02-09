<?php

require('../util/Connection.php');
require('../util/SessionFunction.php');

if(!SessionCheck()){
	//return;
}

$grade = $_POST['grade'];
$subject = $_POST['subject'];
$date = $_POST['date'];
$uid = $_POST['uid'];
$studentid = "qwerty";//$_SESSION['studentid'];

$query = "UPDATE grades SET grade='$grade',subject='$subject',date='$date',approved='0' WHERE uid='$uid'";
mysqli_query($con,$query);

header("Location:../ProgressReport.php");

?>