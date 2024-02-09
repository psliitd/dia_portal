<?php

require('../util/Connection.php');
require('../structures/Target.php');
require('../util/SessionFunction.php');

if(!SessionCheck()){
	return;
}

$target = new Target;
$id = uniqid("TAR_",);
$target->setId(substr($id,0,10));
$target->setTarget($_POST['target']);
$target->setIndicator($_POST['indicator']);
$target->setNature($_POST['nature']);
$target->setSource($_POST['source']);
$target->setIndicatorValue($_POST['indicatorvalue']);

$query = $target->insert($target);
mysqli_query($con, $query);
mysqli_close($con);

header("Location:../Target.php");

?>
