<?php

require('../util/Connection.php');
require('../util/SessionFunction.php');

if(!SessionCheck()){
	//return;
}

$uid = $_POST['uid'];
$studentid = $_SESSION['studentid'];

$query = "DELETE FROM papers WHERE uid='$uid' AND studentid='$studentid'";
mysqli_query($con,$query);

header("Location:../ProgressReport.php");

?>