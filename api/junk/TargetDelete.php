<?php

require('../util/Connection.php');
require('../structures/Target.php');
require('../util/SessionFunction.php');

if(!SessionCheck()){
	return;
}

$target = new Target;
$target->setId($_POST['uid']);

$query = $target->delete($target);

mysqli_query($con,$query);
mysqli_close($con);

header("Location:../Target.php");

?>
