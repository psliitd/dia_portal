<?php

require('../util/Connection.php');
require('../structures/State.php');
require('../util/SessionFunction.php');

if(!SessionCheck()){
	return;
}

$state = new State;

$state->setName(str_replace("'","",$_POST['name']));
$state->setId(str_replace("'","",$_POST['uid']));

$query = $state->update($state);
$result = mysqli_query($con,$query);

mysqli_close($con);

if($result){
	header("Location:../State.php");
}
else{
   echo "error";
}

?>
