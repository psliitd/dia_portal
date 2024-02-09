<?php

require('../util/Connection.php');
require('../structures/District.php');
require('../util/SessionFunction.php');

if(!SessionCheck()){
	return;
}

$District = new District;
$District->setId(uniqid());
$District->setName($_POST['name']);

$query = $District->insert($District);
mysqli_query($con, $query);
mysqli_close($con);

header("Location:../District.php");

?>
