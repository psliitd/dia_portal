<?php

require('../util/Connection.php');
require('../util/SessionFunction.php');

if(!SessionCheck()){
	//return;
}

$title = $_POST['title'];
$website = $_POST['website'];
$date = $_POST['date'];
$link = $_POST['link'];
$country = $_POST['country'];
$uid = $_POST['uid'];
$studentid = $_SESSION['studentid'];


$query = "UPDATE papers SET paper_name='$title',presentation_date='$date',paper_website='$website',paper_link='$link',presentation_country='$country' WHERE uid='$uid'";
mysqli_query($con,$query);

header("Location:../ProgressReport.php");

?>
