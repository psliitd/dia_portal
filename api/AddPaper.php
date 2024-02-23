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
$uid = uniqid();
$studentid = $_SESSION['studentid'];

$query = "INSERT INTO papers (uid,paper_name,presentation_date,studentid,paper_website,paper_link,presentation_country,approved) VALUES ('$uid','$title','$date','$studentid','$website','$link','$country','0')";
mysqli_query($con,$query);

header("Location:../ProgressReport.php");

?>
