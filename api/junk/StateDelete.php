<?php

require('../util/Connection.php');
require('../structures/State.php');
require('../util/SessionFunction.php');

if(!SessionCheck()){
	return;
}

$state = new State;
$state->setId($_POST['uid']);

$query = $state->delete($state);

mysqli_query($con,$query);
mysqli_close($con);

header("Location:../State.php");

?>
