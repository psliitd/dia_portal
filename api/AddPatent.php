<?php

require('../util/Connection.php');
require('../util/SessionFunction.php');

if(!SessionCheck()){
	//return;
}

$title = $_POST['title'];
$grade = $_POST['grade'];
$link = $_POST['link'];
$uid = uniqid();
$studentid = $_SESSION['studentid'];

$query = "INSERT INTO patent (uid,patent_title,patent_grade,studentid,patent_link,approved) VALUES ('$uid','$title','$grade','$studentid','$link','0')";
mysqli_query($con,$query);

header("Location:../ProgressReport.php");


?>

