<?php

require('../util/Connection.php');
require('../util/SessionFunction.php');

if(!SessionCheck()){
	//return;
}

$name = $_POST['name'];
$website = $_POST['website'];
$date = $_POST['date'];
$link = $_POST['link'];
$uid = $_POST['uid'];
$studentid = $_SESSION['studentid'];

$query = "UPDATE journals SET journal_name='$name',publish_date='$date',journal_website='$website',journal_link='$link' WHERE uid='$uid'";
mysqli_query($con,$query);

header("Location:../ProgressReport.php");

?>
