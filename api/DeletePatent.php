<?php

require('../util/Connection.php');
require('../util/SessionFunction.php');

if(!SessionCheck()){
	//return;
}

$uid = $_POST['uid'];
$studentid = "qwerty";//$_SESSION['studentid'];

$query = "DELETE FROM patent WHERE uid='$uid' AND studentid='$studentid'";
mysqli_query($con,$query);

header("Location:../ProgressReport.php");

?>