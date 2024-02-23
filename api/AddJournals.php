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
$uid = uniqid();
$studentid = $_SESSION['studentid'];

$query = "INSERT INTO journals (uid,journal_name,publish_date,studentid,journal_website,journal_link,approved) VALUES ('$uid','$name','$date','$studentid','$website','$link','0')";
mysqli_query($con,$query);

header("Location:../ProgressReport.php");

?>
