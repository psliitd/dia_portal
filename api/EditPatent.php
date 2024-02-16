<?php

require('../util/Connection.php');
require('../util/SessionFunction.php');

if(!SessionCheck()){
	//return;
}

$title = $_POST['title'];
$grade = $_POST['grade'];
$link = $_POST['link'];
$uid = $_POST['uid'];
$studentid = $_SESSION['studentid'];

$query = "UPDATE patent SET patent_title='$title',patent_grade='$grade',patent_link='$link',approved='0' WHERE uid='$uid'";
mysqli_query($con,$query);

header("Location:../ProgressReport.php");

?>

