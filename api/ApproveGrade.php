<?php

require('../util/Connection.php');
require('../util/SessionFunction.php');

if(!SessionCheck()){
	//return;
}

$uid = $_POST['uid'];

$query = "UPDATE grades set approved='1' WHERE uid='$uid'";
mysqli_query($con,$query);

header("Location:../StudentDataView.php");

?>