<?php

require('../util/Connection.php');
require('../structures/Target.php');
require('../util/SessionFunction.php');

if(!SessionCheck()){
	return;
}

$target = new Target;

$target->setTarget(str_replace("'","",$_POST['target']));
$target->setIndicator(str_replace("'","",$_POST['indicator']));
$target->setNature(str_replace("'","",$_POST['nature']));
$target->setId(str_replace("'","",$_POST['uid']));
$target->setSource(str_replace("'","",$_POST['source']));
$target->setIndicatorValue(str_replace("'","",$_POST['indicatorvalue']));


$query = $target->update($target);
$result = mysqli_query($con,$query);

mysqli_close($con);

if($result){
	header("Location:../Target.php");
}
else{
   echo "error";
}

?>
